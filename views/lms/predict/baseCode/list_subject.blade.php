@extends('lcms.layouts.master_modal')

@section('layer_title')
    합격예측 직렬별 과목 셋팅
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
        <input type="hidden" name="predict_idx" value="{{$arr_base['predict_idx']}}">
@endsection

@section('layer_content')
            <div class="form-group">
                <table id="_list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="rowspan">직렬</th>
                        <th>과목</th>
                        <th>과목타입</th>
                        <th>과목그룹</th>
                        <th>정렬</th>
                        <th>등록자</th>
                        <th>등록일</th>
                        <th>삭제</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($arr_base['code'] as $row)
                        <tr>
                            <td>{{ $row['TakeMockPartName'] }}</td>
                            <td>{{ $row['CcdName'] }}</td>
                            <td>{{ $row['TypeName'] }}</td>
                            <td><input type="number" class="form-control" name="group_by" data-groupby-idx="{{ $row['PrsIdx'] }}" data-origin-groupby="{{ $row['GroupBy'] }}" value="{{ $row['GroupBy'] }}" style="width: 50px;"></td>
                            <td><input type="number" class="form-control" name="order_num" data-order-num-idx="{{ $row['PrsIdx'] }}" data-origin-order-num="{{ $row['OrderNum'] }}" value="{{ $row['OrderNum'] }}" style="width: 50px;"></td>
                            <td>{{ $row['RegAdminName'] }}</td>
                            <td>{{ $row['RegDatm'] }}</td>
                            <td>
                                <button class="btn btn-xs btn-danger btn-subject-delete" data-idx="{{ $row['PrsIdx'] }}">삭제</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                var $datatable_modal;
                var $_search_form = $('#_search_form');
                var $_list_table = $('#_list_table');
                $(document).ready(function() {
                    $datatable_modal = $_list_table.DataTable({
                        ajax: false,
                        paging: true,
                        pageLength: 20,
                        lengthChange: false,
                        searching: true,
                        rowsGroup: ['.rowspan'],
                        buttons: [
                            { text: '<i class="fa fa-pencil mr-5"></i> 과목그룹변경', className: 'btn-sm btn-dark border-radius-reset btn-groupby' }
                            ,{ text: '<i class="fa fa-pencil mr-5"></i> 정렬변경', className: 'btn-sm btn-dark border-radius-reset ml-10 btn-reorder' }
                            ,{ text: '<i class="fa fa-pencil mr-5"></i> 과목추가', className: 'btn-sm btn-primary border-radius-reset ml-10 btn-subject-add' }
                        ]
                    });

                    $(".btn-subject-add").on("click", function () {
                        $('.btn-subject-add').setLayer({
                            'modal_id' : 'modal_search_organization',
                            'url' : '{{ site_url('/predict/baseCode/createSubject/'.$arr_base['predict_idx']) }}',
                            'width' : 1000,
                        });
                    });

                    $(".btn-subject-delete").on("click", function () {
                        var _url = '{{site_url('predict/baseCode/deleteSubject')}}';
                        var data = {
                            '{{ csrf_token_name() }}' : $_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'DELETE',
                            'prs_idx' : $(this).data('idx')
                        };

                        if (!confirm('정말로 삭제하시겠습니까?')) {
                            return;
                        }
                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                var _replace_url = '{{ site_url('/predict/baseCode/listSubject/'.$arr_base['predict_idx']) }}';
                                replaceModal(_replace_url,'');
                            }
                        }, showError, false, 'POST');
                    });

                    // 과목그룹변경
                    $('.btn-groupby').on('click', function() {
                        if (!confirm('변경된 그룹을 적용하시겠습니까?')) return;

                        var $group_by = $_list_table.find('input[name="group_by"]');
                        var $params = {};
                        $group_by.each(function(idx) {
                            // 정렬순서 값이 변하는 경우에만 파라미터 설정
                            if ($(this).val() != $(this).data('origin-groupby')) {
                                $params[$(this).data('groupby-idx')] = $(this).val();
                            }
                        });

                        if (Object.keys($params).length < 1) {
                            alert('변경된 내용이 없습니다.');
                            return;
                        }

                        var _url = '{{ site_url("/predict/baseCode/updateGroupBy") }}';
                        var data = {
                            '{{ csrf_token_name() }}' : $_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'predict_idx' : $_search_form.find('input[name="predict_idx"]').val(),
                            'params' : JSON.stringify($params)
                        };
                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                var _replace_url = '{{ site_url('/predict/baseCode/listSubject/'.$arr_base['predict_idx']) }}';
                                replaceModal(_replace_url,'');
                            }
                        }, showError, false, 'POST');
                    });

                    // 정렬순서 변경
                    $('.btn-reorder').on('click', function() {
                        if (!confirm('변경된 순서를 적용하시겠습니까?')) return;

                        var $order_num = $_list_table.find('input[name="order_num"]');
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

                        var _url = '{{ site_url("/predict/baseCode/updateOrderNum") }}';
                        var data = {
                            '{{ csrf_token_name() }}' : $_search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'predict_idx' : $_search_form.find('input[name="predict_idx"]').val(),
                            'params' : JSON.stringify($params)
                        };
                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                var _replace_url = '{{ site_url('/predict/baseCode/listSubject/'.$arr_base['predict_idx']) }}';
                                replaceModal(_replace_url,'');
                            }
                        }, showError, false, 'POST');
                    });
                });
            </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
</form>
@endsection
