<?php require_once 'header.php';

$pageMeta = getPageMeta(1);

?>
<div class="tg-bannerholder">
    <ul class="tg-socialicons tg-bannersocialicons">
        <li><a href="#" target="_blank"><i
                        class="fa fa-brands fa-linkedin-in"></i></a></li>
        <li><a href="#" target="_blank"><i class="fa fa-brands fa-instagram"></i></a>
        </li>
        <li><a href="#" target="_blank"><i class="fa fa-brands fa-twitter"></i></a></li>
        <li><a href="#" target="_blank"><i class="fa fa-brands fa-facebook-f"></i></a>
        </li>
        <li><a href="#" target="_blank"><i
                        class="fa fa-brands fa-youtube"></i></a></li>
    </ul>

    <div id="tg-homeslider" class="tg-homeslider tg-haslayout owl-carousel">
        <?php

        for ($i = 1; $i < 2; $i++) {

            ?>
            <figure class="item tg-bannerimg" data-vide-bg="poster: view/site/assets/images/slider/slider-<?= $i ?>.jpg"
                    data-vide-options="position: center">
                <figcaption>
                    <div class="container">

                        <div class="tg-slidercontent mt-4">

                            <?php echo getPageMeta(1)['slider_' . $SiteLang] ?>

                        </div>
                    </div>
                </figcaption>
            </figure>
            <?php
        }


        ?>
    </div>
</div>
<main id="tg-main" class="tg-main tg-haslayout">


    <?php if ($pageMeta['status_cagri_' . $SiteLang]): ?>
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-shortcode tg-aboutusshortcode">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left mt-4 mt-md-4 mt-lg-0">
                            <div class="tg-shortcodetext">
                                <div class="tg-sectionhead tg-textalignleft">

                                    <div class="tg-description homecustom">
                                        <?php

                                        $pageMeta = getPageMeta(1);

                                        echo $pageMeta['cagri_' . $SiteLang];

                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($pageMeta['status_onemliTarihler_' . $SiteLang]): ?>
        <section class="tg-haslayout tg-bgparallax tg-bgcounter">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-statisticscounters homecustomistatistik">
                            <div class="tg-counterholder">
                                <div class="tg-counter">
                                    <h2><span>
                                            <?php
                                            echo(
                                            strtotime(optionGet('ozetTeslimDate')) < time() ?
                                                '<del>' . date('d.m.Y', strtotime(optionGet('ozetTeslimDate'))) . '</del>' :
                                                date('d.m.Y', strtotime(optionGet('ozetTeslimDate'))))
                                            ?>

                                        </span></h2>
                                    <h3><?=optionGet('ozetTeslimDate_'.$SiteLang)?></h3>
                                    <span class="tg-statisticicon fa fa-paper-plane"></span>
                                </div>
                            </div>
                            <div class="tg-counterholder">
                                <div class="tg-counter">
                                    <h2><span>
                                            <?php
                                            echo(
                                            strtotime(optionGet('ozetKabulDate')) < time() ?
                                                '<del>' . date('d.m.Y', strtotime(optionGet('ozetKabulDate'))) . '</del>' :
                                                date('d.m.Y', strtotime(optionGet('ozetKabulDate'))))
                                            ?>

                                        </span></h2>
                                    <h3><?=optionGet('ozetKabulDate_'.$SiteLang)?></h3>
                                    <span class="tg-statisticicon fa fa-envelope-circle-check"></span>
                                </div>
                            </div>
                            <div class="tg-counterholder">
                                <div class="tg-counter">
                                    <h2><span>
                                            <?php
                                            echo(
                                            strtotime(optionGet('tamMetinDate')) < time() ?
                                                '<del>' . date('d.m.Y', strtotime(optionGet('tamMetinDate'))) . '</del>' :
                                                date('d.m.Y', strtotime(optionGet('tamMetinDate'))))
                                            ?>

                                        </span></h2>
                                    <h3><?=optionGet('tamMetinDate_'.$SiteLang)?></h3>
                                    <span class="tg-statisticicon fa fa-newspaper"></span>

                                </div>
                            </div>
                            <div class="tg-counterholder">
                                <div class="tg-counter">
                                    <h2><span>
                                            <?php
                                            echo(
                                            strtotime(optionGet('tamMetinKabulDate')) < time() ?
                                                '<del>' . date('d.m.Y', strtotime(optionGet('tamMetinKabulDate'))) . '</del>' :
                                                date('d.m.Y', strtotime(optionGet('tamMetinKabulDate'))))
                                            ?>

                                        </span></h2>
                                    <h3><?=optionGet('tamMetinKabulDate_'.$SiteLang)?></h3>
                                    <span class="tg-statisticicon fa fa-envelope-circle-check"></span>

                                </div>
                            </div>
                            <div class="tg-counterholder">
                                <div class="tg-counter">
                                    <h2><span>
                                            <?php
                                            echo(
                                            strtotime(optionGet('programDate')) < time() ?
                                                '<del>' . date('d.m.Y', strtotime(optionGet('programDate'))) . '</del>' :
                                                date('d.m.Y', strtotime(optionGet('programDate'))))
                                            ?>

                                        </span></h2>
                                    <h3><?=optionGet('programDate_'.$SiteLang)?></h3>
                                    <span class="tg-statisticicon fa fa-bullhorn"></span>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


</main>
<?php require_once 'footer.php'; ?>
