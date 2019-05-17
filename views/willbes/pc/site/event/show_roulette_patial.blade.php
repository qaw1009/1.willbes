{{--
TODO : Roulette 프론트
       개발 미비 사항 : AJAX 호출 후 글로벌 변수에 적용 기능 미비
--}}
<script src="/public/js/willbes/javascript-winwheel-2.8.0/Winwheel.min.js"></script>
<script src="/public/js/willbes/javascript-winwheel-2.8.0/TweenMax.min.js"></script>

<script type="text/javascript">
    /*$(document).ready(function() {
        @if(isset($arr_promotion_params['roulette_code']) === true)
            setTimeout(function () {
                rouletteData();
            }, 500);
        @endif
    });

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

    function setRoulette(data)
    {
        let theWheel = new Winwheel({
            'numSegments' : 8,
            'outerRadius' : 170,
            'canvasId'    : 'roulette',
            'drawText'    : false,             // Code drawn text can be used with segment images.
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
    }*/


    @if(isset($arr_promotion_params['roulette_code']) === true)
        setTimeout(function () {
            var param = '{{ (empty($arr_promotion_params['roulette_code']) === false) ? $arr_promotion_params['roulette_code'] : '' }}';
            var _url = '{{ front_url('/roulette/info/') }}' + param;
            var _data = {};
            sendAjax(_url, _data, function (ret) {
                let theWheel = new Winwheel({
                    'numSegments' : 8,
                    'outerRadius' : 170,
                    'canvasId'    : 'roulette',
                    'drawText'    : false,             // Code drawn text can be used with segment images.
                    'drawMode'    : 'segmentImage',    // Must be segmentImage to draw wheel using one image per segemnt.
                    /*'segments'    : ret.data.other_list,*/
                    'segments'    : {!! json_encode($data) !!},
                    'animation' :
                        {
                            'type'          : 'spinToStop',
                            'duration'      : 5,
                            'spins'         : 8,
                            'callbackAfter' : ''
                        },
                });
            }, showError, false, 'GET');
        }, 500);
    @endif

    /*let theWheel = new Winwheel({
            'numSegments' : 8,
            'outerRadius' : 170,
            'canvasId'    : 'roulette',
            'drawText'    : false,             // Code drawn text can be used with segment images.
            'drawMode'    : 'segmentImage',    // Must be segmentImage to draw wheel using one image per segemnt.
            'segments'    : {!! json_encode($data) !!},
            'animation' :
                {
                    'type'          : 'spinToStop',
                    'duration'      : 5,
                    'spins'         : 8,
                    'callbackAfter' : ''
                },
        });*/


    function startRoulette()
    {
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