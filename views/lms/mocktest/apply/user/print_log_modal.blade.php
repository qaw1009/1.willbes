@extends('lcms.layouts.master_modal')

@section('layer_title')
    응시표출력
@stop

@section('layer_header')

@endsection

        @section('layer_content')
            <div class="form-group form-group-sm no-border-bottom mb-0">
                <p class="form-control-static"><span class="required">*</span> 접수자 정보</p>
            </div>
            <table id="list_table" class="table table-bordered table-striped form-table">
                <thead class="bg-white-gray">
                <tr>
                    <th class="text-center">주문번호</th>
                    <th class="text-center">회원명</th>
                    <th class="text-center">연락처</th>
                    <th class="text-center">결제완료일</th>
                    <th class="text-center">결제금액</th>
                    <th class="text-center">결제상태</th>
                    <th class="text-center">상품명</th>
                    <th class="text-center">연도</th>
                    <th class="text-center">회차</th>
                    <th class="text-center">응시형태</th>
                    <th class="text-center">응시번호</th>
                    <th class="text-center">카테고리</th>
                    <th class="text-center">직렬</th>
                    <th class="text-center">과목</th>
                    <th class="text-center">응시지역</th>
                    <th class="text-center">응시여부</th>
                </tr>
                </thead>
                <tbody>
                @if(empty($data))
                    <tr>
                        <td colspan="16" class="tx-center">신청 정보가 존재하지 않습니다.</td>
                    </tr>
                @else
                    <tr>
                        <td class="tx-center">{{$data['OrderNo']}}</td>
                        <td class="tx-center">{{$data['MemName']}}</td>
                        <td class="tx-center">{{$data['MemPhone']}}</td>
                        <td class="tx-center">{{$data['CompleteDatm']}}</td>
                        <td class="tx-center">{{number_format($data['RealPayPrice'])}}</td>
                        <td class="tx-center">{{$data['PayStatusCcd_Name']}}</td>
                        <td class="tx-center">{{$data['ProdName']}}</td>
                        <td class="tx-center">{{$data['MockYear']}}</td>
                        <td class="tx-center">{{$data['MockRotationNo']}}</td>
                        <td class="tx-center">{{$data['TakeForm_Name']}}</td>
                        <td class="tx-center">{{$data['TakeNumber']}}</td>
                        <td class="tx-center">{{$data['CateName']}}</td>
                        <td class="tx-center">{{$data['TakeMockPart_Name']}}</td>
                        <td class="tx-center">{{$data['SubjectNameList']}}</td>
                        <td class="tx-center">{{$data['TakeArea_Name']}}</td>
                        <td class="tx-center">{{$data['IsTake'] == 'Y' ? '응시' : '미응시'}}</td>
                    </tr>
                @endif
                </tbody>
            </table>



            <div class="form-group form-group-sm no-border-bottom mb-0">
                <p class="form-control-static"><span class="required">*</span> 응시표 출력 이력 (총 출력 횟수 {{count($log)}} 회)</p>
            </div>
            <table id="list_table" class="table table-bordered table-striped form-table">
                <thead class="bg-white-gray">
                <tr>
                    <th class="text-center" width="70px">no</th>
                    <th class="text-center">출력일시</th>
                    <th class="text-center">출력자</th>
                </tr>
                </thead>
                <tbody>

                @if(empty($log))
                    <tr>
                        <td colspan="16" class="tx-center">출력 정보가 존재하지 않습니다.</td>
                    </tr>
                @else
                    @foreach($log as $row)
                    <tr>
                        <td class="tx-center">{{count($log) - ($loop->index) + 1}}</td>
                        <td class="tx-center">{{$row['RegDatm']}}</td>
                        <td class="tx-center">{{$row['wAdminName']}}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        @stop

        @section('add_buttons')
        @endsection

@section('layer_footer')

@endsection