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
                            <h3 class="m-b-xs text-black">All Results</h3> <small>Welcome back, <?php echo $_SESSION['name']; ?>, <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $_SESSION['email']; ?></small> </div>
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







                    
                    <div id="add_result" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- <div class="modal-header"></div> -->
                                <div class="modal-body">
                                    <h2>Add Result</h2>
                                    <div class="mess"></div>
                                    <hr>
                                    <div class="student_res_data">
                                        <img style="width: 200px; height: 200px; display: block; margin: auto;" src="" alt="">
                                        <h3 class="text-center"></h3>
                                        <h4 class="text-center"></h4>
                                    </div>
                                    <form id="add_student_result" action="" method="POST">

                                        <div class="form-group">
                                            <div class="stu_res"></div>
                                            <label id="studentid" for="">Search Student</label>
                                            <input id="student_search" class="form-control" name="student_id" type="text">

                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="">Bangla</label>
                                            <input class="form-control" name="ban" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="">English</label>
                                            <input class="form-control" name="eng" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Math</label>
                                            <input class="form-control" name="math" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Social Science</label>
                                            <input class="form-control" name="ss" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Science</label>
                                            <input class="form-control" name="s" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Religion</label>
                                            <input class="form-control" name="rel" type="text">
                                        </div>
                                        

                                        <div class="form-group">
                                            <input class="btn btn-primary" name="add" type="submit" value="Add Result">
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

                            <a id="add_result_btn" class="btn btn-sm btn-primary" href="#">Add new Result</a> 

                            <br>
                            <br>

                            <section class="panel panel-default">
                                <header class="panel-heading"><span class="label bg-danger pull-right m-t-xs">4 left</span> All Results</header>
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









