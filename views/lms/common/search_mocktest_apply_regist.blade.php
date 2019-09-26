@extends('lcms.layouts.master_modal')

@section('layer_title')
    신청정보입력
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_search_form" name="_search_form" method="POST" onsubmit="return false;" novalidate>
@endsection

@section('layer_content')
    <h5>• {{ $mock_data['ProdName'] }}</h5>
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">응시형태</label>
                <div class="col-md-4">
                    <p class="form-control-static">
                        <input type="hidden" name="TakeForm" id="TakeForm" value="{{$mock_data['TakeFormsCcd']}}">
                        {{$mock_data['TakeFormCcd_Name']}}
                    </p>
                </div>
                <label class="control-label col-md-1-1">응시분야</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{$mock_data['CateName']}}</p>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">응시지역</label>
                <div class="col-md-4 form-inline">
                    @if($mock_data['TakeFormsCcd'] == '690001')
                        <p class="form-control-static">
                            <input type="hidden" id="TakeArea" name="TakeArea" value="">전국
                        </p>
                    @else
                        <select id="TakeArea" name="TakeArea" title="응시지역" class="form-control">
                            <option value="">지역선택</option>
                            @if(empty($mock_area) == false)
                                @foreach($mock_area as $row)
                                    <option value="{{$row['Ccd']}}">{{$row['CcdName']}}</option>
                                @endforeach
                            @endif
                        </select>
                    @endif
                </div>
                <label class="control-label col-md-1-1">응시번호</label>
                <div class="col-md-4">
                    <p class="form-control-static">"결제 후 응시번호 확인 가능"</p>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">시험응시일</label>
                <div class="col-md-10 form-inline">
                    <p class="form-control-static">{{$mock_data['TakeStartDatm']}} ~ {{$mock_data['TakeEndDatm']}}</p>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">응시직렬</label>
                <div class="col-md-4 form-inline">
                    <select id="TakeMockPart" name="TakeMockPart" title="응시직렬" class="form-control">
                        <option value="">직렬선택</option>
                        @if(empty($mock_part) == false)
                            @foreach($mock_part as $row)
                                <option value="{{$row['Ccd']}}">{{$row['CcdName']}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">응시필수과목</label>
                <div class="col-md-10 form-inline">
                    @php
                        $pre = '';
                    @endphp
                    @if(empty($subject_ess) == false)
                        @foreach($subject_ess as $row)
                            @if(empty($pre) == false),@endif
                                <input type="hidden" name="subject_ess[]" value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">
                                <p class="form-control-static">{{$row['SubjectName']}}</p>
                            @php $pre='Y' @endphp
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">응시선택과목</label>
                <div class="col-md-10 form-inline">
                    @if(empty($subject_sub) == false)
                        <select id="mock_paper_subject_2" name="subject_sub[]" title="응시선택과목1" class="form-control">
                            <option value="">선택과목1</option>
                            @foreach($subject_sub as $row)
                                <option value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                        <select id="mock_paper_subject_3" name="subject_sub[]" title="응시선택과목2" class="form-control">
                            <option value="">선택과목2</option>
                            @foreach($subject_sub as $row)
                                <option value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                    @else
                        선택과목 없음
                    @endif
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">가산점</label>
                <div class="col-md-10 form-inline">
                    @if(empty($mock_addpoint) == false)
                        @foreach($mock_addpoint as $row)
                            <div class="radio">
                                <input type="radio" id="AddPoint" name="AddPoint" class="flat" title="가산점" value="{{$row['CcdValue']}}"> <label for="AddPoint">{{$row['CcdName']}}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">응시료</label>
                <div class="col-md-10 form-inline">
                    @php
                        $sales_info = json_decode($mock_data['ProdPriceData'], true);
                    @endphp
                    {{ number_format($sales_info[0]['RealSalePrice'],0)}}원
                </div>
            </div>
        </div>

        <div class="x_content">
            <div class="form-group form-group-sm">
                <div class="text-center col-md-12 form-inline bold">
                    [접수기간] <span class="blue">{{$mock_data['SaleStartDatm']}} ~ {{$mock_data['SaleEndDatm']}}</span>
                    <span class="red">(마감 {{floor((strtotime($mock_data['SaleEndDatm']) - strtotime(date("Y-m-d", time()))) / 86400) }}일전)</span>
                </div>
            </div>
        </div>
    </div>

    @if($mock_data['TakeFormsCcd'] =='690001')
        @if($order_prod_idx == 0 && $mock_data["IsSalesAble"] == 'Y')
            <div class="form-group btn-wrap clear pt-20">
                <div class="text-center col-md-12 form-inline">
                    <button type="button" class="btn btn-sm btn-success" id="btn_mocktest_apply_regist_success">선택</button>
                </div>
            </div>
        @else
            <div class="form-group btn-wrap clear pt-20">
                <div class="text-center col-md-12 form-inline">
                    구매불가 상품 입니다.
                </div>
            </div>
        @endif
    @elseif($mock_data['TakeFormsCcd'] =='690002') {{--학원응시일경우 전체결제건수가 마감인원보다 작아야 가능--}}
        @if($all_pay_check < $mock_data['ClosingPerson'] && $order_prod_idx == 0 && $mock_data["IsSalesAble"] == 'Y')
            <div class="form-group btn-wrap clear pt-20">
                <div class="text-center col-md-12 form-inline">
                    <button type="button" class="btn btn-sm btn-success" id="btn_mocktest_apply_regist_success">선택</button>
                </div>
            </div>
        @else
            <div class="form-group btn-wrap clear pt-20">
                <div class="text-center col-md-12 form-inline">
                    구매불가 상품 입니다.
                </div>
            </div>
        @endif
    @endif
@stop

@section('layer_footer')
    </form>
    <script type="text/javascript">
        var $parent_regi_form = $('#regi_form');
        var $_search_form = $('#_search_form');

        $(document).ready(function() {
            //최종선택
            $('#btn_mocktest_apply_regist_success').click(function() {
                var add_point, subject_ess, subject_sub = '';
                var html = '';
                add_point = $(":input:radio[name=AddPoint]:checked").val();
                subject_ess = $("input[name='subject_ess[]']").val();
                $('select[name="subject_sub[]"] option:selected').each(function() {
                    subject_sub += $(this).val()+',';
                });
                subject_sub = subject_sub.substr(0, subject_sub.length -1);

                if ($('#TakeMockPart').val() == '') {
                    alert('응시직렬을 선택해주세요.');
                    return false;
                }

                if ( $("#mock_paper_subject_2").length > 0 ) {
                    if($("#mock_paper_subject_2").val() == '') {
                        alert('선택과목1을 선택해 주십시오.');return;
                    }
                }

                if ( $("#mock_paper_subject_3").length > 0 ) {
                    if($("#mock_paper_subject_3").val() == '') {
                        alert('선택과목2를 선택해 주십시오.');return;
                    }
                }

                if ( $("#mock_paper_subject_2").length > 0 && $("#mock_paper_subject_3").length > 0  ) {
                    if($("#mock_paper_subject_2").val() == $("#mock_paper_subject_3").val()) {
                        alert('\'선택과목1\' 과 \'선택과목2\'가 같습니다. 다른 과목으로 선택해 주십시오.');return;
                    }
                }

                if ( $('input:radio[name=AddPoint]').is(':checked') == false ) {
                    alert('가산점을 선택해 주십시오.');return;
                }

                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_prod_code_{{$prod_code}}" name="mock_prod_code[]" value="{{$prod_code}}">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_take_form_{{$prod_code}}" name="mock_take_form[]" value="'+$('#TakeForm').val()+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_take_part_{{$prod_code}}" name="mock_take_part[]" value="'+$('#TakeMockPart').val()+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_take_area_{{$prod_code}}" name="mock_take_area[]" value="'+$('#TakeArea').val()+'">';

                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_subject_ess_{{$prod_code}}" name="mock_subject_ess[]" value="'+subject_ess+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_subject_sub_{{$prod_code}}" name="mock_subject_sub[]" value="'+subject_sub+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_add_point_{{$prod_code}}" name="mock_add_point[]" value="'+add_point+'">';

                $parent_regi_form.find('input[id="mock_take_form_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="mock_take_part_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="mock_take_area_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="mock_subject_ess_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="mock_subject_sub_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="mock_add_point_{{$prod_code}}"]').remove();
                $parent_regi_form.append(html);
                $("#pop_modal").modal('toggle');
            });
        });
    </script>
@endsection