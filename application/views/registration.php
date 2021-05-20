<?php defined("BASEPATH") or exit ("No direct script access allowed"); ?>

<div class="container-fluid">
    <header class="navbar navbar-expand bg-white relative-top header-styles">
        <nav class="mr-auto">
            <div class="nav nav-tabs" rows="tablist">
                <a class="nav-link active"  id="registrationPage" data-toggle="tab" href="#viewingRegistrationPage" role="tab">
                    <span>
                        Registration 
                    </span>
                </a>
            </div>
        </nav>
    </header>
    <div class="tab-content py-4 px-5">
        <div class="tab-pane show active" id="viewingRegistrationpage" role="tabpanel">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="form-group">
                        <label for="searchingUser"></label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <i class="fas fa-search"></i>
                            </div>
                            <input class= "form-control" type="text" placeholder="search a user..." id="searchUser">
                        </div>
                    </div>
                    <ul class="list-group user-list" id="userList">
                        <li class="list-group-item">
                            <div class="row">
                                    <div class="col-lg-2 my-auto">
                                        <div class="circular-image-sm">
                                            <img class="img-fluid "src="https://www.emmegi.co.uk/wp-content/uploads/2019/01/User-Icon.jpg" alt="user image">
                                        </div>
                                    </div>
                                        <div class="col-lg-9">
                                        <div class="user-detail">
                                            <h6 id="userFullName">Juan Dela Cruz</h6>
                                            <p class="mb-0" id="userRole">Supervisor</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                    <div class="col-lg-2 my-auto">
                                        <div class="circular-image-sm">
                                            <img class="img-fluid "src="https://www.emmegi.co.uk/wp-content/uploads/2019/01/User-Icon.jpg" alt="user image">
                                        </div>
                                    </div>
                                        <div class="col-lg-9">
                                        <div class="user-detail">
                                            <h6 id="userFullName">Juan Dela Cruz</h6>
                                            <p class="mb-0" id="userRole">Supervisor</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                    <div class="col-lg-2 my-auto">
                                        <div class="circular-image-sm">
                                            <img class="img-fluid "src="https://www.emmegi.co.uk/wp-content/uploads/2019/01/User-Icon.jpg" alt="user image">
                                        </div>
                                    </div>
                                        <div class="col-lg-9">
                                        <div class="user-detail">
                                            <h6 id="userFullName">Juan Dela Cruz</h6>
                                            <p class="mb-0" id="userRole">Supervisor</p>
                                    </div>
                                </div>
                            </div>
                        </li>                      
                    </ul>
                </div>
                <div class="col-lg-6">
                    <form action="" id="userRegistration" method="POST">
                        <div class="row">
                                    
                            <div class="col-lg-6 my-auto text-center">
                                <div class="circular-landscape">
                                    <div class="content-overlay">
                                        <label for="uploadUserImage" class="upload-photo" id="uploadPhoto">
                                            <i class="fas fa-camera fa-2x"></i>
                                            <p>Update Photo</p>
                                        </label>
                                        <input type="file" style="display:none;" class="mb-3" name="upload_user_image" id="uploadUserImage" accept="image/*" onchange="previewImage(event,'userImage')">
                                    </div>
                                    <canvas style="display:none;" width="200" height="200" id="userImageCanvas"></canvas>

                                    <img class="img-fluid rounded-circle" id="userImage" src="https://www.emmegi.co.uk/wp-content/uploads/2019/01/User-Icon.jpg" alt="">
                                </div>
                                
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="userFirstName">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" id="firstName" required="">
                                </div>

                                <div class="form-group">
                                    <label for="userLastName">Last Name</label>
                                    <input type="text" class="form-control" name ="last_name" placeholder="Enter your second name" id="lastName" required="">
                                </div>

                                <div class="form-group">
                                    <label for="userRole">User Role</label>
                                    <select class="form-control selectpicker" name="role_id" id="selectRole" data-live-search="true"> 
                                        <option selected disabled>Select a role...</option>
                                        <option value="addRole" data-icon='fas fa-plus-circle'>Add Roles</option>
                                        <?php 
                                                foreach($roles as $role){
                                                    echo "<option value='". $role->id . "'>". $role->name. "</option>";
                                                }

                                        ?>
                                        
                                        <!-- <option selected disabled>Select a role...</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="guest">Guest</option> -->
                                    </select>
                                </div>

                                <div class="form-group">
                                        <label for="userBirthdate">Birthdate</label>
                                        <input class="form-control" type="date" name="birthdate" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">           
                            
                                <div class="form-group">
                                    <label for="userUsername">Username </label>
                                    <input type="text" class="form-control" name ="username" placeholder="Enter your username" id="username" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">           

                                <div class="form-group">
                                    <label for="userPassword">Password</label>
                                    <input type="password" class="form-control" name ="password" placeholder="Enter your password" id="password" required="">
                                </div>
                             </div>

                                <div class="col-lg-12">
                                
                                <div class="form-group">
                                        <label for="userAddress">Complete Address</label>
                                        <textarea class="form-control" name="address" id="userAddress" row=5 required=""></textarea>
                                </div>
                           
                           
                            </div>
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-secondary">Cancel</button>
                                <input type="submit" class="btn btn-success" value="Save">
                            </div>
                        </div> 
                    </form>

                </div>
            </div>
        </div> 
        
    </div>

</div>

<div class="modal fade" id="addRoleModal" role="dialog" data-backup="static" aria-labelledby="addRoleTitled" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class= "modal-content text-center">
            <div class="modal-header">
                <h2>Add Modal</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>

        <form method="POST" id="addRoleForm">
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="Add Role">Add Role</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            
            
        
            
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
        </form>
        </div>
    </div>