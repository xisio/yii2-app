<?php

use Yii\helpers\Html;
/*
function calculate_image_aspect($width,$height,$aspect,$square = false){
	$max_width  = 1024;
	$max_height = 512;
	$new_width  = 0;
	$new_height = 0;
	if(($width /$aspect) == 0){
		$new_height =1;
	}else{
		$new_height/=$aspect;
	}
}*/


	function makeActionButtons($buttons=['view','update','delete']){
		$actionButtons = [];
		$actionButtons['update']= function($url,$model) {
			 return Html::a('<i class="fa fa-edit"></i>', $url, [
			     'title' => Yii::t('app', 'edit')
			 ]);
		};
		$actionButtons['delete'] = function($url,$model) {
			 return Html::a('<i class="fas fa-trash"></i>', $url, [
			     'title' => Yii::t('app', 'delete'),
			     'data' =>
			     [
			         'method' => 'post',
			         'confirm' => 'Sind Sie sicher, dass Sie den Eintrag löschen möchten?'
			     ]
			 	
			 ]);
		};
		$actionButtons['view'] = function($url,$model) {
			 return Html::a('<i class="fas fa-eye"></i>', $url, [
			     'title' => Yii::t('app', 'view')
			 ]);
		};
		return array_intersect_key($actionButtons,array_flip($buttons));
	}

?>
