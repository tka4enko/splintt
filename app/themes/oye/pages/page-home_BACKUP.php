<?php
/*
 * Template Name: Page Home BACKUP
 */

get_header();


if (function_exists('wpcf7_enqueue_scripts')) {
    wpcf7_enqueue_scripts();
}

if (function_exists('wpcf7_enqueue_styles')) {
    wpcf7_enqueue_styles();
}
?>
<?php echo get_template_directory_uri() ?>
<div class="homeCt" id="main">
    <div id="main-inner">
        <!--wrapper image-->
        <section class="home-header header-style1 ">
            <div class="header-inner">
                <div class="wrapper-text">
                    <h1>Online leren brengt organisaties verder in een wereld met hoog tempo</h1>
                    <h2 class="font-calibri">Didactisch slimme e-learning oplossingen</h2>
                </div>
            </div>
            <div class="overlay-design"></div>
            <div class="overlay-shadow visible-xs"></div>
        </section>
        <section class="leren">
            <div class="container">
                <div class="row">
                    <div class=" col-xs-12 col-sm-2">
                        <figure>
                            <img src="<?php echo get_template_directory_uri() ?>/images/icons/coin.svg">
                        </figure>
                    </div>
                    <div class=" col-xs-12 col-sm-10">
                        <div class="description">
                            <span class="fw-b font-calibri-bold">Leren en groeien zijn</span><span class="fw-b font-calibri-bold-italic "> 2 sides of the same coin </span>
                            <p class="font-calibri">Ken je dat verhaal van dat e-learning bureau dat je eerst niet zo vaak zag en nu overal ziet? Dat verhaal lijkt heel erg op de opkomst van e-learning in de wereld van organisaties en leren.</p>
                            <p class="font-calibri">Wij zijn Splintt. Werken met ons betekent grip op groei, op innovatie en op je organisatie. We koppelen leren aan performance vanuit een didactische achtergrond, in een nieuw jasje. Dat doen we voor kleine en hele grote klanten.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--boxes and carousel-->
        <section class="wrapper-boxes-and-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2 class="pink">Recente projecten waar we trots op zijn</h2>
                    </div>
                </div>
            </div>
            <div class="wrapper-image-background">
                <figure>
                    <img  class="pattern" src="<?php echo get_template_directory_uri() ?>/images/icons/header-footer/1920-header-no-pattern-down.svg">
                </figure>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 no-padding">
                            <div class="left-box bg-skyblue">
                                <div class="top-content">
                                    <p class="fw-b text font-calibri-bold">Iedereen weet dat SharePoint er is. Maar hoe zorg je ervoor dat het ook gebruikt wordt?</p>
                                    <p class="small font-calibri">Dat vroeg Robeco zich af.</p>
                                    <figure>
                                        <img src="<?php echo get_template_directory_uri() ?>/images/home/robeco.png">
                                    </figure>
                                    <a href="#" class="btn btn-nobg btn-box">Meer hierover lezen? <i class="iconc-arrow-button"></i></a>
                                </div>
                                <figure>
                                    <img class="image" src="<?php echo get_template_directory_uri() ?>/images/home/girl-left-box.png">
                                </figure>
                            </div>
                        </div>
                        <div class=" col-xs-12 col-sm-6 no-padding">
                            <div class="right-box bg-blue">
                                <figure>
                                    <img class="image" src="<?php echo get_template_directory_uri() ?>/images/home/people-right-box.png">
                                </figure>
                                <div class="bottom-content">
                                    <p class="fw-b text font-calibri-bold">ThatsIP: een gratis e-learning over intellectuele eigendoms-rechten, beschikbaar gesteld door het BBIE en Agentschap I&O</p>
                                    <p class="small font-calibri">De vraag aan ons was om dit 'droge' onderwerp aantrekkelijk aan te bieden.</p>
                                    <figure>
                                        <img src="<?php echo get_template_directory_uri() ?>/images/home/thats.png">
                                    </figure>
                                    <div class="">
                                        <a href="#" class="btn btn-nobg btn-box">Meer hierover lezen? <i class="iconc-arrow-button"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home-carousalPart">
                    <div class="container">
                        <div class="row">
                            <div class="inner">
                                <div class="left-part">
                                    <div id="reviewbox-carousal" class="carousel slide" data-ride="carousel">
                                        <!--Indicators--> 
                                        <ol class="carousel-indicators">
                                            <li data-target="#reviewbox-carousal" data-slide-to="0" class="active"></li>
                                            <li data-target="#reviewbox-carousal" data-slide-to="1"></li>
                                            <li data-target="#reviewbox-carousal" data-slide-to="2"></li>
                                            <li data-target="#reviewbox-carousal" data-slide-to="3"></li>
                                            <li data-target="#reviewbox-carousal" data-slide-to="4"></li>
                                        </ol>

                                        <!--Wrapper for slides--> 
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <p>"Splintt leidt je met <b>Kennis, inzicht</b> en veel <b>begrip</b> door het proces. Met als gevolg de <b>toonaangevende e-learning module</b> die wij wensten."</p>
                                            </div>

                                            <div class="item">
                                                <p>"Splintt leidt je met <b>Kennis, inzicht</b> en veel <b>begrip</b> door het proces. Met als gevolg de <b>toonaangevende e-learning module</b> die wij wensten."</p>
                                            </div>

                                            <div class="item">
                                                <p>"Splintt leidt je met <b>Kennis, inzicht</b> en veel <b>begrip</b> door het proces. Met als gevolg de <b>toonaangevende e-learning module</b> die wij wensten."</p>
                                            </div>

                                            <div class="item">
                                                <p>"Splintt leidt je met <b>Kennis, inzicht</b> en veel <b>begrip</b> door het proces. Met als gevolg de <b>toonaangevende e-learning module</b> die wij wensten."</p>
                                            </div>

                                            <div class="item">
                                                <p>"Splintt leidt je met <b>Kennis, inzicht</b> en veel <b>begrip</b> door het proces. Met als gevolg de <b>toonaangevende e-learning module</b> die wij wensten."</p>
                                            </div>
                                        </div>

                                        <!--Left and right controls--> 
                                        <a class="left carousel-control" href="#reviewbox-carousal" role="button" data-slide="prev">
                                            <i class="iconc-arrow-left-button"><span class="path1"></span><span class="path2"></span></i>
                                        </a>
                                        <a class="right carousel-control" href="#reviewbox-carousal" role="button" data-slide="next">
                                            <i class="iconc-arrow-right-button"><span class="path1"></span><span class="path2"></span></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="right-part">
                                    <i class="iconc-horn"></i>
                                    <div class="text-part">
                                        <div class="auther">
                                            <span>Jan Hart</span>
                                            <i class="iconc-star"></i>
                                            <i class="iconc-star"></i>
                                            <i class="iconc-star"></i>
                                            <i class="iconc-star"></i>
                                            <i class="iconc-star"></i>
                                        </div>
                                        <p>PR officer at the Benelux Office for intellectual Property</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="splintt-illustration">
                    <div class="container">
                        <div class="row">
                            <div class="inner text-center">
                                <img src="<?php echo get_template_directory_uri() ?>/images/home/splintt-illustration.png">
                                <h2>Op zoek naar e-learning die aansluit bij je organisatie?</h2>
                                <p>Splintt weet als geen ander de combinatie te vinden tussen een prettige leerbeleving en leren met resultaat. Wij zijn in staat om inhoud didactisch en visueel op zo'n manier aan te pakken dat het interessant blijft om steeds een stapje verder te gaan. We kiezen voor kwaliteit en aandacht in alles wat we doen en nemen je als klant mee in ontwikkeling.</p>
                                <div class="e-learningBtn-div">
                                    <a href="#" class="btn btn-pink mr30">E-learning <i class="iconc-arrow-button"></i></a>
                                </div>
                                <div class="wie-zijnBtn-div">
                                    <a href="#" class="btn btn-pink">Wie zijn wij? <i class="iconc-arrow-button"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="leuk-leren-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2 class="pink">Leuk leren, dicht bij de strategie</h2>
                    </div>
                </div>
            </div>
            <div class="image-background">
                <figure>
                    <img src="<?php echo get_template_directory_uri() ?>/images/icons/header-footer/1920-header-no-pattern-down.svg">
                </figure>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 padding-right small-padding">
                            <div class="left-side bg-blue">
                                <h3 class="fw-b font-calibri-bold">Don’t put lipstick on a pig</h3>
                                <span class="font-soho">Door  <strong>Natasja Jager</strong> &nbsp;&nbsp; - &nbsp;&nbsp; 29 april 2016</span>
                                <p class="font-calibri">Bizarre weken hier bij Splintt. Nieuwe puzzelstukjes worden naar hun juiste plek getrokken en nestelen zich stevig tussen de bestaande basis. Na jaren hard (en dan echt hard) werken aan alles wat belangrijk is in een groeiend bedrijf, is het er het moment dat ik hard kan werken aan een toekomst die verder ligt dan de deurmat. En lekker wat inspiratie kan opdoen...</p>
                                <a href="#" class="btn btn-nobg btn-box">Meer hierover lezen? <i class="iconc-arrow-button"></i></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 padding-left small-padding">
                            <div class="right-side bg-skyblue">
                                <h3 class="fw-b font-calibri-bold">Gamification bij de FBI</h3>
                                <span class="font-soho">Door  <strong>Philip van der Eijk<strong> &nbsp;&nbsp; - &nbsp;&nbsp; 22 april 2016</span>
                                            <p class="font-calibri">Spelend leren, een wereldplan. Het heeft wat weg van wat kinderen doen. Als ze iets niet leuk vinden, maken ze er gewoon een spelletje van. Ouders spelen hier ook briljant op in. Wil je kind al die krantensnippers op de grond niet opruimen, omdat hij of zij eigenlijk best trots is op het puike scheur- en pleurwerk? Stel dan voor om vuilnismannetje te spelen. Dikke tip. Pas wel op...</p>
                                            <a href="#" class="btn btn-nobg btn-box">Meer hierover lezen? <i class="iconc-arrow-button"></i></a>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <div class="wie-zijnBtn-div">
                                                        <a href="#" class="btn btn-pink">Meer hierover lezen?<i class="iconc-arrow-button"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            </section>
                                            </div>
                                            </div>
                                            <?php get_footer(); ?>
