<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var  array
	 */
	protected $fillable = [
		'ticket_id', 'user_id', 'comment'
	];

    /**
     * A comment belongs to a particular ticket
     */
    public function ticket()
    {
    	return $this->belongsTo(Ticket::class);
    }

    /**
     * A comment belongs to a user
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
