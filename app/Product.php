<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cartalyst\Sentinel\Users\EloquentUser;

class Product extends EloquentUser {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   /**
     * To allow soft deletes
     */
}
