<?php $this->load->view('template/landingpage/head') ?>
<link href="<?=base_url()?>assets/css/member-dashboard.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/member-info.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/css/main2.css')?>" rel="stylesheet" type="text/css">
<body>  
<?php $this->load->view('template/landingpage/nav') ?>

<div class="col-md-5">
    <h3 style="margin-top:5%;margin-bottom:10px;">Change Password</h3>
    <form action="">
        <div class="form-group">
            Input current password
            <input class="form-control" type="password" name="old" id="old" required/>                                            
        </div>
        <div class="form-group">
            Input new password
            <input type="password" id="newpass" name="newpass" class="form-control" placeholder="Password must contain capitalize & number" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
        </div>
        <div class="form-group">
            Confirm password
            <input class="form-control" type="password" id="newconfirm" name="newconfirm" required/>
        </div>
        <button type="submit" class="btn btn-danger btn-save pull-right">Save</button>
    </form>
</div>


<?php $this->load->view('template/loader/preloader') ?>
<!-- <?php $this->load->view('template/landingpage/footer', $footerPage) ?> -->

<script type="text/javascript">
    var password = document.getElementById("newpass") , confirm_password = document.getElementById("newconfirm");

    function validatePassword(){
        if(newpass.value != newconfirm.value) {
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