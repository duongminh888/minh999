<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giới thiệu - Meup68</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('')}}/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/css/style.css">
</head>

<body>

    <head>
        <div class="container">
            <nav class="nav-desktop">
                <div class="header-logo"><span class="helper"></span><a href="index"><img src="{{url('')}}/images/logo.png" alt=""></a></div>
                <div class="nav-sublink">
                    <a href="gioithieu">Giới thiệu</a>
                    <a href="help">Trợ giúp</a>
                    <a href="login">Đăng nhập</a>
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
                    <a class="navbar-brand" href="index.html"><img src="{{url('')}}/images/Logo.png" alt=""></a>
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
        <div class="big-banner-gt wow fadeIn" data-wow-duration="1">
            <div class="container">
                <div class="text-title">
                    Giúp người Việt
                    <br> đạt được mục tiêu tài chính
                </div>
            </div>
        </div>
        <div class="big-title2">Cam kết của chúng tôi</div>
        <div class="container">
            <div class="commit-container">
            <div class="commit">
                <h3>Tái tạo tín dụng và đầu tư</h3>
                <p>Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit. Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit.</p>
            </div>
            <div class="commit">
                <h3>Làm những điều đúng đắn</h3>
                <p>Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit. Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit.</p>
            </div>
            <div class="commit">
                <h3>Cung cấp trải nghiệm mới mẻ, tin cậy</h3>
                <p>Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit. Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit.</p>
            </div>
            <div class="commit">
                <h3>Tạo điều kiện tối đa</h3>
                <p>Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit. Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit.</p>
            </div>
            </div>
        </div>
        <div class="big-title2">Thành tựu đã đạt được</div>
        <div class="container mgb">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <p class="format-text">Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit. Lorem ipsum dolor sit amet, eu nemore facilisis intellegam sit, an mei suscipit pericula, vel te iusto everti delenit.</p>
                </div>
            </div>
        </div>
        <div class="big-banner-job wow fadeIn" data-wow-duration="1">
            <div class="container">
                <div class="text-title">
                    Cơ hội nghề nghiệp
                    <br> tại Meup68
                </div>
                <div class="text-in-banner">
                    We put our customers at the center of everything we do, empowering millions of people to meet their financial goals. Working in highly collaborative, agile teams, we’re defining a new industry. At LendingClub, you’ll have lots of opportunities to contribute, innovate, and advance.
                </div>
                <button class="btn-in-banner"><span>Tham gia ngay</span></button>
            </div>
        </div>
    </main>
    <footer class="bg-green">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="footer-logo"><img src="images/logo-meup-white.png" alt=""></div>
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
    <script type="text/javascript" src="{{url('')}}/js/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/float-panel.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/swiper.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/js/index.js"></script>
    
</body>

</html>