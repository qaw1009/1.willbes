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
            background:#f5f5f5 url(https://static.willbes.net/public/images/promotion/2019/07/1288_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {position:relative}
        .rulletBox {position:absolute; top:649px; width:810px; left:50%; margin-left:-410px; z-index:5}
        .rulletBox .btn-roulette {position:absolute; top:280px; width:255px; height:255px; left:50%; padding:0; margin:0; margin-left:-127px; background:none; z-index:6}
        .rulletBox a {position:absolute; top:670px; left:670px; width:80px; height:80px; line-height:60px; color:#810000; background:#fff; border-radius:40px;
            border:10px solid #810000; z-index:6}
            .rulletBox a:hover {background:#810000; color:#fff}
        .wb_01 {}
        .wb_02 {background:#f5f5f5; padding-bottom:120px}
        .wb_02 ul {width:960px; margin:0 auto}
        .wb_02 li {display:inline; float:left; margin-right:20px; margin-bottom:20px}
        .wb_02 li a img.off {display:block}
        .wb_02 li a img.on {display:none}
        .wb_02 li a:hover img.off {display:none}
        .wb_02 li a:hover img.on {display:block}
        .wb_02 ul:after {content:""; display:block; clear:both}
        .wb_03 {background:#fff}
        .wb_04 {background:#fff; padding:100px 0}


        .giftPopupWrap {
            position:absolute; 
            /*display: none;*/
            background: rgba(0, 0, 0, 0.6);
            filter: alpha(opacity=60);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;            
            width: 100%;
            height: 100%;  
            z-index: 105;        
        }
        .giftPop {width:728px; margin:150px auto 0; position:relative}
        .giftPop span {display:block; position:absolute; top:245px; width:100%; text-align:center; z-index:10}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="giftPopupWrap" id="giftPopupWrap" style="display: none;">
            <div class="giftPop">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_rull_popup.png" alt="당첨팝업" usemap="#Map1289pop" border="0"/>
                <map name="Map1289pop" id="Map1289pop">
                    <area shape="rect" coords="341,484,387,527" href="#none" onclick="closeWin('giftPopupWrap')" alt="닫기" />
                </map>
                {{-- 상품이미지 01 ~ 08 --}}
                <span id="gift_box_id"></span>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_top.jpg" alt="실전 문제풀이 패키지"/>
            <div class="rulletBox">
                <canvas id="box_roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2019/06/1289_rull_start.png" alt="starg" /></button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_01.png" alt="회원가입 합격 룰렛 이벤트" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02.png" alt="회원가입" usemap="#Map1288A" border="0" />
            <map name="Map1288A" id="Map1288A">
                <area shape="rect" coords="304,978,815,1058" href="https://www.willbes.net/member/join/?ismobile=0&amp;sitecode=2000" target="_blank" alt="회원가입" />
            </map>
            <ul>
                <li>
                    <a href="https://pass.willbes.net/home/index/cate/3019" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c1.jpg" alt="윌비스 T-PASS" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c1_on.jpg" alt="윌비스 T-PASS" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="https://pass.willbes.net/home/index/cate/3020" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c2.jpg" alt="7급 외무영사직" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c2_on.jpg" alt="7급 외무영사직" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="https://pass.willbes.net/home/index/cate/3035" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c3.jpg" alt="김동진 법원팀" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c3_on.jpg" alt="김동진 법원팀" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="https://pass.willbes.net/home/index/cate/3023" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c4.jpg" alt="윌비스 소방 PASS" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c4_on.jpg" alt="윌비스 소방 PASS" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="https://pass.willbes.net/home/index/cate/3028" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c5.jpg" alt="윌비스 기술직" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c5_on.jpg" alt="윌비스 기술직" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="https://pass.willbes.net/home/index/cate/3024 " target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c6.jpg" alt="윌비스 군무원 PASS" class="off"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_02_c6_on.jpg" alt="윌비스 군무원 PASS" class="on"/>
                    </a>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_03.png"  alt="소문내기 이벤트" usemap="#Map1288B" border="0"/>
            <map name="Map1288B" id="Map1288B">
                <area shape="rect" coords="337,998,782,1067" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="소문내기 이미지 다운로드" />
            </map>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
        </div>
        

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1288_04.png"  alt="유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.roulette_script')
@stop