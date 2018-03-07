@include('teamplte.header')

  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hello shop!.. 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    @if(Auth::user()->rule == 7)
      <div class="row">
        <div class="container" style="width: 100%">

          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Thêm đơn vay</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="{{route('shopadddonvay')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                  @if ( session()->has('thongbao') )
                    <div id="delay3s" class="alert alert-success alert-dismissible" style="    background-color: #00a65a !important;">
                      <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('thongbao') }}
                    </div>
                  @endif
                  @if ( session()->has('canhbao') )
                    <div id="delay3s" class="alert alert-danger alert-dismissible" >
                      <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('canhbao') }}
                    </div>
                  @endif
                  <div class="form-group @if($errors->first('hoten'))  has-error @endif">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" id="@if($errors->first('hoten')) inputError @endif" name="hoten" placeholder="Họ tên">
                    <span class="help-block" style="color: red"><?php echo $errors->first('hoten'); ?></span>
                  </div>
                  <div class="form-group  @if($errors->first('cmt'))  has-error @endif">
                    <label>Số chứng minh thư</label>
                    <input type="number" class="form-control" id="@if($errors->first('cmt')) inputError @endif" name="cmt" placeholder="Số chứng minh thư">
                    <span class="help-block" style="color: red"><?php echo $errors->first('cmt'); ?></span>
                  </div>
                  <div class="form-group  @if($errors->first('sdt'))  has-error @endif">
                    <label>Số điện thoại</label>
                    <input type="number" class="form-control" id="@if($errors->first('sdt')) inputError @endif" name="sdt" placeholder="Số điện thoại">
                    <span class="help-block" style="color: red"><?php echo $errors->first('sdt'); ?></span>
                  </div>
                  <div class="form-group  @if($errors->first('sotien'))  has-error @endif">
                    <label>Số tiền</label>
                    <input type="number" class="form-control" id="@if($errors->first('sotien')) inputError @endif" name="sotien" placeholder="Số tiền">
                    <span class="help-block" style="color: red"><?php echo $errors->first('sotien'); ?></span>
                  </div>
                  <div class="form-group  @if($errors->first('songayvay'))  has-error @endif">
                    <label>Số ngày vay</label>
                    <input type="number" class="form-control" id="@if($errors->first('songayvay')) inputError @endif" name="songayvay" placeholder="Số ngày vay">
                    <span class="help-block" style="color: red"><?php echo $errors->first('songayvay'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Các file thông tin khác</label>
                    <input type="file" id="exampleInputFile" name="myfile">
                    <p class="help-block">Giới hạn file tải lên 5mb.</p>
                    <?php echo $errors->first('myfile'); ?>
                    <span class="help-block" style="color: red"><?php echo $errors->first('myfile'); ?></span>
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Hoàn thành</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="callout callout-danger">
        <h4>Lỗi!</h4>

        <p>Trang web này dành riêng cho tài khoản shop.</p>
      </div>
    @endif
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('teamplte.footer')