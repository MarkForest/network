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
                        'activeLabel'=>'password',
                    ])?>

                </div>
                <div class="col-md-7">

                    <!-- Change Password
                    ================================================= -->
                    <div class="edit-profile-container">

                        <?php if (isset($alertSuccessText)):?>
                            <div class="alert alert-success">
                                Пароль успешно изменен.
                            </div>
                        <?php endif;?>

                        <?php if (isset($alertDangerText)):?>
                            <div class="alert alert-danger">
                                Текущий пароль указан с ошибками
                            </div>
                        <?php endif;?>

                        <div class="block-title">
                            <h4 class="grey"><i class="icon ion-ios-locked-outline"></i>Изменить пароль</h4>
                            <div class="line"></div>
                            <p>Здесь ты можешь поменять свой текущий пароль аккаунта. После изменения пароля не забудь нажать кнопку "Обновить пароль". Иначе изменения не сохраняться.</p>
                            <div class="line"></div>
                        </div>
                        <div class="edit-block">

                            <?php $form = ActiveForm::begin(['class'=>'form-inline']);?>

                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <?=$form->field($model,'oldPassword')->passwordInput(['class'=>'form-control input-group-lg','title'=>'Введите пароль','placeholder'=>'Старый пароль']);?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <?=$form->field($model,'newPassword')->passwordInput(['class'=>'form-control input-group-lg','title'=>'Введите новый пароль','placeholder'=>'Новый пароль']);?>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <?=$form->field($model,'confirmePassword')->passwordInput(['class'=>'form-control input-group-lg','title'=>'Повторите пароль','placeholder'=>'Повторите пароль']);?>
                                    </div>
                                </div>
                                <!--<p><a href="#">Forgot Password?</a></p>-->
                                <button type="submit" class="btn btn-primary">Обновить пароль</button>

                            <?php ActiveForm::end();?>

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