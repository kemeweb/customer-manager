@extends('layouts.app')

@section('title', 'Επεξεργασία Πελάτη')

@section('content')

<h1>Επεξεργασία Πελάτη</h1>

<form method="POST" action="/customers/{{ $customer->id }}">

    @csrf
    @method('PUT')

    <label>Όνομα:</label>
    <input type="text" name="name" value="{{ old('name', $customer->name) }}">

    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $customer->email) }}">

    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <br><br>

    <label>Τηλέφωνο:</label>
    <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}">

    @error('phone')
        <div>{{ $message }}</div>
    @enderror

    <br><br>

    <button type="submit">Αποθήκευση αλλαγών</button>
    <a href="/customers">
        <button type="button">Έξοδος χωρίς αποθήκευση</button>
    </a>

</form>
@endsection