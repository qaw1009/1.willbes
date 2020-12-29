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

        .top_tab {position:absolute; left:50%; top:1880px; width:975px; margin-left:-487px; z-index:10}   
        .top_tab li {display:inline; float:left; height:150px; width:325px;}        
        .top_tab li a {position:relative;}	     
        .top_tab a img {position:absolute; left:0; top:0; width:325px; height:150px;  z-index:11}   
        .top_tab a img.off {display:block}
        .top_tab a img.on {display:none} 
        .top_tab a.active img.off {display:none}
        .top_tab a.active img.on {display:block; box-shadow: 0 20px 30px rgba(0,0,0,.5);}    
        .top_tab:after {content:""; display:block; clear:both}
        
        .tab01s_01 {background:#1B1A20 url(https://static.willbes.net/public/images/promotion/2020/11/1915_01_a_bg.jpg) no-repeat center top;}
        .tab01s_01 span {position:absolute; top:720px; left:50%; margin-left:-500px; width:51px; z-index:10}
        .tab01s_02 {background:#EAE6DB}
        .tab01s_03 {background:#fff;padding-bottom:100px;}
        .tab01s_04 {background:#EAE6DB}
        .tab01s_05 {background:#C1392D}

        .tab02s_01 {background:#1B1A20 url(https://static.willbes.net/public/images/promotion/2020/11/1915_01_b_bg.jpg) no-repeat center top;}
        .tab02s_01 span {position:absolute; top:720px; left:50%; margin-left:-25px; width:51px; z-index:10}
        .tab02s_02 {background:#EAE6DB}
        .tab02s_03 {background:#fff;padding-bottom:100px;}
        .tab02s_04 {background:#EAE6DB}
        .tab02s_05 {background:#C1392D}  
        
        .tab03s_01 {background:#1B1A20 url(https://static.willbes.net/public/images/promotion/2020/11/1915_01_c_bg.jpg) no-repeat center top;}
        .tab03s_01 span {position:absolute; top:720px; left:50%; margin-left:500px; width:51px; z-index:10}


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
        .evtCtnsBox iframe {width:940px; margin:30px auto 0; height:520px; border:#f4f4f4 solid 14px;}
    

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
            right: 0;
            top: 0;
            padding:7px 10px;
            font-size:20px;
            background:#000; color:#fff;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}        


    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_top.gif" alt="단숨에 합격"/>
        </div>

        <ul class="top_tab">
            <li>
                <a href="/promotion/index/cate/3028/code/1915">                       
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab01_off.png"alt="축산직 윤용범" class="off" />                    
                </a>
            </li>
            <li>
                <a href="/promotion/index/cate/3028/code/2000">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab02_off.png" alt="기계직 윤황현" class="off"/>
                </a>
            </li>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab03.png" alt="조경직 이윤주" class="on" />
            </li>
        </ul>        

        <div class="evtCtnsBox"> 
            <div id="tab03s">
                <div class="tab03s_01">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_01_c.jpg" alt="조경직 이윤주"/>
                    <span>
                        <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51152?subject_idx=2117">
                            <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_home.png" alt="교수홈">
                        </a>
                    </spa> 
                </div>           
                <div class="tab02s_02">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_02_c.jpg" alt="" /> 
                </div>
                <div class="tab02s_03">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_03_c.jpg" alt="" usemap="#Map1915_tab03s_03" border="0" />
                    <map name="Map1915_tab03s_03">
                        <area shape="rect" coords="106,354,554,448" href="javascript:go_popup5()" /> 
                        <area shape="rect" coords="565,352,1011,450" href="javascript:go_popup6()" /> 
                    </map><br>   
                    <div>   
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_03s_01.jpg" >                           		
                        {{--<iframe src="https://www.youtube.com/embed/s53Pjkbzjng?rel=0" frameborder="0" allowfullscreen></iframe>--}} 
                    </div>                                   
                </div>
                <div class="tab02s_04">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_04_c.jpg" alt="조경직 real 점문가" />
                </div>
                <div class="tab02s_05">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_05_c.jpg" alt="조경직 이윤주 강의 신청" usemap="#Map1915_tab03s_c" border="0" />
                    <map name="Map1915_tab03s_c">
                        <area shape="rect" coords="484,595,954,664" href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/175420" target="_blank" />
                        <area shape="rect" coords="488,777,708,831" href="javascript:alert('Coming soon!')" />
                        <area shape="rect" coords="728,777,948,833" href="javascript:alert('Coming soon!')" />
                    </map>        
                </div>                  
            </div>
        </div>   

        
        <!--레이어팝업--> 
        <div id="popup5" class="Pstyle">
            <span class="b-close NSK-Black">X</span>
            <div class="content">                  
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_curri01_c.jpg" class="off" alt="" />    
            </div> 
        </div> 
        <div id="popup6" class="Pstyle">
            <span class="b-close NSK-Black">X</span>
            <div class="content">                  
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_curri02_c.jpg" class="off" alt="" />    
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

        
        /*팝업 커리큘럼*/ 
        function go_popup5() {
            $('#popup5').bPopup();
        }
        function go_popup6() {
            $('#popup6').bPopup();
        }
	</script>

@stop