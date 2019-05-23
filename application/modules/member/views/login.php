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
                        <input type="password" name="password" required class="form-control" autocomplete="off">
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

<?php if ($error): ?>
    setTimeout(function(){
    swal({
        title: "Error",
        text: "<?php echo $error;?>",
        type:"error"
        });
    },500);
<?php endif;?>

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