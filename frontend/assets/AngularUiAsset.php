<?php
namespace frontend\assets;
use yii\web\AssetBundle;
/**
 * Class AngularAsset
 * @package yii\web
 */
class AngularUiAsset extends AssetBundle
{
	public $sourcePath = '@vendor/angular-ui/bootstrap';

	/**
	 * @param \yii\web\View $view
	 */
	public function registerAssetFiles($view)
	{
		$prefix = !YII_DEBUG ? '.min.' : '.';
		$this->js[] = 'ui-bootstrap'.$prefix.'js';
		$this->js[] = 'ui-bootstrap-tpls'.$prefix.'js';

		parent::registerAssetFiles($view);
	}
}
