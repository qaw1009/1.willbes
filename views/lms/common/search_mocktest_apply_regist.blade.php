@extends('lcms.layouts.master_modal')

@section('layer_title')
    신청정보입력
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_mock_form" name="_regi_mock_form" method="POST" onsubmit="return false;" novalidate>
@endsection

@section('layer_content')
    <h5><i class="fa fa-check-square-o"></i> {{ $mock_data['ProdName'] }}</h5>
    <div class="x_panel pt-0 mt-5">
        <div class="x_content">
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">응시형태</label>
                <div class="col-md-4 form-control-static">
                    <input type="hidden" name="TakeForm" id="TakeForm" value="{{$mock_data['TakeFormsCcd']}}">
                    {{$mock_data['TakeFormCcd_Name']}}
                </div>
                <label class="control-label col-md-2">응시분야</label>
                <div class="col-md-4 form-control-static">
                    {{$mock_data['CateName']}}
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">응시지역</label>
                <div class="col-md-4 form-inline">
                    @if($mock_data['TakeFormsCcd'] == '690001')
                        <p class="form-control-static pl-0">
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
                <label class="control-label col-md-2">응시번호</label>
                <div class="col-md-4 form-control-static">
                    결제 후 응시번호 확인 가능
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">시험응시일</label>
                <div class="col-md-10 form-control-static">
                    {{$mock_data['TakeStartDatm']}} ~ {{$mock_data['TakeEndDatm']}}
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">응시직렬</label>
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
                <label class="control-label col-md-2">응시필수과목</label>
                <div class="col-md-10 form-control-static">
                    @if(empty($subject_ess) == false)
                        @foreach($subject_ess as $row)
                            <input type="hidden" name="subject_ess[]" value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">
                            {{$row['SubjectName']}}{{ $loop->index == $loop->last ? '' : ',' }}
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">응시선택과목</label>
                <div class="col-md-10 form-inline">
                    @if(empty($subject_sub) == false)
                        <select id="mock_subject_sub_1" name="subject_sub[]" title="응시선택과목1" class="form-control">
                            <option value="">선택과목1</option>
                            @foreach($subject_sub as $row)
                                <option value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                        <select id="mock_subject_sub_2" name="subject_sub[]" title="응시선택과목2" class="form-control">
                            <option value="">선택과목2</option>
                            @foreach($subject_sub as $row)
                                <option value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                    @else
                        <p class="form-control-static pl-0">선택과목 없음</p>
                    @endif
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">가산점</label>
                <div class="col-md-10">
                    <div class="radio">
                        @if(empty($mock_addpoint) == false)
                            @foreach($mock_addpoint as $row)
                                <input type="radio" id="AddPoint{{$loop->index}}" name="AddPoint" class="flat" title="가산점" value="{{$row['CcdValue']}}">
                                <label for="AddPoint{{$loop->index}}" class="input-label">{{$row['CcdName']}}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">응시료</label>
                <div class="col-md-10 form-control-static">
                    {{ number_format($mock_data['RealSalePrice'], 0)}}원
                    (<strike>{{ number_format($mock_data['SalePrice'], 0)}}원</strike>)
                </div>
            </div>
        </div>
    </div>

    <div class="well">
        <div class="text-center bold">
            [접수기간] <span class="blue">{{$mock_data['SaleStartDatm']}} ~ {{$mock_data['SaleEndDatm']}}</span>
            <span class="red">(마감 {{floor((strtotime($mock_data['SaleEndDatm']) - strtotime(date("Y-m-d", time()))) / 86400) }}일전)</span>
        </div>
    </div>

    @if($mock_data['TakeFormsCcd'] =='690001')
        @if($order_prod_idx == 0 && $mock_data['IsSalesAble'] == 'Y')
            <div class="text-center">
                <button type="button" class="btn btn-sm btn-success" id="btn_mocktest_apply_regist_success">저장</button>
            </div>
        @else
            <div class="text-center red bold">
                구매불가 상품 입니다.
            </div>
        @endif
    @elseif($mock_data['TakeFormsCcd'] =='690002') {{--학원응시일경우 전체결제건수가 마감인원보다 작아야 가능--}}
        @if($all_pay_check < $mock_data['ClosingPerson'] && $order_prod_idx == 0 && $mock_data['IsSalesAble'] == 'Y')
            <div class="text-center">
                <button type="button" class="btn btn-sm btn-success" id="btn_mocktest_apply_regist_success">저장</button>
            </div>
        @else
            <div class="text-center red bold">
                구매불가 상품 입니다.
            </div>
        @endif
    @endif
