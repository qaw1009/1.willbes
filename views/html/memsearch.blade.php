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
</head> 

<body>

<div id="Gnb">
    <a href="{{ site_url('/') }}">통합 메인 페이지 이동</a>
</div>    

<div id="Header">
    <ul class="myInfo">
        <li>
            <a href="#none">로그인</a>
        </li>
        <li>
            <a href="#none">회원가입</a>
        </li>
        <li>
            <a href="#none">장바구니</a>
        </li>
        <li class="myPage">
            <a href="#none">내강의실</a>
        </li>
        <li class="csPage">
            <a href="#none">고객센터</a>
        </li>
    </ul>
</div>

<div id="Container" class="memContainer widthAuto c_both">

    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디/비밀번호 찾기</span>
    </div>
    <!-- 아이디/비밀번호 찾기 : 아이디 찾기 : 휴대폰 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            아이디/비밀번호를 분실하셨나요?</br>
            원하시는 인증방법을 선택해 주세요.
        </div>
        <ul class="tabs c_both">
            <li class="on"><a href="#none">아이디 찾기</a></li>
            <li><a href="#none">비밀번호 찾기</a></li>
            <li><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1" class="on">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="info-Txt tx-gray">
            본인 명의의 휴대폰을 통해 인증합니다.
        </div>
        <div class="search-Btn btnAuto120 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>휴대폰 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt40">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
        </div>
    </div>
    <!-- End 아이디/비밀번호 찾기 : 아이디 찾기 : 휴대폰 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디/비밀번호 찾기</span>
    </div>
    <!-- 아이디/비밀번호 찾기 : 아이디 찾기 : E-mail 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            아이디/비밀번호를 분실하셨나요?</br>
            원하시는 인증방법을 선택해 주세요.
        </div>
        <ul class="tabs c_both">
            <li class="on"><a href="#none">아이디 찾기</a></li>
            <li><a href="#none">비밀번호 찾기</a></li>
            <li><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2" class="on">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox p_re mt30">
                <label for="USER_EMAIL" class="labelEmail" style="display: block;">이메일</label>
                <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" maxlength="30"> @ 
                <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                <select id="email" name="email" title="직접입력" class="seleEmail">
                    <option selected="selected">직접입력</option>
                    <option value="naver.com">naver.com</option>
                    <option value="daum.net">daum.net</option>
                </select>
            </div>
            <div class="tx-red" style="display: block;">가입 시 입력한 메일주소를 입력해 주세요.</div>
        </div>
        <div class="search-Btn btnAuto120 mt70 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>이메일 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt40">
            * 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.
        </div>
    </div>
    <!-- End 아이디/비밀번호 찾기 : 아이디 찾기 : E-mail 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디/비밀번호 찾기</span>
    </div>
    <!-- 아이디/비밀번호 찾기 : 아이디 찾기 : 아이핀 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            아이디/비밀번호를 분실하셨나요?</br>
            원하시는 인증방법을 선택해 주세요.
        </div>
        <ul class="tabs c_both">
            <li class="on"><a href="#none">아이디 찾기</a></li>
            <li><a href="#none">비밀번호 찾기</a></li>
            <li><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3" class="on">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="info-Txt tx-gray">
            가입한 아이핀 ID를 통해 인증합니다.
        </div>
        <div class="search-Btn btnAuto120 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>아이핀 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt40">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
        </div>
    </div>
    <!-- End 아이디/비밀번호 찾기 : 아이디 찾기 : 아이핀 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디 찾기 완료</span>
    </div>
    <!-- 아이디 찾기 완료 -->
    <div class="Member mem-SearchFin widthAuto690">
        <div class="user-Txt tx-black">
            아이디 찾기 본인인증에 성공하셨습니다.</br>
            입력하신 정보와 일치하는 아이디 목록입니다.
        </div>
        <div class="info-Txt info-Txt-Wrap tx-black mt40">
            아아디 노출 (2018-00-00)
        </div>
        <div class="searchfin-Btn mt60">
            <ul>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>로그인</span>
                    </button>
                </li>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                        <span class="tx-light-blue">비밀번호 찾기</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <!-- End 아이디 찾기 완료 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디/비밀번호 찾기</span>
    </div>
    <!-- 아이디/비밀번호 찾기 : 비밀번호 찾기 : 휴대폰 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            아이디/비밀번호를 분실하셨나요?</br>
            원하시는 인증방법을 선택해 주세요.
        </div>
        <ul class="tabs c_both">
            <li><a href="#none">아이디 찾기</a></li>
            <li class="on"><a href="#none">비밀번호 찾기</a></li>
            <li><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1" class="on">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox mt30 p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
        </div>
        <div class="search-Btn btnAuto120 mt30 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>휴대폰 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt40">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
        </div>
    </div>
    <!-- End 아이디/비밀번호 찾기 : 비밀번호 찾기 : 휴대폰 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디/비밀번호 찾기</span>
    </div>
    <!-- 아이디/비밀번호 찾기 : 비밀번호 찾기 : E-mail 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            아이디/비밀번호를 분실하셨나요?</br>
            원하시는 인증방법을 선택해 주세요.
        </div>
        <ul class="tabs c_both">
            <li><a href="#none">아이디 찾기</a></li>
            <li class="on"><a href="#none">비밀번호 찾기</a></li>
            <li><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2" class="on">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox mt30 p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="inputBox p_re">
                <label for="USER_EMAIL" class="labelEmail" style="display: block;">이메일</label>
                <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" maxlength="30"> @ 
                <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                <select id="email" name="email" title="직접입력" class="seleEmail">
                    <option selected="selected">직접입력</option>
                    <option value="naver.com">naver.com</option>
                    <option value="daum.net">daum.net</option>
                </select>
            </div>
            <div class="tx-red" style="display: block;">가입 시 입력한 메일주소를 입력해 주세요.</div>
        </div>
        <div class="search-Btn btnAuto120 mt70 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>이메일 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt40">
            * 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.
        </div>
    </div>
    <!-- End 아이디/비밀번호 찾기 : 비밀번호 찾기 : E-mail 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디/비밀번호 찾기</span>
    </div>
    <!-- 아이디/비밀번호 찾기 : 비밀번호 찾기 : 아이핀 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            아이디/비밀번호를 분실하셨나요?</br>
            원하시는 인증방법을 선택해 주세요.
        </div>
        <ul class="tabs c_both">
            <li><a href="#none">아이디 찾기</a></li>
            <li class="on"><a href="#none">비밀번호 찾기</a></li>
            <li><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3" class="on">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox mt30 p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
        </div>
        <div class="search-Btn btnAuto120 mt30 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>아이핀 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt40">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
        </div>
    </div>
    <!-- End 아이디/비밀번호 찾기 : 비밀번호 찾기 : 아이핀 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">휴면회원 해제</span>
    </div>
    <!-- 휴면회원 해제 : 휴대폰 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            1년 이상 윌비스에 로그인하지 않아 휴면상태로 전환된 경우라도,</br>
            계정정보를 인증하시면 정상적으로 서비스를 이용하실 수 있습니다.
        </div>
        <ul class="tabs c_both">
            <li><a href="#none">아이디 찾기</a></li>
            <li><a href="#none">비밀번호 찾기</a></li>
            <li class="on"><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1" class="on">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox mt30 p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
        </div>
        <div class="search-Btn btnAuto120 mt30 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>휴대폰 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray tx-left mt40 pl20">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.<br/>
            * 아이디/비밀번호가 생각나지 않으신가요? 아이디/비밀번호 찾기를 이용해 주세요.
        </div>
    </div>
    <!-- End 휴면회원 해제 : 휴대폰 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디/비밀번호 찾기</span>
    </div>
    <!-- 휴면회원 해제 : E-mail 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            1년 이상 윌비스에 로그인하지 않아 휴면상태로 전환된 경우라도,</br>
           계정정보를 인증하시면 정상적으로 서비스를 이용하실 수 있습니다.
        </div>
        <ul class="tabs c_both">
            <li><a href="#none">아이디 찾기</a></li>
            <li class="on"><a href="#none">비밀번호 찾기</a></li>
            <li><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2" class="on">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox mt30 p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="inputBox p_re">
                <label for="USER_EMAIL" class="labelEmail" style="display: block;">이메일</label>
                <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" maxlength="30"> @ 
                <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                <select id="email" name="email" title="직접입력" class="seleEmail">
                    <option selected="selected">직접입력</option>
                    <option value="naver.com">naver.com</option>
                    <option value="daum.net">daum.net</option>
                </select>
            </div>
            <div class="tx-red" style="display: block;">가입 시 입력한 메일주소를 입력해 주세요.</div>
        </div>
        <div class="search-Btn btnAuto120 mt70 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>이메일 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray tx-left mt40 pl20">
            * 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.<br/>
            * 아이디/비밀번호가 생각나지 않으신가요? 아이디/비밀번호 찾기를 이용해 주세요.
        </div>
    </div>
    <!-- End 휴면회원 해제 : E-mail 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">아이디/비밀번호 찾기</span>
    </div>
    <!-- 휴면회원 해제 : 아이핀 인증 -->
    <div class="Member mem-Search widthAuto690">
        <div class="user-Txt tx-black">
            1년 이상 윌비스에 로그인하지 않아 휴면상태로 전환된 경우라도,</br>
            계정정보를 인증하시면 정상적으로 서비스를 이용하실 수 있습니다.
        </div>
        <ul class="tabs c_both">
            <li><a href="#none">아이디 찾기</a></li>
            <li><a href="#none">비밀번호 찾기</a></li>
            <li class="on"><a href="#none">휴면회원 해제</a></li>
        </ul>
        <ul class="tabs-Certi">
            <li id="tab1">
                <a href="#none">
                    <div>휴대폰 인증</div>
                </a>
            </li>
            <li id="tab2">
                <a href="#none">
                    <div>E-mail 인증</div>
                </a>
            </li>
            <li id="tab3" class="on">
                <a href="#none">
                    <div>아이핀 인증</div>
                </a>
            </li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox mt30 p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
        </div>
        <div class="search-Btn btnAuto120 mt30 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>아이핀 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray tx-left mt40 pl20">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.<br/>
            * 아이디/비밀번호가 생각나지 않으신가요? 아이디/비밀번호 찾기를 이용해 주세요.
        </div>
    </div>
    <!-- End 휴면회원 해제 : 아이핀 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="/public/img/front/login/logo.gif">
        <span class="tx-blue">휴면회원 해제</span>
    </div>
    <!-- 휴면회원 해제 : 완료 -->
    <div class="Member mem-SearchClear widthAuto690">
        <div class="user-Txt tx-black">
            본인 인증이 완료되어 고객님의 계정이 활성화 되었습니다.</br>
            재로그인 후 정상적으로 서비스 이용이 가능합니다.
        </div>
        <div class="info-Txt tx-gray mt30">
            이용과 관련한 궁금한 점이 있으실 경우 <a href="#none" class="tx-blue">윌비스 고객센터</a>로 문의주시기 바랍니다.
        </div>
        <div class="searchclear-Btn btnAuto180 mt50 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>로그인 하기</span>
            </button>
        </div>
    </div>
    <!-- End 휴면회원 해제 : 완료 -->


    <br/><br/><br/>


    <!-- 유효기간경과 -->
    <div class="Member mem-Expired widthAuto690">
        <div class="user-Txt tx-black tx-left">
            메일 인증시간이 초과되었습니다.
        </div>
        <div class="info-Txt tx-black">
            <div class="info-Txt-box tx-left">
                인증 메일 발송 후 <strong class="tx-red valign-base">30분간 인증이 유효</strong>합니다.<br/>
                다시 인증해 주시기 바랍니다.<br/>
                <div class="expired-Btn btnAuto130 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>확인</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End 유효기간경과 -->


</div>


<div id="Footer">
    <div class="ft-link">
        <div class="widthAuto">
            <ul>
                <li>
                    <a href="#none">이용약관</a>
                </li>
                <li>
                    <a href="#none">개인정보 취급방침</a>
                </li>
                <li>
                    <a href="#none">강사모집</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="widthAuto">
        <div class="ft-logo">로고부분</div>
        <address>
            ㈜윌비스 | 대표 : 송주호 | 사업자등록번호 : 119-85-23089 | 원격평생교육시설 신고 제56호<br/>
            통신판매업신고 : 제2008-서울관악-0180호 [정보확인] | 신고기관명 : 서울특별시 관악구 |<br/>
            개인정보관리책임자 : 홍종훈(help@willbes.com)<br/>
            주소 : 서울시 관악구 호암로 26길 13 세정빌딩 2층 (관악구 대학동 1514-6 ㈜윌비스) | TEL : 1544-5006<br/>
            Copyright © (주)윌비스. All Right Reserved.
        </address>
        <div class="ft-KGinicis">
            KG이니시스 로고
        </div>
    </div>
</div>

</body>
</html>