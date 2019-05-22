<?php $this->load->view('template/landingpage/head') ?>
<body>  
<?php $this->load->view('template/landingpage/nav') ?>
<div class="col-md-12" style="margin-top: 10px;">
    <div class="col-sm-8 col-md-8">
        <h1 style="text-align: center;">Why Must Join ITX?</h1>
            <div class="row" style="padding: 40px; display: block; background-color: #fff; border: 1px solid #ddd;">
                <div class="col-md-6">
                    <div class="">
                        <img src="" alt="">
                        <h3 style="text-align: center;font-weight:bold">Seller</h3>
                        <p>Corporate that buys large quantity of goods from various suppliers, and reseller to retailers. Corporate who aggregates one or more suppliers under their corporation.</p>
                        <h4 style="font-weight:bold">Benefits</h4>
                        <ul>
                            <li>Many connections to travel agent</li>
                            <li>24 / 7 online support</li>
                            <li>Easy to use</li>
                        </ul>
                        <h4 style="font-weight:bold">Features</h4>
                        <ul>
                            <li>Set different prices for different customer, using our Price Management capability</li>
                            <li>Allow or deny to buy your product through our Buyer Management capability</li>
                            <li>Monitor all of your products and transactions in a single dashboard</li>
                            <li>API connection capability</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <img src="" alt="">
                            <h3 style="text-align: center;font-weight:bold">Buyer</h3>
                            <p>A person or business who gives out or sells the T&T inventory that sold by the supplier to person or business as traveler. Accommodation, transportation, food and beverages, event and MICE, Corporate Travel Management</p>
                            <h4 style="font-weight:bold">Benefits</h4>
                        <ul>
                            <li>Many connections to seller</li>
                            <li>Choose from one or more seller for any products</li>
                            <li>No subscription or transaction fee, it’s absolutely free</li>
                            <li>24 / 7 online support</li>
                            <li>Easy to use</li>
                        </ul>
                        <h4 style="font-weight:bold">Features</h4>
                        <ul>
                            <li>Set your preferred seller of any products through our Seller Management capability</li>
                            <li>Monitor all of your transactions in a single dashboard</li>
                            <li>API connection capability</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of col-sm-5 -->
        <div class="col-sm-4 col-md-4">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade in" style="margin-top: 40px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <h1>Login</h1>
            <div style="padding: 40px; display: block; background-color: #fff; border: 1px solid #ddd;">
                <form name="logfrm" method="post" action="<?=base_url('member/login')?>" style="margin: 0px; padding:0px;">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control">
                        <input type="hidden" name="act" value="login">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
        <!-- End of col-sm-6 -->
    </div>
    <div style="margin-bottom: 50%;"></div>
    <?php $this->load->view('template/loader/preloader') ?>
    <?php $this->load->view('template/landingpage/footer') ?> 
  

<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/nav.js"></script>
<script src="<?=base_url()?>assets/js/slick.min.js"></script>
<script src="<?=base_url()?>assets/js/login.js"></script>

<script type="text/javascript">
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
          url: "<?=base_url('member/register')?>",
          data: $('#regfrm').serialize(),
          headers: { 'X-CSRF-TOKEN': getCookiebyName('5f05193eee9e900380c12e6040e7dee9') },
          success: function(resp){
            stopLoading();
            if (resp.status) {
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
              });
            }
            else {
              swal({
                title: "Error",
                text: resp.message,
                type:"error"
              });
            }
          },
          error: function(errResp) {
            stopLoading();
            swal({
                title: "Error",
                text: "Please try again later",
                type:"error"
              });
          },
          dataType: 'json'
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
</script>

<script>
var app = angular.module('App', ['ngCookies', 'ngRoute']);
app.controller('LoginController', function ($scope, $filter, $window, $http) {


});
</script>

<!-- <script type="text/javascript">
    var urlSearch = "<?=base_url('flight/search')?>";
    
    app.filter('range', function() {
      return function(input, min, max) {
        min = parseInt(min);
        max = parseInt(max);
        for (var i=min; i<max; i++)
          input.push(i);
        return input;
      };
    });

    app.controller('LoginController', function ($scope, $filter, $window, $http) {


  });
</script> -->
</body>

</html>