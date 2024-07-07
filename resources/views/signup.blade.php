@extends('layout.master')

@section('content')
<style>
.col{
    background-color: white;
    height: 600px;
    border-radius: 30px;
}

::placeholder {
    color: rgb(69, 69, 69);
    opacity: 1; /* Firefox */
}

::-ms-input-placeholder { /* Edge 12 -18 */
    color: red;
}

input, select {
    height: 50px;
    border-radius: 10px;
    border: none;
    background-color: rgb(206, 204, 204);
    padding: 15px;
    margin-top: 20px;
}

.button{
    margin-top: 35px;
}

button {
    color: white;
    background-color: orange;
    width: 150px;
    height: 50px;
    border: none;
    border-radius: 30px;
}

button a {
    text-decoration: none;
    color: black;
}

button:hover {
    background-color: red;
}

.sidebar {
    background-color: rgb(137, 45, 45);
    color: white;
}
</style>

<div class="container text-center">
    <div class="row align-items-center d-inline-flex p-2" style="width: 60%; margin-top: 100px;">
        <div class="col">
            <h1 style="padding-top: 60px; font-weight: bold; font-family: time;">Registration</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('create_user') }}" method = "POST">
            @csrf
                <!-- Name -->
                <div class="name" style="padding-top: 20px;">
                    <input type="text" placeholder="First name" name="first_name" style="width: 32%;">
                    <input type="text" placeholder="Last name" name="last_name"  style="width: 32%;">
                </div>
                <!-- Gender -->
                <div class="gender"style="margin-top: 20px;" >
                    <select  name ="gender" style="width: 65%;" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="prefer-not-to-say">Prefer Not to Say</option>
                    </select>
                </div>
                <!-- Email -->
                <div class="email">
                    <input type="text" placeholder="Email" name = "email" style="width: 65%;">
                </div>
                <!-- Password -->
                <div class="password">
                    <input type="password" name="password" placeholder="Password" style="width: 65%;">
                </div>
                <!-- Button -->
                <div class="button">
                    <button>Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop