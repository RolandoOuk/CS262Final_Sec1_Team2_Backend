@extends('layout.master')

@section('content')

<style>
  @page {
    size: A4;
    margin: 20mm;
  }

  .smos-body {
    font-family: "Lexend", sans-serif;
    margin: 0;
    padding: 0;
    width: 210mm;
    height: 297mm;
  }

  .smos-container {
    padding: 10mm;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
  }

  .smos-profile-img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto;
    display: block;
    border: 4px solid rgb(255, 255, 255);
  }

  .smos-section-title {
    font-weight: bold;
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 10px;
  }

  .smos-sidebar {
    background-color: #343a40;
    color: white;
    padding: 10px;
    height: 100%;
    box-sizing: border-box;
  }

  .smos-main-content {
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 10px;
    flex-grow: 1;
    box-sizing: border-box;
  }

  .smos-title-underline {
    width: 100%;
    height: 1px;
    background-color: #343a40;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .smos-title-underline-white {
    width: 100%;
    height: 1px;
    background-color: #ffffff;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .smos-h6 {
    font-size: 16px;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .smos-container-flex {
    display: flex;
    gap: 0;
    height: 100%;
  }

  .smos-sidebar,
  .smos-main-content {
    box-sizing: border-box;
  }

  .smos-download-button {
    margin-top: 20px;
    text-align: center;
  }

  @media print {
    .smos-body {
      margin: 0;
      box-shadow: none;
    }

    .smos-container {
      padding: 0;
    }

    .smos-sidebar,
    .smos-main-content {
      padding: 10mm;
    }
  }
</style>

<div class="smos-body">
  <div class="smos-container">
    <div class="row smos-container-flex">
      <div class="col-md-4 p-0">
        <div class="smos-sidebar">
          <div class="text-center">
            @if ($userResume->user->profile_pic)
            <img src="{{ asset('storage/' . $userResume->user->profile_pic) }}" alt="Profile Picture" class="smos-profile-img" />
            @else
            <p>No profile picture available.</p>
            @endif
          </div>

          <!-- Contact Info -->
          <div class="smos-title-underline-white"></div>
          <div class="smos-contact-info mt-1">
            <h5>CONTACT</h5>
            <div class="smos-title-underline-white"></div>
            @foreach ($userCvInfos as $cvInfo)
            @if ($cvInfo->field_name === 'phone_number')
            <p><i class="fa fa-phone"></i> {{ $cvInfo->field_value }}</p>
            @endif
            @if ($cvInfo->field_name === 'email')
            <p><i class="fa fa-envelope"></i> {{ $cvInfo->field_value }}</p>
            @endif
            @if ($cvInfo->field_name === 'address')
            <p><i class="fa fa-map-marker"></i> {{ $cvInfo->field_value }}</p>
            @endif
            @endforeach
          </div>

          @foreach ($userCvInfos as $cvInfo)
          @if (in_array($cvInfo->field_name, ['skills', 'languages']))
          <div class="smos-other-info mt-4">
            <div class="smos-title-underline-white"></div>
            <h5>{{ strtoupper($cvInfo->field_name) }}</h5>
            <div class="smos-title-underline-white"></div>
            <p>{{ $cvInfo->field_value }}</p>
          </div>
          @endif
          @endforeach
        </div>
      </div>
      <div class="col-md-8 p-0">
        <div class="smos-main-content">
          <div style="display: flex;">
            @foreach ($userCvInfos as $cvInfo)
            @if ($cvInfo->field_name === 'first_name')
            <h1 style="font-size: 28px;"><span id="firstName">{{ $cvInfo->field_value }}</span></h1>
            @endif
            @if ($cvInfo->field_name === 'last_name')
            <h1 style="font-size: 28px;"><span id="lastName">{{ $cvInfo->field_value }}</span></h1>
            @endif
            @endforeach
          </div>

          <div class="smos-title-underline"></div>
          <h5 class="smos-section-title">Work Experience</h5>
          <div class="smos-title-underline"></div>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'job_title')->first()->field_value ?? '' }}</h6>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'qualification')->first()->field_value ?? '' }}</h6>

          <div class="smos-title-underline"></div>
          <h5 class="smos-section-title">Education</h5>
          <div class="smos-title-underline"></div>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'university')->first()->field_value ?? '' }}</h6>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'graduation_year')->first()->field_value ?? '' }}</h6>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'major')->first()->field_value ?? '' }}</h6>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'education_details')->first()->field_value ?? '' }}</h6>

          <div class="smos-title-underline"></div>
          <h5 class="smos-section-title">Summary</h5>
          <div class="smos-title-underline"></div>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'summary')->first()->field_value ?? '' }}</h6>

          <div class="smos-title-underline"></div>
          <h5 class="smos-section-title">Additional Experience</h5>
          <div class="smos-title-underline"></div>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'experience_details')->first()->field_value ?? '' }}</h6>

          <div class="smos-title-underline"></div>
          <h5 class="smos-section-title">References</h5>
          <div class="smos-title-underline"></div>
          <h6 class="smos-h6">{{ $userCvInfos->where('field_name', 'references')->first()->field_value ?? '' }}</h6>
        </div>
        <div class="download-button" id="downloadButton">
          <button class="btn btn-primary" onclick="downloadPDF()">Download PDF</button>
        </div>
        <script>
          function downloadPDF() {
            const downloadButton = document.getElementById('downloadButton');
            downloadButton.style.display = 'none'; // Hide the download button

            const element = document.body;
            html2pdf(element, {
              margin: 1,
              filename: 'profile.pdf',
              image: {
                type: 'jpeg',
                quality: 0.98
              },
              html2canvas: {
                scale: 2
              },
              jsPDF: {
                unit: 'in',
                format: 'A4',
                orientation: 'portrait'
              }
            }).then(() => {
              downloadButton.style.display = 'block'; // Show the download button again
            });
          }
        </script>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

@endsection