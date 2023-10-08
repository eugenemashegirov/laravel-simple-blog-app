$(function() {
    $("#registerForm").on("submit", function(e) {
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
            $("#registerAlert").removeClass("alert alert-danger");
            $("#registerAlert").addClass("alert alert-success");
            $("#registerAlert").html("Success!");

            window.location.href="/profile";
        }).fail(function(data) {
            $("#registerAlert").addClass("alert alert-danger");
            $("#registerAlert").html(getStatusAndText(data));
        });
    });

    $("#loginForm").on("submit", function(e) {
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
            $("#loginAlert").removeClass("alert alert-danger");
            $("#loginAlert").addClass("alert alert-success");
            $("#loginAlert").html("Success!");

            window.location.href="/profile";
        }).fail(function(data) {
            $("#loginAlert").addClass("alert alert-danger");
            $("#loginAlert").html(getStatusAndText(data));
        });
    });

    $("#logout").on("click", function(e) {
        e.preventDefault();

        $.ajax({
            type: "DELETE",
            url: "/logout",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        }).done(function(data) {
            window.location.href="/";
        });
    });

    $("#postForm").on("submit", function(e) {
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
            $("#postAlert").removeClass("alert alert-danger");
            $("#postAlert").addClass("alert alert-success");
            $("#postAlert").html("Success!");

            window.location.href="/profile";
        }).fail(function(data) {
            $("#postAlert").addClass("alert alert-danger");
            $("#postAlert").html(getStatusAndText(data));
        });
    });


    $("#editForm").on("submit", function(e) {
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
            $("#editAlert").removeClass("alert alert-danger");
            $("#editAlert").addClass("alert alert-success");
            $("#editAlert").html("Success!");

            window.location.href="/profile";
        }).fail(function(data) {
            $("#editAlert").addClass("alert alert-danger");
            $("#editAlert").html(getStatusAndText(data));
        });
    });

    $("#deleteForm").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            type: "DELETE",
            url: $("#deleteForm").attr("action"),
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            }
        }).done(function(data) {
            window.location.href="/profile";
        });
    });
});

function getStatusAndText(data) {
    return "<strong>Error:</strong> " + (data.responseJSON.message ?? "Server error. Please try again later.");
}
