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

function createDataTable(idTable,UrlaDTable,FormatoDTable, CallBackFunction){
	
	oTable = $('#'+idTable).dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"bDestroy": true,
		"sAjaxSource": UrlaDTable,	  
		"aoColumns": FormatoDTable,				             
	 	"aaSorting": [ [0, 'asc'], [1, 'asc'] ],
	 	"fnDrawCallback": function(){
		 	$('td').addClass('center');
		 	if(typeof(CallBackFunction)=== 'undefined')
				console.log("no function");
			else 
				CallBackFunction();
		 	},
		 	
	 	"aoColumnDefs": [
	                  {"sType": 'string-case', "aTargets": [2]}],
	 	
	 	
		 	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
		 	"sPaginationType": "bootstrap",
		 	"oLanguage": {
			"sLengthMenu": "_MENU_ registros por página"
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

/*Funcion para crear los formularios de forma dinamica*/
function crearElementosForm(Array){
	var $fielset = $("<fieldset>");
	jQuery.each(Array, function() {		
		if(this.type=='h3'){
			$fielset.append('<h3>'+this.label+'</h3>');
		}
		else{
			$div_control_group = $('<div class="control-group">');
			$div_control_group.append('<label class="control-label" for="zona">'+this.label+'</label>');
			$div_control = $('<div class="controls">');
			$div_control.append(addElemento(this));
			$div_control_group.append($div_control);
			$fielset.append($div_control_group);
		}
	   });
	
	return $fielset;
}

function addElemento(obj){
	switch (obj.type) {
	    case 'input': 
	    		$elem = $('<input class="input-xlarge focused" id="focusedInput" name="talla" type="text">');
	    		$elem.val(obj.value);
	    		break;
	    case 'textarea':
	    		$elem = $('<textarea class="input-xlarge" name="caracteristica" rows="2" cols=""></textarea>');
	    		$elem.val(obj.value);
	    		break;
	    case 'select': 
	    		$elem = $();
	    		break;
	    case 'span': 
	    		break;
	}	
	return $elem;
}	