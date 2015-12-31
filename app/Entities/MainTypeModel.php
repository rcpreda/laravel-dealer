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

}
