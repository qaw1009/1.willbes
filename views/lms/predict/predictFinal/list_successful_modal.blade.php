@extends('lcms.layouts.master_modal')

@section('layer_title')
    최종합격자 수 정보
@stop

@section('layer_header')
<form class="form-horizontal form-label-left searching" id="modal_regi_form" name="modal_regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
@endsection

@section('layer_content')
    <div class="form-group form-group-sm">
        <label class="control-label col-md-1">등록자
        </label>
        <div class="col-md-2">
            <p class="form-control-static">{{ (empty($memo_data) === false ? $memo_data[0]['wAdminName'] : '') }}</p>
        </div>
        <label class="control-label col-md-1">등록일
        </label>
        <div class="col-md-2">
            <p class="form-control-static">{{ (empty($memo_data) === false ? $memo_data[0]['RegDatm'] : '') }}</p>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-1">검색
        </label>
        <div class="col-md-8 form-inline">
            <select class="form-control" name="search_take_mock_part" style="width: 130px;">
                <option value="">응시직렬</option>
                @foreach($arr_base['take_mock_part'] as $row)
                    <option value="{{$row['Ccd']}}">{{$row['CcdName']}}</option>
                @endforeach
             </select>
            <select class="form-control" name="search_take_area" style="width: 130px;">
                <option value="">응시지역</option>
                @foreach($arr_base['take_area'] as $key => $val)
                    <option value="{{$key}}">{{$val}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <table id="list_ajax_table_modal" class="table table-bordered table-striped">
            <thead class="bg-white-gray">
            <tr>
                <th width="5%">No</th>
                <th class="searching_take_mock_part">응시직렬</th>
                <th class="searching_take_area">응시지역</th>
                <th width="10%">합격자 수</th>
                <th width="10%">사용여부</th>
                <th width="10%">수정</th>
            </tr>
            </thead>
            <tbody>
            @foreach($memo_data as $row)
                <tr>
                    <td>{{ $loop->index }}</td>
                    <td>{{$row['TakeMockPartName']}}<span class="hide">{{ $row['TakeMockPart'] }}</span></td>
                    <td>{{$row['TakeAreaName']}}<span class="hide">{{ $row['TakeArea'] }}</span></td>
                    <td><input type="text" class="form-control" name="count_{{$row['TakeMockPart']}}_{{$row['TakeArea']}}" value="{{$row['SuccessFulCount']}}"></td>
                    <td>
                        <select class="form-control" name="is_use_{{$row['TakeMockPart']}}_{{$row['TakeArea']}}" style="width: 100px;">
                            <option value="Y" @if($row['IsUse'] == 'Y') selected @endif>사용</option>
                            <option value="N" @if($row['IsUse'] == 'N') selected @endif>미사용</option>
                        </select>
                    </td>
                    <td>
                        <input type="hidden" name="take_mock_part_{{$row['TakeMockPart']}}_{{$row['TakeArea']}}" value="{{$row['TakeMockPart']}}">
                        <input type="hidden" name="take_area_{{$row['TakeMockPart']}}_{{$row['TakeArea']}}" value="{{$row['TakeArea']}}">
                        <button type="button" class="btn btn-sm btn-primary ml-10 btn-modify-successful" data-id="{{$row['TakeMockPart']}}_{{$row['TakeArea']}}">수정</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        var $modal_regi_form = $('#modal_regi_form');
        var $datatable_modal;
        var $list_table_modal = $('#list_ajax_table_modal');

        // datatable searching
        function datatableSearching() {
            $datatable_modal
                /*.columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())*/
                .column('.searching_take_mock_part').search($modal_regi_form.find('select[name="search_take_mock_part"]').val())
                .column('.searching_take_area').search($modal_regi_form.find('select[name="search_take_area"]').val())
                .draw();
        }

        $(document).ready(function() {
            var predict_idx = "{{$predict_idx}}";

            // searching: true 옵션일 경우 검색
            $modal_regi_form.filter('.searching').on('keyup change ifChanged', 'input, select, input.flat', function() {
                datatableSearching();
            });

            $datatable_modal = $list_table_modal.DataTable({
                serverSide: false,
                ajax : false,
                paging: true,
                pageLength: 17,
                searching: true
            });

            $modal_regi_form.on('click', '.btn-modify-successful', function() {
                if(!confirm('수정하시겠습니까?')) return false;
                var _url = '{{ site_url("/predict/predictFinal/storeSuccessful") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $modal_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'predict_idx' : predict_idx,
                    'take_mock_part' : $modal_regi_form.find('input[name="take_mock_part_'+$(this).data('id')+'"]').val(),
                    'take_area' : $modal_regi_form.find('input[name="take_area_'+$(this).data('id')+'"]').val(),
                    'count' : $modal_regi_form.find('input[name="count_'+$(this).data('id')+'"]').val(),
                    'is_use' : $modal_regi_form.find('select[name="is_use_'+$(this).data('id')+'"]').val(),
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
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