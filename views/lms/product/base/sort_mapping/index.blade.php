@extends('lcms.layouts.master')

@section('content')
    <h5>- 사용자단 교수소개, 수강신청 영역의 소트 조건을 매핑하기 위한 관리 기능입니다. (과목연결 후에만 직렬/과목연결이 가능합니다.)</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_site_tabs('tabs_site_code') !!}
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
                    <div class="col-md-10 col-md-offset-1 mt-10">
                        <div class="checkbox">
                            <input type="checkbox" id="search_chk_no_course" name="search_chk_no_course" class="flat" value="N"/> <label for="search_chk_no_course" class="input-label">과정연결(<span class="red pull-none ml-0">N</span>) 카테고리만 보기</label>
                            <input type="checkbox" id="search_chk_no_subject" name="search_chk_no_subject" class="flat" value="N"/> <label for="search_chk_no_subject" class="input-label">과목연결(<span class="red pull-none ml-0">N</span>) 카테고리만 보기</label>
                            <input type="checkbox" id="search_chk_no_complex" name="search_chk_no_complex" class="flat" value="N"/> <label for="search_chk_no_complex" class="input-label">복합연결(<span class="red pull-none ml-0">N</span>) 카테고리만 보기</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th rowspan="2" class="searching searching_site_code rowspan pb-30">사이트 [<span class="blue">코드</span>]</th>
                    <th rowspan="2" class="searching searching_is_use rowspan pb-30">대분류 [<span class="blue">코드</span>]</th>
                    <th rowspan="2" class="searching searching_is_use pb-30">중분류 [<span class="blue">코드</span>]</th>
                    <th colspan="3">소트매핑조건</th>
                    <th rowspan="2" class="pb-30">등록자</th>
                    <th rowspan="2" class="pb-30">등록일</th>
                </tr>
                <tr>
                    <th class="searching_no_course">과정연결</th>
                    <th class="searching_no_subject">과목연결</th>
                    <th class="searching_no_complex bdr-line">복합연결</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row['SiteName'] }} [<span class="blue">{{ $row['SiteCode'] }}</span>]</td>
                        <td>{{ $row['BCateName'] }}
                            [<span class="blue">{{ $row['BCateCode'] }}</span>]
                            @if($row['BIsUse'] == 'Y') (사용) @elseif($row['BIsUse'] == 'N') (<span class="red">미사용</span>) @endif
                            <span class="hide">{{ $row['BIsUse'] }}</span>
                        </td>
                        <td>
                            @if(empty($row['MCateCode']) === false)
                                {{ $row['MCateName'] }}
                                [<span class="blue">{{ $row['MCateCode'] }}</span>]
                                @if($row['MIsUse'] == 'Y') (사용) @elseif($row['MIsUse'] == 'N') (<span class="red">미사용</span>) @endif
                                <span class="hide">{{ $row['MIsUse'] }}</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default btn-regist" data-conn-type="course" data-conn-uri="create" data-site-code="{{ $row['SiteCode'] }}" data-cate-code="{{ $row['LastCateCode'] }}">
                                연결 ({!! $row['CateCourseCnt'] > 0 ? 'Y' : '<span class="red no-line-height">N</span>' !!})
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default btn-regist" data-conn-type="subject" data-conn-uri="create" data-site-code="{{ $row['SiteCode'] }}" data-cate-code="{{ $row['LastCateCode'] }}">
                                연결 ({!! $row['CateSubjectCnt'] > 0 ? 'Y' : '<span class="red no-line-height">N</span>' !!})
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-default btn-regist" data-conn-type="complex" data-conn-uri="list" data-site-code="{{ $row['SiteCode'] }}" data-cate-code="{{ $row['LastCateCode'] }}">
                                연결 ({!! $row['ComplexSubjectCnt'] > 0 ? 'Y' : '<span class="red no-line-height">N</span>' !!})
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

        $(document).ready(function() {
            // datatable setting
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                rowsGroup: ['.rowspan']
            });

            // 과목 연결 모달창 오픈
            $('.btn-regist').click(function() {
                var conn_type = $(this).data('conn-type');
                var uri_param = conn_type + '/' + $(this).data('site-code') + '/' + $(this).data('cate-code');
                var uri_route = $(this).data('conn-uri');

                $('.btn-regist').setLayer({
                    'url' : '{{ site_url('/product/base/sortMapping/') }}' + uri_route + '/' + uri_param,
                    'width' : 900
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            var no_course = $search_form.find('input[name="search_chk_no_course"]:checked').val() || '';
            var no_subject = $search_form.find('input[name="search_chk_no_subject"]:checked').val() || '';
            var no_complex = $search_form.find('input[name="search_chk_no_complex"]:checked').val() || '';

            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_no_course').search(no_course)
                .column('.searching_no_subject').search(no_subject)
                .column('.searching_no_complex').search(no_complex)
                .column('.searching_site_code').search($search_form.find('input[name="search_site_code"]').val())
                .draw();
        };
    </script>
@stop
