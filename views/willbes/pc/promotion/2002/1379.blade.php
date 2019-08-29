@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skybanner {
            position:fixed;
            top:280px;
            right:0;
            z-index:1;
        } 
        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:22px; color:#000;margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#000; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul:after {content:""; display:block; clear:both}
        
        .wb_00 {background:#404040}
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1379_top_bg.jpg) no-repeat center top;}       
        .wb_01 {background:#eee;}
        .wb_02 {background:#fff;}
        .wb_03 {background:#555;}  
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">        
        <div class="skybanner" >
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2019/08/1379_skybanner.png" alt="스카이배너" ></a>
        </div>            

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>접수 마감까지</span><br />
                        <span style="line-height:40px;font-size:22pt;color:#000">남은시간</span>
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        <a href="#apply" target="_self">신청하기 &gt;</a><br />
                        <span style="line-height:40px;">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1270_00.jpg" alt="문제풀이과정 커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1379_top.jpg" alt="해양경찰 합격 패키지"/>
        </div>
      
        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1379_01.jpg" alt="교수진과 함께" />          
        </div>

        <div class="evtCtnsBox wb_02" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1379_02.jpg" alt="패키지 구성" usemap="#Map1379z" border="0" />
            <map name="Map1379z" id="Map1379z">
                <area shape="rect" coords="368,1493,752,1614" href="javascript:alert('PACKAGE\n수강신청\nComing soon');" alt="지금 바로 신청하기" />
            </map>
        </div>
        
        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1379_03.jpg" alt="다운로드 및 바로가기" usemap="#Map1379b" border="0" />
            <map name="Map1379b" id="Map1379b">
                <area shape="rect" coords="179,226,541,293" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="공고문 다운로드" />
                <area shape="rect" coords="577,226,938,295" href="http://gosi.kcg.go.kr/" target="_blank" alt="원서접수 바로가기" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop