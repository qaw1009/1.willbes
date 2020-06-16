@extends('willbes.m.layouts.master')

@section('page_title', '교수진소개')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <form id="url_form" name="url_form" method="GET">
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
    </form>

    @if(isset($arr_base['subject']) === true)
        <ul class="Lec-Selected NG tx-gray">
            <li>
                <select id="subject_idx" name="subject_idx" title="과목선택" onchange="goUrl('subject_idx', this.value);">
                    <option value="">과목전체</option>
                @foreach($arr_base['subject'] as $idx => $row)
                    <option value="{{ $row['SubjectIdx'] }}" @if(element('subject_idx', $arr_input) == $row['SubjectIdx']) selected="selected" @endif>{{ $row['SubjectName'] }}</option>
                @endforeach
                </select>
            </li>
        </ul>
    @endif

    {{-- 과목별 교수 리스트 --}}
    <div class="profArea">
        @foreach($data['subjects'] as $subject_idx => $subject_name)
            <div class="subjectBox">
                <div class="subTitle">· {{ $subject_name }}</div>
                <ul>
                {{-- 교수 리스트 loop --}}
                @foreach($data['list'][$subject_idx] as $idx => $row)
                    {{-- 교수상세 페이지 URL --}}
                    @if($__cfg['IsPassSite'] === false)
                        @php $show_url = '/professor/show/cate/' . $def_cate_code . '/prof-idx/' . $row['ProfIdx'] . '?'; @endphp
                    @else
                        @php $show_url = '/professor/show/prof-idx/' . $row['ProfIdx'] . '?cate_code=' . $def_cate_code . '&'; @endphp
                    @endif
                    <li>
                        <a href="{{ front_url($show_url . 'subject_idx=' . $subject_idx) }}">
                            <img src="{{ $row['ProfReferData']['prof_index_img'] or '' }}" alt="{{ $row['ProfNickName'] }}">
                            <div>
                                <span>{{ $row['ProfNickName'] }}</span>
                                {{ $row['AppellationCcdName'] }}
                            </div>
                        </a>
                    <li>
                @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->
<script type="text/javascript">
</script>
@stop
