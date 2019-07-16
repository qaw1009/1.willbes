@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "광고세부통계" }}
@stop

@section('layer_header')
        @endsection

        @section('layer_content')

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="ContIdx">계약명</label>
                <div class="col-md-10">
                    <p class="form-control-static">[{{$contract_data['ContIdx']}}] {{$contract_data['ContName']}}</p>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" for="GwName">계약기간</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{$contract_data['StartDate']}} ~ {{$contract_data['EndDate']}}</p>
                </div>
                <label class="control-label col-md-2" for="ExecutePrice">집행금액 <span class="required">*</span></label>
                <div class="col-md-4" >
                    <p class="form-control-static">{{ number_format($contract_data['ExecutePrice']) }} 원</p>
                </div>
            </div>
            <div class="form-group form-group-sm item">

                <table id="list_ajax_table" class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <td width="">광고명</td>
                        <td width="120">광고형태</td>
                        <td width="130">개별집행금액</td>
                        <td width="100">접속수</td>
                        <td width="100">회원가입수</td>
                        <td width="100">장바구니수</td>
                        <td width="100">결제건수</td>
                        <td width="130">결제금액</td>
                        <td width="130">광고효율비</td>
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
                    @endphp
                    @foreach($gateway_data as $row)
                        <tr>
                            <th class="text-center">{{$row['GwName']}}</th>
                            <th class="text-center">{{$row['GwTypeCcd_Name']}}</th>
                            <th class="text-right"><font color="$006EDD">{{number_format($row['gwPrice'])}}</font> 원</th>
                            <th class="text-right">{{number_format($row['ClickCnt'])}}</th>
                            <th class="text-right">{{number_format($row['MemCnt'])}}</th>
                            <th class="text-right">{{number_format($row['CartCnt'])}}</th>
                            <th class="text-right">{{number_format($row['OrderCnt'])}}</th>
                            <th class="text-right"><font color="$006EDD">{{number_format($row['OrderPrice'])}}</font> 원</th>
                            <th class="text-right">{{ $row['gwPrice'] > 0 ? round($row['OrderPrice']/$row['gwPrice'] * 100) : 0}} %</th>
                        </tr>
                        @php
                            $sum_gwPrice += $row['gwPrice'];
                            $sum_ClickCnt += $row['ClickCnt'];
                            $sum_MemCnt += $row['MemCnt'];
                            $sum_CartCnt += $row['CartCnt'];
                            $sum_OrderCnt += $row['OrderCnt'];
                            $sum_OrderPrice += $row['OrderPrice'];
                        @endphp
                    @endforeach
                        <tr >
                            <td colspan="2" class="text-center">합계</td>
                            <th class="text-right"><font color="#D30700">{{number_format($sum_gwPrice)}}</font> 원</th>
                            <th class="text-right">{{number_format($sum_ClickCnt)}}</th>
                            <th class="text-right">{{number_format($sum_MemCnt)}}</th>
                            <th class="text-right">{{number_format($sum_CartCnt)}}</th>
                            <th class="text-right">{{number_format($sum_OrderCnt)}}</th>
                            <th class="text-right"><font color="#D30700">{{number_format($sum_OrderPrice)}}</font> 원</th>
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