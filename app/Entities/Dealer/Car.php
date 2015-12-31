<?php

namespace App\Entities\Dealer;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dealer_cars';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dealer_site_id',
        'type_approval_id',
        'type_fuel_id',
        'type_color_id',
        'type_condition_id',
        'engine_id',
        'manufacturer_id',
        'model_id',
        'title',
        'description',
        'year',
        'miles',
        'order',
        'is_featured',
        'status',
    ];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return string
     */
//    public function setDealerSiteIdAttribute($value)
//    {
//        $this->attributes['dealer_site_id'] = ucfirst($value);
//    }

}
