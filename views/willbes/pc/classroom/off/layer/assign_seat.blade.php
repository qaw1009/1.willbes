<a class="closeBtn" href="#none" onclick="closeWin('seatChoice')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">좌석선택하기</div>

<div class="lecMoreWrap of-hidden h590">
    <div class="PASSZONE-List widthAutoFull">
        <div class="strong mt25 mb10 tx-gray">· 결제정보 및 좌석정보</div>
        <div class="LeclistTable bdt-gray">
            <table cellspacing="0" cellpadding="0" class="listTable listTableLeft passTable-Select under-gray tx-gray">
                <colgroup>
                    <col style="width:10%;">
                    <col style="width:55%;">
                    <col style="width:10%;">
                    <col>
                </colgroup>
                <tbody>
                <tr>
                    <th>주문번호 </th>
                    <td>20200000</td>
                    <th>회원정보</th>
                    <td>회원명(아이디) | 010-0000-0000 </td>
                </tr>
                <tr>
                    <th>결제금액 </th>
                    <td>100,000원</td>
                    <th>결제일</th>
                    <td>2020-00-00 00:00</td>
                </tr>
                <tr>
                    <th>상품명</th>
                    <td>2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</td>
                    <th>결제상태</th>
                    <td>결제완료</td>
                </tr>

                {{--//종합반일 경우만 노출--}}
                <tr>
                    <th>단과반정보</th>
                    <td colspan="3">
                        단과반명이 출력됩니다.
                    </td>
                </tr>
                {{--종합반일 경우만 노출//--}}

                <tr>
                    <th>좌석정보</th>
                    <td colspan="3">
                        <ul class="seatsection bg-none">
                            <li>[강의실명] <span>드림타워 3층 305호</span></li>
                            <li>[좌석번호] <span>086</span> <span class="tx-red">미선택</span></li>
                            <li>[좌석선택기간] <span>2020-00-00 ~ 2020-00-00</span></li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="PASSZONE-Lec-Section mt25">
            <div class="btnAuto164 mt20 tx-white tx14 strong"><a href="#" class="bBox blackBox widthAutoFull">좌석배치도 보기 ></a></div>
            <div class="strong mt25 tx-gray h22">
                · 좌석선택하기 : 좌석 변경은 좌석선택기간 안에만 가능하오니, 좌석배치도를 확인하신 후 신중히 선택해 주시기 바랍니다.
            </div>
            <div class="seatNumber">
                <div class="seatNumberInfo">
                    <div class="sNumberA"><span>선택가능</span></div>
                    <div class="sNumberB"><span>선택완료</span></div>
                </div>

                <ul>
                    <li style="width:calc(100%/10);">
                        <button type="button" class="sNumberA">001<span>선택가능</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberB">002<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberC">003<span>회원명</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberA">004<span>선택가능</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberA">005<span>선택가능</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberB">006<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberB">007<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberB">008<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberB">009<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/10);">
                        <button type="button" class="sNumberB">010<span>선택완료</span></button>
                    </li>

                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberA">011<span>선택가능</span></button>
                    </li>
                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberB">012<span>선택완료</span></button>
                    </li>
                    <li style="width:calc(100%/5);">
                        <button type="button" class="sNumberB">013<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberA">014<span>선택가능</span></button>
                    </li>
                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberB">015<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberB">016<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberB">017<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberB">018<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberB">019<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/5);">
                        <button type="button" class="sNumberB">020<span>선택완료</span></button>
                    </li>

                    <li style="width: calc(100%/2);">
                        <button type="button" class="sNumberB">019<span>선택완료</span></button>
                    </li>
                    <li style="width: calc(100%/2);">
                        <button type="button" class="sNumberB">020<span>선택완료</span></button>
                    </li>
                </ul>

                <div class="btnAuto130 mt20 tx-white tx14 strong"><a href="#" class="bBox blueBox widthAutoFull">적용</a></div>
            </div>
        </div>
    </div>
    <!-- PASSZONE-List -->
</div>