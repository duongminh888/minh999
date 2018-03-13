@include('teamplte.header')
@include('teamplte.slidebar')
<style type="text/css">
  .direct-chat-messages {
    height: 365px;
  }
  .callout.callout-success {
    background-color: #00a65a !important;
  }
  .profile-user-img {
    margin: 0 auto;
    width: 100%;
    max-width: 150px;
    border:  #fff;
    border-radius: 5%;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thông tin cá nhân
        <small>Chúc mừng năm mới</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
@if ( session()->has('message') )
      <div class="callout callout-success" id="taban">
        <h4>Thông báo!</h4>
        <p> {{ session()->get('message') }}</p>
      </div>
@endif
      <div class="row">
        @foreach($user as $user)
        <?php $idprofile = $user->id; ?>
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive " src="{{url('public/public/avatar')}}/{{$user->avatar}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$user->hoten}}</h3>

              <p class="text-muted text-center">
                @foreach($chucvu as $chucvu)
                @if($user->rule == $chucvu->id)
                {{$chucvu->name}}
                @endif
                @endforeach
              </p>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Số điện thoại</strong>

              <p class="text-muted">
                {{$user->sdt}}
              </p>

              <hr>

              <strong><i class="fa fa-google margin-r-5"></i> Email</strong>

              <p class="text-muted">
                {{$user->email}}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Địa chỉ</strong>

              <p class="text-muted">{{$user->diachi}}</p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Ghi chú</strong>

              <p>{{$user->mota}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- xxx -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Để lại bình luận</a></li>
              <!-- <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Công việc</a></li> -->
              @if(Auth::user()->id == $user->id && Auth::user()->rule != 7)
              <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Cài đặt</a></li>
              @endif
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- comment -->
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
                          <input type="hidden" name="idpost" value="mem{{$idprofile}}">
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
                <!-- end comment -->
              </div>
              <!-- /.tab-pane -->
              <!-- <div class="tab-pane" id="timeline">
                <div class="">
                  <div class="box-header">
                    <h3 class="box-title">Hợp đồng vay tiền</h3>
                  </div>
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody><tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Số ngày</th>
                        <th>Tiền lãi</th>
                        <th>Tiền khác</th>
                        <th>Tổng lãi</th>
                        <th>Tiền khách trả</th>
                        <th>Tình trạng</th>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>5-2-2018</td>
                        <td>7</td>
                        <td>900.000 VNĐ</td>
                        <td>0 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td><span class="label label-danger">Chưa thanh toán</span></td>
                        <td><a href="#">Chi tiết</a></td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>12-2-2018</td>
                        <td>7</td>
                        <td>900.000 VNĐ</td>
                        <td>0 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td><span class="label label-success">Đã thanh toán</span></td>
                        <td><a href="#">Chi tiết</a></td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>19-2-2018</td>
                        <td>7</td>
                        <td>900.000 VNĐ</td>
                        <td>0 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td><span class="label label-warning">Chưa thanh toán</span></td>
                        <td><a href="#">Chi tiết</a></td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>26-2-2018</td>
                        <td>7</td>
                        <td>900.000 VNĐ</td>
                        <td>0 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td><span class="label label-warning">Chưa thanh toán</span></td>
                        <td><a href="#">Chi tiết</a></td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>19-2-2018</td>
                        <td>7</td>
                        <td>900.000 VNĐ</td>
                        <td>0 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td>900.000 VNĐ</td>
                        <td><span class="label label-warning">Chưa thanh toán</span></td>
                        <td><a href="#">Chi tiết</a></td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
              </div> -->
              <!-- /.tab-pane -->
              @if(Auth::user()->id == $user->id && Auth::user()->rule != 7)
              <div class="tab-pane" id="settings">
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">
                            Ảnh đại diện
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                        <div class="box-body">
                          <form role="form" method="post" action="{{route('thayavatar')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputFile">File ảnh</label>
                                <input type="file" id="exampleInputFile" name="myfile">
                                <p class="help-block">Giới hạn dung lượng file 2mb</p>
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                              </div>
                            </div>

                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                            Thông tin cá nhân
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
                          <form role="form" method="POST" action="{{route('thaythongtincanhan')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="box-body">
                              <div class="form-group">
                                <label >Họ tên</label>
                                <input type="text" name="hoten" class="form-control" value="{{$user->hoten}}">
                              </div>
                              <div class="form-group">
                                <label >Số điện thoại</label>
                                <input type="text" class="form-control" name="sdt" value="{{$user->sdt}}">
                              </div>
                              <div class="form-group">
                                <label >Email</label>
                                <input type="text" class="form-control" disabled="" value="{{$user->email}}">
                              </div>
                              <div class="form-group">
                                <label >Địa chỉ</label>
                                <input type="text" class="form-control"  name="diachi" value="{{$user->diachi}}">
                              </div>
                              <div class="form-group">
                                <label >Mô tả ngắn</label>
                                <input type="text" class="form-control"  name="motangan" value="{{$user->mota}}">
                              </div>
                            </div>
                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="panel box box-danger">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            Mật khẩu
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
                          <form role="form" action="{{route('doimatkhau')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box-body">
                              <input type="hidden" name="id" value="{{$user->id}}">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password1">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password2">
                              </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        @endforeach
      </div>
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
setTimeout(function() {
    $('#taban').fadeOut('fast');
}, 2000);
</script>
@include('teamplte.footer')
