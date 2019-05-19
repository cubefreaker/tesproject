<?php
    $rekening = $this->db->query("SELECT * FROM users_bank WHERE user_id = '".$Member->id."'")->row();
?>
<div class="tab-pane" id="rekening" style="margin-top: 60px;">
    <form id="rekfrm" class="form-horizontal" style="padding-left:2%;" method="post" action="<?=base_url('member/editRekening')?>">
        <div class="panel panel-primary shad">
            <div class="panel-heading">
                <div class="panel-title">
                    <center>Rekening Bank</center>
                </div>
            </div>
        
            <div class="panel-body"> 
                <div class="col-md-10">
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Nama Bank</label> 
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon">
                                <i class="fa fa-building"></i>
                            </span>
                            <input type="text" class="form-control" name="bankname" value="<?=$rekening ? $rekening->bank_name:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Nomor Rekening</label> 
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon">
                                <i class="fa fa-credit-card"></i>
                            </span>
                            <input type="text" class="form-control" name="bankaccount" onkeypress="return isNumberKey(event)" value="<?=$rekening ? $rekening->bank_account:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Atas Nama</label> 
                        <div class="input-group col-sm-4">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control" name="bankuser" value="<?=$rekening ? $rekening->bank_user:'';?>" required>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
                    </div>
                    <div class="col-md-6" style="padding:0px;">
                        <button id="saverek" class="btn btn-info pull-right" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>