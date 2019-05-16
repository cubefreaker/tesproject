<?php
    $accrole = $this->db->query("SELECT * FROM users_request WHERE user_id = '".$Member->id."'")->row();
?>
<div class="tab-pane active" id="accountrole">
    <div style="padding:2%;">
        <h3 style="margin-bottom:10px;">Account Role</h3>
    </div>
    <div class="col-md-6">
        <div class="thumbnail">
            <img src="" alt="">
            <div>
                <h4 style="text-align:center;">Seller of ITX</h4>
                <span style="text-align:left;">Lorem ipsum dolor sit amet</span>
            </div>
            <form id="sellerfrm" method="post" action="<?=base_url('member/accountRole')?>">
                <input type="hidden" name="type" value="seller">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            </form>
            <div class="text-center">
                <button id="submitseller" class="btn btn-danger">Request as Seller</button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="thumbnail">
            <img src="" alt="">
            <div>
                <h4 style="text-align:center;">Buyer of ITX</h4>
                <span style="text-align:left;">Lorem ipsum dolor sit amet</span>
            </div>
            <form id="buyerfrm" method="post" action="<?=base_url('member/accountRole')?>">
                <div class="form-group text-center">
                    <?php
                        if(!empty($accrole)){
                            if($accrole->is_api == 'Y'){
                                echo '<label class="checkbox-inline"><input type="checkbox" name="api" value="api" checked>API</label>';
                            }else{
                                echo '<label class="checkbox-inline"><input type="checkbox" name="api" value="api">API</label>';
                            }
                            if($accrole->is_wl == 'Y'){
                                echo '<label class="checkbox-inline"><input type="checkbox" name="wl" value="wl" checked>White Label</label>';
                            }else{
                                echo '<label class="checkbox-inline"><input type="checkbox" name="wl" value="wl">White Label</label>';
                            }
                            if($accrole->is_ta == 'Y'){
                                echo '<label class="checkbox-inline"><input type="checkbox" name="ta" value="ta" checked>Travel Agent</label>';
                            }else{
                                echo '<label class="checkbox-inline"><input type="checkbox" name="ta" value="ta">Travel Agent</label>';
                            }
                        }else{
                            echo '
                            <label class="checkbox-inline"><input type="checkbox" name="api" value="api">API</label>
                            <label class="checkbox-inline"><input type="checkbox" name="wl" value="wl">White Label</label>
                            <label class="checkbox-inline"><input type="checkbox" name="ta" value="ta">Travel Agent</label>
                            ';
                        }
                        
                    ?>
                </div>
                <input type="hidden" name="type" value="buyer">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            </form>
            <div class="text-center">
                <button id="submitbuyer" class="btn btn-danger">Request as Buyer</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
	$('#submitseller').click(function(){
        if(confirm("Are You Sure?")){
            $("#sellerfrm").submit();
        }
	});
});

$(document).ready(function(){
	$('#submitbuyer').click(function(){
        if(confirm("Are You Sure?")){
            $("#buyerfrm").submit();
        }
	});
});
</script>