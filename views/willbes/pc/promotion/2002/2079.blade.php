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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:130px; right:10px;z-index:1;}        

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/02/2079_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#fff;}	
        .wb_01 .youtube iframe {width:640px; height:360px} 
        .wb_01 .youtube {position:absolute; top:403px; left:49.45%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .wb_01 .youtube.yu02 {top:851px; margin-left:-139px;}
        .wb_01 .youtube.yu03 {top:1302px;}   

        .wb_05{background:#201571} 

        .delay {margin-bottom:50px;}

        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;padding-bottom:35px;}
        .tabContaier ul{width:980px;margin:0 auto;height:70px;} 
        .tabContaier li{display:inline-block;width:490px;height:80px;line-height:80px;background:#fcfcfc;color:#221972;float:left;font-size:34px;font-weight:bold;border-bottom:5px solid #221972;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#fff;font-size:32px;background:#221972}

        .evtInfo {padding:80px 0; background:#333333; color:#fff; font-size:17px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2021/02/2079_sky.png" alt="스카이베너" ></a>
        </div>      
        
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="신광은 경찰학원" />            
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2079_top.jpg"  alt="기본완성반" />
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2021/02/2079_01.jpg"  alt="빠르게 준비 및 유튜브 영상"/>	
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu02">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu03">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>		
		</div>

		<div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2021/02/2079_02.jpg"  alt="경찰과목 개편 내용" />
		</div>    

		<div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2079_03.jpg"  alt="3법과목"/>       
        </div>
        
        <div class="evtCtnsBox wb_04" >
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2079_04.jpg"  alt="과목비중 및 출제비율"/>       
		</div>
            
        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2079_05.jpg"  alt="기본완성반"/>       
		</div>         

        <div class="evtCtnsBox wb_06" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2079_06.jpg"  alt="선접수 할인 이벤트"/>      
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier">    
                    <ul>    
                        <li><a href="#tab1" class="active">학원 종합반</a></li>
                            
                        <li><a href="#tab2">학원 단과</a></li>              
                    </ul>
                </div> 
                <div id="tab1" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/02/2079_06_01.jpg" usemap="#Map2079_06_01"  title="학원 종합반" border="0" />
                    <map name="Map2079_06_01" id="Map2079_06_01">
                        <area shape="rect" coords="183,584,425,629" href="https://police.willbes.net/pass/offPackage/show/prod-code/179130" target="_blank" />
                        <area shape="rect" coords="694,585,934,627" href="https://police.willbes.net/pass/offPackage/show/prod-code/179163" target="_blank" />
                    </map>                 
                </div>
                <div id="tab2" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2079_06_02.jpg" usemap="#Map2079_06_02" title="학원 단과" border="0" />
                    <map name="Map2079_06_02" id="Map2079_06_02">
                        <area shape="rect" coords="104,464,345,507" href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/179129" target="_blank" />
                        <area shape="rect" coords="440,464,681,507" href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/179120" target="_blank" />
                        <area shape="rect" coords="774,464,1015,507" href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/179118" target="_blank" />
                    </map>             
                </div> 
            </div>     
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2079_06_delay.jpg" class="delay"  alt="일정 지연 유무"/>            
		</div>         

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">이용안내</h4>
				<div class="infoTit NG"><strong>2022 개편과목 기본완성반 전문 교수진</strong></div>
				<ul>
					<li>형사법 - 신광은 교수님</li>
                    <li>경찰학 - 장정훈 교수님</li>   
                    <li>헌 법 – 김원욱 교수</li>                                    
				</ul>
				<div class="infoTit NG"><strong>종합반 구성</strong></div>
				<ul>
                    <li>1. 2022년 대비 기본완성 종합반[3/29~6/23](인강포함)<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;- 수강기간동안 기본완성 인강제공</li>
                    <li>2. 2022년 대비 기본완성 종합반[3/29~6/23](인강 미포함)</li>
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>1. 2022년 시험대비 개편과목 기본완성반입니다.(영어,한국사 기본이론은 수강불가)</li>			
                    <li>2. 국가재난 정부 지침등으로 인한 학원 휴원으로 실강진행이 어려울 경우 동영상 강의로 대체 될수 있으며 ,<br> &nbsp;&nbsp;&nbsp;&nbsp;이로 인한 해당기간 환불은 불가합니다.</li>	
				</ul>         
				<ul>
					<li><strong>※ 학원종합반 문의 : 1544-0336</strong></li>
				</ul>
			</div>
		</div>  

	</div>
     <!-- End Container -->

     <script type="text/javascript">        

            /*탭(텍스터버전)*/
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop