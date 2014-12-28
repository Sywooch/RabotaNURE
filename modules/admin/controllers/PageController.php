<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Page;
use app\models\PageSearch;
use app\modules\admin\controllers\DefaultController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Image;
use yii\web\UploadedFile;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends DefaultController
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
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
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
            'ru' => new Page(),
            'en' => new Page(),
            'ua' => new Page()
        ];

        if (Yii::$app->request->isPost) {
            //var_dump($_POST);
            $img = UploadedFile::getInstance($models['ru'], '[ru]image_id');
            $img = Image::saveByFile($img);
            //var_dump($img);
            
            if (Page::loadMultiple($models, \Yii::$app->request->post())) {
                if ($this->alreadyExists($models['ru']->name)) {
                    //TODO: show some error page. cant do via validation it seems
                    return $this->render('create', [
                        'models' => $models
                    ]);
                }
                $this->adjustModels($models, $img);
                if (Page::validateMultiple($models)) {
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
    }

    private static function adjustModels($models, $img) {
        foreach ($models as $key => $m) {
            $m->lang = Page::$langs[$key];
            $m->name = $models['ru']->name;
            if ($img !== null) {
                $m->image_id = $img->id;
            }
        }
    }

    private static function alreadyExists($name) {
        return count(
            Page::find()
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
                $model->image_id = $img === null ? $model->getOldProperties()['image_id'] : $img->id;
            }

            $models = [];
            if ($model->name !== $oldName) {
                $models = array_merge(
                        Page::find()->where(['name' => $oldName])->all(),
                        [$model]
                    );
            } else {
                $models = Page::find()
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
        $model = Page::findOne($id);
        $models = Page::find()
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
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
