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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/1981_top_bg.jpg) no-repeat center;}
        .wb_top div,
        .wb_05 div
         {position:absolute; bottom:100px; left:50%; margin-left:-350px; width:700px; z-index:1; animation:iptimg1 1s ease-in;-webkit-animation:iptimg1 1s ease-in;}
        .wb_top div a,
        .wb_05 div a{display:block; text-align:center; color:#fff; font-size:38px; background:#000; padding:20px 0; border-radius:50px;
            box-shadow: 5px 5px 25px rgba(0,0,0,.2);}
        @@keyframes iptimg1{
            from{bottom:400px; opacity: 0;}
            to{bottom:150px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
            from{margin-left:-1200px; opacity: 0;}
            to{margin-left:-858px; opacity: 1;}
        }
        .wb_top div a:hover,
        .wb_05 div a:hover {background:#00A723;}

        .youtube {position:absolute; top:320px; left:50%; width:607px; z-index:1;margin-left:-485px}
        .youtube iframe {width:970px; height:480px}

        .wb_06 {background:#1F2639;}	
        
        .wb_ctsInfo {width:980px; margin:0 auto; font-size:14px; line-height:1.25; padding:100px 0; color:#333}
        .wb_ctsInfo h3 {font-size:30px; margin-bottom:30px; color:#000;} 
        .wb_ctsInfo li {list-style:disc; margin-left:20px; margin-bottom:10px}
    </style>



    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#apply01"><img src="https://static.willbes.net/public/images/promotion/2020/12/1981_sky_01.png" alt="" ></a>
            <a href="#apply02"><img src="https://static.willbes.net/public/images/promotion/2020/12/1981_sky_02.png" alt="" ></a>
        </div>      
        
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="" />            
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1981_top.jpg"  alt="기본이론종합반" usemap="#link"/>
            <div class="NSK-Black"><a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1004&school_year=2022" target="_blank">2022년 기본이론 종합반 온라인 신청하기></a></div>
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1981_01.jpg"  alt=""/>	
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qkIw507IPpM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>		
		</div>

        <div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1981_02.jpg"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_03" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1981_03.jpg"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_04" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1981_04.gif"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_05" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1981_05.jpg"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_06" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1981_06.jpg"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_07" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1981_07.jpg" id="apply01"  alt=""/>		
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  	
		</div>      
        
        <div class="evtCtnsBox wb_08" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1981_08.jpg" id="apply02"  alt=""/>	
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif     		
		</div>                    
        
        <div class="wb_ctsInfo NSK" id="ctsInfo">
            <h3 class="NSK-Black">유의사항</h3>
            <ul>
                <li>2022년 시험 대비 개편과목 기본종합반입니다. (영어,한국사 기본이론은 수강불가)</li>
                <li>11~12월 기존과목(형사소송법,형법,경찰학개론) + 2021년 1월~3월 개편과목 형사법,헌법,경찰학개론 제공</li>
                <li>조기등록반 혜택 : 한능검(3급) + G-TELP  + 영어3주 기초완성반 – 온라인 동영상 제공</li>
                <li>국가재난,정부지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 
                동영상 강의로 대체될수 있으며, 이로 인한 해당기간 환불은 불가합니다.</li>
            </ul>      
            <div class="mt40 tx16 NSK-Black">※ 학원 종합반 문의 : 1544-0336</div>
        </div>       
	</div>
    <!-- End Container -->
@stop