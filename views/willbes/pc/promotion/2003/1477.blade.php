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
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top {background:#2584ec url(https://static.willbes.net/public/images/promotion/2019/12/1477_top_bg.jpg) no-repeat center top;position:relative;}
        .gif_text img{position:absolute;left:50%;top:50%;margin-left:-422px;margin-top:47px;}

        .wb_cts01{background:#f1f1f1;position:relative;}
        .gif_area .lecture1{position:absolute;left:50%;top:50%;margin-left:-422px;margin-top:-147px;}
        .gif_area .lecture2{position:absolute;left:50%;bottom:50%;margin-left:-422px;margin-bottom:-509px;}
        .gif_area img{width:396px;height:226px;}

        .wb_cts02 {background:#e2e2e2;}   

        .wb_cts03 {background:#e47480;}

    </style>
    <div class="p_re evtContent NGR" id="evtContainer">        

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1477_top.jpg" alt="세법 고선미 티패스" usemap="#Map1477a" border="0">
            <map name="Map1477a" id="Map1477a">
                <area shape="rect" coords="70,718,323,776" href="https://pass.willbes.net/professor/show/cate/3022/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95" target="_blank" alt="교수님 홈 바로가기" />
                <area shape="rect" coords="335,718,588,775" href="#apply" alt="수강신청 바로가기" />
            </map>     
            <div class="gif_text">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1477_top_txt.gif" alt="2020 서울/지방직까지 수강 가능!">
            </div>                    
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1477_01.jpg" alt="고선미 강의"  > 
            <div class="gif_area">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1477_01_1.gif" class="lecture1" alt="고선미 강의1">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1477_01_2.gif" class="lecture2" alt="고선미 강의2">
            </div>
        </div>    

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1477_02.jpg" alt="세법 커리큘럼"  > 
        </div>    

        <div class="evtCtnsBox wb_cts03" id="apply"> 
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1477_03.jpg" alt="수강신청" usemap="#Map1477b" border="0">
            <map name="Map1477b" id="Map1477b">
                <area shape="rect" coords="680,748,943,822" href="https://pass.willbes.net/periodPackage/show/cate/3022/pack/648001/prod-code/158484" target="_blank" alt="고선미 세법 T-PASS" />
            </map>           
        </div>       
                 
    </div>
    <!-- End Container -->
@stop