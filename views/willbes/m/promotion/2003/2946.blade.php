@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

    .evt01 {line-height:1.4; margin:0 auto 40px;}
    .evt01 .title {font-size:3vh; text-align:left; margin-bottom:1vh}
    .evt01 .title span {font-size:2vh; color:#ad0e11; vertical-align: middle; }
    .evt01 table {font-size:1.6vh; border:1px solid #d8d4d1; border-top-color:#000}
    .evt01 tr {border-bottom:1px solid #d8d4d1;}
    .evt01 th,
    .evt01 td {padding:1vh 0.5vh; border-right:1px solid #d8d4d1;}
    .evt01 th {font-weight:bold;}
    .evt01 thead th {background:#f3e9e9}
    .evt01 tbody th {background:#f9f9f9}
    .evt01 td:nth-child(3) {text-align:center}
    .evt01 td p {font-size:1.6vh; font-weight:bold; color:#ad0e11}
    .evt01 .info {margin-top:2vh; color:#ad0e11; font-size:1.6vh; text-align:left}
    .evt01 .shinyBtn {width:90%; margin:5vh auto 0; position: relative; overflow: hidden;}
    .evt01 .shinyBtn a {font-size:2.4vh; }

    .evt02 {padding:10vh 0; margin-bottom:40px;}
    .evt02 .tab {display:flex; justify-content: space-between;}
    .evt02 .tab a {display:block; width:100%; text-align:center; font-size:2.2vh; font-weight:bold; background:#4b4747; color:#fff; padding:2vh; margin-right:2px}
    .evt02 .tab a:hover,
    .evt02 .tab a.active {background:#ad0e11; color:#fff;}
    .evt02 .shinyBtn a {position: absolute; left: 38.23%; top: 75.95%; width: 51.48%; z-index: 2;}

    .evt03 .wrap {font-size:3vh; line-height:1.4}
    .evt03 .wrap p {font-size:2vh; margin-bottom:5vh; color:#ad0e11}

    .shinyBtn {margin:0 5px;}
    .shinyBtn a {display:block; padding:1.8vh 0; font-size:2.6vh; color:#fff; background:#db4346;  border-radius:5px; overflow:hidden; position: relative; margin-bottom:1vh}
    .shinyBtn a:hover {color:#fd9d1e; background:#000; }
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
        0% { transform: scale(0) rotate(45deg); opacity: 0; }
        80% { transform: scale(0) rotate(45deg); opacity: 0.2; }
        81% { transform: scale(4) rotate(45deg); opacity: 0.5; }
        100% { transform: scale(60) rotate(45deg); opacity: 0; }
    } 
    .evt01 th .shinyBtn {margin:0 auto}
    .evt01 th .shinyBtn a {padding:0.5vh; font-size:1.4vh; font-weight:normal; margin:0 auto }

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
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2946m_top.jpg" alt="" />
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
    <img src="https://static.willbes.net/public/images/promotion/2023/04/2946m_01.jpg" alt=""/>
        <div class="wrap">
            <div class="title">
                GS3순환 <span>진도별 기출문제 풀이 + 빈출주제 및 핵심내용 정리 + 중범위 실전모의고사</span>
            </div>
            <table>
            <col />
                <col />
                <col />
                <thead>
                    <tr>
                        <th>과목/강사</th>
                        <th>일정</th>
                        <th>횟수</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>행정학 김철
                        <div class="shinyBtn">
                            <a href="https://pass.willbes.net/m/support/examNews/show/cate/3020?board_idx=456502" target="_blank">강의계획서 ></a>
                        </div>
                    </th>
                    <td><p>[실강] 4/17(월)~6/7(수)</p>
                        매주 월 오후 2:00~5:30 / 수 저녁    6:30~22:00<br />
                        [온라인] 4/18(화)부터 강의 업로드</td>
                        <td>16회<br />(총 48강)</td>
                    </tr>
                    <tr>
                        <th>경제학 박태천
                            <div class="shinyBtn">
                                <a href="https://pass.willbes.net/m/support/examNews/show/cate/3020?board_idx=456504" target="_blank">강의계획서 ></a>
                            </div>
                        </th>
                        <td><p>[실강] 4/18(화)~6/23(금)</p>
                        4/18(화)~5/9(화) 매주 화 오후 2:00~5:30<br />
                        5/16(화)~6/23(금) 매주 화/금 오후 2:00~5:30<br />
                        [온라인] 4/19(수)부터 강의 업로드</td>
                        <td>16회<br />(총 48강)</td>
                    </tr>
                    <tr>
                        <th>행정법 이승민
                            <div class="shinyBtn">
                                <a href="https://pass.willbes.net/m/support/examNews/show/cate/3020?board_idx=456503" target="_blank">강의계획서 ></a>
                            </div>
                        </th>
                        <td><p>[실강] 4/12(수)~6/28(수)</p>
                        4/12(수)~6/7(수) 매주 수요일 오후 2:00~5:30<br />
                        6/12(월)~6/21(수) 매주 월/수 오후 2:00~5:30<br />
                        6/26(월)~6/28(수) 월~수 오후 2:00~5:30<br />
                        [온라인] 4/13(목)부터 강의 업로드<br /></td>
                        <td>16회<br />(총 48강)</td>
                    </tr>
                    <tr>
                        <th>헌법 선동주
                            <div class="shinyBtn">
                                <a href="https://pass.willbes.net/m/support/examNews/show/cate/3020?board_idx=456500" target="_blank">강의계획서></a>
                            </div>
                        </th>
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
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3044&search_text=UHJvZE5hbWU6MjAyMyA36riJ" target="_blank">[실강] 7급 2차 GS3순환  수강신청 >                    
            </a>
        </div>
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <div class="wrap">
            <strong>동영상</strong> 7급 전문과목 GS3순환
            <p>진도별 기출문제 풀이 + 빈출주제 및 핵심내용 정리 + 중범위 실전모의고사</p>
        </div>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
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
    $(document).ready(function() {
        AOS.init();
    });
</script>

@stop