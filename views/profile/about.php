<?php use yii\helpers\Url;?>
<div class="container">
    <!-- Timeline
    ================================================= -->
    <div class="timeline">

        <?= $this->render('/staticBlocks/timelineMenu',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$profile,
            'activeLabel'=>'about',
        ]); ?>

        <div id="page-contents">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7">

                    <!-- About
                    ================================================= -->
                    <div class="about-profile">
                        <div class="about-content-block">
                            <div class="organization">
                                <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Личная информация</h4>
                                <div class="work-info">
                                    <p><?=$profile->personal_info==null?'Информация отсутствует':$profile->personal_info?></p>
                                </div>
                            </div>
                        </div>
                        <div class="about-content-block">

                            <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Работа</h4>
                            <?php if(isset($work)):?>
                            <div class="organization">
                                <div class="work-info">
                                    <h5><?= $work->organizetion_title?></h5>
                                    <p><?=$work->post?> - <span class=""><?= $work->from?> по <?=$work->to=='present'?' настоящее время':$work->to?></span></p>
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
                            <?php if (isset($education)):?>
                                <div class="organization">
                                    <div class="work-info">
                                        <?php foreach ($education as $university):?>
                                        <h5><?= $university->university_name?></h5>
                                        <p>c <?= $university->from?> по <?=$university->to?> года</p>
                                        <?php endforeach;?>
                                    </div>
                                </div>
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