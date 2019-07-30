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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:0;z-index:10;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/07/1339_top_bg.jpg) no-repeat center top;}
        
        .evt01 {background:#2a2a2a;}                  

        .evt02 {background:#fff; padding-bottom:100px}      

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data3"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="참여일"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="직렬"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="캠퍼스"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>

            <ul class="skyBanner">
                <li><a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1268"><img src="https://static.willbes.net/public/images/promotion/2019/07/1339_skybanner.png" title="입교버스 신청 바로가기"></a></li>
            </ul>  
            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1339_top.jpg" title="빡공이벤트">
            </div>
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1339_01.jpg" title="초성퀴즈">
            </div>
            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1339_02.jpg" title="소문내고 스타벅스고받고 ">
            </div>

            {{--홍보url댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                {{-- 하단 카페 링크 사용여부 --}}
                @include('willbes.pc.promotion.show_comment_list_url_partial', array('bottom_cafe_link'=>'N'))
            @endif

        </form>
	</div>
    <!-- End Container -->
    <script>
        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }
    </script>
@stop