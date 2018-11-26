@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석배정
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_search_form" name="_search_form" method="POST" onsubmit="return false;" novalidate>
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
                        @if($is_extension === true)
                            <span class="red">연장</span> -
                        @endif
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
                    <input type="text" id="rdr_choice_serial_num" name="rdr_choice_serial_num" class="form-control" title="좌석번호" required="required" style="width: 60px;" readonly="readonly">
                    &nbsp;&nbsp;&nbsp;&nbsp;• 신규배정 시 좌석표의 좌석선택으로만 번호 입력 가능 (연장 시, 이전 좌석번호가 자동 입력되나 변경 가능)
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">좌석상태 <span class="required">*</span>
                </label>
                <div class="col-md-10 form-inline">
                    <div class="radio">
                        @foreach($arr_seat_status as $key => $val)
                            <input type="radio" id="rdr_seat_status_{{$key}}" name="rdr_seat_status" class="flat" value="{{$key}}" title="좌석상태" @if($arr_use_seat_data['StatusCcd'] == $key)checked="checked"@endif/> <label for="rdr_seat_status_{{$key}}" class="input-label">{{$val}}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">대여기간 <span class="required">*</span>
                </label>
                <div class="col-md-10 form-inline">
                    <div class="input-group mb-0">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="rdr_use_start_date" name="rdr_use_start_date" value="{{$use_start_date}}">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="rdr_use_end_date" name="rdr_use_end_date" value="">
                    </div>
                    <p class="form-control-static">
                        <button type="button" class="btn btn-default btn-sm btn-primary btn-set-search-date-modal" data-period="1-weeks">1주일</button>
                        <button type="button" class="btn btn-default btn-sm btn-primary btn-set-search-date-modal" data-period="15-days">15일</button>
                        <button type="button" class="btn btn-default btn-sm btn-primary btn-set-search-date-modal" data-period="1-months">1개월</button>
                        <button type="button" class="btn btn-default btn-sm btn-primary btn-set-search-date-modal" data-period="2-months">2개월</button>
                    </p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="is_sub_price">예치금반환여부 <span class="required">*</span>
                </label>
                <div class="col-md-10 form-inline">
                    <div class="checkbox">
                        <input type="checkbox" id="is_sub_price" name="is_sub_price" value="Y" class="flat" @if($data['sub_RealSalePrice'] > 0)checked="checked"@endif/> <label class="inline-block mr-5" for="is_sub_price">예치금있음</label>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;• 결제/환불정보로 자동 셋팅 (환불 시 '반환', 예치금 0원 시 '없음')
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
                    <button type="button" class="btn btn-sm btn-success" id="btn_seat_success">선택</button>
                </div>
            </div>
            <div class="row form-group-sm pt-20">
                <div class="text-left col-md-6 form-inline">
                    <h5 class="clearfix">• 메모관리</h5>
                </div>
                <div class="text-right col-md-6 form-inline">
                    <button type="button" class="btn btn-sm btn-primary mr-20" id="btn_memo">메모저장</button>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <div class="col-md-12">
                    <textarea id="rdr_memo" name="rdr_memo" class="form-control" rows="7" title="내용" placeholder="ex) 총무 결제, 1층A 6번 → 2층B 4번으로 자리 이동"></textarea>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-md-12">
                    <table id="list_ajax_table_modal" class="table table-striped table-bordered">
                        <colgroup>
                            <col style="width: 8%;">
                            <col>
                            <col style="width: 15%;">
                            <col style="width: 20%;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>메모내용</th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($memo_data as $row)
                            <tr>
                                <td>{{ $loop->index }}</td>
                                <td>{!! nl2br($row['Memo']) !!}</td>
                                <td>{{$row['RegAdminName']}}</td>
                                <td>{{$row['RegDatm']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @stop

        @section('layer_footer')
    </form>

    <script type="text/javascript">
        var $datatable_modal;
        var $list_table_modal = $('#list_ajax_table_modal');
        var $_search_form = $('#_search_form');
        var $parent_regi_form = $('#regi_form');
        var $extension_seat_num = '{!! $arr_use_seat_data['SerialNumber'] !!}';

        $(document).ready(function() {
            var set_table_row = '{{$data['TransverseNum']}}';
            $('.n_mem_seat li').css('width', 'calc(100% / '+set_table_row+')');

            //메모 테이블
            $datatable_modal = $list_table_modal.DataTable({
                serverSide: false,
                ajax : false,
                paging: true,
                pageLength: 10,
                searching: false
            });

            // 선택 후 좌석 재 설정할 경우 기존 정보 자동 셋팅
            var set_rdr_serial_num = $parent_regi_form.find('input[id="rdr_serial_num_{{$prod_code}}"]').val();
            var set_rdr_seat_status = $parent_regi_form.find('input[id="rdr_seat_status_{{$prod_code}}"]').val();
            var set_rdr_use_start_date = $parent_regi_form.find('input[id="rdr_use_start_date_{{$prod_code}}"]').val();
            var set_rdr_use_end_date = $parent_regi_form.find('input[id="rdr_use_end_date_{{$prod_code}}"]').val();
            var set_rdr_is_sub_price = $parent_regi_form.find('input[id="rdr_is_sub_price_{{$prod_code}}"]').val();
            var set_rdr_memo = $parent_regi_form.find('input[id="rdr_memo_{{$prod_code}}"]').val();

            if (typeof set_rdr_serial_num != 'undefined') {
                $_search_form.find('input[name="rdr_choice_serial_num"]').val(set_rdr_serial_num);
            } else if ($extension_seat_num != '') {
                $_search_form.find('input[name="rdr_choice_serial_num"]').val($extension_seat_num);
            }

            $_search_form.find('input:radio[name=rdr_seat_status]:input[value='+set_rdr_seat_status+']').attr("checked", true);
            if (typeof set_rdr_use_start_date != 'undefined') {
                $_search_form.find('input[name="rdr_use_start_date"]').val(set_rdr_use_start_date);
            }
            $_search_form.find('input[name="rdr_use_end_date"]').val(set_rdr_use_end_date);

            console.log(set_rdr_is_sub_price);
            if (typeof set_rdr_is_sub_price != 'undefined') {
                if (set_rdr_is_sub_price == 'Y') {
                    $_search_form.find('input:checkbox[name="is_sub_price"]').attr("checked", true);
                } else {
                    $_search_form.find('input:checkbox[name="is_sub_price"]').attr("checked", false);
                }
            }
            $_search_form.find('textarea[name="rdr_memo"]').val(set_rdr_memo);
            $('#_seat_'+set_rdr_serial_num).css('background-color','#12ec23');

            // 기간설정 버튼 클릭
            $('.btn-set-search-date-modal').click(function() {
                var period = $(this).data('period');
                var periods = period.split('-');
                var start_date = $_search_form.find('input[name="rdr_use_start_date"]').val();
                if (start_date == '') {
                    start_date = moment().format('YYYY-MM-DD');
                }
                // 날짜 설정
                setDefaultDatepicker(+periods[0], periods[1], 'rdr_use_start_date', 'rdr_use_end_date', start_date);

                // set active class
                $('.btn-set-search-date-modal').removeClass('active');
                $(this).addClass('active');
            });

            //좌석선택
            $('.btn_choice_seat').click(function() {
                var seat_num = $(this).data('seat-num');
                var is_use_seat = 'N';
                if ($(this).data('member-idx') != '') {
                    is_use_seat = 'Y';
                }

                if ($(this).data('seat-type') != '682001') {
                    is_use_seat = 'Y';
                }

                if (is_use_seat == 'Y') {
                    alert('미사용 좌석만 선택가능합니다. 다른 좌석을 선택해주세요.');
                    return false;
                }
                $('.btn_choice_seat').removeAttr('style');
                $(this).css('background-color','#12ec23');
                $('#rdr_choice_serial_num').val(seat_num);
            });

            // 메모값 부모창 설정
            $('#btn_memo').click(function() {
                var rdr_memo = $('#rdr_memo').val();
                var html = '<input type="hidden" id="rdr_memo_{{$prod_code}}" name="rdr_memo[]" value="'+rdr_memo+'">';
                $parent_regi_form.find('input[id="rdr_memo_{{$prod_code}}"]').remove();
                $parent_regi_form.append(html);
            });

            //최종선택
            $('#btn_seat_success').click(function() {
                var rdr_seat_status, rdr_serial_num, rdr_use_start_date, rdr_use_end_date, rdr_memo, rdr_is_sub_price, html = '';

                rdr_serial_num = $('#rdr_choice_serial_num').val();
                rdr_seat_status = $(":input:radio[name=rdr_seat_status]:checked").val();
                rdr_use_start_date = $('#rdr_use_start_date').val();
                rdr_use_end_date = $('#rdr_use_end_date').val();
                rdr_memo = $('#rdr_memo').val();
                if ($('input:checkbox[name="is_sub_price"]').is(":checked") ==  true) {
                    rdr_is_sub_price = 'Y';
                } else {
                    rdr_is_sub_price = 'N';
                }

                if (rdr_serial_num == '') {
                    alert('좌석을 선택해주세요.');
                    return false;
                }

                if($("input:radio[name='rdr_seat_status']").is(":checked") == false){
                    alert('좌석상태를 선택해주세요.');
                    return false;
                }

                if (rdr_use_start_date == '' || rdr_use_end_date == '') {
                    alert('대여기간을 선택해주세요.');
                    return false;
                }

                html += '<input type="hidden" id="rdr_prod_code_{{$prod_code}}" name="rdr_prod_code[]" value="{{$prod_code}}">';
                html += '<input type="hidden" id="rdr_master_order_idx_{{$prod_code}}" name="rdr_master_order_idx[]" value="{{$rdr_master_order_idx}}">';
                html += '<input type="hidden" id="rdr_is_extension_{{$prod_code}}" name="rdr_is_extension[]" value="{{$is_extension}}">';
                html += '<input type="hidden" id="rdr_serial_num_{{$prod_code}}" name="rdr_serial_num[]" value="'+rdr_serial_num+'">';
                html += '<input type="hidden" id="rdr_seat_status_{{$prod_code}}" name="rdr_seat_status[]" value="'+rdr_seat_status+'">';
                html += '<input type="hidden" id="rdr_use_start_date_{{$prod_code}}" name="rdr_use_start_date[]" value="'+rdr_use_start_date+'">';
                html += '<input type="hidden" id="rdr_use_end_date_{{$prod_code}}" name="rdr_use_end_date[]" value="'+rdr_use_end_date+'">';
                html += '<input type="hidden" id="rdr_is_sub_price_{{$prod_code}}" name="is_sub_price[]" value="'+rdr_is_sub_price+'">';
                html += '<input type="hidden" id="rdr_memo_{{$prod_code}}" name="rdr_memo[]" value="'+rdr_memo+'">';

                $parent_regi_form.find('input[id="rdr_prod_code_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="rdr_master_order_idx_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="rdr_is_extension_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="rdr_serial_num_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="rdr_seat_status_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="rdr_use_start_date_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="rdr_use_end_date_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="rdr_is_sub_price_{{$prod_code}}"]').remove();
                $parent_regi_form.find('input[id="rdr_memo_{{$prod_code}}"]').remove();
                $parent_regi_form.append(html);
                $("#pop_modal").modal('toggle');
            });
        });
    </script>
@endsection