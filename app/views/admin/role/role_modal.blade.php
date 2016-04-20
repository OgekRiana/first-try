<div class="modal fade" tabindex="-1" role="dialog" id="modal-create-role">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">ADD NEW ROLE</h4>
			</div>
			<div class="modal-body">
				{{ Form::open(array('route' => 'admin.role.store', 'method' => 'post')) }}
				<fieldset>
                    <div class="form-group">
                    	{{ $errors->first('role') }}	
                        {{ Form::text('role', null, ['placeholder' => 'Role', 'class' => 'form-control']) }}
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


<div class="modal fade" tabindex="-1" role="dialog" id="modal-update-role">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">UPDATE ROLE</h4>
			</div>
			<div class="modal-body">
				{{ Form::open(array('route' => array('admin.role.update'), 'method' => 'put')) }}	

				<fieldset>
                    <div class="form-group">
                    	{{ $errors->first('role') }}	
                        {{ Form::text('role', null, ['placeholder' => 'Role', 'class' => 'form-control role']) }}
                    </div>
                    <div class="form-group">
                    	{{ $errors->first('test') }}	
                        {{ Form::text('test', null, ['placeholder' => 'test', 'class' => 'form-control test']) }}
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

@section('javascript')
	<script type="text/javascript">
		$(".edit-role-btn").click(function(){
			var url = $(this).data('url');
			console.log(url);						
			$.ajax({
	            url : url,
	            success: function(html) {
	            	console.log(html);
	                //$(".first_name").val(html.first_name);
	                $(".role").val(html.role);	                
	            }      
            });

			$('#modal-update-role').modal('show');
			
		});		
	</script>
@stop