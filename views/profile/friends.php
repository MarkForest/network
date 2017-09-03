<?php use yii\helpers\Url;?>
<div class="container">

    <!-- Timeline
    ================================================= -->
    <div class="timeline">

        <?= $this->render('/staticBlocks/timelineMenu',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$profile,
            'activeLabel'=>'friends',
        ]); ?>

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