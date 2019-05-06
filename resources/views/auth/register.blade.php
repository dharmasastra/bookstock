@extends('layouts.dashboard')

@section('additional-styles')
    <style>
        .material-half-bg {
            background-image: url('/images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        .control-label {
                font-size: 15px;
                font-weight: 700;
                width: 15%;
        } 
        .form-group {
            display: flex;
            margin-bottom: 2rem;
        }

        .logo{
            z-index: 1;
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
        .login-content .login-box {
            min-width: 390px;
            min-height: 510px;
        }
        .btn-primary {
            margin-top: 25px;
        }

        @media (max-width: 1199.98px) { 
           .control-label {
                font-size: 13px;
                font-weight: 700;
                width: 15%;
            } 
        }
        @media (max-width: 991.98px) {
            .control-label {
                font-size: 13px;
                font-weight: 700;
                width: 20%;
            } 
        }

        @media (max-width: 767.98px) {
            .control-label {
                font-size: 10px;
                font-weight: 700;
                width: 100%;
            } 
            .form-group {
                display: flex;
                flex-direction: column;
                margin-bottom: 2rem;
            }
        }
    </style>
@endsection

@section('content')
    {{-- <section class="material-half-bg">  
        <div class="background-opacity">
            <div class="login-content">
                <div class="logo">
                    <h1>BookStock</h1>
                </div>
                <div class="login-box">
                    <form class="login-form" action="/register" method="POST">
                        {{ csrf_field() }}
                        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>REGISTER</h3>
                        <div class="form-group">
                            <label class="control-label">USERNAME</label>
                            <input class="form-control" type="text" placeholder="Username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">EMAIL</label>
                            <input class="form-control" type="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">PASSWORD</label>
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">CONFIRM PASSWORD</label>
                            <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                        </div>
                        <div class="form-group btn-container">
                            <button class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt fa-lg fa-fw"></i> REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <div class="app-title">
        <h1>Add new Users</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                <form class="login-form" action="{{ route('users.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">USERNAME</label>
                            <input class="form-control" type="text" name="username" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">EMAIL</label>
                            <input class="form-control" type="email"  name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">PASSWORD</label>
                            <input class="form-control" type="password"  name="password" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">CONFIRM PASSWORD</label>
                            <input class="form-control" type="password"  name="password_confirmation" required>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional-scripts')
    @if(is_object($errors) && count($errors) > 0)
        {{-- sweetalert script --}}
        <script type="text/javascript" src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
        <script type="text/javascript">
            swal('Whoops something were wrong!', "{{ $errors->first() }}", "error");
        </script>
    @endif
@endsection
