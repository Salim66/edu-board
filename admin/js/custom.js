(function($){
	$(document).ready(function(){


		// add new user modal
		$(document).on('click','a#add_user_btn', function(){
			$('#add_user_modal').modal('show');

			return false;
		});


		// All user data fetch
		function allUsers(){

			$.ajax({
				url : 'templates/ajax/user_all.php',
				success : function(data){
					$('tbody#all_users_tbody').html(data);
				}
			});

		}
		allUsers();
		


		// add user form submit
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
					allUsers();
				},

			});
		});


		// user data delete
		$(document).on('click', 'a#user_delete', function(event){
			event.preventDefault();

			let del = confirm('Are you sure ?');
			let id = $(this).attr('user_id');

			if ( del == true ) {

				$.ajax({
					url : 'templates/ajax/user_delete.php',
					method : "POST",
					data : { id : id },
					success : function(data){
						$('.mess').html(data);
						allUsers();
					},
				});

			} else {
				return false;
			}
			

		});


	});
})(jQuery)