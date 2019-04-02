<?php $this->load->view('template/landingpage/head') ?>
<link href="<?=base_url()?>assets/css/member-dashboard.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/css/main2.css')?>" rel="stylesheet" type="text/css">
<body>  
<?php $this->load->view('template/landingpage/nav') ?>

<div class="container">
    <ul class="nav nav-tabs">
        <li class="pull-right">
            <a href="#rekening" data-toggle="tab">Rekening Bank</a>
        </li>
        <li class="pull-right">
            <a href="#alamat" data-toggle="tab">Alamat</a>
        </li>
        <li class="pull-right">
            <a href="#dokumen" data-toggle="tab">Dokumen</a>
        </li>
        <li class="pull-right">
            <a href="#infoperus" data-toggle="tab">Info Perusahaan</a>
        </li>
        <li class="active pull-right">
            <a href="#personaldata" data-toggle="tab">Personal Data</a>
        </li>
    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="personaldata">
            <h3 style="padding:2%;">Personal Data</h3>
            <div class="col-md-8">
                <?php 
                    $user = $this->ion_auth->user()->row();
                ?>
                    <div>Username : <?php echo $user->username; ?></div>
                    <div>First Name : <?php echo $user->first_name; ?></div>
                    <div>Last Name : <?php echo $user->last_name; ?></div>
                    <div>Gender : <?php echo $user->gender; ?></div>
                    <div>Birth Date : <?php echo $user->birth_date; ?></div>
                    <div>Email : <?php echo $user->email; ?></div>
                    <div>Phone : <?php echo $user->phone; ?> <button type="button" data-toggle="modal" data-target="#">edit</button>
                    
                    </div>
                    <div>Password :</div>
            </div>
            <div class="col-md-4 panel panel-default">
                <img src="" alt="">
            </div>
        </div>
        <div class="tab-pane" id="infoperus">
            <h3>Isi info perusahaan</h3>
        </div>
        <div class="tab-pane" id="dokumen">
            <h3>Isi dokumen</h3>
        </div>
        <div class="tab-pane" id="alamat">
            <h3>Isi alamat</h3>
        </div>
        <div class="tab-pane" id="rekening">
            <h3>Isi rekening bank</h3>
        </div>
    </div>
</div>

<?php $this->load->view('template/loader/preloader') ?>
<?php $this->load->view('template/landingpage/footer', $footerPage) ?>


</body>

</html>