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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2023/02/2904_top_bg.jpg) no-repeat center top;}

        .wb_cts01 table {width:1000px; margin:0 auto 150px; line-height:1.5; border:1px solid #e4e4e4}
        .wb_cts01 tr {border-bottom:1px solid #e4e4e4}
        .wb_cts01 th,
        .wb_cts01 td {padding:20px; border-right:1px solid #e4e4e4}
        .wb_cts01 td:last-child {text-align:left}
        .wb_cts01 th {font-size:16px; font-weight:bold; background:#e6efff}
        .wb_cts01 td div {font-size:18px; font-weight:bold; color:#315eb3; margin-bottom:10px;}
        .wb_cts01 td p {font-size:16px; font-weight:bold; margin-bottom:10px; color:#156680}
        .wb_cts01 td li {margin-left:20px; margin-bottom:5px; list-style:disc}

        .wb_cts02 {background:#F1F1F1;padding:150px 0 100px;}
        .wb_cts02 .tabBox {position:relative; width:1120px; margin:0 auto 40px;}
        .wb_cts02 .tab { display:flex;}
        .wb_cts02 .tab li {width:25%}
        .wb_cts02 .tab li a {display:block; text-align:center; font-size:22px; font-weight:600; background:#222; color:#fff; height:60px; line-height:60px;margin-right:1px}
        .wb_cts02 .tab li a:hover,
        .wb_cts02 .tab li a.active {background:#2A5DFF; color:#fff;}
        .wb_cts02 .tab li:last-child a {margin:0}

     
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2904_top.jpg" alt="7급 2차 합격실현 T-PASS"/>
        </div>

        <div class="evtCtnsBox wb_cts01"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2904_01.jpg" alt=""/>
            <table cellspacing="0" cellpadding="0">
                <col />
                <col />
                <col width="65%"/>
                <tr>
                    <th>GS-1순환<br />
                    기본    강의</th>
                    <td>11월~1월<br />
                    각 16회<br />
                    (48강)</td>
                    <td>
                        <div>[기본이론 강의 + 복습범위 하프 모의고사]</div>
                        <p>"기본서를 중심으로 진행되는 주요이론 습득을 위한 강의"</p>
                        <ul>
                            <li>합격자들이    강조하는 공부방법 중 하나가 탄탄한 기본기 확립입니다. 이는 기본서를 활용하여 주요내용을 정확히    이해하는 것을 의미합니다. 객관식 시험에서의 핵심은 출제자의 의도 파악입니다. 따라서 막연한    암기로만은 한계가 있습니다. 정확한 이론에 대한 습득으로 다져진 기본기에 암기가 더해져야 합격점에 도달할 수 있습니다.</li>
                            <li>GS-1순환은    기본서를 중심으로 주요내용 전반을 이해 위주로 학습하는 과정으로 입문자에게 가장 중요한 순환입니다. 앞으로    진행되는 모든 순환 학습의 기본이 될 이론 체계를 확립합니다.</li>
                            <li>학습한 내용에    대한 밀도 높은 숙지를 위해 일정 범위 진행 후 복습범위 하프 모의고사가 진행됩니다.</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>GS-2순환<br />
                    심화이론강의<br />
                    +<br />
                    중범위    기출 선별 모의고사</th>
                    <td>2월~4월<br />
                    각 12회<br />
                    (36강)</td>
                    <td>
                        <div>[핵심내용 강의 + 중범위 기출문제 선별 모의고사]</div>
                        <p>"이론의 내용정리    완성과 기출문제를 통해 문제풀이 감각을 높일 수 있는 강의"</p>
                        <ul>
                            <li>GS-1순환에서 학습하였던 기본이론의 확인과 문제풀이에 필요한 핵심이론의 체계적인 심화학습을 통해 수험이론의 전반을 완성하는 과정입니다. 이를 통해 이해할 부분과 암기할 부분을 구분할 수 있어서 공부에 대한 밀도를 높일 수 있습니다.</li>
                            <li>전체 진도를    3~4개의 중범위로 나누어 해당 범위의 강의가 종료되면 진도별 기출문제 선별 모의고사를 진행합니다.    이를 통해 학습한 수험이론들이 어떻게 문제에 적용되는지 확인합니다. 문제풀이 감각을    높이고, 약점부분을 파악하여 보완하는 순환입니다.</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>GS-3순환<br />
                    진도별    기출 문제를 통한<br />
                    핵심내용정리<br />
                    +<br />
                    신작문제    중범위 모의고사</th>
                    <td>4월~6월<br />
                    각 16회<br />
                    (48강)</td>
                    <td>
                        <div>[진도별 기출문제 풀이 + 핵심내용 정리 + 중범위 신작 모의고사]</div>
                        <p>"기출문제로    빈출주제를 정리하고 신작 모의고사를 통해 문제해결능력을 향상할 수 있는 강의"</p>
                        <ul>
                            <li>기출문제는    이미 출제된 문제가 아니라 앞으로 출제될 문제를 보여주는 가장 좋은 거울입니다. 따라서 GS-3순환에서는    진도별로 구분한 7~10개년 주요 기출문제를 활용하여 빈출되는 주제와 출제 가능성이 높은 주제들을 정리합니다. 즉 중요문제들을 통해 핵심이론들을 정리하는 순환으로써 각 과목의    단권화가 이루어지는 과정입니다.</li>
                            <li>전체 진도를    5~6개의 중범위로 나누어 해당 범위의 강의가 종료되면 진도별 신작 모의고사를 진행합니다. 진도별 신작    모의고사를 통해 실전감각을 높이고, 모의고사에 대한 자세한 풀이로 수험내용의 암기와 이론의 적용을 완성할 수 있습니다. 각 과목의 공부량을    효과적으로 줄일 수 있습니다.</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>GS-4순환<br />
                    전범위    실전 모의고사<br />
                    +<br />
                    최종정리</th>
                    <td>8월~9월<br />
                    각 8회<br />
                    (24강)</td>
                    <td>
                        <p>"매회 출제예상 모의고사(전범위)와 자세한 해설이 진행되는 실전감각 극대화를 위한 강의"</p>
                        <ul>
                            <li>출제가    예상되는 문제들로 구성된 전범위 신작 모의고사 과정인 GS-4순환은 2차 전문과목 시험에 대한 실전감각과 자신감을 배가시킬 수 있는    강의입니다. 최근 출제경향을 적극 반영한 신작 모의고사를 통해 최종정리는 물론 시험운영 능력까지 점검해    볼 수 있는 실전을 위한 마지막 과정입니다.</li>
                            <li>꼼꼼한    모의고사 해설을 통해 출제예상문제와 핵심이론을 확실하게 정리할 수 있는 순환입니다.</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">        
            <div class="tabBox">
                <ul class="tab">
                    <li><a href="#tab01" class="active">헌법 선동주</a></li>
                    <li><a href="#tab02">행정법 이승민</a></li>
                    <li><a href="#tab03">행정학 김철</a></li>
                    <li><a href="#tab04">경제학 박태천</a></li>
                </ul>
                <div id="tab01">
                    <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/free/prod-code/204778" target="_blank" title="헌법 선동주">
                        <img src="https://static.willbes.net/public/images/promotion/2023/02/2904_02_01.jpg" alt="헌법 선동주">
                    </a>                    
                </div>
                <div id="tab02">
                    <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/free/prod-code/204695" target="_blank" title="행정법 이승민">
                        <img src="https://static.willbes.net/public/images/promotion/2023/02/2904_02_02.jpg" alt="행정법 이승민">
                    </a>    
                </div>
                <div id="tab03">
                    <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/free/prod-code/204698" target="_blank" title="행정학 김철">
                        <img src="https://static.willbes.net/public/images/promotion/2023/02/2904_02_03.jpg" alt="행정학 김철">
                    </a>     
                </div>
                <div id="tab04">
                    <a href="https://pass.willbes.net/lecture/show/cate/3020/pattern/free/prod-code/204762" target="_blank" title="경제학 박태천">
                        <img src="https://static.willbes.net/public/images/promotion/2023/02/2904_02_04.jpg" alt="경제학 박태천">
                    </a>
                    </div>    
                </div>
            </div> 
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2904_03.jpg" alt="과목별 티패스"/>
                <a href="https://pass.willbes.net/package/show/cate/3020/pack/648002/prod-code/205440" target="_blank" title="선동주 헌법" style="position: absolute; left: 2.5%; top: 43.97%; width: 20%; height: 35.47%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3020/pack/648002/prod-code/205441" target="_blank" title="이승민 행정법" style="position: absolute; left: 27.59%; top: 43.97%; width: 20%; height: 35.47%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3020/pack/648002/prod-code/205442" target="_blank" title="김철 행정학" style="position: absolute; left: 52.68%; top: 43.97%; width: 20%; height: 35.47%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3020/pack/648002/prod-code/205443" target="_blank" title="박태천 경제학" style="position: absolute; left: 77.59%; top: 43.97%; width: 20%; height: 35.47%; z-index: 2;"></a>
            </div>
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