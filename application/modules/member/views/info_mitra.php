<?php
    $mitra = $this->db->query("SELECT * FROM users_mitra WHERE user_id = '".$Member->id."'")->row();
    // echo $this->db->last_query();die();
    // print_r($mitra);die();
?>
<div class="tab-pane" id="infomitra" style="margin-top: 60px;">
    <form id="mitrafrm" class="form-horizontal" enctype="multipart/form-data" method="post" action="<?=base_url('member/editMitra')?>">
        <div class="panel panel-primary shad">
            <div class="panel-heading">
                <div class="panel-title">
                    <center>Informasi Mitra</center>
                </div>
            </div>
        
            <div class="panel-body" > 
                <div class="col-md-6" style="padding:2%;">
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Nama Brand / Merk</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-qrcode"></i>
                            </span>
                            <input type="text" class="form-control" id="brand" name="brand" value="<?=$mitra ? $mitra->brand:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Nama Perusahaan</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-building"></i>
                            </span>
                            <input type="text" class="form-control" name="coname" value="<?=$mitra ? $mitra->mitra_name:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Nama Pemilik Usaha</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control" name="owner" value="<?=$mitra ? $mitra->owner:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">No Telepon</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <input type="tel" class="form-control" onkeypress="return isNumberKey(event)" name="phone" value="<?=$mitra ? $mitra->phone_no:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">No HP</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-mobile"></i>
                            </span>
                            <input type="tel" class="form-control" onkeypress="return isNumberKey(event)" name="mobile" value="<?=$mitra ? $mitra->mobile_no:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Alamat Perusahaan</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>
                            <input type="text" class="form-control" name="address" value="<?=$mitra ? $mitra->address:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Provinsi</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>
                            <select class="form-control" name="province">
                                <?php
                                    foreach($Provinces as $p){
                                        echo '<option value="'.$p->name.'" >'.$p->name.'</option>';
                                    }
                                ?>
                            </select>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Kabupaten / Kota</label> 
                        <div ng-app="myApp" ngController="myCtrl" class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>
                            <select class="form-control" name="city" value="">
                            <?php
                                    if($mitra->city != NULL && $mitra->city != ''){
                                        echo '<option value="'.$mitra->city.'" disabled selected hidden>'.$mitra->city.'</option>';
                                    }else{
                                        echo '<option value="" disabled selected hidden>-- Select --</option>';
                                    }
                                    foreach($Cities as $c){
                                        echo '<option value="'.$c->name.'" >'.$c->name.'</option>';
                                    }
                                    ?>
                            </select>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Kecamatan</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>
                            <select class="form-control" name="subdistrict" value="">
                            <?php
                            if($mitra->sub_district != NULL && $mitra->sub_district != ''){
                                echo '<option value="'.$mitra->sub_district.'" disabled selected hidden>'.$mitra->sub_district.'</option>';
                            }else{
                                echo '<option value="" disabled selected hidden>-- Select --</option>';
                            }
                            foreach($Districts as $d){
                                echo '<option value="'.$d->name.'" >'.$d->name.'</option>';
                            }
                            ?>
                            </select>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                </div>
            
                <div class="col-md-6 text-center"style="padding:2%;">
                    <div class="img-thumbnail text-center" style="margin-bottom:35px;">
                        <?php 
                            $query = $this->db->query("SELECT * FROM users_mitra WHERE user_id = '".$Member->id."'");
                            $company = $query->row();
                            
                            $csrf_name = $this->security->get_csrf_token_name();
                            $csrf_hash = $this->security->get_csrf_hash();

                            if($company != NULL){
                                if ($company->logo == NULL || $company->logo == '') {
                                    echo '
                                        <input type="file" id="imgUpload" name="logoURL" style="display: none;">
                                        <input type="hidden" name="'.$csrf_name.'" value="'.$csrf_hash.'">
                                        <input type="image" id="imgBrand" height="200" width="200" src="'.base_url().'assets/images/profile/profile.png">';
                                } else {
                                    echo '
                                        <input type="file" id="imgUpload" name="logoURL" style="display: none;">
                                        <input type="hidden" name="'.$csrf_name.'" value="'.$csrf_hash.'">
                                        <input type="image" id="imgBrand" height="200" width="200" src="'.base_url().'assets/images/logo/'.$mitra->logo.'">';
                                }
                            }else{
                                echo '
                                    <input type="file" id="imgUpload" name="logoURL" style="display: none;>
                                    <input type="hidden" name="'.$csrf_name.'" value="'.$csrf_hash.'">
                                    <input type="image" id="imgBrand" height="200" width="200" src="'.base_url().'assets/images/profile/profile.png">';
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Email</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" name="email" value="<?=$mitra ? $mitra->email:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Website</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-globe"></i>
                            </span>
                            <input type="text" class="form-control" name="website" value="<?=$mitra ? $mitra->website:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Kode Pos</label> 
                        <div class="input-group col-sm-8">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope-o"></i>
                            </span>
                            <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="postal" value="<?=$mitra ? $mitra->postal_code:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                </div>

                <button id="savemitra" type="submit" class="btn btn-info pull-right">Save Changes</button>
            </div>
        </div>
    </form>
</div>
<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imgBrand').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
}
    
$("#imgUpload").change(function(){
    readURL(this);
});

$("#imgBrand").click(function() {
    $("#imgUpload").click();
});

$(document).ready(function(){
	$('#savemitra').click(function(){
        if(confirm("Are You Sure?")){
            $("#mitrafrm").submit();
        }
	});
});
// function saveProfile(){
    // if(confirm("Are You Sure?")){
    //     document.getElementById("editfrm").submit();
    // }   
// }

$(document).ready(function(){
    $('#brand').val("Test");
});

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}


</script>


<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
  $http.get('http://localhost/webitx/member/tes')
  .then(function(response) {
    $scope.country = response.data;
  });console.log('tes');
});
</script> 