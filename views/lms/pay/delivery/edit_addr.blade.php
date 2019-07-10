@extends('lcms.layouts.master_modal')

@section('layer_title')
    배송지수정
@stop

@section('layer_header')
    <form class="form-horizontal" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <input type="hidden" name="order_idx" value="{{ $order_idx }}"/>
        <input type="hidden" name="receiver" value="{{ $data['order']['Receiver'] }}"/>
@endsection

@section('layer_content')
    <div class="row">
        <div class="col-md-12">
            <p class="pl-5"><i class="fa fa-check-square-o"></i> 배송지 수정</p>
        </div>
        <div class="form-group no-border-bottom">
            <div class="col-md-12 form-inline item">
                <input type="text" id="zipcode" name="zipcode" class="form-control" value="{{ $data['order']['ZipCode'] }}" title="우편번호" required="required" readonly="readonly" maxlength="6">
                <button type="button" id="btn_post_search" onclick="searchPost('post_search', 'zipcode', 'addr1', 'N');" class="btn btn-primary mb-0">주소찾기</button>
                <div id="post_search" style="max-height: 286px; border:1px solid black; display: none;">
                    <div class="panel panel-primary mt-10 mb-0">
                        <div class="panel-heading">우편번호 검색
                            <div class="pull-right"><button type="button" class="close" onclick="closeSearchPost('post_search');"><span aria-hidden="true">×</span></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="col-md-8 pl-0 item">
                    <input type="text" id="addr1" name="addr1" class="form-control" value="{{ $data['order']['Addr1'] }}" title="기본주소" required="required" readonly="readonly" placeholder="기본주소">
                </div>
                <div class="col-md-8 pl-0 mt-5 item">
                    <input type="text" id="addr2" name="addr2" class="form-control" value="{{ $data['order']['Addr2'] }}" title="상세주소" required="required" placeholder="상세주소">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-20">
        <div class="col-md-12">
            <p class="pl-5"><i class="fa fa-check-square-o"></i> 주문정보</p>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <colgroup>
                    <col width="15%"/>
                    <col width="15%"/>
                    <col/>
                    <col width="15%"/>
                </colgroup>
                <thead>
                    <tr class="bg-odd">
                        <th>회원정보</th>
                        <th>결제완료일</th>
                        <th>상품명</th>
                        <th>수령인정보</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['order_prod'] as $idx => $row)
                    <tr>
                        @if($idx == 0)
                            <td rowspan="{{ $data['order_cnt'] }}">{{ $row['MemName'] }}({{ $row['MemId'] }})<br/>{{ $row['MemPhone'] }}</td>
                            <td rowspan="{{ $data['order_cnt'] }}">{{ $row['CompleteDatm'] }}</td>
                        @endif
                        <td><span class="blue no-line-height">[{{ $row['ProdTypeCcdName'] }}]</span> {{ $row['ProdName'] }}</td>
                        @if($idx == 0)
                            <td rowspan="{{ $data['order_cnt'] }}">{{ $row['Receiver'] }}<br/>{{ $row['ReceiverPhone'] }}</td>
                        @endif
                    </tr>
                @endforeach
                <tr>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $_regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 배송지주소 버튼 클릭
            $_regi_form.on('click', 'button[name="_btn_addr_modify"]', function() {
                var _url = '{{ site_url('/pay/delivery/modifyAddr') }}';
                ajaxSubmit($_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        $datatable.draw();
                    }
                }, showValidateError, function() {
                    return confirm('수정하시겠습니까?');
                }, false, 'alert');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="button" name="_btn_addr_modify" class="btn btn-success">수정</button>
@endsection

@section('layer_footer')
    </form>
@endsection