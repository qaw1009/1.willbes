@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 사용자 운영 캠퍼스 정보를 생성하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs('', 'tabs_site_code', 'tab', true, [], false, $arr_site_code) !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
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
                    <th>No</th>
                    <th class="searching searching_site_code">운영 사이트</th>
                    <th class="searching">캠퍼스명</th>
                    <th class="searching">대체표기명</th>
                    <th>연락처</th>
                    <th>주소1</th>
                    <th>주소2</th>
                    <th>맵이미지</th>
                    <th class="searching_is_use">사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->remaining }}</td>
                        <td>{{ $row['SiteName'] }}<span class="hide">{{ $row['SiteCode'] }}</span></td>
                        <td><a href="#" class="btn-modify" data-idx="{{ $row['ScInfoIdx'] }}"><u class="blue">{{ $row['CampusCcdName'] }}{{ $row['IsOrigin'] == 'Y' ? '(본원)' : '' }}</u></a></td>
                        <td>{{ $row['DispName'] }}</td>
                        <td>{{ $row['Tel'] }}</td>
                        <td>{{ $row['Addr1'] }}</td>
                        <td>{{ $row['Addr2'] }}</td>
                        <td><a href="{{ $row['MapPath'] }}" rel="popup-image"><i class="fa fa-picture-o"></i></a></td>
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
                paging: true,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 캠퍼스정보 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/site/siteCampus/create') }}' + dtParamsToQueryString($datatable);
                    }}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/site/siteCampus/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_site_code').search($search_form.find('input[name="search_site_code"]').val())
                .draw();
        }
    </script>
@stop
