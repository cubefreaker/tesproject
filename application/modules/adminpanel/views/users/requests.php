<?=$ViewHead?>
<body ng-controller="UserRequest">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">   
		<div class="panel panel-default">
        <div class="panel-body">
			<div class="table-responsive">
				<table class="table" id="datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Email</th>
							<th>As Seller</th>
							<th>As Buyer</th>
                            <th>PrivyId Seller</th>
                            <th>PrivyId Buyer</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="data in List">
                            <td> {{ $index+1 }} </td>
                            <td> {{ data.UserName }} </td>
                            <td> {{ data.Email }} </td>
                            <td>
                                <div ng-if="data.Seller == 'requested'">
                                    <a ng-click="acceptSeller(data)" class="tooltipx pointer">
                                        <button class="btn btn-xs btn-success">Submit</button><span>Submit to PrivyId</span>
                                    </a>
                                    <a ng-click="rejectSeller(data.UserId)" class="tooltipx pointer">
                                        <button class="btn btn-xs btn-danger">Reject</button><span>Reject request</span>
                                    </a>
                                </div>
                                <div ng-if="data.Seller == 'rejected'">
                                    Rejected
                                </div>
                                <div ng-if="data.Seller == 'accepted'">
                                    Accepted
                                </div>
                                <div ng-if="data.Seller == 'undefined'">
                                    Un-Requested
                                </div>
                            </td>
                            <td>
                                <div ng-if="data.Buyer == 'requested'">
                                    <a ng-click="acceptBuyer(data)" class="tooltipx pointer">
                                        <button class="btn btn-xs btn-success">Submit</button><span>Submit to PrivyId</span>
                                    </a>
                                    <a ng-click="rejectBuyer(data.UserId)" class="tooltipx pointer">
                                        <button class="btn btn-xs btn-danger">Reject</button><span>Reject request</span>
                                    </a>
                                </div>
                                <div ng-if="data.Buyer == 'on process'">
                                    On Process
                                </div>
                                <div ng-if="data.Buyer == 'rejected'">
                                    Rejected
                                </div>
                                <div ng-if="data.Buyer == 'accepted'">
                                    Accepted
                                </div>
                                <div ng-if="data.Buyer == 'undefined'">
                                    Un-Requested
                                </div>
                            </td>
                            <td>
                                <div ng-if="data.PrivyIdSeller != 'empty'">
                                    <a href="#" data-toggle="modal" data-target="#privyModal" class="tooltipx pointer">
                                        {{ data.PrivyIdSeller }} <span>view detail</span>
                                    </a>
                                    <div class="modal fade" id="privyModal" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">PrivyId Detail</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <label class="control-label col-sm-3" style="text-align: left;">PrivyId Status</label> 
                                                        <div class=" col-sm-3">
                                                           :&nbsp;&nbsp;{{ data.PrivyIdSellerStatus }}
                                                        </div>
                                                    </div>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th>No</th> -->
                                                                <th>Document Name</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr ng-repeat="doc in data.Document">
                                                                <!-- <td>{{ $index+1 }}</td> -->
                                                                <td>{{ doc.name }}</td>
                                                                <td>
                                                                    <div ng-if="doc.status == 'undefined'">
                                                                        <a ng-click="submitDoc(doc)" class="tooltipx pointer">
                                                                            <button class="btn btn-sm btn-success">Submit</button><span>Submit to PrivyId</span>
                                                                        </a>
                                                                    </div>
                                                                    <div ng-if="doc.status != 'undefined'">{{ doc.status }}</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <button class="btn btn-sm btn-success" ng-click="submitDocAll(data.Document)">Submit all documents</button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>

                                <div ng-if="data.PrivyIdSeller == 'empty'">
                                    {{ data.PrivyIdSeller }}
                                </div>
                            </td>
                            <td>
                                <div ng-if="data.PrivyIdBuyer != 'empty'">
                                    <a href="#" data-toggle="modal" data-target="#privyModal" class="tooltipx pointer">
                                        {{ data.PrivyIdBuyer }} <span>view detail</span>
                                    </a>
                                    <div class="modal fade" id="privyModal" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">PrivyId Detail</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <label class="control-label col-sm-3" style="text-align: left;">PrivyId Status</label> 
                                                        <div class=" col-sm-3">
                                                           :&nbsp;&nbsp;{{ data.PrivyIdBuyerStatus }}
                                                        </div>
                                                    </div>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th>No</th> -->
                                                                <th>Document Name</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr ng-repeat="doc in data.Document">
                                                                <!-- <td>{{ $index+1 }}</td> -->
                                                                <td>{{ doc.name }}</td>
                                                                <td>
                                                                    <div ng-if="doc.status == 'undefined'">
                                                                        <a ng-click="submitDoc(doc)" class="tooltipx pointer">
                                                                            <button class="btn btn-sm btn-success">Submit</button><span>Submit to PrivyId</span>
                                                                        </a>
                                                                    </div>
                                                                    <div ng-if="doc.status != 'undefined'">{{ doc.status }}</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <button class="btn btn-sm btn-success" ng-click="submitDocAll(data.Document)">Submit all documents</button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>

                                <div ng-if="data.PrivyIdBuyer == 'empty'">
                                    {{ data.PrivyIdBuyer }}
                                </div>
                            </td>
                            <!-- <td> {{ data.Group.name }} </td> -->
							<!-- <td class="table-action">
			                    <a ng-click="GoToDetailUser(data.UserId)" class="tooltipx pointer">
                                    <i class="fa fa-pencil"></i><span>Edit User</span>
			                    </a>
                                <a ng-if="Member.id != data.UserId" ng-click="DeleteUser(data.UserId)" class="tooltipx pointer">
                                    <i class="fa fa-trash-o"></i><span>Delete User</span>
                                </a>
			                </td> -->
						</tr>
					</tbody>
				</table> 
			</div>
		</div>
		</div>

      <?=$ViewCopyRight?>
    </div>

  </div><!-- mainpanel -->

