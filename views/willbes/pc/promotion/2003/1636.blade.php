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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/   

        .sky_banner {position:fixed;top:250px;right:10px;}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/05/1636_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1636_01_bg.jpg) no-repeat center top;}

        .evt_02 {background:#fff}

        .evt_03 {background:#4b4b4b}

        .evt_04 {background:#fff; padding-bottom:150px}
        .evt_04_list {width:980px; margin:0 auto;}  
        .evt_04_list li {float:left; padding-right:35px; height:460px}
        .evt_04_list li .on {display:none}
        .evt_04_list li .off {display:block}
        .evt_04_list li:hover .on {display:block}
        .evt_04_list li:hover .off {display:none}
        .evt_04_list li:last-child{padding-right:0;}
        .evt_04_list:after {content:""; display:block; clear:both}

        .evt_05 {background:#37bdc6}
        .evt_06 {background:#000 url(https://static.willbes.net/public/images/promotion/2020/05/1636_07_bg.jpg) no-repeat center top;}   

        </style>


    <div class="p_re evtContent NSK" id="evtContainer">   
        {{--
        <div class="sky_banner">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_sky.png" alt="스카이 베너" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="13,112,112,191" href="#tab01" />
                <area shape="rect" coords="11,203,112,276" href="#tab02" />
                <area shape="rect" coords="13,285,120,357" href="#tab03" />
            </map>
        </div>
        --}}
        <div class="evtCtnsBox evt_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_top.jpg" alt="2020 지방직 파이널" />
        </div>     

        <div class="evtCtnsBox evt_01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_01.jpg" alt="마지막 전략" />
        </div>

        <div class="evtCtnsBox evt_02" id="tab01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_graph.gif" alt="실전동형모의고사" />
        </div>

        <div class="evtCtnsBox evt_03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_02.jpg" alt="선택형 패키지 신청하기" usemap="#Map1636b" border="0" />
            <map name="Map1636b" id="Map1636b">
                <area shape="rect" coords="125,699,995,863" href="https://pass.willbes.net/package/show/cate/3019/pack/648002/prod-code/164734" target="_blank" alt="선택형 패키지" />
            </map>
        </div>

        <div class="evtCtnsBox evt_04" id="tab02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04.jpg" alt="국.영.사 특강" />
            <ul class="evt_04_list">
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_01.png" title="국어" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_01_on.png" title="국어" class="on"/>                      
                </li>            
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_02.png" title="영어" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_02_on.png" title="영어" class="on"/>                       
                </li>            
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_03.png" title="한국사" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_04_03_on.png" title="한국사" class="on"/>                       
                </li>                     
            </ul>
        </div>

        <div class="evtCtnsBox evt_05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_05.jpg" alt="수강 신청" usemap="#Map1636c" border="0" />
            <map name="Map1636c" id="Map1553c">
                <area shape="rect" coords="183,619,334,666" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161955" target="_blank" alt="기미진국어" />
                <area shape="rect" coords="483,618,633,666" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/164531" target="_blank" alt="한덕현영어" />
                <area shape="rect" coords="787,619,937,665" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161955" target="_blank" alt="조민주한국사" />
            </map> 
        </div>

        <div class="evtCtnsBox evt_06" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1636_07.jpg" alt="합격을 확신" />
        </div>        

    </div>
    <!-- End Container -->
@stop