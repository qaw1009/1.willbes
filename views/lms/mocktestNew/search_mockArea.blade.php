@extends('lcms.layouts.master_modal')
@section('layer_title')문제영역검색@stop
@section('layer_header')
<form class="form-horizontal searching" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="siteCode" value="{{ $siteCode }}">
@endsection

    @section('layer_content')
        <div class="form-group form-group-bordered">
            <div class="col-xs-9">
                <div class="form-inline">
                    <label class="mr-15">통합검색</label>
                    <input type="text" class="form-control input-sm" id="search_value" name="search_value" style="width:50%">
                    <span class="ml-5">카테고리, 코드, 문제영역명 검색 가능</span>
                </div>
            </div>
        </div>
        <div class="mt-10 mb-50">
            <table id="list_table_modal" class="table table-bordered table-striped table-head-row2">
                <thead class="bg-white-gray">
                <tr>
                    <th class="text-center">선택</th>
                    <th class="text-center">NO</th>
                    <th class="searching text-center">모의고사 카테고리<br>(카테고리>직렬>과목)</th>
                    <th class="searching text-center">문제영역코드</th>
                    <th class="searching text-center">문제영역명</th>
                    <th class="text-center">영역수</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td class="text-center"><input type="radio" class="flat btn-apply" id="_area_code_{{$row['MaIdx']}}" name="_area_code" value="{{ $row['MaIdx'] }}"></td>
                        <td class="text-center">{{$loop->index}}</td>
                        <td>
                            @php
                                $moData_cate1 = $moData_cate2 = $moData_subject = [];
                                foreach(explode(',', $row['moCateKey']) as $it) {
                                    if( isset($moData[$it]) ) {
                                        $bIsUse = ($moData[$it]['bIsUse'] == 'N') ? '<span class="ml-5 red">(미사용)</span>' : '';

                                        echo preg_replace('/^(.*?\s>\s)/', '', $moData[$it]['name']) . $bIsUse .'<br>';
                                        $moData_cate1[] = $moData[$it]['cate1'];
                                        $moData_cate2[] = $moData[$it]['cate2'];
                                        $moData_subject[] = $moData[$it]['subject'];
                                    }
                                }
                            @endphp
                        </td>
                        <td class="text-center">{{ sprintf("%04d", $row['MaIdx']) }}</td>
                        <td class="text-center area-title-{{$row['MaIdx']}}">{{ $row['QuestionArea'] }}</td>
                        <td class="text-center">{{ $row['ListCnt'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <script type="text/javascript">
            var $datatable_modal;
            var $search_form_modal = $('#search_form_modal');
            var $list_table_modal = $('#list_table_modal');
            var $parent_selected_area = $('#selected_area');

            $(document).ready(function() {
                var parent_area_code = $('input[name="area_code"]').val();
                if (typeof parent_area_code != "undefined") {
                    $('#_area_code_'+parent_area_code).attr('checked', true);
                }

                // datatable_modals
                $datatable_modal = $list_table_modal.DataTable({
                    language: {
                        "info": "[ 총 _MAX_건 ]",
                    },
                    dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                    ajax: false,
                    paging: false,
                    searching: true
                });

                $list_table_modal.on('ifClicked', 'input[name="_area_code"]', function() {
                    var code, route_name, html = '';
                    code = $(this).val();
                    route_name = $('.area-title-'+code).text();
                    html += '<span class="pb-5">' + route_name;
                    html += '   <a href="#none" data-area-code="' + code + '" class="selected-area-delete"><i class="fa fa-times red"></i></a>';
                    html += '   <input type="hidden" name="area_code" value="' + code + '">';
                    html += '</span>';
                    $parent_selected_area.html(html);
                    $("#pop_modal").modal('toggle');
                });
            });

            // datatable_modal Search
            function datatableSearchingModal() {
                $datatable_modal
                    .columns('.searching').flatten().search($search_form_modal.find('input[name="search_value"]').val())
                    .draw();
            }
        </script>
    @stop

@section('add_buttons')
@endsection
@section('layer_footer')
</form>
@endsection

