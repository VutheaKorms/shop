
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>168myshop.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="/frontend/themes/images/ico/favicon.ico">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="/frontend/bootstrap/css/style.css">

</head>

<body>
<div class="login-form">
    <h3 style="text-align: center">Login</h3>
    <form action="{{ route('login') }}" role="form" method="POST" class="form login">

        {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="form__field">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" id="UserName" required autofocus>
            <i class="fa fa-user"></i>
            @if ($errors->has('email'))
                <br /><br />
                <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('email') }}</strong><br /><br />
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="form__field">
            <input type="password" class="form-control" placeholder="Password" name="password" id="Passwod" required>
            <i class="fa fa-lock"></i>
            <br />
            @if ($errors->has('password'))
                <span class="help-block">
                       <strong style="color: red;">{{ $errors->first('password') }}</strong><br /><br />
                </span>
            @endif
        </div>
    </div>

    <span class="checkbox">
        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>
    </span>
    <a class="link" href="{{ route('password.request') }}">Lost your password?</a>
    <button type="submit" class="log-btn" >Log in</button>
    </form>

</div>

</body>
</html>






