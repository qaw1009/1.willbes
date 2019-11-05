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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .skyBanner {position:fixed; bottom:250px;right:0;z-index:10;}
        .skybannerB{position: fixed; bottom:0; text-align:center; z-index: 101; background:#242424; width:100%}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/11/1053_top_bg.jpg) no-repeat center top}
        .wb_cts01{background:#0f44a0;}
        .white{background:#fff;}

        /*탭(이미지)*/
        .tabs{width:100%; text-align:center;}
        .tabs ul {width:1180px;margin:0 auto;}		
        .tabs li {display:inline; float:left;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}

        /* 탭 */
        .evttab {border-bottom:10px solid #0c5dc0}
        .evttab ul {width:1120px; margin:0 auto}	
        .evttab li {display:inline; float:left; margin-right:5px}	
        .evttab li a {
            display:block;
            width:370px;
            height:263px;
            font-size:0;
            text-indent:-9999;
        }
        .evttab li:first-child a {
            background:url(http://file3.willbes.net/new_cop/2019/03/1129_02_tab1.jpg) no-repeat left top;
        }        
        .evttab li:nth-child(2) a {
            background:url(http://file3.willbes.net/new_cop/2019/03/1129_02_tab2.jpg) no-repeat left top;
        }
        .evttab li:last-child a {
            background:url(https://static.willbes.net/public/images/promotion/2019/11/1129_02_tab3.jpg) no-repeat left top;
        }
        .evttab li:last-child {            
            margin:0
        }
        .evttab li a:hover,
        .evttab li a.active {
            background-position:right top;
        } 
        .evttab ul:after {
            content:'';
            display:block;
            clear:both;
        }     
        .tabCts {
            position: relative;
            width:1120px; margin:0 auto; 
        }
        .tabCts div {
            display:block; width:80px; top:3076px; z-index:1;
        }
        .tabCts div a {
            display:block; height:24px; line-height:24px; background:#0c5dc0; color:#fff; text-align:center;
        }
        
        .wb_cts03 {background:#FFF;}
        .menuWarp {position:relative; width:1210px; height:490px; margin:0 auto; }
        .PeMenu {position:absolute; width:1210px; height:328px; top:0px; left:0px;}
        .PeMenu li { display:inline; float:left}
        .PeMenu li a img.off {display:block} 	
        .PeMenu li a img.on {display:none} 	
        #tab04s2{background:#f7f7f7}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skyBanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1053_skybanner.png" title="경찰통합생활관리반">
        </div>

        <div class="skybannerB">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1053_footer.gif" usemap="#Map1053_bottom" title="예약 접수" border="0"  />
            <map name="Map1053_bottom" id="Map1053_bottom">
                <area shape="rect" coords="807,35,934,90" href="https://police.willbes.net/pass/event/show/ongoing?event_idx=454&" target="_blank" />
            </map> 
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_top.jpg"alt="경찰통합생활관리반">
        </div>
        
        <div class="evtCtnsBox wb_cts01">          
            <div class="tabs">
                <ul>
                    <li>
                        <a href="#tab01s" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab1_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab1_off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab2_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab2_off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab03s">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab3_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab3_off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab04s">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab4_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab4_off.png" class="off"/>
                        </a>
                    </li>
                </ul>
                <div id="tab01s" class="white">
                    <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab1_con.jpg" usemap="#Map1053tab1" border="0" />
                    <map name="Map1053tab1" id="Map1053tab1">
                        <area shape="rect" coords="267,539,945,649" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1093&subject_idx=1473&campus_ccd=" target="_blank" />
                    </map>                  
                </div>                                        
                <div id="tab02s" class="white">
                    <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab2_con.jpg" usemap="#Map1053tab2" border="0" />
                    <map name="Map1053tab2" id="Map1053tab2">
                        <area shape="rect" coords="224,2943,490,3014" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1051" target="_blank" />
                        <area shape="rect" coords="230,3065,489,3134" href="https://police.local.willbes.net/pass/promotion/index/cate/3010/code/1128" target="_blank" />
                    </map>            
                </div>
                <div id="tab03s" class="white">
                    <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab3_con.jpg" />            
                </div>
                <div id="tab04s" class="white">
                    <img src="https://static.willbes.net/public/images/promotion/2019/11/1053_tab4_con.jpg" /> 
                    <div id="tab04s2">
                        <img src="https://static.willbes.net/public/images/promotion/2019/11/1129_02.jpg" alt="여러분을 합격의 지름길로 안내할 3가지의 신의법칙 " />
                        <div class="evttab">
                            <ul>
                                <li><a href="#tab01" class="active">기본과정</a></li>
                                <li><a href="#tab02">심화과정</a></li>
                                <li><a href="#tab03">3개월 필합 풀패키지</a></li>
                            </ul>
                        </div>
                        <div id="tab01" class="tabCts">
                            <img src="http://file3.willbes.net/new_cop/2019/03/1129_02_t01.jpg" alt="기본과정" usemap="#Map1126A" border="0">
                            <map name="Map1126A" id="Map1126A">
                                <area shape="rect" coords="354,585,438,614" href="{{ site_url('/pass/promotion/index/cate/3010/code/1124') }}" />
                                <area shape="rect" coords="235,2450,318,2476" href="{{ site_url('/pass/promotion/index/cate/3010/code/1131') }}" />
                                <area shape="rect" coords="803,2450,884,2476" href="{{ site_url('/pass/promotion/index/cate/3010/code/1128') }}" />
                            </map>
                        </div>
                        <div id="tab02" class="tabCts">
                            <img src="http://file3.willbes.net/new_cop/2019/03/1129_02_t02.jpg" alt="심화과정" usemap="#Map1126B" border="0">
                            <map name="Map1126B" id="Map1126B">
                                <area shape="rect" coords="235,2208,318,2240" href="{{ site_url('/pass/promotion/index/cate/3010/code/1131') }}" />
                                <area shape="rect" coords="803,2208,884,2240" href="{{ site_url('/pass/promotion/index/cate/3010/code/1128') }}" />
                            </map>
                        </div>
                        <div id="tab03" class="tabCts">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1129_02_t03.jpg" alt="필합 풀패키지">
                            <img src="https://static.willbes.net/public/images/promotion/2019/11/1129_02_t03s.jpg" alt="필합 풀패키지" usemap="#Map1126C" border="0">
                            <map name="Map1126C" id="Map1126C">
                                <area shape="rect" coords="232,425,323,456" href="{{ site_url('/pass/promotion/index/cate/3010/code/1131') }}" />
                                <area shape="rect" coords="794,421,893,459" href="{{ site_url('/pass/promotion/index/cate/3010/code/1128') }}" />
                            </map>                           
                        </div>
                    </div>    
                </div>
            </div>
        </div>   
    </div>
    <!-- End Container -->

    <script language="javascript">

     /*탭(이미지버전)*/
     $(document).ready(function(){
                $('.tabs ul').each(function(){
                    var $active, $content, $links = $(this).find('a');
                    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    //$active.addClass('active');
                    $content = $($active[0].hash);

                    $links.not($active).each(function () {
                        $(this.hash).hide();
                    });

                    // Bind the click event handler
                    $(this).on('click', 'a', function(e){
                        $active.removeClass('active');
                        $content.hide();
                        $active = $(this);
                        $content = $(this.hash);
                        $active.addClass('active');
                        $content.show();
                        e.preventDefault()
                    });
                });
            });

            $(document).ready(function(){
        $(".tabCts").hide(); 
        $(".tabCts:first").show();        
        $(".evttab ul li a").click(function(){             
            var activeTab = $(this).attr("href"); 
            $(".evttab ul li a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".tabCts").hide(); 
            $(activeTab).fadeIn();             
            return false; 
        });
    });
            
            
    </script>
@stop