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
            position:relative;        
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skyBanner {position:fixed; width:150px; top:200px; right:10px; z-index:10;}
       
        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2192_top_bg.jpg) no-repeat center top;} 
      
        .evt01 {background:#eee; padding-bottom:150px}    
        .evt01 .tabs {width:1120px; margin:0 auto;}		
        .evt01 .tabs li {display:inline; float:left; width:50%; text-align:center}	
        .evt01 .tabs a img {margin:0 auto}
        .evt01 .tabs a img.off {display:block}
        .evt01 .tabs a img.on {display:none}
        .evt01 .tabs a.active img.off {display:none}
        .evt01 .tabs a.active img.on {display:block}
        .evt01 .tabs:after {content:""; display:block; clear:both}
        .evt01 .youtubeBox {width:1100px; margin:50px auto;}
        .evt01 .youtubeBox div {display:inline-block; float:left}
        .evt01 .youtubeBox:after {content:''; display:block; clear:both}
        .evt01 .youtube {width:510px;} 
        .evt01 .youtube iframe {width:510px; height:295px;}
        .evt01 .youtubeTxt {width:510px; font-size:24px; line-height:1.4; text-align:left; margin-left:40px; color:#202020; padding-top:180px; font-weight:bold} 

        .btnLink {width:600px; margin:0 auto}
        .btnLink a {display:block; border:3px solid #000; background:#fff; font-size:24px; padding:25px 0; border-radius:10px}
        .btnLink a strong {color:#d40000}
        .btnLink a:hover {background:#000; color:#fff}

        .evt02 {width:1120px; margin:0 auto 150px;}
        .evt02 .tabBig li {display:inline; float:left; width:calc(20% - 10px); margin-right:10px}
        .evt02 .tabBig li:last-child {width:20%; margin-right:0}
        .evt02 .tabBig a {display:block; font-size:18px; border:5px solid #bcbcbc; color:#bcbcbc; padding:15px 0; text-align:center; line-height:1.4}
        .evt02 .tabBig a.active,
        .evt02 .tabBig a:hover {border-color:#4b67d7; color:#fff; background:#4b67d7}
        .evt02 .tabBig:after {content:""; display:block; clear:both}

        .evt02 .tabSm {margin-top:20px}
        .evt02 .tabSm li {display:inline; float:left; width:calc(33.33333% - 10px); margin-right:10px}        
        .evt02 .tabSm li.w100 {display:block; width:100%; margin-right:0}
        .evt02 .tabSm li:last-child {width:33.33333%; margin-right:0}        
        .evt02 .tabSm a {display:block; font-size:16px; border:3px solid #bcbcbc; color:#bcbcbc; padding:15px 0; text-align:center; line-height:1.4}
        .evt02 .tabSm a.active,
        .evt02 .tabSm a:hover {border-color:#4b67d7; color:#4b67d7;}
        .evt02 .tabSm:after {content:""; display:block; clear:both}
        .evt02 p {margin-top:20px; display:block; font-size:16px; border:3px solid #4b67d7; color:#4b67d7; padding:15px 0; text-align:center; line-height:1.4}

        .evt02 .slide_con {width:1081px; margin:30px auto 0;}
        .evt02 .slide_con li {margin-bottom:20px}
    
    </style>

    <div class="evtContent NSK" id="evtContainer">  
        <div class="skyBanner">
            <a href="https://police.willbes.net/promotion/index/cate/3010/code/2177" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_sky01.jpg" alt="문제풀이 풀패키지"></a>
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2164" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_sky02.jpg" alt="문제풀이 풀패키지"></a>
        </div> 

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2192_top.jpg" alt="고득점 합격이야기" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2192_01_01.jpg" alt="" />
            <ul class="tabs">
                <li>
                    <a href="#tab1">
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2192_01_tab01_on.png" class="on"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2192_01_tab01.png" class="off"/>
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2192_01_tab02_on.png" class="on"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/04/2192_01_tab02.png" class="off"/>
                    </a>
                </li>
            </ul>
            <div id="tab1">
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/qLohf54Pa3g?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="youtubeTxt">
                        2021년 1차 <br>
                        총점 465점 3법 290점! <br>
                        고득점 합격수기(서울청 박*솜)
                    </div>
                </div>
                <div class="youtubeBox">                    
                    <div class="youtubeTxt tx-right">
                        2021년 1차 <br>
                        한국사 100점! <br>
                        고득점 합격수기(전북청 양*루)
                    </div>
                    <div class="youtube f_right">
                        <iframe src="https://www.youtube.com/embed/ga6oynxciFs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/vbaA3nCuqV8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="youtubeTxt">
                        2021년 1차<br>
                        3법 285점!<br>
                        고득점 합격수기(경기남부청 최*경)
                    </div>
                </div>
                <div class="btnLink mt80"><a href="https://www.youtube.com/playlist?list=PLl65lsiDN8NOR78sIh792GSrnfV_Zl_f8" target="_blank">더 많은 <strong>고득점 영상</strong>  바로가기 ></a></div>
            </div>
            <div id="tab2">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2192_01_02.jpg" alt="" />
                <div class="btnLink"><a href="https://police.willbes.net/pass/support/notice/show?board_idx=326506" target="_blank">더 많은 <strong>고득점 수기</strong> 바로가기 ></a></div>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_01.jpg" alt="신광은과 함께라면" />
            <ul class="tabBig">
                <li><a href="#tabBig01">형사소송법<br>신광은 교수님</a></li>
                <li><a href="#tabBig02">경찰학<br>장정훈 교수님</a></li>
                <li><a href="#tabBig03">형법<br>김원욱, 신광은 교수님</a></li>
                <li><a href="#tabBig04">영어<br>하승민, 김현정 교수님</a></li>
                <li><a href="#tabBig05">한국사<br>원유철, 오태진 교수님</a></li>
            </ul>

            <div id="tabBig01">
                <ul class="tabSm">
                    <li><a href="#tabSm01">문제풀이 1,2,3 단계 덕분에</a></li>
                    <li><a href="#tabSm02">이해위주 학습 덕분에</a></li>
                    <li><a href="#tabSm03">최신판례 특강 덕분에</a></li>
                </ul>

                <div class="slide_con" id="tabSm01">
                    <ul id="slidesImg1">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_01.jpg" alt="1" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_02.jpg" alt="2" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_03.jpg" alt="3" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_04.jpg" alt="4" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_05.jpg" alt="4" /></li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm02">
                    <ul id="slidesImg2">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_06.jpg" alt="6" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_07.jpg" alt="7" /></li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm03">
                    <ul id="slidesImg3">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_08.jpg" alt="8" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t1_09.jpg" alt="9" /></li>
                    </ul>
                </div>
            </div>

            <div id="tabBig02">
                <ul class="tabSm">
                    <li><a href="#tabSm04">문제풀이 1,2,3 단계 덕분에</a></li>
                    <li><a href="#tabSm05">완벽한 커리큘럼 덕분에</a></li>
                    <li><a href="#tabSm06">네친구 덕분에</a></li>
                </ul>

                <div class="slide_con" id="tabSm04">
                    <ul id="slidesImg4">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_01.jpg" alt="1" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_02.jpg" alt="2" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_03.jpg" alt="3" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_04.jpg" alt="4" /></li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm05">
                    <ul id="slidesImg5">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_05.jpg" alt="5" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_06.jpg" alt="6" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_07.jpg" alt="7" /></li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm06">
                    <ul id="slidesImg6">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_08.jpg" alt="8" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_09.jpg" alt="9" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t2_10.jpg" alt="10" /></li>
                    </ul>
                </div>
            </div>

            <div id="tabBig03">
                <ul class="tabSm">
                    <li><a href="#tabSm07">문제풀이 1,2,3 단계 덕분에</a></li>
                    <li><a href="#tabSm08">완벽한 커리큘럼 덕분에</a></li>
                    <li><a href="#tabSm09">신광은교수님 심화이론 덕분에</a></li>
                </ul>

                <div class="slide_con" id="tabSm07">
                    <ul id="slidesImg7">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t3_01.jpg" alt="1" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t3_02.jpg" alt="2" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t3_03.jpg" alt="3" /></li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm08">
                    <ul id="slidesImg8">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t3_04.jpg" alt="4" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t3_05.jpg" alt="5" /></li>
                    </ul>
                </div>

                <div class="slide_con" id="tabSm09">
                    <ul id="slidesImg9">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t3_06.jpg" alt="6" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t3_07.jpg" alt="7" /></li>
                    </ul>
                </div>
            </div>

            <div id="tabBig04">
                <p>문제풀이 1,2,3 단계 덕분에</p>

                <div class="slide_con" id="tabSm10">
                    <ul id="slidesImg10">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t4_01.jpg" alt="1" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t4_02.jpg" alt="2" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t4_03.jpg" alt="3" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t4_04.jpg" alt="4" /></li>
                    </ul>
                </div>
            </div>

            <div id="tabBig05">
                <p>문제풀이 1,2,3 단계 덕분에</p>

                <div class="slide_con" id="tabSm11">
                    <ul id="slidesImg11">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t5_01.jpg" alt="1" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t5_02.jpg" alt="2" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t5_03.jpg" alt="3" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/04/2192_02_t5_04.jpg" alt="4" /></li>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
    <!-- End evtContainer -->


    <script type="text/javascript">  
        $(document).ready(function(){
            $('.tabs').each(function(){
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

                    e.preventDefault()}
                )}
            )}
        ); 

        $(document).ready(function(){
            $('.tabBig').each(function(){
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

                    e.preventDefault()}
                )}
            )}
        ); 

        $(document).ready(function(){
            $('.tabSm').each(function(){
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

                    e.preventDefault()}
                )}
            )}
        ); 
    </script>
@stop