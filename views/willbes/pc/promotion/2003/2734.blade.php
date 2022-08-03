@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
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
        .evtCtnsBox .wrap a:hover {border:1px solid #000}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2734_top_bg.jpg) no-repeat center top; height: 1552px;}
        .wb_top span {position:absolute; left:50%}
        .wb_top .img01 {position:absolute; width:882px; top:110px; margin-left:-441px; z-index: 1;}
        .wb_top .img02 {position:absolute; width:1043px; top:588px; margin-left:-541px; z-index: 2;}
        .wb_02,
        .wb_04 {background:#6448e2}

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:16px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <span class="img01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/08/2734_top_img01.png" alt="SNS 팔로우 이벤트"/></span>
            <span class="img02" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/08/2734_top_img02.png" alt="SNS 팔로우 이벤트"/></span>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap"><img src="https://static.willbes.net/public/images/promotion/2022/08/2734_01.jpg" alt="중복 팔로우 당첨확률 up"/></div>
        </div>
        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2734_02.jpg" alt=""/>
                <a href="https://www.facebook.com/%EC%9C%8C%EB%B9%84%EC%8A%A4-%EA%B3%B5%EB%AC%B4%EC%9B%90-101447992673773" target="_blank" title="페이스북" style="position: absolute; left: 20.8%; top: 32.09%; width: 24.29%; height: 8.63%; z-index: 2;"></a>
                <a href="https://www.instagram.com/willbes_gong" target="_blank" title="인스타그램" style="position: absolute; left: 55%; top: 32.09%; width: 24.29%; height: 8.63%; z-index: 2;"></a>
                <a href="https://blog.naver.com/willbes_gong" target="_blank" title="블로그" style="position: absolute; left: 20.8%; top: 75.64%; width: 24.29%; height: 8.63%; z-index: 2;"></a>
                <a href="https://www.youtube.com/c/willbesgong" target="_blank" title="유튜브" style="position: absolute; left: 55%; top: 75.64%; width: 24.29%; height: 8.63%; z-index: 2;"></a>
            </div>
        </div>
        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2734_03.jpg" alt="참여방법"/>
                <a href="https://forms.gle/vfRLrBLFpxsfwaqd6" target="_blank" title="구글폼 제출" style="position: absolute; left: 28.3%; top: 78.36%; width: 43.48%; height: 10.76%; z-index: 2;"></a>
            </div>
        </div>
        <div class="evtCtnsBox wb_04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2734_04.jpg" alt="직렬별 패스"/>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2502" target="_blank" title="9급패스" style="position: absolute; left: 21.79%; top: 51.5%; width: 22.23%; height: 5.07%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2503" target="_blank" title="소방패스" style="position: absolute; left: 56.07%; top: 51.5%; width: 22.23%; height: 5.07%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3028" target="_blank" title="기술직패키지" style="position: absolute; left: 21.79%; top: 84.93%; width: 22.23%; height: 5.07%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3024/code/2721" target="_blank" title="군무원패스" style="position: absolute; left: 56.07%; top: 84.93%; width: 22.23%; height: 5.07%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트 유의사항</h2>
                <dl>
                    <dd>
                        <ol>
                            <li>이벤트 기간 : ~2022년 8월 31일 (수) 24:00<br>
                            당첨자 발표 : 2022년 9월 1일 (목) 윌비스 공무원 공지사항 참조</li>
                            <li>본 이벤트는 경품 협력사 사전에 따라 유사 가치의 경품으로 변경될 수 있습니다.</li>
                            <li>당첨자 발표 이후 팔로우 내역이 취소된 것을 확인하면 당첨이 취소될 수 있습니다.</li>
                            <li>구글폼으로 제출해주신 윌비스 계정ID로 쿠폰이 지급될 예정이오니, 정확하게 기재해주시기 바랍니다.</li>
                            <li>구글폼에 작성한 내용에 오기재된 부분이 있는 경우에 대해서는 당사가 책임지지 않습니다.</li>
                            <li>단 1개의 SNS만 팔로우 인증하더라도 전원 단과 20% 할인쿠폰이 증정되며, 쿠폰은 팔로우한 SNS 채널과 관계없이 계정당 1매만 지급됩니다.</li>
                            <li>1인당 수령할 수 있는 경품은 최대 2개입니다. (전원 지급 단과 20% 할인쿠폰 및 추첨을 통한 경품 1개)</li>
                        </ol>
                    </dd>            
                </dl> 
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop