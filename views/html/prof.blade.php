<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>윌비스 통합 사이트</title>

    <!-- CSS -->
    <!-- Bootstrap -->
    <link href="/public/vendor/bootstrap/v.3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="/public/vendor/bootstrap/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/public/vendor/bootstrap/progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/public/vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/public/vendor/iCheck/skins/flat/blue.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="/public/vendor/datatables/v.1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/public/vendor/datatables/buttons/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/public/vendor/datatables/colreorder/css/colReorder.bootstrap.min.css" rel="stylesheet">
    <link href="/public/vendor/datatables/rowreorder/css/rowReorder.bootstrap.min.css" rel="stylesheet">
    <link href="/public/vendor/datatables/keytable/css/keyTable.bootstrap.min.css" rel="stylesheet">
    <link href="/public/vendor/datatables/select/css/select.bootstrap.min.css" rel="stylesheet">
    <link href="/public/vendor/datatables/responsive/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="/public/vendor/fullcalendar/fullcalendar.min.css" rel="stylesheet">
    <link href="/public/vendor/fullcalendar/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- PNotify -->
    <link href="/public/vendor/pnotify/pnotify.css" rel="stylesheet">
    <link href="/public/vendor/pnotify/pnotify.buttons.css" rel="stylesheet">
    <link href="/public/vendor/pnotify/pnotify.nonblock.css" rel="stylesheet">
    <!-- magnific-popup -->
    <link href="/public/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/public/vendor/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/public/css/front/basic.css" rel="stylesheet">
    <link href="/public/css/front/style.css" rel="stylesheet">
    <!--/ CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
    <script>
        WebFont.load({
            custom: {
            families: ['notosanskr']
            }
        });
    </script>
    <!--/ Webfont -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type='text/javascript'>
        //GNB 버튼 Script
        $(function() {
            $('.toggle-Btn a').click(function() {
                if( $("#Gnb").hasClass("Gnb-md") ) {
                    $(".NSK.Gnb-md").attr('class','NSK Gnb-sm');
                    $(".toggle-Btn").attr('class','toggle-Btn gnb-Open');
                    $(".toggle-Btn .Txt").text('열기');
                    $("#Gnb .logo img").attr('src','/public/img/front/gnb/logo_sm.gif')
                    $("#Gnb .setting img").attr('src','/public/img/front/gnb/icon_setting_sm.gif');
                    $("#Gnb .intro img").attr('src','/public/img/front/gnb/icon_intro_sm.gif');
                }
                else
                {
                    $(".NSK.Gnb-sm").attr('class','NSK Gnb-md');
                    $(".toggle-Btn").attr('class','toggle-Btn gnb-Close');
                    $(".toggle-Btn .Txt").text('숨김');
                    $("#Gnb .logo img").attr('src','/public/img/front/gnb/logo.gif');
                    $("#Gnb .setting img").attr('src','/public/img/front/gnb/icon_setting.gif');
                    $("#Gnb .intro img").attr('src','/public/img/front/gnb/icon_intro.gif');
                }
            });
        });
        // 로그인폼 Depth Script
        $(function() {
            $('.loginDepth .myLog .joinUs').hover(function() {
                if( $(".joinUs-Box").is(":hidden") ) {
                    $(".joinUs-Box").fadeIn(200);
                }
                else
                {
                    $(".joinUs-Box").fadeOut(200);
                }
            });
        });
        $(function() {
            $('.loginDepth .myLog .myPage').hover(function() {
                if( $(".myPage-Box").is(":hidden") ) {
                    $(".myPage-Box").fadeIn(200);
                }
                else
                {
                    $(".myPage-Box").fadeOut(200);
                }
            });
        });

        $(function() {
            //ACCORDION BUTTON ACTION
            $('div.gnb-List-Tit').click(function() {
                
                $(this).siblings('.active')
                    .removeClass('active')

                if($(this).next().is(':visible')) {
                    $('div.gnb-List-Depth').slideUp('normal');
                    $(this).removeClass("active");

                } else {
                    $('div.gnb-List-Depth').slideUp('normal');    
                    $(this).next().slideDown('normal');
                    $(this).addClass("active"); 

                }
            });
        });

        // 닫기 Script
        function closeWin(divID) {
            document.getElementById(divID).style.display = "none";
        }
        // 열기 Script
        function openWin(divID) {
            document.getElementById(divID).style.display = "block";  
        }
    </script>
