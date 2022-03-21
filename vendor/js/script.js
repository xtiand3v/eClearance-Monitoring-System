$(document).ready(function() {
    $("button#sign-in").click(function() {
        u = $("#username").val();
        p = $("#password").val();
        if ($("#username").val() == "" || $("#password").val() == "")
            $("div#alert").html("<code>Please input credentials on the fields</code>");
        else
            $.post($("#form-login").attr("action"),
                //$("#myForm :input").serializeArray(),
                { username: u, password: p },
                function(data) {
                    if (data == "success") {
                        setInterval(function() {
                            window.location.href = "index.php"
                        }, 800);
                        $("div#alert").html("<p>Authenticating...</p>");
                    } else {
                        $("div#alert").html(data);
                    }
                });
        $("#form-login").submit(function() {
            return false;
        });
    });
});