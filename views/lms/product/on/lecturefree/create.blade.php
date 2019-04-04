@extends('lcms.layouts.master')

@section('content')

    @php
        $disabled = '';
        if($method == 'PUT') {
            $disabled = "disabled";
        }

        //메모코드 초기화
        for($i=634001; $i<634006; $i++){
            ${"MemoTypeCcd_".$i} = ''; //초기화
        }
        foreach ($data_memo as $row) {
            ${"MemoTypeCcd_".$row['MemoTypeCcd']} = $row['Memo'];
            //echo  ${"MemoTypeCcd_".$row['MemoTypeCcd']};
        }
    @endphp

    <h5>- 온라인 무료강좌 상품 정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>무료강좌정보</h2>  &nbsp;<button class="btn btn-success mr-10" type="button" id="sameLecture">동일한 마스터강의로 등록된 무료강좌 보기</button>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}

                <input type="hidden" name="ProdTypeCcd" id="ProdTypeCcd" value="{{$prodtypeccd}}"/>     <!--상품타입공통코드//-->
                <input type="hidden" name="LearnPatternCcd" id="LearnPatternCcd" value="{{$learnpatternccd}}"/>   <!--학습형태공통코드//-->
                <input type="hidden" name="ProdCode" id="ProdCode" value="{{$prodcode}}"/>

                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', $disabled) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="searchCategory">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            {{--@if($method == 'POST')--}}
                                <button type="button" id="searchCategory" class="btn btn-sm btn-primary">카테고리검색</button>
                            {{--@endif--}}
                            <input type="hidden" name="cate_code" id="cate_code" value="{{$data['CateCode']}}" required="required" title="카테고리정보">
                            <span id="selected_category">{{$data['CateRouteName']}}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="searchMasterLecture">마스터강좌불러오기 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            @if($method == 'POST')
                                <button type="button" id="searchMasterLecture" class="btn btn-sm btn-primary">마스터강좌검색</button>
                            @endif
                            <p id="masterTitle" class="form-control-static">{{$data['wLecName']}}&nbsp;</p>
                            <input type="hidden" name="wLecIdx" id="wLecIdx" value="{{$data['wLecIdx']}}" required="required" title="마스터강좌">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">마스터강좌기본정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <p id="masterInfo" class="form-control-static">
                                @if($data['wLecIdx'])
                                    [촬영형태] {{$data['wShootingCcd_Name']}} &nbsp;&nbsp;
                                    &nbsp;[진행상태] {{$data['wProgressCcd_Name']}} &nbsp;&nbsp;
                                    &nbsp;[제작월] {{$data['wMakeYM']}} &nbsp;&nbsp;
                                    @if($data['wAttachFile'])
                                        &nbsp;[첨부자료] <a href='{{ site_url('/product/on/lecture/download/').urlencode($data['wAttachPath'].$data['wAttachFile']).'/'.urlencode($data['wAttachFileReal']) }}' target="_blank">{{$data['wAttachFileReal']}}</a>
                                    @endif
                                @endif

                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" >맛보기경로 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <button type="button" id="searchMasterLectureUnit" class="btn btn-sm btn-primary">회차검색</button>
                            <p id="sampleList" class="form-control-static">&nbsp;

                                @if($method == 'PUT')
                                    @foreach($data_sample as $row)
                                        <span class="mb-5" id="unit{{$loop->index}}">
                                        <input type="hidden" name="wUnitCode[]" value="{{$row['wUnitIdx']}}">
                                    [{{$row['wUnitNum']}}회차 {{$row['wUnitLectureNum']}}강]  {{$row['wUnitName']}} <a href="javascript:;" onclick="rowDelete('unit{{$loop->index}}')"><i class="fa fa-times red"></i></a>&nbsp;&nbsp;
                                    </span>
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="FreeLecTypeCcd">무료강좌유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="item inline-block">
                            @foreach($freelectype_ccd as $key => $val)
                                <input type="radio" name="FreeLecTypeCcd" id="FreeLecTypeCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($loop->index == 1 || $data['FreeLecTypeCcd']==$key) checked="checked"@endif> {{$val}}&nbsp;&nbsp;
                            @endforeach
                            &nbsp;&nbsp;[비밀번호] <input type="text" name="FreeLecPasswd" id="FreeLecPasswd" value="{{$data['FreeLecPasswd']}}" class="form-control" title="보강동영상 비밀번호" maxlength="30" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="ProdName">무료강좌명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="ProdName" name="ProdName" required="required" class="form-control" title="무료강좌명" value="{{ $data['ProdName'] }}" style="width: 400px">
                        </div>
                    </div>
                    <label class="control-label col-md-2">무료강좌코드
                    </label>
                    <div class="col-md-4 form-inline">
                        <p class="form-control-static">@if($method == 'PUT') <b>{{ $prodcode }}</b>@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="SchoolYear">무료강좌기본정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <select name="SchoolYear" id="SchoolYear" required="required" class="form-control" title="대비학년도">
                                <option value="">대비학년도</option>
                                @for($i=(date('Y')+1); $i>=2005; $i--)
                                    <option value="{{$i}}" @if($data['SchoolYear'] == $i) selected="selected" @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="item inline-block">
                            <select name="CourseIdx" id="CourseIdx"  required="required" class="form-control" title="과정">
                                <option value="">과정</option>
                                @foreach($courseList as $row)
                                    <option value="{{$row['CourseIdx']}}" class="{{$row['SiteCode']}}" @if($data['CourseIdx'] == $row['CourseIdx']) selected="selected" @endif>{{$row['CourseName']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="item inline-block">
                            <select name="SubjectIdx" id="SubjectIdx"  required="required" class="form-control" title="과목">
                                <option value="">과목</option>
                                @foreach($subjectList as $row)
                                    <option value="{{$row['SubjectIdx']}}" class="{{$row['SiteCode']}}" @if($data['SubjectIdx'] == $row['SubjectIdx']) selected="selected" @endif>{{$row['SubjectName']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="unitNumberCount">강의수/예정강의수 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="item inline-block">
                            <!--[회차] <input type="text" name="unitNumCount" id="unitNumCount" value="{{$data['wUnitCnt']}}" required="required" class="form-control" title="회차" style="width:70px;" readonly> 회//-->
                            [강의수] <input type="text" name="unitNumLectureCount" id="unitNumLectureCount" value="{{$data['wUnitLectureCnt']}}" required="required" class="form-control" title="강의수" style="width:70px;" readonly> 강
                            &nbsp;&nbsp;
                            [예정강의수] <input type="text" name="wScheduleCount" id="wScheduleCount" value="{{$data['wScheduleCount']}}" required="required" class="form-control" title="예상강의수" style="width:70px;" readonly> 강
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" >수강기간설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            @foreach($studyterm_ccd as $key => $val)
                                <input type="radio" name="StudyPeriodCcd" id="StudyPeriodCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($loop->index == 1 || ($data['StudyPeriodCcd'] == $key))checked="checked"@endif> {{ $val }}&nbsp;&nbsp;
                                @if($key == "616001")
                                    <input type="number" name="StudyPeriod" id="StudyPeriod" class="form-control" required="required" title="수강일" value='{{$data['StudyPeriod']}}' style="width:70px;">일&nbsp;&nbsp;&nbsp;
                                    [개강일] <input type="text" name="StudyStartDate" id="StudyStartDate" class="form-control datepicker" title="개강일" value='{{$data['StudyStartDate']}}' style="width:100px;" readonly required="required">&nbsp;&nbsp;&nbsp;
                                @elseif($key == "616002")
                                    <input type="text" name="StudyEndDate" id="StudyEndDate" class="form-control datepicker" title="수강종료일" style="width:100px"  value="{{$data['StudyEndDate']}}"readonly>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">접수기간
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <input type="text" name="SaleStartDat" id="SaleStartDat" value="@if($method==='PUT'){{date("Y-m-d",strtotime($data['SaleStartDatm']))}}@endif" class="form-control datepicker" title="접수기간" style="width:100px;" >
                            &nbsp;
                            <select name="SaleStartTime" id="SaleStartTime"  class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}" @if($method==='PUT' && date("H",strtotime($data['SaleStartDatm'])) == $ii)selected="selected"@endif>{{$ii}}</option>
                                @endfor
                            </select> 시
                            ~
                            <input type="text" name="SaleEndDat" id="SaleEndDat" value="@if($method==='PUT'){{date("Y-m-d",strtotime($data['SaleEndDatm']))}}@endif"  class="form-control datepicker" title="접수기간" style="width:100px;" >
                            &nbsp;
                            <select name="SaleEndTime" id="SaleEndTime" class="form-control" title="">
                                @for($i=0;$i<=23;$i++)
                                    @if(strlen($i) == 1) {{$ii= '0'.$i}}@else{{$ii=$i}}@endif
                                    <option value="{{$ii}}" @if($method==='PUT' && date("H",strtotime($data['SaleEndDatm'])) == $ii)selected="selected"@endif>{{$ii}}</option>
                                @endfor
                            </select> 시
                            &nbsp;&nbsp;
                            • 접수기간 미 입력시 ‘판매여부’로 강좌 노출 설정
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">PC제공구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            @foreach($contentprovision_ccd as $key => $val)
                                <input type="radio" name="PcProvisionCcd" id="PcProvisionCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($loop->index == 1 || $data['PcProvisionCcd'] == $key)checked="checked"@endif> {{$val}}
                                &nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">모바일제공구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            @foreach($contentprovision_ccd as $key => $val)
                                <input type="radio" name="MobileProvisionCcd" id="MobileProvisionCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($loop->index == 1 || $data['MobileProvisionCcd'] == $key)checked="checked"@endif> {{$val}}&nbsp;
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="">플레이어선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="checkbox">
                            @foreach($vodtype_ccd as $key => $val)
                                <input type="checkbox" name="PlayerTypeCcds[]" value="{{$key}}" required="required" class="flat" @if( ($method == 'POST') || (strpos($data['PlayerTypeCcds'],trim($key)) !== false)   )checked="checked"@endif> {{$val}}&nbsp;
                                &nbsp;@endforeach
                        </div>
                    </div>
                </div>

                <!-- 포인트 적립 //-->
                <input type="hidden" name="IsPoint" id="IsPoint" value="N">
                <input type="hidden" name="PointApplyCcd" id="PointApplyCcd" value="635002">

                <!--// 가격 임의 지정 : 하단 강사료 지급 (강사 세팅) 을 위한 값  : 대표강사를 지정하기 위한 임의로 지정-->
                <input type="hidden" name="SaleTypeCcd[]" id="SaleTypeCcd_613001" value="613001">
                <input type="hidden" name="SalePriceIsUse[]" id="SalePriceIsUse_613001" value="Y">
                <input type="hidden" name="SalePrice[]" id="SalePrice_613001" value="0">
                <input type="hidden" name="SaleDiscType[]" id="SaleDiscType_613001" value="R">
                <input type="hidden" name="SaleRate[]" id="SaleRate_613001"  value="0">
                <input type="hidden" name="RealSalePrice[]" id="RealSalePrice_613001"  value="0">


                <div class="form-group">
                    <label class="control-label col-md-2">강사료정산정보 <br>
                        {{--@if($method==='POST' || empty($data_division))--}}
                            <button type="button" class="btn-sm btn-success border-radius-reset mr-15" id="searchProfessor">불러오기</button>
                        {{--@endif--}}

                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="col-xs-6">
                            •강사료 정산 담당자만 입력합니다.
                        </div>
                        <div class="col-xs-4 text-right form-inline">
                            <select name="LecCalcType" id="LecCalcType" required="required" class="form-control" title="표준">
                                <option value="1" @if($data['LecCalcType'] === '1') selected="selected"@endif>표준</option>
                                <option value="2" @if($data['LecCalcType'] === '2') selected="selected"@endif>별도</option>
                            </select>
                            <!--button class="btn btn-sm btn-primary ml-3" onclick="teacherCalculator()" id="cal">계산</button//-->
                        </div>
                        <div class="item inline-block">
                            <table class="table table-striped table-bordered" id='teacherDivision' >
                                <thead>
                                <tr>
                                    <th width="10%">대표교수</th>
                                    <th width="">교수명</th>
                                    <th width="18%">전체가격①</th>
                                    <th width="18%">안분가격②</th>
                                    <th width="15%">안분율(②/①)</th>
                                    <th width="15%">정산율</th>
                                    <th width="10%">단수적용</th>
                                </tr>
                                </thead>

                                <input type='hidden' name='rateRemain' id='rateRemain' value='0'>  <!--단수적용을 위한 나머지 값//-->
                                <input type='hidden' name='rateRemainProfIdx' id='rateRemainProfIdx' value=''> <!--단수적용 교수 코드 : 스크립트 용//-->
                                @php
                                    $rateRemain = 0;
                                    $rateRemainProfIdx = '';
                                @endphp
                                @foreach($data_division as $row)
                                    @php
                                        if(empty($data_division) !== true) {
                                            if($row['IsSingular']==='Y') {
                                                $rateRemain = $row['SingularValue'];
                                                $rateRemainProfIdx = $row['ProfIdx'];
                                            }
                                        }
                                    @endphp
                                    <tr id="{{$loop->index - 1}}">
                                        <td>
                                            <input name="ProfIdx[]" id="ProfIdx_{{$row['ProfIdx']}}" type="hidden" value="{{$row['ProfIdx']}}">
                                            <input name="IsReprProf" id="IsReprProf_{{$row['ProfIdx']}}" type="radio" value="{{$row['ProfIdx']}}" @if($row['IsReprProf']==='Y')checked="checked"@endif>
                                        </td>
                                        <td>{{$row['wProfName']}}</td>
                                        <td><input name="TotalPrice[]" class="form-control" id="TotalPrice_{{$row['ProfIdx']}}" type="text" size="10" readonly="" value="{{$row['TotalPrice']}}"> 원</td>
                                        <td><input name="ProdDivisionPrice[]" title="안분가격" class="form-control" id="ProdDivisionPrice_{{$row['ProfIdx']}}" required="required" onkeyup="rateCheck('{{$row['ProfIdx']}}')" type="text" size="10" value="{{$row['ProdDivisionPrice']}}" {{--@if($method==='PUT') readonly @endif--}}> 원</td>
                                        <td><input name="ProdDivisionRate[]" title="안분율" class="form-control" id="ProdDivisionRate_{{$row['ProfIdx']}}" required="required" type="text" size="10" readonly="" value="{{$row['ProdDivisionRate']}}"></td>
                                        <td><input name="ProdCalcRate[]" title="정산율" class="form-control" id="ProdCalcRate_{{$row['ProfIdx']}}" required="required" type="text" size="5" value="{{$row['ProdCalcRate']}}"> %</td>
                                        <td><input name="IsSingular" title="단수적용" id="IsSingular_{{$row['ProfIdx']}}" required="required" onclick="singularCheck('{{$row['ProfIdx']}}')" type="radio" value="{{$row['ProfIdx']}}" @if($row['IsSingular']==='Y') checked="checked" @endif {{--@if($method==='PUT') disabled @endif--}}></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="item inline-block">
                            <p>
                                • 메모<br>
                                <input type="hidden" name="MemoTypeCcd[]" id="MemoTypeCcd_634001" value="634001">
                                <input type="hidden" name="IsOutPut[]" id="IsOutPut_634001" value="Y">
                                <textarea name="Memo[]" title="메모" class="form-control" id="Memo_634001"  placeholder="" rows="2" cols="100"></textarea>
                            </p>
                            @if($method=='PUT' && empty($MemoTypeCcd_634001) !== true)
                                <p>
                                <table class="table table-striped table-bordered" width="100%">
                                    <colgroup>
                                        <col width="70%">
                                        <col width="12%">
                                        <col width="18%">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th>메모내용</th>
                                        <th>등록자</th>
                                        <th>등록일</th>
                                    </tr>
                                    </thead>
                                    @foreach($data_memo as $row)
                                        @if($row['MemoTypeCcd'] ==='634001')
                                            <tr>
                                                <td>{{$row['Memo']}}</td>
                                                <td>{{$row['RegAdminName']}}</td>
                                                <td>{{$row['RegDatm']}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <!--//cp 정산정보 임의 적용 -->
                <input type='hidden' name='wCpIdx' id='wCpIdx' value="{{$data['wCpIdx']}}">
                <input type='hidden' name='CpDistribution' id="CpDistribution" value='{{$data['CpDistribution']}}'>
                <div class="form-group">
                    <label class="control-label col-md-2">신규/추천
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="checkbox">
                            <input type='checkbox' name='IsNew' value='Y' class="flat" @if($data['IsNew'] == 'Y') checked="checked"@endif> 신규
                            &nbsp;&nbsp;
                            <input type='checkbox' name='IsBest' value='Y' class="flat" @if($data['IsBest'] == 'Y') checked="checked"@endif> 추천
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsRefund">선수강좌여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-6 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="LecSaleType" class="flat" value="N" required="required" title="선수강좌여부" @if($method == 'POST' || $data['LecSaleType']=='N')checked="checked"@endif/> 일반강좌
                            &nbsp;&nbsp;
                            <input type="radio" name="LecSaleType" class="flat" value="B" @if($data['LecSaleType']=='B')checked="checked"@endif/> 선수강좌
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">무료강좌<Br>유의사항(필독)
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <input type="hidden" name="ContentTypeCcd[]" value="633001">
                        <textarea id="Content_633001" name="Content[]" class="form-control" rows="7" title="유의사항(필독)" placeholder="">
                            @foreach($data_content as $row)
                                @if($row['ContentTypeCcd'] === '633001'){{$row['Content']}}@endif
                            @endforeach
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">무료강좌소개
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <input type="hidden" name="ContentTypeCcd[]" value="633002">
                        <textarea id="Content_633002" name="Content[]" class="form-control" rows="7" title="소개" placeholder="">
                            @foreach($data_content as $row)
                                @if($row['ContentTypeCcd'] === '633002'){{$row['Content']}}@endif
                            @endforeach
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">무료강좌특징
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <input type="hidden" name="ContentTypeCcd[]" value="633003">
                        <textarea id="Content_633003" name="Content[]" class="form-control" rows="7" title="특징" placeholder="">
                              @foreach($data_content as $row)
                                @if($row['ContentTypeCcd'] === '633003'){{$row['Content']}}@endif
                            @endforeach
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">구매교재정보
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <p>
                            • 해당 상품 수강 시 필요한 교재 등록
                        </p>
                        <p>
                            • 강좌 구매 시 함께 또는 별도 구매 가능하나 수강생교재는 강좌구매시에만 구매 가능 (수강생교재만 별도 구매 불가능)
                        </p>
                        <p>
                            <button type="button" class="btn btn-sm btn-primary ml-5" id="bookAdd">교재검색</button>
                            <input type="hidden" name="MemoTypeCcd[]" id="MemoTypeCcd_634002" value="634002">
                            <input type="hidden" name="IsOutPut[]" id="IsOutPut_634002" value="Y">

                            &nbsp;&nbsp;&nbsp;[코멘트] <input type="text" name="Memo[]" id="Memo_634002" value="{{$MemoTypeCcd_634002}}" class="form-control" size="70">
                        </p>
                        <table class="table table-striped table-bordered" id="bookList" width="100%">
                            <colgroup>
                                <col width="20%">
                                <col>
                                <col width="12%">
                                <col width="12%">
                                <col width="12%">
                                <col width="5%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>분류</th>
                                <th>교재명</th>
                                <th>정상가</th>
                                <th>판매가</th>
                                <th>판매상태</th>
                                <th>삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data_book as $row)
                                <tr id='bookTrId{{$loop->index}}'>
                                    <input type='hidden'  name='ProdCode_book[]' id='ProdCode_book{{$loop->index}}' value='{{$row['ProdCodeSub']}}'>
                                    <td>
                                        <select name='OptionCcd[]' id='OptionCcd{{$loop->index}}' class="form-control">
                                            @foreach($bookprovision_ccd as $key=>$val)
                                                <option value='{{$key}}' @if($row['OptionCcd'] == $key) selected="selected" @endif>{{$val}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style='text-align:left'>[{{$row['ProdCodeSub']}}] &nbsp;{{$row['bookname']}}</td>
                                    <td>{{number_format($row['SalePrice'])}}원</td>
                                    <td>{{number_format($row['RealSalePrice'])}}원</td>
                                    <td>{{$row['wSaleCcdName']}}</td>
                                    <td><a href='javascript:;' onclick="rowDelete('bookTrId{{$loop->index}}')"><i class="fa fa-times red"></i></a></td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="Keyword">사은품/무료교재<BR>배송료부과여부
                    </label>
                    <div class="col-md-10 form-inline">

                        <div class="item inline-block">
                            <input type="radio" name="IsFreebiesTrans" class="flat" value="Y" title="배송료부과여부" @if( $data['IsFreebiesTrans']=='Y')checked="checked"@endif/> 부과
                            &nbsp;
                            <input type="radio" name="IsFreebiesTrans" class="flat" value="N" title="배송료부과여부" @if($method == 'POST' || $data['IsFreebiesTrans']=='N')checked="checked"@endif/> 미부과
                        </div>
                        <p>
                            (사은품 배송료가 ‘부과’ 일 경우 함께 구매하는 교재 주문 합계의 조건이 무료 배송일 경우라도 사은품 배송료가 부과되며,
                            사은품 배송료가 ‘미부과’ 일 경우 함께 구매하는 교재 주문의 배송료는 별도 부과 처리됨)
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="Keyword">사은품/무료교재<BR>배송지 입력여부
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsDeliveryInfo" class="flat" value="Y" title="배송지 입력여부" @if( $data['IsDeliveryInfo']=='Y')checked="checked"@endif/> 입력
                            &nbsp;
                            <input type="radio" name="IsDeliveryInfo" class="flat" value="N" title="배송지 입력여부" @if($method == 'POST' || $data['IsDeliveryInfo']=='N')checked="checked"@endif/> 미입력
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="Keyword">키워드
                    </label>
                    <div class="col-md-10 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="Keyword" name="Keyword" class="form-control" title="키워드" value="{{ $data['Keyword'] }}" style="width: 400px">
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
                            <input type="radio" name="IsSms" class="flat" value="Y" required="required" title="문바발송사용여부" @if( $data['IsSms']=='Y')checked="checked"@endif/> 사용
                            &nbsp;
                            <input type="radio" name="IsSms" class="flat" value="N" @if($method == 'POST' || $data['IsSms']=='N')checked="checked"@endif/> 미사용
                            &nbsp;&nbsp;
                            • 해당 상품을 결제한 회원에게 안내 문자 발송 (결제 시 자동 발송 처리됨)
                        </div>
                        <p>
                            <textarea id="SmsMemo" name="SmsMemo" class="form-control" rows="5" cols="100" title="문자 발송" placeholder="">{{$data_sms['Memo']}}</textarea>
                        </p>
                        <div class="text">
                            [발신번호] {!! html_callback_num_select($arr_send_callback_ccd, $data_sms['SendTel'], 'SendTel', 'SendTel', '', '발신번호', '') !!}
                            &nbsp;&nbsp;&nbsp;

                            <input class="form-control border-red red" id="content_byte" style="width: 50px;" type="text" readonly="readonly" value="0">
                            <span class="red">byte</span>
                            (55byte 이상일 경우 MMS로 전환됩니다.)
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">판매여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            @foreach($sales_ccd as $key=>$val)
                                <input type="radio" name="SaleStatusCcd" class="flat" value="{{$key}}" required="required" title="판매여부" @if($loop->index==1 || $data['SaleStatusCcd'] == $key)checked="checked"@endif/> {{$val}}&nbsp;&nbsp;
                            @endforeach

                        </div>
                    </div>
                    <label class="control-label col-md-2" for="IsUse">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsUse" class="flat" value="Y" required="required" title="사용여부" @if($data['IsUse']=='Y')checked="checked"@endif/> 사용
                            &nbsp; <input type="radio" name="IsUse" class="flat" value="N" @if($method == 'POST' || $data['IsUse']=='N')checked="checked"@endif/> 미사용
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

            var $editor_1 = new cheditor();
            $editor_1.config.editorHeight = '170px';
            $editor_1.config.editorWidth = '100%';
            $editor_1.inputForm = 'Content_633001';
            $editor_1.run();

            var $editor_2 = new cheditor();
            $editor_2.config.editorHeight = '170px';
            $editor_2.config.editorWidth = '100%';
            $editor_2.inputForm = 'Content_633002';
            $editor_2.run();

            var $editor_3 = new cheditor();
            $editor_3.config.editorHeight = '170px';
            $editor_3.config.editorWidth = '100%';
            $editor_3.inputForm = 'Content_633003';
            $editor_3.run();

            var prev_val;
            $('#site_code').focus(function () {
                prev_val = $(this).val();
            }).change(function () {
                //alert(prev_val)
                if (prev_val == "") {
                    $('#site_code').blur();
                    return;
                }
                $(this).blur();
                if (confirm("사이트 변경으로 인해 입력된 값이 초기화 됩니다. 변경하시겠습니까?")) {

                    /*
                    $("#selected_category").html("");
                    $("#teacherDivision tbody").remove();
                    $("#lecList tbody").remove();
                    sitecode_chained($(this).val());    //과정.과목 재조정
                    */
                    location.reload();

                } else {
                    $(this).val(prev_val);
                    return false;
                }
            });


            //카테고리검색
            $("#searchCategory").on('click', function () {
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $("#searchCategory").setLayer({
                    'url': '{{ site_url('/common/searchCategory/index/single/site_code/') }}' + $("#site_code").val()
                    , 'width': 800
                })
            });

            //마스터강의검색
            $("#searchMasterLecture").on('click', function () {
                $("#searchMasterLecture").setLayer({
                    'url': '{{ site_url('/common/searchWMasterLecture/index/') }}'
                    , 'width': 1500
                });
            });

            //회차검색
            $('#searchMasterLectureUnit').on('click', function () {
                if ($('#wLecIdx').val() == '') {
                    alert('마스터강좌를 선택 후 회차검색을 해주세요.');
                    return;
                }
                $('#searchMasterLectureUnit').setLayer({
                    'url': '{{ site_url('common/searchWMasterLecture/unit/') }}' + $('#wLecIdx').val()
                    , 'width': 1500
                })
            });


            //과정, 과목 변경
            $("#CourseIdx").chained("#site_code");
            $("#SubjectIdx").chained("#site_code");


            //강사료정산 교수정보 추출
            $("#searchProfessor").on('click', function(){

                if($("#site_code").val() == '') { alert("운영사이트를 선택해 주세요.");return;}
                if($("#wLecIdx").val() == '') { alert("마스터강좌를 선택해 주세요.");return;}
                if($("#LearnPatternCcd").val() == '') { alert("학습형태를 선택해 주세요.");return;}

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'sitecode' : $("#site_code").val(),
                    'wlecidx' : $("#wLecIdx").val(),
                    //'learnpatternccd' : $("#LearnPatternCcd").val()
                    'learnpatternccd' : '615001'            // 단강좌로 픽스
                };

                var salesprice = $("#SalePrice_613001").val();

                if (salesprice == '') {
                    alert("PC+모바일 정상가를 입력하신 후 진행해 주세요.");return;
                }

                sendAjax('{{ site_url('common/searchWMasterLecture/wMasterLectureProfessor') }}', data, function(ret) {
                    if(ret.ret_cd) {
                        //alert( (ret.ret_data).length );

                        if((ret.ret_data).length > 0) {
                            //console.log(ret.ret_data);

                            data_array = ret.ret_data;
                            html = "";

                            $("#teacherDivision tbody").remove();   //기등록 내용 초기화

                            $("#teacherDivision").append("<tbody>")
                            for(var i in data_array) {
                                //console.log(data_array[i].wProfName + ' / ' + data_array[i].ProfIdx);
                                if(i==0) {
                                    IsReprProf_checked = "checked='checked'";
                                    IsSingular_profidx = data_array[i].ProfIdx;
                                } else {
                                    IsReprProf_checked = "";
                                }
                                html = "<tr id='"+i+"'>"
                                    +"<td>"
                                    +"<input type='hidden' name='ProfIdx[]' id='ProfIdx_"+data_array[i].ProfIdx+"' value='"+data_array[i].ProfIdx+"'>"
                                    +"<input type='radio' name='IsReprProf' id='IsReprProf_"+data_array[i].ProfIdx+"' value='"+data_array[i].ProfIdx+"' "+IsReprProf_checked+">"
                                    +"</td>"
                                    +"<td>"+data_array[i].wProfName+"</td>"
                                    +"<td><input type='text' name='TotalPrice[]' id='TotalPrice_"+data_array[i].ProfIdx+"' value='0' class='form-control' size='10' readonly> 원</td>"
                                    +"<td><input type='text' name='ProdDivisionPrice[]' id='ProdDivisionPrice_"+data_array[i].ProfIdx+"' value='0' class='form-control' size='10' readonly onkeyup=\"rateCheck('"+data_array[i].ProfIdx+"')\"  required='required' title=\'안분가격\'> 원</td>"
                                    +"<td> <input type='text' name='ProdDivisionRate[]' id='ProdDivisionRate_"+data_array[i].ProfIdx+"' value='0' class='form-control' size='10' readonly  required='required' title='안분율'>  </td>"
                                    +"<td><input type='text' name='ProdCalcRate[]' id='ProdCalcRate_"+data_array[i].ProfIdx+"' value='0' class='form-control' size=5 readonly required='required' title='정산율'> %</td>"
                                    +"<td><input type='radio' name='IsSingular' id='IsSingular_"+data_array[i].ProfIdx+"' value='"+data_array[i].ProfIdx+"' onclick=\"singularCheck('"+data_array[i].ProfIdx+"')\" "+IsReprProf_checked+" required='required' title='단수적용'></td>"
                                    +"</tr>"
                                $("#teacherDivision").append(html);
                            }
                            $("#teacherDivision").append(
                                "<tr>"
                                +"<td colspan='4'></td>"
                                +"<td><span id='rateSum'>1</span></td>"
                                +"<td colspan='2'></td></tr>"
                            )

                            //단수적용을 위한 나머지 값 저장용 필드
                            $("#teacherDivision").append("</tbody>");

                            $("#rateRemainProfIdx").val(IsSingular_profidx); //선택교수 초기화
                            $("#rateRemain").val('0');//남는안분값 초기화

                            radioclass();   //강제로 라디오버튼에 클래스를 먹이는데... 적용이 안됨.
                        } else {
                            alert("등록된 교수정보가 존재하지 않습니다.");
                        }
                    }
                }, showError, false, 'POST');
            });

            //교재검색
            $('#bookAdd').on('click', function() {
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $('#bookAdd').setLayer({
                    'url' : '{{ site_url('common/searchBook/') }}'+'?site_code='+$("#site_code").val()+'&ProdCode='+$('#ProdCode').val()
                    ,'width' : 1200
                })
            });

            //동일한 마스터강의 등록 강좌 검색
            $('#sameLecture').on('click', function() {

                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;};
                if($('#wLecIdx').val() == '') {alert('마스터강좌를 선택해 주세요.'); return;};

                $('#sameLecture').setLayer({
                    'url' : '{{ site_url('common/searchLecture/')}}'+'?site_code='+$("#site_code").val()+'&LearnPatternCcd=615005&wLecIdx='+$('#wLecIdx').val()
                    ,'width' : 1300
                })
            });

            // 바이트 수
            $('#SmsMemo').on('change keyup input', function() {
                $('#content_byte').val(fn_chk_byte($(this).val()));
            });

            @if(empty($data_sms['Memo']) !== true)
            $('#content_byte').val(fn_chk_byte($('#SmsMemo').val()));
            @endif


            // ajax submit
            $regi_form.submit(function() {

                getEditorBodyContent($editor_1);
                getEditorBodyContent($editor_2);
                getEditorBodyContent($editor_3);

                var _url = '{{ site_url('/product/on/lectureFree/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/product/on/lectureFree/') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {

                if($('input:radio[name="StudyPeriodCcd"]:checked').val() == '616002') {
                    if($('#StudyEndDate').val()=='') {
                        alert('수강종료일을 입력하여 주십시오.');return;
                    }
                }
                if($('input:radio[name="FreeLecTypeCcd"]:checked').val() == '652002') {
                    if($('#FreeLecPasswd').val()=='') {
                        alert('비밀번호를 입력하여 주십시오.');$('#FreeLecPasswd').focus();return;
                    }
                }
                return true;
            }


            $('#btn_list').click(function() {
                location.replace('{{ site_url('/product/on/lectureFree/') }}' + getQueryString());
            });
        });

        //강제로 클래스 먹임... 근데 안먹힘
        function radioclass() {
            $("input[name=mainFlag]").attr({"class":"flat"});
        }
        function rowDelete(strRow) {
            $('#'+strRow).remove();
        }


        //안분율 자동 계산
        function rateCheck(strGubun) {

            totalprice = 0;
            cipher = 100000000; //소수점 자릿수를 위한 값 - 자릿수이하 제거

            if($('#TotalPrice_'+strGubun).val() != "") {
                totalprice = parseInt($('#TotalPrice_'+strGubun).val());
            } else {
                return;
            }

            if($('#ProdDivisionPrice_'+strGubun).val() != '') {

                //---   기존 단수처리 항목이 존재할경우 초기화 처리
                remainValue = parseFloat($("#rateRemain").val());
                //기존 선택 교수코드
                selectedProfIdx = $("#rateRemainProfIdx").val();
                if(selectedProfIdx != "") {       //이미 선택된 교수정보가 존재한다면
                    $("#ProdDivisionRate_"+selectedProfIdx).val( (parseFloat($("#ProdDivisionRate_"+selectedProfIdx).val()) - (remainValue)).toFixed(8) )
                }
                //---   기존 단수처리 항목이 존재할경우 초기화 처리

                if (parseInt($('#ProdDivisionPrice_' + strGubun).val()) > totalprice) {
                    alert("안분가격을 정확히 입력하세요.");
                    return;
                }
                if(totalprice > 0) {
                    rate = parseInt($('#ProdDivisionPrice_' + strGubun).val()) / totalprice;
                } else {
                    rate = 0;
                }

                rate = (Math.floor(rate*cipher)/cipher);  //소수점 8자리 표현 (반올림 제거)
                $('#ProdDivisionRate_' + strGubun).val(rate);

                sum_rate = 0;
                //안분율 합산
                var ProdDivisionRate = document.getElementsByName('ProdDivisionRate[]') ;

                for(i=0;i<ProdDivisionRate.length;i++) {

                    if($('input[name="ProdDivisionRate[]"]')[i].value != "") {
                        sum_rate += parseFloat($('input[name="ProdDivisionRate[]"]')[i].value);
                    }
                    sum_rate=(Math.floor(sum_rate*cipher)/cipher);  //합산결과
                    $("#rateSum").html(sum_rate);
                    remain_rate = (1-sum_rate);
                    $("#rateRemain").val((remain_rate.toFixed(8)));
                }

                //남는값, 선택교수 초기화
                $("input:radio[name='IsSingular']").prop("checked", false);
                $("#rateRemainProfIdx").val('') //선택교수 초기화

            }

        }

        //단수체크
        function singularCheck(strGubun) {

            cipher = 100000000; //소수점 자릿수를 위한 값 - 자릿수이하 제거

            //남아있는 값
            remainValue = parseFloat($("#rateRemain").val());

            if(remainValue < 0) {
                alert("안분율 합이 1 을 초과합니다. 안분가격을 정확히 입력하여 주십시오.");return;
            }

            //기존 선택 교수코드
            selectedProfIdx = $("#rateRemainProfIdx").val();

            if(selectedProfIdx != "") {       //이미 선택된 교수정보가 존재한다면
                if (selectedProfIdx != strGubun) {       //선택된 교수와 선택한 교수가 다르면.. .기존 교수에서 단수를 차감함
                    $("#ProdDivisionRate_"+selectedProfIdx).val( (parseFloat($("#ProdDivisionRate_"+selectedProfIdx).val()) - (remainValue)).toFixed(8) )
                } else if(selectedProfIdx==strGubun) { //기선택한 항목과 같으면 패스
                    return;
                }
            }

            $("#rateRemainProfIdx").val(strGubun);      //선택 교수코드

            sum_remainValue = parseFloat($("#ProdDivisionRate_"+strGubun).val()) + remainValue;

            $("#ProdDivisionRate_"+strGubun).val( sum_remainValue.toFixed(8) );


            sum_rate = 0;

            //안분율 합산
            var ProdDivisionRate = document.getElementsByName('ProdDivisionRate[]') ;

            for(i=0;i<ProdDivisionRate.length;i++) {

                if($('input[name="ProdDivisionRate[]"]')[i].value != "") {
                    sum_rate += parseFloat($('input[name="ProdDivisionRate[]"]')[i].value);
                }
                sum_rate=(Math.floor(sum_rate*cipher)/cipher);  //합산결과
                $("#rateSum").html(sum_rate);
            }
        }

        function sitecode_chained(site_code) {        //운영사이트 변경으로 인한 수동 조정
            //과정, 과목 변경
            $("#CourseIdx").chained(site_code);
            $("#SubjectIdx").chained(site_code);
        }

        @if($method==='PUT')
        $('#rateRemain').val('{{$rateRemain}}');
        $('#rateRemainProfIdx').val('{{$rateRemainProfIdx}}');
        @endif

    </script>

@stop
