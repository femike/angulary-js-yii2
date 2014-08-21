<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Post;

$this->title = 'Post';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Создать', 'url' => 'post/create'];

echo GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		'title',
		'content',
		[
			'class' => 'yii\grid\ActionColumn',
		],
	]
]);
?>
