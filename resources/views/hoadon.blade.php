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
    #tabchat:hover {
      overflow: auto;
      padding-right: 1px;
    }
    #tabchat {
    overflow: hidden;
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
          @if ( session()->has('message') )
            <div id="delay3s" class="alert alert-success alert-dismissible" style="    background-color: #00a65a !important;">
              <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('message') }}
            </div>
          @endif
        </div>
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Chi tiết hợp đồng: </h3>
              <div class="box-tools pull-right">
                @if(Auth::user()->rule == 4 || Auth::user()->rule == 6)
                <button type="button" class="btn-box-tool btn"  onclick="taban()" id="nutbam"><i class="fa fa-edit"></i> Chỉnh sửa hợp đồng</button>
                @endif
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" id="taban">
              @if ( session()->has('loifile') )
                              <div id="delay3s" class="alert alert-danger alert-dismissible">
                                <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('loifile') }}
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
                    <th></th>
                    <th></th>
                  </tr>
                </tbody>
              </table>
            </div>
            @if(Auth::user()->rule == 4 || Auth::user()->rule == 6)
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
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" style="float: right;">Hoàn thành</button>
              </div>
            </form>
            @endif
                  @endforeach
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Trạng thái</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($trangthaihoso as $trangthaihs)
                @if($hoso->trangthaihopdong == $trangthaihs->id && $trangthaihs->id == 1)
                  <button class="info-box btn" data-toggle="modal" data-target="#modal-default">
                    <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-flag"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3><b>{{$trangthaihs->name}}</b></h3></span>
                    </div>
                  </button>
                @elseif($hoso->trangthaihopdong == $trangthaihs->id && $trangthaihs->id == 2)
                  <button class="info-box btn" data-toggle="modal" data-target="#modal-default">
                    <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-check"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3><b>{{$trangthaihs->name}}</b></h3></span>
                    </div>
                  </button>
                @elseif($hoso->trangthaihopdong == $trangthaihs->id && $trangthaihs->id == 5)
                  <button  class="info-box btn" data-toggle="modal" data-target="#modal-default">
                    <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-remove"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3><b>{{$trangthaihs->name}}</b></h3></span>
                    </div>
                  </button>
                @elseif($hoso->trangthaihopdong == $trangthaihs->id && $trangthaihs->id == 6)
                  <button  class="info-box btn" data-toggle="modal" data-target="#modal-default">
                    <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-remove"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3><b>{{$trangthaihs->name}}</b></h3></span>
                    </div>
                  </button>
                @else
                  @if($hoso->trangthaihopdong == $trangthaihs->id)
                  <button class="info-box btn" data-toggle="modal" data-target="#modal-default">
                    <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-wrench"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3><b>{{$trangthaihs->name}}</b></h3></span>
                    </div>
                  </button>
                  @endif
                @endif
              @endforeach
            </div>
            <!-- /.box-body -->
          </div>
          <form class="form-horizontal" role="form" id="formtrangthai" style="display: none;" method="POST" action="{{route('edittrangthai')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="idhoso" value="{{$hoso->id}}">
            <input type="text" name="trangthai" id="trangthaiinput" value="">
          </form>
          <div class="box box-warning"  id="getwidth">
            <div class="box-header with-border">
              <h3 class="box-title">File đính kèm</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn-box-tool btn"  onclick="taban5()" id="nutbam"><i class="fa fa-edit"></i> Thêm file đính kèm</button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="taban5">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Tên file</th>
                  <th>Ngày tải lên</th>
                  <th style="width: 100px"></th>
                </tr>
                @foreach($fileupload as $fu)
                <tr  style="cursor: pointer;" data-toggle="modal" data-target="#modal-hienanh{{$fu->id}}">
                  <td style="width: 10px">{{$fu->id}}</td>
                  <td><p style="word-wrap: break-word;color: blue">{{$fu->name}}</p></td>
                  <td>{{$fu->created_at}}</td>
                  <td style="width: 100px">
                    <div class="btn-group" style="width: 85px">
                      <a href="{{url('public/file')}}/{{$fu->link}}" download style="width: 40px;float: left;">
                        <button type="button" class="btn btn-block btn-default"><i class="fa  fa-download"></i></button>
                      </a>
                      <a href="{{url('deletefile')}}/{{$fu->id}}" style="width: 40px;float: left;margin-left: 5px">
                        <button type="button" class="btn btn-block btn-default">
                          <i class="fa  fa-trash-o" style="color: red"></i>
                        </button>
                      </a>
                    </div>
                  </td>
                </tr>
                <div class="modal fade" id="modal-hienanh{{$fu->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <img src="{{url('public/file')}}/{{$fu->link}}">
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                @endforeach
              </tbody></table>
            </div>
            <div class="box-body">
              <form class="form-horizontal" role="form" id="taban6" style="display: none;" method="POST" action="{{route('uploadfile')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idhoso" value="{{$hoso->id}}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">File thông tin đính kèm</label>
                    <div class="col-sm-7">
                      <input type="file" id="exampleInputFile" name="myfile">
                      <p class="help-block">Giới hạn file tải lên 5mb. Mỗi hồ sơ tối đa 5 file đính kèm.</p>
                      <?php echo $errors->first('myfile'); ?>
                      <span class="help-block" style="color: red"><?php echo $errors->first('myfile'); ?></span>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" style="float: right;">Hoàn thành</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="chat-box" >
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
                <div class="direct-chat-messages" id="tabchat">
                  @foreach($comment as $comment)
                      @if($comment->iduser == Auth::user()->id)
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-right">
                      @else
                  <div class="direct-chat-msg Left">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-left">
                      @endif
                        @foreach($users as $us)
                        @if($us->id == $comment->iduser)
                        {{$us->hoten}}
                        @endif
                        @endforeach
                      </span>
                      @if($comment->iduser == Auth::user()->id)
                      <span class="direct-chat-timestamp pull-left">{{$comment->created_at}}</span>
                      @else
                      <span class="direct-chat-timestamp pull-right">{{$comment->created_at}}</span>
                      @endif
                    </div>
                    <!-- /.direct-chat-info -->
                    @foreach($users as $us)
                    @if($us->id == $comment->iduser)
                    <img class="direct-chat-img" src="{{url('public/public/avatar')}}/{{$us->avatar}}" alt="Message User Image">
                    @endif
                    @endforeach
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      {{$comment->noidung}}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  @endforeach
                </div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <form action="{{route('pustcomment')}}" method="post">
                  <div class="input-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idpost" value="pos{{$hoso->id}}">
                    <input type="hidden" name="iduser" value="{{Auth::user()->id}}">
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
              <h3 class="box-title">Đề suất của chuyên viên tín dụng</h3>
              <div class="box-tools pull-right">
                @if(Auth::user()->rule == 6)
                <a href="{{url('chitietkhachhang')}}/{{$idmember}}/{{$checkid}}">
                  <button type="button" class="btn-box-tool btn" onclick="taban3()" id="nutbam3"><i class="fa fa-edit"></i> Chỉnh sửa thông tin</button>
                  </button>
                </a>
                @endif
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <th style="width: 30%">Đề suất của chuyên viên tín dụng:</th>
                    <td>{{$hoso->desuat}}</td>
                  </tr>
                  <tr>
                    <th>Số tiền:</th>
                    <td>{{$hoso->danhgiasotienvay}}</td>
                  </tr>
                  <tr>
                    <th>Trong đó:</th>
                    <td><b>Tín chấp</b>{{$hoso->texttinchap}}. <b>Dựa trên TSBĐ</b>{{$hoso->textduatrentsbd}}</td>
                  </tr>
                  <tr>
                    <th>Thời hạn vay vốn:</th>
                    <td>{{$hoso->thoihanvayvon}}</td>
                  </tr>
                  <tr>
                    <th>Hình thức giải ngân:</th>
                    <td>{{$hoso->giaingan}}</td>
                  </tr>
                  <tr>
                    <th>Giấy tờ gốc:</th>
                    <td>{{$hoso->giaytogoc}}</td>
                  </tr>
              </tbody></table>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nhân viên sử lý</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form" method="post" action="{{route('addnhanvien')}}">
              <!-- /.box-footer -->
              <div class="box-header">
                <table class="table table-bordered">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th>Tên nhân viên</th>
                    <th>Số điện thoại</th>
                    @if(Auth::user()->rule == 4)
                    <th></th>
                    @endif
                  </tr>
                    @foreach($nhanvien_donvay as $nvdv)
                    @foreach($users as $use)
                    @if($use->id == $nvdv->idnhanvien)
                    <tr>
                      <td style="width: 10px">{{$use->id}}</td>
                      <td><a href="{{url('profile')}}/{{$use->name}}"><p style="word-wrap: break-word;">{{$use->hoten}}</p></a></td>
                      <td>{{$use->sdt}}</td>
                      @if(Auth::user()->rule == 4)
                      <th><a href="{{url('deletenvhs')}}/{{$use->id}}/{{$checkid}}"><span class="btn btn-danger">X</span></a></th>
                      @endif
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                </tbody></table>
              </div>
            </form>
          </div>
        </div>
        <div class="modal fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Chọn trạng thái</h4>
              </div>
              <div class="modal-body">
                <?php $tthd = $hoso->trangthaihopdong; ?>
                @if(Auth::user()->rule == 5)
                <button class="info-box btn bg-green" data-dismiss="modal" onclick="trangthai(2)">
                  <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Đã giải ngân</b></h3></span>
                  </div>
                </button>
                @endif
                @if(Auth::user()->rule == 6)
                <button class="info-box bg-aqua btn" data-dismiss="modal" onclick="trangthai(3)">
                  <span class="info-box-icon "><i class="glyphicon glyphicon-wrench"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Đề xuất phê duyệt</b></h3></span>
                  </div>
                </button>
                @endif
                @if(Auth::user()->rule == 4 || Auth::user()->rule == 3)
                @if($tthd != 4 && $tthd != 2)
                <button class="info-box bg-aqua btn" data-dismiss="modal" onclick="trangthai(4)">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-wrench"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Phê duyệt</b></h3></span>
                  </div>
                </button>
                @endif
                @endif
                @if(Auth::user()->rule == 4 || Auth::user()->rule == 3 || Auth::user()->rule == 6)
                @if($tthd != 5)
                <button  class="info-box bg-red btn" data-dismiss="modal" onclick="trangthai(5)">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-remove"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Không đủ điều kiện</b></h3></span>
                  </div>
                </button>
                @endif
                @endif
                @if(Auth::user()->rule == 4)
                @if($tthd != 6)
                <button  class="info-box bg-red btn" data-dismiss="modal" onclick="trangthai(6)">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-remove"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Trình chuyên gia phê duyệt</b></h3></span>
                  </div>
                </button>
                @endif
                @endif
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- <button onclick="getwit()">123</button> -->
<script type="text/javascript">
function getwit() {
  var a = document.getElementById('getwidth').offsetHeight;
  document.getElementById('getwidth').style.height = a*2+'px';
}
setTimeout(function() {
    $('#delay3s').fadeOut('fast');
}, 2000);
setTimeout(function() {
    $('#delay3s2').fadeOut('fast');
}, 2000);
var myDiv = document.getElementById("tabchat");
    myDiv.scrollTop = myDiv.scrollHeight;

  var dem = 0;
  var dem2 = 0;
  var dem5 = 0;
  function trangthai(id) {
    document.getElementById('trangthaiinput').value = id;
    document.getElementById('formtrangthai').submit();
  }
  function taban5() {
    if (dem5 == 0) {
      document.getElementById("taban5").style.display = "none";
      document.getElementById("taban6").style.display = "block";
      document.getElementById("nutbam3").innerHTML = "<i class='fa fa-chevron-left'></i> Back";
      dem5 = 1;
    }else if(dem5==1){
      document.getElementById("taban5").style.display = "block";
      document.getElementById("taban6").style.display = "none";
      document.getElementById("nutbam3").innerHTML = "<i class='fa fa-edit'></i> File đính kèm";
      dem5 =0;
    }
  }
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
