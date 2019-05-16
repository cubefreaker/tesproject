<!DOCTYPE html>
<html lang="en" ng-app="App">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?=base_url('assets/images/favicon/').$masterLandingPage->favicon?>" />
    <title><?=$masterLandingPage->title?></title>
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/nav_footer.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/landing-page.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/select2.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/login.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/preloader.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/sweetalert2.min.css')?>"rel="stylesheet" type="text/css" >
    <link href="<?=base_url('assets/css/corporate.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/swal.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/main.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/v2/custom.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- for the most recent version of the "default" theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.12/css/default/zebra_datepicker.css">

    <!-- load jquery -->
    <script type='text/javascript' src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- load bootstrap -->
    <script type='text/javascript' src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    <!-- form and validate js -->
    <script src="<?php echo base_url() ?>assets/js/jquery.form.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <!-- load datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <!-- load angular framework -->
    <script type='text/javascript' src="<?=base_url('assets/lib/plugins/angular-1.6.9/angular.min.js')?>"></script>
    <script type='text/javascript' src="<?=base_url('assets/lib/plugins/angular-1.6.9/angular-cookies.js')?>"></script>
    <script type='text/javascript' src="<?=base_url('assets/lib/plugins/angular-1.6.9/angular-route.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/global.js?time='.time()); ?>"></script>
    <script type="text/javascript">
        var baseUrl = "<?=base_url()?>";
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=<?=$masterLandingPage->google_analytic_id?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', "<?=$masterLandingPage->google_analytic_id?>"); // dev
    </script>

    <?php
    function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
        $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
        $rgbArray = array();
        if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
            $colorVal = hexdec($hexStr);
            $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
            $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
            $rgbArray['blue'] = 0xFF & $colorVal;
        } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
            $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
            $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
            $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
        } else {
            return false; //Invalid hex color code
        }
        return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
    } 

        function fromRGB($R, $G, $B){
            $R=dechex($R);
            If (strlen($R)<2)
                $R='0'.$R;
            $G=dechex($G);
            If (strlen($G)<2)
                $G='0'.$G;
            $B=dechex($B);
            If (strlen($B)<2)
                $B='0'.$B;
            return '#' . $R . $G . $B;
        }
        $StyleColor= '#'.$masterLandingPage->color;
        $DecimalColor = hex2RGB($StyleColor) ;
        $GradientDecimalColor = fromRGB(max($DecimalColor['red'] - 30, 10), max($DecimalColor['green']-30,10), max($DecimalColor['blue']-30,10));
    ?>
    <style type="text/css">
        <?=$masterLandingPage->style?>
        .header-form .btn-switch,
        .footer-container ul li a,
        .nav-right li a,
        .color_red,
        .color_red_2,
        .btn_select div:hover,
        .col-login h3, 
        .col-login h5,
        .btn_flight,
        a.li-dashboard:hover,
        .sign-up,
        section.page_title h1,
        .title_menu_holder ul li.active, 
        .title_menu_holder ul li:hover
        /*.nav-right .sign-up span:hover, .nav-right .sign-up button:hover*/
        {color: <?=$StyleColor?> !important;}

        .header-form .btn-switch,
        .nav-right li span,
        .btn_holder,
        .btn_select,
        .red_circle,
        .filter_btn,
        .filter_btn:hover,
        .btn_select div:hover,
        .btn_continue_payment,
        .col-register button,
        .col-login button,
        .btn_flight,
        #checkbox_agreement:checked + label, #identityChecker:checked + label, 
        .checkbox:checked + label,
        .nav-right .sign-up button,
        .btn_edit_info, .btn_view_detail
        {border : 1px solid <?=$StyleColor?> !important;}

        .col-xs-5ths .per_step_holder.active .step_number_holder,
        .btn_holder,
        .per_date_holder.date_selected .chart_bar,
        .btn_select,
        .red_circle,
        .filter_btn:hover,
        .sign-up:hover span,
        .btn_continue_payment,
        .col-register button,
        .col-login button,
        .fix_detail_holder,
        .btn_flight:hover,
        #checkbox_agreement:checked + label, #identityChecker:checked + label, 
        .checkbox:checked + label,
        .nav-right .sign-up span:hover, .nav-right .sign-up button:hover,
        .btn_edit_info:hover
        { background: <?=$StyleColor?> !important; }

        .btn-search-default
        { background: <?=$StyleColor?>; }

        .arrow_down { border-top : 10px solid <?=$StyleColor?> !important; }

        .btn_select:hover {
            background: transparent !important;
        }
        .col-xs-5ths .per_step_holder.active hr {
            border-bottom: 1px solid <?=$StyleColor?> !important;
        }
        .btn_holder div:hover, 
        .filter_btn:hover .color_red,
        .nav-right li:hover a:not(.keep-color),
        .btn_flight:hover,
        .btn_edit_info:hover .color_red
        { color : white !important; }
        img.img-flight {
            width: 20px; height: 20px;
        }
        .col-register { background : linear-gradient(to right, <?=$StyleColor?> , <?=$GradientDecimalColor?> ) !important }
        a.keep-color:hover { color: <?=$StyleColor?> !important; }

        .title_menu_holder ul li.active:after, .title_menu_holder ul li:hover:after { border-bottom: 3px solid <?=$StyleColor?> !important; }


        .section-sign-up { 
            background:url('assets/images/background/<?=$masterLandingPage->background_image?>');
        }

        .btn-search-animated {
            animation-duration: 2s;
            animation-fill-mode: forwards;
            animation-name: placeHolderShimmer;
            background: linear-gradient(to right, <?=$StyleColor?> 8%, #eeeeee 18%, <?=$StyleColor?> 33%);
        }

        @media only screen and (max-width: 767px) {
            .nav-right span {
                background: white !important;
            }
            .navbar-brand.visible-xs {
                padding-left: 10px;
            }
            .section-sign-up {
                background: #e6eaed;
            }
        }
        .shad { box-shadow: 3px 0px 4px #888888};

        .clearfix:before,
        .clearfix:after {
            content: " ";
            display: table;
        }

        .clearfix:after {
            clear: both;
        }

        body {
            font-family: sans-serif;
            background: #f6f9fa;
        }

        h1 {
            color: #ccc;
            text-align: center;
        }

        a {
          color: #ccc;
          text-decoration: none;
          outline: none;
        }

        /*Fun begins*/
        .tab_container {
            width: 90%;
            margin: 0 auto;
            padding-top: 70px;
            position: relative;
        }

        .tabs, section {
          clear: both;
          padding-top: 10px;
          display: none;
        }

        .labels {
          font-weight: 700;
          font-size: 18px;
          display: block;
          float: left;
          width: 20%;
          padding: 1.5em;
          color: #757575;
          cursor: pointer;
          text-decoration: none;
          text-align: center;
          background: #f0f0f0;
        }

        #tab1:checked ~ #content1,
        #tab2:checked ~ #content2,
        #tab3:checked ~ #content3,
        #tab4:checked ~ #content4,
        #tab5:checked ~ #content5 {
          display: block;
          padding: 20px;
          background: #fff;
          color: #999;
          border-bottom: 2px solid #f0f0f0;
        }

        .tab_container .tab-content p,
        .tab_container .tab-content h3 {
          -webkit-animation: fadeInScale 0.7s ease-in-out;
          -moz-animation: fadeInScale 0.7s ease-in-out;
          animation: fadeInScale 0.7s ease-in-out;
        }
        .tab_container .tab-content h3  {
          text-align: center;
        }

        .tab_container [id^="tab"]:checked + label {
          background: #fff;
          box-shadow: inset 0 3px #0CE;
        }

        .tab_container [id^="tab"]:checked + label .fa {
          color: #0CE;
        }

        label .fa {
          font-size: 1.3em;
          margin: 0 0.4em 0 0;
        }

        /*Media query*/
        @media only screen and (max-width: 930px) {
          label span {
            font-size: 14px;
          }
          label .fa {
            font-size: 14px;
          }
        }

        @media only screen and (max-width: 768px) {
          label span {
            display: none;
          }

          label .fa {
            font-size: 16px;
          }

          .tab_container {
            width: 98%;
          }
        }

        /*Content Animation*/
        @keyframes fadeInScale {
          0% {
            transform: scale(0.9);
            opacity: 0;
          }
          
          100% {
            transform: scale(1);
            opacity: 1;
          }
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style-modify.css'); ?>">

</head>