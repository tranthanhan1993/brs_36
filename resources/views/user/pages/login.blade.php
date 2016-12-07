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
                    <table>
                        <tr>
                            <td>{{ trans('user.email') }}</td>
                            <td>{{ trans('login.password') }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name=""></td>
                            <td><input type="text" name=""></td>
                            <td><input type="submit" name="" value="{{ trans('master.login') }}"></td>
                        </tr>
                        <tr>
                            <td><a href="">{{ trans('login.forgor_password') }}</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="divregister">
                {{ Html::image('user/img/logobook.png') }}
                <div class="div_tbregister">
                    <table>
                        <tr>
                            <td><p class="p_login">{{ trans('login.register') }}</p></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" class="inputtext" placeholder="{{ trans('user.name') }}"> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" class="inputtext" placeholder="{{ trans('user.email') }}"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="Password" name="" class="inputtext" placeholder="{{ trans('login.password') }}"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="Password" name="" class="inputtext" placeholder="{{ trans('login.retypepassword') }}"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{!! Form::date('date', 'date', ['class' => 'date form-control']) !!}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" class="inputtext" placeholder="{{ trans('user.phone') }}"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" class="inputtext" placeholder="{{ trans('user.address') }}"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="gender">{{ trans('user.male') }}<input type="radio" name="gender">{{ trans('user.female') }}<input type="submit" name="Register" value="{{ trans('login.register1') }}"></td>
                            <td> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
       <!-- footer -->
        <div class="container">
            @include('user.blocks.footer')
        </div>
    </body>
</html>
