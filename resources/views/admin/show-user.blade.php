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

						@include('partials.form-status')

						<div class="table-responsive">
						    <table class="table table-borderless">
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

							<a class="btn btn-small btn-info pull-left" href="{{ URL::to('users/' . $user->id . '/edit') }}" style="margin: 1em;">
								<i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
								Edit <span class="hidden-sm hidden-xs">this</span> User
							</a>

							{!! Form::open(array('url' => 'users/' . $user->id, 'class' => '')) !!}
								{!! Form::hidden('_method', 'DELETE') !!}
								{!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> Delete <span class="hidden-sm hidden-xs">this</span> User', array('class' => 'btn btn-danger pull-left', 'style'=>'margin: 1em 1em 1em 0;','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
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