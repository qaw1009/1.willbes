@extends('lcms.layouts.master')
@section('content')
    <h5>- 강좌지급 인증정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>강좌/인증정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" id="idx" value="{{ $idx }}"/>

                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        {!! html_site_select( $data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', ($method == 'PUT' ? 'disabled' : ''), false, $arr_site_code ) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="searchCategory">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">
                                @if(empty($data['CateInfo']) === false)
                                    @foreach($data['CateInfo'] as $idx => $row)
                                        <span class="pr-10">
                                            {{$row[key($row)]}}
                                            <a href="#none" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="cate_code[]" value="{{key($row)}}"/>
                                        </span>
                                    @endforeach
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="Title">제목 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="Title" name="Title" required="required" class="form-control" title="제목" value="{{ $data['Title'] }}" style="width: 400px">
                        </div>
                    </div>
                    <label class="control-label col-md-2">인증코드
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            @if($method == 'POST')
                                <p class="form-control-static"># 등록 시 자동 생성</p>
                            @else
                                <input type="text" id="AgCode" name="AgCode" class="form-control" title="인증코드" value="{{ $data['AgCode'] }}" >
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">승인유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-6 form-inline item" >
                        <div class="item inline-block">
                            <input type="radio" name="IsAutoApproval" class="flat" value="N" title="승인유형" @if($method == 'POST' || $data['IsAutoApproval']=='N')checked="checked"@endif/>
                            &nbsp;수동승인(관리자 승인 처리 시 자동지급)
                            &nbsp;&nbsp;
                            <input type="radio" name="IsAutoApproval" class="flat" value="Y" title="승인유형"  @if($data['IsAutoApproval']=='Y')checked="checked"@endif/>
                            &nbsp;자동승인(사용자 신청 시 자동지급)
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="AuthStartDate">인증기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <input type="text" name="AuthStartDate" id="AuthStartDate" class="form-control datepicker" title="시작일" value='{{$data['AuthStartDate']}}' style="width:100px;" readonly required="required">
                            ~
                            <input type="text" name="AuthEndDate" id="AuthEndDate" class="form-control datepicker" title="종료일" value='{{$data['AuthEndDate']}}' style="width:100px;" readonly required="required">
                        </div>
                    </div>
                    <label class="control-label col-md-2">강좌지급방법 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            @foreach($pay_route_ccd as $key => $val)
                            <input type="radio" name="PayRouteCcd" class="flat" value="{{ $val }}" required="required" title="강좌지급방법" @if($loop->index === 1 || $data['PayRouteCcd'] == $val)checked="checked"@endif/>
                            &nbsp;{{$key}}&nbsp;&nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">수강제공기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <div class="item inline-block">
                            <input type="radio" name="StudyPeriodType" class="flat" value="P" title="수강제공기간" @if($method == 'POST' || $data['StudyPeriodType']=='P')checked="checked"@endif/>
                            &nbsp;상품 수강기간
{{--                            <input type="radio" name="StudyPeriodType" class="flat" value="E" title="수강제공기간"  @if($data['StudyPeriodType']=='E')checked="checked"@endif/>--}}
{{--                            &nbsp;별도 수강기간--}}
{{--                            <input type="number" class="form-control" name="StudyPeriod" id="StudyPeriod" style="width: 50px" value="{{ $data['StudyPeriod'] }}"> 일--}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">제공강좌 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <p>
                            <button type="button" class="btn btn-sm btn-primary ml-5" id="authLecAdd">단강좌검색</button>
                            &nbsp;&nbsp;
                            [강좌선택갯수] <input type="number" class="form-control" name="LimitSelectCnt" id="LimitSelectCnt" style="width: 50px" value="{{ $data['LimitSelectCnt'] }}"> 까지
                        </p>
                        <table class="table table-striped table-bordered authLecList" id="authLecList" width="100%">
                            <tr>
                                <th width="9%">그룹</th>
                                <th width="12%">분류</th>
                                <th width="12%">과목</th>
                                <th width="9%">교수</th>
                                <th>강좌명</th>
                                <th width="7%">사용여부</th>
                                <th width="7%">필수여부</th>
                                <th width="7%">정렬</th>
                                <th width="5%">삭제</th>
                            </tr>
                            @foreach($data_product as $row)
                                <tr>
                                    <input type='hidden'  name='ProdCode[]' value='{{$row['ProdCode']}}'>
                                    <td>
                                        <select name='SubGroupName[]' class="form-control mr-10">
                                            @for($i=1; $i<=100; $i++)
                                                <option value='{{$i}}' @if($i == $row['GroupNum']) selected="selected" @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>{{$row['CourseName']}}</td>
                                    <td>{{$row['SubjectName']}}</td>
                                    <td>{{$row['wProfName_String']}}</td>
                                    <td>[{{$row['ProdCode']}}] {{$row['ProdName']}}</td>
                                    <td>{!! $row['IsUse'] == 'Y' ? '사용' : '<span class="red">미사용</span>' !!}</td>
                                    <td>
                                        <select name='IsEssential[]' class='form-control mr-10'>
                                            <option value='Y' @if($row['IsEssential'] === 'Y') selected="selected" @endif>Y</option>
                                            <option value='N' @if($row['IsEssential'] === 'N') selected="selected" @endif>N</option>
                                        </select>
                                    </td>
                                    <td><input type='number' name='OrderNum[]' class="form-control" style='width:50px' value="{{$row['OrderNum']}}"></td>
                                    <td><a href="#none" class="selected-product-delete"><i class="fa fa-times red"></i></a></td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsSms">자동문자발송
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            [문자발송사용여부]
                            &nbsp;&nbsp;
                            <input type="radio" name="IsUseSms" class="flat" value="Y" required="required" title="문자발송사용여부" @if( $data['IsUseSms']=='Y')checked="checked"@endif/> 사용
                            &nbsp;
                            <input type="radio" name="IsUseSms" class="flat" value="N" @if($method == 'POST' || $data['IsUseSms']=='N')checked="checked"@endif/> 미사용
                        </div>
                        <p>
                            <textarea id="SmsContent" name="SmsContent" class="form-control" rows="5" cols="100" title="문자 발송" placeholder="">{{ $data['SmsContent'] }}</textarea>
                        </p>
                        <div class="text">
                            [발신번호] {!! html_callback_num_select($arr_send_callback_ccd, $data['SendTel'], 'SendTel', 'SendTel', '', '발신번호', '') !!}
                            &nbsp;&nbsp;&nbsp;
                            <input type="text" readonly="readonly" class="form-control border-red red" id="content_length" value="0" style="width: 50px;"> <span class="red">글자</span>
                            <input type="text" readonly="readonly" class="form-control border-red red" id="content_byte" value="0" style="width: 50px;"> <span class="red">byte</span>
                            (80byte 초과 시 LMS문자로 전환됩니다.)
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="Memo">안내문구
                    </label>
                    <div class="col-md-10 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="Memo" name="Memo" class="form-control" title="안내문구" value="{{ $data['Memo'] }}" style="width: 800px">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsUse">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsUse" class="flat" value="Y" required="required" title="사용여부" @if( $data['IsUse']=='Y')checked="checked"@endif/> 사용
                            &nbsp;
                            <input type="radio" name="IsUse" class="flat" value="N" title="사용여부" @if($method == 'POST' || $data['IsUse']=='N')checked="checked"@endif/> 미사용
                        </div>
                    </div>
                </div>

                @if($method === 'PUT')
                    <div class="form-group">
                        <label class="control-label col-md-2">등록자
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">등록일
                        </label>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                        </div>
                    </div>
                @endif
                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            $regi_form.find('select[name="site_code"]').focus(function () {
                prev_val = $(this).val();
            }).change(function () {
                if (prev_val == "") {
                    $regi_form.find('select[name="site_code"]').blur();
                    return;
                }
                $(this).blur();
                if (confirm("사이트 변경으로 인해 입력된 정보가 초기화 됩니다. 변경하시겠습니까?")) {
                    $("#selected_category, #selected_table_lecture").html("");
                } else {
                    $(this).val($prev_val);
                    return false;
                }
            });

            // 카테고리 검색
            $('#btn_category_search').on('click', function(event) {
                var site_code = $regi_form.find('select[name="site_code"]').val();
                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.')
                    return;
                }
                $('#btn_category_search').setLayer({
                    'url' : '{{site_url('/common/searchCategory/index/multiple/site_code/')}}' + site_code,
                    'width' : 900
                });
            });

            // 카테고리 삭제
            $regi_form.on('click', '.selected-category-delete', function() {
                $(this).parent().remove();
            });

            //단강좌검색
            $('#authLecAdd').on('click', function(e) {
                var id = e.target.getAttribute('id');
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $('#'+id).setLayer({
                    'url' : '{{ site_url('common/searchLecture/')}}'+'?site_code='+$("#site_code").val()+'&LearnPatternCcd=615001&locationid='+id
                    ,'width' : 1500
                })
            });

            // 강좌 삭제
            $regi_form.on('click', '#authLecList .selected-product-delete', function() {
                $(this).parent().parent().remove();
            });

            // 바이트 수
            $('#SmsContent').on('change keyup input', function() {
                $('#content_byte').val(fn_chk_byte($(this).val()));
                $('#content_length').val(fn_chk_text_length($(this).val(), 'space'));
            });

            @if(empty($data['SmsContent']) !== true)
                $('#content_byte').val(fn_chk_byte($('#SmsContent').val()));
                $('#content_length').val(fn_chk_text_length($('#SmsContent').val(), 'space'));
            @endif

            // ajax submit
            $regi_form.submit(function() {

                if($('#content_length').val() > 1000 || $('#content_byte').val() > 2000) {
                    alert('자동문자발송 내용은 공백포함 1000글자, 2000바이트 이내로 전송 가능합니다.'); return;
                }
                var _url = '{{ site_url('/site/authgive/authGive/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/site/authgive/authGive/') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if($regi_form.find("input[name='cate_code[]']").length <= 0) {
                    alert("카테고리는 필수 선택입니다.");$("#btn_category_search").focus();return;
                }
                return true;
            }

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/site/authgive/authGive/') }}' + getQueryString());
            });
        });
    </script>
@stop
