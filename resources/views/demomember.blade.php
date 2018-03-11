@include('teamplte.header')

  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Demo form 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="container" style="width: 100%">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Vay mới</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="{{route('vaymoicheck')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
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
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Vay lại</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="{{route('vaylaicheck')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                  @if ( session()->has('message') )
                      <div class="alert alert-danger alert-dismissable">
                          <i class="fa fa-warning"></i>
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <b>Thông báo!</b> {{ session()->get('message') }}
                      </div>
                  @endif
                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="sdt" placeholder="Số điện thoại" class="form-control">
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Demo form </h3>
            </div>
            <form role="form">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tên khách hàng<span class="text-red">*</span></label>
                    <input type="text" class="form-control" name="hoten">
                  </div>
                  <div class="form-group">
                    <label>Số CMND/Hộ chiếu</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tài sản thế chấp</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tổng số tiền vay</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Hình thức lãi</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Lãi<span class="text-red">*</span></label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Số ngày vay<span class="text-red">*</span></label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Kỳ lãi<span class="text-red">*</span></label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Ngày vay<span class="text-red">*</span></label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea class="form-control"></textarea>
                  </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                </div>
              </div>
            </form>
          </div>
        </div> -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('teamplte.footer')