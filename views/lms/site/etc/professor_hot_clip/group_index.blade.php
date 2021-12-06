@extends('lcms.layouts.master')

@section('content')
    <h5>- 임용전용 핫클립 그룹 관리</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="search_view_type">메인,이벤트 유형</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_view_type" name="search_view_type">
                            <option value="">유형선택</option>
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
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="searching_view_type">유형</th>
                        <th>정렬</th>
                        <th>그룹명</th>
                        <th>사용여부</th>
                        <th>등록일</th>
                        <th>등록자</th>
                        <th>수정</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $row)
                            <tr>
                                <td>
                                    {{ ($row['ViewType'] == '1') ? '메인' : '이벤트' }}
                                    <span class="hide">{{ $row['ViewType'] }}</span>
                                </td>
                                <td>
                                    <input type="text" name="order_num" value="{{ $row['OrderNum'] }}" class="order-num" data-order-num-idx="{{ $row['PhcgIdx'] }}" data-origin-order-num="{{ $row['OrderNum'] }}" style="width: 60px;" maxlength="3" autocomplete="off">
                                    <span class="hide">{{ $row['ViewType'] }}</span>
                                </td>
                                <td>{{ $row['Title'] }}</td>
                                <td>{{ ($row['IsUse'] == 'Y') ? '사용' : '미사용' }}</td>
                                <td>{{ $row['RegDatm'] }}</td>
                                <td>{{ $row['RegAdminName'] }}</td>
                                <td><a href="{{site_url('/site/etc/professorHotClip/groupCreate/'.$row['PhcgIdx'])}}"><u>수정</u></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: false,
                ajax : false,
                paging: true,
                pageLength: 20,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 핫클립관리 이동', className: 'btn-sm btn-info border-radius-reset mr-15', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/etc/professorHotClip/index') }}';
                        }},
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset mr-15', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/etc/professorHotClip/groupCreate') }}';
                        }},
                ]
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

                var _url = '{{ site_url("/site/etc/professorHotClip/storeGroupOrderNum") }}';
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
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .column('.searching_view_type').search($search_form.find('select[name="search_view_type"]').val())
                .draw();
        }
    </script>
@stop