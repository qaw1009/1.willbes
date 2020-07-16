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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_top_bg.jpg) no-repeat center top}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_01_bg.jpg) no-repeat center top}         

        .evt02 {background:#252525; padding-bottom:150px}
        .evt02 .youtube iframe {width:720px; height:405px; margin:0 auto}
        .evt02 .btn {width:590px; margin:50px auto 0}
        .evt02 .btn a {display:block; color:#282f4c; background:#fff; border-radius:30px; font-size:30px; padding:15px 0;
            box-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3)
        }
        .evt02 .btn a:hover {color:#fff; background:#282f4c;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_03_bg.jpg) no-repeat center top}
        .evt03 .slide_con {width:784px; margin:0 auto; position:relative;}
        .evt03 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evt03 .slide_con p.leftBtn {left:-22px}
        .evt03 .slide_con p.rightBtn {right:-22px}
        .evt03 .slide_con li {display:inline; float:left}
        .evt03 .slide_con li img {width:100%}
        .evt03 .slide_con ul:after {content::""; display:block; clear:both}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_04_bg.jpg) no-repeat center top}
        .evt05 {background:#484c57}       
        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_05_bg.jpg) repeat}
        .evt07 {background:#a1774f}
        .evt09 {background:#c2c2c2}


        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000; line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:5px; width:28%;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%;}
        .newTopDday ul:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_top.jpg" alt="양원근 대표 책쓰기 브랜딩" > 
        </div>  

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_01.jpg" alt="누적 1천명 돌파" >             
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        사전예약 마감일까지
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
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_02.jpg" alt="사전예약 특별혜택" >
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/CsqieWAVZi4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="btn NSK-Black">
                {{--  <a href="javascript:goLecture();">지금, 사전 예약하고 끝장 혜택받기 ></a> --}}
                <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">지금, 사전 예약하고 끝장 혜택받기 ></a>
                <div id="pass" class="infoCheck" style="display: none;">
                    <input type="checkbox" name="y_pkg" value="169144" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk" checked>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_03.jpg" alt="양원근 대료가 런칭한 베스트셀러" >
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_04.jpg" alt="양원근 대료가 런칭한 베스트셀러" >
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_05.jpg" alt="졸업생">
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_06.jpg" alt="방송에 소개된 책쓰기 브랜딩 스쿨 출연 영상">
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_07.jpg" alt="2년연속 조기마감">
        </div>

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_08.jpg" alt="소문내기 이벤트" usemap="#Map1722A" border="0">
            <map name="Map1722A">
                <area shape="rect" coords="52,768,134,852" href="https://section.blog.naver.com/BlogHome.nhn?directoryNo=0&currentPage=1&groupId=0" alt="블로그">
                <area shape="rect" coords="159,768,240,852" href="https://www.instagram.com" target="_blank" alt="인스타">
                <area shape="rect" coords="266,768,347,852" href="https://www.facebook.com" target="_blank" alt="페이스북">
                <area shape="rect" coords="373,768,453,852" href="https://story.kakao.com/ch/kakaostory" target="_blank" alt="카카오스토리">
                <area shape="rect" coords="480,768,563,852" href="https://band.us/ko" target="_blank" alt="밴드">
                <area shape="rect" coords="584,768,672,852" href="https://twitter.com" target="_blank" alt="트위터">
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evt09">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_09.jpg" alt="이용안내">
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });

        function goLecture() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            location.href = 'https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/169144';
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop