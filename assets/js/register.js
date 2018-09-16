$(document).ready(() => {
    $("#hideLogin").click(function() {
        $("#loginForm").hide(200);
        $("#registerForm").show(200);
    });

    $("#hideRegister").click(function() {
        $("#registerForm").hide(200);
        $("#loginForm").show(200);
    });
});