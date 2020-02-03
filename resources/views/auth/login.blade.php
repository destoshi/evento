@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card"></div>
        <div class="card">
            <h1 class="title">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-container">
                    <input type="email" id="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div class="bar"></div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-container">
                    <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password" required/>
                    <label for="password">{{ __('Password') }}</label>
                    <div class="bar"></div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="button-container">
                    <button type="submit"><span>{{ __('Login') }}</span></button>
                </div>
                @if (Route::has('password.request'))
                    <div class="footer">
                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a><br>
                        <a class="toggle" href="#register">{{ __('Create An Account') }}</a>
                    </div>
                @endif

            </form>
        </div>


        <div class="card alt">
            <div class="toggle"></div>
            <h1 class="title">Register
                <div class="close"></div>
            </h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-container">
                    <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                    <label for="name">{{ __('Name') }}</label>
                    <div class="bar"></div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-container">
                    <input id="email" type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <div class="bar"></div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-container">
                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                    <label for="name">{{ __('Password') }}</label>
                    <div class="bar"></div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="input-container">
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"/>
                    <label for="name">{{ __('Confirm Password') }}</label>
                    <div class="bar"></div>
                </div>

                <div class="button-container">
                    <button type="submit"><span>{{ __('Register') }}</span></button>
                </div>
            </form>
        </div>
    </div>
    <script type="application/javascript">
        $('.toggle').on('click', function() {
            $('.container').stop().addClass('active');
        });

        $('.close').on('click', function() {
            $('.container').stop().removeClass('active');
        });
    </script>


@endsection



<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
