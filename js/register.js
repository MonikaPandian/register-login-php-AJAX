function ajaxRegistration(){
    
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    alert(first_name);
    var formData = { first_name: first_name, last_name: last_name, email: email, password: password };
 
    $.ajax({  
        type: "POST",
        url: "http://localhost/Internship/php/register.php",
        data : formData,
        async: false,
        complete:function(response){ 
            window.open("./login.html");
        }
     });
}


