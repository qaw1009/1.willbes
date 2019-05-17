@extends('lcms.layouts.master')

@section('content')
    <div id="content">
        <h5 class="mt-20">- 모의고사 기준으로 오프라인 응시자 성적을 등록하는 메뉴입니다.</h5>

        <div class="x_panel mt-10">
            <div class="x_content">
                <form class="form-horizontal" id="invoice_form" name="invoice_form" method="POST" onsubmit="return false;">
                    {!! csrf_field() !!}
                    <div class="form-group form-group-sm form-group-bordered mt-15">
                        <label class="control-label col-md-1">엑셀정보</label>
                        <div class="col-md-11 form-inline">
                            <input type="file" id="attach_file" name="attach_file" class="form-control" title="송장엑셀파일" value="">
                            <button type="button" name="btn_file_upload" class="btn btn-primary btn-sm mb-0 ml-10 mr-10" onClick="registData({{ $PredictIdx }})">엑셀 업로드</button>
                            <button type="button" name="btn_file_download" onClick="sampledown()" class="btn btn-success btn-sm mb-0">샘플엑셀 다운로드</button>
                        </div>
                    </div>
                    <div class="row">
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
        <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
            <div class="x_content mb-20">
                <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                    {!! csrf_field() !!}
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
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="ProdCode" name="ProdCode" value="">
    </form>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
    </form>
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
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                buttons: [
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn btn-sm btn-primary mr-15 btn-sms' },

                ],
                serverSide: true,
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
                    {'data' : 'OPOINT', 'class': 'text-center'},
                    {'data' : 'TaKeNumber', 'class': 'text-center'},
                    {'data' : 'LectureType', 'class': 'text-center'},
                    {'data' : 'Period', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
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

        // 송장엑셀다운로드 버튼 클릭
        $('button[name="btn_file_download"]').on('click', function() {
            location.replace('{{ site_url('/predict/datamanage/sampleDownload') }}');
        });


    </script>
@stop