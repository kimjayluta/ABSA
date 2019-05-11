$(document).ready(function () {
    $("#admin-login").on("submit", function () {
        const usn = $("#usn"),
              pass = $("#password"),
              data = {
                  usn : usn.val(),
                  pass : pass.val(),
                  action: "login"
              };

        // Username Error handler
        if (usn.val() === "") {
            usn.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Required all fields!</span>");
            return false;
        }
        // Password Error Handler
        if (pass.val() === "") {
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Required all fields!</span>");
            return false;
        }

        $.ajax({
            url: "../includes/user_function.php",
            method: 'post',
            data: data,
            success: function (data) {
                if (!data) {
                    pass.addClass("border-danger");
                    $("#u_error").html("<span class='text-danger'>Error Username or password!</span>");

                    usn.addClass("border-danger");
                    $("#p_error").html("<span class='text-danger'>Error Username or password!</span>");
                } else {
                    pass.removeClass("border-danger");
                    $("#u_error").html("");

                    usn.removeClass("border-danger");
                    $("#p_error").html("");

                    window.location.href = "admin/dashboard.php";
                }
            }
        })
    });

    $("#judge-login").on("submit", function () {
        const name = $("#name").val(),
              pageantID = $("#pageant-title").find(':selected').data('id'),
              data = {
                  name: name,
                  pageantID: pageantID,
                  action: 'judgeLogin'
              };
        if (name === "") {
            $("#name").addClass("border-danger");
            $("#name_error").html("<span class='text-danger'>Required all fields!</span>");
            return false;
        }

        if (pageantID === 0 ){
            $("#pageant-title").addClass("border-danger");
            $("#title-error").html("<span class='text-danger'>Error! Please choose a Pageant Title!</span>");
            return false;
        }

        $("#name").removeClass("border-danger");
        $("#name_error").html("");

        $("#pageant-title").removeClass("border-danger");
        $("#title-error").html("");

        $.ajax({
            url: "../includes/user_function.php",
            method: 'post',
            data: data,
            success: function (data) {
                if (!data) {
                    $("#name").addClass("border-danger");
                    $("#name_error").html("<span class='text-danger'>Name or Pageant title is invalid! Please try again.</span>");

                    $("#pageant-title").addClass("border-danger");
                    $("#title-error").html("<span class='text-danger'>Name or Pageant title is invalid! Please try again.</span>");

                } else {
                    $("#name").removeClass("border-danger");
                    $("#name_error").html("");

                    $("#pageant-title").removeClass("border-danger");
                    $("#title-error").html("");

                    window.location.href = "judge/score_board.php?loggedIn";
                }
            }
        });
    });
});