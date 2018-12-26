@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Counsel c_both">
                @include('willbes.pc.site.consult_management.common')
            </div>


            <div class="willbes-User-Info p_re pb30">
                <div class="InfoTable GM">
                    <table cellspacing="0" cellpadding="0" class="classTable userInfoTable counselTable under-gray bdt-gray bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 160px;">
                            <col style="width: 780px;">
                            <col width="*">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="w-tit">상담예약 일시</td>
                            <td class="w-info"><span class="tx-light-blue">2018-10-25 (목) 10:00 ~ 10:30</span></td>
                        </tr>
                        <tr>
                            <td class="w-tit">이름(아이디) <span class="tx-red">(*)</span></td>
                            <td class="w-info"><input type="text" id="USER_ID" name="USER_ID" class="iptid" placeholder="홍길동(아이디)" maxlength="30"></td>
                        </tr>
                        <tr>
                            <td class="w-tit">생년월일 <span class="tx-red">(*)</span></td>
                            <td class="w-info"><input type="text" id="USER_BRT" name="USER_BRT" class="iptbrt" placeholder="ex) 19990101" maxlength="30"></td>
                        </tr>
                        <tr>
                            <td class="w-tit">연락처 <span class="tx-red">(*)</span></td>
                            <td class="w-info"><input type="text" id="USER_PHONE" name="USER_PHONE" class="iptphone" placeholder="ex) 01012345678" maxlength="30"></td>
                        </tr>
                        <tr>
                            <td class="w-tit">이메일 <span class="tx-red">(*)</span></td>
                            <td class="w-info">
                                <div class="emailBox">
                                    <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail1 email" maxlength="30"> @
                                    <select id="email" name="email" title="email" class="seleEmail email">
                                        <option selected="selected">willbes.net</option>
                                        <option value="naver.com">naver.com</option>
                                        <option value="daum.net<">daum.net</option>
                                        <option value="gmail.com">gmail.com</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">응시직렬 <span class="tx-red">(*)</span></td>
                            <td class="w-info">
                                <div class="w-selec-Area">
                                    <ul>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>일반</label></li>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>남자</label></li>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>여자</label></li>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>기동대</label></li>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>101단</label></li>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전의경특채</label></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">응시지역 <span class="tx-red">(*)</span></td>
                            <td class="w-info">
                                <select id="area" name="area" title="응시지역" class="seleArea">
                                    <option selected="selected">응시지역 선택</option>
                                    <option value="지역1">지역1</option>
                                    <option value="지역2">지역2</option>
                                    <option value="지역3">지역3</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">수험기간 <span class="tx-red">(*)</span></td>
                            <td class="w-info">
                                <div class="w-selec-Area">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>6개월 미만</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>1년 미만</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>1년 이상</label></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">취약과목 <span class="tx-red">(*)</span></td>
                            <td class="w-info"><input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbjw" placeholder="ex) 영어" maxlength="30"></td>
                        </tr>
                        <tr>
                            <td class="w-tit">수강여부 <span class="tx-red">(*)</span></td>
                            <td class="w-info">
                                <div class="w-selec-Area">
                                    <ul>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>학원</label></li>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>동영상</label></li>
                                        <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>기타</label></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit">
                                상세정보<br/>
                                (최근 점수를<br/>기입해 주세요)
                            </td>
                            <td class="w-info">
                                <div class="Detail-gradeBox">
                                    [모의고사명] <input type="text" id="USER_TITLE" name="USER_TITLE" class="ipttitle" placeholder="(예: [2016 1차])" maxlength="30"><br/>
                                    필수과목
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">)<br/>
                                    선택과목
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">).
                                    총점(<input type="text" id="USER_ALL_GRADE" name="USER_ALL_GRADE" class="iptallgrade" maxlength="30">)
                                </div>
                                <div class="Detail-gradeBox">
                                    [모의고사명] <input type="text" id="USER_TITLE" name="USER_TITLE" class="ipttitle" placeholder="(예: [2016 1차])" maxlength="30"><br/>
                                    필수과목
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">)<br/>
                                    선택과목
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">).
                                    총점(<input type="text" id="USER_ALL_GRADE" name="USER_ALL_GRADE" class="iptallgrade" maxlength="30">)
                                </div>
                                <div class="Detail-gradeBox">
                                    [모의고사명] <input type="text" id="USER_TITLE" name="USER_TITLE" class="ipttitle" placeholder="(예: [2016 1차])" maxlength="30"><br/>
                                    필수과목
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">)<br/>
                                    선택과목
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">),
                                    <input type="text" id="USER_SBJ" name="USER_SBJ" class="iptsbj" maxlength="30">(<input type="text" id="USER_GRADE" name="USER_GRADE" class="iptgrade" maxlength="30">).
                                    총점(<input type="text" id="USER_ALL_GRADE" name="USER_ALL_GRADE" class="iptallgrade" maxlength="30">)
                                </div>
                                * 기타상담사항: 처음 준비합니다. 자세한 상담이 필요합니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="willbes-Lec-buyBtn">
                    <ul>
                        <li class="btnAuto90 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                <span class="tx-purple-gray">이전단계</span>
                            </button>
                        </li>
                        <li class="btnAuto90 h36">
                            <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                <span>다음단계</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        {!! banner('고객센터_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
@stop