</head> 

<body>

<!-- Gnb -->
<div id="Gnb" class="NSK Gnb-md">
    <div class="toggle-Btn gnb-Close">
        <a href="#none">
            <div class="Txt c_both">숨김</div><span class="arrow-Btn">></span>
        </a>
    </div>
    <div class="logo">
        <img src="/public/img/front/gnb/logo.gif">
    </div>
    <h1>
        <img src="/public/img/front/gnb/icon_willbes2.gif">경찰
    </h1>
    <h4>
        <ul>
            <li class="active">
                <a href="#none">일반경찰</a>
            </li>
            <li>
                <a href="#none">경행경채</a>
            </li>
            <li>
                <a href="#none">경찰승진</a>
            </li>
            <li>
                <a href="#none">경찰간부</a>
            </li>
            <li class="Acad">
                <a class="willbes-Acad-Tit" href="#none">경찰학원</a>
                <dl class="sns-Btn">
                    <dt>
                        <a href="#none">
                            <img src="/public/img/front/gnb/icon_facebook.gif">
                        </a>
                    </dt>
                    <dt>
                        <a href="#none">
                            <img src="/public/img/front/gnb/icon_linkedin.gif">
                        </a>
                    </dt>
                    <dt>
                        <a href="#none">
                            <img src="/public/img/front/gnb/icon_twitter.gif">
                        </a>
                    </dt>
                </dl>
            </li>
        </ul>
    </h4>
    <div class="gnb-List">
        <div class="gnb-List-Tit">
            <a href="#none">
                <div class="willbes-icon_sm">
                    <img src="/public/img/front/gnb/icon_willbes1_sm.gif">
                </div>
                <span class="Txt">공무원<span class="arrow-Btn">></span></span>
            </a>
        </div>
        <div class="gnb-List-Depth"> 
            <dl>
                <dt>
                    <a href="#none">9급공무원</a>
                </dt>
                <dt>
                    <a href="#none">7급공무원</a>
                </dt>
                <dt>
                    <a href="#none">세무/관세</a>
                </dt>
                <dt>
                    <a href="#none">법원직</a>
                </dt>
            </dl>
        </div>

        <div class="gnb-List-Tit">
            <a href="#none">
                <div class="willbes-icon_sm">
                    <img src="/public/img/front/gnb/icon_willbes2_sm.gif">
                </div>
                <span class="Txt">경찰<span class="arrow-Btn">></span></span>
            </a> 
        </div>
        <div class="gnb-List-Depth">            
            <dl>
                <dt>
                    <a href="#none">일반경찰</a>
                </dt>
                <dt>
                    <a href="#none">경행경채</a>
                </dt>
                <dt>
                    <a href="#none">경찰승진</a>
                </dt>
                <dt>
                    <a href="#none">경찰간부</a>
                </dt>
            </dl>
        </div>

        <div class="gnb-List-Tit">
            <a href="#none">
                <div class="willbes-icon_sm">
                    <img src="/public/img/front/gnb/icon_willbes3_sm.gif">
                </div>
                <span class="Txt">교원임용<span class="arrow-Btn">></span></span>
            </a>
        </div>
        <div class="gnb-List-Depth"></div>

        <div class="gnb-List-Tit">
            <a href="#none">
                <div class="willbes-icon_sm">
                    <img src="/public/img/front/gnb/icon_willbes4_sm.gif">
                </div>
                <span class="Txt">고등고시<span class="arrow-Btn">></span></span>
            </a>
        </div>
        <div class="gnb-List-Depth"></div>

        <div class="gnb-List-Tit">
            <a href="#none">
                <div class="willbes-icon_sm">
                    <img src="/public/img/front/gnb/icon_willbes5_sm.gif">
                </div>
                <span class="Txt">저문자격증<span class="arrow-Btn">></span></span>
            </a>
        </div>
        <div class="gnb-List-Depth"></div>

        <div class="gnb-List-Tit">
            <a class="willbes-Tit" href="#none">
                <div class="willbes-icon_sm">
                    <img src="/public/img/front/gnb/icon_willbes6_sm.gif">
                </div>
                <span class="Txt">자격증<span class="arrow-Btn">></span></span>
            </a>
        </div>
        <div class="gnb-List-Depth"></div>

        <div class="gnb-List-Tit">
            <a href="#none">
                <div class="willbes-icon_sm">
                    <img src="/public/img/front/gnb/icon_willbes7_sm.gif">
                </div>
                <span class="Txt">취업<span class="arrow-Btn">></span></span>
            </a>
        </div>
        <div class="gnb-List-Depth"></div>

        <div class="gnb-List-Tit">
            <a class="willbes-Tit" href="#none">
                <div class="willbes-icon_sm">
                    <img src="/public/img/front/gnb/icon_willbes8_sm.gif">
                </div>
                <span class="Txt">어학<span class="arrow-Btn">></span></span>
            </a>
        </div>
        <div class="gnb-List-Depth"></div>
    </div>
    
    <ul class="gnb-List-Sub p_re">
        <li>
            <a class="setting" href="#none" onclick="openWin('SettingForm')">
                <img src="/public/img/front/gnb/icon_setting.gif">
                <div class="Txt">통합사이트<br/>환경설정</div>
            </a>
            <!-- willbes Setting -->
            <div id="SettingForm" class="Layer-Box" style="display: none">
                <a class="closeBtn" href="#none" onclick="closeWin('SettingForm')">
                    <img src="/public/img/front/gnb/close.png">
                </a>
                <div class="Layer-Tit tx-dark-black bdb-black2 NSK">
                    윌비스 통합 <span class="tx-dark-blue">사이트 환경설정</span>
                </div>
                <div class="Layer-Login GM tx-left">
                    <div class="chkBox-Save">
                        <div class="tx-gray">
                            <strong>추후 접속 시 현재 페이지를</strong>
                        </div>
                        <span>
                            <input type="checkbox" id="PAGE_SAVE" name="PAGE_SAVE" class="iptSave">
                            <label for="PAGE_SAVE" class="labelSave tx-gray">시작페이지로</label>
                        </span>
                        <span>
                            <input type="checkbox" id="BOOKMARK_SAVE" name="BOOKMARK_SAVE" class="iptSave">
                            <label for="BOOKMARK_SAVE" class="labelSave tx-gray">즐겨찾기로</label>
                        </span>
                    </div>

                    <div class="chkBox-Save">
                        <div class="tx-gray">
                            <strong>추후 접속 시 윌비스 통합 네비게이션 영역을</strong>
                        </div>
                        <span>
                            <input type="radio" id="FOLD_SAVE" name="FOLD_SAVE" class="iptSave">
                            <label for="FOLD_SAVE" class="labelSave tx-gray">숨김</label>
                        </span>
                        <span>
                            <input type="radio" id="UNFOLD_SAVE" name="UNFOLD_SAVE" class="iptSave">
                            <label for="UNFOLD_SAVE" class="labelSave tx-gray">펼침</label>
                        </span>
                    </div>
                </div>
                <div class="Layer-Btn NSK widthAuto320">
                    <span>
                        <button type="submit" onclick="" class="cf-Btn bg-dark-gray bd-gray">
                            <span>닫기</span>
                        </button>
                    </span>
                    <span>
                        <button type="submit" onclick="" class="cf-Btn bg-blue bd-dark-blue">
                            <span>적용</span>
                        </button>
                    </span>
                </div>
            </div>
            <!-- End willbes Setting -->
        </li>
        <li>
            <a class="intro" href="#none">
                <img src="/public/img/front/gnb/icon_intro.gif">
                <div class="Txt">윌비스<br/>회사소개</div>
            </a>
        </li>
    </ul>
