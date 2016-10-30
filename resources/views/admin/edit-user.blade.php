@extends('layouts.app')

@section('template_title')
	Showing User {{ $user->name }}
@endsection

@section('template_fastload_css')

.panel-footer {
	display: none;
}

@endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Editing User:</strong> {{ $user->name }}
					</div>

					{!! Form::model($user, array('action' => array('UsersManagementController@update', $user->id), 'method' => 'PUT')) !!}

						{!! csrf_field() !!}

						<div class="panel-body">

							@include('partials.form-status')

							<div class="form-group has-feedback row">
								{!! Form::label('name', Lang::get('forms.label-username') , array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
					              	<div class="input-group">
					                	{!! Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control', 'placeholder' => Lang::get('forms.ph-username'))) !!}
					                	<label class="input-group-addon" for="name"><i class="fa fa-fw {{ Lang::get('forms.username-icon') }}" aria-hidden="true"></i></label>
					              	</div>
								</div>
							</div>

							<div class="form-group has-feedback row">
								{!! Form::label('email', Lang::get('forms.label-useremail') , array('class' => 'col-md-3 control-label')); !!}
								<div class="col-md-9">
					              	<div class="input-group">
					                	{!! Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => Lang::get('forms.ph-useremail'))) !!}
					                	<label class="input-group-addon" for="email"><i class="fa fa-fw {{ Lang::get('forms.useremail-icon') }} " aria-hidden="true"></i></label>
					              	</div>
								</div>
							</div>

						</div>
						<div class="panel-footer">

							{!! Form::button('<i class="fa fa-fw '.Lang::get('forms.submit-btn-icon').'" aria-hidden="true"></i> '.Lang::get('forms.submit-btn-text'), array('class' => 'btn btn-primary btn-lg btn-block margin-bottom-1','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => Lang::get('modals.edit_user__modal_text_confirm_btn'), 'data-message' => Lang::get('modals.edit_user__modal_text_confirm_message'))) !!}

						</div>

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

	@include('modals.modal-save')
	@include('modals.modal-delete')

@endsection

@section('template_scripts')

	@include('scripts.delete-modal-script')
	@include('scripts.save-modal-script')

	<script type="text/javascript">

		$(document).ready(function() {

			$('input').on('input', function() {

				var check1 = ($('#email').val() == null) || ($('#email').val() == '');
				var check2 = ($('#name').val() == null) || ($('#name').val() == '');

			   	if(check1 || check2) {
			      	$('.panel-footer').hide();
			    } else {
			      	$('.panel-footer').show();
			    }

			});

		});

	</script>

@endsection