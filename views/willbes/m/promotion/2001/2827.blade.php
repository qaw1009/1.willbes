@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:10px;}

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.3; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    
    a.btn {width:80%; margin:0 auto; display:block; background:#010a2b; color:#fff; font-size:2vh; padding:2vh; border-radius:2vh}
    a.btn:hover,
    .evt03 a.btn:hover {background:#06f4f6; color:#010a2b}

    .evt01 {padding:5vh 0}

    .evt03 {background:#000728; padding-bottom:8vh}
    .evt03 a.btn {background:#000;}
    .evt03 .attend {margin:2vh; font-size:1.4vh; display:flex; flex-wrap: wrap;}
    .evt03 .attend > div {background:url(https://static.willbes.net/public/images/promotion/2022/11/2827_date_bg.png) no-repeat center center; background-size:100%; display:flex; justify-content: center; align-items: center; width:25%; margin-bottom:1.5vh; position: relative; height:calc(100%); min-height:183px;}
    .evt03 .attend > div:hover {cursor: pointer;}
    .evt03 .attend > div p {display:block; font-size:1.8vh; width:100%; margin:0; padding:0; line-height:1.2}
    .evt03 .attend > div p strong {font-size:2.2vh; font-weight:bold;}
    .evt03 .attend > div div {position: absolute; width:100%; height:100%; background:rgba(0,0,0,.8); color:#fff; font-size:3.6vh; border-radius:2vh; display:flex; justify-content: center; align-items: center; font-weight:bold;}
    /*
    .evt03 div table {table-layout: auto; border-top:1px solid #fff;}
    .evt03 div table th,
    .evt03 div table td {padding:10px 3px; border-bottom:1px solid #fff; border-right:1px solid #fff; text-align: center; font-weight: 600; font-size:20px}
    .evt03 div table th {background: #252525; color:#fff;}
    .evt03 div table td {font-size:17px; color:#fff;}
    .evt03 div table td div {position:relative}
    .evt03 div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
    .evt03 div table td span.first_come {position:absolute;width:100%;left:48%;margin-left:-59px;margin-top:-59px;}
    .evt03 div table td span.bubble {position:absolute;width:100%;left:125%;margin-left:-59px;margin-top:-69px;}
    .evt03 div table tbody th {background: #f9f9f9; color:#555;}
    .evt03 div table tbody th:last-child,
    .evt03 div table tbody td:last-child {border-right:0;} 
    */


    .evtInfo {padding:50px 20px; background:#333; color:#f0f0f0;}
    .evtInfoBox {text-align:left; line-height:1.3}
    .evtInfoBox li {list-style: none; margin-left:20px; margin-bottom:10px;}
    .evtInfoBox strong {color:#64efff}
    .evtInfoBox h4 {margin-bottom:30px; font-size:1.4rem;}
    .evtInfoBox .infoTit { margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {
        .evt03 .attend > div {width:33.3333%; min-height:13vh; padding:5% 0}
        .evt03 .attend > div p {font-size:1.6vh;}
        .evt03 .attend > div p strong {font-size:1.8vh;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {        
        .evt03 .attend > div {width:33.3333%; height:100%; min-height:18vh; padding:1vh 0}
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evtTop" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_top.jpg" title="극한 퀴즈쇼">
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <a href="#reply" class="btn NSK-Black">11/26일 극한 퀴즈쇼 참가 신청하기 ></a>
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_01.jpg" title="퀴즈쇼 참가 이벤트">
        <div id="reply">
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.m.promotion.show_comment_list_normal_partial')
            @endif 
        </div>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_02.jpg" title="라이브 방송">
        <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" class="btn NSK-Black">윌비스경찰 유튜브 채널 바로가기 ></a>
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_03.jpg" title="총알 스탬프">

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


            <div class="attend">
                <div>
                    <p>11/21(월)<br>
                    경찰학<br>
                    2총기<br>
                    <strong>50명</strong></p>
                    <div>마감</div>
                </div>
                <div>
                    <p>11/22(화)<br>
                    경찰학<br>
                    2총기<br>
                    <strong>50명</strong></p>
                </div>
                <div>
                    <p>11/23(수)<br>
                    경찰학<br>
                    2총기<br>
                    <strong>50명</strong></p>
                </div>
                <div>
                    <p>11/24(목)<br>
                    경찰학<br>
                    2총기<br>
                    <strong>50명</strong></p>
                </div>
                <div>
                    <p>11/25(금)<br>
                    경찰학<br>
                    2총기<br>
                    <strong>50명</strong></p>
                </div>
                <div>
                    <p>11/28(월)<br>
                    경찰학<br>
                    서브노트<br>
                    <strong>50명</strong></p>
                </div>
                <div>
                    <p>11/29(화)<br>
                    경찰학<br>
                    서브노트<br>
                    <strong>50명</strong></p>
                </div>
                <div>
                    <p>11/30(수)<br>
                    경찰학<br>
                    서브노트<br>
                    <strong>50명</strong></p>
                </div>
                <div>
                    <p>12/1(목)<br>
                    경찰학<br>
                    서브노트<br>
                    <strong>50명</strong></p>
                </div>
                <div>
                    <p>12/2(금)<br>
                    경찰학<br>
                    서브노트<br>
                    <strong>50명</strong></p>
                </div>
            </div>
            <a href="#none" class="btn NSK-Black">김재규 교수님 스탬프 랠리 신청하기 ></a>
            <!--
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
                                                            <span><img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_as_off.png" alt="마감"></span>
                                                        @endif
                                                        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_as.png" alt="진행중">
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
            -->
        </form>
    </div> 

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_04.jpg" title="스탬프랠리">
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_05.jpg" title="런칭 기념">
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