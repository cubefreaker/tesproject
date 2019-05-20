<?php $this->load->view('template/landingpage/head') ?>
<link href="<?=base_url()?>assets/css/member-dashboard.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/member-info.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/css/main2.css')?>" rel="stylesheet" type="text/css">
<body>  
<?php $this->load->view('template/landingpage/nav') ?>

<div class="container" style="margin-top: 40px;">
    <ul class="nav nav-tabs">
        <li class="<?php if ($tab == 'rekening') echo 'active'; ?> pull-right">
            <a class="<?php if ($tab == 'rekening') echo 'active'; ?>" href="<?php echo site_url('/member/personalData/rekening'); ?>">&nbsp; Rekening Bank</a>
        </li>
        <li class="<?php if ($tab == 'kontak') echo 'active'; ?> pull-right">
            <a class="<?php if ($tab == 'kontak') echo 'active'; ?>" href="<?php echo site_url('/member/personalData/kontak'); ?>">&nbsp; Kontak Perwakilan</a>
        </li>
        <li class="<?php if ($tab == 'info_mitra') echo 'active'; ?> pull-right">
            <a class="<?php if ($tab == 'info_mitra') echo 'active'; ?>" href="<?php echo site_url('/member/personalData/info_mitra'); ?>">&nbsp; Info Mitra</a>
        </li>
        <li class="<?php if ($tab == 'dokumen') echo 'active'; ?> pull-right">
            <a class="<?php if ($tab == 'dokumen') echo 'active'; ?>" href="<?php echo site_url('/member/personalData/dokumen'); ?>">&nbsp; Dokumen</a>
        </li>
        <li class="<?php if ($tab == 'personal_data') echo 'active'; ?> pull-right">
            <a class="<?php if ($tab == 'personal_data') echo 'active'; ?>" href="<?php echo site_url('/member/personalData/personal_data'); ?>">&nbsp; Personal Data</a>
        </li>
        <li class="<?php if ($tab == 'account_role') echo 'active'; ?>  pull-right">
            <a class="<?php if ($tab == 'account_role') echo 'active'; ?>" href="<?php echo site_url('/member/personalData/account_role'); ?>">&nbsp; Account Role</a>
        </li>
    </ul>

    <div class="tab-content clearfix">
        <?php $this->load->view('member_'.$tab); ?>
    </div>
</div>

<?php $this->load->view('template/loader/preloader') ?>
 <?php $this->load->view('template/landingpage/footer', $footerPage) ?>


</body>

</html>