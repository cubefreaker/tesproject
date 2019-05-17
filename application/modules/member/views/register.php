<?php $this->load->view('template/landingpage/head') ?>
    <link href="<?=base_url()?>assets/css/member-dashboard.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/css/member-info.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/main2.css')?>" rel="stylesheet" type="text/css">
<body ng-controller="UserRegister">  
<?php $this->load->view('template/landingpage/nav') ?>

  <div class="container-fluid my-auto" style="margin-right: 15%;margin-left: 15%;background-color: #ffffff;">
    <h1 class="text-left" style="margin-top: 35px;color: rgb(0,0,0);margin-left: 35px;"><strong>User Registration</strong></h1>
    <form id="regfrm" name="regfrm" style="margin: 40px;">
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>First Name</Label>
            <input type="text" name="firstname" class="form-control" required/>
            <input type="hidden" name="act" value="register"></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>Last Name</Label>
            <input type="text" name="lastname" class="form-control" required/>
            <input type="hidden" name="act" value="register"></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>Username</Label>           
            <input type="text" name="username" class="form-control" required/>
            <input type="hidden" name="act" value="register"></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>NIK</Label>           
            <input type="text" name="nik" class="form-control" required/>
            <input type="hidden" name="act" value="register"></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>Gender</Label>            
            <select class="form-control" name="gender">
            <option value="male" selected>Male</option>
            <option value="female">Female</option>
            </select></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>Birth Date</label>
            <input type="text" name="bdate" class="form-control datepicker" required/></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Example: john@example.com" required/></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>Phone</label>
            <input type="tel" name="phone" class="form-control" required/></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>Password</label>
            <input type="password" name="password" id="pass1" class="form-control" placeholder="Password must contain capitalize & number" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/></div>
        <div class="form-group col-md-6" style="padding-left: 0px;">
            <label>Re-Type Password</label>
            <input class="form-control" type="password" name="repassword" id="pass2" required/></div>
        <div class="card">
        <label>EULA</label>
        <div class="card-body pre-scrollable" style="height: 150px; width: 100%;">
          
              Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
          </div>
        </div>
        <div class="custom-control custom-checkbox" style="margin-top: 20px;">
          <input type="checkbox" class="custom-control-input" id="terms" name="terms" required>
          <label class="custom-control-label" for="terms">I have read and agree to the terms and privacy policy of ....</label>
        </div>
        <button class="btn btn-danger btn-block btn-register" style="margin-top: 20px">Accept and Register</button>
    </form>
    
</div>
       
    <?php $this->load->view('template/loader/preloader') ?>
  
  <!-- <?php $this->load->view('template/landingpage/footer', $footerPage) ?> -->

<!-- <script src="<?=base_url()?>assets/js/jquery.min.js"></script> -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/nav.js"></script>
<script src="<?=base_url()?>assets/js/slick.min.js"></script>
<script src="<?=base_url()?>assets/js/login.js"></script>


<script type="text/javascript">

app.controller('UserRegister', function ($scope, $filter, $window, $http) {


function stopLoading() {
    $('.page_preloader').fadeOut(800);

    $('body, html').css({
        'overflow' : 'auto',
        'max-width' : 'none',
        'max-height' : 'none'
    });
}

var getCookiebyName = function(name){
    var pair = document.cookie.match(new RegExp(name + '=([^;]+)'));
    return !!pair ? pair[1] : null;
};

$(document).ready(function() {
    $('.btn-register').click(function() {
        $('#regfrm').trigger("click");
    });
    
    $('#regfrm').on('submit', function(e) {
        e.preventDefault();
        
        var pass1=$('#pass1').val();
        var pass2=$('#pass2').val();
        if(pass1 != pass2) {
            swal({
                title: "Error",
                text: "Password doesn't match",
                type:"error"
            });
            return false;
        }
        
        $('.page_preloader').css('opacity', '0.8');
        $('.page_preloader').css('z-index', '9999');
        $('.page_preloader').css('display', 'block');
        
        $.ajax({
            type: "POST",
            url: "<?=base_url('member/submitRegister')?>",
            data: $('#regfrm').serialize(),
            headers: { 'X-CSRF-TOKEN': getCookiebyName('5f05193eee9e900380c12e6040e7dee9') },
            dataType: 'json',
            success: function(resp){
                var response = resp;
                console.log(response.status);
                stopLoading();
                if( response.status == true) {
                    swal({
                        title: "Success",
                        text: "Registration success!",
                        type: "success",
                        allowOutsideClick: true,
                        confirmButtonText: "OK"
                    }).then(function() {
                        location.reload();
                    }, function(dismiss) {
                        location.reload();
                    })
                }
                else {
                    console.log(response.message);
                    swal({
                        title: "Failed",
                        text: response.message,
                        type:"error"
                    });
                }
            },
            error: function(errResp) {
                console.log(errResp);
                stopLoading();
                swal({
                    title: "Error",
                    text: "Please try again later",
                    type:"error"
                });
            },
        // dataType: 'json'
        });
    });
    
<?php if ($error): ?>
setTimeout(function(){
  swal({
      title: "Error",
      text: "<?php echo $error;?>",
      type:"error"
    });
},500);
<?php endif;?>
});

}); // end angular
</script>

</body>

</html>