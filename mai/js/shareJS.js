/**
 * Created by yl on 2015/3/29.
 */
$(document).ready(
    function () {
        var option = {
            url: '../php/share1.php',
            success: showResponse1

        };
        var option1 = {
            url: '../php/share2.php',
            success: showResponse2
        }
        $("#file").change(
            function () {
                $('#share').ajaxForm(option).submit();
            }
        );
        $("#btn").click(function () {
            $('#share').ajaxForm(option1).submit();
        });

    }
);

function showResponse1(responseText,statusText){
    $("#tu1").attr("src",responseText);
}

function showResponse2(responseText,statusText){
    alert(responseText);
}

