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

        .skybanner {position:fixed;top:300px;right:0;z-index:1;}
        .skybanner2{position:fixed;top:530px;right:0;z-index:1;}
        
        .wb_top {background:#0e0b00 url(https://static.willbes.net/public/images/promotion/2020/08/1759_top_bg.jpg) no-repeat center top; }   

        .wb_cts01 {background:#fff}
        .wb_cts02 {background:#abaeb1 url(https://static.willbes.net/public/images/promotion/2020/06/1684_02_bg.jpg) no-repeat center top; }
        .wb_cts03 {background:#e3e3e3}
		.wb_cts04 {background:#fff}
        .wb_cts05 {background:#ebecef}

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
        .tabContaier li{display:inline-block;width:525px;height:65px;line-height:65px;background:#e1e1e1;color:#acacac;float:left;font-size:19px;font-weight:bold;border-bottom:5px solid #E724BC;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#fff;font-size:26px;background:#E724BC}

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
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2020/08/1759_sky.png" alt="스카이베너" ></a>
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1759_top.jpg" alt="슈퍼pass" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1759_01.jpg" alt="슈퍼pass"  />
        </div>      

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1759_02.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1759_03.jpg" alt="슈퍼pass" />       
        </div>

        <div class="evtCtnsBox wb_cts04" id="apply" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1759_04.jpg" alt="슈퍼pass" /> 
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier">    
                    <ul>    
                        <li><a href="#tab1" class="active">일반경찰</a></li>
                            
                        <li><a href="#tab2">경행경채</a></li>              
                    </ul>
                </div> 
                <div id="tab1" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1759_04_cts01.jpg" usemap="#Map1759a"  title="일반경찰" border="0" />
                    <map name="Map1759a" id="Map1759a">
                        <area shape="rect" coords="227,601,890,713" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" />
                    </map>           
                </div>
                <div id="tab2" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1759_04_cts02.jpg" usemap="#Map1759b"  title="경행경채" border="0" />
                    <map name="Map1759b" id="Map1759b">
                        <area shape="rect" coords="223,603,893,712" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3011&campus_ccd=605001&course_idx=1085" target="_blank" />
                    </map>     
                </div> 
            </div>         
        </div>		

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1759_05.jpg" alt="슈퍼pass"  />
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
				<div class="infoTit NG"><strong>12개월 슈퍼패스 유의사항</strong></div>
				<ul>
					<li>① 12개월 슈퍼패스는 2021년 8월 31일까지 책정된 수강료로 시험일정에 따라 추가 수강료가 부과될 수 있습니다.<br/>&nbsp;&nbsp;&nbsp;&nbsp;(1개월 연장 시 - 실강 10만원, 인강 5만원)</li>
                    <li>② 영어집중관리반 ,영어아침특강은 슈퍼패스에 포함되어있지 않아 별도의 수강등록이 필요합니다.</li>
                    <li>③ 특강의 경우 별도 신청이 필요합니다.</li>
                    <li>④ 일부특강은 유료로 결제할수 있습니다.</li>       
				</ul>
				<div class="infoTit NG"><strong>12개월 슈퍼패스</strong></div>
				<ul>
					<li> - 포함과정 : 기본이론+심화이론·기출+문제풀이+특강+모의고사+사물함</li>				
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