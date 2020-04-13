@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .sky {position:fixed;top:200px;right:0;z-index:1;}

        /*타이머*/
        .time {width:100%; text-align:center; background:#E4E4FE;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#000; font-size:28px;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}

        .wb_cts02 {background:#e6e5e0 url(https://static.willbes.net/public/images/promotion/2020/02/1559_top_bg.jpg) no-repeat top;}
        .wb_cts03 {background:#fff; padding-bottom:100px}
        .wb_cts04 {background:#dedede;}
        .wb_cts04s {background:#ededed;}
        .wb_cts05 {background:#7dc677;}
        .wb_cts06 {background:#fff;}
        .wb_cts07 {background:#fff;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:916px; margin:0 auto}
        .slide_con p {position:absolute; top:40%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="https://pass.willbes.net/book/index/cate/3019?cate_code=3019&subject_idx=1109&prof_idx=50027" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1559_sky.png" alt="오태진 한국사 100점 노트 구매하기">
                </a>
            </li>        
            <li>
                <a href="#event1">
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1401_sky1.jpg" alt="온라인 50%할인 바로가기">
                </a>
            </li>
            <li style="margin-top:10px;">
                <a href="#event2">
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1401_sky2.jpg" alt="소문내기 바로가기">
                </a>
            </li>
        </ul>

        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>오태진 한국사<br>이벤트 마감까지</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}까지!</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1559_top.jpg"  alt="한국사 전문가 오태진" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1559_img01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1559_img02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1559_img03.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/02/1559_img04.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/02/1401_left.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/02/1401_right.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1552_04.jpg"  alt="한국사 100점 노트" />
        </div>

        <div class="evtCtnsBox wb_cts04s" id="event1">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1552_05.jpg"  alt="온라인 반값 이벤트" usemap="#Map1552c" border="0" />
            <map name="Map1552c" id="Map1552c">
                <area shape="rect" coords="318,1035,801,1120" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161932" target="_blank" onfocus='this.blur()' />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1559_01.jpg"  alt="한국사 고득점 완성" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1559_01_02.jpg"  alt="강의신청" usemap="#Map1606a" border="0" />
            <map name="Map1606a" id="Map1606a">
                <area shape="rect" coords="856,377,996,416" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156592" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="855,456,996,497" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162556" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="855,535,997,576" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/161932" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="857,639,997,679" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157745" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="858,718,996,758" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162557" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="858,799,999,841" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157748" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="858,898,997,936" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162558" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="854,975,998,1017" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/162559" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="853,1057,996,1097" href="#none" onClick="{alert('Coming soon!')}" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts06" id="event2">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1552_08.jpg"  alt="소문내기 이벤트" usemap="#Map1606b" border="0" />
            <map name="Map1606b" id="Map1606b">
                <area shape="rect" coords="334,1083,770,1143" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="오태진 100점노트 이미지 다운받기" />
            </map>
        </div>   

        <div class="evtCtnsBox wb_cts07">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1606_sns.jpg" usemap="#Map1606c" border="0" />
            <map name="Map1606c" id="Map1606c">
                <area shape="rect" coords="176,27,351,109" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="385,27,541,110" href="http://cafe.daum.net/9glade" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="576,25,741,109" href="https://cafe.naver.com/gugrade" target="_blank" onfocus='this.blur()' />
                <area shape="rect" coords="777,24,937,109" href="https://cafe.naver.com/willbes" target="_blank" onfocus='this.blur()' />
            </map>            
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
            
        });

    /*디데이카운트다운*/
       $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop