@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#f4f5f6;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {position:fixed;bottom:10px;right:10px; z-index:100;}
        .skybanner a {margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1377_top_bg.jpg) no-repeat center top;}
        .wb_top2 {background:url(https://static.willbes.net/public/images/promotion/2019/08/1377_top_bg2.jpg) no-repeat center top;}
        .wb_cts01{background:#f4f5f6;}
        .wb_cts02 {background:#f8e8e5;}	      
        .wb_cts03 {background:#f4f5f6;}  
        .wb_cts04{background:#5da26c;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/08/1377_sky.png" alt="기미진 국어 개강일정 알아보기"/></a><br>
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1467" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/08/1377_sky2.png" alt="기미진 국어 개강일정 알아보기"/></a>
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
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1377_04.jpg" alt="수강신청 안내" usemap="#Map1377open" border="0" />
            <map name="Map1377open" id="Map1377open">
                <area shape="rect" coords="669,329,833,373" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161946" target="_blank" />
                <area shape="rect" coords="668,446,832,495" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161947" target="_blank" />
                <area shape="rect" coords="666,567,835,614" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161949" target="_blank" />
                <area shape="rect" coords="839,328,1001,376" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture&series=" target="_blank" />
                <area shape="rect" coords="835,447,1003,493" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture&series=" target="_blank" />
                <area shape="rect" coords="841,568,1001,613" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture&series=" target="_blank" />
                <area shape="rect" coords="664,719,1003,783" href="https://pass.willbes.net/promotion/index/cate/3019/code/1467" target="_blank" />
            </map>           
        </div>
        <!--wb_cts04//-->
    </div>
    <!-- End Container -->
    <script type="text/javascript">
    
    </script>
@stop