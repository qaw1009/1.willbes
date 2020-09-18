@extends('lcms.layouts.master')

@section('content')
    <div id="content">
        <h5>- 합격예측서비스 가데이터를 관리합니다.</h5>
        <div class="x_panel mt-10 mb-0">
            <div class="x_content">
                <form class="form-horizontal" id="invoice_form" name="invoice_form" method="POST" onsubmit="return false;">
                    {!! csrf_field() !!}
                    <div class="form-group form-group-sm form-group-bordered">
                        <label class="control-label col-md-1">엑셀정보</label>
                        <div class="col-md-11 form-inline">
                            <input type="file" id="attach_file" name="attach_file" class="form-control" title="송장엑셀파일" value="">
                            <button type="button" name="btn_file_upload" class="btn btn-primary btn-sm mb-0 ml-10 mr-10" onClick="registData({{ $PredictIdx }})">엑셀 업로드</button>
                            <button type="button" name="btn_file_download" class="btn btn-success btn-sm mb-0">샘플엑셀 다운로드</button>
                            {{--TODO : 가데이터 엑셀변환 : 개발완료, 미적용--}}
                            <button type="button" name="btn_fakedata_download" class="btn btn-success btn-sm mb-0">가데이터 엑셀 다운로드</button>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-12">
                            <ul class="fa-ul mb-0">
                                <li><i class="fa-li fa fa-minus-square"></i>등록할 엑셀파일 형식 : Excel 97~2003</li>
                                <li><i class="fa-li fa fa-minus-square"></i>모든 항목은 반드시 텍스트(TEXT)형식이어야 합니다.</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="x_panel mt-10">
            <div class="x_content">
                <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
                    {!! csrf_field() !!}
                    <input type="hidden" name="search_predict_idx" value="{{ $PredictIdx }}">
                    <div class="form-group">
                        <label class="control-label col-md-1" for="search_value">과목수 조회</label>
                        <div class="col-md-11 form-inline">
                            <select class="form-control" id="search_subject_count" name="search_subject_count">
                                <option value="">과목수 조회</option>
                                <option value="up">5개 이상</option>
                                <option value="down">5개 이하</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary btn-search ml-10" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                        </div>
                    </div>
                </form>
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">구분</th>
                        <th class="text-center">이름</th>
                        <th class="text-center">아이디</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">지역</th>
                        <th class="text-center">성적정보</th>
                        <th class="text-center">응시번호</th>
                        <th class="text-center">수강여부</th>
                        <th class="text-center">시험준비기간</th>
                        <th class="text-center">신청일</th>
                        <th class="text-center">삭제</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .tooltip-inner { max-width: 100%; padding: 2px; background: #555; }
        .tooltip-arrow { display: none; }
    </style>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');
        var $invoice_form = $('#invoice_form');

        $(document).ready(function() {
            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [],
                ajax: {
                    'url' : '{{ site_url('/predict/datamanage/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'ApplyType', 'class': 'text-center'},
                    {'data' : 'MemName', 'class': 'text-center'},
                    {'data' : 'MemId', 'class': 'text-center'},
                    {'data' : 'TakeMockPart', 'class': 'text-center'},
                    {'data' : 'TaKeArea', 'class': 'text-center'},
                    /*{'data' : 'OPOINT', 'class': 'text-center'},*/
                    {'data' : 'OPOINT', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        var str = '';
                        if (data != null) {
                            str = '';
                            var obj = data.split(',');
                            var obj2 = row.pgoIdxs.split(',');
                            $.each(obj, function(i, val){
                                str += val + " <input type='button' class='btn btn-primary btn-sm btn-delete mb-5' data-pr-idx='"+row.PrIdx+"' data-pgo-idx='"+obj2[i]+"' value='삭제'>" + "<br>";
                            });
                        }
                        return str;
                    }},
                    {'data' : 'TaKeNumber', 'class': 'text-center'},
                    {'data' : 'LectureType', 'class': 'text-center'},
                    {'data' : 'Period', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'},
                    {'data' : 'PrIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-delete-all red" data-idx="' + row.PrIdx + '"><u>삭제</u></a>';
                        }}
                ]
            });
        });

        // 목록 이동
        $('#goList').on('click', function() {
            location.replace('{{ site_url('/predict/datamanage/') }}' + getQueryString());
        });

        //
        var registData = function(predictidx) {
            var data, is_file, files;

            files = $invoice_form.find('input[name="attach_file"]')[0].files[0];
            if (typeof files === 'undefined') {
                alert('엑셀파일을 선택해 주세요.');
                return;
            }

            data = new FormData();
            data.append('{{ csrf_token_name() }}', $invoice_form.find('input[name="{{ csrf_token_name() }}"]').val());
            data.append('_method', 'POST');
            data.append('predictidx', predictidx);
            data.append('attach_file', $invoice_form.find('input[name="attach_file"]')[0].files[0]);
            is_file = true;

            if (!confirm('업로드 하시겠습니까?')) {
                return;
            }

            sendAjax('{{ site_url('/predict/datamanage/redata') }}', data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();
                    $invoice_form.find('input[name="attach_file"]').val('');
                }
            }, showError, false, 'POST', 'json', is_file);
        };

        // 샘플엑셀다운로드 버튼 클릭
        $('button[name="btn_file_download"]').on('click', function() {
            location.replace('{{ site_url('/predict/datamanage/sampleDownload') }}');
        });

        $('button[name="btn_fakedata_download"]').on('click', function(event) {
            event.preventDefault();
            if (confirm('엑셀다운로드 하시겠습니까?')) {
                formCreateSubmit('{{ site_url('/predict/datamanage/exportFakeExcel') }}', $search_form.serializeArray(), 'POST');
            }
        });

        $list_table.on('click', '.btn-delete', function() {
            var _url = '{{ site_url('/predict/datamanage/originSampleDataDelete') }}/';
            var data = {
                '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'predict_idx' : '{{ $PredictIdx }}',
                'pr_idx' : $(this).data("pr-idx"),
                'pgo_idx' : $(this).data("pgo-idx")
            };

            if (!confirm('삭제 후 복구 할 수 없습니다.\n해당 데이타를 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw(false);
                }
            }, showError, false, 'POST');
        });

        $list_table.on('click', '.btn-delete-all', function () {
            if (!confirm('삭제할 경우 성적 포함 모든 데이터는 삭제 됩니다. 삭제하시겠습니까?\n삭제 후 조정점수 반영해야 정확한 데이터가 산출됩니다.')) {
                return;
            }

            var _url = '{{ site_url("/predict/prerequest/delete/") }}';
            var data = {
                '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT',
                'predict_idx' : $search_form.find('input[name="search_predict_idx"]').val(),
                'pr_idx' : $(this).data("idx")
            };
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();
                }
            }, showError, false, 'POST');
        });
    </script>
@stop