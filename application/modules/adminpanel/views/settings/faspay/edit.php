<?=$ViewHead?>
<body ng-controller="FaspayController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <form id='FormAdd' class="form-horizontal" ng-submit="EditFaspay()" name="BankInfo">
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

                	<!-- Contact Center 1 -->
                	<div class="panel-heading mb_10">
						<h1 class="panel-title">Credit Card Configuration</h1>
					</div>
					<div class="panel-heading">
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Merchant ID</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.CCMerchantId" type="text" class="form-control"/>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Password</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.CCPassword" type="password" class="form-control"/>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Post Data</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.CCUrlInquiry" type="text" class="form-control"/>
	                          <span class="help-block">Detail: <a href="https://faspay.co.id/docs/index-business.html#url-endpoint" target="_blank">https://faspay.co.id/docs/index-business.html#url-endpoint</a></span>
	                        </div>
	                    </div>
					</div>
					<!-- End Contact Center 1 -->

					<!-- Contact Center 2 -->
                	<div class="panel-heading mb_10">
						<h1 class="panel-title">Debit Configuration</h1>
					</div>
					<div class="panel-heading">
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Merchant Name</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.DebMerchantName" type="text" class="form-control"/>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Merchant ID</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.DebMerchantId" type="text" class="form-control"/>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">User ID</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.DebUserId" type="text" class="form-control"/>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Password</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.DebPassword" type="password" class="form-control"/>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">URL Payment Channel Inquiry</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.DebUrlInquiry" type="text" class="form-control"/>
	                          <span class="help-block">Detail: <a href="https://faspay.co.id/docs/index-business.html#payment-channel-inquiry" target="_blank">https://faspay.co.id/docs/index-business.html#payment-channel-inquiry</a> (JSON)</span>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">URL Payment Status Inquiry</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.DebUrlStatusInquiry" type="text" class="form-control"/>
	                          <span class="help-block">Detail: <a href="https://faspay.co.id/docs/index-business.html#inquiry-payment-status" target="_blank">https://faspay.co.id/docs/index-business.html#inquiry-payment-status</a> (JSON)</span>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">URL Post Data</label>
	                        <div class="col-sm-9">
	                          <input ng-model="SettingFaspay.DebUrlPost" type="text" class="form-control"/>
	                          <span class="help-block">Detail: <a href="https://faspay.co.id/docs/index-business.html#post-data" target="_blank">https://faspay.co.id/docs/index-business.html#post-data</a> (JSON)</span>
	                        </div>
	                    </div>
					</div>
					<!-- End Contact Center 2 -->

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
    	$scope.SettingFaspay 		= <?=json_encode($SettingFaspay)?>;
    };

    (function () {
        $scope.init();

        $('#ParentSettings').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenFaspay').addClass('active');
    })();

    $scope.EditFaspay = function() {
        console.log($scope.SettingFaspay);
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud_setting/editFaspay',
            {'data'	: $scope.SettingFaspay}
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