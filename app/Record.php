<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the user that owns the record.
     */
    public function user() {

    	return $this->belongsTo('App\User', 'user_id', 'id');

    }
}
