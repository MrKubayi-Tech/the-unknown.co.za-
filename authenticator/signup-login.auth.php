<?php 
    require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'public_html'. DIRECTORY_SEPARATOR .'resources'. DIRECTORY_SEPARATOR .'view'. DIRECTORY_SEPARATOR .'header.view.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'public_html'. DIRECTORY_SEPARATOR .'resources'. DIRECTORY_SEPARATOR .'view'. DIRECTORY_SEPARATOR .'footer.view.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'public_html'. DIRECTORY_SEPARATOR .'resources'. DIRECTORY_SEPARATOR .'view'. DIRECTORY_SEPARATOR .'signup.view.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'token.class.php';
    $csrf_token = Tokens::generateCSRFToken();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>signup-login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="resources/css/main.css">
        <link rel="stylesheet" href="resources/css/media.css">
    </head>
    <body>
        <?php header_view('signup_login'); ?>
        <?php signup_view() ?>
        <section id="login">
            <div class="form_container">
                <form action="login" method="post" autocomplete="on">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token ?>">
                    <label class="label" for="email">E-mail</label><br>
                    <input class="input" name="email" type="email" autocomplete="email" placeholder="user@example.com"><br>
                    <label class="label" for="pwd">Password</label><br>
                    <input class="input" name="pwd" type="password" autocomplete="off" placeholder="********"><br>
                    <p><a id="reset_pwd" href="reset-request">Forgot Password? </a><button id="signup_btn" type="button">Sign in</button></p>
                    <button class="submit_btn" id="l_submit" type="submit">SUBMIT</button>
                </form>
            </div>
        </section>
        <section id="signup">
            <div class="form_container">
                <form action="signup" method="post" autocomplete="on">
                    <h3 style="color:red;"><?php echo signup_view() ?></h3>
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token ?>">
                    <label class="label" for="name">Name</label><br>
                    <?php echo userInfor('name') ?>
                    <label class="label" for="surname">Surname</label><br>
                    <?php echo userInfor('surname') ?>
                    <label class="label" for="email">E-mail<span class="errors" style="color:red;"><?php echo email_error() ?></span></label><br>
                    <?php echo userInfor('email') ?>
                    <div id="password_requirements">
                        <p>Password requirements&Tab;<span class="errors" style="color:red;"><?php echo pwd_error() ?></span></p>
                        <ul>
                            <li>minimum of 8 characters long</li>
                            <li>minimum of one lowercase (abc)</li>
                            <li>minimum of one uppercase (ABC)</li>
                            <li>minimum of one special character (!@#)</li>
                        </ul>
                    </div>
                    <label class="label" for="pwd">Password</label><br>
                    <input class="input" name="pwd" type="password" autocomplete="off"placeholder="********" ><br>
                    <label class="label" for="confirm_pwd">Confirm Password</label><br>
                    <input class="input" name="confirm_pwd" type="password" autocomplete="off" placeholder="********" ><br>
                    <p>Already have an account <button id="login_btn" type="button">Login</button></p>
                    <button class="submit_btn" id="s_submit" type="submit">SUBMIT</button>
                </form>
            </div>
        </section><?php footer_view(); ?>
        <script src="resources/js/auth_script.js"></script>
    </body>
</html>
