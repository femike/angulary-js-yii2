<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $model->title;
$this->params['breadcrumbs'] = [
	['label' => 'Посты', 'url' => ['/post']],
	$this->title,
	['label' => 'изменить', 'url' => ['/post/update', 'id' => $model->id]],
	['label' => 'удалить', 'url' => ['/post/delete', 'id' => $model->id]]
]
?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="row">
	<?= Html::encode($model->content) ?>
</div>