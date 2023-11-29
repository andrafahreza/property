function getresponse(icon, message, title) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
        timer: 5e3,
        timerProgressBar: !0,
        showCloseButton: !0,
        didOpen: function () {
        Swal.showLoading(),
            (t = setInterval(function () {
            var t = Swal.getHtmlContainer();
            t &&
                (t = t.querySelector("b")) &&
                (t.textContent = Swal.getTimerLeft());
            }, 100));
        },
        willClose: function () {
            clearInterval(t);
        },
    }).then(function (t) {
        t.dismiss === Swal.DismissReason.timer &&
        console.log("close");
    });
}

function getresponseReload(icon, message, title) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
        timer: 2e3,
        timerProgressBar: !0,
        showCloseButton: !0,
        didOpen: function () {
        Swal.showLoading(),
            (t = setInterval(function () {
            var t = Swal.getHtmlContainer();
            t &&
                (t = t.querySelector("b")) &&
                (t.textContent = Swal.getTimerLeft());
            }, 100));
        },
        willClose: function () {
            clearInterval(t);
        },
    }).then(function (t) {
        t.dismiss === Swal.DismissReason.timer &&
        location.reload();
    });
}
