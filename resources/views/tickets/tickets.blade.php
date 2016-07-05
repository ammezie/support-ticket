@extends('layouts.app')

@section('title', My Tickets)

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-body">
	        		<table class="table">
	        			<thead>
	        				<tr>
	        					<th>Category</th>
	        					<th>Title</th>
	        					<th>Status</th>
	        					<th>Last Updated</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<tr>
	        					<td>$ticket->category</td>
	        					<td>{{ $ticket->title }}</td>
	        					<td>{{ $ticket->status }}</td>
	        					<td>{{ $ticket->updated_at }}</td>
	        				</tr>
	        			</tbody>
	        		</table>
	        	</div>
	        </div>
	    </div>
	</div>
@endsection