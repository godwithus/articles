<?php 
use yii\helpers\StringHelper;
use yii\helpers\Url;
use backend\models\Articles;
?>

<section class="author-profile inner">
    <figure class="author-image">
        <div class="img" style="background-image: url(<?= Url::to('/img/gravatar-new.jpg') ?>)">
            <span class="hidden">David's Picture</span>
        </div>
    </figure>
    <h1 class="author-title">David</h1>
    <h2 class="author-bio">The blog combining journalist David&#x27;s years of experience covering fashion and culture for among others. Read my blog and you will learn how to become a fashion editor.</h2>
    <div class="author-meta">
        <span class="author-location icon-location">Planet Earth</span>
        <span class="author-link icon-link"><a href="https://godwithus.github.io/">https://godwithus.github.io/</a></span>
        <span class="author-stats"><i class="icon-stats"></i>
            <?php
            $count = Articles::find()->count();
            echo $count . ' posts';
            ?>
        </span>
    </div>
</section>

<main class="content" role="main">
	<div class="grid">

		<?php foreach ($model as $key) {
		?>
			
			<div class="grid-item">
				<article class="post">
					<?php if($key->feature_image != ''){ ?>
						<a href="<?= Url::to(['blog/view', 'slug' => $key->slug]) ?>">
							<img src="<?= Url::to('/images/feature_image/').$key->feature_image; ?>">
						</a>
					<?php } ?>
					<div class="wrapgriditem">
						<header class="post-header">
							<h2 class="post-title"><a href="<?= Url::to(['blog/view', 'slug' => $key->slug]) ?>"><?= $key->title ?></a></h2>
						</header>
						<section class="post-excerpt">
							<p>
								<?= StringHelper::truncate(strip_tags($key->post), 200) ?> <a class="read-more" href="/retro-is-the-new-modern/">&raquo;</a>
							</p>
						</section>
						<footer class="post-meta">
							<img class="author-thumb" src="<?= Url::to('/img/gravatar.jpg')?>" alt="David" nopin="nopin" />
							David
							<time class="post-date" datetime="2015-12-17"><?= $key->created_at?></time>
						</footer>
					</div>
				</article>
			</div>
			
		<?php } ?>
	</div>
</main>
