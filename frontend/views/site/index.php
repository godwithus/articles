<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

            
        <div class="jumbotron author-title">
            <h1>Welcome To Our Web!</h1>

            <p class="lead">You have successfully created your Yii-powered application.</p>

            <p><a class="btn btn-lg btn-success" href="<?= Url::to('blog/index') ?>">Start Reading</a></p>
        </div>


        <div class="container author-title">
            <div class="row">
                <div class="col-lg-4">
                    <h2>Culture </h2>

                    <p class="author-bio">Instead, I’d like to focus on YOU – how are you? How are you coping with the changes that have entered your life like a tornado? Are you now suddenly working from home…and learning to do so on the fly? </p>

                    <p><a class="btn btn-default" href="#">Learn More</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Fashion</h2>

                    <p class="author-bio">Starting a blog today is pretty straightforward, but it’s hard to be successful and make money from it.

If you’re passionate about fashion and style, you’re probably already following the hottest fashion bloggers and influencers on Instagram.
 </p>

                    <p><a class="btn btn-default" href="#">Learn More</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Education</h2>

                    <p class="author-bio">But right now, in 2020, I would argue hope is needed as much as any other strategy that schools are deploying. We are undergoing incredibly powerful and much needed systemic changes. Hope is the catalyst that is necessary to help our students </p>

                    <p><a class="btn btn-default" href="#"> Learn More </a></p>
                </div>
            </div>
        </div>

    </div>
</div>