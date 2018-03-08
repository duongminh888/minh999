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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Phòng giao dịch</h3>
              <div class="box-tools">
                @if(Auth::user()->rule < 3)
                <button type="button" id="nutbam" class="btn-box-tool btn" onclick="taban()"><i class="fa  fa-check"></i> Thêm phòng giao dịch</button>
                @endif
              </div>
            </div>
            @if ( session()->has('message') )
                            <div id="delay3s" class="alert alert-success alert-dismissible" style="    background-color: #00a65a !important;">
                              <b><i class="icon fa fa-check"></i> Thông báo!</b> {{ session()->get('message') }}
                            </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body " id="pgd">
              <table class="table table-condensed">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Tên</th>
                  <th>Giám đốc</th>
                  <th>Địa chỉ</th>
                  @if(Auth::user()->rule < 3)
                  <th></th>
                  @endif
                </tr>
                @foreach($phonggiaodich as $pgd)
                <tr>
                  <td id="id{{$pgd->id}}">{{$pgd->id}}</td>
                  <td><a href="{{url('pgd')}}/{{$pgd->id}}"  id="name{{$pgd->id}}">{{$pgd->name}}</a></td>
                  <td>
                    @foreach($user as $us)
                      @if($us->id==$pgd->giamdoc)
                      <a href="{{url('profile')}}/{{$us->name}}" id="giamdoc{{$pgd->id}}">{{$us->hoten}}(<span style="color: #000">{{$us->name}}</span>)</a>
                      <p style="display: none;" id="idgiamdoc{{$pgd->id}}">{{$us->id}}</p>
                      @endif
                    @endforeach
                  </td>
                  <td id="diachi{{$pgd->id}}">{{$pgd->diachi}}</td>
                  @if(Auth::user()->rule < 3)
                  <td>
                    <div class="btn-group" style="width: 85px">
                      <span style="width: 40px;float: right;">
                        <button type="button" class="btn btn-block btn-default" onclick="editpgd({{$pgd->id}})"><i class="fa  fa-pencil"></i></button>
                      </span>
                    </div>
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody></table>
            </div>
            @if(Auth::user()->rule < 3)
            <div class="box-body " id="form1"  style="display: none;">
              <form class="form-horizontal" role="form" method="post" action="{{route('addpgd')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Tên phòng giao dịch</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="" value="" name="tenpgd">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Giám đốc</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="giamdoc">
                        @foreach($user as $uss)
                        @if($uss->rule>4)
                        <option value="{{$uss->id}}">{{$uss->name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="" value="" name="diachi">
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" style="float: right;">Hoàn thành</button>
                </div>
              </form>
            </div>
            @endif
            <!-- /.box-body -->
          </div>
        </div>
        @if(Auth::user()->rule < 3)
        <div class="col-md-6" style="display: none;" id="formsua">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Chỉnh sửa PGD: <span id="tenpgd" style="color: red;font-weight: bold;"></span></h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-danger btn-sm" onclick="dongtab()">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body ">
              <form class="form-horizontal" role="form" method="post" action="{{route('editpgd')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="idinput" value="">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Tên phòng giao dịch</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="" value="" name="tenpgd" id="inputtenpgd">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Giám đốc</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="giamdoc" id="selectinput">
                        @foreach($user as $uss)
                        @if($uss->rule>4)
                        <option value="{{$uss->id}}" id="op{{$uss->id}}">{{$uss->name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="" value="" name="diachi" id="inputdiachi">
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
        </div>
        @endif
      </div>
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
  var dem =0;
  var dem1 =0;
  function editpgd(id) {
    var idpgd = document.getElementById('id'+id).innerHTML;
    var name = document.getElementById('name'+id).innerHTML;
    var diachi = document.getElementById('diachi'+id).innerHTML;
    var giamdoc = document.getElementById('idgiamdoc'+id).innerHTML;
    if (dem1==0) {
      dem1 = 1;
      document.getElementById('formsua').style.display='block';
    }
    document.getElementById('idinput').value = idpgd;
    document.getElementById('inputtenpgd').value = name;
    document.getElementById('tenpgd').innerHTML = name;
    document.getElementById('inputdiachi').value = diachi;
    document.getElementById("selectinput").value = giamdoc;
  }
  function dongtab() {
    if (dem1==1) {
      document.getElementById('formsua').style.display='none';
      dem1=0;
    }
  }
setTimeout(function() {
    $('#delay3s').fadeOut('fast');
}, 2000);
  function taban() {
    if (dem == 0) {
      document.getElementById("pgd").style.display = "none";
      document.getElementById("form1").style.display = "block";
      document.getElementById("nutbam").innerHTML = "<i class='fa fa-chevron-left'></i> Back";
      dem = 1;
    }else if(dem==1){
      document.getElementById("pgd").style.display = "block";
      document.getElementById("form1").style.display = "none";
      document.getElementById("nutbam").innerHTML = "<i class='fa fa-edit'></i> Thêm phòng giao dịch";
      dem =0;
    }
  }
</script>
@include('teamplte.footer')
