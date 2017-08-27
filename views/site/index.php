<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;

$this->title = 'Registration';
?>
<div id="lp-register">
    <div class="container wrapper">
        <div class="row">
            <div class="col-sm-5">
                <div class="intro-texts">
                    <h1 class="text-white"><img src="/images/logo2.png" alt=""></h1>
                    <p>Хорошая реклама образовывает людей, только и всего. Невозможно одурачить людей в этом бизнесе. Продукты говорят сами за себя.</p>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1">
                <div class="reg-form-container">

                    <!-- Register/Login Tabs-->
                    <div class="reg-options">
                        <ul class="nav nav-tabs">
                            <li><a href="#register" data-toggle="tab">Регистрация</a></li>
                            <li class="active"><a href="#login" data-toggle="tab">Логин</a></li>
                        </ul><!--Tabs End-->
                    </div>

                    <!--Registration Form Contents-->

                    <div class="tab-content">
                        <!--Login-->
                        <div class="tab-pane active" id="login">
                            <h3>Логин</h3>
                            <p class="text-muted">Войдите в свой аккаунт</p>

                            <!--Login Form-->
                            <form name="Login_form" id='Login_form'>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="my-email" class="sr-only">Email</label>
                                        <input id="my-email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Ваш Email"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="my-password" class="sr-only">Password</label>
                                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Пароль"/>
                                    </div>
                                </div>
                            </form><!--Login Form Ends-->
                            <p><a href="#">Забыли пароль?</a></p>
                            <button class="btn btn-primary">Вход в сеть</button>
                        </div>

                        <div class="tab-pane" id="register">
                            <h3>Регистрация</h3>
                            <p class="text-muted">Будьте здоровы и присоединяйтесь сегодня. Знакомьтесь</p>

                            <!--Register Form-->
                            <?php $form = ActiveForm::begin(['class'=>'form-inline','id'=>'registration_form',]) ?>

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <?= $form->field($model,'firstname')->textInput([
                                                'autofocus'=>true,
                                                'class'=>'input-group-lg form-control',
                                                'placeholder'=>'Имя'
                                        ])->label(false);?>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <?= $form->field($model,'lastname')->textInput([
                                                'class'=>'form-control input-group-lg',
                                                'placeholder'=>'Фамилия',
                                        ])->label(false);?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <?= $form->field($model,'email')->textInput([
                                                'class'=>'form-control input-group-lg',
                                                'placeholder'=>'Ваш Email',
                                        ])->label(false);?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <?= $form->field($model,'password')->passwordInput([
                                                'class'=>'form-control input-group-lg',
                                                'placeholder'=>'Пароль',
                                        ])->label(false);?>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="birth"><strong>День рождения</strong></p>
                                    <div class="form-group col-sm-3 col-xs-6">
                                        <?php $options = $model->getOptionsForSelect()?>
                                        <?= $form->field($model,'day')->dropDownList($options['itemsDay'],$options['paramsDay'],[
                                                'class'=>'form-control',
                                        ])->label(false);?>
                                    </div>
                                    <div class="form-group col-sm-3 col-xs-6">
                                        <?= $form->field($model,'month')->dropDownList($options['itemsMonth'],$options['paramsMonth'],[
                                            'class'=>'form-control',
                                        ])->label(false);?>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <?= $form->field($model,'year')->dropDownList($options['itemsYear'],$options['paramsYear'],[
                                            'class'=>'form-control',
                                        ])->label(false);?>
                                    </div>
                                </div>

                                <div class="form-group gender ">
                                        <?= $form->field($model, 'gender')->radioList([
                                            'Мужчина'=>'Мужчина',
                                            'Женщина'=>'Женщина',
                                        ])->label(false)?>
                                </div>

                                <div class="row">
                                <div class="form-group col-xs-6">
                                    <?= $form->field($model,'city')->textInput([
                                            'class'=>'form-control input-group-lg reg_name',
                                            'placeholder'=>'Ваш город',
                                    ])->label(false);?>
                                </div>
                                <div class="form-group col-xs-6">
                                    <?= $form->field($model,'country')->dropDownList($options['itemsCountries'],$options['paramsCountries'],[
                                        'class'=>'form-control',
                                    ])->label(false);?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Зарегестрироваться</button>

                            <?php ActiveForm::end();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
