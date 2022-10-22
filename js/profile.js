function ajaxProfile(){
    
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
