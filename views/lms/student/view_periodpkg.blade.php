@extends('lcms.layouts.master')

@section('content')
    <h5>- 기간제패키지 수강생(결제완료자) 현황을 확인할 수 있습니다.</h5>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>운영사이트</th>
                    <th>대분류</th>
                    <th>대비학년도</th>
                    <th>패키지유형</th>
                    <th>수강기간</th>
                    <th>강좌명</th>
                    <th>진행상태</th>
                    <th>판매가</th>
                    <th>배수</th>
                    <th>판매여부</th>
                    <th>사용여부</th>
                    <th>수강생현황</th>
                </tr>
                <tr>
                    <td>{{$lec['SiteName']}}</td>
                    <td>{{$lec['CateName_Parent']}}</td>
                    <td>{{$lec['SchoolYear']}}</td>
                    <td>{{$lec['PackTypeCcd_Name']}}</td>
                    <td>{{$lec['PackStudyPeriod_Name']}}</td>
                    <td>{{$lec['ProdName']}}</td>
                    <td>{{$lec['wProgressCcd_Name']}}<BR>({{$lec['wUnitCnt']}}/{{$lec['wUnitLectureCnt']}})</td>
                    <td>{{number_format($lec['RealSalePrice'], 0)}}원<BR><strike>{{number_format($lec['SalePrice'], 0)}}원</strike></td>
                    <td>{{$lec['MultipleApply'] == 1 ? '무제한' : $lec['MultipleApply'].'배'}}</td>
                    <td>{{$lec['SaleStatusCcd_Name']}}</td>
                    <td>{{$lec['IsUse']}}</td>
                    <td>{{$lec['Count']}}명</td>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <form class="form-horizontal" id="search_form_view" name="search_form_view" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="ProdCode" value="{{$lec['ProdCode']}}" />
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">강좌기본정보</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_pay_type_ccd" name="search_pay_type_ccd">
                            <option value="">상품구분</option>
                            @foreach($arr_pay_type_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_route_ccd" name="search_pay_route_ccd">
                            <option value="">결제루트</option>
                            @foreach($arr_pay_route_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_method_ccd" name="search_pay_method_ccd">
                            <option value="">결제수단</option>
                            @foreach($arr_pay_method_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일</label>
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
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date active" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-days">오늘</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">회원통합검색</label>
                    <div class="col-md-3 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width:250px;">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1">조건검색</label>
                    <div class="col-md-5">
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="SmsRcv" name="SmsRcv" value="Y">
                            휴대폰수신동의회원
                        </label>
                        <label class="input-label">
                            <input type="checkbox" class="flat" id="MailRcv" name="MailRcv" value="Y">
                            이메일수신동의회원
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
                <button class="btn btn-primary" type="button" id="btn_list">목록으로</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>선택</th>
                    <th>No.</th>
                    <th>회원번호</th>
                    <th>회원명(아이디)</th>
                    <th>상품구분</th>
                    <th>주문번호</th>
                    <th>결제루트</th>
                    <th>결제수단</th>
                    <th>결제금액</th>
                    <th>결제자</th>
                    <th>결제일</th>
                    <td>수강종료일</td>
                    <th>휴대폰정보</th>
                    <th>E-mail정보</th>
                    <th>자동로그인</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form_view');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-envelope-o mr-5"></i> 메일발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-mail' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/student/'.$lecType.'/viewAjax/') }}'
                    ,'type' : 'post'
                    ,'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'MemIdx', 'render' : function(data, type, row, meta) {
                            return '<input type="checkbox" name="selectMember" class="flat target-crm-member" value="' + data + '" data-mem-idx="' + data + '">';
                        }}, // 체크박스
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }}, // 번호
                    {'data' : 'MemIdx'}, // 회원번호
                    {'data' : 'MemIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="{{site_url('/member/manage/detail/')}}'+data+'" target="_blank"><u>'+row.MemId + '(' + row.MemName + ')'+'</u></a>';
                        }}, //회원명(아이디)
                    {'data' : 'SalePatternCcd_Name'},//상품구분
                    {'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="{{site_url('/pay/order/show/')}}'+data+'" target="_blank"><u>'+data+'</u></a>';
                        }},// 주문번호
                    {'data' : 'PayRouteCcd_Name'},// 결제루트
                    {'data' : 'PayMethodCcd_Name'}, // 결제수단
                    {'data' : 'Price', 'render' : function(data, type, row, meta) {
                            return addComma(row.Price)+'원';
                        }},//결제금액

                    {'data' : 'AdminName', 'render' : function(data, type, row, meta) {
                            return (data == '') ? row.MemName : data;
                        }},//결제자

                    {'data' : 'PayDate'}, // 결제일
                    {'data' : 'EndDate'}, // 종료일
                    {'data' : 'Phone'},// 휴대폰
                    {'data' : 'Mail'},//이메일
                    {'data' : 'MemIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="{{site_url('/member/manage/setMemberLogin/')}}'+data+'/" target="_blank">[자동로그인]</a>';
                        }} //자동로그인
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/student/'.$lecType.'/excel/') }}', $search_form.serializeArray(), 'POST');
                }
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/student/periodpkg/') }}' + getQueryString());
            });
        });
    </script>
@stop
