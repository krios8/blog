<?php

//$this->title = $post->name;

?>


<div class="main-post">
    <p class="post-categories"><?= $post->categoria->name ?></p>
    <p class="post-author"><?= $post->author->username ?></p>
    <h1 class="post-head"><?= $post->name ?></h1>
    <img src="../../../frontend/web/<?= $post->img->src ?>" alt="<?= $post->img->name ?>" class="post-img">
    <p class="post-text"><?= $post->text ?></p>
</div>

<?php echo \yii2mod\comments\widgets\Comment::widget([
    'model' => $post,
    'relatedTo' => 'User ' . \Yii::$app->user->identity->username . ' commented on the page ' . \yii\helpers\Url::current(),
    'maxLevel' => 2,
    'dataProviderConfig' => [
        'pagination' => [
            'pageSize' => 10
        ],
    ],
    'listViewConfig' => [
        'emptyText' => 'No comments found.',
    ],
]); ?>
