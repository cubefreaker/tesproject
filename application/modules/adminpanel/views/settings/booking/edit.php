<?=$ViewHead?>
<body ng-controller="GeneralController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <!-- <form id='FormAdd' class="form-horizontal" name="BookingInfo"> -->
        	<form ng-submit="EditBooking()" id="FormAdd" class="form-horizontal" method="post" enctype="multipart/form-data" name="BookingInfo">
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
					<!-- Email -->
					<div class="form-group">
                        <label class="col-sm-3 control-label">Email Address</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingBooking.Email" type="text" class="form-control"/>
                          <span class="help-block">Opsitools will send reservation & ticket email to here. input email address separated by commas for multiple recipient. max 3 email</span>
                        </div>
                    </div>
	                <!-- End Email -->

                    <!-- ExpiredTime -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Expired Time</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingBooking.ExpiredTime" type="number" class="form-control"/>
                          <span class="help-block">Recommended value (in seconds : 3600)</span>
                        </div>
                    </div>
                    <!-- End ExpiredTime -->

                    <!-- Is IssuedTicket -->
                    <!-- <div class="form-group">
                        <label class="col-sm-3 control-label">Formula</label>
                        <div class="col-sm-9">
                          <div ng-repeat="(key, data) in SettingBooking.ChoosenFormula" class="ckbox ckbox-primary mt_5">
                            <input ng-change="TotalNTSNotCombined(key, data)" ng-model="SettingBooking.ChoosenFormula[key]" id="{{ key }}" type="checkbox" /> 
                            <label for="{{ key }}">{{ key }}</label>
                          </div>
                        </div>
                    </div> -->
                    <!-- Is Issued -->

                    <!-- Is IssuedTicket -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">IssuedTicket</label>
                        <div class="col-sm-9">
                          <div class="ckbox ckbox-primary mt_5">
                            <input ng-model='SettingBooking.IssueTicket' type="checkbox"  id="publish" ng-checked="SettingBooking.IssueTicket" />
                            <label for="publish"></label>
                          </div>
                        </div>
                    </div>
                    <!-- Is Issued -->

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

app.controller('GeneralController', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
    	$scope.AngularService    = AngularService;
    	$scope.SettingBooking	 = <?=json_encode($SettingBooking)?>;
        $scope.SettingBooking.ExpiredTime = parseInt($scope.SettingBooking.ExpiredTime);
    };

    (function () {
        $scope.init();

        $('#ParentSettings').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenBooking').addClass('active');

        $('.datepicker').datepicker();
        $('.timepicker').timepicker({showMeridian: false});

    })();

    $scope.TotalNTSNotCombined = function(key, data){
        if (key == 'NTS') {
            if ($scope.SettingBooking.ChoosenFormula[key]) {
                $scope.SettingBooking.ChoosenFormula['TOTAL'] = false;
            }
            else {
                $scope.SettingBooking.ChoosenFormula['TOTAL'] = true;
            }
        }
        else if (key == 'TOTAL') {
            if ($scope.SettingBooking.ChoosenFormula[key]) {
                $scope.SettingBooking.ChoosenFormula['NTS'] = false;
            }
            else {
                $scope.SettingBooking.ChoosenFormula['NTS'] = true;
            }
        }
    }

    $scope.EditBooking = function() {
        AngularService.startLoadingPage();
        console.log($scope.SettingBooking);
        $http.post(
            adminUrl+'crud_setting/editBooking',
            {'data'	: $scope.SettingBooking}
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