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
    td {
      width: 50%;
    }
    #avatar {
      border: solid 4px #ecf0f5;
      border-style: solid;
    }
  </style>
  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar')
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
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
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin user: </h3>
              <div class="box-tools pull-right">
                <a href="{{url('thanhvien')}}">
                  <button type="button" class="btn-box-tool btn"><i class="fa fa-chevron-left"></i> Thành viên</button>
                </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive ">
              <form class="form-horizontal" role="form" id="taban2" style="display: block;" method="post" action="{{route('posteditmember')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach($user as $user)
                <div style="width: 100%;text-align: center;margin-bottom: 20px;">
                  <img src="{{url('public/avatar')}}/{{Auth::user()->avatar}}" style="width: 150px;height: 150px;border-radius: 100%;" id="avatar">
                </div>
@if ( session()->has('message') )
                <div id="delay3s" class="alert alert-success alert-dismissible" style="    background-color: #00a65a !important;">
                  <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('message') }}
                </div>
@endif
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="box-body">
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">
                      Username
                    </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="{{$user->name}}" value="{{$user->name}}" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">
                      Họ tên
                    </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="{{$user->hoten}}" value="{{$user->hoten}}" name="hoten">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">
                      Số điện thoại
                    </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="{{$user->sdt}}" value="{{$user->sdt}}" name="sdt">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">
                      Email
                    </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="{{$user->email}}" value="{{$user->email}}" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">
                      Giới tinh
                    </label>
                    <div class="col-sm-8">
                      <select class="form-control" name="gioitinh">
                        <option value="1"
                        @if($user->gioitinh == 1)
                        selected
                        @endif
                        >Nam</option>
                        <option value="2" 
                        @if($user->gioitinh == 2)
                        selected
                        @endif
                        >Nữ</option>
                      </select>
                    </div>
                  </div>
                  @if(Auth::user()->rule == 1 || Auth::user()->rule == 2 || Auth::user()->rule == 4)
                  <div class="form-group">
                    <label  class="col-sm-4 control-label">
                      Chức vụ
                    </label>
                    <div class="col-sm-8">
                        @if($user->id == Auth::user()->id || $user->rule  == Auth::user()->rule)
                        <select disabled class="form-control" name="chucvu">
                        @else
                        <select class="form-control" name="chucvu">
                        @endif
                          @foreach($chucvu as $cv)
                          @if($cv->id == 1 || $cv->id == 4)
                          <option disabled="" selected="" value="{{$cv->id}}">{{$cv->name}}</option>
                          @else
                          <option value="{{$cv->id}}">{{$cv->name}}</option>
                          @endif
                          @endforeach
                        </select>
                    </div>
                  </div>
                  @endif
                </div>
                @endforeach
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" style="float: right;">Hoàn thành</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
setTimeout(function() {
    $('#delay3s').fadeOut('fast');
}, 2000);
</script>
@include('teamplte.footer')