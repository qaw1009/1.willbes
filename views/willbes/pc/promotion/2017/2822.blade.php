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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed;top:100px; right:10px ;width:120px; text-align:center; z-index:100;}    
        .sky a {display: block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/12/2822_top_bg.jpg) no-repeat center top;}
        .evtTop_01 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2822_top_01_bg.jpg) no-repeat center top;}

        .evtTop div {position: absolute; left:50%; bottom:0; width:1110px; margin-left:-555px; z-index: 2;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2822_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2822_02_bg.jpg) no-repeat center top;}
        .evt02_01 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2822_02_01_bg.jpg) no-repeat center top;}

        .evt03 {width:1060px; margin:0 auto; padding:0 0 100px; display: flex; justify-content: space-between;} 

        .ssam-Lnb {
            width: 240px;
            text-align:left;
        }
        .ssam-Lnb .lnb-List {border:1px solid #a2a2a2; border-top:0}
        .ssam-Lnb .lnb-List .ssam-lnb-List-Tit a {
            display: block;
            height: 50px;
            font-size: 18px;
            font-weight:bold;
            border-top: 1px solid #b2b2b2;
            color: #000;
            line-height: 50px;
            padding-left: 20px;
            position:relative;
            background:#e4e4e4 url("https://static.willbes.net/public/images/promotion/2022/12/2822_arrowDown.png") no-repeat 90% center;
        }
        .ssam-Lnb .lnb-List .ssam-lnb-List-Tit.hover a {
            color: #0d74ae;
            background-image: url("https://static.willbes.net/public/images/promotion/2022/12/2822_arrowUp.png");
        }

        .ssam-Lnb .lnb-List .lnb-List-Depth {
            display: none;
            background: #fff;
            border-top: 1px solid #b2b2b2;
            border-bottom: 1px solid #ececec;
        }
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt {position: relative;}
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt a:before{ 
            background: #0077e3 none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 20px;
            position: absolute;
            top: 50%;
            width: 4px;
            margin-top:-2px;
        }

        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt a {
            display: flex;
            justify-content: space-between; 
            font-size: 16px;
            color: #3a3a3a;
            padding:15px 30px;
            border-bottom:1px solid #ddd;
        }
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt a:hover,
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt a.active {
            background: #ffd800;
        }
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt:last-child,
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt:last-child a {border-bottom:0}

        .tabCts {width:780px; text-align:left}
        .tabCts .btnBox {position:absolute; bottom:30px; left:50px;}
        .tabCts .prof-top-btn a {display:inline-block; color:#fff; padding:4px 10px 4px 22px; margin-right:4px}
        .tabCts .prof-top-btn a:nth-of-type(1) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon01.png")
        no-repeat 5px center}
        .tabCts .prof-top-btn a:nth-of-type(2) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon02.png")
        no-repeat 5px center}
        .tabCts .prof-top-btn a:nth-of-type(3) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon03.png")
        no-repeat 5px center}
        .tabCts .prof-top-btn a:hover {background-color:#ffd800; color:#0a2230}

        .tabCts .prof-clip-btn {margin-top:14px}
        .tabCts .prof-clip-btn a {display:inline-block; margin-right:5px; position: relative; border:1px solid #ccc}
        .tabCts .prof-clip-btn a img.play {position:absolute; top:0; left:0; z-index: 10; opacity:0.7;}
        .tabCts .prof-clip-btn a:hover img.play {opacity:1;}
        .tabCts .pkgBuy {display:flex; justify-content: space-between; margin:20px 0 40px}
        .tabCts .pkgBuy div {flex-grow: 1;}
        .tabCts .pkgBuy a {display:block; line-height:1.3; font-weight:bold; background:#111; color:#fff; padding:20px 0; text-align:center; margin-right:10px}
        .tabCts .pkgBuy div:nth-of-type(even) a {background:#4b66b0;}
        .tabCts .pkgBuy a:hover {background:#ffd800 !important; color:#111}
        .tabCts .pkgBuy div:last-child a {margin:0}
        .tabCts .pkgBuy strong {display:block; font-size:18px;}


        .tabCts .buyWrap h4 {font-size:24px; margin-bottom:20px}
        .tabCts .buyWrap h5 {font-size:16px; margin-bottom:10px}
        .tabCts .buyWrap .basket {display:flex; justify-content: space-between; line-height:1.4; margin-bottom:40px}
        .tabCts .buyWrap .lecbox {width:calc((100% / 2) - 10px);}
        .tabCts .buyWrap .lecbox ul {border:1px solid #c4c4c4; border-top:4px solid #313131; padding:10px 10px 10px 20px; background:#f4f4f4; height:200px; margin-bottom:15px; overflow-y:scroll;}
        .tabCts .buyWrap .lecbox li {padding:10px 20px 10px 0; border-bottom:1px solid #ccc; position: relative;}
        .tabCts .buyWrap .lecbox li:last-child {border:0}
        .tabCts .buyWrap .lecbox li a {position:absolute; top:10px; right:0; z-index: 2; background:#fff}
        .tabCts .buyWrap .lecbox li > strong {color:#2c4fad}
        .tabCts .buyWrap .lecbox li .price {margin-top:5px; }
        .tabCts .buyWrap .lecbox li .price strong {color:#ff0000}
        .tabCts .buyWrap .lecbox li .price span {color:#0070c0; float:right}
        .tabCts .buyWrap .lecbox > div {text-align:right; font-size:16px}
        .tabCts .buyWrap .lecbox > div p:nth-child(1) {font-size:24px; color:#7f7f7f; font-weight:bold}
        .tabCts .buyWrap .lecbox > div p:nth-child(2) {padding-bottom:10px; margin-bottom:10px; border-bottom:1px solid #7f7f7f;color:#0070c0}
        .tabCts .buyWrap .lecbox > div p strong {color:#0070c0}
        .tabCts .buyWrap .lecbox > div p strong:last-child {color:#ff0000}
        .tabCts .buyWrap .lecbox > div p a {display:inline-block; padding:10px 20px; color:#fff; background:#111}
        .tabCts .buyWrap .lecbox > div p a:hover {background-color:#ffd800; color:#111}
        .tabCts .buyWrap .checkWrap input {width:18px; height:18px}
        .tabCts .buyWrap .checkWrap label {cursor: pointer}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2822_04_bg.jpg) no-repeat center top;}

        .evtInfo {padding:80px 0; background:#CCC; color:#242424; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox span {vertical-align:top}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox h4 span {color:#e30000}
        .evtInfoBox h5 {font-size:20px; margin-bottom:10px; font-weight:bold}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:30px; margin-bottom:10px}        
        .evtInfoBox p {margin-bottom:10px}
        .evtInfoBox p span {padding:3px 10px; background:#333; color:#fff; font-size:16px; border-radius:10px}
        .evtInfoBox tr {border:1px solid #FFF}
        .evtInfoBox th,
        .evtInfoBox td {padding:5px; text-align:center; border-right:1px solid #FFF}
        .evtInfoBox th {background:#f4f4f4}

        .willbes-Layer-CurriBox {top:3750px; margin-left: -560px;}

        .ssam .willbes-Layer-youtube {
            display: none;
        }
        .ssam .willbes-Layer-youtube .popupWrap {
            display:flex; justify-content: center;align-items: center;
            background:#000;
            position: absolute;
            top: 3750px;
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

    <div class="evtContent NSK ssam" id="evtContainer">
        @if(time() < strtotime('202212301700'))
            <div class="evtCtnsBox evtTop" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2822_top.jpg" alt="2023학년도 연간패키지"/>
            </div>
            <div class="evtCtnsBox evt01" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2822_01.jpg" alt="연간 커리큘럼"/>
            </div>
            <div class="evtCtnsBox evt02" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2822_02.jpg" alt="선착순 1000명"/>
            </div>
        @else
            <div class="evtCtnsBox evtTop_01" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2822_top_01.jpg" alt="2023학년도 연간패키지"/>
            </div>
            <div class="evtCtnsBox evt01" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2822_01.jpg" alt="연간 커리큘럼"/>
            </div>
            <div class="evtCtnsBox evt02_01" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2822_02_01.jpg" alt="선착순 1000명"/>
            </div>
        @endif

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2822_03.jpg" alt="선착순 1000명"/>
        </div>

        {{-- 핫클립 상품 Box(ajax data) evt03--}}
        <div id="hotclip_box"></div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2822_04.jpg" alt="초심을 잃지 마세요~!"/>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black"><span>[ 필독 ]</span> 연간 패키지 수강 시 유의 사항</h4>
                <ul>
                    <li>본 연간 패키지 상품의 수강 기간은 아래와 같으며, 동영상 강의의 경우 수강 기간 중 “일시중지” 및 (유료)연장＂을 할 수 없습니다.
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>구분</th>
                            <th>학원 직강</th>
                            <th>동영상 강의</th>
                        </tr>
                        <tr>
                            <td>유초등</td>
                            <td>~ 2023년 11월 까지</td>
                            <td>수강일로부터 365일</td>
                        </tr>
                        <tr>
                            <td>중등</td>
                            <td>~ 2023년 11월 까지</td>
                            <td>~ 2023. 11. 30. 까지</td>
                        </tr>
                    </table> 

                    </li>
                    <li>본 패키지 상품의 수강 기간은 아래와 같으며, 수강 기간 중 “일시중지” 및 “(유료)연장＂은 할 수 없습니다. <br>
                        * 유.초등 : 수강일로부터 365일      * 중등: 2022년 11월30일까지 </li>
                    <li>본 패키지는 1차 대비 강의만 포함됩니다. (2차대비 강의는 별도 수강)</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가하며, 위반 시 처벌 받을 수 있습니다.</li>
                </ul>

                <h5>[연간 패키지 환불 규정 ]</h5>
                <ul>
                    <li>수강신청(결제완료) 후, 개강 전에는 전액 환불 가능합니다. (단, 개강전이지만 예습용 강의를 제공받은 경우 환불금액이 공제될 수 있습니다)</li> 
                    <li>학원에 오셔서 신용카드로 방문 결제하신 경우에는 학원에 방문하셔서 취소할 수 있습니다. (결제한 신용카드, 신용카드 영수증 반드시 지참)</li>
                    <li>기타 패키지 강의 환불 문의 및 신청은 홈페이지 1:1 상담 게시판을 통하여 가능합니다.</li>
                    <li>연간패키지 수강할 때, 제공 받은 경품이 있다면 제세공과금이 포함된 경품비용이 추가 공제 됩니다. (자세한 사항은 경품 제공 시 문자 안내됩니다.) </li>
                    <li>본 패키지 강의의 환불은 학원의 설립·운영 및 과외 교습소에 관한 법률 18조 (동 시행령)에 따라 진행됩니다.</li>
                    <li>본 연간패키지 상품은 할인이 적용된 상품으로 할인 전 원 수강료를 기준으로 환불하는 것을 원칙으로 합니다.</li>
                </ul>

                <p><span>교습개시 이후, 학원 직강의 환불 규정</span></p>
                <ul>
                    <li>학원 직강의 교습기간이 1개월 이내인 경우
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <th>교습시간의 ⅓ 경과 전</th>
                                <td>1개월 교습비의 ⅓에 해당하는 금액 공제 후 나머지 환불 </td>
                            </tr>
                            <tr>
                                <th>교습시간의  ½ 경과 전</th>
                                <td>1개월 교습비의 ⅓에 해당하는 금액 공제 후 나머지 환불 </td>
                            </tr>
                            <tr>
                                <th>교습시간의 ½ 경과 후</th>
                                <td>해당월의 교습비는 환불 금액 없음 </td>
                            </tr>
                        </table> 
                    </li>
                    <li>교습기간이 1개월을 초과하는 경우에는, 반환 사유가 발생한 월의 환불 공제 금액을 차감한 후,  나머지 교습비를 반환 받을 수 있습니다. <br>
                    (단과의 묶음으로 구성된 패키지 강의 환불시에는 기 수강한 단과금액의 원 수강료를 공제하고 환불이 받을 수 있습니다.)</li>
                </ul>

                <p><span>교습개시 이후, 동영상강의 환불 규정</span></p>
                <ul>
                    <li>패키지 강의의 환불은 강좌의 원 금액을 기준으로 공제가 됩니다.</li>
                    <li>본 페이지의 연간패키지 강좌는 이용기간 기준의 패키지 상품으로 환불 시에는 “<span class="tx-red">(수강료)결제금액 - (강좌 정상가의 1일 이용대금×이용일수)</span>”의 기준으로 환불 받을 수 있습니다.<br>
                    ※ 이용일수란? 강의 시작(결제일)일로 부터 환불을 요청하신 날까지 경과된 일수를 의미합니다.</li>
                    <li>‘결제 7일 이내’ 맛보기 강의 제외, 2강 이하 수강 시에는 전액 환불 가능합니다.</li>
                    <li>‘결제 7일 이내’ 2강 이상 수강 시에는 경과 일수만큼 일할 공제 후 부분 환불됩니다.</li>
                </ul>
            </div>
        </div>

        {{--교수 youtube 팝업 --}}
        <div id="youtube" class="willbes-Layer-youtube">
            <div class="popupWrap">
                <a class="closeBtn" href="javascript:void(0);" onclick="closeWin('sec-prof-layer'),closeWin('youtube')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <iframe src="https://www.youtube.com/embed/Y2W3lUrn3aI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            var _url = '{!! front_url('/promotion/ajaxHotClipProduct/'.$arr_base['promotion_code']) !!}';
            _url += '?online_disc_code={{ (empty($arr_promotion_params["online_disc_code"]) === false ? $arr_promotion_params["online_disc_code"] : '') }}';
            _url += '&off_disc_code={{ (empty($arr_promotion_params["off_disc_code"]) === false ? $arr_promotion_params["off_disc_code"] : '') }}';
            sendAjax(_url, '', function(ret) {
                $('#hotclip_box').html(ret);
            }, null, false, 'GET', 'html');
        });
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>
@stop