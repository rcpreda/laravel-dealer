<?php

namespace App\Entities\Car;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_manufacturers';


    /**
     * @param $query
     * @return mixed
     */
    public function scopeStatusEnabled($query)
    {
        return $query->where('status', '=', 1);
    }

    /**
     * @param $query
     * @return array $manufacturersAsArray
     * @throws \Exception
     */
    public function scopeToOptionArray($query)
    {
        $manufacturers = $query->get(['id', 'name']);
        if ($manufacturers->isEmpty())
            throw new \Exception('Please add a car manufacturer first!');

        $manufacturersAsArray = ['select' => ''];
        foreach ($manufacturers as $manufacturer) {
            $manufacturersAsArray[$manufacturer->id] =  $manufacturer->name;
        }

        return $manufacturersAsArray;
    }


    /**
     * A car manufacturer can have many car models
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function models()
    {
        return $this->hasMany(\App\Entities\Car\Model::class);
    }

    /**
     * A car manufacturer can have many car models
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function engines()
    {
        return $this->hasMany(\App\Entities\Engine\Manufacturer::class);
    }
}
