<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class ArtistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(Route::currentRouteName() == "artists.store"){
            return [
                "first_name" => "required|string",
                "last_name" => "required|string",
                "company_name" => "required|string",
                "email" => "required|email|unique:users",
                "password" => "required|min:8|same:confirm_password",
                "artist_type" => "required|string",
                "feature_artist" => "required|string",
                "subscription_id" => "required",
                "phone" => "required",
            ];
        }elseif(Route::currentRouteName() == "artists.update") {
            return [
                "first_name" => "required|string",
                "last_name" => "required|string",
                "company_name" => "required|string",
                "email" => "required|email",
                "artist_type" => "required|string",
                "feature_artist" => "required|string",
                "subscription_id" => "required",
                "phone" => "required",
            ];
        }
       
    }
}
