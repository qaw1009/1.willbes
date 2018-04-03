@extends('lcms.layouts.master')

@section('content')
    <h5>- 사용자단 교수소개, 수강신청 영역의 소트 조건을 매핑하기 위한 관리 기능입니다. (과목연결 후에만 직렬/과목연결이 가능합니다.)</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_site_tabs('tabs_site_code') !!}
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
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="checkbox">
                            <input type="checkbox" name="search_chk_no_category" class="flat" value="N"/> 과목연결(<span class="red">N</span>) 카테고리만 보기
                            &nbsp; <input type="checkbox" name="search_chk_no_complex" class="flat" value="N"/> 복합연결(<span class="red">N</span>) 카테고리만 보기
                        </div>
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
                    <th rowspan="2" class="searching searching_site_code rowspan pb-30">사이트</th>
                    <th rowspan="2" class="searching searching_is_use rowspan pb-30">대분류</th>
                    <th rowspan="2" class="searching searching_is_use pb-30">중분류</th>
                    <th colspan="2" style="border-width: 1px; border-left: 0; border-bottom: 0;">소트매핑조건</th>
                    <th rowspan="2" class="pb-30">등록자</th>
                    <th rowspan="2" class="pb-30">등록일</th>
                </tr>
                <tr>
                    <th class="searching_no_category">과목연결</th>
                    <th class="searching_no_complex" style="border-right-width: 1px;">복합연결</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row['SiteName'] }}<span class="hide">{{ $row['SiteCode'] }}</span></td>
                        <td>{{ $row['BCateName'] }}
                            @if($row['BIsUse'] == 'Y') (사용) @elseif($row['BIsUse'] == 'N') (<span class="red">미사용</span>) @endif
                            <span class="hide">{{ $row['BIsUse'] }}</span>
                        </td>
                        <td>
                            @if(empty($row['MCateCode']) === false)
                                {{ $row['MCateName'] }}
                                @if($row['MIsUse'] == 'Y') (사용) @elseif($row['MIsUse'] == 'N') (<span class="red">미사용</span>) @endif
                                <span class="hide">{{ $row['MIsUse'] }}</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default btn-conn-category" data-site-code="{{ $row['SiteCode'] }}" data-cate-code="{{ $row['LastCateCode'] }}">
                                연결 (@if($row['CateSubjectCnt'] > 0) Y @else <span class="red no-line-height">N</span> @endif)
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default btn-list-complex" data-site-code="{{ $row['SiteCode'] }}" data-cate-code="{{ $row['LastCateCode'] }}">
                                연결 (@if($row['ComplexSubjectCnt'] > 0) Y @else <span class="red no-line-height">N</span> @endif)
                            </button>
                        </td>
                        <td>{{ $row['LastRegAdminName'] }}</td>
                        <td>{{ $row['LastRegDatm'] }}</td>
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
        var $site_code = '';

        $(document).ready(function() {
            // datatable setting
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                rowsGroup: ['.rowspan'],
            });

            // 과목 연결 모달창 오픈
            $('.btn-conn-category, .btn-list-complex').click(function() {
                var conn_type = ($(this).prop('class').indexOf('btn-conn-category') > -1) ? 'category' : 'complex';
                var uri_param = conn_type + '/' + $(this).data('site-code') + '/' + $(this).data('cate-code');
                var uri_route = (conn_type === 'category') ? 'create' : 'list';

                $('.btn-conn-category, .btn-list-complex').setLayer({
                    'url' : '{{ site_url('/product/base/sortMapping/') }}' + uri_route + '/' + uri_param,
                    'width' : 900
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            var no_category = $search_form.find('input[name="search_chk_no_category"]:checked').val() || '';
            var no_complex = $search_form.find('input[name="search_chk_no_complex"]:checked').val() || '';

            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_no_category').search(no_category)
                .column('.searching_no_complex').search(no_complex)
                .column('.searching_site_code').search($site_code)
                .draw();
        };
    </script>
@stop
