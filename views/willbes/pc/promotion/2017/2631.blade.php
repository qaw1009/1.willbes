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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#002643;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_02_bg.jpg) no-repeat center top;}

        .evtLec {width:1120px; margin:0 auto; padding:100px 0;}        
        .evtlecBox_A {display: flex; justify-content: space-between; flex-wrap: wrap;}        
        .evtlecBox_A .lec {border:1px solid #000; padding:30px; flex: 1 1 40%; margin:10px; text-align:left; font-size:16px}
        .evtlecBox_A .lec a {display:inline-block; padding:5px 10px; background:#333; color:#fff; border-radius:8px}
        .evtLec  label {margin-top:20px; display:block; font-size:20px}
        .evtLec  input[type=checkbox] {width:20px; height:20px; vertical-align:top}

        .evtlecBox_B {margin-top:80px; text-align:left; font-size:18px}
        .evtlecBox_B h5 {font-size:24px; font-weight:bold; margin-bottom:20px}
        .evtlecBox_B .lec {border:1px solid #000; padding:20px 50px}
        .evtlecBox_B .lec strong {background:red; color:#fff; padding:3px 15px; border-radius:30px}
        .evtlecBox_B .lec div {padding:20px 0; border-bottom:1px solid #d9d9d9}
        .evtlecBox_B .lec div:last-child {border:0}
        .evtlecBox_B .lec .price {float:right}
        .evtlecBox_B .total {border:5px solid #000; padding:20px; text-align:center; font-size:30px}
        .evtlecBox_B .total span {color:red}
        .evtlecBox_B .buy {margin-top:50px; position: relative;}
        .evtlecBox_B .buy a {position: absolute; top:-20px; right:0; display:block; font-size:24px; padding:15px 0; width:200px; text-align:center; background:#000; color:#fff; vertical-align:middle}

        .evtInfo {padding:80px 0; background:#fff; color:#242424; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox h4 span {color:#e30000; vertical-align: top;}
        .evtInfoBox h5 {font-size:18px; margin-bottom:10px; font-weight:bold}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:30px; margin-bottom:10px}

        .willbes-Layer-CurriBox {top:2300px; margin-left: -560px;}

        .ssam .willbes-Layer-youtube {
            display: none;
        }
        .ssam .willbes-Layer-youtube .popupWrap {
            display:flex; justify-content: center;align-items: center;
            background:#000;
            position: absolute;
            top: 2300px;
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
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_top.jpg" alt="2022학년도 연간패키지"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_01.jpg" alt="열공지원금 팡팡"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2438_02.jpg" alt="특별이벤트"/>
        </div>

        <div class="evtCtnsBox evtLec">
            <div class="evtlecBox_A">
                <div class="lec">
                    <div>
                        <a href="#none" onclick="openWin('sec-prof-layer'), openWin('Curriculum');">커리큘럼 ></a>
                        <a href="#none" onclick="openWin('sec-prof-layer'), openWin('youtube');">설명회 ></a>
                    </div>
                    <label><input type="checkbox"> 신청하기</label>
                </div>
                <div class="lec">
                    <div>
                        <a href="#none" onclick="openWin('sec-prof-layer'), openWin('Curriculum');">커리큘럼 ></a>
                        <a href="#none" onclick="openWin('sec-prof-layer'), openWin('youtube');">설명회 ></a>
                    </div>
                    <label><input type="checkbox"> 신청하기</label>
                </div>
                <div class="lec">
                    <div>
                        <a href="#none" onclick="openWin('sec-prof-layer'), openWin('Curriculum');">커리큘럼 ></a>
                        <a href="#none" onclick="openWin('sec-prof-layer'), openWin('youtube');">설명회 ></a>
                    </div>
                    <label><input type="checkbox"> 신청하기</label>
                </div>
                <div class="lec">
                    <div>
                        <a href="#none" onclick="openWin('sec-prof-layer'), openWin('Curriculum');">커리큘럼 ></a>
                        <a href="#none" onclick="openWin('sec-prof-layer'), openWin('youtube');">설명회 ></a>
                    </div>
                    <label><input type="checkbox"> 신청하기</label>
                </div>
            </div>
            <div class="evtlecBox_B">
                <h5><span>2023 7개월 기간제 연간 PASS</span> 수강신청 내역</h5>
                <div class="lec">
                    <div><span class="tx-blue">[이경범 교육학]</span> 7개월 PASS / 1.2배수 <span class="price">(정가)1,900,000원 <strong>50%할인</strong></span></div>
                    <div><span class="tx-blue">[허역팀 일반사회]</span> 7개월 PASS / 1.2배수 <span class="price">(정가)2,490,000원 <strong>50%할인</strong></span></div>
                </div>
                <div class="total NSK-Black"><span>2과목</span> 결제금액 <span>2,235,000원</span></div>
                <div class="buy">
                    <label><input type="checkbox"> 페이지 하단의 상품 관련 유의사항을 모두 확인하였고, 이에 동의합니다.</label>
                    <a href="#none">결재하기</a>
                </div>
            </div>
        </div>


        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_04.jpg" alt="초심을 잃지 마세요~!"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black"><span>2023+24학년도 대비 얼리버드 PASS</span> 상품 이용안내</h4>
                <ul>
                    <li>본 패키지의 강의의 제공기간은 아래와 같습니다.</li>
                    - 2022년 패키지(2023학년도 대비): 2022년 11월 30일까지 제공하고 "불합격 인증을 통하여" 2023년까지 강의를 연장해 드립니다. (2년간 제공)<br>
                    - 2023년 패키지(2024학년도 대비 신규강의): "불합격 인증을 통하여" 2023년 11월 30일까지 제공합니다. (신규강의 추가 제공)<br>
                    - 2차시험 대비 강의는 포함되지 않습니다.</li>
                    <li>본 패키지 상품 구성 및 커리큘럼은 변경될 수 있습니다.</li>
                    <li>본 패키지의 수강 기간 중 "일시중지" 및 "(유료)연장"은 할 수 없습니다.</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가하며, 위반 시 처벌을 받을 수 있습니다.</li>
                </ul>   

                <h5>[환불 규정]</h5>
                <ul>
                    <li>본 패키지 강의의 환불은 수강기간, 수강 여부, 자료 다운 유무 등에 따라 금액을 공제하며, 강좌의 원 수강료 기준으로 공제가 됩니다.</li>
                    <li>본 패키지 환불기준은 2023년11월30일까지 제공되는 강좌입니다.<br>
                    (2023년에 제공되는 강의는 “불합격자 대상으로“ 추가 지급되는 강의로 환불대상에서 제외합니다.)</li>
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