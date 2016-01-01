<?php

namespace App\Entities\Engine;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table = 'car_engine_costs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'engine_id',
        'urban',
        'extra_urban',
        'average',
        'co2',
        'order',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function engine()
    {
        return $this->belongsTo(\App\Entities\Engine\Manufacturer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function engineManufacturer()
    {
        return $this->belongsTo(\App\Entities\Engine\Manufacturer::class)->manufacturer;
    }

}
