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
      width: 25%;
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
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Thông tin khách hàng: <span id="spantop"></span></h3>
                <div class="box-tools pull-right">
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
                    @foreach($member as $mb)
                    <?php $spantop = $mb->hoten;
                          $id=$mb->id;
                     ?>
                    <tr>
                      <th>Họ tên khách hàng</th>
                      <td>{{$mb->hoten}}</td>
                      <th>Số điện thoại</th>
                      <td>{{$mb->sdt}}</td>
                    </tr>
                    <script type="text/javascript">
                      document.getElementById('spantop').innerHTML='{{$spantop}}';
                    </script>
                    <tr>
                      <th>Số chứng minh thư</th>
                      <td>{{$mb->cmt}}</td>
                      <th>Ngày sinh</th>
                      <td>{{$thongtinkh->ngaysinh}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <th>Ngày cấp</th>
                      <td>{{$thongtinkh->ngaycap}}</td>
                      <th>Gới tính</th>
                      <td>{{$thongtinkh->gioitinh}}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{$thongtinkh->email}}</td>
                      <th>Loại điện thoại</th>
                      <td>{{$thongtinkh->loaidienthoai}}</td>
                    </tr>
                    <tr>
                      <th>Quan hệ người thân</th>
                      <td>{{$thongtinkh->quanhenguoithan}}</td>
                      <th>Số điện thoại người thân</th>
                      <td>{{$thongtinkh->sdtnguoithan}}</td>
                    </tr>
                    <tr>
                      <th>Lương trung bình</th>
                      <td>{{$thongtinkh->luongtb}}</td>
                      <th>Hợp đồng</th>
                      <td>{{$thongtinkh->hopdong}}</td>
                    </tr>
                    <tr>
                      <th>Mã thẻ ngân hàng</th>
                      <td>{{$thongtinkh->mathenh}}</td>
                      <th>Nghề nghiệp</th>
                      <td>{{$thongtinkh->nghenghiep}}</td>
                    </tr>
                    <tr>
                      <th>Số điện thoại nơi làm</th>
                      <td>{{$thongtinkh->sdtnoilam}}</td>
                      <th>Loại thanh toán</th>
                      <td>{{$thongtinkh->loaithanhtoan}}</td>
                    </tr>
                    <tr>
                      <th>Tên ngân hàng</th>
                      <td>{{$thongtinkh->tennganhang}}</td>
                      <th>Chi nhánh</th>
                      <td>{{$thongtinkh->chinhanh}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              @endforeach
              <!-- /.box-body -->
            </div>

          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Hóa đơn đang làm việc</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Loại hình</th>
                  <th style="text-align: right;">Số tiền cần vay</th>
                  <th style="text-align: center;">Số ngày vay</th>
                  <th style="text-align: center;">Trạng thái</th>
                  <th style="text-align: center;">Đã vay</th>
                  <th style="text-align: center;">Thời gian</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($hoso as $hs)
                @if($hs->idmember == $id)
                <tr>
                  <td>{{$hs->id}}</td>
                  @foreach($member as $mb)
                  @if($hs->idmember == $id)
                  <td>
                    <a href="#">{{$mb->hoten}}</a>
                  </td>
                  <td>{{$mb->sdt}}</td>
                  @endif
                  @endforeach
                  <td>Vay trả góp</td>
                  <td style="text-align: right;"><?= number_format($hs->sotienvay,0,",","."); ?> <b> đ</b></td>
                  <td style="text-align: center;">{{$hs->songay}}</td>
                  <td style="text-align: center;">
                      @if($hs->trangthaihopdong == 1)
                      <span class="label label-warning">Chờ duyệt</span>
                      @elseif($hs->trangthaihopdong == 2)
                      <span class="label label-primary">Đã giải ngân</span>
                      @elseif($hs->trangthaihopdong == 3)
                      <span class="label label-success">Hoàn thành</span>
                      @endif 
                  <td style="text-align: center;">
                    Lần {{$hs->stt}}
                  </td>
                  <td style="text-align: center;">{{$hs->created_at}}</td>
                  <th>
                    <a href="{{url('hoadon')}}/{{$hs->id}}">
                      <button type="button" class="btn btn-block btn-default">Chi tiết</button>
                    </a>
                  </th>
                </tr>
                @endif
                @endforeach
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
@include('teamplte.footer')
