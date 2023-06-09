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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
        }

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1242_top_bg.jpg) no-repeat center top; background-attachment:fixed;}	
        .wb_cts01 .wb_popWrap {width:1210px; margin:0 auto; position:relative}

        .wb_cts01 .illust {position:absolute; width:1210px; margin:0 auto; top:100px; animation:only 2s ease-in 0s infinite; z-index:11}
        @@keyframes only{
            0%{top:340px}
            50%{top:360px; opacity:1}
            100%{top:340px}
        }

        .wb_cts02 {background:#041e45;}

        .wb_cts03 {background:#041e45; padding-bottom:118px;}
        .wb_cts03 ul{width:1210px; margin:0 auto}
        .wb_cts03 li {display:inline; width:40%; text-align:center;margin:0 auto;}
        .wb_cts03 ul:after {content:""; display:block; clear:both}		

        .wb_cts04 {padding-bottom:100px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_cts01" >
            <div class="wb_popWrap">
                <div class="illust">
                    <img src="https://static.willbes.net/public/images/promotion/2019/05/1242_top_img.png"  alt="" />
                </div>      
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1242_top.png"  alt="" />
            </div>          
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1242_01.jpg"  alt="" usemap="#Map1242B" border="0" />
            <map name="Map1242B" id="Map1242B">
                <area shape="rect" coords="253,1234,537,1294" href="javascript:doEvent1()" alt="필기합격인증하기" />
                <area shape="rect" coords="581,1234,868,1294" href="javascript:doEvent2()" alt="나의성적입력하기" />
                <area shape="rect" coords="252,1326,871,1388" href="javascript:doEvent3()" alt="실시간 참여현황" />
            </map>
        </div>

        {{--
        <div class="evtCtnsBox wb_cts03" >
            <ul>
                <li><a href="javascript:doEvent1()"><img src="https://static.willbes.net/public/images/promotion/2019/05/1242_btn1.gif"  alt="" /></a></li>
                <li><a href="javascript:doEvent2()"><img src="https://static.willbes.net/public/images/promotion/2019/05/1242_btn2.gif"  alt="" /></a></li>
            </ul>
        </div>
        --}}
            
        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1242_02.jpg"  alt="" usemap="#Map1242A" border="0" />
            <map name="Map1242A" id="Map1242A">
                <area shape="rect" coords="251,1127,871,1192" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1231" target="_blank" alt="다드림" />
            </map>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function doEvent1() {            
            var url = '/pass/certApply/index/page/exam_no/cert/20' ;
            window.open(url,'police_event1', 'scrollbars=yes,toolbar=no,resizable=yes,width=700,height=850');
        }

        function doEvent2() {            
            var url = '1242_pop1' ;
            window.open(url,'police_event2', 'scrollbars=yes,toolbar=no,resizable=yes,width=700,height=850');
        }
        
        function doEvent3() {
            var url = '1242_pop2' ;
            window.open(url,'police_event3', 'scrollbars=yes,toolbar=no,resizable=yes,width=700,height=850');
        }  
    </script> 
   
@stop