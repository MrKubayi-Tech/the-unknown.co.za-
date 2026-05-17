<?php 

    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public_html' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'email-verification.view.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'token.class.php';
    $csrf_token = Tokens::generateCSRFToken();
    $email = email_view();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Email verification</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="resources/css/main.css">
        <link rel="stylesheet" href="resources/css/media.css">
    </head>
    <body>
        
        <section id="body_container">
            <div class="brand">
                <h1 id="unknown" class="unk">E&minus;MAIL <span id="gallery_tab">VERIFICATION</span></h1>
                <h4>Sumptuous Sxrth &AMP; Eekay De Realer</h4>
            </div>
            
        </section>

        <section id="verify_email">
            <div id="for_email_code">
                <p>Check the verification code sent to <strong><?php echo $email ?></strong> and enter it below to verify your email, if you can't find the email, check it in the spam.</p>
                <form action="email-verification" method="post" autocomplete="off">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token ?>">
                    <label for="email_verification" id="email_vlabel">Enter verification code</label>
                    <input type="text" name="email_verification" id="email_verification" placeholder="123456" maxlength="6">
                    <button class="submit_btn" type="submit"  id="e_submit">SUBMIT</button>
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