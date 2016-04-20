@extends('layout.master_admin')

@section('content')
	<div>
		<h1>ROLE</h1>
		<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-create-role'>Add New Role</button>
		<br><br>
		@include('admin.role.role_modal')
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Role</td>
					<td>Created at</td>
					<td>Updated at</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->role }}</td>
						<td>{{ $value->created_at }}</td>
						<td>{{ $value->updated_at }}</td>
						<td>
							<button type='button' class='btn btn-default edit-role-btn' data-toggle='modal' data-url="{{ URL::route('admin.role.show', ['id'=>$value->id])}}">Edit</button>
													 
							{{ Form::open(['route' => ['admin.role.destroy', $value->id], 'method' => 'delete']) }}
								{{ Form::submit('Delete') }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach				
			</tbody>
		</table>
	</div>
@stop