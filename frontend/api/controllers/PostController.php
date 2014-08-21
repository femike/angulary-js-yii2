<?php
namespace frontend\api\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

/**
 * Class PostController
 * @package rest\versions\v1\controllers
 */
class PostController extends ActiveController
{
	public $modelClass = 'frontend\api\models\Post';
}
