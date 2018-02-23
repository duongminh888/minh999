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
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Chi tiết hợp đồng: </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn-box-tool btn"  onclick="taban()" id="nutbam"><i class="fa fa-edit"></i> Chỉnh sửa hợp đồng</button>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" id="taban">
@if ( session()->has('message') )
                <div id="delay3s" class="alert alert-success alert-dismissible" style="    background-color: #00a65a !important;">
                  <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('message') }}
                </div>
@endif
              <table class="table table-striped">
                <tbody >
                  @foreach($hoso as $hoso)
                  <tr>
                    <th>Loại hình</th>
                    <td id="loaivay">
                    </td>
                  </tr>
                  <tr>
                    <th>Số tiền vay</th>
                    <td>{{$hoso->sotienvay}} <b>đ</b></td>
                  </tr>
                  <tr>
                    <th>Ngày gửi hồ sơ</th> 
                    <td>{{date('d-m-Y', strtotime($hoso->created_at))}}</td>
                  </tr>
                  <tr>
                    <th>Ngày chỉnh sửa gần nhất</th>
                    <td>{{date('d-m-Y', strtotime($hoso->updated_at))}}</td>
                  </tr>
                  <tr>
                    <th>Số ngày vay</th>
                    <td>{{$hoso->songay}} <b>ngày</b></td>
                  </tr>
                  <tr>
                    <th>Số tiền phải trả</th>
                    <td>{{$hoso->sotienphaitra}} <b>đ</b></td>
                  </tr>
                  <tr>
                    <th>Lãi mỗi ngày</th>
                    <td>{{$hoso->laimoingay}} <b>đ</b></td>
                  </tr>
                  <tr>
                    <th>Tình trạng hợp đồng</th>
                    <td>
                      @if($hoso->trangthaihopdong == 1)
                      <span class="label label-warning">Chờ duyệt</span>
                      @elseif($hoso->trangthaihopdong == 2)
                      <span class="label label-primary">Đã giải ngân</span>
                      @elseif($hoso->trangthaihopdong == 3)
                      <span class="label label-success">Hoàn thành</span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th></th>
                    <th></th>
                  </tr>
                </tbody>
              </table>
            </div>
            <form class="form-horizontal" role="form" id="taban2" style="display: none;" method="post" action="{{route('edithoso')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idhoso" value="{{$hoso->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Loại hình </label>
                    <div class="col-sm-8">
                    <select class="form-control" name="loaivay">
                      @foreach($loaivay as $loaivay)
                      <option value="{{$loaivay->id}}"
                        @if($loaivay->id == $hoso->loaivay)
                        selected
                        <?php $checkloaivay = $loaivay->name; ?>
                        @endif
                      >{{$loaivay->name}}</option>
                      @endforeach
                    </select>
                    <script type="text/javascript">
                      document.getElementById('loaivay').innerHTML='{{$checkloaivay}}';
                    </script>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Số tiền vay (<b style="color: red">đ</b>)</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="{{$hoso->sotienvay}}" value="{{$hoso->sotienvay}}" name="sotienvay">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Số tiền phải trả (<b style="color: red">đ</b>)</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="{{$hoso->sotienphaitra}}" value="{{$hoso->sotienphaitra}}" name="sotienphaitra">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Lãi mỗi ngày (<b style="color: red">đ</b>)</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="{{$hoso->laimoingay}}" value="{{$hoso->laimoingay}}" name="laimoingay">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Số ngày vay</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="{{$hoso->songay}}" value="{{$hoso->songay}}" name="songay">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Ngày gửi hồ sơ</label>
                    <div class="col-sm-8">
                    <input disabled type="text" class="form-control"  placeholder="{{date('d-m-Y', strtotime($hoso->created_at))}}" value="{{date('d-m-Y', strtotime($hoso->created_at))}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Ngày chỉnh sửa gần nhất</label>
                    <div class="col-sm-8">
                    <input disabled type="text" class="form-control"  placeholder="{{date('d-m-Y', strtotime($hoso->updated_at))}}" value="{{date('d-m-Y', strtotime($hoso->updated_at))}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Trạng thái</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="trangthaihopdong">
                      @foreach($trangthaihoso as $tths)
                      <option value="{{$tths->id}}"
                        @if($tths->id == $hoso->trangthaihopdong)
                        selected
                        @endif
                      >{{$tths->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" style="float: right;">Hoàn thành</button>
              </div>
            </form>
                  @endforeach
            <!-- /.box-body -->
          </div>
          <div class="chat-box">
            <!-- DIRECT CHAT PRIMARY -->
            <div class="box box-primary direct-chat direct-chat-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Bình luận</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-primary btn-flat">Send</button>
                        </span>
                  </div>
                </form>
              </div>
              <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
          </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Thông tin khách hàng: </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn-box-tool btn" onclick="taban3()" id="nutbam3"><i class="fa fa-edit"></i> Chỉnh sửa thông tin</button>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              @foreach($thongtinkhachhang as $thongtinkh)
              <div class="box-body table-responsive" id="taban3">
                <table class="table table-striped">
                  <tbody>
                    @foreach($member as $member)
                    <?php $hoten=$member->hoten;
                          $sdt=$member->sdt;
                          $cmt=$member->cmt;
                     ?>
                    <tr>
                      <th>Họ tên khách hàng</th>
                      <td>{{$member->hoten}}</td>
                    </tr>
                    <tr>
                      <th>Số điện thoại</th>
                      <td>{{$member->sdt}}</td>
                    </tr>
                    <tr>
                      <th>Số chứng minh thư</th>
                      <td>{{$member->cmt}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <th>Ngày sinh</th>
                      <td>{{$thongtinkh->ngaysinh}}</td>
                    </tr>
                    <tr>
                      <th>Ngày cấp</th>
                      <td>{{$thongtinkh->ngaycap}}</td>
                    </tr>
                    <tr>
                      <th>Gới tính</th>
                      <td>{{$thongtinkh->gioitinh}}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{$thongtinkh->email}}</td>
                    </tr>
                    <tr>
                      <th>Loại điện thoại</th>
                      <td>{{$thongtinkh->loaidienthoai}}</td>
                    </tr>
                    <tr>
                      <th>Quan hệ người thân</th>
                      <td>{{$thongtinkh->quanhenguoithan}}</td>
                    </tr>
                    <tr>
                      <th>Số điện thoại người thân</th>
                      <td>{{$thongtinkh->sdtnguoithan}}</td>
                    </tr>
                    <tr>
                      <th>Lương trung bình</th>
                      <td>{{$thongtinkh->luongtb}}</td>
                    </tr>
                    <tr>
                      <th>Hợp đồng</th>
                      <td>{{$thongtinkh->hopdong}}</td>
                    </tr>
                    <tr>
                      <th>Mã thẻ ngân hàng</th>
                      <td>{{$thongtinkh->mathenh}}</td>
                    </tr>
                    <tr>
                      <th>Nghề nghiệp</th>
                      <td>{{$thongtinkh->nghenghiep}}</td>
                    </tr>
                    <tr>
                      <th>Số điện thoại nơi làm</th>
                      <td>{{$thongtinkh->sdtnoilam}}</td>
                    </tr>
                    <tr>
                      <th>Loại thanh toán</th>
                      <td>{{$thongtinkh->loaithanhtoan}}</td>
                    </tr>
                    <tr>
                      <th>Tên ngân hàng</th>
                      <td>{{$thongtinkh->tennganhang}}</td>
                    </tr>
                    <tr>
                      <th>Chi nhánh</th>
                      <td>{{$thongtinkh->chinhanh}}</td>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                    </tr>
                  </tbody>
                </table>
              </div>

              <form class="form-horizontal" role="form" id="taban4" style="display: none;" method="post" action="{{route('editthongtin')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Họ tên khách hàng</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$hoten}}" name="hoten">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Số điện thoại</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control"  placeholder="" value="{{$sdt}}" name="" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Số chứng minh thư</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control"  placeholder="" value="{{$cmt}}" name="chungminhthu">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Ngày sinh</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" value="" name="ngaysinh">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Ngày cấp</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control"  value="" name="ngaycap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Giới tính</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="gioitinh">
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control"  placeholder="" value="{{$thongtinkh->email}}" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Loại điện thoại</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->loaidienthoai}}" name="loaidienthoai">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Quan hệ người thân</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->quanhenguoithan}}" name="quanhenguoithan">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Lương trung bình</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->luongtb}}" name="luongtb">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Hợp đồng</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->hopdong}}" name="hopdong">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Mã thẻ ngân hàng</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->mathenh}}" name="mathenh">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Nghề nghiệp</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->nghenghiep}}" name="nghenghiep">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Số điện thoại nơi làm</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control"  placeholder="" value="{{$thongtinkh->sdtnoilam}}" name="sdtnoilam">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Loại thanh toán</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->loaithanhtoan}}" name="loaithanhtoan">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Tên ngân hàng</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->tennganhang}}" name="tennganhang">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Chi nhánh</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$thongtinkh->chinhanh}}" name="chinhanh">
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" style="float: right;">Hoàn thành</button>
                </div>
              </form>
              @endforeach
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
  var dem = 0;
  var dem2 = 0;
  function taban3() {
    if (dem2 == 0) {
      document.getElementById("taban3").style.display = "none";
      document.getElementById("taban4").style.display = "block";
      document.getElementById("nutbam3").innerHTML = "<i class='fa fa-chevron-left'></i> Back";
      dem2 = 1;
    }else if(dem2==1){
      document.getElementById("taban3").style.display = "block";
      document.getElementById("taban4").style.display = "none";
      document.getElementById("nutbam3").innerHTML = "<i class='fa fa-edit'></i> Chỉnh sửa thông tin";
      dem2 =0;
    }
  }
  function taban() {
    if (dem==0) {
      document.getElementById("taban").style.display = "none";
      document.getElementById("taban2").style.display = "block";
      document.getElementById("nutbam").innerHTML = "<i class='fa fa-chevron-left'></i> Back";
      dem = 1;
    }else if(dem==1){
      document.getElementById("taban").style.display = "block";
      document.getElementById("taban2").style.display = "none";
      document.getElementById("nutbam").innerHTML = "<i class='fa fa-edit'></i> Chỉnh sửa hợp đồng";
      dem =0;
    }
  }
</script>
@include('teamplte.footer')
