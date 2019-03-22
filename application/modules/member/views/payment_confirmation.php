<?php $this->load->view('template/landingpage/head') ?>
<link href="<?=base_url()?>assets/css/main2.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/member-dashboard.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/member-payment-confirmation.css" rel="stylesheet" type="text/css">
<body>  
<?php $this->load->view('template/landingpage/nav') ?>

<section class="page_title">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-md-11 col-md-offset-1">
                <div class="page_title_section_holder">
                    <h1 class="xs_center">PAYMENT CONFIRMATION</h1>
                    <div class="title_menu_holder hidden-xs">
                        <ul class="">
                            <li id="mdashboard">Dashboard</li>
                            <li class="active">Payment Confirmation</li>
                            <li id="profoverview">User Profile Overview</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid">
        <div class="content_holder row clearfix">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

                <div class="profile-menu-wrapper">
                    <select class="profile-menu visible-xs" onchange="location = this.value;">
                        <option value="" hidden>Select Menu</option>
                        <option value="member.php">Dashboard</option>
                        <option value="member-conf.php">Payment Confirmation</option>
                        <option value="profile-overview.php">User Profile Overview</option>
                    </select>
                </div>
                <form id="confirmation_form" class="mt_10" action="#">
                    <div class="form-group">
                        <p class="avenir_demi fs_18 color_darl_gray_2 form-title">Payment Confirmation Form</p>
                    </div>
                    <div class="form-group">
                        <label class="avenir_regular fs_14 lh_25 color_dark_gray_2">Order ID</label>
                        <input id="order_id" name="orderid" value="" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="avenir_regular fs_14 lh_25 color_dark_gray_2">Transfer from Bank</label>
                        <input id="bank_select" name="bank" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="avenir_regular fs_14 lh_25 color_dark_gray_2">Transfer to Bank</label>
                        <br/>
                        <select class="form-control payment_bank" id="bank_to" name="bank_to" required>
                            <option value="" hidden="hidden">Select Destination Bank</option>
                            <?php foreach ($MasterBank as $key => $bank): ?>
                            <option value="<?=$bank->name?>"><?=$bank->name?></option>
                            <?php endforeach;?>
                        </select>
                        <label for="bank_to"><span></span></label>
                    </div>
                    <div class="form-group">
                        <label class="avenir_regular fs_14 lh_25 color_dark_gray_2">Your Name Account</label>
                        <input id="order_name" name="accountname" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="avenir_regular fs_14 lh_25 color_dark_gray_2">Your Account Number</label>
                        <input id="order_account_number" name="accountnumber" type="number" class="form-control" min="0" required>
                    </div>
                    <div class="form-group">
                        <label class="avenir_regular fs_14 lh_25 color_dark_gray_2">Total Transfer</label>
                        <input id="order_total" name="ordertotal" type="number" value="<?php echo @$_pay;?>" class="form-control money" required>
                    </div>
                    <div class="form-group">
                        <label class="avenir_regular fs_14 lh_25 color_dark_gray_2">Transaction Date</label>
                        <br />
                        <select class="form-control traveller_birthday" name="date_day_input" id="date_day_input" onchange="setDays(date_month_input,this,date_year_input)" required>
                          <option value="">DD</option>
                          <?php for ($idd=1;$idd<32;$idd++) :?>
                              <option value="<?php echo str_pad($idd, 2, "0", STR_PAD_LEFT);?>" <?php echo (date('j')==$idd?'selected':'');?>><?php echo str_pad($idd, 2, "0", STR_PAD_LEFT);?></option>
                          <?php endfor; ?>
                        </select>
                        <label><span></span></label>
                        <select class="form-control traveller_birthday" name="date_month_input" id="date_month_input" onchange="setDays(this,date_day_input,date_year_input)" required>
                          <option value="">MM</option>
                          <?php for ($idd=1;$idd<=12;$idd++) :?>
                              <option value="<?php echo str_pad($idd, 2, "0", STR_PAD_LEFT);?>" <?php echo (date('n')==$idd?'selected':'');?>><?php echo str_pad($idd, 2, "0", STR_PAD_LEFT);?></option>
                          <?php endfor; ?>
                        </select>
                        <label><span></span></label>
                        <select class="form-control traveller_birthday" name="date_year_input" id="date_year_input" onchange="setDays(date_month_input,date_day_input,this)" required>
                          <option value="">YYYY</option>
                          <?php for ($idd=(date('Y')-1);$idd<(date('Y')+2);$idd++) :?>
                              <option value="<?php echo $idd;?>" <?php echo (date('Y')==$idd?'selected':'');?>><?php echo $idd;?></option>
                          <?php endfor; ?>
                        </select>
                        <label><span></span></label>
                    </div>
                    <input type="submit" id="input_submit" class="hidden">
                </form>
                <div class="btn_holder tb pointer fl_right btn_send">
                    <div class="avenir_regular fs_14 lh_25 tc va_middle center color_white">Send Confirmation</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template/loader/preloader') ?>
<?php $this->load->view('template/landingpage/footer', $footerPage) ?>

<script src="<?=base_url()?>assets/js/sweetalert2.min.js"></script>
<script type="text/javascript">
    function stopLoading() {
        $('.page_preloader').fadeOut(800);
        $('body, html').css({
            'overflow' : 'auto',
            'max-width' : 'none',
            'max-height' : 'none'
        });
    }
    
    $(document).ready(function() {
      //stopLoading();
        
        $('#mdashboard').click(function() {
            window.location.href = '<?=base_url("member/dashboard")?>';
        });

        $('#profoverview').click(function() {
          window.location.href = '<?=base_url("member/profile")?>';
        });
        
        $('.btn_send').click(function() {
            $('#input_submit').trigger("click");
        });

        $('#confirmation_form').on("submit", function(e) {
            e.preventDefault();
            
            $('.page_preloader').css('opacity', '0.8');
            $('.page_preloader').css('z-index', '9999');
            $('.page_preloader').css('display', 'block');
        
            $.ajax({
              type: "POST",
              url: '<?=base_url("member/inputPaymentConfirmation")?>',
              data: $('#confirmation_form').serialize(),
              success: function(resp){
                stopLoading();
                if (resp.status) {
                  swal({
                    title: "Success",
                    text: "Confirmation payment has been sent",
                    type: "success",
                    allowOutsideClick: false,
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
                    type:"error",
                    allowOutsideClick: false,
                    confirmButtonText: "OK"
                  }).then(function() {
                    //window.location.href = "";
                  }, function(dismiss) {
                        //window.location.href = "";
                  });
                }
              },
              error: function(errResp) {
                stopLoading();
                swal({
                    title: "Error",
                    text: "Please try again later",
                    type:"error",
                    allowOutsideClick: false,
                    confirmButtonText: "OK"
                  }).then(function() {
                    //window.location.href = "";
                  }, function(dismiss) {
                        //window.location.href = "";
                  });
              },
              dataType: 'json'
            });
        });

    });
</script>
</body>

</html>