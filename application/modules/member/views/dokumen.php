<?php
    $scdok = $this->db->query("SELECT * FROM users_document WHERE user_id = '".$Member->id."'")->row();
?>

<div class="tab-pane" id="dokumen" style="margin-top: 60px;">
    <?php echo form_open_multipart('member/editDokumen', array('id' => 'dokumenfrm', 'class' => 'form-horizontal')) ?>
        <div class="panel panel-primary shad">
            <div class="panel-heading">
                <div class="panel-title">
                    <center>Dokumen Upload</center>
                </div>
            </div>
            
            <div class="panel-body" > 
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
                    <button id="savedokumen" class="btn btn-info pull-right" type="submit">Save</button>
                </div>
            </div>
        </div>
    <?php echo form_close(); ?>
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
    
    $('#selfie').click(function(){
        $('#scselfie').click();
    });

    $('#scselfie').change(function(){
        var file = document.getElementById('scselfie').files[0];
        if(file){
            $('#selfieid').text(file.name);
        }
    });
});

</script>