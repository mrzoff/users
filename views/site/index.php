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
            'username',
            'email',
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{favorite}',
                'buttons'=> [
                    'favorite' => function ($url, $model) use ($this_user) {                        
                        if ($favorite = $this_user->getFavorites()->where(['favorite_user_id'=>$model->id])->asArray()->one()) {
                            return Html::a('<span class="glyphicon glyphicon-star" style="color: #ff5722;"></span>', ['site/delete-from-favorite', 'id' => $favorite['id']], ['title' => 'Удалить']);
                        } else {
                            return Html::a('<span class="glyphicon glyphicon-star-empty"></span>', ['site/add-to-favorite', 'id' => $model->id], ['title' => 'Добавить']); 
                        }
                        
                    }
                ]
            ],
        ],
    ]); ?>
    </div>
</div>
