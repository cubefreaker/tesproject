<div class="">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#personaldata" data-toggle="tab">Personal Data</a>
        </li>
        <li class="">
            <a href="#dokumen" data-toggle="tab">Dokumen</a>
        </li>
        <li>
            <a href="#infomitra" data-toggle="tab">Info Mitra</a>
        </li>
        <li class="">
            <a href="#kontak" data-toggle="tab">Kontak Perwakilan</a>
        </li>
        <li class="">
            <a href="#rekening" data-toggle="tab">Rekening Bank</a>
        </li>
    </ul>

    <div class="tab-content clearfix">

        <div class="tab-pane active" id="personaldata">
            <div style="padding:2%;">
                <h3 style="margin-bottom:10px;">Personal Data</h3>
            </div>
            <div class="col-md-8" >
                    
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" style="text-align: left;">Username</label> 
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="username" value="<?=$Member->username;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" style="text-align: left;">First Name</label> 
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="firstname" value="<?=$Member->first_name;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" style="text-align: left;">Last Name</label> 
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="lastname" value="<?=$Member->last_name;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" style="text-align: left;">Gender</label> 
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon">
                                    <i class="fa fa-mars"></i>
                                </span>
                                <input class="form-control" name="gender" value="<?=$Member->gender;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" style="text-align: left;">Birth Date</label> 
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="date" class="form-control" name="birthdate" value="<?=$Member->birth_date;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" style="text-align: left;">Email</label> 
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" name="email" value="<?=$Member->email;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" style="text-align: left;">Phone</label> 
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input type="tel" class="form-control" name="phone" value="<?=$Member->phone;?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" style="text-align: left;">NIK</label> 
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="number" class="form-control" name="nik" value="<?=$Member->nik;?>" disabled>
                            </div>
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
            </div>
        </div>

        <?php
            $scdok = $this->db->query("SELECT * FROM users_document WHERE user_id = '".$Member->id."'")->row();
        ?>

        <div class="tab-pane" id="dokumen">
            <h3 style="padding:2%;">Dokumen Upload</h3>
            <form class="form-horizontal">
                
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
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Scan Selfie KTP</td>
                                <td>
                                    <label id="selfieid"><?= $scdok ? ($scdok->scan_selfie ? $scdok->scan_selfie : 'No File') : 'No File'?></label>
                                </td>
                                <td></td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Scan NPWP</td>
                                <td>
                                    <label id="npwpid"><?= $scdok ? ($scdok->scan_npwp ? $scdok->scan_npwp : 'No File') : 'No File' ?></label>
                                </td>
                                <td></td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Scan SIUP/TDP</td>
                                <td>
                                    <label id="siupid"><?= $scdok ? ($scdok->scan_siup ? $scdok->scan_siup : 'No File') : 'No File' ?></label>
                                </td>
                                <td></td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Scan Akta Perusahaan</td>
                                <td>
                                    <label id="aktaid"><?= $scdok ? ($scdok->scan_akta ? $scdok->scan_akta : 'No File') : 'No File' ?></label>
                                </td>
                                <td></td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Scan Surat Kuasa (bila diwakilkan)</td>
                                <td>
                                    <label id="skid"><?= $scdok ? ($scdok->scan_sk ? $scdok->scan_sk : 'No File') : 'No File' ?></label>
                                </td>
                                <td></td>
                                <td>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <?php
            $mitra = $this->db->query("SELECT * FROM users_company WHERE id = '".$Member->id."'")->row();
        ?>
        <div class="tab-pane" id="infomitra">
            <div style="padding:2%;">
                <h3 style="margin-bottom:10px;">Informasi Mitra</h3>
            </div>
            <form class="form-horizontal">
            <div class="col-md-6" style="padding:2%;">
                    
                    
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Nama Brand / Merk</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-qrcode"></i>
                                </span>
                                <input type="text" class="form-control" id="brand" name="brand" value="{{data.Brand}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Nama Perusahaan</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </span>
                                <input type="text" class="form-control" name="coname" value="{{data.Name}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Jenis Usaha</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-briefcase"></i>
                                </span>
                                <input class="form-control" value="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Nama Pemilik Usaha</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="text" class="form-control" name="owner" value="{{data.Owner}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">No Telepon</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input type="tel" class="form-control" name="phone" value="<?=$mitra ? $mitra->phone_no:'';?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">No HP</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-mobile"></i>
                                </span>
                                <input type="tel" class="form-control" name="mobile" value="<?=$mitra ? $mitra->mobile_no:'';?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Alamat Perusahaan</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-home"></i>
                                </span>
                                <input type="text" class="form-control" name="address" value="<?=$mitra ? $mitra->address:'';?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Kecamatan</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-home"></i>
                                </span>
                                <select class="form-control" name="subdistrict" value="" disabled>
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Provinsi</label> 
                            <div class="input-group col-sm-8">
                                <span class="input-group-addon">
                                    <i class="fa fa-home"></i>
                                </span>
                                <select class="form-control" name="province" value="" disabled>
                                <?php
                                if($mitra->province != NULL && $mitra->province != ''){
                                    echo '<option value="'.$mitra->province.'" disabled selected hidden>'.$mitra->province.'</option>';
                                }else{
                                    echo '<option value="" disabled selected hidden>-- Select --</option>';
                                }
                                foreach($Provinces as $p){
                                    echo '<option value="'.$p->name.'" >'.$p->name.'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>


                        
            </div>
                        
            <div class="col-md-6 text-center"style="padding:2%;">
                <!-- <div class="form-group"> -->
                <div class="img-thumbnail text-center" style="margin-bottom:35px;">
                    
                        <?php 
                            $query = $this->db->query("SELECT * FROM users_company WHERE id = '".$Member->id."'");
                            $company = $query->row();

                            if($company != NULL){
                                if ($company->logo == NULL || $company->logo == '') {
                                    echo '
                                        <img height="200" width="200" src="'.base_url().'assets/images/profile/profile.png">';
                                } else {
                                    echo '
                                        <img height="200" width="200" src="'.base_url().'assets/images/logo/'.$mitra->logo.'">';
                                }
                            }else{
                                echo '
                                        <img height="200" width="200" src="'.base_url().'assets/images/profile/profile.png">';
                            }
                                                       
                        ?>
                </div>
                <!-- </div> -->
                <div class="form-group">
                    <label class="control-label col-sm-4" style="text-align: left;">Email</label> 
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control" name="email" value="<?=$mitra ? $mitra->email:'';?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" style="text-align: left;">Website</label> 
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon">
                            <i class="fa fa-globe"></i>
                        </span>
                        <input type="text" class="form-control" name="website" value="<?=$mitra ? $mitra->website:'';?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" style="text-align: left;">Kabupaten / Kota</label> 
                    <div ng-app="myApp" ngController="myCtrl" class="input-group col-sm-8">
                        <span class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </span>
                        <select class="form-control" name="city" value="" disabled>
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
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" style="text-align: left;">Kode Pos</label> 
                    <div class="input-group col-sm-8">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                        <input type="text" class="form-control" name="postal" value="<?=$mitra ? $mitra->postal_code:'';?>" disabled>
                    </div>
                </div>
                </div>
            </form>
        </div>

        <?php
            $contact = $this->db->query("SELECT * FROM company_contact WHERE user_id = '".$Member->id."'")->row();
        ?>
        <div class="tab-pane" id="kontak">
            <div style="padding:2%;">
                <h3 style="margin-bottom:10px;">Kontak Perwakilan Perusahaan</h3>
            </div>
            <form class="form-horizontal">
                <div class="col-md-12">    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kontak Umum</th>
                                <th>Kontak Operasional</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-right:5%;">
                                        <label class="control-label col-sm-2" style="text-align: left;">Nama</label> 
                                        <div class="input-group col-sm-10">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" class="form-control" name="name" value="<?=$contact ? $contact->name:'';?>" disabled>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" style="text-align: left;">Nama</label> 
                                        <div class="input-group col-sm-10">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input type="text" class="form-control" name="nameops" value="<?=$contact ? $contact->name_ops:'';?>" disabled>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-right:5%;">
                                        <label class="control-label col-sm-2" style="text-align: left;">Email</label> 
                                        <div class="input-group col-sm-10">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control" name="email" value="<?=$contact ? $contact->email:'';?>" disabled>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" style="text-align: left;">Email</label> 
                                        <div class="input-group col-sm-10">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control" name="emailops" value="<?=$contact ? $contact->email_ops:'';?>" disabled>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-right:5%;">
                                        <label class="control-label col-sm-2" style="text-align: left;">No. Tlp</label> 
                                        <div class="input-group col-sm-10">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input type="tel" class="form-control" name="phone" value="<?=$contact ? $contact->phone:'';?>" disabled>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" style="text-align: left;">No. Tlp</label> 
                                        <div class="input-group col-sm-10">
                                            <span class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <input type="tel" class="form-control" name="phoneops" value="<?=$contact ? $contact->phone_ops:'';?>" disabled>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group" style="margin-right:5%;">
                                        <label class="control-label col-sm-2" style="text-align: left;">No. HP</label> 
                                        <div class="input-group col-sm-10">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile"></i>
                                            </span>
                                            <input type="tel" class="form-control" name="mobile" value="<?=$contact ? $contact->mobile:'';?>" disabled>
                                            
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" style="text-align: left;">No. HP</label> 
                                        <div class="input-group col-sm-10">
                                            <span class="input-group-addon">
                                                <i class="fa fa-mobile"></i>
                                            </span>
                                            <input type="tel" class="form-control" name="mobileops" value="<?=$contact ? $contact->mobile_ops:'';?>" disabled>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            
        </div>

        <?php
            $rekening = $this->db->query("SELECT * FROM users_bank WHERE user_id = '".$Member->id."'")->row();
        ?>
        <div class="tab-pane" id="rekening">
            <div style="padding:2%;">
                <h3 style="margin-bottom:10px;">Kontak Perwakilan Perusahaan</h3>
            </div>
            <form id="rekfrm" class="form-horizontal" style="padding-left:2%;" method="post" action="<?=base_url('member/editRekening')?>">
                <div class="form-group">
                    <label class="control-label col-sm-2" style="text-align: left;">Nama Bank</label> 
                    <div class="input-group col-sm-4">
                        <span class="input-group-addon">
                            <i class="fa fa-building"></i>
                        </span>
                        <input type="text" class="form-control" name="bankname" value="<?=$rekening ? $rekening->bank_name:'';?>" disabled>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" style="text-align: left;">Nomor Rekening</label> 
                    <div class="input-group col-sm-4">
                        <span class="input-group-addon">
                            <i class="fa fa-credit-card"></i>
                        </span>
                        <input type="text" class="form-control" name="bankaccount" value="<?=$rekening ? $rekening->bank_account:'';?>" disabled>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" style="text-align: left;">Atas Nama</label> 
                    <div class="input-group col-sm-4">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" class="form-control" name="bankuser" value="<?=$rekening ? $rekening->bank_user:'';?>" disabled>
                        
                    </div>
                </div>
                <div class="col-md-6" style="padding:0px;">
                    <button id="saverek" class="btn btn-danger pull-right" type="submit">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>

