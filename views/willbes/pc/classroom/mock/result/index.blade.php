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

                    <div class="willbes-LecreplyList tx-gray c_both">
                        <ul class="widthAutoFull">
                            <li class="f_left">
                                지난 모의고사 성적결과 보기
                                <a href="javascript:popCross(1);" class="btnAuto95 bg-black tx-white tx-center h30 d_inblock">경찰 ▶</a>
                                <a href="javascript:popCross(2);" class="btnAuto95 bg-black tx-white tx-center h30 d_inblock">공무원 ▶</a>
                            </li>
                            <li class="f_right">
                                <span class="willbes-Lec-Search">    
                                    <div class="inputBox p_re">
                                        <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" value="{{ element('s_keyword', $arr_input) }}" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                                        <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                                            <span>검색</span>
                                        </button>
                                    </div>
                                </span>
                            </li>
                        </ul>                
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
                                <col style="width: 95px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>과정<span class="row-line">|</span></th>
                                <th>응시분야<span class="row-line">|</span></th>
                                <th>시험응시일<span class="row-line">|</span></th>
                                <th>모의고사명<span class="row-line">|</span></th>
                                <th>총점<span class="row-line">|</span></th>
                                <th>평균<span class="row-line">|</span></th>
                                <th>성적표</th>
                                <th>부록</th>
                                <th>문제/해설</th>
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
                                        @if(substr($row['GradeOpenDatm'],0,10) <= date('Y-m-d')&&$row['gRegister']!=null)
                                            @if($row['TCNT']!=null)
                                                <td class="w-report tx-red"><a href="javascript:popwin({{ $row['ProdCode'] }}, 1, {{ $row['MrIdx'] }}, {{ $row['TCNT'] }})">[성적확인]</a></td>
                                            @else
                                                @if($row['TaKeFormsCcd'] == '690002')
                                                    <td>집계중</td>
                                                @else
                                                    <td>미제출</td>
                                                @endif
                                            @endif
                                        @else
                                        <td class="w-report">집계중</td>
                                        @endif
                                        <td class="w-file on tx-blue">
                                            @if(substr($row['GradeOpenDatm'],0,10) <= date('Y-m-d')&&$row['gRegister']!=null)

                                                @if($row['TCNT']!=null)
                                                    <a href="javascript:popwin({{ $row['ProdCode'] }}, 2, {{ $row['MrIdx'] }}, {{ $row['TCNT'] }})">[오답노트]</a>
                                                @else
                                                    <a href="javascript:popwin({{ $row['ProdCode'] }}, 2, {{ $row['MrIdx'] }}, 0)">[오답노트]</a>
                                                @endif
                                            @else
                                            @endif
                                        </td>
                                        <td>@if($row['MrIsStatus'] == 'Y') <a href="javascript:selQaFileAjax({{ $row['ProdCode'] }});">[문제/해설]</a><br> @endif</td>
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

            <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                <input type="hidden" id='prodcode' name="prodcode" />
            </form>


            <div id="EXAMPASS" class="willbes-Layer-PassBox abs willbes-Layer-PassBox450 h460 abs">
                <a class="closeBtn" href="#none" onclick="closeWin('EXAMPASS')">
                    <img src="/public/img/willbes/sub/close.png">
                </a>
                <div class="Layer-Tit tx-dark-black NG">문제/해설</div>
                <div class="lecMoreWrap pt20">
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable usertestTable examTable under-gray bdt-gray tx-gray GM">
                            <colgroup>
                                <col style="width: 33.33333333%;"/>
                                <col style="width: 33.33333333%;"/>
                                <col style="width: 33.33333333%;"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th class="Top">과목</th>
                                <th>문제</th>
                                <th>해설</th>
                            </tr>
                            </thead>
                            <tbody id="trArea">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- willbes-Layer-PassBox : 문제/해설 -->

        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
        <!-- End Container -->
        <script>
            var win = '';
            //시험제출유무
            var submissionYN = 'Y';
            function popwin(prodcode, mode, mridx, tcnt){

                if(tcnt == 0){
                    submissionYN = 'N';
                } else {
                    submissionYN = 'Y';
                }

                var _url = '';
                if(mode == 1){
                    _url = '{{ front_url('/classroom/MockResult/winStatTotal?prodcode=') }}' + prodcode + '&mridx=' + mridx;
                }else{
                    _url = '{{ front_url('/classroom/MockResult/winAnswerNote?prodcode=') }}' + prodcode + '&mridx=' + mridx + '&submission=' + submissionYN;
                }
                if (win == '') {
                    win = window.open(_url, 'mockPopupStat', 'width=1024, height=845, scrollbars=yes, resizable=yes');
                    win.focus();
                }else{
                    if(win.closed){
                        win = window.open(_url, 'mockPopupStat', 'width=1024, height=845, scrollbars=yes, resizable=yes');
                        win.focus();
                    } else {
                        //alert('팝업떠있음');
                    }
                }

            }

            function popCross(num){
                if(num == 1){
                    _url = 'http://c3.willbescop.net/mouigosa/stats/statsMock.html?M_USER_ID='+'{{ $userid }}';
                    win = window.open(_url, 'mockPopupRegasi', 'width=1024, height=845, scrollbars=yes, resizable=yes');
                    win.focus();
                } else {
                    _url = 'http://w1.willbesgosi.net/mouigosa/stats/statsMock.html?M_USER_ID='+'{{ $userid }}';
                    win = window.open(_url, 'mockPopupRegasi', 'width=1024, height=845, scrollbars=yes, resizable=yes');
                    win.focus();
                }
            }

            function selQaFileAjax(prodcode){
                $('#prodcode').val(prodcode);

                url = "{{ site_url("/classroom/MockResult/selQaFileAjax") }}";
                data = $('#regi_form').serialize();

                sendAjax(url,
                    data,
                    function(d){
                        var str = '';

                        for(var i=0; i < d.data.length; i++){
                            str += "<tr><td class='Top'>"+d.data[i].SubjectName+"</td>\n" +
                                       "<td><a class=\"downBtn\" href=\""+d.data[i].PFilePath+d.data[i].fileQ+"\" target='_blank'>다운로드</a></td>\n" +
                                       "<td><a class=\"downBtn\" href=\""+d.data[i].PFilePath+d.data[i].fileA+"\" target='_blank'>다운로드</a></td>\n" +
                                   "</tr>";
                            document.getElementById('EXAMPASS').style.display = "block";
                        }
                        $('#trArea').html(str);
                    },
                    function(ret, status){
                        alert(ret);
                    }, true, 'POST', 'json');

            }

        </script>
@stop