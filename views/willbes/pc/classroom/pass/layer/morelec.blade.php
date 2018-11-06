
<a class="closeBtn" href="#none" onclick="closeWin('MoreLec')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">강좌추가</div>

<div class="lecMoreWrap">

    <div class="PASSZONE-List widthAuto570">
        <ul class="passzoneInfo tx-gray NGR">
            <li>· '무한PASS존'에서 수강하기 위한 강좌를 추가하는 메뉴입니다.</li>
            <li>· '수강할 강좌 검색' 후 체크박스를 클릭하시면, 우측 '강좌 선택내역'에 선택한 강좌가 추가됩니다.</li>
            <li>· '강좌선택내역'에서 강좌 확인 후 '강좌추가' 버튼을 클릭하면 수강이 가능합니다.</li>
            <li>·  강좌명 클릭시 '강좌상세정보' 영역에서 정보를 확인할 수 있습니다.</li>
        </ul>
        <div class="willbes-Lec-Selected tx-gray">
            <div class="willbes-Lec-Selected-Grid">
                <select id="lec" name="lec" title="lec" class="seleLec">
                    <option selected="selected">과목</option>
                    <option value="헌법">헌법</option>
                    <option value="스파르타반">스파르타반</option>
                    <option value="공직선거법">공직선거법</option>
                </select>
                <select id="Prof" name="Prof" title="Prof" class="seleProf">
                    <option selected="selected">교수님</option>
                    <option value="정채영">정채영</option>
                    <option value="기미진">기미진</option>
                    <option value="김세령">김세령</option>
                </select>
                <select id="study" name="study" title="study" class="seleStudy">
                    <option selected="selected">학습유형</option>
                    <option value="유형1">유형1</option>
                    <option value="유형2">유형2</option>
                    <option value="유형3">유형3</option>
                </select>
                <div class="willbes-Lec-Search GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                    <div class="subBtn f_right"><a href="#none">초기화</a></div>
                </div>
            </div>
            <div class="Search-Result">
                <div class="Total">총 100건</div>
                <div class="chkBox">
                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 수강중강좌 제외
                </div>
            </div>
        </div>
        <div class="PASSZONE-Lec-Wrap">
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 50px;">
                        <col style="width: 55px;">
                        <col style="width: 55px;">
                        <col style="width: 80px;">
                        <col style="width: 320px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"><span class="row-line">|</span></th>
                        <th>과목명<span class="row-line">|</span></th>
                        <th>교수명<span class="row-line">|</span></th>
                        <th>학습유형<span class="row-line">|</span></th>
                        <th>강좌명</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $leclist as $row )
                        <tr class="replyList passzone-Leclist">
                            <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                            <td class="w-sbj">{{$row['SubjectName']}}</td>
                            <td class="w-prof">{{$row['wProfName']}}</td>
                            <td class="w-type">{{$row['CourseName']}}</td>
                            <td class="w-info passzone">
                                <div class="w-tit tx-left">{{$row['ProdName']}}</div>
                                <dl class="w-info">
                                    <dt>강의수 : {{$row['wUnitLectureCnt']}}강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="{{$row['wLectureProgressCcd'] == '105001' ? 'tx-red' : 'tx-light-blue'}}">{{$row['wLectureProgressCcdName']}}</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt class="tx-black"><a href="javascript:;" onclick="fnViewMore('{{$row['ProdCode']}}');"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr class="replyTxt passzone-Lecinfo" id="{{$row['ProdCode']}}">
                            <td colspan="5">
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="tx-center">강좌정보가 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- PASSZONE-List -->

    <div class="PASSZONE-Add widthAuto260">
        <div class="Tit tx-light-black NG">강좌선택내역</div>
        <div class="PASSZONE-Add-Grid">
            <ul class="passzoneInfo tx-gray NGR none">
                <li>· 선택된 강좌 확인 후 '강좌추가' 버튼을 클릭하면 '무한PASS존 > 수강중강좌탭'에 강좌가 추가됩니다.</li>
                <li>· 강좌추가후 '교재구매' 버튼 클릭시 추가한 강좌(수강중강좌)에 대한 교재를 구매할 수 있습니다.</li>
            </ul>
            <div class="Search-Result">
                <div class="Total">총 4건</div>
                <ul class="chkBox">
                    <li class="w-btn"><a class="answerBox_block NSK" href="#none" onclick="">교재구매</a></li>
                    <li class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">강좌추가</a></li>
                </ul>
            </div>
            <div class="PASSZONE-Lec-Grid">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                        <colgroup>
                            <col style="width: 25px;">
                            <col style="width: 175px;">
                        </colgroup>
                        <tbody>
                        <!--
                        <tr>
                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                            <td class="w-info passzone">
                                <dl class="w-info">
                                    <dt>국어</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>정채영</dt>
                                </dl><br/>
                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                <dl class="w-info">
                                    <dt>강의수 : 40강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                            <td class="w-info passzone">
                                <dl class="w-info">
                                    <dt>국어</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>정채영</dt>
                                </dl><br/>
                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                <dl class="w-info">
                                    <dt>강의수 : 40강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                            <td class="w-info passzone">
                                <dl class="w-info">
                                    <dt>국어</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>정채영</dt>
                                </dl><br/>
                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                <dl class="w-info">
                                    <dt>강의수 : 40강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                            <td class="w-info passzone">
                                <dl class="w-info">
                                    <dt>국어</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>정채영</dt>
                                </dl><br/>
                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                <dl class="w-info">
                                    <dt>강의수 : 40강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                            <td class="w-info passzone">
                                <dl class="w-info">
                                    <dt>국어</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>정채영</dt>
                                </dl><br/>
                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                <dl class="w-info">
                                    <dt>강의수 : 40강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                            <td class="w-info passzone">
                                <dl class="w-info">
                                    <dt>국어</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>정채영</dt>
                                </dl><br/>
                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                <dl class="w-info">
                                    <dt>강의수 : 40강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                            <td class="w-info passzone">
                                <dl class="w-info">
                                    <dt>국어</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>정채영</dt>
                                </dl><br/>
                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                <dl class="w-info">
                                    <dt>강의수 : 40강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                            <td class="w-info passzone">
                                <dl class="w-info">
                                    <dt>국어</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>정채영</dt>
                                </dl><br/>
                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                <dl class="w-info">
                                    <dt>강의수 : 40강</dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                </dl>
                            </td>
                        </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- PASSZONE-Add -->

</div>
<script>
    function fnViewMore(obj)
    {
        $(".passzone-Lecinfo").hide();
        $("#"+obj).show();
    }
</script>

