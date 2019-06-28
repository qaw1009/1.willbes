@extends('willbes.pc.layouts.master')

@section('content')
@include('willbes.pc.layouts.partial.site_menu')
<!-- Container -->
<style type="text/css">
.subContainer {
min-height:auto !important;
margin-bottom:0 !important;
}
.evtContent {
position:relative;
width:100% !important;
margin-top:20px !important;
padding:0 !important;
background:#fff;
}
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

/*****************************************************************/
.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/06/1298_top_bg.jpg) no-repeat center top;}
.sec01 , .sec05{background:#ececec;}
.sec03{background:#c5cbcd;}
.sec06{background:#555555;}

/*타이머*/
.time {width:100%; text-align:center; background:#f5f5f5}
.time {text-align:center; padding:20px 0}
.time table {width:1120px; margin:0 auto}
.time table td:last-child {font-size:40px}
.time table td img {width:80%}
.time .time_txt {font-size:28px; color:#000; letter-spacing: -1px; font-weight:600}
.time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
.time p {text-alig:center}
@@keyframes upDown{
from{color:#000}
50%{color:#0086ed}
to{color:#000}
}
@@-webkit-keyframes upDown{
from{color:#000}
50%{color:#0086ed}
to{color:#000}
}
</style>

<form name="regi_form_register" id="regi_form_register">
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
    <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
    <input type="hidden" name="register_name"  id ="register_name" value="{{ sess_data('mem_name') }}"/>
    <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}"/>
    <input type="hidden" name="register_type" value="promotion"/>
    <input type="hidden" id="check_member" value="0">

</form>
<div class="evtContent NGR" id="evtContainer">
    <!-- 타이머 -->
    <div class="evtCtnsBox time NGEB"  id="newTopDday">
        <div>
            <table>
                <tr>
                    <td class="time_txt"><span>텀블러 무료배포</span><br>이벤트 마감까지</td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- 타이머 //-->

    <div class="evtCtnsBox top_bg">
    <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_top.jpg" alt="텀블러 무료 배포" usemap="#Map1298a" border="0">
    <map name="Map1298a" id="Map1298a">
        <area shape="rect" coords="333,774,782,849" href="javascript:fn_submit();" />
    </map>
    </div>
    <div class="evtCtnsBox sec01">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec01.jpg" alt="신의 한 수 베너">
    </div>
    <div class="evtCtnsBox sec02">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec02.jpg" alt="신의 한 수 텀블러">
    </div>
    <div class="evtCtnsBox sec03">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec03.jpg" alt="윌비스 회원가입">
    </div>
    <div class="evtCtnsBox sec04">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec04.jpg" alt="신의 한 수 이벤트">
    </div>
    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.pc.promotion.show_comment_list_url_partial')
    @endif
    <div class="evtCtnsBox sec05">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec05.jpg" alt="경찰 합격비법" usemap="#m1298b">
        <map name="m1298b" id="m1298b">
        <area shape="rect" coords="347,586,518,634" href="https://www.willbes.net/promotion/index/code/1137" target="_blank" alt="지원혜택 자세히보기"/>
        <area shape="rect" coords="922,362,1029,433" href="https://police.willbes.net/promotion/index/cate/3001/code/1009" target="_blank" alt="신광은경찰 자세히보기"/>
        <area shape="rect" coords="926,562,1027,634" href="https://police.willbes.net/promotion/index/cate/3001/code/1015" target="_blank" alt="기본이론 자세히보기"/>
        </map>
    </div>
    <div class="evtCtnsBox sec06">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1298_sec06.jpg" alt="이벤트 유의사항">
    </div>
</div>
<!-- End Container -->

<script type="text/javascript">
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}');
    });

    function fn_submit() {
        var $regi_form_register = $('#regi_form_register');
        var _url = '{!! front_url('/event/registerStore') !!}';

        var is_login = '{{sess_data('is_login')}}';
        if (is_login != true) {
            alert('로그인 후 이용해 주세요.');
            return;
        }
        checkMemberJoinDate();

        if ($('#check_member').val() != 1) {
            alert('신규회원만 응모가능합니다.');
            return false;
        }

        if (!confirm('저장하시겠습니까?')) { return true; }
        ajaxSubmit($regi_form_register, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
                location.reload();
            }
        }, showValidateError, null, false, 'alert');
    }

    function checkMemberJoinDate() {
        var $regi_form_register = $('#regi_form_register');
        var _url = '{{ site_url('/event/registerStoreForCheckMember/') }}' + '?start_date=2019-07-01&end_date=2019-07-31';
        var _data = {
            '{{ csrf_token_name() }}': $regi_form_register.find('input[name="{{ csrf_token_name() }}"]').val(),
            '_method': 'POST'
        };
        sendAjax(_url, _data, function (ret) {
            if (ret.ret_data === true) {
                $('#check_member').val(1);
            }
        }, null, false, 'POST');
    }
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop