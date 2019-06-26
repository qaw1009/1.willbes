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
            border:10px solid #810000; z-index:6 }
        .wb_01 {}
        .wb_02 {background:#f5f5f5}
        .wb_03 {background:#fff}
        .wb_04 {background:#fff}


        .giftPopupWrap {
            position:absolute; 
            display: none;
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
        .giftPop {width:728px; margin:150px auto 0}
    </style>

    {{--
    TODO : Roulette TEST 페이지
    --}}
    @php
        $data = [
            '0' => [
                'text' => '메가박스',
                'image' => 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift01.png'
            ],
            '1' => [
                'text' => '굽네치킨',
                'image' => 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift02.png'
            ],
            '2' => [
                'text' => '단과10%',
                'image' => 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift03.png'
            ],
            '3' => [
                'text' => '강좌포인트1000점',
                'image' => 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift04.png'
            ],
            '4' => [
                'text' => '교재무료배송쿠폰',
                'image' => 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift05.png'
            ],
            '5' => [
                'text' => '강좌포인트10000점',
                'image' => 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift06.png'
            ],
            '6' => [
                'text' => '스타벅스',
                'image' => 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift07.png'
            ],
            '7' => [
                'text' => '빕스',
                'image' => 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift08.png'
            ]
        ];
    @endphp


    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="giftPopupWrap">
            <div class="giftPop">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_rull_popup.png" alt="당첨팝업" usemap="#Map1289pop" border="0"/>
            <map name="Map1289pop" id="Map1289pop">
                <area shape="rect" coords="374,482,416,528" href="#none" alt="닫기" />
            </map>
            </div>
        </div>
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_top.jpg" alt="실전 문제풀이 패키지"/>
            <div class="rulletBox">
                <canvas id="roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2019/06/1289_rull_start.png" alt="starg" /></button>
                <a href="javascript:void(0);" onclick="theWheel.stopAnimation(false); theWheel.rotationAngle=0; theWheel.draw(); resetRoulette(); btn_roulette.disabled=false;">Reset</a>                        
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_01.png" alt="문제풀이과정 커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_02.png" alt="교수진" />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_03.png"  alt="이벤트"/>
        </div>
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1289_04.png"  alt="유의사항"/>
        </div>
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/javascript-winwheel-2.8.0/Winwheel.min.js"></script>
    <script src="/public/js/willbes/javascript-winwheel-2.8.0/TweenMax.min.js"></script>
    <script>
    let theWheel = new Winwheel({
        'numSegments': 8,
        'outerRadius': 170,
        'canvasId': 'roulette',
        'drawText': false,             // Code drawn text can be used with segment images.
        'drawMode': 'segmentImage',    // Must be segmentImage to draw wheel using one image per segemnt.
        /*'segments'    :
            [
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift01.png', '메가박스' : '1'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift02.png', '굽네치킨' : '2'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift03.png', '단과10%할인쿠폰' : '3'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift04.png', '1000점' : '4'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift05.png', '무료배송쿠폰' : '5'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift06.png', '10000점' : '6'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift07.png', '스타벅스' : '7'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/06/1289_rull_gift08.png', '빕스' : '8'}
            ],*/
        'segments': {!! json_encode($data) !!},
        'animation':
            {
                'type': 'spinToStop',
                'duration': 5,
                'spins': 8,
                'callbackAfter': ''
            },
    });

    function startRoulette()
    {
        console.log(theWheel);
        var _url = '/common/testProbability/send_test';
        var _data = {};
        sendAjax(_url, _data, function(ret) {
            if (ret.ret_cd) {
                let segmentNumber = ret.ret_data;   // The segment number should be in response.
                if (segmentNumber) {
                    let stopAt = theWheel.getRandomForSegment(segmentNumber);
                    // Important thing is to set the stopAngle of the animation before stating the spin.
                    theWheel.animation.stopAngle = stopAt;
                    // Start the spin animation here.
                    theWheel.startAnimation();
                }
            }
        }, showAlertError, false, 'GET');
    }

    function resetRoulette()
    {
        let ctx2 = theWheel.ctx;
        ctx2.beginPath();              // Begin path.
        ctx2.moveTo(170, 5);           // Move to initial position.
        ctx2.lineTo(230, 5);           // Draw lines to make the shape.
        ctx2.lineTo(200, 40);
        ctx2.lineTo(171, 5);
    }
</script>

@stop