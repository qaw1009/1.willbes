@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation"><a href="{{ site_url('/sys/site/index/code') }}">사이트 생성관리</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/site/index/group') }}">사이트 그룹 정보관리</a></li>
        <li role="presentation" class="active"><a href="{{ site_url('/sys/site/index/category') }}" class="cs-pointer"><strong>사이트 카테고리 관리</strong></a></li>
    </ul>
    <h5>- 윌비스 사용자 운영 사이트 카테고리를 생성하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_site_tabs('tabs_site_code', 'tab', true, [], false) !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
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
                        <th class="searching searching_site_code rowspan">사이트 [<span class="blue">코드</span>]</th>
                        <th class="searching rowspan">대분류 [<span class="blue">코드</span>]</th>
                        <th class="searching">중분류 [<span class="blue">코드</span>] <button type="button" class="btn btn-xs btn-success ml-10 btn-regist" data-cate-depth="2">추가</button></th>
                        <th class="searching_is_use">사용여부</th>
                        <th>등록자</th>
                        <th>등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row['SiteName'] }} [<span class="blue">{{ $row['SiteCode'] }}</span>]</td>
                            <td>
                                <div class="form-group form-group-sm no-border-bottom">
                                    <input type="text" name="order_num" class="form-control" value="{{ $row['BOrderNum'] }}" data-origin-order-num="{{ $row['BOrderNum'] }}" data-idx="{{ $row['BCateCode'] }}" style="width: 30px;" />
                                    <input type="radio" name="cate_code" value="{{ $row['BCateCode'] }}" data-cate-depth="{{ $row['BCateDepth'] }}" data-site-code="{{ $row['SiteCode'] }}" class="flat"/>
                                    <a href="#none" class="btn-modify" data-idx="{{ $row['BCateCode'] }}"><u>{{ $row['BCateName'] }}</u></a>
                                    [<span class="blue">{{ $row['BCateCode'] }}</span>]
                                    @if($row['BIsUse'] == 'Y') (사용) @elseif($row['BIsUse'] == 'N') (<span class="red">미사용</span>) @endif
                                    @if($row['BIsDefault'] == 'Y') <span class="red pl-5">[디폴트]</span> @endif
                                </div>
                            </td>
                            <td>
                                @if(empty($row['MCateCode']) === false)
                                    <div class="form-group form-group-sm no-border-bottom">
                                        <input type="text" name="order_num" class="form-control" value="{{ $row['MOrderNum'] }}" data-origin-order-num="{{ $row['MOrderNum'] }}" data-idx="{{ $row['MCateCode'] }}" style="width: 30px;" />
                                        <a href="#none" class="btn-modify" data-idx="{{ $row['MCateCode'] }}"><u>{{ $row['MCateName'] }}</u></a>
                                        [<span class="blue">{{ $row['MCateCode'] }}</span>]
                                    </div>
                                @endif
                                @if($row['MIsDefault'] == 'Y') <span class="red">[디폴트]</span> @endif
                            </td>
                            <td>@if($row['LastIsUse'] == 'Y') 사용 @elseif($row['LastIsUse'] == 'N') <span class="red">미사용</span> @endif
                                <span class="hide">{{ $row['LastIsUse'] }}</span>
                            </td>
                            <td>{{ $row['LastRegAdminName'] }}</td>
                            <td>{{ $row['LastRegDatm'] }}</td>
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
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // datatable setting
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                rowsGroup: ['.rowspan'],
                buttons: [
                    { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn-sm btn-success border-radius-reset mr-15 btn-reorder' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 대분류 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ]
            });

            // 순서 변경
            $('.btn-reorder').on('click', function() {
                if (!confirm('변경된 순서를 적용하시겠습니까?')) {
                    return;
                }

                var $order_num = $list_form.find('input[name="order_num"]');
                var $params = {};
                $order_num.each(function(idx) {
                    // rowspan 데이터는 첫번째 display 되는 값으로 파라미터 설정
                    if ($order_num.eq(idx).closest('td').css('display') != 'none') {
                        // 정렬순서 값이 변하는 경우에만 파라미터 설정
                        if ($(this).val() != $(this).data('origin-order-num')) {
                            $params[$(this).data('idx')] = $(this).val();
                        }
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/sys/site/reorder/category') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace(location.pathname + dtParamsToQueryString($datatable));
                    }
                }, showError, false, 'POST');
            });

            // 카테고리 등록/수정 모달창 오픈
            $('.btn-regist, .btn-modify').click(function() {
                var is_regist = ($(this).prop('class').indexOf('btn-regist') !== -1) ? true : false;
                var uri_param = '';

                if (is_regist === true) {
                    var site_code = 0;
                    var parent_cate_code = 0;
                    var cate_depth = (typeof $(this).data('cate-depth') != 'undefined') ? $(this).data('cate-depth') : 1;

                    if (cate_depth != 1) {
                        site_code = $list_form.find('input[name="cate_code"]:checked').data('site-code');
                        parent_cate_code = $list_form.find('input[name="cate_code"]:checked').val();

                        if (typeof parent_cate_code == 'undefined' || $list_form.find('input[name="cate_code"]:checked').data('cate-depth') != (cate_depth - 1)) {
                            alert('상위 분류를 선택해 주세요.');
                            return false;
                        }
                    }
                    uri_param = site_code + '/' + cate_depth + '/' + parent_cate_code;
                } else {
                    uri_param = $(this).data('idx');
                }

                $('.btn-regist, .btn-modify').setLayer({
                    'url' : '{{ site_url('/sys/site/create/category/') }}' + uri_param,
                    'width' : 940
                });
            });
        });

        // datatable searching
        function datatableSearching() {
            $datatable
                .columns('.searching').flatten().search($search_form.find('input[name="search_value"]').val())
                .column('.searching_is_use').search($search_form.find('select[name="search_is_use"]').val())
                .column('.searching_site_code').search($search_form.find('input[name="search_site_code"]').val())
                .draw();
        }
    </script>
@stop
