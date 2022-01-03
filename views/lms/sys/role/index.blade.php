@extends('lcms.layouts.master')

@section('content')
    <h5>- 운영자 업무 분장 기준 권한유형을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
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
                    <th>복사<br/>선택</th>
                    <th class="valign-middle">No</th>
                    <th class="searching valign-middle">권한유형코드</th>
                    <th class="searching valign-middle">권한유형명</th>
                    <th class="valign-middle">설명</th>
                    <th class="searching_is_use valign-middle">사용여부</th>
                    <th class="valign-middle">등록자</th>
                    <th class="valign-middle">등록일</th>
                    <th class="valign-middle">복사</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td><label><input type="radio" name="role_idx" class="flat" value="{{ $row['RoleIdx'] }}"></label></td>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $row['RoleIdx'] }}</td>
                        <td><a href="#" class="btn-modify" data-idx="{{ $row['RoleIdx'] }}"><u class="blue">{{ $row['RoleName'] }}</u></a></td>
                        <td>{{ $row['RoleShortDesc'] }}</td>
                        <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                            <span class="hide">{{ $row['IsUse'] }}</span>
                        </td>
                        <td>{{ $row['RegAdminName'] }}</td>
                        <td>{{ $row['RegDatm'] }}</td>
                        <td>@if($row['IsCopy'] == 'Y') <span class="red">Y</span> @endif </td>
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
                    { text: '<i class="fa fa-files-o mr-5"></i> 복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 권한유형 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/sys/role/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ]
            });

            // 복사버튼 클릭
            $('.btn-copy').on('click', function() {
                var role_idx = $list_table.find('input[name="role_idx"]:checked').val();
                if (typeof role_idx === 'undefined') {
                    alert('복사할 권한유형을 선택해 주세요.');
                    return;
                }

                location.href = '{{ site_url('/sys/role/create') }}/' + role_idx + '/copy' + dtParamsToQueryString($datatable);
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/sys/role/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .draw();
        }
    </script>
@stop
