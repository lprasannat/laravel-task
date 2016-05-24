
$(document).ready(function () {
    
    $("#mail").blur(function () {
        var mailid = $("#mail").val();      
      
        if (mailid == "")
        {
            $("#emailspan").html("enter email address");
        } 
       
            
        else
        {
            $("#emailspan").html("");
        }
    });
     $("#password").blur(function () {
        var password= $("#password").val();      
      
        if (password == "")
        {
            $("#passwordspan").html("enter password");
        } 
            
        else
        {
            $("#passwordspan").html("");
        }
    });
     $("#retypepassword").blur(function () {
        var retypepassword= $("#retypepassword").val();      
      
        if (retypepassword == "")
        {
            $("#retypepasswordspan").html("enter retype password");
        } 
            
        else
        {
            $("#retypepasswordspan").html("");
        }
    });
    $("#fullname").blur(function () {
        var first = $("#fullname").val();
        if (first === "")
        {
            $("#fullspan").html("enter FullName");
        } else if ($.isNumeric(first))
        {
            $("#fullspan").html("enter only characters");
        } else
        {
            $("#fullspan").html("");
        }


    });
   
   

});

