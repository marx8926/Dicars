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
	
function AddAttr(Array, attr, value){
	$(Array).each(function( index ){
		this[attr] = value;
	});
}

function CloneAttr(Array, attr1, attr2){
	$(Array).each(function( index ){
		var value =this[attr1];
		this[attr2] = value;
	});
}

function CloneAttrTable(Tabla, attr, pos){
	var Array = Tabla.fnGetData();
	$(Array).each(function( index ){
		CuotasTable.fnUpdate(this[attr],index,pos);
	});
}
	
function getMultipleSelectRowCallBack(DSelected){
	var SelectRowFunction = function(nRow,aData,iDisplayIndex){
		$(nRow).click( function() {
			$(this).toggleClass('row_selected');
			if($(this).hasClass('row_selected'))
				DSelected.push(aData);
			else{
				var removeindex = $(DSelected).getIndexObj(aData,'id');
				DSelected.splice(removeindex,1);
			}
		});
	};
	
	return SelectRowFunction;
}

function UnselectRow(idTable){
	$("#"+idTable+" tr").each(function(index){
		if($(this).hasClass("row_selected"))
			$(this).toggleClass('row_selected');
	});
}

function SubTablaArray(Table, Array, attr){
	$(Array).each(function( index ){
		var indexarray = $(Table.fnGetData()).getIndexObj(this,attr);
		Table.fnDeleteRow( indexarray );
	});
}

/*
 * Nesesita tener definido el atributo cantidad
 */

function sumColArray(Array,attr){
	var total = 0;
	$(Array).each(function(index){
		total += this[attr];
	});
	return total;
}

function sumArrayByAttr(Array2,attr,attrresult,attrcondicion){
	var total = 0;
	$(Array2).each(function( index ){
		var condicion = 1;
		if(typeof(attrcondicion) != 'undefined')
			condicion = this[attrcondicion];
		if(condicion == 1){
			if(typeof(this['cantidad'])!='undefined')
				total +=(this[attr]*this['cantidad']);
			else
				total +=this[attr];
		}
		if(typeof(attrresult) != 'undefined')
			this[attrresult] = (this[attr]*this['cantidad']);
		
	});
	return(total);
}