@stop

@section('layer_footer')
    </form>
    <script type="text/javascript">
        var $parent_regi_form = $('#regi_form');
        var $_regi_mock_form = $('#_regi_mock_form');

        $(document).ready(function() {
            //최종선택
            $_regi_mock_form.on('click', '#btn_mocktest_apply_regist_success', function() {
                var subject_ess = '', subject_sub = '';
                var html = '';

                //필수과목데이터 가공처리
                $_regi_mock_form.find('input[name="subject_ess[]"]').each(function() {
                    subject_ess += $(this).val()+',';
                });
                subject_ess = subject_ess.substr(0, subject_ess.length -1);

                //선택과목데이터 가공처리
                $_regi_mock_form.find('select[name="subject_sub[]"] option:selected').each(function() {
                    subject_sub += $(this).val()+',';
                });
                subject_sub = subject_sub.substr(0, subject_sub.length -1);

                if ($_regi_mock_form.find('#TakeMockPart').val() === '') {
                    alert('응시직렬을 선택해주세요.');
                    return false;
                }

                if ($_regi_mock_form.find("#mock_subject_sub_1").length > 0) {
                    if ($_regi_mock_form.find("#mock_subject_sub_1").val() === '') {
                        alert('선택과목1을 선택해 주십시오.');return;
                    }
                }

                if ($_regi_mock_form.find("#mock_subject_sub_2").length > 0) {
                    if ($_regi_mock_form.find("#mock_subject_sub_2").val() === '') {
                        alert('선택과목2를 선택해 주십시오.');return;
                    }
                }

                if ($_regi_mock_form.find("#mock_subject_sub_1").length > 0 && $_regi_mock_form.find("#mock_subject_sub_2").length > 0) {
                    if ($_regi_mock_form.find("#mock_subject_sub_1").val() === $_regi_mock_form.find("#mock_subject_sub_2").val()) {
                        alert('\'선택과목1\' 과 \'선택과목2\'가 같습니다. 다른 과목으로 선택해 주십시오.');return;
                    }
                }

                if ($_regi_mock_form.find('input:radio[name="AddPoint"]:checked').length < 1) {
                    alert('가산점을 선택해 주십시오.');return;
                }

                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_prod_code_{{$prod_code}}" name="mock_prod_code[]" value="{{$prod_code}}">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_take_form_{{$prod_code}}" name="mock_take_form[]" value="'+$_regi_mock_form.find('#TakeForm').val()+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_take_part_{{$prod_code}}" name="mock_take_part[]" value="'+$_regi_mock_form.find('#TakeMockPart').val()+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_take_area_{{$prod_code}}" name="mock_take_area[]" value="'+$_regi_mock_form.find('#TakeArea').val()+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_subject_ess_{{$prod_code}}" name="mock_subject_ess[]" value="'+subject_ess+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_subject_sub_{{$prod_code}}" name="mock_subject_sub[]" value="'+subject_sub+'">';
                html += '<input type="hidden" class="mock_{{$prod_code}}" id="mock_add_point_{{$prod_code}}" name="mock_add_point[]" value="'+$_regi_mock_form.find('input:radio[name="AddPoint"]:checked').val()+'">';

                $parent_regi_form.find('.mock_{{$prod_code}}').remove();
                $parent_regi_form.append(html);

                $("#pop_modal").modal('toggle');
            });
        });
    </script>
@endsection