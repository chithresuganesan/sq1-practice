
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                  <h6 class="float-left">{{ __('Chart') }}</h6>
                  <span class="float-right">
                  <select class="form form-control" data-typeid="demo1">
                    <option value="bar">Bar Chart</option>
                    <option value="doughnut">doughnut Chart</option>
                    <option value="line">Line Chart</option>
                    <option value="radar">Radar Chart</option>
                    <option value="pie">Pie Chart</option>
                    <option value="polarArea">polarArea Chart</option>

                  </select>
                  </span>
                </div>

                <div class="card-body">

                  <div>
                    <canvas id="demo1" data-url="{{ route('chart.bind') }}" ></canvas>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                  <h6 class="float-left">{{ __('Chart 2') }}</h6>
                  <span class="float-right">
                  <select class="form form-control" data-typeid="demo2">
                    <option value="bar">Bar Chart</option>
                    <option value="doughnut">doughnut Chart</option>
                    <option value="line">Line Chart</option>
                    <option value="radar">Radar Chart</option>
                    <option value="pie">Pie Chart</option>
                    <option value="polarArea">polarArea Chart</option>

                  </select>
                  </span>
                </div>

                <div class="card-body">

                  <div>
                    <canvas id="demo2"data-url="{{ route('chart.bind') }}" ></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="{{ asset('js/chart.js') }}"></script>
  {{-- <script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
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
  </script> --}}
@endpush
@endsection
