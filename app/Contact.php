<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contacts';
    public $primary_key = 'id';
    public $timestamps = true;

}
