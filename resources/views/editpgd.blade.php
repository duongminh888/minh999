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
                <a href="{{url('themphonggiaodich')}}">
                  <button type="button" class="btn-box-tool btn"><i class="fa  fa-check"></i> Thêm phòng giao dịch</button>
                </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table class="table table-condensed">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Tên</th>
                  <th>Giám đốc</th>
                  <th>Địa chỉ</th>
                  <th></th>
                </tr>
                @foreach($phonggiaodich as $pgd)
                <tr>
                  <td>{{$pgd->id}}</td>
                  <td>{{$pgd->name}}</td>
                  <td>
                    @foreach($user as $us)
                      @if($us->id==$pgd->giamdoc)
                      <a href="{{url('profile')}}/{{$us->name}}">
                        {{$us->name}}
                      </a>
                      @endif
                    @endforeach
                  </td>
                  <td>{{$pgd->diachi}}</td>
                  <td>
                    <div class="btn-group" style="width: 85px">
                      <a href="{{url('editpgd')}}/{{$pgd->id}}"  style="width: 40px;float: left;">
                        <button type="button" class="btn btn-block btn-default"><i class="fa  fa-pencil"></i></button>
                      </a>
                    </div>
                  </td>
                </tr>
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
<script type="text/javascript"></script>
@include('teamplte.footer')
