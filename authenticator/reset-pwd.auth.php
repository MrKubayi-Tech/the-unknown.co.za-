<?php 

    //require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public_html' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'email-verification.view.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'token.class.php';
    $csrf_token = Tokens::generateCSRFToken();
    //$email = email_view();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Password Reset</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="resources/css/main.css">
        <link rel="stylesheet" href="resources/css/media.css">
    </head>
    <body>
        
        <section id="body_container">
            <div class="brand">
                <h1 id="unknown" class="unk">PASSWORD <span id="gallery_tab">RE&minus;SET</span></h1>
                <h4>Sumptuous Sxrth & Eekay De Realer</h4>
            </div>
            
        </section>

        <section id="verify_email">
            <div id="for_email_code">
                <p>Password reset request: Enter your new password below, this link is valid for only 24hrs</p>
                <form action="reset-pwd" method="post" autocomplete="off">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token ?>">
                    <label class="label" for="pwd" id="new_otp">New Password</label><br>
                    <input class="input" type="pwd" name="email" id="new_link"><br>
                    <label class="label" for="confirm_pwd" id="new_otp">Confirm Password</label><br>
                    <input class="input" type="email" name="confirm_pwd" id="new_link"><br>
                    <button class="submit_btn" type="submit"  id="e_submit">RE&minus;SET PASSWORD</button>
                </form>
            </div>
        </section>
        <footer>
            <section>
                
                <p class="footer_p">Copyright &copy; 2026 UNKOWN &minus; All Rights Reserved</p>

            </section>
        </footer>
    </body>
</html>