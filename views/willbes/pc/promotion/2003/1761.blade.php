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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skybanner {position:fixed; top:250px; right:10px; z-index:1;}

        .wb_top {background: url(https://static.willbes.net/public/images/promotion/2020/08/1761_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#e61e00;}

        .wb_cts02 {background: url(https://static.willbes.net/public/images/promotion/2020/08/1761_02_bg.jpg) no-repeat center top;}
        
        .wb_cts03 {background:#f1f1f1 url(https://static.willbes.net/public/images/promotion/2020/08/1761_03_bg.jpg) no-repeat center top; padding-bottom:150px} 
        .wb_cts03 iframe {width:800px; height:450px; margin:0 auto;}       
        .wb_cts04 {background:#fff;}
        .wb_cts05 {background: url(https://static.willbes.net/public/images/promotion/2020/08/1761_05_bg.jpg) no-repeat center top;}

        .tabMenu {width:800px; margin:0 auto 30px}
        .tabMenu li {display:inline; float:left; width:50%}
        .tabMenu li a {display:block; padding:15px 0; text-align:center; border-radius:10px; background:#333; color:#fff; font-size:22px}
        .tabMenu li span {display:block; font-size:14px}
        .tabMenu li a:hover,
        .tabMenu li a.active {background:#e41f00;}
        .tabMenu:after {content:""; display:block; clear:both}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <a href="#play">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_sky.png" alt="공개무료특강" />
            </a>
        </div>
        --}} 

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_01.jpg" alt="이종오 전격 입성"/>
        </div>

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_top.jpg" alt="오직, 소방" />            
        </div>        

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_02.jpg" alt="소방학/소방법규 이종오">
        </div>

        <div class="evtCtnsBox wb_cts03" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_03.jpg" alt="시작부터 끝까지"><Br> 
            <ul class="tabMenu" id="play">
                <li>
                    <a href="#tab1" class="active">
                        <span>소방 합격 전문가</span>
                        이종오 교수님을 소개합니다.
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <span>불꽃 같은 합격 커리큘럼</span>
                        이종오 소방직 공개설명회
                    </a>
                </li>
            </ul>  
            <div id="tab1" class="tabcts">
                <iframe src="https://www.youtube.com/embed/xBWCniTv_Ro?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
            </div>
            <div id="tab2" class="tabcts">
                <iframe src="https://www.youtube.com/embed/b06AI4w38gY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_04.jpg" alt="암기만이 합격"> 
        </div>

        <div class="evtCtnsBox wb_cts05" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1761_05.jpg" alt="수강신청" usemap="#Map1761A" border="0">
            <map name="Map1761A">
              <area shape="rect" coords="125,818,300,929" href="https://pass.willbes.net/pass/professor/show/prof-idx/51055/?cate_code=3050&subject_idx=1259&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank" alt="소방학개론 학원">
              <area shape="rect" coords="312,819,488,929" href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/170698" target="_blank" alt="소방학개론 온라인">
              <area shape="rect" coords="632,820,806,929" href="https://pass.willbes.net/pass/professor/show/prof-idx/51055/?cate_code=3050&subject_idx=1259&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank" alt="소방법규">
              <area shape="rect" coords="820,820,992,927" href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/170697" target="_blank" alt="소방법규 온라인">
            </map> 
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
		var tab1_url = "https://www.youtube.com/embed/xBWCniTv_Ro?rel=0";
		var tab2_url = "https://www.youtube.com/embed/b06AI4w38gY?rel=0";

		$(document).ready(function(){
		$(".tabcts").hide(); 
		$(".tabcts:first").show();
		$(".tabMenu li a").click(function(){ 
			var activeTab = $(this).attr("href"); 
			var html_str = "";
			if(activeTab == "#tab1"){
				html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
			}else if(activeTab == "#tab2"){
				html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
			}
			$(".tabMenu li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabcts").hide(); 
			$(".tabcts").html(''); 
			$(activeTab).html(html_str);
			$(activeTab).fadeIn(); 
			return false; 
			});
		});
	</script>
@stop