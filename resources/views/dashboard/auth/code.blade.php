<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('dashboard.layouts.meta')

    <title>
        {{ config('app.name') }} :: Панель администрирования
    </title>

    @include('dashboard.layouts.styles')

</head>
<body class="fixed-header">
    <div class="login-wrapper">
        <div class="bg-pic">
            <img src="{{ asset('assets/dashboard/img/wallpaper.jpg') }}" data-src="{{ asset('assets/dashboard/img/wallpaper.jpg') }}" data-src-retina="{{ asset('assets/dashboard/img/wallpaper.jpg') }}" alt="" class="lazy">
        </div>
        <div class="login-container bg-white">
            <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                <img src="{{ asset('assets/dashboard/img/logo.svg') }}" alt="logo" data-src="{{ asset('assets/dashboard/img/logo.svg') }}" data-src-retina="{{ asset('assets/dashboard/img/logo.svg') }}" height="26">

                <form action="{{ route('change') }}" id="form-login" class="p-t-15 enter-submit" method="post">
                    @if(session()->has('errors'))
                        <div class="alert alert-danger" role="alert">
                            <button class="close" data-dismiss="alert"></button>
                            {{ session('errors')->first() }}
                        </div>
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group form-group-default">
                        <label>Код</label>
                        <div class="controls">
                            <input type="text" name="code" placeholder="Введите код для восстановления пароля" class="form-control" required />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group form-group-default">
                        <label>Новый пароль</label>
                        <div class="controls">
                            <input type="password" class="form-control" name="password" placeholder="Введите пароль" required />
                        </div>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Повторите новый пароль</label>
                        <div class="controls">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Повторите пароль" required />
                        </div>
                    </div>

                    <button class="btn btn-success btn-cons m-t-10">Сменить пароль</button>

                    <p style="margin: 12px 0px 0px 0px;">Нет аккаунта? Тогда <a href="{{ route('register') }}">зарегистрируйся</a></p>
                </form>
            </div>
        </div>
    </div>

    @include('dashboard.layouts.scripts')

</body>
</html>
