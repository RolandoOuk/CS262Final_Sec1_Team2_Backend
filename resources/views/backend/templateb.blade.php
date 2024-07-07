@extends('layout.master')

@section('content')

<style>
    img {
        width: 350px;
        margin-top: 40px;
        margin-left: 50px;
        border: 3px solid black;
    }

    .sidebar {
        background-color: rgb(137, 45, 45);
        color: white;
    }

    .styled-link {
        width: 200px;
        height: 45px;
        text-decoration: none;
        color: rgb(255, 255, 255);
        border-radius: 30px;
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    .orange {
        background: rgb(137, 45, 45);
    }
</style>

<!-- Select-T -->
<div class="select">
    <h1 style="text-align: center; font-weight: bold; font-family: 'Times New Roman', Times, serif; line-height: 40px; margin-top: 30px;">Template available <br> <b style="color: orange;">your design</b></h1>
</div>
<hr style="width: 1100px; margin-left: 300px;">

<!-- Template -->

<div class="container">
    
        @csrf
        <div class="row">
            <div class="col-sm text-center">
               
                    <img src="../empty-pic5.jpg" alt="Template 1" class="img-thumbnail">
       
            </div>
            <div class="col-sm text-center">
             
                    <img src="../empty-pic4(2).png" alt="Template 2" class="img-thumbnail">
             
            </div>
            <div class="col-sm text-center">
               
                    <img src="../empty-pic3.jpg" alt="Template 3" class="img-thumbnail">
                
            </div>
        </div>
        <hr style="width: 1100px; margin: 20px auto;">
    
    
</div>

@stop
