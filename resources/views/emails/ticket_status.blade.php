<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Suppor Ticket Status</title>
</head>
<body>
	<p>
		Hello {{ ucfirst($ticketOwner->name) }},
	</p>
	<p>
		Your support ticket with ID #{{ $ticket->ticket_id }} has been marked has resolved and closed.
	</p>
</body>
</html>