<?php
    use yii\helpers\Url;
?>

<main id="content" class="content" role="main">
    <div class="wraps">

        <article class="post featured">
            <section class="post-content">
                <?php 
                    if($model->inner_post_image != ''){ ?>
                        <img src="<?= Url::to('/images/inner_post_image/').$model->inner_post_image; ?>"> <br><br>
                    <?php } ?>
                <div style="padding: 10px;">
                    <h1><?= $model->title; ?></h1>
                    <?= $model->post; ?> 
                </div>
            </section>
        </article>
    </div>
</main>
