@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    /************************************************************/

    .evtInfo {padding:3vh; background:#333; color:#fff; font-size:1.6vh; margin-top:8vh}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:3vh; margin-bottom:4vh}
    .evtInfoBox .infoTit {font-size:1.8vh; margin:2.5vh 0;}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
    .evtInfoBox ul {margin-bottom:3vh}
    .evtInfoBox li {margin-bottom:0.5vh; list-style:disc; margin-left:20px;}
    .evtInfoBox span {color:#FFFF00;vertical-align:top;font-weight:bold;}

    </style>

    <div id="Container" class="Container NSK c_both">
        
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2577m_top.jpg" alt="3순환 온라인 첨삭반">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2577m_01.jpg" alt="강의일정 안내">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2577m_02.jpg" alt="합격생 첨삭">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2577m_03.jpg" alt="수험생활 관리">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2577m_04.jpg" alt="수강안내">
                <a href="https://gosi.willbes.net/m/support/notice/show/cate/3094?board_idx=454893&s_cate_code=3094&s_cate_code_disabled=Y" title="원격채점 방법 안내 자세히 보러가기 ▶" target="_blank" style="position: absolute;left: 54.46%;top: 88.67%;width: 35.21%;height: 5.41%;z-index: 2;"></a>
            </div>   
        </div>

        <div class="evtCtnsBox evt_apply" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2577m_05.jpg" alt="신청하기">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">윌비스 한림법학원 5급행정대비 3순환 온라인 첨삭반 안내</h4>
                <div class="infoTit"><strong>수강료</strong></div>
                <ul>
                    <li>3과목 이상의 강의를 선택 결제시 자동 할인 적용됩니다.</li>
                    <li>4과목 신청시 : 25%할인</li>
                    <li>3과 목신청시 : 15%할인</li>
                </ul>
                <div class="infoTit"><strong>수강관련</strong></div>
                <ul>
                    <li>강의 일정에 따라 홈페이지 “내강의실”에서 강의 진행됩니다.</li>
                    <li>개강 전 원격 채점 진행방법에 관해 안내드립니다.</li>
                    <li>강의 일정은 실강 진행 상황에 따라 변경될 수 있습니다.</li>
                    <li>이용 중에는 휴강 기능을 이용할 수 없습니다.</li>
                    <li>복습동영상은 과목별 1회에 한해 30일간 제공되며, 2023년 6월 30일까지 신청 가능합니다.(동영상게시판에 신청글을 남기면 다음날 등록, 이후 신청 불가)</li>
                </ul>
                <div class="infoTit"><strong>강의업로드 및 답안 첨삭</strong></div>
                <ul>
                    <li>강의는 정해진 회차 해당일 <span>오전 10시전까지 업로드</span> 됩니다.</li>
                    <li><span>답안첨삭방법은 상세공지사항을 참고</span> 부탁드립니다.</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>무료제공되는 교재 외의 교재 및 자료는 별도로 구매하셔야 합니다.</li>
                </ul>
                <div class="infoTit"><strong>기기제한</strong></div>
                <ul>
                    <li><span>수강 기기는 2대</span>로 제한됩니다.(PC 1대, 핸드폰 1대 또는 각 기기별 2대)로 제한됩니다.</li>
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>아이디 공유 적발 시 회원 자격이 박탈되며 환불 불가함을 원칙으로 합니다.</li>
                    <li>추가적인 불법 공유 행위 적발 시 형사 고발 조치가 진행될 수 있는 점, 양지해주시기 바랍니다.</li>
                </ul>
                <div class="infoTit"><strong>환불정책</strong></div>
                <ul>
                    <li>환불시 할인율 적용이 해지되며, 신청일 기준 정가 정산됩니다.</li>
                    <li>환불시 무료제공된 교재 비용 차감됩니다.</li>
                    <li>기타 환불 정책은 결제시 공지된 [환불정책 안내]에 따라 진행됩니다.</li>
                </ul>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>
@stop