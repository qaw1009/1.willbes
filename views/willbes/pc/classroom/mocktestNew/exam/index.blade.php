@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-TESTZONE c_both">
                @include('willbes.pc.classroom.mocktestNew.tab_menu_partial')
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                - 온라인 응시기간 및 지정된 시간에만 응시가 가능하오니 시험기간을 엄수해 주세요.<br/>
                                - 임의로 시험을 중단하거나 임시저장만 한 상태에서 시험 종료 시, 시험결과를 확인할 수 없습니다.<br/>
                                - 모의고사 응시 창에서 응시 후, 답안지는 모두 체크하셔야 답안 제출이 가능합니다.<br/>
                                &nbsp; (답안을 제출해야만 성적결과를 확인할 수 있습니다.)
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-TESTZONE -->

            <div class="willbes-Leclist c_both mt60">
                <form id="url_form" name="url_form" method="GET">

                    <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="s_IsStatus" name="s_is_take" title="all" class="seleAll mr10 h30 f_left"  onchange="goUrl('s_is_take', document.getElementById('s_is_take').value);">
                            <option value="" {{ element('s_is_take', $arr_input) == '' ? 'selected':''}}>응시상태</option>
                            <option value="N" {{ element('s_is_take', $arr_input) == 'N' ? 'selected':''}}>미응시</option>
                            <option value="Y" {{ element('s_is_take', $arr_input) == 'Y' ? 'selected':''}}>응시완료</option>
                        </select>
                    </span>

                        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" value="{{ element('s_keyword', $arr_input) }}" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                        <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </span>
                    </div>

                    <div class="LeclistTable pointTable">
                        <table id="list_table" cellspacing="0" cellpadding="0" class="listTable testTable under-gray bdt-gray tx-gray">
                            <colgroup>
                                <col style="width: 60px;">
                                <col style="width: 70px;">
                                <col style="width: 90px;">
                                <col style="width: 150px;">
                                <col style="width: 250px;">
                                <col style="width: 90px;">
                                <col style="width: 130px;">
                                <col style="width: 120px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>과정<span class="row-line">|</span></th>
                                <th>응시분야<span class="row-line">|</span></th>
                                <th>시험응시일<span class="row-line">|</span></th>
                                <th>모의고사명<span class="row-line">|</span></th>
                                <th>응시상태<span class="row-line">|</span></th>
                                <th>나의응시일<span class="row-line">|</span></th>
                                <th>응시하기</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($list) === true)
                                <tr>
                                    <td class="w-list tx-center" colspan="8">등록된 내용이 없습니다.</td>
                                </tr>
                            @else
                                @foreach($list as $row)
                                    <tr>
                                        <td class="w-no">{{$paging['rownum']}}</td>
                                        <td class="w-process">{{ $row['SiteName'] }}</td>
                                        <td class="w-type">{{ $row['CateName'] }}</td>
                                        <td class="w-date">@if(empty($row['TakeStartDatm']) === false) {{ $row['TakeStartDatm'] }} ~ {{ $row['TakeEndDatm'] }} @else 상시 @endif</td>
                                        <td class="w-list">
                                            {{hpSubString($row['ProdName'],0,40,'...')}}
                                        </td>
                                        <td class="w-state">@if($row['IsTake'] == 'Y') 응시 @else 미응시 @endif</td>
                                        <td class="w-dday">
                                            @if(empty($row['IsDate']) === false) {{ $row['IsDate'] }} @else @endif
                                        </td>
                                        @if($row['IsTake'] == 'N' && ($row['TakeStartDatm'] < date('Y-m-d H:i:s') && $row['TakeEndDatm'] > date('Y-m-d H:i:s')))
                                        <td class="w-btn tx-red">
                                            <a class="bg-blue bd-dark-blue NSK" href="javascript:popwin('{{$row['ProdCode']}}','{{$row['MrIdx']}}')" onclick="">응시하기 </a>
                                        </td>
                                        @else
                                            @if($row['TakeStartDatm'] > date('Y-m-d H:i:s'))
                                                <td class="w-btn tx-red">
                                                    <a class="bg-blue bd-dark-blue NSK" href="javascript:alert('응시기간 내에만 시험 응시가 가능합니다.');" onclick="">응시하기 </a>
                                                </td>
                                            @else
                                                @if($row['IsTake'] == 'Y')
                                                    <td class="w-btn tx-black">
                                                        응시완료
                                                    </td>
                                                @else
                                                    <td class="w-btn tx-red">
                                                        응시마감
                                                    </td>
                                                @endif
                                            @endif
                                        @endif
                                    </tr>
                                    @php $paging['rownum']-- @endphp
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                        <div class="Paging">
                            {!! $paging['pagination'] !!}
                        </div>
                    </div>
                </form>
            </div>

            <!-- willbes-Leclist -->
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
        <!-- End Container -->
        <script>
            var win = '';
            function popwin(prodcode, mridx){
                if (win == '') {
                    var _url = '{{ front_url('/classroom/mocktest/exam/winpopupstep1?prodcode=') }}' + prodcode + '&mridx=' + mridx;
                    win = window.open(_url, 'mockPopup', 'width=1200, height=845, scrollbars=yes, resizable=yes');
                    win.focus();
                }else{
                    if(win.closed){
                        var _url = '{{ front_url('/classroom/mocktest/exam/winpopupstep1?prodcode=') }}' + prodcode+ '&mridx=' + mridx;
                        win = window.open(_url, 'mockPopup', 'width=1200, height=845, scrollbars=yes, resizable=yes');
                        win.focus();
                    } else {
                        //alert('팝업떠있음');
                    }
                }

            }

        </script>
@stop