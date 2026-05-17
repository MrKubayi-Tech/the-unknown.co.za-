<?php 
    require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'public_html'. DIRECTORY_SEPARATOR .'resources'. DIRECTORY_SEPARATOR .'view'. DIRECTORY_SEPARATOR .'header.view.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR .'..'. DIRECTORY_SEPARATOR .'public_html'. DIRECTORY_SEPARATOR .'resources'. DIRECTORY_SEPARATOR .'view'. DIRECTORY_SEPARATOR .'footer.view.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>unknown-gallery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="resources/css/main.css">
        <link rel="stylesheet" href="resources/css/media.css">
    </head>
    <body>
        <?php header_view('gallery'); ?>
        <section id="gallery">
            <section id="artists">
                <div id="koketso">
                    <h4 class="art_name">Eekay De Realer</h4>
                    <div>
                        <section class="grp_two" id="one">
                            <div class="art">
                                <img src="resources/img/koketso/1.jpg" alt="Eekay De Realer">
                                <p>What we have been through does make us who we are</p>
                            </div>
                            <div class="art">
                                <img src="resources/img/koketso/2.jpg" alt="Eekay De Realer">
                                <p>Botsa ntatao hone kgomo tse ketlang ka tsona</p>
                            </div>
                        </section>
                        <section class="grp_two">
                            <div class="art">
                                <img src="resources/img/koketso/3.jpg" alt="Eekay De Realer">
                                <p>She told me were forever &lbbrk;second time&rbbrk; I am like where is her forever now</p>
                            </div>
                            <div class="art">
                                <img src="resources/img/koketso/4.jpg" alt="Eekay De Realer">
                                <p>Unknown, is the lack of promotion that make them choose with intentions</p>
                            </div>
                        </section>
                    </div>
                </div>
                <div id="rodney">
                    <h4 class="art_name">Sumptuous Sxrth</h4>
                    <div>
                        <section class="grp_two" id="two">
                            <div class="art">
                                <img src="resources/img/rodney/1.png" alt="Rodney Nyelisani Kubayi">
                                <p>You hit me with a lot of love, reflex I hit you right back</p>
                            </div>
                            <div class="art">
                                <img src="resources/img/rodney/2.jpg" alt="Rodney Nyelisani Kubayi">
                                <p>Man&comma; life is all about &quot;Do they benefit&quest;&quot;</p>
                            </div>
                        </section>
                        <section class="grp_two">
                            <div class="art">
                                <img src="resources/img/rodney/3.JPG" alt="Rodney Nyelisani Kubayi">
                                <p>It&CloseCurlyQuote;ll be alright&comma; see me happy but I&CloseCurlyQuote;m not&comma; gotta be alright&comma; You okay&quest; I just nod&comma; gonna be alright</p>
                            </div>
                            <div class="art">
                                <img src="resources/img/rodney/4.png" alt="Rodney Nyelisani Kubayi">
                                <p>Music is my shadow&comma; it always stick around</p>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
            <section class="gang">
                <h4 class="art_name">UNKNOWN GALLERY</h4>
                <section class="gang_pic">
                    <div class="art">
                        <img src="resources/img/gang/3.jpg" alt="unknown">
                        <p></p>
                    </div>
                    <div class="art">
                        <img src="resources/img/art_work/2.jpg" alt="Eekay De Realer">
                        <p></p>
                    </div>
                    <div class="art">
                        <img src="resources/img/art_work/3.jpg" alt="unknown">
                        <p></p>
                    </div>
                    <div class="art">
                        <img src="resources/img/art_work/1.jpg" alt="Rodney Nyelisani Kubayi">
                        <p></p>
                    </div>
                    <div class="art">
                        <img src="resources/img/gang/4.jpg" alt="unknown">
                        <p></p>
                    </div>
                </section>
            </section>
        </section>
        <?php footer_view(); ?>
    </body>
</html>
