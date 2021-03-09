@extends('lcms.layouts.master')

@section('content')
    <style>
        .display-none {display:none;}
    </style>
    <h5>- 합격예측서비스 직렬별 예상 합격선을 관리합니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_PredictIdx" name="search_PredictIdx">
                            @foreach($arr_base['productList'] as $key => $val)
                                <option value="{{ $val['PredictIdx'] }}" class="{{ $val['SiteCode'] }}" @if($PredictIdx == $val['PredictIdx']) selected @endif>[{{ $val['PredictIdx'] }}] {{ $val['ProdName'] }}</option>
                                {{--<option value="{{ $val['PredictIdx'] }}" class="{{ $val['SiteCode'] }}" @if($PredictIdx == $val['PredictIdx'] || $loop->first === true)checked="checked"@endif>[{{ $val['PredictIdx'] }}] {{ $val['ProdName'] }}</option>--}}
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeMockPart" name="search_TakeMockPart">
                            <option value="">직렬선택</option>
                            @foreach($arr_base['serialList'] as $key => $val)
                                <option value="{{ $val['Ccd'] }}" @if(empty($arr_input['TakeMockPart']) === false && $arr_input['TakeMockPart'] == $val['Ccd']) selected @endif>{{ $val['CcdName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeArea" name="search_TakeArea">
                            <option value="">지역선택</option>
                            @foreach($arr_base['areaList'] as $key => $val)
                                @if($val['Ccd'] != '712018')
                                    <option value="{{ $val['Ccd'] }}" @if(empty($arr_input['TakeArea']) === false && $arr_input['TakeArea'] == $val['Ccd']) selected @endif>{{ $val['CcdName'] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="inline-block ml-10">
                            <span class="required">*</span> 합격예측서비스명을 먼저 선택해 주세요.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" onclick="selProd();"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <input type="hidden" id="PredictIdx" name="PredictIdx" value="{{ $PredictIdx }}" />
                <div>
                    <span class="required">*</span> 선발인원 ~ 지난평균, 전체평균 항목은  직렬/지역별 사용여부에 상관없이 사용자단 출력 (‘수정 시 ‘예상합격선 저장’ 버튼으로만 업데이트 처리<br>
                    <span class="required">*</span> 일배수컷, 기대권, 유력권, 안정권 항목은 직렬/지역별 사용여부를 ‘사용’으로 설정 시 사용자단 출력 (‘미사용’ 설정 시 ‘집계중’으로 출력)<br>
                    <span class="required">*</span> 채점수/등록수 출력 조건은 아래와 같습니다.<br>
                    - 채점수 : 실제 채점자 수, 등록수 : 실제 채점자 수 + 가데이터 등록 수
                </div>
                <div class="text-right">
                    <input type="button" value="예상합격선 저장" class="btn btn-sm btn-success mr-0" onClick="registLine('{{ $PredictIdx }}')"/>
                </div>
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">사용</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">지역</th>
                        <th class="text-center">선발인원</th>
                        <th class="text-center">접수인원</th>
                        <th class="text-center">경쟁률</th>
                        <th class="text-center">직전시험경쟁률</th>
                        <th class="text-center">직전시험합격선</th>
                        <th class="text-center">지난평균</th>
                        <th class="text-center">일배수컷</th>
                        <th class="text-center">전체평균</th>
                        <th class="text-center">채점수/등록수</th>
                        <th class="text-center" style="width: 140px;">기대권 <br>(최고점~최저점)</th>
                        <th class="text-center" style="width: 140px;">유력권 <br>(최고점~최저점)</th>
                        <th class="text-center" style="width: 120px;">안정권 <br>(~최저점)</th>
                        <th class="text-center">계산</th>
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
                            <td>{{ $row['TakeMockPartName'] }}<input type="hidden" name="TakeMockPart[]" value="{{ $row['TakeMockPart'] }}" /></td>
                            <td>{{ $row['TakeAreaName'] }}<input type="hidden" name="TakeArea[]" value="{{ $row['TakeArea'] }}" /></td>
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
                                <input type="button" value="계산" class="btn btn-xs btn-primary mr-0" onClick="calculate('{{ $row['TakeMockPart'] }}','{{ $row['TakeArea'] }}','{{ $PredictIdx }}')" />
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $search_form = $('#search_form');
        var $regi_form = $('#regi_form');
        var $datatable;
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // 합격예측서비스명 자동 변경
            $search_form.find('select[name="search_PredictIdx"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                responsive: false,
                serverSide: false,
                ajax : false,
                paging: false,
                searching: false
            });
        });

        function selProd() {
            var qs = '?PredictIdx=' + $search_form.find('select[name="search_PredictIdx"]').val();
            qs += '&SiteCode=' + $search_form.find('select[name="search_site_code"]').val();
            qs += '&TakeMockPart=' + $search_form.find('select[name="search_TakeMockPart"]').val();
            qs += '&TakeArea=' + $search_form.find('select[name="search_TakeArea"]').val();
            location.href = '/predict/passline/' + qs;
        }

        function registLine(PredictIdx){
            var get_take_mock_part = '{{(empty($arr_input['TakeMockPart']) === true ? '' : $arr_input['TakeMockPart'])}}';
            var get_take_area = '{{(empty($arr_input['TakeArea']) === true ? '' : $arr_input['TakeArea'])}}';
            if (!confirm('저장하시겠습니까?')) { return true; }
            if (get_take_mock_part != '' || get_take_area != '') {
                alert('직렬 또는 지역으로 검색된 상태입니다. 검색초기화 후 저장해주세요.')
                return false;
            }

            var _url = '{{ site_url('/predict/passline/store') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url('/predict/passline/') }}?PredictIdx=' + PredictIdx);
                }
            }, showValidateError, null, false, 'alert');
        }

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
    </script>
@stop
