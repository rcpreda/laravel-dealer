<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Authorization
{

    use AuthorizesRequests;

    protected $auth;
    protected $gate;


    public function __construct(Guard $auth, GateContract $gate)
    {
        $this->auth = $auth;
        $this->gate = $gate;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $routeName = $request->route()->getName();

        try  {
            $this->authorize($routeName);
        } catch (HttpException $e) {
            Session::flash('flash_message', 'You don\'t have permission to access that page!');
            return redirect()->guest('admin/dashboard');
        }

        return $next($request);
    }
}
