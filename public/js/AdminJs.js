
$(document).ready(function () {

    $("#mail").blur(function () {
        var mailid = $("#mail").val();

        if (mailid == "")
        {
            $("#emailspan").html("enter email address");
        }
        var atpos = mailid.indexOf("@");
        var dotpos = mailid.lastIndexOf(".");
        if (atpos < 1 || atpos < 5 || dotpos < 1 || atpos + 3 > dotpos || atpos > dotpos || dotpos + 3 > mailid.length)
        {
            $("#emailspan").html("enter valid email");
            return false;
        } else
        {
            $("#emailspan").html("");
        }
    });
    $("#password").blur(function () {
        var password = $("#password").val();

        if (password == "")
        {
            $("#passwordspan").html("enter password");
        }
        if ((password.length) < 8) {
            $("#passwordspan").html("enter valid  password");
        } else
        {
            $("#passwordspan").html("");
        }
    });
    $("#forgotpassword").blur(function () {
        var password = $("#forgotpassword").val();

        if (password == "")
        {
            $("#forgotpasswordspan").html("enter new password");
        }
        if ((password.length) < 8) {
            $("#forgotpasswordspan").html("enter valid new password");
        } else
        {
            $("#forgotpasswordspan").html("");
        }
    });
    $("#retypepassword").blur(function () {
        var retypepassword = $("#retypepassword").val();

        if (retypepassword == "")
        {
            $("#retypepasswordspan").html("enter retype password");
        } else
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
    $("#address").blur(function () {
        var first = $("#address").val();
        if (first === "")
        {
            $("#addressspan").html("enter address");
        } else
        {
            $("#addressspan").html("");
        }


    });
    $("#city").blur(function () {
        var first = $("#city").val();
        if (first === "")
        {
            $("#cityspan").html("enter city");
        } else
        {
            $("#cityspan").html("");
        }


    });
    $("#state").blur(function () {
        var first = $("#state").val();
        if (first === "")
        {
            $("#statespan").html("enter state");
        } else
        {
            $("#statespan").html("");
        }


    });
    $("#phoneno").blur(function () {
        var phone = $("#phoneno").val();
        if (phone.length == "") {

            $("#phonespan").html("enter phone number");
        } else if (isNaN(phone)) {
            $("#phonespan").html('pls enter only numbers');
            $("#phoneno").focus();
        } else if (phone.length != 10) {

            $("#phonespan").html("enter valid phone number");
        } else
        {
            $("#phonespan").html("");
        }

    });





    $("#next").click(function () {

        var FullName = $("#fullname").val();
        var Address = $("#address").val();
        var City = $("#city").val();
        var State = $("#state").val();
        var PhoneNumber = $("#phoneno").val();
        var Email = $("#mail").val();
        var ForgotPassword = $("#forgotpassword").val();
        if (FullName === "")
        {
            $("#fullspan").html('pls enter fullname');
        } else
        {
            $("#fullspan").html("");
        }
        if (Address === "")
        {
            $("#addressspan").html('pls enter address');
        } else
        {
            $("#addressspan").html("");
        }
        if (City === "")
        {
            $("#cityspan").html('pls enter city');
        } else
        {
            $("#cityspan").html("");
        }
        if (State === "")
        {
            $("#statespan").html('pls enter state');
        } else
        {
            $("#statespan").html("");
        }
        if (PhoneNumber === "")
        {
            $("#phonespan").html('pls enter phone number');
        } else
        {
            $("#phonespan").html("");
        }
        if (Email === "")
        {
            $("#emailspan").html('pls enter username');
        } else
        {
            $("#emailspan").html("");
        }
         if (ForgotPassword === "")
        {
            $("#forgotpasswordspan").html('pls enter username');
        } else
        {
            $("#forgotpasswordspan").html("");
        }


    });



});

