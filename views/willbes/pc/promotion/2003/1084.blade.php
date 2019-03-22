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

        .wb_top {background:#dbc6b3 url(http://file3.willbes.net/new_gosi/2018/01/EV180110_c2_bg.jpg) no-repeat center top}

        .m_title {display: block; position:absolute; top:550px; left:50%; margin-left:-605px; z-index:9000}

        .wb_cts01 {background:#dbc6b3 url(http://file3.willbes.net/new_gosi/2018/01/EV180110_c1_bg.jpg) no-repeat center top}
        .wb_cts01 div { position:relative; width:1210px; margin:0 auto}
        .wb_cts01 div .why {position: absolute; top:550px; left:50%; width:1210px; margin-left:-605px; z-index:100}

        .wb_cts02 {background:#fff url(http://file3.willbes.net/new_gosi/2018/01/EV180110_c3_bg.jpg) no-repeat center top}

        .wb_cts03 {padding-bottom:50px; background:#edf1f4;}
        .wb_cts04 ul {width:100%; margin:0 auto; max-width:980px}

        .menuWarp {position:relative; width:980px; height:730px; margin:0 auto} /**/
        .PeMenu {position:absolute; width:980px; height:328px; top:0px; left:0px;}
        .PeMenu li { display:inline; float:left}
        .PeMenu li a img.off {display:block}
        .PeMenu li a img.on {display:none}

        .skybanner {
            position:fixed;
            bottom:50px;
            right:10px;
            width:112px;
            z-index:1;
        }

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <div>
                <img  src="http://file3.willbes.net/new_gosi/2018/01/EV180110_sky.jpg" alt="초시생 위합 합격비법" usemap="#Map180110_c1" border="0">
                <map name="Map180110_c1" >
                    <area shape="rect" coords="16,19,98,104" href="#Q1" onfocus="this.blur();"  />
                    <area shape="rect" coords="22,121,99,194" href="#Q2" onfocus="this.blur();"  />
                    <area shape="rect" coords="18,212,96,295" href="#Q3" onfocus="this.blur();" />
                    <area shape="rect" coords="16,308,99,397" href="#Q4" onfocus="this.blur();" />
                    <area shape="rect" coords="16,406,109,486" href="#Q5" onfocus="this.blur();" />
                </map>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <div>
                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c1_2.jpg" usemap="#Map171218_c2" border="0"  >
                <map name="Map171218_c2" >
                    <area shape="rect" coords="158,18,585,103"  href="#none" onfocus="this.blur();" alt="초시생을 위한 합격비법"/>
                    <area shape="rect" coords="677,22,1055,93" href="{{ site_url('/promotion/index/cate/3019/code/1085') }}" target="_blank" onfocus="this.blur();" alt="N수생의 합격노트" />
                </map>
                <div class="why"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_top.gif" alt=""/></div>
                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c2.jpg"  >
            </div>
        </div><!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <ul>
                <li><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c3.jpg" alt="과락률 50%, 70점 미만 86.6%!"  /></li>
                <li id="Q1">
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c4.jpg" alt="공무원에는 어떤 직렬이 있나요?" usemap="#Map180110_c2" border="0" />
                    <map name="Map180110_c2">
                        <area shape="rect" coords="111,433,241,484" href="{{ site_url('/support/examAnnouncement/index/cate/3019') }}" target="_blank"   onfocus="this.blur();"/>
                    </map>
                </li>
                <li id="Q2"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c5.jpg" alt="Q2. 시험은 어떤 식으로 치러지나요?" /></li>
                <li id="Q3"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c6.jpg" alt="Q3. 올해 시험 일정은 언제인가요?" /></li>
                <li id="Q4"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c7.jpg" alt="Q4. 시험 공부 계획은 어떻게 세워야 하나요?" /></li>
                <li id="Q5"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c8.jpg" alt="Q5. 공무원, 경찰, 소방 단기간 합격비법, 영어에 달려있다! " /></li>
            </ul>
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c9.jpg" alt="윌비스와 함께 자랑스러운 대한민국의 공무원이 되어주세요!"  />
            <div class="menuWarp">
                <div class="PeMenu">
                    <ul>
                        <li>
                            <a href="{{ site_url('/home/index/cate/3019') }}" target="_blank" onFocus="this.blur();" >
                                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="{{ site_url('/home/index/cate/3020') }}" target="_blank" onFocus="this.blur();" >
                                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="{{ site_url('/home/index/cate/3022') }}" target="_blank" onFocus="this.blur();" >
                                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="{{ site_url('/home/index/cate/3035') }}" target="_blank" onFocus="this.blur();" >
                                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg'" alt=""  />
                            </a>
                        </li>
                        <li class="2line">
                            <a href="{{ site_url('/home/index/cate/3023') }}" target="_blank" onFocus="this.blur();" >
                                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="{{ site_url('/home/index/cate/3028') }}" target="_blank" onFocus="this.blur();" >
                                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6.jpg"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="{{ site_url('/home/index/cate/3024') }}" target="_blank" onFocus="this.blur();" >
                                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_7.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_7on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_7.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="{{ site_url('/home/index/cate/3019') }}" target="_blank" onFocus="this.blur();" >
                                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8.jpg'" alt=""  />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--wb_cts03//-->

    </div>
    <!-- End Container -->

@stop