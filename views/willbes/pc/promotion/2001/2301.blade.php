@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/

        .sky {position:fixed; top:200px;right:10px; width:120px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}
        
        .evt00 {background:#0a0a0a}       

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2301_top_bg.jpg) no-repeat center top; position:relative; height:1183px}
        .evtTop span {position:absolute; top:525px; left:50%; width:775px; margin-left:-387px}       

        .evt01 {background:#37302a; padding-bottom:100px}
        .evt01 .evtTab {width:40px; position:absolute; top:397px; left:50%; margin-left:477px}
        .evt01 .evtTab li {margin-bottom:1px}
        .evt01 .evtTab li a {display:block; color:#37302a; font-size:20px; text-align:center; padding:30px 0; border-radius:0 15px 15px 0}
        .evt01 .evtTab li:nth-child(1) a {background:#ff9933}
        .evt01 .evtTab li:nth-child(2) a {background:#ffec8e}
        .evt01 .evtTab li:nth-child(3) a {background:#67c599}
        .evt01 .evtTab li a.active {color:#000;}
    </style> 

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_sky.jpg" alt="1+5 혜택 받기" >
            </a>       
        </div> 

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" alt="경찰학원부분 1위"/>
        </div>              

        <div class="evtCtnsBox evtTop">
            <span data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2021/08/2301_top_img.png" alt="기초 입문서 무료 배포 이벤트"/></span>            
        </div>

        <div class="evtCtnsBox evt01 p_re" >
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_01.jpg" alt="살펴보기"/>
                <ul class="evtTab NSK-Black">
                    <li><a href="#tab01">형<br>사<br>법</a></li>
                    <li><a href="#tab02">경<br>찰<br>학</a></li>
                    <li><a href="#tab03">헌<br>법</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_01_01.jpg" alt=""/>
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_01_02.jpg" alt=""/>
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_01_03.jpg" alt=""/>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_02.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_03.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left" id="evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_04_01.jpg" alt="8월 BEST 강좌"/>
                <a href="javascript:void(0);" onclick="fn_promotion_etc_submit();" title="2022 기초입문서" style="position: absolute; left: 16.43%; top: 49.81%; width: 20.54%; height: 7.04%; z-index: 2;"></a>

                <a href="javascript:void(0);" onclick="fn_add_apply_submit({{ $arr_base['add_apply_data'][0]['EaaIdx'] or '' }});" title="3법 기초입문강의" style="position: absolute; left: 41.43%; top: 32.88%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="fn_add_apply_submit({{ $arr_base['add_apply_data'][1]['EaaIdx'] or '' }});" title="G-TELP 문법강의" style="position: absolute; left: 62.32%; top: 32.88%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="fn_add_apply_submit({{ $arr_base['add_apply_data'][2]['EaaIdx'] or '' }});" title="한능검 기본개념편" style="position: absolute; left: 41.43%; top: 47.04%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="giveCheck();" title="쿠폰" style="position: absolute; left: 62.32%; top: 47.04%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <form id="add_apply_form" name="add_apply_form">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="register_type" value="promotion"/>
        <input type="hidden" name="event_register_chk" value="N"/>
        <input type="hidden" name="add_apply_chk[]" value="" />
    </form>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.evtTab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()}
                )}
            )}
        );

        var $regi_form = $('#regi_form');
        var $add_apply_form = $('#add_apply_form');

        {{-- 무료 강좌지급 --}}
        function fn_add_apply_submit(eaa_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var _url = '{!! front_url('/event/addApplyStore') !!}';

            if (!eaa_idx) {
                alert('이벤트 기간이 아닙니다.');
                return;
            }

            $add_apply_form.find('input[name="add_apply_chk[]"]').val(eaa_idx);

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg || '') );
            }, null, false, 'alert');
        }

        {{-- 무료 교재지급 --}}
        function fn_promotion_etc_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['cart_prod_code']) === false)
                var _url = '{!! front_url('/event/promotionEtcStore') !!}';

                if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
                ajaxSubmit($add_apply_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert( getApplyMsg(ret.ret_msg) );
                        location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    }
                }, function(ret, status, error_view) {
                    alert( getApplyMsg(ret.ret_msg) );
                }, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
                ['신청 되었습니다.','신청 되었습니다. 내강의실에서 확인해 주세요.'],
            ];

            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['give_type']) === false || empty($arr_promotion_params['arr_give_idx_chk']) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>

@stop