@extends('layout.master')

@section('content')

<style>
    .unique-user-body {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        height: 100vh;
    }

    .unique-user-sidebar {
        width: 250px;
        background-color: #800000;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .unique-user-sidebar a {
        color: limegreen;
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
        margin: 10px 0;
    }

    .unique-user-main-content {
        flex-grow: 1;
        padding: 20px;
        background-color: #f4f4f4;
        overflow-y: auto;
    }

    .unique-user-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #800000;
        color: limegreen;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .unique-user-header h1 {
        margin: 0;
    }

    .unique-user-styled-link {
        background-color: limegreen;
        color: white;
        padding: 10px 20px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: bold;
    }

    .unique-user-user-table-container {
        margin: 20px 0;
    }

    .unique-user-user-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        overflow: hidden;
    }

    .unique-user-user-table th,
    .unique-user-user-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    .unique-user-user-table th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    .unique-user-user-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .unique-user-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .unique-user-action-button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    #addUser {
        background-color: #4CAF50;
        color: white;
    }

    #exportList {
        background-color: #008CBA;
        color: white;
    }

</style>

<div class="unique-user-body">
    
    <div class="unique-user-main-content">
        <div class="unique-user-header">
            <h1>USER</h1>
            <a href="user" class="unique-user-styled-link">User</a>
        </div>
        <div class="unique-user-user-table-container">
            <h2>Users</h2>
            <table class="unique-user-user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->email }}</td>
                            <td><a href="{{ url('backend/' . $item->user_id . '/edit') }}">Edit</a></td>
                            <td><a href="{{ url('backend/' . $item->user_id . '/delete') }}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
