@extends('layout.master')

@section('content')
<style>
    /* Your existing CSS for Template 3 */
</style>

<div class="container">
    <div class="header" style="background-color: rgb(93, 92, 92); text-align: center; height: 180px;">
        <div class="name">
            <h1 style="color: white; font-family: 'Times New Roman', Times, serif; padding-top: 10px;">
                {{ $userResume->user->first_name }}
                <span id="firstName"></span>
                {{ $userResume->user->last_name }}
            </h1>
            <div class="contact-info">
                <p style="color: white;"><i class="fa-regular fa-envelope"></i>{{ $userResume->user->email }}</p>
                <p style="color: white;"><i class="fa-solid fa-phone"></i>{{ $userResume->user->phone_number }}</p>
                <p style="color: white;"><i class="fas fa-map-marker-alt"></i>{{ $userResume->user->address }}</p>
            </div>
        </div>
    </div>

    <section class="summary">
        <h2>Summary Statement</h2>
        <hr>
        <p>{{ $userResume->cvInfos->where('field_name', 'summary')->first()->field_value ?? '' }}</p>
    </section>
    <hr>
    <section class="work-experience">
        <h2>Work Experience</h2>
        <hr>
        <div class="job">
            <h3>{{ $userResume->cvInfos->where('field_name', 'job_title')->first()->field_value ?? '' }}</h3>
            <p>{{ $userResume->cvInfos->where('field_name', 'job_experience')->first()->field_value ?? '' }}</p>
            <p>{{ $userResume->cvInfos->where('field_name', 'job_date')->first()->field_value ?? '' }}</p>
        </div>
    </section>
    <hr>
    <section class="core-qualifications">
        <h2>Core Qualifications</h2>
        <hr>
        <div id="qlist">
            <ul>
                @foreach ($userResume->cvInfos->where('field_name', 'core_qualifications') as $cvInfo)
                    <li>{{ $cvInfo->field_value }}</li>
                @endforeach
            </ul>
        </div>
    </section>
    <hr>
    <section class="education">
        <h2>Education</h2>
        <hr>
        <div class="school">
            <h3>{{ $userResume->cvInfos->where('field_name', 'university')->first()->field_value ?? '' }}</h3>
            <h3>{{ $userResume->cvInfos->where('field_name', 'graduation_year')->first()->field_value ?? '' }}</h3>
            <p>{{ $userResume->cvInfos->where('field_name', 'education_details')->first()->field_value ?? '' }}</p>
        </div>
    </section>
</div>
@endsection
