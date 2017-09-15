<?php
use yii\widgets\ActiveForm;
?>

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
                        'activeLabel'=>'setting',
                    ])?>

                </div>
                <div class="col-md-7">

                    <!-- Profile Settings
                    ================================================= -->
                    <div class="edit-profile-container">

                        <?php if (isset($alertSuccessText)):?>
                            <div class="alert alert-success">
                                Изменения успешно сохранены.
                            </div>
                        <?php endif;?>

                        <?php if (isset($alertDangerText)):?>
                            <div class="alert alert-danger">
                                Форма заполнена с ошибками
                            </div>
                        <?php endif;?>

                        <div class="block-title">
                            <h4 class="grey"><i class="icon ion-ios-settings"></i>Настройки аккаунта</h4>
                            <div class="line"></div>
                            <p>Настрой работу сети так как хотите Вы</p>
                            <div class="line"></div>
                        </div>
                        <?php ActiveForm::begin();?>
                        <div class="edit-block">
                            <div class="settings-block">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="switch-description">
                                            <div><strong>Обо мне</strong></div>
                                            <p>Информацию о вас видна всем. В противном случае она видна только вашим друзьям</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="toggle-switch">
                                            <label class="switch">
                                                <input type="checkbox" name="aboutMe" value='1' <?=($setting->aboutMe==1)?'checked':''?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="settings-block">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="switch-description">
                                            <div><strong>Про работу</strong></div>
                                            <p>Информацию про Ваше место работы видна всем. В противном случае она видна только вашим друзьям</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="toggle-switch">
                                            <label class="switch">
                                                <input type="checkbox" name="aboutWork" value="1" <?=($setting->aboutWork==1)?'checked':''?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="settings-block">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="switch-description">
                                            <div><strong>Друзья</strong></div>
                                            <p>Включите это, если вы хотите, чтобы люди присылали вам запросы в друзья</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="toggle-switch">
                                            <label class="switch">
                                                <input type="checkbox" name="requestFriend" value="1" <?=($setting->requestFriend==1)?'checked':''?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="settings-block">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="switch-description">
                                            <div><strong>Сообщения</strong></div>
                                            <p>Получать сообщение от всех пользователей. В противном случае вы будете получать сообщение только от друзей.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="toggle-switch">
                                            <label class="switch">
                                                <input type="checkbox" name="messages" value="1" <?=($setting->messages==1)?'checked':''?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="settings-block">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="switch-description">
                                            <div><strong>Включить звук</strong></div>
                                            <p>Вы услышите звук уведомления, когда кто-то отправит вам личное сообщение.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="toggle-switch">
                                            <label class="switch">
                                                <input type="checkbox" name="sound" value="1" <?=($setting->sound==1)?'checked':''?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?=\yii\helpers\Html::submitButton('Сохранить настройки',['name'=>'btnUpdate','class'=>'btn btn-primary'])?>
                        <?php ActiveForm::end();?>
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