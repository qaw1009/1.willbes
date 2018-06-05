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
                urls: ['http://fonts.googleapis.com/earlyaccess/notosanskr.css']
            families: ['Nanum Gothic'],
                urls: ['http://fonts.googleapis.com/earlyaccess/nanumgothic.css']
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

        // GNB 아코디언 메뉴 Script
        $(function() {
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

        // 교재정보 전체보기 버튼 Script
        $(function() {
            $('.willbes-Lec-Subject .MoreBtn a').click(function() {
                if( $(".willbes-Lec-Table").is(":hidden") ) {
                    $(".willbes-Lec-Table").css("display","block");
                    $(".willbes-Lec-Subject .MoreBtn a").text("교재정보 전체닫기 ▲");
                }
                else
                {
                    $(".willbes-Lec-Table").css("display","none");
                    $(".willbes-Lec-Subject .MoreBtn a").text("교재정보 전체보기 ▼");
                }
            });
        });
        
        // 교재정보 보기 버튼 Script
        $(function() {
            $('.willbes-Lec-Table .w-notice .MoreBtn a').click(function() {
                if( $("table.lecInfoTable").is(":hidden") ) {
                    $("table.lecInfoTable").css("display","block");
                    $(".willbes-Lec-Table .w-notice .MoreBtn a").text("교재정보 닫기 ▲");
                }
                else
                {
                    $("table.lecInfoTable").css("display","none");
                    $(".willbes-Lec-Table .w-notice .MoreBtn a").text("교재정보 보기 ▼");
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
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
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
                    <a href="#none">경찰학원 <img src="/public/img/front/sub/icon_arrow.gif" style="margin: -3px 3px 0"></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="/public/img/front/sub/icon_home.gif"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>단강좌</strong></span>
    </div>
    <div class="Content">
        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li class="on"><a href="#none">전체</a></li>
                <li><a href="#none">이론과정</a></li>
                <li><a href="#none">심화과정</a></li>
                <li><a href="#none">문제풀이</a></li>
                <li><a href="#none">특강</a></li>
            </ul>
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
                        <tr>
                            <th class="tx-gray">대비년도</th>
                            <td colspan="8" class="tx-left">
                                <span>
                                    <input type="radio" id="YEAR_SAVE_ALL" name="YEAR_SAVE_ALL" class="iptSave">
                                    <label for="YEAR_SAVE_ALL" class="yearSave">전체</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2019" name="YEAR_SAVE_2019" class="iptSave">
                                    <label for="YEAR_SAVE_2019" class="yearSave">2019년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2018" name="YEAR_SAVE_2018" class="iptSave">
                                    <label for="YEAR_SAVE_2018" class="yearSave">2018년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2017" name="YEAR_SAVE_2017" class="iptSave">
                                    <label for="YEAR_SAVE_2017" class="yearSave">2017년</label>
                                </span>
                            </td>
                            <td class="All-Clear">
                                <a href="#none"><img src="/public/img/front/sub/icon_clear.gif" style="margin: -2px 6px 0 0">전체해제</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject">
                <div class="Tit tx-dark-black">· 국어<span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span></div>
                <div class="ProfWrap tx-dark-black">
                    <ul>
                        <li class="ProfImg"><img src="/public/img/front/sample/prof1.png"> </li>
                        <li class="ProfDetail">
                            <div class="Obj">
                                공무원 국어종결자<br/>정채영 국어
                            </div>
                            <div class="Name">정채영 교수님</div>
                        </li>
                        <li class="Review">
                            수강후기
                        </li>
                    </ul>
                </div>
            </div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                    <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                        <span class="nBox n3">예정</span>
                                        <span class="nBox n4">완강</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="chk">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            </td>
                            <td class="w-notice">
                                <ul class="w-sp NSK">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none">맛보기</a></li>
                                </ul>
                                <div class="priceWrap">
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 865px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                    <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                    <span class="chk">
                                        <label>[판매중]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">30,000원</span>
                                        <span class="discount">(↓10%)</span>
                                    </span>
                                </div>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">주교재</span> 
                                    <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                    <span class="chk">
                                        <label class="soldout">[품절]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">20,000원</span>
                                        <span class="discount">(↓10%)</span>
                                    </span>
                                </div>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">부교재</span> 
                                    <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                    <span class="chk">
                                        <label class="press">[출간예정]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">0원</span>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

        </div>
        <!-- willbes-Lec -->


    </div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="Footer" class="c_both">
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