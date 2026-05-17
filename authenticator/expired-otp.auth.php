<?php 

    //require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public_html' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'email-verification.view.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'token.class.php';
    $csrf_token = Tokens::generateCSRFToken();
    //$email = email_view();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>OTP Expired</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="resources/css/main.css">
        <link rel="stylesheet" href="resources/css/media.css">
    </head>
    <body>
        
        <section id="body_container">
            <div class="brand">
                <h1 id="unknown" class="unk">E-MAIL <span id="gallery_tab">VERIFICATION</span></h1>
                <h4>Sumptuous Sxrth & Eekay De Realer</h4>
            </div>
            
        </section>

        <section id="verify_email">
            <div id="for_email_code">
                <p>Link and OTP for email verification has expired, enter your email and click the <strong>NEW OTP</strong> button to request new verification <strong>link</strong> and <strong>OTP</strong>.</p>
                <form action="new-link" method="post" autocomplete="on">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token ?>">
                    <label class="label" for="new_otp" id="new_otp">Enter your email</label>
                    <input class="input" type="email" name="new_link" id="new_link" placeholder="user@example.com" autocomplete="email">
                    <button class="submit_btn" type="submit"  id="e_submit">NEW OTP</button>
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