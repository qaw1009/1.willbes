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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2056_top_bg.jpg) no-repeat center top}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2056_01_bg.jpg) no-repeat center top}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2056_02_bg.jpg) no-repeat center top}
   
        .evt03 {background:#fff;}  

        /*타이머*/
        .newTopDday {background:#f5f5f5; width:100%; padding:20px 0}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; line-height:60px;
            font-weight:600; color:#000; font-size:22px;}
        .newTopDday ul li img {width:40px; height:56px}
        .newTopDday ul li:first-child {padding-right:10px;}
        .newTopDday ul li:last-child {padding-left:25px; font-size:18px; }
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; margin-top:5px; padding:4px 20px; background:#effe01; border:1px solid #777e09; color:#000; 
            text-align:center; border-radius:20px; line-height:1}
        .newTopDday ul li:last-child a:hover {background:#333; color:#fff}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .evt04 {background:#c2c2c2;}
        .evt04 .evt04Box {width:900px; margin:0 auto; color:#3a3a3a; text-align:left; padding:50px 0; font-size:14px; line-height:1.5}
        .evt04 h3 {font-size:28px; margin-bottom:30px}
        .evt04 div {font-size:16px; margin-bottom:10px}
        .evt04 .evt04Box li {list-style: decimal; margin-left:15px}
        .evt04 .evt04Box ul {margin-bottom:30px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <!-- 타이머 -->
        <div class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>사전예약 혜택 마감까지</li>
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
                    <li>남았습니다.</li>
                    <li>
                        파격혜택, 지금 확인하세요!
                        <a href="#apply" target="_self">신청하기 &gt;</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056_top.jpg" alt="사전예약 스타트" >
        </div>

        <div class="evtCtnsBox evt01" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056_01.jpg" alt="스페셜 리스트4인" usemap="#Map2056_apply" border="0" >
            <map name="Map2056_apply" id="Map2056_apply">
                <area shape="rect" coords="189,704,343,740" href="https://njob.willbes.net/promotion/index/cate/3114/code/2035" target="_blank" />
                <area shape="rect" coords="385,703,537,740" href="https://njob.willbes.net/promotion/index/cate/3114/code/2024" target="_blank" />
                <area shape="rect" coords="599,704,748,740" href="https://njob.willbes.net/promotion/index/cate/3114/code/2006" target="_blank" />
                <area shape="rect" coords="778,703,929,740" href="javascript:alert('COMING SOON! 2월 3일 공개됩니다.')"  />
            </map>        
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056_02.jpg" alt="이키머스 핵심키워드" >               
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056_03.jpg" alt="소문내기 이벤트" usemap="#Map2056_sns" border="0" >
            <map name="Map2056_sns" id="Map2056_sns">
                <area shape="rect" coords="252,859,334,944" href="https://section.blog.naver.com" target="_blank">
                <area shape="rect" coords="356,859,443,944" href="https://www.instagram.com/" target="_blank">
                <area shape="rect" coords="463,859,551,945" href="https://www.facebook.com/" target="_blank">
                <area shape="rect" coords="572,858,657,945" href="https://story.kakao.com/" target="_blank">
                <area shape="rect" coords="679,858,766,946" href="https://band.us/" target="_blank">
                <area shape="rect" coords="784,858,874,949" href="https://twitter.com/" target="_blank">
            </map>
        </div>      

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evt04">
            <div class="evt04Box">
                <h3 class="NSK-Black">[이용안내]</h3>
                <div class="NSK-Black"># 사전예약 혜택</div>
                <ul>
                    <li>사전예약 혜택은 2021년 2월 15일까지 결제완료자에 한해서만 적용됩니다.</li>
                    <li>사전예약 혜택은 수강기간 1개월 및 수강권 40% 할인입니다.<br>
                        - 안은재 대표의 경우 40% 할인은 적용되지 않습니다.<br>
                        - 수강기간 추가 혜택은 사전예약자에 한해 2월 16일 일괄 적용 예정이니 참고 부탁 드립니다.
                    </li>
                    <li>강의시작일은 2월 15일 예정이오나, 일정에 따라 각 강의의 시작일은 변경 될 수 있으니 참고 부탁 드립니다. </li>
                </ul>

                <div class="NSK-Black"># 소문내기 이벤트</div>
                <ul>
                    <li>발표 시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
                    <li>당첨자 발표는 2021년 2월 18일 (수) 공지사항 참조 부탁 드립니다.</li>
                </ul>
                <div class="NSK-Black">※ 문의안내 : 1544-5006</div>
            </div>
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