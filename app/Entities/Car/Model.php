<?php

namespace App\Entities\Car;


class Model extends \Illuminate\Database\Eloquent\Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_models';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'status', 'manufacturer_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer()
    {
        return $this->belongsTo(\App\Entities\Car\Manufacturer::class);
    }

    /**
     * @param $manufacturerId
     * @return bool
     */
    public static function findByManufacturerId($manufacturerId)
    {
        $models = static::whereManufacturerId($manufacturerId)->get();
        if ($models->isEmpty()) {
            return FALSE;
        }
        return $models;
    }

    /**
     * @param $collection
     * @return bool
     */
    public static function toOptionArray($collection)
    {
        if (!$collection)
            return FALSE;

        $result = ['select' => ''];
        foreach ($collection as $model) {
            $result[$model->id] = $model->name;
        }

        return $result;
    }


}
