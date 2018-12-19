@extends('lcms.layouts.master_modal')

@section('layer_title')
    정렬변경
@stop

@section('layer_header')
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            <form class="form-horizontal searching" id="search_form_modal" name="search_form_modal" method="POST" onsubmit="return false;" novalidate>
                <div class="form-group">
                    <div class="row mt-5">
                        <div class="col-md-2">
                            {!! html_site_select('', 'search_modal_site_code', 'search_modal_site_code', '', '운영 사이트', 'required', '', true) !!}
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="search_value" name="search_value">
                        </div>
                        <div class="col-md-2">
                            <p class="form-control-static">• 통합 검색 가능</p>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control mr-10" id="search_modal_cate_code" name="search_modal_cate_code" title="카테고리">
                                <option value="">카테고리</option>
                                @foreach($arr_cate_code as $row)
                                    <option value="{{$row['SiteCode']}}_{{$row['CateCode']}}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control mr-10" id="search_modal_banner_disp_idx" name="search_modal_banner_disp_idx" title="노출섹션">
                                <option value="">노출섹션</option>
                                @foreach($arr_disp_data as $row)
                                    <option value="{{$row['BdIdx']}}" class="{{$row['SiteCode']}}_{{$row['CateCode']}}">{{$row['DispName']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            <div class="x_panel mt-10">
                <div class="x_content">
                    <form class="form-horizontal" id="list_modal_form" name="list_modal_form" method="POST" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <table id="list_modal_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="searching_site_code rowspan">운영사이트</th>
                                <th class="searching_banner_disp_idx rowspan">노출섹션</th>
                                <th>정렬</th>
                                <th class="searching_category">카테고리</th>
                                <th class="searching">배너명</th>
                                <th width="25%">배너이미지</th>
                                <th>노출기간</th>
                                <th>사용여부</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row['SiteName'] }}<span class="hide">{{ $row['SiteCode'] }}</span></td>
                                    <td>{{ $row['DispName'] }}<span class="hide">{{ $row['BdIdx'] }}</span></td>
                                    <td>
                                        <div class="form-group form-group-sm">
                                            <input type="text" name="order_num" class="form-control" value="{{ $row['OrderNum'] }}" data-origin-order-num="{{ $row['OrderNum'] }}" data-idx="{{ $row['BIdx'] }}" style="width: 80px;" />
                                        </div>
                                    </td>
                                    <td>
                                        {{ $row['CateName'] }}
                                        <span class="hide">{{$row['SiteCode']}}_{{$row['CateCode']}}</span>
                                    </td>
                                    <td>{{ $row['BannerName'] }}</td>
                                    <td>
                                        <img src="{{$row['BannerFullPath']}}{{$row['BannerImgName']}}" width='100%' height='30%'>
                                    </td>
                                    <td>
                                        {{$row['DispStartDatm']}} ~ {{$row['DispEndDatm']}}
                                    </td>
                                    <td>@if($row['IsUse'] == 'Y') 사용 @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>

            <script type="text/javascript">
                var $datatable_modal;
                var $search_form_modal = $('#search_form_modal');
                var $list_modal_form = $('#list_modal_form');
                var $list_modal_table = $('#list_modal_table');

                $(document).ready(function() {
                    // site-code에 매핑되는 select box 자동 변경
                    $search_form_modal.find('select[name="search_modal_cate_code"]').chained("#search_modal_site_code");
                    $search_form_modal.find('select[name="search_modal_banner_disp_idx"]').chained("#search_modal_cate_code");

                    $datatable_modal = $list_modal_table.DataTable({
                        ajax: false,
                        paging: false,
                        searching: true,
                        rowsGroup: ['.rowspan'],
                        buttons: [
                            { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' }
                        ]
                    });

                    // 순서 변경
                    $('.btn-reorder').on('click', function() {
                        if (!confirm('변경된 순서를 적용하시겠습니까?')) {
                            return;
                        }

                        var $order_num = $list_modal_table.find('input[name="order_num"]');
                        var $params = {};
                        $order_num.each(function(idx) {
                            // 정렬순서 값이 변하는 경우에만 파라미터 설정
                            if ($(this).val() != $(this).data('origin-order-num')) {
                                $params[$(this).data('idx')] = $(this).val();
                            }
                        });

                        var data = {
                            '{{ csrf_token_name() }}' : $list_modal_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'params' : JSON.stringify($params)
                        };
                        sendAjax('{{ site_url('/site/banner/regist/reorder') }}', data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                replaceModal('/site/banner/regist/listReOrderModal', {});
                            }
                        }, showError, false, 'POST');
                    });
                });

                // datatable searching
                function datatableSearching() {
                    $datatable_modal
                        .columns('.searching').flatten().search($search_form_modal.find('input[name="search_value"]').val())
                        .column('.searching_site_code').search($search_form_modal.find('select[name="search_modal_site_code"]').val())
                        .column('.searching_category').search($search_form_modal.find('select[name="search_modal_cate_code"]').val())
                        .column('.searching_banner_disp_idx').search($search_form_modal.find('select[name="search_modal_banner_disp_idx"]').val())
                        .draw();
                }

                // searching: true 옵션일 경우 검색
                $search_form_modal.filter('.searching').on('keyup change ifChanged', 'input, select, input.flat', function() {
                    datatableSearching();
                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
@endsection