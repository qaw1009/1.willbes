@extends('willbes.pc.layouts.master_popup')

@section('content')
    <div class="Popup ExamBox">
        <div class="popTitBox">
            <div class="pop-Tit NG"><img src="/public/img/willbes//mypage/logo.gif"> 전국 모의고사</div>
            <div class="pop-subTit">{{ $productInfo['ProdName'] }}</div>
        </div>
        <div class="popupContainer">
            @include('willbes.pc.classroom.mocktestNew.result.stat_tab_menu_partial')
                <!-- 문항별 분석 -->
                @foreach($subject_detail_data as $subject_name => $row)
                    <div class="htit2Wp">
                        <h3 class="htit2 f_left NG"><span class="tx-deep-blue">{{ $subject_name }}</span> 문항별 분석</h3>
                        <span class="f_right markerTx"><em>붉은</em>색은 틀린부분표시</span>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="sheetTb mgB4">
                        <colgroup>
                            <col style="width: 70px;"/>
                            @foreach($row['right_answer'] as $key2 => $row2)
                                <col width="*">
                            @endforeach
                        </colgroup>
                        <thead>
                        <tr>
                            <th>구분</th>
                            @foreach($row['right_answer'] as $key2 => $row2)
                                <th>{{ $key2 + 1 }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th style="border-top: 1px solid #e3e3e3;">정답</th>
                            @foreach($row['right_answer'] as $key2 => $row2)
                                <td>{{ $row2 }}</td>
                            @endforeach

                        </tr>
                        <tr>
                            <th style="border-top: 1px solid #e3e3e3;">마킹</th>
                            @foreach($row['answer'] as $key2 => $row2)
                                <td><span class="@if($row['is_wrong'][$key2] == 'N') mis @endif">{{ $row2 }}</span></td>
                            @endforeach

                        </tr>
                        <tr>
                            <th style="border-top: 1px solid #e3e3e3;">정답률</th>
                            @foreach($row['QAVR'] as $key2 => $row2)
                                <td>{{ $row2 }}%</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th style="border-top: 1px solid #e3e3e3;">난이도</th>
                            @foreach($row['difficulty'] as $key2 => $row2)
                                <td>{{ $row2 }}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                @endforeach
                <!-- 문항별 분석 -->

                <!-- 학습요소 -->
                <div class="htit2Wp mt60">
                    <h3 class="htit2 NG"><span class="tx-deep-blue">과목별, 문항별</span> 영역 및 학습요소</h3>
                </div>
                <ul class="tabWrap tabDepthPass mb10 subject-title-tab">
                    @foreach($subject_data as $key => $val)
                        <li style="width: 20%;"><a href="#Mypagetab{{ $key }}" class="@if($loop->first === true) on @endif">{{ $val }}</a></li>
                    @endforeach
                </ul>
                <div class="tabBox">
                    @foreach($area_data as $key => $row)
                        @if (empty($subject_data[$key]) === false)
                        <div class="htit2Wp mt10 subject-title" style="display: none;"><h2 class="htit3 mt10 NG">{{ $subject_data[$key] }}</h2></div>
                        @endif
                        <div id="Mypagetab{{ $key }}" class="tabLink subject-content">
                            <table cellspacing="0" cellpadding="0" class="sheetTb2 mgB4">
                                <colgroup>
                                    <col style="width: 170px;"/>
                                    <col style="width: 65px;"/>
                                    <col style="width: 95px;"/>
                                    <col style="width: 240px;">
                                    <col width="*">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th class="sh1">구분</th>
                                    <th class="sh2">개수</th>
                                    <th class="sh3">평균</th>
                                    <th class="sh4">관련문항</th>
                                    <th class="sh5">오답문항</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($row as $s_key => $val)
                                    <tr class="tabBox" id="areaTab{{ $key }}">
                                        <td>{{ $val['area_name'] }}</td>
                                        <td>{{ $val['cnt'] }}</td>
                                        <td>{{ $val['avg'] }}</td>
                                        <td>
                                            @php
                                            $arr_question_no = explode(',',$val['question_no']);
                                            sort($arr_question_no);
                                            foreach ($arr_question_no as $q_no_key => $q_no_val) {
                                                echo '('.$q_no_val.') ';
                                            }
                                            @endphp
                                        </td>
                                        <td class="{{ ($val['n_question_no'] == '없음') ? '' : 'aMis' }}">
                                            @php
                                                $arr_n_question_no = explode(',',$val['n_question_no']);
                                                sort($arr_n_question_no);
                                                foreach ($arr_n_question_no as $q_n_no_key => $q_n_no_val) {
                                                    echo '('.$q_n_no_val.') ';
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
                <!-- 학습요소 -->
        </div>
    </div>
    <script type="text/javascript">
        //출력시 문항영역 UI display block 처리
        function printPage() {
            window.onbeforeprint = function(){
                $(".subject-title-tab").hide();
                $(".subject-title").show();
                $(".subject-content").show();
            };
            window.onafterprint = function(){
                $(".subject-title-tab").show();
                $(".subject-title").hide();
                $(".subject-content").hide();
                $(".subject-content").first().show();
            };
            window.print();
        }
    </script>
@stop