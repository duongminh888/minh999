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
        <div class="col-xs-12">
          <h2 class="page-header">
            Thông tin thẩm định khách hàng
          </h2>
        </div>
        <!-- /.col -->
      </div>

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
        <!-- /.col -->
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
      <!-- /.row -->
    </section>
    <section class="content-header">
    </section>
  </div>
@include('teamplte.footer')
