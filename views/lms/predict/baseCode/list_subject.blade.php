@extends('lcms.layouts.master_modal')

@section('layer_title')
    합격예측 직렬별 과목 셋팅
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
@endsection

@section('layer_content')
            <div class="form-group">
                <table id="_list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="rowspan">직렬</th>
                        <th>과목 <button class="btn btn-xs btn-default btn-subject-add mb-5">추가</button></th>
                        <th>과목타입</th>
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
                            <td>{{ $row['OrderNum'] }}</td>
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
                    });

                    $(".btn-subject-add").on("click", function () {
                        $('.btn-subject-add').setLayer({
                            'modal_id' : 'modal_search_organization',
                            'url' : '{{ site_url('/predict/baseCode/createSubject/'.$arr_base['predict_idx']) }}',
                            'width' : 1200
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
                                var _replace_url = '{{ site_url('/predict/baseCode/subject/'.$arr_base['predict_idx']) }}';
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
