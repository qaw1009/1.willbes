@extends('lcms.layouts.master_modal')

@section('layer_title')
    그룹메뉴 정렬변경
@stop

@section('layer_header')
    <form class="form-horizontal" id="_reorder_form" name="_reorder_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
@endsection

@section('layer_content')
    <p><span class="required">*</span> <strong>{{ $front_name }}메뉴 > <span id="_site_name"></span></strong></p>
    <div class="row mt-10">
        <div class="col-md-12 clearfix">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>그룹메뉴명</th>
                    <th>사용여부</th>
                    <th>정렬번호</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $row['MenuName'] }}</td>
                        <td>{{ $row['IsUse'] == 'Y' ? '사용' : '<span class="red">미사용</span>' }}</td>
                        <td><input type="text" name="group_order_num" class="form-control input-sm" value="{{ $row['GroupOrderNum'] }}" data-origin-group-order-num="{{ $row['GroupOrderNum'] }}" data-group-menu-idx="{{ $row['MenuIdx'] }}" style="width: 80px;"/></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <p>※ <strong>`1뎁스` 일반 메뉴</strong>가 다수일 경우 정렬순서를 변경하실 수 있습니다.</p>
    <script type="text/javascript">
        var $_reorder_form = $('#_reorder_form');

        $(document).ready(function() {
            // 부모창 사이트명 표기
            $_reorder_form.find('#_site_name').text($('#search_form').find('#tabs_site_code li.active a').text());

            // 정렬변경 버튼 클릭
            $_reorder_form.on('click', 'button[name="btn_group_reorder"]', function() {
                if (!confirm('변경된 순서를 적용하시겠습니까?')) {
                    return;
                }

                var $group_order_num = $_reorder_form.find('input[name="group_order_num"]');
                var $params = {};
                $group_order_num.each(function(idx) {
                    // 정렬순서 값이 변하는 경우에만 파라미터 설정
                    if ($(this).val() !== $(this).data('origin-group-order-num').toString()) {
                        $params[$(this).data('group-menu-idx')] = $(this).val();
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $_reorder_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params),
                    'site_code' : '{{ $site_code }}'
                };
                sendAjax('{{ site_url('/site/' . $contr_name . '/groupReorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#groupReorderModal").modal('toggle');
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="button" name="btn_group_reorder" class="btn btn-success">정렬변경</button>
@endsection

@section('layer_footer')
    </form>
@endsection
