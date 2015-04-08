/**
 * Created by yl on 2015/3/22.
 */

$(document).ready(function(){
    $.post('php.php',{name:"78"},function(){
        alert($.cookies.get('nameyu'));
    })
})