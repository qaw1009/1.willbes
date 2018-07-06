@extends('lcms.layouts.master')

@section('content')
    <h5>- 임용 선수강좌 정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <div class="x_panel">
            <div class="x_content">

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control" id="search_lectype_ccd" name="search_lectype_ccd">
                            <option value="">선수강좌유형</option>
                            @foreach($BeforeType_ccd as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select class="form-control" id="search_is_dup" name="search_is_dup">
                            <option value="">중복여부</option>
                            <option value="Y">중복불가</option>
                            <option value="N">중복허용</option>
                        </select>
                        &nbsp;
                       <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-6 form-inline">

                        <select class="form-control" id="search_type" name="search_type" style="width:120px;">
                            <option value="tar">대상강좌명</option>
                            <option value="ess">조건강좌명</option>
                        </select>
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
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
                    <th>NO</th>
                    <th>선수강좌유형</th>
                    <th>대상강좌명</th>
                    <th>조건강좌명(필수)</th>
                    <th>조건강좌명(선택)</th>
                    <th>조건</th>
                    <th>중복여부</th>
                    <th>유효기간</th>
                    <th>사용여부</th>
                    <th>신청현황</th>
                    <th>등록자</th>
                    <th>등록일</th>
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

                    { text: '<i class="fa fa-pencil mr-5"></i> 선수강좌등록', className: 'btn-sm btn-primary border-radius-reset btn-reorder',action : function(e, dt, node, config) {
                            location.href = '{{ site_url('product/etc/beforelecture/create') }}';
                        }
                    }
                ],

                ajax: {
                    'url' : '{{ site_url('/product/etc/beforelecture/listAjax') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                }
                ,
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' :'LecType', 'render' : function(data, type, row, meta) {
                            return (data === 'N') ? '일반' : '수강생<BR>전용';
                        }},//
                    {'data' : 'prodname_tar', 'render' : function(data, type, row, meta) {
                            return '<a href="#" class="btn-select" data-idx="' + row.BlIdx + '"><u>' + data + '</u></a>';
                        }},//대상강좌명
                    {'data' : 'prodname_ess'},//필수강좌명
                    {'data' : 'prodname_cho'},//선택강좌명
                    {'data' : 'ConditionType'},
                    {'data' :'IsDup', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '허용' : '<span class="red">불가</span>';
                        }},//단강좌명

                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.ValidPeriodStartDate+'<BR>~'+row.ValidPeriodEndDate+ (row.dateStatus === '' ? '' : '<BR><span class="red">(만료)</span>');
                        }},//

                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},//사용여부

                    {'data' : 'applyCnt', 'render' : function(data, type, row, meta) {
                            return '<a href="#" onclick="javascript:alert(\'주문결제 이후 개발\')">'+data+'</a>';
                        }},//사용여부

                    {'data' : 'wAdminName'},//등록자
                    {'data' : 'RegDatm'}//등록일
                ]

            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                alert("aa");
                location.replace('{{ site_url('/product/etc/beforelecture/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop
