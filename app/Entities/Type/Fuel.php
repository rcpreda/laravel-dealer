<?php

namespace App\Entities\Type;

use App\Entities\MainTypeModel;

class Fuel extends MainTypeModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_type_fuel';

    /**
     * @param $query
     * @return array $manufacturersAsArray
     * @throws \Exception
     */
    public function scopeToOptionArray($query)
    {
        $fuelTypes = $query->get(['id', 'name']);
        if ($fuelTypes->isEmpty())
            throw new \Exception('Please add a fuel type first!');

        $fuelTypeAsArray = ['select' => ''];
        foreach ($fuelTypes as $fuelType) {
            $fuelTypeAsArray[$fuelType->id] =  $fuelType->name;
        }

        return $fuelTypeAsArray;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuel()
    {
        return $this->belongsTo(\App\Entities\Engine\Manufacturer::class);
    }

}
