@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 운영자패키지 상품 정보를 관리하는 메뉴입니다.(운영자패키지 : 운영자가 구성한 강좌를 할인을 적용한 패키지)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', false, $arr_site_code) !!}
                        <select class="form-control mr-10" id="search_lg_cate_code" name="search_lg_cate_code">
                            <option value="">대분류</option>
                            @foreach($arr_lg_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_md_cate_code" name="search_md_cate_code">
                            <option value="">중분류</option>
                            @foreach($arr_md_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select name="search_schoolyear" id="search_schoolyear" class="form-control" title="대비학년도">
                            <option value="">대비학년도</option>
                            @for($i=(date('Y')+2); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select class="form-control" id="search_packtype_ccd" name="search_packtype_ccd">
                            <option value="">패키지유형</option>
                            @foreach($Packtype_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_sales_ccd" name="search_sales_ccd">
                            <option value="">판매여부</option>
                            @foreach($Sales_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                        <select class="form-control" id="search_is_disp" name="search_is_disp" title="노출여부">
                            <option value="">노출여부</option>
                            <option value="Y">노출</option>
                            <option value="N">숨김</option>
                        </select>
                        <select class="form-control" id="search_calc" name="search_calc">
                            <option value="">정산입력여부</option>
                            <option value="Y">입력</option>
                            <option value="N">미입력</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">패키지검색</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_opt" name="search_opt">
                            <option value="prod">패키지</option>
                            <option value="prof">교수명</option>
                        </select>
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                        명칭, 코드 검색 가능
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">신규/추천</label>
                    <div class="col-md-5 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" name="search_new" id="search_new" class="flat" value="Y"> 신규
                        </div>
                        &nbsp;
                        <div class="checkbox">
                            <input type="checkbox" name="search_best" id="search_best" class="flat" value="Y"> 추천
                        </div>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">등록일</label>
                    <div class="col-md-5 form-inline">
                        <input name="search_sdate"  class="form-control datepicker" id="search_sdate" style="width: 100px;"  type="text"  value="">
                        ~ <input name="search_edate"  class="form-control datepicker" id="search_edate" style="width: 100px;"  type="text"  value="">
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
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>복사<br>선택</th>
                    <th>대분류</th>
                    <th>대비학년도</th>
                    <th width="6%">패키지<BR>유형</th>
                    <th>운영자패키지명</th>
                    <th width="6%">판매가</th>
                    <th>신규</th>
                    <th>추천</th>
                    <th>배수</th>
                    <th>판매여부</th>
                    <th>사용</th>
                    <th>노출</th>
                    <th>정산입력</th>
                    <!--
                    <th width="5%">장바구니</th>
                    <th width="5%">입금대기</th>
                    <th width="5%">결제완료</th>
                    //-->
                    <th width="5%">등록자</th>
                    <th  width="8%">등록일</th>
                    <th>정렬</th>
                    <th>복사</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {

            $datatable = $list_table.DataTable({
                serverSide: true,
                //"lengthMenu": [20, 50, 100 ],
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 엑셀 다운로드', className: 'btn-sm btn-info border-radius-reset mr-15 btn-excel'}
                    ,{ text: '<i class="fa fa-pencil mr-5"></i> 정렬순서 적용', className: 'btn-sm btn-success border-radius-reset mr-15 btn-order-modify'}
                    ,{ text: '<i class="fa fa-pencil mr-5"></i> 신규/추천/사용 적용', className: 'btn-sm btn-success border-radius-reset mr-15 btn-new-best-modify'}
                    ,{ text: '<i class="fa fa-copy mr-5"></i> 운영자패키지복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy'}
                    ,{ text: '<i class="fa fa-pencil mr-5"></i> 운영자패키지등록', className: 'btn-sm btn-primary border-radius-reset btn-reorder',action : function(e, dt, node, config) {
                            {{-- 권한 체크 --}}
                            {!! check_menu_perm_inner_script('write') !!}
                            location.href = '{{ site_url('product/on/packageAdmin/create') }}';
                        }
                    }
                ],

                ajax: {
                    'url' : '{{ site_url('/product/on/packageAdmin/listAjax') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                }
                ,
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat"  name="copyProdCode" value="'+row.ProdCode+'">';
                        }},

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.CateName;
                        }},
                    {'data' : 'SchoolYear'},//대비학년도
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.PackTypeCcd_Name.replace('패키지','');
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+row.ProdCode+ '] <a href="#" class="btn-modify" data-idx="' + row.ProdCode + '"><u>' + row.ProdName + '</u></a> ';
                        }},//패키지명
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                        }},
                    {'data' : 'IsNew', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="is_new" value="Y" data-idx="'+ row.ProdCode +'" data-origin-is-new="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                        }},
                    {'data' : 'IsBest', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="is_best" value="Y" data-idx="'+ row.ProdCode +'" data-origin-is-best="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                        }},
                    {'data' : 'MultipleApply', 'render' : function(data, type, row, meta) {
                            return (data === '1') ? '배수제한없음' : data;
                        }},//배수
                    {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                            return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                        }},//판매여부
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" class="flat" name="is_use" value="Y" data-idx="'+ row.ProdCode +'" data-origin-is-use="' + data + '" ' + ((data === 'Y') ? ' checked="checked"' : '') + '>';
                        }},//사용여부
                    {'data' : 'IsDisp', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                        }},//노출여부
                    {'data' : 'DivisionCount','render' : function(data, type, row, meta) {
                            return (data !== '0') ? '입력' : '<span class="red">미입력</span>';
                        }},//정산입력
                    {'data' : 'wAdminName'},//등록자
                    {'data' : 'RegDatm'},//등록일
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<input type="text" class="form-control" name="OrderNum[]" data-idx="'+ row.ProdCode +'"  data-origin-order="'+row.OrderNum+'"  value="'+row.OrderNum+'" style="width:30px" maxlength="3">';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return (row.ProdCode_Original !== '') ? '<span class="red">Y</span>' : '';
                        }},//복사여부
                ]
            });

            // 자동 변경
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");

            //강의복사
            $('.btn-copy').on('click',function(){

                {{-- 권한 체크 --}}
                {!! check_menu_perm_inner_script('write') !!}

                if ($('input:radio[name="copyProdCode"]').is(':checked') === false) {
                    alert('복사할 강좌를 선택해 주세요.');
                    return false;
                }

                if(confirm("해당 강좌를 복사하시겠습니까?")) {
                    var data = {
                        '{{ csrf_token_name() }}': $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                        '_method': 'PUT',
                        'prodCode': $('input:radio[name="copyProdCode"]:checked').val()
                    };

                    sendAjax('{{ site_url('/product/on/packageAdmin/copy') }}', data, function (ret) {
                        if (ret.ret_cd) {
                            //notifyAlert('success', '알림', ret.ret_msg);
                            alert(ret.ret_msg);
                            $datatable.draw();
                        }
                    }, showError, false, 'POST');
                }
            });

            // 신규, 추천, 사용 상태 변경
            $('.btn-new-best-modify').on('click', function() {

                {{-- 권한 체크 --}}
                {!! check_menu_perm_inner_script('write') !!}

                if (!confirm('신규/추천/사용 상태를 적용하시겠습니까?')) {
                    return;
                }

                var $is_new = $list_table.find('input[name="is_new"]');
                var $is_best = $list_table.find('input[name="is_best"]');
                var $is_use = $list_table.find('input[name="is_use"]');
                var $params = {};
                var origin_val, this_val, this_new_val, this_best_val, this_use_val;

                $is_new.each(function(idx) {
                    // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                    this_new_val = $(this).filter(':checked').val() || 'N';
                    this_best_val = $is_best.eq(idx).filter(':checked').val() || 'N';
                    this_use_val =  $is_use.eq(idx).filter(':checked').val() || 'N';
                    this_val = this_new_val + ':' + this_best_val + ':' + this_use_val;
                    origin_val = $(this).data('origin-is-new') + ':' + $is_best.eq(idx).data('origin-is-best') + ':' + $is_use.eq(idx).data('origin-is-use');
                    if (this_val !== origin_val) {
                        $params[$(this).data('idx')] = { 'IsNew' : this_new_val, 'IsBest' : this_best_val, 'IsUse' : this_use_val };
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };

                sendAjax('{{ site_url('/product/on/packageAdmin/redata') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 정렬순서 변경
            $('.btn-order-modify').on('click', function() {

                {{-- 권한 체크 --}}
                {!! check_menu_perm_inner_script('write') !!}

                if (!confirm('정렬순서를 적용하시겠습니까?')) {
                    return;
                }
                var $params = {};
                $list_table.find('input[name="OrderNum[]"]').each(function() {
                    if($(this).val() != $(this).data('origin-order')) {
                        $params[$(this).data('idx')] = $(this).val();
                    }
                });
                if (Object.keys($params).length < 1) {
                    alert('변경된 내용이 없습니다.');
                    return;
                }
                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/product/on/packageAdmin/reorder') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/product/on/packageAdmin/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });

            // 엑셀 다운로드
            $('.btn-excel').on('click', function() {
                {{-- 권한 체크 --}}
                {!! check_menu_perm_inner_script('excel') !!}

                if(confirm("엑셀파일을 다운로드 하시겠습니까?")) {
                    formCreateSubmit('{{ site_url('/product/on/packageAdmin/listExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
