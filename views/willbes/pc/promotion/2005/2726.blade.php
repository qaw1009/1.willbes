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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        /*타이머*/
        .timeBox {background:#222}
        .time {width:980px; margin:0 auto; text-align:center;}
        .time {text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:30px; margin-right:10px;}
        .time li:first-child {margin-left:80px}
        .time li img {width:44px}
        .time .time_txt {color:#fff; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; vertical-align:top}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }  

        .evt_top {background:#0C1D23 url(https://static.willbes.net/public/images/promotion/2022/07/2726_top_bg.jpg) no-repeat center top; height:1263px}
        .evt_top span {position:absolute; left:50%;}
        .evt_top span.img01 {top:168px; margin-left:-550px}
        .evt_top span.img02 {top:455px; margin-left:400px}
        .evt_top span.img03 {top:685px; margin-left:-520px}

        .evt_01 .wrap {padding:20px 0 150px; display:flex}
        .evt_01 .wrap a {display:block; margin:0 1%; width:48%; text-align:center; font-size:30px; background:#0accc9; color:#fff; padding:30px 0; border-radius:50px}
        .evt_01 .wrap a:last-child {background:#dd4076}
        .evt_01 .wrap a:hover {background:#000}

        .evt_apply {padding:100px 0 50px; width:1120px; margin:auto}
        .evt_apply .tabs {display:flex; margin-bottom:20px;flex-direction: row;}
        .evt_apply .tabs a {font-size:19px; text-align:center; display:block; width:25%; background:#333; color:#fff; padding:25px 0;line-height:25px;}
        .evt_apply .tabs a.active {background:#1d6751; color:#fff;}
        .evt_apply .tabs a strong {color:#cf1425}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#666; color:#fff; line-height:1.5}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:18px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px; font-size:16px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd span {color:#FF1D1D;vertical-align:top;font-weight:bold;}
        .guide_box dd:last-child {margin:0}

        /************************************************************/

    </style> 

	<div class="evtContent NSK"> 
        <div class="evtCtnsBox timeBox">
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</li>
                    <li class="time_txt"><span>남은 시간은</span></li>
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
                </ul>
            </div>
        </div>
        
		<div class="evtCtnsBox evt_top">
            <span class="img01" data-aos-offset="200" data-aos="zoom-in"><img src="https://static.willbes.net/public/images/promotion/2022/07/2726_top_01.png" alt=""/></span>
            <span class="img02" data-aos-offset="400" data-aos="zoom-in"><img src="https://static.willbes.net/public/images/promotion/2022/07/2726_top_02.png" alt=""/></span>
            <span class="img03" data-aos-offset="600" data-aos="zoom-in"><img src="https://static.willbes.net/public/images/promotion/2022/07/2726_top_03.png" alt=""/></span>
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2726_01.jpg" alt=""/> 
            <div class="wrap NSK-Black">
                @if($__cfg['CateCode'] == '3094')  
                <a href="https://gosi.willbes.net/userPackage/show/cate/3094/prod-code/199924" target="_blank">PC로 수강신청</a>
                <a href="https://gosi.willbes.net/m/userPackage/show/cate/3094/prod-code/199924" target="_blank">모바일 기기로 수강신청</a>
                @endif             
                
                @if($__cfg['CateCode'] == '3095') 
                <a href="https://gosi.willbes.net/userPackage/show/cate/3095/prod-code/199925" target="_blank">PC로 수강신청</a>
                <a href="https://gosi.willbes.net/m/userPackage/show/cate/3095/prod-code/199925" target="_blank">모바일 기기로 수강신청</a>
                @endif  

                @if($__cfg['CateCode'] == '3096') 
                <a href="https://gosi.willbes.net/userPackage/show/cate/3096/prod-code/199926" target="_blank">PC로 수강신청</a>
                <a href="https://gosi.willbes.net/m/userPackage/show/cate/3096/prod-code/199926" target="_blank">모바일 기기로 수강신청</a>
                @endif
            </div>           
		</div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <dl>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>    
                            <li>본상품은 이벤트 진행강의로 강의환불시 동영상 단가 정가금액과 원수강일수기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다. 다만, 원수강일수가 지난 강의는 환불이 되지 않습니다.</li>
                            <li>기타 환불규정은 약관의 규정에 따릅니다.</li>
                        </ol>
                    </dd>

                    <dt>기타</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 복지할인쿠폰 등 다른 쿠폰과 중복적용되지 않습니다.</li>
                            <li>본 이벤트는 내부사정에 의해 사전공지없이 종료 또는 변경될 수 있습니다.</li>
                            <li>동영상 할인쿠픈은 이벤트페이지에서 결제시 자동발급됩니다.(유효기간 2022년 12월 31일까지)</li>
                            <li>2021 최종합격 생이 전하는 합격이야기교재는 이벤트페이지에서 결제시 주문가능합니다.(선착순 200명)</li>                                       
                        </ol>
                    </dd>                
                </dl>
            </div>
        </div>

	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();

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
        });
               
    </script>
    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop