<?php
// use yii\helpers\StringHelper;
use yii\helpers\Url;
use backend\models\Articles;

?>
<nav class="main-nav overlay clearfix">
    <a class="blog-logo" href="<?= Url::to('/') ?>"><img src="<?= Url::to('/img/logo.jpg') ?>" style="width:100px;" alt="Blog Porfilio" /></a>
    <ul id="menu">
        <li class="nav-home nav-current" role="presentation"><a href="<?= Url::to('/blog/index') ?>">Home</a></li>
        <li class="nav-article-example" role="presentation"><a href="<?= Url::to('/blog/index') ?>">Blog</a></li>
        <li class="nav-article-example" role="presentation"><a href="https://facebook.com/" target="_blank">Facebook</a></li>
        <li class="nav-about-us" role="presentation"><a href="https://twitter.com" target="_blank">Twitter</a></li>
        <li class="nav-author-page" role="presentation"><a href="https://google.com" target="_blank">Google</a></li>
        <span class="socialheader">
            <a href="#"><span class='symbol'>circletwitterbird</span></a>
            <a href="#"><span class='symbol'>circlefacebook</span></a>
            <a href="#"><span class='symbol'>circlegoogleplus</span></a>
            <a href="mailto:wowthemesnet@gmail.com"><span class='symbol'>circleemail</span></a>
        </span>
    </ul>
</nav>
<header class="main-header author-head " style="background-image: url(<?= Url::to('/img/tree.jpg') ?>)">
</header>
