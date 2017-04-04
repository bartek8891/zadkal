<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<p>
    <?= Html::a('ZADANIE1', ['/task'], ['class' => 'btn btn-success'])
//    . Html::beginForm(['/task'], 'post')
        .Html::a('Panel administratora', ['/user/admin/index'], ['class' => 'btn btn-success'])
    ?>
</p>
<p>
    <?= Html::a('Kalendarz', ['/event'], ['class' => 'btn btn-success'])
        .Html::img('kalendarz.jpeg')
    ?>
</p>
<?php echo Html::img('/img/kalendarz.jpeg') ?>