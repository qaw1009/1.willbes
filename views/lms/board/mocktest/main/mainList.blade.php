@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 상품정보를 등록하고 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false, $arrtab , true, $arrsite) !!}
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($siteCodeDef, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_cateD1" name="search_cateD1">
                            <option value="">카테고리</option>
                            @foreach($cateD1 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_cateD2" name="search_cateD2">
                            <option value="">직렬</option>
                            @foreach($cateD2 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_year" name="search_year">
                            <option value="">연도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select class="form-control mr-5" id="search_round" name="search_round">
                            <option value="">회차</option>
                            @foreach(range(1, 20) as $i)
                                <option value="{{$i}}">{{$i}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mr-5" id="search_TakeFormsCcd" name="search_TakeFormsCcd">
                            <option value="">응시형태</option>
                            @foreach($applyType as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_AcceptStatus" name="search_AcceptStatus">
                            <option value="">접수상태</option>
                            @foreach($accept_ccd as $key=>$val)
                                @if($key != '675001' ) {{--접수예정 제외--}}
                                <option value="{{$key}}">{{$val}}</option>
                                @endif
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_use" name="search_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭, 코드 검색 가능
                    </div>
                    <label class="control-label col-md-1" for="search_start_date">접수기간검색</label>
                    <div class="col-md-6">
                        <div class="col-md-11 form-inline">
                            <div class="input-group mb-0 mr-20">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                                <div class="input-group-addon no-border no-bgcolor">~</div>
                                <div class="input-group-addon no-border-right">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default mr-20" id="_btn_reset">검색초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">카테고리</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">연도</th>
                        <th class="text-center">회차</th>
                        <th class="text-center">모의고사명</th>
                        <th class="text-center">판매가</th>
                        <th class="text-center">접수기간</th>
                        <th class="text-center">접수상태</th>
                        <th class="text-center">응시기간</th>
                        <th class="text-center">사용여부</th>
                        <th class="text-center">이의제기(미답변수/총건수)</th>
                        <th class="text-center">정오표</th>
                    </tr>
                    </thead>
                    <tbody>
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
            // 검색 Select 메뉴
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');

            // 검색 초기화
            $('#searchInit, #tabs_site_code > li').on('click', function () {
                $search_form.find('[name^=search_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $search_form.find('#search_cateD1').trigger('change');

                var eTarget = (event.target) ? event.target : event.srcElement;
                if($(eTarget).attr('id') == 'searchInit') $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                buttons: [],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url("/board/".$boardName."/mainListAjax?") }}' + '{!! $boardDefaultQueryString !!}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var IsUseCate = (row.IsUseCate === 'Y') ? '' : '<span class="red">(미사용)</span>';
                            return row.CateName + IsUseCate;
                        }},
                    {'data' : 'MockPartName', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return data.join('<br>');
                        }},
                    {'data' : 'MockYear', 'class': 'text-center'},
                    {'data' : 'MockRotationNo', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '[' + row.ProdCode + '] ' + row.ProdName;
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.RealSalePrice + '원<br><span style="text-decoration:line-through">' + row.SalePrice + '원</span>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.SaleStartDate + ' ~ ' + row.SaleEndDate;
                        }},
                    {'data' : 'AcceptStatusCcd_Name', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.TakeStartDate + ' ~ ' + row.TakeEndDate;
                        }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-list-qna" data-idx="' + row.ProdCode + '"><u class="blue">' + data.qnaUnAnsweredCnt+'/'+data.qnaTotalCnt + '</u></a>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-list-notice" data-idx="' + row.ProdCode + '"><u class="blue">' + data.noticeCnt + '</u></a>';
                        }},
                ]
            });

            //이의제기 목록
            $list_table.on('click', '.btn-list-qna', function() {
                location.href='{{ site_url("/board/mocktest/qna/detailList") }}/' + dtParamsToQueryString($datatable) + '&bm_idx=95&prod_code=' + $(this).data('idx');
            });

            //정오표 목록
            $list_table.on('click', '.btn-list-notice', function() {
                location.href='{{ site_url("/board/mocktest/notice/detailList") }}/' + dtParamsToQueryString($datatable) + '&bm_idx=96&prod_code=' + $(this).data('idx');
            });
        });
    </script>
@stop
