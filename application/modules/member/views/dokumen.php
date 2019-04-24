<?php
    $scdok = $this->db->query("SELECT * FROM users_document WHERE user_id = '".$Member->id."'")->row();
?>

<div class="tab-pane" id="dokumen">
    <h3 style="padding:2%;">Dokumen Upload</h3>
    <?php echo form_open_multipart('member/editDokumen', array('id' => 'dokumenfrm', 'class' => 'form-horizontal')) ?>
    <!-- <form id="dokumenfrm" class="form-horizontal" enctype="multipart/form-data" method="post" action="<?=base_url('member/editDokumen')?>"> -->
        <div class="form-group" style="padding-left:2%;">
            <label class="control-label col-sm-2" style="text-align: left;">Jenis Usaha</label> 
                <div class="input-group col-sm-3">
                    <span class="input-group-addon">
                        <i class="fa fa-briefcase"></i>
                    </span>
                    <select class="form-control" name="gender" value="<?=$Member->gender;?>">
                        <option value="badanusaha" selected>Badan Usaha</option>
                        <option value=""></option>
                    </select>
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
                            <label id="ktpid"><?= $scdok->scan_ktp ? $scdok->scan_ktp : 'No File' ?></label>
                        </td>
                        <td></td>
                        <td>
                            <div class="form-group">
                                <a id="ktp" class="tooltipx pointer">
                                    <?php
                                        if($scdok->scan_ktp){
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
                        <td>Scan NPWP</td>
                        <td>
                            <label id="npwpid"><?= $scdok->scan_npwp ? $scdok->scan_npwp : 'No File' ?></label>
                        </td>
                        <td></td>
                        <td>
                            <div class="form-group">
                                <a id="npwp" class="tooltipx pointer">
                                    <?php
                                        if($scdok->scan_npwp){
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
                            <label id="siupid"><?= $scdok->scan_siup ? $scdok->scan_siup : 'No File' ?></label>
                        </td>
                        <td></td>
                        <td>
                            <div class="form-group">
                                <a id="siup" class="tooltipx pointer">
                                    <?php
                                        if($scdok->scan_siup){
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
                            <label id="aktaid"><?= $scdok->scan_akta ? $scdok->scan_akta : 'No File' ?></label>
                        </td>
                        <td></td>
                        <td>
                            <div class="form-group">
                                <a id="akta" class="tooltipx pointer">
                                    <?php
                                        if($scdok->scan_akta){
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
                            <label id="skid"><?= $scdok->scan_sk ? $scdok->scan_sk : 'No File' ?></label>
                        </td>
                        <td></td>
                        <td>
                            <div class="form-group">
                                <a id="sk" class="tooltipx pointer">
                                    <?php
                                        if($scdok->scan_sk){
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
            <button id="savedokumen" class="btn btn-danger pull-right" type="submit">Save</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function(){
    $('#savedokumen').click(function(){
        if(confirm('Are you sure?')){
            $('#dokumenfrm').submit();
        }
    });

    $('#ktp').click(function(){
        $('#scktp').click();
    });

    $('#scktp').change(function(){
        var file = document.getElementById('scktp').files[0];
        if(file){
            $('#ktpid').text(file.name);
        }
    });

    $('#npwp').click(function(){
        $('#scnpwp').click();
    });

    $('#scnpwp').change(function(){
        var file = document.getElementById('scnpwp').files[0];
        if(file){
            $('#npwpid').text(file.name);
        }
    });

    $('#siup').click(function(){
        $('#scsiup').click();
    });

    $('#scsiup').change(function(){
        var file = document.getElementById('scsiup').files[0];
        if(file){
            $('#siupid').text(file.name);
        }
    });

    $('#akta').click(function(){
        $('#scakta').click();
    });

    $('#scakta').change(function(){
        var file = document.getElementById('scakta').files[0];
        if(file){
            $('#aktaid').text(file.name);
        }
    });

    $('#sk').click(function(){
        $('#scsk').click();
    });

    $('#scsk').change(function(){
        var file = document.getElementById('scsk').files[0];
        if(file){
            $('#skid').text(file.name);
        }
    });
});

</script>