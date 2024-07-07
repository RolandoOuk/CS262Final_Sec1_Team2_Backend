@extends('layout.master')

@section('content')
<div class="container">
    <h1>All CVs</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Template</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cvs as $index => $cv)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $cv->user->name }}</td>
                    <td>Template {{ $cv->template_id }}: {{ $cv->template->tem_title }}</td>
                    <td>{{ $cv->created_at }}</td>
                    <td>{{ $cv->updated_at }}</td>
                    <td><a href="{{ route('view_resume', ['user_resume_id' => $cv->user_resume_id]) }}">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