</div> 
<!-- End Gnb --> 

<!-- Header -->
<div id="Header" class="NSK c_both">
    <div class="widthAuto">
        <div class="loginDepth p_re">
            <ul class="myLog">
                <li class="Login">
                    <a class="Tit" href="#none" onclick="openWin('LoginForm')">로그인</a>
                </li>
                <li class="joinUs">
                    <a class="Tit" href="#none">회원가입<span class="arrow-Btn">></span></a>
                    <div class="drop-Box joinUs-Box">
                        <ul>
                            <li>
                                <a href="#none">아이디찾기</a>
                            </li>
                            <li>
                                <a href="#none">비밀번호 찾기</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="myCart">
                    <a class="Tit" href="#none">장바구니</a>
                </li>
                <li class="myPage">
                    <a class="Tit" href="#none">내강의실<span class="arrow-Btn">></span></a>
                    <div class="drop-Box myPage-Box">
                        <ul>
                            <li>
                                <a href="#none">수강중인 강의</a>
                            </li>
                            <li>
                                <a href="#none">PASS 강의</a>
                            </li>
                            <li>
                                <a href="#none">배송조회</a>
                            </li>
                            <li>
                                <a href="#none">새쪽지 <span class="num-New">99+</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="csCenter">
                    <a class="Tit" href="#none">고객센터</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Header -->

