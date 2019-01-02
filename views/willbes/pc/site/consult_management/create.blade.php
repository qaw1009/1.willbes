@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Counsel c_both">
                @include('willbes.pc.site.consult_management.common')
            </div>
            <form id="success_form" name="success_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" name="cst_idx" value="{{element('cst_idx', $arr_input)}}">
                <input type="hidden" id="csm_idx" name="csm_idx">
            </form>

            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {{--<form id="regi_form" name="regi_form" method="POST" action="{{ front_url('/consultManagement/store') }}" novalidate>--}}
                {!! csrf_field() !!}
                <input type="hidden" name="s_campus" value="{{element('s_campus', $arr_input)}}">
                <input type="hidden" name="cst_idx" value="{{element('cst_idx', $arr_input)}}">

                <div class="willbes-User-Info p_re pb30">
                    <div class="InfoTable GM">
                        <table cellspacing="0" cellpadding="0" class="classTable userInfoTable counselTable under-gray bdt-gray bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 160px;">
                                <col style="width: 780px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-tit">상담예약 일시</td>
                                <td class="w-info">
                                    <span class="tx-light-blue">
                                        {{$arr_base['data']['ConsultDate']}} ({!! $yoil[date('w', strtotime($arr_base['data']['ConsultDate']))] !!}) {{$arr_base['data']['TimeValue']}}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">이름(아이디)
                                <td class="w-info">
                                    {{$arr_base['member_info']['MemName']}} ({{$arr_base['member_info']['MemId']}})
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">생년월일
                                <td class="w-info">{{$arr_base['member_info']['BirthDay']}}</td>
                            </tr>
                            <tr>
                                <td class="w-tit">연락처 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <input type="text" id="phone" name="phone" class="iptphone" maxlength="13" title="연락처" value="{{$arr_base['member_info']['Phone']}}">
                                    &nbsp;&nbsp;&nbsp;"-" 제외하고 숫자만 입력
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">이메일 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <div class="emailBox">
                                        <input type="text" id="mail_id" name="mail_id" class="iptEmail1 email" maxlength="30" value="{{$arr_base['member_info']['MailId']}}" title="이메일"> @
                                        <select id="mail_domain" name="mail_domain" title="이메일" class="seleEmail email">
                                            @foreach($arr_base['mail_domain_ccd'] as $key => $val)
                                                @if (empty($key) === false)
                                                <option value="{{ $key }}" @if($key == $arr_base['member_info']['MailDomain']) selected="selected" @endif>{{ $val }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">응시직렬 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <div class="w-selec-Area">
                                        <ul>
                                            @foreach($arr_base['serial_ccd'] as $key => $val)
                                                <li><input type="checkbox" name="serial_ccd[]" class="goods_chk" value="{{$key}}" title="응시직렬"> <label>{{$val}}</label></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">응시지역 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <select id="candidate_area_ccd" name="candidate_area_ccd" title="응시지역" class="seleArea">
                                        <option value="">응시지역선택</option>
                                        @foreach($arr_base['candidate_area_ccd'] as $key => $val)
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">수험기간 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <div class="w-selec-Area">
                                        <ul>
                                            @foreach($arr_base['exam_period_ccd'] as $key => $val)
                                                <li><input type="radio" name="exam_period_ccd" class="goods_chk" value="{{$key}}" title="수험기간"> <label>{{$val}}</label></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">취약과목 <span class="tx-red">(*)</span></td>
                                <td class="w-info"><input type="text" id="subject_name" name="subject_name" class="iptsbjw" placeholder="ex) 영어" maxlength="20" title="취약과목"></td>
                            </tr>
                            <tr>
                                <td class="w-tit">수강여부 <span class="tx-red">(*)</span></td>
                                <td class="w-info">
                                    <div class="w-selec-Area">
                                        <ul>
                                            @foreach($arr_base['study_ccd'] as $key => $val)
                                                <li><input type="checkbox" name="study_ccd[]" class="goods_chk" value="{{$key}}" title="수강여부"> <label>{{$val}}</label></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit">
                                    상세정보<br/>
                                    (최근 점수를<br/>기입해 주세요)
                                </td>
                                <td class="w-info">
                                    <textarea id="memo" name="memo" cols="10" rows="1" style="width: 100%; height: 300px;">{{$arr_base['memo']}}</textarea>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="willbes-Lec-buyBtn">
                        <ul>
                            <li class="btnAuto90 h36">
                                <button type="button" class="mem-Btn bg-white bd-dark-gray" id="btn_cancel">
                                    <span class="tx-purple-gray">이전단계</span>
                                </button>
                            </li>
                            <li class="btnAuto90 h36">
                                <button type="submit" class="mem-Btn bg-purple-gray bd-dark-gray">
                                    <span>예약</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        {!! banner('고객센터_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var success_form = document.success_form;

        $(document).ready(function() {
            $('#btn_cancel').click(function () {
                location.replace('{{ front_url('/consultManagement/index') }}' + '?s_campus=' + '{{element('s_campus', $arr_input)}}');
            });

            $regi_form.submit(function() {
                var _url = '{{ front_url('/consultManagement/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        success_form.csm_idx.value = ret.ret_msg;
                        success_form.action = '{{ front_url('/consultManagement/success') }}' + '?s_campus=' + '{{element('s_campus', $arr_input)}}';
                        success_form.submit();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });

        function addValidate() {
            var exam_period_ccd = $(":input:radio[name=exam_period_ccd]:checked").length;
            if ($('#phone').val() == '') {
                alert('연락처를 입력해 주세요.');
                return;
            }

            if ($('#mail_id').val() == '') {
                alert('이메일을 입력해 주세요.');
                return;
            }

            if ($("input:checkbox[name='serial_ccd[]']").is(":checked") == false) {
                alert('응시직렬을 체크해 주세요.');
                return;
            }

            if ($('#candidate_area_ccd').val() == '') {
                alert('응시지역을 선택해 주세요.');
                return;
            }

            if (exam_period_ccd < 1) {
                alert('수험기간을 선택해 주세요.');
                return false;
            }

            if ($('#subject_name').val() == '') {
                alert('취약과목을 입력해 주세요.');
                return;
            }

            if ($("input:checkbox[name='study_ccd[]']").is(":checked") == false) {
                alert('수강여부를 체크해 주세요.');
                return;
            }
            return true;
        }
    </script>
@stop