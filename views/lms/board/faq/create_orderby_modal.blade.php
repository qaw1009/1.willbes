@extends('lcms.layouts.master_modal')
@section('layer_title')
    정렬변경
@stop
@section('layer_header')

@endsection

@section('layer_content')
    {!! form_errors() !!}
    <h5>- 정렬할 FAQ 구분을 선택해 주세요.</h5>
    <form class="form-horizontal form-label-left searching" id="search_form_model" name="search_form_model" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">FAQ 구분</label>
                    <div class="col-md-5">
                        <select class="form-control" required="required" id="model_faq_group_ccd" name="model_faq_group_ccd" title="FAQ구분">
                            <option value="">선택</option>
                            @foreach($faq_group_ccd as $key => $val)
                                <option value="{{$key}}" @if($select_group_ccd == $key)selected="selected"@endif>{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table_model" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="searching">구분</th>
                    <th>분류</th>
                    <th>제목</th>
                    <th>정렬</th>
                    <th>사용</th>
                </tr>
                </thead>
                <tbody class="selector" style="cursor:move">
                    @foreach($data as $row)
                        <tr>
                            <td class="faq-idx" data-idx="{{ $row['BoardIdx'] }}">{{ $row['FaqGroupCcdName'] }}<span class="hide">{{ $row['FaqGroupTypeCcd'] }}</span></td>
                            <td>{{ $row['FaqCcdName'] }}</td>
                            <td>{{ $row['Title'] }}</td>
                            <td>{{ $row['OrderNum'] }}</td>
                            <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                                <span class="hide">{{ $row['IsUse'] }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="/public/vendor/jquery/v.1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        var $datatable_model;
        var $search_form_model = $('#search_form_model');
        var $list_table_model = $('#list_ajax_table_model');

        // datatable searching
        function datatableSearching() {
            $datatable_model
                .column('.searching').search($search_form_model.find('select[name="model_faq_group_ccd"]').val())
                .draw();
        }

        $(document).ready(function() {
            $search_form_model.submit(function(e) {
                e.preventDefault();
                if ($(this).hasClass('searching') === true) {
                    datatableSearching();
                } else {
                    $datatable_model.draw();
                }
            });

            // searching: true 옵션일 경우 검색
            $search_form_model.filter('.searching').on('keyup change ifChanged', 'input, select, input.flat', function() {
                datatableSearching();
            });

            $datatable_model = $list_table_model.DataTable({
                ajax: false,
                paging: false,
                searching: true
            });

            // category item drag & drop
            (function(){
                var start_index;

                $(".selector").sortable({
                    placeholder: "ui-state-highlight",
                    start: function(e, ui) {
                        start_index = ui.item.index();
                    },
                    stop: function(e, ui) {
                        if ($('#model_faq_group_ccd').val() == '') {
                            notifyAlert('error', '알림', 'FAQ구분을 선택해 주세요.');
                            $(this).sortable("cancel");
                            return false;
                        }

                        var _update_order_url = '{{ site_url("/board/{$boardName}/updateAjaxOrderBy/?") }}' + '{!! $boardDefaultQueryString !!}';

                        var target_idx = $(this).find('.faq-idx').eq(ui.item.index()).data('idx');
                        var distance = ui.item.index() - start_index;

                        var data = {
                            '{{ csrf_token_name() }}' : $search_form_model.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'faq_group_ccd': $('#model_faq_group_ccd').val(),
                            'target_idx' : target_idx,
                            'distance' : distance
                        };

                        sendAjax(_update_order_url, data, function (ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                replaceModal("{{ site_url('board/faq/createOrderByModal?') }}" + '{!! $boardDefaultQueryString !!}' + '&select_group_ccd=' + $('#model_faq_group_ccd').val());
                                datatableSearching();
                            }
                        }, showError, false, 'POST', 'json');
                    }
                }).disableSelection();
            })();
        });
    </script>
@stop

{{--@section('add_buttons')
    <button type="submit" class="btn btn-success">Submit</button>
@endsection--}}

@section('layer_footer')

@endsection