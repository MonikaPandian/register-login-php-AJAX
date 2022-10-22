function startUp(formData){
    var urlString = window.location.search;
    var paramString = urlString.split('?')[1];
    var urlParams = new URLSearchParams(paramString);
   
    document.getElementById("email").innerHTML = urlParams.get('email');
    document.getElementById("name").innerHTML = urlParams.get('firstname') + " " + urlParams.get('lastname');

    getProfileDetails();
}

function getProfileDetails(formData){
    var deferred = $.Deferred();
    $.ajax({
    type: "GET",
    url: "http://localhost/Internship/php/profile.php",
    data : formData,
    async: false,
    success:function(response){ 
        deferred.resolve(response);
        },
    });
    return deferred.promise();
}

function saveProfile(){
    
    var age = $("#age").val();
    var dob = $("#dob").val();
    var contact = $("#contact").val();
    var address = $("#address").val();   
    var formData = { age: age, dob: dob, contact: contact, address: address };
 
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
