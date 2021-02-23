@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed; top:120px; right:10px; z-index:10;}
        .skybanner a {margin-bottom:5px; display:block}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1377_top_bg.jpg) no-repeat center top;}
        .wb_top2 {background:url(https://static.willbes.net/public/images/promotion/2019/08/1377_top_bg2.jpg) no-repeat center top;}
        .wb_cts01{background:#f4f5f6;}
        .wb_cts02 {background:#f8e8e5;}	      
        .wb_cts03 {background:#f4f5f6;}  
        .wb_cts04{background:#5da26c;}
        .wb_cts04 div {width:1120px; margin:0 auto; position:relative}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/08/1377_sky.png" alt="기미진 국어 개강일정 알아보기"/></a>
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1623" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/08/1377_sky2.png" alt="기미진 국어 개강일정 알아보기"/></a>
        </div>    
        <!--skybanner//-->
        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1377_top.gif" alt="공무원 국어의 종착점" />           
        </div>
        <!--wb_top//-->    
        <div class="evtCtnsBox wb_top2" >     
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1377_top2.jpg" alt="대세를 넘어" />
        </div>   
        <!--wb_top2//-->
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1377_01.jpg" alt="기미진 기특한 국어 커리큘럼" />
        </div>
        <!--wb_cts01//-->
        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1377_02.jpg" alt="기미진 국어 추천하는 이유" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts04" id="event">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1377_04.jpg" alt="수강신청 안내" usemap="#Map1377_apply" border="0" />
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178539" target="_blank" title="실강" style="position: absolute; left: 35.36%; top: 57.79%; width: 9.38%; height: 4.88%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/177859" target="_blank" title="온라인" style="position: absolute; left: 35.36%; top: 66.05%; width: 9.38%; height: 4.88%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178724" target="_blank" title="라이브" style="position: absolute; left: 35.36%; top: 74.53%; width: 9.38%; height: 4.88%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1623" target="_blank" title="티패스 아특포함" style="position: absolute; left: 75.98%; top: 57.91%; width: 9.38%; height: 4.88%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1623" target="_blank" title="티패스 아특제외" style="position: absolute; left: 75.98%; top: 66.16%; width: 9.38%; height: 4.88%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1623" target="_blank" title="티패스 아침특강" style="position: absolute; left: 75.98%; top: 74.65%; width: 9.38%; height: 4.88%; z-index: 2;"></a> 
            </div>    
        </div>
        <!--wb_cts04//-->
    </div>
    <!-- End Container -->

@stop