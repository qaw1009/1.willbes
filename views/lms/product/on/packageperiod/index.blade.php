@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 기간제패키지 상품 정보를 관리하는 메뉴입니다.(기간제패키지 : 운영자가 구성한 강좌를 할인 적용하여 프리패스 형태로 제공)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_lg_cate_code" name="search_lg_cate_code">
                            <option value="">대분류</option>
                            @foreach($arr_lg_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10 hide" id="search_md_cate_code" name="search_md_cate_code">
                            <option value="">중분류</option>
                            @foreach($arr_md_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select name="search_schoolyear" id="search_schoolyear" class="form-control" title="대비학년도">
                            <option value="">대비학년도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
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
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">패키지검색</label>
                    <div class="col-md-3 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-3" for="search_is_use">등록일</label>
                    <div class="col-md-3 form-inline">
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
                    <th width="4%">복사<br>선택</th>
                    <th width="8%">대분류</th>
                    <th width="5%">대비<br>학년도</th>
                    <th width="6%">패키지<BR>유형</th>
                    <th width="6%">수강기간</th>
                    <th>기간제패키지명</th>
                    <th width="6%">판매가</th>
                    <th width="5%">배수</th>
                    <th width="5%">판매여부</th>
                    <th width="5%">사용여부</th>
                    <!--
                    <th width="5%">장바구니</th>
                    <th width="5%">입금대기</th>
                    <th width="5%">결제완료</th>
                    //-->
                    <th width="5%">등록자</th>
                    <th  width="8%">등록일</th>
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

                buttons: [
                    { text: '<i class="fa fa-copy mr-5"></i> 기간제패키지복사', className: 'btn-sm btn-success border-radius-reset mr-15 btn-copy'}
                    ,{ text: '<i class="fa fa-pencil mr-5"></i> 기간제패키지등록', className: 'btn-sm btn-primary border-radius-reset btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('product/on/packagePeriod/create') }}';
                        }
                    }
                ],

                ajax: {
                    'url' : '{{ site_url('/product/on/packagePeriod/listAjax') }}'
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

                    {'data' : 'StudyPeriod_Name'},//수강기간
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '['+row.ProdCode+ '] <a href="#" class="btn-modify" data-idx="' + row.ProdCode + '"><u>' + row.ProdName + '</u></a> ';
                        }},//패키지명

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return addComma(row.RealSalePrice)+'원<BR><strike>'+addComma(row.SalePrice)+'원</strike>';
                        }},

                    {'data' : 'MultipleApply', 'render' : function(data, type, row, meta) {
                            return (data === '1') ? '배수제한없음' : data;
                        }},//배수
                    {'data' : 'SaleStatusCcd_Name', 'render' : function(data, type, row, meta) {
                            return (data !== '판매불가') ? data : '<span class="red">'+data+'</span>';
                        }},//판매여부
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},//사용여부
                    /*
                    {'data' : 'CartCnt'},//장바구니
                    {'data' : 'PayIngCnt'},//입금대기
                    {'data' : 'PayEndCnt'},//결제완료
                    */
                    {'data' : 'wAdminName'},//등록자
                    {'data' : 'RegDatm'},//등록일
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

                    sendAjax('{{ site_url('/product/on/packagePeriod/copy') }}', data, function (ret) {
                        if (ret.ret_cd) {
                            //notifyAlert('success', '알림', ret.ret_msg);
                            alert(ret.ret_msg);
                            $datatable.draw();
                        }
                    }, showError, false, 'POST');
                }

            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.replace('{{ site_url('/product/on/packagePeriod/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });

        });
    </script>
@stop
