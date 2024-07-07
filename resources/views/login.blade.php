@extends('layout.master')

@section('content')
<style>
    .left {
        padding: 250px 0;
        text-align: center;
    }
    .row {
        height: 810px;
    }
    input {
        width: 450px;
        height: 50px;
        border-radius: 30px;
        border: none;
        background-color: rgb(201, 201, 201);
    }
    button {
        margin-top: 28px;
        width: 180px;
        height: 40px;
        border-radius: 30px;
        border: none;
        color: white;
        background-color: rgb(157, 75, 75);
    }
    .right {
        padding: 300px 0;
        text-align: center;
    }
    body {
        box-sizing: border-box;
    }
    ::placeholder {
        color: rgb(69, 69, 69);
        opacity: 1; /* Firefox */
    }
    .sidebar {
        background-color: rgb(137, 45, 45);
        color: white;
    }
    .styled-link {
        width: 140px;
        height: 35px;
        text-decoration: none;
        color: black;
        border-radius: 30px;
        padding: 5px;
    }
</style>

<div class="row">
    <div class="col-7">
        <div class="left">
            <h1 style="font-weight: bold; font-family: 'Times New Roman', Times, serif; font-size: 55px;">Login to Your Account</h1>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 22px;">Admin login</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <input type="password" name="password" placeholder="Password" style="margin-top: 15px;" required>
                <button type="submit">Sign In</button>
            </form>
            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="col-5" style="background-color: rgb(157, 75, 75);">
        <div class="right">
            <h1 style="font-weight: bold; font-family: 'Times New Roman', Times, serif; font-size: 55px; color: white;">New Here?</h1>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 22px; color: white; line-height: 26px;">Sign up and discover a great <br>amount of new opportunities!</p>
            <div class="d-flex justify-content-center align-item-center gap-3">
                <a href="{{ url('signup') }}" class="styled-link" style="background-color: rgb(255, 255, 255);">Sign Up</a>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
@stop
