<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\Food;
use yii\data\ActiveDataProvider;
use app\modules\admin\controllers\AppAdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ManageController реализует действия CRUD для модели Food.
 */
class ManageController extends AppAdminController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
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
     * Список всех продуктов.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Food::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Отображает одну модель Food.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException если модель не может быть найдена
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Создает новую модель Food.
     * Если создание прошло успешно, браузер будет перенаправлен на страницу просмотра.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Food();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->img = $model->imageFile->baseName . '.' . $model->imageFile->extension;
            $model->upload();
            $model->imageFile = null;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Обновляет существующую модель Food.
     * Если обновление прошло успешно, браузер будет перенаправлен на страницу просмотра.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException если модель не может быть найдена
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->img = $model->imageFile->baseName . '.' . $model->imageFile->extension;
            $model->upload();
            $model->imageFile = null;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Удаляет существующую модель Food.
     * Если обновление прошло успешно, браузер будет перенаправлен на страницу просмотра.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException если модель не может быть найдена
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink('images/food/' . $model->img);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Находит модель Food на основе значения ее первичного ключа.
     * Если модель не найдена, будет выдано исключение 404 HTTP.
     * @param integer $id
     * @return Food загруженная модель
     * @throws NotFoundHttpException если модель не может быть найдена
     */
    protected function findModel($purchase_id)
    {
        if (($model = Food::findOne($purchase_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }
}
