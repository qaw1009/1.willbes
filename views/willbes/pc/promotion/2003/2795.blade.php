@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:top}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}        
    .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

    /*****************************************************************/

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/2795_top_bg.jpg) no-repeat center top; height: 1450px;}
    .evt_top .imgA {position: absolute; top:125px; left:50%; margin-left:-600px; z-index: 2;}
    .evt_top .imgB {position: absolute; top:125px; left:50%; margin-left:400px; z-index: 2;}

    .heart {            
        animation:upDown 1s infinite;
        -webkit-animation:upDown 1s infinite;
        z-index:10;
    }
    @@keyframes upDown{
        from{margin-top:0}
        60%{margin-top:-10px}
        to{margin-top:0}
    }
    @@-webkit-keyframes upDown{
        from{margin-top:0}
        60%{margin-top:-10px}
        to{margin-top:0}
    }

    .evt01,.evt02 {background:#555EDF}
    .evt04 {padding:150px 0}

    .evt04 .info {width:1050px; margin:0 auto; background:#555edf; font-size:16px; padding:50px; text-align:left; line-height:1.5}
    .evt04 .info h5 {color:#f2ed15; font-size:30px; font-weight:600; margin-bottom:30px}
    .evt04 .info li {list-style:demical; list-style-position:inside; margin-bottom:10px; background:#363fb4; padding:10px; color:#fff}
    .evt04 .info li span {color:#f2ed15;}

    .evt04 .buylec {width:1050px; margin:0 auto; text-align:left; font-size:16px; line-height:1.5; margin-top:50px}
    .evt04 .buylec div {margin-bottom:20px; background:#cdcdcd; padding:20px 50px; position: relative;}
    .evt04 .buylec div p {font-size:30px}
    .evt04 .buylec div a {position:absolute; right:0; top:0; height:100%; width:250px; text-align:center; display:flex; justify-content: center; align-items: center; font-size:26px; font-weight:bold; color:#fff; background:#555edf}
    .evt04 .buylec a:hover {background:#000}

    </style>

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">  
            <span class="imgA heart" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/10/2795_top01.png" alt=""/></span>
            <span class="imgB heart" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/10/2795_top02.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox evt01">
            <div data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2795_01.jpg" title="교수진 최강팀">
            </div>
        </div>

        <div class="evtCtnsBox evt02" >
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2795_02.jpg" title="참여방법">
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 이미지 다운" style="position:absolute;left: 2.56%;top: 11.15%;width: 31.01%;height: 29.82%; z-index:2;"></a>
                <a href="#sns" title="소문내기 및 인증하기" style="position:absolute;left: 34.56%;top: 11.15%;width: 31.01%;height: 29.82%; z-index:2;"></a>
                <a href="#comment" title="댓글로 링크 남기기" style="position:absolute;left: 66.76%;top: 11.15%;width: 31.01%;height: 29.82%; z-index:2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" id="sns">
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2795_03.jpg" title="소문내기">
                <a href="https://section.blog.naver.com/BlogHome.naver?directoryNo=0&currentPage=1&groupId=0" target="_blank" title="개인블로그" style="position:absolute;left: 13.36%;top: 62.45%;width: 15.46%;height: 22.32%; z-index:2;"></a>
                <a href="https://www.instagram.com/willbes_gong" target="_blank" title="인스타그램" style="position:absolute;left: 33.16%;top: 62.45%;width: 15.46%;height: 22.32%; z-index:2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position:absolute;left: 53.06%;top: 62.45%;width: 15.46%;height: 22.32%; z-index:2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03_comment" data-aos="fade-up" id="comment">
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="info">
                <h5>▶ Main PSAT Class (기본이론 강의)란?</h5>
                <ul>
                    <li>PSAT을 준비하는 수험생에게 가장 중요한 기본기 강화에 중점을 둔 강의로, <span>각 영역별 유형별로 세분화된 이론들의 定石(정석)을 학습하고, 관련문제 풀이를 통해 PSAT에서 요구하는 사고의 흐름을 정확히 체화</span>합니다. <span>이론의 습득은 물론 정확하고 빠른 문제풀이를 위한 스킬과 팁까지 점검</span>합니다.</li>
                    <li><span>2022~2021년 7급 PSAT 기출문제를 중심으로 7급 모의평가문제, 5급공채 및 7급 지역인재 기출문제, 민간경력자 기출문제 등에 대한 공통된 유형과 7급 PSAT 시험만의 차별화된 유형에 대한 철저한 분석을 토대로 출제경향을 정확하게 확인하고, 주요이론을 습득</span>할 수 있습니다. <span>기초부터 응용까지 치밀하게 학습하여 2023년 실전에서 나올만한 유형까지 적용하고 연습</span>하는 ‘완성된 이론 강의’입니다.</li>
                    <li><span>5급공채시험 최종합격자가 직접 강의를 수강하고 작성한 필기노트를 제공합니다. 강의내용을 정확하고 충실하게 작성한 합격자 필기노트를 활용하여 필기의 부담은 줄이고 오직 강의에만 집중할 수 있습니다. 또한 필기노트에는 각 파트별 공부방법에 대한 합격자의 생생한 Tip도 수록</span>됩니다.</li>
                    <li>주교재와 부교재, 다양한 연습용 보조교재를 활용하여 <span>강의 종료 후에도 올바른 방향으로 PSAT을 공부</span>할 수 있습니다. 또한 수업과 별도로 진행되는 <span>강사 직접 진행의 스터디를 통해 배운 내용을 효과적으로 복습</span>합니다. (실강 수강자에 한함, 구체적인 일정은 추후 공지)</li>
                </ul>
            </div>
            <div class="buylec">
                <div>
                    [학원실강]
                    <p class="NSK-Black">7급 Perfect PSAT program 종합반</p>
                    <a href="https://pass.willbes.net/pass/offPackage/show/prod-code/201485" target="_blank">수강신청 ></a>
                </div>
                <div>
                    [학원실강]
                    <p class="NSK-Black">7급 Main PSAT Class(기본이론강의)</p>
                    <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3143&course_idx=1427" target="_blank">수강신청 ></a>
                </div>
                <div>
                    [동영상]
                    <p class="NSK-Black">7급 Perfect PSAT program 종합반</p>
                    <a href="https://pass.willbes.net/Package/index/cate/3103/pack/648001" target="_blank">수강신청 ></a>
                </div>
                <div>
                    [동영상]
                    <p class="NSK-Black">7급 Main PSAT Class(기본이론강의)</p>
                    <a href="https://pass.willbes.net/lecture/index/cate/3103/pattern/only?search_order=regist&subject_idx=&course_idx=1364&school_year=2022" target="_blank">수강신청 ></a>
                </div>
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

@stop