@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:10px;}

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1rem; line-height:1.3; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

     /*선착순 이벤트*/
    .evt04 {background:#425B94;}
    .evt04 > div {width:98%; margin:0 auto;padding-top:50px;}
    .evt04 div table {table-layout: auto; border-top:1px solid #fff;}
    .evt04 div table th,
    .evt04 div table td {padding:10px 3px; border-bottom:1px solid #fff; border-right:1px solid #fff; text-align: center; font-weight: 600; font-size:20px}
    .evt04 div table th {background: #252525; color:#fff;}
    .evt04 div table td {font-size:18px; color:#fff;}
    .evt04 div table td div {position:relative}
    .evt04 div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
    .evt04 div table td span.first_come {position:absolute;width:100%;left:48%;margin-left:-59px;margin-top:-59px;}
    .evt04 div table td span.bubble {position:absolute;width:100%;left:125%;margin-left:-59px;margin-top:-69px;}
    .evt04 div table tbody th {background: #f9f9f9; color:#555;}
    .evt04 div table tbody th:last-child,
    .evt04 div table tbody td:last-child {border-right:0;} 
    .evt04 .btn {margin-top:30px; padding-bottom:50px}
    .evt04 .btn img {width:70%; max-width:395px}

    .evtInfo {padding:50px 20px; background:#333; color:#f0f0f0;}
    .evtInfoBox {text-align:left; line-height:1.3}
    .evtInfoBox li {list-style: none; margin-left:20px; margin-bottom:10px;}
    .evtInfoBox strong {color:#64efff}
    .evtInfoBox h4 {margin-bottom:30px; font-size:1.4rem;}
    .evtInfoBox .infoTit { margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {
        .evtCtnsBox {font-size:0.8rem;}

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .evtCtnsBox {font-size:0.8rem;}

    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evtTop" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2807m_top.jpg" title="합격이 빛나는 밤에">
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2807m_01.jpg" title="스페셜 이벤트">
            <a href="#comment" title="사전질문 하러가기" style="position: absolute;left: 14.05%;top: 74.87%;width: 29.11%;height: 7.32%;z-index: 2;"></a>
            <a href="#first_come" title="선착순 50명 클릭" style="position: absolute;left: 60.05%;top: 74.87%;width: 29.11%;height: 7.32%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2807m_02.jpg" title="런칭 설명회">
            <a href="#comment" title="사전질문 하러가기" style="position: absolute;left: 12.95%;top: 44.47%;width: 29.51%;height: 5.02%;z-index: 2;"></a>
            <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" title="유튜브 채널 가기" style="position: absolute;left: 44.35%;top: 44.47%;width: 42.61%;height: 5.02%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt03 pb100" data-aos="fade-up" id="comment">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2807m_03.jpg" title="q&a">
        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_normal_partial')
        @endif 
    </div>

    <form id="add_apply_form" name="add_apply_form">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="register_type" value="promotion"/>
        <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="event_register_chk" value="N"/>
        @foreach($arr_base['add_apply_data'] as $row)
            @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                @break;
            @endif
        @endforeach

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2807m_04.jpg" alt="무료증정 이벤트"/>
            <div>
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                        @if(empty($arr_base['add_apply_data']) === false)
                            @php $col_cnt = 4; @endphp
                            @for($i=0; $i < count($arr_base['add_apply_data']); $i++)
                                @if($i==0 || $i%$col_cnt == 0)
                                    @php $tr_i = $i; @endphp
                                    <tr>
                                        @endif
                                        <td>{{$arr_base['add_apply_data'][$i]['Name']}}</td>
                                        @if($i==($tr_i+$col_cnt-1) || $i == (count($arr_base['add_apply_data']))-1)
                                            @if($i == (count($arr_base['add_apply_data']))-1) {{-- 마지막일때 --}}
                                            @php
                                                $remain_cnt = $col_cnt - (count($arr_base['add_apply_data'])%$col_cnt);
                                                if($remain_cnt == $col_cnt) $remain_cnt = 0;
                                            @endphp
                                            @if($remain_cnt != 0)
                                                @for($r=0; $r < $remain_cnt; $r++)
                                                    <td></td>
                                                @endfor
                                            @endif
                                            @endif
                                    </tr>
                                    @php $temp_j = 0; @endphp
                                    @for($j=($i-$col_cnt+1+(empty($remain_cnt)? 0 : $remain_cnt)); $j <= $i; $j++)
                                        @if($j==0 || ($j%$col_cnt == 0  && $temp_j == 0) || ($i == (count($arr_base['add_apply_data']))-1 && $temp_j == 0) )
                                            <tr>
                                                @endif
                                                <td>
                                                    <div>
                                                        @if(time() >= strtotime($arr_base['add_apply_data'][$j]['ApplyEndDatm']) || $arr_base['add_apply_data'][$j]['PersonLimit'] <= $arr_base['add_apply_data'][$j]['MemberCnt'])
                                                            <span><img src="https://static.willbes.net/public/images/promotion/2022/10/2807m_as_off.png" alt="마감"></span>
                                                        @endif
                                                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2807m_as.png" alt="진행중">
                                                    </div>
                                                </td>
                                                @if($j==($tr_i+$col_cnt-1) || $j == (count($arr_base['add_apply_data']))-1)
                                                    @if(empty($remain_cnt) === false && $remain_cnt != 0)
                                                        @for($r=0; $r < $remain_cnt; $r++)
                                                            <td></td>
                                                        @endfor
                                                    @endif
                                            </tr>
                                        @endif
                                        @php $temp_j++; @endphp
                                    @endfor
                                @endif
                            @endfor
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="btn">
                <a href="javascript:void(0);" onclick="javascript:fn_add_apply_submit(); return false;">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2807_04_btn.png"  alt="이벤트신청"/>
                </a>
            </div>
        </div>
    </form>

    <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black"><strong>유의사항</strong></h4>        
            <ul>                                        
                <li>* 본교재는 헌법도약 기출문제집 제2판 A/S교재이며 , 정식교재가 아닌 추록교재 입니다.</li>
                <li>* 본 이벤트는 ID당 최대 1회 가능합니다.</li>
                <li>* 클릭은 1번만! 선착순이기 때문에 여러 번 누르실 필요가 없습니다.</li>
                <li>* 당첨자는 [장바구니] > [교재] 에 지급된 상품을 확인하시기 바랍니다.</li>
                <li>* 장바구니 유효기간은 7일이며, 장바구니 유효기간 이후 재지급은 불가합니다.</li>
                <li>* 장바구니에 지급된 상품은 유료기간(7일)내 배송비 2,500원 결제 시 수령 가능합니다.</li>
                <li>* 배송비 결제 완료 하신 분들에 한해 순차적으로 상품이 배송됩니다.</li>
                <li>* 회원 정보상의 주소로 진행됨으로 상품 수령 주소를 확인하시기 바랍니다.<br>(배송비 결제 시 입력한 주소지로 발송되며, 입력된 배송지가 잘못되어 있으면 배송이 되지 않을수 있습니다. 이 경우 윌비스에서는 책임을 지지 않습니다.)</li>
                <li>* 이벤트 상품발송 후에는 환불이 불가능합니다.(파손시 교환 가능합니다.)</li>
                <li>* 본 교재는 비매품으로 이벤트에 제공되고 있습니다.</li>
            </ul>
        </div>           
    </div>
</div>

 <!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
    AOS.init();
    });
</script>

<script type="text/javascript">
    // 무료 당첨
    function fn_add_apply_submit() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $add_apply_form = $('#add_apply_form');
        var _url = '{!! front_url('/event/addApplyStore') !!}';

        if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
            alert('이벤트 기간이 아닙니다.'); return;
        }

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

    // 이벤트 추가 신청 메세지
    function getApplyMsg(ret_msg) {
        {{-- 해당 프로모션 종속 결과 메세지 --}}
        var apply_msg = '';
        var arr_apply_msg = [
            ['이미 신청하셨습니다.','이미 당첨되셨습니다.'],
            ['신청 되었습니다.','당첨을 축하합니다. 장바구니를 확인해 주세요.'],
            //['이벤트 신청후 이용 가능합니다.','봉투모의고사 신청후 이용 가능합니다.'],
            ['마감되었습니다.','내일 21시에 다시 도전해 주세요.']
        ];
        for (var i = 0; i < arr_apply_msg.length; i++) {
            if(arr_apply_msg[i][0] == ret_msg) {
                apply_msg = arr_apply_msg[i][1];
            }
        }
        if(apply_msg == '') apply_msg = ret_msg;
        return apply_msg;
    }
  
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop