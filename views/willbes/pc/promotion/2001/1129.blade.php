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
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_top {background:#4290e1 url(http://file3.willbes.net/new_cop/2019/02/EV190214_c1_bg.jpg) no-repeat center top}
	    .wb_cts01 {background:#dfdfe1 url(http://file3.willbes.net/new_cop/2019/02/EV190214_c2_bg.jpg) center top no-repeat;}
	    .wb_cts02 {background:#dfdfe1;}	

        /* 탭 */
        .evttab {width:1210px; margin:0 auto}	
        .evttab li {display:inline; float:left; margin-bottom:20px}	
        .evttab a img.off {display:block}
        .evttab a img.on {display:none}
        .evttab a.active img.off {display:none}
        .evttab a.active img.on {display:block}
        .tabContents .mv { display:inline; padding-left:15px;}  
        .evttab ul:after {
            content:'';
            display:block;
            clear:both;
        }     
        
        .wb_cts03 {background:#FFF;}
        .menuWarp {position:relative; width:1210px; height:490px; margin:0 auto; }
        .PeMenu {position:absolute; width:1210px; height:328px; top:0px; left:0px;}
        .PeMenu li { display:inline; float:left}
        .PeMenu li a img.off {display:block} 	
        .PeMenu li a img.on {display:none} 	

        .video_area{padding-bottom:75px;margin-top:75px;}

    </style>


<div class="evtContent" id="evtContainer">     

    <div class="evtCtnsBox wb_top" >
        <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c1.jpg" alt=" 윌비스 신광은경찰팀 신의 법칙을 믿어라! " />
    </div>     

    <div class="evtCtnsBox wb_cts01">
        <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c2.jpg" alt="여러분을 합격의 지름길로 안내할 3가지의 신의법칙 " /><br/>
        <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c3.jpg" alt=" 경찰수험가 10년간 변함없는 신뢰의 아이콘, 신광은경찰팀" />
    </div>
    
      
    <div class="evtCtnsBox wb_cts02">
        <div class="evttab">
            <ul class="cf">
                <li> 
                    <a class="active" href="#tab1">
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_tap01.jpg"  class="off" alt=""/>
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_tap01on.jpg" class="on"  />
                    </a>
                </li>
                <li> 
                    <a  href="#tab2">
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_tap02.jpg"  class="off" alt=""/>
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_tap02on.jpg" class="on"  />
                    </a>
                </li>
                <li> 
                    <a  href="#tab3">
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_tap03.jpg"  class="off" alt=""/>
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_tap03on.jpg" class="on"  />
                    </a>
                </li>
                <li> 
                    <a  href="#tab4">
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_tap04.jpg"  class="off" alt=""/>
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_tap04on.jpg" class="on"  />
                    </a>
                </li>
            </ul>
            
            <div class="tabContents" id="tab1" >
                <div class="Section Section2 mt100">
                    <div class="widthAuto p_re">
                        <img src="https://static.willbes.net/public/images/promotion/2019/11/1129_0.jpg" alt="신광은경찰 합격커리큘럼">
                        <div class="passCurriWrap">
                            <ul>
                                <li class="curriStep1">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM01.png') }}" alt="집중 연강식 진행" class="out">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM01_on.png') }}" alt="집중 연강식 진행" class="over">
                                </li>
                                <li class="curriStep2">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM02.png') }}" alt="프리미엄 심화과정" class="out">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM02_on.png') }}" alt="프리미엄 심화과정" class="over">
                                </li>
                                <li class="curriStep3">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM03.png') }}" alt="핵심요약/진도별 정리" class="out">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM03_on.png') }}" alt="핵심요약/진도별 정리" class="over">
                                </li>
                                <li class="curriStep4">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM04.png') }}" alt="집중 약점 보안" class="out">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM04_on.png') }}" alt="집중 약점 보안" class="over">
                                </li>
                                <li class="curriStep5">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM05.png') }}" alt="실전력 극대화" class="out">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM05_on.png') }}" alt="실전력 극대화" class="over">
                                </li>
                                <li class="curriStep6">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM06.png') }}" alt="집단+개별면접대비" class="out">
                                    <img src="{{ img_url('cop_acad/visual/visual_curriM06_on.png') }}" alt="집단+개별면접대비" class="over">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 합격커리큘럼 //-->
                <!--p><img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_1.jpg"  alt=""/></p-->  
                <!--동영상-->                
                <div class="video_area">
                    <p class="mv"><iframe width="380px" height="217px" src="https://www.youtube.com/embed/re8w_IFAPS4" frameborder="0" allowfullscreen></iframe></p>
                    <p class="mv"><iframe width="380px" height="217px" src="https://www.youtube.com/embed/mGt001If-5g" frameborder="0" allowfullscreen></iframe></p>
                    <p class="mv"><iframe width="380px" height="217px" src="https://www.youtube.com/embed/GLQ9KlRsusk" frameborder="0" allowfullscreen></iframe></p>
                </div>    
                <!--//동영상-->
            </div>

            <div class=" tabContents" id="tab2">
                <p><img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_2.jpg"  alt=""/></p>                    
            </div>

            <div class=" tabContents" id="tab3">
                <p><img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_3.jpg"  alt=""/></p>  
                <!--동영상-->
                <p class="mv"><iframe width="380px" height="217px" src="https://www.youtube.com/embed/unImcehy2dI" frameborder="0" allowfullscreen></iframe></p>
                <p class="mv"><iframe width="380px" height="217px" src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0" frameborder="0" allowfullscreen></iframe></p>
                <p class="mv"><iframe width="380px" height="217px" src="https://www.youtube.com/embed/Bh0dUfkZ7Bk" frameborder="0" allowfullscreen></iframe></p>
                <!--//동영상-->
                <p>
                    <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_4.jpg"  alt="" usemap="#Map190214_c1" border="0"/>
                    <map name="Map190214_c1" >
                        <area shape="rect" coords="452,40,912,129" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" />
                    </map>
                </p>  
            </div>

            <div class=" tabContents" id="tab4">
                <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c4_5.jpg"  alt="" usemap="#Map190214_c2" border="0"/>
                <map name="Map190214_c2" >
                    <area shape="rect" coords="235,483,484,580" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1325"  target="_blank"  alt="슈퍼패스"/>
                    <area shape="rect" coords="740,486,978,573" href="https://police.willbes.net/pass/consultManagement/index" target="_blank"  alt="1:1 심층상담" />
                </map>                    
            </div>                
        </div><!--evttab//-->    
    </div><!--wb_cts02//-->     
      
      
    <div class="evtCtnsBox wb_cts03" >
        <p><img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c5.jpg" alt=""  /></p>
        <div class="menuWarp">
            <div class="PeMenu">
                <ul>
                    <li> 
                        <a href="{{ site_url('/promotion/index/cate/3001/code/1012') }}" target="_blank" >
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap01.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap01on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap01.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap01.jpg'" alt=""  />
                        </a>
                    </li>
                    <li>
                        <a href="{{ site_url('/promotion/index/cate/3001/code/1015') }}" target="_blank" >
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap02.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap02on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap02.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap02.jpg'" alt=""  />
                        </a>
                    </li>
                    <li> 
                        <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1204" target="_blank" >
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap03.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap03on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap03.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap03.jpg'" alt=""  />
                        </a>
                    </li>
                    <li> 
                        <a href="javascript:alert('곧 공개됩니다.');">
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap04.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap04on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap04.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/02/EV190214_c5_tap04.jpg'" alt=""  />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--wb_cts03//-->

</div>
<!-- End Container -->


<script type="text/javascript">
    $(document).ready(function(){
        $(".tabContents").hide(); 
        $(".tabContents:first").show();
        
        $(".evttab ul li a").click(function(){ 
            
            var activeTab = $(this).attr("href"); 
            $(".evttab ul li a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".tabContents").hide(); 
            $(activeTab).fadeIn(); 
            
            return false; 
        });
    });
</script>

@stop