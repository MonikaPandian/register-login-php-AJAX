function register(){
    
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var formData = { first_name: first_name, last_name: last_name, email: email, password: password };

    checkExisting(formData).then(function(response){
        if(response == 0){
            signup(formData).then(function(result){
                if(result == 1){
                    alert("successfully registered");
                }else if(result == 2){
                    alert("Enter all fields: first name, lastname, email and password");
                }else if(result == 3){
                    alert("Please enter a valid email");
                }else{
                    alert("Error occured while registration. Please try again later.");
                }
            });   
        }else if(response > 0){
            alert("Email Already Registered with us. Please give a different email.");
        }else{
            alert("Error occured while registration. Please try again later.");
        }
    });

}

function checkExisting(formData){
    var deferred = $.Deferred();
    $.ajax({
    type: "GET",
    url: "http://localhost/Internship/php/login.php",
    data : formData,
    async: false,
    success:function(response){ 
        deferred.resolve(response);
        },
    });
    return deferred.promise();
}

function signup(formData){
    var deferred = $.Deferred();
    $.ajax({
        type: "POST",
    url: "http://localhost/Internship/php/register.php",
    data : formData,
    async: false,
    success:function(response){ 
        deferred.resolve(response);
        },
    });
    return deferred.promise();
}


