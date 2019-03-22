<?=$ViewHead?>
<body ng-controller="TransactionController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">   
		<div class="panel panel-default">
        <div class="panel-body">
			<div class="mb10">
                <a class="pointer" ng-click="GoToAddNewDiscount()">
                    <span class="fa fa-plus"></span>&nbsp;&nbsp;Add New
                </a>
            </div>
			<div class="table-responsive">
				<table class="table" id="datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>Discount</th>
							<th>QTY</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="data in List">
                            <td>
                                {{ $index+1 }}
                            </td>
                            <td>
                                {{ data.VoucherCode }} <br/> ({{ data.TotalDiscount }})
                            </td>
                            <td>
                                {{ data.Stock }} / {{ data.Qty }}
                            </td>
                            <td> {{ data.StartDate }} </td>
                            <td> {{ data.EndDate }} </td>
							<td class="table-action">
			                    <a ng-click="GoToDetailDiscount(data.DiscountId)" class="tooltipx pointer">
                                    <i class="fa fa-pencil"></i><span>Edit Discount</span>
			                    </a>
                                <a ng-click="DeleteDiscount(data.DiscountId)" class="tooltipx pointer">
                                    <i class="fa fa-trash-o"></i><span>Delete Discount</span>
                                </a>
			                </td>
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
  app.controller('TransactionController', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
    	$scope.AngularService = AngularService;
    	$scope.List = <?=json_encode($List)?>;
    };

    (function () {
        // FlightSearch.startLoadingPage("Your transaction is being processed. Please be patient");
        $scope.init();
        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenDiscounts').addClass('active');

        getDatatablesContent();

    })();
    // AngularService

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
    
    $scope.GoToAddNewDiscount = function() {
        window.location.href = adminUrl+'manages/addDiscount/';
    };

    $scope.GoToDetailDiscount = function(DiscountId) {
        window.location.href = adminUrl+'manages/detailDiscount/'+DiscountId;
    };

    $scope.DeleteDiscount = function(DiscountId) {
        var c = confirm("Are you sure you want to delete this data?");
          if(c) {
            AngularService.startLoadingPage();
            $http.post(
                adminUrl+'crud/deleteDiscount',
                {'DiscountId': DiscountId}
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