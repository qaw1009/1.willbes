@extends('willbes.pc.layouts.master')
<style type="text/css">
    /*Main Container : 상단 배너*/
    .adm .MainVisual {
        width: 100%;
        min-width: 1120px;
        max-width: 2000px;
        height: 440px;
        overflow: hidden;
        position: relative;
        margin:0 auto;
        text-align: center;
    }

    .adm .MaintabBox {
        position: absolute;
        top:0;
        left:50%;
        margin-left:-1000px;
        width: 2000px;
        min-width: 1120px;
        max-width: 2000px;
        height: 440px; 
        overflow: hidden;
    }
    .adm .MaintabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer; 
        background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
    .adm .MaintabBox p a {display:none;}
    .adm .MaintabBox p.leftBtn {margin-left:-620px;}
    .adm .MaintabBox p.rightBtn {margin-left:588px; background-position: right center;}	
    .adm .MaintabBox p:hover {opacity:100; filter:alpha(opacity=100);}

    .adm .MaintabList {
        position: absolute;
        top:390px;
        width:100%;
        height: 50px;
        z-index: 99;
        background-color: rgba(0,0,0,0.5);
    }
    .adm .VisualBox .Maintab {width: 100%; margin:0 auto; text-align:center}
    .adm .VisualBox .Maintab span {
        display: inline-block;    
        height: 50px;
        font-size: 15px;
        line-height: 50px;    
        width: 200px;
        color:#fff
    }
    .adm .VisualBox .Maintab span a.active,
    .adm .VisualBox .Maintab span a:hover {color:#f9dd74; font-weight:600}
    .adm .VisualBox .Maintab:after {content:""; display:block; clear:both}
    .adm .VisualBox .MaintabList.three span {
        width: 209px;
    }
    .adm .VisualBox .MaintabList.four span {
        width: 156px;
    }
    .adm .VisualBox .MaintabList.five span {
        width: 188px;
    }
    .adm .VisualBox .MaintabList span a {
        display: block;
        width: 100%;
        height: 100%;
    }
    .adm .VisualBox .MaintabSlider li img {
        width: 100%;
        height: 100%;
    }
    .adm .VisualBox .Maintab li a:hover,
    .adm .VisualBox .Maintab li a.active { color:#fff;  font-weight: bold; background:rgba(0,0,0,0.5);}

    /*Main Container : 배너 4칸*/
    .adm .SecBanner02 {
        width:265px;
        height:350px;
        margin-right:20px;
        display: inline;
        float: left;
    }
    .adm .SecBanner02:last-child {margin:0}
    .adm .SecBanner02 .tag {height:30px; line-height: 30px; font-size: 15px;}
    .adm .SecBanner02 .slider {width: 265px; height: 320px; overflow: hidden;}
    .adm .SecBanner02 .bx-wrapper .bx-pager.bx-default-pager a {
        background: #fff;
        border:1px solid #b9b9b9;
        border-radius:10px;
    }
    .adm .SecBanner02 .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .adm .SecBanner02 .bx-wrapper .bx-pager.bx-default-pager a.active,
    .adm .SecBanner02 .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #000;
        border:1px solid #000;
    }

    /*Main Container : 최근 업로드 강의*/
    .adm .will-nTit {font-size:35px !important; border:0 !important; }
    .adm .uploadLec {    
        box-shadow:0 10px 25px rgba(0,0,0,.2);
        border-radius:10px;    
        padding:20px;
        }
    .adm .uploadLec .vSlider {position:relative; width:100%; height:74px;} 
    .adm .uploadLec .vSlider:after {content:''; display: block; clear:both}
    .adm .uploadLec .vSlider .sliderNumV {
        height:74px;
        overflow: hidden;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:after {content:''; display: block; clear:both}
    .adm .uploadLec .vSlider .sliderNumV .lecReview {
        float:left; 
        display: inline; 
        width:50%; 
        height:74px;
        line-height: 1.3;
    }
    .adm .uploadLec .vSlider .sliderNumV .lecReview a {display:block;}
    .adm .uploadLec .vSlider .sliderNumV .lecReview a:after {content:''; display: block; clear:both}
    .adm .uploadLec .imgBox {
        position:relative;
        float: left;
        width: 74px;
        height: 74px;
        border-radius:6px;
        overflow:hidden
    }
    .adm .uploadLec .imgBox img {   
        position: absolute; left:50%; top:50%; width:100%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%) scale(1);
        transition: all ease-in-out .2s;
    } 
    .adm .uploadLec .vSlider .sliderNumV .lecReview a:hover img {
        -ms-transform: translate(-50%, -50%) scale(1.1);
        -webkit-transform: translate(-50%, -50%) scale(1.1);
        transform: translate(-50%, -50%) scale(1.1);
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(1n) .lecReview:nth-child(1n) .imgBox {
        background:#34b696;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(1n) .lecReview:nth-child(2n) .imgBox {
        background:#e583b9;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(2n) .lecReview:nth-child(1n) .imgBox {
        background:#3490b6;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(2n) .lecReview:nth-child(2n) .imgBox {
        background:#b1b634;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(3n) .lecReview:nth-child(1n) .imgBox {
        background:#b67734;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(3n) .lecReview:nth-child(2n) .imgBox {
        background:#d3b9ef;
    }
    .adm .uploadLec .lecinfo {float:left; margin-left:10px}
    .adm .uploadLec .lecinfo p {margin-bottom: 5px; color:#848484; font-size:15px}
    .adm .uploadLec .lecinfo p:nth-child(2) {color:#363636; font-size:16px; font-weight:600; margin-bottom: 10px;}
    .adm .uploadLec .lecinfo p:nth-child(3) {color:#0c5dc0; font-size:12px}
    .adm .uploadLec .bx-wrapper .bx-controls-direction {
        position: absolute;
        top: 0;
        right: 10px;
        width: 40px;
        height: 20px;
    }
    .adm .uploadLec .bx-wrapper .bx-controls-direction a {
        width: 20px;
        height: 20px;
    }
    .adm .uploadLec .bx-wrapper .bx-pager {
        float: none;
        width: 100%;
        right: 8px;
        bottom: -50px;
        text-align: center;
    }
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a {
        width: 12px;
        height: 12px;
        margin: 0 2px;
        background: #fff;
        border:1px solid #b9b9b9;
        border-radius:10px;
    }
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a.active,
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #000;
        border:1px solid #000;
    }
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 40px;
    }

    /*개편 과목 전문교수진*/
    .adm .SecBanner03 {
        margin-right:-5px;
    }
    .adm .SecBanner03 li {
        display:inline; float:left;  margin-right:5px;
    }
    .adm .SecBanner03:after {content:''; display: block; clear:both}

    /*개편 과목 전문교수진*/
    .adm .SecBanner04 .bSlider .slider {
        height: 100px;
        overflow:hidden;
    }
    .adm .SecBanner04 .bx-wrapper .bx-pager {
        float: none;
        width: 100%;
        right: 8px;
        bottom: -30px;
        text-align: center;
    }
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 12px;
        height: 12px;
        margin: 0 2px;
        background: #fff;
        border:1px solid #b9b9b9;
        border-radius:10px;
    }
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a.active,
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #000;
        border:1px solid #000;
    }
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 40px;
    }

    /*전문교수진 */
    .adm .SectionBg01 {background:#fbfbfd; padding:100px 0 80px}
    .adm .SecBanner05 {margin-right:-20px; margin-top:20px}
    .adm .SecBanner05 li {display:inline; float:left; margin:0 20px 20px 0; position:relative}
    .adm .SecBanner05 li a {position: absolute; left: 7.69%; top: 45.31%; width: 28.85%; height: 6.25%; z-index: 2;}
    .adm .SecBanner05 li a.link02 {top: 51.55%;}
    .adm .SecBanner05:after {content:''; display: block; clear:both}

    .adm .SectionBg02 {background:#f8f0dd; padding:100px 0}
    .adm .SectionBg02 .will-nTit {color:#000}
    .adm .SecBanner06 {margin-right:-20px; margin-top:20px}
    .adm .SecBanner06 li {display:inline; float:left; margin:0 20px 20px 0;}
    .adm .SecBanner06:after {content:''; display: block; clear:both}
    .adm .tabTv {margin-top:40px}
    .adm .tabTv .tabTvBtns {float:left; width:285px}
    .adm .tabTv .tabTvBtns li a {display:block; margin:0 0 18px}
    .adm .tabTv .tabTvBtns li a span {padding-bottom:3px; border-bottom:2px solid #f8f0dd; color:#c0b381; font-size:22px;}
    .adm .tabTv .tabTvBtns li a:hover span,
    .adm .tabTv .tabTvBtns li a.on span {color:#000; border-bottom:2px solid #000}
    .adm .tabTv .moreBtn {margin-top:40px}
    .adm .tabTv .moreBtn a {display:inline-block; color:#fff; background:#000; border-radius:30px; height:24px; line-height:24px; padding:0 20px}
    .adm .tabTv .TvctsBox:after {content:''; display: block; clear:both}
    .adm .tabTv .Tvcts {width:265px; display:inline-block; float:left; margin-right:20px}
    .adm .tabTv .Tvcts:last-child {margin:0}
    .adm .tabTv .TVcts p {text-align:center; margin-top:10px; font-size:15px; color:#000}

    .adm .SecBanner07 ul {margin-right:-20px}
    .adm .SecBanner07 li {display:inline; float:left; width:265px; margin-right:20px}
    .adm .SecBanner07 li a {display:block}
    .adm .SecBanner07 li:last-child a:last-child {margin-top:-1px}

    /*교재*/
    .adm .SectionBg03 {background:#f3f0ed; padding:100px 0}
    .adm .bookContent {position:relative; width:1120px; margin:50px auto;}
    .adm .bookList:after {content:""; display:block; clear:both}
    .adm .bookList li {display:inline; float:left; width:186px; height:300px; text-align:center; margin-bottom:30px; padding-bottom:10px;
        word-break: keep-all; color:#43484f;}
    .adm .bookList span {background: url(https://static.willbes.net/public/images/promotion/main/2001/book_cover.png) no-repeat center top;
    width:167; height:196px; position: absolute; left:10px; top:0; z-index:10}
    .adm .bookList .bookImg {position:relative;  width:142px; margin:0 auto; min-height:196px; overflow: hidden;}

    .adm .bookList li img {
        position: absolute; left:50%; top:50%; max-width:150px;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%) scale(1);
        transition: all ease-in-out .2s;   
    }
    .adm .bookList li:hover img {
        -ms-transform: translate(-50%, -50%) scale(1.1);
        -webkit-transform: translate(-50%, -50%) scale(1.1);
        transform: translate(-50%, -50%) scale(1.1);
    }
    .adm .bookList p {width:90%; margin:auto;}
    .adm .bookList p:nth-of-type(1) {font-weight:bold; line-height: 1.2; font-size:17px; margin-top:10px}
    .adm .bookList p:nth-of-type(2) {font-size:13px; color:#363636; margin-top:10px}

    .adm .bookContent > p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:57px; cursor:pointer; 
        background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;}
    .adm .bookContent > p a {display:none;}
    .adm .bookContent > p.leftBtn {margin-left:-600px;}
    .adm .bookContent > p.rightBtn {margin-left:600px; background-position: right center;}
    .adm .willbes-Layer-Box {left:50%; top:4520px !important; margin-left:-490px !important; z-index: 110;}
</style>
@section('content')
    <!-- Container -->
    <div id="Container" class="Container adm NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="VisualBox p_re">            
                <div id="MainRollingSlider" class="MaintabBox">
                    <ul class="MaintabSlider">
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_01.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_02.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_03.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_04.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_05.jpg" alt="배너명"></a></li>
                        <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_2000x440_06.jpg" alt="배너명"></a></li>
                    </ul>                  
                    <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
                </div> 
                <div id="MainRollingDiv" class="MaintabList NSK">
                    <div class="Maintab">
                        <span><a data-slide-index="0" href="javascript:void(0);" class="active">0원 무제한 패스</a></span>
                        <span><a data-slide-index="1" href="javascript:void(0);" class="">개편과목 프리패스</a></span>
                        <span><a data-slide-index="2" href="javascript:void(0);" class="">신광은 형사법</a></span>
                        <span><a data-slide-index="3" href="javascript:void(0);" class="">장정훈 경찰학</a></span>
                        <span><a data-slide-index="4" href="javascript:void(0);" class="">김원욱 헌법</a></span>
                        <span><a data-slide-index="5" href="javascript:void(0);" class="">환승할인</a></span>
                    </div>
                </div>           
            </div>        
        </div>

        <div class="Section mt100">
            <div class="widthAuto NSK">
                <ul>
                    <li class="SecBanner02">
                        <div class="tag">#초시생 잇템 SUPER PASS</div>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_01.jpg" title="배너명"></a>
                    </li>
                    <li class="SecBanner02">
                        <div class="tag">#12개월 끝장 PASS</div>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_02.jpg" title="배너명"></a>
                    </li>
                    <li class="SecBanner02">
                        <div class="tag">#문제풀이 풀패키지</div>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_03.jpg" title="배너명"></a>
                    </li>
                    <li class="SecBanner02">
                        <div class="bSlider">        
                            <div class="slider">
                                <div>
                                    <div class="tag">#기본이 중요! 기본이론 집중완성</div>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_04.jpg" title="배너명"></a>
                                </div>
                                <div>
                                    <div class="tag">#기본이론 집중완성</div>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_05.jpg" title="배너명"></a>
                                </div>
                                <div>
                                    <div class="tag">#기본이론 집중완성</div>
                                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x290_06.jpg" title="배너명"></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div> 

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    최근 <span class="cop-color">업로드</span> 강좌
                    <span class="f_right tx12 NSK-Thin pt10">* 최근 1주일 이내 업데이트된 강좌들 입니다.</span>
                </div>
                <div class="uploadLec NSK">
                    <div class="vSlider">
                        <div class="sliderNumV">
                            <div>
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51135/lec_list_51135.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 신광은</p>
                                            <p>2021년 1차대비 신광은 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50135/lec_list_50135.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 하승민</p>
                                            <p>2021년 1차대비 하승민 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>   
                            </div>

                            <div>                         
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51146/lec_list_51146.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 김원욱</p>
                                            <p>2021년 1차대비 김원욱 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50748/lec_list_50748.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 김현정</p>
                                            <p>2021년 1차대비 김현정 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>   
                            </div>  

                            <div>                      
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50748/lec_list_50748.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 김현정</p>
                                            <p>2021년 1차대비 김현정 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51135/lec_list_51135.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 신광은</p>
                                            <p>2021년 1차대비 신광은 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div>  
                            </div>

                            <div>                       
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51135/lec_list_51135.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 신광은</p>
                                            <p>2021년 1차대비 신광은 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div> 
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50748/lec_list_50748.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 김현정</p>
                                            <p>2021년 1차대비 김현정 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>  
                            </div>

                            <div>                                             
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/51146/lec_list_51146.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>형법 김원욱</p>
                                            <p>2021년 1차대비 김원욱 형법 기본이론(20년 11월)</p>
                                            <p>12월 16일 총 4강 업로드</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="lecReview">
                                    <a href="#none">
                                        <div class="imgBox">
                                            <img src="https://police.willbes.net/public/uploads/willbes/professor/50748/lec_list_50748.png">
                                        </div>
                                        <div class="lecinfo">
                                            <p>영어 김현정</p>
                                            <p>2021년 1차대비 김현정 영어 형법 기본이론(20년 11,12월)</p>
                                            <p>12월 16일 총 3강 업로드</p>
                                        </div>
                                    </a>
                                </div>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    개편 과목 <span class="cop-color">전문 교수진</span>
                    <span class="tx16 NSK-Thin pt10 ml20">2022년 경찰 합격을 위한 선택! 과목개편 대비 강좌을 경험해보세요.</span>
                </div>
                <ul class="SecBanner03">
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_370x415_01.jpg" title="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_370x415_02.jpg" title="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_370x415_03.jpg" title="배너명">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt70">
            <div class="widthAuto SecBanner04">
                <div class="bSlider">
                    <div class="slider">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_1120x100_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_1120x100_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_1120x100_03.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section SectionBg01 mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    전문 <span class="cop-color">교수진</span>
                    <span class="tx16 NSK-Thin pt10 ml20">최고의 교수진으로 수험생의 합격을 돕겠습니다.</span>
                </div>
                <ul class="SecBanner05">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_01.jpg" alt="배너명" usemap="#Map220A" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_02.jpg" alt="배너명" usemap="#Map220B" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_03.jpg" alt="배너명" usemap="#Map220C" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>                
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_04.jpg" alt="배너명" usemap="#Map220D" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2001/3002_208x320_05.jpg" alt="배너명" usemap="#Map220E" border="0">
                        <a href="#none" title="맛보기영상"></a>
                        <a href="#none" title="베스트강좌" class="link02"></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section SectionBg02 NSK">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    수험생 맞춤 콘텐츠
                    <span class="tx16 NSK-Thin pt10 ml20">경시생들에게 제공하는 수강 맞춤 콘텐츠 입니다.</span>
                </div>
                <ul class="SecBanner06">
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_01.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_02.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_03.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_04.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_05.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_06.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_07.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_08.jpg" alt="배너명"></a>
                    </li>
                    <li>
                        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_360x170_09.jpg" alt="배너명"></a>
                    </li>
                </ul>
                <div class="will-nTit NSK-Black mt100">
                    신광은경찰팀 TV
                </div>
                <div class="tabTv">
                    <div class="tabTvBtns">
                        <ul class="NSK-Black">
                            <li><a href="#tabTv01" class="on"><span>커리큘럼 & 공부방법</span></a></li>
                            <li><a href="#tabTv02"><span>신광은경찰팀 특강</span></a></li>
                            <li><a href="#tabTv03"><span>합격생 영상</span></a></li>
                        </ul>
                        <div class="moreBtn"><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank">영상 더보기 ></a></div>
                    </div>
                    <div id="tabTv01" class="TvctsBox">
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_01.jpg" alt="배너명"></a>
                            <p>2022년 커리큘&공부방법</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_02.jpg" alt="배너명"></a>
                            <p>22년 개편 경찰학 완전대비</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_03.jpg" alt="배너명"></a>
                            <p>경찰헌법 무료특강</p>
                        </div>
                    </div>
                    <div id="tabTv02" class="TvctsBox">                    
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_02.jpg" alt="배너명"></a>
                            <p>22년 개편 경찰학 완전대비</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_03.jpg" alt="배너명"></a>
                            <p>경찰헌법 무료특강</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_01.jpg" alt="배너명"></a>
                            <p>2022년 커리큘&공부방법</p>
                        </div>
                    </div>
                    <div id="tabTv03" class="TvctsBox">
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_03.jpg" alt="배너명"></a>
                            <p>경찰헌법 무료특강</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_01.jpg" alt="배너명"></a>
                            <p>2022년 커리큘&공부방법</p>
                        </div>
                        <div class="Tvcts">
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x149_02.jpg" alt="배너명"></a>
                            <p>22년 개편 경찰학 완전대비</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto SecBanner07">
                <div class="will-nTit NSK-Black">
                    경찰학원 핫 이슈 
                    <span class="tx16 NSK-Thin pt10 ml20">학원의 최신 소식을 한 눈에 확인하세요.</span>
                </div>
                <ul>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x361_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x361_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x361_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x181_01.jpg" alt="배너명">
                        </a>
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2001/2001_265x181_02.jpg" alt="배너명">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    
        <div class="Section SectionBg03 mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    경찰 BEST <span class="tx-color">교재</span>
                    <span class="tx16 NSK-Thin pt10 ml20">최고의 교수진으로 수험생의 합격을 돕겠습니다.</span>
                    <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                </div>
                <div class="bookContent NSK">
                    <ul class="bookList">
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span>                       
                                <div class="bookImg">                                
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311683_sm.jpg" title="교재명">
                                </div>
                                <div>
                                    <p>네친구 신광은 형사소송법(신정10판)</p>
                                    <p>[판매중] 10,800원 (10%)</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311691_sm.jpg" title="교재명">
                                </div>
                                <p>2021 경찰채용 1차대비 김원욱 형법 적중예상문제풀이</p>
                                <p>[판매중] 20,700원 (↓10%)</p>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311717_sm.jpg" title="교재명">
                                </div>                        
                                <p>2020 슬림한 친족 상속법의 맥</p>
                                <p>[판매중] 8,800원 (↓20%)</p>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311728_sm.jpg" title="교재명">
                                </div>                        
                                <p>2020 민사소송법과 부속법 조문집</p>
                                <p>[판매중] 8,800원 (↓20%)</p>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311719_sm.jpg" title="교재명">
                                </div>                        
                                <p>2020 원가관리회계 문제풀이</p>
                                <p>[품절] 20,700원 (↓10%)</p>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311683_sm.jpg" title="교재명">
                                </div>
                                <div>                            
                                    <p>2020 원가관리회계 문제풀이</p>
                                    <p>[판매중] 8,800원 (↓20%)</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none" onclick="openWin('InfoForm')">
                                <span></span> 
                                <div class="bookImg">
                                    <img src="https://static.willbes.net/public/images/promotion/main/2018/book_311691_sm.jpg" title="교재명">
                                </div>                        
                                <p>2021 법률저널 LEET 전국 봉투 모의고사 제4회 - 20.06.21 시행</p>
                                <p>[판매중] 20,700원 (↓10%)</p>
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn" id="imgBannerLeft3"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight3"><a href="none">다음</a></p>         
                </div>
            </div>
        </div>

        {{-- 교재보기 팝업 willbes-Layer-Box --}}
        <div id="InfoForm" class="willbes-Layer-Box">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm'),closeWin('bookPocketBox')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                교재상세정보
            </div>
            <div class="lecDetailWrap">
                <div class="tabBox">
                    <div class="tabLink book2">
                        <div class="bookWrap">
                            <div class="bookInfo">
                                <div class="bookImg">
                                    <img src="{{ img_url('sample/book.jpg') }}">
                                </div>
                                <div class="bookDetail p_re">
                                    <div class="bookBuy">
                                        <ul class="bookBuyBtns">
                                            <li class="btnCart"><a onclick="openWin('bookPocketBox')">장바구니</a>                                
                                            <li class="btnBuy"><a href="#none">바로결제</a></li>
                                        </ul>
                                        <div id="bookPocketBox" class="bookPocketBox">
                                            <a class="closeBtn" href="#none" onclick="closeWin('bookPocketBox')">
                                                <img src="{{ img_url('cart/close.png') }}">
                                            </a>
                                            해당 상품이 장바구니에 담겼습니다.<br/>
                                            장바구니로 이동하시겠습니까?
                                            <ul class="NSK mt20">
                                                <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('bookPocketBox')">닫기</a></li>
                                            </ul>
                                        </div>  
                                    </div>

                                    <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                    <div class="book-Author tx-gray">
                                        <ul>
                                            <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                            <li>저자 : 저자명 <span class="row-line">|</span></li>
                                            <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                            <li>판형/쪽수 : 190*260 / 769</li>
                                        </ul>
                                        <ul>
                                            <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                            <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong> <strong class="tx-light-blue">[판매중]</strong></li>
                                        </ul>
                                    </div>
                                    <div class="bookBoxWrap">
                                        <ul class="tabWrap tabDepth2">
                                            <li><a href="#info1" class="on">교재소개</a></li>
                                            <li><a href="#info2">교재목차</a></li>
                                        </ul>
                                        <div class="tabBox">
                                            <div id="info1" class="tabContent">
                                                <div class="book-TxtBox tx-gray">
                                                    2018년재신정판을내면서..<br/>
                                                    첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                    둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                    셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                    기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                </div>
                                                <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                            </div>
                                            <div id="info2" class="tabContent">
                                                <div class="book-TxtBox tx-gray">
                                                    제1편 현대 문법<br/>
                                                    제2편 고전 문법<br/>
                                                    제3편 국어 생활<br/>
                                                    제4편 현대 문학<br/>
                                                    제5편 고전 문학<br/>
                                                    제1편 현대 문법<br/>
                                                    제2편 고전 문법<br/>
                                                    제3편 국어 생활<br/>
                                                    제4편 현대 문학<br/>
                                                    제5편 고전 문학
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-Box -->

        <div class="Section Section6 mt80">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt30">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt50 mb50">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.onCollaborate_2001')
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>

    </div>
    <!-- End Container -->

    @if (date('YmdHi') <= '202009191159')
        {{--//유튜브 모달팝업--}}
        <style type="text/css">
            #Popup200916 {position:fixed; top:100px; left:50%; width:850px; height:482px; margin-left:-425px; display: block;}
        </style>
        <div id="Popup200916" class="PopupWrap modal willbes-Layer-popBox" style="display: none;">
            <div class="Layer-Cont" id="youtube_box">
                <iframe width="850" height="482" src="https://www.youtube.com/embed/_t7QIFe_Rh0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <ul class="btnWrapbt popbtn mt10">
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="1">하루 보지않기</a></li>
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="">Close</a></li>
            </ul>
        </div>
        <div id="PopupBackWrap" class="willbes-Layer-Black"></div>
        {{--유튜브 모달팝업//--}}
    @endif

    <script type="text/javascript">
        $(document).ready(function() {
            //하단이벤트배너 닫기
            $('.mainBottomBn .btmEvClose').click(function(){
                $('.mainBottomBn').hide();
            });
        });

        //유튜브 모달팝업 close 버튼 클릭
        var youtube_html;
        $(document).ready(function() {
            $('.PopupWrap').on('click', '.btn-popup-close', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');

                var popup_idx = $(this).data('popup-idx');
                var hide_days = $(this).data('popup-hide-days');

                // 팝업 close
                $(this).parents('.PopupWrap').fadeOut();

                //하루 보지않기
                if (hide_days !== '') {
                    var domains = location.hostname.split('.');
                    var domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

                    $.cookie('_wb_client_popup_' + popup_idx, 'done', {
                        domain: domain,
                        path: '/',
                        expires: hide_days
                    });
                }

                // 모달팝업창이 닫힐 경우 백그라운드 레이어 숨김 처리
                if ($(this).parents('.PopupWrap').hasClass('modal') === true) {
                    $('#PopupBackWrap').fadeOut();
                }
            });

            // 백그라운드 클릭 --}}
            $('#PopupBackWrap.willbes-Layer-Black').on('click', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');
                $('.PopupWrap.modal').fadeOut();
                $(this).fadeOut();
            });

            // 팝업 오늘하루안보기 하드코딩
            if($.cookie('_wb_client_popup_860') !== 'done') {
                $('#Popup').show();
                $('.PopupWrap').fadeIn();
                $('#PopupBackWrap').fadeIn();
            }
        });
    </script>

    <script type="text/javascript">  
        //상단배너
            $(function(){ 
            var slidesImg = $(".MaintabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:5000,
                sliderWidth:2000,
                auto : true,	
                autoHover: true,						
                pagerCustom: '#MainRollingDiv',
                controls:false, 				
                onSliderLoad: function(){
                    $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1}); 
                }
            });	
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });
        
            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });			
        }); 

        //최근 업로드 강좌 
        $(function() {
            $('.sliderNumV').bxSlider({
                mode: 'fade', 
                auto: true,
                touchEnabled: false,
                controls: false,
                pause: 3000,
                autoHover: true,
                pager:true,
                onSliderLoad: function(){
                    $(".vSlider").css("visibility", "visible").animate({opacity:1}); 
                }
            });
        });

        
        //경찰팀 TV
        $(function() {
            $('.tabTvBtns ul').each(function () {
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).css({visibility: 'hidden', height: '0', overflow: 'hidden'});
                });

                $(this).on('click', 'a', function (e) {
                    $active.removeClass('on');
                    $content.hide().css({visibility: 'hidden', height: '0', overflow: 'hidden'});

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('on');
                    $content.show().css({visibility: 'visible', height: 'auto', overflow: 'visible'});
                    e.preventDefault();
                });
            });
        });

        //교재
        $(function() {
            var slidesImg1 = $(".bookList").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:6,
                maxSlides:6,
                slideWidth: 186,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:true,
                touchEnabled: false,
            });
            $("#imgBannerLeft3").click(function (){
                slidesImg1.goToNextSlide();
            });
            $("#imgBannerRight3").click(function (){
                slidesImg1.goToPrevSlide();
            });        
        });
    </script>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
