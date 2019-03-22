<?=$ViewHead?>
<body ng-controller="DiscountController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <form id='FormAdd' class="form-horizontal" ng-submit="CheckDiscount == 1 ? EditDiscount() : AddDiscount()">
            <input ng-if="CheckDiscount == 1" type="hidden" ng-model="DiscountData.DiscountId">
            <div class="panel panel-default">
                <!-- Header Form -->
                <div class="panel-heading">
                    <div class="panel-btns">
                        <a href="#" class="minimize">&minus;</a>
                        <a class="pointer" ng-click="GoToListDiscount()"><i class="fa fa-arrow-left" style="margin-right: 10px;"></i>| </a>
                    </div>
                    <h4 class="panel-title">Form Input</h4>
                </div>
                <!-- End Header Form -->

                <!-- Body Form -->
                <div class="panel-body">
                    <!-- Voucer Code -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Voucher Code <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                          <input ng-readonly="CheckDiscount == 1" ng-model="DiscountData.VoucherCode" type="text" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Discount Type -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Discount Type <span class="asterisk">*</span></label>
                        <div class="col-sm-5">
                          <select ng-init="DiscountData.DiscountType = DiscountType" ng-model="DiscountData.DiscountType" class="form-control" required>
                              <option ng-value="1">Nominal</option>
                              <option ng-value="2">Percent</option>
                          </select>
                        </div>
                    </div>

                    <!-- Nominal -->
                    <div class="form-group" ng-if="DiscountData.DiscountType == 1">
                        <label class="col-sm-3 control-label">Nominal <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                          <input placeholder="0" ng-model="DiscountData.Nominal" type="number" step="0.01" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Percent -->
                    <div class="form-group" ng-if="DiscountData.DiscountType == 2">
                        <label class="col-sm-3 control-label">Percent <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                          <input placeholder="0" maxlength="3" ng-model="DiscountData.Percent" type="number" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Quantity <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                          <input ng-readonly="CheckDiscount == 1" placeholder="0" maxlength="8" ng-model="DiscountData.Quantity" type="number" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Stock -->
                    <div class="form-group" ng-if="CheckDiscount == 1">
                        <label class="col-sm-3 control-label">Stock <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                          <input placeholder="0" maxlength="8" ng-model="DiscountData.Stock" type="number" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Start Date -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Start Date <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input required ng-model='DiscountData.StartDate' type="text" class="form-control datepicker" placeholder="mm/dd/yyyy">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                <div class="bootstrap-timepicker">
                                    <input ng-model="DiscountData.StartTime" required id="starttime"  type="text" class="form-control timepicker" placeholder="00:00"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Date -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">End Date <span class="asterisk">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input required ng-model='DiscountData.EndDate' type="text" class="form-control datepicker" placeholder="mm/dd/yyyy">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                <div class="bootstrap-timepicker">
                                    <input ng-model="DiscountData.EndTime" required id="starttime"  type="text" class="form-control timepicker" placeholder="00:00"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Is Publish -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Publish</label>
                        <div class="col-sm-9">
                          <div class="ckbox ckbox-primary mt_5">
                            <input ng-model='DiscountData.IsPublish' type="checkbox"  id="publish" ng-checked="DiscountData.IsPublish" />
                            <label for="publish"></label>
                          </div>
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
  app.controller('DiscountController', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
    	$scope.AngularService       = AngularService;
        $scope.CheckDiscount        = <?=$CheckDiscount?>;
        $scope.DiscountType         = <?=$DiscountType?>;
        if ($scope.CheckDiscount == 1) {
            $scope.DiscountData = <?=json_encode($DiscountData)?>;
            $scope.DiscountData.Quantity = parseInt($scope.DiscountData.Quantity, 10);
            $scope.DiscountData.Stock = parseInt($scope.DiscountData.Stock, 10);
            $scope.DiscountData.Nominal = parseInt($scope.DiscountData.Nominal, 10);
            $scope.DiscountData.Percent = parseInt($scope.DiscountData.Percent, 10); 
        }
    };

    (function () {
        $scope.init();

        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenDiscounts').addClass('active');

        $('.datepicker').datepicker();
        $('.timepicker').timepicker({showMeridian: false});

    })();

    $scope.AddDiscount = function() {
        console.log($scope.DiscountData);
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud/addDiscount',
            {'data': $scope.DiscountData}
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

    $scope.EditDiscount = function() {
        console.log($scope.DiscountData);
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud/editDiscount',
            {'data': $scope.DiscountData}
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

    $scope.GoToListDiscount = function() {
        window.history.back();
    };


  }); // --- end angular controller --- //
</script>

</body>
</html>