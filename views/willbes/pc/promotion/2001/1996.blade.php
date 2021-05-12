@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/1996_top_bg.jpg) no-repeat center top; height:1499px}
        .wb_top span.img01 { position:absolute; top:90px; left:50%; width:1007px; margin-left:-550px; z-index:1; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        @@keyframes iptimg1{
            from{top:-100px; opacity: 0;}
            70%{top:140px;}
            to{top:90px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
            from{top:-100px; opacity: 0;}
            70%{top:140px;}
            to{top:90px; opacity: 1;}
        }
        .wb_top span.img02 { position:absolute; top:520px; left:50%; width:817px; margin-left:-408px; z-index:2;}

        .wb_01 {background:#fff; padding-bottom:150px}
        .wb_01 .btnLec {width:600px; margin:50px auto; padding:20px; background:#000; color:#fff; font-size:30px; border-radius:40px}
        .wb_01 .check {
            font-size:14px; text-align:center; line-height:1.5;font-weight:bold;}
        .wb_01 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .wb_01 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#c40007; margin-left:20px; border-radius:20px}
        .wb_01 .info {width:500px; margin:50px auto 0; padding:20px; background:#e8e8e8; color:#777; line-height:1.4; text-align:left}

        .wb_02 {background:#f1f1f1}
        .wb_02 .youtube {position:absolute; top:896px; left:50%; width:768px; z-index:1;margin-left:-384px; box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .wb_02 .youtube iframe {width:768px; height:370px}    

        .evtInfo {padding:80px 0; background:#333; color:#f0f0f0; font-size:16px;}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.5}
        .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px;}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}

        .skyBanner {position:fixed; width:120px; top:200px; right:10px; z-index:5;}
        .skyBanner a {display:block; margin-bottom:5px}       
    </style>

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <!-- 타이머 -->
        <div class="evtCtnsBox time NSK-Black" id="newTopDday">
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

        <div class="skyBanner">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1996_sky.jpg" alt="신청하기">
            </a>
        </div>    

        <div class="evtCtnsBox wb_top">
            <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2020/12/1996_top_img01.png" alt="2022 신광은 경찰 패스"/></span>   
            <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2020/12/1996_top_img02.png" alt="2022 신광은 경찰 패스 교수진"/></span>  
        </div>

        <div class="evtCtnsBox wb_01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1996_01.jpg" alt="2022 신광은 경찰 패스 혜택"/>
            <div class="btnLec NSK-Black" id="apply"><a href="javascript:go_PassLecture('177223');" >2022 신광은경찰 PASS 신청하기 ></a></div>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 신광은경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내확인하기 ↓</a>               
            </div>
            <div class="info">
                ※ 강의공유, 콘텐츠 부정사용 적발 시, 0원 패스의 수강기간 갱신 및 환급이 불가합니다.<br/>
                ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br/>
                ※ 한정 상품으로 할인쿠폰이 사용불가한 상품입니다.<br/>
            </div> 
        </div>  

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1996_02.jpg" alt="점수의 비밀" /> 
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qkIw507IPpM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>           
        </div>


        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">2022 신광은경찰 PASS 경찰 </h4>
				<div class="infoTit"><strong>전문 교수진</strong></div>
				<ul>
					<li>본 상품은 구매일로부터 15개월간 수강 가능한 상품입니다.</li>
                    <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                    - 2022 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                    - G-TELP 특강, 한국사능력검정시험 특강<br>
                    - 2021년 1차대비 신광은 형사소송법 기본이론 (20년 9월)<br>
                    - 2021년 1차대비 장정훈 경찰학개론 기본이론 (20년 12월)<br>
                    - 2021년 1차대비 김원욱 형법 기본이론 (20년 11월)<br>
                    - 2021년 1차대비 신광은 형사소송법 심화이론 + OX (20년 10월)<br>
                    - 2020년 2차대비 장정훈 경찰학개론 심화이론 (20년 5월)<br>
                    - 2020년 2차대비 김원욱 형법 기본서 판례 심화이론 (20년 5월)<br>
                    - 2021년 1차대비 신광은 형법 심화이론 (20년 10월)<br>
                    (수강가능 교수진 확인하기 > 형사법 : 신광은 교수님, 헌법 : 김원욱 교수님, 경찰학개론(개편) : 장정훈 교수님, G-TELP : 김준기 교수님, 한능검 : 원유철 교수님, 오태진 교수님)</li>
                    <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                    <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>                  
				</ul>
				<div class="infoTit"><strong>교재</strong></div>
				<ul>
					<li>신광은경찰PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>    
				</ul>
				<div class="infoTit"><strong>노량진 실시간 LIVE</strong></div>
				<ul>
					<li>노량진 실시간 LIVE는 입문기본이론 강의기간(1/11~3/11) 2개월 동안 제공됩니다.</li> 
                    <li>노량진 실시간 LIVE <a href="https://police.willbes.net/pass/support/notice/show?board_idx=307555&" target="_blank" class="tx-red">수강 방법 보기></a> </li>                                    				
				</ul>
                <div class="infoTit"><strong>환불</strong></div>
				<ul>
					<li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li> 
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li> 
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li> 
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 결제가 기준으로 계산하여 
                        사용일수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li> 
                    <li>교재 포인트를 사용했을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                        (교재 포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>                    				
				</ul>
				<div class="infoTit"><strong>PASS 수강</strong></div>
				<ul>
					<li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 <br>
                        모바일 1대 또는 모바일 2대(신광은경찰PASS PMP강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.다만 추후 초기화가
                        필요할 시 내용 확인 후 가능 하오니 고객센터로 문의주시기 바랍니다. ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>                    				
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
				<ul>
					<li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                    이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                    <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘 등)는 제공되지 않습니다.</li>
                    <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                    <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>                    				
				</ul>
                <div class="infoTit"><strong>※ 이용 문의 : 1544-5006 / 사이트 내 1:1 상담 게시판</strong></div>
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
            var url = '{{ site_url('/periodPackage/show/cate/3093/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop