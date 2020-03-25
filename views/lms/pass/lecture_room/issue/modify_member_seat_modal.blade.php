@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석정보
@stop

@section('layer_header')
@endsection

@section('layer_content')

    <form class="form-horizontal form-label-left" novalidate>
        <input type="hidden" name="lr_code" value="{{ $lr_code }}" title="강의실코드">
        <input type="hidden" name="lr_unit_code" value="{{ $lr_unit_code }}" title="강의실회차코드">
        <input type="hidden" id="lr_rurs_idx" name="lr_rurs_idx" value="" title="강의실회차좌석식별자">
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">운영사이트
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['SiteName']}}</p>
            </div>
            <label class="control-label col-md-1-1">캠퍼스
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['CampusName']}}</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">강의실명
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['LectureRoomName']}}</p>
            </div>
            <label class="control-label col-md-1-1">좌석정보
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['UnitName']}}</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">사용/총좌석
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['UseSeatCnt']}} / {{ $data['UseQty'] }}</p>
            </div>
            <label class="control-label col-md-1-1">잔여석
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{$data['UseQty'] - ($data['UseSeatCnt'])}}</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">시작 ~ 종료번호
            </label>
            <div class="col-md-5">
                <p class="form-control-static">{{$data['StartNo']}} / {{ $data['EndNo'] }}</p>
            </div>
            <label class="control-label col-md-1-1">좌석선택기간
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{ $data['SeatChoiceStartDate'] }} ~ {{ $data['SeatChoiceEndDate'] }}</p>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">좌석배치도
            </label>
            <div class="col-md-5">
                <p class="form-control-static">
                    <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['SeatMapFileRoute'])}}" data-file-name="{{ urlencode($data['SeatMapFileName']) }}">
                        {{ $data['SeatMapFileName'] }}
                    </a>
                </p>
            </div>
            <label class="control-label col-md-1-1">사용여부
            </label>
            <div class="col-md-4">
                <p class="form-control-static">{{ ($data['IsUse'] == 'Y' ? '사용' : '미사용') }}</p>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">좌석번호 <span class="required">*</span>
            </label>
            <div class="col-md-3 form-inline">
                <input type="text" id="choice_serial_num" name="choice_serial_num" class="form-control" title="좌석번호" style="width: 200px;" readonly="readonly">
            </div>
            <div class="col-md-5 mt-5">
                <span class="mr-5">• 다중선택가능</span>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">좌석상태 <span class="required">*</span>
            </label>
            <div class="col-md-3 form-inline">
                <div class="radio">
                    @foreach($arr_seat_unit_ccd as $key => $val)
                        <input type="radio" id="seat_status_{{$key}}" name="seat_status" class="flat" value="{{$key}}" title="좌석상태"/> <label for="seat_status_{{$key}}" class="input-label">{{$val}}</label>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5 mt-5">
                <span class="mr-5">• 하단 좌석번호를 클릭해 주세요.{{-- (미사용 좌석만 선택 가능합니다.)--}}</span>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label class="control-label col-md-1-1">설명
            </label>
            <div class="col-md-7">
                <input type="text" id="desc" name="desc" class="form-control" title="설명" style="width: 100%;">
            </div>
        </div>
        <div class="form-group form-group-sm text-center mb-30">
            <button type="submit" id="btn_store_log" class="btn btn-sm btn-primary mb-20">적용</button>
        </div>

        <div class="form-group form-group-sm">
            <div class="col-md-12 form-inline">
                <div class="n_mem_seat_info">
                    <ul class="clearfix-r">
                        @foreach($arr_seat_unit_ccd as $key => $val)
                            @php
                                $btn_type = '';
                                switch ($key) {
                                    case "727001" : $btn_type = 'btn-default'; break;
                                    case "727002" : $btn_type = 'btn-primary'; break;
                                    case "727003" : $btn_type = 'btn-danger'; break;
                                }
                            @endphp
                            <li><span class="color-box {{$btn_type}}">-</span> {{$val}}</li>
                        @endforeach
                    </ul>
                </div>
                @if (empty($seat_data) === false)
                    <ul class="n_mem_seat">
                        @foreach($seat_data as $row)
                            @php
                                $btn_type = '';
                                switch ($row['SeatStatusCcd']) {
                                    case "727001" : $btn_type = 'btn-default'; break;
                                    case "727002" : $btn_type = 'btn-primary'; break;
                                    case "727003" : $btn_type = 'btn-danger'; break;
                                    default : $btn_type = 'btn-default';
                                }
                            @endphp
                            <li>
                                <button type="button" id="_seat_{{$row['SeatNo']}}" class="btn {{$btn_type}} btn_choice_seat" data-lr-rurs-idx="{{$row['LrrursIdx']}}" data-seat-type="{{$row['SeatStatusCcd']}}" data-seat-num="{{$row['SeatNo']}}" data-member-idx="{{$row['MemIdx']}}">{{$row['SeatNo']}}
                                    {{--<p>{{(empty($row['MemName']) === true) ? '미사용' : $row['MemName']}}</p>--}}
                                    <p>
                                    @if (empty($row['MemName']) === false)
                                        <p>{{ $row['MemName'] }}</p>
                                    @else
                                        <p>{{ $row['SeatStatusName'] }}</p>
                                    @endif
                                </button>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </form>

@stop

@section('add_buttons')
@endsection

@section('layer_footer')
@endsection