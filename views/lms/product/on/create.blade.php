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
                            <button class="btn-sm btn-success border-radius-reset mr-15 btn-reorder">카테고리검색</button>
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
                                <button class="btn-sm btn-success border-radius-reset mr-15 btn-reorder">마스터강의검색</button>
                                <span id="mastercode">마스터강의명이 출력됩니다. [강의코드]</span>
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
                            <p class="form-control-static">
                            <span  id="masterInfo">
                                [촬영형태] &nbsp;&nbsp;&nbsp;&nbsp;
                                [진행상태] &nbsp;&nbsp;&nbsp;&nbsp;
                                [제작월] &nbsp;&nbsp;&nbsp;&nbsp;
							    [첨부파일]
                            </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" >맛보기경로 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <button class="btn-sm btn-success border-radius-reset mr-15 btn-reorder">회차검색</button>
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
                            </select>
                            <select name="SubjectIdx" id="SubjectIdx"  required="required" class="form-control" title="과목">
                                <option value="">과목</option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="LecKindCcd">강좌유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            @foreach($leckind_ccd as $key => $val)
                                <input type="radio" name="LecKindCcd" value="{{$key}}" class="flat" required="required" @if($data['LecKindCcd']==$val) checked="checked"@endif> {{$val}}&nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="unitNumberCount">강의회차/강의수 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            [회차] <input type="text" name="unitNumberCount" id="unitNumberCount" value="" required="required" class="form-control" title="회차" style="width:70px;" readonly> 회
                            &nbsp;&nbsp;&nbsp;
                            [강의수] <input type="text" name="unitCount" id="unitCount" value="" required="required" class="form-control" title="강의수" style="width:70px;" readonly> 강
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="LecPeriod">수강기간/개강일 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            [수강기간] <input type="number" name="LecPeriod" id="LecPeriod" value="" required="required" class="form-control" title="수강기간" style="width:70px;"> 일
                            &nbsp;&nbsp;&nbsp;
                            [개강일] <input type="text" name="LecStartDatm" id="LecStartDatm" value="" required="required" class="form-control datepicker" readonly title="개강일" style="width:100px;">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_name">직장인/재학생반 <br>수강정보설정<span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            [정상수강시간] <input type="number" name="" id="" value="" required="required" class="form-control" title="수강기간" style="width:70px;"> 일
                            <select name="WorkerMultipleLimitCcd" id="WorkerMultipleLimitCcd" required="required" class="form-control" title="수강배수">
                                @foreach($multiplelimit_ccd as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;&nbsp;
                            [배수적용수간기간] <input type="text" name="" id="" value="" required="required" class="form-control" title="수강기간" style="width:70px;"> 일
                            &nbsp;&nbsp;&nbsp;
                            [개강일] <input type="text" name="" id="" value="" required="required" class="form-control" title="수강기간" style="width:70px;">
                        </div>
                        <BR><BR>
                        <div class="item inline-block">
                            [수강적용시간]
                            &nbsp;
                            평일
                            <select name="" id="" required="" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                            ~
                            <select name="" id="" required="" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            주말/공휴일
                            &nbsp;
                            <select name="" id="" required="" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}">{{$ii}}</option>
                                @endfor
                            </select> 시
                            ~
                            <select name="" id="" required="" class="form-control" title="">
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
                            <input type="radio" name="LecProvisionCcd" id="LecProvisionCcd" value="{{$key}}" class="flat" required="required"> {{$val}}
                            &nbsp;
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="PcProvisionCcd">PC제공구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            @foreach($contentprovision_ccd as $key => $val)
                                <input type="radio" name="PcProvisionCcd" id="PcProvisionCcd" value="{{$key}}" class="flat" required="required"> {{$val}}
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
                                <input type="radio" name="MobileProvisionCcd" id="MobileProvisionCcd" value="{{$key}}" class="flat" required="required"> {{$val}}
                                &nbsp;
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="">플레이어선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            <input type="radio" name="" id="" value="" required="required" class="flat"> 와이드
                            &nbsp;
                            <input type="radio" name="" id="" value="" required="required" class="flat"> 일반
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
                                <input type="radio" name="MultipleApplyCcd" id="MultipleApplyCcd" value="{{$key}}" required="required" class="flat"> {{$val}}
                                &nbsp;
                                @endforeach
                                &nbsp;
                                &nbsp;
                                [전체강의시간] &nbsp;<input type="number" name="LecTime" id="LecTime" value="" required="required" class="form-control" title="전체강의시간" style="width:70px;">
                            </div>
                            <Br>
                            • 접수기간 미 입력시 ‘판매여부’로 강좌 노출 설정
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_name">수강료 <span class="required">*</span>
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

                                @set($seq=0)
                                @foreach($salestype_ccd as $key=>$val)
                                    <tr>
                                        <th>{{$val}} <input type="hidden" name="SalseTypeCcd[]" value="{{$key}}"></th>
                                        <td><input type="number" name="SalePrice[]" id="SalePrice_{{$seq}}" value=""   maxlength="8" class="form-control"> 원</td>
                                        <td>
                                            <select name="SaleDiscType[]" id="SaleDiscType_{{$seq}}" class="form-control">
                                                <option value="1">%</option>
                                                <option value="2">-</option>
                                            </select>&nbsp;
                                            <input type="number" name="SaleRate[]" id="SaleRate_{{$seq}}"  value="" maxlength="8" class="form-control">
                                        </td>
                                        <td><input type="number" name="RealSalePrice[]" id="RealSalePrice_{{$seq}}"   value="" readonly class="form-control"> 원</td>
                                    </tr>
                                    @set($index = $index+1)
                                @endforeach

                            </table>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_name">강사료정산정보 <br> <button class="btn-sm btn-success border-radius-reset mr-15 btn-reorder">불러오기</button>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            •강사료 정산 담당자만 입력합니다.
                            <button class="btn btn-sm btn-primary ml-5" onclick="teacherCalculator()" id="cal">계산</button>
                        </div>
                        <div class="item inline-block">
                            <table class="table table-striped table-bordered" id='teacherDivision' width="100%">
                                <thead>
                                <tr>
                                    <th>대표교수</th>
                                    <th>교수명</th>
                                    <th>전체가격①</th>
                                    <th>안분가격②</th>
                                    <th>안분율(②/①)</th>
                                    <th>정산율</th>
                                    <th>단수적용</th>
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
                    <label class="control-label col-md-2" for="is_use">쿠폰사용결제 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
                            &nbsp;
                            <input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="">결제포인트적립 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="radio" name="is_use" class="flat" value="Y" required="required" title="결제포인트적립" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
                        [
                        <input type='text' name='' value='' numberOnly='true' class="form-control" size="2">
                        <select name="lecDiscountType_M" id="lecDiscountType_M" class="form-control">
                            <option value="1">%</option>
                            <option value="2">-</option>
                        </select> 적립
                        ]
                        &nbsp;&nbsp;
                        <input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">강좌시작일설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
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
                    <label class="control-label col-md-2" for="is_use">일시정지설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
                            [
                            총
                            <select name="lecDiscountType_M" id="lecDiscountType_M" class="form-control">
                                <option value="1">1</option>
                                <option value="1">2</option>
                            </select>
                            회
                            ]
                            <input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                            &nbsp;
                            •일시정지는 수강 잔여기간 내에서만 설정 가능
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">수강연장신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
                            [
                            총
                            <select name="lecDiscountType_M" id="lecDiscountType_M" class="form-control">
                                <option value="1">1</option>
                                <option value="1">2</option>
                            </select>
                            회
                            ]
                            <input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                            &nbsp;
                            •수강연장은 본 강좌 수강기간의 50% 범위 내에서만 가능
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">CP사정산율 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <input type='text' name='' value='' numberOnly='true' class="form-control" size="2"> % [CP사] 윌비스
                    </div>
                    <label class="control-label col-md-2" for="is_use">신규/추천 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="checkbox">
                            <input type='checkbox' name='' value='' class="flat"> 신규
                            &nbsp;&nbsp;
                            <input type='checkbox' name='' value='' class="flat"> 추천
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
                    <label class="control-label col-md-2" for="is_use">장바구니담기<br>가능여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="checkbox">
                            <input type="radio" name="" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">환불신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 불가능
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
                    <label class="control-label col-md-2" for="is_use">교재정보
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
                    <label class="control-label col-md-2" for="is_use">자동지급단강좌
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
                    <label class="control-label col-md-2" for="is_use">자동지급쿠폰
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
                    <label class="control-label col-md-2" for="is_use">자동문자발송
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            [문바발송사용여부]
                            &nbsp;&nbsp;
                            <input type="radio" name="" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 사용
                            &nbsp;
                            <input type="radio" name="" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 미사용
                            &nbsp;&nbsp;
                            • 해당 상품을 결제한 회원에게 안내 문자 발송 (결제 시 자동 발송 처리됨)
                        </div>
                        <div>
                        <textarea id="" name="" class="form-control" rows="7" title="단강좌소개" placeholder=""></textarea>
                        </div>
                        <div class="text">
                            [발신번호] <input type="text" name="" id="" size="12" class="form-control">
                            &nbsp;&nbsp;&nbsp;
                            <span>
                            0 byte
                            </span>
                             (80byte 초과시LMS문자로전환됩니다.)
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">판매여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" title="판매여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 판매가능
                            &nbsp;&nbsp;<input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 판매예정
                            &nbsp;&nbsp;<input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 판매불가
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> 사용
                            &nbsp; <input type="radio" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> 미사용
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

            /******************************** 수강료 계산 ********************************/
            //원가입력시,	할인율/금액 입력시
            $('#SalePrice_,#lecDiscount_PM').keyup(function() { priceCheck("PM") });
            //할인적용
            $("#lecDiscountType_PM").change(function() { priceCheck("PM") });
            /******************************** 수강료 계산 ********************************/


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

                    $('#RealSalePrice_'+strGubun).val(salesprice);

                }
            }



        });
    </script>
@stop
