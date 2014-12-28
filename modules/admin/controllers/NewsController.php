<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use app\modules\admin\controllers\DefaultController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Image;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends DefaultController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $models = [
            'ru' => new News(),
            'en' => new News(),
            'ua' => new News()
        ];

        if (Yii::$app->request->isPost) {
            //var_dump($_POST);
            $img = UploadedFile::getInstance($models['ru'], '[ru]image_id');
            $img = Image::saveByFile($img);
            //var_dump($img);
            
            if (News::loadMultiple($models, \Yii::$app->request->post())) {
                if ($this->alreadyExists($models['ru']->name)) {
                    //TODO: show some error page. cant do via validation it seems
                    return $this->render('create', [
                        'models' => $models
                    ]);
                }
                $this->adjustModels($models, $img);
                if (News::validateMultiple($models)) {
                    foreach ($models as $m) {
                        $m->save();
                    }
                    return $this->redirect(['view', 'id' => $models['ru']->id]);
                } else {
                    //var_dump($models['ru']->getErrors());
                    if ($img !== null) {
                        $img->delete();
                    }
                }
            }
        } else { 
            
            return $this->render('create', [
                'models' => $models
            ]);
        }
        
        

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
    }

    private static function adjustModels($models, $img) {
        foreach ($models as $key => $m) {
            $m->lang = News::$langs[$key];
            $m->date = date("Y-m-d H:i:s");
            $m->name = $models['ru']->name;
            if ($img !== null) {
                $m->image_id = $img->id;
            }
        }
    }

    private static function alreadyExists($name) {
        return count(
            News::find()
            ->where(['name' => $name])
            ->all()) > 0;
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $oldName = $model->getOldAttributes()['name'];
            
            $file = UploadedFile::getInstance($model, 'image_id');
            if ($file !== null) {
                $img = Image::saveByFile($file);
                if ($img !== null) {
                    $model->image_id = $img->id;
                }
            }

            $models = [];
            if ($model->name !== $oldName) {
                $models = array_merge(
                        News::find()->where(['name' => $oldName])->all(),
                        [$model]
                    );
            } else {
                $models = News::find()
                    ->where(['name' => $model->name])
                    ->all();
            }

            foreach ($models as $m) {
                $m->name = $model->name;
                $m->image_id = $model->image_id;
                $m->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = News::findOne($id);
        $models = News::find()
            ->where(['name' => $model->name])
            ->all();
        foreach ($models as $m) {
            $m->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
