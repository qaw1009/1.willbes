@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Mypage-SUPPORTZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 쪽지관리
                </div>
            </div>
            <!-- willbes-Mypage-SUPPORTZONE -->

            <div class="willbes-Leclist c_both">
                <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                    → 총 <a class="num tx-light-blue strong" href="#none">2</a>건
                    <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                    <select id="all" name="all" title="all" class="seleAll mr10 h30 f_left">
                        <option selected="selected">전체쪽지</option>
                        <option value="미확인쪽지">미확인쪽지</option>
                        <option value="확인쪽지">확인쪽지</option>
                    </select>
                    <select id="process" name="process" title="process" class="seleProcess mr10 h30 f_left">
                        <option selected="selected">과정</option>
                        <option value="헌법">헌법</option>
                        <option value="스파르타반">스파르타반</option>
                        <option value="공직선거법">공직선거법</option>
                    </select>
                    <select id="academy" name="academy" title="academy" class="seleAcad mr10 h30 f_left">
                        <option selected="selected">구분</option>
                        <option value="온라인">온라인</option>
                        <option value="학원">학원</option>
                    </select>
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </span>
                </div>
                <div class="LeclistTable pointTable">
                    <table cellspacing="0" cellpadding="0" class="listTable cartTable under-gray bdt-gray tx-gray">
                        <colgroup>
                            <col style="width: 60px;">
                            <col style="width: 70px;">
                            <col style="width: 80px;">
                            <col style="width: 370px;">
                            <col style="width: 70px;">
                            <col style="width: 100px;">
                            <col style="width: 110px;">
                            <col style="width: 80px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></th>
                            <th>과정<span class="row-line">|</span></th>
                            <th>구분<span class="row-line">|</span></th>
                            <th>제목<span class="row-line">|</span></th>
                            <th>첨부<span class="row-line">|</span></th>
                            <th>발송자<span class="row-line">|</span></th>
                            <th>발송일<span class="row-line">|</span></th>
                            <th>상태</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(empty($list))
                            <tr>
                                <td class="w-list tx-center" colspan="8">등록된 내용이 없습니다.</td>
                            </tr>
                        @endif
                        @foreach($list as $row)
                            <tr>
                                <td class="w-no">{{$paging['rownum']}}</td>
                                <td class="w-process"><div class="pBox p5">{{$row['SiteGroupName']}}</div></td>
                                <td class="w-acad"><span class="oBox {{$row['CampusType']}}Box NSK">{{$row['CampusType_Name']}}</span></td>
                                <td class="w-list tx-left pl25 {{($row['IsReceive'] == 'Y') ? '' : 'strong'}}"><a href="#none" onclick="openWin('MEMOPASS')">{{hpSubString($row['Content'],0,40,'...')}}</a></td>
                                <td class="w-file">
                                    <a href="#none">
                                        @if(empty($row['AttachData']) === false)
                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                        @endif
                                    </a>
                                </td>
                                <td class="w-admin">관리자명</td>
                                <td class="w-date">{{$row['RegDatm']}}</td>
                                <td class="w-state {{($row['IsReceive'] == 'Y') ? '' : 'tx-red'}} strong">
                                    {{($row['IsReceive'] == 'Y') ? '확인' : '미확인'}}
                                    {{--@if($row['IsReceive'] == 'Y')
                                        확인
                                    @else
                                        미확인
                                    @endif--}}
                                </td>
                            </tr>
                            @php $paging['rownum']-- @endphp
                        @endforeach
                        {{--<tr>
                            <td class="w-no">8</td>
                            <td class="w-process">경찰</td>
                            <td class="w-acad">학원</td>
                            <td class="w-list tx-left pl25 strong"><a href="#none" onclick="openWin('MEMOPASS')">3법 해피엔딩 이벤트☆수험표 인증시 무료!</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state tx-red strong">미확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-process">공무원</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25 strong"><a href="#none">김원욱 형법 최신 1개년 기출 판례이벤트</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state tx-red strong">미확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">6</td>
                            <td class="w-process">임용</td>
                            <td class="w-acad">학원</td>
                            <td class="w-list tx-left pl25"><a href="#none">2018년 제1차 경찰 공무원 채용필기시험 가답안 공지</a></td>
                            <td class="w-file">&nbsp;</td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-process">경찰</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25"><a href="#none">[신규강의안내] 2018 대비 3~4월안내</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">4</td>
                            <td class="w-process">공무원</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25"><a href="#none">설연휴 학원 고객센터 운영안내</a></td>
                            <td class="w-file">&nbsp;</td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-process">임용</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25"><a href="#none">추석 교재 배송 및 고객센터 휴무안내</a></td>
                            <td class="w-file">&nbsp;</td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-process">경찰</td>
                            <td class="w-acad">학원</td>
                            <td class="w-list tx-left pl25"><a href="#none">4월 무이자카드 안내</a></td>
                            <td class="w-file">&nbsp;</td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-process">공무원</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25"><a href="#none">3월 무이자카드 안내</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>--}}
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-xs-12">
                            {!! $paging['pagination'] !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-Leclist -->
        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
@stop