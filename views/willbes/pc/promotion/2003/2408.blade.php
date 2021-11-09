@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        /*타이머*/
        .time {width:1120px; margin:0 auto; text-align:center; padding:20px 0}
        .time ul {width:100%; display:flex; justify-content: center;}
        .time li {line-height:61px; font-size:24px; margin-right:10px; position: relative;}
        .time li:first-child,
        .time li:last-child {line-height:1.3; color:#363635}
        .time li:first-child {margin-right:20px}
        .time li:last-child {margin-left:20px}
        .time li:first-child span {color:#0086AC}      
        .time li:last-child span {line-height:2.5; color:#363635;font-weight:bold;} 
        .time li:last-child a {display:block; color:#fff; background:#242424; padding:10px 20px; margin-top:20px}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time .d_day {color:#fff;font-size:30px;} 

        .evt00 {background:#f4f1f3}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2408_top_bg.jpg) no-repeat center top;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2408_01_bg.jpg) no-repeat center top;}

        .evt02 {background:#0186ad}

        .evt03 {padding-bottom:100px;}     
        
         /*타이머 스크롤*/
        .jbMenu {display:none}
        .jbMenu {top:0px; width:100%; background:#f4f1f3; display:block; z-index:100}
        .jbFixed {position:fixed; top: 0px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">   

        <div class="evtCtnsBox evt00 jbMenu cf">
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li>
                        <span>2022.2.26</span><br>
                              서울시 1회 시험까지
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

        <div class="evtCtnsBox evtTop" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2408_top.jpg" alt="실전덕후단 강좌전"/>                     
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2408_01.jpg" alt="공개 채용"/>
        </div>                   

        <div class="evtCtnsBox evt02" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2408_02.jpg" alt="맞춤형 과정" />
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2408_03.jpg" alt="패키지" />
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/187287" target="_blank" title="수강신청하기" style="position: absolute;left: 31.98%;top: 66.33%;width: 32.46%;height: 7.77%;z-index: 2;"></a>       
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif                
            </div>
        </div>
        
    </div>
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <!-- End Container -->
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    <script type="text/javascript"> 
        /* 스크롤배너*/
        $( document ).ready( function() {
            var jbOffset = $( '.jbMenu' ).offset();
                $( window ).scroll( function() {
                    if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.jbMenu' ).addClass( 'jbFixed' );
            }
            else {
                    $( '.jbMenu' ).removeClass( 'jbFixed' );
                }
            });
        });

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop