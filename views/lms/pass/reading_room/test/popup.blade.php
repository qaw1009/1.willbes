@extends('lcms.layouts.master_modal')

@section('layer_title')
    좌석변경 (TEST)
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>


        <input type="hidden" name="idx" value=""/>
        @endsection

        @section('layer_content')
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
                <label class="control-label col-md-1-1">주문번호
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">2018000001</p>
                </div>
                <label class="control-label col-md-1-1">결제금액(결제상태)
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">10,000원 (결제완료)</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">회원명(아이디)
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">테스터(tester)</p>
                </div>
                <label class="control-label col-md-1-1">연락처
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">010-1234-1234</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">독서실명(예치금)
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">1층A <span class="blue">[예치금]</span> 10,000원</p>
                </div>
                <label class="control-label col-md-1-1">좌석번호
                </label>
                <div class="col-md-4">
                    <p class="form-control-static">2</p>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">좌석상태
                </label>
                <div class="col-md-10 form-inline">
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
                <label class="control-label col-md-1-1">대여기간
                </label>
                <div class="col-md-10 form-inline">
                    2018-01-01 ~ 2018-02-28
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">독서실/좌석이동
                </label>
                <div class="col-md-3 form-inline">
                    <select class="form-control" id="" name="">
                        <option value="">1층A</option>
                    </select>
                    <input type="text" class="form-control" id="" name="" value="2" autocomplete="off" style="width: 80px;">
                </div>
                <div class="col-md-6 form-inline">
                    <p class="form-control-static">• 동일 운영사이트/캠퍼스 내에서만 이동 가능 (좌석표에서 좌석 선택 시 좌석번호 자동 입력)</p>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <div class="col-md-12 form-inline">
                    <table cellspacing="0" cellpadding="0" id="mem_seat_list" class="table" style="font-size: 12px;">
                        <colgroup>
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr>
                            <th colspan="10">
                                <ul class="clearfix-r">
                                    <li><span class="color-box btn-default">-</span> 미사용</li>
                                    <li><span class="color-box btn-info">-</span> 사용중</li>
                                    <li><span class="color-box btn-warning">-</span> 대기</li>
                                    <li><span class="color-box btn-success">-</span> 홀드</li>
                                    <li><span class="color-box btn-danger">-</span> 고장</li>
                                </ul>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><button type="button" class="btn btn-info">1<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">2<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">3<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">4<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">5<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">6<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">7<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-warning">8<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">9<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-success">10<br/>회원명</button></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-warning">11<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">12<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">13<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">14<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">15<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">16<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">17<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">18<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-danger">19<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">20<br/>회원명</button></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-default">141<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">142<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">143<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">144<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">145<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">146<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">147<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">148<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-success">149<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-danger">150<br/>회원명</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group btn-wrap clear pt-20">
                    <div class="col-md-6 form-inline">
                        <button type="button" class="btn btn-sm btn-default">퇴실처리</button>
                    </div>
                    <div class="col-md-6 form-inline">
                        <button type="button" class="btn btn-sm btn-success">수정</button>
                    </div>
                </div>
            </div>

            <br/><br/>
            <h5 class="clearfix">• 메모관리</h5>
            <div class="pull-right">
                <button type="button" class="btn btn-default btn-sm btn-primary" id="btn_member_searching">메모저장</button>
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
@endsection