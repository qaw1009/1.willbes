@extends('lcms.layouts.master_modal')

@section('layer_title')
    선택강좌 수강생 보기
@stop

@section('layer_header')
    <form class="form-horizontal" id="search_form_student" name="search_form_student" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($ProdCode as $key => $data)
            <input type="hidden" id="ProdCode" name="ProdCode[]" value="{{$data}}" />
        @endforeach
        @endsection

        @section('layer_content')

            <div class="form-group form-group-sm mb-0">
                <p class="form-control-static"><span class="required">*</span> 선택한 강좌의 수강생 목록 입니다. </p>
            </div>
            <div class="x_panel mt-10">
                <div class="x_content">
                    • 3/16(월) 기준으로 ‘환불완료’ 수강생이 추가되었습니다. 실수강생은 결제상태가 ‘결제완료’인 정보만 해당됩니다.
                    <table id="list_table_layer" class="table table-bordered">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="all_check2" /> 선택</th>
                            <th>No.</th>
                            <th>회원번호</th>
                            <th>회원명(아이디)</th>
                            <th>상품구분</th>
                            <th>강좌명</th>
                            <th>선택강좌</th>
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
                var $datatable_layer;
                var $search_form_layer = $('#search_form_student');
                var $list_table_layer = $('#list_table_layer');

                $(document).ready(function() {
                    $datatable_layer = $list_table_layer.DataTable({
                        serverSide: true,
                        pageLength : 20,
                        pagingType : 'simple_numbers',
                        buttons: [
                            { text: '<i class="fa fa-file-excel-o mr-5"></i> 수강생 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel-layer' }
                        ],
                        ajax: {
                            'url' : '{{ site_url('/student/adminpkg/viewAjax/') }}'
                            ,'type' : 'post'
                            ,'data' : function(data) {
                                return $search_form_layer.formSerialize()+'&start='+data.start+'&length='+data.length;
                                return $.extend(arrToJson($search_form_layer.serializeArray()), { 'start' : data.start, 'length' : data.length});
                            }
                        },
                        createdRow: function(row, data, index){
                            if(data.PayStatusCcd == '676006'){
                                $(row).css('background-color','pink');
                            }
                        },
                        columns: [
                            {'data' : 'OrderProdIdx', 'render' : function(data, type, row, meta) {
                                    return '<input type="checkbox" name="selectOrderProdIdx[]" class="selectOrderProdIdx" value="' + data + '" data-order-idx="' + data + '">';
                                }}, // 체크박스
                            {'data' : null, 'render' : function(data, type, row, meta) {
                                    return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                                }}, // 번호
                            {'data' : 'MemIdx'}, // 회원번호
                            {'data' : 'MemIdx', 'render' : function(data, type, row, meta) {
                                    return '<a href="{{site_url('/member/manage/detail/')}}'+data+'" target="_blank"><u>'+row.MemId + '(' + row.MemName + ')'+'</u></a>';
                                }}, //회원명(아이디)
                            {'data' : 'SalePatternCcd_Name'},//상품구분
                            {'data' : 'ProdName'}, // 선택강좌
                            {'data' : 'OrderSubProdData'}, // 선택강좌
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
                    $('.btn-excel-layer').on('click', function(event) {

                        event.preventDefault();
                        if (confirm('엑셀다운로드 하시겠습니까?')) {
                            formCreateSubmit('{{ site_url('/student/adminpkg/excel/') }}', $search_form_layer.serializeArray(), 'POST');
                        }
                    });

                    $("#all_check2").on('change', function(event) {
                        $(".selectOrderProdIdx").prop('checked', $("#all_check2").prop("checked"));
                    });

                });
            </script>
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
    </form>
@endsection