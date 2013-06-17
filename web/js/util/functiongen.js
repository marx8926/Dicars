function enviar(IdForm,responsefunction,otherdata){
	if(typeof(otherdata)=== 'undefined')
		otherdata = null;
	$("#"+IdForm).submit(function(event){
		event.preventDefault();
        var url=$("#"+IdForm).attr("action");        
        $.post(
    		url,
    		{formulario:$("#"+IdForm).serialize(),data:otherdata},
    		function(data){
    			if(data.responseCode==200 ){
    				console.log("ok");
    				if(typeof(responsefunction)=== 'undefined')
    					console.log("no function");
    				else 
    					responsefunction(data);
    			}else if(data.responseCode==400)
    				alert('Error bad request');
    			else if(data.responseCode==500)
    				alert('Error bad request');
    			else alert("An unexpeded error occured.");
    		});
		});
}

function createDataTable(idTable,UrlaDTable,FormatoDTable){
	
	oTable = $('#'+idTable).dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"bDestroy": true,
		"sAjaxSource": UrlaDTable,	  
		"aoColumns": FormatoDTable,				             
	 	"aaSorting": [ [0, 'asc'], [1, 'asc'] ],
	 	"fnDrawCallback": function(){
		 	$('td').addClass('center');
		 	CargarBotones();
		 	},
		 	
	 	"aoColumnDefs": [
	                  {"sType": 'string-case', "aTargets": [2]}],
	 	
	 	
		 	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
		 	"sPaginationType": "bootstrap",
		 	"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
				} 		            
	
		});
	return oTable;
}

function getAjaxObject(url){
	var data = $.ajax({
		url: url,
		dataType: "json",
		async: false
		}).responseText;
	return jQuery.parseJSON(data);
}
function ajaxResposeData(namediv,path){
	var data = $.ajax({
        url: path,
        async: false
        }).responseText;
	$('#'+namediv).html(data);
}

function ajaxResposeDataPost(namediv,path){
	var data = $.ajax(
            {
                url: path,
                async: false,
                type: "POST",
            }).responseText;
	$('#'+namediv).html(data);
}

function ajaxTableDataPost(nametable,path)
{
        $.ajax(
            {
            url: path,
            async: false,
            type: "POST",
            }).done(function(data){
                $('#'+nametable+'> tbody:last').append(data);
            });
}
function ajaxListPost(path,select,red)
{   
    $.post(path,{dato:red},function(data){
         $('#'+select).html(data);
    });
   
}
function SelectListPost(list, valor)
{
    $('#'+list).val(valor);
}
jQuery.fn.reset = function () {
	  $(this).each (function() { this.reset(); });
	};

var logdata = function(data){
	console.log(data);
	};

var reloadpage = function(data){
	location.reload();
	};
