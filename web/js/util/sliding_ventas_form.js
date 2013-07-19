function initSlider(productos) {
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#steps .step').each(function(i){
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#steps').width(stepsWidth);

	$("#EnviarVentaForm").submit(function (e){
		e.preventDefault();
		var move_to	= 3;
        $('#steps').stop().animate({
            marginLeft: '-' + widths[move_to-1] + 'px'
        },500);
        $('#contenedor').stop().animate({
        	height: $('#step3').height()
        },500);
	});
	
    $('#to_detalle').bind('click',function(e){
    	VentaUpdate();
		var move_to	= $(this).attr('to_position');
		if(productos.length > 0){		
	        $('#steps').stop().animate({
	            marginLeft: '-' + widths[move_to-1] + 'px'
	        },500);
	        $('#contenedor').stop().animate({
	        	height: $('#step2').height()
	        },500);
		}
		else{
			$("#rquiredproducts").modal('show');
		}        
        e.preventDefault();
    });
    
	$('#to_select_productos').bind('click',function(e){
		var move_to	= $(this).attr('to_position');

        $('#steps').stop().animate({
            marginLeft: '-' + widths[move_to-1] + 'px'
        },500);
        $('#contenedor').stop().animate({
        	height: $('#step1').height()
        },500);
        e.preventDefault();
    });

    $('#to_select_resume').bind('click',function(e){
		var move_to	= $(this).attr('to_position');

        $('#steps').stop().animate({
            marginLeft: '-' + widths[move_to-1] + 'px'
        },500);
        $('#contenedor').stop().animate({
        	height: $('#step3').height()
        },500);
        e.preventDefault();
    });
     $('#back_to_detalle').bind('click',function(e){
		var move_to	= $(this).attr('to_position');

        $('#steps').stop().animate({
            marginLeft: '-' + widths[move_to-1] + 'px'
        },500);
        $('#contenedor').stop().animate({
        	height: $('#step2').height()
        },500);
        e.preventDefault();
    });
	
}