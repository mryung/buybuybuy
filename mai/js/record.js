/**
 * Created by yl on 2015/4/7.
 */


/**
 * Created by yl on 2015/4/6.
 */

$(document).ready(function () {
    var i = 0;
    $.post("../php/record.php",{page:i}, function (data) {
        changeData(data);
    });

    $("#down").click(function () {
        i++;
        $.post("../php/record.php",{page:i}, function (data) {
            changeData(data);
        });
    });
    $("#up").click(function () {
        i--;
        $.post("../php/record.php",{page:i}, function (data) {
            changeData(data);
        });
    });

});
function changeData(data){
    if(data == 1){
        alert("没有登录")
    }else if(data == 0||data == 2){
        alert("没有了")
    }else{

        if(data == "" || data == undefined){
            return;
        }

        var json = eval("("+data+")");
        var total="";
        for(var i = 0 ; i < json.num1 ;i ++){
            var j = json[i];

            //alert(data);

            var table =  '<div class="louceng">' +
                '                    <img src="'+ j.chaining +'" class="xiangkuang">' +
                '                    <div class="kongbai"> </div>' +
                '                   <div class="biaoge">' +
                '                    <table width="370" border="0" align="left" cellspacing="15">' +
                '                    <tr height="25">' +
                '                    <td width="70">宝贝名称</td>' +
                '                    <td  bgcolor="#FBE2F8">'+ j.goodName+'</td>' +
                '                    </tr>' +
                '                    <tr height="25">' +
                '                    <td width="70">宝贝类别</td>' +
                '                    <td  bgcolor="#FBE2F8">'+j.goodClass+'</td>' +
                '                    </tr>' +
                '                   <tr height="25">' +
                '                    <td width="70">宝贝价格</td>' +
                '                    <td  bgcolor="#FBE2F8">'+j.goodPrice+'</td>' +
                '                    </tr>' +
                '                    <tr height="25">' +
                '                    <td width="70">购买链接</td>' +
                '                    <td  bgcolor="#FBE2F8">'+j.goodAddress+'</td> ' +
                '                   </tr>' +
                '                    </table>' +
                '                    </div>' +
                '                    <a href=""target="_blank" style="position:absolute;left:400px;top:190px;">点击查看</a>' +
                '                    </div>';
            total += table;
        }
        $("#addImage").html(total);

    }
}
