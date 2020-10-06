<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="on_lecture_before"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value=""/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value=""/>    {{-- 바로결제 여부 --}}

    <div class="willbes-Lec NG c_both">
        <div class="willbes-Lec-Subject tx-dark-black">
            · 수강생 전용
            <div class="selectBoxForm">
                <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
            </div>
        </div>

        <div class="willbes-Lec-Profdata tx-dark-black">
            <ul>
                <li class="ProfImg"><img src="{{ $data['ProfReferData']['lec_list_img'] or '' }}" alt="{{ $data['ProfNickName'] }}"></li>
                <li class="ProfDetail">
                    <div class="Obj">
                        {!! $data['ProfSlogan'] !!}
                    </div>
                    <div class="Name">{{ $data['ProfNickName'] }} {{ $data['AppellationCcdName'] }}</div>
                </li>
                @if(empty($tab_data['study_comment']) === false)
                    <li class="Reply tx-blue">
                        <strong>수강후기</strong>
                        <div class="sliderUp">
                            <div class="sliderVertical roll-Reply tx-dark-black">
                                @foreach($tab_data['study_comment'] as $idx => $row)
                                    <div>{{ hpSubString($row['Title'], 0, 25, '...') }}</div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        <!-- willbes-Lec-Profdata -->

        <div class="willbes-Lec-Line">-</div>
        <!-- willbes-Lec-Line -->

        @foreach($tab_data['on_lecture_before'] as $idx => $row)
            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 290px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-list">유료특강</td>
                        <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                        <td class="w-data tx-left pl25">
                            <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강[국가직~서울시](3-6개월)</div>
                            <dl class="w-info">
                                <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                <dt>강의수 : <span class="tx-blue">48강 (예정)</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="tx-blue">100일</span></dt>
                                <dt class="NSK ml15">
                                    <span class="nBox n1">2배수</span>
                                    <span class="nBox n2">진행중</span>
                                </dt>
                            </dl>
                        </td>
                        <td class="w-notice p_re">
                            <div class="w-sp one"><a href="#none">맛보기</a></div>
                            <div class="priceWrap chk buybtn p_re">
                                <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                <span class="price tx-blue">0원</span>
                            </div>
                            <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 865px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <div class="w-sub">
                                <span class="w-obj tx-blue tx11">부교재</span>
                                <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                <span class="chk">
                                    <label class="press">[출간예정]</label>
                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                </span>
                                <span class="priceWrap">
                                    <span class="price tx-blue">0원</span>
                                </span>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->
        @endforeach
    </div>
    <!-- willbes-Lec -->
</form>
<div id="InfoForm" class="willbes-Layer-Box"></div>
