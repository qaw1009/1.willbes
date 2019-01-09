@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Mypage-EVTZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 특강&이벤트 신청현황
                </div>
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                <div class="Tit">특강&이벤트 신청현황</div>
                                - 특강/이벤트/설명회 페이지에서 '신청하기'버튼으로 직접 신청한 현황을 확인할 수 있습니다.(댓글등록제외)<br/>
                                - 특강&이벤트정보 클릭시 상세내용을 확인할 수 있습니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>
            <div class="willbes-Leclist c_both mt60">
                @php $arr_search_text = explode(':', base64_decode(element('search_text', $arr_input)), 3) @endphp
                <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                <span class="w-data">
                        기간검색 &nbsp;
                        <input type="text" id="search_start_date" name="search_start_date" value="{{ element('0', $arr_search_text) }}" title="검색시작일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/> ~&nbsp;
                        <input type="text" id="search_end_date" name="search_end_date" value="{{ element('1', $arr_search_text) }}" title="검색종료일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/>
                    </span>
                    <span class="w-month">
                        <ul>
                            <li><a class="btn-set-search-date" data-period="0-all">전체</a></li>
                            <li><a class="btn-set-search-date" data-period="3-months">3개월</a></li>
                            <li><a class="btn-set-search-date" data-period="6-months">6개월</a></li>
                        </ul>
                    </span>
                </span>
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="search_value" name="search_value" class="labelSearch" placeholder="이벤트명을 검색해 주세요" maxlength="30" style="width: 270px;" value="{{ element('2', $arr_search_text) }}">
                            <button type="button" class="search-Btn" id="btn_search">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="willbes-LecreplyList tx-gray c_both">
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                    <select id="search_site_group" name="search_site_group" title="과정" class="seleProcess f_left" onchange="goUrl('search_site_group',this.value)">
                        <option value="">과정</option>
                        @foreach($arr_base['arr_site_group'] as $key => $val)
                            <option value="{{$key}}" @if(element('search_site_group', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                        @endforeach
                    </select>
                    <select id="search_is_pass" name="search_is_pass" title="구분" class="seleAcad ml10 f_left" onchange="goUrl('search_is_pass',this.value)">
                        <option value="">구분</option>
                        <option value="N" @if(element('search_is_pass', $arr_input) == 'N')selected="selected"@endif>온라인</option>
                        <option value="Y" @if(element('search_is_pass', $arr_input) == 'Y')selected="selected"@endif>학원</option>
                    </select>
                    @if(empty($arr_base['arr_campus']) === false)
                        <select id="search_campus" name="search_campus" title="캠퍼스" class="seleCampus ml10 f_left" onchange="goUrl('search_campus',this.value)">
                            <option value="">캠퍼스</option>
                            @foreach($arr_base['arr_campus'] as $key => $val)
                                <option value="{{$key}}" @if(element('search_campus', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    @endif
                </span>
                </div>
                <div class="LeclistTable orderTable">
                    <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                        <colgroup>
                            <col style="width: 70px;">
                            <col style="width: 140px;">
                            <col style="width: 600px;">
                            <col style="width: 130px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>NO<span class="row-line">|</span></th>
                            <th colspan="2">특강&이벤트 정보<span class="row-line">|</span></th>
                            <th>신청일</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(empty($list) === true)
                            <tr>
                                <td class="w-list tx-center" colspan="4">등록된 내용이 없습니다.</td>
                            </tr>
                        @endif
                        @foreach($list as $row)
                            <tr>
                                <td class="w-no">{{$paging['rownum']}}</td>
                                <td class="w-img">
                                    <img src="{{$row['FileFullPath'] . $row['FileName']}}">
                                </td>
                                <td class="w-data tx-left pl10">
                                    <dl class="w-info">
                                        <dt>
                                            {{$row['SiteGroupName']}}<span class="row-line">|</span>
                                            {{$row['OnOffTypeName']}}
                                        </dt>
                                    </dl><br/>
                                    <div class="w-tit">
                                        <strong><span class="tx-light-blue">[{{$row['RequstTypeName']}}]</span> {{$row['EventName']}}</strong>
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>접수기간 : {{$row['RegisterStartDate']}}~{{$row['RegisterEndDate']}}</dt>
                                    </dl>
                                </td>
                                <td class="w-date">{{$row['MemRegDatm']}}</td>
                            </tr>
                            @php $paging['rownum']-- @endphp
                        @endforeach
                        </tbody>
                    </table>
                    {!! $paging['pagination'] !!}
                </div>
            </div>
        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            // 검색어 입력 후 엔터
            $('#search_value').on('keyup', function() {
                if (window.event.keyCode === 13) {
                    goSearch();
                }
            });

            // 검색 버튼 클릭
            $('#btn_search').on('click', function() {
                goSearch();
            });

            var goSearch = function() {
                goUrl('search_text', Base64.encode(document.getElementById('search_start_date').value + ':' + document.getElementById('search_end_date').value + ':' + document.getElementById('search_value').value));
            };
        });
    </script>
@stop