@extends('layouts.app')

@section('title', 'All Tickets')

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
	        					<th style="text-align:center" colspan="2">Actions</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        			@foreach ($tickets as $ticket)
							<tr>
	        					<td>
	        					@foreach ($categories as $category)
	        						@if ($category->id === $ticket->category_id)
										{{ $category->name }}
	        						@endif
	        					@endforeach
	        					</td>
	        					<td>
	        						<a href="{{ url('tickets/'. $ticket->ticket_id) }}">
	        							#{{ $ticket->ticket_id }} - {{ $ticket->title }}
	        						</a>
	        					</td>
	        					<td>
	        					@if ($ticket->status === 'open')
	        						<span class="label label-success">{{ $ticket->status }}</span>
	        					@else
	        						<span class="label label-danger">{{ $ticket->status }}</span>
	        					@endif
	        					</td>
	        					<td>{{ $ticket->updated_at }}</td>
	        					<td>
	        						<a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Comment</a>
	        					</td>
	        					<td>
	        						<a href="{{ url('admin/close_ticket/' . $ticket->id) }}" class="btn btn-danger">Close</a>
	        					</td>
	        				</tr>
	        			@endforeach
	        			</tbody>
	        		</table>

	        		{{ $tickets->render() }}
	        	</div>
	        </div>
	    </div>
	</div>
@endsection