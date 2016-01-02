<?php

namespace App\Http\Controllers\Logged\Dealer;


use App\Entities\Car\Model;
use App\Entities\Type\Color;
use App\Entities\Type\Condition;
use App\Entities\Type\Fuel;
use Illuminate\Database\QueryException;
use Response;
use Flash;
use Redirect;
use Illuminate\Support\Str;
use App\Entities\Car\Manufacturer;
use App\Entities\Dealer\Car;
use App\Http\Controllers\LoggedController;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Entities\Engine\Manufacturer as Engine;

class CarController extends LoggedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate();
        return view('logged.dealer.cars.index', compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::statusEnabled()->toOptionArray();
        $fuelTypes = Fuel::toOptionArray();
        $years = ['select' => ''];
        for($i = 1950; $i <= date('Y') ; $i++) {
            $years[$i] = $i;
        }
        //$extra = ['manufacturer_id' => 1, 'model_id' => 1];
        $extra = [];
        $colors = Color::statusEnabled()->toOptionArray();
        $conditions = Condition::statusEnabled()->toOptionArray();
        return view('logged.dealer.cars.create', compact('manufacturers', 'fuelTypes', 'years', 'extra', 'colors', 'conditions' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Car\CreateRequest $request)
    {
        try {
            Car::create($request->all());
            Flash::success('Car successfully added!');
        } catch (QueryException $e) {
            $error_code = $e->errorInfo[1];
            if($error_code == 1062){
                Flash::error('Duplicate entry problem! Car engine code has to be unique!');
            }
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }

        return Redirect::route('admin.car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAjaxMake(Request $request)
    {
        if ($request->ajax() && $request->input('term')) {
            $data = $request->input('term');
            $manufacturers = Manufacturer::all();
            $result = [];
            foreach ($manufacturers as $manufacturer) {
                if(strpos(Str::lower($manufacturer->name),Str::lower($data)) !== false) {
                    $result[] = ['label'=> $manufacturer->name, 'value'=> $manufacturer->name, 'id' =>$manufacturer->id];
                }
            }
            return Response::json($result);
        }
    }

    /**
     * @param Request $request
     * @param $manufacturer
     * @return mixed
     */
    public function getAjaxModels(Request $request, $manufacturer)
    {
        if ($request->ajax() && $manufacturer) {
            $modelsCollection = Model::findByManufacturerId($manufacturer);
            $models = Model::toOptionArray($modelsCollection);
            $model = 'select';
            if ($request->get('model')){
                $model = (int) $request->get('model');
            }
            return \View::make('logged.dealer.cars.partials.models', compact('models', 'model'));
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getAjaxEngines(Request $request)
    {
        if ($request->ajax()) {
            try {
                $engines = Engine::selectByFuelAndCarMake($request)->asArrayFilter();
            } catch (QueryException $e) {

            }

            return \View::make('logged.dealer.cars.partials.engines', compact('engines'));
        }
    }
}
