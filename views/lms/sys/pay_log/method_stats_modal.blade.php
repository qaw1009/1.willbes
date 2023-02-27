@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{ $log_name }} 상점아이디별 통계
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <div class="row">
        <div class="col-md-12">
            <h4>[{{ $search_start_date }} ~ {{ $search_end_date }}]</h4>
        </div>
        <div class="col-md-12">
            <table id="_list_table" class="table table-striped table-bordered">
                <thead>
                <tr class="bg-info">
                    <th>상점아이디</th>
                    @if($log_type == 'vbank')
                        <th>신청건수</th>
                        <th>신청금액</th>
                        <th>입금건수</th>
                        <th>입금액</th>
                        <th>취소건수</th>
                        <th>취소금액</th>
                        <th>입금-취소건수</th>
                        <th>입금-취소금액</th>
                    @else
                        <th>결제건수</th>
                        <th>결제금액</th>
                        <th>취소건수</th>
                        <th>취소금액</th>
                        <th>결제-취소건수</th>
                        <th>결제-취소금액</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @if(empty($data) === true)
                    <tr>
                        <td colspan="9" class="bg-warning text-center">데이터가 없습니다.</td>
                    </tr>
                @else
                    @foreach($data as $row)
                        <tr class="{{ $row['PgMid'] == '합계' ? 'bg-info bold' : '' }}">
                            <td><strong>{{ $row['PgMid'] }}</strong></td>
                            @if($log_type == 'vbank')
                                <td>{{ number_format($row['tReqPayCnt']) }}</td>
                                <td>{{ number_format($row['tReqPayPrice']) }}</td>
                                <td class="blue">{{ number_format($row['tDepositCnt']) }}</td>
                                <td class="blue">{{ number_format($row['tDepositPrice']) }}</td>
                                <td class="red">{{ number_format($row['tCancelCnt']) }}</td>
                                <td class="red">{{ number_format($row['tCancelPrice']) }}</td>
                                <td>{{ number_format($row['tDepositCnt'] - $row['tCancelCnt']) }}</td>
                                <td>{{ number_format($row['tDepositPrice'] + $row['tCancelPrice']) }}</td>
                            @else
                                <td class="blue">{{ number_format($row['tReqPayCnt']) }}</td>
                                <td class="blue">{{ number_format($row['tReqPayPrice']) }}</td>
                                <td class="red">{{ number_format($row['tCancelCnt']) }}</td>
                                <td class="red">{{ number_format($row['tCancelPrice']) }}</td>
                                <td>{{ number_format($row['tReqPayCnt'] - $row['tCancelCnt']) }}</td>
                                <td>{{ number_format($row['tReqPayPrice'] + $row['tCancelPrice']) }}</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
@endsection
