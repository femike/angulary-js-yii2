<div ng-controller="AlertController">
	<alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
</div>

<div ng-view  ng-animation="am-fade-and-slide-left">
	<?= $this->render('_index'); ?>
</div>