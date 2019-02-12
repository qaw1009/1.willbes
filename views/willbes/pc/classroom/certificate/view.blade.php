@extends('willbes.pc.layouts.master_popup')

@section('content')
        <div id="CERTIFIPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs mb20" style="display:block !important; top:20px">
            <div class="Layer-Tit tx-dark-black NG">수강확인증 출력</div>
            <div class="PASSZONE-List widthAutoFull">
                <div class="PASSZONE-Lec-Section">
                    <div class="Search-Result strong mt40 mb15 tx-gray">· 수강확인증 <a class="aBox waitBox tx-sky-blue NSK f_right" style="margin-top: -5px;" href="#none" onclick="">인쇄하기</a></div>
                    <div class="LeclistTable bdt-gray">
                        <table cellspacing="0" cellpadding="0" class="listTable userMemoTable certifiTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th class="w-tit">성명</th>
                                <td class="w-list">홍길동</td>
                                <th class="w-tit">생년월일</th>
                                <td class="w-list">1900-00-00</td>
                            </tr>
                            <tr>
                                <th class="w-tit">주소</th>
                                <td class="w-list" colspan="3">서울시 관악구 신림로 101</td>
                            </tr>
                            <tr>
                                <th class="w-tit">전화</th>
                                <td class="w-list">0200000000</td>
                                <th class="w-tit">휴대폰</th>
                                <td class="w-list">010-0000-0000</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="Search-Result strong mt40 mb15 tx-gray">· 수강내역</div>
                    <div class="LeclistTable bdt-gray">
                        <!-- 무한 PASS 패키지 무료특강 출력폼 -->
                        <table cellspacing="0" cellpadding="0" class="listTable usertestTable certifiTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 30%;"/>
                                <col style="width: 40%;"/>
                                <col style="width: 15%;"/>
                                <col style="width: 15%;"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th class="Top">수강강좌</th>
                                <th>동영상 수강기간</th>
                                <th>강사명</th>
                                <th>금액</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="w-tit Top">단강좌명이 노출됩니다.</td>
                                <td class="w-info">2018-00-00 ~ 2018-00-00</td>
                                <td class="w-name"></td>
                                <td class="w-c-price">\100,000</td>
                            </tr>
                            <tr>
                                <th class="w-tit Top">합계</th>
                                <td class="w-total-price" colspan="3">\100,000</td>
                            </tr>
                            </tbody>
                        </table>
                        <table cellspacing="0" cellpadding="0" class="listTable usertestTable certifiTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 30%;"/>
                                <col style="width: 40%;"/>
                                <col style="width: 10%;"/>
                                <col style="width: 10%;"/>
                                <col style="width: 10%;"/>
                            </colgroup>
                            <thead>
                            <tr>
                                <th class="Top">수강강좌</th>
                                <th>동영상 수강기간</th>
                                <th>진도율</th>
                                <th>강사명</th>
                                <th>금액</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="w-tit Top">단강좌명이 노출됩니다.</td>
                                <td class="w-info">
                                    2018-00-00 ~ 2018-00-00<br/>
                                    총 00시간 00분<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>수강 00시간 00분
                                </td>
                                <td class="w-percent">27%</td>
                                <td class="w-name">홍길동</td>
                                <td class="w-c-price">\100,000</td>
                            </tr>
                            <tr>
                                <th class="w-tit Top">합계</th>
                                <td class="w-total-price" colspan="4">\100,000</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tx-center pt40 pb40">
                        <div class="confirm-txt tx-sky-blue NSK">위 사람은 본사이트(cop.willbes.com)에서 수강(중) 하였음을 확인합니다.</div>
                        <div class="date tx-gray">2018년 12월 20일</div>
                    </div>
                    <ul class="certifi-info">
                        <li class="address">
                            사업자번호: 119-85-23089 / 주소: 서울 관악구 신림로 101<br/>
                            수강기관: (주)윌비스
                        </li>
                        <li class="stamp">
                            확인<br/>
                            <img src="{{ img_url('stamp/stamp.png') }}">
                        </li>
                    </ul>
                </div>
            </div>
            <!-- PASSZONE-List -->
        </div>
        <!-- willbes-Layer-PassBox : 수강시작일 변경 -->

@stop