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

        .sky {position:fixed;top:250px;right:0;z-index:1;}

        .evtTop00 {background:#404040}
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

        .wb_cts02 {background:#e8e8fe url(https://static.willbes.net/public/images/promotion/2020/04/1619_top_bg.jpg) no-repeat center;}
        .wb_cts03 {background:#fff; padding-bottom:100px}
        .wb_cts04 {background:#fff;}
        .wb_cts05 {background:#fff;}
        .wb_cts06 {background:#fff;}
    

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:40%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4 li img {width:100%}
        #slidesImg4:after {content::""; display:block; clear:both}   

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="#event1">
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1619_sky.jpg" alt="온라인 50%할인 바로가기">
                </a>
            </li>
            <li style="margin-top:10px;">
                <a href="#event2">
                    <img src="https://static.willbes.net/public/images/promotion/2020/04/1619_sky2.jpg" alt="소문내기 바로가기">
                </a>
            </li>
        </ul>

        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>

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
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1619_top.gif"  alt="한국사 전문가 오태진" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1619_03.jpg"  alt="한국사 전문가 오태진 슬라이드" />
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_03.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_04.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_05.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_06.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_07.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_08.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_09.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_left.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_right.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1619_04.jpg"  alt="300제 특강" />
        </div>

        <div class="evtCtnsBox wb_cts05" id="event1">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1619_05.jpg"  alt="온라인 할인 이벤트" usemap="#Map1619a" border="0" />
            <map name="Map1619a" id="Map1619a">
                <area shape="rect" coords="320,847,799,936" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164165" target="_blank" onfocus='this.blur()' />
            </map>           
        </div>

        <div class="evtCtnsBox wb_cts06" id="event2">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1619_06.jpg"  alt="출간기념 소문내기 이벤트" usemap="#Map1619abc" border="0" />
            <map name="Map1619abc" id="Map1619abc">
                <area shape="rect" coords="351,1000,771,1062" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="오태진 100점노트 이미지 다운받기" />
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif     
       
    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
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

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
            
        });

       /*디데이카운트다운*/
       $(document).ready(function() {
           dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop