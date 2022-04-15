@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; width:200px; top:150px; right:10px; z-index:5;}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2022/04/2627_top_bg.jpg") no-repeat center top; height: 995px;}
        .evtTop span {position: absolute; left:50%; width:390px; margin-left:-420px; top:255px; z-index: 1;}

        .evt02 {background:#0cb28c}

        .evt03 iframe {width:897px; height:507px}

        .evtInfo {color:#fff; font-size:16px; background:#1f2630; padding:100px 0}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="https://www.youtube.com/channel/UCUbuqBgYMeqiVR4FuEIgkiw" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/04/2627_sky.png" title="채널구독"></a>
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <span data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/04/2627_top_img.png" alt="신태식 교육학논술 5~6월 기출분석 과정"/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2627_01.jpg" alt="커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2627_02.jpg" alt="학습에 도전"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2627_03_01.jpg"/>
            <iframe src="https://www.youtube.com/embed/V4B8cUDEXik?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>           
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2627_03_02.jpg"/>
                <a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/188987" target="_blank" title="인강 수강하기" style="position: absolute; left: 75.89%; top: 22.32%; width: 8.21%; height: 31.5%; z-index: 2;"></a>
                <a href="https://ssam.willbes.net/pass/offLecture/show/cate/3138/prod-code/188992" target="_blank" title="직강 수강하기" style="position: absolute; left: 84.38%; top: 22.32%; width: 8.21%; height: 31.5%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">

            <div class="evtInfoBox">
                <h4 class="NSK-Black">신태식 교육학 기출분석반 수강 시 유의 사항</h4>
                <ul>
                    <li>본 강의의 개강일은 [직강] 05월02일(월) 09:30~ / [인강] 05월03일 입니다.</li>
                    <li>직강 수강생의 경우, 교재를 지급하는 이벤트를 진행합니다. (교재증정은 개강일 강의실에서 배부)</li>
                    <li>직강 개강 강의실: 노량빌딩 3층 302호 강의실</li>
                    <li>부득이한 사유로 직강에 참여할 수 없게 된 경우, 홈페이지 내강의실에서 보강신청 가능</li>
                    <li>인강 정보<br>
                    - 일시정지: 수강기간(90일)동안, 30일 범위에서 최대 3회까지 가능<br>
                    - 강의연장: 최대 30일범위에서 3회까지 가능<br>
                    - 제공배수: 1.8배수</li>
                    <li>환불규정<br>
                    - 학원설립 운영에 관한 법률의 시행령 18조에 규정된 바에 따라 환불 처리됩니다.<br>
                    - 환불신청은 홈페이지 1:1게시판을 통해서 가능합니다.</li>
                    <li>기 타<br>
                    - 윌비스 임용의 강의는 양도 및 매매가 불가능하며, 위반시 관련 규정에 의하여 처벌 받을 수 있습니다.</li>
                </ul>
            </div>
        </div>  
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            AOS.init();
        });
    </script>
@stop