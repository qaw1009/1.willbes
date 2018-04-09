@extends('lcms.layouts.master')

@section('content')

@php
    $disabled = '';
    if($method == 'PUT') {
        $disabled = "disabled";
    }
@endphp
    <h5>- 온라인 단강좌 상품 정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>단강좌정보</h2>  &nbsp;<button class="btn btn-success mr-10" type="button" id="">동일한 마스터강의로 등록된 단강좌 보기</button>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="LecIdx" id="LecIdx" value=""/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="cp_idx">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', $disabled) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <button type="button" id="searchCategory" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="cateInfo">고등고시> 5급행정/입법고시> 5급행정1차[x]</span>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">마스터강의불러오기 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            @if($method == 'POST')
                                <button type="button" id="searchMasterLecture" class="btn btn-sm btn-primary">마스터강의검색</button>

                                <p id="masterTitle" class="form-control-static">&nbsp;</p>
                            @else
                                마스트강의명...[강의코드]
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">마스터강좌기본정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <p id="masterInfo" class="form-control-static"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" >맛보기경로 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <button type="button" id="searchMasterLectureUnit" class="btn btn-sm btn-primary">회차검색</button>
                            <span id="sampleList">[1회차1강] 회차명이출력됩니다.</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="ProdName">단강좌명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="ProdName" name="ProdName" required="required" class="form-control" title="단강좌명" value="{{ $data['ProdName'] }}" style="width: 400px">
                        </div>
                    </div>
                    <label class="control-label col-md-2">단강좌명코드
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT') <b>{{ $data['LecIdx'] }}</b>@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="SchoolYear">단강좌기본정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <select name="SchoolYear" id="SchoolYear" required="required" class="form-control" title="대비학년도">
                                <option value="">대비학년도</option>
                                @for($i=(date('Y')+1); $i>=2010; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <select name="CourseIdx" id="CourseIdx"  required="required" class="form-control" title="과정">
                                <option value="">과정</option>
                                @foreach($courseList as $row)
                                    <option value="{{$row['CourseIdx']}}" class="{{$row['SiteCode']}}">{{$row['CourseName']}}</option>
                                @endforeach
                            </select>
                            <select name="SubjectIdx" id="SubjectIdx"  required="required" class="form-control" title="과목">
                                <option value="">과목</option>
                                @foreach($subjectList as $row)
                                    <option value="{{$row['SubjectIdx']}}" class="{{$row['SiteCode']}}">{{$row['SubjectName']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="LecKindCcd">강좌유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            @foreach($leckind_ccd as $key => $val)
                                <input type="radio" name="LecKindCcd" id="LecKindCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($loop->index == 1 || $data['LecKindCcd']==$val) checked="checked"@endif> {{$val}}&nbsp;&nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="unitNumberCount">강의회차/강의수 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            [회차] <input type="text" name="unitNumCount" id="unitNumCount" value="" required="required" class="form-control" title="회차" style="width:70px;" readonly> 회
                            &nbsp;&nbsp;&nbsp;
                            [강의수] <input type="text" name="unitNumLectureCount" id="unitNumLectureCount" value="" required="required" class="form-control" title="강의수" style="width:70px;" readonly> 강
                        </div>
                    </div>
                </div>

                <div class="form-group" id="div_LecKindCcd_1">
                    <label class="control-label col-md-2" for="studyTermCcd1">수강기간설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="radio">
                            @foreach($studyterm_ccd as $key => $val)
                                <input type="radio" name="studyTermCcd" id="studyTermCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($loop->index == 1)checked="checked"@endif> {{ $val }}&nbsp;&nbsp;
                                @if($key == "616001")
                                    <input type="number" name="LecPeriod" id="LecPeriod" class="form-control" title="수강일" style="width:70px;">일&nbsp;&nbsp;&nbsp;
                                    [개강일] <input type="text" name="LecStartDatm" id="LecStartDatm" class="form-control datepicker" title="개강일" style="width:100px;" readonly>&nbsp;&nbsp;&nbsp;
                                @elseif($key == "616002")
                                    <input type="text" name="LecEndDatm" id="LecEndDatm" class="form-control datepicker" title="수강종료일" style="width:100px" readonly>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group" id="div_LecKindCcd_2" style="display:none;">
                    <label class="control-label col-md-2" for="prof_name">직장인/재학생반 <br>수강정보설정<span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            [정상수강시간] <input type="number" name="WorkerLecPeriodBase" id="WorkerLecPeriodBase" value="" required="required" class="form-control" title="정상수강시간" style="width:50px;"> 일
                            <select name="WorkerMultipleLimitCcd" id="WorkerMultipleLimitCcd" required="required" class="form-control" title="수강배수">
                                @foreach($multiplelimit_ccd as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;&nbsp;
                            [배수적용수간기간] <input type="text" name="WorkerLecPeriod" id="WorkerLecPeriod" value="" required="required" class="form-control" title="수강기간" style="width:50px;" readonly> 일
                            &nbsp;&nbsp;&nbsp;
                            [개강일] <input type="text" name="WorkerLecStartDatm" id="WorkerLecStartDatm" class="form-control datepicker" title="개강일" style="width:100px;" readonly>&nbsp;&nbsp;&nbsp;
                        </div>
                        <BR><BR>
                        <div class="item inline-block">
                            [수강적용시간]
                            &nbsp;
                            평일
                            <select name="WorkerStudyDayStart" id="WorkerStudyDayStart" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                            ~
                            <select name="WorkerStudyDayEnd" id="WorkerStudyDayEnd" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            주말/공휴일
                            &nbsp;
                            <select name="WorkerStudyWeekendStart" id="WorkerStudyWeekendStart" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                            ~
                            <select name="WorkerStudyWeekendEnd" id="WorkerStudyWeekendEnd" required="" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_name">접수기간
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <input type="text" name="" id="" value="" required="required" class="form-control datepicker" title="접수기간" style="width:100px;" readonly>
                            &nbsp;
                            <select name="" id="" required="" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                            ~
                            <input type="text" name="" id="" value="" required="required" class="form-control datepicker" title="접수기간" style="width:100px;" readonly>
                            &nbsp;
                            <select name="" id="" required="" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                            &nbsp;&nbsp;
                            • 접수기간 미 입력시 ‘판매여부’로 강좌 노출 설정
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="LecProvisionCcd">강좌제공구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            @foreach($lecprovision_ccd as $key => $val)
                            <input type="radio" name="LecProvisionCcd" id="LecProvisionCcd" value="{{$key}}" class="flat" required="required" @if($loop->index == 1)checked="checked"@endif> {{$val}}
                            &nbsp;
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="PcProvisionCcd">PC제공구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            @foreach($contentprovision_ccd as $key => $val)
                                <input type="radio" name="PcProvisionCcd" id="PcProvisionCcd" value="{{$key}}" class="flat" required="required" @if($loop->index == 1)checked="checked"@endif> {{$val}}
                                &nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="MobileProvisionCcd">모바일제공구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            @foreach($contentprovision_ccd as $key => $val)
                                <input type="radio" name="MobileProvisionCcd" id="MobileProvisionCcd" value="{{$key}}" class="flat" required="required" @if($loop->index == 1)checked="checked"@endif> {{$val}}&nbsp;
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="">플레이어선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="checkbox">
                            @foreach($vodtype_ccd as $key => $val)
                            <input type="checkbox" name="PlayerTypeCcd" value="{{$key}}" required="required" class="flat" @if($loop->index == 1)checked="checked"@endif> {{$val}}&nbsp;
                           &nbsp;@endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="MultipleLimitCcd">수강배수정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <select name="MultipleLimitCcd" id="MultipleLimitCcd" required="required" class="form-control" title="">
                                @foreach($multiplelimit_ccd as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;
                            <div class="radio">
                                @foreach($multipleapply_ccd as $key => $val)
                                <input type="radio" name="MultipleApplyCcd" id="MultipleApplyCcd" value="{{$key}}" required="required" class="flat" @if($loop->index == 1)checked="checked"@endif> {{$val}}&nbsp;
                                @endforeach
                                &nbsp;&nbsp;
                                [전체강의시간] &nbsp;<input type="number" name="LecTime" id="LecTime" value="" required="required" class="form-control" title="전체강의시간" style="width:70px;">
                            </div>
                            <Br>
                            • 접수기간 미 입력시 ‘판매여부’로 강좌 노출 설정
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="SalseTypeCcd">수강료 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>강좌제공구분</th>
                                    <th>정상가</th>
                                    <th>할인적용</th>
                                    <th>판매가</th>
                                </tr>
                                </thead>

                                @foreach($salestype_ccd as $key=>$val)
                                    <tr>
                                        <th>{{$val}} <input type="hidden" name="SalseTypeCcd[]" id="SalseTypeCcd_{{$key}}" value="{{$key}}"></th>
                                        <td><input type="number" name="SalePrice[]" id="SalePrice_{{$key}}" value=""   maxlength="8" class="form-control" onkeyup="priceCheck('{{$key}}')"> 원</td>
                                        <td>
                                            <select name="SaleDiscType[]" id="SaleDiscType_{{$key}}" class="form-control" onchange="priceCheck('{{$key}}')">
                                                <option value="1">%</option>
                                                <option value="2">-</option>
                                            </select>&nbsp;
                                            <input type="number" name="SaleRate[]" id="SaleRate_{{$key}}"  value="" maxlength="8" class="form-control" onkeyup="priceCheck('{{$key}}')">
                                        </td>
                                        <td><input type="number" name="RealSalePrice[]" id="RealSalePrice_{{$key}}"   value="" readonly class="form-control" > 원</td>
                                    </tr>
                                @endforeach

                            </table>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">강사료정산정보 <br> <button class="btn-sm btn-success border-radius-reset mr-15 btn-reorder">불러오기</button>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="col-xs-6">
                            •강사료 정산 담당자만 입력합니다.
                        </div>
                        <div class="col-xs-4 text-right form-inline">
                            <select name="" id="" required="required" class="form-control" title="표준">
                                <option value="1">표준</option>
                                <option value="2">별도</option>
                            </select>
                            <button class="btn btn-sm btn-primary ml-3" onclick="teacherCalculator()" id="cal">계산</button>
                        </div>
                        <div class="item inline-block">
                            <table class="table table-striped table-bordered" id='teacherDivision' >
                                <thead>
                                <tr>
                                    <th width="10%">대표교수</th>
                                    <th>교수명</th>
                                    <th width="18%">전체가격①</th>
                                    <th width="18%">안분가격②</th>
                                    <th width="15%">안분율(②/①)</th>
                                    <th width="15%">정산율</th>
                                    <th  width="10%">단수적용</th>
                                </tr>
                                </thead>
                                <input type='hidden' name='totalUnitCount' value=''>
                                <tr>
                                    <td>
                                        <input type='hidden' name='wTchCode' value=''>
                                        <input type='radio' name='mainFlag' value='' class="flat">
                                    </td>
                                    <td>교수명</td>
                                    <td><input type='text' name='' value='' class="form-control" size="10"> 원</td>
                                    <td><input type='text' name='' value='' class="form-control" size="10"> 원</td>
                                    <td> 0.12345678 </td>
                                    <td><input type='text' name='' value='' class="form-control" size="5"> %</td>
                                    <td><input type='radio' name='' value='' class="flat"></td>
                                </tr>
                            </table>
                            <br>

                            • 메모<br>
                            <textarea name="content" title="내용" class="form-control" id="content"  placeholder="" rows="2"></textarea>
                            <br>
                            <table class="table table-striped table-bordered" id='teacherDivision' width="100%">
                                <colgroup>
                                    <col>
                                    <col width="12%">
                                    <col width="12%">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>메모내용</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                </tr>
                                </thead>
                                <tr>
                                    <td>메모내용</td>
                                    <td>등록자</td>
                                    <td>등록일</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsCoupon">쿠폰사용결제 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsCoupon" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsCoupon']=='Y')checked="checked"@endif/> 가능
                            &nbsp;
                            <input type="radio" name="IsCoupon" class="flat" value="N" @if($data['IsCoupon']=='N')checked="checked"@endif/> 불가능
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="IsPoint">결제포인트적립 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="radio" name="IsPoint" class="flat" value="Y" required="required" title="결제포인트적립" @if($method == 'POST' || $data['IsPoint']=='Y')checked="checked"@endif/> 가능
                        [
                        <input type='number' name='PointSavePrice' value='' class="form-control" size="2">
                        <select name="PointSaveType" id="PointSaveType" class="form-control">
                            <option value="%">%</option>
                            <option value="+">원</option>
                        </select> 적립
                        ]
                        &nbsp;&nbsp;
                        <input type="radio" name="IsPoint" class="flat" value="N" @if($data['IsPoint']=='N')checked="checked"@endif/> 불가능

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsLecStart">강좌시작일설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsLecStart" class="flat" value="Y" required="required" title="강좌시작일설정" @if($method == 'POST' || $data['IsLecStart']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="IsLecStart" class="flat" value="N" title="강좌시작일설정" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="">재수강신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="radio" name="is_use" class="flat" value="Y" required="required" title="결제포인트적립" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
                        [ 종료일 <input type='text' name='' value='' numberOnly='true' class="form-control" size="2"> 일까지 ]
                        &nbsp;&nbsp;
                        <input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsPauseLec">일시정지설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsPauseLec" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsPauseLec']=='Y')checked="checked"@endif/> 가능
                            [
                            총
                            <select name="PauseNum" id="PauseNum" class="form-control">
                                @for($i=1;$i<6;$i++)
                                <option value="{{$i}}" @if($i==3 || $i==$data['PauseNum'])selected="selected"@endif>{{$i}}</option>
                                @endfor
                            </select>
                            회
                            ]
                            <input type="radio" name="IsPauseLec" class="flat" value="N" @if($data['IsPauseLec']=='N')checked="checked"@endif/> 불가능
                            &nbsp;
                            •일시정지는 수강 잔여기간 내에서만 설정 가능
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsExtenLec">수강연장신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsExtenLec" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsExtenLec']=='Y')checked="checked"@endif/> 가능
                            [
                            총
                            <select name="ExtenLecNum" id="ExtenLecNum" class="form-control">
                                @for($i=1;$i<6;$i++)
                                    <option value="{{$i}}" @if($i==3 || $i==$data['ExtenLecNum'])selected="selected"@endif>{{$i}}</option>
                                @endfor
                            </select>
                            회
                            ]
                            <input type="radio" name="IsExtenLec" class="flat" value="N" @if($data['IsExtenLec']=='N')checked="checked"@endif/> 불가능
                            &nbsp;
                            •수강연장은 본 강좌 수강기간의 50% 범위 내에서만 가능
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="CpDistribution">CP사정산율 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" id="cpInfo">
                        <input type='hidden' name='wCpIdx' id='wCpIdx'>
                        <input type='number' name='CpDistribution' value='' class="form-control" size="2"> % [CP사] 윌비스
                    </div>
                    <label class="control-label col-md-2" for="IsNew">신규/추천 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="checkbox">
                            <input type='checkbox' name='IsNew' value='Y' class="flat"> 신규
                            &nbsp;&nbsp;
                            <input type='checkbox' name='IsBest' value='Y' class="flat"> 추천
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">첨삭사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
   &nbsp;&nbsp;                         &nbsp;
                            <input type="radio" name="" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="IsCart">장바구니담기<br>가능여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="checkbox">
                            <input type="radio" name="IsCart" class="flat" value="Y" required="required" title="장바구니담기" @if($method == 'POST' || $data['IsCart']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="IsCart" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsRefund">환불신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsRefund" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsRefund']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="IsRefund" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                            &nbsp;&nbsp;&nbsp;&nbsp;• 내강의실에서 사용자가 직접 환불신청 가능한지 여부
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">단강좌유의사항(필독)
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <textarea id="" name="" class="form-control" rows="7" title="단강좌유의사항(필독)" placeholder=""></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">단강좌소개
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <textarea id="" name="" class="form-control" rows="7" title="단강좌소개" placeholder=""></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">단강좌특징
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <textarea id="" name="" class="form-control" rows="7" title="단강좌특징" placeholder=""></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">교재정보
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <button class="btn btn-sm btn-primary ml-5" id="bookAdd">교재검색</button>
                        &nbsp;&nbsp;&nbsp;[코멘트] <input type="text" name="" id="" value="" class="form-control" size="70">
                        <BR>
                        <table class="table table-striped table-bordered" id="bookInfo" width="100%">
                            <colgroup>
                                <col width="20%">
                                <col>
                                <col width="12%">
                                <col width="12%">
                                <col width="12%">
                                <col width="5%">
                            </colgroup>
                            <tr>
                                <th>분류</th>
                                <th>교재명</th>
                                <th>정상가</th>
                                <th>판매가</th>
                                <th>판매상태</th>
                                <th>삭제</th>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">자동지급단강좌
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <button class="btn btn-sm btn-primary ml-5" id="lecAdd">단강좌검색</button>
                        &nbsp;&nbsp;&nbsp;[지급목적] <input type="text" name="" id="" value="" class="form-control" size="70">
                        <BR>
                        <table class="table table-striped table-bordered" id="lecInfo" width="100%">
                            <colgroup>
                                <col width="8%">
                                <col width="8%">
                                <col width="8%">
                                <col width="8%">
                                <col>
                                <col width="8%">
                                <col width="6%">
                                <col width="8%">
                                <col width="5%">
                            </colgroup>
                            <tr>
                                <th>분류</th>
                                <th>과정</th>
                                <th>과목</th>
                                <th>교수</th>
                                <th>단강좌명</th>
                                <th>진행상태</th>
                                <th>판매가</th>
                                <th>판매여부</th>
                                <th>삭제</th>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">자동지급쿠폰
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <button class="btn btn-sm btn-primary ml-5" id="couponAdd">쿠폰검색</button>
                        &nbsp;&nbsp;&nbsp;[지급목적] <input type="text" name="" id="" value="" class="form-control" size="70">
                        <BR>
                        <table class="table table-striped table-bordered" id="couponInfo" width="100%">
                            <colgroup>
                                <col width="8%">
                                <col width="12%">
                                <col>
                                <col width="12%">
                                <col width="12%">
                                <col width="8%">
                                <col width="5%">
                            </colgroup>
                            <tr>
                                <th>분류</th>
                                <th>쿠폰코드</th>
                                <th>쿠폰명</th>
                                <th>할인율(금액)</th>
                                <th>유효기간</th>
                                <th>쿠폰상태</th>
                                <th>삭제</th>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">자동지급사은품
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <button class="btn btn-sm btn-primary ml-5" id="gitfAdd">사은품검색</button>
                        &nbsp;&nbsp;&nbsp;[지급목적] <input type="text" name="" id="" value="" class="form-control" size="70">
                        <BR>
                        <table class="table table-striped table-bordered" id="giftInfo" width="100%">
                            <colgroup>
                                <col width="8%">
                                <col>
                                <col width="12%">
                                <col width="5%">
                            </colgroup>
                            <tr>
                                <th>분류</th>
                                <th>사은품명</th>
                                <th>재고</th>
                                <th>삭제</th>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="Keyword">키워드
                    </label>
                    <div class="col-md-8 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="Keyword" name="Keyword" class="form-control" title="키워드" value="{{ $data['wKeyword'] }}" style="width: 400px">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsSms">자동문자발송
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            [문바발송사용여부]
                            &nbsp;&nbsp;
                            <input type="radio" name="IsSms" class="flat" value="Y" required="required" title="사용여부" @if( $data['IsSms']=='Y')checked="checked"@endif/> 사용
                            &nbsp;
                            <input type="radio" name="IsSms" class="flat" value="N" @if($method == 'POST' || $data['wIsUse']=='N')checked="checked"@endif/> 미사용
                            &nbsp;&nbsp;
                            • 해당 상품을 결제한 회원에게 안내 문자 발송 (결제 시 자동 발송 처리됨)
                        </div>
                        <div>
                        <textarea id="" name="" class="form-control" rows="7" title="단강좌소개" placeholder=""></textarea>
                        </div>
                        <div class="text">
                            [발신번호] <input type="text" name="SendTel" id="SendTel" value="" size="12" class="form-control">
                            &nbsp;&nbsp;&nbsp;
                            <span>
                            0 byte
                            </span>
                             (80byte 초과시LMS문자로전환됩니다.)
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="SaleStatusCcd">판매여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            @foreach($sales_ccd as $key=>$val)
                            <input type="radio" name="SaleStatusCcd" class="flat" value="{{$key}}" required="required" title="판매여부" @if($loop->index==1 || $data['SaleStatusCcd']=='Y')checked="checked"@endif/> {{$val}}&nbsp;&nbsp;
                            @endforeach

                        </div>
                    </div>
                    <label class="control-label col-md-2" for="IsUse">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsUse" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> 사용
                            &nbsp; <input type="radio" name="IsUse" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> 미사용
                        </div>
                    </div>
                </div>

                @if(empty($lecidx) === false)
                    <div class="form-group">
                        <label class="control-label col-md-2">등록자
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['wAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">등록일
                        </label>
                        <div class="col-md-4">
                            <p class="form-control-static">{{ $data['wRegDatm'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">최종 수정자
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['wUpdAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">최종 수정일
                        </label>
                        <div class="col-md-4">
                            <p class="form-control-static">{{ $data['wUpdDatm'] }}</p>
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

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            //마스터강의검색
            $("#searchMasterLecture").on('click', function() {
                $("#searchMasterLecture").setLayer({
                    'url' : '{{ site_url('/common/searchMasterLecture/index/') }}'
                    ,'width' : 1100
                });
            });


            //강좌유형
            $("input[name='LecKindCcd']").on('ifChecked', function() {
                //alert($(this).val());
                if($(this).val() == '607003') { //직장인/재학생반
                    $('#div_LecKindCcd_2').show();$('#div_LecKindCcd_1').hide();
                } else {
                    $('#div_LecKindCcd_1').show();$('#div_LecKindCcd_2').hide();
                }
            });

            //직장인/재학생반 수강정보 계산
            $('#WorkerLecPeriodBase').keyup(function() { lecPeriodCheck() });
            $("#WorkerMultipleLimitCcd").change(function() { lecPeriodCheck() });
            function lecPeriodCheck() {
                workerlecperiod = 0;
                if($('#WorkerLecPeriod').val() != "") {
                    workerlecperiod = $('#WorkerLecPeriodBase').val() * $('#WorkerMultipleLimitCcd').val();
                }
                $('#WorkerLecPeriod').val(parseInt(workerlecperiod));
            }

            //과정, 과목 변경
            $("#CourseIdx").chained("#site_code");
            $("#SubjectIdx").chained("#site_code");



            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/product/on/lecture/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/product/on/lecture/') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/product/on/lecture/') }}' + getQueryString());
            });



        });

        //판매가격 산출
        function priceCheck(strGubun) {
            var salesprice= 0;
            if($('#SalePrice_'+strGubun).val() != "") {
                // % 계산
                if($('#SaleDiscType_'+strGubun).val() == "1") {
                    if($("#SaleRate_"+strGubun).val() != "") {
                        salesprice = parseInt($('#SalePrice_'+strGubun).val()) - (parseInt($('#SalePrice_'+strGubun).val()) * ( parseInt($('#SaleRate_'+strGubun).val()) / 100 ))
                    }
                    // - 계산
                } else {
                    if($("#lecDiscount_"+strGubun).val() != "") {
                        salesprice = parseInt($('#SalePrice_'+strGubun).val()) - $('#SaleRate_'+strGubun).val()
                    }
                }
                $('#RealSalePrice_'+strGubun).val(parseInt(salesprice));
            }
        }
    </script>
@stop
