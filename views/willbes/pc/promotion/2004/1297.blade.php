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
            line-height:1.3;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000} */
                
        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/1297_top_bg.jpg) no-repeat center top;height:960px;position:relative;}
        .wb_tops {position:absolute;left:50%;margin-left:-455.5px;top:8.5%;}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2021/07/1297_01_bg.jpg) no-repeat center top;}

        .wb_cts02 {background:#fff;}
        
    </style> 

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox wb_top" >        
            <div class="wb_tops" data-aos="fade-down">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/1297_top.png" alt="새벽실전 모의고사"/>
            </div>              
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/1297_01.jpg" alt="집중과 몰입의 시간" />
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605001" title="신청하기" target="_blank" style="position: absolute;left: 29.09%;top: 72.59%;width: 41.93%;height: 6%;z-index: 2;"></a>
            </div> 
        </div> 
    </div>
    <!-- End Container -->
    
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

@stop