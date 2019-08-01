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
                    · 모의고사
                </div>
            </div>

            <div class="willbes-Mypage-Tabs mt10">
                <ul class="tabMock three">
                    @include('willbes.pc.site.mocktest.tab_menu_partial')
                </ul>
                <div class="LeclistTable">
                    <div class="willbes-Mock-Subject NG">
                        · 이의제기
                        <div class="subBtn mock black f_right"><a href="{{front_url('/mockTest/board/cate/'.$__cfg['CateCode'])}}">전체 모의고사 목록</a></div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 150px;">
                            <col style="width: 610px;">
                            <col style="width: 180px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>응시분야<span class="row-line">|</span></th>
                            <th>모의고사명<span class="row-line">|</span></th>
                            <th>이의제기</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-type">{{$prod_data['CateName']}}</td>
                            <td class="w-list tx-left pl20">{{$prod_data['ProdName']}}</td>
                            <td class="w-graph">{{$prod_data['qnaTotalCnt']}} 개</td>
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
                        <select id="s_take_mock_part" name="s_take_mock_part" title="직렬" class="seleProcess" onchange="goUrl('s_take_mock_part',this.value)">
                            <option value="">직렬</option>
                            @foreach($mock_part as $row)
                                <option value="{{$row['Ccd']}}" @if($row['Ccd'] == element('s_take_mock_part', $arr_input)) selected="selected" @endif>{{$row['CcdName']}}</option>
                            @endforeach
                        </select>
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
                                <col style="width: 50px;">
                                <col style="width: 100px;">
                                <col style="width: 500px;">
                                <col style="width: 90px;">
                                <col style="width: 110px;">
                                <col style="width: 90px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>직렬<span class="row-line">|</span></th>
                                <th>제목<span class="row-line">|</span></th>
                                <th>작성자<span class="row-line">|</span></th>
                                <th>작성일<span class="row-line">|</span></th>
                                <th>답변상태</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($list) === true)
                                <tr>
                                    <td class="w-list" colspan="6">등록된 게시글이 없습니다.</td>
                                </tr>
                            @endif

                            @foreach($list as $row)
                                <tr>
                                    <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_notice.gif') }}">@else{{$paging['rownum']}}@endif</td>
                                    <td class="w-type">{{$row['TakeMockPart_Name']}}</td>
                                    <td class="w-list tx-left pl20">
                                        @if($row['RegType'] == '0' && $row['IsPublic'] == 'N' && $row['RegMemIdx'] != sess_data('mem_idx'))
                                            <a href="javascript:alert('비밀글입니다.');">
                                        @else
                                            <a href="{{front_url('/mockTest/showQna/cate/'.$def_cate_code.'?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                                        @endif
                                                @if($row['IsBest'] == 0 && $row['IsPublic'] == 'N')<img src="{{ img_url('prof/icon_locked.gif') }}">@endif
                                                {{hpSubString($row['Title'],0,40,'...')}}
                                                @if($row['RegDatm'] == date('Y-m-d'))<img src="{{ img_url('prof/icon_N.gif') }}">@endif
                                                @if(empty($row['AttachData']) === false)<img src="{{ img_url('prof/icon_file.gif') }}">@endif
                                            </a>
                                    </td>
                                    <td class="w-write">{!! $row['RegMemIdx'] == sess_data('mem_idx') ? $row['RegName'] : hpSubString($row['RegName'],0,2,'*') !!}</td>
                                    <td class="w-date">{{$row['RegDatm']}}</td>
                                    <td class="w-answer">
                                        @if($row['IsBest'] == 0)
                                            @if($row['ReplyStatusCcd'] == '621004')
                                                <span class="aBox answerBox NSK">답변완료</span>
                                            @else
                                                <span class="aBox waitBox NSK">답변대기</span>
                                            @endif
                                        @endif
                                    </td>
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