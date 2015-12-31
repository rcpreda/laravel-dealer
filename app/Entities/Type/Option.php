<?php

namespace App\Entities\Type;

use App\Entities\MainTypeModel;

class Option extends MainTypeModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_type_options';

    /**
     * @param $query
     * @return array $manufacturersAsArray
     * @throws \Exception
     */
    public function scopeToOptionArray($query)
    {
        $optionTypes = $query->get(['id', 'name']);
        if ($optionTypes->isEmpty())
            throw new \Exception('Please add a option type first!');

        $optionTypeAsArray = ['select' => '--Select--'];
        foreach ($optionTypes as $optionType) {
            $optionTypeAsArray[$optionType->id] =  $optionType->name;
        }

        return $optionTypeAsArray;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo(\App\Entities\Car\Option::class);
    }
}
