function enviar(formname,responsefunction,otherdata){
	if(typeof(otherdata)=== 'undefined')
		otherdata = null;
	$("#"+formname).submit(function(event){
		event.preventDefault();
        var url=$("#"+formname).attr("action");
        $.post(
    		url,
    		{formName:$("#"+formname).serialize(),data:otherdata},
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

function leche_espiritual(dato)
{
           $('#select_leche').empty();
           
           $('<option value=-1> ------ </option>').appendTo('#select_leche');

           for(var i=0;i<dato.length; i++)
           {
                    $('<option value='+dato[i].id+'>'+dato[i].nombre+' </option>').appendTo('#select_leche');
           }
}

function init_leche_espiritual(path)
{
    //lista de leche espiritual
            $.ajax(
                        {url : path,
                         dataType:"json",
                        type: "POST",
                        async: false,
                        }
                  ).done(leche_espiritual); 
}

function init_consolidadores(path)
{
     //lista de consolidadores
     $.ajax(
           {url : path,
            type: "POST",
            async: false
                        }
            ).done(function(dato){
                             $('#select_consolidador').html(dato);
  
            });   
}