@extends('lcms.layouts.master')

@section('content')
    <h5>- 제휴사 관리자 권한유형을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_btob_idx">제휴사검색</label>
                    <div class="col-md-2">
                        <select class="form-control" id="search_btob_idx" name="search_btob_idx">
                            @foreach($arr_btob_idx as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static"><span class="required">*</span> 제휴사를 선택해 주세요.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th class="searching_btob_idx">제휴사명</th>
                    <th class="searching">권한유형코드</th>
                    <th class="searching">권한유형명</th>
                    <th>전체조회 가능여부</th>
                    <th>설명</th>
                    <th class="searching_is_use">사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $row['BtobName'] }}<span class="hide">{{ $row['BtobIdx'] }}</span></td>
                        <td>{{ $row['RoleIdx'] }}</td>
                        <td><a href="#" class="btn-modify" data-idx="{{ $row['RoleIdx'] }}"><u class="blue">{{ $row['RoleName'] }}</u></a></td>
                        <td>@if($row['RoleType'] == 'A') 가능 @elseif($row['RoleType'] == 'B') 불가능 @endif</td>
                        <td>{{ $row['RoleShortDesc'] }}</td>
                        <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                            <span class="hide">{{ $row['IsUse'] }}</span>
                        </td>
                        <td>{{ $row['RegAdminName'] }}</td>
                        <td>{{ $row['RegDatm'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 제휴사 시스템 운영자 등록', className: 'btn-sm btn-success border-radius-reset mr-15 btn-admin-regist' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 권한유형 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/sys/btob/btobRole/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/sys/btob/btobRole/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            // 시스템 운영자 등록 버튼 클릭
            $('.btn-admin-regist').click(function() {
                $('.btn-admin-regist').setLayer({
                    'url' : '{{ site_url('/sys/btob/btobRole/createAdmin') }}',
                    'width' : 900
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_btob_idx').search($search_form.find('select[name="search_btob_idx"]').val())
                .draw();
        }
    </script>
@stop
