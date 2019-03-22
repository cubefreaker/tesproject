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

					<!-- Type -->
					<div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9">
                            <select ng-model="ManageAirport.msa_type" class="form-control">
                                <option value="1"> Domestik </option>
                                <option value="2"> Internasional </option>
                            </select>
                        </div>
	                </div>
	                <!-- End Type -->

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

app.controller('ContactUsController', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
    	$scope.AngularService       = AngularService;
    	$scope.ManageAirport = <?=json_encode($ManageAirport)?>;
    };

    (function () {
        $scope.init();

        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenAirports').addClass('active');

    })();

    $scope.EditAirline = function() {
        console.log($scope.ManageAirport);
        // return false;
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud/editSettingAirport',
            {'data'	: $scope.ManageAirport}
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