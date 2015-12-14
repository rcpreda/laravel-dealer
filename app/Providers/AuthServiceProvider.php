<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $permissions = $this->getPermissions();
        if ($permissions) {
            foreach ($this->getPermissions() as $permission) {

                if ($gate->has($permission->slug))
                    continue;
                $gate->define($permission->slug, function ($user) use ($permission) {
                    return $permission->roles->contains($user->role_id);
                });
            }
        }

    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getPermissions()
    {
        if (!Schema::hasTable(Config::get('acl.permissions_table_name')) || !Schema::hasTable(Config::get('auth.table')))
            return null;

        $permissions = Permission::with('roles')->get();
        return $permissions;
    }
}
