@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<div class="willbes-Layer-PassBox willbes-Layer-PassBox740" style="display: block;">
    <div class="Layer-Tit tx-dark-black NG">윌비스 <span class="tx-blue">전국모의고사</span></div> 
    <div class="passzoneTitInfo tx-light-blue tx-center NG mt20">2018년 9급 시험대비 제 4회 전국 모의고사 (02/25 시행)</div>
    <div class="PASSZONE-List widthAutoFull">
        <div class="PASSZONE-Lec-Section">
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable userMemoTable mockpopupTable under-gray bdt-gray tx-gray GM">
                    <colgroup>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="w-tit">이름(아이디)</th>
                            <td class="w-list" colspan="3">홍길동(ABC***)</td>
                        </tr>
                        <tr>
                            <th class="w-tit">응시형태</th>
                            <td class="w-list">Off(학원)</td>
                            <th class="w-tit">응시분야</th>
                            <td class="w-list">9급</td>
                        </tr>
                        <tr>
                            <th class="w-tit">응시지역</th>
                            <td class="w-list">전국</td>
                            <th class="w-tit">응시번호</th>
                            <td class="w-list">20180000</td>
                        </tr>
                        <tr>
                            <th class="w-tit">시험응시일</th>
                            <td class="w-list" colspan="3">2018-00-00 00:00 ~ 2018-00-00 00:00</td>
                        </tr>
                        <tr>
                            <th class="w-tit">응시직렬</th>
                            <td class="w-list" colspan="3">일반행정직</td>
                        </tr>
                        <tr>
                            <th class="w-tit">응시필수과목</th>
                            <td class="w-list" colspan="3">한국사, 영어</td>
                        </tr>
                        <tr>
                            <th class="w-tit">응시선택과목</th>
                            <td class="w-list" colspan="3">[선택과목1] 행정학 [선택과목2] 수학</td>
                        </tr>
                        <tr>
                            <th class="w-tit">가산점</th>
                            <td class="w-list" colspan="3">해당없음</td>
                        </tr>
                        <tr>
                            <th class="w-tit">결제(접수)금액</th>
                            <td class="w-list">5,000원</td>
                            <th class="w-tit">쿠폰적용</th>
                            <td class="w-list">미적용</td>
                        </tr>
                        <tr>
                            <th class="w-tit">결제(접수)루트</th>
                            <td class="w-list">온라인</td>
                            <th class="w-tit">결제(접수)상태</th>
                            <td class="w-list">결제완료</td>
                        </tr>
                        <tr>
                            <th class="w-tit">결제(접수)수단</th>
                            <td class="w-list">신용카드</td>
                            <th class="w-tit">결제(접수)일</th>
                            <td class="w-list">2018-00-00 00:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <ul class="passzoneListInfo BG tx-gray GM mt20">
            <li class="txt">· 나의 전국 모의고사 접수현황은 내강의실 > 모의고사관리 > 접수현황 메뉴에서 확인 가능합니다.</li>
            <li class="txt">· 나의 전국 모의고사 성적결과는 내강의실 > 모의고사관리 > 성적결과 메뉴에서 확인 가능합니다.</li>
            <li class="txt">· 단, 해당 모의고사 응시완료 시에만 성적결과 보기 및 문제/해설 다운로드가 가능합니다.</li>
        </ul>
        <ul class="passzoneListInfo tx-gray GM mt20 mb20">
            <li class="tit strong">[온라인 모의고사 유의사항]</li>
            <li class="txt">· 온라인 모의고사(응시형태가 Online인 경우)는 내강의실 > 모의고사관리 > 온라인 모의고사 응시 메뉴에서<br/>
                &nbsp; 응시해 주시기 바랍니다.</li>
            <li class="txt">· 시험응시 기간 동안 지정된 시간에만 응시 가능합니다.</li>
        </ul>
        <div class="passzonebtn tx-center">
            <span>
                <button type="submit" onclick="" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                    <span class="strong">응시표 출력</span>
                </button>
            </span>
        </div>
    </div>
</div>
<!-- End Container -->
@stop