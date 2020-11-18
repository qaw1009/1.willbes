@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/          

        .wb_top {background:#DDD6C4 url(https://static.willbes.net/public/images/promotion/2020/11/1915_top_bg.jpg) no-repeat center top;}

        .top_tab {position:absolute; left:50%; top:1880px; width:960px; margin-left:-460px; z-index:10}   
        .top_tab li {display:inline; float:left; height:150px; width:50%;}        
        .top_tab li a {position:relative;}	     
        .top_tab a img {position:absolute; left:0; top:0; width:480px; height:150px;  z-index:11}   
        .top_tab a img.off {display:block}
        .top_tab a img.on {display:none} 
        .top_tab a.active img.off {display:none}
        .top_tab a.active img.on {display:block; box-shadow: 0 20px 30px rgba(0,0,0,.5);}    
        .top_tab:after {content:""; display:block; clear:both}
        
        .tab01s_01 {background:#1B1A20 url(https://static.willbes.net/public/images/promotion/2020/11/1915_01_bg.jpg) no-repeat center top;}
        .tab01s_02 {background:#EAE6DB}
        .tab01s_03 {background:#fff;padding-bottom:100px;}
        .tab01s_04 {background:#EAE6DB}
        .tab01s_05 {background:#C1392D}

        .tab02s_01 {background:#1B1A20 url(https://static.willbes.net/public/images/promotion/2020/11/1915_01s_bg.jpg) no-repeat center top;}
        .tab02s_02 {background:#EAE6DB}
        .tab02s_03 {background:#fff;padding-bottom:100px;}
        .tab02s_04 {background:#EAE6DB}
        .tab02s_05 {background:#C1392D}      


        .check { position:absolute; bottom:50px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:14px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#202334; margin-left:50px; border-radius:20px;
            font-size:14px;font-weight:bold;}
            .check a:hover {background:#000;}


        /*TAB*/
        .tabWrapEvt{width:920px; margin:0 auto}
        .tabWrapEvt li {display:inline; float:left; width:450px; margin-left:10px;}
        .tabWrapEvt li a {display:block; text-align:center}
        .tabWrapEvt li a img.off {display:block}
        .tabWrapEvt li a img.on {display:none}
        .tabWrapEvt li a:hover img.off {display:none}
        .tabWrapEvt li a:hover img.on {display:block}
        .tabWrapEvt li a.active img.off {display:none}
        .tabWrapEvt li a.active img.on {display:block}
        .tabWrapEvt li a:hover,
        .tabWrapEvt li a.active {}
        .tabWrapEvt li:last-child a {margin-right:0}
        .tabWrapEvt:after {content:""; display:block; clear:both}
        .tabcts {background:none; width:920px; margin:30px auto 0; text-align:center;}
        .tabcts iframe {width:940px; margin:30px auto 0; height:520px; border:#f4f4f4 solid 14px;}

        .evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}

          /*레이어팝업*/
          .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: 10px;
            top: 50px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}        


    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_top.gif" alt="" usemap="#Map1850A" border="0" />
        </div>

        <ul class="top_tab">
            <li>
                <a href="#tab01s" class="active">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab01.png"  class="on"  />                       
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab01_off.png"  class="off" />                    
                </a>
            </li>
            <li>
                <a href="#tab02s">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab02.png"  class="on" />
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab02_off.png" class="off"/>
                </a>
            </li>
        </ul>        

        <div class="evtCtnsBox">        
            <div id="tab01s"> 
                <div class="tab01s_01">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_01.jpg" alt="" usemap="#Map1915_home_a" border="0" />
                    <map name="Map1915_home_a" id="Map1915_home_a">
                        <area shape="rect" coords="98,619,167,685" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51150?subject_idx=2116&subject_name=%EA%B0%80%EC%B6%95%EC%9C%A1%EC%A2%85%ED%95%99" target="_blank" />
                    </map>
                </div>
                <div class="tab01s_02">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_02.jpg" alt="" /> 
                </div>
                <div class="tab01s_03">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_03.jpg" alt="" usemap="#Map1915_tab01s_03" border="0" />
                    <map name="Map1915_tab01s_03" id="Map1915_tab01s_03">
                        <area shape="rect" coords="108,357,550,448"  href="javascript:go_popup1()" />
                        <area shape="rect" coords="568,356,1016,450" href="javascript:go_popup2()" /> 
                    </map> 
                    <!--tab-->
                    <ul class="tabWrapEvt">
                        <li><a href="#tab1" class="active"><img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab_01off.jpg" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab_01on.jpg" alt="" class="on"/></a></li>
                        <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab_02off.jpg" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab_02on.jpg" alt="" class="on"/></a></li>
                    </ul>
                    <div id="tab1" class="tabcts">
                        <iframe src="https://www.youtube.com/embed/jcr0AKg9yVk?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div id="tab2" class="tabcts">		
                        <iframe src="https://www.youtube.com/embed/iJEmIip6phg?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>       
                </div>
                <div class="tab01s_04">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_04.jpg" alt="" />
                </div>
                <div class="tab01s_05">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_05.jpg" alt="" usemap="#Map1915_tab01s_05" border="0" />
                    <map name="Map1915_tab01s_05" id="Map1915_tab01s_05">
                        <area shape="rect" coords="487,600,709,654" href="https://pass.willbes.net/pass/offLecture/show/cate/3052/prod-code/174685" target="_blank" />
                        <area shape="rect" coords="729,601,951,656" href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174799" target="_blank" />
                        <area shape="rect" coords="486,778,710,829" href="https://pass.willbes.net/pass/offLecture/show/cate/3052/prod-code/174686" target="_blank" />
                        <area shape="rect" coords="727,778,947,832" href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174804" target="_blank" />
                    </map>        
                </div>                                      
            </div>                                        
            <div id="tab02s">
                <div class="tab02s_01">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_01s.jpg" alt="" usemap="#Map1915_home_b" border="0" />
                    <map name="Map1915_home_b" id="Map1915_home_b">
                        <area shape="rect" coords="947,599,1014,661" href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51148?subject_idx=1217&subject_name=%EA%B8%B0%EA%B3%84%EC%84%A4%EA%B3%84" target="_blank" />
                    </map> 
                </div>           
                <div class="tab02s_02">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_02s.jpg" alt="" /> 
                </div>
                <div class="tab02s_03">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_03s.jpg" alt="" usemap="#Map1915_tab02s_03" border="0" />
                    <map name="Map1915_tab02s_03" id="Map1915_tab02s_03">
                        <area shape="rect" coords="106,354,554,448"  href="javascript:go_popup3()" /> 
                        <area shape="rect" coords="565,352,1011,450"  href="javascript:go_popup3()" /> 
                    </map><br>   
                    <div class="second_iframe" >                               		
                        <iframe src="https://www.youtube.com/embed/s53Pjkbzjng?rel=0" frameborder="0" allowfullscreen style="width:940px;height:520px;"></iframe>   
                    </div>                                   
                </div>
                <div class="tab02s_04">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_04s.jpg" alt="" />
                </div>
                <div class="tab02s_05">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_05s.jpg" alt="" usemap="#Map1915_tab02s_05" border="0" />
                    <map name="Map1915_tab02s_05" id="Map1915_tab02s_05">
                        <area shape="rect" coords="487,601,708,656" href="https://pass.willbes.net/pass/offLecture/show/cate/3052/prod-code/174671" target="_blank" />
                        <area shape="rect" coords="727,600,948,657" href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174807" target="_blank" />
                        <area shape="rect" coords="488,777,708,831" href="https://pass.willbes.net/pass/offLecture/show/cate/3052/prod-code/174673" target="_blank" />
                        <area shape="rect" coords="728,777,948,833" href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174808" target="_blank" />
                    </map>        
                </div>                  
            </div>
        </div>   

        
        <!--레이어팝업-->
        <div id="popup1" class="Pstyle">
            <span class="b-close">X</span>
            <div class="content1">                  
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_curri01.jpg" class="off" alt="" />    
            </div> 
        </div>    
        <div id="popup2" class="Pstyle">
            <span class="b-close">X</span>
            <div class="content2">                  
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_curri02.jpg" class="off" alt="" />    
            </div> 
        </div>    
        <div id="popup3" class="Pstyle">
            <span class="b-close">X</span>
            <div class="content3">                  
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_curri03.jpg" class="off" alt="" />    
            </div> 
        </div>    

    </div>
    <!-- End Container -->
    
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
       	var tab1_url = "https://www.youtube.com/embed/jcr0AKg9yVk?rel=0";
		var tab2_url = "https://www.youtube.com/embed/iJEmIip6phg?rel=0";

		$(document).ready(function(){
		$(".tabcts").hide(); 
		$(".tabcts:first").show();
		$(".tabWrapEvt li a").click(function(){ 
			var activeTab = $(this).attr("href"); 
			var html_str = "";
			if(activeTab == "#tab1"){
				html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
			}else if(activeTab == "#tab2"){
				html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
			}
			$(".tabWrapEvt li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabcts").hide(); 
			$(".tabcts").html(''); 
			$(activeTab).html(html_str);
			$(activeTab).fadeIn(); 
			return false; 
			});
        });
	
        /*탭(이미지버전)*/
        $(document).ready(function(){
            $('.top_tab').each(function(){
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
        
        /*팝업 커리큘럼*/ 
            function go_popup1() {
            $('#popup1').bPopup();
        }
        function go_popup2() {
            $('#popup2').bPopup();
        }
        function go_popup3() {
            $('#popup3').bPopup();
        }

	</script>

@stop