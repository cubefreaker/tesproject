<div class="tab-pane" id="infomitra">
<div style="padding:2%;">
                <h3 style="margin-bottom:10px;">Informasi Mitra</h3>
            </div>
            <form id="editfrm" class="form-horizontal" method="post" action="<?=base_url('member/editMitra')?>">
            <div class="col-md-6" style="padding:2%;">
                    
                    
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Nama Brand / Merk</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="brand" value="" required>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Nama Perusahaan</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="coname" value="" required>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Jenis Usaha</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <select class="form-control" name="type" value="">
                                                    <option value="" selected>1</option>
                                                    <option value="">2</option>
                                </select>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Nama Pemilik Usaha</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-male"></i>
                                </span>
                                <input type="text" class="form-control" name="owner" value="" required>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">No Telepon</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="tel" class="form-control" name="phone" value="" required>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">No HP</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="tel" class="form-control" name="mobile" value="" required>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Alamat Perusahaan</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="address" value="" required>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Kecamatan</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <select class="form-control" name="subdistrict" value="">
                                                    <option value="" selected>1</option>
                                                    <option value="">2</option>
                                </select>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Provinsi</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <select class="form-control" name="province" value="">
                                                    <option value="" selected>1</option>
                                                    <option value="">2</option>
                                </select>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>


                        
            </div>
                        
            <div class="col-md-6 text-center"style="padding:2%;">
                
                <div class="img-thumbnail text-center" style="margin-bottom:35px;">
                    
                        <?php 
                            // $this->load->model('m_get');
                            // $data = [
                            //     'select' => '*',
                            //     'from' => 'users_company',
                            //     'where' => ['id' => $Member->id]
                            // ];
                            // $company = $this->m_get->getDynamic($data);
                            // // echo $company;
                            $query = $this->db->query("SELECT * FROM users_company WHERE id = '".$Member->id."'");
                            $company = $query->row();
                            if ($company->logo == NULL || $company->logo == '') {
                                echo '
                                    <input type="file" id="imgUpload" style="display: none;">
                                    <input type="image" id="imgBrand" height="200" width="200" src="'.base_url().'assets/images/profile/profile.png">';
                            } else {
                                echo '
                                    <input type="file" id="imgUpload" style="display: none;">
                                    <input type="image" id="imgBrand" height="200" width="200" src="'.base_url().'assets/images/profile/'.$company->logo.'">';
                            }
                                                       
                        ?>
                        <!-- <div>
                            <input type='file' id="imgInp" />
                            <img id="blah" src="<?=base_url().'assets/images/profile/'.$company->logo;?>" alt="your image" />
                        </div> -->
                        <!-- <div id="imgmodal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content text-left">
                                    <form method="post" enctype="multipart/form-data" action="<?=base_url('member/uploadBrandlogo')?>">
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
                        </div> -->
                    
                    
                </div>
                <div class="form-group">
                <label class="control-label col-sm-4" style="text-align: left;">Email</label> 
                <div class="input-group col-sm-8">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control" name="email" value="" required>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" style="text-align: left;">Website</label> 
                <div class="input-group col-sm-8">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input type="text" class="form-control" name="website" value="" required>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" style="text-align: left;">Kabupaten / Kota</label> 
                <div class="input-group col-sm-8">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                    <select class="form-control" name="city" value="">
                        <option value="" selected>1</option>
                        <option value="">2</option>
                    </select>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" style="text-align: left;">Kode Pos</label> 
                <div class="input-group col-sm-8">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input type="text" class="form-control" name="postal" value="" required>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                </div>
            </div>
            </div>
            
            <button id="savechanges" type="submit" class="btn btn-danger btn-edit pull-right">Save Changes</button>
        </form>
</div>

<script>
$(document).ready(function(){
	$('#imgbrand').click(function(){
  		$('#imgmodal').modal('show')
	});
});

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
	$('#savechanges').click(function(){
        if(confirm("Are You Sure?")){
            $("#editfrm").submit();
        }
	});
});
// function saveProfile(){
    // if(confirm("Are You Sure?")){
    //     document.getElementById("editfrm").submit();
    // }   
// }

</script>