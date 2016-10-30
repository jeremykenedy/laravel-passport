@extends('layouts.app')

@section('template_title')
	Showing Users
@endsection

@section('template_linked_css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@endsection

@section('content')

	<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        Showing Users
                    </span>

                    <a href="{{ URL::to('users/create') }}" class="btn btn-default btn-xs" title="Create New User">
                    	<i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                        Create New User
                    </a>
                </div>
            </div>

            <div class="panel-body">

            	@include('partials.form-status')

				<div class="table-responsive">
					<table id="user_table" class="table table-striped table-hover table-condensed data-table">
						<thead>
							<tr class="success">
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Access Level</th>
								<th>Created</th>
								<th>Updated</th>
								<th class="no-sort no-search">Actions</th>
								<th class="no-sort no-search"></th>
								<th class="no-sort no-search"></th>
							</tr>
						</thead>
						<tbody>

					        @foreach ($users as $a_user)

								<tr>
									<td><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->id}}</a></td>
									<td><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->name}} </a></td>
									<td><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->email}} </a></td>
									<td>
										@foreach ($roles as $role)
											@if ( ($a_user->id) == $role->user_id )
												@if ($role->role_id == 1 )
													@php
											            $access_level   = 'User';
											            $access_class 	= 'info';
											            $access_icon	= 'user';
													@endphp
												@elseif ($role->role_id == 2 )
													@php
											            $access_level   = 'Editor';
											            $access_class 	= 'warning';
											            $access_icon	= 'user';
													@endphp
												@elseif ($role->role_id == 3 )
													@php
											            $access_level   = 'Administrator';
											            $access_class 	= 'danger';
											            $access_icon	= 'user';
													@endphp
												@endif
											@endif
										@endforeach
										<a href="{{ URL::to('users/' . $a_user->id) }}">
											<span class="label label-{{ $access_class }}">
												<i class="fa fa-fw fa-{{$access_icon}}"></i>
												{{$access_level}}
											</span>
										</a>
									</td>
									<td><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->created_at}} </a></td>
									<td><a href="{{ URL::to('users/' . $a_user->id) }}">{{$a_user->updated_at}} </a></td>
									<td>
										{!! Form::open(array('url' => 'users/' . $a_user->id, 'class' => 'pull-right')) !!}
											{!! Form::hidden('_method', 'DELETE') !!}
											{!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span> <span class="hidden-sm hidden-xs hidden-md">this User</span>', array('class' => 'btn btn-danger btn-block btn-flat','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
										{!! Form::close() !!}
									</td>
									<td>
										<a class="btn btn-small btn-success btn-block btn-flat" href="{{ URL::to('users/' . $a_user->id) }}">
											<i class="fa fa-fw fa-user" aria-hidden="true"></i>
											<span class="hidden-xs hidden-sm">Show</span> <span class="hidden-sm hidden-xs hidden-md">this User</span>
										</a>
									</td>
									<td>
										<a class="btn btn-small btn-info btn-block btn-flat" href="{{ URL::to('users/' . $a_user->id . '/edit') }}">
											<i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
											<span class="hidden-xs hidden-sm">Edit</span> <span class="hidden-sm hidden-xs hidden-md">this User</span>
										</a>
									</td>
								</tr>

					        @endforeach

						</tbody>
					</table>
				</div>
            </div>
        </div>
	</div>

	@include('modals.modal-delete')

@endsection

@section('template_scripts')

	@include('scripts.datatable')
	@include('scripts.delete-modal-script')

@endsection