<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liên hệ - Meup68</title>
    <link rel="icon" type="image/png" href="{{url('public')}}/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{url('public')}}/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('public')}}/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/css/style.css">
</head>

<body>

    <head>
        <div class="container">
            <nav class="nav-desktop">
                <div class="header-logo"><span class="helper"></span><a href=""><img src="{{url('public')}}/images/logo.png" alt=""></a></div>
                <div class="nav-sublink">
                    <a href="{{url('')}}/gioithieu">Giới thiệu</a>
                    <a href="{{url('')}}/help">Trợ giúp</a>
                    <a href="{{url('')}}/login">Đăng nhập</a>
                </div>
                <div class="nav-tab">
                    <ul>
                        <li id="borrow">VAY
                            <ul class="nav-content tabvay">
                                <li>
                                    <a href="">Vay tín chấp
                                    <p>Vay tới 80 triệu đồng - chỉ cần CMND và SHK.</p>
                                </a>
                                </li>
                                <li>
                                    <a href="">Vay theo đăng ký xe
                                    <p>Vay tiền mặt - đơn giản chỉ cần đăng ký xe.</p>
                                </a>
                                </li>
                                <li>
                                    <a href="">Vay kinh doanh
                                    <p>Gói vay kinh doanh với lãi suất cực ưu đãi.</p>
                                </a>
                                </li>
                                <li>
                                    <a href="">Vay trả góp
                                    <p>Vay trả góp đơn giản, có áp dụng cho sinh viên.</p>
                                </a>
                                </li>
                            </ul>
                        </li>
                        <li>|</li>
                        <li id="invest">ĐẦU TƯ
                            <ul class="nav-content tabdautu">
                                <li>
                                    <a href="">Cá nhân
                                    <p>Dành cho những nhà đầu tư cá nhân.</p>
                                </a>
                                </li>
                                <li>
                                    <a href="">Tổ chức
                                    <p>Dành cho những công ty, tổ chức, hiệp hội,...</p>
                                </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <nav class="navbar navbar-default float-panel nav-mobile" role="navigation" data-top="0" data-scroll="300">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href=""><img src="{{url('public')}}/images/Logo.png" alt=""></a>
                    <div class="col-xs-6 no-pdr">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="col-xs-6 no-pdl">
                        <div class="search" data-toggle="collapse" data-target=".navbar-ex1-search">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-search" id="mobile-search">
                    <form class="navbar-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a class="activelink" href="index.html">Trang chủ</a></li> -->
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="big-font">
                            Vay <i class="fa fa-angle-down angle-desktop"></i>
                        </a>
                            <span class="dropdown-angle angle-mobile" data-toggle="dropdown">
                            <i class="fa fa-angle-down"></i>
                        </span>
                            <ul class="dropdown-menu">
                                <li><a href="">Vay tín chấp</a></li>
                                <li><a href="">Vay theo đăng ký xe</a></li>
                                <li><a href="">Vay kinh doanh</a></li>
                                <li><a href="">Vay có tài sản bảo đảm</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="big-font">
                            Đầu tư <i class="fa fa-angle-down angle-desktop"></i>
                        </a>
                            <span class="dropdown-angle angle-mobile" data-toggle="dropdown">
                            <i class="fa fa-angle-down"></i>
                        </span>
                            <ul class="dropdown-menu">
                                <li><a href="">Cá nhân</a></li>
                                <li><a href="">Tổ chức</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('')}}/help">Trợ giúp</a></li>
                        <li><a href="{{url('')}}/gioithieu">Giới thiệu</a></li>
                        <li><a href="{{url('')}}/lienhe">Liên hệ</a></li>
                        <li class="dropdown" id="search2"><a href=""><i class="fa fa-search"></i></a>
                            <ul class="dropdown-menu" style="background: rgba(255,255,255,.8);">
                                <li>
                                    <form class="navbar-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li><a href="">Đăng nhập</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <nav class="nav-second">
            <a href="{{url('')}}/gioithieu" class="ns-active">Công ty</a>
            <a href="{{url('')}}/tuyendung">Tuyển dụng</a>
            <a href="{{url('')}}/lanhdao">Ban lãnh đạo</a>
            <a href="{{url('')}}/lienhe">Liên hệ</a>
        </nav>
    </head>
    <main>
        <div class="container mgt mgb">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Liên hệ với chúng tôi</h4>
                    <p>Cảm ơn bạn đã quan tâm đến Meup68.</p>
                    <p>Nếu có bất kỳ thắc mắc hoặc ý kiến đóng góp cũng như các yêu cầu khác, xin vui lòng gửi thông điệp của bạn tại đây. Chúng tôi sẽ cố gắng liên hệ với bạn sớm nhất có thể.</p>
                    <p>Chúc bạn một ngày tốt lành.</p>
                    <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2526456004935!2d105.79121621449062!3d20.982507394732558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135accf61c1254d%3A0xaa46be71caee0d0e!2zNjIgQ2hp4bq_biBUaOG6r25nLCBWxINuIFF1w6FuLCBIw6AgxJDDtG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1514533685011" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-area">
                        <form role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="SĐT" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Chủ đề" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" type="textarea" id="message" placeholder="Nội dung" rows="7"></textarea>
                            </div>
                            <button type="button" name="submit" class="btn-submit"><span>Gửi đi</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-green">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="footer-logo"><img src="{{url('public')}}/images/logo-meup-white.png" alt=""></div>
                        <h4>CÔNG TY CỔ PHẦN MEUP68</h4>
                        <p><span class="lb-info">Trụ sở - PGD:</span> 62 Chiến Thắng, Văn Quán, Hà Đông, Hà Nội </p>
                        <p><span class="lb-info">Tổng đài hỗ trợ khách hàng: </span>1900 0082</p>
                        <p><span class="lb-info">Thời gian làm việc: </span>8h30 - 20h00 từ thứ 2 đến thứ 6 | 8h30 đến 12h00 thứ 7</p>
                        <h5>PGD Thanh Xuân</h5>
                        <p>132 Nguyễn Lân - Thanh Xuân - Hà Nội</p>
                        <h5>PGD Hoàng Mai</h5>
                        <p>219A Ngõ 35 Nguyễn An Ninh - Hoàng Mai - Hà Nội</p>
                        <h5>PGD Xã Đàn</h5>
                        <p>86/360 Xã Đàn - Đống Đa - Hà Nội</p>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col-sm-6 copyright">
                        © 2017 MEUP68 | All rights reserved.
                    </div>
                    <div class="col-sm-6">
                        <div class="social">
                            <a href=""><i class="fa fa-facebook-official"></i></a>
                            <a href=""><i class="fa fa-twitter-square"></i></a>
                            <a href=""><i class="fa fa-youtube"></i></a>
                            <a href=""><i class="fa fa-skype"></i></a>
                            <a href=""><i class="fa fa-envelope"></i></a>
                            <a href=""><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="{{url('public')}}/js/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/js/float-panel.js"></script>
    <script type="text/javascript" src="{{url('public')}}/js/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/js/swiper.min.js"></script>
    <script type="text/javascript" src="{{url('public')}}/js/index.js"></script>
    
</body>

</html>