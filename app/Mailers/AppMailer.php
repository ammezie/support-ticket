<?php
namespace App\Mailers;

use App\Ticket;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer {
	protected $mailer;           

	/**
	 * from email address
	 * @var string
	 */
	protected $fromAddress = 'support@supportticket.dev';

	/**
	 * from name
	 * @var string
	 */
	protected $fromName = 'Support Ticket';

	/**
	 * email to send to
	 * @var [type]
	 */
	protected $to;

	/**
	 * Subject of the email
	 * @var [type]
	 */
	protected $subject;

	/**
	 * view template for email
	 * @var [type]
	 */
	protected $view;

	/**
	 * data to be sent alone email
	 * @var array
	 */
	protected $data = [];


	public function __construct(Mailer $mailer)
	{
		$this->mailer = $mailer;
	}
	
	/**
	 * Send Ticket information to user
	 * 
	 * @param  User   $user
	 * @param  Ticket  $ticket
	 * @return method deliver()
	 */
	public function sendTicketInformation($user, Ticket $ticket)
	{
		$this->to = $user->email;
		$this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
		$this->view = 'emails.ticket_info';
		$this->data = compact('user', 'ticket');

		return $this->deliver();
	}

	/**
	 * Send welcome email to user
	 * 
	 * @param  User   $user
	 * @return method deliver()
	 */
	// public function sendWelcomeMailTo(User $user)
	// {
	// 	$this->to = $user->email;
	// 	$this->view = 'emails.welcome';
	// 	$this->data = compact('user');

	// 	return $this->deliver();
	// }

	/**
	 * Do the actual sending of the mail
	 */
	public function deliver()
	{
		$this->mailer->send($this->view, $this->data, function($message) {
			$message->from($this->fromAddress, $this->fromName)
					->to($this->to)->subject($this->subject);
		});
	}
}