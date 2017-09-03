<?php use yii\helpers\Url;?>

<div class="container">

    <!-- Timeline
    ================================================= -->
    <div class="timeline">
        <?= $this->render('/staticBlocks/timelineMenu',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$profile,
            'activeLabel'=>'photos',
        ]); ?>
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
