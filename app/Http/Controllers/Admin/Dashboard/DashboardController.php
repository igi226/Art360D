<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Core\Artists\ArtistInterface;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
     private $artist;
     public function __construct( ArtistInterface $artist ) {
          $this->artist = $artist;
     }
   public function dashboard() {
          $data["total_artist"] = $this->artist->getAllArtists()->count();
          return view("Admin.Dashboard.dashboard",$data);
   }

   public function adminProfile(){
        return view("Admin.Dashboard.profile");
   }

   public function adminProfileUpdate( Request $request ) {
          $request->validate([
               "name" => "required|string",
               "email" => "required|email"
          ]);
          $data = $request->except("_token");
          if(Admin::where("slug", "admin-art360")->update($data)){
               return back()->with("msg", "Profile updated successfully");
          }else{
               return back()->with("msg", "Some error occur");
          }
   }

   public function changePassword( Request $request )
   {
          $request->validate([
               "current_password" => "required|string",
               "new_password" => "required|string|min:8",
          ]);

          $old_password = DB::table('admins')->where("slug", "admin-art360")->first();
          if (Hash::check($request->current_password, $old_password->password)) {
               if($request->new_password == $request->confirm_password){
                   $old_password->update(['password' => Hash::make($request->new_password)]);
                   return redirect()->back()->with('msg', 'Password updated successfully');
               }else{
                   return redirect()->back()->with("msg", "Some error occur!");  
               }
               
           }else{
               return redirect()->back()->with("msg", "Current Password doesn not Match");
           }
   }
}
