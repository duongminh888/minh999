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
            <div class="box-body table-responsive no-padding" id="taban">
              <table class="table table-striped">
                <tbody >
                  @foreach($hoso as $hoso)
                  <tr>
                    <th>Loại hình</th>
                    <td>Vay trả góp</td>
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
                    <input type="text" class="form-control" placeholder="Vay trả góp" disabled>
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
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Thông tin khách hàng: </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn-box-tool btn btn-block btn-default"><i class="fa fa-edit"></i> Chỉnh sửa thông tin</button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>Họ tên khách hàng</th>
                      <td>Dương Văn Minh</td>
                    </tr>
                    <tr>
                      <th>Số điện thoại</th>
                      <td>0961354795</td>
                    </tr>
                    <tr>
                      <th>Ngày sinh</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Số chứng minh thư</th>
                      <td>01223456456</td>
                    </tr>
                    <tr>
                      <th>Ngày cấp</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Gới tính</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Loại điện thoại</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Quan hệ người thân</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Số điện thoại người thân</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Lương trung bình</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Hợp đồng</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Mã thẻ ngân hàng</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Nghề nghiệp</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Số điện thoại nơi làm</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Loại thanh toán</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Tên ngân hàng</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Chi nhánh</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
  var dem = 0;
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
