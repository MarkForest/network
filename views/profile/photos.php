<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="container" xmlns:background-image="http://www.w3.org/1999/xhtml">

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
                    <?php if (isset($alertSuccessText)):?>
                        <div class="alert alert-success">
                            Изменения сохранены
                        </div>
                    <?php endif;?>

                    <?php if (isset($alertDangerText)):?>
                        <div class="alert alert-danger">
                            Произошла ошибка
                        </div>
                    <?php endif;?>
                    <!-- Add Photo
                   ================================================= -->
                    <span class="add-photo">
                        <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target="#exampleModal">
                            Добавить фото
                        </button>
                    </span>

                    <!-- Photo Album
                    ================================================= -->


                    <?php if (count($photos)):?>
                    <?php $count = 0;?>

                    <ul class="album-photos">

                        <div class="container-fluid">
                            <div class="row">
                            <?php foreach ($photos as $photo):?>
                            <?php $count++;?>

                                <div class="col-md-6">
                                    <li>
                                        <div class="thumbnail">
                                            <div class="img-wrapper" data-toggle="modal" data-target=".photo-<?=$count?>" style="background-image: url('/images/album/<?=$photo['photo']?>')">
                                            </div>
                                            <?php echo Html::a('Удалить <i class="ion-trash-a"></i>',['/profile/delete-photo','id'=>$photo['id']],['class'=>'']);?>
                                        </div>
                                        <div class="modal fade photo-<?=$count?>" tabindex="-1" role="dialog" aria-hidden="true" >
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <img src="/images/album/<?=$photo['photo']?>" alt="photo-<?=$count?>" />
                                                </div>
                                            </div>
                                        </div>


                                    </li>
                                </div>
                            <?php endforeach;?>
                            </div>
                        </div>
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
    <!-- Modal for add photo -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Загрузка изображения</h4 >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $form = ActiveForm::begin([
                        'options' => ['enctype' => 'multipart/form-data'],
                ]) ?>
                <div class="modal-body">
                    <?= $form->field($model, 'image')->fileInput()->label();?>
                    <?= $form->field($model,'discription')->textInput()?>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
