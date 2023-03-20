$(function() {
    $(".alert").css("display", "none");

    $("#registerForm").submit(function(e) {
        e.preventDefault();

        let registerData = {
            name: $("#register-username").val(),
            email: $("#register-email").val(),
            password: $("#register-password").val(),
            password_confirmation: $("#register-password_conf").val(),
        };

        $.ajax({
            type: "POST",
            url: "/register",
            data: registerData,
            dataType: "json",
            encode: true,
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        }).done(function(data) {
            window.location.href="/profile";
        }).fail(function(data) {
            $("#registerAlert").css("display", "block");
            $("#registerAlert").html(getStatusAndText(data));
        });
    });

    $("#loginForm").submit(function(e) {
        e.preventDefault();

        let registerData = {
            email: $("#login-email").val(),
            password: $("#login-password").val(),
        };

        $.ajax({
            type: "POST",
            url: "/login",
            data: registerData,
            dataType: "json",
            encode: true,
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        }).done(function(data) {
            window.location.href="/profile";
        }).fail(function(data) {
            $("#loginAlert").css("display", "block");
            $("#loginAlert").html(getStatusAndText(data));
        });
    });

    $("#logout").click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "GET",
            url: "/logout",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        }).done(function(data) {
            window.location.href="/";
        });
    });

    $("#postForm").submit(function(e) {
        e.preventDefault();

        let registerData = {
            title: $("#post-title").val(),
            text: $("#post-text").val(),
        };

        $.ajax({
            type: "POST",
            url: "/posts",
            data: registerData,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        }).done(function(data) {
            window.location.href="/profile";
        }).fail(function(data) {
            $("#postAlert").css("display", "block");
            $("#postAlert").html(getStatusAndText(data));
        });
    });


    $("#editForm").submit(function(e) {
        e.preventDefault();

        let registerData = {
            title: $("#edit-title").val(),
            text: $("#edit-text").val(),
        };

        $.ajax({
            type: "PATCH",
            url: $("#editForm").attr("action"),
            data: registerData,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        }).done(function(data) {
            window.location.href="/";
        }).fail(function(data) {
            $("#editAlert").css("display", "block");
            $("#editAlert").html(getStatusAndText(data));
        });
    });

    $("#deleteForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "DELETE",
            url: $("#deleteForm").attr("action"),
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        }).done(function(data) {
            window.location.href="/";
        });
    });
});

function getStatusAndText(data) {
    return "<strong>Error:</strong> " + (data.responseJSON.message ?? "Server error. Please try again later.");
}