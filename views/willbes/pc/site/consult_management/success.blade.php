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
            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" name="s_campus" value="{{element('s_campus', $arr_input)}}">
                <input type="hidden" name="csm_idx" value="{{element('csm_idx', $arr_input)}}">

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
                            <td class="w-tit">이름(아이디)</td>
                            <td class="w-info">{{$arr_base['member_info']['MemName']}} ({{$arr_base['member_info']['MemId']}})</td>
                        </tr>
                        <tr>
                            <td class="w-tit">생년월일</td>
                            <td class="w-info">{{$arr_base['member_info']['BirthDay']}}</td>
                        </tr>
                        <tr>
                            <td class="w-tit">연락처</td>
                            <td class="w-info">{{$arr_base['data']['Phone']}}</td>
                        </tr>
                        <tr>
                            <td class="w-tit">이메일</td>
                            <td class="w-info">{{$arr_base['data']['Mail']}}</td>
                        </tr>
                        <tr>
                            <td class="w-tit">응시직렬</td>
                            <td class="w-info">{{$arr_base['data']['SerialName']}}</td>
                        </tr>
                        <tr>
                            <td class="w-tit">응시지역</td>
                            <td class="w-info">{{$arr_base['data']['CandidateAreaName']}}</td>
                        </tr>
                        <tr>
                            <td class="w-tit">수험기간</td>
                            <td class="w-info">{{$arr_base['data']['ExamPeriodName']}}</td>
                        </tr>
                        <tr>
                            <td class="w-tit">취약과목</td>
                            <td class="w-info">{{$arr_base['data']['SubjectName']}}</td>
                        </tr>
                        <tr>
                            <td class="w-tit">수강여부</td>
                            <td class="w-info">{{$arr_base['data']['StudyName']}}</td>
                        </tr>
                        <tr>
                            <td class="w-tit">상세정보</td>
                            <td class="w-info">
                                {!! nl2br($arr_base['data']['Memo']) !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="willbes-Lec-buyBtn">
                    <ul>
                        <li class="btnAuto90 h36">
                            <button type="submit" class="mem-Btn bg-white bd-dark-gray">
                                <span class="tx-purple-gray">예약취소</span>
                            </button>
                        </li>
                        <li class="btnAuto90 h36">
                            <button type="button" class="mem-Btn bg-purple-gray bd-dark-gray" id="btn_list">
                                <span>이동</span>
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

        $(document).ready(function() {
            $regi_form.submit(function() {
                if (!confirm('상담예약을 취소하시겠습니까?')) {
                    return false;
                }
                var _url = '{{ front_url('/consultManagement/cancel') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.replace('{{ front_url('/consultManagement/index') }}' + '?s_campus=' + '{{element('s_campus', $arr_input)}}');
                    }
                }, showValidateError, null, false, 'alert');
            });

            $('#btn_list').click(function () {
                location.replace('{{ front_url('/consultManagement/index') }}' + '?s_campus=' + '{{element('s_campus', $arr_input)}}');
            });
        });
    </script>
@stop