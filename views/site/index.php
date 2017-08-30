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
                    <p><span class="hidden-md">Привет Всем! Меня зовут Марченко Анатолий я являюсь автором сети looklike.
                        За эти годы мне всегда была интересна многогранность человека,
                        на мой взгляд все люди разные и это прекрасно.
                        Мне всегда было приятно слушать и дружить со всеми людьми (хорошими и плохими, старыми и молодыми и т.д.). Почему я говорю слушать?
                        Потому что у всех есть своя 'история жизни'. Кому то было легко и весело, а кому то тяжело и даже трагично. Но истории все разные, потому что, в
                        похожих жизненных ситуациях они поступали совершено иначе. Я глубоко считаюсь с мнение всех людей и с
                        уважением отношусь к каждому человеку. Кто то скажет это слабость. На что я скажу
                        хорошо парень да это так, но знай что есть люди которые считают это
                            силой а не слабостью.</span> Недавно мне помог человек которого все мое окружение считает мягко говоря "гнидой".
                        Это у него отняло его время и деньги. На мой вопрос: "Что я должен?" он ответил: "ты меня обижаешь, ничего!".
                        После того как я это рассказал другим они мне сказали:"Люди
                        к тебе по другому относятся.<span class="hidden-md"> Я думаю вы поняли мораль... К чему это все?
                        Вся логика и дизайн сети looklike написана одним человеком мною. И мой взгляд на ту или иную мелочь это только мой взгляд.
                        А так как сеть не для меня, а для Всех прошу не стесняйтесь и пишите мне что бы вы убрали или добавили, изменили поправили, что угодно.
                            И я обещаю приму во внимание мнение каждого человека.</span>
                    </p>
                    <button class="btn btn-primary">Читать все</button>
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
                            <?php $form = ActiveForm::begin(['id'=>'login_form']);?>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <?= $form->field($login_model,'email')->textInput([
                                            'autofocus'=>true,
                                            'class'=>'form-control input-group-lg',
                                            'placeholder'=>'Bаш Email',
                                    ])->label(false)?>
                                </div>


                                <div class="form-group col-xs-12">
                                    <?= $form->field($login_model,'password')->textInput([
                                        'class'=>'form-control input-group-lg',
                                        'placeholder'=>'Пароль',
                                    ])->label(false)?>
                                </div>
                            </div>
                            <p><a href="#">Забыли пароль?</a></p>
                            <button class="btn btn-primary" type="submit">Вход в сеть</button>
                            <?php $form = ActiveForm::end();?>
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
                                            1=>'Мужчина',
                                            2=>'Женщина',
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
