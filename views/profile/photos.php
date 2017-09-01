<?php use yii\helpers\Url;?>

<div class="container">

    <!-- Timeline
    ================================================= -->
    <div class="timeline">
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
                            <li><a href="<?=Url::toRoute(['/profile/','id'=>$user->id])?>" >Стена</a></li>
                            <li><a href="<?=Url::toRoute(['/profile/about','id'=>$user->id])?>">Обо мне</a></li>
                            <li><a href="<?=Url::toRoute(['/profile/photos','id'=>$user->id])?>" class="active">Фото</a></li>
                            <li><a href="<?=Url::toRoute(['/profile/friends','id'=>$user->id])?>">Друзья</a></li>
                        </ul>
                        <ul class="follow-me list-inline">
                            <li><button class="btn btn-primary">Настроить профиль</button></li>
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
                        <li><a href="<?=Url::toRoute(['/profile/','id'=>$user->id])?>" >Мой профиль</a></li>
                        <li><a href="<?=Url::toRoute(['/profile/about','id'=>$user->id])?>">Обо мне</a></li>
                        <li><a href="<?=Url::toRoute(['/profile/photos','id'=>$user->id])?>"class="active">Фото</a></li>
                        <li><a href="<?=Url::toRoute(['/profile/friends','id'=>$user->id])?>">Друзья</a></li>
                    </ul>
                    <button class="btn-primary">Настроить профиль</button>
                </div>
            </div><!--Timeline Menu for Small Screens End-->
        </div>
        <div id="page-contents">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <!-- Photo Album
                    ================================================= -->
                    <?php if (count($photos)):?>
                    <?php $count = 0;?>
                    <ul class="album-photos">
                        <?php foreach ($photos as $photo):?>
                        <?php $count++;?>
                        <li>
                            <div class="img-wrapper" data-toggle="modal" data-target=".photo-9">
                                <img src="/images/album/<?=$photo?>" alt="photo" />
                            </div>
                            <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <img src="/images/album/<?=$photo?>" alt="photo-<?=$count?>" />
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                </div>
                <div class="col-md-3 static">
                    <div id="sticky-sidebar">
                        <h4 class="grey">Sarah's activity</h4>
                        <div class="feed-item">
                            <div class="live-activity">
                                <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                                <p class="text-muted">5 mins ago</p>
                            </div>
                        </div>
                        <div class="feed-item">
                            <div class="live-activity">
                                <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                                <p class="text-muted">an hour ago</p>
                            </div>
                        </div>
                        <div class="feed-item">
                            <div class="live-activity">
                                <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                                <p class="text-muted">4 hours ago</p>
                            </div>
                        </div>
                        <div class="feed-item">
                            <div class="live-activity">
                                <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                                <p class="text-muted">a day ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
