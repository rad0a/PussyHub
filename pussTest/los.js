function like(l) {
    let lim = l;

//  alert("sigma");
    $.ajax({
        url: "checkuser.php",
        method: "POST",
        data: { lim: lim },
        success: function(response) {
            location.reload();
            }
    })
}