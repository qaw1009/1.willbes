@extends('lcms.layouts.master')

@section('content')
    <h5>- 임용전용 핫클립 관리</h5>

    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>정렬</th>
                        <th>과목명</th>
                        <th>교수명</th>
                        <th>교수홈버튼 노출여부</th>
                        <th>커리큘럼버튼 노출여부</th>
                        <th>수강후기버튼 노출여부</th>
                        <th>썸네일등록개수</th>
                        <th>등록자</th>
                        <th style="width: 120px;">등록일</th>
                        <th>수정</th>
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
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // datatable setting
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
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
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="text" name="order_num" value="'+row.OrderNum+'" class="order-num" data-order-num-idx="'+row.PhcIdx+'" data-origin-order-num="'+row.OrderNum+'" style="width: 60px;" maxlength="3">';
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
                    {'data' : 'ThumbnailCnt'},
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

                var $order_num = $list_table.find('input[name="order_num"]');
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

            //목록
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/site/etc/professorHotClip/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
                return false;
            });
        });
    </script>
@stop