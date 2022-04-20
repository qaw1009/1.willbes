@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/04/2632_top_bg.jpg) no-repeat center top; height:765px}
        .evtTop .btnbox {position:absolute; bottom:80px; width:1120px; left:50%; margin-left:-560px}
        .evtTop .btnbox a {display:inline-block; background:#280c7c; color:#fff; font-size:18px; padding:20px 0; margin:0 10px; text-align:center; border-radius:10px; width:45%; border:1px solid #502caa}
        .evtTop .btnbox a strong {font-size:23px; font-weight:bold}
        .evtTop .btnbox a.on {background:#fff; color:#280c7c;}


        .evtLec {width:1120px; margin:0 auto; padding-bottom:100px; }        
        .evtlecBox_A {text-align:center; display: flex; flex-wrap: wrap; justify-content: center;}     
        .evtlecBox_A .lec {margin:0 10px;}
        .evtlecBox_A .lec:nth-child(1) {background:url(https://static.willbes.net/public/images/promotion/2022/04/2631_t01.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(2) {background:url(https://static.willbes.net/public/images/promotion/2022/04/2631_t02.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(3) {background:url(https://static.willbes.net/public/images/promotion/2022/04/2631_t03.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(4) {background:url(https://static.willbes.net/public/images/promotion/2022/04/2631_t04.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec label {border:1px solid #c9c9c9; text-align:left; font-size:16px; width:490px; height:229px; padding:25px 30px; box-sizing:border-box; display:inline-block}
        .evtlecBox_A .lec .txt01 {font-size:24px; color:#000; margin-bottom:5px; font-weight:600}
        .evtlecBox_A .lec .txt02 {font-size:27px; color:#4f26e7; margin-bottom:20px; font-weight:600}
        .evtlecBox_A .lec .txt03 {margin-bottom:40px;}
        .evtlecBox_A .txt03 a {display:inline-block; padding:5px 10px; color:#000; border:1px solid #000; font-size:14px;}
        .evtlecBox_A .txt03 a:hover {color:#fff; background:#000 }
        .evtLec label {margin-top:20px; display:block; font-size:20px}
        .evtLec input[type=checkbox] {width:20px; height:20px; vertical-align:top}
        .evtlecBox_A .lec label:hover {
            border:1px solid #2d3741;
            webkit-box-shadow: inset 0px 0px 0px 5px rgba(0,0,0,0.75);
            -moz-box-shadow: inset 0px 0px 0px 5px rgba(0,0,0,0.75);
            box-shadow: inset 0px 0px 0px 5px rgba(0,0,0,0.75);
            cursor: pointer;
        }

        .evtlecBox_B {width:1000px; margin:80px auto 0; text-align:left; font-size:18px}
        .evtlecBox_B h5 {font-size:24px; font-weight:bold; margin-bottom:20px}
        .evtlecBox_B h5 span {color:#4f26e7}
        .evtlecBox_B .lec {border:1px solid #2d3741; padding:30px 60px}
        .evtlecBox_B .lec strong {background:#ed1c24; color:#fff; padding:3px 15px; font-size:18px}
        .evtlecBox_B .lec div {padding:20px 0; border-bottom:1px solid #d9d9d9; font-weight:600; font-size:24px}
        .evtlecBox_B .lec div:last-child {border:0}
        .evtlecBox_B .lec .price {float:right; color:#666}
        .evtlecBox_B .total {background:#2d3741; color:#fff; padding:30px; text-align:center; font-size:32px}
        .evtlecBox_B .total span {color:#ed1c24}
        .evtlecBox_B .buy {margin-top:50px; position: relative;}
        .evtlecBox_B .buy a {position: absolute; top:-20px; right:0; display:block; font-size:24px; padding:15px 0; width:200px; text-align:center; background:#000; color:#fff; vertical-align:middle; overflow: hidden;}
        .evtlecBox_B .buy a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 10px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }   
        .evtlecBox_B .buy a:after{animation:shinyBtn 3s ease-in-out infinite;}

        @@keyframes shinyBtn {
            0% { transform: scale(0) rotate(45deg); opacity: 0; }
            80% { transform: scale(0) rotate(45deg); opacity: 0.5; }
            81% { transform: scale(4) rotate(45deg); opacity: 1; }
            100% { transform: scale(50) rotate(45deg); opacity: 0; }
        }

        .evt02 {background:#c6e6f4}

        .evtInfo {padding:100px 0; background:#1b1a1f; color:#9494a2; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px; color:#fff}
        .evtInfoBox h4 span {color:#c6e6f4; vertical-align: top;}
        .evtInfoBox h5 {font-size:18px; margin-bottom:10px; font-weight:bold}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:30px; margin-bottom:10px}

        .willbes-Layer-CurriBox {top:2000px; margin-left: -560px;}

        .ssam .willbes-Layer-youtube {
            display: none;
        }
        .ssam .willbes-Layer-youtube .popupWrap {
            display:flex; justify-content: center;align-items: center;
            background:#000;
            position: absolute;
            top: 2000px;
            z-index: 110;
            width: 860px;
            height: 484px;
            border: 1px solid #2f2f2f;
            left: 50%;
            margin-left: -445px;
        }
        .ssam .willbes-Layer-youtube .closeBtn {
            position: absolute;
            top: -33px;
            right: -2px;
        }
        .ssam .willbes-Layer-youtube iframe {width:860px; height:484px}
    </style>

    <div class="p_re evtContent NSK ssam" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <div class="btnbox">
                <a href="{{front_url('/promotion/index/cate/3140/code/2631')}}">7개월<br> <strong>기간제 PASS 바로가기 ▶</strong></a>
                <a href="#evtLec" class="on">2023+24학년도 대비<br> <strong>얼리버드 PASS 바로가기 ▼</strong></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2632_01.jpg" alt="열공지원금 팡팡"/>
        </div>

        <div class="evtCtnsBox evtLec" id="evtLec">
            <div class="evtlecBox_A">
                <div class="lec">
                    <label>
                        <div class="txt01">이경범 교육학</div>
                        <div class="txt02">23+24학년도 얼리버드 PASS</div>
                        <div class="txt03">
                            <a href="#none" onclick="openWin('sec-prof-layer'), openWin('Curriculum');">커리큘럼 확인하기</a>
                            <a href="#none" onclick="openWin('sec-prof-layer'), openWin('youtube');">설명회 보기</a>
                        </div>
                        <input type="checkbox"> 신청하기
                    </label>
                </div>
                <div class="lec">
                    <label>
                        <div class="txt01">신태식 교육학</div>
                        <div class="txt02">23+24학년도 얼리버드 PASS</div>
                        <div class="txt03">
                            <a href="#none" onclick="openWin('sec-prof-layer'), openWin('Curriculum');">커리큘럼 확인하기</a>
                            <a href="#none" onclick="openWin('sec-prof-layer'), openWin('youtube');">설명회 보기</a>
                        </div>
                        <input type="checkbox"> 신청하기
                    </label>
                </div>
                <div class="lec">
                    <label>
                        <div class="txt01">허역팀 전공일반사회</div>
                        <div class="txt02">23+24학년도 얼리버드 PASS</div>
                        <div class="txt03">
                            <a href="#none" onclick="openWin('sec-prof-layer'), openWin('Curriculum');">커리큘럼 확인하기</a>
                            <a href="#none" onclick="openWin('sec-prof-layer'), openWin('youtube');">설명회 보기</a>
                        </div>
                        <input type="checkbox"> 신청하기
                    </label>
                </div>
                <div class="lec">
                    <label>
                        <div class="txt01">김종권 전공역사</div>
                        <div class="txt02">23+24학년도 얼리버드 PASS</div>
                        <div class="txt03">
                            <a href="#none" onclick="openWin('sec-prof-layer'), openWin('Curriculum');">커리큘럼 확인하기</a>
                            <a href="#none" onclick="openWin('sec-prof-layer'), openWin('youtube');">설명회 보기</a>
                        </div>
                        <input type="checkbox"> 신청하기
                    </label>
                </div>
            </div>
            <div class="evtlecBox_B">
                <h5><span>2023 7개월 기간제 연간 PASS</span> 수강신청 내역</h5>
                <div class="lec">
                    <div><span class="tx-blue">[이경범 교육학]</span> 얼리버드 Pass / 1.8배수 <span class="price">(정가)3,800,000원 <strong>55%할인</strong></span></div>
                    <div><span class="tx-blue">[허역팀 일반사회]</span> 얼리버드 Pass / 1.8배수 <span class="price">(정가)5,760,000원 <strong>55%할인</strong></span></div>
                </div>
                <div class="total NSK-Black">총 결제금액 : <span>2과목 </span>/<span> 3,951,000원</span></div>
                <div class="buy">
                    <label><input type="checkbox"> 페이지 하단의 상품 관련 유의사항을 모두 확인하였고, 이에 동의합니다.</label>
                    <a href="#none">결재하기</a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2631_02.jpg" alt="초심을 잃지 마세요~!"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black"><span>2023+24학년도 대비 얼리버드 PASS </span> 상품 이용안내</h4>
                <ul>
                    <li>본 패키지는 1.8배수로 제공되는 강의입니다.</li> 
                    <li>본 패키지의 제공기간은 아래와 같습니다.<br> 
                        1. 2022년 패키지(2023학년도 대비 강의): 2022년 11월 30일까지 제공하고, 1차 시험일 이후 2023년 11월 30일까지 강의를 자동 갱신(연장)하는 방식으로 
                        제공됩니다. (기존에 수강했던 강의의 배수가 승계(차감)되고, 강의 기간만 연장합니다. )<br>
                        2. 2023년 패키지(2024학년도 대비 신규강의): 추후, 불합격 인증을 통하여" 2023년 11월 30일까지 추가 제공됩니다. <br>
                        3. 불합격의 인증 방법은 별도 공지하도록 하겠습니다.  <br>
                        4. 2차시험 대비 강의는 포함되지 않습니다.</li>
                    <li>본 패키지 상품 구성 및 커리큘럼은 변경될 수 있습니다.</li>
                    <li>본 패키지의 수강 기간 중 "일시중지" 및 "(유료)연장＂은 할 수 없습니다.</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가하며, 위반 시 처벌을 받을 수 있습니다. </li>
                </ul>   

                <h5>[환불 규정]</h5>
                <ul>
                    <li>본 패키지 강의의 환불은 수강기간, 수강 여부, 자료 다운 유무 등에 따라 금액을 공제하며, 강좌의 원 수강료 기준으로 공제가 됩니다.</li>
                    <li>본 패키지의 환불은 2022년11월30일까지 제공되는 패키지 강좌에 대해서만 적용됩니다.</li>
                    <li>본 패키지의 연장(갱신)을 통하여 제공받은 강의는 무료 서비스 강의로 환불이 불가합니다.</li>
                    <li>본 패키지 강의 환불 신청은 홈페이지 1:1게시판을 통하여 가능합니다.</li>
                </ul>
            </div>
        </div>

        {{--교수 youtube 팝업 --}}
        <div id="youtube" class="willbes-Layer-youtube">
            <div class="popupWrap">
                <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('sec-prof-layer'),closeWin('youtube')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <iframe src="https://www.youtube.com/embed/mG3dim4NgKI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        {{--교수 커리큘럼 팝업 --}}
        <div id="Curriculum" class="willbes-Layer-CurriBox">
            <div class="popupWrap">
                <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('sec-prof-layer'),closeWin('Curriculum')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">민정선</span> 교수님 커리큘럼</div>
                <div class="Layer-Cont">
                    <img src="https://ssam.willbes.net/public/uploads/willbes/board/92/2020/1127/board_305025_01_20201127150717.jpg"/>
                </div>
            </div>
        </div>
        <div id="sec-prof-layer" class="willbes-Layer-Black"></div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function () {
            /* 핫클립 상품 페이지 로드 */
            var _url = '{!! front_url('/promotion/ajaxHotClipProduct') !!}';
            _url += '?online_disc_code={{ (empty($arr_promotion_params["online_disc_code"]) === false ? $arr_promotion_params["online_disc_code"] : '') }}';
            _url += '&off_disc_code={{ (empty($arr_promotion_params["off_disc_code"]) === false ? $arr_promotion_params["off_disc_code"] : '') }}';
            sendAjax(_url, '', function(ret) {
                $('#hotclip_box').html(ret);
            }, null, false, 'GET', 'html');
        });
    </script>
@stop