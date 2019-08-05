@extends('admin::auth')

@section('content')
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf

        <div class="mb-6">
            <label class="label" for="email">
                Adres e-mail
            </label>

            <input class="input @if ($errors->has('email')) has-error @endif"
                   id="email" type="text" name="email" value="{{ old('email') }}"
                   autocomplete="email" autofocus>

            @if ($errors->has('email'))
                <p class="error">
                    {{ $errors->first('email') }}
                </p>
            @endif
        </div>

        <div class="mb-6">
            <label class="label" for="password">
                Hasło
            </label>

            <input class="input @if ($errors->has('password')) has-error @endif"
                   id="password" type="password" name="password"
                   autocomplete="current-password">

            @if ($errors->has('password'))
                <p class="error">
                    {{ $errors->first('password') }}
                </p>
            @endif
        </div>

        <label class="block mb-6">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>

            <span class="ml-1 text-sm">
                Zapamiętaj mnie
            </span>
        </label>

        <button class="btn btn-blue" type="submit">
            Zaloguj się
        </button>
    </form>
@endsection
