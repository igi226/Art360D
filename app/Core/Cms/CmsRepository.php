<?php
namespace App\Core\Cms;

use App\Models\cms;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CmsRepository implements CmsInterface
{
    public function getHomePage()
    {
        return DB::table('cms')->where('page', 'home')->get();
    }

    public function getbanner1Page()
    {
        return DB::table('cms')->where('slug', 'gallery')->first();
    }

    public function getbanner2Page()
    {
        return DB::table('cms')->where('slug', 'art')->first();
    }

    public function getbanner3Page()
    {
        return DB::table('cms')->where('slug', 'art-show')->first();
    }


    public function getAboutPage()
    {
        return DB::table('cms')->where('page', 'about')->get();
    }

    public function getCms($slug)
    {
        return DB::table('cms')->where('slug', $slug)->first();
    }

    public function updateCms(array $data, $slug)
    {
        $cms = cms::where('slug', $slug)->firstOrFail();
        if (!empty($data['image'])) {
            File::delete(public_path("storage/DotProfessionalContent/" . $cms->image));
            $db_image = time() . rand(0000, 9999) . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->storeAs("public/CmsImage", $db_image);
            $data['image'] = $db_image;
        }
        return [
            'update' => $cms->update($data),
            'page' => $cms->page,
        ];
    }
}

?>