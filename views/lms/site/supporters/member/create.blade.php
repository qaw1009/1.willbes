@extends('lcms.layouts.master')
@section('content')
    <h5>- 서포터즈 회원 등록/관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/site/popup/store") }}?bm_idx=45" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="srm_idx" value="{{ $srm_idx }}">

        <div class="x_panel">
            <div class="x_title">
                <h2>서포터즈 회원 등록/수정</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', false, $arr_base['arr_site_code']) !!}
                    </div>
                    <label class="control-label col-md-2" for="supporters_idx">서포터즈 선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <select class="form-control" id="supporters_idx" name="supporters_idx" title="서포터즈" required="required">
                            <option value="">서포터즈 선택</option>
                            @foreach($arr_base['arr_supporters_data'] as $row)
                                <option value="{{ $row['SupportersIdx'] }}" class="{{ $row['SiteCode'] }}" @if($row['SupportersIdx'] == $data['SupportersIdx']) selected="selected" @endif>{!! $row['Title'] . " [{$row['SupportersYear']}-{$row['SupportersNumber']}]" !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="txt_member_name">회원검색
                    </label>
                    <div class="col-md-8 form-inline">
                        <input type="text" id="search_mem_id" name="search_mem_id" class="form-control" title="회원검색어" value="">
                        <button type="button" name="btn_member_search" data-result-type="single" class="btn btn-primary mb-0 ml-5">회원검색</button>
                        <p class="form-control-static ml-20">이름, 아이디, 휴대폰번호 검색 가능</p>
                        <input type="hidden" id="mem_idx" name="mem_idx" value="{{ $data['MemIdx'] }}" data-result-data=""/>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>서포터즈 회원 기본정보</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content search-results {{ (empty($srm_idx) === true) ? 'hide' : '' }}">
                <div class="form-group">
                    <label class="control-label col-md-2">회원번호
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" id="txt_member_idx" value="{{ $data['MemIdx'] }}" style="border: 0px; margin-top: 3px;" readonly="readonly">
                    </div>
                    <label class="control-label col-md-2">회원명 (아이디)
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" id="txt_member_id" value="{{ $data['MemName'] . ' (' . $data['MemId'] . ')'}}" style="border: 0px; margin-top: 3px;" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">생년월일
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" id="txt_member_birthday" value="{{ $data['BirthDay'] }}" style="border: 0px; margin-top: 3px;" readonly="readonly">
                    </div>
                    <label class="control-label col-md-2">성별
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" id="txt_member_sex" value="{!! ($data['Sex'] == 'M') ? '남' : '여' !!}" style="border: 0px; margin-top: 3px;" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">휴대폰
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" id="txt_member_phone" value="{{ $data['Phone'] }}" style="border: 0px; margin-top: 3px;" readonly="readonly">
                    </div>
                    <label class="control-label col-md-2">자택번호
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" id="txt_member_tel" value="{{ $data['Tel'] }}" style="border: 0px; margin-top: 3px;" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">E-Mail
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="txt_member_mail" value="{{ $data['Mail'] }}" style="border: 0px; margin-top: 3px;" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">주소
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="txt_member_addr" value="{{ '(' . $data['ZipCode'] . ') ' . $data['Addr1'] . ' ' . $data['Addr2'] }}" style="border: 0px; margin-top: 3px;" readonly="readonly">
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>서포터즈 회원 기타정보</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2">대학교
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" name="university_name" value="{{ $data['UniversityName'] }}">
                    </div>
                    <label class="control-label col-md-2">전공
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" name="department" value="{{ $data['Department'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">학년
                    </label>
                    <div class="col-md-8 form-inline">
                        <div class="radio">
                            @foreach($arr_base['ccds']['721'] as $key => $val)
                                <input type="radio" id="school_year_ccd_{{ $key }}" name="school_year_ccd" class="flat" value="{{ $key }}" @if($data['SchoolYearCcd'] == $key)checked="checked"@endif/> <label for="school_year_ccd_{{ $key }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">재학여부
                    </label>
                    <div class="col-md-8 form-inline">
                        <div class="radio">
                            @foreach($arr_base['ccds']['722'] as $key => $val)
                                <input type="radio" id="is_school_ccd_{{ $key }}" name="is_school_ccd" class="flat" value="{{ $key }}" @if($data['IsSchoolCcd'] == $key)checked="checked"@endif/> <label for="is_school_ccd_{{ $key }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">응시직렬
                    </label>
                    <div class="col-md-8 form-inline">
                        <div class="radio">
                            @foreach($arr_base['ccds']['666'] as $key => $val)
                                <input type="radio" id="serial_ccd_{{ $key }}" name="serial_ccd" class="flat" value="{{ $key }}" @if($data['SerialCcd'] == $key)checked="checked"@endif/> <label for="serial_ccd_{{ $key }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">시험준비기간
                    </label>
                    <div class="col-md-8 form-inline">
                        <div class="radio">
                            @foreach($arr_base['ccds']['723'] as $key => $val)
                                <input type="radio" id="exam_period_ccd_{{ $key }}" name="exam_period_ccd" class="flat" value="{{ $key }}" @if($data['ExamPeriodCcd'] == $key)checked="checked"@endif/> <label for="exam_period_ccd_{{ $key }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">시험응시횟수
                    </label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control" name="exam_count">
                            @for($i=1; $i<=10; $i++)
                            <option value="{{ $i }}" @if($i == $data['ExamCount']) selected="selected" @endif>{{ $i }}회</option>
                            @endfor
                        </select>
                    </div>
                    <label class="control-label col-md-2">활동상태
                    </label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control" name="supporters_status_ccd">
                            @foreach($arr_base['ccds']['720'] as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['SupportersStatusCcd']) selected="selected" @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>서술항목</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <div class="col-md-8">
                        1.광은 서포터즈 지원동기
                        <textarea name="content_1" class="form-control" rows="5" title="지원동기" placeholder="">{!! $data['Content1'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8">
                        2.수험생들에게 전할 꿀팁!
                        <textarea name="content_2" class="form-control" rows="5" title="꿀팁" placeholder="">{!! $data['Content2'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8">
                        3.서포터즈에서 꼭 하고 싶어하는 것이 있다면?
                        <textarea name="content_3" class="form-control" rows="5" title="내용" placeholder="">{!! $data['Content3'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8">
                        4.서포터즈에 뽑혀야할 이유
                        <textarea name="content_4" class="form-control" rows="5" title="이유" placeholder="">{!! $data['Content4'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8">
                        기타입력란
                        <textarea name="content_5" class="form-control" rows="5" title="기타입력" placeholder="">{!! $data['Content5'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $regi_form.find('select[name="supporters_idx"]').chained("#site_code");

            $regi_form.on('change', 'input[name="mem_idx"]', function() {
                $('.search-results').removeClass('hide');

                // 회원정보 셋팅
                var mem_data = $(this).data('result-data');
                console.log(mem_data);
                $('#txt_member_idx').val(mem_data.MemIdx);
                $('#txt_member_id').val(mem_data.MemName + ' (' + mem_data.MemId + ')');
                $('#txt_member_birthday').val(mem_data.BirthDay);
                $('#txt_member_sex').val(mem_data.Sex === 'M' ? '남' : '여');
                $('#txt_member_phone').val(mem_data.Phone);
                $('#txt_member_tel').val(mem_data.Tel);
                $('#txt_member_mail').val(mem_data.Mail);
                $('#txt_member_addr').val('(' + mem_data.ZipCode + ') ' + mem_data.Addr1 + ' ' + mem_data.Addr2);
                $regi_form.find('input[name="search_mem_id"]').val('');
            });

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/site/supporters/member/") }}' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url("/site/supporters/member/store/") }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/supporters/member/") }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop