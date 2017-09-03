<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="container">

    <!-- Timeline
    ================================================= -->
    <div class="timeline">

        <?= $this->render('/staticBlocks/timelineMenu',[
                    'avatars'=>$avatars,
                    'user'=>$user,
                    'profile'=>$profile,
                    'activeLabel'=>'well',
            ]); ?>

        <div id="page-contents">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-9">

                    <!-- Post Create Box
                    ================================================= -->
                    <div class="create-post">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <img src="/images/users/<?=$avatars->avatar?>" alt="main_avatar" class="profile-photo-md">
                                    <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Напишите, что пожелаете..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="tools">
                                    <ul class="publishing-tools list-inline">
                                        <li><a href="#"><i class="ion-compose"></i></a></li>
                                        <li><a href="#"><i class="ion-/images"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                                        <li><a href="#"><i class="ion-map"></i></a></li>
                                    </ul>
                                    <button class="btn btn-primary pull-right">Публиковать</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- Post Create Box End-->

                    <!-- Post Content
                    ================================================= -->
                    <?php foreach ($posts as $post):?>
                    <div class="post-content">
                        <!--Post Date-->
                        <div class="post-date hidden-xs hidden-sm">
                            <h5><?=$user->firstname?></h5>
                            <p class="text-grey"><?=date('d/m/Y',strtotime($post->published_date))?></p>
                        </div><!--Post Date End-->

                        <img src="/images/post-images/<?=$post->image?>" alt="post-image" class="img-responsive post-image" />
                        <div class="post-container">
                            <img src="/images/users/<?=$avatars->avatar?>" alt="main_avatar" class="profile-photo-md pull-left">
                            <div class="post-detail">
                                <div class="user-info">
                                    <h5><a href="timeline.html" class="profile-link"><?=$user->firstname.' '.$user->lastname?></a> <span class="following">Cледующее</span></h5>
                                    <p class="text-muted">
                                        <?= $post->diffPublishedAtCurrDate();?>
                                    </p>
                                </div>
                                <div class="reaction">
                                    <a class="btn text-green"><i class="icon ion-thumbsup"></i> 49</a>
                                    <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                                </div>
                                <div class="line-divider"></div>
                                <div class="post-text">
                                    <p><?=$post->content?></p>
                                </div>
                                <div class="line-divider"></div>
                                <?php foreach($post->comments as $comment):?>
                                    <div class="post-comment">
                                        <img src="/images/users/<?=$comment->avatar;?>" alt="user_avatar" class="profile-photo-sm" />
                                        <p><a href="timeline.html" class="profile-link"><?=$comment->author_name?></a> <?= $comment->text;?></p>
                                    </div>
                                <?php endforeach;?>
                                <div class="post-comment">
                                    <img src="/images/users/<?=$avatars->avatar?>" alt="user_image" class="profile-photo-sm" />
                                    <input type="text" class="form-control" placeholder="Post a comment">
                                    <button class="btn btn-primary pull-right add-comment">Добавить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                        <div class="col-md-3 static">
                    <div id="sticky-sidebar">
                        <h4 class="grey">Последние активности</h4>
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
    </div>
</div>