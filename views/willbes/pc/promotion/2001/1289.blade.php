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
            background:#f5f5f5 url(https://static.willbes.net/public/images/promotion/2019/06/1289_bg.jpg) no-repeat center top;
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
        .wb_02 {background:#f5f5f5}
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

    <form id="rouletteForm">
        <input type="hidden" id="temp_roulette_starting" name="temp_roulette_starting" value="0">
        <input type="hidden" id="temp_prod_num" name="temp_prod_num">
    </form>
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
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_top.jpg" alt="실전 문제풀이 패키지"/>
            <div class="rulletBox">
                <canvas id="roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2019/06/1289_rull_start.png" alt="starg" /></button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_01.png" alt="회원가입 합격 룰렛 이벤트" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_02.png" alt="회원가입" usemap="#Map1289A" border="0" />
            <map name="Map1289A" id="Map1289A">
                <area shape="rect" coords="304,978,815,1058" href="https://www.willbes.net/member/join/?ismobile=0&amp;sitecode=2000" target="_blank" alt="회원가입" />
                <area shape="rect" coords="123,1827,236,1872" href="https://police.willbes.net/home/index/cate/3001" target="_blank" alt="신광은경찰" />
                <area shape="rect" coords="378,1827,490,1872" href="https://police.willbes.net/home/index/cate/3002" target="_blank" alt="경행경채" />
                <area shape="rect" coords="630,1827,743,1872" href="https://police.willbes.net/home/index/cate/3006" target="_blank" alt="경찰승진" />
                <area shape="rect" coords="882,1827,996,1872" href="https://police.willbes.net/home/index/cate/3006" target="_blank" alt="해양경찰" />
            </map>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_03.png"  alt="소문내기 이벤트" usemap="#Map1289B" border="0"/>
            <map name="Map1289B" id="Map1289B">
                <area shape="rect" coords="337,998,782,1067" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="소문내기 이미지 다운로드" />
            </map>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_04.png"  alt="유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/javascript-winwheel-2.8.0/Winwheel.min.js"></script>
    <script src="/public/js/willbes/javascript-winwheel-2.8.0/TweenMax.min.js"></script>
    <script>
        setTimeout(function () {
            rouletteData();
        },500);

        //룰렛 상품 조회
        function rouletteData() {
            var param = '{{ (empty($arr_promotion_params['roulette_code']) === true) ? '' : $arr_promotion_params['roulette_code'] }}';
            var _url = '{{ front_url('/roulette/info/') }}' + param;
            var _data = {};
            sendAjax(_url, _data, function (ret) {
                setRoulette(ret.data.other_list);
            }, showError, false, 'GET');
        }

        //룰렛 셋팅
        function setRoulette(data) {
            theWheel = new Winwheel({
                'numSegments' : data.length,
                'outerRadius' : 170,
                'canvasId'    : 'roulette',
                'drawText'    : false,          // Code drawn text can be used with segment images.
                'drawMode'    : 'segmentImage', // Must be segmentImage to draw wheel using one image per segemnt.
                'segments'    : data,
                'animation' :
                    {
                        'type'          : 'spinToStop',
                        'duration'      : 5,
                        'spins'         : 8,
                        'callbackAfter' : '',
                        'callbackFinished' : function () {
                            $("#giftPopupWrap").css("display","block");
                            $("#temp_roulette_starting").val('1');
                            $("#gift_box_id").html('<img src="https://static.willbes.net/public/images/promotion/2019/06/1289_rull_giftbox0'+$("#temp_prod_num").val()+'.png" alt="당첨상품"/>');
                        }
                    },
            });
        }

        function startRoulette() {
            var roulette_code = '{{ (empty($arr_promotion_params['roulette_code']) === true) ? '' : $arr_promotion_params['roulette_code'] }}';
            var _url = '{{ front_url('/roulette/store/') }}' + roulette_code;
            var _data = {};
            $('.btn-roulette > img').css('-webkit-filter','invert(0.4)');

            sendAjax(_url, _data, function(ret) {
                if (ret.ret_cd) {
                    let segmentNumber = ret.ret_data;   // The segment number should be in response.
                    if (segmentNumber) {
                        $("#temp_prod_num").val(segmentNumber);
                        let stopAt = theWheel.getRandomForSegment(segmentNumber);
                        // Important thing is to set the stopAngle of the animation before stating the spin.
                        theWheel.animation.stopAngle = stopAt;
                        // Start the spin animation here.
                        theWheel.startAnimation();
                    }
                }
            }, function (ret) {
                var err_msg = ret.ret_msg || '';
                if (err_msg === '') {
                    if (ret.status === 401) {  //권한 없음 || 미로그인
                        err_msg = '권한이 없습니다.';
                    } else if (ret.status === 403) {
                        err_msg = '토큰 정보가 올바르지 않습니다.';
                    } else if (ret.status === 404) {
                        err_msg = '데이터 조회에 실패했습니다.';
                    } else if (ret.status === 422) {
                        err_msg = '필수 파라미터 오류입니다.';
                    }
                }
                alert(err_msg);
                $("#temp_roulette_starting").val('1');
            }, false, 'GET');
        }

        function resetRoulette() {
            if ($("#rouletteForm").find('input[name="temp_roulette_starting"]').val() != '1') {
                return false;
            }
            $("#temp_roulette_starting").val('0');
            theWheel.stopAnimation(false); theWheel.rotationAngle=0; theWheel.draw();
            $("#btn_roulette").attr2("disabled",false);

            $('.btn-roulette > img').css('-webkit-filter','');
            let ctx2 = theWheel.ctx;
            ctx2.beginPath();              // Begin path.
            ctx2.moveTo(170, 5);           // Move to initial position.
            ctx2.lineTo(230, 5);           // Draw lines to make the shape.
            ctx2.lineTo(200, 40);
            ctx2.lineTo(171, 5);
        }
</script>

@stop