@extends('lcms.layouts.master')

@section('content')
<h5>- 특정 강좌를 구매한 회원들에게 제공하는 학습자료를 관리하는 메뉴입니다. (운영자 패키지만 사용)</h5>
<h5>- {{$arr_prof_info['ProfNickName']}} 교수 T-pass 자료실</h5>
<form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    {!! html_def_site_tabs($arr_prof_info['SiteCode'], 'tabs_site_code', 'tab', false, [], false, array($arr_prof_info['SiteCode'] => $arr_prof_info['SiteName'])) !!}
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">강좌기본정보</label>
                <div class="col-md-11 form-inline">
                    {!! html_site_select($arr_prof_info['SiteCode'], 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                    <select class="form-control mr-10" id="search_lg_cate_code" name="search_lg_cate_code">
                        <option value="">대분류</option>
                        @foreach($arr_lg_category as $row)
                            <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                        @endforeach
                    </select>
                    <select class="form-control mr-10" id="search_md_cate_code" name="search_md_cate_code">
                        <option value="">중분류</option>
                        @foreach($arr_md_category as $row)
                            <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                        @endforeach
                    </select>

                    <select name="search_schoolyear" id="search_schoolyear" class="form-control" title="대비학년도">
                        <option value="">대비학년도</option>
                        @for($i=(date('Y')+1); $i>=2005; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    &nbsp;
                    <select class="form-control" id="search_packtype_ccd" name="search_packtype_ccd">
                        <option value="">패키지유형</option>
                        @foreach($Packtype_ccd as $key=>$val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    &nbsp;
                    <select class="form-control" id="search_sales_ccd" name="search_sales_ccd">
                        <option value="">판매여부</option>
                        @foreach($Sales_ccd as $key=>$val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                    &nbsp;
                    <select class="form-control" id="search_is_use" name="search_is_use">
                        <option value="">사용여부</option>
                        <option value="Y">사용</option>
                        <option value="N">미사용</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">강좌검색</label>
                <div class="col-md-3 form-inline">
                    <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                </div>
                <div class="col-md-5">
                    <p class="form-control-static">명칭, 코드 검색 가능</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
        </div>
    </div>
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>NO</th>
                <th>상품종류</th>
                <th>대분류</th>
                <th>중분류</th>
                <th>대비학년도</th>
                <th>패키지유형</th>
                <th>운영자패키지명</th>
                <th>판매가</th>
                <th>판매여부</th>
                <th>사용여부</th>
                <th>등록</th>
                <th>자료실권한부여</th>
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
    var $list_table = $('#list_ajax_table');

    $(document).ready(function() {
        // 자동 변경
        $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
        $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");

        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [],
            ajax: {
                'url' : '{{ site_url("/board/professor/{$boardName}/productListAjax?") }}' + '{!! $boardDefaultQueryString !!}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'LearnPatternCcd_Name'},

                {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.CateName_Parent;
                    }},

                {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.CateName;
                    }},
                {'data' : 'SchoolYear'},//대비학년도
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.PackTypeCcd_Name.replace('패키지','');
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '['+row.ProdCode+ '] ' + row.ProdName;
                    }},//패키지명

                {'data' : null, 'render' : function(data, type, row, meta) {
                        return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                    }},//판매가
                {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                        return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                    }},//판매여부
                {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},//사용여부
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-manager" data-prod-code="' + row.ProdCode + '"><u>등록</u></a>';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-authority" data-prod-code="' + row.ProdCode + '"><u>권한부여</u></a>';
                    }}
            ],
        });

        //T pass 게시판
        $list_table.on('click', '.btn-manager', function() {
            location.href='{{ site_url("/board/professor/{$boardName}/registForBoard") }}/' + $(this).data('prod-code') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
        });

        //권한부여
        $list_table.on('click', '.btn-authority', function() {
            location.href='{{ site_url("/board/professor/{$boardName}/createMemberAuthority") }}/' + $(this).data('prod-code') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}';
            /*$('.btn-authority').setLayer({
                "url" : "{{ site_url("/board/professor/{$boardName}/createMemberAuthorityModal/") }}" + $(this).data('prod-code') + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}',
                "width" : "1200",
                "modal_id" : "modal_html2"
            });*/
        });
    });
</script>
@stop