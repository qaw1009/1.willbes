@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}

        .evt01 .slide_con {}
        .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
        .slide_con .bx-wrapper .bx-pager {
            width: auto;
            bottom: 15px;
            left:0;
            right:0;
            text-align: center;
            z-index:90;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
            background: #ccc;
            width: 14px;
            height: 14px;
            margin: 0 4px;
            border-radius:10px;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #00ced1;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
            width: 30px;
        }

        .evt01 {padding-bottom:80px;}        

        .check { width:100%; padding:20px 0px 40px 10px; letter-spacing:0; color:#000; background:#01ced3; z-index:5}
        .check label {cursor:pointer; font-size:14px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check > a {display:block; width:80%; padding:10px 20px; background:#fff; margin:20px auto 0; border-radius:20px; font-size:14px;font-weight:bold;}

        .wrap {position:relative;}
        .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal;}

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

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_top.jpg" alt="한덕현 t-PASS" >
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01.jpg" alt="공무원 영어, 자신 있나요?" >
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_02.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_03.jpg" alt=""/></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_02.jpg" alt="영어 정복 노하우" >
        </div>

        <div class="evtCtnsBox evt03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_03.jpg" alt="수강신청" >
                <a href="javascript:go_PassLecture('173664');" title="수강신청" style="position: absolute; left: 74.72%; top: 84.58%; width: 16.94%; height: 7.49%; z-index: 2;"></a>
            </div>
            <div class="check">
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#infoText">이용안내 확인하기 ↓</a>
            </div>  
        </div>

        <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">이용안내 및 유의사항</h3>
        <p>● 상품구성 </p>
        <ul>
            <li>제공과정<br/>
            - 전 과정 T-PASS : 2021~2022 한덕현 영어 9급 지방직 대비 전 과정 (반반/똑똑영어 다시보기 + 새벽모의고사 포함)</li>
            <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
            <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
            <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>
        </ul>

        <p>● 기기제한</p>
        <ul>
            <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br/>
            - PC 2대 or 모바일 2대 of PC 1대 + 모바일 1대(총 2대)
            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최조 1회에 한해 [내강의실] > [등록기기정보]에서 직접 초기화 가능하며,
            그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006 or 1:1 상단게시판으로 문의바랍니다.</li>
        </ul>

        <p>● 수강안내</p>
        <ul>
            <li>먼저 [내강의실] 메뉴에 무한 PASS존으로 접속합니다.</li>
            <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
            <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li>
            <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li>
            <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>
        </ul>

        <p>● 결제/환불</p>
        <ul>
            <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
            <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
            <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br/>
            - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)</li>
            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
        </ul>

        <p>● 이용 문의 : 윌비스 고객만족센터 1544-5006</p>
    </div>  

    </div>

    <!-- End Container -->
    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                auto: true,
                speed: 500,
                pause: 4000,
                mode:'fade',
                autoControls: false,
                touchEnabled: true,
                controls:false,
                pager:true,
            });
        });

        {{-- 수강신청 동의 --}}
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ front_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>
@stop