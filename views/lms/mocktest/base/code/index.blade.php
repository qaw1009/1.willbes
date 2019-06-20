@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 등록 및 성적처리를 위한 카테고리별 직렬 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false, $arrtab , true, $arrsite) !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($siteCodeDef, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="sc_cateD1" name="sc_cateD1">
                            <option value="">카테고리</option>
                            @foreach($cateD1 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_cateD2" name="sc_cateD2">
                            <option value="">직렬</option>
                            @foreach($cateD2 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_subject" name="sc_subject">
                            <option value="">과목</option>
                            @foreach($subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_use" name="sc_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="sc_fi" name="sc_fi"> 명칭, 코드 검색 가능
                    </div>
                    <div class="col-md-5 text-right">
                        {{--<button type="submit" class="btn btn-primary" id="btn_search"><i class="fa fa-spin fa-refresh"></i> 검색</button>--}}
                        <button type="button" class="btn btn-default" id="searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th rowspan="2" class="rowspan hide">사이트</th>
                        <th rowspan="2" class="text-center rowspan" style="width:14%">카테고리(대분류)</th>
                        <th rowspan="2" class="text-center" style="width:14%">직렬 [코드] <button class="btn btn-xs btn-default ml-10 act-reg" data-act="create" data-type="Kind">추가</button></th>
                        <th colspan="2" class="text-center">과목</th>
                        <th rowspan="2" class="text-center" style="width:7%">사용여부</th>
                        <th rowspan="2" class="text-center" style="width:7%">등록자</th>
                        <th rowspan="2" class="text-center" style="width:10%">등록일</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:28%">필수</th>
                        <th class="text-center" style="width:20%">선택</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listDB as $row)
                        <tr data-idx="{{ $row['MmIdx'] }}">
                            <td class="hide">
                                {{ $row['SiteName'] }}
                                [<span class="blue">{{ $row['SiteCode'] }}</span>]
                            </td>
                            <td>
                                {{ $row['gCateName'] }}
                                [<span class="blue">{{ $row['gCateCode'] }}</span>]
                                @if($row['gIsUse'] == 'Y') <span class="mr-5">(사용)</span> @else <span class="mr-5 red">(미사용)</span> @endif
                            </td>
                            <td>
                                @if(!empty($row['mCateCode']))
                                    <span class="underline-link act-reg" data-act="edit" data-type="Kind" data-gcate="{{ $row['gCateCode'] }}" data-mcate="{{ $row['mCateCode'] }}">{{ $row['mCateName'] }}</span>
                                    [<span class="blue">{{ $row['mCateCode'] }}</span>]
                                    @if($row['mIsUse'] == 'Y') <span class="mr-5">(사용)</span> @else <span class="mr-5 red">(미사용)</span> @endif
                                @endif
                            </td>
                            <td>
                                @if( empty($subjectNames[$row['MmIdx'].'-E']) )
                                    <div class="text-center">
                                        <button class="btn btn-xs btn-default ml-10 act-reg" data-act="create" data-type="Subject" data-sj-type="E">추가</button>
                                    </div>
                                @else
                                    <span class="underline-link act-reg" data-act="edit" data-type="Subject" data-sj-type="E">
                                        {!! str_replace('(미사용)', '<span class="red">(미사용)</span>', $subjectNames[$row['MmIdx'].'-E']) !!}
                                        <span class="hide">{{ $subjectIdxs[$row['MmIdx'].'-E'] }}</span> {{-- datatable 검색용 --}}
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if( empty($subjectNames[$row['MmIdx'].'-S']) )
                                    <div class="text-center">
                                        <button class="btn btn-xs btn-default ml-10 act-reg" data-act="create" data-type="Subject" data-sj-type="S">추가</button>
                                    </div>
                                @else
                                    <span class="underline-link act-reg" data-act="edit" data-type="Subject" data-sj-type="S">
                                        {!! str_replace('(미사용)', '<span class="red">(미사용)</span>', $subjectNames[$row['MmIdx'].'-S']) !!}
                                        <span class="hide">{{ $subjectIdxs[$row['MmIdx'].'-S'] }}</span>
                                    </span>
                                @endif
                            </td>
                            <td class="text-center" data-search="{{ $row['IsUse'] }}">
                                @if($row['IsUse'] == 'Y')
                                    <span class="act-use underline-link">사용</span>
                                @elseif($row['IsUse'] == 'N')
                                    <span class="act-use underline-link red">미사용</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $row['wAdminName'] }}</td>
                            <td class="text-center">{{ $row['RegDatm'] }}</td>
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
            // 모달창 오픈
            $('.act-reg').on('click', function() {
                var uri_param;
                var type = $(this).data('type');
                var act = $(this).data('act');
                var idx = $(this).closest('tr').data('idx');
                var sjType = $(this).data('sj-type');

                if(type == 'Kind') { // 직렬
                    if(act === 'create')
                        uri_param = 'act=' + act;
                    else
                        uri_param = 'act=' + act + '&idx=' + idx;
                }
                else { // 과목
                    uri_param = 'act=' + act + '&idx=' + idx + '&sjType=' + sjType;
                }

                $('.act-reg').setLayer({
                    'url' : '{{ site_url() }}' + '/mocktest/baseCode/create' + type + '?' + uri_param,
                    'width' : 950
                });
            });

            // 사용,미사용 전환
            $('.act-use').on('click', function () {
                if (!confirm('사용여부를 변경하시겠습니까?')) return false;

                var _this = $(this);
                var isUse =_this.closest('td').data('search');
                var _url = '{{ site_url("/mocktest/baseCode/useToggle") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'idx' : $(this).closest('tr').data('idx'),
                    'isUse' : isUse,
                };

                sendAjax(_url, data, function(ret) {
                    var key, txt;
                    if (ret.ret_cd) {
                        if(isUse == 'Y') { key = 'N'; txt = '미사용'; }
                        else { key = 'Y'; txt = '사용'; }

                        _this.text(txt).toggleClass('red')
                             .closest('td').data('search', key).attr('data-search', key);
                        $datatable.row(_this.closest('tr')).invalidate().draw();

                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showError, false, 'POST');
            });

            {{--// 순서 변경--}}
            {{--$('.btn-reorder').on('click', function() {--}}
            {{--if (!confirm('정렬을 변경하시겠습니까?')) return;--}}

            {{--var $params = {};--}}
            {{--$list_form.find('[name="order_num"]').each(function() {--}}
            {{--if ($(this).val() != $(this).data('orig-order')) $params[$(this).data('idx')] = $(this).val();--}}
            {{--});--}}

            {{--var data = {--}}
            {{--'{{ csrf_token_name() }}' : $list_form.find('[name="{{ csrf_token_name() }}"]').val(),--}}
            {{--'_method' : 'PUT',--}}
            {{--'params' : JSON.stringify($params)--}}
            {{--};--}}
            {{--sendAjax('{{ site_url('/mocktest/baseCode/reorder') }}', data, function(ret) {--}}
            {{--if (ret.ret_cd) {--}}
            {{--notifyAlert('success', '알림', ret.ret_msg);--}}
            {{--location.replace(location.pathname + dtParamsToQueryString($datatable));--}}
            {{--}--}}
            {{--}, showError, true, 'POST');--}}
            {{--});--}}

            // 검색 Select 메뉴
            $search_form.find('#sc_cateD1').chained('#search_site_code');
            $search_form.find('#sc_cateD2').chained('#sc_cateD1');
            $search_form.find('#sc_subject').chained('#search_site_code');

            // 검색 초기화
            $('#searchInit').on('click', function () {
                $search_form.find('[name^=sc_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $search_form.find('#sc_cateD1').trigger('change');
                $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                info: true,
                language: {
                    "info": "[ 총 _END_ / _MAX_건 ]",
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>t",
                rowsGroup: ['.rowspan'],
                // buttons: [
                //     { text: '<i class="fa fa-sort-numeric-asc mr-5"></i> 정렬변경', className: 'btn btn-sm btn-success' }
                // ]
            });

            // 과목컬럼 OR 검색을 위해 확장
            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {

                    findStr = $search_form.find('#sc_subject').val();

                    if (data[3].indexOf(findStr) != -1 || data[4].indexOf(findStr) != -1) return true;
                    else return false;
                }
            );
            datatableSearching();
        });

        // DataTable Search
        function datatableSearching() {
            $datatable
                .search($search_form.find('#sc_fi').val())
                .column(0).search($search_form.find('#search_site_code').val())
                .column(1).search($search_form.find('#sc_cateD1').val())
                .column(2).search($search_form.find('#sc_cateD2').val())
                //.columns([3,4]).flatten().search($search_form.find('#sc_subject').val()) // or
                .column(5).search($search_form.find('#sc_use').val())
                .draw();
        }
    </script>
@stop
