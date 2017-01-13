/*

$("a.ajax").live("click", function (event) {
    event.preventDefault();
    $.get(this.href);
});

// AJAXové odeslání formulářů
$("form.ajax").live("submit", function () {
    $(this).ajaxSubmit();
    return false;
});

$("form.ajax :submit").live("click", function () {
    $(this).ajaxSubmit();
    return false;
});

*/
$(document).ready(function() {
    var form = $("form.ajax").get(0);
    form.onsubmit = function() {
        var data = {
            thisMessage: this.message.value,
            idUsersFrom: this.id_users_from.value,
            idUsersTo: this.id_users_to.value,
            id: this.id_rooms.value
        };
        var url = $basePath2 + "/debate/room?roomId="+this.id_rooms.value;
     //   'php/ajax.php?action='+action,data,callback,'json'
        console.log(url);
        console.log(data);
     //   location.reload(true);
        $.post(url, data);
    //    $(this).ajaxSubmit();
    //    sendReq.send(data);
    $("form.ajax").send(data);
        return false;
    };
});

/*
window.onload=function(){
    setTimeout('Ajax()',10000);
}*/