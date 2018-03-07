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
              @if ( session()->has('loifile') )
                              <div id="delay3s" class="alert alert-danger alert-dismissible">
                                <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('loifile') }}
                              </div>
              @endif
              <table class="table table-striped">
                <tbody >
                  @foreach($shophoso as $shophoso)
                  <tr>
                    <th>Loại hình</th>
                    <td id="loaivay">
                    </td>
                  </tr>
                  <tr>
                    <th>Số tiền vay</th>
                    <td>{{$shophoso->sotienvay}} <b>đ</b></td>
                  </tr>
                  <tr>
                    <th>Ngày gửi hồ sơ</th> 
                    <td>{{date('d-m-Y', strtotime($shophoso->created_at))}}</td>
                  </tr>
                  <tr>
                    <th>Ngày chỉnh sửa gần nhất</th>
                    <td>{{date('d-m-Y', strtotime($shophoso->updated_at))}}</td>
                  </tr>
                  <tr>
                    <th>Số ngày vay</th>
                    <td>{{$shophoso->songay}} <b>ngày</b></td>
                  </tr>
                  <tr>
                    <th>Số tiền phải trả</th>
                    <td>{{$shophoso->sotienphaitra}} <b>đ</b></td>
                  </tr>
                  <tr>
                    <th>Lãi mỗi ngày</th>
                    <td>{{$shophoso->laimoingay}} <b>đ</b></td>
                  </tr>
                  <tr>
                    <th></th>
                    <th></th>
                  </tr>
                </tbody>
              </table>
            </div>
            <form class="form-horizontal" role="form" id="taban2" style="display: none;" method="post" action="{{route('editshophoso')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idhoso" value="{{$shophoso->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Loại hình </label>
                    <div class="col-sm-8">
                    <select class="form-control" name="loaivay">
                      @foreach($loaivay as $loaivay)
                      <option value="{{$loaivay->id}}"
                        @if($loaivay->id == $shophoso->loaivay)
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
                    <input type="text" class="form-control"  placeholder="{{$shophoso->sotienvay}}" value="{{$shophoso->sotienvay}}" name="sotienvay">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Số tiền phải trả (<b style="color: red">đ</b>)</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="{{$shophoso->sotienphaitra}}" value="{{$shophoso->sotienphaitra}}" name="sotienphaitra">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Lãi mỗi ngày (<b style="color: red">đ</b>)</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="{{$shophoso->laimoingay}}" value="{{$shophoso->laimoingay}}" name="laimoingay">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Số ngày vay</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="{{$shophoso->songay}}" value="{{$shophoso->songay}}" name="songay">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Ngày gửi hồ sơ</label>
                    <div class="col-sm-8">
                    <input disabled type="text" class="form-control"  placeholder="{{date('d-m-Y', strtotime($shophoso->created_at))}}" value="{{date('d-m-Y', strtotime($shophoso->created_at))}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Ngày chỉnh sửa gần nhất</label>
                    <div class="col-sm-8">
                    <input disabled type="text" class="form-control"  placeholder="{{date('d-m-Y', strtotime($shophoso->updated_at))}}" value="{{date('d-m-Y', strtotime($shophoso->updated_at))}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Trạng thái</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="trangthaihopdong">
                      @foreach($trangthaihoso as $tths)
                      <option value="{{$tths->id}}"
                        @if($tths->id == $shophoso->trangthaihopdong)
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
                @if($shophoso->trangthaihopdong == $trangthaihs->id && $trangthaihs->id == 1)
                  <button class="info-box btn" data-toggle="modal" data-target="#modal-default">
                    <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-flag"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3><b>{{$trangthaihs->name}}</b></h3></span>
                    </div>
                  </button>
                @elseif($shophoso->trangthaihopdong == $trangthaihs->id && $trangthaihs->id == 2)
                  <button class="info-box btn" data-toggle="modal" data-target="#modal-default">
                    <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-check"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3><b>{{$trangthaihs->name}}</b></h3></span>
                    </div>
                  </button>
                @elseif($shophoso->trangthaihopdong == $trangthaihs->id && $trangthaihs->id == 5)
                  <button  class="info-box btn" data-toggle="modal" data-target="#modal-default">
                    <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-remove"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"><h3><b>{{$trangthaihs->name}}</b></h3></span>
                    </div>
                  </button>
                @else
                  @if($shophoso->trangthaihopdong == $trangthaihs->id)
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
            <input type="text" name="idhoso" value="sop{{$shophoso->id}}">
            <input type="text" name="trangthai" id="trangthaiinput" value="">
          </form>
          <div class="box box-warning">
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
                <tr>
                  <td style="width: 10px">{{$fu->id}}</td>
                  <td><p style="word-wrap: break-word;">{{$fu->name}}</p></td>
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
                @endforeach
              </tbody></table>
            </div>
            <div class="box-body">
              <form class="form-horizontal" role="form" id="taban6" style="display: none;" method="POST" action="{{route('uploadfile')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idhoso" value="sop{{$shophoso->id}}">
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
                  @foreach($comment as $comment)
                  @if($comment->iduser == Auth::user()->id)
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-right">
                        @foreach($users as $us)
                        @if($us->id == $comment->iduser)
                        {{$us->hoten}}
                        @endif
                        @endforeach
                      </span>
                      <span class="direct-chat-timestamp pull-left">{{$comment->created_at}}</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="{{url('public/avatar')}}/{{Auth::user()->avatar}}" alt="Message User Image"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      {{$comment->noidung}}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  @else
                  <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                      <span class="direct-chat-name pull-left">
                        @foreach($users as $us)
                        @if($us->id == $comment->iduser)
                        {{$us->hoten}}
                        @endif
                        @endforeach
                      </span>
                      <span class="direct-chat-timestamp pull-right">{{$comment->created_at}}</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="{{url('public/avatar')}}/{{Auth::user()->avatar}}" alt="Message User Image"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      {{$comment->noidung}}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  @endif
                  @endforeach
                </div>
                <!--/.direct-chat-messages-->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <form action="{{route('pustcomment')}}" method="post">
                  <div class="input-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idpost" value="sop{{$shophoso->id}}">
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
                @if ( session()->has('message2') )
                                <div id="delay3s2" class="alert alert-success alert-dismissible" style="    background-color: #00a65a !important;">
                                  <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('message2') }}
                                </div>
                @endif
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>Họ tên khách hàng</th>
                      <td>{{$shophoso->hoten}}</td>
                    </tr>
                    <tr>
                      <th>Số điện thoại</th>
                      <td>{{$shophoso->sdt}}</td>
                    </tr>
                    <tr>
                      <th>Số chứng minh thư</th>
                      <td>{{$shophoso->cmt}}</td>
                    </tr>
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

              <form class="form-horizontal" role="form" id="taban4" style="display: none;" method="post" action="{{route('editshopthongtin')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idthongtinkh" value="{{$thongtinkh->idmember}}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Họ tên khách hàng</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="" value="{{$shophoso->hoten}}" name="hoten">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Số điện thoại</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control"  placeholder="" value="{{$shophoso->sdt}}" name="" disabled="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Số chứng minh thư</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control"  placeholder="" value="{{$shophoso->cmt}}" name="cmt">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Ngày sinh</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" value="{{date('Y-m-d', strtotime($thongtinkh->ngaysinh))}}" name="ngaysinh">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Ngày cấp</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control"  value="{{date('Y-m-d', strtotime($thongtinkh->ngaycap))}}" name="ngaycap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Giới tính</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="gioitinh">
                        <option value="1"
                        @if($thongtinkh->gioitinh == 1)
                        selected
                        @endif
                        >Nam</option>
                        <option value="2" 
                        @if($thongtinkh->gioitinh == 2)
                        selected
                        @endif
                        >Nữ</option>
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
        <div class="modal fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Chọn trạng thái</h4>
              </div>
              <div class="modal-body">
                <button class="info-box bg-yellow btn" data-dismiss="modal" onclick="trangthai(1)">
                  <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Chờ duyệt</b></h3></span>
                  </div>
                </button>
                <button class="info-box btn bg-green" data-dismiss="modal" onclick="trangthai(2)">
                  <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Đã giải ngân</b></h3></span>
                  </div>
                </button>
                <button class="info-box bg-aqua btn" data-dismiss="modal" onclick="trangthai(3)">
                  <span class="info-box-icon "><i class="glyphicon glyphicon-wrench"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Nhân viên duyệt</b></h3></span>
                  </div>
                </button>
                <button class="info-box bg-aqua btn" data-dismiss="modal" onclick="trangthai(4)">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-wrench"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Chuyên gia duyệt</b></h3></span>
                  </div>
                </button>
                <button  class="info-box bg-red btn" data-dismiss="modal" onclick="trangthai(5)">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-remove"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text"><h3><b>Không đủ điều kiện</b></h3></span>
                  </div>
                </button>
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
<script type="text/javascript">
setTimeout(function() {
    $('#delay3s').fadeOut('fast');
}, 2000);
setTimeout(function() {
    $('#delay3s2').fadeOut('fast');
}, 2000);
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
