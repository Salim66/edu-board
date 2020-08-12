<?php include_once 'templates/header.php'; ?>

<?php 

    use Edu\Board\Controller\User;
    
    
    $user = new User;

 ?>





<!-- MAIN CONTENT  -->
<section id="content">
    <section class="hbox stretch">
        <section>
            <section class="vbox">
                <section class="scrollable padder">



                    <section class="row m-b-md">
                        <div class="col-sm-6">
                            <h3 class="m-b-xs text-black">Settings</h3> <small>Welcome back, <?php echo $_SESSION['name']; ?>, <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $_SESSION['email']; ?></small> </div>
                        <div class="col-sm-6 text-right text-left-xs m-t-md">
                            <div class="btn-group"> <a class="btn btn-rounded btn-default b-2x dropdown-toggle" data-toggle="dropdown">Widgets <span class="caret"></span></a>
                                <ul class="dropdown-menu text-left pull-right">
                                    <li><a href="#">Notification</a></li>
                                    <li><a href="#">Messages</a></li>
                                    <li><a href="#">Analysis</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">More settings</a></li>
                                </ul>
                            
                    </section>







                    
                    <div id="add_user_modal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- <div class="modal-header"></div> -->
                                <div class="modal-body">
                                    <h2>Add new User</h2>
                                    <div class="mess"></div>
                                    <hr>
                                    <form id="add_users_form" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input class="form-control" name="name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input class="form-control" name="uname" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input class="form-control" name="email" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Cell</label>
                                            <input class="form-control" name="cell" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select name="role" class="form-control" id="">
                                                <option value="">- Select -</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Teacher">Teacher</option>
                                                <option value="Staff">Staff</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary" name="add" type="submit" value="Add User">
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="modal-footer"></div> -->
                            </div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-sm-12">
                        
                            <div class="mess"></div>

                            <a id="add_user_btn" class="btn btn-sm btn-primary" href="#">Add new user</a> 

                            <br>
                            <br>

                            <section class="panel panel-default">
                                <header class="panel-heading"><span class="label bg-danger pull-right m-t-xs">4 left</span> All users</header>
                                <table class="table table-striped m-b-none">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>Cell</th>
                                            <th>Role</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Salim Hasan</td>
                                            <td>salimhasanriad@gmail.com</td>
                                            <td>01773980593</td>
                                            <td>Admin</td>
                                            <td><img style='widht:50px; height:50px;' src="images/a4.png" alt=""></td>
                                            <td>Active</td>
                                            <td>
                                                <a href="" class="btn btn-info">View</a>
                                                <a href="" class="btn btn-warning">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>














                </section>
            </section>
        </section>

    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>








<?php include_once 'templates/footer.php'; ?>









