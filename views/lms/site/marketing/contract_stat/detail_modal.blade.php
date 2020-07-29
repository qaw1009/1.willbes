@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "광고세부통계" }}
@stop

@section('layer_header')
        @endsection

        @section('layer_content')

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2 form-control-static" for="ContIdx">계약명</label>
                <div class="col-md-10 form-control-static">
                    [{{$contract_data['ContIdx']}}] {{$contract_data['ContName']}}
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2 form-control-static" for="GwName">계약기간</label>
                <div class="col-md-4 form-control-static">
                    {{$contract_data['StartDate']}} ~ {{$contract_data['EndDate']}}
                </div>
                <label class="control-label col-md-2 form-control-static" for="ExecutePrice">집행금액</label>
                <div class="col-md-4 form-control-static">
                    {{ number_format($contract_data['ExecutePrice']) }} 원
                </div>
            </div>
            <div class="form-group form-group-sm item">

                <table id="list_ajax_table" class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center" width="">광고명</th>
                        <th class="text-center" width="120">광고형태</th>
                        <th class="text-center" width="80">개별집행금액</th>
                        <th class="text-center" width="80">접속수</th>
                        <th class="text-center" width="80">회원가입수</th>
                        <th class="text-center" width="80">장바구니수</th>
                        <th class="text-center" width="80">결제건수</th>
                        <th class="text-center" width="110">결제금액</th>
                        <th class="text-center" width="80">환불건수</th>
                        <th class="text-center" width="110">환불금액</th>
                        <th class="text-center" width="130">광고금액효율비</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $sum_gwPrice = 0;
                        $sum_ClickCnt = 0;
                        $sum_MemCnt = 0;
                        $sum_CartCnt = 0;
                        $sum_OrderCnt = 0;
                        $sum_OrderPrice = 0;
                        $sum_RefundCnt = 0;
                        $sum_RefundPrice = 0;
                    @endphp
                    @foreach($gateway_data as $row)
                        <tr>
                            <td class="">{{$row['GwName']}}</td>
                            <td class="text-center">{{$row['GwTypeCcd_Name']}}</td>
                            <td class="text-right"><font color="$006EDD">{{number_format($row['gwPrice'])}}</font> 원</td>
                            <td class="text-right">{{number_format($row['ClickCnt'])}}</td>
                            <td class="text-right">{{number_format($row['MemCnt'])}}</td>
                            <td class="text-right">{{number_format($row['CartCnt'])}}</td>
                            <td class="text-right">{{number_format($row['OrderCnt'])}}</td>
                            <td class="text-right"><font color="red">{{number_format($row['OrderPrice'])}}</font> 원</td>
                            <td class="text-right">{{number_format($row['RefundCnt'])}}</td>
                            <td class="text-right"><font color="blue">{{number_format($row['RefundPrice'])}}</font> 원</td>
                            <td class="text-right">{{ $row['gwPrice'] > 0 ? round($row['OrderPrice']/$row['gwPrice'] * 100) : 0}} %</td>
                        </tr>
                        @php
                            $sum_gwPrice += $row['gwPrice'];
                            $sum_ClickCnt += $row['ClickCnt'];
                            $sum_MemCnt += $row['MemCnt'];
                            $sum_CartCnt += $row['CartCnt'];
                            $sum_OrderCnt += $row['OrderCnt'];
                            $sum_OrderPrice += $row['OrderPrice'];
                            $sum_RefundCnt += $row['RefundCnt'];
                            $sum_RefundPrice += $row['RefundPrice'];
                        @endphp
                    @endforeach
                        <tr >
                            <td colspan="2" class="text-center">합계</td>
                            <th class="text-right"><font color="#D30700">{{number_format($sum_gwPrice)}}</font> 원</th>
                            <th class="text-right">{{number_format($sum_ClickCnt)}}</th>
                            <th class="text-right">{{number_format($sum_MemCnt)}}</th>
                            <th class="text-right">{{number_format($sum_CartCnt)}}</th>
                            <th class="text-right">{{number_format($sum_OrderCnt)}}</th>
                            <th class="text-right"><font color="red">{{number_format($sum_OrderPrice)}}</font> 원</th>
                            <th class="text-right">{{number_format($sum_RefundCnt)}}</th>
                            <th class="text-right"><font color="blue">{{number_format($sum_RefundPrice)}}</font> 원</th>
                            <th class="text-right">{{ $sum_gwPrice > 0 ? round($sum_OrderPrice/$sum_gwPrice * 100) : 0}} %</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                });
            </script>
        @stop

        @section('layer_footer')
@endsection