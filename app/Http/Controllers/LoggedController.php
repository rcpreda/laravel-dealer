<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class LoggedController extends Controller
{
    /**
     * @var
     */
    protected $user;

    /**
     *
     */
    public function __construct()
    {
        $this->user = Auth::user();
        view()->share('user', $this->user);
    }
}