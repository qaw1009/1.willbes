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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky{position:fixed;top:250px;right:0;z-index:1;}
        .wb_cts00 {background:#404040}

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:28px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#424ac7}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#424ac7}
        to{color:#000}
        } 

        .wb_top {background:#191c22 url(https://static.willbes.net/public/images/promotion/2020/05/1647_top_bg.jpg) no-repeat center top; } 
        .wb_cts03 {background:#e2e3e7;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox .original {text-decoration:line-through;} 

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="sky" >
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2020/05/1647_sky.png" alt="스카이베너" ></a>
        </div>     

		<div class="evtCtnsBox wb_cts00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_00.jpg" alt="신광은 경찰팀"/>            
        </div>

        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
           <div>
               <table>
                   <tr>                    
                   <td class="time_txt"><span>사전접수 이벤트<br>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} 까지</span></td>
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
                   <td>남았습니다!</td>
                   </tr>
               </table>                
           </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1647_top.jpg" alt="슈퍼pass" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1647_01.jpg" alt="경찰 시험준비" />
        </div>      

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1647_02.jpg" alt="전문 교수진" />
        </div>

        <div class="evtCtnsBox wb_cts03" id="apply" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1647_03.jpg" alt="강의 신청하기" usemap="#Map1647a" border="0" />
            <map name="Map1647a" id="Map1647a">
                <area shape="rect" coords="33,1050,187,1135" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1042" target="_blank" />
                <area shape="rect" coords="191,1050,348,1137" href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1042" target="_blank" />
                <area shape="rect" coords="483,1051,736,1135" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" />
                <area shape="rect" coords="755,1050,1020,1137" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3011&campus_ccd=605001&course_idx=1085" target="_blank" />
            </map>                      
        </div>

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">유의사항</h4>
				<div class="infoTit NG"><strong>슈퍼패스 경찰 전문 교수진</strong></div>
				<ul>
					<li>형소법/수사 - 신광은 교수님</li>
                    <li>경찰학/행정법 - 장정훈 교수님</li>   
                    <li>형 법 – 김원욱 교수님</li>   
                    <li>영어 – 하승민 교수님</li>   
                    <li>한국사(택1) – 원유철 교수님,오태진 교수님</li>                     
				</ul>
				<div class="infoTit NG"><strong>3개월 패스 공통 유의사항</strong></div>
				<ul>
					<li>① 3개월  슈퍼패스는 2020년 8월 30일까지 책정된 수강료로 시험일정에 따라<br/>&nbsp;&nbsp;&nbsp;&nbsp;정규과정 이외에 강의가 진행될 경우 추가 수강료가 발생할수 있습니다.</li>
                    <li>② 영어 집중관리반, 영어 아침특강은 슈퍼패스에 포함되어있지 않아 별도의 수강등록이 필요합니다.</li>
                    <li>③ 특강의 경우 별도 신청이 필요합니다.</li>
                    <li>④ 일부특강은 유로로 결제할수 있습니다.</li>       
				</ul>
				<div class="infoTit NG"><strong>3개월 필합패스</strong></div>
				<ul>
					<li>① 3개월 필합패스 40% 할인 : <span class="original">1,660,000원</span> →  996,000원</li>	
                    <li>② 포함과정 : 실강 정규과정 + 특강 + 모의고사  +  사물함</li>			
				</ul>
				<div class="infoTit NG"><strong>3개월 슈퍼패스</strong></div>
				<ul>
					<li>① 3개월 슈퍼패스 35% 할인 : <span class="original">1,660,000원</span> →  1,079,000원</li> 
                    <li>② 포함과정 : 실강 정규과정 + 특강 + 모의고사  +  사물함 + 인강PASS</li>              
				</ul>
                <div class="infoTit NG"><strong>3개월 &lt;환승형&gt; 슈퍼패스</strong></div>
				<ul>
					<li>① 대상자 : 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있고,<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2019년 이후 자사 실강 수강이력이 없는  수강생</li> 
                    <li>② 타학원수강생 수강이력을 반드시 증명할 수 있어야 합니다.</li>              
				</ul>
				<ul>
					<li><strong>* 학원사정으로 이벤트 기간 및 금액변동이 있을수 있습니다.</strong></li>
					<li><strong>* 학원접수 문의 : 1544-0336</strong></li>
				</ul>
			</div>
		</div>
		
    </div>
    <!-- End Container -->

    <script type="text/javascript">

     /*디데이카운트다운*/
     $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop