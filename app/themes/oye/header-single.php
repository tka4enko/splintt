<?php
get_template_part('head');
?>

<body <?php body_class(); ?>>
    <?php echo $GLOBALS['theme_opt']['code_after_body_starttag']; ?>

    <header>
        <div class="custom-container header-data">
            <div class="single-menu">
                <?php
                $postType = get_post_type(get_the_ID());
                ?>

                <?php
                switch ($postType) {
                    case 'portfolio' :
                        ?>
                        <ul class = "single-menu-list hidden-xs">
                            <li><a class="single-menu-list-li item" id="vraag" href="#vraag-row"><?php echo _e('De vraag','oyetheme'); ?></a></li>
                            <li><a class="single-menu-list-li item" id="oplossing" href="#oplossing-row"><?php echo _e('De oplossing','oyetheme'); ?></a></li>
                            <li><a class="single-menu-list-li item" id="klant" href="#klant-row"><?php echo _e('De klant aan het woord','oyetheme'); ?></a></li>
                            <li class="single-menu-list-li-return"><a href="portfolio"><?php echo _e('Sluiten','oyetheme'); ?> <img class="close" src="<?php echo get_template_directory_uri() ?>/images/portfolio/close.png"></a></li>
                        </ul>
                        <ul class="visible-xs menu-small">
                            <li id="trigger" ><a class="item first-item" id="vraag" href="#vraag-row" >De vraag <span><img  id="arrow-down"src="<?php echo get_template_directory_uri() ?>/images/portfolio/arrow-down.png" alt=""/> </span>
                                    <img  id="arrow-up"src="<?php echo get_template_directory_uri() ?>/images/portfolio/arrow-up.png" alt=""/> </span>
                                </a>
                            </li>
                            <ul id="hide">
                                <li><a class="item" id="oplossing" href="#oplossing-row"><?php echo _e('De oplossing','oyetheme'); ?></a></li>
                                <li><a class="item" id="klant" href="#klant-row"><?php echo _e('De klant aan het woord','oyetheme'); ?></a></li>
                            </ul>
                            <li class="single-menu-list-li-return"><a href="portfolio-2"> <img class="close" src="<?php echo get_template_directory_uri() ?>/images/portfolio/close.png"></a></li>
                        </ul>
                        <?php
                        break;
                    }
                ?>

                <!--            <a class="menu-strip visible-xs visible-sm" href="#">
                                <span class="iconc-hamburger-menu"></span>
                            </a>-->
            </div>
    </header>