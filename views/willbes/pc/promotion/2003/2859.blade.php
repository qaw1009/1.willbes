@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/


        /************************************************************/
        
        /*타이머*/
        .time {background:#e4e4e4; width:100%; padding:15px 0 40px;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1000px; margin:0 auto}
        .time table td {line-height:1.2; color:#000;}        
        .time table td img {width:65%}
        .time .time_txt {font-size:30px;  letter-spacing: -1px; text-align:right}
        .time span {color:#ffda39; font-size:30px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:30px;}
        @@keyframes upDown{
            from{color:#555}
            50%{color:#ff3837}
            to{color:#555}
        }
        @@-webkit-keyframes upDown{
            from{color:#555}
            50%{color:#ff3837}
            to{color:#555}
        }

        .sky {position:fixed; top:150px; right:10px;z-index:1;}
        .sky a {display:block; margin-bottom:10px;}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/12/2859_top_bg.jpg) no-repeat center top;}
        .evt_top span {position:absolute; bottom:0; left:50%; margin-left:-508px;}
        .evt_02 {background:#ff3837}

        .evt_03 {background:#e5e1d6; padding-bottom:150px}
        .evt_03 > div a {margin:0 7px}
        .evt_03 .wrap > a {display:block; margin:45px 0 0}
        
        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#f4f4f4; color:#363636; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dl{color:#555;font-size:15px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box span {color: #ca1919; vertical-align:top}
        .guide_box dd:last-child {margin:0}
    </style>

    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox time NSK-Black" id="newTopDday" data-aos="fade-down">
            <div>
                <table>
                    <tr>                    
                        <td class="time_txt">이벤트 마감일<br><span> 12/31(토)</span>까지</td>
                        <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">일 </td>
                        <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">:</td>
                        <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">:</td>
                        <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td>남았습니다.</td>
                    </tr>
                </table>                
            </div>
        </div>

        <div class="sky" id="QuickMenu">          
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2021/12/2160_sky01.png"  title="12월의기적" /></a>
        </div>   

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2859_top.jpg" alt="공무원 패스 역대급 할인"/>        
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2859_01.jpg" alt="어떻게 준비하실 건가요?" />
        </div>
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up">       
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2859_02.jpg" alt="혜택" />
        </div> 

        <div class="evtCtnsBox evt_03" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03.jpg" alt="직렬별 패스"/>
                <div>
                    <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2502" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_01.png" alt="9급"/></a>
                    <a href="https://pass.willbes.net/promotion/index/cate/3022/code/1983" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_02.png" alt="세무직"/></a>
                    <a href="https://pass.willbes.net/promotion/index/cate/3024/code/2721" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_03.png" alt="군무원"/></a>
                </div>
                <div class="mt40">
                    <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2503" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_04.png" alt="소방 공채"/></a>
                    <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2503" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_05.png" alt="소방 특채"/></a>
                </div> 
                <div class="mt40">
                    <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2838" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_06.png" alt="농업직"/></a>
                    <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2114" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_07.png" alt="조경직"/></a>
                    <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2115" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_08.png" alt="축산직"/></a>
                </div> 
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2256" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_09.png" alt="최우영"/></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2719" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2859_03_10.png" alt="장사원"/></a>   
            </div>  
        </div>     
        
        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 <span>12월의 기적 할인 </span>  EVENT</h2>
                <dl>
                    <dt>이용안내</dt>
                    <dd>
                        <ol>
                            <li>이벤트 기간 : 2022.12.22.(목)~2022.12.31.(토)</li>
                            <li>본 이벤트 진행 기간 내에는 발급받으신 재도전/환승/대학생 인증 이벤트 쿠폰이 추가로 적용 가능합니다.</li>
                            <li>2023 국가직 9급 행정/세무 0원 패스, 군무원/소방직 패스, 농업직/조경직/축산직 패스, 최우영 전과정 티패스/장사원 농업직 전과목 티패스는  이벤트 기간 내 판매되는 특별 기획 상품이므로 이벤트 기간 종료 후 재판매 계획은 없습니다.</li>
                            <li>수강지원 포인트의 경우,  결제시 자동 지급해드릴 예정입니다. 해당 포인트는 [교재구매] 시 사용 가능합니다.</li>
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                   
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>본 이벤트 페이지 내의 상품 구매 후 수강지원 포인트 사용 유무와 관계없이 환불 시에는 수강지원 포인트를 제한 후  기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                            · 결제금액 - 지급된 수강지원 포인트 - (강좌 정상가의 1일 이용대금X이용일수)</li>          
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
        $( document ).ready( function() {
            AOS.init();
        } );

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop