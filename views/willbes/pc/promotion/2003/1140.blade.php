@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height:auto !important;
            margin-bottom:0 !important;
        }
        .evtContent { 
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /*****************************************************************/  

        .evtTop {
            background:url(http://file3.willbes.net/new_gosi/2019/03/EV190320Y_top_bg.jpg) no-repeat center top
        }
        
        .evtMenu {width:100%; background:#36374d;}
        .evtMenu ul {width:1120px; margin:0 auto}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {display:block; text-align:center; padding:30px 0; color:#868791; font-size:150%; font-weight:900; background:#36374d; margin-right:1px}
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {padding:3px 10px; border-radius:15px; background:#868791; color:#36374d; font-weight:normal; font-size:70%}
        .evtMenu li a div {margin-top:5px}
        .evtMenu li:hover a,
        .evtMenu li.active a {background:#e2be43; color:#fff}
        .evtMenu li:hover a span,
        .evtMenu li.active a span {background:#fff; color:#e2be43}
        .evtMenu ul:after {content:""; display:block; clear:both}
        
        
    </style>


    <div class="evtContent" id="evtContainer">      

        <div class="evtTop" >
            <img src="http://file3.willbes.net/new_gosi/2019/03/EV190320Y_top.jpg" alt="2019 국가직 9급 풀캐어 서비스" />
        </div>

        <div class="evtMenu" id="evtMenu">                
            <ul>
                <li class="active">
                    <a href="#tab1">
                        <span>합격을 위한</span>
                        <div>최종 마무리 전략</div>
                    </a>
                </li>
                <li>
                    <!--a href="javascript:alert('준비중입니다.');"-->
                    <a href="#tab2">
                        <span>전년도 국가직 9급</span>
                        <div>완벽분석</div>				
                    </a>
                </li>
                <li>
                    <a href="#tab3">
                        <span>2019 국가직 9급</span>
                        <div>시험총평 및 시험후기</div>
                    </a>
                </li>     
                <li>
                    <a href="#tab4">
                        <span>2019 국가직 9급</span>
                        <div>기출해설강의</div>
                    </a>
                </li>
            </ul>
        </div>

        <!--이벤트설명-->
        <div class="skybanner2">
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p_sky2.png" alt="타 학원 수강 인증 시, PASS 수강료 지원">
        </div>

        <div class="evtCtnsBox wb_top" id="transfer">
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p1.png" alt="합격환승"  />
        </div>

        <div class="evtCtnsBox wb_cts01" id="sky1">
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p2.png"  alt="합격입니다 " />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p3_1.png" alt="수강료지원" id="sky2"/>
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p3_2.png" alt="타학원 수강 인증" usemap="#rebound1" />
            <map name="rebound1">
                <area shape="rect" coords="273,428,698,507" href="javascript:doEvent()" onfocus='this.blur()' alt="타학원 수강 인증">
            </map>  
            <img src="http://file3.willbes.net/new_cop/On_Transfer/EV190320_p3_3.png" alt="이벤트참여방법" id="sky3"/>
        </div>
              
    </div>
    <!-- End Container --> 

    
@stop