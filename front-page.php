<?php

get_header();

?>

<div class="hero-box">
    <div class="as-seen-in container">
        <div class="row">
            <img src="<?= ASSETS_DIR ?>/images/as-seen-in-01.png" alt="">
            <img src="<?= ASSETS_DIR ?>/images/as-seen-in-02.png" alt="">
            <img src="<?= ASSETS_DIR ?>/images/as-seen-in-03.png" alt="">
            <img src="<?= ASSETS_DIR ?>/images/as-seen-in-04.png" alt="">
        </div>
    </div>
    <div class="main-cta container">
        <div class="row">
            <!-- <div class="col-sm-7">
                <h1>NYC&rsquo;s Best Personal Training Gym</h1>
            </div> -->
            <div class="col-sm-5 col-sm-offset-7">
                <h4>See for Yourself</h4>
                <!-- <p>Try SP™ Training for Just $89</p> -->
                <a href="#start-link" class="btn">Join Now</a>
            </div>
        </div>
    </div>
    <img src="<?= ASSETS_DIR ?>/images/nyc-bg.jpg" alt="">
</div>

<div class="cta-banners container">
    <div class="row">
        <div class="banner">
            <!-- <h2><a href="#banner-link">Private Client Program</a></h2> -->
            <a href="#banner-link">
                <img src="<?= ASSETS_DIR ?>/images/temp-banner-01.jpg" alt="">
            </a>
            <p>
                Learn more about New York's best personal training packages and purchase yours today. Become a Halevy Life member and save!
                <a href="#banner-link" class="read-more">Learn more</a>
            </p>
        </div>
        <div class="banner">
            <!-- <h2><a href="#banner-link">SureFit&trade; Fitness Training</a></h2> -->
            <a href="#banner-link">
                <img src="<?= ASSETS_DIR ?>/images/temp-banner-02.jpg" alt="">
            </a>
            <p>
                See our available classes and training slots to find the perfect fit for your busy schedule. There's always time for your health!
                <a href="#banner-link" class="read-more">Learn more</a>
            </p>
        </div>
        <div class="banner">
            <!-- <h2><a href="#banner-link">Fitness Guaranteed&trade;</a></h2> -->
            <a href="#banner-link">
                <img src="<?= ASSETS_DIR ?>/images/temp-banner-03.jpg" alt="">
            </a>
            <p>
                Halevy Life is Manhattan's best fitness facility and personal training gym. Learn what separates Jeff Halevy and his team from the rest.
                <a href="#banner-link" class="read-more">Learn more</a>
            </p>
        </div>
    </div>
</div>

<?php

get_footer();
