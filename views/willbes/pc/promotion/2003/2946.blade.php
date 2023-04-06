@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/04/2946_top_bg.jpg) no-repeat center top;} 
        .evtTop span {position:absolute; left:50%; top: 380px; width:653px; margin-left:-326px; -webkit-animation:upDown 1.5s infinite; letter-spacing:-1px; text-align:center; z-index: 2;}
        @@keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        @@-webkit-keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }

        .evt01 {line-height:1.4; width:1120px; margin:0 auto 40px;}
        .evt01 .title {font-size:40px; text-align:left; margin-bottom:10px}
        .evt01 .title span {font-size:22px; color:#ad0e11; vertical-align: middle; }
        .evt01 table {font-size:16px; border:1px solid #d8d4d1; border-top-color:#000}
        .evt01 tr {border-bottom:1px solid #d8d4d1;}
        .evt01 th,
        .evt01 td {padding:15px; border-right:1px solid #d8d4d1;}
        .evt01 th {font-weight:bold;}
        .evt01 thead th {background:#f3e9e9}
        .evt01 tbody th {background:#f9f9f9}
        .evt01 td:nth-child(3) {text-align:left}
        .evt01 td p {font-size:18px; font-weight:bold; color:#ad0e11}
        .evt01 .info {margin-top:20px; color:#ad0e11; font-size:16px; text-align:left}
        .evt01 .shinyBtn {width:700px; margin:50px auto 0; position: relative; overflow: hidden;}
        .evt01 .shinyBtn a {font-size:30px; border-radius:50px; }

        .evt02 {padding:150px 0 100px; width:1120px; margin:0 auto 40px;}
        .evt02 .tab {display:flex; justify-content: space-between;}
        .evt02 .tab a {display:block; width:100%; text-align:center; font-size:22px; font-weight:bold; background:#4b4747; color:#fff; padding:20px; margin-right:2px}
        .evt02 .tab a:hover,
        .evt02 .tab a.active {background:#ad0e11; color:#fff;}
        .evt02 .shinyBtn a {position: absolute; left: 38.23%; top: 75.95%; width: 51.48%; z-index: 2;}

        .evt03 .wrap { font-size:40px; line-height:1.4}
        .evt03 .wrap p {font-size:22px; margin-bottom:50px; color:#ad0e11}

        .shinyBtn a {display:block; padding:20px; background:#ad0e11; color:#fff; font-size:20px; border-radius:30px; overflow: hidden;}
        .shinyBtn a:hover {background:#000;}
        .shinyBtn a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 30px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }
        .shinyBtn a:after{animation:shinyBtn 2s ease-in-out infinite;}
        @@keyframes shinyBtn {
            0% {transform: scale(0) rotate(45deg); opacity: 0;}
            80% {transform: scale(0) rotate(45deg); opacity: 0.2;}
            81% {transform: scale(4) rotate(45deg); opacity: 0.5;}
            100% {transform: scale(60) rotate(45deg); opacity: 0;}
        }
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2946_top.jpg" alt=""/>
            <span><img src="https://static.willbes.net/public/images/promotion/2023/04/2946_top_title.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2946_01.jpg" alt=""/>
            <div class="wrap">
                <div class="title">
                    GS3순환 <span>진도별 기출문제 풀이 + 빈출주제 및 핵심내용 정리 + 중범위 실전모의고사</span>
                </div>
                <table>
                    <col span="2" />
                    <col />
                    <col />
                    <thead>
                        <tr>
                            <th>과목</th>
                            <th>강사</th>
                            <th>일정</th>
                            <th>횟수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>행정학</th>
                            <th>김철</th>
                            <td><p>[실강] 4/17(월)~6/7(수)</p>
                            매주 월 오후 2:00~5:30 / 수 저녁    6:30~22:00<br />
                            [온라인] 4/18(화)부터 강의 업로드</td>
                            <td>16회<br />(총 48강)</td>
                        </tr>
                        <tr>
                            <th>경제학</th>
                            <th>박태천</th>
                            <td><p>[실강] 4/18(화)~6/23(금)</p>
                            4/18(화)~5/9(화) 매주 화 오후 2:00~5:30<br />
                            5/16(화)~6/23(금) 매주 화/금 오후 2:00~5:30<br />
                            [온라인] 4/19(수)부터 강의 업로드</td>
                            <td>16회<br />(총 48강)</td>
                        </tr>
                        <tr>
                            <th>행정법</th>
                            <th>이승민</th>
                            <td><p>[실강] 4/12(수)~6/28(수)</p>
                            4/12(수)~6/7(수) 매주 수요일 오후 2:00~5:30<br />
                            6/12(월)~6/21(수) 매주 월/수 오후 2:00~5:30<br />
                            6/26(월)~6/28(수) 월~수 오후 2:00~5:30<br />
                            [온라인] 4/13(목)부터 강의 업로드<br /></td>
                            <td>16회<br />(총 48강)</td>
                        </tr>
                        <tr>
                            <th>헌법</th>
                            <th>선동주</th>
                            <td><p>[실강] 4/14(금)~6/24(토)</p>
                            4/14(금)~5/13(토) 매주 금~토 오후 2:00~5:30<br />
                            5/20(토)~6/24(토) 매주 토 오후 2:00~5:30<br />
                            [온라인] 4/15(토)부터 강의 업로드<br /></td>
                            <td>16회<br />(총 48강)</td>
                        </tr>
                    </tbody>
                </table>                
            </div>
            <div class="info">※ 전체 진도를 5~6갱의 중범위로 나누어 해당 범위의 강의가 종료되면 진도별 신작 실전모의고사를 진행합니다.</div>
            <div class="shinyBtn NSK-Black">
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&search_text=UHJvZE5hbWU6MjAyMyA36riJ" target="_blank">[실강] 7급 2차 GS3순환  수강신청 >                    
                </a>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="tab">
                <a href="#tab01" class="active">헌법 선동주</a>
                <a href="#tab02">행정법 이승민</a>
                <a href="#tab03">행정학 김철</a>
                <a href="#tab04">경제학 박태천</a>
            </div>
            <div id="tab01">
                <div class="shinyBtn">
                    <img src="https://static.willbes.net/public/images/promotion/2023/04/2946_02_01.jpg" alt="헌법 선동주">
                    <a href="https://pass.willbes.net/support/examNews/show/cate/3020?board_idx=456500" target="_blank">GS-3순환 강의계획서  ></a>
                </div>
            </div>
            <div id="tab02">
                <div class="shinyBtn">
                    <img src="https://static.willbes.net/public/images/promotion/2023/04/2946_02_02.jpg" alt="행정법 이승민">
                    <a href="https://pass.willbes.net/support/examNews/show/cate/3020?board_idx=456503" target="_blank">GS-3순환 강의계획서  ></a>
                </div>    
            </div>
            <div id="tab03">
                <div class="shinyBtn">
                    <img src="https://static.willbes.net/public/images/promotion/2023/04/2946_02_03.jpg" alt="행정학 김철">
                    <a href="https://pass.willbes.net/support/examNews/show/cate/3020?board_idx=456502" target="_blank">GS-3순환 강의계획서  ></a>
                </div>     
            </div>
            <div id="tab04">
                <div class="shinyBtn">
                    <img src="https://static.willbes.net/public/images/promotion/2023/04/2946_02_04.jpg" alt="경제학 박태천">
                    <a href="https://pass.willbes.net/support/examNews/show/cate/3020?board_idx=456504" target="_blank">GS-3순환 강의계획서  ></a>
                </div>    
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <strong>동영상</strong> 7급 전문과목 GS3순환
                <p>진도별 기출문제 풀이 + 빈출주제 및 핵심내용 정리 + 중범위 실전모의고사</p>
            </div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>
    </div>

   <!-- End Container -->


    <script>
        /*탭*/
        $(document).ready(function(){
            $('.tab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );   
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>
    
@stop