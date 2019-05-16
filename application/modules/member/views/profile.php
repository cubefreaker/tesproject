<?php $this->load->view('template/landingpage/head') ?>
<link href="<?=base_url()?>assets/css/member-dashboard.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/member-info.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/css/main2.css')?>" rel="stylesheet" type="text/css">
<body>  
<?php $this->load->view('template/landingpage/nav') ?>

<div class="container">
    <ul class="nav nav-tabs">
        <li class="pull-right">
            <a href="#rekening" data-toggle="tab">Rekening Bank</a>
        </li>
        <li class="pull-right">
            <a href="#dokumen" data-toggle="tab">Dokumen</a>
        </li>
        <li class="pull-right">
            <a href="#kontak" data-toggle="tab">Kontak Perwakilan</a>
        </li>
        <li class="pull-right">
            <a href="#infomitra" data-toggle="tab">Info Mitra</a>
        </li>
        <li class="pull-right">
            <a href="#personaldata" data-toggle="tab">Personal Data</a>
        </li>
        <li class="active pull-right">
            <a href="#accountrole" data-toggle="tab">Account Role</a>
        </li>
    </ul>

    <div class="tab-content clearfix">
        <?php $this->load->view('member/account_role'); ?>
        <?php $this->load->view('member/personal_data'); ?>
        <?php $this->load->view('member/info_mitra'); ?>
        <?php $this->load->view('member/kontak'); ?>
        <?php $this->load->view('member/dokumen'); ?>
        <?php $this->load->view('member/rekening'); ?>
    </div>
</div>

<?php $this->load->view('template/loader/preloader') ?>
<!-- <?php $this->load->view('template/landingpage/footer', $footerPage) ?> -->


</body>

</html>