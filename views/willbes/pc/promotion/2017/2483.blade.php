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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#002643;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_02_bg.jpg) no-repeat center top;}

        .evt03 {width:1120px; margin:0 auto; padding:100px 0; display: flex; justify-content: space-between;}

        .ssam-Lnb {
            width: 300px;
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
            background:#e4e4e4 url("https://static.willbes.net/public/images/promotion/2021/12/2438_arrowDown.png") no-repeat 90% center;
        }
        .ssam-Lnb .lnb-List .ssam-lnb-List-Tit.hover a {
            color: #0d74ae;
            background-image: url("https://static.willbes.net/public/images/promotion/2021/12/2438_arrowUp.png");
        }

        .ssam-Lnb .lnb-List .lnb-List-Depth {
            display: none;
            background: #fff;            
            border-top: 1px solid #b2b2b2;
            border-bottom: 1px solid #ececec;
        }
        .ssam-Lnb .lnb-List .lnb-List-Depth dl dt a {
            display: block;
            font-size: 16px;
            color: #3a3a3a;
            padding:15px 20px;
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
        .tabCts .pkgBuy strong {display:block; font-size:18px}

   
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

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_04_bg.jpg) no-repeat center top;}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2438_05_bg.jpg) no-repeat center top;}

        .evtInfo {padding:80px 0; background:#fff; color:#242424; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox h4 span {color:#e30000}
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
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_02.jpg" alt="특별이벤트"/>
        </div>

        {{-- 핫클립 상품 Box(ajax data) evt03--}}
        <div id="hotclip_box"></div>

        {{--
        <div class="evtCtnsBox evt03">
            <div class="ssam-lnb"></div>
            <div class="tabCts">
                <div class="buyWrap">
                    <h4 class="NSK-Black">· 2023학년도 대비  연간패키지 신청내역</h4>
                    <div class="basket">
                        <div class="lecbox" id="order_box_off">
                            <h5><strong>학원직강 연간패키지</strong> 신청내역</h5>
                            <ul>
                                <li>
                                    <strong>민정선</strong> 2022 유아 직강 영상반 연간 패키지 (논술 미포함 구성, 논술은 본 패키지 신청 후 추가 결제 하시면 됩니다.) <a href="javascript:void(0);" class="btn-order-delete" data-learn-pattern="off" data-prod-code="188935"> <img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a>
                                    <div class="price">1,330,000원 → <strong>1,197,000원</strong> <span>(133,000원 할인)</span></div>
                                </li>
                                <li>
                                    <strong>민정선</strong> 2022 유아 직강 영상반 연간 패키지 (논술 미포함 구성, 논술은 본 패키지 신청 후 추가 결제 하시면 됩니다.) <a href="javascript:void(0);" class="btn-order-delete" data-learn-pattern="off" data-prod-code="188935"> <img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a>
                                    <div class="price">1,992,000원 → <strong>1,992,000원</strong> <span>(0원 할인)</span></div>
                                </li>
                            </ul>
                            <div>                                
                                <p><strong class="prod-cnt">1과목</strong> 총 결제금액 <strong class="sale-price">1,280,000</strong>원</p>
                                <p class="expt-disc">총 133,000할인</p>
                                <p><a href="javascript:void(0);" onclick="javascript:directPay('off'); return false;">결제하기</a></p>
                            </div>
                        </div>
                        <div class="lecbox" id="order_box_online">
                            <h5><strong>동영상강의 연간패키지</strong> 신청내역</h5>
                            <ul>
                                <li>
                                    <strong>민정선</strong> 2022 민쌤의 유아 임용 연간 패키지 (논술 미포함) <a href="javascript:void(0);" class="btn-order-delete" data-learn-pattern="online" data-prod-code="188919"> <img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a>
                                    <div class="price">1,330,000원 → <strong>1,197,000원</strong> <span>(133,000원 할인)</span></div>
                                </li>
                                <li>
                                    <strong>민정선</strong> 2022 민쌤의 유아 임용 연간 패키지 (논술 포함) <a href="javascript:void(0);" class="btn-order-delete" data-learn-pattern="online" data-prod-code="188914"> <img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제"></a>
                                    <div class="price">1,992,000원 → <strong>1,992,000원</strong> <span>(0원 할인)</span></div>
                                </li>
                            </ul>
                            <div>                                
                                <p><strong class="prod-cnt">2과목</strong> 총 결제금액 <strong class="sale-price">2,778,000</strong>원</p>
                                <p class="expt-disc">총 0할인</p>
                                <p><a href="javascript:void(0);" onclick="javascript:directPay('online'); return false;">결제하기</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="tx-red tx16 strong mb20" style="line-height: initial">
                        * 학원직강과 동영상강의를 각각 신청하는 경우에는 할인 적용 및 동시 결제가 불가합니다.
                        <br>* 학원직강과 동영상강의를 각각 신청하고자 하는 경우, 할인 적용을 위해서는 한가지 방법으로 결제하고, 추후<br><span class="ml10">1:1상담 게시판을 통하여 변경 신청해 주시기 바랍니다.</span>
                    </div>
                    <div class="checkWrap"><input type="checkbox" id="is_chk" name="is_chk" value="Y"> <label for="is_chk">페이지 하단의 상품 관련 유의사항을 모두 확인하였고, 이에 동의합니다.</label></div>
                </div>
            </div>
        </div>
        --}}

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_04.jpg" alt="초심을 잃지 마세요~!"/>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2438_05.jpg" alt="합격 패키지"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black"><span>[ 필독 ]</span> 연간 패키지 수강 시 유의 사항</h4>
                <ul>
                    <li>본 패키지는 교육학과 전공 동시 수강 시, 교육학의 추가 10%할인 혜택이 있습니다. (정현 교육학 제외) </li>
                    <li>본 패키지 상품의 수강 기간은 아래와 같으며, 수강 기간 중 “일시중지” 및 “(유료)연장＂은 할 수 없습니다. <br>
                        * 유.초등 : 수강일로부터 365일      * 중등: 2022년 11월30일까지 </li>
                    <li>본 패키지는 1차 대비 강의만 포함됩니다. (2차 강의는 별도 수강)</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가하며, 위반 시 처벌 받을 수 있습니다. </li>                    
                </ul>
                <h5>[선착순 1,000명 이벤트]</h5>  
                <ul>
                    <li>문화상품권 지급 이벤트는 2021년 12월 31일(금) 17시까지 본 페이지에 게시된 강의 접수자에 한하여 지급합니다. (한시적 이벤트)</li>
                    <li>지급 대상자가 접수 순서에 의하여 1,000명이 초과하면 본 이벤트는 종료합니다.  (선착순 1,000명 도달 시, 이벤트 종료)</li>
                    <li>본 이벤트 페이지에 등록된 과목의 패키지 강의 결제 시에만 카운트 됩니다. (가상 계좌의 경우, 임금 완료 순)</li>
                    <li>문화상품권 지급 이벤트 당첨자들에게는 1월 중순 이후 개별적으로 문자발송 드릴 예정입니다.</li>
                    <li>문화상품권 수령을 위해서는 세금 소득신고를 위한 수령자의 주민번호를 요청할 수 있습니다. (본인 입력방식)</li>
                    <li>문화상품권은 윌비스 홈페이지의 회원정보에 작성한 전화번호를 통하여 문자로 발송됩니다.</li>
                    <li>휴대폰 번호 기재 오류로 인한 피해는 본사에서 책임지지 않습니다. </li>                     
                </ul>
                <h5>[환불 규정]</h5>  
                <ul>
                    <li>패키지 강의의 환불은 수강기간, 수강 여부, 자료 다운 유무 등에 따라 금액을 공제하며, 강좌의 원 금액을 기준으로 공제가 됩니다.</li>
                    <li>패키지 강의 환불 신청은 홈페이지 1:1게시판을 통하여 가능합니다.</li>
                    <li>문화상품권 수령 후, 패키지 강의 환불을 요청하실 때에는 받으신 문화상품권에 대한 금액은 차감 됩니다. (제세공과금이 포함된 금액 차감)</li>                     
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
            var _url = '{!! front_url('/promotion/ajaxHotClipProduct_test') !!}';
            _url += '?online_disc_code={{ (empty($arr_promotion_params["online_disc_code"]) === false ? $arr_promotion_params["online_disc_code"] : '') }}';
            _url += '&off_disc_code={{ (empty($arr_promotion_params["off_disc_code"]) === false ? $arr_promotion_params["off_disc_code"] : '') }}';
            sendAjax(_url, '', function(ret) {
                $('#hotclip_box').html(ret);
            }, null, false, 'GET', 'html');
        });
    </script>
@stop