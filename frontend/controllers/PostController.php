<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Post;
use yii\web\HttpException;

/**
 * Post controller
 */
class PostController extends Controller
{
//	public function behaviors()
//	{
//		return [
//			'verbs' => [
//				'class' => VerbFilter::className(),
//				'actions' => [
//					'delete' => ['post'],
//				],
//			],
//		];
//	}

	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * @return string
	 */
	public function actionIndex()
	{
		$searchModel =  new Post;
		$dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * @return string|\yii\web\Response
	 */
	public function actionCreate()
	{
		$model = new Post();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['/post/view', 'id' => $model->id]);
		}

		return $this->render('form', ['model' => $model]);
	}

	/**
	 * @param $id
	 * @return string|\yii\web\Response
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['/post/view', 'id' => $model->id]);
		}

		return $this->render('form', ['model' => $model]);
	}

	/**
	 * @param $id
	 * @return \yii\web\Response
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);

		if ($model->delete()) {
			return $this->redirect('/post');
		}
	}

	/**
	 * @param $id
	 * @return string
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);

		return $this->render('view', ['model' => $model]);
	}

	/**
	 * @param $id
	 * @return \yii\db\ActiveQuery
	 * @throws \yii\web\HttpException
	 */
	public function loadModel($id)
	{
		$model = Post::findOne($id);

		if ($model == null)
			throw new HttpException(404, 'Model not found.');

		return $model;
	}

}

