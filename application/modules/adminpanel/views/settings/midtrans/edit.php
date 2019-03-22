<?=$ViewHead?>
<body ng-controller="FaspayController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <form id='FormAdd' class="form-horizontal" ng-submit="EditMidtrans()" name="BankInfo">
            <input ng-if="CheckBank == 1" type="hidden" ng-model="BankData.BankId">
            <div class="panel panel-default">
                <!-- Header Form -->
                <div class="panel-heading">
                    <div class="panel-btns">
                        <a href="#" class="minimize">&minus;</a>
                        <a class="pointer" ng-click="GoToList()"><i class="fa fa-arrow-left" style="margin-right: 10px;"></i>| </a>
                    </div>
                    <h4 class="panel-title">Form Input</h4>
                </div>
                <!-- End Header Form -->

                <!-- Body Form -->
                <div class="panel-body">

                	<!-- Merchant Id -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Merchant ID</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingMidtrans.MerchantId" type="text" class="form-control"/>
                          <span class="help-block">Detail: 
                          	<a href="https://dashboard.sandbox.midtrans.com/settings/config_info" target="_blank">
                          		https://dashboard.sandbox.midtrans.com/settings/config_info
                          	</a>
                          </span>
                        </div>
                    </div>

                    <!-- Client Key -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Client Key</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingMidtrans.ClientKey" type="password" class="form-control"/>
                          <span class="help-block">Detail: 
                          	<a href="https://dashboard.sandbox.midtrans.com/settings/config_info" target="_blank">
                          		https://dashboard.sandbox.midtrans.com/settings/config_info
                          	</a>
                          </span>
                        </div>
                    </div>

                    <!-- Server Key -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Server Key</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingMidtrans.ServerKey" type="password" class="form-control"/>
                          <span class="help-block">Detail: 
                          	<a href="https://dashboard.sandbox.midtrans.com/settings/config_info" target="_blank">
                          		https://dashboard.sandbox.midtrans.com/settings/config_info
                          	</a>
                          </span>
                        </div>
                    </div>

                    <!-- Paymnet Method -->
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Payment Method</label>
                      <div class="col-sm-9">
                        <div ng-repeat="(key, data) in SettingMidtrans.PaymentMethod" class="ckbox ckbox-primary mt_5">
                          <input ng-model="SettingMidtrans.PaymentMethod[key]" id="{{ key }}" type="checkbox" /> 
                          <label for="{{ key }}">{{ key }}</label>
                        </div>
                      </div>
                    </div>

                    <!-- Is Production -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Production</label>
                        <div class="col-sm-9">
                          <div class="ckbox ckbox-primary mt_5">
                            <input ng-model='SettingMidtrans.IsProduction' type="checkbox"  id="IsProduction"/>
                            <label for="IsProduction"></label>
                          </div>
                        </div>
                    </div>

                    <!-- Auto Send Payment Link -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Auto Send Payment Link</label>
                        <div class="col-sm-9">
                          <div class="ckbox ckbox-primary mt_5">
                            <input ng-model='SettingMidtrans.IsAutoPaymentLink' type="checkbox"  id="IsAutoPaymentLink"/>
                            <label for="IsAutoPaymentLink"></label>
                          </div>
                        </div>
                    </div>

                    <!-- Payment Notification Url -->
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Notification Url</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingMidtrans.NotificationUrl" type="text" class="form-control"/>
                          <span class="help-block">Detail: 
                          	<a href="https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration" target="_blank">
                          		https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration
                          	</a>
                          </span>
                        </div>
                    </div> -->

                    <!-- Finish Redirect Url -->
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Finish Redirect Url</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingMidtrans.FinishUrl" type="text" class="form-control"/>
                          <span class="help-block">Detail: 
                          	<a href="https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration" target="_blank">
                          		https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration
                          	</a>
                          </span>
                        </div>
                    </div> -->

                    <!-- UnFinish Redirect Url -->
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Unfinish Redirect Url</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingMidtrans.UnFinishUrl" type="text" class="form-control"/>
                          <span class="help-block">Detail: 
                          	<a href="https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration" target="_blank">
                          		https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration
                          	</a>
                          </span>
                        </div>
                    </div> -->

                    <!-- Error Redirect Url -->
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Error Redirect Url</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingMidtrans.ErrorUrl" type="text" class="form-control"/>
                          <span class="help-block">Detail: 
                          	<a href="https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration" target="_blank">
                          		https://dashboard.sandbox.midtrans.com/settings/vtweb_configuration
                          	</a>
                          </span>
                        </div>
                    </div> -->
					
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
<script src="<?=base_url('assets/adminpanel/js/ckeditor/ckeditor.js')?>"></script>
<script src="<?=base_url('assets/adminpanel/js/ckeditor/adapters/jquery.js')?>"></script> 

<script type="text/javascript">

app.controller('FaspayController', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
    	$scope.AngularService       = AngularService;
    	$scope.SettingMidtrans 		= <?=json_encode($SettingMidtrans)?>;
    };

    (function () {
        $scope.init();

        $('#ParentSettings').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenFaspay').addClass('active');
    })();

    $scope.EditMidtrans = function() {
        console.log($scope.SettingMidtrans);
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud_setting/editMidtrans',
            {'data'	: $scope.SettingMidtrans}
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

    $scope.GoToList = function() {
        window.history.back();
    };


  }); // --- end angular controller --- //
</script>

</body>
</html>