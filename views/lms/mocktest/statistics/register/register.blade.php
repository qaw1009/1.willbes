@extends('lcms.layouts.master')

@section('content')
    <div id="content">
        <h5 class="mt-20">- 모의고사 기준으로 오프라인 응시자 성적을 등록하는 메뉴입니다.</h5>
        <div class="x_panel">
            <div>
                <div class="pull-left x_title mb-5"><h2>모의고사정보</h2></div>
                <div class="pull-right text-right form-inline mb-5">
                    <button class="btn btn-sm btn-success" id="goList">목록</button>
                </div>
            </div>
            @if(empty($productInfo) === false)
                <div class="x_content">
                    <table class="table table-bordered modal-table">
                        <tr>
                            <th>모의고사그룹명</th>
                            <th>운영사이트</th>
                            <th>카테고리</th>
                            <th>직렬</th>
                            <th>연도</th>
                            <th>회차</th>
                            <th>모의고사명</th>
                            <th>응시형태</th>
                            <th>응시현황</th>
                        </tr>
                        <tr>
                            <td>{{ $productInfo['GroupName'] }}</td>
                            <td>{{ $productInfo['SiteName'] }}</td>
                            <td>{{ $productInfo['CateName'] }}</td>
                            <td>
                                @foreach($productInfo['MockPartName'] as $key => $row)
                                    {{ $row }}<br>
                                @endforeach
                            </td>
                            <td>{{ $productInfo['MockYear'] }}</td>
                            <td>{{ $productInfo['MockRotationNo'] }}</td>
                            <td>{{ $productInfo['ProdName'] }}</td>
                            <td>
                                @foreach($productInfo['TakeFormsCcd_Name'] as $key => $row)
                                    {{ $row }}<br>
                                @endforeach
                            </td>
                            <td>{{ $productInfo['USERCNT'] }}</td>
                        </tr>
                        <tr>
                            <th>성적오픈일</th>
                            <td>{{ $productInfo['GradeOpenDatm'] }}</td>
                            <th colspan="2">조정점수 최종반영자</th>
                            <td colspan="2">{{ $productInfo['writer'] }}</td>
                            <th>조정점수 최종반영일</th>
                            <td colspan="4">{{ $productInfo['wdate'] }}</td>
                        </tr>
                    </table>
                </div>
            @else
                <table class="table table-bordered modal-table">
                    <tr>
                        <td class="tx-center">- 등록된 데이터가 없습니다. -</td>
                    </tr>
                </table>
            @endif
        </div>
        <div class="x_panel mt-10">
            <div class="x_content">
                <form class="form-horizontal" id="invoice_form" name="invoice_form" method="POST" onsubmit="return false;">
                    {!! csrf_field() !!}
                    <div class="form-group form-group-sm form-group-bordered mt-15">
                        <label class="control-label col-md-1">엑셀정보</label>
                        <div class="col-md-11 form-inline">
                            <input type="file" id="attach_file" name="attach_file" class="form-control" title="송장엑셀파일" value="">
                            <button type="button" name="btn_file_upload" class="btn btn-primary btn-sm mb-0 ml-10 mr-10" onClick="registGrade({{ $prodcode }})">엑셀 업로드</button>
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
        <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
            <div class="x_content mb-20">
                <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                    {!! csrf_field() !!}
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
                    "info": "[ 총 _MAX_건 ]",
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktest/offRegister/privatelist') }}'+'?prodcode='+{{ $prodcode }},
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

        });

        // 목록 이동
        $('#goList').on('click', function() {
            location.replace('{{ site_url('/mocktest/offRegister/') }}' + getQueryString());
        });

        // 송장번호 저장
        var registGrade = function(prodcode) {
            var data, is_file, files;

            files = $invoice_form.find('input[name="attach_file"]')[0].files[0];
            if (typeof files === 'undefined') {
                alert('엑셀파일을 선택해 주세요.');
                return;
            }

            data = new FormData();
            data.append('{{ csrf_token_name() }}', $invoice_form.find('input[name="{{ csrf_token_name() }}"]').val());
            data.append('_method', 'POST');
            data.append('prodcode', prodcode);
            data.append('attach_file', $invoice_form.find('input[name="attach_file"]')[0].files[0]);
            is_file = true;

            if (!confirm('업로드 하시겠습니까?')) {
                return;
            }

            sendAjax('{{ site_url('/mocktest/offRegister/redata') }}', data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw();

                    $invoice_form.find('input[name="attach_file"]').val('');
                }
            }, showError, false, 'POST', 'json', is_file);
        };

        // 송장엑셀다운로드 버튼 클릭
        $('button[name="btn_file_download"]').on('click', function() {
            location.replace('{{ site_url('/mocktest/offRegister/sampleDownload') }}');
        });

    </script>
@stop