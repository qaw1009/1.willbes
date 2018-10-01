@extends('lcms.layouts.master_modal')

@section('layer_title')
    복합 연결
@stop

@section('layer_header')
    <form class="form-horizontal searching" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        @foreach($params as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
@endsection

@section('layer_content')
    <div class="form-group form-group-bordered bg-odd">
        <label class="control-label col-md-2">카테고리 정보
        </label>
        <div class="col-md-10">
            <p class="form-control-static">{{ str_last_pos_before($cate_route_name, ' > ') }} > <span class="blue">{{ str_last_pos_after($cate_route_name, ' > ') }}</span></p>
        </div>
    </div>
    <div class="form-group pt-10 pb-5">
        <label class="control-label col-md-2 pt-5">통합검색
        </label>
        <div class="col-md-4">
            <input type="text" class="form-control input-sm" id="search_value" name="search_value">
        </div>
        <div class="col-md-4">
            <p class="form-control-static">명칭, 코드 검색 가능</p>
        </div>
        <div class="col-md-2 text-right pr-5">
            <button type="submit" class="btn btn-primary btn-sm btn-search mr-0" id="_btn_search">검 색</button>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-md-12 clearfix">
            <table id="_list_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th class="searching">대상항목</th>
                    <th class="searching">연결항목</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td><a href="#" class="btn-complex-modify" data-idx="{{ $row['ChildCcd'] }}"><u class="blue">{{ $row['ChildName'] }}</u></a></td>
                        <td>{{ $row['SubjectNames'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#_search_form');
        var $list_table = $('#_list_table');

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 복합연결 등록', className: 'btn-sm btn-success border-radius-reset btn-complex-regist' }
                ]
            });

            // 복합연결 등록 폼
            $('.btn-complex-regist, .btn-complex-modify').click(function() {
                var uri_param = $search_form.find('input[name="_conn_type"]').val() + '/' + $search_form.find('input[name="_site_code"]').val() + '/' + $search_form.find('input[name="_cate_code"]').val();
                uri_param += '/' + ((typeof $(this).data('idx') === 'undefined') ? '000000' : $(this).data('idx'));

                // 등록 폼으로 내용 변경
                replaceModal('{{ site_url('/product/base/sortMapping/create/') }}' + uri_param, {});
            });
        });

        // datatable searching
        function datatableSearching() {
            console.log('1');
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .draw();
        }
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection