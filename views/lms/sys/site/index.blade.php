@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation" class="active"><a href="{{ site_url('/sys/site/index/code') }}" class="cs-pointer"><strong>사이트 생성관리</strong></a></li>
        <li role="presentation"><a href="{{ site_url('/sys/site/index/group') }}">사이트 그룹 정보관리</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/site/index/category') }}">사이트 카테고리 관리</a></li>
    </ul>
    <h5>- 윌비스 사용자 운영 사이트 기본 정보를 관리하는 메뉴입니다.</h5>
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
                    <label class="control-label col-md-1" for="search_is_campus">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-5" id="search_is_campus" name="search_is_campus">
                            <option value="">캠퍼스구분</option>
                            <option value="Y">있음</option>
                            <option value="N">없음</option>
                        </select>
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
                    <th class="searching">사이트 코드</th>
                    <th class="searching">사이트명</th>
                    <th class="searching_is_campus">캠퍼스 구분</th>
                    <th>대표 도메인</th>
                    <th>사이트 그룹정보</th>
                    <th>PG사</th>
                    <th class="searching_is_use">사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $row['SiteCode'] }}</td>
                        <td><a href="#" class="btn-modify" data-idx="{{ $row['SiteCode'] }}"><u class="blue">{{ $row['SiteName'] }}</u></a></td>
                        <td>@if($row['IsCampus'] == 'Y') 있음 @elseif($row['IsCampus'] == 'N') <span class="red">없음</span> @endif<span class="hide">{{ $row['IsCampus'] }}</span></td>
                        <td>{{ $row['SiteUrl'] }}</td>
                        <td>{{ $row['SiteGroupName'] }}</td>
                        <td>{{ $row['PgName'] }}</td>
                        <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif<span class="hide">{{ $row['IsUse'] }}</span></td>
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
                dom: 'T<"clear"><<"pull-left mt-5 txt-caution-info"><"pull-right"B>><"clear">rtip',
                buttons: [
                    { text: '<i class="fa fa-floppy-o mr-5"></i> 수동캐시저장', className: 'btn-sm btn-danger border-radius-reset mr-15 btn-save-cache' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 사이트 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/sys/site/create') }}/code/' + dtParamsToQueryString($datatable);
                    }}
                ]
            });

            // 주의 메시지 출력
            $('div.txt-caution-info').html('<span class="red">* 사이트 정보 등록/수정 이후 `수동캐시저장` 버튼을 클릭해야만 운영(프런트) 사이트에 반영됩니다.</span>');

            // 수동캐시저장 버튼 클릭
            $('.btn-save-cache').on('click', function() {
                if (!confirm('수동으로 사이트 정보 캐시를 업데이트하시겠습니까?\n(주의요망 : 전체 사이트 정보 캐시가 업데이트 됨)')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT'
                };
                sendAjax('{{ site_url('/sys/site/saveCache') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showError, false, 'POST');
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href = '{{ site_url('/sys/site/create') }}/code/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_campus').search($search_form.find('select[name="search_is_campus"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .draw();
        }
    </script>
@stop
