@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
    · 공지사항
    <div class="willbes-Lec-Search GM f_right">
        <form id="url_form" name="url_form" method="GET">
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
        </form>
        <div class="inputBox p_re">
            <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" value="{{ element('s_keyword', $arr_input) }}" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
            <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                <span>검색</span>
            </button>
        </div>
    </div>
</div>

<!-- List -->
<div class="willbes-Leclist c_both">
    <div class="LeclistTable">
        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
            <colgroup>
                <col style="width: 65px;">
                <col style="width: 445px;">
                <col style="width: 65px;">
                <col style="width: 100px;">
                <col style="width: 90px;">
            </colgroup>
            <thead>
            <tr>
                <th>No<span class="row-line">|</span></th>
                <th>제목<span class="row-line">|</span></th>
                <th>첨부<span class="row-line">|</span></th>
                <th>작성일<span class="row-line">|</span></th>
                <th>조회수</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($list) === true)
                <tr>
                    <td class="w-list tx-center" colspan="5">등록된 내용이 없습니다.</td>
                </tr>
            @else
                @foreach($list as $row)
                    <tr class="{{($row['IsBest'] == 1) ? 'strong' : ''}}">
                        <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}">@else{{$paging['rownum']}}@endif</td>
                        <td class="w-list tx-left pl20">
                            <a href="{{site_url($default_path.'/notice/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                                {{hpSubString($row['Title'],0,40,'...')}}
                            </a>
                        </td>
                        <td class="w-file">
                            @if(empty($row['AttachData']) === false)
                                <img src="{{ img_url('prof/icon_file.gif') }}">
                            @endif
                        </td>
                        <td class="w-date">{{$row['RegDatm']}}</td>
                        <td class="w-click">{{$row['TotalReadCnt']}}</td>
                    </tr>
                    @php $paging['rownum']-- @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        {!! $paging['pagination'] !!}
    </div>
</div>
<!-- End Container -->
@stop