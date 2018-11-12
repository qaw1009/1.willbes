
    <a class="closeBtn" href="#none" onclick="closeWin('MyDevice')">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div class="Layer-Tit tx-dark-black NG">등록기기정보</div>

    <div class="lecMoreWrap">

        <div class="PASSZONE-List widthAutoFull">
            <ul class="passzoneInfo tx-gray NGR">
                <li class="tit strong">· 기기등록 유의사항</li>
                <li class="txt">- MAC Address란 컴퓨터 내부에 장착된 LAN 카드 고유의 일련번호를 말합니다.</li>
                <li class="txt tx-red">- MAC Address는 PC/모바일 제한없이 최대 2대까지 등록이 가능합니다.</li>
                <li class="txt">- 기기정보는 수강신청후 강의시청 시 자동으로 저장됩니다.</li>
                <li class="tit strong mt30">· 등록기기 초기화(삭제)유의사항</li>
                <li class="txt">- 초기화(삭제)는 기기불량 등으로 인한 제품변경이나 A/S를 받은 경우,기기를 새로 구매한 경우 이용해 주시기 바랍니다.</li>
                <li class="txt">- 부득이하게 등록된 컴퓨터나 스마트기기의 변경을 원하실 경우, 고객센터(1588-5006)로 전화주시기 바랍니다.</li>
                <li class="txt">- 회원님께서 직접 등록기기 초기화(삭제)(MAC Address 초기화)를 하실 수 있으며, <span class="tx-red">직접 초기화(삭제) 횟수는 1회로 제한됩니다.</span></li>
                <li class="txt">- 수강중인 강좌가 없거나 현재 수강중인 강좌가 있어도 등록기기 초기화가 가능합니다.</li>
            </ul>
            <div class="PASSZONE-User-Tablets NG">
                <ul>
                    <li>
                        <dl>
                            <dt class="w-tit">기기등록현황</dt>
                            <dt>PC 1대 + 모바일 1대</dt>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt class="w-tit">초기화가능횟수 : <span class="tx-red">1</span>회</dt>
                            <dt style="margin: 0;"><span class="row-line">|</span></dt>
                            <dt>총초기화(삭제)횟수 : 10회</dt>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="PASSZONE-Lec-Section">
                <div class="Search-Result strong mt25 mb10 tx-gray">· 기기등록 / 초기화(삭제) 내역</div>
                <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray h42 mb10">
                            <span class="w-data">
                                기간검색 &nbsp;
                                <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30"> ~&nbsp;
                                <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                            </span>
                            <span class="w-month">
                                <ul>
                                    <li><a href="#none">전체</a></li>
                                    <li><a class="on" href="#none">1개월</a></li>
                                    <li><a href="#none">3개월</a></li>
                                    <li><a href="#none">6개월</a></li>
                                </ul>
                            </span>
                </div>
                <div class="LeclistTable bdt-gray">
                    <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                        <colgroup>
                            <col style="width: 70px;">
                            <col style="width: 270px;">
                            <col style="width: 120px;">
                            <col style="width: 90px;">
                            <col style="width: 110px;">
                            <col style="width: 90px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>구분<span class="row-line">|</span></th>
                            <th>기기정보(MAC Address)<span class="row-line">|</span></th>
                            <th>등록일시<span class="row-line">|</span></th>
                            <th>삭제자<span class="row-line">|</span></th>
                            <th>삭제일<span class="row-line">|</span></th>
                            <th>직접초기화</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-eq">PC</td>
                            <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                            <td class="w-update-day">2018.00.00 00:00</td>
                            <td class="w-user">관리자명</td>
                            <td class="w-delete-day">2018.00.00 00:00</td>
                            <td class="w-reset tx-light-blue"><a href="#none">초기화</a></td>
                        </tr>
                        <tr>
                            <td class="w-eq">모바일</td>
                            <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                            <td class="w-update-day">2018.00.00 00:00</td>
                            <td class="w-user">관리자명</td>
                            <td class="w-delete-day">2018.00.00 00:00</td>
                            <td class="w-reset">불가</td>
                        </tr>
                        <tr>
                            <td class="w-eq">PC</td>
                            <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                            <td class="w-update-day">2018.00.00 00:00</td>
                            <td class="w-user">관리자명</td>
                            <td class="w-delete-day">2018.00.00 00:00</td>
                            <td class="w-reset">불가</td>
                        </tr>
                        <tr>
                            <td class="w-eq">모바일</td>
                            <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                            <td class="w-update-day">2018.00.00 00:00</td>
                            <td class="w-user">관리자명</td>
                            <td class="w-delete-day">2018.00.00 00:00</td>
                            <td class="w-reset">불가</td>
                        </tr>
                        <tr>
                            <td class="w-eq">PC</td>
                            <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                            <td class="w-update-day">2018.00.00 00:00</td>
                            <td class="w-user">관리자명</td>
                            <td class="w-delete-day">2018.00.00 00:00</td>
                            <td class="w-reset">불가</td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="Paging">
                        <ul>
                            <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                            <li><a href="#none">2</a><span class="row-line">|</span></li>
                            <li><a href="#none">3</a><span class="row-line">|</span></li>
                            <li><a href="#none">4</a><span class="row-line">|</span></li>
                            <li><a href="#none">5</a><span class="row-line">|</span></li>
                            <li><a href="#none">6</a><span class="row-line">|</span></li>
                            <li><a href="#none">7</a><span class="row-line">|</span></li>
                            <li><a href="#none">8</a><span class="row-line">|</span></li>
                            <li><a href="#none">9</a><span class="row-line">|</span></li>
                            <li><a href="#none">10</a></li>
                            <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- PASSZONE-List -->
    </div>

