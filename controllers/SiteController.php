<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\RegistrationForm;
use app\models\User;
use app\models\Favorite;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    return Yii::$app->response->redirect(['site/login']);
                },
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'index', 'favorites', 'add-to-favorite', 'delete-from-favorite'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $usersQuery = User::find()->where(['<>', 'id', Yii::$app->user->identity->id]);
        $this_user = User::findOne(Yii::$app->user->identity->id);

        $dataProvider = new ActiveDataProvider([
            'query' => $usersQuery,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', ['dataProvider'=>$dataProvider, 'this_user'=>$this_user]);
    }

    public function actionSignup()
    {
        $model = new RegistrationForm();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                return Yii::$app->response->redirect(['site/login']);
            }
        }
 
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                return $this->goHome();
            }
        }
 
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return Yii::$app->response->redirect(['site/login']);
    }

    public function actionFavorites()
    {
        $favorites = Favorite::find()->with('user')->where(['user_id'=>Yii::$app->user->identity->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $favorites,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('favorites', ['dataProvider'=>$dataProvider]);
    }

    public function actionAddToFavorite($id)
    {
        if (!Favorite::isExist(Yii::$app->user->identity->id, $id)) {
            $model = new Favorite();
            $model->user_id = Yii::$app->user->identity->id;
            $model->favorite_user_id = $id;

            if (!$model->save()) {
                throw new \yii\web\HttpException(400, var_dump($model->errors));
            }           
        } else {
            Yii::$app->session->setFlash('error', 'Пользователь уже в избранном');
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionDeleteFromFavorite($id)
    {
        $model = Favorite::findOne($id);
        if (!is_null($model)) {
            if (!$model->delete()) {
                throw new \yii\web\HttpException(400, var_dump($model->errors));
            }
        } else {
            Yii::$app->session->setFlash('error', 'Пользователя нет в избранном');
        }        

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}