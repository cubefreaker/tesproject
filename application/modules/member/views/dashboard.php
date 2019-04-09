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
        <?php $this->load->view('member/personal_data'); ?>
        <?php $this->load->view('member/informasi_perusahaan'); ?>
        <?php $this->load->view('member/dokumen'); ?>
        <?php $this->load->view('member/alamat'); ?>
        <div class="tab-pane" id="rekening">
            <h3 style="padding:2%;">Rekening Bank</h3>
            <div>Nama Bank : </div>
            <div>Nama Pemilik : </div>
            <div>Nomor Rekening : </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/loader/preloader') ?>
<!-- <?php $this->load->view('template/landingpage/footer', $footerPage) ?> -->

<script type="text/javascript">
    var password = document.getElementById("pass1") , confirm_password = document.getElementById("pass2");

    function validatePassword(){
        if(pass1.value != pass2.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        }else{
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

</body>

</html>