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
                            <li><a href="<?=Url::toRoute(['/profile/','id'=>$user->id])?>">Стена</a></li>
                            <li><a href="<?=Url::toRoute(['/profile/about','id'=>$user->id])?>" class="active">Обо мне</a></li>
                            <li><a href="<?=Url::toRoute(['/profile/photos','id'=>$user->id])?>">Фото</a></li>
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
                        <li><a href="<?=Url::toRoute(['/profile/','id'=>$user->id])?>">Стена</a></li>
                        <li><a href="<?=Url::toRoute(['/profile/about','id'=>$user->id])?>" class="active">Обо мне</a></li>
                        <li><a href="<?=Url::toRoute(['/profile/photos','id'=>$user->id])?>">Фото</a></li>
                        <li><a href="<?=Url::toRoute(['/profile/friends','id'=>$user->id])?>">Друзья</a></li>
                    </ul>
                    <button class="btn-primary">Настроить профиль</button>
                </div>
            </div><!--Timeline Menu for Small Screens End-->
        </div>
        <div id="page-contents">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7">

                    <!-- About
                    ================================================= -->
                    <div class="about-profile">
                        <div class="about-content-block">
                            <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Личная информация</h4>
                            <p><?=$profile->personal_info==null?'Информация отсутствует':$profile->personal_info?></p>
                        </div>
                        <div class="about-content-block">

                            <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Работа</h4>
                            <?php if(count($work)):?>
                            <div class="organization">
                                <img src="/images/envato.png" alt="work-image" class="pull-left img-org" />
                                <div class="work-info">
                                    <h5><?= $work->organizetion_title?></h5>
                                    <p><?=$work->post?> - <span class=""><?= $work->date_pushed?> to <?=$work->date_poped?></span></p>
                                </div>
                            </div>
                            <?php else:?>
                                <div class="organization">
                                    <p>Информация отсутствует</p>
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="about-content-block">
                            <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Образование</h4>
                            <?php if (count($education)):?>
                                <?php foreach ($education as $university):?>
                                <h5><?= $university->university_name?></h5>
                                <p>c <?= $university->from?> до <?=$university->to?>года</p>
                                <?php endforeach;?>
                            <?php else:?>
                            <p>Информация отсутствует</p>
                            <?php endif;?>
                        </div>

                        <div class="about-content-block">
                            <h4 class="grey"><i class="ion-ios-chatbubble-outline icon-in-title"></i>Языки</h4>
                            <?php if (count($languages)):?>
                                <ul>
                                <?php foreach ($languages as $language):?>
                                    <li><?=$language->title?></li>
                                <?php endforeach;?>
                                </ul>
                            <?php else:?>
                                <p>Информация отсутствует</p>
                            <?php endif;?>
                        </div>
                    </div>
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