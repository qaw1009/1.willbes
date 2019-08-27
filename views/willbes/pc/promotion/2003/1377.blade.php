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

        .skybanner {position:fixed;top:250px;right:10px; z-index:100;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1377_top_bg.jpg) no-repeat center top; position:relative; height:980px;}
        .wb_top span {position:absolute; width:1120px; left:50%; margin-left:-560px}
        .wb_top span.img01 {z-index:2; animation:ani 5s; -webkit-animation:ani 5s; opacity:0;}
        .wb_top span.img02 {z-index:1}
        @@keyframes ani{
            0%{opacity:1;}							
            75%{opacity:1;}
            100%{opacity:0;}
        }
        @@-webkit-keyframes ani{
            0%{opacity:1;}							
            75%{opacity:1;}
            100%{opacity:0;}
        }   

        .wb_cts01{background:#f4f5f6;}
        .wb_cts02 {background:#f8e8e5;}	      
        .wb_cts03 {background:#f4f5f6;}  
        .wb_cts04{background:#5da26c;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/08/1377_sky.png" alt="기미진 국어 개강일정 알아보기"/></a>
        </div>    
        <!--skybanner//-->
        <div class="evtCtnsBox wb_top" >
            <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2019/08/1377_top.jpg" alt="" /></span>
            <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2019/08/1377_top2.jpg" alt="" /></span>
        </div>
        <!--wb_top//-->       
        <!--wb_top2//-->
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1377_01.jpg" alt="기미진 기특한 국어 커리큘럼" />
        </div>
        <!--wb_cts01//-->
        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1377_02.jpg" alt="기미진 국어 추천하는 이유" />
        </div>
        <!--wb_cts02//-->
        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1377_03.jpg" alt="기미진 기특한 국어 기본서 신간 출시" />
        </div>
        <!--wb_cts03//-->
        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1377_04.jpg" alt="수강신청 안내" usemap="#Map1377" border="0" />
            <map name="Map1377" id="Map1377">
                <area shape="rect" coords="669,320,832,371" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154887" target="_blank"alt="온라인" />
                <area shape="rect" coords="841,320,1011,372" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture&series=" target="_blank"alt="학원실강" />
				
                <area shape="rect" coords="665,442,832,493" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156352" target="_blank"alt="온라인" />
                <area shape="rect" coords="838,444,1008,495" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture&series=" target="_blank"alt="학원실강" />
				
                <area shape="rect" coords="665,563,829,613" href="javascript:alert('준비중입니다.');" alt="온라인" />
                <area shape="rect" coords="840,563,1003,609" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture&series=" target="_blank"alt="학원실강" />
				
                <area shape="rect" coords="671,682,830,731" href="javascript:alert('준비중입니다.');" alt="온라인" />
                <area shape="rect" coords="837,681,1002,731" href="https://pass.willbes.net/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture&series=" target="_blank"alt="학원실강" />           
                <area shape="rect" coords="665,798,1006,851" href="https://pass.willbes.net/promotion/index/cate/3019/code/1074" target="_blank"alt="온라인 수강신청" />
            </map> 
        </div>
        <!--wb_cts04//-->
    </div>
    <!-- End Container -->
    <script type="text/javascript">
    
    </script>
@stop