@extends('layout.master')

@section('content')
<div class="container">
  <h1>Admin Dashboard</h1>
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Users</h5>
          <p class="card-text">{{ $totalUsers }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total CVs Created</h5>
          <p class="card-text">{{ $totalCvInfos }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Templates</h5>
          <p class="card-text">{{ $totalTemplates }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <canvas id="cvChart" width="400" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Fetch the data for CVs created by date
  const cvData = {!! $cvData !!};

  // Extracting dates and counts from cvData
  const dates = cvData.map(entry => entry.date);
  const counts = cvData.map(entry => entry.count);

  // Chart.js code to render the bar chart
  var ctx = document.getElementById('cvChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: dates,
      datasets: [{
        label: 'Number of CVs Created',
        data: counts,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endsection

@section('styles')
<style>
  /* Custom styles if needed */
</style>
@endsection
