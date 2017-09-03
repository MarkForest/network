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
                        'activeLabel'=>'work'
                    ])?>

                </div>
                <div class="col-md-7">

                    <!-- Edit Work and Education
                    ================================================= -->
                    <div class="edit-profile-container">
                        <div class="block-title">
                            <h4 class="grey"><i class="icon ion-ios-book-outline"></i>My education</h4>
                            <div class="line"></div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                            <div class="line"></div>
                        </div>
                        <div class="edit-block">
                            <form name="education" id="education" class="form-inline">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="school">My university</label>
                                        <input id="school" class="form-control input-group-lg" type="text" name="school" title="Enter School" placeholder="My School" value="Harvard Unversity" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="date-from">From</label>
                                        <input id="date-from" class="form-control input-group-lg" type="text" name="date" title="Enter a Date" placeholder="from" value="2012" />
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="date-to" class="">To</label>
                                        <input id="date-to" class="form-control input-group-lg" type="text" name="date" title="Enter a Date" placeholder="to" value="2016" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="edu-description">Description</label>
                                        <textarea id="edu-description" name="description" class="form-control" placeholder="Some texts about my education" rows="4" cols="400">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="graduate">Graduated?:-</label>
                                        <input id="graduate" type="checkbox" name="graduate" value="graduate" checked> Yes!!
                                    </div>
                                </div>
                                <button class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                        <div class="block-title">
                            <h4 class="grey"><i class="icon ion-ios-briefcase-outline"></i>Work Experiences</h4>
                            <div class="line"></div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                            <div class="line"></div>
                        </div>
                        <div class="edit-block">
                            <form name="work" id="work" class="form-inline">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="company">Company</label>
                                        <input id="company" class="form-control input-group-lg" type="text" name="company" title="Enter Company" placeholder="Company name" value="Envato Inc" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="designation">Designation</label>
                                        <input id="designation" class="form-control input-group-lg" type="text" name="designation" title="Enter designation" placeholder="designation name" value="Exclusive Author" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="from-date">From</label>
                                        <input id="from-date" class="form-control input-group-lg" type="text" name="date" title="Enter a Date" placeholder="from" value="2016" />
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="to-date" class="">To</label>
                                        <input id="to-date" class="form-control input-group-lg" type="text" name="date" title="Enter a Date" placeholder="to" value="Present" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="work-city">City/Town</label>
                                        <input id="work-city" class="form-control input-group-lg" type="text" name="city" title="Enter city" placeholder="Your city" value="Melbourne"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="work-description">Description</label>
                                        <textarea id="work-description" name="description" class="form-control" placeholder="Some texts about my work" rows="4" cols="400">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Save Changes</button>
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