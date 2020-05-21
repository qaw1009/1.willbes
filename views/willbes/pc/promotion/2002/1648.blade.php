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

        .wb_cts00 {background:#404040}
        .wb_top {background:#001800 url(https://static.willbes.net/public/images/promotion/2020/05/1648_top_bg.jpg) no-repeat center top; }   

        .wb_cts01 {background:#fff}
        .wb_cts02 {background:#abb1b9 url(https://static.willbes.net/public/images/promotion/2020/05/1648_02_bg.jpg) no-repeat center top; }
        .wb_cts03 {background:#eceef0}
		.wb_cts04 {background:#fff}
        .wb_cts05 {background:#f6f9fe}

        .evtInfo {padding:80px 0; background:#292b31; color:#fff; font-size:17px}
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

        .tabs{width:100%; text-align:center; padding-bottom:20px;}
        .tabs ul {width:1120px;margin:0 auto;}		
        .tabs li {display:inline; float:left;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}


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
            <a href="#lect"><img src="https://static.willbes.net/public/images/promotion/2020/05/1648_sky01.png" alt="스카이베너" ></a>
        </div>

        <div class="skybanner2" >
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1053" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/05/1648_sky02.png" alt="스카이베너" ></a>
        </div>               

		<div class="evtCtnsBox wb_cts00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_00.jpg" alt="슈퍼pass"/>            
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1648_top.jpg" alt="슈퍼pass" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1648_01.jpg" alt="슈퍼pass"  />
        </div>      

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1648_02.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1648_03.jpg" alt="슈퍼pass" />       
        </div>
		
		<div class="evtCtnsBox wb_cts04" id="lect" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1648_04.jpg" alt="슈퍼pass" usemap="#Map1648a" border="0"  />
            <map name="Map1648a" id="Map1648a">
                <area shape="rect" coords="187,1209,552,1272" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank" />
                <area shape="rect" coords="570,1209,938,1274" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3011&campus_ccd=605001&course_idx=1085" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1648_05.jpg" alt="슈퍼pass"  />
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
				<div class="infoTit NG"><strong>9개월 슈퍼패스 유의사항</strong></div>
				<ul>
					<li>① 9개월 슈퍼패스는 2021년 2월 28일까지 책정된 수강료로 시험일정에 따라 추가 수강료가 부과될 수 있습니다.</li>
                    <li>② 영어아침특강은 슈퍼패스에 포함되어있지 않아 별도의 수강등록이 필요합니다.</li>
                    <li>③ 특강의 경우 별도 신청이 필요합니다.</li>
                    <li>④ 일부특강은 유료로 결제할수 있습니다.</li>       
				</ul>
				<div class="infoTit NG"><strong>9개월 슈퍼패스</strong></div>
				<ul>
					<li>- 포함과정 : 기본+심화이론+심화기출+문제풀이+특강+모의고사+사물함</li>				
				</ul>
				<div class="infoTit NG"><strong>9개월 슈퍼패스 환승 이벤트</strong></div>
				<ul>
					<li>- 대상자 : 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있고,  최근 1년간 자사 실강 수강이력이 없는 수강생</li> 
                    <li>- 타학원 수강이력을 반드시 증명할 수 있어야 합니다.</li>              
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
        /*tab*/
        $(document).ready(function(){
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                //$active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });
        
          /*디데이카운트다운*/
          $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop