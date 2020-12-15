@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "추시과목 설정" }}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form_modal" name="regi_form_modal" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            <div class="form-group form-group-sm">
                <table id="list_ajax_table_modal" class="table table-bordered table-striped">
                    <thead class="bg-white-gray">
                    <tr>
                        <th>No</th>
                        <th>과목명</th>
                        <th>추시여부</th>
                        <th>수정</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ $row['CcdName'] }}</td>
                            <td>{{ ($row['CcdDesc'] == 'retake') ? '추시' : '' }}</td>
                            <td>
                                <button type="button" class="btn btn-sm ml-10 btn-modify-ccddesc" data-ccd="{{$row['Ccd']}}" data-desc-type="{{ ($row['CcdDesc'] == 'retake') ? 'N' : 'Y' }}">
                                    @if($row['CcdDesc'] == 'retake')<div class="red">추시제거</div>@else추시설정@endif
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                var $regi_form_modal = $('#regi_form_modal');
                var $datatable_modal;
                var $list_table_modal = $('#list_ajax_table_modal');

                $(document).ready(function() {
                    $datatable_modal = $list_table_modal.DataTable({
                        serverSide: false,
                        ajax : false,
                        paging: false,
                        searching: false
                    });

                    $('.btn-modify-ccddesc').on('click', function() {
                        if(confirm('설정 변경하시겠습니까?')) {
                            var data = {
                                '{{ csrf_token_name() }}' : $regi_form_modal.find('input[name="{{ csrf_token_name() }}"]').val(),
                                '_method' : 'POST',
                                'ccd' : $(this).data('ccd'),
                                'desc_type' : $(this).data('desc-type'),
                            };

                            sendAjax('{{ site_url('/site/examTakeInfo/storeSubjectCcd') }}', data, function(ret) {
                                if (ret.ret_cd) {
                                    notifyAlert('success', '알림', ret.ret_msg);
                                    var _replace_url = '{{ site_url('/site/examTakeInfo/modifySubjectCcd') }}';
                                    replaceModal(_replace_url,'');
                                }
                            }, showError, false, 'POST');

                        }
                    });
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection