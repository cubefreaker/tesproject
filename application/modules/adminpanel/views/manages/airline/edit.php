<?=$ViewHead?>
<body ng-controller="ContactUsController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <form id='FormAdd' class="form-horizontal" ng-submit="EditAirline()" name="BankInfo">
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

                    <span ng-repeat="(key, data) in AirlineData track by $index">
                        <div class="panel-heading mb_10">
                            <h1 class="panel-title">{{AirlineData[$index].AirlineName}}</h1>
                        </div>
                        <div class="panel-heading">
        					<!-- Name -->
        					<div class="form-group">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                  <input readonly ng-model="AirlineData[$index].AirlineName" type="text" class="form-control"/>
                                </div>
        	                </div>
        	                <!-- End Name -->

        	                <!-- Code  -->
        					<div class="form-group">
                                <label class="col-sm-3 control-label">Code</label>
                                <div class="col-sm-9">
                                  <input readonly ng-model="AirlineData[$index].AirlineCode" type="text" class="form-control"/>
                                </div>
        	                </div>
        	                <!-- End Code -->

        	                <!-- Status -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Publish</label>
                                <div class="col-sm-9">
                                  <div class="ckbox ckbox-primary mt_5">
                                    <input ng-model='AirlineData[$index].AirlineStatus' type="checkbox"  id="{{key}}" />
                                    <label for="{{key}}"></label>
                                  </div>
                                </div>
                            </div>
                            <!-- End Status -->
                        </div>
                    </span>

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

app.controller('ContactUsController', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
    	$scope.AngularService       = AngularService;
    	$scope.AirlineData = <?=json_encode($Airlines)?>;
    };

    (function () {
        $scope.init();

        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenAirlines').addClass('active');

    })();

    $scope.EditAirline = function() {
        console.log($scope.AirlineData);
        // return false;
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud/editAirline',
            {'data'	: $scope.AirlineData}
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