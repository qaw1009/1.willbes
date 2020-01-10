@extends('lcms.layouts.master')
@section('content')
    <h5>- 수강지원인증시 인증회차별(기간별)로 제공되는 상품정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_category" name="search_category">
                            <option value="">카테고리</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_md_cate_code" name="search_md_cate_code">
                            <option value="">중분류</option>
                            @foreach($arr_m_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_type" name="search_type">
                            <option value="">인증구분</option>
                            @foreach($CertType_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_condition" name="search_condition">
                            <option value="">인증조건</option>
                            @foreach($CertCondition_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_no" name="search_no">
                            <option value="">회차</option>
                            @for($i=1;$i<=10;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
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
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>운영사이트</th>
                    <th>카테고리</th>
                    <th>인증코드</th>
                    <th>인증구분</th>
                    <th>인증조건</th>
                    <th>인증회차</th>
                    <th>인증기간</th>
                    <th>무한패스선택명</th>
                    <th>쿠폰선택명</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
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

            $search_form.find('select[name="search_category"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_category");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 인증등록', className: 'btn-sm btn-primary border-radius-reset btn-regist'}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/cert/cert/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'SiteName'},
                    {'data' : 'CateName'},
                    //{'data' : 'CertIdx'},
                    {'data' : null, 'render' : function(data,type,row,meta){
                            return '<a href="/site/cert/apply/?search_type='+data.CertTypeCcd+'&search_no='+data.No+'" target="_new">'+data.CertIdx+'</a>';
                        }},
                    {'data' : 'CertTypeCcd_Name'},
                    {'data' : 'CertConditionCcd_Name'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + data.CertIdx + '"><u>' + data.No + '회 [' + data.CertTitle +']</u></a>';
                    }},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return data.CertStartDate + ' ~ ' +data.CertEndDate;
                        }},
                    {'data' : 'productData'},
                    {'data' : 'couponData'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'}
                ]
            });


            $('.btn-regist').setLayer({
                'url' : '{{ site_url('/site/cert/cert/create') }}',
                'width' : 900
                ,'modal_id' : 'cert_create'
            });

            $list_table.on('click', '.btn-modify', function() {
                $('.btn-modify').setLayer({
                    'url' : '{{ site_url('/site/cert/cert/create/') }}' + $(this).data('idx'),
                    'width' : 900
                    ,'modal_id' : 'cert_create'
                });
            });

        });
    </script>
@stop