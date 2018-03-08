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
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin user: </h3>
              @if(auth::user()->rule < 3)
              <div class="box-tools pull-right">
                <a href="{{url('themthanhvien')}}">
                  <button type="button" class="btn-box-tool btn"><i class="fa  fa-check"></i> Thêm thành viên</button>
                </a>
<!--                 <button type="button" class="btn-box-tool btn" onclick="hienavatar()">Avatar</button> -->
              </div>
              @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th style="min-width: 150px">Phòng giao dịch</th>
                    <th style="min-width: 200px">Chức vụ</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody >
                  @foreach($user as $user)
                  <tr id="hang{{$user->id}}" onmouseover="hang({{$user->id}})" onmouseout="hang2({{$user->id}})">
                    <td>
                      <a id="loi{{$user->id}}" href="{{url('profile')}}/{{$user->name}}" name="avatar" >
                        <img src="{{url('public/avatar')}}/{{$user->avatar}}" width="70" height="70">
                      </a>
                    </td>
                    <td><a href="{{url('profile')}}/{{$user->name}}"><b>{{$user->name}}</b></a></td>
                    <td>{{$user->email}}</td>
                    <td style="width: 100px">
                      @foreach($phonggiaodich as $pgd)
                      @if($pgd->id == $user->phong || $pgd->giamdoc == $user->id)
                        {{$pgd->name}}
                      @endif
                      @endforeach
                    </td>
                    <td>
                      <p style="font-weight: bold;margin: 0px 20px 0px 0px">
                        @foreach($chucvu as $cv)
                        @if($cv->id == $user->rule)
                        {{$cv->name}}
                        @endif
                        @endforeach
                      </p>
                    </td>
                    @if(Auth::user()->rule < 3)
                    <td>
                      <a href="{{url('editmember')}}/{{$user->id}}">
                        <i class="fa fa-edit" style="font-size: 22px"></i> 
                      </a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
            <!-- <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Thông tin khách hàng: </h3>
              </div>
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>Họ tên khách hàng</th>
                      <th>Dương Văn Minh</th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    dem = 0;
    // // function hienavatar() {
    // //   demavatar = document.getElementsByName("avatar").length;
    // //   if(dem==0){
    // //     for (var i = 0; i <demavatar; i++) {
    // //       document.getElementsByName('avatar')[i].style.display = 'block';
    // //     }
    // //     dem = 1;
    // //   }else{
    // //     for (var i = 0; i <demavatar; i++) {
    // //       document.getElementsByName('avatar')[i].style.display = 'none';
    // //     }
    // //     dem = 0;
    // //   }
    // // }
    // function hang(id) {
    //   if(dem == 0)
    //   document.getElementById('loi'+id).style.display = 'block';
    // }
    // function hang2(id) {
    //   if(dem == 0)
    //   document.getElementById('loi'+id).style.display = 'none';
    // }
  </script>
@include('teamplte.footer')