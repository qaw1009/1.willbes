<div class="will-nTit">윌비스 임용 <span class="tx-color">시험정보</span></div>
<div class="examInfo">
    <ul class="examTop">
        <li>
            <div class="titleSubject NSK-Black" id="subject_title">유아</div>
            <div class="tx16">전국 모집인원 비교</div>
            <div class="subject">
                <select name="subject_list" id="subject_list">
                    @foreach($data['exam']['subject_select_box'] as $key => $val)
                        <option value="{{$key}}">{{$val['subject_name']}}</option>
                    @endforeach
                </select>
            </div>
        </li>
        @foreach($data['exam']['subject_select_box'] as $key => $val)
            <li class="exam-table" style="{{($loop->first === true) ? 'display: block' : 'display: none'}}" id="exam_table_{{$key}}">
                @if($val['retake_type'] == 'retake')
                    <table>
                        <colgroup>
                            <col width="77px">
                            <col width="77px">
                            <col width="77px">
                            <col width="77px">
                            <col width="77px">
                            <col width="77px">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr>
                            <th colspan="2">{{empty($data['exam']['total_exam_info'][$key][0]['YearTarget1']) === true ? '' : $data['exam']['total_exam_info'][$key][0]['YearTarget1']}} 학년도</th>
                            <th colspan="2">{{empty($data['exam']['total_exam_info'][$key][1]['YearTarget1']) === true ? '' : $data['exam']['total_exam_info'][$key][1]['YearTarget1']}} 추시</th>
                            <th colspan="2">{{empty($data['exam']['total_exam_info'][$key][2]['YearTarget1']) === true ? '' : $data['exam']['total_exam_info'][$key][2]['YearTarget1']}} 학년도</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="first">
                            @foreach($data['exam']['total_exam_info'][$key] as $k => $val)
                                <td>모집 인원</td>
                                <td>지원 인원</td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($data['exam']['total_exam_info'][$key] as $k => $val)
                                <td>{{number_format($val['NoticeNumber1'])}}</td>
                                <td>{{number_format($val['TakeNumber1'])}}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                @else
                    <table>
                        <colgroup>
                            <col width="77px">
                            <col width="77px">
                            <col width="77px">
                            <col width="77px">
                            <col width="77px">
                            <col width="77px">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr>
                            <th colspan="2">{{$data['exam']['total_exam_info'][$key]['YearTarget1']}} 학년도</th>
                            <th colspan="2">{{$data['exam']['total_exam_info'][$key]['YearTarget2']}} 학년도</th>
                            <th colspan="2">증감</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="first">
                            <td>모집 인원</td>
                            <td>지원 인원</td>
                            <td>모집 인원</td>
                            <td>지원 인원</td>
                            <td>모집 인원</td>
                            <td>지원 인원</td>
                        </tr>
                        <tr>
                            <td>{{number_format($data['exam']['total_exam_info'][$key]['NoticeNumber1'])}}</td>
                            <td>{{number_format($data['exam']['total_exam_info'][$key]['TakeNumber1'])}}</td>
                            <td>{{number_format($data['exam']['total_exam_info'][$key]['NoticeNumber2'])}}</td>
                            <td>{{number_format($data['exam']['total_exam_info'][$key]['TakeNumber2'])}}</td>
                            <td>
                                <span class="{{$data['exam']['total_exam_info'][$key]['UpDownNoticeNumber']}}">
                                    @if($data['exam']['total_exam_info'][$key]['UpDownNoticeNumber'] == 'up')▲
                                    @elseif($data['exam']['total_exam_info'][$key]['UpDownNoticeNumber'] == 'down')▼
                                    @endif
                                </span>
                                {{number_format($data['exam']['total_exam_info'][$key]['NoticeNumber'])}}
                            </td>
                            <td>
                                <span class="{{$data['exam']['total_exam_info'][$key]['UpDownTakeNumber']}}">
                                    @if($data['exam']['total_exam_info'][$key]['UpDownTakeNumber'] == 'up')▲
                                    @elseif($data['exam']['total_exam_info'][$key]['UpDownTakeNumber'] == 'down')▼
                                    @endif
                                </span>
                                {{number_format($data['exam']['total_exam_info'][$key]['TakeNumber'])}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endif
            </li>
        @endforeach
    </ul>
    <div class="examBottom">
        <div class="titleTrend NSK-Black">전국 모집인원(경쟁률, 합격선) 현황 및 최근 10년간 모집 동향 분석</div>
        <ul>
            @foreach($data['exam']['subject_list'] as $key => $val)
                <li><a href="#Container" class="btn-exam-layer" data-id="{{$key}}">{{$val['subject_name']}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<div id="examTrendBox"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-exam-layer').click(function () {
            var ele_id = 'examTrendBox';
            var subject_id = $(this).data('id');
            var data = {
                'ele_id' : ele_id,
                'subject_id' : subject_id
            };
            sendAjax('{{ front_url('/examInfo/trendPopup') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });

        //select box click
        $('#subject_list').on('change', function (){
            $("#subject_title").text($("#subject_list option:selected").text());
            $('.exam-table').hide();
            $('#exam_table_'+$(this).val()).show();
        });
    });
</script>