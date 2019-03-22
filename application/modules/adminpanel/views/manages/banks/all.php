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
                <a class="pointer" ng-click="GoToAddNewBank()">
                    <span class="fa fa-plus"></span>&nbsp;&nbsp;Add New
                </a>
            </div>
			<div class="table-responsive">
				<table class="table" id="datatable">
					<thead>
						<tr>
							<th>No</th>
                            <th>Bank Image</th>
							<th>Bank Name</th>
							<th>Account</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="data in List">
                            <td>
                                {{ $index+1 }}
                            </td>
                            <td>
                                <img src="{{ ImageBankUrl+data.ImageUrl }}" style="max-width: 72px;"> 
                            </td>
                            <td>
                                {{ data.BankName }} 
                            </td>
                            <td>
                                {{ data.RekeningNo }} <br/> ({{ data.RekeningName }})
                            </td>
							<td class="table-action">
			                    <a ng-click="GoToDetailBank(data.BankId)" class="tooltipx pointer">
                                    <i class="fa fa-pencil"></i><span>Edit Bank</span>
                                </a>
                                <a ng-click="DeleteBank(data.BankId)" class="tooltipx pointer">
                                    <i class="fa fa-trash-o"></i><span>Delete Bank</span>
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
        $scope.ImageBankUrl = "<?=base_url('assets/images/bank/')?>";
    	$scope.AngularService = AngularService;
    	$scope.List = <?=json_encode($List)?>;
    };

    (function () {
        // FlightSearch.startLoadingPage("Your transaction is being processed. Please be patient");
        $scope.init();
        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenBanks').addClass('active');

        getDatatablesContent();

    })();
    // AngularService

    function getDatatablesContent(){
        $scope.columnDefs = [];

        $scope.columnDefs.push(
            {className: "text-left",orderable: true,targets: [0], visible: true}, // No
            {className: "text-left",orderable: true,targets: [1], visible: true}, //  Bank name
            {className: "text-left",orderable: true,targets: [2], visible: true}, // Account
            {className: "text-left",orderable: true,targets: [3], visible: true},   //  Action
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

    $scope.GoToAddNewBank = function() {
        window.location.href = adminUrl+'manages/addBank/';
    };

    $scope.GoToDetailBank = function(BankId) {
        window.location.href = adminUrl+'manages/detailBank/'+BankId;
    };

    $scope.DeleteBank = function(BankId) {
        var c = confirm("Are you sure you want to delete this data?");
          if(c) {
            AngularService.startLoadingPage();
            $http.post(
                adminUrl+'crud/deleteBank',
                {'BankId': BankId}
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