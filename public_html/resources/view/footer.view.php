<?php

function footer_view(){
    
    if(session_status() === PHP_SESSION_NONE){
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'session.config.php';
    }
    
    if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){
        echo '
        <footer>
            <section>
                <ul id="links_container">
                    <li><img width="20" height="20" src="resources/icons/home_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="Home"><br><a href="home">HOME</a></li>
                    <li><img width="20" height="20" src="resources/icons/library_music_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="library_music"><br><a href="music">MUSIC</a></li>
                    <li><img width="20" height="20" src="resources/icons/gallery_thumbnail_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="gallery_thumbnail"><br><a href="gallery">GALLERY</a></li>
                    <li><img width="20" height="20" src="resources/icons/logout_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="login"><br><a href="logout">LOG-OUT</a></li>
                </ul>
                <p class="footer_p">Copyright &copy; 2026 UNKOWN &minus; All Rights Reserved</p>

            </section>
        </footer>';
    }else{
        echo '
        <footer>
            <section>
                <ul id="links_container">
                    <li><img width="20" height="20" src="resources/icons/home_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="Home"><br><a href="home">HOME</a></li>
                    <li><img width="20" height="20" src="resources/icons/library_music_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="library_music"><br><a href="music">MUSIC</a></li>
                    <li><img width="20" height="20" src="resources/icons/gallery_thumbnail_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="gallery_thumbnail"><br><a href="gallery">GALLERY</a></li>
                    <li><img width="20" height="20" src="resources/icons/login_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="login"><br><a href="signup-login">LOGIN</a></li>
                </ul>
                <p class="footer_p">Copyright &copy; 2026 UNKOWN &minus; All Rights Reserved</p>

            </section>
        </footer>';
    }
}

