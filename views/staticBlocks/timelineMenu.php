<?php
use yii\helpers\Url;
?>

<div class="timeline-cover" style="background: url('/images/covers/<?=$avatars->background;?>') no-repeat">

    <!--Timeline Menu for Large Screens-->
    <div class="timeline-nav-bar hidden-sm hidden-xs">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-info">
                    <img src="/images/users/<?=$avatars->avatar?>" alt="main_avatar" class="img-responsive profile-photo">
                    <h3><?=$user->firstname.' '.$user->lastname?></h3>
                    <p class="text-muted"><?=$profile->job_title;?></p>
                </div>
            </div>
            <div class="col-md-9">
                <ul class="list-inline profile-menu">
                    <li><a href="<?=Url::toRoute(['/profile/','id'=>$user->id])?>" class="<?=$activeLabel=='well'?'active':''?>">Стена</a></li>
                    <li><a href="<?=Url::toRoute(['/profile/about','id'=>$user->id])?>" class="<?=$activeLabel=='about'?'active':''?>">Обо мне</a></li>
                    <li><a href="<?=Url::toRoute(['/profile/photos','id'=>$user->id])?>" class="<?=$activeLabel=='photos'?'active':''?>">Фото</a></li>
                    <li><a href="<?=Url::toRoute(['/profile/friends','id'=>$user->id])?>" class="<?=$activeLabel=='friends'?'active':''?>">Друзья</a></li>
                </ul>
                <ul class="follow-me list-inline">
                    <li><a href="<?=Url::toRoute(['edit/basic','id'=>$user->id])?>"><button class="btn btn-primary">Настроить профиль</button></li>
                </ul>
            </div>
        </div>
    </div><!--Timeline Menu for Large Screens End-->

    <!--Timeline Menu for Small Screens-->
    <div class="navbar-mobile hidden-lg hidden-md">
        <div class="profile-info">
            <img src="/images/users/<?=$avatars->avatar?>" alt="main_avatar" class="img-responsive profile-photo">
            <h4><?=$user->firstname.' '.$user->lastname?></h4>
            <p class="text-muted"><?=$profile->job_title;?></p>
        </div>
        <div class="mobile-menu">
            <ul class="list-inline">
                <li><a href="<?=Url::toRoute(['/profile/','id'=>$user->id])?>" class="active">Мой профиль</a></li>
                <li><a href="<?=Url::toRoute(['/profile/about','id'=>$user->id])?>">Обо мне</a></li>
                <li><a href="<?=Url::toRoute(['/profile/photos','id'=>$user->id])?>">Фото</a></li>
                <li><a href="<?=Url::toRoute(['/profile/friends','id'=>$user->id])?>">Друзья</a></li>
            </ul>
            <a href="<?=Url::toRoute(['edit/basic','id'=>$user->id])?>"><button class="btn-primary">Настроить профиль</button></a>
        </div>
    </div><!--Timeline Menu for Small Screens End-->
</div>