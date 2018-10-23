@extends('lcms.layouts.master_modal')

@section('layer_title')
    배너 검색 [사용되지 않은 이벤트배너]
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="site_code" value="{{ $site_code }}"/>
        @endsection

        @section('layer_content')
            <div class="form-group form-group-sm mb-0">
                <p class="form-control-static"><span class="required">*</span> 검색한 배너 정보를 선택해 주세요. (다중 선택 불가능합니다.)</p>
            </div>
            <div class="form-group form-group-bordered pt-10 pb-5">
                <label class="control-label col-md-2 pt-5" for="search_value">통합검색
                </label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" id="search_value" name="search_value">
                </div>
                <div class="col-md-4">
                    <p class="form-control-static">명칭 검색 가능</p>
                </div>
                <div class="col-md-2 text-right pr-5">
                    <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
                </div>
            </div>
            <div class="row mt-20 mb-20">
                <div class="col-md-12 clearfix">
                    <table id="_list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>카테고리</th>
                            <th>배너 정보</th>
                            <th>노출세션 정보</th>
                            <th>노출기간</th>
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
                var $search_form = $('#_search_form');
                var $list_table = $('#_list_ajax_table');

                $(document).ready(function() {
                    // 페이징 번호에 맞게 일부 데이터 조회
                    $datatable = $list_table.DataTable({
                        serverSide: true,
                        ajax: {
                            'url' : '{{ site_url('/site/banner/regist/searchBannerForEventLectureAjax/') }}',
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
                            {'data' : 'CateName'},
                            {'data' : 'BannerName', 'render' : function(data, type, row, meta) {
                                    return '<a href="#" class="btn-select" data-row-idx="' + meta.row + '"><u>' + data + '</u></a>';
                                }},
                            {'data' : 'DispName'},
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return row.DispStartDatm + ' ~ ' + row.DispEndDatm;
                                }},
                            {'data' : 'RegAdminName'},
                            {'data' : 'RegDatm'}
                        ]
                    });

                    // 카테고리 선택
                    $datatable.on('click', '.btn-select', function() {
                        if (!confirm('해당 배너를 선택하시겠습니까?')) {
                            return;
                        }

                        var that = $(this);
                        var row = $datatable.row(that.data('row-idx')).data();
                        var $parent_regi_form = $('#regi_form');
                        var $parent_selected_banner = $('#selected_banner');
                        var html = '';

                        html += '<span class="pr-10">' + row.BannerName;
                        html += '   <a href="#none" data-banner-idx="' + row.BIdx + '" class="selected-banner-delete"><i class="fa fa-times red"></i></a>';
                        html += '   <input type="hidden" name="banner_idx" value="' + row.BIdx + '"/>';
                        html += '</span>';

                        $parent_regi_form.find('input[name="banner_idx"]').remove();
                        $parent_selected_banner.html(html);

                        $("#pop_modal").modal('toggle');
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection