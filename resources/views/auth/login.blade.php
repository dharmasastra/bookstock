@extends('layouts.auth_layout')

@section('additional-styles')
    <style>
        .material-half-bg {
            background-image: url('/images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .background-opacity {
            background: rgba(0, 0, 0, 0.5);
            content: '';
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 0;
        }
        .text-footer{
            padding: .85rem 1.25rem;
            text-align: center;
        }
        .logo{
            z-index: 1;
        }
        .login-box {
            z-index: 1;
        }
    </style>
@endsection
@section('content')
    <section class="material-half-bg"> 
        <div class="background-opacity">
            <div class="login-content">
                <div class="logo">
                    <h1>BookStock</h1>
                </div>
                <div class="login-box">
                    <form class="login-form" action="/login" method="POST">
                        {{ csrf_field() }}
                        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                        <div class="form-group">
                            <label class="control-label">EMAIL</label>
                            <input class="form-control" type="text" placeholder="Email" name="email" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="control-label">PASSWORD</label>
                            <input class="form-control" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="form-group btn-container mt-5">
                            <button class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt fa-lg fa-fw"></i> SIGN IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('additional-scripts')
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    @if(is_object($errors) && count($errors) > 0)
    {{-- sweetalert script --}}
    <script type="text/javascript" src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        swal('Whoops something were wrong!', "{{ $errors->first() }}", "error");
    </script>
    @endif
@endsection