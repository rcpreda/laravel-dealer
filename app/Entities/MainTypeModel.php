<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class MainTypeModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'status'
    ];

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
        $types = $query->get(['id', 'name']);
        if ($types->isEmpty())
            throw new \Exception('Please add a fuel type first!');

        $typeAsArray = ['select' => ''];
        foreach ($types as $type) {
            $typeAsArray[$type->id] =  $type->name;
        }

        return $typeAsArray;
    }

}
