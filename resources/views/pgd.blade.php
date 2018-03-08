@include('teamplte.header')
  <!-- DataTables -->
  <style type="text/css">

  </style>
  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar')
<link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Phòng giao dịch
        <small>Chúc mừng năm mới</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <div class="col-md-6">
          @if(Auth::user()->rule < 3)
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thêm thành viên</h3>
              <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" role="form" id="taban2"  method="post" action="{{route('adduserpgd')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idpgd" value="{{$idpgd}}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Thành viên</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="iduser">
                        <option value="0">--Chọn nhân viên--</option>
                        @foreach($users as $us)
                          @if($us->rule == 7 ||$us->rule <3)
                          @elseif($us->id == $giamdoc)
                          @elseif(is_null($us->phong))
                            <option value="{{$us->id}}">{{$us->hoten}}(<span style="color: #000">{{$us->name}}</span>)</option>
                          @else
                          @endif
                        @endforeach
                      </select>
                      <span class="help-block">(Kế toán, chuyên gia, chuyên viên tín dụng)</span>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" style="float: right;">Hoàn thành</button>
                </div>
              </form>
            @if ( session()->has('message') )
                            <div id="delay3s" class="alert alert-success alert-dismissible" style="    background-color: #00a65a !important;">
                              <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('message') }}
                            </div>
            @endif
            </div>
          </div>
          @endif
          <div class="chat-box">
            <!-- DIRECT CHAT PRIMARY -->
            <div class="box box-success direct-chat direct-chat-success">
              <div class="box-header with-border">
                <h3 class="box-title">Note</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" style="height: 400px">
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
                    <input type="hidden" name="idpost" value="pgd{{$idpgd}}">
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
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Giám đốc</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          @foreach($users as $gd)
          @if($gd->id == $giamdoc)
          <div style="width: 100%;text-align: center;margin-bottom: 20px;">
            <img src="{{url('public/avatar')}}/{{$gd->avatar}}" style="width: 150px;height: 150px;border-radius: 100%;" id="avatar">
            <h3>{{$gd->hoten}}</h3>
          </div>
          @endif
          @endforeach
          </div>
        </div>
			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Nhân viên</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body no-padding">
	              <table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Họ tên</th>
	                  <th>Số điện thoại</th>
	                </tr>
                  @foreach($users as $u)
                  @if($u->phong == $idpgd)
	                <tr>
	                  <td>{{$u->id}}.</td>
	                  <td><a href="{{url('profile')}}/{{$u->name}}" >{{$u->hoten}}(<span style="color: #000">{{$u->name}}</span>)</a></td>
	                  <td>{{$u->sdt}}</td>
                    <td><a href="{{url('xoaphong')}}/{{$u->id}}"><button class="btn btn-danger"><span style="font-weight: bold;">x</span></button></a></td>
	                </tr>
                  @endif
                  @endforeach
	              </tbody></table>
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
