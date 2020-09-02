@extends('master');

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Sign in with your account</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                    @csrf()
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email">* Email</label>
                        <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">* Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <input type="submit" value="Sign In" class="btn btn-primary" name="submit">
                </form>
            </div>
        </div>
    </div>
@endsection