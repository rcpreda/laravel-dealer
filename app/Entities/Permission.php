<?php

namespace App\Entities;

use Config;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
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
        $this->table = Config::get('acl.permissions_table');
    }

    //
    public function roles()
    {
        return $this->belongsToMany(Role::class, Config::get('acl.permissions_roles_table'));
    }
}
