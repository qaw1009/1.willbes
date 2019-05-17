@extends('lcms.layouts.master')

@section('content')

@php
    $data = [
        '0' => [
            'text' => 'GS편의점 2000원 권',
            'image' => 'https://static.willbes.net/public/images/promotion/2019/05/1.png'
        ],
        '1' => [
            'text' => '스타벅스 아.아',
            'image' => 'https://static.willbes.net/public/images/promotion/2019/05/2.png'
        ],
        '2' => [
            'text' => '영화상품권(1인1매)',
            'image' => 'https://static.willbes.net/public/images/promotion/2019/05/3.png'
        ],
        '3' => [
            'text' => '10,000상품권(신세계)',
            'image' => 'https://static.willbes.net/public/images/promotion/2019/05/4.png'
        ],
        '4' => [
            'text' => 'GS편의점 2000원 권',
            'image' => 'https://static.willbes.net/public/images/promotion/2019/05/1.png'
        ],
        '5' => [
            'text' => '스타벅스 아.아',
            'image' => 'https://static.willbes.net/public/images/promotion/2019/05/2.png'
        ],
        '6' => [
            'text' => '영화상품권(1인1매)',
            'image' => 'https://static.willbes.net/public/images/promotion/2019/05/3.png'
        ],
        '7' => [
            'text' => '10,000상품권(신세계)',
            'image' => 'https://static.willbes.net/public/images/promotion/2019/05/4.png'
        ]
    ];
@endphp

<script src="/public/js/willbes/javascript-winwheel-2.8.0/Winwheel.min.js"></script>
<script src="/public/js/willbes/javascript-winwheel-2.8.0/TweenMax.min.js"></script>

<table width="100%">
    <tbody><tr>
        <td><canvas id="roulette" class="tutCanvas" width="400" height="400">Canvas not supported</canvas></td>
        <td width="50%">
            <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;">Spin the Wheel</button>
            &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="theWheel.stopAnimation(false); theWheel.rotationAngle=0; theWheel.draw(); resetRoulette(); btn_roulette.disabled=false;">Reset</a>
        </td>
    </tr>
    </tbody>
</table>

<script>
    let theWheel = new Winwheel({
        'numSegments' : 8,
        'outerRadius' : 170,
        'canvasId'    : 'roulette',
        'drawText'    : false,             // Code drawn text can be used with segment images.
        'drawMode'    : 'segmentImage',    // Must be segmentImage to draw wheel using one image per segemnt.
        /*'segments'    :
            [
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/05/1.png', 'text' : '1'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/05/2.png', 'text' : '2'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/05/3.png', 'text' : '3'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/05/4.png', 'text' : '4'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/05/5.png', 'text' : '5'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/05/6.png', 'text' : '6'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/05/7.png', 'text' : '7'},
                {'image' : 'https://static.willbes.net/public/images/promotion/2019/05/8.png', 'text' : '8'}
            ],*/
        'segments' : {!! json_encode($data) !!},
        'animation' :
            {
                'type'          : 'spinToStop',
                'duration'      : 5,
                'spins'         : 8,
                'callbackAfter' : ''
            },
    });

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
@stop