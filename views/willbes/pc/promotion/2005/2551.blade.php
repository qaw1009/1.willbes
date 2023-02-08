@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        /*타이머*/
        .time {width:1120px; margin:0 auto; text-align:center; padding:20px 0}
        .time ul {width:100%; display:flex; justify-content: center;}
        .time li {line-height:61px; font-size:24px; margin-right:10px; position: relative;}
        .time li:first-child,
        .time li:last-child {line-height:2.5; color:#363635}
        .time li:first-child {margin-right:20px}
        .time li:last-child {margin-left:20px}
        .time li:first-child span {color:#C82F25}        
        .time li:last-child span {color:#363635;font-weight:bold;} 
        .time li:last-child a {display:block; color:#fff; background:#242424; padding:10px 20px; margin-top:20px}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time .d_day {color:#fff;font-size:30px;}

        .evt_top {background:#0C1D23 url(https://static.willbes.net/public/images/promotion/2022/02/2551_top_bg.jpg) no-repeat center top; position: relative;}
        .evt_top span {position:absolute; left:50%; margin-left:-560px; top:-50px; width:195px; z-index: 2;}
        .evt_01 {background:#e51629}

        .evt_02 {width:1120px; margin:0 auto; padding:150px 0}
        .evt_02 h4 {font-size:50px; margin-bottom:30px; color:#2d2d35}
        .evt_02 a {display:block; margin-bottom:30px}

        .evt_apply {padding:100px 0 50px; width:1120px; margin:auto}
        .evt_apply .tabs {display:flex; margin-bottom:20px;flex-direction: row;}
        .evt_apply .tabs a {font-size:19px; text-align:center; display:block; width:25%; background:#333; color:#fff; padding:25px 0;line-height:25px;}
        .evt_apply .tabs a.active {background:#e5162a; color:#fff;}
        .evt_apply .tabs a strong {color:#cf1425}

        /* 이용안내 */
        .evtInfo {padding:50px 0 100px; background:#fff; color:#000; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:50px; text-align:left; word-break:keep-all;border:2px solid #000;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd span {color:#FF1D1D;vertical-align:top;font-weight:bold;}
        .guide_box dd:last-child {margin:0}

        /************************************************************/

    </style> 

	<div class="evtContent NSK"> 
        <div class="evtCtnsBox" data-aos="fade-down">      
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li>
                        <span>마감까지 남은시간</span>
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        <span class="NSK">남았습니다.</span>                        
                    </li>          
                </ul>
            </div> 
        </div>  
        
		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2551_top.jpg" alt="황종휴 경젱학"/>
            <span  data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/02/2551_top_img.png" alt="황종휴 경젱학"/></span>
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2551_01.jpg" alt="특별혜택"/>            
		</div>

        <div class="evtCtnsBox evt_apply" data-aos="fade-up">
            <div class="tabs NSK-Black">
                <a href="#tab01" class="active">5급/외교원 예비순환</a>
                <a href="#tab02">5급/외교원 GS1순환</a>
                <a href="#tab03">5급/외교원 GS2순환</a>
                <a href="#tab04">PSAT/5급 헌법</a>            
            </div>

            <div id="tab01" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif
            </div>

            <div id="tab02" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif
            </div>

            <div id="tab03" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif
            </div>

            <div id="tab04" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
                @endif
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">새로운 시작! 새봄맞이 동영상 이벤트 </h2>
                <dl>
                    <dt>이벤트내용 : 이벤트페이지에서 결제시 자동적용</dt>
                    <dd>
                        <ol>    
                            <li>예비순환 :<br>
                                - 이벤트기간 결제시 : 20%할인<br>
                                - 2강좌이상결제시 : 약25%할인<br>
                                - 3강좌이상결제시 약30%할인</li>
                            <li>GS1순환<br>
                            - 이벤트기간 결제시 : 20%할인<br>
                            - 2강좌이상결제시 : 약25%할인<br>
                            - 3강좌이상결제시 약30%할인</li>
                            <li>GS2순환<br>
                            - 이벤트기간 결제시 : 40%할인</li>
                            <li>PSAT<br>
                            - 이벤트기간 결제시 : 15%할인<br>
                            - 2강좌이상결제시 : 약20%할인<br>
                            - 3강좌이상결제시 약30%할인</li>
                            <li>5급헌법<br>
                            - 이벤트기간 : 40%할인
                            </li>
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>본상품은 이벤트 진행강의로 강의환불시 동영상 단가 정가금액과 원수강일수기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다.<br>
                            다만, 원수강일수가 지난 강의는 환불이 되지 않습니다. 기타 환불규정은 약관의 규정에 따릅니다.</li>
                            <li>본 이벤트는 복지할인쿠폰 등 다른 쿠폰과 중복적용되지 않습니다.</li>                                       
                        </ol>
                    </dd>
                    <dt>수강 시작일</dt>
                    <dd>
                        <ol>
                            <li>수강시작일은 30일 범위내에서 설정 가능하시며, 수강시작일 변경을 원하실 경우 동영상 게시판에 글을 남겨주시면 90일 범위내에서 변경하여 드리겠습니다. 본 이벤트는 내부사정에 의해 사전공지없이 종료 또는 변경될 수 있습니다.</li>                                  
                        </ol>
                    </dd>
                    <dt>기기대수 제한 및 배수 제한</dt>
                    <dd>
                        <ol>
                            <li>새봄맞이 이벤트 강의는 아래와 같이 기기대수제한 및 강의배수제한규정이 적용됩니다.</li>
                            <li><span>기기대수제한 2대</span> (PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대)<br>
                            * PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능)
                            </li>
                            <li>강의배수제한 : <span>GS2순환 강의는 강의배수 1.2배수 제한규정이 적용</span>됩니다.</li>
                        </ol>
                    </dd>                   
                </dl>
            </div>
        </div>

	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {   
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabs a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabs a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });

            /*디데이*/
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');

            AOS.init();
        });
               
    </script>
    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop