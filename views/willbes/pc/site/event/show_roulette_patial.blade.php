{{--Roulette 스크립트--}}
<script src="/public/js/willbes/javascript-winwheel-2.8.0/Winwheel.min.js"></script>
<script src="/public/js/willbes/javascript-winwheel-2.8.0/TweenMax.min.js"></script>

<button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;">Spin the Wheel</button>
<button id="btn_roulette_reset" class="btn-roulette-reset" onclick="theWheel.stopAnimation(false); theWheel.rotationAngle=0; theWheel.draw(); resetRoulette(); btn_roulette.disabled=false;">Reset</button>

<script type="text/javascript">
    let theWheel = new Winwheel();

    setTimeout(function () {
        rouletteData();
    },500);

    //룰렛 상품 조회
    function rouletteData()
    {
        var param = '{{ (empty($arr_promotion_params['roulette_code']) === false) ? $arr_promotion_params['roulette_code'] : '' }}';
        var _url = '{{ front_url('/roulette/info/') }}' + param;
        var _data = {};
        sendAjax(_url, _data, function (ret) {
            setRoulette(ret.data.other_list);
        }, showError, false, 'GET');
    }

    //룰렛 셋팅
    function setRoulette(data)
    {
        theWheel = new Winwheel({
            'numSegments' : data.length,
            'outerRadius' : 170,
            'canvasId'    : 'roulette',
            'drawText'    : true,             // Code drawn text can be used with segment images.
            'drawMode'    : 'segmentImage',    // Must be segmentImage to draw wheel using one image per segemnt.
            'segments'    : data,
            'animation' :
                {
                    'type'          : 'spinToStop',
                    'duration'      : 5,
                    'spins'         : 8,
                    'callbackAfter' : ''
                },
        });
    }

    //룰렛 시작
    function startRoulette()
    {
        var _url = '{{ front_url('/roulette/store/'.$arr_promotion_params['roulette_code']) }}';
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

    //룰렛 리셋
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