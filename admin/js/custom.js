(function($){
	$(document).ready(function(){


		// show user modal
		$(document).on('click','a#add_user_btn', function(){
			$('#add_user_modal').modal('show');

			return false;
		});

		// show student modal
		$(document).on('click','a#add_student_btn', function(){
			$('#add_student_modal').modal('show');

			return false;
		});

		// show student modal
		$(document).on('click','a#add_result_btn', function(){
			$('#add_result').modal('show');

			return false;
		});


		// All user data show
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


		// All Student data show
		function allStudents(){

			$.ajax({
				url : 'templates/ajax/student_all.php',
				success : function(data){
					$('table tbody#all_student').html(data);
				}
			});

		}
		allStudents();

		$(document).on('submit','form#add_student_form', function(e){
			e.preventDefault();

			let name = $('form#add_student_form input[name="name"]').val();
			let roll = $('form#add_student_form input[name="roll"]').val();
			let reg = $('form#add_student_form input[name="reg"]').val();

			if ( name == '' || roll == '' || reg == '' ) {
				$('.student-mess').html("<p class='alert alert-danger'>All fields are required !<button class='close' data-dismiss='alert' >&times;</button></p>");
			} else {

				$.ajax({
					url : 'templates/ajax/student_add.php',
					method : "POST",
					data : new FormData(this),
					contentType : false,
					processData : false,
					success : function(data){

						$('form#add_student_form')[0].reset();
						$('#add_student_modal').modal('hide');
						$('.mess').html("<p class='alert alert-success'>Student added successful !<button class='close' data-dismiss='alert' >&times;</button></p>");
						allStudents();


					},


				});

			}

		});


	});
})(jQuery)