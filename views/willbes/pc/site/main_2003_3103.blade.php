@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .Container {
            width:100% !important;
            min-width:1210px !important;
            background:#fff;
            padding:0 !important;
            background:#fff;
            text-align:center;
        }

        .skyBanner {position:fixed; width:162px; top:200px; right:225px; z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/12/3103_top_bg.jpg) no-repeat center top; margin-top:20px}
        .evt01 {background:#1c3647;}
        .evt01 .tabBox {position:relative; width:1120px; margin:0 auto}
        .evt01 .tab li {display:inline; float:left; width:33.333333%}
        .evt01 .tab li a {display:block; text-align:center; font-size:22px; font-weight:600; background:#dfd6cb; color:#978169; height:60px; line-height:60px; margin-right:1px}
        .evt01 .tab li a:hover,
        .evt01 .tab li a.active {background:#ffb400; color:#313131;}
        .evt01 .tab li:last-child a {margin:0}
        .evt01 .tab:after {content:""; display:block; clear:both}
        .evt01s{background:#1f8f3f;}

        .evt02 {background:#313131;}
        .evt02 ul {width:1120px; margin:0 auto}
        .evt02 li {display:inline; float:left; width:33.333333%; text-align:center; margin-bottom:30px; font-size:14px;}
        .evt02 li .gif_area img{width:348px; height:220px; margin:0 auto}
        .evt02 li iframe {width:348px; height:220px; margin:0 auto}
        
        .evt02 li div {height:30px; line-height:30px;color:#d0d0d0;}
        .evt02 li div:first-child {font-size:16px; line-height:40px; height:40px;}
        .evt02 ul:after {content:""; display:block; clear:both}
        .btn_area {display:inline-block;margin:20px 0 80px 0;}
        .btn_area .btn{background:#ffb400;color:#313131;font-size:18px;font-weight:bold;width:170px;}
        .btn_area a{display:inline-block;height:38px;line-height:38px;border-radius:10px;letter-spacing:-0.5px;transition:all 0.5s linear;}

        .evt03 {background:#131313 url(https://static.willbes.net/public/images/promotion/2019/12/3102_03_bg.jpg) no-repeat center top; }

        /*********팝업***********/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: 774px;
            background: #fff;
            font-size:13px;
            line-height:1.5;
            box-shadow:0 10px 10px rgba(0,0,0,0.2);
        }
        .b-close {
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
            color:#fff;
            font-size:14px;
        }
    </style>


    <div id="Container" class="Container gosi NGR c_both">
        <div class="Menu widthAuto NGR c_both">
                @include('willbes.pc.layouts.partial.site_menu')
        </div>

        <div class="skyBanner">       
            <a href="https://pass.willbes.net/support/notice/show/cate/3103?board_idx=245818" target="_blank" alt="지금 바로 확인하기">           
                <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_sky.png" />   
            </a>        
        </div>

        <div class="evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_top.jpg" />
            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_top_btn.gif" usemap="#Map3103A" border="0" />
            <map name="Map3103A" id="Map3103A">
                <area shape="rect" coords="146,2,943,101" href="javascript:go_popup()" alt="자세히보기" />
            </map>          
        </div>

        {{--레이어팝업--}}
        <div id="popup" class="Pstyle NGR">
            <span class="b-close"><img src="{{ img_url('sub/close.png') }}"></span>
            <img src="https://static.willbes.net/public/images/promotion/2019/12/3102_popup.jpg" alt="">
        </div>

        <div class="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/3102_01.jpg" alt="">
            <div class="tabBox">
                <ul class="tab">
                    <li><a href="#tab01" class="active">자료해석</a></li>
                    <li><a href="#tab02">상황판단</a></li>
                    <li><a href="#tab03">언어논리</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2019/12/3102_01_01.jpg" alt="">
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2019/12/3102_01_02.jpg" alt="">
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2019/12/3102_01_03.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="evt01s">    
            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_01_bottom.jpg" alt="">
        </div>

        <div class="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/3102_02.jpg" alt="">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/3102_02s.jpg" alt="">
            <ul>
                <li>
                    <div>자료해석 <strong>석치수</strong></div>
                    <span class="gif_area">
                        <a href="https://www.youtube.com/watch?v=XYzLnKOQ1SY&feature=youtu.be" target="_blank" >
                            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_1.gif"> 
                        </a>
                    </span>
                    <div>최신 기출경향 분석을 통한 전략적인 공부방법론</div>
                    <span class="btn_area">
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/158460" target="_blank" class="btn">자세히보기</a>
                </span>
                </li>
                <li>
                    <div>자료해석 <strong>석치수</strong></div>
                    <span class="gif_area">
                        <a href="https://youtu.be/22RNa1MeyXs" target="_blank" >
                            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_2.gif"> 
                        </a>
                    </span>
                    <div>기출분석을 통한 합격전략 특강 1편</div>
                    <span class="btn_area">
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/158464" target="_blank" class="btn">자세히보기</a>
                </span>
                </li>
                <li>
                    <div>자료해석 <strong>석치수</strong></div>
                    <span class="gif_area">
                        <a href="https://youtu.be/r3SvikQP5xg" target="_blank" >
                            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_3.gif"> 
                        </a>
                    </span>
                    <div>기출분석을 통한 합격전략 특강 2편</div>
                    <span class="btn_area">
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/158465" target="_blank" class="btn">자세히보기</a>
                </span>
                </li>
                <li>
                    <div>상황판단 <strong>박준범</strong></div>
                    <span class="gif_area">
                        <a href="https://youtu.be/QzH3qWwc1rY" target="_blank" >
                            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_4.gif"> 
                        </a>
                    </span>
                    <div>기출분석을 통한 합격전략 특강</div>
                    <span class="btn_area">
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/158466" target="_blank" class="btn">자세히보기</a>
                </span>
                </li>
                <li>
                    <div>언어논리 <strong>이나우</strong></div>
                    <span class="gif_area">
                        <a href="https://youtu.be/h75cYnPppU0" target="_blank" >
                            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_5.gif"> 
                        </a>
                    </span>
                    <div>기출분석을 통한 합격전략특강</div>
                    <span class="btn_area">
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/158467" target="_blank" class="btn">자세히보기</a>
                </span>
                </li>
                <li>
                    <div>언어논리 <strong>한승아</strong></div>
                    <span class="gif_area">
                        <a href="https://youtu.be/z6aTOI2hCsc" target="_blank" >
                            <img src="https://static.willbes.net/public/images/promotion/2019/12/3103_6.gif"> 
                        </a>
                    </span>
                    <div>기출분석을 통한 합격전략특강</div>
                    <span class="btn_area">
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/158468" target="_blank" class="btn">자세히보기</a>
                </span>
                </li>
            </ul>
        </div>

        <div class="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/3102_03.jpg" alt="">
        </div>
    </div>

    <!-- End Container -->
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
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
        function go_popup() {
            $('#popup').bPopup();
        };
    </script>
@stop