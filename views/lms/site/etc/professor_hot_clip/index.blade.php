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
                        <th class="rowspan" rowspan="2">메인,이벤트 유형</th>
                        <th class="rowspan" rowspan="2">그룹명(여부사용)</th>
                        <th rowspan="2">정렬</th>
                        <th rowspan="2">과목명</th>
                        <th rowspan="2">교수명</th>
                        <th colspan="3">메인</th>
                        <th colspan="2">이벤트</th>
                        <th rowspan="2">썸네일등록개수</th>
                        <th rowspan="2">사용여부</th>
                        <th rowspan="2">등록자</th>
                        <th style="width: 120px;" rowspan="2">등록일</th>
                        <th rowspan="2">수정</th>
                    </tr>
                    <tr>
                        <th>메인-교수홈버튼 노출여부</th>
                        <th>메인-커리큘럼버튼 노출여부</th>
                        <th>메인-수강후기버튼 노출여부</th>
                        <td>운영자패키지</td>
                        <td>종합반</td>
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
                    { text: '<i class="fa fa-pencil mr-5"></i> 그룹 등록', className: 'btn-sm btn-info border-radius-reset mr-15', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/etc/professorHotClip/group') }}';
                        }},
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/etc/professorHotClip/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url("/site/etc/professorHotClip/listAjax") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : 'ViewType', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (row.ViewType == 1) ? '메인' : '이벤트';
                        }},
                    {'data' : 'GroupTitle', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.GroupTitle+' ['+row.GroupIsUse+']';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="text" name="order_num" value="'+row.OrderNum+'" class="order-num" data-order-num-idx="'+row.PhcIdx+'" data-origin-order-num="'+row.OrderNum+'" style="width: 60px;" maxlength="3" autocomplete="off">';
                        }},
                    {'data' : 'SubjectName'},
                    {'data' : 'wProfName'},
                    {'data' : 'ProfBtnIsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '노출' : '미노출';
                        }},
                    {'data' : 'CurriculumBtnIsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '노출' : '미노출';
                        }},
                    {'data' : 'StudyCommentBtnIsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '노출' : '미노출';
                        }},
                    {'data' : 'admin_package_product_info', 'render' : function(data, type, row, meta) {
                            var str = '없음';
                            if (data != null) {
                                str = '';
                                var obj = data.split(',');
                                for (key in obj) {
                                    str += '<p>'+obj[key]+'</p>';
                                }
                            }
                            return str;
                        }},
                    {'data' : 'off_package_product_info', 'render' : function(data, type, row, meta) {
                            var str = '없음';
                            if (data != null) {
                                str = '';
                                var obj = data.split(',');
                                for (key in obj) {
                                    str += '<p>'+obj[key]+'</p>';
                                }
                            }
                            return str;
                        }},
                    {'data' : 'ThumbnailCnt'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'PhcIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="{{site_url('/site/etc/professorHotClip/create')}}/'+data+'" class="btn-modify" data-idx="' + data + '"><u>수정</u></a>';
                        }},
                ],
            });

            // 정렬순서 변경
            $('.btn-reorder').on('click', function() {
                if (!confirm('변경된 순서를 적용하시겠습니까?')) return;

                var $order_num = $list_ajax_table.find('input[name="order_num"]');
                var $params = {};
                $order_num.each(function(idx) {
                    // 정렬순서 값이 변하는 경우에만 파라미터 설정
                    if ($(this).val() != $(this).data('origin-order-num')) {
                        $params[$(this).data('order-num-idx')] = $(this).val();
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var _url = '{{ site_url("/site/etc/professorHotClip/storeOrderNum") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            $list_ajax_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/site/etc/professorHotClip/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
                return false;
            });
        });
    </script>
@stop