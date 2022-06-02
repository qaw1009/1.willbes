@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox span { vertical-align:top} 

    /************************************************************/

    .dday {font-size:24px !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:14px !important;}

    .evt_02 {padding:50px 0}
    .evt_02 h4 {font-family: 'Black Han Sans', sans-serif; font-size:30px}
    .evt_02 > a {display:block; margin-bottom:15px}

    .check {padding:20px 0 0;}
    .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:block; padding:10px 0; color:#fff; background:#393939; border-radius:20px; font-weight:bold; width:60%; margin:20px auto}

    .check p {}

    .evt_04 {padding-bottom:80px}
    .evt_04 .lecBtns {display:flex; padding:0 20px 50px}
    .evt_04 .lecBtns a {font-weight:bold; color:#000; border:1px solid #cbcbcb; border-radius:10px; padding:10px; margin:0 5px; width:calc(33.33333% - 10px); box-shadow: 0 8px 4px rgba(0,0,0,.1);
}
    .evt_04 .lecBtns a strong {color:red}
    .evt_04 > a {font-size:24px; display:block; padding:20px 0; color:#fff; background:#000; width:90%; margin:50px auto 0; border-radius:50px}


    .evtInfo {padding:50px 20px; background:#333; color:#fff;}
    .evtInfoBox {margin:0 auto; text-align:left; line-height:1.5;}
    .evtInfoBox h4 {font-size:24px; margin-bottom:40px;}
    .evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:6px 16px; background:#000; border-radius:20px; font-weight:normal !important}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style-type: decimal; margin-left:20px}
    .evtInfoBox a {color:#f1d188}

    
    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox dday NSK-Thin">
            <strong>마감까지 <span id="ddayCountText" class="NSK-Black"></span> </strong>
            <a href="#evt04">신청하기 ></a>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680m_top.jpg" alt="">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680m_01.jpg" alt="">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680m_02.jpg" alt="">
        </div>  
        
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680m_03.jpg" alt="">
        </div>
        
        <div class="evtCtnsBox evt_04" data-aos="fade-up" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2680m_04.jpg" alt="">
            <div class="lecBtns">
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2602" target="_blank"><strong>신규가입</strong>하고<br> 5만원 할인 받기 ></a>
                <a href="https://www.willbes.net/classroom/qna/index" target="_blank"><strong>재수강</strong>인증하고<br> 10만원 할인 받기 ></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank"><strong>타학원 수강이력</strong>인증하고<br> 10만원 할인 받기 ></a>
            </div>          
      
   
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#info">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                    ※ 본 상품은 신광은 경찰팀의 모든 강의를 3배수로 수강할 수 있는 상품입니다.
                </p>
            </div> 

            <a href="javascript:void(0);" data-url="https://police.willbes.net/m/periodPackage/show/cate/3001/pack/648001/prod-code/197572" onclick="go_PassLecture(this)" class="NSK-Black">FINAL PASS 수강신청하기 ></a>
        </div>

        <div class="evtCtnsBox evtInfo" id="info" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">신광은 경찰팀 FINAL PASS 이용안내</h4>
				<div class="infoTit NSK-Black">강좌 기본</div>
				<ul>               
                    <li>본 상품은 구매일로부터 22년 2차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                    <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                    - 2022년 대비 형사법, 경찰학, 헌법 전 강좌<br>
                    - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>
                    *형사소송법/형사법 : 신광은 교수님<br>
                    *경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                    *형법 : 신광은 교수님 / 김원욱 교수님<br>
                    *헌법 : 김원욱 교수님 / 이국령 교수님 / 문태환 교수님 / 신기훈 교수님<br>
                    *범죄학 : 박상민 교수님<br>
                    *G-TELP : 김준기 교수님<br>
                    *한능검 : 오태진 교수님</li>
                    <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 3배수로 수강할 수 있습니다.</li>
                    <li>각 강좌 별 3배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show?board_idx=250648&s_keyword=%EB%B0%B0%EC%88%98" target="_blank">배수 제한 공지 자세히 보기></a>)</li>
                    <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
				</ul>

                <div class="infoTit NSK-Black">교재</div>
                <ul>
                    <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>             

                <div class="infoTit NSK-Black">환불</div>
				<ul>
                    <li>결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일 수 만큼 차감 후
                    환불됩니다.</li>
				</ul>

                <div class="infoTit NSK-Black">PASS 수강</div>
				<ul>
                    <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                    총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시
                    내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
				</ul>

                <div class="infoTit NSK-Black">유의사항</div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                    (단,이벤트 시 쿠폰사용가능)</li>
                    <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.<br>
                    이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                    <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                    <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
				</ul>

                <div class="infoTit">※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</div>
			</div>
		</div> 
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });
        /*수강신청 동의*/ 
        function go_PassLecture(obj){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }else{
                var _url = $(obj).data('url');
                window.open(_url);
            }
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop