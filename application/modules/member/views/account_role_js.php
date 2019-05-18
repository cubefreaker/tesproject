<script>

    $('.btn-seller').click(function() {
        $("#seller-form").show(); 
    });

    //select  type buyer
    $('.buyer-tipe-select').on('change', function() {
        // alert( this.value );
        if(this.value == 1) {
            $('#form-api').show();    
            $('#form-white-label').hide();
            $('#form-ta').hide();
        } else if(this.value == 2) {
            $('#form-white-label').show();
            $('#form-api').hide();   
            $('#form-ta').hide();
        } else {
            $('#form-ta').show();
            $('#form-white-label').hide();
            $('#form-api').hide();   
        }
    });

    //choose request
    $("input[name='change_request']").change(function(){
	    // Do something interesting here
	    var id = $(this).val();
	    console.log(id);
	    if( id == 2 ) {
	    	$('.temporary').show();
	    } else {
	    	$('.temporary').hide();
	    }
	});

    var getCookiebyName = function(name){
	    var pair = document.cookie.match(new RegExp(name + '=([^;]+)'));
	    return !!pair ? pair[1] : null;
	};
	
	function validate() {
	
		var form = $("#forms");	
		var submit = $("#forms .btn-submit");

		$(form).validate({
			errorClass      : 'invalid',
	        errorElement    : 'em',

	        highlight: function(element) {
	            $(element).parent().removeClass('state-success').addClass("state-error");
	            $(element).removeClass('valid');
	        },

	        unhighlight: function(element) {
	            $(element).parent().removeClass("state-error").addClass('state-success');
	            $(element).addClass('valid');
	        },
			//rules form validation
			rules:
			{
				'agree_nda_check':
				{
					required: true,
				},
				'buyer_type':
				{
					required: true,
				},
				'ip_dev_1':
				{
					required: true,
				},
				'ip_production' : {
					required: true,
				},
				'protocols' : {
					required: true,
				},
				'ports' : {
					required: true,
				},
				'agree_ip_whitelist' : {
					required: true
				}
			},
			//messages
			messages:
			{
				'agree_nda_check': {
	                required: "You must check at least 1 box",
	            }
			},
			//ajax form submition
			submitHandler: function(form)
			{
				$(form).ajaxSubmit({
					dataType: 'json',
					beforeSend: function()
					{
						$(submit).attr('disabled', true);
						// $('.loading').css("display", "block");
					},
					headers: { 'X-CSRF-TOKEN': getCookiebyName('5f05193eee9e900380c12e6040e7dee9') },
					success: function(data)
					{
						//validate if error
						// $('.loading').css("display","none");
						if(data['is_error']) {
							swal("Oops!", data['error_msg'], "error");
							$(submit).attr('disabled', false);
						} 
						else {
							//succes
							swal({
		                        title: "Success",
		                        text: "Request success!",
		                        type: "success",
		                        allowOutsideClick: true,
		                        confirmButtonText: "OK"
		                    }).then(function() {
		                        location.reload();
		                    }, function(dismiss) {
		                        location.reload();
		                    })
	                	}					
					},
					error: function() {
						$(submit).attr('disabled', false);
						swal("Oops", "Something went wrong.", "error");
					}
				});
			},
			errorPlacement: function(error, element) {
			    element.closest("div").removeClass('has-success').addClass('has-error');
			},
			success: function(error, element) {
			    $(element).closest("div").addClass('has-success').removeClass('has-error');
			}
		});
	}

	$(document).ready(function() {
		//init validate;
		validate();
		$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
		    $("#success-alert").slideUp(500);
		});

		$("#error-alert").fadeTo(4000, 4000).slideUp(500, function(){
		    $("#error-alert").slideUp(500);
		});
	});
</script>