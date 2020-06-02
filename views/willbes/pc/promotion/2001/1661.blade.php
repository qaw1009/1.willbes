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

        .sky {position:fixed;top:225px;right:0;z-index:1;}

        .evtTop00 {background:#404040}

        .wb_top {background:#0055b8;}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#eee; width:100%; padding:10px 0 35px}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%;}
        .newTopDday ul li:first-child span {font-size:16px; color:#666;margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%;line-height:60px;}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .wb_evt01,.wb_evt02 {background:#2b3541}
   
        .wb_evt04 {background:#f5f5f5}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="#inform">
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1661_sky.png" alt="">
                </a>
            </li>
        </ul>

        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>회원가입 EVENT</span><br />
                        <span style="line-height:40px;font-size:25px;color:#000;font-wieght:bold;">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 까지</span>
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
                        <span>남았습니다.</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1661_top.jpg"  alt="윌비스 광은팩" usemap="#Map1661a" border="0" />
            <map name="Map1661a" id="Map1661a">
                <area shape="rect" coords="291,1383,830,1504" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1661_01.jpg"  alt="아주 특별한 혜택" />
        </div>

        <div class="evtCtnsBox wb_evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1661_02.jpg"  alt="쿠폰" usemap="#Map1661b" border="0">
            <map name="Map1661b" id="Map1661b">
                <area shape="rect" coords="287,1766,830,1886" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_evt03" id="inform">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1661_03.jpg"  alt="소문내기 이벤트" usemap="#Map1661c" border="0" />
            <map name="Map1661c" id="Map1661c">
                <area shape="rect" coords="350,1134,805,1205" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" />
            </map> 
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif
        </div>       

        <div class="evtCtnsBox wb_evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1661_04.jpg"  alt="자세히 보기" usemap="#Map1661d" border="0" />
            <map name="Map1661d" id="Map1661d">
                <area shape="rect" coords="183,487,288,542" href="https://police.willbes.net/promotion/index/cate/3001/code/1009" target="_blank" />
                <area shape="rect" coords="508,487,613,545" href="https://police.willbes.net/promotion/index/cate/3001/code/1015" target="_blank" />
                <area shape="rect" coords="833,487,939,544" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/164897" target="_blank" />
            </map>
        </div> 

    </div>
    <!-- End Container -->

    <script language="javascript">
    
       /*디데이카운트다운*/
       $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
                dDayCountDown('{{$arr_promotion_params['edate']}}');
            @endif
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop