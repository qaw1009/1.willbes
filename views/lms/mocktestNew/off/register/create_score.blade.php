@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 기준으로 오프라인 응시자 성적을 등록하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="form-group">
            <div class="pull-left mb-5"><h5>모의고사 정보</h5></div>
            <div id='btnarea' class="pull-right text-right form-inline mb-5">
                <button class="btn btn-sm btn-success" id="btn_list">목록</button>
            </div>
        </div>
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
                    <td>{{$product_info['SETIME'] }}</td>
                    <td>{{$product_info['TakeStr'] }}</td>
                    <td>{{$product_info['TakePart_on']}}</td>
                    <td>{{$product_info['TakePart_off']}}</td>
                    {{--<td>{{$product_info['USERCNT']}}</td>--}}
                    <td>{{$product_info['GradeOpenDatm']}}</td>
                </tr>
                </tbody>
            </table>
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

    <div class="x_panel">
        <div class="form-group">
            <div class="pull-left mb-5">
                <h5><span class="red">OFF성적 중복리스트</span></h5>
                <li>삭제된 성적은 '엑셀업로드'기능으로 다시 재등록하시기 바랍니다.</li>
                <li>재등록 후 반드시 조정점수 반영을 해야 성적처리가 정상처리됩니다.</li>
            </div>
        </div>
        <div class="form-group">
            <form class="form-horizontal" id="delete_form" name="delete_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <input type="hidden" name="prod_code" value="{{ $product_info['ProdCode'] }}">

                <table id="member_list_table" class="table table-bordered table-striped">
                    <thead class="bg-white-gray">
                    <tr>
                        <th>선택</th>
                        <th>응시코드</th>
                        <th>회원아이디</th>
                        <th>회원명</th>
                        <th>답안수</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($over_answerpaper_member_list as $row)
                        <tr>
                            <td>
                                <input type="checkbox" name="is_delete" value="1" class="flat" data-mr-idx="{{ $row['MrIdx'] }}">
                            </td>
                            <td>{{ $row['MrIdx'] }}</td>
                            <td>{{ $row['MemId'] }}</td>
                            <td>{{ $row['MemName'] }}</td>
                            <td>{{ $row['AnswerCnt'] }}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable, $member_datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');
        var $invoice_form = $('#invoice_form');

        var $delete_form = $('#delete_form');
        var $member_list_table = $('#member_list_table');

        $(document).ready(function() {
            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-excel' }
                ],
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

            // DataTables
            $member_datatable = $('#member_list_table').DataTable({
                serverSide: false,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 삭제', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-delete' }
                ],
                ajax: false,
                paging: true,
                pageLength: 10,
                searching: false
            });

            // 목록 이동
            $('#btn_list').on('click', function() {
                location.replace('{{ site_url('/mocktestNew/off/register/') }}' + getQueryString());
            });

            //샘플파일 다운로드
            $('button[name="btn_file_download"]').on('click', function() {
                location.replace('{{ site_url('/mocktestNew/off/register/sampleDownload') }}');
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                formCreateSubmit('{{ site_url('mocktestNew/off/register/excel') }}', $search_form.serializeArray(), 'POST');
            });

            //중복성적데이터 삭제
            $('.btn-delete').on('click', function() {
                if (!confirm('삭제하시겠습니까?')) {
                    return;
                }

                var $is_delete = $member_list_table.find('input[name="is_delete"]');
                var $params = [];
                var _url = '{{ site_url("/mocktestNew/off/register/deleteAnswerPaper") }}';

                $is_delete.each(function(idx) {
                    if (typeof $(this).filter(':checked').val() !== 'undefined') {
                        $params.push($(this).data('mr-idx'));
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('삭제할 데이터를 선택해주세요.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $delete_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'prod_code' : $delete_form.find('input[name="prod_code"]').val(),
                    'params' : JSON.stringify($params)
                };

                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showError, false, 'POST');
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