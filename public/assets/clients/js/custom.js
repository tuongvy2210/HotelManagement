$(function () {
    let url = window.location.origin + window.location.pathname;
    $("a").each(function () {
        if (this.href === url) {
            $(this).addClass("active");
        }
    });
});