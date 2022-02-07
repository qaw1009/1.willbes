@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/

    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:center; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    .evtCtnsBox .check {font-size:16px; text-align:center; line-height:1.5;; margin:0 20px;font-weight:bold;}
    .evtCtnsBox .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
    .evtCtnsBox .check a {display:block; width:60%; padding:5px 20px; color:#fff; background:#000; margin:20px auto 0; border-radius:20px}
    .evtCtnsBox .info {margin:20px 20px 0; line-height:1.4; font-size:14px;}       

    .evt04 {background:#1459a4; padding-bottom:50px; color:#fff}

    .evtInfo {padding:50px 20px; font-size:14px; color:#101010}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:30px; margin-bottom:40px}
    .evtInfoBox .infoTit {font-size:18px;margin-bottom:15px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {list-style-type:decimal; margin-left:20px; margin-bottom:5px}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }
</style>


<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox dday NSK-Thin">
        <strong class="NSK-Black">판매종료까지 <span id="ddayCountText"></span> </strong>
    </div>

    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2521m_01.jpg" alt="파이널 패스"/>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2521m_02.jpg" alt="커리큘럼"/>
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/01/2521m_03.jpg" alt="단계별 포인트"/>
    </div>

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <div class="p_re">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2521m_04.jpg"  alt="문제풀이 풀패키지"/>
            <a href="javascript:go_PassLecture('190892');" title="파이널 패스" style="position: absolute; left: 16.25%; top: 80.7%; width: 66.81%; height: 15.49%; z-index: 2;"></a>
        </div>
        <div class="check">
            <label><input name="ischk" type="checkbox" value="Y" />신광은 경찰 FINAL PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
            <a href="#careful">이용안내 확인하기 ↓</a>               
        </div>
        <div class="info">
            ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.<br>
            ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
            ※ 쿠폰은 PASS 결제 후 [내 강의실>결제관리>쿠폰/수강권 관리] 에서 확인 가능합니다.<br>
            ※ 재수강&환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.
        </div>
    </div>


    <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">윌비스 신광은 경찰 FINAL PASS 이용안내</h4>
            <div class="infoTit"><strong>강좌 기본</strong></div>
            <ul>
                <li>본 상품은 구매일로부터 22년 1차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                - 2022년 대비 형사법, 경찰학, 헌법 전 강좌<br>
                *형사법 : 신광은 교수님<br>
                *경찰학 : 장정훈 교수님<br>
                *헌법 : 김원욱 교수님 / 이국령 교수님</li>
                <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수로 수강할 수 있습니다.</li>
                <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show?board_idx=250648" target="_blank" class="tx-sky-blue">배수 제한 공지 자세히 보기></a>)</li>
                <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>                
            </ul>
            <div class="infoTit"><strong>교재</strong></div>
            <ul>
                <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>  
            </ul>
            <div class="infoTit"><strong>환불</strong></div>
            <ul>
                <li>결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일 수 만큼 차감 후
                환불됩니다.</li>  
            </ul>
            <div class="infoTit"><strong>PASS 수강</strong></div>
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
            <div class="infoTit"><strong>유의사항</strong></div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.
                (단,이벤트 시 쿠폰사용가능)</li>
                <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며,
                이로 인한 환불은 불가합니다.</li>
                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.
                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>  
            </ul>              
            <div class="infoTit"><strong>※ 이용문의 : 고객만족센터 1544-5006</strong></div>			
        </div>
    </div> 
</div>		

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $(document).ready(function() {
        AOS.init();
    });
</script>

<!-- End Container -->
<script type="text/javascript">
    function go_PassLecture(code) {
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }
        var url = '{{ front_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
        location.href = url;
    }

    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
    });
</script> 

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop