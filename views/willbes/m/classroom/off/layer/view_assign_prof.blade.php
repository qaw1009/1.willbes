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
                    강사선택현황
                </div>
            </div>
        </div>

        <div class="willbes-Txt2 NGR tx-blue">
            {{$pkginfo['ProdName']}}
        </div>

        <ul class="paymentTxt NGR">
            <li>최종 선택한 과목 및 강사에 대한 현황을 확인하실 수 있습니다. </li>
        </ul>

        <div class="lineTabs lecListTabs c_both">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
                <li><a href="#leclist1" class="on">필수과목</a><span class="row-line">|</span></li>
                <li><a href="#leclist2">선택과목</a></li>
            </ul>
            <div id="leclist1" class="tabContent">
                <div class="lec-info bd-none pt-zero">
@if(empty($sublec['ess']) === false)
                    {{-- 과정시작 --}}
                    <h5>{{ $sublec['ess'][0]['CourseName'] }}</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <colgroup>
                                <col style="width: 100%;">
                            </colgroup>
                            <tbody>
                            <tr class="replyList willbes-Open-Table">
                                <td>{{ $sublec['ess'][0]['SubjectName'] }}</td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
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
                        {{-- 과정시작 --}}
                        <h5>{{ $row['CourseName'] }}</h5>
                        <div class="lec-choice-pkg">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                                <colgroup>
                                    <col style="width: 100%;">
                                </colgroup>
                                <tbody>
                                <tr class="replyList willbes-Open-Table">
                                    <td>{{ $row['SubjectName'] }}</td>
                                </tr>
                                <tr>
                                    <td class="w-data tx-left">
        @elseif($prev_subject_idx != $row['SubjectIdx'])
            @php
                $prev_subject_idx = $row['SubjectIdx'];
            @endphp
                                    </td>
                                </tr>
                                {{-- 과목시작 --}}
                                <tr class="replyList willbes-Open-Table">
                                    <td>{{ $row['SubjectName'] }}</td>
                                </tr>
                                <tr>
                                    <td class="w-data tx-left">
        @endif
                                        {{-- row --}}
                                        <div class="w-data-pkg">
                                            <div class="w-info">
                                                <span class="tx14">{{ $row['wProfName'] }} </span>
                                            </div>
                                            <div class="w-tit">
                                                {{ $row['StudyPatternCcdName'] }} | {{ $row['ProdNameSub'] }}
                                            </div>
                                            <ul class="w-info tx-gray mt10">
                                                <li>[개강일~종강일] {{ $row['StudyStartDate'] }}~{{ $row['StudyEndDate'] }}<li>
                                                <li>[요일(회차)] {{ $row['WeekArrayName'] }}({{ $row['Amount'] }})<li>
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
                <div class="lec-info bd-none pt-zero">
@if(empty($sublec['choice']) === false)
                        {{-- 과정시작 --}}
                        <h5>{{ $sublec['choice'][0]['CourseName'] }}</h5>
                        <div class="lec-choice-pkg">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                                <colgroup>
                                    <col style="width: 100%;">
                                </colgroup>
                                <tbody>
                                <tr class="replyList willbes-Open-Table">
                                    <td>{{ $sublec['choice'][0]['SubjectName'] }}</td>
                                </tr>
                                <tr>
                                    <td class="w-data tx-left">
    @php
        $prev_course_idx = $sublec['choice'][0]['CourseIdx'];
        $prev_subject_idx = $sublec['choice'][0]['SubjectIdx'];
    @endphp
    @foreach($sublec['choice'] as $key => $row)
        @if($prev_course_idx !== $row['CourseIdx'])
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
                    {{-- 과정시작 --}}
                    <h5>{{ $row['CourseName'] }}</h5>
                    <div class="lec-choice-pkg">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                            <colgroup>
                                <col style="width: 100%;">
                            </colgroup>
                            <tbody>
                            <tr class="replyList willbes-Open-Table">
                                <td>{{ $row['SubjectName'] }}</td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
        @elseif($prev_subject_idx != $row['SubjectIdx'])
            @php
                $prev_subject_idx = $row['SubjectIdx'];
            @endphp
                                    </td>
                                </tr>
                                {{-- 과목시작 --}}
                                <tr class="replyList willbes-Open-Table">
                                    <td>{{ $row['SubjectName'] }}</td>
                                </tr>
                                <tr>
                                    <td class="w-data tx-left">
        @endif
                                        {{-- row --}}
                                        <div class="w-data-pkg">
                                            <div class="w-info">
                                                <span class="tx14">{{ $row['wProfName'] }} </span>
                                            </div>
                                            <div class="w-tit">
                                                {{ $row['StudyPatternCcdName'] }} | {{ $row['ProdNameSub'] }}
                                            </div>
                                            <ul class="w-info tx-gray mt10">
                                                <li>[개강일~종강일] {{ $row['StudyStartDate'] }}~{{ $row['StudyEndDate'] }}<li>
                                                <li>[요일(회차)] {{ $row['WeekArrayName'] }}({{ $row['Amount'] }})<li>
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
                <li><a href="javascript:;" onclick="history.go(-1);" class="btn-purple">확인</a></li>
            </ul>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->
@stop