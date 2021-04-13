@extends('btob.layouts.master_modal')

@section('layer_title')
    수강부여이력
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="branch_ccd" value="{{ $branch_ccd }}"/>
@endsection

@section('layer_content')
    <div class="form-group bdt-line">
        <label class="control-label col-md-1" for="search_year">년월검색
        </label>
        <div class="col-md-10 form-inline">
            <select class="form-control" id="search_year" name="search_year" title="년도" style="width: 70px;">
                <option value="">년</option>
                @for($y = 2021; $y <= date('Y') + 1; $y++)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endfor
            </select> 년
            <select class="form-control ml-5" id="search_month" name="search_month" title="월" style="width: 50px;">
                <option value="">월</option>
                @for($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}">{{ $m }}</option>
                @endfor
            </select> 월
        </div>
    </div>
    <div class="mt-30">
        <p>
            <i class="fa fa-check-square-o"></i> <strong>지점정보</strong> :
            [{{ $data['AreaCcdName'] }}] {{ $data['BranchCcdName'] }}
        </p>
        <p>
            <i class="fa fa-check-square-o"></i> <strong>부여현황</strong> :
            <span class="pr-30">[제공건수] @if($data['IsLimit'] == 'Y') {{ number_format(intval($data['LimitCnt'])) }}건 @elseif($data['IsLimit'] == 'N') 제한없음 @endif </span>
            <span class="red pr-30">[부여(승인완료)건수] {{ number_format(intval($data['CompleteCnt'])) }}건</span>
            <span class="">[잔여건수] @if(empty($data['RemainCnt']) === false) {{ number_format(intval($data['RemainCnt'])) }}건 @endif </span>
        </p>
    </div>
    <div class="row mt-20">
        <div class="col-md-12">
            <table id="_list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th colspan="6" class="bg-dark text-center">
                        <span id="_wrap_year">{{ $search_year }}</span>년
                        <span id="_wrap_month">{{ $search_month }}</span>월
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>부여(승인완료)일</th>
                    <th>회원정보</th>
                    <th>신청상품</th>
                    <th>수강기간</th>
                </tr>
                </thead>
                <tbody>
                @if(empty($list) === true)
                    <tr>
                        <td colspan="5" class="text-center">수강부여이력이 없습니다.</td>
                    </tr>
                @else
                    @foreach($list as $row)
                        <tr>
                            <td>{{ $loop->remaining }}</td>
                            <td>{{ $row['ApprovalDatm'] }}</td>
                            <td>{{ $row['MemName'] }} ({{ $row['MemId'] }})</td>
                            <td>{{ $row['ProdName'] }}</td>
                            <td>{{ $row['LecStartDate'] }} ~ {{ $row['LecEndDate'] }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $list_table_modal = $('#_list_ajax_table');

        $(document).ready(function() {
            // 디폴트 년월 설정
            $search_form_modal.find('select[name="search_year"]').val('{{ $search_year }}');
            $search_form_modal.find('select[name="search_month"]').val('{{ $search_month }}');

            // 년월검색 변경
            $search_form_modal.on('change', 'select[name="search_year"], select[name="search_month"]', function() {
                replaceModal('{{ site_url('/stats/approvalStats/show') }}', {
                    'branch_ccd' : $search_form_modal.find('input[name="branch_ccd"]').val(),
                    'search_year' : $search_form_modal.find('select[name="search_year"]').val(),
                    'search_month' : $search_form_modal.find('select[name="search_month"]').val()
                });
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection