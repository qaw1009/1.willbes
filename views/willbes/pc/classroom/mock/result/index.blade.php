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
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 온라인모의고사 응시
                </div>
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                - 내강의실 > 모의고사관리 > 온라인모의고사 응시메뉴에서 정답제출을 처리한 모의고사의 성적 결과만 확인 가능합니다.<br/>
                                - 성적결과는 오프라인 시험응시일이 마감된 이후 3~5일 안에 제공됩니다.<br/>
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
                                <col style="width: 60px;">
                                <col style="width: 70px;">
                                <col style="width: 90px;">
                                <col style="width: 200px;">
                                <col style="width: 70;">
                                <col style="width: 70px;">
                                <col style="width: 85px;">
                                <col style="width: 95px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></li></th>
                                <th>과정<span class="row-line">|</span></li></th>
                                <th>응시분야<span class="row-line">|</span></li></th>
                                <th>시험응시일<span class="row-line">|</span></li></th>
                                <th>모의고사명<span class="row-line">|</span></li></th>
                                <th>총점<span class="row-line">|</span></li></th>
                                <th>평균<span class="row-line">|</span></li></th>
                                <th>성적표</th>
                                <th>부록</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($list) === true)
                                <tr>
                                    <td class="w-list tx-center" colspan="9">등록된 내용이 없습니다.</td>
                                </tr>
                            @else
                                @foreach($list as $row)
                                    <tr>
                                        <td class="w-no">{{$paging['rownum']}}</td>
                                        <td class="w-process">{{ $row['SiteName'] }}</td>
                                        <td class="w-type">{{ $row['CateName'] }}</td>
                                        <td class="w-date">{{ substr($row['Wdate'],0,10) }}</td>
                                        <td class="w-list">
                                            {{hpSubString($row['ProdName'],0,40,'...')}}
                                        </td>
                                        <td class="w-t-grade">{{ $row['TCNT'] }}</td>
                                        <td class="w-average">
                                            {{ round($row['TCNT'] / $row['KCNT'], 2) }}
                                        </td>
                                        @if($row['IsDisplay'] == 'Y')
                                            <td class="w-report tx-red"><a href="javascript:popwin({{ $row['ProdCode'] }})">[성적확인]</a></td>
                                        @else
                                        <td class="w-report">집계중</td>
                                        @endif
                                        <td class="w-file on tx-blue">
                                            @if($row['IsDisplay'] == 'Y')
                                                <a href="#none" onclick="openWin('EXAMPASS')">[문제/해설]</a><br>
                                                <a href="//www.local.willbes.net/home/html/answerNote" onclick="window.open(this.href, '_blank', 'width=980, height=845, scrollbars=yes, resizable=yes' ); return false">[오답노트]</a>
                                            @else
                                            @endif
                                        </td>
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
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
        <!-- End Container -->
        <script>
            var win = '';
            function popwin(prodcode){

                if (win == '') {
                    var _url = '{{ front_url('/classroom/MockResult/winStatTotal?prodcode=') }}' + prodcode;
                    win = window.open(_url, 'mockPopupStat', 'width=980, height=845, scrollbars=yes, resizable=yes');
                    win.focus();
                }else{
                    if(win.closed){
                        var _url = '{{ front_url('/classroom/MockResult/winStatTotal?prodcode=') }}' + prodcode;
                        win = window.open(_url, 'mockPopupStat', 'width=980, height=845, scrollbars=yes, resizable=yes');
                        win.focus();
                    } else {
                        //alert('팝업떠있음');
                    }
                }

            }

        </script>
@stop