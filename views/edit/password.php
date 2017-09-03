<div class="container">

    <!-- Timeline
    ================================================= -->
    <div class="timeline">
        <?= $this->render('/staticBlocks/timelineMenu',[
            'avatars'=>$avatars,
            'user'=>$user,
            'profile'=>$profile,
            'activeLabel'=>'',
        ]); ?>
        <div id="page-contents">
            <div class="row">
                <div class="col-md-3">

                    <!--Edit Profile Menu-->
                    <?= $this->render('/staticBlocks/editMenu',[
                        'user'=>$user,
                        'activeLabel'=>'password',
                    ])?>

                </div>
                <div class="col-md-7">

                    <!-- Change Password
                    ================================================= -->
                    <div class="edit-profile-container">
                        <div class="block-title">
                            <h4 class="grey"><i class="icon ion-ios-locked-outline"></i>Change Password</h4>
                            <div class="line"></div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                            <div class="line"></div>
                        </div>
                        <div class="edit-block">
                            <form name="update-pass" id="education" class="form-inline">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="my-password">Old password</label>
                                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Old password"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label>New password</label>
                                        <input class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="New password"/>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label>Confirm password</label>
                                        <input class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Confirm password"/>
                                    </div>
                                </div>
                                <p><a href="#">Forgot Password?</a></p>
                                <button class="btn btn-primary">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 static">

                    <!--Sticky Timeline Activity Sidebar-->
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