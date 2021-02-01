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

        .sky {position:fixed;top:200px;right:50px;z-index:200;}

        .wb_tops {background:#991DED;}       

        .wb_top {background:#DDD6C4 url(https://static.willbes.net/public/images/promotion/2020/11/1915_top_bg.jpg) no-repeat center top;}

        .top_tab {position:absolute; left:50%; top:1909px; width:975px; margin-left:-487px; z-index:10}   
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
        .tab02s_05 {background:#C23A2E;padding-bottom:100px;}

        .tab02s_01 {background:#1B1A20 url(https://static.willbes.net/public/images/promotion/2020/11/1915_01_b_bg.jpg) no-repeat center top;}
        .tab02s_01 span {position:absolute; top:720px; left:50%; margin-left:-25px; width:51px; z-index:10}
        .tab02s_02 {background:#EAE6DB}
        .tab02s_03 {background:#fff;padding-bottom:100px;}
        .tab02s_04 {background:#EAE6DB}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
        .newTopDday ul {width:1120px; margin:0 auto;}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
        .newTopDday ul li strong {line-height:60px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:2.5; }
        .newTopDday ul li:first-child span { font-size:28px; color:#000; }
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
        .newTopDday ul:after {content:""; display:block; clear:both}

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

        <div class="sky">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2000_sky.png" alt="스카이베너" >
            </a>     
        </div>   

        <div class="evtCtnsBox wb_tops" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2000_top.jpg" alt=""/>
        </div>
    

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
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab02.png" alt="기계직 윤황현" class="on" />
            </li>
            <li>
                <a href="/promotion/index/cate/3028/code/2001">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab03_off.png" alt="조경직 이윤주" class="off"/>
                </a>
            </li>
        </ul>        

        <div class="evtCtnsBox">        
            <div id="tab02s">
                <div class="tab02s_01">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_01_b.jpg" alt="기계직 윤황현" />
                    <span>
                        <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51148?subject_idx=1217&subject_name=%EA%B8%B0%EA%B3%84%EC%84%A4%EA%B3%84" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_home.png" alt="교수홈">
                        </a>
                    </span> 
                </div>           
                <div class="tab02s_02">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_02s.jpg" alt="" /> 
                </div>
                <div class="tab02s_03">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_03s.jpg" alt="" usemap="#Map1915_tab02s_03" border="0" />
                    <map name="Map1915_tab02s_03">
                        <area shape="rect" coords="106,354,554,448" href="javascript:alert('Coming soon!')" /> 
                        <area shape="rect" coords="565,352,1011,450" href="javascript:go_popup3()" /> 
                    </map><br>   
                    <div>                               		
                        <iframe src="https://www.youtube.com/embed/s53Pjkbzjng?rel=0" frameborder="0" allowfullscreen></iframe>   
                    </div>                                   
                </div>

                <div class="tab02s_04">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_04s.jpg" alt="" />
                </div>

                 <!-- 타이머 -->
                 <div id="newTopDday" class="newTopDday NG">        
                    <div>
                        <ul>
                            <li>                                
                                <span class="NGEB">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감!</span>
                            </li>
                            <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                            <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                            <li><strong>일</strong></li>
                            <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                            <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                            <li><strong>:</strong></li>
                            <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                            <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                            <li><strong>:</strong></li>
                            <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                            <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                            <li>
                                남았습니다
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab02s_05" id="apply">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/2000_05.jpg" alt="" usemap="#Map2000_apply" border="0"  />
                    <map name="Map2000_apply" id="Map2000_apply">
                        <area shape="rect" coords="535,475,726,526" href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/178349" target="_blank" />
                        <area shape="rect" coords="735,475,926,525" href="https://pass.willbes.net/pass/professor/show/prof-idx/51149?cate_code=3052&subject_idx=1362&subject_name=%EA%B8%B0%EA%B3%84%EC%9D%BC%EB%B0%98&tab=open_lecture" target="_blank" />
                        <area shape="rect" coords="534,603,725,653" href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/178350" target="_blank" />
                        <area shape="rect" coords="736,603,927,653" href="https://pass.willbes.net/pass/professor/show/prof-idx/51149?cate_code=3052&subject_idx=1363&subject_name=%EA%B8%B0%EA%B3%84%EC%84%A4%EA%B3%84&tab=open_lecture" target="_blank" />
                        <area shape="rect" coords="684,874,873,949" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/178353" target="_blank" />
                    </map>
                </div>               
                  
            </div>
        </div>   

        <!--레이어팝업-->  
        <div id="popup3" class="Pstyle">
            <span class="b-close NSK-Black">X</span>
            <div class="content">                  
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

        
        /*팝업 커리큘럼*/ 
        function go_popup3() {
            $('#popup3').bPopup();
        }

         /*디데이카운트다운*/
         $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop
