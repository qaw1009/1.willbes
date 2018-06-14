@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation"><a href="{{ site_url('/sys/site/index/code') }}">사이트 생성관리</a></li>
        <li role="presentation" class="active"><a href="{{ site_url('/sys/site/index/group') }}" class="cs-pointer"><strong>사이트 그룹 정보관리</strong></a></li>
        <li role="presentation"><a href="{{ site_url('/sys/site/index/category') }}">사이트 카테고리 관리</a></li>
    </ul>
    <h5>- 윌비스 사용자 운영 사이트 그룹 정보를 관리하는 메뉴입니다. (생성한 그룹 정보는 사이트생성 시 연동 처리 됩니다.)</h5>
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
                    <th class="searching">사이트그룹코드</th>
                    <th class="searching">사이트그룹명</th>
                    <th>설명</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $row['SiteGroupCode'] }}</td>
                        <td><a href="#" class="btn-modify" data-idx="{{ $row['SiteGroupCode'] }}"><u class="blue">{{ $row['SiteGroupName'] }}</u></a></td>
                        <td>{{ $row['SiteGroupDesc'] }}</td>
                        <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif</td>
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
                    { text: '<i class="fa fa-pencil mr-5"></i> 사이트그룹 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/sys/site/create/group') }}' + dtParamsToQueryString($datatable);
                    }}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/sys/site/create/group') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .draw();
        }
    </script>
@stop
