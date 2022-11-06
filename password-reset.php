<html lang = "en" dir = "ltr">
    <head>
        <meta charset = "utf-8">
        <title>Login Page</title>
        <link rel = "stylesheet" href = "login.css">
    </head>
    <body>
        <div class = "center">
            <form method = "post" action = "password-reset-code.php">

                <div class="txt_field">
                    <input type = "password" name = "password" required>
                    <span> </span>
                    <label>Create new password</label>
                </div>
                <div class="txt_field">
                    <input type = "password" name = "confirm" required>
                    <span> </span>
                    <label>Confirm new password</label>
                </div>
                <input type = "submit"  name = "save" value = "Save changes">
                <input type = "hidden" name = "vkey" value = "<?php if (isset($_GET['vkey'])){echo $_GET['vkey'];} ?>">
                <input type = "hidden" name = "email" value = "<?php if (isset($_GET['email'])){echo $_GET['email'];} ?>">
            </form>
        </div>
    </body>
</html>