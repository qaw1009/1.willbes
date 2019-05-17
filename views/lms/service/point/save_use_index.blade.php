@extends('lcms.layouts.master')

@section('content')
    <h5>- 회원 기준 포인트적립/차감 현황 확인 및 등록이 가능합니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group no-border-bottom">
                    <label class="control-label col-md-1" for="search_mem_id">회원검색</label>
                    <div class="col-md-8 form-inline">
                        <input type="text" id="search_mem_id" name="search_mem_id" class="form-control" title="회원검색어" value="">
                        <button type="button" name="btn_member_search" data-result-type="single" class="btn btn-primary mb-0 ml-5">회원검색</button>
                        <p class="form-control-static ml-20">이름, 아이디, 휴대폰번호 검색 가능</p>
                        <input type="hidden" id="mem_idx" name="mem_idx" value="" data-result-data=""/>
                    </div>
                    <div class="col-md-3 pr-0 text-right">
                        <button type="button" class="btn btn-success mb-0 mr-0 btn-search-regist"><i class="fa fa-pencil mr-5"></i> 적립/차감일괄등록</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel search-results hide">
        <div class="x_content">
            <h4><strong>· 회원정보</strong></h4>
            <table id="list_mem_table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>회원번호</th>
                        <th>회원가입일</th>
                        <th>회원명 (성별)</th>
                        <th>아이디</th>
                        <th>휴대폰번호 (수신여부)</th>
                        <th>E-mail주소 (수신여부)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row search-results hide">
        <div class="col-md-12">
            <ul class="nav nav-tabs bar_tabs mb-0 tabs-point-type" role="tablist">
                <li role="presentation" class="active"><a href="#none" role="tab" data-toggle="tab" data-point-type="lecture" class="bold">강좌포인트</a></li>
                <li role="presentation"><a href="#none" role="tab" data-toggle="tab" data-point-type="book">교재포인트</a></li>
            </ul>
        </div>
    </div>
    <div class="x_panel no-border-top search-results hide">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th>No</th>
                    <th>운영사이트</th>
                    <th>주문번호</th>
                    <th>유효기간</th>
                    <th>상태</th>
                    <th>적립/차감액</th>
                    <th>적립/차감일</th>
                    <th>등록자</th>
                    <th>적립/차감사유</th>
                </tr>
                <tr>
                    <td colspan="10" class="text-center">
                        <h4 class="inline-block pr-20 no-margin">[유효포인트] <span id="valid_save_point" class="blue">0P</span></h4>
                        <h4 class="inline-block pl-20 no-margin">[당월소멸예정포인트] <span id="expire_save_point" class="red">0P</span></h4>
                    </td>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');
        var point_type = 'lecture';

        $(document).ready(function() {
            // 적립/차감 포인트 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message btn-target-crm-member' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-sms btn-target-crm-member' },
                    { text: '<i class="fa fa-pencil mr-5"></i> 적립/차감바로등록', className: 'btn-sm btn-success border-radius-reset btn-direct-regist' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/point/saveUse/listAjax/') }}' + point_type,
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'SiteName'},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return data != null ? '<a href="{{ site_url('/pay/order/show/') }}' + row.OrderIdx + '" target="_blank"><u class="blue">' + data + '</u></a>' : '';
                    }},
                    {'data' : 'ExpireDatm', 'render' : function(data, type, row, meta) {
                        return data != null ? row.RegDatm.substr(0, 16) + ' ~ ' + data.substr(0, 16) : '';
                    }},
                    {'data' : 'PointStatusCcdName', 'render' : function(data, type, row, meta) {
                        return row.PointStatusCcd === 'U' ? '<div class="inline-block red">' + data + '</div>' : '<div class="inline-block blue">' + data + '</div>';
                    }},
                    {'data' : 'PointAmt', 'render' : function(data, type, row, meta) {
                        return row.PointStatusCcd === 'U' ? '<div class="inline-block red">-' + addComma(data) + '</div>' : '<div class="inline-block blue">+' + addComma(data) + '</div>';
                    }},
                    {'data' : 'RegDatm'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'ReasonCcdName'}
                ]
            });

            // 조회된 회원의 유효포인트, 당월소멸예정포인트 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#valid_save_point').html(addComma(json.valid_save_point) + 'P');
                $('#expire_save_point').html(addComma(json.expire_save_point) + 'P');
            });

            // 회원선택 이벤트
            $search_form.on('change', 'input[name="mem_idx"]', function() {
                $('.search-results').removeClass('hide');

                // 회원정보 셋팅
                var mem_data = $(this).data('result-data');
                var $mem_table_td = $('#list_mem_table tbody tr td');

                $mem_table_td.eq(0).html(mem_data.MemIdx + ' (' + mem_data.SiteName + ')');
                $mem_table_td.eq(1).html(mem_data.JoinDate);
                $mem_table_td.eq(2).html(mem_data.MemName + ' (' + (mem_data.Sex === 'M' ? '남' : '여') + ')');
                $mem_table_td.eq(3).html(mem_data.MemId);
                $mem_table_td.eq(4).html(mem_data.Phone + ' (' + mem_data.SmsRcvStatus + ')');
                $mem_table_td.eq(5).html(mem_data.Mail + ' (' + mem_data.MailRcvStatus + ')');

                $('.btn-target-crm-member').data('mem-idx', mem_data.MemIdx);
                $search_form.find('input[name="search_mem_id"]').val('');

                // 포인트 목록
                $datatable.draw();
            });

            // 강좌/교재 포인트 탭 클릭
            $('.tabs-point-type').on('click', 'li > a', function() {
                // 탭 bold 처리
                $('.tabs-point-type li > a').removeClass('bold');
                $(this).addClass('bold');

                // datatable reload
                point_type = $(this).data('point-type');
                $datatable.ajax.url('{{ site_url('/service/point/saveUse/listAjax/') }}' + point_type).load();
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/service/point/saveUse/excel/') }}' + point_type, $search_form.serializeArray(), 'POST');
                }
            });

            // 적립/차감일괄등록, 바로등록 버튼 클릭
            $('.btn-search-regist, .btn-direct-regist').on('click', function() {
                var reg_type = $(this).prop('class').indexOf('direct') > -1 ? 'direct' : 'search';
                var mem_idx = $search_form.find('input[name="mem_idx"]').val();

                if (reg_type === 'direct') {
                    if (mem_idx.trim().length < 1) {
                        alert('먼저 회원검색을 해 주세요.');
                        return;
                    }
                } else {
                    mem_idx = '';
                }

                $('.btn-' + reg_type + '-regist').setLayer({
                    'url': '/service/point/saveUse/create?mem_idx=' + mem_idx,
                    'width': 900
                });
            });
        });
    </script>
@stop
