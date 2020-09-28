<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'Лента';

?>
<div class="search">
    <?php $form = ActiveForm::begin([
            'action' =>['site/search'],
            'id'=>'kek',
        ]); ?>
    <?= $form->field($posts, 'name', ['template' => '{label}{input}', 'options' => ['tag' => false]])->textInput(['autocomplete'=>'off', 'id' => 'kek-i'])
    ->label('Поиск')?>
    <script>
        $('body').on('input', '#kek-i', function () {
            var c = $(this).val().length;
            if (c >= 2) {
                $('.container-search').html('');
                search();
            }

            if (c == 0) {
                $('.container-search').fadeOut();
                $('.container-search').html('');
            }

        });

        function search() {
            $.ajax({
                type: "POST",
                url: 'site/search',
                data: $('#kek').serialize(),
                success: function(res){
                    $('.container-search').html('');
                    res = res.split('/');
                    res.splice(-1,1);
                    var resel = $('.res').clone();
                    var src = resel.children().attr('href');
                    var cont = $('.container-search');
                    for (var i = 0; i < res.length; i++) {
                        res[i] = res[i].split('-');
                        var resel2 = resel.clone();
                        resel2.children().attr('href', src+res[i][0]).html(res[i][1])
                        cont.append(resel2);
                    }
                    cont.fadeIn();
                }
            });
        }
    </script>
    <?php ActiveForm::end(); ?>
    <div class="container-search">

    </div>
</div>

<?php foreach ($post as $lenta): ?>
<div class="main-post main-lenta">
    <p class="post-categories"><?= $lenta->categoria->name ?></p>
<p class="post-author"><?= $lenta->author->username ?></p>
<a href="vpost?id=<?= $lenta->id ?>" class="post-head lenta-a"><?= $lenta->name ?></a>
<img src="../../../frontend/web/<?= $lenta->img->src ?>" alt="<?= $lenta->img->name ?>" class="post-img">
<p class="post-text post-text-lenta "><?= $lenta->text ?></p>
</div>
<?php endforeach; ?>
<div class="hidd">
    <div class="res">
        <a href="vpost?id=" id="sc">
            кек
        </a>
    </div>
</div>
