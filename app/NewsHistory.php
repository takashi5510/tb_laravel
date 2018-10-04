<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsHistory extends Model
{
    protected $guraded = array('id');
    public static $rules = array(
        'news_id' => 'required',
        'edited_id' => 'required',
    );
}
