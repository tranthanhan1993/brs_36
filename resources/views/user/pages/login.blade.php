<html lang="en">
    <head>
        <title>{{ trans('master.home') }}</title>
        <meta charset="utf-8">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your keywords">
        <meta name="author" content="Your name">
        <meta name="format-detection" content="telephone=no">
        <!--CSS-->
        {{ Html::style('user/css/bootstrap.css') }}
        {{ Html::style('user/css/mystyle.css') }}
        {{ Html::style('user/css/style.css') }}
        {{ Html::style('user/css/tm_docs.css') }}
    </head>
<!--header-->
    <body>
        <div class="global">
            <div style="" class="divlogin">

                {{ Html::image('user/img/logo.png') }}
                <div class="div_tblogin">
                    {!! Form::open(['class' => 'form-horizontal', 'action' => 'Auth\LoginController@login']) !!}
                    <table>
                        <tr>
                            <td>{{ trans('user.email') }}</td>
                            <td>{{ trans('login.password') }}</td>
                        </tr>
                        <tr>
                            <td>{!! Form::email('email', '', ['class' => 'form-control']) !!}</td>
                            <td>{!! Form::password('password', ['class' => 'form-control']) !!}</td>
                            <td>{!! Form::submit(trans('master.login'), ['class' => 'btn btn-promary']) !!}</td>
                        </tr>
                        <tr>
                            <td><a href="">{{ trans('login.forgor_password') }}</a></td>
                        </tr>
                    </table>
                    {!! Form::close() !!}
                </div>

            </div>

            <div class="divregister">
                {{ Html::image('user/img/logobook.png') }}
                <div class="div_tbregister">
                    {!! Form::open(['class' => 'form-horizontal', 'action' => 'User\RegisterController@register']) !!}
                        <table>
                            <tr>
                                <td><p class="p_login">{{ trans('login.register') }}</p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{!! Form::text('name', '', ['class' => 'inputtext', 'placeholder' => trans('user.name'), 'id' => 'name']) !!}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{!! Form::email('email', '', ['class' => 'inputtext', 'placeholder' => trans('user.email'), 'id' => 'email']) !!}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{!! Form::password('password', ['class' => 'inputtext', 'placeholder' => trans('login.password'), 'id' => 'password']) !!}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{!! Form::password('password-confirm', [
                                    'class' => 'inputtext',
                                    'name' => 'password_confirmation',
                                    'placeholder' => trans('login.retypepassword')
                                    ])
                                    !!}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{!! Form::select('gender', ['0' => 'Male', '1' => 'Female'], 'Male',['class' => 'inputtext', 'id' => 'gender']) !!}</td>
                            </tr>
                            <tr>
                                <td>{!! Form::date('birthday', 'date', ['class' => 'inputtext', 'placeholder' => trans('user.birthday'), 'id' => 'birthday']) !!}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{!! Form::text('phone', '', ['class' => 'inputtext', 'placeholder' => trans('user.phone'), 'id' => 'phone']) !!}</td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>{!! Form::text('address', '', ['class' => 'inputtext', 'placeholder' => trans('user.address'), 'id' => 'address']) !!}</td>
                                <td>
                                    {!! Form::submit(trans('auth.register'), ['class' => 'btn btn-primary', 'name' => 'register']) !!}
                                </td>
                            </tr>
                        </table>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
       <!-- footer -->
        <div class="container">
            @include('user.blocks.footer')
        </div>
    </body>
</html>
