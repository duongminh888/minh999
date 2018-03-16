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
                <a href="{{url('hoadon')}}/{{$id2}}">
                  <button type="button" id="nutbam" class="btn-default btn">Quay lại</button>
                </a>
              </div>
          </h2>
          @if ( session()->has('message') )
            <div id="delay3s" class="alert alert-success alert-dismissible" style="    background-color: #00a65a !important;">
              <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('message') }}
            </div>
          @endif
        </div>
      </div>
      @foreach($thongtinkhachhang as $tt)
      <div id="bangthongtin" style="display: block;">
        <div class="row">
          <div class="col-xs-6">
            <p class="lead">1. Thông tin chi tiết khách hàng</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                @foreach($member as $mb)
                <tr>
                  <td style="width:30%"><b>Họ và tên: </b> {{$mb->hoten}}</td>
                  <td><b>Ngày sinh:</b> {{$tt->ngaysinh}}</td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="col-md-5" style="padding-left: 0px;float: left;">
                      <b>Số CMND: </b> {{$mb->cmt}} 
                    </div><div class="col-md-4">
                      <b>Ngày cấp: </b> {{$tt->ngaycap}}
                    </div><div class="col-md-3">
                      <b>Nơi cấp: </b> {{$tt->noicap}}
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Số điện thoại:</th>
                  <td>{{$mb->sdt}}</td>
                </tr>
                @endforeach
                <tr>
                  <th>Xác thực:</th>
                  <td>
                    @if($tt->sacthuc == 2)
                    <span  class="label label-primary" ><span class="fa fa-facebook-official"></span> Facebook</span>
                    @elseif($tt->sacthuc == 1)
                    <span  class="label label-primary" ><span style="color: #3c8dbc;background-color: #fff;padding: 0px 2px;border-radius: 2px">Z</span> Zalo</span>
                    @elseif($tt->sacthuc == 3)
                      <span  class="label label-primary" ><span style="color: #3c8dbc;background-color: #fff;padding: 0px 2px;border-radius: 2px">Z</span> Zalo</span>
                      <span  class="label label-primary" ><span class="fa fa-facebook-official"></span> Facebook</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Nghề nghiệp:</th>
                  <td>{{$tt->nghenghiep}}</td>
                </tr>
                <tr>
                  <td><b>Địa chỉ theo HKTT:</b> <br><p class="help-block">(chi tiết đến số nhà/ngách/ngõ/đường)</p></td>
                  <td>{{$tt->diachihktt}}<br><p class="help-block">
                    @if($tt->diachitheohktt == 1)
                    Thuộc sở hữu KH
                    @elseif($tt->diachitheohktt == 2)
                    Thuê
                    @elseif($tt->diachitheohktt == 3)
                    Nhà của bố mẹ
                    @elseif($tt->diachitheohktt == 4)
                    Khác
                    @endif
                  </p></td>
                </tr>
                <tr>
                  <td><b>Địa chỉ hiện tại:</b> <br><p class="help-block">(chi tiết đến số nhà/ngách/ngõ/đường)</p></td>
                  <td>{{$tt->diachiht}}<br><p class="help-block">
                    @if($tt->diachitheoht == 1)
                    Thuộc sở hữu KH
                    @elseif($tt->diachitheoht == 2)
                    Thuê
                    @elseif($tt->diachitheoht == 3)
                    Nhà của bố mẹ
                    @elseif($tt->diachitheoht == 4)
                    Khác
                    @endif
                  </p></td>
                </tr>
                <tr>
                  <th>Tên công ty/trường học: </th>
                  <td> {{$tt->tencongty}}</td>
                </tr>
                <tr>
                  <th>Địa chỉ: </th>
                  <td>{{$tt->diachinoilam}}</td>
                </tr>
                <tr>
                  <th>Chức vụ: </th>
                  <td>{{$tt->chucvu}}</td>
                </tr>
                <tr>
                  <th>Quan hệ với Meup 68:</th>
                  <td>{{$tt->quanhemeup}}</td>
                </tr>
                <tr>
                  <th>Họ tên người đồng vay/bảo lãnh:</th>
                  <td>{{$tt->baolanhhoten}}</td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="col-md-5" style="padding-left: 0px;float: left;">
                      <b>Số CMND: </b> {{$tt->baolanhcmnd}} 
                    </div><div class="col-md-4">
                      <b>Ngày cấp: </b> {{$tt->baolanhngaycap}} 
                    </div><div class="col-md-3">
                      <b>Nơi cấp: </b> {{$tt->baolanhnoicap}}
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>Số điện thoại:</th>
                  <td>{{$tt->baolanhsdt}}</td>
                </tr>
                <tr>
                  <th>Xác thực:</th>
                  <td>
                    @if($tt->baolanhsacthuc == 2)
                    <span  class="label label-primary" ><span class="fa fa-facebook-official"></span> Facebook</span>
                    @elseif($tt->baolanhsacthuc == 1)
                    <span  class="label label-primary" ><span style="color: #3c8dbc;background-color: #fff;padding: 0px 2px;border-radius: 2px">Z</span> Zalo</span>
                    @elseif($tt->baolanhsacthuc == 3)
                      <span  class="label label-primary" ><span style="color: #3c8dbc;background-color: #fff;padding: 0px 2px;border-radius: 2px">Z</span> Zalo</span>
                      <span  class="label label-primary" ><span class="fa fa-facebook-official"></span> Facebook</span>
                    @endif
                  </td>
                </tr>
              </tbody></table>
            </div>
          </div>
          <div class="col-xs-6">
            <p class="lead">2. Thông tin đề nghị kết nối khoản vay</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                @foreach($hoso as $hs)
                <tr>
                  <th style="width:30%">Số tiền, thời hạn đề nghị vay: </th>
                  <td> {{$hs->sotienvay}}</td>
                </tr>
                <tr>
                  <th>Thời hạn: </th>
                  <td> {{$hs->songay}}</td>
                </tr>
                <tr>
                  <th>Mục đích vay: </th>
                  <td> {{$hs->mucdichvay}}</td>
                </tr>
                <tr>
                  <th>Hình thức cấp tín dụng: </th>
                  <td> {{$hs->hinhthuccaptindung}}</td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <p class="lead">3. Thông tin Tài sản bảo đảm và thu nhập</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                <tr>
                  <th style="width:30%">Loại TSBD: </th>
                  <td> {{$tt->loaitsbd}}. {{$tt->loaikhac}}</td>
                </tr>
                <tr>
                  <th>Mô tả TSBD: </th>
                  <td> Cửa hàng đồ ăn sáng.<p class="help-block">{{$tt->motatheotsbd}}</p></td>
                </tr>
                <tr>
                  <th>Giá trị định giá TSBD: </th>
                  <td> {{$tt->giatridinhgia}}</td>
                </tr>
                <tr>
                  <th>Tỉ lệ cho vay/giá trị định giá:</th>
                  <td>{{$tt->tylechovay}}</td>
                </tr>
                <tr>
                  <th>Thu nhập: </th>
                  <td>{{$tt->thunhap}}</td>
                </tr>
                <tr>
                  <td><b>Thu nhập cụ thể: </b> {{$tt->thunhapcuthe}}</td>
                  <td><b>Số người phụ thuộc: </b>{{$tt->songuoiphuthuoc}}</td>
                </tr>
                <tr>
                  <th>Hình thức nhận thu nhập: </th>
                  <td>{{$tt->hinhthucnhanthunhap}}</td>
                </tr>
                <tr>
                  <th style="width:30%">Mô tả và đánh giá về KH: </th>
                  <td>{{$tt->motakh}}</td>
                </tr>
                <tr>
                  <th style="width:30%">Mô tả và đánh giá về gia đình KH: </th>
                  <td>{{$tt->motagdkh}}</td>
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
                    <td>{{$tt->chamdiem}}</td>
                  </tr>
                  <tr>
                    <th>Kết quả CIC: </th>
                    <td>{{$tt->ketquacic}}. {{$tt->duno}}</td>
                  </tr>
                  <tr>
                    <th>Tại tổ chức tín dụng</th>
                    <td><b>Nợ sấu: </b> {{$tt->nosau}}. <b>Nhóm nợ: </b> {{$tt->nhomno}}</td>
                  </tr>
                  <tr>
                    <th>Tổng thu nhập hàng tháng(1):</th>
                    <td>{{$tt->thunhap1}}</td>
                  </tr>
                  <tr>
                    <th>Tổng nợ phải trả hàng tháng(2):</th>
                    <td>{{$tt->thunhap2}}</td>
                  </tr>
                  <tr>
                    <th>Tổng chi phí sinh hoạt hàng tháng(3):</th>
                    <td>{{$tt->thunhap3}}</td>
                  </tr>
                  <tr>
                    <th>Thu nhập tích lũy còn lại để trả nợ(4):<p class="help-block">(4=1-2-3)</p></th>
                    <td>{{$tt->thunhap4}}</td>
                  </tr>
                  <tr>
                    <th>Tỷ lệ nợ/Thu nhập(5):<p class="help-block">(5=2-1)*%</p></th>
                    <td>{{$tt->thunhap5}}</td>
                  </tr>
                  <tr>
                    <th>Đánh giá về khả năng trả nợ của KH:</th>
                    <td>{{$tt->danhgiatrano}}</td>
                  </tr>
              </tbody></table>
            </div>
          </div>  
          <div class="col-xs-6">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  @foreach($hoso as $hs)
                  <tr>
                    <th style="width: 30%">Đề suất của chuyên viên tín dụng:</th>
                    <td>{{$hs->desuat}}</td>
                  </tr>
                  <tr>
                    <th>Số tiền:</th>
                    <td>{{$hs->danhgiasotienvay}}</td>
                  </tr>
                  <tr>
                    <th>Trong đó:</th>
                    <td><b>Tín chấp</b>{{$hs->texttinchap}}. <b>Dựa trên TSBĐ</b>{{$hs->textduatrentsbd}}</td>
                  </tr>
                  <tr>
                    <th>Thời hạn vay vốn:</th>
                    <td>{{$hs->thoihanvayvon}}</td>
                  </tr>
                  <tr>
                    <th>Hình thức giải ngân:</th>
                    <td>{{$hs->giaingan}}</td>
                  </tr>
                  <tr>
                    <th>Giấy tờ gốc:</th>
                    <td>{{$hs->giaytogoc}}</td>
                  </tr>
                  @endforeach
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
      <form class="form-horizontal" role="form" id="formtrangthai" style="display: none;" method="POST" action="{{route('test')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="idkhachhang" value="{{$id}}">
        <input type="hidden" name="idhoadon" value="{{$id2}}">
        <div class="row">
          <div class="col-xs-6">
            <p class="lead">1. Thông tin chi tiết khách hàng</p>
            <div class="table-responsive">
              <div class="form-horizontal">
                <div class="box-body">
                  @foreach($member as $mb)
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Họ và tên</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="hoten" value="{{$mb->hoten}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày sinh</label>
                    <div class="col-sm-8">
                      <input type="date" name="ngaysinh" class="form-control" value="{{$tt->ngaysinh}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số CMND</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="cmt" value="{{$mb->cmt}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày cấp</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" value="{{$tt->ngaycap}}" name="ngaycap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nơi cấp</label>
                    <div class="col-sm-8">
                      <input type="text" name="noicap" class="form-control" value="{{$tt->noicap}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" disabled="" placeholder="" value="{{$mb->sdt}}">
                    </div>
                  </div>
                  @endforeach
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Sác thực</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="sacthucfb" @if($tt->sacthuc == 3 || $tt->sacthuc == 2) checked @endif>
                          Facebook
                        </label>
                        <label style="margin-left: 20px" @if($tt->sacthuc == 3 || $tt->sacthuc == 1) checked @endif>
                          <input type="checkbox" name="sacthuczalo" checked>
                          Zalo
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nghề nghiệp</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nghenghiep" placeholder="" value="{{$tt->nghenghiep}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Địa chỉ theo HKTT
                    </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="diachihktt" placeholder="" value="{{$tt->diachihktt}}">
                      <div class="checkbox">
                        <label>
                          <input type="radio" @if($tt->diachitheohktt == 'Thuộc sở hữu KH') checked @endif value="Thuộc sở hữu KH" name="diachitheohktt">
                          Thuộc sở hữu KH
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" @if($tt->diachitheohktt == 'Thuê') checked @endif value="Thuê" name="diachitheohktt">
                          Thuê
                        </label>
                        <label style="">
                          <input type="radio" @if($tt->diachitheohktt == 'Nhà của bố mẹ') checked @endif value="Nhà của bố mẹ" name="diachitheohktt">
                          Nhà của bố mẹ
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" @if($tt->diachitheohktt == 'Khác') checked @endif value="Khác" name="diachitheohktt">
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
                          <input type="radio" @if($tt-> diachitheoht == 'Thuộc sở hữu KH') checked @endif name="diachitheoht" value="Thuộc sở hữu KH">
                          Thuộc sở hữu KH
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" @if($tt-> diachitheoht == 'Thuê') checked @endif name="diachitheoht" value="Thuê">
                          Thuê
                        </label>
                        <label style="">
                          <input type="radio" @if($tt-> diachitheoht == 'Nhà của bố mẹ') checked @endif name="diachitheoht" value="Nhà của bố mẹ">
                          Nhà của bố mẹ
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" @if($tt-> diachitheoht == 'Khác') checked @endif name="diachitheoht" value="Khác">
                          Khác
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Quan hệ với Meup 68</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="quanhemeup">
                        <option value="1" @if($tt->quanhemeup == 1) selected @endif>Kh chưa có giao dịch tại Meup 68</option>
                        <option value="2" @if($tt->quanhemeup == 2) selected @endif>Kh đã giao dịch với Meup 68</option>
                        <option value="3" @if($tt->quanhemeup == 3) selected @endif>Kh hiện là CBNV Meup 68</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tên công ty/trường học</label>
                    <div class="col-sm-8">
                      <input type="text" name="tencongty" class="form-control" placeholder="" value="{{$tt->tencongty}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                      <input type="text" name="diachinoilam" class="form-control" placeholder="" value="{{$tt->diachinoilam}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Chức vụ</label>
                    <div class="col-sm-8">
                      <input type="text" name="chucvu" class="form-control" placeholder="" value="{{$tt->chucvu}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Họ tên người đồng vay/bảo lãnh</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="" name="baolanhhoten" value="{{$tt->baolanhhoten}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số CMND</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="baolanhcmnd" placeholder="" value="{{$tt->baolanhcmnd}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày cấp</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" placeholder="" name="baolanhngaycap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nơi cấp</label>
                    <div class="col-sm-8">
                      <input type="text" name="baolanhnoicap" class="form-control" placeholder="" value="{{$tt->baolanhnoicap}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số điện thoại</label>
                    <div class="col-sm-8">
                      <input type="number" name="baolanhsdt" class="form-control" value="{{$tt->baolanhsdt}}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Sác thực</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input @if($tt->baolanhsacthuc == 3 || $tt->baolanhsacthuc == 2) checked @endif type="checkbox" name="baolanhsacthucfb">
                          Facebook
                        </label>
                        <label style="margin-left: 20px">
                          <input @if($tt->baolanhsacthuc == 3 || $tt->baolanhsacthuc == 1) checked @endif type="checkbox" name="baolanhsacthuczalo">
                          Zalo
                        </label>
                      </div>
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
                  @foreach($hoso as $hs)
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số tiền đề nghị vay</label>
                    <div class="col-sm-8">
                      <input type="number" name="sotienvay" class="form-control" placeholder="" value="{{$hs->sotienvay}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thời hạn</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="text" name="songayvay" class="form-control" placeholder="" value="{{$hs->songay}}">
                        <span class="input-group-addon">Tháng</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mục đích vay</label>
                    <div class="col-sm-8">
                      <input type="text" name="mucdichvay" class="form-control" placeholder="" value="{{$hs->mucdichvay}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Hình thức cấp tín dụng</label>
                    <div class="col-sm-8">
                      <div >
                        <label>
                          <input type="radio" @if($hs->hinhthuccaptindung == 'Tín chấp') checked @endif name="hinhthuccaptindung" value="Tín chấp" >
                          Tín chấp
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" @if($hs->hinhthuccaptindung == 'Trả góp') checked @endif name="hinhthuccaptindung" value="Trả góp">
                          Trả góp
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" @if($hs->hinhthuccaptindung == 'Có TSBD') checked @endif name="hinhthuccaptindung" value="Có TSBD">
                          Có TSBD
                        </label>
                      </div>
                    </div>
                  </div>
                  @endforeach
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
                          <input @if($tt->loaitsbd == 'Bất động sản') checked @endif value="Bất động sản" type="radio" name="loaitsbd">
                          Bất động sản
                        </label>
                        <label style="margin-left: 20px">
                          <input @if($tt->loaitsbd == 'Ô tô') checked @endif value="Ô tô" type="radio" name="loaitsbd">
                          Ô tô
                        </label>
                        <label style="">
                          <input @if($tt->loaitsbd == 'Xe máy') checked @endif value="Xe máy" type="radio" name="loaitsbd">
                          Xe máy
                        </label>
                      </div>
                      <label class="col-sm-2 control-label">Khác</label>
                      <div class="col-sm-10 ">
                        <input type="text" class="form-control" name="loaikhac" placeholder="" value="{{$tt->loaikhac}}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mô tả TSBĐ</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input value="Chính chủ" type="radio" name="motatheotsbd" @if($tt->motatheotsbd == 'Chính chủ') checked @endif>
                          Chính chủ
                        </label>
                        <label style="margin-left: 20px">
                          <input value="Không chính chủ" type="radio" name="motatheotsbd" @if($tt->motatheotsbd == 'Không chính chủ') checked @endif>
                          Không chính chủ
                        </label>
                      </div>
                      <textarea class="form-control" name="motatsbd" rows="3" placeholder="Mô tả ...">{{$tt->motatsbd}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Giá trị định giá TSBĐ</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="giatridinhgia" placeholder="" value="{{$tt->giatridinhgia}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tỷ lệ cho vay/giá trị định giá</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="tylechovay" placeholder="" value="{{$tt->tylechovay}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thu nhập</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="thunhap">
                        <option value="1" @if($tt->thunhap == 1) selected @endif>Dưới 10tr</option>
                        <option value="2" @if($tt->thunhap == 2) selected @endif>Dưới 15tr</option>
                        <option value="3" @if($tt->thunhap == 3) selected @endif>Trên 15tr</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thu nhập cụ thể</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="thunhapcuthe" placeholder="" value="{{$tt->thunhapcuthe}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số người phụ thuộc</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="songuoiphuthuoc" placeholder="" value="{{$tt->songuoiphuthuoc}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Hình thức nhận thu nhập</label>
                    <div class="col-sm-8">
                      <select name="hinhthucnhanthunhap" class="form-control">
                        <option value="1" @if($tt->hinhthucnhanthunhap) selected @endif>Hàng ngày</option>
                        <option value="2" @if($tt->hinhthucnhanthunhap) selected @endif>Hàng tuần</option>
                        <option value="3" @if($tt->hinhthucnhanthunhap) selected @endif>Nửa tháng</option>
                        <option value="4" @if($tt->hinhthucnhanthunhap) selected @endif>Hàng tháng</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mô tả và đánh giá về KH</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="motakh" placeholder="" value="{{$tt->motakh}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mô tả và đánh giá về gia đình KH</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="{{$tt->motagdkh}}" name="motagdkh" placeholder="">
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
                      <input type="text" name="chamdiem" class="form-control" placeholder="" value="{{$tt->chamdiem}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Kết quả CIC</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input value="Chưa có dư nợ" type="radio" name="ketquacic" @if($tt->ketquacic == 'Chưa có dư nợ') checked @endif>
                          Chưa có dư nợ
                        </label>
                        <label style="margin-left: 20px">
                          <input value="Đã có dư nợ" type="radio" name="ketquacic" @if($tt->ketquacic == 'Đã có dư nợ') checked @endif>
                          Đã có dư nợ
                        </label>
                      </div>
                      <label class="col-sm-3 control-label">Dư nợ</label>
                      <div class="col-sm-9 ">
                        <input type="text" class="form-control" name="duno" placeholder="" value="{{$tt->duno}}"> 
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tại tổ chức tín dụng(nếu có)</label>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" >Nợ sấu</label>
                      <div class="col-sm-8 ">
                        <input type="text" class="form-control"  style="margin-bottom: 10px" placeholder="" name="nosau" value="{{$tt->nosau}}">
                      </div>
                      <label class="col-sm-4 control-label">Nhóm nợ</label>
                      <div class="col-sm-8 ">
                        <input type="text" class="form-control" name="nhomno" placeholder="" value="{{$tt->nhomno}}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tổng thu nhập hàng tháng(1)</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="" name="thunhap1" value="{{$tt->thunhap1}}">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tổng nợ phải trả hàng tháng(2)</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" name="thunhap2" value="{{$tt->thunhap2}}" class="form-control" placeholder="">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Chi phí sinh hoạt hàng tháng(3)</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" name="thunhap3" value="{{$tt->thunhap3}}" class="form-control" placeholder="">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thu nhập tích lũy còn lại để trả nợ(4)<p class="help-block">(4=1-2-3)</p></label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="" name="thunhap4" value="{{$tt->thunhap4}}">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Tỉ lệ nợ/thu nhập(5)<p class="help-block">(5=2/1)*%</p></label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" name="thunhap5" value="{{$tt->thunhap5}}" class="form-control" placeholder="">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Đánh giá về khả năng trả nợ của khác hàng</label>
                    <div class="col-sm-8">
                      <input type="text" name="danhgiatrano" class="form-control" placeholder="" value="{{$tt->danhgiatrano}}">
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
                          <input type="radio" name="desuat" @if($hs->desuat == 'Đề suất kết nối hồ sơ') checked @endif value="Đề suất kết nối hồ sơ">
                          Đề suất kết nối hồ sơ
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="desuat" @if($hs->desuat == 'Từ chối') checked @endif value="Từ chối">
                          Từ chối
                        </label>
                      </div>
                    </div>
                  </div>
                  @foreach($hoso as $hs)
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số tiền</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" class="form-control" name="danhgiasotienvay" value="{{$hs->danhgiasotienvay}}" placeholder="">
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
                        <input type="number" class="form-control" placeholder="" name="texttinchap" value="{{$hs->texttinchap}}">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                        <label >
                          <input type="checkbox" name="boxduatrentsbd">
                          Dựa trên TSBĐ
                        </label>
                      </div>
                      <div class="input-group">
                        <input type="number" name="textduatrentsbd" class="form-control" placeholder="" value="{{$hs->textduatrentsbd}}">
                        <span class="input-group-addon">VNĐ</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Thời hạn vay vốn</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" name="thoihanvayvon" class="form-control" value="{{$hs->thoihanvayvon}}">
                        <span class="input-group-addon">Tháng</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Hình thức giải ngân</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input @if($hs->giaingan == 'Tiền mặt') checked @endif type="radio" name="giaingan" value="Tiền mặt">
                          Tiền mặt
                        </label>
                        <label style="margin-left: 20px">
                          <input @if($hs->giaingan == 'Chuyển khoản') checked @endif type="radio" name="giaingan" value="Chuyển khoản">
                          Chuyển khoản
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Giấy tờ gốc</label>
                    <div class="col-sm-8">
                      <div class="checkbox">
                        <label>
                          <input type="radio" name="giaytogoc" value="CMND/Căn cước/Hộ chiếu" @if($hs->giaytogoc) checked @endif>
                          CMND/Căn cước/Hộ chiếu
                        </label>
                        <label style="margin-left: 20px">
                          <input type="radio" name="giaytogoc" value="Sổ hộ khẩu" @if($hs->giaytogoc) checked @endif>
                          Sổ hộ khẩu
                        </label>
                      </div>
                    </div>
                  </div>
                  @endforeach
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
      @endforeach
      <!-- /.row -->
    </section>
    <section class="content-header">
    </section>
  </div>
<script type="text/javascript">
dem = 0;
setTimeout(function() {
    $('#delay3s').fadeOut('fast');
}, 2000);
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
