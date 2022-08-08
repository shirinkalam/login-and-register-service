@extends('layouts.app')

@section('title',__('auth.login'))
@section('links')
<link rel="stylesheet" href="{{asset('css/register-style.css')}}">
<script src="{{asset('/js/script.js')}}"></script>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
@section('content')

<body>

    <div>
        @include('partials.alerts')
    </div>

  <form action="{{route('auth.login')}}" method="POST">
    @csrf
    <h1>@lang('auth.login')</h1>

    <fieldset>
      <legend><span class="number">2</span>@lang('auth.enter your info')</legend>
      <fieldset>
        <label  for="mail">@lang('auth.email'):</label>
        <input value="{{old('email')}}" type="email" id="mail" name="email">

        <label for="password">@lang('auth.password'):</label>
        <input type="password" id="password" name="password">


    <input type="checkbox" id="development" value="interest_development" name="user_interest"><label class="light" for="development">  @lang('auth.remember me')</label><br>
    <a href="">@lang('auth.forget your password')</a>
        </fieldset>
    </fieldset>

    <div class="">
        @include('partials.validations-errors')
    </div>

    <button type="submit">@lang('auth.sign in')</button>
  </form>

</body>
</html>
@endsection

