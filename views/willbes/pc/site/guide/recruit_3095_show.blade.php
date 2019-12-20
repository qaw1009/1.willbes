@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="w-Guide">
                <h3 class="NSK-Black">선발예정인원 및 과목</h3>
                <h4 class="NGR">2019년 국립외교원 선발예정인원 및 시험</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <tr>
                            <th rowspan="3" colspan="2">선발분야</th>
                            <th rowspan="3">선발예정인원</th>
                            <th colspan="4">시험과목</th>
                        </tr>
                        <tr>
                            <th colspan="2">제1차 시험</th>
                            <th colspan="2">제2차 시험</th>
                        </tr>
                        <tr>
                            <th>필수</th>
                            <th>선택</th>
                            <th>전공평가</th>
                            <th>통합논술</th>
                        </tr>
                        <tr>
                            <td colspan="2">일반외교</td>
                            <td>32</td>
                            <td>언어논리영역, <br />
                                자료해석영역,<br />
                                상황판단영역,<br />
                                영어<span class="tx-blue">(영어능력검정시험으로 대체)</span>,<br />
                                한국사<span class="tx-blue">(한국사능력검정시험으로 대체)</span></td>
                            <td>독어, 불어, 러시아어, <br />중국어, 일어, 스페인어 중 1과목<br />
                                <span class="tx-blue">(외국어능력검정시험으로 대체)</span></td>
                            <td>국제정치학, <br />
                                국제법, <br />
                                경제학</td>
                            <td>학제통합논술시험Ⅰ,<br />
                                학제통합논술시험Ⅱ</td>
                        </tr>
                        <tr>
                            <td rowspan="4">지역<br />
                                외교</td>
                            <td>중동</td>
                            <td>2</td>
                            <td>〃</td>
                            <td>아랍어<br />
                                <span class="tx-blue">(어학검증시험으로 대체)</span></td>
                            <td rowspan="4">없음</td>
                            <td rowspan="4">학제통합논술시험Ⅰ,<br />
                                학제통합논술시험Ⅱ</td>
                        </tr>
                        <tr>
                            <td>아프리카</td>
                            <td>1</td>
                            <td>〃</td>
                            <td>불어<br />
                                <span class="tx-blue">(외국어능력검정시험으로 대체)</span></td>
                        </tr>
                        <tr>
                            <td>중남미</td>
                            <td>1</td>
                            <td>〃</td>
                            <td>스페인어<br />
                                <span class="tx-blue">(외국어능력 검정시험으로 대체)</span></td>
                        </tr>
                        <tr>
                            <td>러시아/CIS</td>
                            <td>2</td>
                            <td>〃</td>
                            <td>러시아어<br />
                                <span class="tx-blue">(외국어능력검정시험으로 대체)</span></td>
                        </tr>
                        <tr>
                            <td>외교<br />
                                전문</td>
                            <td><p>경제/다자외교</p></td>
                            <td>2</td>
                            <td>〃</td>
                            <td>없음</td>
                            <td>없음</td>
                            <td>없음</td>
                        </tr>
                    </table>
                </div>
                <ul class="st01 mt20">
                    <li>제1차 필기시험(선택형)의 헌법과목에서 100점 만점(25문항)에 60점 이상을 득점하지 못하면 불합격 처리됩니다. (제1차시험 합격선 결정 시 헌법과목 점수는 합산하지 않음)</li>
                    <li>지방행정론에 도시행정, 교정학에 형사정책 및 행형학, 경제학에 국제경제학, 국제법에 국제경제법, 국제정치학에 외교사 및 군축 안보분야, 회계학에 정부회계가 포함됩니다.</li>
                    <li>외교관후보자 선발시험(일반외교)의 학제통합논술시험은 국제정치학, 국제법 및 경제학의 범위 내에서 출제됩니다.</li>
                    <li>인사·조직론은 인사행정론 및 조직론에서 출제되며, 만점은 다른 필수과목 만점의 50%입니다.</li>
                    <li>방재안전 직류의 재난관리론은 자연재난, 사회재난(인적재난 포함), 위기관리 범위에서, 안전관리론은 안전관리제도, 안전윤리 및 심리(취약계층안전 포함), 분야별 안전(교통, 시설, 생활, 소방, 식품, 테러대비 등)에서 출제되며, 도시계획은 시설직렬의 도시계획 출제범위에 도시방재학이 포함됩니다.</li>
                    <li>5급 공채시험(행정)의 제2차시험은 법률과목(국제법 제외)에 한하여 법전이 배부되고, 5급 공채 시험(기술) 및 외교관후보자 선발시험(일반외교)의 제2차시험은 법전이 배부되지 않습니다. </li>
                    <li>5급공채시험(기술)의 제2차시험은 직류와 상관없이 시험장에 계산기를 지참하시기 바라며, 계산기 사용여부는 시험 당일 오전 교육시간에 안내합니다. </li>
                    <li>외교관후보자(지역외교·외교전문)의 인력은 2021년부터 5등급 외무공무원 경력경쟁 채용시험 등으로 선발할 예정입니다.</li>
                </ul>
            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop