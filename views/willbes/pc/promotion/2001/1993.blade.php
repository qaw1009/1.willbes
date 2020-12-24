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
            background:#fff url(https://static.willbes.net/public/images/promotion/2020/12/1993_top_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:120px; right:10px;z-index:1;}        
        .skybanner a {display:block; margin-bottom:5px}        
 
        .wb_top {position:relative; overflow:hidden}
        .rulletBox {position:absolute; top:2015px; width:786px; left:50%; margin-left:-393px; z-index:5}
        .rulletBox .tutCanvas {border:5px solid #000; width:786px; border-radius:393px; background:#fff; box-shadow:inset 0 0 20px rgba(0,0,0,0.5);}
        .rulletBox .btn-roulette {position:absolute; top:302px; width:182px; 
            height:182px; left:50%; padding:0; margin:0; margin-left:-81px; background:none; z-index:6}
        .rulletBox a {position:absolute; top:600px; left:650px; width:80px; height:80px; line-height:60px; color:#fff; background:#ff6600; font-size:15px;
            border-radius:40px; border:10px solid #000; z-index:20}
        .rulletBox a:hover {background:#a16136; color:#fff}
        .rulletBox span {position:absolute; top:-46px; left:50%; width:91px; margin-left:-41px; z-index:20}

        .giftPopupWrap {
            position:absolute; 
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
        .giftPop {width:786px; margin:80px auto 0; position:relative}
        .giftPop span {display:block; position:absolute; top:343px; width:100%; text-align:center; z-index:10}

        .wb_01 {width:1120px; margin}
        .wb_02 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/12/1993_02_bg.jpg) repeat-x center top; margin-top:100px}

        /* 이용안내 */
        .wb_info {padding:100px 0; background:#555; color:#fff}
        .guide_box{width:980px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px; }
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#fff; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:13px;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">
            <a href="#box_roulette"><img src="https://static.willbes.net/public/images/promotion/2020/12/1993_sky01.png" alt="룰렛 이벤트"/></a>
            <a href="#wb_01"><img src="https://static.willbes.net/public/images/promotion/2020/12/1993_sky02.png" alt="룰렛 이벤트"/></a>
            <a href="#wb_02"><img src="https://static.willbes.net/public/images/promotion/2020/12/1993_sky03.png" alt="룰렛 이벤트"/></a>
        </div>

        {{--당첨상품 팝업--}}
        <div class="giftPopupWrap" id="giftPopupWrap" style="display:none;">
            <div class="giftPop">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1993_rull_popup.png" alt="당첨팝업" usemap="#Map1993pop" border="0"/>
                <map name="Map1993pop">
                    <area shape="rect" coords="638,83,716,161" href="#none" onClick="closeWin('giftPopupWrap')" alt="닫기" />
                </map>
                {{-- 상품이미지 01 ~ 08 --}}
                <span id="gift_box_id"></span>
            </div>            
        </div>        

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1993_top_01.gif" alt="룰렛 이벤트"/><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1993_top_02.jpg" alt="룰렛 이벤트"/>
            <div class="rulletBox">
                <canvas id="box_roulette" class="tutCanvas" width="786" height="786">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette('https://static.willbes.net/public/images/promotion/2020/12/1951_rull_gift0','png'); this.disabled=true;">
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1993_rull_start.png" alt="start" />
                </button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" class="NSK-Black">RESET</a>
                <span><img src="https://static.willbes.net/public/images/promotion/2020/12/1993_rull_arrow.png" alt="화살표"></span>
            </div>

        </div>

        <div class="evtCtnsBox wb_01" id="wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1993_01.jpg" alt="룰렛 이벤트"/>
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox wb_02" id="wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1993_02_01.gif" alt="온라인 관리반 체험단" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1993_02_02.jpg" alt="온라인 관리반 체험단" usemap="#Map1993A" border="0" />
            <map name="Map1993A" id="Map1993A">
                <area shape="rect" coords="362,484,757,567" href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="다운로드" />
            </map>
        </div>
    </div>
    <!-- End Container -->
    @include('willbes.pc.promotion.roulette_script')
    
@stop