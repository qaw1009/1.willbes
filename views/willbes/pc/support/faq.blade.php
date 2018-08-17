@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </span>
        </div>
        <div class="Content p_re">

            <div class="willbes-CScenter c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                    · 자주하는 질문
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="Act1 mt30">
                    <div class="LeclistTable c_both">
                        <div class="questionBoxWrap">
                            <ul class="tabcsDepth2 tab_Question p_re NG">
                            @foreach($faq_ccd as $row)
                                <li>
                                    <a class="qBox @if($s_faq === $row['Ccd']) on @endif" href="">
                                        <img src="{{ img_url('cs/icon_question'.$row['Ccd'].'.gif') }}">
                                        <div>{{$row['CcdName']}}</div>
                                    </a>
                                    @if(empty($row['subFaqData']) === false)
                                    <div class="subBox @if($s_faq === $row['Ccd']) on @endif">
                                        <dl>
                                            @foreach($row['subFaqData'] as $sub)
                                            <dt><button type="submit" onclick="">{{$sub['CcdName']}}</button>
                                                @if($loop->last == false)
                                                <span class="row-line">|</span>
                                                @endif
                                            </dt>
                                            @endforeach

                                        </dl>
                                    </div>
                                    @endif
                                </li>
                            @endforeach
                            </ul>
                            <div class="tabBox mt100">
                                <div id="question1" class="tabContent">
                                    <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdt-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 70px;">
                                            <col style="width: 100px;">
                                            <col style="width: 120px;">
                                            <col style="width: 560px;">
                                            <col style="width: 90px;">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>캠퍼스<span class="row-line">|</span></th>
                                            <th>분류<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                            <th>조회수</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="replyList cscenterList">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">공통</span></td>
                                            <td class="w-select">회원정보</td>
                                            <td class="w-list tx-left pl20">로그인이되지않는데어떻게하나요?</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                            </td>
                                        </tr>

                                        <tr class="replyList cscenterList">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">공통</span></td>
                                            <td class="w-select">회원탈퇴</td>
                                            <td class="w-list tx-left pl20">만14세미만회원은어떻게가입하나요?</td>
                                            <td class="w-click">244</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                            </td>
                                        </tr>

                                        <tr class="replyList cscenterList">
                                            <td class="w-no">2</td>
                                            <td class="w-acad"><span class="oBox nyBox NSK">노량진</span></td>
                                            <td class="w-select">회원정보</td>
                                            <td class="w-list tx-left pl20">회원탈퇴는어떻게하나요?</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                            </td>
                                        </tr>

                                        <tr class="replyList cscenterList">
                                            <td class="w-no">1</td>
                                            <td class="w-acad"><span class="oBox smBox NSK">신림</span></td>
                                            <td class="w-select">회원탈퇴</td>
                                            <td class="w-list tx-left pl20">만14세미만회원은어떻게가입하나요?</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div id="question2" class="tabContent">
                                    결제/환불
                                </div>
                                <div id="question3" class="tabContent">
                                    교재
                                </div>
                                <div id="question4" class="tabContent">
                                    온라인수강
                                </div>
                                <div id="question5" class="tabContent">
                                    모바일
                                </div>
                                <div id="question6" class="tabContent">
                                    학원수강
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--LeclistTable -->
                </div>
            </div>
            <!-- willbes-CScenter -->

        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop