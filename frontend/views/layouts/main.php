<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

AppAsset::register($this);

/**
 * @var \yii\web\View $this
 * @var string $content
 */
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>" ng-app="myApp">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<base href="/">
		<script>document.write('<base href="' + document.location + '" />');</script>
		<meta name="fragment" content="!"/>
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body data-spy="scroll" class="ng-cloak">
	<?php $this->beginBody() ?>

	<div class="wrap">

		<?php
		NavBar::begin([
			'brandLabel' => Yii::$app->name,
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar navbar-default navbar-fixed-top',
			],
		]);
		$menuItems = [
			['label' => 'Home', 'url' => ['/site/index']],
			['label' => 'Post', 'url' => ['/post']],
		];
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => $menuItems,
		]);
		NavBar::end();
		?>

		<div class="clearfix fix-navbar-top"></div>

		<div class="container">
			<?=
			Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
			<?= Alert::widget() ?>
			<?= $content ?>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<p class="pull-left">&copy; My Company <?= date('Y') ?></p>

			<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>