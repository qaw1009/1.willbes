@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    강사선택
                </div>
            </div>
        </div>

        <div class="willbes-Txt2 tx-blue">
            {{$pkginfo['ProdName']}}
        </div>

        <div class="paymentWrap">
            <div class="paymentCts">
                @if($pkginfo['IsUnPaid'] == 'Y')
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    <tr class="replyList willbes-Open-Table">
                        <td>
                            주문정보
                        </td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="pl0 pr0" colspan="2">
                            @foreach($unpaidinfo as $row)
                            <ul class="payLecList payLecList02">
                                <li><strong>결제일</strong> {{$row['CompleteDatm']}}</li>
                                <li><strong>결제금액</strong> {{number_format($row['RealPayPrice'])}}</li>
                                <li><strong>환불금액</strong> {{number_format($row['RefundPrice'])}}</li>
                                <li><strong>미납금액</strong> {{number_format($row['RealUnPaidPrice'])}}</li>
                                <li><strong>주문번호</strong> <a href="{{front_url('/classroom/order/show')}}?order_no={{$row['OrderNo']}}" class="tx-blue" target="_blank">{{$row['OrderNo']}}</a></li>
                                <li><strong>비고</strong> {{$row['UnPaidMemo']}}</li>
                            </ul>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                @endif
                <ul class="paymentTxt NGR">
                    <li>수강할 강사를 선택해주세요.</li>
                    <li>강사 선택 및 변경은 강사선택기간에만 가능하며, 기간이 지난 이후에는 변경이 불가능합니다.</li>
                </ul>
            </div>
        </div>
        <form class="form-horizontal" id="_prof_assign_form" name="_prof_assign_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="order_idx" value="{{ $pkginfo['OrderIdx'] }}"/>
            <input type="hidden" name="order_prod_idx" value="{{ $pkginfo['OrderProdIdx'] }}"/>
            <input type="hidden" name="prod_code" value="{{ $pkginfo['ProdCode'] }}"/>
            <input type="hidden" name="prod_code_sub" value=""/>
        <div class="lineTabs lecListTabs c_both">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
                <li><a href="#leclist1" class="on">필수과목</a><span class="row-line">|</span></li>
                <li><a href="#leclist2">선택과목</a></li>
            </ul>
            <div id="leclist1" class="tabContent">
@if(empty($sublec['ess']) === false)
                <div class="lec-info bd-none pt-zero">
                    <h5>{{ $sublec['ess'][0]['CourseName'] }}</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>
                            <tr class="replyList willbes-Open-Table hover">
                                <td>{{ $sublec['ess'][0]['SubjectName'] }}</td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List" style="display:table-row;">
                                <td class="w-data tx-left" colspan="2">
    @php
        $prev_course_idx = $sublec['ess'][0]['CourseIdx'];
        $prev_subject_idx = $sublec['ess'][0]['SubjectIdx'];
    @endphp
    @foreach($sublec['ess'] as $key => $row)
        @if($prev_course_idx != $row['CourseIdx'])
            @php
                $prev_course_idx = $row['CourseIdx'];
                $prev_subject_idx = $row['SubjectIdx'];
            @endphp
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="lec-info bd-none pt-zero">
                    <h5>{{ $row['CourseName'] }}</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>
                            <tr class="replyList willbes-Open-Table hover">
                                <td>
                                    {{ $row['SubjectName'] }}
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List" style="display:table-row;">
                                <td class="w-data tx-left" colspan="2">
        @elseif($prev_subject_idx != $row['SubjectIdx'])
            @php
                $prev_subject_idx = $row['SubjectIdx'];
            @endphp
                                </td>
                            </tr>
                            <tr class="replyList willbes-Open-Table hover">
                                <td>
                                    {{ $row['SubjectName'] }}
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List" style="display:table-row;">
                                <td class="w-data tx-left" colspan="2">
        @endif
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="chk">
                                                <label>[판매]</label>
                                                <input type="checkbox" name="prod_code_sub_ess_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}"
                                                       class="flat prod-code-sub essSubGroup-ess_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}" value="{{ $row['ProdCodeSub'] }}"
                                                       {{ in_array($row['ProdCodeSub'], $pkginfo['OrderSubProdCodes']) === true ? 'checked="checked"' : '' }}
                                                       {{ $row['IsChoice'] == 'Y' ? '' : 'Disabled' }}
                                                       onclick="checkOnly('.essSubGroup-ess_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}', this.value);" />
                                            </span>
                                            <span class="ml10 tx14">{{ $row['wProfName'] }}</span>
                                        </div>
                                        <div class="w-tit">
                                            {{ $row['StudyPatternCcdName'] }} | {{ $row['ProdNameSub'] }}
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] {{ $row['StudyStartDate'] }}~{{ $row['StudyEndDate'] }}<li>
                                            <li>[요일(회차)] {{ $row['WeekArrayName'] }}({{ $row['Amount'] }})<li>
                                            <li>[강사선택기간] {{ $row['ProfChoiceStartDate'] }}~{{ $row['ProfChoiceEndDate'] }}<li>
                                        </ul>
                                    </div>
    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
@endif
            </div>
            <div id="leclist2" class="tabContent">
@if(empty($sublec['choice']) === false)
                <div class="lec-info bd-none pt-zero">
                    <h5>{{ $sublec['choice'][0]['CourseName'] }}</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>
                            <tr class="replyList willbes-Open-Table hover">
                                <td>{{ $sublec['choice'][0]['SubjectName'] }}</td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List" style="display:table-row;">
                                <td class="w-data tx-left" colspan="2">
@php
    $prev_course_idx = $sublec['choice'][0]['CourseIdx'];
    $prev_subject_idx = $sublec['choice'][0]['SubjectIdx'];
