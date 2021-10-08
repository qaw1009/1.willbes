@extends('lcms.layouts.master')
@section('content')
    <h5>- 서포터즈 회원 등록/관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <div class="form-horizontal">
        <div class="x_panel">
            <div class="x_content">
                <div class="col-md-12">
                    <p class="pl-5"><i class="fa fa-check-square-o"></i> 회원정보</p>
                </div>
                <div class="col-md-12">
                    <div class="form-group bdt-line">
                        <label class="control-label col-md-2">운영사이트
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['SiteName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">서포터즈 명 (활동기수)
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['SupportersName'] }} ({{ $data['SupportersYear'] }}년 {{ $data['SupportersNumber'] }}기)</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">회원정보
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['MemIdx'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">이름(ID)
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['MemName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">생년월일(성별)
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['BirthDay'] }} ({!! ($data['Sex'] == 'M' ? '남' : '여') !!})</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">휴대폰(수신여부)
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['Phone'] }} ({{ $data['SmsRcvStatus'] }})</p>
                        </div>
                        <label class="control-label col-md-2">자택번호
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['Tel'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">E-Mail(수신여부)
                        </label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $data['Mail'] }} ({{ $data['MailRcvStatus'] }})</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">주소
                        </label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ '(' . $data['ZipCode'] . ') ' . $data['Addr1'] . ' ' . $data['Addr2'] }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">대학교
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['UniversityName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">전공
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['Department'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">학년
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['SchoolYearCcdName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">재학여부
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['IsSchoolCcdName'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">응시직렬
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['SerialCcdName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">시험준비시간
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['ExamPeriodCcdName'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">횟수
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['ExamCount'] }}</p>
                        </div>
                        <label class="control-label col-md-2">활동상태
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['SupportersStatusCcdName'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">서술항목
                        </label>
                        <div class="col-md-10">
                            <div class="row">
                                <label class="control-label col-md-3">광은 서포터즈 지원동기
                                </label>
                                <div class="col-md-8 ml-50 pl-20">
                                    <p class="form-control-static">{!! nl2br($data['Content1']) !!}</p>
                                </div>
                            </div>
                            <div class="row bdt-line">
                                <label class="control-label col-md-3">수험생들에게 전할 꿀팁!
                                </label>
                                <div class="col-md-8 ml-50 pl-20">
                                    <p class="form-control-static">{!! nl2br($data['Content2']) !!}</p>
                                </div>
                            </div>
                            <div class="row bdt-line">
                                <label class="control-label col-md-3">서포터즈에서 꼭 하고 싶어하는 것이 있다면?
                                </label>
                                <div class="col-md-8 ml-50 pl-20">
                                    <p class="form-control-static">{!! nl2br($data['Content3']) !!}</p>
                                </div>
                            </div>
                            <div class="row bdt-line">
                                <label class="control-label col-md-3">서포터즈에  뽑혀야할 되어야할 이유
                                </label>
                                <div class="col-md-8 ml-50 pl-20">
                                    <p class="form-control-static">{!! nl2br($data['Content4']) !!}</p>
                                </div>
                            </div>
                            <div class="row bdt-line">
                                <label class="control-label col-md-3">기타입력란
                                </label>
                                <div class="col-md-8 ml-50 pl-20">
                                    <p class="form-control-static">{!! nl2br($data['Content5']) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">등록자
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">등록일
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">최종 수정자
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">최종 수정일
                        </label>
                        <div class="col-md-2">
                            <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                        </div>
                    </div>
                    <div class="form-group text-center btn-wrap mt-10">
                        <button type="button" class="pull-right btn btn-primary ml-10" id="btn_list">목록</button>
                        <button type="button" class="pull-right btn btn-success" id="btn_modify" data-srm-idx="{{ $data['SrmIdx'] }}">수정</button>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs bar_tabs mt-30" role="tablist">
            <li role="presentation"><a role="tab" href="#none" class="fn_load ajax_assignment" data-target-load="ajaxAssignment" data-toggle="tab" data-supporters-idx="{{ $data['SupportersIdx'] }}" data-member-idx="{{ $data['MemIdx'] }}"><strong>과제수행</strong></a></li>
            <li role="presentation"><a role="tab" href="#none" class="fn_load" data-target-load="ajaxSuggest" data-toggle="tab" data-supporters-idx="{{ $data['SupportersIdx'] }}" data-member-idx="{{ $data['MemIdx'] }}"><strong>제안/토론</strong></a></li>
            <li role="presentation"><a role="tab" href="#none" class="fn_load" data-target-load="ajaxMyClass" data-toggle="tab" data-supporters-idx="{{ $data['SupportersIdx'] }}" data-member-idx="{{ $data['MemIdx'] }}"><strong>나의 소개</strong></a></li>
            <li role="presentation"><a role="tab" href="#none" class="fn_load" data-target-load="ajaxMyAttendance" data-toggle="tab" data-supporters-idx="{{ $data['SupportersIdx'] }}" data-member-idx="{{ $data['MemIdx'] }}"><strong>출석체크</strong></a></li>
            <li role="presentation"><a role="tab" href="#none" class="fn_load" data-target-load="ajaxMyChart" data-toggle="tab" data-supporters-idx="{{ $data['SupportersIdx'] }}" data-member-idx="{{ $data['MemIdx'] }}"><strong>학습량</strong></a></li>
            <li role="presentation"><a role="tab" href="#none" class="fn_load" data-target-load="ajaxMyQna" data-toggle="tab" data-supporters-idx="{{ $data['SupportersIdx'] }}" data-member-idx="{{ $data['MemIdx'] }}"><strong>학습상담</strong></a></li>
        </ul>
        <div id="tab_content"></div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".ajax_assignment").trigger('click');
            },10);

            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/supporters/member/") }}' + getQueryString();
            });

            $('#btn_modify').click(function() {
                location.href='{{ site_url('/site/supporters/member/create') }}/' + $(this).data('srm-idx') + getQueryString();
            });

            $('.fn_load').click(function() {
                var _target_url = $(this).data('target-load');
                var _url = '{{site_url('/site/supporters/member/')}}' + _target_url;
                var _data = 'supporters_idx='+$(this).data('supporters-idx')+'&member_idx='+$(this).data('member-idx');

                sendAjax(_url,
                    _data,
                    function(d){
                        $("#tab_content").html(d).end()
                    },
                    function(req, status, err){
                        showError(req, status);
                    }, false, 'GET', 'html');
            });
        });
    </script>
@stop