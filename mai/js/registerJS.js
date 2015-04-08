/**
 * Created by yl on 2015/3/28.
 */
$(document).ready(function () {

    $("#button").click(
        function () {
            if($('input:checkbox[name="checkbox"]:checked').val()=="checkbox"){
                $("#gouxuan").hide();
            }else{
                $("#gouxuan").show();
                return;
            }
            $.get("../php/register.php",{name:$("#username").val(),sex:$('input:radio[name="sex"]:checked').val(),
                    email:$("#email").val(),pass:$("#password").val(),
                    enpass:$("#enpassword").val(),
                    securityProblem:$("#problem").val(),answer:$("#answer").val(),birthday:$("#birth").val()},
                function (data) {
                    $("#user").hide();
                    $("#pwd").hide();
                    $("#enpwd").hide();
                    $("#enpwderror").hide();
                    $("#eml").hide();
                    $("#pro").hide();
                    $("#as").hide();
                    $("#exitUser").hide();
                    $("#success").hide();
                    if(data == '1'){
                        $("#user").show();
                    }else if(data == "3"){
                        $("#eml").show();
                    }else if(data == "4"){
                        $("#pwd").show();
                    }else if (data =="5"){
                        $("#enpwd").show();
                    }else if(data == "6"){
                        $("#pro").show();
                    }else if(data == "7"){
                        $("#as").show();
                    }else if(data == "9"){
                        $("#exitUser").show();
                    }else if(data == "10"){
                        $("#enpwderror").show();
                    }else if(data == "11"){
                        $("#success").show();
                    }else if(data == "12"){
                        $("#success").text("baichi").show();
                    }else{
                        alert(data);
                    }

                });
        }
    );

});

