
	$(document).ready(function(){	
 	$('[data-toggle="tooltip"]').tooltip();  
	$(document).on('change','#grupo',function(){
		var id = $(this).val(); 
		$.ajax({
			url: "http://localhost:80/citareas/index.php/tasks/consulta",
			data: {"id":id},
			type: "POST", 
			success: function(response){
			    $("#contenido").html(response);                
			 }
		});  		 
	});

	$(document).on('change','#tfin',function(){
		if($(this).is(":checked"))
		{
			var ur="http://localhost:80/citareas/index.php/tasks/consultatf";
			$.ajax({
			url: ur,
			type: "POST", 
			success: function(response){
			    $("#contenido").html(response);                
			 }
		});  		 
		}else
		{
			var ur="http://localhost:80/citareas/index.php/tasks/consultaAll";
			$.ajax({
			url: ur,
			type: "POST", 
			success: function(response){
			    $("#contenido").html(response);                
			 }
		});  
		}
		
	});
	});
function eliminar(nom){
    if (confirm("¿Esta seguro que desea eliminar la Tarea?")){

        $.ajax({
            data:{"nombre_tarea":nom},
            url:"http://localhost:80/citareas/index.php/Tasks/eliminar",
            type:'post',
            success: function(){
                alert("La tarea se ha eliminado con éxito.");
                window.location="http://localhost:80/citareas/index.php/tasks";

            }
        });

    } else{
        return false
    }
}

function finalizar(nom){
    if (confirm("¿Esta seguro que desea dar por finalizada la Tarea?")){

        $.ajax({
            data:{"nombre_tarea":nom},
            url:"http://localhost:80/citareas/index.php/Tasks/finalizar",
            type:'post',
            success: function(){
                alert("La tarea se ha asignado como finalizada.");
                window.location="http://localhost:80/citareas/index.php/tasks";

            }
        });

    } else{
        return false
    }
}


	




	
