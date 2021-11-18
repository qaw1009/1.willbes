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
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        /*스카이베너*/
        .sky {position:fixed;top:100px;right:10px;width:259px; text-align:center; z-index:111;}   
        .sky a {display:block;margin-bottom:10px;}  

        /*타이머*/
        .time {width:1120px; margin:0 auto; text-align:center; padding:25px 0}
        .time ul {width:100%; display:flex; justify-content: center;}
        .time li {font-size:30px;position: relative;}
        .time li:first-child {margin-right:25px}
        .time li:last-child {margin-left:25px}
        .time li:first-child span {color:#fff;}        
        .time li:last-child span {color:#fdeb00;font-weight:bold;}        

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2408_top_bg.jpg) no-repeat center top;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2408_01_bg.jpg) no-repeat center top;}

        .evt02 {background:#0186ad}

        .evt03 {padding-bottom:100px;}
        .evt03 .sTitle {margin:50px 0 30px; font-size:25px; text-align:left; color:#464646}
        
        /*타이머 스크롤*/
        .jbMenu {display:none}
        .jbMenu {top:0px; width:100%; background:#000; display:block; z-index:100}
        .jbFixed {position:fixed; top: 0px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">          
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1066#package" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/1067_skybanner3.png" title="패키지" >
            </a>           
        </div>

        <div class="evtCtnsBox jbMenu"> 
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li>
                        <span>2022.2.26 서울시 1회 시험까지</span>                    
                    </li>                   
                    <li>
                        <span class="NSK">{{ (empty($arr_base['dday_data'][0]['DDay']) === false) ? 'D'.$arr_base['dday_data'][0]['DDay'] : '' }}</span>                        
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
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/187287" target="_blank" title="수강신청하기" style="position: absolute;left: 31.98%;top: 48.33%;width: 32.46%;height: 7.77%;z-index: 2;"></a>       
                <div class="sTitle NSK-Black">실전덕후단 서울시 1회 단과 수강신청</div>
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
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop