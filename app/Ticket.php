<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var  array
	 */
    protected $fillable = [
    	'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'status'
    ];

    /**
     * A ticket belongs to a user
     */
	public function user()
    {
    	return $this->belongsTo(App::User);
    }
}
