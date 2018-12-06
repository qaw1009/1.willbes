@extends('lcms.layouts.master_modal')

@section('layer_title')
    수강증출력
@stop

@section('layer_header')
@endsection

@section('layer_content')
    <div class="row box-body">
        <div class="col-md-12">
            <p>수강증</p>
            <p>{{ trim(str_replace('[학원]', '', $data['SiteName'])) }}</p>
            <p>{{ $data['ProdName'] }}</p>
            <p>{{ date('m/d', strtotime($data['MyLecData']['LecStartDate'])) }} ~ {{ date('m/d', strtotime($data['MyLecData']['RealLecEndDate'])) }}</p>
            <p>{{ $data['MemName'] }}</p>
            <p>{{ $data['MemId'] }}</p>
            <p>{{ number_format($data['RealPayPrice']) }}원</p>
            <p>{{ str_replace('결제(방문)', '', $data['PayMethodCcdName']) }}</p>
            <p>{{ $data['OrderNo'] }}</p>
            <p>{{ date('Y-m-d H:i') }}</p>
        </div>
    </div>
    <script src="/public/vendor/jquery/print/jquery.print.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // 프린트 버튼 클릭
            $('button[name="_btn_print"]').on('click', function() {
                $.print('.box-body');
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="button" name="_btn_print" class="btn btn-success">프린트</button>
@endsection

@section('layer_footer')
@endsection