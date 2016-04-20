$(document).ready(function(){


	if ('{{ Input::old("autoOpenModal", "true") }}') {
        //JavaScript code to open  modal.
$('#modal-create-user').modal('show');    }	else{
	console.log('hello');
}
});