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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff url(https://static.willbes.net/public/images/promotion/2020/06/1698_top_bg.jpg) no-repeat center top;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}

        /************************************************************/

        .wb_top {position:relative}
        .rulletBox {position:absolute; top:670px; width:786px; left:50%; margin-left:-393px; z-index:5}
        .rulletBox .btn-roulette {position:absolute; top:280px; width:255px; 
            height:255px; left:50%; padding:0; margin:0; margin-left:-127px; background:none; z-index:6}
        .rulletBox a {position:absolute; top:650px; left:650px; width:80px; height:80px; line-height:60px; color:#000; background:#fff; 
            border-radius:40px;
            border:10px solid #000; z-index:6}
            .rulletBox a:hover {background:#5a14d6; color:#fff}
        .wb_01 {width:1120px; margin}
        .wb_02 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1698_04_bg.jpg) no-repeat center top;}
        .wb_03 {background:#555}

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
        .giftPop {width:786px; margin:100px auto 0; position:relative}
        .giftPop span {display:block; position:absolute; top:343px; width:100%; text-align:center; z-index:10}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="giftPopupWrap" id="giftPopupWrap" style="display:none;">
            <div class="giftPop">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1698_rull_popup.png" alt="당첨팝업" usemap="#Map1698pop" border="0"/>
                <map name="Map1698pop" id="Map1698pop">
                    <area shape="rect" coords="637,85,715,163" href="#none" onClick="closeWin('giftPopupWrap')" alt="닫기" />
                </map>
                {{-- 상품이미지 01 ~ 08 --}}
                <span id="gift_box_id"></span>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1698_top.jpg" alt="룰렛 이벤트"/>
            <div class="rulletBox">
                <canvas id="box_roulette" class="tutCanvas" width="786" height="786">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2020/06/1698_rull_start.png" alt="start" /></button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1698_01.jpg" alt="룰렛 이벤트" usemap="#Map1698A" border="0" />
            <map name="Map1698A">
                <area shape="rect" coords="254,639,368,680" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2014" target="_blank" alt="신규가입">
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1698_02.jpg" alt="룰렛 이벤트" />
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1698_03.jpg" alt="룰렛 이벤트 소문내기" usemap="#Map1698B" border="0"/>
            <map name="Map1698B">
                <area shape="rect" coords="430,855,493,919" href="https://www.instagram.com/" target="_blank" alt="인스타">
                <area shape="rect" coords="525,855,590,920" href="https://www.facebook.com/" target="_blank" alt="페이스북">
                <area shape="rect" coords="623,856,688,919" href="https://section.blog.naver.com/BlogHome.nhn" target="_blank" alt="블로그">
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1698_04.jpg" alt="사전예약" usemap="#Map1698C" border="0" />
            <map name="Map1698C">
                <area shape="rect" coords="547,1393,824,1458" href="https://njob.willbes.net/promotion/index/cate/3114/code/1664" target="_blank" alt="사전예약">
            </map>
        </div>        

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1698_last.jpg"  alt="유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.roulette_script')
@stop