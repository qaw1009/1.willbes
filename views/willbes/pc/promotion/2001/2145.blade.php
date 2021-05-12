@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        /************************************************************/
        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:225px;right:10px;z-index:10;}
        .sky a {display:block;margin-bottom:15px;}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2021/03/2145_top_bg.jpg") no-repeat center top;}
        
        .evt01 {background:#ffd162; padding-bottom:100px}
        .evt01 .ImgBox {width:1120px; margin:0 auto; position:relative;}
        .evt01 .btnLec {width:600px; margin:50px auto; padding:20px; background:#000; color:#fff; font-size:30px; border-radius:40px}
        .evt01 .check {font-size:16px; text-align:center; line-height:1.5;margin-top:40px;font-weight:bold;}
        .evt01 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .evt01 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#000; margin-left:20px; border-radius:20px}
        .evt01 .info {width:600px; margin:40px auto 0; padding:20px;line-height:1.4; text-align:left; font-size:14px;font-weight:bold;}
        
        .evt02 {background:#eee;}

        .evt04 {background:#fff;  position:relative}	
        .evt04 .youtube iframe {width:550px; height:310px} 
        .evt04 .youtube {position:absolute; top:312px; left:52.3%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .evt04 .youtube.yu02 {top:741px; margin-left:-168px;}
        .evt04 .youtube.yu03 {top:1171px;}   

        .evt05 {background:#5B68EA;}

        .evt06 {background:#F6F9FE;}

        .evt07 {background:#F8AECF;}

        .evt08 {background:#F6F9FE; padding-bottom:100px}
        .evt08 .ImgBox {width:1120px; margin:0 auto; position:relative;}
        .evt08 .btnLec {width:600px; margin:50px auto; padding:20px; background:#000; color:#fff; font-size:30px; border-radius:40px}
        .evt08 .check {font-size:16px; text-align:center; line-height:1.5;margin-top:40px;font-weight:bold;}
        .evt08 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .evt08 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#000; margin-left:20px; border-radius:20px}
        .evt08 .info {width:600px; margin:40px auto 0; padding:20px;line-height:1.4; text-align:left; font-size:14px;font-weight:bold;}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday div {font-size:22pt;color:#000; margin-top:10px;}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:20px; margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul li:last-child span {display:block; margin-top:10px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px;}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.5}
        .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox .only {color:#E80000;vertical-align:top;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#apply1"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_sky1.png" alt="개편패스 신청하기" >
            </a>      
            <a href="#apply2"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_sky2.png" alt="쿠폰 신청하기" >
            </a>           
        </div>    

         <!-- 타이머 -->
         <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>2022 개편 PASS</span>
                        <div class="NSK-Black">{{$arr_promotion_params['turn']}}기 판매종료까지</div>
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
                        <a href="#apply1" target="_self">수강하기 &gt;</a>
                        <span class="NSK-Black">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!</span>
                    </li>
                </ul>
            </div>
        </div> 

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>       

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_top.jpg"  alt="개편패스"/>
        </div>


        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_01.jpg"  alt="수강 신청하기"/>
            <a href="javascript:go_PassLecture('180683');" title="경찰 개편 pass 수강신청하기" style="position: absolute; left: 33.55%; top: 79.14%; width: 29.54%; height: 4.86%; z-index: 2;"></a>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 2022 신광은경찰 개편 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내확인하기 ↓</a>               
            </div>
            <div class="info">
                ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                ※ 한정 상품으로 할인쿠폰이 사용불가한 상품입니다.<br>
                ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_02.jpg"  alt="준비해야하는 이유"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_03.jpg"  alt="교수진"/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_04.jpg"  alt="경찰팀 유튜브"/>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu02">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu03">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>		
        </div>

        <div class="evtCtnsBox evt05">      
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_05.jpg" alt="전국 모의고사"/>            
        </div>

        <div class="evtCtnsBox evt06">      
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_06.jpg" alt="100% 할인"/>            
        </div>

        <div class="evtCtnsBox evt07" id="apply2">      
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_07.jpg" alt="갓스물 인증하기"/>         
            <a href="javascript:void(0);" title="갓스물 인증하기" onclick="certOpen();" style="position: absolute; left: 34.55%; top: 51.14%; width: 30.54%; height: 4.86%; z-index: 2;"></a>   
        </div>

        <div class="evtCtnsBox evt08" id="apply1">      
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2145_08.jpg" alt="수강 신청하기"/> 
            <a href="javascript:go_PassLecture('180683');" title="경찰 개편 pass 수강신청하기" style="position: absolute; left: 38.55%; top: 61.14%; width: 23.54%; height: 7.86%; z-index: 2;"></a>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 2022 신광은경찰 개편 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내확인하기 ↓</a>               
            </div>
            <div class="info">
                ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                ※ 한정 상품으로 할인쿠폰이 사용불가한 상품입니다.<br>
                ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br>
            </div>           
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">2022 신광은 경찰 개편PASS 3기 이용안내</h4>
                <div class="infoTit">2022 개편PASS 3기</div>
				<ul>
					<li>본 상품은 구매일로부터 12개월간 수강 가능하며, 불합격 인증 시 22년 2차 필기시험까지 수강기간 연장되는 상품입니다.</li>
                    <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                    - 2022 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                    - 2021년 1차 대비 신광은 형사소송법 기본이론 (20년 9월)<br>
                    - 2021년 1차 대비 장정훈 경찰학개론 기본이론 (20년 12월)<br>
                    - 2021년 1차 대비 김원욱 형법 기본이론 (20년 11월)<br>
                    - 2021년 1차 대비 신광은 형사소송법 심화이론 + OX (20년 10월)<br>
                    - 2020년 2차 대비 장정훈 경찰학개론 심화이론 (20년 5월)<br>
                    - 2020년 2차 대비 김원욱 형법 기본서 판례 심화이론 (20년 5월)<br>
                    - 2021년 1차 대비 신광은 형법 심화이론 (20년 10월)<br>
                    - (수강가능 교수진 확인하기 > 형사법 : 신광은 교수님, 헌법 : 김원욱 교수님, 경찰학개론(개편) : 장정훈 교수님)</li>
                    <li>선택한 신광은 경찰 개편PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                    <li>신광은 경찰 개편PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>  
                    <li>범죄학 강의는 포함되지 않습니다.</li>
				</ul>
                <div class="infoTit">이벤트 혜택</div>
				<ul>
					<li>2개월(60일) 수강기간 연장<br>
                    - 제공되는 수강기간 중 12개월은 정규 수강 기간이며, 이 후 추가 제공되는 60일은 이벤트 수강 기간입니다.<br>
                    - 이벤트로 제공되는 수강기간은 정규 수강기간이 아니며, 정규 수강기간(12개월)이 지나면 환불이 불가합니다.</li>
                    <li>수강기간 연장<br>
                    - 개편PASS 3기는 갱신형 상품입니다. 시험 응시 후 불합격 인증하여야 수강기간이 갱신됩니다.<br>
                    - 구매일로부터 12개월(365일)간 유료 수강 가능하며, 갱신 신청한 수강생에 한하여 22년 2차 필기시험일까지 무료 연장됩니다.<br>
                    - 수강기간 갱신이 필요한 경우 갱신 신청 기간 내에 직전 시험 불합격 증빙(응시표, 성적표) 자료를 제출 하셔야 합니다.<br>
                    - 불합격 인증 시에 전과목 0점일 경우 수강기간 갱신은 불가능합니다.<br>
                    - 시험 접수 후 시험에 응시하지 못한 경우 수강기간 갱신 불가합니다.<br>
                    - 강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.<br>
                    - 상품에 등록된 과목 이외의 다른 강의는 추가 제공되지 않습니다.<br>
                    - 갱신되어 제공되는 기간의 강의는 무료 서비스이며, 환불대상이 아닙니다.<br>
                    - 자세한 수강기간 갱신 방법은 공지사항에서 확인 바랍니다.</li>
                    <li>입문서 증정<br>
                    - 개편PASS 구매 시 관리자 확인후에  회원님 장바구니로 지급해드립니다.<br>
                    - 단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리<br>
                    - 장바구니에서 0원으로 교재 주문해야 합니다. (배송비 본인 부담)<br>
                    - 중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                    <li>G-TELP&한능검 특강 100% 할인쿠폰<br>
                    - G-TELP&한능검 특강 100% 할인쿠폰은 2022 개편PASS 구매 시 자동 발급됩니다.<br>
                    - 수강기간 중 아래 강좌에 각 1회씩 사용 가능합니다.<br>
                    (G-TELP 주요문법강의, G-TELP 실전모의고사 강의, 오태진 한능검 요약강의 3급 대비)</li>
                    <li>G-TELP&한능검 특강 100% 할인쿠폰<br>
                    - G-TELP&한능검 특강 100% 할인쿠폰은 2022 개편PASS 구매 시 자동 발급됩니다.(사용기간 : 365일)<br>
                    - 수강기간 중 아래 강좌에 각 1회씩 사용 가능합니다.<br>
                    (G-TELP 주요문법강의, G-TELP 실전모의고사 강의, 오태진 한능검 요약강의 3급 대비)</li>
                    <li>전국모의고사 100% 할인쿠폰<br>
                    - 전국모의고사 할인쿠폰은 2022년 대비 전국모의고사에만 사용 가능합니다.<br>
                    - 무료 응시 쿠폰은 매 모의고사 전 일괄 발급되며, 접수기간에 맞추어 사용해주시기 바랍니다.</li>    
                    <li>배송비 무료쿠폰<br>
                    - 배송비 무료쿠폰은 총 2매 지급됩니다. (사용기간 : 30일)<br><br>
                    ※ 할인 쿠폰은 내 강의실 > 쿠폰함 확인 바랍니다.</li>    
				</ul>
                <div class="infoTit">교재</div>
				<ul>
					<li>신광은 경찰PASS 수강에 필요한 교재는 별도로 구매 하셔야하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>  
				</ul>
                <div class="infoTit">환불</div>
				<ul>
					<li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                    사용일수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                    <li>이벤트로 제공되는 수강기간은 정규 수강기간이 아니며, 정규 수강기간(12개월)이 지나면 환불이 불가합니다.</li>
                    <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>  
				</ul>
                <div class="infoTit">PASS 수강</div>
				<ul>
					<li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 
                        모바일 1대 또는 모바일 2대(신광은경찰PASS PMP강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.다만 추후 초기화가
                        필요할 시 내용 확인 후 가능 하오니 고객센터로 문의주시기 바랍니다. ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>  
				</ul>
                <div class="infoTit">유의사항</div>
				<ul>
					<li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공
                        예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 
                    이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                    <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                    <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 
                        제공 될 수 있습니다.</li>
                    <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>  
				</ul>
                <div class="infoTit">※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</div>
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
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

         /* 팝업창 */
         function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

    </script> 

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop