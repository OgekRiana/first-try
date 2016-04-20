@extends('layout.master_admin')

@section('content')
	<div class="">
		<div class="form-group">
		<h1>USER</h1>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-user">Add User</button>
		</div>
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Confirmed</td>
					<td>Phone</td>
					<td>Gender</td>
					<td>Status</td>
					<td>Role</td>
					<td>Last Login</td>
					<td>Actions</td>
				</tr>
			</thead>
			@include('admin.user.user_modal')
			<tbody>
				@foreach($users as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->first_name." ".$value->last_name }}</td>
						<td>{{ $value->email->address }}</td>
						<td>{{ $value->email->confirmed ? 'True' : 'False' }}</td>
						<td>{{ $value->phone }}</td>
						<td>{{ $value->gender == 1 ? 'Perempuan' : 'Laki-laki' }}</td>
						<td>{{ $value['status'] }}</td>
						<td>
							@foreach($value->roles as $roles)
								{{ $roles->role }}<br>
							@endforeach							
						</td>
						<td>{{ $value->last_login }}</td>
						<td>
							<a href="" class="edit-user-btn" data-target="#modal-update-user" data-toggle="modal" data-value="{{ $value->id }}">Edit</a> | 
							<a href="{{ URL::route('userdestroy', [$value->id]) }}" method="delete">Delete</a> | Role | Verified
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop