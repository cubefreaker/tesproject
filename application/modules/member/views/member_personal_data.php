<div class="tab-pane active" id="personaldata">
    <div style="padding:2%;">
        <h3 style="margin-bottom:10px;"></h3>
    </div>
    <div class="panel panel-primary shad">
        <div class="panel-heading">
            <div class="panel-title">
                <center>Personal Data</center>
            </div>
        </div>
        <div class="panel-body" >  
            <div class="col-md-8">
                <form id="editfrm" class="form-horizontal" method="post" action="<?=base_url('member/editProfile')?>">
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Username</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" readonly class="form-control" name="username" value="<?=$Member->username;?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">First Name</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control" name="firstname" value="<?=$Member->first_name;?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Last Name</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control" name="lastname" value="<?=$Member->last_name;?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Gender</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="fa fa-mars"></i>
                            </span>
                            <select class="form-control" name="gender">
                            <?php
                                if($Member->gender){
                                    echo '<option value="'.$Member->gender.'" disabled selected hidden>'.$Member->gender.'</option>';
                                }else{
                                    echo '<option value="" disabled selected hidden>--Select--</option>';
                                }
                            ?>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Birth Date</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" class="form-control datepicker" name="birthdate" value="<?=$Member->birth_date;?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Email</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" name="email" value="<?=$Member->email;?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Phone</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <input type="number" class="form-control" onkeypress="return isNumberKey(event)" name="phone" value="<?=$Member->phone;?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">NIK</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="number" onkeypress="return isNumberKey(event)" class="form-control" name="nik" value="<?=$Member->nik;?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Password</label> 
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="********" disabled>
                            </div>
                            <div class="col-sm-3">
                                <a class="btn btn-default btn-md" href="<?=base_url('member/changePassView')?>">change password</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <button id="savechanges" type="submit" class="btn btn-info">Save Changes</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-center">
                <div class="img-thumbnail text-center">
                    <?php 
                        if ($Member->img_thum == NULL || $Member->img_thum == '') {
                            echo '<img height="200" width="200" src="'.base_url().'assets/images/profile/profile.png">';
                        } else {
                            echo '<img height="200" width="200" src="'.base_url().'assets/images/profile/'.$Member->img_thum.'">';
                        }
                    ?>
                </div>

                <div style="margin-top:10px;">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#changepp">Change Photo</button>
                    <div id="changepp" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content text-left">
                                <form method="post" enctype="multipart/form-data" action="<?=base_url('member/uploadImage')?>">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Upload Photo</h4>
                                    </div>
                                    <div class="modal-body">                                    
                                        <input type="file" name="imageURL"> 
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default btn-edit">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<script>
$(document).ready(function(){
    $('#savechanges').click(function(){
        if(confirm("Are You Sure?")){
            $("#editfrm").submit();
        }
    });
});
</script>
       