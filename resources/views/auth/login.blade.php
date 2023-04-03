<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/logo-min.png')}}">
    <title>CCJL | ACCEDER</title>
    
    <!-- page css -->
    <link href="{{asset('eliteadmin/inverse/dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('eliteadmin/inverse/dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body class="skin-default card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">CENTRO COMERCIAL JOSE LUIS</p>
        </div>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{asset('eliteadmin/assets/images/background/login-register.jpg)')}};">
            <div class="login-box card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal form-material" id="loginform">
                        @csrf
                        <h3 class="text-center m-b-20">{{ __('Login') }}</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" required="" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="form-control-feedback text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" required="" placeholder="{{ __('Password') }}" autocomplete="current-password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> {{ __('Forgot Your Password?') }}</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">{{ __('Login') }}</button>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <div class="col-xs-12">
                                <h3>{{ __('Reset Password') }}</h3>
                                <p class="text-muted">¡{{ __('Send Password Reset Link') }}! </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input  id="email_reset" name="email_reset" class="form-control @error('email_reset') is-invalid @enderror" type="email" required="" placeholder="{{ __('E-Mail Address') }}" autocomplete="email">
                                @error('email_reset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>
</html>