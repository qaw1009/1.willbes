<div class="lecDetailWrap p_re mt30 mb60">
    <ul class="tabWrap tabDepth2">
        <li><a href="#ch1{{$row['ProdCode']}}">강좌상세정보</a></li>
        <li><a href="#ch2{{$row['ProdCode']}}">강좌목차</a></li>
    </ul>
    <div class="w-btn">
        <a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">현재 강좌추가</a>
    </div>
    <div class="tabBox mt30">
        <div id="ch1{{$row['ProdCode']}}" class="tabLink">
            <table cellspacing="0" cellpadding="0" class="classTable under-gray bdt-gray tx-gray">
                <colgroup>
                    <col style="width: 105px;">
                    <col width="*">
                </colgroup>
                <tbody>
                <tr>
                    <td class="w-list bg-light-white">
                        강좌유의사항<br>
                        <span class="tx-red">(필독)</span>
                    </td>
                    <td class="w-data tx-left pl25">
                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                        자동출력됩니다. (온라인상품기준)
                    </td>
                </tr>
                <tr>
                    <td class="w-list bg-light-white">강좌소개</td>
                    <td class="w-data tx-left pl25">
                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                        자동출력됩니다. (온라인상품기준)
                    </td>
                </tr>
                <tr>
                    <td class="w-list bg-light-white">강좌특징</td>
                    <td class="w-data tx-left pl25">
                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                        자동출력됩니다. (온라인상품기준)
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div id="ch2{{$row['ProdCode']}}" class="tabLink">
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                    <colgroup>
                        <col style="width: 50px;">
                        <col style="width: 365px;">
                        <col style="width: 120px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No<span class="row-line">|</span></th>
                        <th>강의명<span class="row-line">|</span></th>
                        <th>강의시간</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="w-no">1강</td>
                        <td class="w-list tx-left pl20">1강 03월 05일 : 모의고사 1회</td>
                        <td class="w-time">50분</td>
                    </tr>
                    <tr>
                        <td class="w-no">2강</td>
                        <td class="w-list tx-left pl20">2강 03월 05일 : 모의고사 2회</td>
                        <td class="w-time">40분</td>
                    </tr>
                    <tr>
                        <td class="w-no">3강</td>
                        <td class="w-list tx-left pl20">3강 03월 05일 : 모의고사 3회</td>
                        <td class="w-time">30분</td>
                    </tr>
                    <tr>
                        <td class="w-no">4강</td>
                        <td class="w-list tx-left pl20">4강 03월 12일 : 모의고사 4회</td>
                        <td class="w-time">20분</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>