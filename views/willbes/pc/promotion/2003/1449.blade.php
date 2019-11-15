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
            bottom:50px;
            right:10px;
            z-index:1;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/11/1449_top_bg.jpg) no-repeat center top; position:relative}
        .evtTop .leclist {position:absolute; top:754px; left:50%; width:380px; height:140px; margin-left:-190px; text-align:left; z-index:10}	
        .evtTop .leclist li {color:#ccc; font-size:16px; font-weight:bold; line-height:1.5}
        .evtTop .leclist li span {color:#87d2b5}
        .evt01 {background:#ac5b5a;}        
        .evt02 {background:#ebebeb;}
        .evt03 {background:#2b2f3a; text-align:center; position:relative}
        .evt03 .box-book {position:absolute; top:560px; left:0; width:100%; height:350px; z-index:10}
        .evt03 .box-book .bx-wrapper{max-width:100% !important;}
        .evt03 .box-book li {display:inline; float:left; height:350px;}
        .evt03 .box-book li img {
            -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1449_top.jpg" alt="윌비스 제로백 기출문제풀이" usemap="#Map1449A" border="0" />
            <map name="Map1449A" id="Map1449A">
                <area shape="rect" coords="355,918,764,990" href="https://pass.willbes.net/periodPackage/show/cate/3092/pack/648001/prod-code/155361" target="_blank" alt="제로백 무료 신청하기" />
            </map>
            <div class="leclist">
                <ul class="slidesLec">
                    <li>
                    → 2020 윌비스 제로백 <span>김헌 행정학</span> 이론<br>
                    → 2020 윌비스 제로백 <span>윤세훈 행정학</span> 이론<br>
                    → 2020 윌비스 제로백 <span>임재진 국어</span> 이론<br>
                    → 2020 윌비스 제로백 <span>박초롱 영어</span> 문법/독해<br>
                    → 2020 윌비스 제로백 <span>한경준 한국사</span> 이론<br>
                    </li>
                    <li>
                    → 2020 윌비스 제로백 <span>이석준 행정법총론</span> 이론<br>
                    → 2020 윌비스 제로백 <span>양승우 행정법총론</span> 이론<br>
                    → 2020 윌비스 제로백 <span>윤세훈 행정학</span> 기출문제풀이<br>
                    → 2020 윌비스 제로백 <span>김헌 행정학</span> 기출문제풀이<br>
                    → 2020 윌비스 제로백 <span>임재진 국어</span> 기출문제풀이<br>
                    </li>
                    <li>
                    → 2020 윌비스 제로백 <span>박초롱 영어</span> 기출문제풀이<br>
                    → 2020 윌비스 제로백 <span>양승우 행정법</span> 기출문제풀이<br>
                    → 2020 윌비스 제로백 <span>이석준 행정법</span> 기출문제풀이<br>
                    → 2020 윌비스 제로백 <span>한경준 한국사</span> 기출문제풀이<br>
                    </li>
                </ul>
            </div>                         
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1449_01.jpg" alt="기출문제풀이, 왜 중요한 걸까요?"  />          
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1449_02.jpg" alt="제로백 교수진"/>                    
        </div>

        <div class="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03.jpg" alt="교재 및 커리큘럼" usemap="#Map1449B" id="go" border="0"/>
            <map name="Map1449B" id="Map1449B">
                <area shape="rect" coords="364,385,754,472" href="https://pass.willbes.net/book/index/cate/3092" target="_blank" alt="교재구매하기" />
            </map>
            <div class="box-book">
                <ul class="slidesBook">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book01.jpg" alt="국어"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book02.jpg" alt="영어"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book03.jpg" alt="한국사"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book04.jpg" alt="행정학"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book05.jpg" alt="행정법총론"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book01.jpg" alt="국어"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book02.jpg" alt="영어"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book03.jpg" alt="한국사"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book04.jpg" alt="행정학"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book05.jpg" alt="행정법총론"/></li>
                </ul>
            </div>            
        </div>
    </div>
    <!-- End Container -->  
    
    <script type="text/javascript">  
        $(document).ready(function() {
            var slides = $(".slidesLec").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                autoHover: true,
                pager:false,
            });

            var BxBook = $('.slidesBook').bxSlider({
                slideWidth: 204,
                slideMargin: 34,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });
    </script>
@stop