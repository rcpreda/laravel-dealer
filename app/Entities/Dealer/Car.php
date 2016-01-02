<?php

namespace App\Entities\Dealer;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    const ACTIVE = 1;
    const INACTIVE = 2;
    const MISSING_PICTURES = 3;
    const SOLD = 4;

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
        'action',
        'status',
    ];

    /**
     * @var array
     */
    public static $statuses = [
        self::ACTIVE => "Active",
        self::INACTIVE => "Inactive",
        self::MISSING_PICTURES => "Missing Pictures",
        self::SOLD => "Sold",
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuel()
    {
        return $this->hasOne(\App\Entities\Type\Fuel::class, 'id', 'type_fuel_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manufacturer()
    {
        return $this->hasOne(\App\Entities\Car\Manufacturer::class, 'id', 'manufacturer_id');
    }

    /**
     * @param $value
     */
    public function setDealerSiteIdAttribute($value)
    {
        $this->attributes['dealer_site_id'] = \Auth::user()->site->id;
    }

    /**
     * @param $value
     */
    public function setTypeApprovalIdAttribute($value)
    {
        $this->attributes['type_approval_id'] = 2;
    }

    /**
     * @param $value
     */
    public function setIsFeaturedAttribute($value)
    {
        $this->attributes['is_featured'] = $value ? $value : 0 ;
    }



}
