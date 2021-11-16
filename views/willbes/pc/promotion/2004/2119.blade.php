@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/

        /************************************************************/
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2119_top_bg.jpg) no-repeat center;}    

        .wb_01 {background:#fff}
        .wb_02 {background:#f4f4f4}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
                      
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">             
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2119_top.jpg" alt="김동진법원팀 동행5기 온라인관리반" />  
        </div>       

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2119_01_01.jpg" alt="온라인관리반 소개" />
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2119_01_02.jpg" alt="만족 후기" />
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 확인하기" style="position: absolute; left: 34.29%; top: 79.39%; width: 31.07%; height: 5.4%; z-index: 2;"></a>
            </div>
        </div>  

        <div class="evtCtnsBox wb_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2119_02.jpg" alt="수강신청" />  
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" title="수강신청하기" style="position: absolute; left: 29.55%; top: 84.79%; width: 43.39%; height: 7.16%; z-index: 2;"></a>
            </div>
        </div>
    </div>
    <!-- End Container -->

@stop