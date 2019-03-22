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
                                    {{ Reservation.OrderId }} ( {{ Reservation.PaymentStatus }} ) 
                                    <text ng-if="Reservation.PaymentType && Reservation.BankName"> / 
                                        {{ Reservation.PaymentType }} - 
                                        {{ Reservation.BankName }}
                                    </text>
                                </h4>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;"><strong>BUYER CONTACT</strong></td>
                            <td><strong> 
                                {{ Reservation.ContactName }} <br/> 
                                Email : {{ Reservation.Reservation.Booker.Email }} <br/> 
                                Phone:  {{ Reservation.Reservation.Booker.MobilePhone }}
                            </strong></td>
                        </tr>
                        <tr ng-if="Reservation.ReffId">
                            <td><strong> Reff Id </strong></td>
                            <td><strong> {{ Reservation.ReffId }} </strong></td>
                        </tr>
                        <tr>
                            <td><strong> ORDER DATE </strong></td>
                            <td><strong> {{ Reservation.Reservation.CreatedDateView }} </strong></td>
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
                    <tbody>
                        <!-- <tr>
                            <td><strong>Booking Code</strong></td>
                            <td>{{ Reservation.RsvResponse.BookingCode }}</td>
                        </tr> -->
                        <tr>
                            <td><strong>Hotel Name</strong></td>
                            <td>{{ Reservation.Reservation.Response.Confirmation.HotelName }}</td>
                        </tr>
                        <tr ng-if="Reservation.Reservation.BookingResponse.BookingCode">
                            <td><strong>Booking Code</strong></td>
                            <td>{{ Reservation.Reservation.BookingResponse.BookingCode }}</td>
                        </tr>
                        <tr>
                            <td><strong>Booking Status</strong></td>
                            <td>
                                {{ Reservation.Reservation.BookingResponse.Status }}
                                <button ng-if="Reservation.Reservation.PnrId" ng-click="RefreshStatus()" class="btn btn-primary btn-xs mr5 sync-server">Refresh</button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Time Limit</strong></td>
                            <td>{{ Reservation.Reservation.PaymentTimeoutView }}</td>
                        </tr>
                        <tr>
                            <td><strong>Check-in Date</strong></td>
                            <td>{{ Reservation.Reservation.Response.Confirmation.CheckInDateView }}</td>
                        </tr>
                        <tr>
                            <td><strong>Check-out Date</strong></td>
                            <td>{{ Reservation.Reservation.Response.Confirmation.CheckOutDateView }}</td>
                        </tr>
                        <tr>
                            <td><strong>Night Stay</strong></td>
                            <td>{{ Reservation.Reservation.Response.Confirmation.TotalNight }}</td>
                        </tr>
                        <tr>
                            <td><strong>Room</strong></td>
                            <td>{{ Reservation.Reservation.Response.Confirmation.RoomName }}</td>
                        </tr>
                        <tr>
                            <td><strong>Meal</strong></td>
                            <td>{{ Reservation.Reservation.Response.Confirmation.BreakfastName }}</td>
                        </tr>
                        <tr>
                            <td><strong>Star Rating</strong></td>
                            <td>{{ Reservation.Reservation.Response.Confirmation.StarRating }}</td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td>{{ Reservation.Reservation.Response.Confirmation.Address }}</td>
                        </tr>
                        <tr>
                            <td><strong>Remark</strong></td>
                            <td>{{ Reservation.Reservation.Booker.ExtraData1 }}</td>
                        </tr>
                        <!-- <tr>
                            <td>
                                <strong>
                                    Status 
                                    <button ng-if="Reservation.RsvResponse.Status != 'Ticketed' " ng-click="RefreshStatus(Reservation.PnrId, Reservation.OrderId, 1)" data-pnr="" class="btn btn-primary btn-xs mr5 sync-server">Refresh</button>
                                </strong>
                            </td>
                            <td>{{ Reservation.RsvResponse.Status }}</td>
                            <td ng-if="Reservation.length > 1">
                                <strong>Status 
                                <button ng-if="Reservation[1].RsvResponse.Status != 'Ticketed' " ng-click="RefreshStatus(Reservation[1].PnrId, Reservation[1].OrderId, 1)" data-pnr="" class="btn btn-primary btn-xs mr5 sync-server">Refresh</button>
                                </strong>
                            </td>
                            <td ng-if="Reservation.length > 1">{{ Reservation[1].RsvResponse.Status }}</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <!-- End Reservation Detail -->

            <!-- Passenger Detail -->
            <div class="bg-primary">
                <strong>Guest Details</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Voucher Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="Guest in Reservation.Reservation.Guest">
                            <td> {{ $index+1 }} </td>
                            <td> {{ Guest.Title }} </td>
                            <td>
                                {{ Guest.FirstName+' '+Guest.LastName  }}
                            </td>
                            <td> {{ Guest.IdNumber }} </td>
                            <td> {{ Guest.TicketNumber }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Passenger Detail -->


            <!-- Discount Detail -->
            <div class="bg-primary" ng-if="Reservation.UseDiscount">
                <strong>Discount Detail</strong>
            </div>
            <div class="table-responsive" ng-if="Reservation.UseDiscount">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong> Discount Code </strong></td>
                            <td><strong> {{ Reservation.DiscountDetail.DiscountCode }} </strong></td>
                        </tr>
                        <tr>
                            <td><strong> Discount Type </strong></td>
                            <td><strong> {{ Reservation.DiscountDetail.DiscountType }} </strong></td>
                        </tr>
                        <tr>
                            <td><strong> Discount Nominal </strong></td>
                            <td><strong> {{ Reservation.DiscountDetail.DiscountNominal }} </strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Discount Detail -->

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
                            <td> {{ Reservation.PriceBeforeDiscount }} IDR</td>
                        </tr>
                        <tr ng-if="Reservation.TotalDiscount > 0">
                            <td>DISCOUNT : </td>
                            <td> {{ AngularService.numberFormatClean(Reservation.TotalDiscount) }} IDR</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL PRICE : </strong></td>
                            <td> {{ Reservation.TotalPrice }} IDR</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Price Total -->

            <!-- Button Action -->
            <button 
                ng-click="IssuedTicket()" 
                ng-if="ShowIssuedButton()" 
                class="btn btn-primary mr5"><i class="fa fa-ticket mr5"></i> 
                Issue Ticket
            </button>

            <button 
                ng-click="ReSendMail(0)" 
                class="btn btn-info mr5"><i class="fa fa-envelope mr5"></i> 
                Resend Email
            </button>

            <button 
                ng-click="CancelBooking()" 
                ng-if="Reservation.Reservation.PnrId && Reservation.Reservation.StatusBooking == 1" 
                class="btn btn-danger mr5"><i class="fa fa-ban mr5"></i> 
                Cancel Booking
            </button>

            <button 
                ng-click="MakePaymentInValid()" 
                ng-if="Reservation.PaymentStatusId > 2 &&  Reservation.PayType == 1" 
                class="btn btn-warning mr5"><i class="fa fa-dollar mr5"></i> 
                Make Payment Invalid
            </button>

            <button 
                ng-click="MakePaymentValid()" 
                ng-if="Reservation.PaymentStatusId == 2 &&  Reservation.PayType == 1"
                class="btn btn-success mr5 valid-payment"><i class="fa fa-dollar mr5"></i> 
                Make Payment Valid
            </button>

           <!--  <button 
                ng-if="Reservation.PaymentStatusId == 3 &&  Reservation.PaymentTypeOri != 1" 
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
        $scope.Reservation     = <?=json_encode($RsvArr)?>;
    };

    (function () {
        // FlightSearch.startLoadingPage("Your transaction is being processed. Please be patient");
        $scope.init();
        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenTransactionsHotel').addClass('active');
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
        if ( (!$scope.Reservation.Reservation.StatusBooking || !$scope.Reservation.Reservation.PnrId) && $scope.Reservation.PaymentStatusId == 3) {
            return true;
        }
        return false;
    }

    $scope.CancelBooking = function()
    {
        AngularService.startLoadingPage();
        $http.post(
            "<?=base_url('api/hotel/CancelBooking')?>",
            {'OrderId' : $scope.Reservation.OrderId, 'PnrId' : $scope.Reservation.Reservation.PnrId},
            {timeout: 120*1000} // 120 seconds
        ).then(function successCallback(resp) {
            console.log(resp);
            if (resp.data.Status == 0) {
                $scope.ErrorResponse(resp.data.message);
            }
            else if (resp.data.Status == 1) {
                $scope.getReservation($scope.Reservation.OrderId, $scope.Reservation.Reservation.PnrId);
            }
        }, function errorCallback(err) {
            console.log(err);
            $scope.ErrorResponse(err);
        });
    }

    $scope.getReservation = function(OrderId, PnrId) {
        AngularService.startLoadingPage();
        $http.post(
            "<?=base_url('api/hotel/getReservation')?>",
            {'OrderId' : OrderId, 'PnrId' : PnrId},
            {timeout: 120*1000} // 120 seconds
        ).then(function successCallback(resp) {
            console.log(resp);
            AngularService.stopLoadingPage();
            if (resp.data.Status == 0) {
                $scope.ErrorResponse(resp.data['message']);
            }
            else if (resp.data.Status == 1) {
                $scope.SuccessResponse();
            }
        }, function errorCallback(err) {
            console.log(err);
            $scope.ErrorResponse(err);
        }); 
    }

    $scope.RefreshStatus = function()
    {
        $scope.getReservation($scope.Reservation.OrderId, $scope.Reservation.Reservation.PnrId);
    }

    $scope.ReSendMail = function(type) {
        AngularService.startLoadingPage();
        $http.post(
            "<?=base_url('api/emailHotel/sendMailPayment')?>",
            {'OrderId' : $scope.Reservation.OrderId, 'ReSendMail':true},
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
            {'OrderId' : $scope.Reservation.OrderId},
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
            {'OrderId' : $scope.Reservation.OrderId},
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

    $(document).ready(function() {
        if (!$scope.Reservation.Reservation.BookingResponse && $scope.Reservation.PaymentStatusId == 3) {
            $scope.RefreshStatus();
        }
    });

  }); // --- end angular controller --- //
</script>

</body>
</html>