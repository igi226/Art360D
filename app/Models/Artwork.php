<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','artist_id', 'year_created',	'medium',	'category_ids',	'collection_id',	'style_id',	'subject_id',	'other_subject',	'material_id',	'edition',	'width',	'height',	'depth',	'number_of_frame',	'price',	'movement_id',	'markings',	'exhibitions',	'about_the_work',	'prints_available',	'also_available_condition',	'artwork_type',	'auction_starting_price',	'auction_end_price',	'auction_reserve_price',	'auction_start_date',	'auction_end_date',	'rent_price_per_one_month',	'rent_price_per_three_month',	'rent_price_per_six_month',	'rent_price_per_year',	'rent_discount_percentage',	'direct_sale_discount_percentage',	'discount_start_dt',	'discount_end_dt',	'copyright',	'ready_to_hang',	'certification',	'signed_by',	'city',	'on_market', 'featured'	
    ];


    public function artwork_images(){
        return $this->hasMany(ArtworkImage::class, 'artwork_id', 'id');
    }

    public function artistUsers(){
        return $this->belongsTo(User::class, 'artist_id', 'id');
    }

    public function artwork_frames(){
        return $this->hasMany(Frame::class, 'artwork_id', 'id');
    }

    public function collectionType(){
        return $this->belongsTo(Collection::class, 'collection_id' ,'id');
    }

    public function style(){
        return $this->belongsTo(Style::class, 'style_id' ,'id');
    }

    public function subject(){
        return $this->belongsTo(ArtworkSubject::class, 'subject_id' ,'id');
    }

    public function material(){
        return $this->belongsTo(Material::class, 'material_id' ,'id');
    }

    public function movement(){
        return $this->belongsTo(Movement::class, 'movement_id' ,'id');
    }
    
}
