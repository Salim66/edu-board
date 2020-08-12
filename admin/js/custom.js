(function($){
	$(document).ready(function(){


		// add new user modal
		$(document).on('click','a#add_user_btn', function(){
			$('#add_user_modal').modal('show');

			return false;
		});


		$(document).on('submit','form#add_users_form', function(event){
			event.preventDefault();

			$.ajax({
				url : 'templates/ajax/user_add.php',
				method : 'POST',
				data : new FormData(this),
				contentType : false,
				processData : false,
				success : function(data){

					$('form#add_users_form')[0].reset();
					$('#add_user_modal').modal('hide');
					$('.mess').html(data);
				},

			});
		});



	});
})(jQuery)