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

        /*타이머*/
        .time {width:100%; text-align:center; background:#F5F5F5;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#000; font-size:28px;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}

        .skybanner {position:fixed;top:200px; width:130px; right:10px;z-index:1;}        

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/1984_top_bg.jpg) no-repeat center;}
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

        .wb_06 {background:#1e2638;}	
        
        .wb_ctsInfo {width:980px; margin:0 auto; font-size:14px; line-height:1.25; padding:100px 0; color:#333}
        .wb_ctsInfo h3 {font-size:30px; margin-bottom:30px; color:#000;} 
        .wb_ctsInfo li {list-style:disc; margin-left:20px; margin-bottom:10px}

        .wb_08 {padding-bottom:100px;}        

        .evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:17px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>마감까지<br>남은시간</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}마감!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->    
        
        <div class="skybanner">
            <a href="#apply01"><img src="https://static.willbes.net/public/images/promotion/2020/12/1984_sky_01.png" alt="" ></a>
            <a href="#apply02"><img src="https://static.willbes.net/public/images/promotion/2020/12/1984_sky_02.png" alt="" ></a>
        </div>      
        
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="" />            
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1984_top.jpg"  alt="기본이론종합반" usemap="#link"/>
            <div class="NSK-Black"><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank">2022년 기본이론 종합반 학원 신청하기></a></div>
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1984_01.jpg"  alt=""/>	
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qkIw507IPpM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>		
		</div>

        <div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1984_02.jpg"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_03" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1984_03.jpg"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_04" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1984_04.gif"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_05" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1984_05.jpg"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_06" >
			<img src="https://static.willbes.net/public/images/promotion/2020/12/1984_06.jpg"  alt=""/>			
		</div>        

        <div class="evtCtnsBox wb_07" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1984_07.jpg"  alt="" usemap="#1984a" id="apply01" border="0"/>
            <map name="1984a" id="1984a">
                <area shape="rect" coords="105,973,367,1029" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040&subject_idx=2139" target="_blank">
                <area shape="rect" coords="416,972,679,1029" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040&subject_idx=2138" target="_blank">
                <area shape="rect" coords="730,972,994,1028" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040&subject_idx=2140" target="_blank">
            </map>	
		</div>      
        
        <div class="evtCtnsBox wb_08" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1984_08.jpg"  alt="" usemap="#1984b" id="apply02" border="0"/>
            <map name="1984b" id="1984b">
                <area shape="rect" coords="120,822,384,878" href="https://police.willbes.net/pass/offPackage/show/prod-code/176417" target="_blank">
                <area shape="rect" coords="430,822,694,879" href="https://police.willbes.net/pass/offPackage/show/prod-code/176450" target="_blank">
                {{--<area shape="rect" coords="740,822,1002,879" href="https://police.willbes.net/pass/offPackage/show/prod-code/176410" target="_blank">--}}
            </map>
		</div>  

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">이용안내</h4>
				<div class="infoTit NG"><strong>2022 개편과목 종합반 전문 교수진</strong></div>
				<ul>
					<li>형사법 - 신광은 교수님</li>
                    <li>경찰학 - 장정훈 교수님</li>
                    <li>헌 법 – 김원욱 교수님</li>
                </ul>  
                <div class="infoTit NG"><strong>종합반 구성</strong></div>
				<ul>
					<li>
                        1. 2022년 대비 입문 기본종합반[1/18~3/11](인강포함)<br>
                        - 2022년 대비 입문 기본 실강 + 기본 인강 제공(수강기간 동안)
                    </li><Br>
                    <li>
                        2. 2022년 대비 입문 기본종합반[1/18~3/11]<br>
                        - 2022년 대비 입문 기본 실강            
                    </li>
                </ul>   
                <div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>1. 2022년 시험대비 개편과목 기본종합반입니다.(영어,한국사 기본이론은 수강불가)</li>
                    <li>2. 12/8~12/28 휴원기간으로 12/21 개강하는 헌법 입문기초과정은 라이브로 진행됩니다.</li>
                    <li>3. 국가재난 정부 지침등으로 인한 학원 휴원으로 실강진행이 어려울 경우 동영상 강의로 대체 될수 있으며 ,이로 인한 해당기간 환불은 불가합니다.</li>
                </ul>  
                <ul>
					<li><strong>※ 학원종합반 문의 : 1544-0336</strong></li>
				</ul>
			</div>
		</div>               

	</div>

    <!-- End Container -->

    <script language="javascript">

/*디데이카운트다운*/
$(document).ready(function() {
     dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
 });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop