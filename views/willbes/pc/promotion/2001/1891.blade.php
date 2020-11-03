@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .wb_top {background:#AEAAAD url(https://static.willbes.net/public/images/promotion/2020/10/1891_top_bg.jpg) no-repeat center top;}
        .wb_01 {background:#fff;}
        .wb_02 {background:#E6E6E6;}
        .wb_03 {background:#A60D08;}
        .wb_04 {background:#E1F1FE url(https://static.willbes.net/public/images/promotion/2020/10/1891_04_bg.jpg) no-repeat center top;}
        .wb_05 {background:#016FCE;}
        .wb_05a,.wb_05b,.wb_05c,.wb_05d,.wb_05e,.wb_05f,.wb_05g,.wb_05h {background:#016FCE;}
        .wb_06a,.wb_06b,.wb_06c,.wb_06d,.wb_06e,.wb_06f {background:#016FCE;}

    </style>

    {{--
            $arr_self_quality_test 문항 대체키
            's' => '기본기가 부족하다',
            'a' => '초시생이다',
            'b' => '기출문제집 1회독 미만이다',
            'c' => '스스로 기출문제 풀기가 벅차다',
            'd' => '일정 점수 유지가 어렵다',
            'e' => '기초는 있지만 단권화 정리가 안된다',
            'f' => '실전감각이 부족하다',
            'g' => '문제 푸는 스킬이 부족하다',
            'h' => '평균 80점이 안정적으로 나온다',

            맞춤 커리큘럼 대체키
            'a' => '기본이론',
            'b' => '심화이론',
            'c' => '심화기출',
            'd' => '문풀1단계',
            'e' => '문풀2단계',
            'f' => '문풀3단계',
        --}}
    @php
        $arr_self_quality_test = [
            's' => [
                'Y' => ['a' => ['Y' => 'a', 'N' => 'b']],
                'N' => ['b' => [
                            'Y' => ['c' => ['Y' => 'c', 'N' => ['e' => ['Y' => 'd', 'N' => ['g' => ['Y' => 'e', 'N' => 'e']]]]]],
                            'N' => [
                                'd' => [
                                    'Y' => ['e' => ['Y' => 'd', 'N' => ['g' => ['Y' => 'e', 'N' => 'e']]]],
                                    'N' => [
                                        'f' => [
                                            'Y' => ['g' => ['Y' => 'e', 'N' => 'e']],
                                            'N' => ['h' => ['Y' => 'f', 'N' => 'e']],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ];
    @endphp

    <div class="evtContent NGR" id="evtContainer">
     
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_top.jpg" alt="맞춤형 커리큘럼 가이드"/>            
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_01.gif" alt="수험기간 단축, 비용 절약"/>          
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_02.jpg" alt="정규 커리큘럼"/>            
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_03.jpg" alt="윌비스 베스트 강좌"/>            
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_04.jpg" alt="셀프 진단하기" usemap="#Map1891_start" border="0"/>
            <map name="Map1891_start" id="Map1891_start">
                <area shape="rect" coords="446,420,676,486" href="#start" />
            </map>            
        </div>

        <div class="evtCtnsBox wb_05" id=start>
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_05.jpg" alt="테스트 yes or no" usemap="#Map1891_test" border="0" id="test_img"/>
            <map name="Map1891_test" id="Map1891_test" data-temp-key="s">
                <area shape="rect" coords="257,546,551,625" href="javascript:void(0);" onclick="self_quality_test('Y');"/>
                <area shape="rect" coords="563,546,863,626" href="javascript:void(0);" onclick="self_quality_test('N');"/>
            </map>            
        </div>

        <div class="evtCtnsBox wb_06a d_none">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06a.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891a" border="0"/>
            <map name="Map1891a" id="Map1891a">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1004" target="_blank" />
            </map>  
        </div>    
        <div class="evtCtnsBox wb_06b d_none">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06b.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891b" border="0"/>
            <map name="Map1891b" id="Map1891b">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1005" target="_blank" />
            </map> 
        </div>
        <div class="evtCtnsBox wb_06c d_none">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06c.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891c" border="0"/>
            <map name="Map1891c" id="Map1891c">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1006" target="_blank" />
            </map> 
        </div> 
        <div class="evtCtnsBox wb_06d d_none">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06d.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891d" border="0"/>
            <map name="Map1891d" id="Map1891d">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1007" target="_blank" />
            </map> 
        </div>
        <div class="evtCtnsBox wb_06e d_none">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06e.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891e" border="0"/>
            <map name="Map1891e" id="Map1891e">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1008" target="_blank" />
            </map> 
        </div>
        <div class="evtCtnsBox wb_06f d_none">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1891_06f.jpg" alt="나에게 맞는 커리큘럼은?" usemap="#Map1891f" border="0"/>
            <map name="Map1891f" id="Map1891f">
                <area shape="rect" coords="393,717,728,807" href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&course_idx=1009" target="_blank" />
            </map>           
        </div>        
    </div>
    <!-- End Container -->

    <script>
        var $json_data = {!! json_encode($arr_self_quality_test) !!};

        // self 진단
        function self_quality_test(sel_type){
            var test_key = $("#Map1891_test").data("temp-key");
            var next_test_key = '';

            $json_data = $json_data[test_key][sel_type];
            if(typeof $json_data === "object"){
                $.each($json_data, function (key, value) {
                    next_test_key = key;
                    return false;
                });
                $("#Map1891_test").data("temp-key",next_test_key);
                $("#test_img").attr("src","https://static.willbes.net/public/images/promotion/2020/10/1891_05" + next_test_key + ".jpg");
            }else{
                $("#start").addClass("d_none");
                $(".wb_06" + $json_data).removeClass("d_none");
            }
        }
    </script>
@stop