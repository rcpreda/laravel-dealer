<?php

namespace App\Entities\Type;

use App\Entities\MainTypeModel;

class Color extends MainTypeModel
{
    protected $table = 'car_type_colors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'alias', 'code', 'status', 'order'
    ];


}
