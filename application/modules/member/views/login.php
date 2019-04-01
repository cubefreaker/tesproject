<?php $this->load->view('template/landingpage/head') ?>
<body>  
<?php $this->load->view('template/landingpage/nav') ?>

	<section class="main-section container-fluid" ng-controller="LoginController" style="margin-top: 5%">
	    <div class="row" style="margin-top: 10px;">
	        <div class="col-sm-8 col-md-8" style="text-align: center;">
          <h1 style="text-align: center;">Why Must Join ITX?</h1>
            <div class="row">
              <div class="col-md-4">
                <a href="" class="thumbnail">Thumbnail 1</a>
                <label>Buyer Management</label>                
              </div>
              <div class="col-md-4">
                <a href="" class="thumbnail">Thumbnail 2</a>                
                <label>Seller Management</label>
              </div>
              <div class="col-md-4">
                <a href="" class="thumbnail">Thumbnail 3</a>                
                <label>Price Management</label>
              </div>
            </div>
            <div class="row" style="margin-top: 10px;">
            <div class="col-md-4">
                <a href="" class="thumbnail">Thumbnail 4</a>                
                <label>Data Analytics</label>                
              </div>
              <div class="col-md-4">
                <a href="" class="thumbnail">Thumbnail 5</a>                
                <label>Aplication Program Interface</label>                
              </div>
              <div class="col-md-4">
                <a href="" class="thumbnail">Thumbnail 6</a>                
                <label>Dashboard</label>                
              </div>
            </div>
          </div>
	        <!-- End of col-sm-5 -->
          <div class="col-sm-4 col-md-4" style="padding-right:5%;padding-left:5%;">
          <h1>Login</h1>
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
          </div>


	        <!-- <div class="col-sm-4 col-md-4" style="padding-right:5%;padding-left:5%;">
	            <form name="logfrm" method="post" action="<?=base_url('member/login')?>">
	                <h3>Already Member</h3>
	                <h5>login to make everything easier</h5>

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
	                <div class="checkbox">
	                  <label><input name='remember_me' type="checkbox" value="">Remember me</label> -->
	                  <!-- <a href="forgot.php" class="forgot">Lost your password?</a> -->
	                <!-- </div>
	                <button type="submit" class="btn btn-danger btn-block">
	                    Login
	                </button>
                  
	            </form>
	        </div> -->
	        <!-- End of col-sm-6 -->
	    </div>
	    <!-- End of row -->
	</section>
	    
	<?php $this->load->view('template/loader/preloader') ?>
  
  <?php $this->load->view('template/landingpage/footer', $footerPage) ?>

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

<script type="text/javascript">
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
</script>
</body>

</html>