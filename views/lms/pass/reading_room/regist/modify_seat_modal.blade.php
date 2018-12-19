@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석현황
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
    {{--<form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" action="{{ site_url("/pass/readingRoom/regist/storeSeat") }}?{!! $default_query_string !!}">--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="lr_idx" value="{{$lr_idx}}">
        @endsection

        @section('layer_content')
            <h5>• 좌석정보</h5>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">운영사이트
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{$data['SiteName']}}</p>
                </div>
                <label class="control-label col-md-1-1">캠퍼스
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{$data['CampusName']}}</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">독서실명
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">
                        {{$data['ReadingRoomName']}}
                    </p>
                </div>
                <label class="control-label col-md-1-1">독서실정보
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">
                        <span class="blue">[예치금]</span> {{$data['sub_RealSalePrice']}}원
                        <span class="blue">[판매가]</span> {{$data['main_RealSalePrice']}}원
                        <span class="blue">[강의실]</span> {{$data['LakeLayer']}}호
                    </p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">사용중/총좌석
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">{{$data['countY']}}/{{$data['UseQty']}}</p>
                </div>
                <label class="control-label col-md-1-1">잔여석
                </label>
                <div class="col-md-4">
                    <p class="form-control-static"><span class="blue pr-10">{{$data['countN']}}</span></p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">좌석번호 <span class="required">*</span>
                </label>
                <div class="col-md-10 form-inline">
                    <input type="text" id="choice_serial_num" name="choice_serial_num" class="form-control" title="좌석번호" required="required" style="width: 60px;" readonly="readonly">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">좌석상태 <span class="required">*</span>
                </label>
                <div class="col-md-4 form-inline">
                    <div class="radio">
                        @foreach($arr_seat_status as $key => $val)
                            <input type="radio" id="seat_status_{{$key}}" name="seat_status" class="flat" value="{{$key}}" title="좌석상태"/> <label for="seat_status_{{$key}}" class="input-label">{{$val}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="form-control-static bg-dark-blue"># 회원이 사용중인 좌석 상태는 변경 불가(ex. 고장 시, '이동' 혹은 '퇴실'좌석 비운 후 변경 가능)</p>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <div class="col-md-12 form-inline">
                    <div class="n_mem_seat_info">
                        <ul class="clearfix-r">
                            @foreach($arr_seat_status as $key => $val)
                                @php
                                    $btn_type = '';
                                    switch ($key) {
                                        case "682001" : $btn_type = 'btn-default'; break;
                                        case "682002" : $btn_type = 'btn-info'; break;
                                        case "682003" : $btn_type = 'btn-warning'; break;
                                        case "682004" : $btn_type = 'btn-success'; break;
                                        case "682005" : $btn_type = 'btn-danger'; break;
                                    }
                                @endphp
                                <li><span class="color-box {{$btn_type}}">-</span> {{$val}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <ul class="n_mem_seat">
                        @foreach($seat_data as $row)
                            @php
                                $btn_type = '';
                                switch ($row['StatusCcd']) {
                                    case "682001" : $btn_type = 'btn-default'; break;
                                    case "682002" : $btn_type = 'btn-info'; break;
                                    case "682003" : $btn_type = 'btn-warning'; break;
                                    case "682004" : $btn_type = 'btn-success'; break;
                                    case "682005" : $btn_type = 'btn-danger'; break;
                                }
                            @endphp
                            <li>
                                <button type="button" id="_seat_{{$row['SerialNumber']}}" class="btn {{$btn_type}} btn_choice_seat" data-seat-type="{{$row['StatusCcd']}}" data-seat-num="{{$row['SerialNumber']}}" data-member-idx="{{$row['MemIdx']}}">{{$row['SerialNumber']}}
                                    <p>{{(empty($row['MemName']) === true) ? '미사용' : $row['MemName']}}</p>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="form-group btn-wrap clear pt-20">
                <div class="text-center col-md-12 form-inline">
                    <button type="submit" class="btn btn-sm btn-success" id="btn_modify_seat">수정</button>
                </div>
            </div>
        @stop
        @section('layer_footer')
    </form>

    <script type="text/javascript">
        var $_regi_form = $('#_regi_form');

        $(document).ready(function() {
            var set_table_row = '{{$data['TransverseNum']}}';
            $('.n_mem_seat li').css('width', 'calc(100% / '+set_table_row+')');

            //좌석선택
            $_regi_form.on('click', '.btn_choice_seat', function() {
            //$('.btn_choice_seat').click(function() {
                var seat_num = $(this).data('seat-num');
                var seat_type = $(this).data('seat-type');
                var $seat_status = $_regi_form.find('input[name="seat_status"]');

                $('.btn_choice_seat').removeAttr('style');
                $(this).css('background-color','#12ec23');
                $('#choice_serial_num').val(seat_num);
                $seat_status.filter('#seat_status_'+seat_type).iCheck('check');
            });

            var _url = '{{ site_url('/pass/readingRoom/regist/storeSeat') }}' + '?' + '{!! $default_query_string !!}';
            $_regi_form.submit(function() {
                ajaxSubmit($_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            var addValidate = function() {
                var rdr_serial_num;
                rdr_serial_num = $('#choice_serial_num').val();
                if (rdr_serial_num == '') {
                    alert('좌석을 선택해주세요.');
                    return false;
                }

                if($("input:radio[name='seat_status']").is(":checked") == false){
                    alert('좌석상태를 선택해주세요.');
                    return false;
                }

                if (!confirm('수정 하시겠습니까?')) {
                    return false;
                }

                return true;
            };
        });
    </script>
@endsection