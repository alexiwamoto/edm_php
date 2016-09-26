// Add Record
function addRecord() {
    // get values
    var name = $("#name").val();
    var lastname = $("#lastname").val();    
	var type = $('input[name="rbtype"]:checked').val();
	var address = $("#address").val();
	var church = $('input[name="rbchurch"]:checked').val();
	var email1 = $("#email1").val();
	var email2 = $("#email2").val();
	var phone1 = $("#phone1").val();
	var phone2 = $("#phone2").val();
	var profession = $("#profession").val();
	var description = $("#description").val();

    $.post("ajax/addRecord.php", {
        name: name,
        lastname: lastname,
		rbtype: type,
		address: address,
		rbchurch: church,
		email1: email1,
		email2: email2,
		phone1: phone1,
		phone2: phone2,
		profession: profession,
		description: description
        
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#name").val("");
        $("#lastname").val("");
		$("#address").val("");		
		$("#email1").val("");
		$("#email2").val("");
		$("#phone1").val("");
		$("#phone2").val("");
		$("#profession").val("");
		$("#description").val("");
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function readWorkers(profession) {	
	window.location.replace("../pages/list.html?profession="+profession);    
	alert("Searching " + profession);    
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {                
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {    
    $("#hidden_user_id").val(id);    
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {            
            var user = JSON.parse(data); 
            $("#update_name").val(user.name);
			$("#update_lastname").val(user.lastname);		
			//SetRadioType(user.type);			
			$("#update_address").val(user.address);			
            //SetRadioChurch(user.church);
			$("#update_email1").val(user.email1);
			$("#update_email2").val(user.email2);
			$("#update_phone1").val(user.phone1);
            $("#update_phone2").val(user.phone2);
			$("#update_profession").val(user.profession);
			$("#update_description").val(user.description);		
        }
    );    
    $("#update_user_modal").modal("show");
}

function SetRadioType(type) {
	if(type == 'Autônomo'){
		$("input[name=update_rbtype]").val([1]);		
	}	
	else if(type == 'Empresário'){
		$("input[name=update_rbtype]").val([2]);		
	}	
	else{
		$("input[name=update_rbtype]").val([3]);		
	}
}

function SetRadioChurch(church) {
	if(church == 'Sede'){
		$("input[name=update_rbchurch]").val([1]);		
	}
	
	else if(type == 'Zona Leste'){
		$("input[name=update_rbchurch]").val([2]);		
	}
	
	else{
		$("input[name=update_rbchurch]").val([3]);		
	}
}

function UpdateUserDetails() {
    // get values
    var name = $("#update_name").val();
    var lastname = $("#update_lastname").val();    
	var type = $('input[name="update_rbtype"]:checked').val();
	var address = $("#update_address").val();
	var church = $('input[name="update_rbchurch"]:checked').val();
	var email1 = $("#update_email1").val();
	var email2 = $("#update_email2").val();
	var phone1 = $("#update_phone1").val();
	var phone2 = $("#update_phone2").val();
	var profession = $("#update_profession").val();
	var description = $("#update_description").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            name: name,
        	lastname: lastname,
			rbtype: type,
			address: address,
			rbchurch: church,
			email1: email1,
			email2: email2,
			phone1: phone1,
			phone2: phone2,
			profession: profession,
			description: description
        },
        function (data, status) {            
            $("#update_user_modal").modal("hide");  
            readRecords();
        }
    );
}

window.onload = function(){
	readRecords();
}


