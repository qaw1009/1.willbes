@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_top {width:100%; text-align:center; background:#292522 url(https://static.willbes.net/public/images/promotion/2021/01/1032_top_bg.jpg) no-repeat center; margin-top:20px; min-width:1210px}
        .wb_top div {width:1210px; margin:0 auto; position:relative}
        .wb_top span {position:absolute; display:block; top:588px; left:425px; width:340px; z-index:10; color:#fff6c8; font-size:80px; font-weight:bold; font-family:Verdana, Geneva, sans-serif; letter-spacing:15px}

        .wb_01 {width:100%; text-align:center; background:#dedede; min-width:1210px; position:relative; padding-bottom:20px;}
        
        /* 슬라이드배너 */
        .slide_con {position:relative; width:900px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:67px; height:67px; margin-top:-33px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px}
        .slide_con p.rightBtn {right:-100px}
        #slidesImg5 {height:363px; overflow:hidden}
        #slidesImg5 li {display:inline; float:left; margin-bottom:50px}
        #slidesImg5:after {content:""; display:block; clear:both}
        

        .wb_01 .moreBtn {display:block; width:400px; margin:150px auto 0; height:50px; line-height:50px; font-size:20px; text-align:center; color:#fff; background:#405acb; border-radius:30px; margin-bottom:100px}
        .wb_01 .moreBtn:hover {color:#fff; background:#333;}

        /* 탭 */
        .evttabWrap{width:854px; height:480px; text-align:center; margin:0 auto;}
        .tabContents {padding-top:50px}
        .tabContents iframe {width:854px; height:480px}

        .Pstyle {opacity:0; display:none; position:absolute; background-color:#fff;z-index:9;top:0;}


        .wb_02 {width:100%; text-align:center; background:#444645; min-width:1210px; padding:30px 0}
        

        #slidesCts3 li {display:inline; float:left; width:900px; position:static; left:0}
        #slidesCts3:after {content:""; display:block; clear:both}

        .wb_07 {width:100%; text-align:center; background:#faf8f5; min-width:1210px; padding:150px 0}
        .wb_07 .evTabs {width:833px; margin:30px auto 0; text-align: center;}
        .wb_07 .evTabs li {display:inline; float:left; text-align: center; margin-right:10px;margin-bottom:10px;width:267px;}
        .wb_07 .evTabs li:last-child {margin:0}
        .wb_07 .evTabs img.off {display:block}
        .wb_07 .evTabs img.on {display:none}
        .wb_07 .evTabs a {background:none}
        .wb_07 .evTabs a.active img.off {display:none}
        .wb_07 .evTabs a.active img.on {display:block}
        .wb_07 .evTabs:after {content:""; display:block; clear:both}
        .wb_07 .tabCts {clear:both; width:833px; margin:10px auto 0; position:relative !important}
        .wb_07 .tabCts a {position:absolute; right:20px; top:40px; z-index:10}

        .wb_03 {width:100%; text-align:center; background:#dedede; min-width:1210px; padding:150px 0}
        .wb_03 .evTabs {width:864px; margin:30px auto 0; text-align: center;}
        .wb_03 .evTabs li {display:inline; float:left; text-align: center; margin-right:10px}
        .wb_03 .evTabs li:last-child {margin:0}
        .wb_03 .evTabs img.off {display:block}
        .wb_03 .evTabs img.on {display:none}
        .wb_03 .evTabs a {background:none}
        .wb_03 .evTabs a.active img.off {display:none}
        .wb_03 .evTabs a.active img.on {display:block}
        .wb_03 .evTabs:after {content:""; display:block; clear:both}
        .wb_03 .tabCts {clear:both; width:854px; margin:10px auto 0; position:relative !important}
        .wb_03 .tabCts a {position:absolute; right:20px; top:40px; z-index:10}


        .wb_04 {width:100%; text-align:center; background:#fff; min-width:1210px; padding:150px 0}
        .slide_con2 {width:854px; margin:100px auto 0; position:relative !important}
        .slide_con2 .bx-pager{position:absolute;top:12px;right:10px; z-index:1000}
        .slide_con2 .bx-pager .bx-pager-item{display:inline-block;margin:0 2px}
        .slide_con2 .bx-pager .bx-pager-item a{display:inline-block;width:10px;height:10px; border-radius:5px; font-size:0; background:#ccc; vertical-align:middle}
        .slide_con2 .bx-pager .bx-pager-item a.active {background:#3e5ac8}

        .Pstyle {opacity:0; display:none; position:relative; background-color:#fff}
        .Pstyle .fpcontent {height:auto; width:auto; border:1px solid #000}
        .Pstyle .b-close {position:absolute; right:10px; top:10px; display:inline-block; cursor:pointer; font-size:12px !important}

        .wb_05 {width:100%; text-align:center; font-size:120%; background:#f5f5f5; padding-bottom:120px; min-width:1210px}
        .wb_05 .wb_05_c {width:880px; margin:0 auto; border:1px solid #d6d6d6; background:#fff; padding:48px 58px; text-align:left; margin-bottom:80px}
        .wb_05 .wb_05_c span {display:inline-block; font-size:140%; font-weight:500; background:#2360bb; color:#fff; height:36px; line-height:36px; padding:0 20px}
        .wb_05 .wb_05_c p {border-top:1px solid #c2c2c2; margin-bottom:20px}

        .wb_06 {width:100%; text-align:center; background:#dedede; min-width:1210px; position:relative; padding-bottom:120px; }
        /* 슬라이드배너 */
        .slide_con6 {position:relative; width:900px; margin:0 auto}
        .slide_con6 p {position:absolute; top:50%; width:67px; height:67px; margin-top:-33px; z-index:100}
        .slide_con6 p a {cursor:pointer}
        .slide_con6 p.leftBtn {left:-100px}
        .slide_con6 p.rightBtn {right:-100px}
        #slidesImg6 li {display:inline; float:left; position:static; left:0}
        #slidesImg6:after {content:""; display:block; clear:both}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="wb_top">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_top.jpg" alt="신광은경찰 합격스토리 대공개" />
                <span id="counter">9,629</span>
            </div>
        </div>
        {{--
        <div class="wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV02_.jpg" alt="합격자가 말하는 REAL 합격 STORY"><br />
            <div class="slide_con">
                <ul id="slidesImg5">
                    <li><a href="#interview20"><img src="https://static.willbes.net/public/images/promotion/2019/09/1032_itv_20.jpg" alt=""/></a></li>
					<li><a href="#interview19"><img src="https://static.willbes.net/public/images/promotion/2019/09/1032_itv_19.jpg" alt=""/></a></li>
					<li><a href="#interview18"><img src="https://static.willbes.net/public/images/promotion/2019/09/1032_itv_18.jpg" alt=""/></a></li>
                    <li><a href="#interview17"><img src="https://static.willbes.net/public/images/promotion/2019/09/1032_itv_17.jpg" alt=""/></a></li>
                    <li><a href="#interview16"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_16.jpg" alt=""/></a></li>
					<li><a href="#interview15"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_15.jpg" alt=""/></a></li>
					<li><a href="#interview14"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_14.jpg" alt=""/></a></li>
                    <li><a href="#interview13"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_13.jpg" alt=""/></a></li>
                    <li><a href="#interview12"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_12.jpg" alt=""/></a></li>
					<li><a href="#interview11"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_11.jpg" alt=""/></a></li>
					<li><a href="#interview10"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_10.jpg" alt=""/></a></li>
                    <li><a href="#interview09"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_09.jpg" alt=""/></a></li>
                    <li><a href="#interview08"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_08.jpg" alt=""/></a></li>
					<li><a href="#interview07"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_07.jpg" alt=""/></a></li>
					<li><a href="#interview06"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_06.jpg" alt=""/></a></li>
                    <li><a href="#interview05"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_05.jpg" alt=""/></a></li>
                    <li><a href="#interview04"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_04.jpg" alt=""/></a></li>
					<li><a href="#interview03"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_03.jpg" alt=""/></a></li>
					<li><a href="#interview02"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_02.jpg" alt=""/></a></li>
                    <li><a href="#interview01"><img src="https://static.willbes.net/public/images/promotion/2019/07/1032_itv_01.jpg" alt=""/></a></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft5"><img src="https://static.willbes.net/public/images/promotion/2020/11/EV170306_p_prev.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight5"><img src="https://static.willbes.net/public/images/promotion/2020/11/EV170306_p_next.png" alt="다음" /></a></p>
            </div>          


            <div class="evttabWrap">
                <div class="tabContents" id="interview20" >
                    <iframe src="https://www.youtube.com/embed/9T5xBJAsvxg?list=PLl65lsiDN8NOR78sIh792GSrnfV_Zl_f8"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>
                </div>           
                <div class="tabContents" id="interview19"></div>
                <div class="tabContents" id="interview18"></div>
                <div class="tabContents" id="interview17"></div>
                <div class="tabContents" id="interview16"></div>              
                <div class="tabContents" id="interview15"></div>
                <div class="tabContents" id="interview14"></div>
                <div class="tabContents" id="interview13"></div>
                <div class="tabContents" id="interview12"></div>
                <div class="tabContents" id="interview11"></div>
                <div class="tabContents" id="interview10"></div>
                <div class="tabContents" id="interview09"></div>          
                <div class="tabContents" id="interview08"></div>
                <div class="tabContents" id="interview07"></div>
                <div class="tabContents" id="interview06"></div>
                <div class="tabContents" id="interview05"></div>
                <div class="tabContents" id="interview04"></div>
                <div class="tabContents" id="interview03"></div>
                <div class="tabContents" id="interview02"></div>
                <div class="tabContents" id="interview01"></div>  
            </div>

            <div>
                <a href="https://www.youtube.com/playlist?list=PLl65lsiDN8NOR78sIh792GSrnfV_Zl_f8" target="_blank" class="moreBtn">더 많은 고득점자 인터뷰 보기 ></a>
            </div>
        </div>        
        --}}

        <div class="wb_07">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07.png"  alt="시크릿 노트" />
            <ul class="evTabs">
                <li>
                    <a href="#tab21">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab01on.png"  alt="김성*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab01.png"  alt="김성*" class="on"/>
                    </a>
                </li>   
                <li>
                    <a href="#tab22">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab02on.png"  alt="김재*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab02.png"  alt="김재*" class="on"/>
                    </a>
                </li>   
                <li>
                    <a href="#tab23">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab03on.png"  alt="이세*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab03.png"  alt="이세*" class="on"/>
                    </a>
                </li>   
                <li>
                    <a href="#tab24">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab04on.png"  alt="이영*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab04.png"  alt="이영*" class="on"/>
                    </a>
                </li>   
                <li>
                    <a href="#tab25">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab05on.png"  alt="성찬*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab05.png"  alt="성찬*" class="on"/>
                    </a>
                </li>   
                <li>
                    <a href="#tab26">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab06on.png"  alt="김원*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab06.png"  alt="김원*" class="on"/>
                    </a>
                </li>   
                <li>
                    <a href="#tab27">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab07on.png"  alt="오혜*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab07.png"  alt="오혜*" class="on"/>
                    </a>
                </li>   
                <li>
                    <a href="#tab28">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab08on.png"  alt="윤종*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab08.png"  alt="윤종*" class="on"/>
                    </a>
                </li>   
                <li>
                    <a href="#tab29">
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab09on.png"  alt="박제*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab09.png"  alt="박제*" class="on"/>
                    </a>
                </li>                            
            </ul>

            <div id="tab21" class="tabCts">
                <a onclick="go_popup21()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab01_cts.png"  alt="시크릿노트 김성*"/>
            </div>
            <div id="tab22" class="tabCts">
                <a onclick="go_popup22()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab02_cts.png"  alt="시크릿노트 김재*"/>
            </div>
            <div id="tab23" class="tabCts">
                <a onclick="go_popup23()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab03_cts.png"  alt="시크릿노트 이세*"/>
            </div>
            <div id="tab24" class="tabCts">
                <a onclick="go_popup24()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab04_cts.png"  alt="시크릿노트 이영*"/>
            </div>
            <div id="tab25" class="tabCts">
                <a onclick="go_popup25()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab05_cts.png"  alt="시크릿노트 성찬*"/>
            </div>
            <div id="tab26" class="tabCts">
                <a onclick="go_popup26()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab06_cts.png"  alt="시크릿노트 김원*"/>
            </div>
            <div id="tab27" class="tabCts">
                <a onclick="go_popup27()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab07_cts.png"  alt="시크릿노트 오혜*"/>>
            </div>
            <div id="tab28" class="tabCts">
                <a onclick="go_popup28()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab08_cts.png"  alt="시크릿노트 윤종*"/>
            </div>
            <div id="tab29" class="tabCts">
                <a onclick="go_popup29()"><img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_btn.png"  alt="시크릿노트"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab09_cts.png"  alt="시크릿노트 박제*"/>
            </div>

        </div>

        <div class="wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_top.png"  alt="합격비법을 공개합니다." />
            <ul class="evTabs">
                <li>
                    <a href="#tab11">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab1.png"  alt="합격비법 김형*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab1on.png"  alt="합격비법 김형*" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab12">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab2.png"  alt="합격비법 박현*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab2on.png"  alt="합격비법 박현*" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab13">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab3.png"  alt="합격비법 오희*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab3on.png"  alt="합격비법 오희*" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab14">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab4.png"  alt="합격비법 김원*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab4on.png"  alt="합격비법 김원*" class="on"/>
                    </a>
                </li>

                <li>
                    <a href="#tab15">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab5.png"  alt="합격비법 김형*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab5on.png"  alt="합격비법 김형*" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab16">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab6.png"  alt="합격비법 박현*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab6on.png"  alt="합격비법 박현*" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab17">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab7.png"  alt="합격비법 오희*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab7on.png"  alt="합격비법 오희*" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#tab18">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab8.png"  alt="합격비법 김원*" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab8on.png"  alt="합격비법 김원*" class="on"/>
                    </a>
                </li>
            </ul>

            <div id="tab11" class="tabCts">
                <a onclick="go_popup()"><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_1.jpg"  alt="합격비법 김형*"/>
            </div>
            <div id="tab12" class="tabCts">
                <a onclick="go_popup1()"><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_2.jpg"  alt="합격비법 박현*"/>
            </div>
            <div id="tab13" class="tabCts">
                <a onclick="go_popup2()"><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_3.jpg"  alt="합격비법 오희*"/>
            </div>
            <div id="tab14" class="tabCts">
                <a onclick="go_popup3()"><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_4.jpg"  alt="합격비법 김원*"/>
            </div>
            <div id="tab15" class="tabCts">
                <a onclick="go_popup4()"><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_5.jpg"  alt="합격비법 김형*"/>
            </div>
            <div id="tab16" class="tabCts">
                <a onclick="go_popup5()"><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_6.jpg"  alt="합격비법 박현*"/>
            </div>
            <div id="tab17" class="tabCts">
                <a onclick="go_popup6()"><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_7.jpg"  alt="합격비법 오희*"/>
            </div>
            <div id="tab18" class="tabCts">
                <a onclick="go_popup7()"><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_btn.png"  alt="학습전략 자세히 보기"></a>
                <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_8.jpg"  alt="합격비법 김원*"/>
            </div>
        </div><!--wb_03//-->

        <div class="wb_02">
            <div class="slide_con">
                <ul id="slidesCts3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV03_1.png" alt="1.경찰합교 최종합격자의 밤" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV03_2.png" alt="2.중앙경찰학교 입교하는 날" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV03_3.png" alt="3.합격수기 공모전 시상식" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV03_4.png" alt="3.합격수기 공모전 시상식" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV03_5.png" alt="3.합격수기 공모전 시상식" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV03_6.png" alt="3.합격수기 공모전 시상식" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV03_7.png" alt="3.합격수기 공모전 시상식" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV03_8.png" alt="3.합격수기 공모전 시상식" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/11/EV170306_p_prev.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/11/EV170306_p_next.png" alt="다음" /></a></p>
            </div>
        </div><!--wb_02//-->



        <div class="wb_04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_top.jpg"  alt="나는 이렇게 합격했다." />
            <div class="slide_con slide_con2">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_10.jpg" alt="10" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_1.jpg" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_2.jpg" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_3.jpg" alt="3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_4.jpg" alt="4" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_5.jpg" alt="5" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_6.jpg" alt="6" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_7.jpg" alt="7" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_8.jpg" alt="8" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV05_9.jpg" alt="9" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/11/EV170306_p_prev.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/11/EV170306_p_next.png" alt="다음" /></a></p>
            </div>

            <div id="popup" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab1_pop.jpg" alt="합격비법 김형*"/>
                </div>
            </div>
            <div id="popup1" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab2_pop.jpg" alt="합격비법 박현*"/>
                </div>
            </div>
            <div id="popup2" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab3_pop.jpg" alt="합격비법 오희*"/>
                </div>
            </div>
            <div id="popup3" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab4_pop.jpg" alt="합격비법 김원*"/>
                </div>
            </div>
            <div id="popup4" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab5_pop.jpg" alt="합격비법 김원*"/>
                </div>
            </div>
            <div id="popup5" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab6_pop.jpg" alt="합격비법 김원*"/>
                </div>
            </div>
            <div id="popup6" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab7_pop.jpg" alt="합격비법 김원*"/>
                </div>
            </div>
            <div id="popup7" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV04_tab8_pop.jpg" alt="합격비법 김원*"/>
                </div>
            </div>
            <div id="popup21" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab01_pop.png" alt="시크릿노트 김성*"/>
                </div>
            </div>
            <div id="popup22" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab02_pop.png" alt="시크릿노트 김재*"/>
                </div>
            </div>
            <div id="popup23" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab03_pop.png" alt="시크릿노트 이세*"/>
                </div>
            </div>
            <div id="popup24" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab04_pop.png" alt="시크릿노트 이영*"/>
                </div>
            </div>
            <div id="popup25" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab05_pop.png" alt="시크릿노트 성찬*"/>
                </div>
            </div>
            <div id="popup26" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab06_pop.png" alt="시크릿노트 김원*"/>
                </div>
            </div>
            <div id="popup27" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab07_pop.png" alt="시크릿노트 오혜*"/>
                </div>
            </div>
            <div id="popup28" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab08_pop.png" alt="시크릿노트 윤종*"/>
                </div>
            </div>
            <div id="popup29" class="Pstyle">
                <div class="b-close">X</div>
                <div class="fpcontent">
                    <img src="https://static.willbes.net/public/images/promotion/2021/01/1032_07_tab09_pop.png" alt="시크릿노트 박제*"/>
                </div>
            </div>
        </div><!--wb_04//-->

        {{--
        <div class="wb_06" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07.jpg"  alt="3법도 공통과목도" />
            <div class="slide_con">
                <ul id="slidesImg6">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_6.jpg" alt="6" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_7.jpg" alt="7" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_8.jpg" alt="8" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_9.jpg" alt="9" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_10.jpg" alt="10" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_11.jpg" alt="11" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_12.jpg" alt="12" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_13.jpg" alt="13" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_14.jpg" alt="14" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_1.jpg" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_2.jpg" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_3.jpg" alt="3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_4.jpg" alt="4" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_5.jpg" alt="5" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV07_15.jpg" alt="5" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft6"><img src="https://static.willbes.net/public/images/promotion/2020/11/EV170306_p_prev.png" alt="이전" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight6"><img src="https://static.willbes.net/public/images/promotion/2020/11/EV170306_p_next.png" alt="다음" /></a></p>
            </div>
        </div>
        --}}

        <div class="wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/180713_EV06_1.jpg" alt="대한민국의 자랑스러원 경찰이 될 당신의 이야기를 기다립니다." usemap="#Map" />
            <map name="Map" id="Map">
                <area shape="rect" coords="305,968,408,1014" href="{{ site_url('/promotion/index/cate/3001/code/2101') }}" target="_blank" alt="신광은경찰PASS"/>
                <area shape="rect" coords="494,968,595,1014" href="{{ site_url('/home/index/cate/3002') }}" target="_blank" alt="경행경채"/>
                <area shape="rect" coords="678,968,779,1014" href="{{ site_url('/home/index/cate/3006') }}" target="_blank" alt="경찰승진PASS"/>
                <area shape="rect" coords="861,968,965,1014" href="{{ site_url('/promotion/index/cate/3008/code/1020') }}" target="_blank" alt="해양특채PASS"/>
            </map>
        </div><!--wb_05//-->

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.bpopup.min.js"></script>    
    <script type="text/javascript">
        function go_popup(){
            $('#popup').bPopup();
        }

        function go_popup1(){
            $('#popup1').bPopup();
        }

        function go_popup2(){
            $('#popup2').bPopup();
        }

        function go_popup3(){
            $('#popup3').bPopup();
        }

        function go_popup4(){
            $('#popup4').bPopup();
        }

        function go_popup5(){
            $('#popup5').bPopup();
        }

        function go_popup6(){
            $('#popup6').bPopup();
        }
        
        function go_popup7(){
            $('#popup7').bPopup();
        }

        function go_popup21(){
            $('#popup21').bPopup();
        }

        function go_popup22(){
            $('#popup22').bPopup();
        }

        function go_popup23(){
            $('#popup23').bPopup();
        }

        function go_popup24(){
            $('#popup24').bPopup();
        }

        function go_popup25(){
            $('#popup25').bPopup();
        }

        function go_popup26(){
            $('#popup26').bPopup();
        }

        function go_popup27(){
            $('#popup27').bPopup();
        }

        function go_popup28(){
            $('#popup28').bPopup();
        }

        function go_popup29(){
            $('#popup29').bPopup();
        }



        $(document).ready(function(){
            $('ul.evTabs').each(function(){
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

                    e.preventDefault()})})
        });

        $(document).ready(function() {
            var slidesImg5 = $("#slidesImg5").bxSlider({
                mode: 'horizontal',
                speed: 500,        // 이동 속도를 설정
                pager: false,      // 현재 위치 페이징 표시 여부 설정
                moveSlides: 4,     // 슬라이드 이동시 개수
                slideWidth: 225,   // 슬라이드 너비
                minSlides: 4,      // 최소 노출 개수
                maxSlides: 4,      // 최대 노출 개수
                slideMargin: 5,    // 슬라이드간의 간격
                auto: true,        // 자동 실행 여부
                autoHover: true,   // 마우스 호버시 정지 여부
                controls: false    // 이전 다음 버튼 노출 여부
            });

            $("#imgBannerLeft5").click(function (){
                slidesImg5.goToPrevSlide();
            });
            $("#imgBannerRight5").click(function (){
                slidesImg5.goToNextSlide();
            });
        });

        var tab20_url = "https://www.youtube.com/embed/9T5xBJAsvxg?list=PLl65lsiDN8NOR78sIh792GSrnfV_Zl_f8";
        var tab19_url = "https://www.youtube.com/embed/KdpCHm44Yrw?rel=0";
        var tab18_url = "https://www.youtube.com/embed/4uXR4CRf_wk?rel=0";
        var tab17_url = "https://www.youtube.com/embed/Os4UBadJReM?rel=0";
        var tab16_url = "https://www.youtube.com/embed/9Th4Ur2Px-k?rel=0";
        var tab15_url = "https://www.youtube.com/embed/Vpe87p_O4-I?rel=0";
        var tab14_url = "https://www.youtube.com/embed/5wPsViPfppY?rel=0";
        var tab13_url = "https://www.youtube.com/embed/qzWbRzB_AI0?rel=0";
        var tab12_url = "https://www.youtube.com/embed/sFK1u739qaM?rel=0";
        var tab11_url = "https://www.youtube.com/embed/U__iG4VtVUo?rel=0";
        var tab10_url = "https://www.youtube.com/embed/eUGgcT7GDe0?rel=0";
        var tab09_url = "https://www.youtube.com/embed/s1JYbeMvUvI?rel=0";
        var tab08_url = "https://www.youtube.com/embed/XXbDBQcNtEA?rel=0";
        var tab07_url = "https://www.youtube.com/embed/mI9cil-fFyU?rel=0";
        var tab06_url = "https://www.youtube.com/embed/IUgBGlIjj3g?rel=0";
        var tab05_url = "https://www.youtube.com/embed/L6k33zT_kQA?rel=0";
        var tab04_url = "https://www.youtube.com/embed/asSdq0i7ZFU?rel=0";
        var tab03_url = "https://www.youtube.com/embed/xV5p0RSbxl8?rel=0";
        var tab02_url = "https://www.youtube.com/embed/5mHzw2KjdB0?rel=0";
        var tab01_url = "https://www.youtube.com/embed/p47aOAGOO8E?rel=0";


        $(document).ready(function(){
        $(".tabContents ").hide(); 
        $(".tabContents:first").show();
            $("#slidesImg5 li a").click(function(){ 
            var activeTab = $(this).attr("href"); 
            var html_str = "";
            if(activeTab == "#interview20"){
            html_str = "<iframe src='"+tab20_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview19"){
            html_str = "<iframe src='"+tab19_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview18"){
            html_str = "<iframe src='"+tab18_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview17"){
            html_str = "<iframe src='"+tab17_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview16"){
            html_str = "<iframe src='"+tab16_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview15"){
            html_str = "<iframe src='"+tab15_url+"' allowfullscreen></iframe>";					
            }else if(activeTab == "#interview14"){
            html_str = "<iframe src='"+tab14_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview13"){
            html_str = "<iframe src='"+tab13_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview12"){
            html_str = "<iframe src='"+tab12_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview11"){
            html_str = "<iframe src='"+tab11_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview10"){
            html_str = "<iframe src='"+tab10_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview09"){
            html_str = "<iframe src='"+tab09_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview08"){
            html_str = "<iframe src='"+tab08_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview07"){
            html_str = "<iframe src='"+tab07_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview06"){
            html_str = "<iframe src='"+tab06_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview05"){
            html_str = "<iframe src='"+tab05_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview04"){
            html_str = "<iframe src='"+tab04_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview03"){
            html_str = "<iframe src='"+tab03_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview02"){
            html_str = "<iframe src='"+tab02_url+"' allowfullscreen></iframe>";
            }else if(activeTab == "#interview01"){
            html_str = "<iframe src='"+tab01_url+"' allowfullscreen></iframe>";
            }

        $("#slidesImg5 li a").removeClass("active"); 
        $(this).addClass("active"); 
        $(".tabContents").hide(); 
        $(".tabContents").html(''); 
        $(activeTab).html(html_str);
        $(activeTab).fadeIn(); 
        return false; 
            });
        });

        $(document).ready(function() {
            var slidesCts3 = $("#slidesCts3").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                slideWidth:900,
                autoHover: true,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesCts3.goToPrevSlide();
            });
            $("#imgBannerRight3").click(function (){
                slidesCts3.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'fade',
                speed:800,
                pause:4000,
                slideWidth:854,
                autoHover: true,
                auto: true,
                controls:false
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });
            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg6 = $("#slidesImg6").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                slideWidth:900,
                autoHover: true,
                pager:false
            });

            $("#imgBannerLeft6").click(function (){
                slidesImg6.goToPrevSlide();
            });
            $("#imgBannerRight6").click(function (){
                slidesImg6.goToNextSlide();
            });
        });
    </script>

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        $('#counter').counterUp({
            delay: 10, // the delay time in ms
            time: 1000 // the speed time in ms
        });
    });
    </script>
    
@stop
