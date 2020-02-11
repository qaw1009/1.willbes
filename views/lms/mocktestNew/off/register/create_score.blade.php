@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 기준으로 오프라인 응시자 성적을 등록하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="form-group">
            <div class="pull-left mb-5"><h2>모의고사 정보</h2></div>
            <div id='btnarea' class="pull-right text-right form-inline mb-5">
                <button class="btn btn-sm btn-success" id="btn_list">목록</button>
            </div>
        </div>
        <div class="form-group">
            <div class="x_content">
                <div class="form-group">
                    <table class="table table-bordered">
                        <thead class="bg-white-gray">
                        <tr>
                            <th rowspan="2" class="valign-middle">운영사이트</th>
                            <th rowspan="2" class="valign-middle">카테고리</th>
                            <th rowspan="2" class="valign-middle">직렬</th>
                            <th rowspan="2" class="valign-middle">연도</th>
                            <th rowspan="2" class="valign-middle">회차</th>
                            <th rowspan="2" class="valign-middle">모의고사명</th>
                            <th rowspan="2" class="valign-middle">응시가능기간</th>
                            <th rowspan="2" class="valign-middle">시험시간</th>
                            <th colspan="2" class="valign-middle">응시형태</th>
                            <th rowspan="2" class="valign-middle">성적오픈일</th>
                            {{--<th rowspan="2" class="valign-middle">등록자<<br>(최종수정자)</th>
                            <th rowspan="2" class="valign-middle">등록일<<br>(최종수정일)</th>--}}
                        </tr>
                        <tr>
                            <th class="valign-middle">Online</th>
                            <th class="valign-middle">Off</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $product_info['SiteName'] }}</td>
                            <td>{{ $product_info['CateName'] }}</td>
                            <td>
                                @foreach($product_info['MockPartName'] as $key => $row)
                                    {{ $row }}<br>
                                @endforeach
                            </td>
                            <td>{{$product_info['MockYear']}}</td>
                            <td>{{$product_info['MockRotationNo']}}</td>
                            <td>{{$product_info['ProdName']}}</td>
                            <td></td>
                            <td></td>
                            <td>{{$product_info['TakePart_on']}}</td>
                            <td>{{$product_info['TakePart_off']}}</td>
                            {{--<td>{{$product_info['USERCNT']}}</td>--}}
                            <td>{{$product_info['GradeOpenDatm']}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="x_content">
            <form class="form-horizontal" id="invoice_form" name="invoice_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <div class="form-group form-group-sm form-group-bordered mt-15">
                    <label class="control-label col-md-1">엑셀정보</label>
                    <div class="col-md-11 form-inline">
                        <input type="file" id="attach_file" name="attach_file" class="form-control" title="송장엑셀파일" value="">
                        <button type="button" name="btn_file_upload" class="btn btn-primary btn-sm mb-0 ml-10 mr-10" onClick="registGrade({{ $prod_code }})">엑셀 업로드</button>
                        <button type="button" name="btn_file_download" class="btn btn-success btn-sm mb-0">샘플엑셀 다운로드</button>
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

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="prod_code" value="{{ $prod_code }}">
    </form>
    <div class="x_panel mt-10">
        <div class="x_content mb-20">
            <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                <thead class="bg-white-gray">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center" style="min-width:40px">회원명</th>
                    <th class="text-center">응시번호</th>
                    <th class="text-center">과목[과목코드]</th>
                    <th class="text-center">문항번호</th>
                    <th class="text-center">답변</th>
                    <th class="text-center">정답여부</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');
        var $invoice_form = $('#invoice_form');

        $(document).ready(function() {
            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktestNew/off/register/memberPrivateDetailListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'MemName', 'class': 'text-center'},
                    {'data' : 'TakeNumber', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="">' + row.SubjectName + '[' + row.MpIdx + ']</span>';
                        }},
                    {'data' : 'QuestionNO', 'class': 'text-center'},
                    {'data' : 'Answer', 'class': 'text-center'},
                    {'data' : 'IsWrong', 'class': 'text-center'}
                ]
            });

            // 목록 이동
            $('#btn_list').on('click', function() {
                location.replace('{{ site_url('/mocktestNew/off/register/') }}' + getQueryString());
            });

            //샘플파일 다운로드
            $('button[name="btn_file_download"]').on('click', function() {
                location.replace('{{ site_url('/mocktestNew/off/register/sampleDownload') }}');
            });
        });

        var registGrade = function(prod_code) {
            var data, is_file, files;

            files = $invoice_form.find('input[name="attach_file"]')[0].files[0];
            if (typeof files === 'undefined') {
                alert('엑셀파일을 선택해 주세요.');
                return;
            }

            data = new FormData();
            data.append('{{ csrf_token_name() }}', $invoice_form.find('input[name="{{ csrf_token_name() }}"]').val());
            data.append('_method', 'POST');
            data.append('prod_code', prod_code);
            data.append('attach_file', $invoice_form.find('input[name="attach_file"]')[0].files[0]);
            is_file = true;

            if (!confirm('기존에 등록된 오프라인 성적은 삭제처리 됩니다.\n업로드 하시겠습니까?')) {
                return;
            }

            sendAjax('{{ site_url('/mocktestNew/off/register/reDataExcel') }}', data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();
                    $invoice_form.find('input[name="attach_file"]').val('');
                }
            }, showError, false, 'POST', 'json', is_file);
        };
    </script>
@stop