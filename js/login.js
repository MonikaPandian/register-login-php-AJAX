function ajaxLogin(){    
    var email = $("#email").val();
    var password = $("#password").val(); 
    var formData = { email: email, password: password };

    $.ajax({  
        type: "POST",
        url: "http://localhost/Internship/php/login.php",
        data : formData,
        async: false,
        complete:function(response){ 
            alert(JSON.stringify(response));
            if(response == "success"){
                window.location.replace("./profile.html");
            }
             
        }
     });
}