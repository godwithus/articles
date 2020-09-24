<?php

namespace frontend\controllers;

use backend\models\Articles;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Articles::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionView($slug)
    {
        $model = Articles::findOne(['slug'=>$slug]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

}
