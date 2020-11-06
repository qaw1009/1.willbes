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
    @if(isset($arr_base['category']) === true || isset($arr_base['subject']) === true)
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

    {{-- 과목별 교수 리스트 --}}
    <div class="profArea">
        @foreach($data['subjects'] as $subject_idx => $subject_name)
            <div class="subjectBox">
                <div class="subTitle">· {{ $subject_name }}</div>
                <ul>
                {{-- 교수 리스트 loop --}}
                @foreach($data['list'][$subject_idx] as $idx => $row)
                    {{-- 교수상세 페이지 URL --}}
                    @if($__cfg['IsPassSite'] === true || empty($__cfg['CateCode']) === true)
                        @php $show_url = '/professor/show/prof-idx/' . $row['ProfIdx'] . '?cate_code=' . $def_cate_code . '&'; @endphp
                    @else
                        @php $show_url = '/professor/show/cate/' . $def_cate_code . '/prof-idx/' . $row['ProfIdx'] . '?'; @endphp
                    @endif
                    <li>

                        <a href="{{ front_url($show_url . 'subject_idx=' . $subject_idx) }}">
                            <img src="{{ $row['ProfReferData']['prof_index_img'] or '' }}" alt="{{ $row['ProfNickName'] }}">
                            <div @if($__cfg['SiteGroupCode'] == '2011') style="top:12px" @endif>
                                @if($__cfg['SiteGroupCode'] == '2011')
                                    <span style="color:gray">교수관리에 등록된 슬로건</span>
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
