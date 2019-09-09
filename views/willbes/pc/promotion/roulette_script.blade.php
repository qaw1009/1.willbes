<form id="rouletteForm">
    <input type="hidden" id="temp_roulette_starting" name="temp_roulette_starting" value="0">
    <input type="hidden" id="temp_prod_num" name="temp_prod_num">
</form>

<script src="/public/js/willbes/javascript-winwheel-2.8.0/Winwheel.min.js"></script>
<script src="/public/js/willbes/javascript-winwheel-2.8.0/TweenMax.min.js"></script>
<script>
    var ret_prod_img = '';

    $(document).ready(function() {
        setTimeout(function () {
            rouletteData();
        }, 500);
    });

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
            'canvasId'    : 'box_roulette',
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
                        $("#gift_box_id").html('<img src="https://static.willbes.net/public/images/promotion/2019/09/1388_rull_giftbox0'+$("#temp_prod_num").val()+'.png" alt="당첨상품"/>');
                        // $("#gift_box_id").html('<img src="'+ret_prod_img+'" alt="당첨상품"/>');
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
                var segmentNumber = ret.ret_data.ret_msg;   // The segment number should be in response.
                if (segmentNumber) {
                    ret_prod_img = (ret.ret_data.ret_prod_img ? ret.ret_data.ret_prod_img : '')
                    $("#temp_prod_num").val(segmentNumber);
                    var stopAt = theWheel.getRandomForSegment(segmentNumber);
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
        var ctx2 = theWheel.ctx;
        ctx2.beginPath();              // Begin path.
        ctx2.moveTo(170, 5);           // Move to initial position.
        ctx2.lineTo(230, 5);           // Draw lines to make the shape.
        ctx2.lineTo(200, 40);
        ctx2.lineTo(171, 5);

        rouletteData();
    }
</script>