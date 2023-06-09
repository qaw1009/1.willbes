@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed;top:300px;right:0;z-index:1;}
            
        .wb_top {background:#0e0b00 url(https://static.willbes.net/public/images/promotion/2020/12/1970_top_bg.jpg) no-repeat center top; }   

        .wb_cts01 {background:#fff}
        .wb_cts02 {background:#abb1b9}
        .wb_cts03 {background:#eceef0}
		.wb_cts04 {background:#fff}
        .wb_cts05 {background:#f6f9fe}

        .evtInfo {padding:80px 0; background:#333333; color:#fff; font-size:17px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px;}
		.evtInfoBox ul {margin-bottom:30px}
        
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

        
        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;padding-bottom:35px;}
        .tabContaier ul{width:1050px;margin:0 auto;height:70px;} 
        .tabContaier li{display:inline-block;width:525px;height:65px;line-height:65px;background:#e1e1e1;color:#acacac;float:left;font-size:26px;font-weight:bold;border-bottom:5px solid #8e21b8;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#fff;font-size:32px;background:#8e21b8}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
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
                    <td><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="skybanner" >
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2020/12/1970_sky.jpg" alt="스카이베너" ></a>
        </div>	

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1970_top.jpg" alt="슈퍼pass" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1970_01.jpg" alt="슈퍼pass"  />
        </div>      

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1970_02.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1970_03.jpg" alt="슈퍼pass" />       
        </div>

        <div class="evtCtnsBox wb_cts04" id="apply" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1970_04.jpg" alt="슈퍼pass" usemap="#Map1970" border="0" />
            <map name="Map1970">
                <area shape="rect" coords="219,1127,897,1235" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" alt="신청하기">
            </map>         
        </div>

        <div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">유의사항</h4>
				<div class="infoTit NG"><strong>경찰 전문 교수진</strong></div>
				<ul>
					<li>형소법/수사 - 신광은 교수님</li>
                    <li>경찰학/행정법 - 장정훈 교수님</li>   
                    <li>형법 – 김원욱 교수님</li>   
                    <li>영어 – 하승민 교수님</li>   
                    <li>한국사(택1) – 원유철 교수님, 오태진 교수님</li>                     
				</ul>
                <div class="infoTit NG"><strong>★ 인강+3개월 실강 사전접수 이벤트 ★</strong></div>
				<ul>
                    <li>- 접수기간 : 12/8(화) 18시까지</li>
					<li>- 개강일 전 심화 인강 선지급 진행 , 접수일 ~ 12월 20일(일)</li>                
				</ul>
				<div class="infoTit NG"><strong>3개월 PASS 유의사항</strong></div>
				<ul>
                    <li>① 3개월PASS는 2021년 2월 28일까지 책정된 수강료로 시험일정에 따라 추가 수강료가 부과될 수 있습니다. </li>
                    <li>② 영어집중관리반 ,영어아침특강은 포함되어있지 않아 별도의 수강등록이 필요합니다.</li>
                    <li>③ 특강의 경우 별도 신청이 필요합니다.</li>
                    <li>④ 일부특강은 유료로 결제할수 있습니다.</li>
                    <li>⑤ 국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로
                    대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.</li>    
				</ul>
				<div class="infoTit NG"><strong>3개월 PASS</strong></div>
				<ul>
					<li> - 포함과정 : 심화(인강)+문제풀이+마무리특강</li>				
				</ul>
				<ul>
					<li><strong>* 학원사정으로 이벤트 기간 및 금액변동이 있을 수 있습니다.</strong></li>
					<li><strong>* 학원접수 문의 : 1544-0336</strong></li>
				</ul>
			</div>
		</div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        
          /*디데이카운트다운*/
          $(document).ready(function() {
              dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

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