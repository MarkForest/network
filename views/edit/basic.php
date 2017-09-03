<?php
    use yii\helpers\Url;
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
                            'activeLabel'=>'basic',
                    ])?>

                </div>
                <div class="col-md-7">

                    <!-- Basic Information
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
                            <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Редактировать основную информацию</h4>
                            <div class="line"></div>
                            <p>Сдесь можно изменить или добавить основную информацию. После корректировок не забудь нажать кнопку "Сохранить изменения", иначе изменения не вступят в силу.</p>
                            <div class="line"></div>
                        </div>
                        <div class="edit-block">
                            <?php $form = ActiveForm::begin(['id'=>'basic-info','class'=>'form-inline']);?>

                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <?=$form->field($model,'firstname')->textInput(['class'=>'form-control input-group-lg','title'=>'Введите ваше имя', 'placeholder'=>'Имя', 'value'=>$user->firstname]);?>
                                </div>
                                <div class="form-group col-xs-6">
                                    <?=$form->field($model,'lastname')->textInput(['class'=>'form-control input-group-lg','title'=>'Введите фамилию','placeholder'=>'Фамилия','value'=>$user->lastname]);?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <?= $form->field($model,'email')->textInput(['class'=>'form-control input-group-lg','title'=>'Введите Email','placeholder'=>'Введите Email','value'=>$user->email]);?>
                                </div>
                            </div>

                            <div class="row">
                                <p class="custom-label"><strong>День рождения</strong></p>
                                <div class="form-group col-sm-3 col-xs-6">
                                    <?=$form->field($model,'day')->dropDownList($options['itemsDay'],['options'=>[$day=>['selected'=>true]]],['class'=>'form-control']);?>
                                </div>
                                <div class="form-group col-sm-3 col-xs-6">
                                    <?=$form->field($model,'month')->dropDownList($options['itemsMonth'],['options'=>[$month=>['selected'=>true]]],['class'=>'form-control']);?>
                                </div>
                                <div class="form-group col-sm-6 col-xs-12">
                                    <?=$form->field($model,'year')->dropDownList($options['itemsYear'],['options'=>[$year=>['selected'=>true]]],['class'=>'form-control']);?>
                                </div>
                            </div>

                            <div class="form-group gender">
                                <?= $form->field($model, 'gender')->radioList([1=>'Мужчина',2=>'Женщина'],['separator'=>' | '])->label(false);?>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <?= $form->field($model,'city')->textInput(['class'=>'form-control input-group-lg','title'=>'Введите город','placeholder'=>'Ваш город','value'=>$user->city]);?>
                                </div>

                                <div class="form-group col-xs-6">
                                    <?= $form->field($model,'country')->dropDownList($options['itemsCountries'],['options'=>[$user->country=>['selected'=>true]]],['class'=>'form-control'])?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <?=$form->field($model,'about')->textarea(['class'=>'form-control','placeholder'=>'Любой текст о себе','rows'=>'4','cols'=>'400','value'=>isset($profile->personal_info)?$profile->personal_info:'']);?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
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