@extends('lcms.layouts.master_modal')

@section('layer_title')
    당첨 리스트
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            <div class="x_panel">
                <div class="x_title">
                    <h5>룰렛관리정보</h5>
                </div>
                <div class="x_content">
                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="search_rro_idx">룰렛코드</label>
                        <div class="col-md-2 ">
                            {{ $roulette_code }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="search_rro_idx">제목</label>
                        <div class="col-md-4">
                            {{ $arr_base['roulette_data']['Title'] }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="day_limit_count">참여 횟수 조건</label>
                        <div class="form-inline col-md-10 item">
                            아이디 기준 참여 횟수
                            {{ $arr_base['roulette_data']['MemberLimitCount'] }} 회
                            <span class="ml-10 mr-10"> | </span>
                            전체 참여 횟수
                            {{ $arr_base['roulette_data']['MaxLimitCount'] }} 회
                        </div>

                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="search_rro_idx">당첨 카운트 기준일</label>
                        <div class="col-md-2">
                            {{ ($arr_base['roulette_data']['CountType'] == 'D' ? '1일씩' : '전체 룰렛 진행 기간') }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="search_rro_idx">신규회원 가입대상 사용여부</label>
                        <div class="col-md-2">
                            {{ ($arr_base['roulette_data']['NewMemberJoinType'] == 'Y') ? '사용' : '미사용' }}
                        </div>
                        <label class="control-label col-md-2" for="search_rro_idx">신규회원 가입대상 기간</label>
                        <div class="col-md-4">
                            {{ $arr_base['roulette_data']['NewMemberJoinStartDate'] }} ~ {{ $arr_base['roulette_data']['NewMemberJoinEndDate'] }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2" for="search_rro_idx">이벤트 기간</label>
                        <div class="col-md-6">
                            {{ $arr_base['roulette_data']['RouletteStartDatm'] }} ~ {{ $arr_base['roulette_data']['RouletteEndDatm'] }}
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2">등록자
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $arr_base['roulette_data']['RegAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">등록일
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $arr_base['roulette_data']['RegDatm'] }}</p>
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="control-label col-md-2">수정자
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $arr_base['roulette_data']['UpdAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">수정일
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $arr_base['roulette_data']['UpdDatm'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-20"></div>
            <div class="form-group form-group-bordered pb-10">
                <div class="row mt-5">
                    <label class="control-label col-md-2" for="search_rro_idx">조건</label>
                    <div class="col-md-2">
                        <select class="form-control input-sm" id="search_rro_idx" name="search_rro_idx">
                            <option value="">상품선택</option>
                            @foreach($arr_base['roulette_other_data'] as $row)
                                <option value="{{ $row['RroIdx'] }}">{{ $row['ProdName'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control input-sm" id="search_is_use" name="search_is_use">
                            <option value="">지급여부</option>
                            <option value="Y">지급</option>
                            <option value="N">미지급</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">아이디, 이름, 휴대폰번호(끝4자리)</p>
                    </div>
                </div>

                <div class="row mt-5">
                    <label class="control-label col-md-2" for="search_start_date">당첨일</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-10">
                <button type="submit" class="btn btn-primary btn-sm btn-search" id="btn_search_modal">검 색</button>
            </div>

            <div class="row">
                <div class="form-group">
                    <table id="_list_modal_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>선택</th>
                            <th>No</th>
                            <th>회원아이디[회원번호]</th>
                            <th>회원명</th>
                            <th>당첨상품명</th>
                            <th>당첨일</th>
                            <th>지급여부</th>
                            <th>지급일</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#search_form_modal');
                var $list_modal_table = $('#_list_modal_ajax_table');

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable_modal = $list_modal_table.DataTable({
                        serverSide: true,
                        buttons: [
                            { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                            { text: '<i class="fa fa-truck mr-10"></i> 일괄지급', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-win-all' },
                            { text: '<i class="fa fa-truck mr-10"></i> 선택지급', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-win' },
                        ],
                        ajax: {
                            "url" : "{{ site_url('site/eventRoulette/memberListModalAjax/'.$roulette_code) }}",
                            'type' : 'POST',
                            'data' : function(data) {
                                return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        columns: [
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    var disabled_type = '';
                                    if (row.IsUse == 'N') { disabled_type = ''; } else { disabled_type = 'disabled'; }
                                    return '<input type="checkbox" class="flat" name="is_use" value="Y" data-rm-idx="' + row.RmIdx + '" '+disabled_type+' data-origin-is-use = ' + row.IsUse + '>';
                                }},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    // 리스트 번호
                                    return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }},

                            {'data' : 'MemId'},
                            {'data' : 'MemName'},
                            {'data' : 'ProdName'},
                            {'data' : 'RegDatm'},
                            {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                                    return (data == 'Y') ? '지급' : '<p class="red">미지급</p>';
                                }},
                            {'data' : 'UseDatm'}
                        ]
                    });

                    $('.btn-win').on('click', function() {
                        if (!confirm('선택 항목을 지급 적용하시겠습니까?')) {
                            return;
                        }

                        var $is_use = $list_modal_table.find('input[name="is_use"]');
                        var origin_val, this_val;
                        var $params = {};
                        var _url = "{{ site_url('site/eventRoulette/storeIsUse') }}";

                        $is_use.each(function(idx) {
                            // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                            this_val = $(this).filter(':checked').val() || 'N';
                            origin_val = $is_use.eq(idx).data('origin-is-use');
                            if (this_val != origin_val) {
                                $params[$(this).data('rm-idx')] = { 'IsUse' : this_val };
                            }
                        });

                        if (Object.keys($params).length < 1) {
                            alert('변경된 내용이 없습니다.');
                            return;
                        }

                        var data = {
                            '{{ csrf_token_name() }}' : $search_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'params' : JSON.stringify($params)
                        };

                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $datatable_modal.draw();
                            }
                        }, showError, false, 'POST');
                    });

                    $('.btn-win-all').on('click', function() {
                        if (!confirm('일괄 지급 적용하시겠습니까?')) {
                            return;
                        }

                        var _url = "{{ site_url('site/eventRoulette/storeIsUseAll/'.$roulette_code) }}";
                        var data = {
                            '{{ csrf_token_name() }}' : $search_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT'
                        };

                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                $datatable_modal.draw();
                            }
                        }, showError, false, 'POST');
                    });

                    // 엑셀다운로드 버튼 클릭
                    $('.btn-excel').on('click', function(event) {
                        event.preventDefault();
                        formCreateSubmit('{{ site_url('site/eventRoulette/memberListExcel/'.$roulette_code) }}', $search_form_modal.serializeArray(), 'POST');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection