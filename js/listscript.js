function searchProfession(){
	var loc = location.search.substring(1, location.search.length);
	var profession = loc.substring(loc.indexOf('=')+1, loc.lenght);
	return profession;
}

function readWorkers() {
	var profession = searchProfession();
	
    $.get("../ajax/readWorkers.php", {
			profession: profession
		}, 
		function (data, status) {		
        $(".records_content").html(data);
    });
}

function toPdf(id) { 	
    $("#hidden_user_id").val(id);
	window.location.assign("../ajax/convertToPdf.php?id="+id);
    /*$.get("../ajax/page.php", {
            //id: id
        },
        function (data, status) {	
			
        }
    );*/
}

window.onload = function(){
	readWorkers();
}

