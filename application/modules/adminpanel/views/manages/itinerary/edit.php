<?=$ViewHead?>
<script type='text/javascript' src="<?=base_url('assets/lib/plugins/jscolor/jscolor.js')?>"></script>
<body ng-controller="Controller">
<?=$ViewPreLoader?>

<section>
	<?=$ViewLeftPanel?>
	<div class="mainpanel">
	<?=$ViewHeaderBar?>

    <div class="contentpanel cs_df">  
        <form id="FormAdd" class="form-horizontal" method="post" enctype="multipart/form-data" name="ItineraryInfo">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
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

                    <!-- Title Footer -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Title Footer <span class="asterisk">*</span></label>
                        <div class="col-sm-6">
                          <input ng-model="SettingItinerary.Text.footer_title.text" type="text" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Color -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Title Color</label>
                        <div class="col-sm-3">
                          <input class="jscolor form-control" ng-model="SettingItinerary.Text.footer_title.color" type="text" class="form-control"/>
                        </div>
                    </div>

                    <!--  Contact -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact <span class="asterisk">*</span></label>
                        <div class="col-sm-6">
                          <input ng-model="SettingItinerary.Text.footer_contact.text" type="text" class="form-control" required/>
                        </div>
                    </div>

                    <!-- Contact Color -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Color</label>
                        <div class="col-sm-3">
                          <input class="jscolor form-control" ng-model="SettingItinerary.Text.footer_contact.color" type="text" class="form-control"/>
                        </div>
                    </div>

                    <!-- Is Use Logo Footer -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Use Logo Footer</label>
                        <div class="col-sm-9">
                          <div class="ckbox ckbox-primary mt_5">
                            <input ng-init="SettingItinerary.ImageFooter ? SettingItinerary.UseFooterLogo = true : false" ng-model='SettingItinerary.UseFooterLogo' type="checkbox"  id="UseFooterLogo"/>
                            <label for="UseFooterLogo"></label>
                          </div>
                        </div>
                    </div>

					<!-- Bank Image -->
                    <div ng-if="SettingItinerary.UseFooterLogo" class="form-group">
                        <label class="col-sm-3 control-label">Logo Footer</label>
                        <div class="col-sm-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                  <div class="uneditable-input">
                                    <i class="glyphicon glyphicon-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                  </div>
                                  <span class="btn btn-default btn-file">
                                    <span class="fileupload-new">Select file</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input id="LogoFooter" name="file" type="file" />
                                  </span>
                                  <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            <span class="help-block">Optimal Dimensions : 500 x 100 px</span>
                            </div>
                            
                            <div ng-if="SettingItinerary.ImageFooter" class="mt10">
                                <a ng-href="{{BaseUrl}}assets/images/itinerary/{{SettingItinerary.ImageFooter}}" title="logo" data-fancybox data-caption="Logo">
                                    Logo
                                </a>
                            </div>
                        </div>
                    </div>

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

app.controller('Controller', function (AngularService, $scope, $filter, $window, $http, $timeout) {

    $scope.init = function() {
        $scope.BaseUrl              = "<?=base_url()?>";
    	$scope.AngularService       = AngularService;
    	$scope.SettingItinerary     = <?=json_encode($SettingItinerary)?>;
        $scope.CSRFC                = $.cookie("<?=$this->config->item("csrf_cookie_name")?>");
    };

    (function () {
        $scope.init();

        $('#ParentManages').addClass('active nav-active').find('ul').css('display','block');
        $('#ChildrenItinerary').addClass('active');

    })();

    var form = document.forms.namedItem("ItineraryInfo");
    form.addEventListener('submit', function(ev) {
        var LogoFooter = document.getElementById("LogoFooter");
        var oOutput = document.querySelector("div"),oData = new FormData(form);
        var oReq = new XMLHttpRequest();
        oReq.open("POST", adminUrl+'ajax/uploadItineraryFooter', true);
        oReq.onload = function(oEvent) {
            if (oReq.status) {
                $scope.EditItinerary();
            }
        };
        oReq.send(oData);
        ev.preventDefault();
    }, false);

    $scope.EditItinerary = function() {
        console.log($scope.SettingItinerary);
        // return false;
        AngularService.startLoadingPage();
        $http.post(
            adminUrl+'crud/editItinerary',
            {
                'data'	: $scope.SettingItinerary, csrf_token : $scope.CSRFC
            }
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