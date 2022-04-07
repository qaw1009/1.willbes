@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .skybanner {position:fixed;top:100px;right:10px;width:259px; text-align:center; z-index:11;}   
        .skybanner a {display:block;margin-bottom:5px;}          

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/10/1066_top_bg.jpg) center top no-repeat}

        .wb_cts00 {padding:50px 0 150px}

        .tabContaier{width:100%;}
        .tabContaier ul {margin:0 auto; width:980px}		
        .tabContaier li {display:inline; float:left}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}      


        .wb_cts02 {background:#00ced1}

        .wb_cts02s {background:#e35330;}
        .wb_cts02s .tImg img {margin:0 5px 10px;width:302px;height:166px;border:2px solid #28364a;}

        .wb_cts03 {padding-bottom:150px}

        .wb_cts04 {background:#e35330;}

        .wb_cts05 {padding-bottom:150px}
        .wb_cts05 table {border-top:4px solid #1c1d31; border-left:1px solid #c6c6c6; width:980px; margin:0 auto}
        .wb_cts05 table tr {border-bottom:1px solid #c6c6c6;}
        .wb_cts05 table th,
        .wb_cts05 table td {padding:20px; font-size:14px; line-height:1.5; border-right:1px solid #c6c6c6;}
        .wb_cts05 table th {background:#f3f3f3}
        .wb_cts05 table th p {color:#e55425; font-weight:600}
        .wb_cts05 table th strong {font-size:20px}
        .wb_cts05 table td a {display:block; padding:5px}
        .wb_cts05 table td a:hover {background:#ffede8}
        .wb_cts05 table td span {vertical-align:top; color:#e55425;}

        .wb_cts07 {background:#f1f1f1;}
        .wb_cts07 .wrap span {position: absolute; top:549px; left:50%; width:302px; margin-left:-427px} 
        .wb_cts07 .wrap span img {width:100%}

 
        .wb_cts01 {background:#1e1c31; padding:20px 0;} 
        /*타이머*/
        .time {text-align:center; border-radius:20px; width:1000px !important; margin:0 auto;}
        .time ul {}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; font-size:28px; margin-right:10px; color:#fff !important}
        .time li:first-child {}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; vertical-align:text-top}
        @@keyframes upDown{
            from{color:#d63e4d}
            50%{color:#ff6600}
            to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
            from{color:#d63e4d}
            50%{color:#ff6600}
            to{color:#d63e4d}
        }   
    </style>


    <div class="evtContent NSK" id="evtContainer">      
        <div class="skybanner" id="QuickMenu">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" >
            </a>        
        </div>
      
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/1066_top.jpg" title="제니스 영어 한덕현" />
        </div>

        <div class="evtCtnsBox wb_cts01" id="wb_cts01_01">
            <div class="time NGEB" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</li>
                    <li class="time_txt"><span>남은 시간은</span></li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>             
                </ul>
            </div>
        </div>   
        
        <div class="evtCtnsBox wb_cts00" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/1066_00.jpg" title="합격전략 공개" />
            <div class="tabContaier">
				<ul>
					<li>
						<a class="active" href="#tab1">
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab01.jpg" class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab01_on.jpg" class="on"  />
                        </a>
                    </li>
					<li>
						<a href="#tab2">
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab02.jpg"  class="off"  />
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab02_on.jpg"  class="on" />
                        </a>
					</li>
					<li>
						<a href="#tab3">
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab03.jpg"  class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab03_on.jpg"  class="on" />
                        </a>
					</li>
				</ul>
				<div class="tabContents" id="tab1">
					<img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab01_cts.jpg" alt="윌비스 영어 40~60점대 강력 추천! " />
				</div>
				<div class="tabContents" id="tab2">
					<img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab02_cts.jpg" alt="윌비스 영어 60~80점대 강력 추천! " />
				</div>
				<div class="tabContents" id="tab3">
					<img src="https://static.willbes.net/public/images/promotion/2021/04/2180_01_tab03_cts.jpg" alt="윌비스 영어 70점 이상 강력 추천! " />
				</div>
			</div>
		</div>

        <div class="evtCtnsBox wb_cts02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_02.jpg" title="반반한 모의고사 무료방송" />
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1676" target="_blnak" style="position: absolute; left: 22.86%; top: 78.76%; width: 54.02%; height: 9.15%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/1066_05.jpg" alt="영어는 어려운 과목이 아닙니다." />   
        </div>

        <div class="evtCtnsBox wb_cts05" id="cts05">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1066_06.jpg" alt="커리큘럼"/>   
            <table>
                <col />
                <col />
                <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th><strong>구분</strong></th>
                        <th>영어의 근간이 되는 문법,
                        <p>단계별 학습으로 실력 UP!</p>
                        <strong>문법</strong></th>
                        <th>영어 고득점 달성에
                        <p>최적화된 독해 커리큘럼</p>
                        <strong>독해</strong></th>
                        <th>출제 범위 내외 있는
                        <p>영어 어휘 완전정복!</p>
                        <strong>어휘</strong></th>
                        <th>기본을 탄탄히 했다면,
                        <p>이제 실전도 확실하게!</p>
                        <strong>실전</strong>(전영역)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><strong>기본</strong></th>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/169567" target="_blank" >기초입문</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183409" target="_blank">제니스문법</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154894" target="_blank">제니스 독해</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/185366" target="_blank">필살기출비법</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/184920" target="_blank">첨삭독해</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157581" target="_blank">제니스 보카</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/186620" target="_blank">스나이퍼32</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/192323" target="_blank"><span>NEW</span> 새벽모의고사</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <strong>심화</strong>
                        </th>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183412" target="_blank">실전문법 464</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank">실전영작 215</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/186619" target="_blank">기출리뷰</a>
                        </td>
                       <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/185364" target="_blank">독해기적</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/186621" target="_blank">논리독해</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145826" target="_blank">열끝생활영어</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/192958" target="_blank"><span>NEW [지방직]</span> 아작내기</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/192955" target="_blank"><span>NEW</span> 실전동형모의고사</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <strong>실전</strong>
                        </th>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank">제니스 PICK263</a>
                        </td>
                        <td></td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank">실전보카 371</a>
                        </td>
                        <td>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/158682" target="_blank"><span>[ONE DAY]</span> 생활영어</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/189353" target="_blank">영작</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/only/prod-code/169814" target="_blank">동취미</a>
                            <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/189351" target="_blank">실전스킬독해</a>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>

    </div>
    <!-- End Container -->

    <script>  
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });      
        
        /*tab*/
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
 