<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Пользователи';
?>
<div class="site-index">

    <div class="body-content">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => null,
        'columns' => [
            'user.username',
            'user.email',
            'user.created_at',
            [
                'label'=>'Добавлен в избранное', 
                'value'=>'created_at'
            ]
        ],
    ]); ?>
    </div>
</div>
