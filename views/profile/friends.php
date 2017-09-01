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
                            <li><a href="<?=Url::toRoute(['/profile/photos','id'=>$user->id])?>">Фото</a></li>
                            <li><a href="<?=Url::toRoute(['/profile/friends','id'=>$user->id])?>"class="active">Друзья</a></li>
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
                        <li><a href="<?=Url::toRoute(['/profile/photos','id'=>$user->id])?>">Фото</a></li>
                        <li><a href="<?=Url::toRoute(['/profile/friends','id'=>$user->id])?>"class="active">Друзья</a></li>
                    </ul>
                    <button class="btn-primary">Настроить профиль</button>
                </div>
            </div><!--Timeline Menu for Small Screens End-->
        </div>

        <div id="page-contents">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    <!-- Friend List
                    ================================================= -->
                    <?php if (isset($friends)):?>
                    <div class="friend-list">
                        <div class="row">
                            <?php foreach ($friends as $fiend):?>
                            <div class="col-md-6 col-sm-6">
                                <div class="friend-card">
                                    <img src="/images/covers/<?=$friend->background?>" alt="profile-cover" class="img-responsive cover" />
                                    <div class="card-info">
                                        <img src="/images/users/<?=$friend->avatar?>" alt="user" class="profile-photo-lg" />
                                        <div class="friend-info">
                                            <a href="#" class="pull-right text-green">My Friend</a>
                                            <h5><a href="timeline.html" class="profile-link"><?=$friend->first_name?> <?=$friend->last_name?></a></h5>
                                            <p><?=$friend->job_title?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                <div class="col-md-2 static">
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