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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_top_bg.jpg) no-repeat center;}

        .evtLec { padding-bottom:100px;}        
        .evtlecBox_A {width:1020px; margin:0 auto; text-align:center; display: flex; flex-wrap: wrap; justify-content: space-between;}     
        .evtlecBox_A .lec {margin:0 10px; }
        .evtlecBox_A .lec:nth-child(1) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t01.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(2) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t02.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(3) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t03.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(4) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t04.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(5) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t05.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(6) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t06.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(7) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t07.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(8) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t08.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(9) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t09.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(10) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t10.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(11) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t11.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec:nth-child(12) {background:url(https://static.willbes.net/public/images/promotion/2022/08/2736_t12.jpg) no-repeat right bottom;}
        .evtlecBox_A .lec label {border:1px solid #c9c9c9; text-align:left; font-size:16px; width:490px; height:229px; padding:25px 30px; box-sizing:border-box; display:inline-block; position:relative}
        .evtlecBox_A .lec .txt01 {font-size:24px; color:#000; margin-bottom:5px; font-weight:600}
        .evtlecBox_A .lec .txt02 {font-size:27px; color:#4f26e7; margin-bottom:20px; font-weight:600}
        .evtlecBox_A .lec .txt03 {}
        .evtlecBox_A .lec .apply {position: absolute; bottom:30px}
        .evtlecBox_A .txt03 a {display:inline-block; padding:5px 10px; color:#000; border:1px solid #000; font-size:14px; margin-bottom:5px}
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
        .evtInfoBox h4 span {color:#FFFF00; vertical-align: top;}
        .evtInfoBox h5 {font-size:18px; margin-bottom:10px; font-weight:bold;color:#fff;}
        .evtInfoBox ul {margin-bottom:30px;color:#fff;}     
        .evtInfoBox li {list-style-type: decimal;margin-left:30px; margin-bottom:10px}

        .willbes-Layer-CurriBox {top:2800px; margin-left: -560px;}

        .ssam .willbes-Layer-youtube {
            display: none;
        }
        .ssam .willbes-Layer-youtube .popupWrap {
            display:flex; justify-content: center;align-items: center;
            background:#000;
            position: absolute;
            top: 2800px;
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

    @php
        $arr_product = [

        ];

        $arr_product = [
            [
                'prod_type' => '1'
                ,'title' => '이경범 교육학'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/KCX6VS8WyHc'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '51019' : '51312'
                    ]
                ]
                ,'prof_name' => '이경범 교육학'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159817' : '194596'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '1900000'
                ,'expt_disc_price' => '950000'
                ,'expt_disc_rate' => '50'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '1'
                ,'title' => '송원영 전공국어'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/V4B8cUDEXik'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '51026' : '51336'
                    ]
                ]
                ,'prof_name' => '송원영 전공국어'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159818' : '194366'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '1700000'
                ,'expt_disc_price' => '850000'
                ,'expt_disc_rate' => '50'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '구동언 전공국어'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/rNslov8PzaY'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50969' : '51084'
                    ],
                    [
                        'youtube' => 'https://www.youtube.com/embed/Jv0C0NI9OHA'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50970' : '51085'
                    ]
                ]
                ,'prof_name' => '구동언 전공국어'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159819' : '194586'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '4430000'
                ,'expt_disc_price' => '1550000'
                ,'expt_disc_rate' => '65'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '김영문 전공영어'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/7L0WiPrb5xk'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '51013' : '51316'
                    ]
                ]
                ,'prof_name' => '김영문 전공영어'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159820' : '194600'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2490000'
                ,'expt_disc_price' => '1245000'
                ,'expt_disc_rate' => '50'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '허역팀 전공일반사회'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/FXGg_Och9Uo'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '51022' : '51315'
                    ]
                ]
                ,'prof_name' => '허역팀 일반사회'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159821' : '194604'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2880000'
                ,'expt_disc_price' => '1440000'
                ,'expt_disc_rate' => '50'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '김종권 전공역사'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/mZDUnozVMB8'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50976' : '51091'
                    ]
                ]
                ,'prof_name' => '김종권 역사'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159822' : '194602'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2690000'
                ,'expt_disc_price' => '1200000'
                ,'expt_disc_rate' => '55'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '김철홍 전공수학'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/mZDUnozVMB8'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50976' : '51091'
                    ]
                ]
                ,'prof_name' => '김철홍 전공수학'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159823' : '194603'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2990000'
                ,'expt_disc_price' => '1200000'
                ,'expt_disc_rate' => '59'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '박태영 수학교육론'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/mZDUnozVMB8'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50976' : '51091'
                    ]
                ]
                ,'prof_name' => '박태영 수학교육론'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159823' : '194603'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2990000'
                ,'expt_disc_price' => '1200000'
                ,'expt_disc_rate' => '59'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '김현웅 전공수학'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/mZDUnozVMB8'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50976' : '51091'
                    ]
                ]
                ,'prof_name' => '김현웅 전공수학'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159823' : '194603'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2990000'
                ,'expt_disc_price' => '1200000'
                ,'expt_disc_rate' => '59'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '박혜향 수학교육론'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/mZDUnozVMB8'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50976' : '51091'
                    ]
                ]
                ,'prof_name' => '박혜향 수학교육론'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159823' : '194603'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2990000'
                ,'expt_disc_price' => '1200000'
                ,'expt_disc_rate' => '59'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '장영희 전공중국어'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/mZDUnozVMB8'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50976' : '51091'
                    ]
                ]
                ,'prof_name' => '장영희 전공중국어'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159823' : '194603'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2990000'
                ,'expt_disc_price' => '1200000'
                ,'expt_disc_rate' => '59'
                ,'multiple_apply' => '1.2'
            ],
            [
                'prod_type' => '2'
                ,'title' => '최김민응 전공도덕윤리'
                ,'button' => [
                    [
                        'youtube' => 'https://www.youtube.com/embed/mZDUnozVMB8'
                        ,'prof_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '50976' : '51091'
                    ]
                ]
                ,'prof_name' => '김민응 전공도덕윤리'
                ,'prod_code' => (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') ? '159823' : '194603'
                ,'prod_name' => '막판역전 FULL PASS'
                ,'expt_pay_price' => '2990000'
                ,'expt_disc_price' => '1200000'
                ,'expt_disc_rate' => '59'
                ,'multiple_apply' => '1.2'
            ]
        ];
    @endphp

    <div class="p_re evtContent NSK ssam" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">           
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2736_top.jpg"  alt="막판역전 풀패스" />        
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2736_01.jpg" alt="준비가 필요한 이유"/>
        </div>

        <div class="evtCtnsBox evtLec" id="evtLec" data-aos="fade-up">
            <div class="evtlecBox_A">
                @foreach($arr_product as $row)
                    <div class="lec">
                        <label>
                            <div class="txt01">{{$row['title']}}</div>
                            <div class="txt02">{{$row['prod_name']}}</div>
                            <div class="txt03">
                                @foreach($row['button'] as $index => $buttons)
                                    {!! ($loop->first === false) ? '<br>' : '' !!}
                                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'); fnOpenProfCurriculum('{{$buttons['prof_code']}}'); return false;">커리큘럼 확인</a>
                                    <a href="javascript:void(0);" onclick="fnOpenYoutube('{{$buttons['youtube']}}'); return false;">설명회 보기</a>
                                @endforeach
                            </div>
                            <div class="apply">
                                <input class="btn-add-product prod-type-{{$row['prod_type']}}" type="checkbox" name="productCode"
                                   data-prod-type="{{$row['prod_type']}}" data-prof-name="{{$row['prof_name']}}"
                                   data-learn-pattern="615003" data-prod-code="{{$row['prod_code']}}" data-prod-name="{{$row['prod_name']}}"
                                   data-expt-pay-price="{{$row['expt_pay_price']}}" data-expt-disc-price="{{$row['expt_disc_price']}}"
                                   data-expt-disc-rate="{{$row['expt_disc_rate']}}" data-multiple-apply="{{$row['multiple_apply']}}"> 신청하기
                            </div>
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="evtlecBox_B" id="order_box_online">
                <h5><span>2023학년도 대비 막판역전 FULL PASS</span> 수강신청 내역</h5>
                <div class="lec">
                    {{--<div><span class="tx-blue">[이경범 교육학]</span> 막판역전 FULL PASS / 1.2배수 <span class="price">(정가)1,900,000원 <strong>50%할인</strong></span></div>
                    <div><span class="tx-blue">[허역팀 일반사회]</span> 막판역전 FULL PASS / 1.2배수 <span class="price">(정가)2,490,000원 <strong>50%할인</strong></span></div>--}}
                </div>
                <div class="total NSK-Black">총 결제금액 : <span class="prod-cnt">-과목 </span> / <span class="sale-price"> -원</span></div>
                <div class="buy">
                    <label><input type="checkbox" id="is_chk" name="is_chk" value="Y"> 페이지 하단의 상품 관련 유의사항을 모두 확인하였고, 이에 동의합니다.</label>
                    <a href="javascript:void(0);" onclick="directPay('online'); return false;">결제하기</a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2736_02.jpg" alt="풀패스로 도전하세요"/>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black"><span>막판역전 FULL PASS </span> 상품 이용안내 및 유의사항</h4>
                <ul>
                    <li>본 패키지는 2022년 11월 30일까지 1차 시험대비 연간 정규 전강좌를 온라인으로 수강할 수 있는 상품입니다. (2차대비는 포함하지 않음)</li>
                    <li>본 패키지는 파격적인 할인 상품으로 1배수로 제공됩니다.</li>
                    <li>본 패키지의 상품 구성 및 커리큘럼은 변경 될 수 있습니다.</li>
                    <li>본 패키지의 수강 기간 중 “일시중지” 및 “(유료)연장＂은 할 수 없습니다.</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가하며, 위반 시 처벌 받을 수 있습니다.</li>
                </ul>
                <h5>[환불 규정]</h5>
                <ul>
                    <li>본 패키지 강의의 환불은 수강기간, 수강 여부, 자료 다운 유무 등에 따라 금액을 공제하며, 강좌의 원 수강료 기준으로 공제가 됩니다.</li>
                    <li>본 패키지 강의 환불 신청은 홈페이지 1:1게시판을 통하여 가능합니다.</li>
                </ul>
            </div>
        </div>

        {{--교수 커리큘럼 팝업 --}}
        <div id="curriculum_box" class="willbes-Layer-CurriBox"></div>

        {{--교수 youtube 팝업 --}}
        <div id="youtube" class="willbes-Layer-youtube">
            <div class="popupWrap">
                <a class="closeBtn" href="javascript:void(0);" onclick="fnCloseYoutube()">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <iframe src="" id="youtube_frame" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div id="sec-prof-layer" class="willbes-Layer-Black"></div>
    </div>
   <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

    <div id="order_div_online" style="display: none"></div>
    <form name="exptpay_form_online" id="exptpay_form_online">
        {!! csrf_field() !!}
    </form>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-add-product").on('click', function () {
                var this_learn_pattern = ($(this).data("learn-pattern") == '615007') ? 'off' : 'online';
                var this_prod_type = $(this).data("prod-type");
                var this_prod_code = $(this).data("prod-code");
                var this_prof_name = $(this).data("prof-name");
                var this_prod_name = $(this).data("prod-name");
                var this_expt_pay_price = $(this).data("expt-pay-price");
                var this_expt_disc_price = $(this).data("expt-disc-price");
                var this_expt_disc_rate = $(this).data("expt-disc-rate");
                var this_multiple_apply = $(this).data("multiple-apply");
                var param_check = $("#exptpay_form_"+this_learn_pattern).find('#_exptpay_'+this_prod_code).val();

                if ($(".prod-type-"+this_prod_type+":checked").length > 1) {
                    $(".prod-type-"+this_prod_type).prop('checked',false);
                    $(this).prop('checked',true);
                    $(".box-type-"+this_prod_type).remove();
                }

                if (typeof param_check === 'undefined') {
                    $("#exptpay_form_"+this_learn_pattern).append('<input class="box-type-'+this_prod_type+'" type="hidden" name="prod_code[]" id="_exptpay_' + this_prod_code + '" value="' + this_prod_code + '" data-expt-pay-price="'+this_expt_pay_price+'" data-expt-disc-price="'+this_expt_disc_price+'" data-expt-disc-rate="'+this_expt_disc_rate+'"/>');
                    $("#order_div_"+this_learn_pattern).append('<input class="box-type-'+this_prod_type+'" type="checkbox" name="y_pkg" id="_order_' + this_prod_code + '" value="' + this_prod_code + '" checked="checked"/>');
                    var html = '<div class="box-type-'+this_prod_type+'" id=prod_box_'+this_prod_code+'>';
                    html += '<span class="tx-blue">['+this_prof_name+']</span> ';
                    html += this_prod_name+' / '+this_multiple_apply+'배수';
                    html += '<span class="price target-price" id="_price_'+this_prod_code+'"></span>';
                    html += '</div>';
                    $("#order_box_"+this_learn_pattern+" > .lec").append(html);
                    getExptPayPrice(this_learn_pattern);
                }

                // 체크해제(상품삭제)
                if ($(this).is(":checked") === false) {
                    $("#exptpay_form_"+this_learn_pattern).find('#_exptpay_'+this_prod_code).remove();
                    $("#order_div_"+this_learn_pattern).find('#_order_'+this_prod_code).remove();
                    $("#prod_box_"+this_prod_code).remove();
                    getExptPayPrice(this_learn_pattern)
                }
            });
        });

        function getExptPayPrice(learn_pattern) {
            var prod_cnt = $("#exptpay_form_"+learn_pattern).find("input[name='prod_code[]']").length;
            if (prod_cnt > 0) {
                var target_prod_html = '';
                var sale_price = 0;
                $.each($("#exptpay_form_"+learn_pattern).find("input[name='prod_code[]']"), function (index, item) {
                    target_prod_html = '(정가)'+parseInt($(this).data("expt-pay-price")).toLocaleString()+'원 ';
                    target_prod_html += '<strong>'+$(this).data("expt-disc-rate")+'%할인</strong>';
                    $("#_price_"+$(this).val()).html(target_prod_html);
                    sale_price += parseInt($(this).data("expt-disc-price"));
                });
                $("#order_box_"+learn_pattern).find('.prod-cnt').text(prod_cnt+'과목');
                $("#order_box_"+learn_pattern).find('.sale-price').text(parseInt(sale_price).toLocaleString()+'원');
            } else {
                $("#order_box_"+learn_pattern).find('.expt-disc').text('-할인');
                $("#order_box_"+learn_pattern).find('.prod-cnt').text('-과목');
                $("#order_box_"+learn_pattern).find('.sale-price').text('-원');
            }
        }

        function directPay(_learn_pattern)
        {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', 'Y') !!}

            var prod_cnt = $("#exptpay_form_"+_learn_pattern).find("input[name='prod_code[]']").length;
            var cart_type = '', learn_pattern = '', is_direct_pay = '', cart_onoff_type = '';
            if (_learn_pattern == 'off') {
                cart_type = 'off_lecture';
                learn_pattern = 'off_pack_lecture';
                is_direct_pay = 'Y';
                cart_onoff_type = 'off';
            } else {
                cart_type = 'on_lecture'
                learn_pattern = 'adminpack_lecture'
                is_direct_pay = 'Y'
                cart_onoff_type = '';
            }

            if (prod_cnt <= 0) {
                alert('결제할 상품을 선택해주세요.');
                return;
            }

            if ($("#is_chk").is(':checked') === false) {
                alert('상품 관련 유의사항 안내에 동의하셔야 합니다.');
                return;
            }

            //결제하기
            goCartNDirectPay('order_div_'+_learn_pattern, 'y_pkg', cart_type, learn_pattern, is_direct_pay, cart_onoff_type);
        }

        function fnOpenProfCurriculum(prof_idx) {
            var ele_id = 'curriculum_box';
            var _url = '{{ front_url('/professor/layerCurriculum/prof-idx/') }}'+prof_idx;
            var data = {
                'ele_id' : ele_id,
                'close_id' : 'sec-prof-layer'
            }
            sendAjax(_url, data, function(ret) {
                console.log(ret);
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        }

        function fnOpenYoutube(url) {
            var youtube_url = url + '?' + 'enablejsapi=1&version=3&playerapiid=ytplayer';
            $("#youtube_frame").attr('src',youtube_url);
            openWin('sec-prof-layer');
            openWin('youtube');
        }
        function fnCloseYoutube() {
            $('#youtube_frame')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $("#youtube_frame").attr('src',"");
            closeWin('sec-prof-layer')
            closeWin('youtube');
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop