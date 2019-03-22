<?=$ViewHead?>
<body ng-controller="TransactionController">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <!-- start search -->
    <div class="row">
        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading bg-brown-900 navbar-xs">
                    <h6 class="panel-title">
                        <i class="glyphicon  glyphicon-filter position-left"></i>Filter
                    </h6>
                </div>

                <div class="panel-body">
                    <div class="row mb10">
                        <!-- Payment Status -->
                        <div class="col-md-6">
                            <label class="control-label">Payment Status</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                                <select 
                                  class="form-control"
                                  ng-model="HeadSearch.PaymentStatus" 
                                  required>
                                <option value="all">-- Select All --</option>
                                <option value="payment_completed"> Payment Complete </option>
                                <option value="waiting_payment"> Waiting Payment </option>
                                <option value="waiting_validation"> Waiting Validation </option>
                                <option value="expired"> Expired </option>
                          </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Use Discount -->
                        <div class="col-md-6">
                            <label class="control-label">Use Discount</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                                <select 
                                  class="form-control"
                                  ng-model="HeadSearch.UseDiscount" 
                                  required>
                                <option value="all">-- Select All --</option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                          </select>
                            </div>
                        </div>
                    </div>
                    <hr />

                    <div class="row" ng-if="HeadSearch.UseDiscount == 'yes'">
                        <!-- Use Discount -->
                        <div class="col-md-6">
                            <label class="control-label">Discount Code</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="text" ng-model="HeadSearch.DiscountCode" class="form-control">
                          </select>
                            </div>
                        </div>
                    </div>
                    <hr ng-if="HeadSearch.UseDiscount == 'yes'" />

                    <div class="row">
                        <div class="col-md-12">
                            <div class="">

                                <button type="button" class="btn btn bg-slate-700" id="submitSearch" ng-click="klikSearch()"
                                   style="width: 100px">
                                    <i id="BtnSave" class="fa fa-search"></i>
                                    <i id="BtnLoadingSearch" class="fa fa-spinner fa fa-spin"></i></i>&nbsp;Search
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div ng-if="ShowList" class="contentpanel cs_df">   
		<div class="panel panel-default">
        <div class="panel-body">
			<div class="mb10"></div>
			<div class="table-responsive">
				<table class="table" id="datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>OrderId</th>
							<th>Date</th>
							<th>Flight</th>
							<th>Adults</th>
							<th>Price (IDR)</th>
                            <th>Discount</th>
							<th>Payment Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="data in List" ng-class="{'bold' : data.PayIsRead == 0}">
							<td>
                                {{ $index+1 }} 
                            </td>
							<td>
                                {{ data.OrderId }} <br/> {{ data.ContactName }} 
                            </td>
                            <td>
                                {{ data.CreatedDate }} 
                            </td>
							<td>
                                ({{ data.OrderCount }}) - {{ data.FlightOrigin+' - '+data.FlightDestination }}
                            </td>
							<td>
                                {{ data.Adult }}
                            </td>
							<td>
                                {{ data.TotalPrice }}
                            </td>
                            <td>
                                {{ data.UseDiscount }}
                            </td>
							<td>
                                {{ data.PaymentStatus }} <br/> 
                                <text ng-if="data.PaymentType && data.BankName">({{ data.PaymentType }} - {{ data.BankName }})</text>
                            </td>
							<td class="table-action">
			                    <a ng-click="GoToDetailOrder(data.OrderId)" class="tooltipx pointer">
                                    <i class="fa fa-eye"></i><span>Detail Transaction</span>
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
        $scope.List = [];
        $scope.ShowList = false;
        $scope.HeadSearch = {
            'PaymentStatus' : 'all',
            'UseDiscount' : 'all',
            'DiscountCode' : ''
        }
    };

    (function () {
        // FlightSearch.startLoadingPage("Your transaction is being processed. Please be patient");
        $scope.init();
        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenTransactions').addClass('active');
        $('#BtnLoadingSearch').hide();
    })();

    $scope.klikSearch = function(){
        $scope.ShowList = false;
        $('#BtnLoadingSearch').show();
        $("#submitSearch").attr('disabled', true);

        $http.post(adminUrl+ 'manages/ListTransaction', {'data':$scope.HeadSearch}).then(function (result) {
            $('#BtnLoadingSearch').hide();
            $("#submitSearch").attr('disabled', false);
            $scope.ShowList = true;
            $scope.List = result.data;
            getDatatablesContent();
        });
    };

    function getDatatablesContent(){
        $scope.columnDefs = [];

        $scope.columnDefs.push(
            {className: "text-left",orderable: true,targets: [0], visible: true}, // No
            {className: "text-left",orderable: true,targets: [1], visible: true}, //  Date
            {className: "text-left",orderable: true,targets: [2], visible: true}, // OrderId
            {className: "text-left",orderable: true,targets: [3], visible: true},   //  Flight
            {className: "text-left",orderable: true,targets: [4], visible: true},   // Adult
            {className: "text-left",orderable: true,targets: [5], visible: true}, // Price
            {className: "text-left",orderable: true,targets: [6], visible: true}, // Use Discount
            {className: "text-left",orderable: true,targets: [7], visible: true}, // Payment Status
            {className: "text-right",orderable: false,targets: [8], visible: true}, // Action
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

    $scope.GoToDetailOrder = function(OrderId) {
        window.location.href = adminUrl+'manages/detailTransaction/'+OrderId;
    };

    

  }); // --- end angular controller --- //
</script>

</body>
</html>