@extends('master');

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Sign up with new account</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                    @csrf()
                    <div class="form-group">
                        <label for="name">* Name</label>
                        <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">* Email</label>
                        <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="password">* Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">* Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password-confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="country">* Your Country</label>
                        <select name="country" id="country" class="form-control">
                            <option value="">Choose Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->name }}" >{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                    </div>
                    <input type="submit" value="Sign In" class="btn btn-primary" name="submit">
                    <a href="{{ url('user/signin' . $rn) }}"> already signed in</a>
                </form>
            </div>
        </div>
    </div>
@endsection