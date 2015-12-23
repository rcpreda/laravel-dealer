<?php

namespace App\Entities;

use Config;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('acl.roles_table');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, Config::get('acl.permissions_roles_table'));
    }

    /**
     * @param Permission $permission
     * @return Model
     */
    public function assign(Permission  $permission)
    {

        return $this->permissions()->save($permission);

    }

}
