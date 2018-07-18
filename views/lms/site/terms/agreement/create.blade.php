@extends('lcms.layouts.master')
@section('content')
    <h5>- 사이트 이용약관을 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>이용약관정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="" name="" method="" onsubmit="return false;" novalidate>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="inline-block item">
                            <select class="form-control" id="" name="">
                                <option value="">온라인공무원</option>
                                <option value="">학원공무원</option>
                                <option value="">경찰공무원</option>
                                <option value="">공인중개사</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">제목 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <input type="text" id="" name="" class="form-control" title="제목" required="required" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">노출기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="form-inline">
                            <input type="text" id="" name="" class="form-control" required="" title="" value="" style="width: 120px;">
                            <select class="form-control" id="" name="">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">10</option>
                                <option value="">12</option>
                            </select> 시 &nbsp; ~ &nbsp;&nbsp;
                            <input type="text" id="" name="" class="form-control" required="" title="" value="" style="width: 120px;">
                            <select class="form-control" id="" name="">
                                <option value="">00</option>
                                <option value="">07</option>
                                <option value="">12</option>
                                <option value="">23</option>
                                <option value="">24</option>
                            </select> 시
                            &nbsp;&nbsp;&nbsp;&nbsp;• 노출기간 미 입력 시 '사용여부'로 노출 여부 설정
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">링크주소 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <input type="text" id="" name="" class="form-control" title="링크주소" required="required" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">내용 <span class="required">*</span><br/><br/>
                        <button type="button" id="" class="btn btn-sm btn-default">미리보기</button>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <input type="hidden" name="" value="">
                        <textarea id="" name="" class="form-control" rows="7" title="내용" placeholder="" style="width: 100%; resize: none;">
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N"/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">관리자명</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">2018-00-00 00:00</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">관리자명</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">2018-00-00 00:00</p>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
@stop