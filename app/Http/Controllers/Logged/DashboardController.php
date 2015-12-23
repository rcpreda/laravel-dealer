<?php

namespace App\Http\Controllers\Logged;

use App\Entities\Permission;
use App\Entities\Role;
use App\Http\Controllers\LoggedController;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends LoggedController
{

    public function index()
    {
        return view('dashboard.index');
    }

}
