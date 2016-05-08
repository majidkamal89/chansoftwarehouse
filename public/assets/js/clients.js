$(document).ready(function(){
	$(document).on('click', '#LastPayment', function(){	
		if ($("#LastPayment").prop('checked')){
			$("#LastPaymentDate").removeAttr('disabled');
			
		} else {
			$("#LastPaymentDate").attr('disabled','disabled');
		}
	});
	$(document).on('click', '#SecurityDepositeStatus', function(){
		if ($("#SecurityDepositeStatus").prop('checked')){
			$("#SecurityDeposite").removeAttr('disabled');
			
		} else {
			$("#SecurityDeposite").attr('disabled','disabled');
		}
	});
	$(document).on('click', '#PnaStatus', function(){	
		if ($("#PnaStatus").prop('checked')){
			$("#Pna").removeAttr('disabled');
			
		} else {
			$("#Pna").attr('disabled','disabled');
		}
	});
	
	$(document).on('click', '.get-Client', function(){
		var clientData = $(this).attr('data-attr');
		$.ajax({
			url:"/clients/clientInfo/"+clientData,
			dataType: 'json',
		}).done(function(responseData){
			$("#home").html(responseData);
		});
	});
	
	$(document).on('click', '.EditFromClass', function(){
		var FormData = $("#editClient").serialize();
		$.ajax({
			url : "/clients/EditClientInfo",
			type: 'POST',
			data: FormData,
			dataType: 'json',
		}).done(function(responseData){
			if (responseData==1){
				$('html, body').animate({scrollTop: $("#home").offset().top}, 2000);
				$("#StatusMessages").show().addClass("alert-success").html("Record udpated successfully").fadeOut(3000, function(){
					$("#StatusMessages").hide().removeClass("alert-success");
					window.location="/";
				});
			}
		});
	});
});
