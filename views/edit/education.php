<?php
use yii\helpers\Html;
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
                        'activeLabel'=>'education'
                    ])?>

                </div>

                <div class="col-md-7">

                    <!-- Edit Work and Education
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
                            <h4 class="grey"><i class="icon ion-ios-book-outline"></i>Мое образование</h4>
                            <div class="line"></div>
                            <p>Можно добавить или изменить информацию про место учебы.</p>
                            <div class="line"></div>
                        </div>
                        <div class="edit-block">

                            <?php $form = ActiveForm::begin(['id'=>'education','class'=>'form-inline']);?>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <?=$form->field($modelEducation,'university_name')->textInput(['class'=>'form-control input-group-lg','title'=>'Название учебного завидения','placeholder'=>'Harvard Unversity', 'value'=>isset($education)?$education->university_name:'']);?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <?=$form->field($modelEducation, 'from')->dropDownList($options['itemsYear'],$options['paramsYear'],['class'=>'form-control input-group-lg','title'=>'Год поступления']);?>
                                </div>
                                <div class="form-group col-xs-6">
                                    <?=$form->field($modelEducation,'to')->dropDownList($options['itemsYear'],$options['paramsYear']);?>
                                </div>
                            </div>
                            <?=Html::submitButton('Сохранить изменение',['class'=>'btn btn-primary']);?>
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