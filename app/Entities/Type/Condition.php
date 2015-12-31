<?php

namespace App\Entities\Type;

use App\Entities\MainTypeModel;

class Condition extends MainTypeModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_type_conditions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'alias', 'code', 'status', 'order'
    ];

}
