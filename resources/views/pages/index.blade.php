@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>150</h3>

        <p>Tổng số users</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>53</h3>

        <p>Tổng số huấn luyện viên</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>44</h3>

        <p>Tổng số bài tập</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>65%</h3>

        <p>Tần suất người đến tập</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<div>
  <canvas id="myChart" ></canvas>
  <canvas id="myRevenue" style="margin-top :100px"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  let comerDataset = @json($comerDataset);
  let revenueDataset = @json($revenue);

  const labels = Object.keys(comerDataset);

  const data = {
    labels: labels,
    datasets: [{
        label: 'Số người đến tập',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: Object.values(comerDataset),
      },
    ]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

  const label_revenue = Object.keys(revenueDataset);
  const data_revenue = {
    labels: label_revenue,
    datasets: [{
        label: 'Doanh thu',
        backgroundColor: 'rgb(99, 255, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: Object.values(revenueDataset),
      },
      ]
      //lam han ra chart kahc di b
  };

  const config_revenue = {
    type: 'bar',
    data: data_revenue,
    options: {}
  };

  const myRevenue = new Chart(
    document.getElementById('myRevenue'),
    config_revenue
  );
</script>
@endsection
