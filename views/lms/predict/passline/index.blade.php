@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 구성을 위해 과목별 문제, 정답, 해설을 등록하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">합격예측</label>
                    <div class="col-md-11">

                        <select class="form-control mr-5" id="search_ProdCode" name="search_ProdCode" onChange="selProd(this.value)">
                            <option value="">합격예측명</option>
                            @foreach($productList as $key => $val)
                                <option value="{{ $val['ProdCode'] }}" @if($prodcode == $val['ProdCode']) selected @endif>{{ $val['ProdName'] }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

            </div>
        </div>
    </form>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content mb-20">
            <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <input type="hidden" id="ProdCode" name="ProdCode" value="{{ $prodcode }}" />
                <div style="text-align:right; margin:10px;"><input type="button" value="예상합격선 저장" onClick="registLine('{{ $prodcode }}')"/></div>
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
                        <th class="text-center">전체평균</th>
                        <th class="text-center">채점수 / 등록수</th>
                        <th class="text-center">기대권</th>
                        <th class="text-center">유력권</th>
                        <th class="text-center">안정권</th>
                        <th class="text-center">계산</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSet as $key => $val)
                            @foreach($val as $key2 => $val2)
                                <tr>
                                    <td>
                                        <select name="IsUse[]" class="form-control mr-5">
                                            <option value="Y" @if($val2['IsUse'] == 'Y') selected @endif>사용</option>
                                            <option value="N" @if($val2['IsUse'] == 'N') selected @endif>미사용</option>
                                        </select>
                                    </td>
                                    <td>{{ $val2['TakeMockPartName'] }}<input type="hidden" name="TakeMockPart[]" value="{{ $val2['TakeMockPart'] }}" /></td>
                                    <td>{{ $val2['TakeAreaName'] }}<input type="hidden" name="TakeArea[]" value="{{ $val2['TakeArea'] }}" /></td>
                                    <td><input type="text" name="PickNum[]" value="{{ $val2['PickNum'] }}" style="width:50px;" /></td>
                                    <td><input type="text" name="TakeNum[]" value="{{ $val2['TakeNum'] }}" style="width:50px;" /></td>
                                    <td><input type="text" name="CompetitionRateNow[]" value="{{ $val2['CompetitionRateNow'] }}" style="width:50px;" /></td>
                                    <td><input type="text" name="CompetitionRateAgo[]" value="{{ $val2['CompetitionRateAgo'] }}" style="width:50px;" /></td>
                                    <td><input type="text" name="PassLineAgo[]" value="{{ $val2['PassLineAgo'] }}" style="width:50px;" /></td>
                                    <td><input type="text" name="AvrPointAgo[]" value="{{ $val2['AvrPointAgo'] }}" style="width:50px;" /></td>
                                    <td>{{ $val2['TakeOrigin'] ? $val2['TakeOrigin'] : 0 }} / {{ $val2['TotalRegist'] ? $val2['TotalRegist'] : 0}}</td>
                                    <td>
                                        구간 : <input type="text" id="per1_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" name="ExpectAvrPercent[]" value="{{ $val2['ExpectAvrPercent'] ? $val2['ExpectAvrPercent'] : ""}}" style="width:50px;" /> % <br>
                                        참조 :
                                        <input type="hidden" id="exp1_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" name="ExpectAvrPoint1Ref[]" value="{{ $val2['ExpectAvrPoint1Ref'] }}" style="width:60px;" />
                                        <span id="exp1_v_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}">{{ $val2['ExpectAvrPoint1Ref'] ? $val2['ExpectAvrPoint1Ref'] : "" }}</span>
                                        <input type="hidden" id="exp2_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" name="ExpectAvrPoint2Ref[]" value="{{ $val2['ExpectAvrPoint2Ref'] }}" style="width:60px;" />
                                        <span id="exp2_v_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}">{{ $val2['ExpectAvrPoint2Ref'] ? " ~ ".$val2['ExpectAvrPoint2Ref'] : "" }}</span>
                                        <br>
                                        출력 :
                                        <input type="text" name="ExpectAvrPoint1[]" value="{{ $val2['ExpectAvrPoint1'] ? $val2['ExpectAvrPoint1'] : ""}}" style="width:60px;" /> ~
                                        <input type="text" name="ExpectAvrPoint2[]" value="{{ $val2['ExpectAvrPoint2'] ? $val2['ExpectAvrPoint2'] : ""}}" style="width:60px;" />
                                    </td>
                                    <td>
                                        구간 : <input type="text" id="per2_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" name="StrongAvrPercent[]" value="{{ $val2['StrongAvrPercent'] ? $val2['StrongAvrPercent'] : ""}}" style="width:50px;" /> % <br>
                                        참조 :
                                        <input type="hidden" id="strong1_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" name="StrongAvrPoint1Ref[]" value="{{ $val2['StrongAvrPoint1Ref'] }}" style="width:60px;" />
                                        <span id="strong1_v_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}">{{ $val2['StrongAvrPoint1Ref'] ? $val2['StrongAvrPoint1Ref'] : "" }}</span>
                                        <input type="hidden" id="strong2_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" name="StrongAvrPoint2Ref[]" value="{{ $val2['StrongAvrPoint2Ref'] }}" style="width:60px;" />
                                        <span id="strong2_v_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}">{{ $val2['StrongAvrPoint2Ref'] ? " ~ ".$val2['StrongAvrPoint2Ref'] : "" }}</span>
                                        <br>
                                        출력 :
                                        <input type="text" name="StrongAvrPoint1[]" value="{{ $val2['StrongAvrPoint1'] ? $val2['StrongAvrPoint1'] : ""}}" style="width:60px;" /> ~
                                        <input type="text" name="StrongAvrPoint2[]" value="{{ $val2['StrongAvrPoint2'] ? $val2['StrongAvrPoint2'] : "" }}" style="width:60px;" />
                                    </td>
                                    <td>
                                        구간 : <input type="text" id="per3_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" name="StabilityAvrPercent[]" value="{{ $val2['StabilityAvrPercent'] ? $val2['StabilityAvrPercent'] : "" }}" style="width:50px;" /> % <br>
                                        참조 :
                                        <input type="hidden" id="stab_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}" name="StabilityAvrPointRef[]" value="{{ $val2['StabilityAvrPointRef'] }}" style="width:60px;" />
                                        <span id="stab_v_{{ $val2['TakeMockPart'] }}_{{ $val2['TakeArea'] }}">{{ $val2['StabilityAvrPointRef'] ? $val2['StabilityAvrPointRef']." ~ " : ""}}</span><br>
                                        출력 :
                                        <input type="text" name="StabilityAvrPoint[]" value="{{ $val2['StabilityAvrPoint'] ? $val2['StabilityAvrPoint'] : ""}}" style="width:60px;" /> ~
                                    </td>
                                    <td>
                                        <input type="button" value="계산" onClick="calculate('{{ $val2['TakeMockPart'] }}','{{ $val2['TakeArea'] }}','{{ $prodcode }}')" />
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
        });

        function selProd(value){

            location.href = "/predict/passline/?prodcode="+value;

        }

        function registLine(prodcode){
            var _url = '{{ site_url('/predict/passline/store') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url('/predict/passline/') }}?prodcode=' + prodcode);
                }
            }, showValidateError, null, false, 'alert');
        }

        function calculate(TakeMockPart, TakeArea, ProdCode){
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
            url = "{{ site_url("/predict/passline/calculateAjax") }}";
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'POST',
                'ProdCode': ProdCode,
                'TakeArea': TakeArea,
                'TakeMockPart': TakeMockPart,
                'Per1': per1,
                'Per2': per2,
                'Per3': per3
            };
            sendAjax(url,
                data,
                function(d){
                    var str = d.data;
                    var arrStr = str.split('/');

                    $('#exp1_'+TakeMockPart+'_'+TakeArea).val(arrStr[1]);
                    $('#exp1_v_'+TakeMockPart+'_'+TakeArea).html(arrStr[1]);
                    $('#exp2_'+TakeMockPart+'_'+TakeArea).val(arrStr[0]);
                    $('#exp2_v_'+TakeMockPart+'_'+TakeArea).html("~" + arrStr[0]);
                    $('#strong1_'+TakeMockPart+'_'+TakeArea).val(arrStr[3]);
                    $('#strong1_v_'+TakeMockPart+'_'+TakeArea).html(arrStr[3]);
                    $('#strong2_'+TakeMockPart+'_'+TakeArea).val(arrStr[2]);
                    $('#strong2_v_'+TakeMockPart+'_'+TakeArea).html("~" + arrStr[2]);
                    $('#stab_'+TakeMockPart+'_'+TakeArea).val(arrStr[4]);
                    $('#stab_v_'+TakeMockPart+'_'+TakeArea).html(arrStr[4] + "~");
                },
                function(ret, status){
                    //alert(ret.ret_msg);
                }, true, 'POST', 'json');
        }
    </script>
@stop
