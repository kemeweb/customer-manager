@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="login-container">

    <div class="login-box">

        <h1>Customer Manager</h1>

        <p class="login-subtitle">
            Σύνδεση στο σύστημα
        </p>

        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >

            </div>

            <button type="submit" class="login-button">
                Σύνδεση
            </button>

        </form>

    </div>

</div>

<style>

    .login-container {
        min-height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-box {
        width: 380px;
        background: white;
        padding: 35px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    }

    .login-box h1 {
        text-align: center;
        margin-bottom: 5px;
    }

    .login-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        box-sizing: border-box;
        padding: 11px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
    }

    .form-group input:focus {
        outline: none;
        border-color: #2563eb;
    }

    .login-button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 5px;
        background-color: #2563eb;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-button:hover {
        background-color: #1d4ed8;
    }

    .error-box {
        background-color: #fee2e2;
        color: #991b1b;
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

</style>

@endsection