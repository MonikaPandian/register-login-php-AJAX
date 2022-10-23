function startUp(){
    var urlString = window.location.search;
    var paramString = urlString.split('?')[1];
    var urlParams = new URLSearchParams(paramString);
    var email = urlParams.get('email');
    document.getElementById("email").innerHTML = email;
    document.getElementById("name").innerHTML = urlParams.get('firstname') + " " + urlParams.get('lastname');

    getProfileDetails(email);
}

function getProfileDetails(email){
    var deferred = $.Deferred();
    $.ajax({
    type: "GET",
    url: "http://localhost/Internship/php/profile.php",
    data : {email: email},
    async: false,
    success:function(response){ 
        deferred.resolve(response);
        },
    });
    return deferred.promise();
}

function saveProfile(email){
    
    var age = $("#age").val();
    var dob = $("#dob").val();
    var contact = $("#contact").val();
    var address = $("#address").val();   
    var formData = { email: email, age: age, dob: dob, contact: contact, address: address };
 
    $.ajax({  
        type: "POST",
        url: "http://localhost/Internship/php/profile.php",
        data : formData,
        async: false,
        complete:function(response){ 
            window.open("./login.html");
        }
     });

}
