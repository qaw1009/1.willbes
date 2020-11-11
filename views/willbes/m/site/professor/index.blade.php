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

    {{-- 카테고리 or 과목 선택 --}}
    @if(isset($arr_base) === true)
        <ul class="Lec-Selected NG tx-gray">
            @if(isset($arr_base['category']) === true)
                <li>
                    <select id="cate_code" name="cate_code" title="카테고리선택" onchange="goUrl('cate_code', this.value);">
                        @foreach($arr_base['category'] as $idx => $row)
                            <option value="{{ $row['CateCode'] }}" @if($def_cate_code == $row['CateCode']) selected="selected" @endif>{{ $row['CateName'] }}</option>
                        @endforeach
                    </select>
                </li>
            @endif

            @if(isset($arr_base['subject']) === true)
                <li>
                    <select id="subject_idx" name="subject_idx" title="과목선택" onchange="goUrl('subject_idx', this.value);">
                        <option value="">과목전체</option>
                    @foreach($arr_base['subject'] as $idx => $row)
                        <option value="{{ $row['SubjectIdx'] }}" @if(element('subject_idx', $arr_input) == $row['SubjectIdx']) selected="selected" @endif>{{ $row['SubjectName'] }}</option>
                    @endforeach
                    </select>
                </li>
            @endif
        </ul>
    @endif

    {{-- 교수 리스트 (v1 : 과목별, v2 : 카테고리별) --}}
    <div class="profArea">
        @foreach($data['group'] as $group_code => $group_name)
            <div class="subjectBox">
                <div class="subTitle">· {{ $group_name }}</div>
                <ul>
                {{-- 교수 리스트 loop --}}
                @foreach($data['list'][$group_code] as $idx => $row)
                    {{-- 교수상세 페이지 URL --}}
                    @if($__cfg['IsPassSite'] === true || $view_type == 'v2')
                        @php $show_url = '/professor/show/prof-idx/' . $row['ProfIdx'] . '?cate_code=' . $row['CateCode'] . '&'; @endphp
                    @else
                        @php $show_url = '/professor/show/cate/' . $row['CateCode'] . '/prof-idx/' . $row['ProfIdx'] . '?'; @endphp
                    @endif
                    <li>
                        <a href="{{ front_url($show_url . 'subject_idx=' . $row['SubjectIdx'] . '&subject_name=' . rawurlencode($row['SubjectName'])) }}">
                            <img src="{{ $row['ProfReferData']['prof_index_img'] or '' }}" alt="">
                            <div>
                                @if($view_type == 'v2')
                                    <span class="tx-light-gray tx14 pb15" style="margin-top: -15px;">{!! $row['ProfSlogan'] !!}</span>
                                @endif
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
