<?php

namespace backend\controllers;

use Yii;
use backend\models\Articles;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\Url;


/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['create', 'update'], If this is enable only the action in that array will not be accessible
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                    
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Articles::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        $model = Articles::findOne(['slug'=>$slug]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articles();

        if ($model->load(Yii::$app->request->post())) {

            
            $imageFile = UploadedFile::getInstance($model, 'feature_image');
            $imageFile2 = UploadedFile::getInstance($model, 'inner_post_image');

            $time = '';
            if(isset($imageFile->size) || isset($imageFile2->size)){

                if(!file_exists(Url::to('@webfront/images/feature_image/'))){
                    mkdir(Url::to('@webfront/images/feature_image/'), 0777, true);
                }

                if(!file_exists(Url::to('@webfront/images/inner_post_image/'))){
                    mkdir(Url::to('@webfront/images/inner_post_image/'), 0777, true);
                }

                $time = time().rand(100, 999);

                $imageName = Url::to('@webfront/images/feature_image/').'/'.$time.'.'.$imageFile->extension;
                $imageName2 = Url::to('@webfront/images/inner_post_image/').'/'.$time.'.'.$imageFile2->extension;

                $imageFile->saveAs($imageName);
                $imageFile2->saveAs($imageName2);
            }

            if($time != ''){
                $model->feature_image = $time.'.'.$imageFile->extension;
                $model->inner_post_image = $time.'.'.$imageFile2->extension;
            }
            
            if ($model->validate()) {

                $model->save(false);
                return $this->redirect(['view', 'slug' => $model->slug]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            
            $imageFile = UploadedFile::getInstance($model, 'feature_image');
            $imageFile2 = UploadedFile::getInstance($model, 'inner_post_image');

            $time = '';
            if(isset($imageFile->size) || isset($imageFile2->size)){

                if(!file_exists(Url::to('@webfront/images/feature_image/'))){
                    mkdir(Url::to('@webfront/images/feature_image/'), 0777, true);
                }

                if(!file_exists(Url::to('@webfront/images/inner_post_image/'))){
                    mkdir(Url::to('@webfront/images/inner_post_image/'), 0777, true);
                }

                $time = time().rand(100, 999);

                $imageName = Url::to('@webfront/images/feature_image/').'/'.$time.'.'.$imageFile->extension;
                $imageName2 = Url::to('@webfront/images/inner_post_image/').'/'.$time.'.'.$imageFile2->extension;

                $imageFile->saveAs($imageName);
                $imageFile2->saveAs($imageName2);
            }

            if($time != ''){
                $model->feature_image = $time.'.'.$imageFile->extension;
                $model->inner_post_image = $time.'.'.$imageFile2->extension;
            }
            
            if ($model->validate()) {

                $model->save(false);
                return $this->redirect(['view', 'slug' => $model->slug]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Articles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
