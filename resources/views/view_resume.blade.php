@extends('layout.master')

@section('content')

<style>
    body {
        font-family: "Lexend", sans-serif;
    }

    .profile-img {
        width: 193px;
        height: 193px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto;
        display: block;
        border: 4px solid rgb(255, 255, 255);
    }

    .section-title {
        font-weight: bold;
        text-transform: uppercase;
    }

    .sidebar {
        background-color: #343a40;
        color: white;
        padding: 20px;
        height: 100%;
        width: auto;
    }

    .main-content {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 10px;
        flex-grow: 1;
    }

    .title-underline {
        width: 100%;
        height: 1px;
        background-color: #343a40;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .title-underline-white {
        width: 100%;
        height: 1px;
        background-color: #ffffff;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    h6 {
        font-size: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .container-flex {
        display: flex;
        gap: 0;
    }
</style>

<div class="container mt-5">
    <div class="row container-flex">
        <div class="col-md-4 p-0">
            <div class="sidebar">
                <div class="text-center">
                    @if ($userResume->user->profile_pic)
                        <img src="{{ asset('storage/' . $userResume->user->profile_pic) }}" alt="Profile Picture"
                            class="profile-img" />
                    @else
                        <img src="camera.png" alt="Profile Picture" class="profile-img" />
                    @endif
                </div>

                <!-- contact -->
                <div class="title-underline-white"></div>
                <div class="contact-info mt-1">
                    <h5>CONTACT</h5>
                    <div class="title-underline-white"></div>
                    <p><i class="fa fa-phone"></i>{{ $userResume->user->phone_number }}</p>
                    <p><i class="fa fa-envelope"></i>{{ $userResume->user->email }}</p>
                    <p><i class="fa fa-map-marker"></i>{{ $userResume->user->address }}</p>
                </div>

                <!-- skills -->
                <div class="education mt-4">
                    <div class="title-underline-white"></div>
                    <h5>Skills</h5>
                    <div class="title-underline-white"></div>
                    <ul>
                        @foreach ($userResume->cvInfos as $cvInfo)
                            @if ($cvInfo->field_name === 'skills')
                                @php
                                    $skills = explode(',', $cvInfo->field_value);
                                @endphp
                                @foreach ($skills as $skill)
                                    <li>{{ trim($skill) }}</li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </div>

                <!-- languages -->
                <div class="languages mt-4">
                    <div class="title-underline-white"></div>
                    <h5>LANGUAGE</h5>
                    <div class="title-underline-white"></div>
                    <ul>
                        @foreach ($userResume->cvInfos as $cvInfo)
                            @if ($cvInfo->field_name === 'languages')
                                @php
                                    $languages = explode(',', $cvInfo->field_value);
                                @endphp
                                @foreach ($languages as $language)
                                    <li>{{ trim($language) }}</li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 p-0">
            <div class="main-content mt-">
                <!-- name -->
                <div style="display: flex;">
                    <h1>{{ $userResume->user->first_name }}</h1>
                    <h1 style="padding-left: 10px;">{{ $userResume->user->last_name }}</h1>
                </div>
                <h3>{{ $userResume->cvInfos->where('field_name', 'job_title')->first()->field_value ?? '' }}</h3>
                <div>
                    <!-- work experience -->
                    <div class="title-underline"></div>
                    <h5 class="section-title">Work Experience</h5>
                    <div class="title-underline"></div>
                    @foreach ($userResume->cvInfos->where('field_name', 'job_experience') as $cvInfo)
                        <div>
                            <h6>{{ $cvInfo->field_value }}</h6>
                        </div>
                    @endforeach

                    <!-- education -->
                    <div class="title-underline"></div>
                    <h5 class="section-title">Education</h5>
                    <div class="title-underline"></div>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'university')->first()->field_value ?? '' }}</h6>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'qualification')->first()->field_value ?? '' }}</h6>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'major')->first()->field_value ?? '' }}</h6>
                    <h6>{{ $userResume->cvInfos->where('field_name', 'graduation_year')->first()->field_value ?? '' }}</h6>
                    @foreach ($userResume->cvInfos->where('field_name', 'education_details') as $cvInfo)
                        <p>{{ $cvInfo->field_value }}</p>
                    @endforeach

                    <!-- summary -->
                    <div class="title-underline"></div>
                    <h5 class="section-title">Summary</h5>
                    <div class="title-underline"></div>
                    <p>{{ $userResume->cvInfos->where('field_name', 'summary')->first()->field_value ?? '' }}</p>

                    <!-- references -->
                    <div class="title-underline"></div>
                    <h5 class="section-title">References</h5>
                    <div class="title-underline"></div>
                    <ul>
                        @foreach ($userResume->cvInfos->where('field_name', 'references') as $cvInfo)
                            <li>{{ $cvInfo->field_value }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

@endsection
