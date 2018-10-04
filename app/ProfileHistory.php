<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
    protected $guraded = array('id');
    public static $rules = array(
        'profile_id' => 'required',
        'edited_id' => 'required',
    );

}
