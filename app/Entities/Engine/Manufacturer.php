<?php

namespace App\Entities\Engine;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class Manufacturer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_engines as ce';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'power',
        'size',
        'kw',
        'acceleration',
        'max_speed',
        'order',
        'status',
        'fuel_type_id',
        'manufacturer_id',
        'code',
        'displacement',
        'torque',
        'year'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuel()
    {
        return $this->hasOne(\App\Entities\Type\Fuel::class, 'id', 'fuel_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manufacturer()
    {
        return $this->belongsTo(\App\Entities\Car\Manufacturer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cost()
    {
        return $this->hasOne(\App\Entities\Engine\Cost::class);
    }

    /**
     * @param $query
     * @return array $manufacturersAsArray
     * @throws \Exception
     */
    public function scopeToOptionArray($query)
    {
        $engines = $query->get();
        if ($engines->isEmpty())
            throw new \Exception('Please add a car manufacturer first!');

        $array = ['select' => '--Select--'];
        foreach ($engines as $engine) {
            $array[$engine->id] =  sprintf("%s-%s-%s(%s)", $engine->manufacturer->name, $engine->code, $engine->size, $engine->power);
        }
        return $array;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeStatusEnabled($query)
    {
        return $query->where('status', '=', 1);
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Query\Builder $query
     */
    public function scopeSelectByFuelAndCarMake($query, Request $request)
    {
        $manufacturerId = (int) $request->get('make');
        $fuelId = (int) $request->get('fuel');
        $year = (int) $request->get('year');
        $query->select(["ce.*", "c.co2 as emission"])
            ->join('car_type_fuel as f', 'ce.fuel_type_id', '=', 'f.id')
            ->leftJoin('car_engine_costs as c', 'ce.id', '=', 'c.engine_id')
            ->where('ce.status', '=', 1)
            ->where('ce.manufacturer_id', '=', $manufacturerId)
            ->where('ce.fuel_type_id', '=', $fuelId);

        return $query;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return array
     */
    public function scopeAsArrayFilter($query)
    {
        $result = $query->get();
        if ($result->isEmpty())
            throw new QueryException('Please define a car engine before posting a car!');

        $array = ['select' => ''];
        foreach($result as $engine) {
            $array[$engine->id] = sprintf("%s-%s(%s)-%s", $engine->code, $engine->size, $engine->power, $engine->emission);
        }

        return $array;
    }

}