@endphp
    @foreach($sublec['choice'] as $key => $row)
        @if($prev_course_idx != $row['CourseIdx'])
            @php
                $prev_course_idx = $row['CourseIdx'];
                $prev_subject_idx = $row['SubjectIdx'];
            @endphp
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="lec-info bd-none pt-zero">
                        <h5>{{ $row['CourseName'] }}</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <colgroup>
                                <col style="width: 87%;">
                                <col style="width: 13%;">
                            </colgroup>
                            <tbody>
                            <tr class="replyList willbes-Open-Table hover">
                                <td>
                                    {{ $row['SubjectName'] }}
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List" style="display:table-row;">
                                <td class="w-data tx-left" colspan="2">
        @elseif($prev_subject_idx != $row['SubjectIdx'])
            @php
                $prev_subject_idx = $row['SubjectIdx'];
            @endphp
                                </td>
                            </tr>
                            <tr class="replyList willbes-Open-Table hover">
                                <td>
                                    {{ $row['SubjectName'] }}
                                </td>
                                <td class="MoreBtn tx-center">></td>
                            </tr>
                            <tr class="willbes-Open-List" style="display:table-row;">
                                <td class="w-data tx-left" colspan="2">
        @endif
                                    <div class="w-data-pkg">
                                        <div class="w-info">
                                            <span class="chk">
                                                <label>[판매]</label>
                                                <input type="checkbox" name="prod_code_sub_choice_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}"
                                                       class="flat prod-code-sub essSubGroup-choice_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}" value="{{ $row['ProdCodeSub'] }}"
                                                       {{ in_array($row['ProdCodeSub'], $pkginfo['OrderSubProdCodes']) === true ? 'checked="checked"' : '' }}
                                                       {{ $row['IsChoice'] == 'Y' ? '' : 'Disabled' }}
                                                       onclick="checkOnly('.essSubGroup-choice_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}', this.value);" />
                                            </span>
                                            <span class="ml10 tx14">{{ $row['wProfName'] }}</span>
                                        </div>
                                        <div class="w-tit">
                                            {{ $row['StudyPatternCcdName'] }} | {{ $row['ProdNameSub'] }}
                                        </div>
                                        <ul class="w-info tx-gray mt10">
                                            <li>[개강일~종강일] {{ $row['StudyStartDate'] }}~{{ $row['StudyEndDate'] }}<li>
                                            <li>[요일(회차)] {{ $row['WeekArrayName'] }}({{ $row['Amount'] }})<li>
                                            <li>[강사선택기간] {{ $row['ProfChoiceStartDate'] }}~{{ $row['ProfChoiceEndDate'] }}<li>
                                        </ul>
                                    </div>
    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
@endif
            </div>
        </div>

        <div class="lec-btns w100p">
            <ul>
                <li><a href="javascript:;" onclick="$('#_prof_assign_form').submit();" class="btn-purple">적용</a></li>
            </ul>
        </div>
        </form>
        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->
    <script>
        $(document).ready(function() {
            var $_assign_form = $('#_prof_assign_form');

            $_assign_form.submit(function() {
@if(empty($sublec['ess']) == false) {{-- 필수과목 --}}
    @foreach($sublec['ess'] as $row)
        @if($row['IsChoice'] == 'Y') {{-- 선택가능일때 과목별로 1개씩 선택 --}}

                if($('input[name^=prod_code_sub_ess_{{$row['CourseIdx']}}_{{$row['SubjectIdx']}}]:checked').length != 1){
                    alert("필수과목 {{$row['CourseName']}} 과정의 {{$row['SubjectName']}} 과목을 선택해주십시요.");
                    return;
                }
        @endif
    @endforeach
@endif
@if(empty($sublec['choice']) == false) {{-- 선택과목 --}}
    @foreach($sublec['choice'] as $row)
        @if($row['IsChoice'] == 'Y') {{-- 선택가능 --}}
            @if($pkginfo['PackSelCount'] > 0) {{-- 선택과목 갯수가 있을때 코스별로 갯수 선택 --}}

                if($('input[name^=prod_code_sub_choice_{{$row['CourseIdx']}}]:checked').length != {{$pkginfo['PackSelCount']}}){
                    alert("선택과목 {{$row['CourseName']}} 과정을 {{$pkginfo['PackSelCount']}}개 선택해주십시요.");
                    return;
                }
            @else {{-- 선택과목 갯수가 없을때 과목별로 1개씩 선택 --}}

                if($('input[name^=prod_code_sub_choice_{{$row['CourseIdx']}}_{{$row['SubjectIdx']}}]:checked').length != 1){
                    alert("선택과목 {{$row['CourseName']}} 과정의 {{$row['SubjectName']}} 과목을 선택해주십시요.");
                    return;
                }
            @endif
        @endif
    @endforeach
@endif

                var _url = '{{ front_url('/classroom/off/AssignProfStore') }}';
                var prod_code_sub = '';

                $_assign_form.find('.prod-code-sub').each(function() {
                    if($(this).is(':checked') === true && $(this).is(':enabled') === true) {
                        prod_code_sub += ',' + $(this).val();
                    }
                });
                $_assign_form.find('input[name="prod_code_sub"]').val(prod_code_sub.substr(1));

                var data = $_assign_form.serialize();

                if(prod_code_sub == ""){
                    alert("강사 선택기간이 아니거나 선택하지 않은 강사가 있습니다.");
                    return;
                }

                sendAjax(_url,
                    data,
                    function(d){
                        alert(d.ret_msg);
                        location.replace('{{front_url('/classroom/off/ongoing')}}')
                    },
                    function(ret, status){
                        alert(ret.ret_msg);
                    }, true, 'POST', 'json');

            });
        });

    </script>
@stop