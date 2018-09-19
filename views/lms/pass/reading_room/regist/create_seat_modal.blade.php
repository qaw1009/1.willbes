@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석배정
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>

        <input type="hidden" name="idx" value=""/>
        @endsection

        @section('layer_content')
            <h5>• 주문정보</h5>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">주문번호
                </label>
                <div class="col-md-4 form-inline">
                    <span class="pl-10">20180000</span>
                </div>
                <label class="control-label col-md-1-1">결제금액(결제상태)
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">10,000원 (결제완료)</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">회원명 (아이디)
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">윌비스(willbes1)</p>
                </div>
                <label class="control-label col-md-1-1">연락처
                </label>
                <div class="col-md-4 form-inline">
                    <input type="text" id="" name="" class="form-control" required="required" title="" value="010-1234-5678" style="width: 120px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;• 수정 가능
                </div>
            </div>

            <br/><br/>
            <h5>• 좌석정보</h5>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">운영사이트
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">학원경찰</p>
                </div>
                <label class="control-label col-md-1-1">캠퍼스
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">신림</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">독서실명
                </label>
                <div class="col-md-4">
                    <p class="form-control-static"><span class="red">연장</span> - 1층A</p>
                </div>
                <label class="control-label col-md-1-1">독서실정보
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">
                        <span class="blue">[예치금]</span> 10,000원 &nbsp;&nbsp;
                        <span class="blue">[판매가]</span> 10,000원 &nbsp;&nbsp;
                        <span class="blue">[강의실]</span> 101호
                    </p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">사용중/총좌석
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">50/150</p>
                </div>
                <label class="control-label col-md-1-1">잔여석
                </label>
                <div class="col-md-4">
                    <p class="form-control-static"><span class="blue pr-10">100</span></p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">좌석번호 <span class="required">*</span>
                </label>
                <div class="col-md-10 item form-inline">
                    <input type="text" id="" name="" class="form-control" required="required" title="" value="5" style="width: 60px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;• 신규배정 시 좌석표의 좌석선택으로만 번호 입력 가능 (연장 시, 이전 좌석번호가 자동 입력되나 변경 가능)
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">좌석상태 <span class="required">*</span>
                </label>
                <div class="col-md-10 item form-inline">
                    <div class="radio">
                        <div class="iradio_flat-blue checked" style="position: relative;"><input type="radio" id="" name="" class="flat send_option_ccd" title="사용" checked="checked" data-option-type="Y" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="" class="input-label">사용</label>
                        <div class="iradio_flat-blue" style="position: relative;"><input type="radio" id="" name="" class="flat send_option_ccd" title="미사용" data-option-type="N" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="" class="input-label">미사용</label>
                        <div class="iradio_flat-blue" style="position: relative;"><input type="radio" id="" name="" class="flat send_option_ccd" title="대기" data-option-type="N" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="" class="input-label">대기</label>
                        <div class="iradio_flat-blue" style="position: relative;"><input type="radio" id="" name="" class="flat send_option_ccd" title="홀드" data-option-type="N" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="" class="input-label">홀드</label>
                        <div class="iradio_flat-blue" style="position: relative;"><input type="radio" id="" name="" class="flat send_option_ccd" title="고장" data-option-type="N" value="640002" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="" class="input-label">고장</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">대여기간 <span class="required">*</span>
                </label>
                <div class="col-md-10 item form-inline">
                    <div class="input-group mb-0">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_start_date_modal" name="search_start_date_modal" value="">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_end_date_modal" name="search_end_date_modal" value="">
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
                <label class="control-label col-md-1-1">예치금반환여부 <span class="required">*</span>
                </label>
                <div class="col-md-10 item form-inline">
                    <div class="radio">
                        <div class="iradio_flat-blue checked" style="position: relative;"><input type="radio" id="" name="" class="flat send_option_ccd" title="사용" checked="checked" data-option-type="Y" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="" class="input-label">반환</label>
                        <div class="iradio_flat-blue" style="position: relative;"><input type="radio" id="" name="" class="flat send_option_ccd" title="미사용" data-option-type="N" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="" class="input-label">미반환</label>
                        <div class="iradio_flat-blue" style="position: relative;"><input type="radio" id="" name="" class="flat send_option_ccd" title="대기" data-option-type="N" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <label for="" class="input-label">예치금 없음</label>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;• 결제/환불정보로 자동 셋팅 (환불 시 '반환', 예치금 0원 시 '없음')
                </div>
            </div>

            <div class="form-group form-group-sm">
                <div class="col-md-12 form-inline">
                    <div class="n_mem_seat_info">
                        <ul class="clearfix-r">
                            <li><span class="color-box btn-default">-</span> 미사용</li>
                            <li><span class="color-box btn-info">-</span> 사용중</li>
                            <li><span class="color-box btn-warning">-</span> 대기</li>
                            <li><span class="color-box btn-success">-</span> 홀드</li>
                            <li><span class="color-box btn-danger">-</span> 고장</li>
                        </ul>
                    </div>
                    <ul class="n_mem_seat">
                        <li><button type="button" class="btn btn-info" data-seat-num="1" data-member-idx="100001">1<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info" data-seat-num="2" data-member-idx="100002">2<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">3<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">4<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">5<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">6<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">7<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-warning">8<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">9<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-success">10<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-warning">11<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">12<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">13<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">14<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">15<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">16<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">17<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">18<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-danger">19<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">20<br/>회원명</button></li>
                    </ul>
                </div>
            </div>

            <br/><br/>
            <h5 class="clearfix">• 메모관리</h5>
            <div class="pull-right">
                <button type="button" class="btn btn-default btn-sm btn-primary mr-20" id="btn_member_searching">메모저장</button>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-md-12">
                    <textarea id="send_content" name="send_content" class="form-control" rows="7" title="내용" placeholder="ex) 총무 결제, 1층A 6번 → 2층B 4번으로 자리 이동"></textarea>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-md-12">
                    <table id="mem_memo_list" class="table" style="font-size: 12px;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>메모내용</th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>5</th>
                            <th>메모 내용이 출력됩니다.</th>
                            <th>관리자명</th>
                            <th>2018-00-00 00:00</th>
                        </tr>
                        <tr>
                            <th>4</th>
                            <th>메모 내용이 출력됩니다.</th>
                            <th>관리자명</th>
                            <th>2018-00-00 00:00</th>
                        </tr>
                        <tr>
                            <th>3</th>
                            <th>메모 내용이 출력됩니다.</th>
                            <th>관리자명</th>
                            <th>2018-00-00 00:00</th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>메모 내용이 출력됩니다.</th>
                            <th>관리자명</th>
                            <th>2018-00-00 00:00</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>메모 내용이 출력됩니다.</th>
                            <th>관리자명</th>
                            <th>2018-00-00 00:00</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @stop

        @section('layer_footer')
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.n_mem_seat li').css("width", "calc(100% / 10)");

            // 기간설정 버튼 클릭
            $('.btn-set-search-date-modal').click(function() {
                var period = $(this).data('period');
                var periods = period.split('-');

                // 날짜 설정
                setDefaultDatepicker(-periods[0], periods[1], 'search_start_date_modal', 'search_end_date_modal');

                // set active class
                $('.btn-set-search-date-modal').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
@endsection