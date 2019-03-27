@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 상품정보를 등록하고 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}
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
                            <option value="1">접수대기</option>
                            <option value="2">접수중</option>
                        </select>
                        <!--select class="form-control mr-5" id="search_TakeType" name="search_TakeType">
                            <option value="">응시기간</option>
                            <option value="A">상시</option>
                            <option value="L">기간제한</option>
                        </select//-->
                        <select class="form-control mr-5" id="search_use" name="search_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭, 코드 검색 가능
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="mt-20">* 접수현황 : 결제대기, 결제완료, 환불완료 인원의 총합</div>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th rowspan="2" class="text-center">선택</th>
                        <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center">카테고리</th>
                        <th rowspan="2" class="text-center">직렬</th>
                        <th rowspan="2" class="text-center">연도</th>
                        <th rowspan="2" class="text-center">회차</th>
                        <th rowspan="2" class="text-center">모의고사명</th>
                        <th rowspan="2" class="text-center">판매가</th>
                        <th rowspan="2" class="text-center">접수기간</th>
                        <th colspan="2" class="text-center">응시형태</th>
                        <th colspan="2" class="text-center">접수현황</th>
                        <th colspan="2" class="text-center">응시현황</th>
                        <th rowspan="2" class="text-center">접수상태</th>
                        <th rowspan="2" class="text-center">응시기간</th>
                        <th rowspan="2" class="text-center">사용여부</th>
                        <th rowspan="2" class="text-center">등록자</th>
                        <th rowspan="2" class="text-center">등록일</th>
                    </tr>
                    <tr>
                        <th class="text-center">Online</th>
                        <th class="text-center">Off</th>
                        <th class="text-center">Online</th>
                        <th class="text-center">Off</th>
                        <th class="text-center">Online</th>
                        <th class="text-center">Off</th>
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
                buttons: [
                    { text: '<i class="fa fa-copy mr-5"></i> 복사', className: 'btn btn-sm btn-primary mr-15 act-copy', action: copyAreaData },
                    { text: '<i class="fa fa-pencil mr-5"></i> 모의고사 등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/mocktest/regGoods/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktest/regGoods/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat" name="target" value="' + row.ProdCode + '">';
                        }},
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
                            return '<span class="blue underline-link act-edit">[' + row.ProdCode + '] ' + row.ProdName + '</span>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.RealSalePrice + '원<br><span style="text-decoration:line-through">' + row.SalePrice + '원</span>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.SaleStartDatm.substr(0,10) + ' ~ ' + row.SaleEndDatm.substr(0,10);
                        }},
                    {'data' : 'TakePart_on', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                        }},
                    {'data' : 'TakePart_off', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                        }},
                    {'data' : 'OnlineRegCnt', 'class': 'text-center'},
                    {'data' : 'OfflineRegCnt', 'class': 'text-center'},
                    {'data' : 'OnlineCnt', 'class': 'text-center'},
                    {'data' : 'OfflineCnt', 'class': 'text-center'},
                    {'data' : 'AcceptStatusCcd_Name', 'class': 'text-center'},
                    {'data' : 'TakeType', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'A') ? '상시' : '기간제한';
                        }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                    //{'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                    //        return '<span class="blue underline-link act-fake"><input type="hidden" class="flat" name="prod" value="'+ row.ProdCode + '">' + row.RegDatm + '</span>';
                    //    }}
                ]
            });

            // 수정으로 이동
            $list_form.on('click', '.act-edit', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/mocktest/regGoods/edit/') }}' + $(this).closest('tr').find('[name=target]').val() + query;
            });

            // 짝퉁데이터 생성으로 이동
            $list_form.on('click', '.act-fake', function () {
                var query = dtParamsToQueryString($datatable);

                location.href = '{{ site_url('/mocktest/regGoods/fakeCreate/') }}' + $(this).closest('tr').find('[name=prod]').val() + query;
            });

            // 복사
            function copyAreaData() {
                if( !$list_form.find('[name="target"]:checked').val() ) { alert('복사할 모의고사를 선택해 주세요.'); return false; }
                if (!confirm("복사하시겠습니까?")) return false;

                var _url = '{{ site_url('/mocktest/regGoods/copyData') }}';
                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'idx': $list_form.find('[name="target"]:checked').val()
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regGoods/edit/') }}' + ret.ret_data.dt.idx + dtParamsToQueryString($datatable));
                    }
                }, showValidateError, false, 'POST');
            }
        });
    </script>
@stop
