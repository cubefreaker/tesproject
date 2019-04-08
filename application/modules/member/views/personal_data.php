<div class="tab-pane active" id="personaldata">
            <h3 style="padding:2%;">Personal Data</h3>
            <div class="col-md-8">
                    <div>Username : <?=$Member->username; ?></div>
                    <div>First Name : <?=$Member->first_name; ?></div>
                    <div>Last Name : <?=$Member->last_name; ?></div>
                    <div>Gender : <?=$Member->gender; ?></div>
                    <div>Birth Date : <?=$Member->birth_date; ?></div>
                    <div>Email : <?=$Member->email; ?></div>
                    <div>Phone : <?=$Member->phone; ?></div>
                    <div>Password :
                    <button type="button" class="btn btn-xs" data-toggle="modal" data-target="#changepass">change password</button>
                        <div id="changepass" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <form id="updtpass" method="post" action="<?=base_url('member/changePass')?>">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Change Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        Input current password
                                        <input class="form-control" type="password" name="old" required/>
                                        Input new password
                                        <input type="password" id="pass1" name="new" class="form-control" placeholder="Password must contain capitalize & number" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                        Confirm password
                                        <input class="form-control" type="password" id="pass2" name="new_confirm" required/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default btn-save">Save</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-xs" data-toggle="modal" data-target="#editprofile">Edit Profile</button>
                        <div id="editprofile" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form id="editfrm" method="post" action="<?=base_url('member/editProfile')?>">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Username</h4>
                                        </div>
                                        <div class="modal-body">
                                            Username
                                            <input type="text" name="username" class="form-control" value="<?=$Member->username;?>" required>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            First Name
                                            <input type="text" name="firstname" class="form-control" value="<?=$Member->first_name;?>" required>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            Last Name
                                            <input type="text" name="lastname" class="form-control" value="<?=$Member->last_name;?>" required>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            Gender
                                            <select class="form-control" name="gender" value="<?=$Member->gender;?>">
                                                <option value="male" selected>Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            Birth Date
                                            <input type="date" name="birthdate" class="form-control" value="<?=$Member->birth_date?>" required/>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            Email
                                            <input type="email" name="email" class="form-control" placeholder="Example: john@example.com" value="<?=$Member->email;?>" required/>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            Phone
                                            <input type="tel" name="phone" class="form-control" value="<?=$Member->phone;?>">
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default btn-edit" onclick="saveProfile()">Save</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
            </div>
            <div class="col-md-4 panel panel-default">
                <img src="" alt="">
            </div>
        </div>

<script>
    function saveProfile(){
        confirm("Are You Sure?")
    }
</script>
       