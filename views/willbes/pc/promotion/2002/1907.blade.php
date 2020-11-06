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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1907_top_bg.jpg) no-repeat center;}
        .wb_top div,
        .wb_05 div
         {position:absolute; bottom:150px; left:50%; margin-left:-350px; width:700px; z-index:1; animation:iptimg1 1s ease-in;-webkit-animation:iptimg1 1s ease-in;}
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
        .wb_05 div a:hover {background:#ff6a51}

        .wb_01 {background:#fff;}	
        .wb_02 {background:#27313f;}
        .wb_03 {background:#f2f4f5;}
        .wb_04 {background:#fff;}  
        .wb_05 {background:url(https://static.willbes.net/public/images/promotion/2020/11/1907_05_bg.jpg) no-repeat center;}       
        .wb_05 span {color:#ffca6a} 
        
        .wb_ctsInfo {width:980px; margin:0 auto; font-size:14px; line-height:1.25; padding:100px 0; color:#333}
        .wb_ctsInfo h3 {font-size:30px; margin-bottom:30px; color:#000;} 
        .wb_ctsInfo li {list-style:disc; margin-left:20px; margin-bottom:10px}
    </style>



    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#wb_05"><img src="https://static.willbes.net/public/images/promotion/2020/11/1907_sky_01.png" alt="" ></a>
            <a href="#wb_04"><img src="https://static.willbes.net/public/images/promotion/2020/11/1907_sky_02.png" alt="" ></a>
        </div>      
        
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="" />            
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1907_top.jpg"  alt="기본이론종합반" usemap="#link"/>
            <div class="NSK-Black"><a href="#none" onclick="javascript:alert('2022년 개편과목대비\n조기등록반\n☞학원으로 문의 바랍니다.\n*경찰학원 1544-0336*');">2020년 11월 조기등로반 신청하기 ></a></div>
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2020/11/1907_01.jpg"  alt="2022년도 경찰과목 개편 내용"/>			
		</div>

		<div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2020/11/1907_02.jpg"  alt="합격전략 어떻게 세워야 할까요?" />
		</div>    

		<div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1907_03.jpg"  alt="종합반 스케줄"/>       
        </div>
        
        <div class="evtCtnsBox wb_04" id="wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1907_04.jpg"  alt="선접수 이벤트"/>       
		</div>

        <div class="evtCtnsBox wb_05" id="wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1907_05.jpg"  alt="기본이론종합반"  />
            <div class="NSK-Black"><a href="#none" onclick="javascript:alert('2022년 개편과목대비\n조기등록반\n☞학원으로 문의 바랍니다.\n*경찰학원 1544-0336*');">기본이론 <span>개편과목까지</span> 준비하기 ></a></div>
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