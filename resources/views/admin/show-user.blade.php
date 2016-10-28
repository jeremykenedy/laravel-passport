@extends('layouts.app')

@section('template_title')
	Showing User {{ $user->name }}
@endsection

@section('template_linked_css')
@endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">

						{{ $user->name }}'s Information

					</div>
					<div class="panel-body">
					    <table class="table table-borderless table-responsive">
					        <thead>
					            <tr>
					            	<th>Id</th>
					                <th>Username</th>
					                <th>Email</th>
					                <th>Created</th>
					                <th>Updated</th>
					            </tr>
					        </thead>
					        <tbody>
					            <tr>
					                <td style="vertical-align: middle;">
					                    {{ $user->id }}
					                </td>
					                <td style="vertical-align: middle;">
					                    {{ $user->name }}
					                </td>
					                <td style="vertical-align: middle;">
					                    {{ $user->email }}
					                </td>
					                <td style="vertical-align: middle;">
					                    {{ $user->created_at }}
					                </td>
					                <td style="vertical-align: middle;">
					                    {{ $user->updated_at }}
					                </td>
					            </tr>
					        </tbody>
					    </table>

						<div class="row">

							<div class="col-xs-6">

								<a href="users/{{$user->id}}/edit" class="btn btn-small btn-info btn-block"> Edit User</a>

							</div>

							{!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'col-xs-6')) !!}
								{!! Form::hidden('_method', 'DELETE') !!}
								{!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> Delete this User', array('class' => 'btn btn-danger btn-block btn-flat','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
							{!! Form::close() !!}

						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	@include('modals.modal-delete')

@endsection

@section('template_scripts')

	@include('scripts.delete-modal-script')

@endsection