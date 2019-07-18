@extends('lcms.layouts.master')
@section('content')
    <h5>- 이벤트 룰렛 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/eventRoulette/store") }}" novalidate>--}}
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
                    <div class="col-md-5">
                        {{--<input type="text" class="form-control" name="up_roulette_code" id="up_roulette_code" value="{{$data['RouletteCode']}}" style="width: 100px;" @if($method == 'PUT')readonly="readonly"@endif>
                        <p class="form-control-static"># 등록 시 자동 생성</p>--}}
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RouletteCode'] }}@else # 등록 시 자동 생성 @endif</p>
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
                    <label class="control-label col-md-1-1" for="day_limit_count">참여 횟수 조건<span class="required">*</span></label>
                    <div class="form-inline col-md-10 item">
                        아이디 기준 참여 횟수
                        <input type="text" class="form-control" name="member_limit_count" id="member_limit_count" value="{{$data['MemberLimitCount']}}" style="width: 100px;" {{ $modify_type }}> 회
                        <span class="ml-10 mr-10"> | </span>
                        전체 참여 횟수
                        <input type="text" class="form-control" name="max_limit_count" id="max_limit_count" value="{{$data['MaxLimitCount']}}" style="width: 100px;" {{ $modify_type }}> 회
                        <p class="bold blue">• 위 참여 횟수 조건은 아래 '당첨 카운트 기준일' 에 설정된 유형에 따라 참여 횟수가 카운트 됩니다.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="max_limit_count">당첨 카운트 기준일<span class="required">*</span></label>
                    <div class="col-md-6 item">
                        <input type="radio" id="count_type_Y" name="count_type" class="flat" value="D" @if($method == 'POST' || $data['CountType']=='D')checked="checked"@endif {{ $modify_type }}/> <label for="count_type_Y" class="input-label">1일씩</label>
                        <input type="radio" id="count_type_N" name="count_type" class="flat" value="T" required="required" @if($data['CountType']=='T')checked="checked"@endif {{ $modify_type }}/> <label for="count_type_N" class="input-label">전체 룰렛 진행 기간</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="new_member_join_type_Y">신규회원가입대상사용여부<span class="required">*</span></label>
                    <div class="col-md-2 item">
                        <div class="radio">
                            <input type="radio" id="new_member_join_type_Y" name="new_member_join_type" class="flat" value="Y" @if($data['NewMemberJoinType']=='Y')checked="checked"@endif/> <label for="new_member_join_type_Y" class="input-label">사용</label>
                            <input type="radio" id="new_member_join_type_N" name="new_member_join_type" class="flat" value="N" required="required" @if($method == 'POST' || $data['NewMemberJoinType']=='N')checked="checked"@endif/> <label for="new_member_join_type_N" class="input-label">미사용</label>
                        </div>
                    </div>

                    <div class="col-md-6 form-inline member-join-date">
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="new_member_join_start_date" name="new_member_join_start_date" value="{{$data['NewMemberJoinStartDate']}}">
                        </div>
                        <span class="pl-5 pr-5">~</span>
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="new_member_join_end_date" name="new_member_join_end_date" value="{{$data['NewMemberJoinEndDate']}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="roulette_start_datm">룰렛 이벤트 기간설정 <span class="required">*</span></label>
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
                    <label class="control-label col-md-1-1" for="probability_type_1">확률타입<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="probability_type_1" name="probability_type" class="flat" value="1" @if($method == 'POST' || $data['ProbabilityType']=='1')checked="checked"@endif {{ $modify_type }}/> <label for="probability_type_1" class="input-label">수동</label>
                            <input type="radio" id="probability_type_2" name="probability_type" class="flat" value="2" required="required" @if($data['ProbabilityType']=='2')checked="checked"@endif {{ $modify_type }}/> <label for="probability_type_2" class="input-label">자동</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="roulette_product">룰렛상품설정<span class="required">*</span></label>
                    <div class="col-md-10">
                        <button type="button" class="btn btn-primary btn-sm btn-add-product" {{ $modify_type }}>룰렛상품추가</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 form-inline">
                        <table class="table table-striped table-bordered" id="table_roulette_product">
                            <thead>
                            <tr>
                                <th>룰렛상품명</th>
                                <th>룰렛상품이미지</th>
                                <th>룰렛상품마감이미지</th>
                                <th>룰렛상품수량</th>
                                <th>룰렛상품당첨순번(수동|콤마구분)</th>
                                <th>룰렛상품확률(자동)</th>
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
                                            <input type="hidden" name="roulette_file_full_path[]" value="{{ urlencode($row['FileFullPath']) }}">
                                            <input type="text" name="roulette_prod_name[]" class="form-control" title="룰렛상품명" style="width: 230px;" value="{{ (empty($row['ProdName']) === false) ? $row['ProdName'] : '0' }}"/>
                                        </td>
                                        <td>
                                            @if(empty($row['FileRealName']) === true)
                                                <input type="file" name="roulette_attach_file[]" class="form-control input-file" title="룰렛상품이미지"/>
                                            @else
                                                <input type="file" name="roulette_attach_file[]" class="form-control input-file" title="룰렛상품이미지"/>
                                                <p class="mt-5">
                                                    <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($row['FileFullPath'])}}" data-file-name="{{ urlencode($row['FileRealName']) }}" target="_blank">[{{ $row['FileRealName'] }}]</a>
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            @if(empty($row['FileRealName']) === true)
                                                <input type="file" name="roulette_attach_finish_file[]" class="form-control input-file" title="룰렛상품마감이미지"/>
                                            @else
                                                <input type="file" name="roulette_attach_finish_file[]" class="form-control input-file" title="룰렛상품마감이미지"/>
                                                <p class="mt-5">
                                                    <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($row['FinishFileFullPath'])}}" data-file-name="{{ urlencode($row['FinishFileRealName']) }}" target="_blank">[{{ $row['FinishFileRealName'] }}]</a>
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="text" name="roulette_prod_qty[]" class="form-control" title="룰렛상품수량" style="width: 50px;" value="{{ (empty($row['ProdQty']) === false) ? $row['ProdQty'] : '0' }}"/>
                                        </td>
                                        <td>
                                            <input type="text" name="roulette_prod_win_turns[]" class="form-control" title="룰렛상품당첨순번" style="width: 230px;" value="{{ (empty($row['ProdWinTurns']) === false) ? implode(',', json_decode($row['ProdWinTurns'])) : '0' }}"/>
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
                        • 사용자 페이지에 노출되는 상품을 관리할 수 있습니다.<br><br>
                        • <span class="bold blue">중요) 데이터 수정 조건</span><br>
                        - 당첨자 데이터 있을 경우 : <b>'제목, 사용여부, 신규회원가입대상사용여부, 이벤트 기간 설정'</b> 해당 항목만 수정 가능.<br>
                        - 단, 당첨자 데이터가 없을 경우 수정 제한 없음.<br>
                        • <span class="bold blue">중요) 확률계산법</span><br>
                        - 수동 : 상품별 당첨 순번 지정. 콤마(,)로 구분하여 순번 설정.<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1,11,21 (룰렛 실행 횟수가 1번째, 11번째, 21번째에 해당되는 회원이 당첨되는 구조.<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;지정하지 않은 상품은 기본 0으로 설정.<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;순번은 반드시 중복되지 않은 숫자로 설정.<br>
                        - 자동 : 상품별 룰렛상품확률
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

    {{-- 당첨 회원 정보 --}}
    {{--@include('lms.site.event_roulette.member_partial')--}}

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            var temp_roulette_prod_num = $(".temp_roulette_product").length + 1;

            $regi_form.on('ifChanged ifCreated', 'input[name="new_member_join_type"]:checked', function() {
                var set_val = $(this).val();
                if (set_val == 'Y') {
                    $(".member-join-date").show();
                } else {
                    $(".member-join-date").hide();
                }
            });

            //상품추가
            $regi_form.on('click', '.btn-add-product', function() {
                var add_lists;
                add_lists = '<tr id="temp-roulette-product-'+temp_roulette_prod_num+'">';
                add_lists += '<td><input type="hidden" name="rro_idx[]" value=""><input type="text" name="roulette_prod_name[]" class="form-control" title="룰렛상품명" style="width: 230px;"/></td>';
                add_lists += '<td><input type="file" name="roulette_attach_file[]" class="form-control input-file" title="룰렛상품이미지"/></td>'
                add_lists += '<td><input type="file" name="roulette_attach_finish_file[]" class="form-control input-file" title="룰렛상품마감이미지"/></td>'
                add_lists += '<td><input type="text" name="roulette_prod_qty[]" class="form-control" title="룰렛상품수량" style="width: 50px;"/></td>';
                add_lists += '<td><input type="text" name="roulette_prod_win_turns[]" class="form-control" title="룰렛상품당첨순번" style="width: 230px;" placeholder="1,3,5"/></td>';
                add_lists += '<td><input type="text" name="roulette_prod_probability[]" class="form-control" title="룰렛상품확률" style="width: 50px;"/></td>';
                add_lists += '<td><input type="text" name="roulette_order_num[]" class="form-control" title="룰렛상품노출횟수" style="width: 50px;"/></td>';
                add_lists += '<td></td>';
                add_lists += '<td><a href="#none" class="btn-roulette-product-delete" data-temp-tr-idx="'+temp_roulette_prod_num+'"><i class="fa fa-times fa-lg red"></i></a></td>';
                add_lists += '<tr>';
                $('#table_roulette_product > tbody:last').append(add_lists);
                temp_roulette_prod_num = temp_roulette_prod_num + 1;
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

            //파일다운로드
            $('.file-download').click(function() {
                var _url = '{{ site_url("/site/eventRoulette/download") }}' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });
        });
    </script>
@stop