<!-- LoginForm -->
<div id="LoginForm" class="Layer-Box" style="display: none">
    <a class="closeBtn" href="#none" onclick="closeWin('LoginForm')">
        <img src="/public/img/front/gnb/close.png">
    </a>
    <div class="Layer-Tit tx-dark-black NSK">
        윌비스 통합 <span class="tx-dark-blue">로그인</span>
    </div>
    <div class="Layer-Login GM widthAuto320">
        <div class="inputBox p_re">
            <label for="USER_ID" class="labelId" style="display: block;">ID</label>
            <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
        </div>
        <div class="inputBox p_re">
            <label for="USER_PWD" class="labelPwd" style="display: block;">비밀번호</label>
            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" maxlength="30">
        </div>
        <div class="tx-red" style="display: block;">아이디 또는 비밀번호가 일치하지 않습니다.</div>
        <div class="chkBox-Save">
            <input type="checkbox" id="USER_ID_SAVE" name="USER_ID_SAVE" class="iptSave">
            <label for="USER_ID_SAVE" class="labelSave tx-gray">아이디 저장</label>
        </div>
        <div class="Layer-Btn NSK widthAuto320">
            <button type="submit" onclick="" class="log-Btn bg-blue bd-dark-blue">
                <span>로그인</span>
            </button>
        </div>
        <ul class="btn-Txt tx-dark-black">
            <li>
                <span><a class="tx-dark-black" href="#none">아이디</a>/<a class="tx-dark-black" href="#none">비밀번호찾기</a><span class="row-line">|</span></span>
            </li>
            <li>
                <span><a class="tx-dark-blue" href="#none">회원가입</a></span>
            </li>
        </ul>
    </div>
</div>
<!-- End LoginForm -->

