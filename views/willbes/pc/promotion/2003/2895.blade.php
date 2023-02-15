@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/02/2895_top_bg.jpg) no-repeat center top;}
        .evt_top span {position: absolute; left:50%; z-index: 2;}
        .evt_top span.left {margin-left:-580px}
        .evt_top span.right {margin-left:430px}

        .evt02 {background:#f4f0e8}
        .evt02 ul {display:flex;justify-content: space-between; width:760px; margin:0 auto}
        .evt02 li div {position: relative;}
        .evt02 li span {position: absolute; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,.7); z-index: 10; display:flex; justify-content: center; align-items: center;}
        .evt02 li a {display:block; background:#000; color:#fff; padding:10px; border-radius:30px; font-size:18px; margin-top:20px}
        .evt02 li a:hover {background:#e8201e;}
        .evtinfo {width:760px; text-align:left; line-height:1.3; margin:50px auto 100px}
        .evtinfo p {font-size:16px; font-weight:bold; margin-bottom:10px}

        .evt03 {padding-bottom:150px}
        .evt03 .sTilte {margin:100px auto 50px; font-size:36px}
        .evt03 .sTilte strong {color:#e30000}
        .evt04 {background:#eee}
      
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2895_top.jpg" alt="세무직 모의고사 이벤트"/>
            <span class="left" data-aos="fade-right" data-aos-delay="200"><img src="https://static.willbes.net/public/images/promotion/2023/02/2895_top01.png" alt=""/></span>
            <span class="right" data-aos="fade-left" data-aos-delay="400"><img src="https://static.willbes.net/public/images/promotion/2023/02/2895_top02.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2895_01.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2895_02.jpg" alt=""/>
            <ul>
                @if(empty($arr_base['register_list']) === false)
                    @php $i=1; @endphp
                    @foreach($arr_base['register_list'] as $key => $row)
                        <li>
                            <div>
                                <img src="https://static.willbes.net/public/images/promotion/2023/02/2895_02_0{{$i}}.jpg" alt="{{$i}}회 모의고사"/>
                                @if(date("YmdHis") >= $row['format_RegisterEndDatm'])
                                    <span><img src="https://static.willbes.net/public/images/promotion/2023/02/2895_stemp.png" alt="종료"/></span>
                                @endif
                            </div>
                            @if(date("YmdHis") < $row['format_RegisterStartDatm'])
                                <a href="javascript:void(0);" onclick="alert(('다운로드 기간이 아닙니다.'))">다운로드</a>
                            @elseif(date("YmdHis") >= $row['format_RegisterStartDatm'] && date("YmdHis") <= $row['format_RegisterEndDatm'])
                                <a href="javascript:void(0);" onclick="fn_submit('{{$row['ErIdx']}}','{{$file_data_promotion[$key]['EfIdx'] or ''}}','{{$data['ElIdx']}}'); return false;">다운로드</a>
                            @else
                                <a href="javascript:void(0);" onclick="alert(('해당 회차 모의고사는 종료되었습니다.'))">다운로드</a>
                            @endif
                        </li>
                        @php $i++; @endphp
                    @endforeach
                @endif
            </ul>
            <div class="evtinfo">
                <p>※ 이용안내</p>
                1. 대상 : 23년 4월 8일 국가직 시험을 준비하는 수험생. 모의고사 가격은 0원!<br>
                2. 모의고사 자료 다운로드 기간은 회차별 상이합니다. <br>
                -1회차 모의고사 다운로드 기간: 3월 2일~3월 8일<br>
                -2회차 모의고사 다운로드 기간: 3월 9일~3월 15일<br>
                -3회차 모의고사 다운로드 기간: 3월 16일~3월 22일<br>
                -4회차 모의고사 다운로드 기간: 3월 23일~3월 29일<br>
                3. 해설자료는 제공되지 않습니다.<br>
                4. 동영상 강의는 유료 결제입니다.
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2895_02_05.jpg" alt=""/>
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx1'] or ''}}');" title="단과 쿠폰" style="position: absolute; left: 21.61%; top: 77.27%; width: 18.39%; height: 6.29%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx2'] or ''}}');" title="패키지 쿠폰" style="position: absolute; left: 61.07%; top: 77.27%; width: 18.39%; height: 6.29%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2895_03.jpg" alt=""/>
            <div class="sTilte"><strong>[패키지]</strong> 할인 받고 알차게 수강하자~</div>
            <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/205422" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2895_03_01.jpg" alt=""/></a>
            <div class="sTilte"><strong>[단과]</strong> 내가 필요한 과목만~</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>
        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2895_04.jpg" alt=""/>
        </div>
    </div>

    <form name="regi_form_register" id="regi_form_register">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="register_type" value="promotion"/>
        <input type="hidden" name="register_chk[]" value=""/>
        <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}">
        <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">
        <input type="hidden" name="register_overlap_chk" value="Y"> {{-- 중복 신청 가능여부 --}}
    </form>

    <form id="regi_form_coupon" name="regi_form_coupon" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

   <!-- End Container -->
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });

        // 신청접수
        function fn_submit(er_idx, file_idx, event_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form_register = $('#regi_form_register');
            $regi_form_register.find("input[name='register_chk[]']").val(er_idx);
            var _url = '{!! front_url('/event/registerStore') !!}';
            ajaxSubmit($regi_form_register, _url, function (ret) {
                if (ret.ret_cd) {
                    fileDownload(file_idx, event_idx);
                }
            }, showValidateError, null, false, 'alert');
        }

        // 파일 다운로드
        function fileDownload(file_idx, event_idx)
        {
            var _url = '{{ site_url("/promotion/download") }}' + '?file_idx='+file_idx + '&event_idx='+event_idx;
            window.open(_url, '_blank');
            /*location.href='{{ site_url("/promotion/download") }}' + '?file_idx='+file_idx + '&event_idx='+event_idx;*/
        }

        {{--쿠폰발급--}}
        function giveCheck(give_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form_coupon = $('#regi_form_coupon');
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&give_idx=' + give_idx;
                ajaxSubmit($regi_form_coupon, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @endif
        }
    </script>
    
@stop