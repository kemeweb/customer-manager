@extends('layouts.app')

@section('title', 'Νέος Πελάτης')

@section('content')

<style>
    .create-container {
        max-width: 650px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .create-card {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    }

    .create-card h1 {
        margin-top: 0;
        margin-bottom: 25px;
        color: #333;
        font-size: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-weight: 600;
        color: #444;
    }

    .form-group input {
        width: 100%;
        box-sizing: border-box;
        padding: 11px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        transition: border-color 0.2s;
    }

    .form-group input:focus {
        outline: none;
        border-color: #0d6efd;
        box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.1);
    }

    .error-message {
        margin-top: 6px;
        color: #dc3545;
        font-size: 14px;
    }

    .form-actions {
        margin-top: 25px;
        display: flex;
        gap: 10px;
    }

    .form-button {
        display: inline-block;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
    }

    .save-button {
        background: #198754;
        color: white;
    }

    .save-button:hover {
        background: #157347;
    }

    .cancel-button {
        background: #6c757d;
        color: white;
    }

    .cancel-button:hover {
        background: #5c636a;
    }
</style>


<div class="create-container">

    <div class="create-card">

        <h1>Νέος Πελάτης</h1>

        <form method="POST" action="/customers">

            @csrf

            <div class="form-group">

                <label>Όνομα</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                >

                @error('name')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                >

                @error('email')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Τηλέφωνο</label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                >

                @error('phone')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

             <label>Διεύθυνση</label>

             <input
                    type="text"
                    name="address"
                   value="{{ old('address') }}"
            >

               @error('address')
                  <div class="error-message">
                      {{ $message }}
                  </div>
               @enderror

            </div>


            <div class="form-actions">

                <button
                    type="submit"
                    class="form-button save-button"
                >
                    Αποθήκευση
                </button>

                <a
                    href="/customers"
                    class="form-button cancel-button"
                >
                    Έξοδος χωρίς αποθήκευση
                </a>

            </div>

        </form>

    </div>

</div>

@endsection
