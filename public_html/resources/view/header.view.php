<?php
declare(strict_types=1);

function header_view(string $choice){
    
    switch($choice){
        case 'home':
            echo '
            <section id="body_container">
                <div class="brand">
                    <h1 style="text-decoration: line-through;" id="unknown">UNKNOWN</h1>
                    <h4>Sumptuous Sxrth &AMP; Eekay De Realer</h4>
                </div>
            </section>';
            break;
        case 'music':
            echo '
                <section id="body_container">
                    <div class="brand">
                        <h1 id="unknown" class="unk">UNKNOWN <span id="music_tab">MUSIC</span></h1>
                        <h4>Sumptuous Sxrth &AMP; Eekay De Realer</h4>
                    </div>
                </section>';
            break;
        case 'gallery':
            echo '
                <section id="body_container">
                    <div class="brand">
                        <h1 id="unknown" class="unk">UNKNOWN <span id="gallery_tab">GALLERY</span></h1>
                        <h4>Sumptuous Sxrth &AMP; Eekay De Realer</h4>
                    </div>
                </section>';
            break;
        case 'signup_login':
            echo '
                <section id="body_container">
                    <div class="brand">
                        <h1 id="unknown" class="unk">UNKNOWN <span id="singup_tab">NEW ACCOUNT</span><span id="login_tab">LOGIN</span></h1>
                        <h4>Sumptuous Sxrth &AMP; Eekay De Realer</h4>
                    </div>
                </section>';
            break;
    }
}