</section>

<?=$ViewFooter?>

<script type="text/javascript">
  app.controller('UserRequest', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
    	$scope.AngularService   = AngularService;
    	$scope.List             = <?=json_encode($List)?>;
        $scope.Member           = <?=json_encode($Member)?>;
    };
console.log($scope.List);
    (function () {
        // FlightSearch.startLoadingPage("Your transaction is being processed. Please be patient");
        $scope.init();
        $('#ParentUsers').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenAllUser').addClass('active');

        getDatatablesContent();

    })();

    function getDatatablesContent(){
        $scope.columnDefs = [];

        $scope.columnDefs.push(
            {className: "text-left",orderable: true,targets: [0], visible: true}, // No
            {className: "text-left",orderable: true,targets: [1], visible: true}, //  Discount
            {className: "text-left",orderable: true,targets: [2], visible: true}, // QTY
            {className: "text-left",orderable: true,targets: [3], visible: true},   //  Start date
            {className: "text-left",orderable: true,targets: [4], visible: true},   // End date
            {className: "text-left",orderable: true,targets: [5], visible: true}, // Action
        );

        setTimeout(function() {
            var table = $('#datatable').DataTable({
                "sPaginationType": "full_numbers",
                destroy: true,
                "lengthChange": false,
                "aaSorting": [],
                buttons: {
                    buttons: []
                },
                columnDefs: $scope.columnDefs
            });
        }, 300);
    };
    
    // $scope.GoToAddNewUser = function() {
    //     window.location.href = adminUrl+'users/add';
    // };

    // $scope.GoToDetailUser = function(UserId) {
    //     window.location.href = adminUrl+'users/add/'+UserId;
    // };

    $scope.acceptSeller = function(user) {
        var c = confirm("Are you sure you want to accept this request?");
          if(c) {
            AngularService.startLoadingPage();
            $http.post(
                adminUrl+'crud_user/acceptSeller',
                user
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
    };

    $scope.rejectSeller = function(UserId) {
        var c = confirm("Are you sure you want to reject this request?");
          if(c) {
            AngularService.startLoadingPage();
            $http.post(
                adminUrl+'crud_user/rejectSeller',
                {'UserId': UserId}
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
    };
    
    $scope.acceptBuyer = function(user) {
        var c = confirm("Are you sure you want to accept this request?");
          if(c) {
            AngularService.startLoadingPage();
            $http.post(
                adminUrl+'crud_user/acceptBuyer',
                user
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
    };

    $scope.rejectBuyer = function(UserId) {
        var c = confirm("Are you sure you want to reject this request?");
          if(c) {
            AngularService.startLoadingPage();
            $http.post(
                adminUrl+'crud_user/rejectBuyer',
                {'UserId': UserId}
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
    };

    $scope.submitDoc = function(doc) {
        var c = confirm("Are you sure you want to submit this document?");
          if(c) {
            AngularService.startLoadingPage();
            $http.post(
                adminUrl+'crud_user/submitDokumen',
                doc
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
    };

    $scope.submitDocAll = function(doc) {
        var c = confirm("Are you sure you want to submit all documents?");
          if(c) {
            AngularService.startLoadingPage();
            $http.post(
                adminUrl+'crud_user/submitAllDokumen',
                doc
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
    };

  }); // --- end angular controller --- //
</script>

</body>
</html>