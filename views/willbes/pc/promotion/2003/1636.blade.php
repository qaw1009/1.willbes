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

        .evt_top {background:#111016 url(https://static.willbes.net/public/images/promotion/2020/03/1553_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#001751 url(https://static.willbes.net/public/images/promotion/2020/03/1553_01_bg.jpg) no-repeat center top;}

        .evt_02 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/03/1553_02_bg.jpg) no-repeat center top;}

        .evt_03 {background:#e8ebf2}

        .evt_04 {background:#fff}
        .evt_04_hover {width:980px; height:630px; margin:0 auto}  
        .evt_04_list li {float:left;padding-right:35px;}
        .evt_04_list li:last-child{padding-right:0;}

        .evt_05 {background:#002b97}

        .evt_06 {background:#e2e2e2 url(https://static.willbes.net/public/images/promotion/2020/03/1553_06_bg.jpg) no-repeat center top;}

        .evt_07 {background:#000 url(https://static.willbes.net/public/images/promotion/2020/03/1553_07_bg.jpg) no-repeat center top;}   

        </style>


    <div class="p_re evtContent NSK" id="evtContainer">   

        <div class="sky_banner">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_sky.png" alt="스카이 베너" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="13,112,112,191" href="#tab01" />
                <area shape="rect" coords="11,203,112,276" href="#tab02" />
                <area shape="rect" coords="13,285,120,357" href="#tab03" />
            </map>
        </div>

        <div class="evtCtnsBox evt_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_top.jpg" alt="2020 국가직 파이널" />
        </div>     

        <div class="evtCtnsBox evt_01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_01.jpg" alt="마지막 전략" />
        </div>

        <div class="evtCtnsBox evt_02" id="tab01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_02.jpg" alt="실전동형모의고사" />
        </div>

        <div class="evtCtnsBox evt_03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_03.jpg" alt="선택형 패키지 신청하기" usemap="#Map1553b" border="0" />
            <map name="Map1553b" id="Map1553b">
                <area shape="rect" coords="125,699,995,863" href="https://pass.willbes.net/package/show/cate/3019/pack/648002/prod-code/162499" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt_04" id="tab02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_04.jpg" alt="국.영.사 특강" />
            <div class="evt_04_hover">
                <div class="evt_04_list">
                    <ul>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_04_01.png"
                              onmouseover="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_01_on.png'"
                              onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_01.png'" 
                              onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_01_on.png'" alt=""  />                         
                        </li>            
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_04_02.png"
                              onmouseover="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_02_on.png'"
                              onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_02.png'" 
                              onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_02_on.png'" alt=""  />                         
                        </li>            
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_04_03.png"
                              onmouseover="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_03_on.png'"
                              onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_03.png'" 
                              onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2020/03/1553_04_03_on.png'" alt=""  />                         
                        </li>                     
                    </ul>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt_05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_05.jpg" alt="수강 신청" usemap="#Map1553c" border="0" />
            <map name="Map1553c" id="Map1553c">
                <area shape="rect" coords="783,241,996,452" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/162256" target="_blank" />
                <area shape="rect" coords="194,788,324,822" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161947" target="_blank" />
                <area shape="rect" coords="496,787,625,822" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158684" target="_blank" />
                <area shape="rect" coords="800,787,930,822" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161955" target="_blank" />
            </map> 
        </div>

        <div class="evtCtnsBox evt_06" id="tab03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_06.jpg" alt="한덕현 영어 커밍쑨" />
        </div>

        <div class="evtCtnsBox evt_07" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1553_07.jpg" alt="합격을 확신" />
        </div>        

    </div>
    <!-- End Container -->
@stop