<?php
    $accrole = $this->db->query("SELECT * FROM users_request WHERE user_id = '".$Member->id."'")->row();
    $scdok = $this->db->query("SELECT * FROM users_document WHERE user_id = '".$Member->id."'")->row();
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
                <button id="submitseller" class="btn btn-danger" data-toggle="modal" data-target="#sellerModal">Request as Seller</button>
            </div>
            <div id="sellerModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" >Request As Seller</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart('member/editDokumen', array('id' => 'dokumenfrm', 'class' => 'form-horizontal')) ?>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>File</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Scan KTP</td>
                                                <td>
                                                    <label id="ktpid"><?= $scdok ? ($scdok->scan_ktp ? $scdok->scan_ktp : 'No File') : 'No File'?></label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="ktp" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_ktp){
                                                                    echo '
                                                                        <button id="ktp" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="ktp" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scktp" name="scktp" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scan Selfie KTP</td>
                                                <td>
                                                    <label id="selfieid"><?= $scdok ? ($scdok->scan_selfie ? $scdok->scan_selfie : 'No File') : 'No File'?></label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="selfie" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_selfie){
                                                                    echo '
                                                                        <button id="selfie" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="selfie" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scselfie" name="scselfie" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scan NPWP</td>
                                                <td>
                                                    <label id="npwpid"><?= $scdok ? ($scdok->scan_npwp ? $scdok->scan_npwp : 'No File') : 'No File' ?></label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="npwp" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_npwp){
                                                                    echo '
                                                                        <button id="npwp" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="npwp" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scnpwp" name="scnpwp" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scan SIUP/TDP</td>
                                                <td>
                                                    <label id="siupid"><?= $scdok ? ($scdok->scan_siup ? $scdok->scan_siup : 'No File') : 'No File' ?></label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="siup" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_siup){
                                                                    echo '
                                                                        <button id="siup" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="siup" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scsiup" name="scsiup" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scan Akta Perusahaan</td>
                                                <td>
                                                    <label id="aktaid"><?= $scdok ? ($scdok->scan_akta ? $scdok->scan_akta : 'No File') : 'No File' ?></label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="akta" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_akta){
                                                                    echo '
                                                                        <button id="akta" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="akta" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scakta" name="scakta" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scan Surat Kuasa (bila diwakilkan)</td>
                                                <td>
                                                    <label id="skid"><?= $scdok ? ($scdok->scan_sk ? $scdok->scan_sk : 'No File') : 'No File' ?></label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="sk" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_sk){
                                                                    echo '
                                                                        <button id="sk" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="sk" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scsk" name="scsk" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
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
            <div class="text-center">
                <button id="submitbuyer" class="btn btn-danger" data-toggle="modal" data-target="#buyerModal">Request as Buyer</button>
            </div>
            <div id="buyerModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" >Request as buyer</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart('member/editDokumen', array('id' => 'dokumenfrm', 'class' => 'form-horizontal')) ?>
                            <!-- <form id="dokumenfrm" class="form-horizontal" enctype="multipart/form-data" method="post" action="<?=base_url('member/editDokumen')?>"> -->
                                <div class="form-group" style="padding-left:2%;">
                                    <label class="control-label col-sm-2" style="text-align: left;">Jenis Usaha</label> 
                                    <div class="input-group">
                                        <label class="checkbox-inline"><input type="checkbox" name="api" ng-model="api" value="api">API</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="wl" ng-model="wl" value="wl">White Label</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="ta" ng-model="ta" value="ta">Travel Agent</label>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>File</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Scan KTP</td>
                                                <td>
                                                    <label id="ktpid"><?= $scdok ? ($scdok->scan_ktp ? $scdok->scan_ktp : 'No File') : 'No File'?></label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="ktp" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_ktp){
                                                                    echo '
                                                                        <button id="ktp" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="ktp" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scktp" name="scktp" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scan Selfie KTP</td>
                                                <td>
                                                    <label id="selfieid"><?= $scdok ? ($scdok->scan_selfie ? $scdok->scan_selfie : 'No File') : 'No File'?></label>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="selfie" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_selfie){
                                                                    echo '
                                                                        <button id="selfie" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="selfie" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scselfie" name="scselfie" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr ng-if="wl">
                                                <td>PKS Whitelabel</td>
                                                <td>

                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="npwp" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_npwp){
                                                                    echo '
                                                                        <button id="npwp" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="npwp" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scnpwp" name="scnpwp" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr ng-if="ta">
                                                <td>PKS Travel Agent</td>
                                                <td>

                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="npwp" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_npwp){
                                                                    echo '
                                                                        <button id="npwp" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="npwp" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scnpwp" name="scnpwp" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr ng-if="api">
                                                <td>NDA</td>
                                                <td>
                                                
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="siup" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_siup){
                                                                    echo '
                                                                        <button id="siup" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="siup" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scsiup" name="scsiup" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr ng-if="api">
                                                <td>IP Whitelist</td>
                                                <td>
                                                
                                                </td>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <a id="akta" class="tooltipx pointer">
                                                            <?php
                                                                if($scdok && $scdok->scan_akta){
                                                                    echo '
                                                                        <button id="akta" class="btn btn-success">Update</button>
                                                                        ';
                                                                }else{
                                                                    echo '
                                                                        <button id="akta" class="btn btn-success">Upload</button>
                                                                        ';
                                                                }
                                                            ?>
                                                        </a>
                                                        <input type="file" id="scakta" name="scakta" style="display:none;" >
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
// $(document).ready(function(){
// 	$('#submitseller').click(function(){
//         if(confirm("Are You Sure?")){
//             $("#sellerfrm").submit();
//         }
// 	});
// });

// $(document).ready(function(){
// 	$('#submitbuyer').click(function(){
//         if(confirm("Are You Sure?")){
//             $("#buyerfrm").submit();
//         }
// 	});
// });
</script>