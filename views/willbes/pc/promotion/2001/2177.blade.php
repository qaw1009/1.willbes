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
        .sky {position:fixed;top:150px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:10px}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2177_top_bg.jpg) repeat-y center top;}     

        .evt01 {background:#f8f8f8;} 

        .evt02 {background:#ddd; padding-bottom:150px}

        .evt03 {background:#f1f1f1;position:relative;}
        .evt03 .evt03Box {width:1120px; margin:0 auto; position:relative}
        .evt03 .check {font-size:16px; text-align:center; line-height:1.5;margin-top:40px;font-weight:bold;}
        .evt03 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .evt03 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#000; margin-left:20px; border-radius:20px}
        .evt03 .check a:hover {color:#333; background:#35fffa;}
        .evt03 .info {margin:20px auto 50px; padding:10px;line-height:1.4; font-size:14px; font-weight:bold;}

        .evt04 {background:#fff;padding-bottom:100px;}
        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;margin-top:50px;}
        .tabContaier ul{width:964px;margin:0 auto;height:80px;border-bottom:5px solid #000;} 
        .tabContaier li{display:inline-block;width:400px;height:75px;line-height:75px;background:#ebebeb;color:#7f7f7f;float:left;font-size:25px;font-weight:bold;}
        .tabContaier li:first-child {margin-right:20px;margin-left:75px;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#000;font-size:40px;background:#fff;border:5px solid #000;border-bottom:none;}

        .evt04_table {width:1000px; margin:0 auto; padding:50px; background:#fff;}        
        .evt04_table .title {font-size:30px; color:#1f2327; text-align:left; margin-bottom:30px;margin-top:45px;}
        .evt04_table .title  span {color:#d2fefd; border-bottom:3px solid #9e96c2}
        .evt04_table tr {border-bottom:1px solid #000;border-top:1px solid #000;}        
        .evt04_table tr.st01 {background:#e3e4e5}
        .evt04_table tr:hover {background:#f7f7f7;}
        .evt04_table th,
        .evt04_table td {padding:15px 20px; font-size:16px; font-weight:500;}
        .evt04_table th {background:#d2fefd; color:#000 ;border-right:1px solid #000;font-weight:bold;}
        .evt04_table th:last-child{border:0;}
        .evt04_table td:nth-child(1) {text-align:center;border-right:1px solid #000;font-weight:bold;}
        .evt04_table td:nth-child(2) {border-right:1px solid #000;font-weight:bold;}
        .evt04_table td:nth-child(3) {border-right:1px solid #000;font-weight:bold;}
        .evt04_table td:last-child {border:0}
        .evt04_table td p {font-size:12px}
        .evt04_table a {padding:10px 14px; color:#000; background:#d2fefd; font-size:14px; display:block; border-radius:20px;}    
        .evt04_table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
        .evt04_table{background:#fff;}      

        .evtInfo {padding:100px 0; background:#555; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:35px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:20px;margin-bottom:15px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type:decimal; margin-left:20px; margin-bottom:5px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#lec01">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_sky01.jpg" alt="1단계" >
            </a>
            <a href="#lec02">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_sky02.jpg" alt="2단계" >
            </a>
            <a href="#lec03">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_sky03.jpg" alt="3단계" >
            </a>
            <a href="#lec04">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_sky04.jpg" alt="풆패키지" >
            </a>
        </div>       
     

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        문제풀이 종합반<br>사전접수 이벤트
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>                   
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_top.jpg" title="문제풀이 풀패키지">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_01.jpg" title="커리큘럼">           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_02_01.jpg" title="문제풀이 1단계" id="lec01"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_02_02.jpg" title="문제풀이 2단계" id="lec02"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_02_03.jpg" title="문제풀이 3단계" id="lec03"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif 
        </div>    

        <div class="evtCtnsBox evt03">
            <div class="evt03Box">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_03_01.jpg" title="문풀 풀패키지" id="lec04"/>
                <a href="javascript:go_PassLecture('181822');" title="문풀 오태진" style="position: absolute; left: 12.77%; top: 85.28%; width: 15.27%; height: 5.8%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('181821');" title="문풀 원유철" style="position: absolute; left: 42.23%; top: 85.28%; width: 15.27%; height: 5.8%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('181823');" title="문풀 경행경채" style="position: absolute; left: 72.32%; top: 85.28%; width: 15.27%; height: 5.8%; z-index: 2;"></a>
            </div>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 2022 신광은경찰 개편 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내확인하기 ↓</a>               
            </div>
            <div class="info">
                ※ 강의공유,콘텐츠 부정 사용적발시,회원 자격 박탈 및 환불이 불가하며,불법공유 시안에 따라 민형사상 조치가 있을수 있습니다.
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_03_02.jpg" />            
        </div>

        <div class="evtCtnsBox evt04" id="apply2">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2177_04.jpg" title="단계별 종합반" >
            <div class="tabContaier" id="apply">    
                <ul class="NSK-Black">    
                    <li><a href="#tab1" class="active">일반공채</a></li>                            
                    <li><a href="#tab2">경행경채</a></li>          
                </ul>
            </div> 

            <div id="tab1" class="tabContents">   
                <div class="evt04_table">     
                    <div class="title NSK-Black">              
                        문제풀이 1단계
                    </div>   
                    <div> 
                        <table border="0" cellspacing="0" cellpadding="0">
                            <col width="60%" />
                            <col width="25%" />
                            <col width="15%" />
                            <thead>
                                <tr>
                                    <th>강의명</th>
                                    <th>수강료</th>                        
                                    <th>온라인수강</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2021년 2차대비 1단계종합반 (한국사 원유철)</td>
                                    <td>
                                        <span class="tx-red">420,000원</span></td>              
                                    <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/181810">신청하기 ></a></td>
                                </tr>     
                                <tr>
                                    <td>2021년 2차대비 1단계종합반 (한국사 오태진)</td>
                                    <td>
                                        <span class="tx-red">390,000원</span>
                                    </td>                         
                                    <td><a href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/181811" target="_blank">신청하기 ></a></td>
                                </tr>                          
                            </tbody>
                        </table>        
                    </div> 
                    <div class="title NSK-Black">              
                        문제풀이 2단계
                    </div>   
                    <div> 
                        <table border="0" cellspacing="0" cellpadding="0">
                            <col width="60%" />
                            <col width="25%" />
                            <col width="15%" />
                            <thead>
                                <tr>
                                    <th>강의명</th>
                                    <th>수강료</th>                        
                                    <th>온라인수강</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2021년 2차대비 2단계 동형모의고사 종합반 (한국사 원/오 택1)</td>
                                    <td>
                                        <span class="tx-red">360,000원</span>
                                    </td>                         
                                    <td><a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1008" target="_blank">신청하기 ></a></td>
                                </tr>                                   
                            </tbody>
                        </table>        
                    </div>
                    <div class="title NSK-Black">              
                        문제풀이 3단계
                    </div>   
                    <div> 
                        <table border="0" cellspacing="0" cellpadding="0">
                            <col width="60%" />
                            <col width="25%" />
                            <col width="15%" />
                            <thead>
                                <tr>
                                    <th>강의명</th>
                                    <th>수강료</th>                        
                                    <th>온라인수강</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2021년2차대비 3단계 파이널 모의고사 종합반 (한국사 원/오 택1)</td>
                                    <td>
                                        <span class="tx-red">70,000원</span>
                                    </td>                         
                                    <td><a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1009" target="_blank">신청하기 ></a></td>
                                </tr>                                                          
                            </tbody>
                        </table>        
                    </div>                                                                        
                </div>    
            </div>

            <div id="tab2" class="tabContents">    
                <div class="evt04_table">     
                    <div class="title NSK-Black">              
                        문제풀이 1단계
                    </div>   
                    <div> 
                        <table border="0" cellspacing="0" cellpadding="0">
                            <col width="60%" />
                            <col width="25%" />
                            <col width="15%" />
                            <thead>
                                <tr>
                                    <th>강의명</th>
                                    <th>수강료</th>                        
                                    <th>온라인수강</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2021년 2차대비 1단계 패키지</td>
                                    <td>
                                        <span class="tx-red">360,000원</span>
                                    </td>                         
                                    <td><a href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/181812" target="_blank">신청하기 ></a></td>
                                </tr>                                   
                            </tbody>
                        </table>        
                    </div> 
                    <div class="title NSK-Black">              
                        문제풀이 2단계
                    </div>   
                    <div> 
                        <table border="0" cellspacing="0" cellpadding="0">
                            <col width="60%" />
                            <col width="25%" />
                            <col width="15%" />
                            <thead>
                                <tr>
                                    <th>강의명</th>
                                    <th>수강료</th>                        
                                    <th>온라인수강</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2021년2차대비 2단계 동형모의고사 패키지</td>
                                    <td>
                                        <span class="tx-red">360,000원</span>
                                    </td>                         
                                    <td><a href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/181816" target="_blank">신청하기 ></a></td>
                                </tr>                                                          
                            </tbody>
                        </table>        
                    </div>
                    <div class="title NSK-Black">              
                        문제풀이 3단계
                    </div>   
                    <div> 
                        <table border="0" cellspacing="0" cellpadding="0">
                            <col width="60%" />
                            <col width="25%" />
                            <col width="15%" />
                            <thead>
                                <tr>
                                    <th>강의명</th>
                                    <th>수강료</th>                        
                                    <th>온라인수강</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2021년2차대비 3단계 파이널 모의고사 패키지</td>
                                    <td>
                                        <span class="tx-red">70,000원</span>
                                    </td>                         
                                    <td><a href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/181820" target="_blank">신청하기 ></a></td>
                                </tr>                        
                            </tbody>
                        </table>        
                    </div>                                                                          
                </div>               
            </div>   
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">윌비스 신광은 경찰 문제풀이 풀패키지 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
					<li>선택한 문제풀이 풀패키지 표기 기간 동안 문풀 1~3단계 전 강좌를 무제한 수강 할 수 있습니다.</li>
                    <li>문풀 풀패키지 일바 직렬의 경우 한국사 교수님을 1분 선택하셔야 합니다.(변경은 불가)</li>
                    <li>문풀 풀패키지 강좌는 결제 완료 후 수강이 즉시 시작됩니다.(수강일 설정 불가)</li>                
				</ul>
				<div class="infoTit"><strong>수강관련</strong></div>
				<ul>
					<li>로그인 후 [내 강의실]-[무한 PASS존]으로 접속합니다.<br>
                    구매하신 [실전 문풀 풀패키지] 선택 후 [강좌 추가하기]클릭, 원하시는 강좌를 등록하시면 수강 할 수 있습니다.</li>
                    <li>문풀 풀패키지는 시작일 변경 및 지정,일시정지,수강 연장,재수강 신청 등이 되지 않는 상품입니다.</li>
                    <li>문풀 풀패키지 수강 시 이용 가능한 기기는 2대로 제한됩니다.(PC 2대 또는 모바일 2대 또는 PC 1대+모바일 1대)</li>
                    <li>PC,모바일 등 단말기 초기화가 필요한 경우 최초 초기화는 본인이 직접 초기화 진행 가능 합니다. <br>
                    그 이후 추가 초기화가 필요할 시 내용 확인 후 초기화 진행 가능 하오니 고객센터로 문의 바랍니다. (무한 PASS존 내 등록 기기정보 확인)</li>
                    <li>21년 2차대비 2단계,3단계 문제풀이 강의는 강의자료 3회출력제한 됩니다. <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=252343" target="_blank" class="tx-sky-blue">출력제한 안내 바로보기 ></a></li>  
				</ul>
                <div class="infoTit"><strong>교재 구매</strong></div>
				<ul>
					<li>실전 문풀 패키지 강의에 사용되는 교재는 별도로 구매하셔야 하며,각 강좌별 교재는 강좌 소개 및 [교재구매] 메뉴에서 구매 가능합니다.</li>  
				</ul>
                <div class="infoTit"><strong>환불 안내</strong></div>
				<ul>
					<li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 부분 환불은 수강 시작일(당일포함)로부터 7일이 경과되면,문제풀이 풀패키지 정가 기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</li>  
				</ul>  
                <div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립급 사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                    <li>신광은 경찰 문풀풀패키지 강좌(부가 서비스 등)중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유,타인양도 등 부정 사용 적발 시 회원 자격 박탈 및 환불 불가하며,불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>  
				</ul>              
				<div class="infoTit"><strong>※ 이용문의 : 고객만족센터 1544-5006</strong></div>			
			</div>
		</div>        
	</div>
    <!-- End Container -->

<script type="text/javascript">    
    function go_PassLecture(code) {
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }
        var url = '{{ site_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
        location.href = url;
    } 

    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
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