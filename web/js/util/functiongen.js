/*
 * logdata : muestra la data que se devuelve como response al enviar un formulario
 * con la funcion enviar
 */
var logdata = function(data){
	console.log(data);
	};

/*
 * reloadpage : recarga la pagina actual
 */
var reloadpage = function(data){
	location.reload();
	};
	
	
function getMultipleSelectRowCallBack(DSelected){
	var SelectRowFunction = function(nRow,aData,iDisplayIndex){
		$(nRow).unbind();
		$(nRow).click( function() {
			$(this).toggleClass('row_selected');
			if($(this).hasClass('row_selected'))
				DSelected.push(aData);
			else{
				var removeindex = $(DSelected).getIndexObj(aData,'id');
				delete DSelected[removeindex];
			}
		});
	};
	
	return SelectRowFunction;
}

function getSimpleSelectRowCallBack(DSelected, tableid){
	var SelectRowFunction = function(nRow,aData,iDisplayIndex){
		$(nRow).unbind();
		$(nRow).click( function() {
			if ( $(this).hasClass('row_selected') ) {
	            $(this).removeClass('row_selected');
	            DSelected.pop();
	        }
			else {
				$('#'+tableid+' tr.row_selected').removeClass('row_selected');
	            $(this).addClass('row_selected');
	            DSelected.pop();
	            DSelected.push(aData);
	        }			
		});
	};
	
	return SelectRowFunction;
}
	
/*
 * enviar : envia un formulario con los datos serializado a un controlador, los formularios deben estar presentes
 * y se debe utiliza en la funcion ready del documento
 * IdForm : es el id del formulario a enviar
 * responsefunction : es la funcion que se ejecuta cuando responde el controlador
 * otherdata: son datos adicionales que se pueden enviar al controlador
 */
function enviar(IdForm,responsefunction,otherdata){
	if(typeof(otherdata)=== 'undefined')
		otherdata = null;
	$("#"+IdForm).submit(function(event){
		event.preventDefault();
		console.log(otherdata);
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

/*
 * Crea un datatable y lo devuelve como variable
 */
function createDataTable(idTable,UrlaDTable,FormatoDTable, CallBackFunction, RowCallBackFunction){
	
	oTable = $('#'+idTable).dataTable({
		"bProcessing": true,
		"bServerSide": false,
		"bDestroy": true,
		"sAjaxSource": UrlaDTable,	  
		"aoColumns": FormatoDTable,				             
	 	"aaSorting": [ [0, 'asc'], [1, 'asc'] ],
	 	"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
	 		if(typeof(RowCallBackFunction)!= 'undefined' && RowCallBackFunction != null)
	 			RowCallBackFunction(nRow,aData,iDisplayIndex);
		},
	 	"fnDrawCallback": function(){
		 	$('td').addClass('center');
		 	if(typeof(CallBackFunction)!= 'undefined' && CallBackFunction != null){
		 		CallBackFunction();
		 		}
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

jQuery.fn.getIndexObj = function (obj,attr){
	var objindex = null;
	this.each(function( index ) {
		  if(this[attr] == obj[attr]){
			  objindex = index;
		  }
	});
	return objindex;
};

function CopyArray(Array1,Arra2){
	
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

function reloadclosemodal(idmodal){
	var returnfunction = function(data){
		oTable.fnReloadAjax();
		console.log(data);
		$('#'+idmodal).modal('hide');
		};
	return returnfunction;
}
	
/*Funcion para crear los formularios de forma dinamica*/
function crearElementosForm(Array){
	var $fielset = $("<fieldset>");
	jQuery.each(Array, function() {
		switch (this.type){
		case 'h3':
			$fielset.append('<h3>'+this.label+'</h3>');
			break;
		case 'actions':
			$fielset.append('<div class="form-actions"><button type="submit" class="btn btn-primary">Guardar</button>  <button type="reset" class="btn" data-dismiss="modal">Cancelar</button></div>');
			break;
		case 'close':
			$fielset.append('<div class="form-actions"><button type="reset" class="btn" data-dismiss="modal">Cerrar</button></div>');
			break;
		case 'hidden':
			$fielset.append('<input type="hidden" name="'+this.name+'" value="'+this.value+'">');
			break;
		default:
			$div_control_group = $('<div class="control-group">');
			$div_control_group.append('<label class="control-label" for="zona">'+this.label+'</label>');
			$div_control = $('<div class="controls">');
			$div_control.append(addElemento(this));
			$div_control_group.append($div_control);
			$fielset.append($div_control_group);
			break;
		}
	   });
	
	return $fielset;
}

function addElemento(obj){
	switch (obj.type) {
	    case 'input': 
	    		$elem = $('<input class="input-xlarge focused" id="focusedInput" name="'+obj.name+'" type="'+obj.typeinput+'">');
	    		$elem.val(obj.value);
	    		break;
	    case 'file':
	    		$elem = $('<input type="file" class="input-xlarge" name="'+obj.name+'">');
	    		break;
	    case 'textarea':
	    		$elem = $('<textarea class="input-xlarge" name="'+obj.name+'" rows="2" cols=""></textarea>');
	    		$elem.val(obj.value);
	    		break;
	    case 'date':
	    		$elem = $('<input type="text" class="input-xlarge datepicker name="'+obj.name+'" value="'+obj.value+'">');
	    		break;
	    case 'select':
	    		$elem  = $('<select id="'+obj.name+'" name="'+obj.name+'" data-rel="chosen">');
	    		break;
	    case 'img':
	    		$elem = $('<figure><img src="'+obj.value+'" alt="Tarjeta"></figure>');
	    		break;
	    case 'span': 
	    		$elem = $('<span class="help-inline" style="margin-top:5px;">'+obj.value+'</span>');
	    		break;
	}	
	return $elem;
}	