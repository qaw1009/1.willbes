@extends('lcms.layouts.master')

@section('content')
    <h5>
        <p>- 응시형태를 Off(학원)→ Online로 일괄 변경이 가능합니다. (※ Online→ Off(학원)으로는 불가)</p>
        <p>- 모의고사 상품의 "응시시작일"이 이전일인 상품만 변경 가능합니다.</p>
        <p>- 접수식별자:개별접수현황 엑셀파일에서 확인할 수 있습니다.</p>
    </h5>
    <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">상품코드</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" style="width:200px;" id="prod_code" name="prod_code" value="">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">엑셀정보</label>
                    <div class="col-md-11">
                        <input type="file" id="attach_file" name="attach_file" class="form-control" title="엑셀파일" value="">
                        <button type="button" class="btn btn-primary btn-sm mb-0 btn-excel-upload">변경하기</button>
                        <button type="button" class="btn btn-success btn-sm mb-0 ml-10 btn-excel-download">샘플엑셀 다운로드</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form class="form-horizontal mt-20" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <h5>
            <p>- 변경이력</p>
            <p>- 상세정보에서 접수자별로 복구 가능합니다.</p>
        </h5>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="control-label col-md-1" for="search_value">검색</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" id="search_value" name="search_value" placeholder="상품코드, 상품명" style="width: 300px;">
                        <button type="submit" class="btn btn-primary btn-sm mb-0" id="btn_search">검 색</button>
                    </div>
                </div>
            </div>
            <div class="x_content">
                <table id="list_ajax_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th>NO</th>
                        <th>상품코드</th>
                        <th>상품명</th>
                        <th>변경수</th>
                        <th>복구수</th>
                        <th>등록자</th>
                        <th>변경일시</th>
                        <th>상세정보</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $search_form = $('#search_form');
        var $datatable;
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            //셈플다운로드
            $('.btn-excel-download').on('click', function() {
                location.replace('{{ site_url('/mocktestNew/apply/change/sampleDownload') }}');
            });

            //엑셀정보 저장
            $('.btn-excel-upload').on('click', function() {
                var data, is_file, files;
                var prod_code = $regi_form.find('input[name="prod_code"]').val();
                files = $regi_form.find('input[name="attach_file"]')[0].files[0];

                if (prod_code == '') { alert('모의고사 상품코드를 입력해주세요.'); return; }
                if (typeof files === 'undefined') { alert('엑셀파일을 선택해 주세요.'); return; }

                data = new FormData();
                data.append('{{ csrf_token_name() }}', $regi_form.find('input[name="{{ csrf_token_name() }}"]').val());
                data.append('_method', 'POST');
                data.append('prod_code', prod_code);
                data.append('attach_file', files);
                is_file = true;

                if (!confirm('수정 하시겠습니까?')) { return; }
                sendAjax('{{ site_url('/mocktestNew/apply/change/excelForDataChange') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                        $regi_form.find('input[name="attach_file"]').val('');
                    }
                }, showError, false, 'POST', 'json', is_file);
            });

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [],
                ajax: {
                    'url' : '{{ site_url('/mocktestNew/apply/change/listLogAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'ProdCode', 'class': 'text-center'},
                    {'data' : 'ProdName', 'class': 'text-center'},
                    {'data' : 'cntIsRestore', 'class': 'text-center'},
                    {'data' : 'cntIsRestore_Y', 'class': 'text-center'},
                    {'data' : 'RegAdminName', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.LogIdx + '"><u>상세정보</u></a>';
                        }},
                ]
            });

            $list_table.on('click', '.btn-read', function() {
                $('.btn-read').setLayer({
                    "url" : "{{ site_url('/mocktestNew/apply/change/logDetailModal/') }}" + $(this).data("idx"),
                    "width" : "1200",
                });
            });
        });
    </script>
@stop