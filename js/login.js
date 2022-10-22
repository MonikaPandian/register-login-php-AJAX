function login(){    
    var email = $("#email").val();
    var password = $("#password").val(); 
    var formData = { email: email, password: password };

    loginCheck(formData).then(function(response){
        if(response == 0){
            alert("Enter a valid Email and Password");
        }else{
            alert("Login successful");
            window.location.replace("./profile.html?"+response);
        }
    });

    function loginCheck(formData){
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
}