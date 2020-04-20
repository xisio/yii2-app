<?php

use yii\helpers\Html;
use yii\helpers\Url;
//echo "User: " . Yii::$app->user->identity->username;
//echo "Group: " ;
//var_dump( $groups = \Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));

if (\Yii::$app->getUser()->isGuest &&
    \Yii::$app->getRequest()->url !== Url::to(\Yii::$app->getUser()->loginUrl)
) {
    \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl)->send();
    exit(0);
}
if(\Yii::$app->request->url == '/'){
	\Yii::$app->getResponse()->redirect(Yii::$app->homeUrl);
}

/** @var $this \yii\web\View */
/** @var $content string */

rmrevin\yii\fontawesome\CdnFreeAssetBundle::register($this);
backend\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(empty($this->title) ? '' : $this->title . ' - ') ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- <pre>
user: <?= Yii::$app->user->identity->username ?> 
roles: <?= implode(',',array_map(
function($role){
	return $role->name;
},\Yii::$app->authManager->getRolesByUser(\Yii::$app->user->identity->id))); ?> 
</pre> -->
	<div class="container-fluid">
		<div class="row">
<?php if(Yii::$app->user->identity !== null) : ?> 

    <?= Html::a('<i class="fas fa-sign-out-alt"></i> Logout',
           ['/user/security/logout'],
           ['class'=>'btn btn-default btn-flat', 
           'data' => ['method' => 'post',]]
	);
        ?>
<?php endif; ?> 
		</div>
		<div class="row">
			<div class="col-md-2">
<?php
		?>
		<?php if(Yii::$app->user->isGuest === false ): ?> 
			<div class="navigation-menu">
				<?=$this->render('_menu.php');?>	

			</div>
		<?php endif; ?> 
		</div>
		<div class="col-md">
			<?= $content ?>
		</div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
