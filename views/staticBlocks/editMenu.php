<?php use yii\helpers\Url;?>

<ul class="edit-menu">
    <li class="<?=$activeLabel=='basic'?'active':''?>"><i class="icon ion-ios-information-outline"></i><a href="<?=Url::toRoute(['edit/basic','id'=>$user->id])?>">Информация</a></li>
    <li class="<?=$activeLabel=='work'?'active':''?>"><i class="icon ion-ios-briefcase-outline"></i><a href="<?=Url::toRoute(['edit/work-edu','id'=>$user->id])?>">Учеба и работа</a></li>
    <li class="<?=$activeLabel=='setting'?'active':''?>"><i class="icon ion-ios-settings"></i><a href="<?=Url::toRoute(['edit/setting','id'=>$user->id])?>">Настройки</a></li>
    <li class="<?=$activeLabel=='password'?'active':''?>"><i class="icon ion-ios-locked-outline"></i><a href="<?=Url::toRoute(['edit/password','id'=>$user->id])?>">Изменить пароль</a></li>
</ul>