<?php

namespace App\Entities\Dealer;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'core_stores';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'dealer_user_id');
    }
}
