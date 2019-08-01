@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Mocktest INFOZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 정오표
                </div>
            </div>

            <div class="willbes-Mypage-Tabs mt10">
                <ul class="tabMock three">
                    @include('willbes.pc.site.mocktest.tab_menu_partial')
                </ul>
                <div class="LeclistTable">
                    <div class="willbes-Mock-Subject NG">
                        · 정오표
                        <div class="subBtn mock black f_right"><a href="{{front_url('/mockTest/board/cate/'.$__cfg['CateCode'])}}">전체 모의고사 목록</a></div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 210px;">
                            <col style="width: 490px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>응시분야<span class="row-line">|</span></th>
                            <th>직렬<span class="row-line">|</span></th>
                            <th>모의고사명<span class="row-line">|</span></th>
                            <th>정오표</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-type">{{$prod_data['CateName']}}</td>
                            <td class="w-col">{{implode(',',$prod_data['MockPartName'])}}</td>
                            <td class="w-list tx-left pl20">{{$prod_data['ProdName']}}</td>
                            <td class="w-graph">{{$prod_data['noticeCnt']}} 개</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <form id="url_form" name="url_form" method="GET">
                    @foreach($arr_input as $key => $val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                    @endforeach
                </form>
                <div class="willbes-Leclist mt60 c_both">
                    <div class="willbes-Lec-Selected tx-gray">
                        <div class="willbes-Lec-Search GM f_right" style="margin: 0;">
                            <div class="inputBox p_re">
                                <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요">
                                <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value)" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 65px;">
                                <col style="width: 645px;">
                                <col style="width: 105px;">
                                <col style="width: 125px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>제목<span class="row-line">|</span></th>
                                <th>첨부<span class="row-line">|</span></th>
                                <th>작성일</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($list) === true)
                                <tr>
                                    <td class="w-list" colspan="4">등록된 게시글이 없습니다.</td>
                                </tr>
                            @endif

                            @foreach($list as $row)
                                <tr>
                                    <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_notice.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                    <td class="w-list tx-left pl20">
                                        <a href="{{front_url('/mockTest/showNotice/cate/'.$def_cate_code.'?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                                            @if($row['IsBest'] == '1')<strong>@endif{{hpSubString($row['Title'],0,40,'...')}}@if($row['IsBest'] == '1')</strong>@endif
                                        </a>
                                    </td>
                                    <td class="w-file">
                                        @if(empty($row['AttachData']) === false)
                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                        @endif
                                    </td>
                                    <td class="w-date">{{$row['RegDatm']}}</td>
                                </tr>
                                @php $paging['rownum']-- @endphp
                            @endforeach
                            </tbody>
                        </table>
                        {!! $paging['pagination'] !!}
                    </div>
                </div>
            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop