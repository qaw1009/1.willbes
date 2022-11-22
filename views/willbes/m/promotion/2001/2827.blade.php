@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evtCtnsBox .sec05 {
        max-width: calc(100% - 20px);
        margin:10vw auto;              
        color:#121212;
        text-align:left;
    }
    .sec05 .title {text-align:center}
    .sec05 .date {font-size:90%; padding:1vw 20px; background:#f1f1f1; border-radius:20rem; display:inline-block; }
    .sec05 .date span {color:#cf1e02}
    .request {font-size:60%; margin-top:4vw}
    .request input[type=text] {width:100%}
    .request input[type=raido],
    .request input[type=checkbox] {width:18px; height:18px}
    .request > div {margin-bottom:5px}

    .request .sTitle {font-size:110%; margin-top:30px; font-weight:bold; border-bottom:1px solid #ccc; padding-bottom:5px; margin-bottom:0}
    .request .ad_date {font-size:90%;text-align:center;}
    .request .ad_List div {width:100%}
    .request .ad_List {display: flex; flex-wrap: wrap; margin-top:10px}
    .request .ad_List div {width:33.3333%}
    .request .mt10 {font-size:80%}
    .request .txtBox {font-size:80%}
    .request .txtBox ul {padding:10px; border:1px solid #ccc; border-top:0; height:200px; overflow-y:scroll }
    .request .txtBox div {margin-top:10px}

    .request .btn {width:90%; margin:0 auto;}
    .request .btn a {display:block; text-align:center; font-size:120%; color:#fff; background:#000; padding:15px 0; margin-top:30px; border-radius:50px}
    
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

    .evtCtnsBox .sec05 {
        max-width: calc(100% - 20px);
        margin:10vw auto;              
        color:#121212;
        text-align:left;
    }
    .sec05 .title {text-align:center}
    .sec05 .date {font-size:90%; padding:1vw 20px; background:#f1f1f1; border-radius:20rem; display:inline-block; }
    .sec05 .date span {color:#cf1e02}
    .request {font-size:60%; margin-top:4vw}
    .request input[type=text] {width:100%}
    .request input[type=raido],
    .request input[type=checkbox] {width:18px; height:18px}
    .request > div {margin-bottom:5px}

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
                @if(empty($arr_base['add_apply_data']) === false)
                    @foreach($arr_base['add_apply_data'] as $key => $row)
                        <div>
                            {!! $row['Name'] !!}
                            {!! (time() >= strtotime($row['ApplyEndDatm']) || $row['PersonLimit'] <= $row['MemberCnt'] ? '<div>마감</div>' : '') !!}
                        </div>
                    @endforeach
                @endif
            </div>
            <a href="javascript:void(0);" class="btn NSK-Black" onclick="fn_add_apply_submit(); return false;">김재규 교수님 스탬프 랠리 신청하기 ></a>
        </form>
    </div> 

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_04.jpg" title="스탬프랠리">
    </div>

    <div class="evtCtnsBox evt_apply" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2827m_apply.jpg" title="100일의 기적 시작합니다">
    </div>

    <form name="regi_form_register" id="regi_form_register">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
        <input type="hidden" name="target_param_names[]" value="직렬"/> {{-- 체크 항목 전송 --}}
        <input type="hidden" name="register_type" value="promotion"/>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="sec05">
                <div class="title NSK-Black">
                    <div>
                        김재규 교수님 공개강의 무료신청<br>
                        (노량진 본원)
                    </div>
                </div>

                <div class="request">
                    <div>
                        <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" placeholder="이름" title="이름" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
                    </div>
                    <div><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" placeholder="연락처" /></div>

                    <div>
                        <div class="ad_date">
                            {{--<input type="checkbox" name="register_chk" id="campus0" value=""> <label for="campus0">11.14(일) 오후 2시(노량진 신광은 경찰학원)</label>--}}
                            @foreach($arr_base['register_list'] as $key => $val)
                                @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                                    @php
                                        // 강의 기간 지나면 자동 disabled 처리
                                        // 신청강의 날짜 형식. ex) 12.14 프리미엄올공반2차 설명회
                                        //                         2.8(토) 초시생을 위한 합격커리큘럼 설명회
                                        $reg_year = date('Y');
                                        $temp_date = explode(' ', $val['Name'])[0];
                                        if(strpos($temp_date, '(') !== false) {
                                            $temp_date = substr($temp_date, 0, strpos($temp_date, '('));
                                        }
                                        $reg_month_day = explode('.', $temp_date);
                                        $reg_month = mb_strlen($reg_month_day[0], 'utf-8') == 1 ? '0'.$reg_month_day[0] : $reg_month_day[0] ;
                                        $reg_day = mb_strlen($reg_month_day[1], 'utf-8') == 1 ? '0'.$reg_month_day[1] : $reg_month_day[1] ;
                                        $reg_date = $reg_year.$reg_month.$reg_day.'0000';
                                        //echo date('YmdHi', strtotime($reg_date. '+1 days'));
                                    @endphp
                                    @if(time() >= strtotime($reg_date. '+1 days'))
                                        <div></div><input type="checkbox" name="register_disable[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" disabled="disabled"/> <label for="campus{{$key}}">{{$val['Name']}}</label></div>
                                    @else
                                        <div><input type="checkbox" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" /> <label for="campus{{$key}}">{{$val['Name']}}</label></div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="sTitle">* 직렬</div>
                    <div class="ad_List">
                        <div><input type="radio" name="register_data1" id="CT1" value="일반남자" /> <label for="CT1">일반남자</label></div>
                        <div><input type="radio" name="register_data1" id="CT2" value="일반여자" /> <label for="CT2">일반여자</label></div>
                        <div><input type="radio" name="register_data1" id="CT3" value="101단" /> <label for="CT3">101단</label></div>
                        <div><input type="radio" name="register_data1" id="CT4" value="경행경채" /> <label for="CT4">경행경채 </label></div>
                        <div><input type="radio" name="register_data1" id="CT5" value="전의경경채" /> <label for="CT5">전의경경채</label></div>
                        <div><input type="radio" name="register_data1" id="CT6" value="법학경채" /> <label for="CT6">법학경채 </label></div>
                        <div><input type="radio" name="register_data1" id="CT7" value="기타" /> <label for="CT7">기타</label></div>
                    </div>

                    <div class="sTitle">* 개인정보 수집 및 이용에 대한 안내</div>
                    <div class="txtBox">
                        <ul>
                            <li>1. 개인정보 수집 이용 목적<br>
                            - 신청자 본인 확인 및 신청 접수 및 문의사항 응대 - 통계분석 및 마케팅 - 윌비스 한림법학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공</li>
                            <li>2. 개인정보 수집 항목<br>
                            - 필수항목 : 성명, 연락처, 무료특강 확인 경로</li>
                            <li>3. 개인정보 이용기간 및 보유기간<br>
                            - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기</li>
                            <li>4. 신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.</li>
                            <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                            <li>6. 본 이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.</li>
                        </ul>
                        <div>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </div>
                    </div>

                    <div class="btn NSK-Black">
                        <a href="javascript:void(0);" onclick="fn_submit(); return false;">학원 공개강의 신청하기 >></a>
                    </div>
                </div>
            </div>
        </div>
    </form>

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

    // 설명회 신청하기

    function fn_submit() {
          {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
          var $regi_form_register = $('#regi_form_register');
          var _url = '{!! front_url('/event/registerStore') !!}';

          if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
              alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
              return;
          }
          if ($.trim($regi_form_register.find('input[name="register_name"]').val()) == '') {
              alert('이름을 입력하셔야 합니다.');
              $("#register_name").focus();
              return;
          }
          if ($.trim($regi_form_register.find('input[name="register_tel"]').val()) == '') {
              alert('연락처를 입력하셔야 합니다.');
              $("#register_tel").focus();
              return;
          }
          if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
              alert('참여일을 선택하셔야 합니다.');
              return;
          }
          if ($regi_form_register.find('input[name="register_data1"]').is(':checked') === false) {
              alert('직렬을 선택하셔야 합니다.');
              return;
          }

          if (!confirm('저장하시겠습니까?')) { return true; }

          //전부 disabled 처리
          $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', true);

          //체크 disable 해제
          $regi_form_register.find('input[name="register_chk[]"]:checked').each(function(i){
              $(this).attr('disabled', false);
          });

          ajaxSubmit($regi_form_register, _url, function(ret) {
              if(ret.ret_cd) {
                  alert(ret.ret_msg);
                  location.reload();
              }
          }, showValidateError, null, false, 'alert');
          $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', false); //disable 해제
      }
  
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop