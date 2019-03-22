<?=$ViewHead?>
<body ng-controller="BankController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <!-- <form id='FormAdd' class="form-horizontal" ng-submit="CheckBank == 1 ? EditBank() : AddBank()" name="BankInfo" method="post" enctype="multipart/form-data"> -->
            <form id="FormAdd" class="form-horizontal" method="post" enctype="multipart/form-data" name="BankInfo">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            <input ng-if="CheckBank == 1" type="hidden" ng-model="BankData.BankId">
            <div class="panel panel-default">
                <!-- Header Form -->
                <div class="panel-heading">
                    <div class="panel-btns">
                        <a href="#" class="minimize">&minus;</a>
                        <a class="pointer" ng-click="GoToListBank()"><i class="fa fa-arrow-left" style="margin-right: 10px;"></i>| </a>
                    </div>
                    <h4 class="panel-title">Form Input</h4>
                </div>
                <!-- End Header Form -->

                <!-- Body Form -->
                <div class="panel-body">

                    <!-- Bank Name -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Bank Name<span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                          <input ng-model="BankData.BankName" type="text" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Bank Image -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Logo</label>
                        <div class="col-sm-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                  <div class="uneditable-input">
                                    <i class="glyphicon glyphicon-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                  </div>
                                  <span class="btn btn-default btn-file">
                                    <span class="fileupload-new">Select file</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input id="BankImage" name="file" type="file" />
                                  </span>
                                  <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            <span class="help-block">Optimal Dimensions : 70 x 23 px</span>
                            </div>
                            
                            <div ng-if="BankData.ImageUrl" class="mt10">
                                <a ng-href="{{BaseUrl}}assets/images/bank/{{BankData.ImageUrl}}" title="logo" data-fancybox data-caption="Logo">
                                    Logo
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Account Number -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Account Number <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                          <input ng-model="BankData.RekeningNo" type="text" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Account Name -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Account Name <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                          <input ng-model="BankData.RekeningName" type="text" class="form-control" required/>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Body Form -->
            </div>
        </form>
        <?=$ViewCopyRight?>
    </div>

  </div><!-- mainpanel -->

</section>

<?=$ViewFooter?>

<script type="text/javascript">

app.controller('BankController', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
        $scope.BaseUrl              = "<?=base_url()?>";
    	$scope.AngularService       = AngularService;
        $scope.CheckBank            = <?=$CheckBank?>;
        if ($scope.CheckBank == 1) {
            $scope.BankData = <?=json_encode($BankData)?>;
        }
    };

    (function () {
        $scope.init();

        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenBanks').addClass('active');

        $('.datepicker').datepicker();
        $('.timepicker').timepicker({showMeridian: false});

    })();

    var form = document.forms.namedItem("BankInfo");
    form.addEventListener('submit', function(ev) {
        var BankImage = document.getElementById("BankImage");
        var oOutput = document.querySelector("div"),oData = new FormData(form);
        var oReq = new XMLHttpRequest();
        oReq.open("POST", adminUrl+'ajax/uploadImageBank', true);
        oReq.onload = function(oEvent) {
            if (oReq.status) {
                if ($scope.CheckBank == 1) {
                    $scope.EditBank();
                }
                else {
                    $scope.AddBank();
                }
            }
        };
        oReq.send(oData);
        ev.preventDefault();
    }, false);
    

    $scope.AddBank = function() {
        console.log($scope.BankData);
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud/addBank',
            {'data': $scope.BankData}
        ).then(function successCallback(resp) {
            console.log(resp);
            AngularService.stopLoadingPage();
            if (resp.data['StatusResponse'] == 0) {
                AngularService.ErrorResponse(resp.data['Message']);
            }
            else if (resp.data['StatusResponse'] == 1) {
                AngularService.SuccessResponse();
            }
        }, function errorCallback(err) {
            console.log(err);
            AngularService.ErrorResponse(err);
        });    
    }

    $scope.EditBank = function() {
        console.log($scope.BankData);
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud/editBank',
            {'data': $scope.BankData}
        ).then(function successCallback(resp) {
            console.log(resp);
            AngularService.stopLoadingPage();
            if (resp.data['StatusResponse'] == 0) {
                AngularService.ErrorResponse(resp.data['Message']);
            }
            else if (resp.data['StatusResponse'] == 1) {
                AngularService.SuccessResponse();
            }
        }, function errorCallback(err) {
            console.log(err);
            AngularService.ErrorResponse(err);
        });    
    }

    $scope.GoToListBank = function() {
        window.history.back();
    };


  }); // --- end angular controller --- //
</script>

</body>
</html>