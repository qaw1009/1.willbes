@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 직렬별 예상 합격선을 관리합니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" id="PredictIdx" name="PredictIdx" value="{{ $predict_idx }}" />
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <div class="col-md-4">
                        <table id="list_mem_table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>합격예측코드</th>
                                <th>합격예측명</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data['PredictIdx'] }}</td>
                                    <td>{{ $data['ProdName'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-offset-2 col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="search_dept_ccd">엑셀등록</label>
                            <div class="col-md-10 form-inline">
                                <button type="button" class="btn btn-success btn-sm mr-10 btn-excel-sample-download">직렬별 지역 샘플엑셀 다운로드</button>
                                <input type="file" id="attach_file" name="attach_file" class="form-control" title="엑셀파일" value="">
                                <button type="button" class="btn btn-primary btn-sm mb-0 btn-excel-upload">엑셀 업로드</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2" for="search_dept_ccd">조건</label>
                            <div class="col-md-10 form-inline">
                                <select class="form-control mr-5" id="search_take_mock_part" name="search_take_mock_part">
                                    <option value="">직렬선택</option>
                                    @foreach($arr_base['serialList'] as $key => $row)
                                        <option class="{{$row['PredictIdx']}}" value="{{$row['TakeMockPart']}}">{{$row['CcdName']}}</option>
                                    @endforeach
                                </select>

                                <select class="form-control mr-5" id="search_take_area" name="search_take_area">
                                    <option value="">지역선택</option>
                                    @foreach($arr_base['areaList'] as $key => $val)
                                        @if($val['Ccd'] != '712018')
                                            <option value="{{ $val['Ccd'] }}" @if(empty($arr_input['TakeArea']) === false && $arr_input['TakeArea'] == $val['Ccd']) selected @endif>{{ $val['CcdName'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
            {!! csrf_field() !!}
            <input type="hidden" id="PredictIdx" name="PredictIdx" value="{{ $predict_idx }}" />
            <div class="x_content">
                <table id="list_ajax_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>사용</th>
                        <th class="searching_take_mock_part">직렬</th>
                        <th class="searching_take_area">지역</th>
                        <th>선발인원</th>
                        <th>접수인원</th>
                        <th>경쟁률</th>
                        <th>직전시험경쟁률</th>
                        <th>직전시험합격선</th>
                        <th>지난평균</th>
                        <th>일배수컷</th>
                        <th>전체평균</th>
                        <th>채점수/등록수</th>
                        <th style="width: 140px;">기대권 <br>(최고점~최저점)</th>
                        <th style="width: 140px;">유력권 <br>(최고점~최저점)</th>
                        <th style="width: 120px;">안정권 <br>(~최저점)</th>
                        <th>계산</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $row)
                        <tr>
                            <td>
                                <select name="IsUse[]" class="form-control mr-5">
                                    <option value="Y" @if($row['IsUse'] == 'Y') selected @endif>사용</option>
                                    <option value="N" @if($row['IsUse'] == 'N' || empty($row['IsUse']) === true) selected @endif>미사용</option>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="TakeMockPart[]" value="{{ $row['TakeMockPart'] }}" />
                                <span class="hide">{{ $row['TakeMockPart'] }}</span>
                                {{ $row['TakeMockPartName'] }}
                            </td>
                            <td>
                                <input type="hidden" name="TakeArea[]" value="{{ $row['TakeArea'] }}" />
                                <span class="hide">{{ $row['TakeArea'] }}</span>
                                {{ $row['TakeAreaName'] }}
                            </td>
                            <td><input type="text" name="PickNum[]" value="{{ $row['PickNum'] }}" style="width:50px;" /></td>
                            <td><input type="text" name="TakeNum[]" value="{{ $row['TakeNum'] }}" style="width:50px;" /></td>
                            <td><input type="text" name="CompetitionRateNow[]" value="{{ $row['CompetitionRateNow'] }}" style="width:50px;" /></td>
                            <td><input type="text" name="CompetitionRateAgo[]" value="{{ $row['CompetitionRateAgo'] }}" style="width:50px;" /></td>
                            <td><input type="text" name="PassLineAgo[]" value="{{ $row['PassLineAgo'] }}" style="width:50px;" /></td>
                            <td><input type="text" name="AvrPointAgo[]" value="{{ $row['AvrPointAgo'] }}" style="width:50px;" /></td>
                            <td>{{ $row['SetOnePerCut'] }}</td>
                            <td>{{ ROUND($row['SetAvrPoint'],2) }}</td>
                            <td>{{ $row['SetTakeOrigin'] ? $row['SetTakeOrigin'] : 0 }} / {{ $row['SetTotalRegist'] ? $row['SetTotalRegist'] : 0}}</td>
                            <td>
                                상위 : <input type="text" id="per1_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}" name="ExpectAvrPercent[]" value="{{ $row['ExpectAvrPercent'] ? $row['ExpectAvrPercent'] : ""}}" style="width:50px;" /> % <br>
                                계산 :
                                <input type="hidden" id="exp1_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}" name="ExpectAvrPoint1Ref[]" value="{{ $row['ExpectAvrPoint1Ref'] }}" style="width:60px;" />
                                <span id="exp1_v_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}">{{ $row['ExpectAvrPoint1Ref'] ? $row['ExpectAvrPoint1Ref'] : "" }}</span>
                                <input type="hidden" id="exp2_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}" name="ExpectAvrPoint2Ref[]" value="{{ $row['ExpectAvrPoint2Ref'] }}" style="width:60px;" />
                                <span id="exp2_v_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}">{{ $row['ExpectAvrPoint2Ref'] ? " ~ ".$row['ExpectAvrPoint2Ref'] : "" }}</span>
                                <br>
                                출력 :
                                <input type="text" name="ExpectAvrPoint1[]" value="{{ $row['ExpectAvrPoint1'] ? $row['ExpectAvrPoint1'] : ""}}" style="width:60px;" /> ~
                                <input type="text" name="ExpectAvrPoint2[]" value="{{ $row['ExpectAvrPoint2'] ? $row['ExpectAvrPoint2'] : ""}}" style="width:60px;" />
                            </td>
                            <td>
                                상위 : <input type="text" id="per2_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}" name="StrongAvrPercent[]" value="{{ $row['StrongAvrPercent'] ? $row['StrongAvrPercent'] : ""}}" style="width:50px;" /> % <br>
                                계산 :
                                <input type="hidden" id="strong1_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}" name="StrongAvrPoint1Ref[]" value="{{ $row['StrongAvrPoint1Ref'] }}" style="width:60px;" />
                                <span id="strong1_v_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}">{{ $row['StrongAvrPoint1Ref'] ? $row['StrongAvrPoint1Ref'] : "" }}</span>
                                <input type="hidden" id="strong2_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}" name="StrongAvrPoint2Ref[]" value="{{ $row['StrongAvrPoint2Ref'] }}" style="width:60px;" />
                                <span id="strong2_v_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}">{{ $row['StrongAvrPoint2Ref'] ? " ~ ".$row['StrongAvrPoint2Ref'] : "" }}</span>
                                <br>
                                출력 :
                                <input type="text" name="StrongAvrPoint1[]" value="{{ $row['StrongAvrPoint1'] ? $row['StrongAvrPoint1'] : ""}}" style="width:60px;" /> ~
                                <input type="text" name="StrongAvrPoint2[]" value="{{ $row['StrongAvrPoint2'] ? $row['StrongAvrPoint2'] : "" }}" style="width:60px;" />
                            </td>
                            <td>
                                상위 : <input type="text" id="per3_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}" name="StabilityAvrPercent[]" value="{{ $row['StabilityAvrPercent'] ? $row['StabilityAvrPercent'] : "" }}" style="width:50px;" /> % <br>
                                계산 :
                                <input type="hidden" id="stab_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}" name="StabilityAvrPointRef[]" value="{{ $row['StabilityAvrPointRef'] }}" style="width:60px;" />
                                <span id="stab_v_{{ $row['TakeMockPart'] }}_{{ $row['TakeArea'] }}">{{ $row['StabilityAvrPointRef'] ? "~ ".$row['StabilityAvrPointRef'] : ""}}</span><br>
                                출력 :
                                ~ <input type="text" name="StabilityAvrPoint[]" value="{{ $row['StabilityAvrPoint'] ? $row['StabilityAvrPoint'] : ""}}" style="width:60px;" />
                            </td>
                            <td>
                                <input type="button" value="계산" class="btn btn-xs btn-primary mr-0" onClick="calculate('{{ $row['TakeMockPart'] }}','{{ $row['TakeArea'] }}','{{ $row['PredictIdx'] }}')" />
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $regi_form = $('#regi_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: false,
                ajax : false,
                paging: false,
                pageLength: 50,
                searching: true,
                /*rowsGroup: ['.rowspan'],*/
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 예상합격선 저장', className: 'btn-sm btn-success border-radius-reset btn-store mr-10' }
                    ,{ text: '<i class="fa fa-pencil mr-5"></i> 목록', className: 'btn-sm btn-primary border-radius-reset btn-list' }
                ]
            });

            //목록
            $('.btn-list').click(function() {
                location.href='{{ site_url("/predict/passline") }}' + getQueryString();
            });

            //저장
            $(".btn-store").click(function () {
                var search_take_mock_part = $search_form.find('select[name="search_take_mock_part"]').val();
                var search_take_area = $search_form.find('select[name="search_take_area"]').val();
                if (search_take_mock_part != '' || search_take_area != '') {
                    alert('직렬,지역 선택 제거 후 등록해 주세요.');
                    return false;
                }

                if (!confirm('저장하시겠습니까?')) { return true; }

                var _url = '{{ site_url('/predict/passline/store') }}';
                ajaxLoadingSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showValidateError, null, 'alert', $regi_form);
            });

            //엑셀 셈플 다운로드 버튼 클릭
            $('.btn-excel-sample-download').on('click', function(event) {
                event.preventDefault();
                formCreateSubmit('{{ site_url('/predict/passline/excelSampleDownload') }}', $search_form.serializeArray(), 'POST');
            });

            //엑셀 업로드
            $('.btn-excel-upload').on('click', function(event) {
                var data, is_file, files;
                var predict_idx = $search_form.find('input[name="PredictIdx"]').val();
                files = $search_form.find('input[name="attach_file"]')[0].files[0];

                if (typeof files === 'undefined') { alert('엑셀파일을 선택해 주세요.'); return; }

                data = new FormData();
                data.append('{{ csrf_token_name() }}', $search_form.find('input[name="{{ csrf_token_name() }}"]').val());
                data.append('_method', 'POST');
                data.append('predict_idx', predict_idx);
                data.append('attach_file', files);
                is_file = true;

                if (!confirm('업로드 하시겠습니까?')) { return; }
                event.preventDefault();
                sendAjax('{{ site_url('/predict/passline/excelUpload') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST', 'json', is_file);
            });
        });

        function calculate(TakeMockPart, TakeArea, PredictIdx){
            var per1 = $('#per1_'+TakeMockPart+'_'+TakeArea).val();
            var per2 = $('#per2_'+TakeMockPart+'_'+TakeArea).val();
            var per3 = $('#per3_'+TakeMockPart+'_'+TakeArea).val();
            per1 = parseInt(per1);
            per2 = parseInt(per2);
            per3 = parseInt(per3);

            if(per3 > per2){
                alert('안정권 퍼센테이지가 더 작아야 합니다.');
                return ;
            }
            if(per2 > per1){
                alert('유력권 퍼센테이지가 더 작아야 합니다.');
                return ;
            }
            if(isNaN(per1) == true||isNaN(per2) == true||isNaN(per3) == true){
                alert('%값을 모두 입력해주세요.');
                return ;
            }
            var url = "{{ site_url("/predict/passline/calculateAjax") }}";
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'POST',
                'PredictIdx': PredictIdx,
                'TakeArea': TakeArea,
                'TakeMockPart': TakeMockPart,
                'Per1': per1,
                'Per2': per2,
                'Per3': per3
            };
            sendAjax(url,
                data,
                function(d){
                    if(d.data != null && typeof d.data != 'undefined'){
                        $('#exp1_'+TakeMockPart+'_'+TakeArea).val(d.data[0].MaxPoint);
                        $('#exp1_v_'+TakeMockPart+'_'+TakeArea).html(d.data[0].MaxPoint);
                        $('#exp2_'+TakeMockPart+'_'+TakeArea).val(d.data[0].MinPoint);
                        $('#exp2_v_'+TakeMockPart+'_'+TakeArea).html(" ~ " + d.data[0].MinPoint);

                        $('#strong1_'+TakeMockPart+'_'+TakeArea).val(d.data[1].MaxPoint);
                        $('#strong1_v_'+TakeMockPart+'_'+TakeArea).html(d.data[1].MaxPoint);
                        $('#strong2_'+TakeMockPart+'_'+TakeArea).val(d.data[1].MinPoint);
                        $('#strong2_v_'+TakeMockPart+'_'+TakeArea).html(" ~ " + d.data[1].MinPoint);

                        $('#stab_'+TakeMockPart+'_'+TakeArea).val(d.data[2].MinPoint);
                        $('#stab_v_'+TakeMockPart+'_'+TakeArea).html("~ " + d.data[2].MinPoint);
                    }else{
                        alert('과목별 성적통계의 조정점수 데이터가 없어서 계산되지 않았습니다.');
                    }
                },
                function(ret, status){
                    //alert(ret.ret_msg);
                }, true, 'POST', 'json');
        }

        function datatableSearching() {
            $datatable
                .column('.searching_take_mock_part').search($search_form.find('select[name="search_take_mock_part"]').val())
                .column('.searching_take_area').search($search_form.find('select[name="search_take_area"]').val())
                .draw();
        }
    </script>
@stop