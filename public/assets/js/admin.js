$(document).ready(function(){
	
    });

$(document).on("click",".saveProduct",function(){
    var DataSave = $("#saveProduct").serialize();
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: "/products/save",
        data: DataSave
    }).done(function (data) {
        
    }).fail(function () {
        location.reload();
    });
});
