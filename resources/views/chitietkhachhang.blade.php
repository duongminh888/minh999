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
    .form-horizontal .form-group {
      margin-left: 0px;
      margin-right: 0px;
    }
  </style>
  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thông tin khách hàng
      </h1>
    </section>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12" >
          <h2 class="page-header" style="padding-bottom: 20px">
            Thông tin thẩm định khách hàng
              <div class="box-tools pull-right">
                <a href="#">
                  <button type="button" id="nutbam" class="btn-default btn" onclick="taban()">Chỉnh sửa</button>
                </a>
              </div>
          </h2>
        </div>
      </div>
      <form class="form-horizontal" role="form" id="formtrangthai" style="display: none;" method="POST" action="{{route('test')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="idkhachhang" value="{{$id}}">
        <div class="row">
          <div class="col-xs-6">
            <p class="lead">1. Thông tin chi tiết khách hàng</p>
            <div class="table-responsive">
              <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Họ và tên</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="hoten" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày sinh</label>
                    <div class="col-sm-8">
                      <input type="date" name="ngaysinh" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số CMND</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="socnnd" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày cấp</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" placeholder="" name="ngaycap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nơi cấp</label>
                    <div class="col-sm-8">
                      <input type="text" name="noicap" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="sdt" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Sác thực</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="sacthucfb">
                          Facebook
                        </label>
                        <label style="margin-left: 20px">
                          <input type="checkbox" name="sacthuczalo">
                          Zalo
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nghề nghiệp</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nghenghiep" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Địa chỉ theo HKTT
                    </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="diachihktt" placeholder="">
                      <div class="checkbox">
                        <label>
                          <input type="radio" name="diachitheohktt">
                          Thuộc sở hữu KH
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="diachitheohktt">
                          Thuê
                        </label>
                        <label style="">
                          <input type="radio" name="diachitheohktt">
                          Nhà của bố mẹ
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="diachitheohktt">
                          Khác
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Địa chỉ hiện tại
                    </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="diachiht">
                      <div class="checkbox">
                        <label>
                          <input type="radio" name="diachitheoht">
                          Thuộc sở hữu KH
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="diachitheoht">
                          Thuê
                        </label>
                        <label style="">
                          <input type="radio" name="diachitheoht">
                          Nhà của bố mẹ
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="diachitheoht">
                          Khác
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Họ tên người đồng vay/bảo lãnh</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="baolanhhoten">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số CMND</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="baolanhcmnd" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày cấp</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="baolanhngaycap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nơi cấp</label>
                    <div class="col-sm-8">
                      <input type="date" name="baolanhnoicap" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                      <input type="number" name="baolanhsdt" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Sác thực</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="baolanhsacthucfb">
                          Facebook
                        </label>
                        <label style="margin-left: 20px">
                          <input type="checkbox" name="baolanhsacthuczalo">
                          Zalo
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Quan hệ với Meup 68</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="quanhemeup">
                        <option value="1">Kh chưa có giao dịch tại Meup 68</option>
                        <option value="2">Kh đã giao dịch với Meup 68</option>
                        <option value="3">Kh hiện là CBNV Meup 68</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tên công ty/trường học</label>
                    <div class="col-sm-8">
                      <input type="number" name="tencongty" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                      <input type="number" name="diachinoilam" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Chức vụ</label>
                    <div class="col-sm-8">
                      <input type="number" name="chucvu" class="form-control" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <p class="lead">2. Thông tin đề nghị kết nối khoản vay</p>
            <div class="table-responsive">
              <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số tiền đề nghị vay</label>
                    <div class="col-sm-8">
                      <input type="number" name="sotienvay" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thời hạn</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="text" name="songayvay" class="form-control" placeholder="">
                        <span class="input-group-addon">Tháng</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mục đích vay</label>
                    <div class="col-sm-8">
                      <input type="text" name="mucdichvay" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Hình thức cấp tín dụng</label>
                    <div class="col-sm-8">
                      <div >
                        <label>
                          <input type="radio" name="hinhthuccaptindung" value="Tín chấp">
                          Tín chấp
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="hinhthuccaptindung" value="Trả góp">
                          Trả góp
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="hinhthuccaptindung" value="Có TSBD">
                          Có TSBD
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <p class="lead">3. Thông tin tài sản đảm bảo và thu nhập</p>
            <div class="table-responsive">
              <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Loại TSBĐ</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="radio" name="loaitsbd">
                          Bất động sản
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="loaitsbd">
                          Ô tô
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="loaitsbd">
                          Xe máy
                        </label>
                      </div>
                      <label class="col-sm-2 control-label">Khác</label>
                      <div class="col-sm-10 ">
                        <input type="text" class="form-control" name="loaikhac" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mô tả TSBĐ</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="radio" name="motatheotsbd">
                          Chính chủ
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="motatheotsbd">
                          Không chính chủ
                        </label>
                      </div>
                      <textarea class="form-control" name="motatsbd" rows="3" placeholder="Mô tả ..."></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Giá trị định giá TSBĐ</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="giatridinhgia" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tỷ lệ cho vay/giá trị định giá</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="tylechovay" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thu nhập</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="thunhap">
                        <option value="1">Dưới 10tr</option>
                        <option value="2">Dưới 15tr</option>
                        <option value="3">Trên 15tr</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thu nhập cụ thể</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="thunhapcuthe" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số người phụ thuộc</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="songuoiphuthuoc" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Hình thức nhận thu nhập</label>
                    <div class="col-sm-8">
                      <select name="hinhthucnhanthunhap" class="form-control">
                        <option value="1">Hàng ngày</option>
                        <option value="2">Hàng tuần</option>
                        <option value="3">Nửa tháng</option>
                        <option value="4">Hàng tháng</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mô tả và đánh giá về KH</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="motakh" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mô tả và đánh giá về gia đình KH</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="motagdkh" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-6">
            <p class="lead">4. Đánh giá về năng lực tài chính của khách hàng</p>
            <div class="table-responsive">
              <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Chấm điểm theo sếp hạng nội bộ</label>
                    <div class="col-sm-8">
                      <input type="text" name="chamdiem" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Kết quả CIC</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="radio" name="ketquacic">
                          Chưa có dư nợ
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="ketquacic">
                          Đã có dư nợ
                        </label>
                      </div>
                      <label class="col-sm-3 control-label">Dư nợ</label>
                      <div class="col-sm-9 ">
                        <input type="text" class="form-control" name="duno" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tại tổ chức tín dụng(nếu có)</label>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" >Nợ sấu</label>
                      <div class="col-sm-8 ">
                        <input type="text" class="form-control"  style="margin-bottom: 10px" placeholder="" name="nosau">
                      </div>
                      <label class="col-sm-4 control-label">Nhóm nợ</label>
                      <div class="col-sm-8 ">
                        <input type="text" class="form-control" name="nhomno" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tổng thu nhập hàng tháng(1)</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="" name="thunhap1">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tổng nợ phải trả hàng tháng(2)</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" name="thunhap2" class="form-control" placeholder="">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Chi phí sinh hoạt hàng tháng(3)</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" name="thunhap3" class="form-control" placeholder="">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thu nhập tích lũy còn lại để trả nợ(4)<p class="help-block">(4=1-2-3)</p></label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="" name="thunhap4">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tỉ lệ nợ/thu nhập(5)<p class="help-block">(5=2/1)*%</p></label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" name="thunhap5" class="form-control" placeholder="">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Đánh giá về khả năng trả nợ của khác hàng</label>
                    <div class="col-sm-8">
                      <input type="text" name="danhgiatrano" class="form-control" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
          <div class="col-xs-6">
            <div class="table-responsive">
              <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Đề suất của chuyên viên tín dụng</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="radio" name="desuat">
                          Đề suất kết nối hồ sơ
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="desuat">
                          Từ chối
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số tiền</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" class="form-control" name="danhgiasotienvay" placeholder="">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Trong đó</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="boxtinchap">
                          Tín chấp
                        </label>
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="" name="texttinchap">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                        <label >
                          <input type="checkbox" name="boxduatrentsbd">
                          Dựa trên TSBĐ
                        </label>
                      </div>
                      <div class="input-group">
                        <input type="number" name="textduatrentsbd" class="form-control" placeholder="">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thời hạn vay vốn</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" name="thoihanvayvon" class="form-control">
                        <span class="input-group-addon">Tháng</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="margin-top: 170px">
              <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">Hoàn thành
              </button>
            </div>
          </div>  
        </div>
      </form>
      <div id="bangthongtin">
        <div class="row">
          <div class="col-xs-6">
            <p class="lead">1. Thông tin chi tiết khách hàng</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                <tr>
                  <td style="width:30%"><b>Họ và tên: </b> Dương Văn Minh</td>
                  <td><b>Ngày sinh:</b> 11/11/1996</td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="col-md-5" style="padding-left: 0px;float: left;">
                      <b>Số CMND: </b> 012345678912 
                    </div><div class="col-md-4">
                      <b>Ngày cấp: </b> 11/11/1996 
                    </div><div class="col-md-3">
                      <b>Nơi cấp: </b> Hà nội
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Số điện thoại:</th>
                  <td>0961354795</td>
                </tr>
                <tr>
                  <th>Xác thực:</th>
                  <td>
                    <span  class="label label-primary" ><span class="fa fa-facebook-official"></span> Facebook</span>
                    <span  class="label label-primary" ><span style="color: #3c8dbc;background-color: #fff;padding: 0px 2px;border-radius: 2px">Z</span> Zalo</span>
                  </td>
                </tr>
                <tr>
                  <th>Nghề nghiệp:</th>
                  <td>Nhân viên IT</td>
                </tr>
                <tr>
                  <td><b>Địa chỉ theo HKTT:</b> <br><p class="help-block">(chi tiết đến số nhà/ngách/ngõ/đường)</p></td>
                  <td>Việt Hùng, Đông Anh, Hà Nội<br><p class="help-block">Thuộc sở hữu của khách hàng</p></td>
                </tr>
                <tr>
                  <td><b>Địa chỉ hiện tại:</b> <br><p class="help-block">(chi tiết đến số nhà/ngách/ngõ/đường)</p></td>
                  <td>Việt Hùng, Đông Anh, Hà Nội<br><p class="help-block">Thuộc sở hữu của khách hàng</p></td>
                </tr>
                <tr>
                  <th>Họ tên người đồng vay/bảo lãnh:</th>
                  <td>Dương Minh Khang</td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="col-md-5" style="padding-left: 0px;float: left;">
                      <b>Số CMND: </b> 012345678912 
                    </div><div class="col-md-4">
                      <b>Ngày cấp: </b> 11/11/1996 
                    </div><div class="col-md-3">
                      <b>Nơi cấp: </b> Hà nội
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Số điện thoại:</th>
                  <td>0961354795</td>
                </tr>
                <tr>
                  <th>Xác thực:</th>
                  <td>
                    <span  class="label label-primary" ><span class="fa fa-facebook-official"></span> Facebook</span>
                    <span  class="label label-primary" ><span style="color: #3c8dbc;background-color: #fff;padding: 0px 2px;border-radius: 2px">Z</span> Zalo</span>
                  </td>
                </tr>
                <tr>
                  <th>Quan hệ với Meup 68:</th>
                  <td>KH chưa có giao dịch tại Meup 68</td>
                </tr>
                <tr>
                  <th>Tên công ty/trường học: </th>
                  <td> THPT Đông Anh</td>
                </tr>
                <tr>
                  <th>Địa chỉ: </th>
                  <td>Hà nội</td>
                </tr>
                <tr>
                  <th>Chức vụ: </th>
                  <td>Nhân viên</td>
                </tr>
              </tbody></table>
            </div>
          </div>
          <div class="col-xs-6">
            <p class="lead">2. Thông tin đề nghị kết nối khoản vay</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                <tr>
                  <th style="width:30%">Số tiền, thời hạn đề nghị vay: </th>
                  <td> 900.000.000đ</td>
                </tr>
                <tr>
                  <th>Thời hạn: </th>
                  <td> 3 tháng</td>
                </tr>
                <tr>
                  <th>Mục đích vay: </th>
                  <td> Mua điện thoại</td>
                </tr>
                <tr>
                  <th>Hình thức cấp tín dụng: </th>
                  <td> Tín chấp</td>
                </tr>
              </tbody></table>
            </div>
            <p class="lead">3. Thông tin Tài sản bảo đảm và thu nhập</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                <tr>
                  <th style="width:30%">Loại TSBD: </th>
                  <td> Bất động sản</td>
                </tr>
                <tr>
                  <th>Mô tả TSBD: </th>
                  <td> Cửa hàng đồ ăn sáng.<p class="help-block">Chính chủ</p></td>
                </tr>
                <tr>
                  <th>Giá trị định giá TSBD: </th>
                  <td> 100.000.000.000đ</td>
                </tr>
                <tr>
                  <th>Tỉ lệ cho vay/giá trị định giá:</th>
                  <td>80%</td>
                </tr>
                <tr>
                  <th>Thu nhập: </th>
                  <td>Trên 15tr</td>
                </tr>
                <tr>
                  <td><b>Thu nhập cụ thể: </b> 20.000.000đ</td>
                  <td><b>Số người phụ thuộc: </b>6</td>
                </tr>
                <tr>
                  <th>Hình thức nhận thu nhập: </th>
                  <td>Hàng ngày</td>
                </tr>
                <tr>
                  <th style="width:30%">Mô tả và đánh giá về KH: </th>
                  <td></td>
                </tr>
                <tr>
                  <th style="width:30%">Mô tả và đánh giá về gia đình KH: </th>
                  <td></td>
                </tr>
              </tbody></table>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-6">
            <p class="lead">4. Đánh giá về năng lực tài chính của khách hàng</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <th style="width: 30%">Chấm điểm theo sếp hạng nội bộ:</th>
                    <td>10</td>
                  </tr>
                  <tr>
                    <th>Kết quả CIC: </th>
                    <td>Đã có dư nợ (10.000.000đ)</td>
                  </tr>
                  <tr>
                    <th>Tại tổ chức tín dụng</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Tổng thu nhập hàng tháng(1):</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Tổng nợ phải trả hàng tháng(2):</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Tổng chi phí sinh hoạt hàng tháng(3):</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Thu nhập tích lũy còn lại để trả nợ(4):<p class="help-block">(4=1-2-3)</p></th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Tỷ lệ nợ/Thu nhập(5):<p class="help-block">(5=2-1)*%</p></th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Đánh giá về khả năng trả nợ của KH:</th>
                    <td></td>
                  </tr>
              </tbody></table>
            </div>
          </div>  
          <div class="col-xs-6">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <th style="width: 30%">Đề suất của chuyên viên tín dụng:</th>
                    <td>Đề suất kết nối hồ sơ</td>
                  </tr>
                  <tr>
                    <th>Số tiền:</th>
                    <td>10.000.000VND</td>
                  </tr>
                  <tr>
                    <th>Trong đó:</th>
                    <td>Tín chấp - 7.000.000 VND</td>
                  </tr>
                  <tr>
                    <th>Thời hạn vay vốn:</th>
                    <td>2 Tháng</td>
                  </tr>
                  <tr>
                    <th>Hình thức giải ngân:</th>
                    <td>Chuyển khoản</td>
                  </tr>
                  <tr>
                    <th>Giấy tờ gốc:</th>
                    <td>CMND/Căn cước/Hộ chiếu</td>
                  </tr>
              </tbody></table>
            </div>
            <div style="margin-top: 170px">
              <a href="#" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
              <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
              </button>
            </div>
          </div>  
        </div>
      </div>
      <!-- /.row -->
    </section>
    <section class="content-header">
    </section>
  </div>
<script type="text/javascript">
  dem = 0;
  function taban() {
    if (dem == 0) {
      document.getElementById("bangthongtin").style.display = "none";
      document.getElementById("formtrangthai").style.display = "block";
      document.getElementById("nutbam").innerHTML = "<i class='fa fa-chevron-left'></i> Bảng chi tiết";
      dem = 1;
    }else if(dem==1){
      document.getElementById("bangthongtin").style.display = "block";
      document.getElementById("formtrangthai").style.display = "none";
      document.getElementById("nutbam").innerHTML = "<i class='fa fa-edit'></i> Chỉnh sửa";
      dem =0;
    }
  }
</script>
@include('teamplte.footer')
