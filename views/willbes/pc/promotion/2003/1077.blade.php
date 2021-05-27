@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        br { font-family:dotum;} 

        /************************************************************/

        .wb_top {position:relative; background:#222 url(https://static.willbes.net/public/images/promotion/2020/10/1077_top_bg.png) no-repeat center top}
        .wb_cts01 {background:#eee}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#d17f5a}
        .wb_cts04 {position:relative; background:#222}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:6px}

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/1077_top.png" >
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168368') }}" target="_blank" title="헌법" style="position: absolute; left: 3.93%; top: 84.76%; width: 22.5%; height: 5.63%; z-index: 2;"></a>
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168367') }}" target="_blank" title="행정법" style="position: absolute; left: 28.48%; top: 84.76%; width: 21.88%; height: 5.63%; z-index: 2;"></a>
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168366') }}" target="_blank" title="헌법,행정법" style="position: absolute; left: 53.04%; top: 84.76%; width: 21.88%; height: 5.63%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_01.png" >
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_02.png" >
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_03.png" >
        </div>

        <div class="evtCtnsBox wb_cts04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/1077_04.jpg">
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168368') }}" target="_blank" title="헌법"  style="position: absolute; left: 70.45%; top: 68.8%; width: 19.02%; height: 6.39%; z-index: 2;"></a>
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168367') }}" target="_blank" title="행정법"style="position: absolute; left: 70.45%; top: 75.86%; width: 19.02%; height: 6.39%; z-index: 2;"></a>
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168366') }}" target="_blank" title="헌법,행정법" style="position: absolute; left: 70.45%; top: 83.02%; width: 19.02%; height: 6.39%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="tip">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내 및 유의사항</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>제공과정 : 2021~2022 대비 황남기 헌법/행정법 전 과정</li>
                            <li>본 상품의 수강기간은 수강신청 상세 안내 화면에 표기된 기간만큼 제공됩니다.</li>
                            <li>개강 일정 및 교수님 사정에 따라 커리큘럼의 변동이 있을 수 있습니다.</li>
                            <li> 본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>기기제한</dt>
                    <dd>
                        <ol>
                            <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                            </li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최초 1회에 한해 [내강의실]-[등록기기정보]에서 직접 초기화 가능하며,<br>
                                그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006이나 1:1상담게시판으로 문의바랍니다.
                            </li>
                        </ol>
                    </dd>

                    <dt>수강안내</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>
                            <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>결제/환불</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                            <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                            <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                                - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)
                            </li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                        </ol>
                    </dd>
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>

    </div>
    <!-- End Container -->
@stop