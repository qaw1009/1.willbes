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
                <h4 class="NGR">국립외교원 선발예정인원 및 과목</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col width="8%">
                            <col width="8%">
                            <col width="10%">
                            <col width="25%">
                            <col>
                            <col width="10%">
                            <col width="13%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="3">구분</th>
                                <th rowspan="3">선발분야</th>
                                <th rowspan="3">선발예정인원<br />
                                (총 40명)</th>
                                <th colspan="4">시 험 과 목</th>
                            </tr>
                            <tr>
                                <th colspan="2">제1차시험(선택형 필기)</th>
                                <th colspan="2">제2차시험(논문형 필기)</th>
                            </tr>
                            <tr>
                                <th>필 수</th>
                                <th>선택 또는 
                                지정과목</th>
                                <th>전공평가</th>
                                <th>통합논술</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>외교관<br />
                                후보자<br />
                                선발시험
                                </td>
                                <td>일반<br />외교</td>
                                <td>40명</td>
                                <td>언어논리영역, <br />
                                자료해석영역,<br />
                                상황판단영역,<br />
                                헌법, <br />
                                영어(영어능력검정 시험으로 대체),<br />
                                한국사(한국사능력검정 시험으로 대체)
                                </td>
                                <td>
                                독어, 불어, 러시아어, 중국어, 일어, 스페인어 중 1과목(외국어능력검정시험으로 대체)
                                </td>
                                <td>
                                국제정치학, <br>
                                국제법,<br>
                                경제학
                                 </td>
                                <td> 
                                학제통합논술시험 I,<br>
                                학제통합논술시험 II
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop