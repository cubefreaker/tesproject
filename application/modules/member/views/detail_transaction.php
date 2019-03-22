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

            <!-- General Detail -->
            <div class="bg-primary">
                <strong>General</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><h4 class="text-primary">ORDER ID</h4></td>
                            <td>
                                <h4 class="text-primary">
                                    {{ List[0].OrderId }} ( {{ List[0].PaymentStatus }} ) 
                                    <text ng-if="List[0].PaymentType && List[0].BankName"> / 
                                        {{ List[0].PaymentType }} - 
                                        {{ List[0].BankName }}
                                    </text>
                                </h4>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;"><strong>BUYER CONTACT</strong></td>
                            <td><strong> 
                                {{ List[0].ContactName }} <br/> 
                                Email : {{ List[0].RsvResponse.Contact.Email }} <br/> 
                                Phone:  {{ List[0].RsvResponse.Contact.MobilePhone }}
                            </strong></td>
                        </tr>
                        <tr ng-if="List[0].ReffId">
                            <td><strong> Reff Id </strong></td>
                            <td><strong> {{ List[0].ReffId }} </strong></td>
                        </tr>
                        <tr>
                            <td><strong> ORDER DATE </strong></td>
                            <td><strong> {{ List[0].OrderDate }} </strong></td>
                        </tr>
                        <tr>
                            <td><strong> DUE DATE </strong></td>
                            <td><strong> {{ List[0].DueDate }} </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End General Detail -->

            <!-- Reservation Detail -->
            <div class="bg-primary">
                <strong>Reservation Details</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead ng-show="List.length > 1">
                        <tr>
                            <th colspan="2">Depart</th>
                            <th colspan="2">Return</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Booking Code</strong></td>
                            <td>{{ List[0].RsvResponse.BookingCode }}</td>
                            <td ng-if="List.length > 1"><strong>Booking Code</strong></td>
                            <td ng-if="List.length > 1">{{ List[1].RsvResponse.BookingCode }}</td>
                        </tr>
                        <tr>
                            <td><strong>Airline</strong></td>
                            <td>{{ List[0].AirlineName }}</td>
                            <td ng-if="List.length > 1"><strong>Airline</strong></td>
                            <td ng-if="List.length > 1">{{ List[1].AirlineName }}</td>
                        </tr>
                        <tr>
                            <td><strong>Time Limit</strong></td>
                            <td>{{ List[0].TimeLimit }}</td>
                            <td ng-if="List.length > 1"><strong>Time Limit</strong></td>
                            <td ng-if="List.length > 1">{{ List[1].TimeLimit }}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Status 
                                    <button ng-if="List[0].RsvResponse.Status != 'Ticketed' " ng-click="RefreshStatus(List[0].PnrId, List[0].OrderId, 1)" data-pnr="" class="btn btn-primary btn-xs mr5 sync-server">Refresh</button>
                                </strong>
                            </td>
                            <td>{{ List[0].RsvResponse.Status }}</td>
                            <td ng-if="List.length > 1">
                                <strong>Status 
                                <button ng-if="List[1].RsvResponse.Status != 'Ticketed' " ng-click="RefreshStatus(List[1].PnrId, List[1].OrderId, 1)" data-pnr="" class="btn btn-primary btn-xs mr5 sync-server">Refresh</button>
                                </strong>
                            </td>
                            <td ng-if="List.length > 1">{{ List[1].RsvResponse.Status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Reservation Detail -->

            <!-- Passenger Detail -->
            <div class="bg-primary">
                <strong>Passengger Details</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Id Number</th>
                            <th>Ticket Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="Passenger in List[0].RsvResponse.Passengers">
                            <td> {{ $index+1 }} </td>
                            <td>
                                ({{ Passenger.Type }}) {{ Passenger.Title+' '+Passenger.FirstName+' '+Passenger.LastName  }}
                            </td>
                            <td> {{ Passenger.IdNumber }} </td>
                            <td> {{ Passenger.TicketNumber }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Passenger Detail -->

            <!-- Itinerary Detail -->
            <div class="bg-primary">
                <strong>Itinerary Details</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Flight</th>
                            <th>Departing</th>
                            <th>Arriving</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="FlightDetail in List[0].FlightDetails">
                            <td> {{ FlightDetail.AirlineName+' '+FlightDetail.FlightNumber }} </td>
                            <td>
                                {{ FlightDetail.AirportDepartName+' ('+FlightDetail.Origin+')' }} <br/>
                                {{ FlightDetail.DepartDateView }}
                            </td>
                            <td>
                                {{ FlightDetail.AirportArriveName+' ('+FlightDetail.Destination+')' }} <br/>
                                {{ FlightDetail.ArriveDateView }}
                            </td>
                            <td> {{ FlightDetail.Class }} </td>
                        </tr>
                        <tr ng-repeat="FlightDetail in List[1].FlightDetails">
                            <td> {{ FlightDetail.AirlineName+' '+FlightDetail.FlightNumber }} </td>
                            <td>
                                {{ FlightDetail.AirportDepartName+' ('+FlightDetail.Origin+')' }} <br/>
                                {{ FlightDetail.DepartDateView }}
                            </td>
                            <td>
                                {{ FlightDetail.AirportArriveName+' ('+FlightDetail.Destination+')' }} <br/>
                                {{ FlightDetail.ArriveDateView }}
                            </td>
                            <td> {{ FlightDetail.Class }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Itinerary Detail -->

            <!-- Price Total  -->
            <div class="bg-primary">
                <strong>Price Details</strong>
            </div>
            <div class="table-responsive">
                <table class="table table-total">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td>PRICE : </td>
                            <td> {{ List[0].PriceBeforeDiscount }} IDR</td>
                        </tr>
                        <tr ng-if="List[0].TotalDiscount > 0">
                            <td>DISCOUNT : </td>
                            <td> {{ AngularService.numberFormatClean(List[0].TotalDiscount) }} IDR</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL PRICE : </strong></td>
                            <td> {{ List[0].TotalPrice }} IDR</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Price Total -->

            <!-- Button Action -->
            <button 
                ng-click="IssuedTicket()" 
                ng-if="ShowIssuedButton()" 
                class="btn btn-primary mr5 issue-ticket"><i class="fa fa-ticket mr5"></i> 
                Issue Ticket
            </button>

            <button 
                ng-click="ReSendMail(0)" 
                class="btn btn-info mr5 resend-email"><i class="fa fa-envelope mr5"></i> 
                Resend Email
            </button>

            <button 
                ng-click="MakePaymentInValid()" 
                ng-if="List[0].PaymentStatusId > 2 &&  List[0].PaymentTypeOri == 1" 
                class="btn btn-warning mr5 invalid-payment"><i class="fa fa-dollar mr5"></i> 
                Make Payment Invalid
            </button>

            <button 
                ng-click="MakePaymentValid()" 
                ng-if="List[0].PaymentStatusId == 2 &&  List[0].PaymentTypeOri == 1"
                class="btn btn-success mr5 valid-payment"><i class="fa fa-dollar mr5"></i> 
                Make Payment Valid
            </button>

           <!--  <button 
                ng-if="List[0].PaymentStatusId == 3 &&  List[0].PaymentTypeOri != 1" 
                class="btn btn-warning mr5 void-cc-payment"><i class="fa fa-dollar mr5"></i> 
                Void Payment
            </button> -->
            <!-- End Button Action -->

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
        $scope.List     = <?=json_encode($List)?>;
    };

    (function () {
        // FlightSearch.startLoadingPage("Your transaction is being processed. Please be patient");
        $scope.init();
        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenTransactions').addClass('active');
    })();

    $scope.SuccessResponse = function()
    {
        swal({
            title: "Succes",
            text: "",
            type:"success",
            allowOutsideClick: false,
            confirmButtonText: "OK"
        }).then(function() {
            location.reload();
        }, function(dismiss) {
            location.reload();
        });
    }

    $scope.SuccessResponseNoReload = function()
    {
        swal({
            title: "Succes",
            text: "",
            type:"success",
            allowOutsideClick: false,
            confirmButtonText: "OK"
        }).then(function() {
            // location.reload();
        }, function(dismiss) {
            // location.reload();
        });
    }

    $scope.ErrorResponse = function(message)
    {
        AngularService.stopLoadingPage();
        swal({
            title: "Failed",
            text: message,
            type:"error",
            allowOutsideClick: false,
            confirmButtonText: "OK"
        });
    }

    $scope.ShowIssuedButton = function()
    {
        if ($scope.List.length > 1) {
            if($scope.List[0].PaymentStatusId == 3  && $scope.List[0].IsTicketExpired == false &&
            $scope.List[1].PaymentStatusId == 3  && 
            $scope.List[1].IsTicketExpired == false &&  ($scope.List[0].RsvResponse.Statis != 'Ticketed' ||  $scope.List[1].RsvResponse.Statis != 'Ticketed')
            ) {
                return true;
            }
        }
        else {
            if($scope.List[0].PaymentStatusId == 3 &&  $scope.List[0].RsvResponse.Statis != 'Ticketed' && $scope.List[0].IsTicketExpired == false){
                return true;
            }
        }
        return false;
    }

    $scope.IssuedTicket = function() {
        AngularService.startLoadingPage();
        if ($scope.List.length == 1) {
            $http.post(
                "<?=base_url('api/flight/IssuedTicket')?>",
                {'PnrId' : $scope.List[0].PnrId, 'OrderId' : $scope.List[0].OrderId},
                {timeout: 120*1000} // 120 seconds
            ).then(function successCallback(resp) {
                console.log(resp);
                if (resp.data['StatusResponse'] == 0) {
                    $scope.ErrorResponse(resp.data['Message']);
                }
                else if (resp.data['StatusResponse'] == 1) {
                    // $scope.SuccessResponse();
                    $scope.RefreshStatus($scope.List[0].PnrId, $scope.List[0].OrderId, 2);
                }
            }, function errorCallback(err) {
                console.log(err);
                $scope.ErrorResponse(err);
            });
        }
        else if ($scope.List.length == 2) {
            $http.post(
                "<?=base_url('api/flight/IssuedTicket')?>",
                {'PnrId' : $scope.List[0].PnrId, 'OrderId' : $scope.List[0].OrderId},
                {timeout: 120*1000} // 120 seconds
            ).then(function successCallback(resp) {
                console.log(resp);
                if (resp.data['StatusResponse'] == 0) {
                    AngularService.stopLoadingPage();
                    $scope.ErrorResponse(resp.data['Message']);
                }
                else if (resp.data['StatusResponse'] == 1) {
                    $scope.RefreshStatus($scope.List[0].PnrId, $scope.List[0].OrderId, 3);
                    $http.post(
                        "<?=base_url('api/flight/IssuedTicket')?>",
                        {'PnrId' : $scope.List[1].PnrId, 'OrderId' : $scope.List[1].OrderId},
                        {timeout: 120*1000} // 120 seconds
                    ).then(function successCallback(resp2) {
                        console.log(resp2);
                        if (resp2.data['StatusResponse'] == 0) {
                            $scope.ErrorResponse(resp2.data['Message']);
                        }
                        else if (resp2.data['StatusResponse'] == 1) {
                            $scope.RefreshStatus($scope.List[1].PnrId, $scope.List[1].OrderId, 2);
                        }
                    }, function errorCallback(err) {
                        AngularService.stopLoadingPage();
                        console.log(err);
                        $scope.ErrorResponse(err);
                    });
                }
            }, function errorCallback(err) {
                console.log(err);
                $scope.ErrorResponse(err);
            });
        }
    }

    $scope.RefreshStatus = function(PnrId, OrderId, type) {
        AngularService.startLoadingPage();
        $http.post(
            "<?=base_url('api/flight/getReservation')?>",
            {'PnrId' : PnrId, 'Action' : 'RefreshStatus', 'OrderId' : OrderId},
            {timeout: 120*1000} // 120 seconds
        ).then(function successCallback(resp) {
            console.log(resp);
            if (resp.data['StatusResponse'] != 1) {
                $scope.ErrorResponse(resp.data['Message']);
            }
            else if (resp.data['StatusResponse'] == 1) {
                if (type == 1) {
                    AngularService.stopLoadingPage();
                    $scope.SuccessResponse();
                }
                else if (type == 2) {
                    $scope.ReSendMail(1);
                }
                else if (type == 3){
                    return true;
                }
            }
            else {
                return false;
            }
        }, function errorCallback(err) {
            console.log(err);
            if (type == 3) {
                return false;
            }
            AngularService.stopLoadingPage();
            $scope.ErrorResponse(err);
        });    
    }

    $scope.ReSendMail = function(type) {
        AngularService.startLoadingPage();
        $http.post(
            "<?=base_url('api/email/sendMailPayment')?>",
            {'OrderId' : $scope.List[0].OrderId, 'ReSendMail':true},
            {timeout: 120*1000} // 120 seconds
        ).then(function successCallback(resp) {
            console.log(resp);
            AngularService.stopLoadingPage();
            if (resp.data['response_status'] == 0) {
                $scope.ErrorResponse(resp.data['message']);
            }
            else if (resp.data['response_status'] == 1) {
                if (type == 0) {
                    $scope.SuccessResponseNoReload();
                }
                if (type == 1) {
                    $scope.SuccessResponse();
                }
            }
        }, function errorCallback(err) {
            console.log(err);
            $scope.ErrorResponse(err);
        });    
    }

    $scope.MakePaymentValid = function() {
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'ajax/makePaymentValid',
            {'OrderId' : $scope.List[0].OrderId},
            {timeout: 120*1000} // 120 seconds
        ).then(function successCallback(resp) {
            console.log(resp);
            AngularService.stopLoadingPage();
            if (resp.data['StatusResponse'] == 0) {
                $scope.ErrorResponse(resp.data['Message']);
            }
            else if (resp.data['StatusResponse'] == 1) {
                $scope.SuccessResponse();
            }
        }, function errorCallback(err) {
            console.log(err);
            $scope.ErrorResponse(err);
        });    
    }

    $scope.MakePaymentInValid = function() {
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'ajax/makePaymentInValid',
            {'OrderId' : $scope.List[0].OrderId},
            {timeout: 120*1000} // 120 seconds
        ).then(function successCallback(resp) {
            console.log(resp);
            AngularService.stopLoadingPage();
            if (resp.data['StatusResponse'] == 0) {
                $scope.ErrorResponse(resp.data['Message']);
            }
            else if (resp.data['StatusResponse'] == 1) {
                $scope.SuccessResponse();
            }
        }, function errorCallback(err) {
            console.log(err);
            $scope.ErrorResponse(err);
        });    
    }


  }); // --- end angular controller --- //
</script>

</body>
</html>