@extends('lcms.layouts.master')
@section('content')
    <h5>- 이벤트 룰렛 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/popup/store") }}?bm_idx=45" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="roulette_code" value="{{ $roulette_code }}"/>

        <div class="x_panel">
            <div class="x_title">
                <h2>룰렛관리 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">룰렛 코드</label>
                    <div class="col-md-5 form-inline">
                        @if($code_modify_type === true && $method == 'PUT')
                            <input type="text" class="form-control" name="up_roulette_code" id="up_roulette_code" value="{{$data['RouletteCode']}}" style="width: 100px;">
                        @else
                            <input type="hidden" name="up_roulette_code" value="{{$data['RouletteCode']}}">
                            {{$data['RouletteCode']}}
                        @endif
                        <p class="form-control-static"># 등록 시 자동 생성</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 ml-12-dot item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="roulette_title">제목<span class="required">*</span></label>
                    <div class="col-md-6 item">
                        <input type="text" id="roulette_title" name="roulette_title" class="form-control" maxlength="100" title="제목" required="required" value="{{ $data['Title'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="day_limit_count">일일 횟수제한<span class="required">*</span></label>
                    <div class="col-md-6 item">
                        <input type="text" class="form-control" name="day_limit_count" id="day_limit_count" value="{{$data['DayLimitCount']}}" style="width: 100px;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="max_limit_count">최대 횟수제한<span class="required">*</span></label>
                    <div class="col-md-6 item">
                        <input type="text" class="form-control" name="max_limit_count" id="max_limit_count" value="{{$data['MaxLimitCount']}}" style="width: 100px;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="roulette_start_datm">기간설정 <span class="required">*</span></label>
                    <div class="col-md-6 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="roulette_start_datm" name="roulette_start_datm" value="{{$data['RouletteStartDay']}}">
                        </div>
                        <select class="form-control ml-5" id="roulette_start_hour" name="roulette_start_hour">
                            @php
                                for($i=0; $i<=23; $i++) {
                                    $str = (strlen($i) <= 1) ? '0' : '';
                                    $selected = ($i == $data['RouletteStartHour']) ? "selected='selected'" : "";
                                    echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                }
                            @endphp
                        </select>
                        <span>:</span>
                        <select class="form-control" id="roulette_start_min" name="roulette_start_min">
                            @php
                                for($i=0; $i<=59; $i++) {
                                    $str = (strlen($i) <= 1) ? '0' : '';
                                    $selected = ($i == $data['RouletteStartMin']) ? "selected='selected'" : "";
                                    echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                }
                            @endphp
                        </select>
                        <span class="pl-5 pr-5">~</span>
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="roulette_end_datm" name="roulette_end_datm" value="{{$data['RouletteEndDay']}}">
                        </div>
                        <select class="form-control ml-5" id="roulette_end_hour" name="roulette_end_hour">
                            @php
                                for($i=0; $i<=23; $i++) {
                                    $str = (strlen($i) <= 1) ? '0' : '';
                                    $selected = ($i == $data['RouletteEndHour']) ? "selected='selected'" : "";
                                    echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                }
                            @endphp
                        </select>
                        <span>:</span>
                        <select class="form-control" id="roulette_end_min" name="roulette_end_min">
                            @php
                                for($i=0; $i<=59; $i++) {
                                    $str = (strlen($i) <= 1) ? '0' : '';
                                    $selected = ($i == $data['RouletteEndMin']) ? "selected='selected'" : "";
                                    echo "<option value='{$i}' {$selected}>{$str}{$i}</option>";
                                }
                            @endphp
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="roulette_type">확률타입<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="probability_type_2" name="probability_type" class="flat" value="2" @if($method == 'POST' || $data['ProbabilityType']=='2')checked="checked"@endif/> <label for="probability_type_2" class="input-label">수동</label>
                            <input type="radio" id="probability_type_1" name="probability_type" class="flat" value="1" required="required" @if($data['ProbabilityType']=='1')checked="checked"@endif/> <label for="probability_type_1" class="input-label">자동</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="roulette_product">룰렛상품설정<span class="required">*</span></label>
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="col-md-6 form-inline">
                                <button type="button" class="btn btn-primary btn-sm btn-add-product">룰렛상품추가</button>
                                {{-- TODO : 룰렛 확률 테스트 기능 차 후 개발 --}}
                                {{--<button type="button" class="btn btn-success btn-sm btn-roulette-test">확률테스트</button>--}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 form-inline">
                                <table class="table table-striped table-bordered" id="table_roulette_product">
                                    <thead>
                                    <tr>
                                        <th>룰렛상품명</th>
                                        <th>룰렛상품수량</th>
                                        <th>룰렛상품확률</th>
                                        <th>룰렛상품정렬순서</th>
                                        <th>사용여부</th>
                                        <th>수정</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (empty($data['roulette_list_otherinfo']) === false)
                                        @foreach($data['roulette_list_otherinfo'] as $row)
                                            <tr class="temp_roulette_product" id="temp-roulette-product-{{ $loop->index }}">
                                                <td>
                                                    <input type="hidden" name="rro_idx[]" value="{{ $row['RroIdx'] }}">
                                                    <input type="text" name="roulette_prod_name[]" class="form-control" title="룰렛상품명" style="width: 230px;" value="{{ (empty($row['ProdName']) === false) ? $row['ProdName'] : '0' }}"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="roulette_prod_qty[]" class="form-control" title="룰렛상품수량" style="width: 50px;" value="{{ (empty($row['ProdQty']) === false) ? $row['ProdQty'] : '0' }}"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="roulette_prod_probability[]" class="form-control" title="룰렛상품확률" style="width: 50px;" value="{{ (empty($row['ProdProbability']) === false) ? $row['ProdProbability'] : '0' }}"/>
                                                </td>
                                                <td>
                                                    <input type="text" name="roulette_order_num[]" class="form-control" title="룰렛상품정렬순서" style="width: 50px;" value="{{ (empty($row['OrderNum']) === false) ? $row['OrderNum'] : '0' }}"/>
                                                </td>
                                                <td>
                                                    {!! (empty($row['IsUse']) === false) ? ($row['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' : '' !!}
                                                </td>
                                                <td><a href="#none" class="btn-otherinfo" data-otherinfo-idx="{{ $row['RroIdx'] }}" data-otherinfo-isuse="{{ ($row['IsUse'] == 'Y') ? 'N' : 'Y' }}"><u>{{ (empty($row['IsUse']) === false) ? ($row['IsUse'] == 'Y') ? '미사용' : '사용' : '' }}</u></a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                • 사용자 페이지에 노출되는 상품을 관리할 수 있습니다.<br>
                                • <span class="bold blue">중요) 확률계산법</span><br>
                                  - 자동 : ((상품별 수량 - 상품별 사용수) / 총 상품수) * 100 [특정상품의 사용 수량이 많을 경우 상대적으로 당첨확률을 낮아짐]<br>
                                  - 수동 : 상품별 룰렛상품확률 [상품수량 관계X]<br>
                                  - 공통조건 : 사용된 수량이 상품수량과 일치할 경우 당첨확률은 0으로 자동 설정됨
                            </div>
                        </div>

                        {{--<div class="form-group">
                            <label class="control-label col-md-1-1" for="roulette_memo">확률 테스트 결과</label>
                            <div class="col-md-10 form-control-static" id="roulette_test_box"></div>
                        </div>--}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="roulette_memo">메모</label>
                    <div class="col-md-7">
                        <textarea id="roulette_memo" name="roulette_memo" class="form-control" rows="5" title="내용" placeholder="">{{ $data['Memo'] }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdAdminName'] }}@endif</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>

        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            var temp_roulette_prod_num = $(".temp_roulette_product").length + 1;

            //상품추가
            $regi_form.on('click', '.btn-add-product', function() {
                var add_lists;
                add_lists = '<tr id="temp-roulette-product-'+temp_roulette_prod_num+'">';
                add_lists += '<td><input type="hidden" name="rro_idx[]" value=""><input type="text" name="roulette_prod_name[]" class="form-control" title="룰렛상품명" style="width: 230px;"/></td>';
                add_lists += '<td><input type="text" name="roulette_prod_qty[]" class="form-control" title="룰렛상품수량" style="width: 50px;"/></td>';
                add_lists += '<td><input type="text" name="roulette_prod_probability[]" class="form-control" title="룰렛상품확률" style="width: 50px;"/></td>';
                add_lists += '<td><input type="text" name="roulette_order_num[]" class="form-control" title="룰렛상품노출횟수" style="width: 50px;"/></td>';
                add_lists += '<td></td>';
                add_lists += '<td><a href="#none" class="btn-roulette-product-delete" data-temp-tr-idx="'+temp_roulette_prod_num+'"><i class="fa fa-times fa-lg red"></i></a></td>';
                add_lists += '<tr>';
                $('#table_roulette_product > tbody:last').append(add_lists);
                temp_roulette_prod_num = temp_roulette_prod_num + 1;
            });

            $regi_form.on('click', '.btn-roulette-test', function () {
                var text = '테스트 실패';
                var row_idx = $(this).data('otherinfo-idx');
                var is_use = $(this).data('otherinfo-isuse');
                var _url = '{{ site_url('/site/eventRoulette/rouletteTestData/') }}';
                var _data = {
                    '{{ csrf_token_name() }}': $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method': 'PUT',
                    'IsUse': is_use,
                };
                sendAjax(_url, _data, function (ret) {
                    console.log(ret.ret_data);
                    if (ret.ret_cd) {
                        text = '상품별 확률 : ' + ret.ret_data['probability'] + '<Br>';
                        text += '당첨 상품 : ' + ret.ret_data['result'] + '<Br>';
                    }
                    $('#roulette_test_box').html(text);
                }, showError, false, 'POST');
            });

            /**
             * 테이블 row 삭제
             */
            $regi_form.on('click', '.btn-roulette-product-delete', function() {
                var row_idx = $(this).data('temp-tr-idx');
                $('#temp-roulette-product-'+row_idx).remove();
            });

            /**
             * 부가정보 단일 데이터 삭제
             */
            $regi_form.on('click', '.btn-otherinfo', function() {
                if (!confirm('수정하시겠습니까?')) { return; }
                var row_idx = $(this).data('otherinfo-idx');
                var is_use = $(this).data('otherinfo-isuse');
                var _url = '{{ site_url('/site/eventRoulette/updateOtherInfoIsUse/') }}' + row_idx;
                var _data = {
                    '{{ csrf_token_name() }}': $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method': 'PUT',
                    'IsUse': is_use,
                };
                sendAjax(_url, _data, function (ret) {
                    location.reload();
                }, showError, false, 'POST');
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/eventRoulette") }}/' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/eventRoulette/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/eventRoulette/") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop