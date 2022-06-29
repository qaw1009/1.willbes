@extends('lcms.layouts.master')

@section('content')
    <h5>- 임용전용 핫클립 관리</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="search_view_type">메인,이벤트 유형</label>
                    <div class="col-md-5 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_view_type" name="search_view_type">
                            <option value="">전체</option>
                            <option value="1">메인</option>
                            <option value="2">이벤트</option>
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
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_ajax_table" class="table table-striped table-bordered table-head-row2">
                    <thead>
                    <tr>
                        <th>유형</th>
                        <th>프로모션 코드</th>
                        <th>이벤트 명</th>
                        <th>상세리스트</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_ajax_table = $('#list_ajax_table');

        $(document).ready(function() {
            // datatable setting
            $datatable = $list_ajax_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 그룹 관리', className: 'btn-sm btn-info border-radius-reset mr-15', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/etc/professorHotClip/group') }}';
                        }},
                ],
                ajax: {
                    'url' : '{{ site_url("/site/etc/professorHotClip/listAjax") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'Title'},
                    {'data' : 'PromotionCode'},
                    {'data' : 'EventName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="{{site_url('/site/etc/professorHotClip/detail/')}}" data-view-type="'+row.ViewType+'" data-promotion-code="'+row.PromotionCode+'" class="btn-detail"><u>상세리스트</u></a>';
                            /*return '<a href="{{site_url('/site/etc/professorHotClip/detail')}}/'+data+'" class="btn-modify" data-idx="' + data + '"><u>상품등록</u></a>';*/
                        }},
                ],
            });

            $list_ajax_table.on('click', '.btn-detail', function() {
                location.href='{{ site_url('/site/etc/professorHotClip/detail') }}/' + $(this).data('view-type') + '/' + $(this).data('promotion-code');
                return false;
            });
        });
    </script>
@stop