@include('teamplte.header')
  <!-- DataTables -->
  <style type="text/css">
    #example1_filter {
      float: right;
    }
    #example1_paginate {
      text-align: right;
    }
    #example1_paginate .pagination {
      margin: 0px;
    }
    .nutbox {
      font-weight: bold;
      border: #fff;
      color: #00a65a;
      background-color: #fff;
      padding: 0px 4px;
    }
    .dataTables_length {
      display: none;
    }
    .pagination {
      float: right;
    }
  </style>
  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Đơn xin vay
        <small>Chúc mừng năm mới</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Đơn xin vay</h3>
              <div class="box-tools pull-right">
                @if(isset($checkmem))
                <select class="form-control" name="user" style="float: left;width: 150px;margin-right: 15px;" id="optionnv">
                  <option>Chọn nhân viên</option>
                  @foreach($checkmem as $usr)
                    <option value="{{$usr->id}}">{{$usr->hoten}} 
                    (
                      @foreach($chucvu as $chucv)
                      @if($chucv->id == $usr->rule)
                      {{$chucv->name}}
                      @endif
                      @endforeach
                    )</option>
                  @endforeach
                </select>
                @endif
                <button type="button" class="btn-default btn" onclick="submitform()" >Phân quyền</button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th ><button class="nutbox" onclick="allclick()">All</button></th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Loại hình</th>
                  <th style="text-align: right;">Số tiền cần vay</th>
                  <th style="text-align: center;">Số ngày vay</th>
                  <th style="text-align: center;">Trạng thái</th>
                  <!-- <th style="text-align: center;">Đã vay</th> -->
                  <th style="text-align: center;">Thời gian</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($hoso as $hs)
                @if(isset($nhanvien_donvay))
                  @foreach($nhanvien_donvay as $nvdv)
                  @if($hs->id == $nvdv->idhoso && $nvdv->idnhanvien == Auth::user()->id)
                  <tr>
                    <td>{{$hs->id}}</td>
                    @foreach($member as $mb)
                    @if($hs->idmember == $mb->id)
                    <td>
                      <a href="#">{{$mb->hoten}}</a>
                    </td>
                    <td>{{$mb->sdt}}</td>
                    @endif
                    @endforeach
                    <td>Vay trả góp</td>
                    <td style="text-align: right;"><?= number_format($hs->sotienvay,0,",","."); ?> <b> đ</b></td>
                    <td style="text-align: center;">{{$hs->songay}}</td>
                    <td style="text-align: center;">
                      @foreach($trangthaihoso as $tths)
                        @if($hs->trangthaihopdong == 1 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-warning">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == 2 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-success">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == 5 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-danger">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == $tths->id)
                        <span class="label label-primary">{{$tths->name}}</span>
                        @endif 
                      @endforeach
                    <!-- <td style="text-align: center;">
                      Lần {{$hs->stt}}
                    </td> -->
                    <td style="text-align: center;">{{$hs->created_at}}</td>
                    <th>
                      <a href="{{url('hoadon')}}/{{$hs->id}}">
                        <button type="button" class="btn btn-block btn-default">Chi tiết</button>
                      </a>
                    </th>
                  </tr>
                  @endif
                  @endforeach
                @else
                  <tr onclick="checkbox({{$hs->id}})" name="trclick" style="cursor: pointer;">
                    <td>
                      <button class="nutbox" id="checkbox{{$hs->id}}"><span class='fa fa-square-o'></span></button>
                    </td>
                    @foreach($member as $mb)
                    @if($hs->idmember == $mb->id)
                    <td>
                      <a href="#">{{$mb->hoten}}</a>
                    </td>
                    <td>{{$mb->sdt}}</td>
                    @endif
                    @endforeach
                    <td>Vay trả góp</td>
                    <td style="text-align: right;"><?= number_format($hs->sotienvay,0,",","."); ?> <b> đ</b></td>
                    <td style="text-align: center;">{{$hs->songay}}</td>
                    <td style="text-align: center;">
                      @foreach($trangthaihoso as $tths)
                        @if($hs->trangthaihopdong == 1 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-warning">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == 2 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-success">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == 5 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-danger">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == $tths->id)
                        <span class="label label-primary">{{$tths->name}}</span>
                        @endif 
                      @endforeach
                    <!-- <td style="text-align: center;">
                      Lần {{$hs->stt}}
                    </td> -->
                    <td style="text-align: center;">{{$hs->created_at}}</td>
                    <th>
                      <a href="{{url('hoadon')}}/{{$hs->id}}">
                        <button type="button" class="btn btn-block btn-default">Chi tiết</button>
                      </a>
                    </th>
                  </tr>
                @endif
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="box-footer clearfix">
              {{ $hoso->links() }}
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<form class="form-horizontal" role="form" method="post" id="formtrangthai" action="{{route('addmemhoso')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" id="nhanbox" name="hosovalue">
  <input type="hidden" id="nhanbox2" name="memvalue">
</form>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Dương Văn Minh</strong>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="{{url('')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="{{url('')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('')}}/dist/js/demo.js"></script>
<!-- page script -->
<script>
  var text = new Array();
  var dem = '';
  function allclick() {
    for (var i = 0; i < 20; i++) {
      document.getElementsByName('trclick')[i].click();
    }
  }
  function checkbox(id) {
    var check = document.getElementById("checkbox"+id).innerHTML;
    soluong = text.length;
    if (check == '<span class="fa fa-square-o"></span>') {
      text[soluong]=id;
      document.getElementById('nhanbox').value = text;
      document.getElementById("checkbox"+id).innerHTML = "<span class='fa fa-check'></span>";
      document.getElementById("checkbox"+id).style.color='red';
    }else{
      var deleteElement = id;
      var i = text.indexOf(deleteElement);
      if (i != -1) {
          text.splice(i,1);
      }
      document.getElementById('nhanbox').value = text;
      document.getElementById("checkbox"+id).innerHTML = "<span class='fa fa-square-o'></span>";
      document.getElementById("checkbox"+id).style.color='#00a65a';
    }
  }
  function submitform() {
    optionnv = document.getElementById('optionnv').value;
    if (optionnv == 'Chọn nhân viên') {
      location.reload();
    }else{
      document.getElementById('nhanbox2').value = optionnv;
      document.getElementById('formtrangthai').submit();
    }
  }
  $(function () {
    $('#example1').DataTable()
  })
</script>
</body>
</html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">