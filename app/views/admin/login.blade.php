<!doctype html>

<html>
	<head>
		<title>JUMO FRESH - BACK OFFICE | Fresh Homemade Juices, Smoothies, Raw Mylk, dan Rujak</title>
		<link rel="stylesheet" href="/assets/css/admin/masteradmin.css" />
		<link rel="stylesheet" href="/assets/css/bootstrap.css" />
	</head>
<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="login-form">
						<div class="panel panel-primary">
							<div class="panel-heading">
								JUMO ADMINISTRATOR PANEL
							</div>
							<div class="panel-body">

								{{ Form::open(array('url' => 'jumo-admin')) }}
								<fieldset>
	                                <div class="form-group">
	                                	{{ $errors->first('name') }}	
	                                    {{ Form::text('name', Input::old('name'), ['placeholder' => 'First Name', 'class' => 'form-control']) }}
	                                </div>
	                                <div class="form-group">
	                                	{{ $errors->first('password') }}
	                                    {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
	                                </div>
                                        {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                        		</fieldset>
                        		{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>			
		</div>
</body>
</html>