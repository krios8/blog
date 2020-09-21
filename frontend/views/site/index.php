<?php

/* @var $this yii\web\View */
?>
<?php foreach ($post as $lenta): ?>
<div class="main-post main-lenta">
    <p class="post-categories"><?= $lenta->categoria->name ?></p>
<p class="post-author"><?= $lenta->author->username ?></p>
<h1 class="post-head"><?= $lenta->name ?></h1>
<img src="../../../frontend/web/<?= $lenta->img->src ?>" alt="<?= $lenta->img->name ?>" class="post-img">
<p class="post-text post-text-lenta "><?= $lenta->text ?></p>
</div>
<?php endforeach; ?>
