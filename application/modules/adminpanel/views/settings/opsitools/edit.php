<?=$ViewHead?>
<body ng-controller="GeneralController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <!-- <form id='FormAdd' class="form-horizontal" name="BookingInfo"> -->
        	<form ng-submit="EditOpsitoolsApi()" id="FormAdd" class="form-horizontal" method="post" enctype="multipart/form-data" name="BookingInfo">
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
                    <!-- Auth -->
                    <div class="panel-heading mb_10">
                        <h1 class="panel-title">Auth</h1>
                    </div>
                    <div class="panel-heading">
                        <!-- Grant Type -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Grant Type</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsAuth.GrantType" type="text" class="form-control"/>
                            </div>
                        </div>

                        <!-- Client Id -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Client Id</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsAuth.ClientId" type="text" class="form-control"/>
                            </div>
                        </div>

                        <!-- Client Secret -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Client Secret</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsAuth.ClientSecret" type="password" class="form-control"/>
                            </div>
                        </div>

                        <!-- Scope -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Scope</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsAuth.Scope" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <!-- List API -->
                    <div class="panel-heading mb_10">
                        <h1 class="panel-title">List API</h1>
                    </div>
                    <div class="panel-heading">
                        <!-- Token -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Token</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsListApi[ListApiId.token].ListUrl" type="text" class="form-control"/>
                            </div>
                        </div>

                        <!-- FlightAvailability -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">FlightAvailability</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsListApi[ListApiId.FlightAvailability].ListUrl" type="text" class="form-control"/>
                            </div>
                        </div>

                        <!-- RsvFlight -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">RsvFlight</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsListApi[ListApiId.RsvFlight].ListUrl" type="text" class="form-control"/>
                            </div>
                        </div>
                        
                        <!-- FareDetail -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">FareDetail</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsListApi[ListApiId.FareDetail].ListUrl" type="text" class="form-control"/>
                            </div>
                        </div>

                        <!-- GetRsvById -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">GetRsvById</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsListApi[ListApiId.GetRsvById].ListUrl" type="text" class="form-control"/>
                            </div>
                        </div>

                        <!-- IssueRsvFlight -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">IssueRsvFlight</label>
                            <div class="col-sm-9">
                              <input ng-readonly="IsReadOnly" ng-model="OpsitoolsListApi[ListApiId.IssueRsvFlight].ListUrl" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>

					

                    <div class="panel-footer">
                        <div class="row">
                            <div ng-if="!IsReadOnly" class="col-sm-9 col-sm-offset-3">
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
    	$scope.AngularService  = AngularService;
    	$scope.ListApiId            = <?=json_encode($ListApiId)?>;
        $scope.OpsitoolsListApi     = <?=json_encode($OpsitoolsListApi)?>;
        $scope.OpsitoolsAuth        = <?=json_encode($OpsitoolsAuth)?>;
        $scope.IsReadOnly           = 0;
    };

    (function () {
        $scope.init();

        $('#ParentSettings').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenOpsitools').addClass('active');

        $('.datepicker').datepicker();
        $('.timepicker').timepicker({showMeridian: false});

    })();

    $scope.EditOpsitoolsApi = function() {
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud_setting/editOpsitoolsApi',
            { 'OpsitoolsListApi'	: $scope.OpsitoolsListApi, 'OpsitoolsAuth' : $scope.OpsitoolsAuth }
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