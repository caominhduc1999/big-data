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
    <div class="form-group">
      <label>Từ ngày</label>
      <input onchange="filterData()" type="date" id="startDate" value="2021-12-02" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <label>Đến ngày</label>
      <input onchange="filterData()" id="toDate" type="date" value="2021-12-07"  id="exampleInputPassword1" placeholder="Password">
    </div>
{{-- <div class="lewlew">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="text" class="form-control" name="from_date" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="text" class="form-control" name="to_date" id="exampleInputPassword1" placeholder="Password">
    </div>
  </div>
<div> --}}
  <canvas id="myChart"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  let comerDataset = @json($comerDataset);

    const labels = ['2021-12-02','2021-12-03','2021-12-04','2021-12-05','2021-12-06','2021-12-07','2021-12-08','2021-12-09','2021-12-10','2021-12-11'];
    const datapoints = ['1','2','3','4','5',6,7,3,4,1,4,1];
    const datapoints2 = ['3.2','4.1','5.2','6.2','7',2,2,2,4,1,4,1];

  const data = {
    labels: labels,
    datasets: [{
        label: 'Số người đến tập',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: datapoints,
      },
      {
        label: 'Doanh thu (triệu VNĐ)',
        backgroundColor: 'rgb(99, 255, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: datapoints2,
      },
    ]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

function filterData(){
    const date = [...labels];
    const startDate = document.getElementById('startDate');
    const endDate = document.getElementById('toDate');

    const indexStartDate = date.indexOf(startDate.value);
    const indexEndDate = date.indexOf(endDate.value);

    const filterDate = date.slice(indexStartDate, indexEndDate + 1 );
    myChart.config.data.labels = filterDate;
    myChart.update();

    const dataPoint = [...datapoints];
    const filterDatapoints = dataPoint.slice(indexStartDate , indexEndDate + 1);
    myChart.config.data.datasets[0].data = filterDatapoints;
    myChart.update();

    const dataPoint2 = [...datapoints2];
    const filterDatapoints2 = dataPoint2.slice(indexStartDate , indexEndDate + 1);
    myChart.config.data.datasets[1].data = filterDatapoints2;
    myChart.update();
}
filterData();
</script>
@endsection