function getSimpleSelectRowCallBack(DSelected, tableid){
	var SelectRowFunction = function(nRow,aData,iDisplayIndex){
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
function enviar(IdForm,successfunction,otherdata, errorfunction){
	if(typeof(otherdata)=== 'undefined' || otherdata == null)
		otherdata = null;
	$("#"+IdForm).submit(function(event){
		event.preventDefault();
        var url=$("#"+IdForm).attr("action"); 
        var Consulta = $.ajax({
	      	  type: "POST",
	      	  url: url,
	      	  data: { formulario:$("#"+IdForm).serialize(),otherdata:otherdata }
	      	});
     
        Consulta.done(function( data ) {
            
      	  if(data.responseCode==200 ){
				if(typeof(successfunction)=== 'undefined' || successfunction == null)
					console.log("no function");
				else 
					successfunction(data);
      	  }else if(data.responseCode==400)
      		  alert('Error bad request');
      	  else alert("An unexpeded error occured.");
        });
        
        Consulta.fail(function() { 
        	if(typeof(errorfunction)=== 'undefined' || errorfunction == null)
				console.log("no function");
			else 
				errorfunction(); 
        });
	});
		
}

/*
 * Crea un datatable y lo devuelve como variable
 */
function createDataTable(idTable,UrlaDTable,FormatoDTable, CallBackFunction, RowCallBackFunction){
	
	oTable = $('#'+idTable).dataTable({
		"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"iDisplayLength": 25,
		"bProcessing": true,
		"bServerSide": false,
		"bDestroy": true,
		"sAjaxSource": UrlaDTable,
		"fnServerData": function( sUrl, aoData, fnCallback, oSettings ) {
            oSettings.jqXHR = $.ajax( {
                "url": sUrl,
                "data": aoData,
                "success": fnCallback,
                "dataType": "json",
                "cache": false
            } );
        },
		"aoColumns": FormatoDTable,				             
	 	"aaSorting": [ [0, 'asc'], [1, 'asc'] ],
	 	"fnCreatedRow": function( nRow, aData, iDisplayIndex ) {
	 		if(typeof(RowCallBackFunction)!= 'undefined' && RowCallBackFunction != null)
	 			RowCallBackFunction(nRow,aData,iDisplayIndex);
		},
	 	"fnDrawCallback": function(oSettings ){
		 	if(typeof(CallBackFunction)!= 'undefined' && CallBackFunction != null){
		 		setTimeout(function() {
			 		CallBackFunction();
			 		});
		 		}
		 	},
		 	
	 	"aoColumnDefs": [
	                  {"sType": 'string-case', "aTargets": [1]}
	                  ],
	 	
	 	
		 	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
		 	"sPaginationType": "bootstrap",
		 	"oLanguage": {
		 		"sUrl": urlES
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

function CopyArray(Array1,Array2,all,attrs){
	while(Array1.length > 0)
		Array1.pop();	
	if(all){
		$(Array2).each(function( index ){
			Array1.push(this);
		});
	}
	else{
		$(Array2).each(function( index ){
			var olddata = this;
			var newdata = [];
			var jsondata = '{';
			for(var i=0; i<attrs.length;i++){
				jsondata +='"'+attrs[i]+'":"'+olddata[attrs[i]]+'"';
				if(attrs.length-1>i)
					jsondata = jsondata + ',';
			}
			jsondata += '}';
			newdata = jQuery.parseJSON(jsondata);
			Array1.push(newdata);
		});
	}
}

function getAjaxObject(url){
	var data = $.ajax({
		url: url,
		dataType: "json",
		async: false
		}).responseText;
	return jQuery.parseJSON(data);
}
function ajaxResponseData(namediv,path){
	var data = $.ajax({
        url: path,
        async: false
        }).responseText;
		$('#'+namediv).html(data);
}

function ajaxResponseDataPost(namediv,path){
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
	
function reloadTable(oTable){
	var returnfunction = function(data){
		oTable.fnReloadAjax();
		};
	return returnfunction;
}

function reloadclosemodal(idmodal,idaTable){
	var returnfunction = function(data){
		$('#'+idaTable).dataTable().fnReloadAjax();
		//console.log(data);
		$('#'+idmodal).modal('hide');
		$('#'+idmodal+" form").reset();
		};
	return returnfunction;
}
	
/*Funcion para crear los formularios de forma dinamica*/
function crearElementosForm(Array){
	var $form = $("<div>");
	var $modalfooter = $("<div class='modal-footer'>");
	var $modalbody = $("<div class='modal-body'>");
	var $fielset = $("<fieldset>");
	jQuery.each(Array, function() {
		switch (this.type){
		case 'h3':
			$fielset.append('<h3>'+this.label+'</h3>');
			break;
		case 'actions':
			$modalfooter.append('<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>  <button type="submit" id="btn_submit" class="btn btn-primary">Guardar</button>');
			break;
		case 'close':
			$modalfooter.append('<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>');
			break;
		case 'hidden':
			$fielset.append('<input type="hidden" id="'+this.name+'" name="'+this.name+'" value="'+this.value+'">');
			break;
		default:
			$div_control_group = $('<div class="control-group">');
			$div_control_group.append('<label class="control-label" for="zona">'+this.label+'</label>');
			$div_control = $('<div class="controls">');
			$div_control.append(addElemento(this));
			$div_control_group.append($div_control);
			$fielset.append($div_control_group);
			$modalbody.append($fielset);
			break;
		}
	   });
	$form.append($modalbody);
	$form.append($modalfooter);
	
	return $form;
}

function addElemento(obj){
	switch (obj.type) {
	    case 'input': 
	    		$elem = $('<input class="input-xlarge focused" id="'+obj.name+'" name="'+obj.name+'" type="'+obj.typeinput+'" pattern="'+obj.pattern+'" title="'+obj.title+'" required="'+obj.req+'" maxlength="'+obj.max+'">');
	    		$elem.val(obj.value);
	    		break;
	    case 'inputnumber':
		    	$elem = $('<input class="input-xlarge focused" id="'+obj.name+'" name="'+obj.name+'" type="number" required="'+obj.req+'" step="'+obj.step+'" min="'+obj.min+'" max="'+obj.max+'">');
	    		$elem.val(obj.value);
	    		break;
	    case 'file':
	    		$elem = $('<input type="file" class="input-xlarge" id="'+obj.name+'" name="'+obj.name+'">');
	    		break;
	    case 'textarea':
	    		$elem = $('<textarea class="input-xlarge" name="'+obj.name+'" rows="2" cols="" required="'+obj.req+'" maxlength="'+obj.max+'"></textarea>');
	    		$elem.val(obj.value);
	    		break;
	    case 'date':
	    		$elem = $('<input type="text" class="input-xlarge datepicker" id="'+obj.name+'" name="'+obj.name+'" value="'+obj.value+'">');
	    		break;
	    case 'select':
	    		$elem  = $('<select id="'+obj.name+'" name="'+obj.name+'" data-rel="chosen" >');
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

/*--------------------------------UBIGEO------------------------------------*/
function cargarDep(idselect, ubigeo){
	var $select = $('#'+idselect);
	var result = '';
	$(ubigeo).each(function(){
		if(this.dep == 1)
			result += '<option value="'+this.id+'">'+this.desc+'</option>';
	});
	$select.html(result); 
}

function cargarProv(idselect, ubigeo, iddepend){
	var $select = $('#'+idselect);
	var result = '';
	$(ubigeo).each(function(){
		if(this.prov == 1 && this.depend == iddepend)
			result += '<option value="'+this.id+'">'+this.desc+'</option>';
	});
	$select.html(result); 
}

function cargarDist(idselect, ubigeo, iddepend){
	var $select = $('#'+idselect);
	var result = '';
	$(ubigeo).each(function(){
		if(this.dist == 1 && this.depend == iddepend)
			result += '<option value="'+this.id+'">'+this.desc+'</option>';
	});
	$select.html(result); 
}

/* idtagdist:es el id del select que acumulara los options de los distritos
 * idtagprov:es el id del select que acumulara los options de los provincia
 * idtagdep:es el id del select que acumulara los options de los departamento
 * iddist: es el id por defecto que se le asignara al distrito
 * iddist: es el id por defecto que se le asignara a la provincia
 * iddep: es el id por defecto que se le asignara a departamento
 * */

function cargarUbigeo(idtagdist, idtagprov, idtagdep, iddist, idprov, iddep){
	
	cargarDep(idtagdep, ubigeos);

	if(typeof(iddep) != 'undefined'){
		$('#'+idtagdep).val(iddep);
	}

	cargarProv(idtagprov, ubigeos, $('#'+idtagdep).val());

	if(typeof(idprov) != 'undefined'){
		$('#'+idtagprov).val(idprov);
	}

	cargarDist(idtagdist, ubigeos, $('#'+idtagprov).val());

	if(typeof(iddist) != 'undefined'){
		$('#'+idtagdist).val(iddist);
	}
	
	$('#'+idtagdep).change(function(){
		cargarProv(idtagprov, ubigeos, $('#'+idtagdep).val());

		cargarDist(idtagdist, ubigeos, $('#'+idtagprov).val());
	});

	$('#'+idtagprov).change(function(){
		cargarDist(idtagdist, ubigeos, $('#'+idtagprov).val());
	});
}
/*--------------------------------FIN UBIGEO------------------------------------*/

/*--------------------------------SELECT!!------------------------------------*/

function cargarSelect(arreglo, idselect, attrvalue, attrdescripcion){
	var $select = $('#'+idselect);
	var result = '';
	
	$(arreglo).each(function(){
		if(typeof(this[attrvalue]) != 'undefined')
			result += '<option value="'+this[attrvalue]+'">'+this[attrdescripcion]+'</option>';		
	});
	$select.html(result);
}
/*------------------------------FECHAAAA------------------------------------------*/
function fechaAhora(){
	date = new Date();
	Fecha = paddate(date.getDate())+"/"+paddate((date.getMonth()+1))+"/"+date.getFullYear();
	return Fecha;
}

function toHTML(element){
	var div = $("<div>");
	div.append(element);
	return div.html();
}

/*-------------------------------- Crear Tabla ------------------------------------*/
function crearTablaToArray(Idtable,Head,HeadExt,Attr,AttrExt,Array){
	var table = $("<table id='"+Idtable+"'>");
	var thead = $("<thead>");
	var tbody = $("<tbody>");
	var trh = $("<tr>");
	if(Head != null){
		for (var i = 0 ; i< Head.length ; i++){
			trh.append("<td "+HeadExt[i]+" >"+Head[i]+"</td>");
		}
		thead.append(trh);
		table.append(thead);
	}
	
	$(Array).each(function(index){
		var trb = $("<tr>");
		for(var j = 0 ; j < Attr.length ; j++){
			trb.append("<td "+AttrExt[j]+" >"+this[Attr[j]]+"</td>");
		}
		tbody.append(trb);
	});
	table.append(tbody);
	return table;
}

/* Recuperar la hora y el dia */
function paddate(n){
	return n<10 ? '0'+n : n;
}

function getHourFormato(){
	date = new Date();
	Hora = (date.getUTCHours()-5)+':'
    + date.getUTCMinutes()+':'
    + date.getUTCSeconds();
	return Hora;
}
/*>>>>>>>>>>>>>>>>>>>>>>*/
function uploadFile(nameInput, url, path,nameFile,finishUpload){
	var file = new FileReader();
	var inputFile  = $("#"+nameInput);
	file = inputFile[0].files[0];
	uploadSend(file, url, path,nameFile,finishUpload);
	getExtFile(nameInput);
}

function uploadSend(file,url, path,nameFile,finishUpload) {
	var xhr = new XMLHttpRequest(),
    upload = xhr.upload;
	upload.addEventListener("progress", function (ev) {
	}, false);
	
	upload.addEventListener("load", function (ev) {
		finishUpload();
	}, false);
	upload.addEventListener("error", function (ev) {console.log(ev);}, false);
	xhr.open(
	    "POST",
	    url
	);
	xhr.setRequestHeader("Cache-Control", "no-cache");
	xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
	xhr.setRequestHeader("X-File-Name", nameFile);
	xhr.setRequestHeader("X-Path", path);
	xhr.send(file);
}

function getExtFile(nameinput) {
	var file = new FileReader();
	var inputFile  = $("#"+nameinput);
	file = inputFile[0].files[0];
    fic=file.name;
    fic = fic.split('\\');
    nom = fic[fic.length-1];
    ext = nom.substr(nom.indexOf('.'),nom.length).toLowerCase();
    return ext;
}