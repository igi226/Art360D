<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtworkRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            "artist_id" => "required|numeric",
            "title" => "required|string",
            "year_created" => "required",
            "medium" => "required",
            "collection_id" => "required",
            "style_id" => "required",
            "subject_id" => "required",
            "material_id" => "required",
            "edition" => "required",
            "width" => "required",
            "height" => "required",
            "depth" => "required",
            "price" => "required",
            "movement_id" => "required",
            
        ];
    }
}
