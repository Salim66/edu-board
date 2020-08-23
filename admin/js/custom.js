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

		// Student delete function
		$(document).on('click', 'a#single_student_delete', function(e){
			e.preventDefault();

			let del = confirm("Are you sure?");
			let id = $(this).attr('student_id');

			if ( del == true ) {
				$.ajax({
					url : 'templates/ajax/student_delete.php',
					method : "POST",
					data : { id : id },
					success : function(data){
						$('.mess').html(data);
						allStudents();
					},
				});
			} else {
				return false;
			}

		});

		// Search student for results
		$(document).on('keyup', 'input#student_search', function(){

			// get values 
			let stu_val = $(this).val();

			$.ajax({
				url : 'templates/ajax/student_search.php',
				method : "POST",
				data : { stu_val : stu_val },
				success : function(data){
					$('.stu_res').html(data);
				},

			});

		});

		// select a student
		$('.student_res_data').hide();
		$(document).on('click', 'li#student_select', function(){

			// get all values
			let stu_id = $(this).attr('student_id');
			let stu_name = $(this).attr('student_name');
			let stu_roll = $(this).attr('student_roll');
			let stu_reg = $(this).attr('student_reg');
			let stu_pic = $(this).attr('student_pic');

			

			// set value
			$('input#student_search').val(stu_id);
			$('.stu_res').hide();
			$('label#studentid').text('Student id');
			$('input#student_search').attr('disabled', '');


			// single student data
			$('.student_res_data').show();
			$('.student_res_data img').attr('src', 'student/' +stu_pic);
			$('.student_res_data h3').html(stu_name);
			$('.student_res_data h4').html('<strong>Roll: </strong>' +stu_roll+ '<strong>Reg: </strong>' +stu_reg);

		});

		// Alert function
		function msgAlert(msg, type = 'success'){
			return "<p class='alert alert-"+type+"'>"+msg+" !<button class='close' data-dismiss='alert' >&times;</button></p>";
		}

		// all student results show
		function allResults(){
			$.ajax({
				url : 'templates/ajax/result_all.php',
				success : function(data){
					$('table tbody#all_student_data_show').html(data);
				}
			});
		}
		allResults();

		// Delete Student Result
		$(document).on('click', 'a#delete_student_result', function(e){
			e.preventDefault();

			let del = confirm('Are you sure?');
			let id = $(this).attr('result_id');

			if ( del == true ) {
				$.ajax({
					url : 'templates/ajax/result_delete.php',
					method : "POST",
					data : { id : id },
					success : function(data){
						$('.mess_a').html(data);
						allResults();
					}
				});
			} else {
				return false;
			}
		});

		// Add Student Results
		$(document).on('submit', 'form#add_student_result', function(e){
			e.preventDefault();
			$('input#student_search').removeAttr('disabled');
			
			$.ajax({
					url : 'templates/ajax/result_add.php',
					method : "POST",
					data : new FormData(this),
					contentType : false,
					processData : false,
					success : function(data){

						$('form#add_student_result')[0].reset();
						$('#add_result').modal('hide');
						$('.mess_a').html(msgAlert('Result added successfull'));
						$('.student_res_data').hide();
						allResults();
					},


				});

		});


	});
})(jQuery)