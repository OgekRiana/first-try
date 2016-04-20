<div class="modal fade" tabindex="-1" role="dialog" id="modal-create-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">ADD NEW USER</h4>
			</div>
			<div class="modal-body">
				{{ Form::open(array('url' => 'admin/user', 'method' => 'post')) }}
				<fieldset>
                    <div class="form-group">
                    	{{ $errors->first('first_name') }}	
                        {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    	{{ $errors->first('last_name') }}
                        {{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    	{{ $errors->first('email') }}
                        {{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    	{{ $errors->first('password') }}
                        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    	{{ $errors->first('password_confirmation') }}
                        {{ Form::password('password_confirmation', ['placeholder' => 'Password Confirmation', 'class' => 'form-control']) }}
                    </div>
        		</fieldset>   

			</div>
			<div class="modal-footer">
				{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
				{{ Form::close() }}        		
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-update-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">MODIFY USER</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('action' => array('UserController@updateUser'))) }}
                <fieldset>
                    <div class="form-group">
                        {{ Form::hidden('user_id', null, array('class' => 'user_id')) }}
                    </div>
                    <div class="form-group">
                        {{ $errors->first('first_name') }}  
                        {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control first_name']) }}
                    </div>
                    <div class="form-group">
                        {{ $errors->first('last_name') }}
                        {{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control last_name']) }}
                    </div>
                    <div class="form-group">
                        {{ $errors->first('phone') }}
                        {{ Form::text('phone', null, ['placeholder' => 'Phone Number', 'class' => 'form-control phone']) }}
                    </div>
                    <div class="form-group">
                        {{ $errors->first('gender') }}
                        {{ Form::select('gender', ['1' => 'Perempuan', '2' => 'Laki-laki'], null, array('class' => 'form-control gender')) }}
                    </div>                   
                </fieldset>   

            </div>
            <div class="modal-footer">
                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}             
            </div>
        </div>
    </div>
</div>


@section('javascript')
    <script type="text/javascript">
        if ({{ Input::old('autoOpenModal', 'false') }}) {
            $('#modal-create-user').modal('show');    
        }

        $(".edit-user-btn").click(function(){
            var urlGetUser = "{{ URL::route('findarecord')}}",
                userId = $(this).data('value');
            $('#modal-update-user').modal('show');     

                $.ajax({
                  type: "POST",
                  url: urlGetUser,
                  data: { id: userId },
                  success: function(html) {
                        console.log(html);
                        //alert(data.first_name);
                        $(".first_name").val(html.first_name);
                        $(".last_name").val(html.last_name);
                        $(".phone").val(html.phone);
                        $(".user_id").val(html.id);
                  }      
                });
                //alert(urlGetUser+" "+ userId);

        });
    </script>
@stop