<?php 
    require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'public_html'. DIRECTORY_SEPARATOR .'resources'. DIRECTORY_SEPARATOR .'view'. DIRECTORY_SEPARATOR .'header.view.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'public_html'. DIRECTORY_SEPARATOR .'resources'. DIRECTORY_SEPARATOR .'view'. DIRECTORY_SEPARATOR .'footer.view.php';
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>unknown</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="resources/css/main.css">
        <link rel="stylesheet" href="resources/css/media.css">
    </head>
    <body>
        <?php header_view('home'); ?>
        </section>
        <section id="main_artists" class="main_artists">
            <section class="media_query">
                <div id="box_one" class="artist_container">
                    <div  class="icon_p">
                        <img width="20" height="20" src="resources/icons/admin_panel_settings_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg"> <h4 class="stage_name">Sumptuous Sxrth</h4>
                    </div>
                    <ul>
                        <li>Founder</li>
                        <li>Producer</li>
                        <li>Computer Engineer</li>
                        <li>Web Developer</li>
                    </ul>

                </div>
                <div id="box_two" class="artist_container">
                    <div class="icon_p">
                        <img width="20" height="20" src="resources/icons/admin_panel_settings_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg"> <h4 class="stage_name">Eekay De Realer</h4>
                    </div>
                    <ul>
                        <li>Founder</li>
                        <li>Co&minus;Producer</li>
                        <li>Promoter</li>
                        <li>Marketing Agent</li>
                    </ul>
                </div>
            </section>
            <section class="media_query">
                <div id="box_three" class="artist_container">
                    <div class="icon_p">
                        <img width="20" height="20" src="resources/icons/audio_file_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg"> <h4 class="stage_name">Top 4 songs</h4>
                    </div>
                    <ul>
                        <li>Ke Game Jioh</li>
                        <li>Bites ft&dot; Kiddow</li>
                        <li>Uthando ft&dot; Cakes</li>
                        <li>Energy ft&dot; Crazy Da Slime</li>
                    </ul>
                </div>

                <div id="box_four" class="artist_container">
                    <div class="icon_p">
                        <img width="20" height="20" src="resources/icons/album_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg"> <h4 class="stage_name">Album & EP's</h4>
                    </div>
                    <ul>
                        <li>Outcats</li>
                        <li>Love Bites</li>
                        <li>Love Bites II</li>
                        <li>Loading</li>
                    </ul>
                </div>
            </section>
            
            <section class="media_query">
                <div id="box_five" class="artist_container">
                    <div class="icon_p">
                        <img width="20" height="20" src="resources/icons/more_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg"> <h4 class="stage_name">Social Media</h4>
                    </div>
                    <ul id="socials">
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Instagram</a></li>
                        <li><a href="">Whatsapp</a></li>
                        <li><a href="">Youtube</a></li>
                    </ul>
                </div>
            </section>
        </section>
        <section class="motto">
            <div id="p_div">
                <p><strong>The Unknown</strong> is a South African music duo comprised of <strong>Sumptuous Sxrth</strong> and <strong>Eekay De Realer</strong>&#46; Fusing elements of emotional rap&comma; trap soul&comma; and R&B&comma; the pair has built a reputation for raw&comma; emotive storytelling through prolific collaborations and independent releases&#46; Originally formed as a larger collective in 2021 before evolving into its current form&comma; <strong>The Unknown</strong> represents a commitment to creative exploration and authentic sound&#46; From chart&minus;climbing singles like <strong>Ke game Jioh</strong> to collaborative EPs&comma; they continue to push the boundaries of the contemporary South African music scene&#46;</p>
            </div>
        </section>
        <?php footer_view(); ?>
    </body>
</html>