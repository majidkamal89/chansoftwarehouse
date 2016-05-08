$(document).ready(function(){
	$(document).on('change', '.contactNumber', function(){
		var StrHTMl= "";
		var ContactNumbers = $(".contactNumber").val();
		if (ContactNumbers !=""){
			for (var i=1; i <=ContactNumbers; i++){
				StrHTMl += "<div class='row'><div class='col-md-3'><strong>Contact "+i+" Name</strong>:</div><div class='col-xs-12 col-sm-6 col-md-9'><div class='form-group'><input type='text' name='FacilityContactName"+i+"' class='form-control input-md' placeholder='Contact Name' ></div></div></div>";	
				StrHTMl += "<div class='row'><div class='col-md-3'><strong>Contact "+i+" Title</strong>:</div><div class='col-xs-12 col-sm-6 col-md-9'><div class='form-group'><input type='text' name='FacilityContactTitle"+i+"' class='form-control input-md' placeholder='Contact Title' ></div></div></div>";
				StrHTMl += "<div class='row'><div class='col-md-3'><strong>Contact "+i+" Phone</strong>:</div><div class='col-xs-12 col-sm-6 col-md-9'><div class='form-group'><input type='text' name='FacilityContactPhone"+i+"' class='form-control input-md' placeholder='Contact Phone' ></div></div></div>";	
				StrHTMl += "<div class='row'><div class='col-md-3'><strong>Contact "+i+" Email</strong>:</div><div class='col-xs-12 col-sm-6 col-md-9'><div class='form-group'><input type='text' name='FacilityContactEmail"+i+"' class='form-control input-md' placeholder='Contact Email' ></div></div></div>";	
			}
			$("#ContactNumbers").html(StrHTMl);
		}
		else{
			$("#ContactNumbers").html("");	
		}
	});
		
	$(document).on('click', '.closeForm', function(){
		$("#AddnewFacility input[type=text], textarea").val("");
		$("#AddnewFacility").prop("selectedIndex", 0);
		$("#AddnewFacility input[type=radio]").prop("checked", false);
		$("#ContactNumbers").html("");
	});
	
	$(document).on('click', '.saveForm', function(){
		var formData = $("#AddnewFacility").serialize();
		$.ajax({
			url:"/facilities/addNewFacility",
			type: 'POST',
			data: formData,
			dataType: 'json',
		}).done(function(responseData){
			if (responseData==1){
				$("#successMessage").addClass('alert-success').show().html("Facility Added Success fully").fadeOut(3000,function(){
					$("#AddnewFacility input[type=text], textarea").val("");
					$("#AddnewFacility").prop("selectedIndex", 0);
					$("#AddnewFacility input[type=radio]").prop("checked", false);
					$("#ContactNumbers").html("");
					$("#successMessage").removeClass('alert-success');
					$("#AddNewFacility").modal("toggle");
					window.location="/facilities";
				});	
			}
			else if(responseData==0){
				$("#successMessage").addClass('alert-danger').show().html("Error Occured").fadeOut(3000,function(){
					$("#successMessage").removeClass('alert-danger')
				});
			}
			else{
				$("#AddNewFacility").html(responseData);
			}
		});
		
	});
});