<!-- Container -->
<div id="Container" class="subContainer NSK widthAuto c_both">
    <div class="Menu c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li>
                    <a href="#none">패키지</a>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <span>홈 이미지</span> > 
        <span>교수진소개</span>
    </div>
    <div class="Lnb">
        <h2>교수진 소개</h2>
        <ul class="lnb-List">
            <li class="active">
                <a href="#none">국어</a>            
                <dl>
                    <dt>
                        <a href="#none">정채영</a>
                    </dt>
                    <dt>
                        <a href="#none">기미진</a>
                    </dt>
                    <dt>
                        <a href="#none">김세령</a>
                    </dt>
                    <dt>
                        <a href="#none">오대혁</a>
                    </dt>
                </dl>
            </li>
            <li>
                <a href="#none">영어</a>            
                <dl>
                    <dt>
                        <a href="#none">한덕현</a>
                    </dt>
                    <dt>
                        <a href="#none">김쌤</a>
                    </dt>
                    <dt>
                        <a href="#none">성기건</a>
                    </dt>
                    <dt>
                        <a href="#none">헤더진</a>
                    </dt>
                    <dt>
                        <a href="#none">제니</a>
                    </dt>
                    <dt>
                        <a href="#none">이리라</a>
                    </dt>
                    <dt>
                        <a href="#none">곽지영</a>
                    </dt>
                    <dt>
                        <a href="#none">김영</a>
                    </dt>
                </dl>
            </li>
        </ul>
    </div>
    <div class="Content ml20">
        <div class="NoticeWrap mb60 c_both">
            <div class="pmBnr widthAuto460 mr20" style="float: left; background: #7e7e86; height: 220px">
                프로모션배너 롤링폼 460 220
            </div>
            <div class="will-newLec widthAuto460">
                <div class="will-Tit">신규강좌</div>
                <ul class="List-Table GM tx-gray">
                    <li>
                        <a href="#none">2017 기미진 국어 아침특강(5-6월)</a><span class="date">2018.03.06</span>
                    </li>
                    <li>
                        <a href="#none">강좌명이 노출됩니다.</a><span class="date">2018.03.06</span>
                    </li>
                    <li>
                        <a href="#none">2017 기미진 국어 아침특강(5-6월)</a><span class="date">2018.03.06</span>
                    </li>
                    <li>
                        <a href="#none">강좌명이 노출됩니다.</a><span class="date">2018.03.06</span>
                    </li>
                    <li>
                        <a href="#none">2017 기미진 국어 아침특강(5-6월)</a><span class="date">2018.03.06</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="curriWrap GM c_both">
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable">
                    <colgroup>
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="tx-gray">직렬선택</th>
                            <td class="All">
                                <a href="#none">전체</a>
                            </td>
                            <td>
                                <a href="#none">일반행정직</a>
                            </td>
                            <td>
                                <a href="#none">교육행정직</a>
                            </td>
                            <td>
                                <a href="#none">출입국관리직</a>
                            </td>
                            <td>
                                <a href="#none">선거행정직</a>
                            </td>
                            <td>
                                <a href="#none">사회복지직</a>
                            </td>
                            <td>
                                <a href="#none">9급견습직</a>
                            </td>
                            <td>
                                <a href="#none">관세직</a>
                            </td>
                            <td>
                                <a href="#none">고용노동직</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td class="All">
                                <a href="#none">전체</a>
                            </td>
                            <td>
                                <a href="#none">국어</a>
                            </td>
                            <td>
                                <a href="#none">영어</a>
                            </td>
                            <td>
                                <a href="#none">한국사</a>
                            </td>
                            <td>
                                <a href="#none">행정법</a>
                            </td>
                            <td>
                                <a href="#none">행정학</a>
                            </td>
                            <td>
                                <a href="#none">교육학</a>
                            </td>
                            <td>
                                <a href="#none">수학</a>
                            </td>
                            <td>
                                <a href="#none">과학</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="prof-List">
            <h5>· 국어</h5>
            <ul>
                <li>
                    <a href="#none">교수 이미지 227 227</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="Footer" class="GM c_both">
    <div class="ft-Link">
        <div class="widthAuto">
            <ul>
                <li>
                    <a href="#none">이용약관</a>
                    <span class="row-line">|</span>
                </li>
                <li>
                    <a href="#none">개인정보 취급방침</a>
                    <span class="row-line">|</span>
                </li>
                <li>
                    <a href="#none">강사모집</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="widthAuto">
        <address>
            ㈜윌비스 <span class="row-line">|</span> 대표 : 송주호 <span class="row-line">|</span> 사업자등록번호 : 119-85-23089 <span class="row-line">|</span> 원격평생교육시설 신고 제56호<br/>
            통신판매업신고 : 제2008-서울관악-0180호 <strong>[정보확인]</strong> <span class="row-line">|</span> 신고기관명 : 서울특별시 관악구<br/>
            개인정보관리책임자 : 홍종훈(help@willbes.com)<br/>
            주소 : 서울시 관악구 호암로 26길 13 세정빌딩 2층 (관악구 대학동 1514-6 ㈜윌비스) <span class="row-line">|</span> TEL : 1544-5006<br/>
            Copyright © (주)윌비스. All Right Reserved.
        </address>
        <div class="ft-KGinicis">
            <img src="/public/img/front/gnb/icon_KGinicis.gif">
        </div>
    </div>
</div>
<!-- End Footer -->

</body>
</html>