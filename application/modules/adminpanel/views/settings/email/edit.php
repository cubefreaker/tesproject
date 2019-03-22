<?=$ViewHead?>
<body ng-controller="EmailController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <!-- <form id='FormAdd' class="form-horizontal" name="BookingInfo"> -->
        	<form ng-submit="EditEmail()" id="FormAdd" class="form-horizontal" method="post" enctype="multipart/form-data" name="BookingInfo">
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
                          <input ng-model="SettingEmail.EmailFrom" type="email" class="form-control"/>
                          <span class="help-block">use for send email to user's transaction ( reserved, reminder, ticketed )</span>
                        </div>
                    </div>
	                <!-- End Email -->

                    <!-- ExpiredTime -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email Subject</label>
                        <div class="col-sm-9">
                          <input ng-model="SettingEmail.EmailTitle" type="text" class="form-control"/>
                          <span class="help-block">use for send email to user's transaction ( reserved, reminder, ticketed )</span>
                        </div>
                    </div>
                    <!-- End ExpiredTime -->

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

app.controller('EmailController', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
    	$scope.AngularService    = AngularService;
    	$scope.SettingEmail	 = <?=json_encode($SettingEmail)?>;
    };

    (function () {
        $scope.init();

        $('#ParentSettings').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenEmail').addClass('active');

        $('.datepicker').datepicker();
        $('.timepicker').timepicker({showMeridian: false});

    })();

    $scope.EditEmail = function() {
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud_setting/editEmail',
            {'data'	: $scope.SettingEmail}
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