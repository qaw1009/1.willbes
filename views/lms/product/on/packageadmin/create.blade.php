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

    <h5>- 온라인 운영자패키지 상품 정보를 관리하는 메뉴입니다.(운영자패키지 : 운영자가 구성한 강좌를 할인을 적용한 패키지)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>운영자패키지정보</h2>
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
                    <label class="control-label col-md-2" >패키지유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                                @foreach($packtype_ccd as $key => $val)
                                    <input type="radio" name="PackTypeCcd" id="PackTypeCcd{{$loop->index}}" value="{{$key}}" title='패키지유형' class="flat" required="required" @if($loop->index == 1 || $data['PackTypeCcd']==$key) checked="checked"@endif> {{$val}}&nbsp;&nbsp;
                                @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" >패키지분류 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            @foreach($packcate_ccd as $key => $val)
                                <input type="radio" name="PackCateCcd" id="PackCateCcd{{$loop->index}}" value="{{$key}}" title='패키지분류' class="flat" required="required" @if(($method=="POST" && $loop->index == 1) || $data['PackCateCcd']==$key) checked="checked"@endif> {{$val}}&nbsp;&nbsp;
                            @endforeach
                            <input type="text" name="PackCateEtcMemo" id="PackCateEtcMemo"  class="form-control"  style="width: 200px" value="{{$data['PackCateEtcMemo']}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="ProdName">패키지명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="ProdName" name="ProdName" required="required" class="form-control" title="패키지명" value="{{ $data['ProdName'] }}" style="width: 400px">
                        </div>
                    </div>
                    <label class="control-label col-md-2">패키지코드
                    </label>
                    <div class="col-md-4 form-inline">
                        <p class="form-control-static">@if($method == 'PUT') <b>{{ $prodcode }}</b>@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="SchoolYear">패키지기본정보 <span class="required">*</span>
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
                    </div>
                    <label class="control-label col-md-2" for="StudyPeriod">수강기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="item inline-block">
                            [수강기간] <input type="number" name="StudyPeriod" id="StudyPeriod" class="form-control" required="required" title="수강일" value='{{$data['StudyPeriod']}}' style="width:70px;">일&nbsp;&nbsp;&nbsp;
                            [개강일] <input type="text" name="StudyStartDate" id="StudyStartDate" class="form-control datepicker" title="개강일" value='{{$data['StudyStartDate']}}' style="width:100px;" readonly required="required">&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="unitNumberCount">수강료 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            @foreach($salestype_ccd as $key=>$val)
                                @if($key == '613001')
                                    @php
                                            $SalePriceIsUse = '';
                                            $SalePrice = '';
                                            $SaleDiscType = '';
                                            $SaleRate = '';
                                            $RealSalePrice = '';
                                    @endphp
                                    @if($method === 'PUT')
                                        @foreach($data_sale as $row)
                                            @php
                                                if(trim($key) == trim($row['SaleTypeCcd'])) {
                                                    $SalePriceIsUse = $row['SalePriceIsUse'];
                                                    $SalePrice = $row['SalePrice'];
                                                    $SaleDiscType = $row['SaleDiscType'];
                                                    $SaleRate = $row['SaleRate'];
                                                    $RealSalePrice = $row['RealSalePrice'];
                                                }
                                            @endphp
                                        @endforeach
                                    @endif
                                        <input type="hidden" name="SaleTypeCcd[]" id="SaleTypeCcd_{{$key}}" value="{{$key}}">
                                        <input type="hidden" name="SalePriceIsUse[]" id="SalePriceIsUse_{{$key}}" value="Y">
                                        [정상가] <input type="number" name="SalePrice[]" id="SalePrice_{{$key}}" value="{{$SalePrice}}"   maxlength="8" class="form-control" onkeyup="priceCheck('{{$key}}')" @if($key=="613001")required="required"@endif title="정상가"> 원
                                        &nbsp;&nbsp;
                                        [할인율]
                                            <select name="SaleDiscType[]" id="SaleDiscType_{{$key}}" class="form-control" onchange="priceCheck('{{$key}}')">
                                                <option value="R" @if($SaleDiscType == 'R') selected="selected"@endif>%</option>
                                                <option value="P" @if($SaleDiscType == 'p') selected="selected"@endif>-</option>
                                            </select>&nbsp;
                                            <input type="number" name="SaleRate[]" id="SaleRate_{{$key}}"  value="@if($method=="POST"){{0}}@else{{$SaleRate}}@endif" maxlength="8" class="form-control" onkeyup="priceCheck('{{$key}}')" @if($key=="613001")required="required"@endif title="할인">
                                        &nbsp;&nbsp;
                                        [판매가]
                                    <input type="number" name="RealSalePrice[]" id="RealSalePrice_{{$key}}"  value="{{$RealSalePrice}}" readonly class="form-control" @if($key=="613001")required="required"@endif title="판매가"> 원
                                    </tr>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" >필수과목강좌구성 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <p><button type="button" class="btn btn-sm btn-primary ml-5" id="essLecAdd">단강좌검색</button>
                            <!--button type="button" class="btn btn-sm btn-primary ml-5" id="">정렬변경</button//-->
                        </p>
                        <table class="table table-striped table-bordered" id="essLecList" width="100%">
                            <tr>
                                <th>그룹</th>
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
                            @foreach($data_sublecture as $row)
                                @if($row['IsEssential'] ==='Y')
                                <tr name='essLecTrId' id='essLecTrId{{$loop->index}}'>
                                    <input type='hidden'  name='ProdCodeSub[]' id='ProdCodeSub{{$loop->index}}' value='{{$row['ProdCodeSub']}}'>
                                    <input type='hidden'  name='essLecAddCheck[]' id='essLecAddCheck{{$loop->index}}' value='Y'>
                                    <input type='hidden'  name='IsEssential[]' id='IsEssential{{$loop->index}}' value='Y'>
                                    <td>
                                        <select name='SubGroupName[]' id='SubGroupNamel{{$loop->index}}' class="form-control mr-10">
                                            @for($i=1;$i<6;$i++)
                                                <option value='{{$i}}' @if($i ==$row['SubGroupName']) selected="selected" @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>{{$row['CateName']}}</td>
                                    <td>{{$row['CourseName']}}</td>
                                    <td>{{$row['SubjectName']}}</td>
                                    <td>{{$row['wProfName_String']}}</td>
                                    <td style='text-align:left'>{{$row['ProdName']}}</td>
                                    <td>{{$row['wProgressCcd_Name']}} ({{$row['wUnitCnt']}}/{{$row['wUnitLectureCnt']}})</td>
                                    <td>{{number_format($row['RealSalePrice'])}}원</td>
                                    <td>{!!  $row['SaleStatusCcd_Name'] === '판매불가' ? '<font color=red>'.$row['SaleStatusCcd_Name'].'</font>' :$row['SaleStatusCcd_Name'] !!}</td>
                                    <td><a href='javascript:;' onclick="rowDelete('essLecTrId{{$loop->index}}')"><i class="fa fa-times red"></i></a></td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" >선택과목강좌구성 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <p><button type="button" class="btn btn-sm btn-primary ml-5" id="selLecAdd">단강좌검색</button>
                            &nbsp;&nbsp;
                            [선택과목 선택개수] <input type="number" name="PackSelCount" id="PackSelCount" value="{{$data['PackSelCount']}}" class="form-control" style="width: 50px;" title="선택과목 선택개수">개
                            <!--button type="button" class="btn btn-sm btn-primary ml-5" id="">정렬변경</button//-->
                        </p>
                        <table class="table table-striped table-bordered" id="selLecList" width="100%">
                            <tr>
                                <th>그룹</th>
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
                            @foreach($data_sublecture as $row)
                                @if($row['IsEssential'] !=='Y')
                                <tr name='selLecTrId' id='selLecTrId{{$loop->index}}'>
                                    <input type='hidden'  name='ProdCodeSub[]' id='ProdCodeSub{{$loop->index}}' value='{{$row['ProdCodeSub']}}'>
                                    <input type='hidden'  name='selLecAddCheck[]' id='selLecAddCheck{{$loop->index}}' value='Y'>
                                    <input type='hidden'  name='IsEssential[]' id='IsEssential{{$loop->index}}' value='N'>
                                    <td>
                                            <select name='SubGroupName[]' id='SubGroupNamel{{$loop->index}}' class="form-control mr-10">
                                                @for($i=1;$i<6;$i++)
                                                    <option value='{{$i}}' @if($i ==$row['SubGroupName']) selected="selected" @endif>{{$i}}</option>
                                                @endfor
                                            </select>
                                    </td>
                                    <td>{{$row['CateName']}}</td>
                                    <td>{{$row['CourseName']}}</td>
                                    <td>{{$row['SubjectName']}}</td>
                                    <td>{{$row['wProfName_String']}}</td>
                                    <td style='text-align:left'>{{$row['ProdName']}}</td>
                                    <td>{{$row['wProgressCcd_Name']}} ({{$row['wUnitCnt']}}/{{$row['wUnitLectureCnt']}})</td>
                                    <td>{{number_format($row['RealSalePrice'])}}원</td>
                                    <td>{!!  $row['SaleStatusCcd_Name'] === '판매불가' ? '<font color=red>'.$row['SaleStatusCcd_Name'].'</font>' :$row['SaleStatusCcd_Name'] !!}</td>
                                    <td><a href='javascript:;' onclick="rowDelete('selLecTrId{{$loop->index}}')"><i class="fa fa-times red"></i></a></td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
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
                    <label class="control-label col-md-2">모바일제공구분 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            @foreach($contentprovision_ccd as $key => $val)
                                <input type="radio" name="MobileProvisionCcd" id="MobileProvisionCcd{{$loop->index}}" value="{{$key}}" class="flat" required="required" @if($loop->index == 1 || $data['MobileProvisionCcd'] == $key)checked="checked"@endif> {{$val}}&nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">플레이어선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="checkbox">
                            @foreach($vodtype_ccd as $key => $val)
                            <input type="checkbox" name="PlayerTypeCcds[]" value="{{$key}}" required="required" class="flat" @if( ($method == 'POST') || (strpos($data['PlayerTypeCcds'],trim($key)) !== false)   )checked="checked"@endif> {{$val}}&nbsp;
                           &nbsp;@endforeach
                        </div>
                    </div>
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
                    <label class="control-label col-md-2" for="MultipleApply">수강배수정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="item inline-block">
                            <select name="MultipleApply" id="MultipleApply" required="required" class="form-control" title="">
                                @foreach($multiplelimit_ccd as $key => $val)
                                    <option value="{{$key}}" @if($data['MultipleApply'] == $key)selected="selected"@endif>{{$val}}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;
                            <div class="radio">
                                @foreach($multipleapply_ccd as $key => $val)
                                <input type="radio" name="MultipleTypeCcd" id="MultipleTypeCcd" value="{{$key}}" required="required" class="flat" @if($loop->index == 1 || $data['MultipleTypeCcd'] == $key )checked="checked"@endif> {{$val}}&nbsp;
                                @endforeach
                                &nbsp;&nbsp;
                                [전체강의시간] &nbsp;<input type="number" name="AllLecTime" id="AllLecTime" value="{{$data['AllLecTime']}}" required="required" class="form-control" title="전체강의시간" style="width:70px;"> 분
                                <!--input type="hidden" name="AllLecTime_hidden" id="AllLecTime_hidden" value=""//-->
                            </div>
                            <Br>
                            • 배수 적용 시 정수 이하 소수점은 반올림 처리되어 수강시간 제공
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">강사료정산정보 <br>
                        {{--@if($method==='POST' || empty($data_division))--}}
                        <p>
                        <button type="button" class="btn-sm btn-success border-radius-reset mr-15" id="searchProfessor">불러오기</button>
                        </p>
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
                            <table class="table table-striped table-bordered" id='teacherDivision' width="100%">
                                <thead>
                                <tr>
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
                                $rateRemain = '';
                                $rateRemainProfIdx = '';
                                $rateSum = 0;
                            @endphp

                            @if(empty($data_division) === false)

                                @foreach($data_division as $row)
                                    @php
                                        if(empty($data_division) !== true) {
                                            if($row['IsSingular']==='Y') {
                                                $rateRemain = $row['SingularValue'];
                                                $rateRemainProfIdx = $row['ProfIdx'].'-'.$row['ProdCodeSub'];
                                            }
                                        }
                                        $rateSum = $rateSum + floatval($row['ProdDivisionRate']);
                                    @endphp
                                    <tr id="{{$loop->index - 1}}">
                                        <input name="ProfIdx[]" id="ProfIdx_{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}" type="hidden" value="{{$row['ProfIdx']}}">
                                        <input name="ProdCodeDiv[]" id="ProdCodeDiv_{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}" type="hidden" value="{{$row['ProdCodeSub']}}">
                                        <td>[{{$row['wProfName']}}] {{$row['ProdNameSub']}}</td>
                                        <td><input name="TotalPrice[]" class="form-control" id="TotalPrice_{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}" type="text" size="10" readonly="" value="{{$row['TotalPrice']}}"> 원</td>
                                        <td><input name="ProdDivisionPrice[]" title="안분가격" class="form-control" id="ProdDivisionPrice_{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}" required="required" onkeyup="rateCheck('{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}')" type="text" size="10" value="{{$row['ProdDivisionPrice']}}" {{--@if($method==='PUT') readonly @endif--}}> 원</td>
                                        <td><input name="ProdDivisionRate[]" title="안분율" class="form-control" id="ProdDivisionRate_{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}" required="required" type="text" size="10" readonly="" value="{{$row['ProdDivisionRate']}}"></td>
                                        <td><input name="ProdCalcRate[]" title="정산율" class="form-control" id="ProdCalcRate_{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}" required="required" type="text" size="5" value="{{$row['ProdCalcRate']}}"> %</td>
                                        <td><input name="IsSingular" title="단수적용" id="IsSingular_{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}" required="required" onclick="singularCheck('{{$row['ProfIdx']}}-{{$row['ProdCodeSub']}}')" type="radio" value="{{$row['ProfIdx']}}" @if($row['IsSingular']==='Y') checked="checked" @endif {{--@if($method==='PUT') disabled @endif--}}></td>
                                    </tr>
                                @endforeach
                                    <tr><td colspan="3"></td><td><span id="rateSum">{{{$rateSum}}}</span></td><td colspan="2"></td></tr>
                            @endif
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
                        <input type="radio" name="IsPoint" class="flat" value="Y" required="required" title="결제포인트적립" @if($data['IsPoint']=='Y')checked="checked"@endif/> 가능
                        [
                        <select name="PointApplyCcd" id="PointApplyCcd"  class="form-control" title="포인트지급타입">
                            @foreach($pointapply_ccd as $key => $val)
                                <option value="{{$key}}" @if($data['PointApplyCcd'] == $key) selected="selected" @endif>{{$val}}</option>
                            @endforeach
                        </select>
                        <input type='number' name='PointSavePrice' value='@if($method==="POST"){{0}}@else{{$data['PointSavePrice']}}@endif' title="결제포인트적립" class="form-control" size="5" required="required" >
                        <select name="PointSaveType" id="PointSaveType" class="form-control">
                            <option value="R" @if($data['PointSaveType'] == 'R')selected="selected"@endif>%</option>
                            <option value="P" @if($data['PointSaveType'] == 'P')selected="selected"@endif>원</option>
                        </select> 적립
                        ]
                        &nbsp;&nbsp;
                        <input type="radio" name="IsPoint" class="flat" value="N" @if($method == 'POST' || $data['IsPoint']=='N')checked="checked"@endif/> 불가능

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsLecStart">강좌시작일설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsLecStart" class="flat" value="Y" required="required" title="강좌시작일설정" @if($data['IsLecStart']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="IsLecStart" class="flat" value="N" title="강좌시작일설정" @if($method == 'POST' || $data['IsLecStart']=='N')checked="checked"@endif/> 불가능
                            &nbsp;
                            •수강기간설정 조건이 '수강기간'일 경우 시작일이 개강일보다 빠르면 개강일에 맞춰 자동 시작
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsPause">일시정지설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsPause" class="flat" value="Y" required="required" title="일시정지설정" @if($data['IsPause']=='Y')checked="checked"@endif/> 가능
                            [
                            총
                            <select name="PauseNum" id="PauseNum" class="form-control">
                                @for($i=1;$i<6;$i++)
                                    <option value="{{$i}}" @if( ($method=='POST' && $i==3) || trim($i) == $data['PauseNum'])selected="selected"@endif>{{$i}}</option>
                                @endfor
                            </select>
                            회
                            ]
                            <input type="radio" name="IsPause" class="flat" value="N" @if($method == 'POST' || $data['IsPause']=='N')checked="checked"@endif/> 불가능
                            &nbsp;
                            •일시정지는 수강 잔여기간 내에서만 설정 가능
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsExten">수강연장신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsExten" class="flat" value="Y" required="required" title="수강연장신청" @if($data['IsExten']=='Y')checked="checked"@endif/> 가능
                            [
                            총
                            <select name="ExtenNum" id="ExtenNum" class="form-control">
                                @for($i=1;$i<6;$i++)
                                    <option value="{{$i}}" @if( ($method=='POST' && $i==3) || trim($i) == $data['ExtenNum'])selected="selected"@endif>{{$i}}</option>
                                @endfor
                            </select>
                            회
                            ]
                            <input type="radio" name="IsExten" class="flat" value="N" @if($method == 'POST' || $data['IsExten']=='N')checked="checked"@endif/> 불가능
                            &nbsp;
                            •수강연장은 본 강좌 수강기간의 50% 범위 내에서만 가능
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsRetake">재수강신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <input type="radio" name="IsRetake" class="flat" value="Y" required="required" title="재수강신청" @if($data['IsRetake']=='Y')checked="checked"@endif/> 가능
                        &nbsp;&nbsp;
                        [할인율] <input type="number" name="RetakeSaleRate" id="RetakeSaleRate" value="@if($method == 'POST'){{0}}@else{{$data['RetakeSaleRate']}}@endif" class="form-control" size="2"> %
                        &nbsp;&nbsp;
                        [신청가능기간] 수강종료 후 <input type='number' name='RetakePeriod' value='{{$data['RetakePeriod']}} ' class="form-control" size="2"> 일까지 ]
                        &nbsp;&nbsp;
                        <input type="radio" name="IsRetake" class="flat" value="N" @if($method == 'POST' || $data['IsRetake']=='N')checked="checked"@endif/> 불가능
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-2" for="IsTpass">T-pass 자료실사용 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsTpass" class="flat" value="Y" title="T-pass 자료실사용" @if($data['IsTpass']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;                         &nbsp;
                            <input type="radio" name="IsTpass" class="flat" value="N" title="T-pass 자료실사용" @if($method == 'POST' || $data['IsTpass']=='N')checked="checked"@endif/> 불가능
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsRefund">환불신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsRefund" class="flat" value="Y" required="required" title="사용여부" @if($data['IsRefund']=='Y')checked="checked"@endif/> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="IsRefund" class="flat" value="N" @if($method == 'POST' || $data['IsRefund']=='N')checked="checked"@endif/> 불가능
                            &nbsp;&nbsp;&nbsp;&nbsp;• 내강의실에서 사용자가 직접 환불신청 가능한지 여부
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">패키지유의사항(필독)
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
                    <label class="control-label col-md-2">패키지소개
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
                    <label class="control-label col-md-2">패키지특징
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
                    <label class="control-label col-md-2">패키지설명
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <input type="hidden" name="ContentTypeCcd[]" value="633004">
                        <textarea id="Content_633004" name="Content[]" class="form-control" rows="7" title="설명" placeholder="">
                              @foreach($data_content as $row)
                                @if($row['ContentTypeCcd'] === '633004'){{$row['Content']}}@endif
                            @endforeach
                        </textarea>
                    </div>
                </div>

                  <div class="form-group">
                    <label class="control-label col-md-2">자동지급단강좌
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <p>
                            • 해당 상품 구매시 혜택으로 제공될 단강좌(0원) 등록 (신청 시 장바구니담기 또는 바로결제 시 자동 지급되어 결제 처리)
                        </p>
                        <p>
                            <button type="button" class="btn btn-sm btn-primary ml-5" id="lecAdd">단강좌검색</button>
                            <input type="hidden" name="MemoTypeCcd[]" id="MemoTypeCcd_634003" value="634003">
                            <input type="hidden" name="IsOutPut[]" id="IsOutPut_634003" value="Y">
                            &nbsp;&nbsp;&nbsp;[지급목적] <input type="text" name="Memo[]" id="Memo_634003" value="{{$MemoTypeCcd_634003}}" class="form-control" size="70">
                        </p>
                        <table class="table table-striped table-bordered" id="lecList" width="100%">

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

                            @foreach($data_autolec as $row)
                                <tr name='lecTrId' id='lecTrId{{$loop->index}}'>
                                    <input type='hidden'  name='ProdCode_lecture[]' id='ProdCode_lecture{{$loop->index}}' value='{{$row['ProdCodeSub']}}'>
                                    <td>{{$row['CateName']}}</td>
                                    <td>{{$row['CourseName']}}</td>
                                    <td>{{$row['SubjectName']}}</td>
                                    <td>{{$row['wProfName_String']}}</td>
                                    <td style='text-align:left'>{{$row['ProdName']}}</td>
                                    <td>{{$row['wProgressCcd_Name']}} ({{$row['wUnitCnt']}}/{{$row['wUnitLectureCnt']}})</td>
                                    <td>{{number_format($row['RealSalePrice'])}}원</td>
                                    <td>{!!  $row['SaleStatusCcd_Name'] === '판매불가' ? '<font color=red>'.$row['SaleStatusCcd_Name'].'</font>' :$row['SaleStatusCcd_Name'] !!}</td>
                                    <td><a href='javascript:;' onclick="rowDelete('lecTrId{{$loop->index}}')"><i class="fa fa-times red"></i></a></td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">자동지급쿠폰
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <p>
                            • 해당 상품 구매 시 혜택으로 제공될 쿠폰 등록 (결제 후 내강의실 > 나의쿠폰 메뉴에 자동 지급 처리)
                        </p>
                        <p>
                            <button type="button" class="btn btn-sm btn-primary ml-5" id="couponAdd">쿠폰검색</button>
                            <input type="hidden" name="MemoTypeCcd[]" id="MemoTypeCcd_634004" value="634004">
                            <input type="hidden" name="IsOutPut[]" id="IsOutPut_634004" value="Y">
                            &nbsp;&nbsp;&nbsp;[지급목적] <input type="text" name="Memo[]" id="Memo_634004" value="{{$MemoTypeCcd_634004}}" class="form-control" size="70">
                        </p>
                        <table class="table table-striped table-bordered" id="couponList" width="100%">
                            <colgroup>
                                <col width="12%">
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

                            @foreach($data_autocoupon as $row)
                                <tr id='couponTrId{{$loop->index}}'>
                                    <input type='hidden'  name='CouponIdx[]' id='CouponIdx{{$loop->index}}' value='{{$row['AutoCouponIdx']}}'>
                                    <td>{{$row['ApplyTypeCcdName']}}</td>
                                    <td>{{$row['AutoCouponIdx']}}</td>
                                    <td style='text-align:left'>{{$row['CouponName']}}</td>
                                    <td>{{number_format($row['AutoCouponIdx']).(($row['DiscType'] === 'R') ? '%' : '원')}}</td>
                                    <td>{{$row['ValidDay']}}</td>
                                    <td>{{$row['IssueValid']}}</td>
                                    <td><a href='javascript:;' onclick="rowDelete('couponTrId{{$loop->index}}')"><i class="fa fa-times red"></i></a></td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">자동지급사은품
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <p>
                            • 해당 상품 구매시 무료 혜택으로 제공될 사은품 등록 (신청 시 장바구니 담기 또는 바로결제 시 자동 지급되어 결제 처리)
                        </p>

                        <p>
                            <button type="button" class="btn btn-sm btn-primary ml-5" id="freebieAdd">사은품검색</button>
                            <input type="hidden" name="MemoTypeCcd[]" id="MemoTypeCcd_634005" value="634005">
                            <input type="hidden" name="IsOutPut[]" id="IsOutPut_634005" value="Y">
                            &nbsp;&nbsp;&nbsp;[지급목적] <input type="text" name="Memo[]" id="Memo_634005" value="{{$MemoTypeCcd_634005}}" class="form-control" size="70">
                        </p>

                        <table class="table table-striped table-bordered" id="freebieList" width="100%">
                            <colgroup>
                                <col width="8%">
                                <col>
                                <col width="12%">
                                <col width="8%">
                                <col width="5%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>코드</th>
                                <th>사은품명</th>
                                <th>환불책정가</th>
                                <th>재고</th>
                                <th>삭제</th>
                            </tr>
                            </thead>

                            @foreach($data_autofreebie as $row)
                                <tr id="freebieTrId{{$loop->index}}">
                                    <input name="ProdCode_freebie[]" id="ProdCode_freebie{{$loop->index}}" type="hidden" value="{{$row['ProdCodeSub']}}">
                                    <td>{{$row['ProdCodeSub']}}</td>
                                    <td style="text-align: left;">{{$row['ProdName']}}</td>
                                    <td>{{number_format($row['RefundSetPrice'])}}원</td>
                                    <td>{{number_format($row['Stock'])}}</td>
                                    <td><a onclick="rowDelete('freebieTrId{{$loop->index}}')" href="javascript:;"><i class="fa fa-times red"></i></a></td>
                                </tr>
                            @endforeach

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

                <div class="form-group">
                    <label class="control-label col-md-2">외부수강업체연동
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="item inline-block">
                            <select name="ExternalCorpCcd" id="ExternalCorpCcd"  class="form-control" title="외부수강업체">
                                <option value="">외부수강업체</option>
                                @foreach($extcorp_ccd as $key => $val)
                                    <option value="{{$key}}" @if($data['ExternalCorpCcd'] == $key) selected="selected" @endif>{{$val}}</option>
                                @endforeach
                            </select>
                            &nbsp;
                            [연동코드] <input type="text" name="ExternalLinkCode" id="ExternalLinkCode" class="form-control" title="외부업체 사용 코드" style="width: 150px" value="{{$data['ExternalLinkCode']}}">
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

            var $editor_4 = new cheditor();
            $editor_4.config.editorHeight = '170px';
            $editor_4.config.editorWidth = '100%';
            $editor_4.inputForm = 'Content_633004';
            $editor_4.run();

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
                    //$("#regi_form")[0].reset();
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

            //과정, 과목 변경
            $("#CourseIdx").chained("#site_code");

            $regi_form.on('ifChecked', 'input[name="PackCateCcd"]', function () {
                if($(this).val() == '649001') {
                    $("#CourseIdx").attr("disabled", false);
                } else {
                    $("#CourseIdx").attr("disabled", true);
                }
            });


            @if($data['PackCateCcd'] == '649001')
                $("#CourseIdx").attr("disabled", false);
            @else
                $("#CourseIdx").attr("disabled", true);
            @endif


            //강사료정산 교수정보 추출
            $("#searchProfessor").on('click', function(){

                if($('input:radio[name="PackTypeCcd"]:checked').val() != '648001') { alert("일반형패키지에서만 강사료정산이 가능합니다.");return;}
                if($("#site_code").val() == '') { alert("운영사이트를 선택해 주세요.");return;}
                if( $("input[name='essLecAddCheck[]']").length == 0) { alert('필수과목강좌구성을 선택하여 주십시오.');$('#essLecAdd').focus();return;}

                var salesprice = $("#SalePrice_613001").val();
                if (salesprice == '') {
                    alert("정상가를 입력하신 후 진행해 주세요.");return;
                }
                var prodcode_arr = [];
                var prodcode_cnt = $("input[name='essLecAddCheck[]']").length;

                for(i=0;i<prodcode_cnt;i++) {
                    prodcode_arr.push( $("input[name='ProdCodeSub[]']").eq(i).attr("value") );
                }

                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'sitecode' : $("#site_code").val(),
                    'learnpatternccd' : $("#LearnPatternCcd").val(),
                    'prodcode' : prodcode_arr
                };

                sendAjax('{{ site_url('common/searchWMasterLecture/wMasterLectureProfessorFromLecture') }}', data, function(ret) {
                    if(ret.ret_cd) {
                        //alert( (ret.ret_data).length );

                        if((ret.ret_data).length > 0) {
                            //console.log(ret.ret_data);

                            data_array = ret.ret_data;
                            html = "";

                            $("#teacherDivision tbody").remove();   //기등록 내용 초기화

                            $("#teacherDivision").append("<tbody>");
                            for(var i in data_array) {
                                //console.log(data_array[i].wProfName + ' / ' + data_array[i].ProfIdx);

                                html = "<tr id='"+i+"'>"
                                    +"<input type='hidden' name='ProfIdx[]' id='ProfIdx_"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"' value='"+data_array[i].ProfIdx+"'>"
                                    +"<input type='hidden' name='ProdCodeDiv[]' id='ProdCodeDiv_"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"' value='"+data_array[i].ProdCode+"'>"
                                    +"<td>["+data_array[i].wProfName+"] "+data_array[i].ProdName+"</td>"
                                    +"<td><input type='text' name='TotalPrice[]' id='TotalPrice_"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"' value='"+salesprice+"' class='form-control' size='10' readonly> 원</td>"
                                    +"<td><input type='text' name='ProdDivisionPrice[]' id='ProdDivisionPrice_"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"' value='' class='form-control' size='10' onkeyup=\"rateCheck('"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"')\"  required='required' title=\'안분가격\'> 원</td>"
                                    +"<td> <input type='text' name='ProdDivisionRate[]' id='ProdDivisionRate_"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"' value='' class='form-control' size='10' readonly  required='required' title='안분율'>  </td>"
                                    +"<td><input type='text' name='ProdCalcRate[]' id='ProdCalcRate_"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"' value='"+data_array[i].CalcRate+"' class='form-control' size=5 required='required' title='정산율'> %</td>"
                                    +"<td><input type='radio' name='IsSingular' id='IsSingular_"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"' value='"+data_array[i].ProfIdx+"' onclick=\"singularCheck('"+data_array[i].ProfIdx+'-'+data_array[i].ProdCode+"')\" required='required' title='단수적용'></td>"
                                    +"</tr>"
                                $("#teacherDivision").append(html);
                            }
                            $("#teacherDivision").append(
                                "<tr>"
                                +"<td colspan='3'></td>"
                                +"<td><span id='rateSum'>&nbsp;</span></td>"
                                +"<td colspan='2'></td></tr>"
                            )

                            //단수적용을 위한 나머지 값 저장용 필드
                            $("#teacherDivision").append("</tbody>");

                            $("#rateRemainProfIdx").val(''); //선택교수 초기화
                            $("#rateRemain").val('');//남는안분값 초기화

                        } else {
                            alert("등록된 교수정보가 존재하지 않습니다.");
                        }
                    }
                }, showError, false, 'POST');
            });

            //단강좌검색
            $('#lecAdd,#essLecAdd,#selLecAdd').on('click', function(e) {
                var id = e.target.getAttribute('id');

                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}

                if($('input:radio[name="PackTypeCcd"]:checked').val() == '648001' && id=='selLecAdd') {alert("일반형 패키지의 경우 선택과목을 선택할 수 없습니다.");return;}

                $('#'+id).setLayer({
                    'url' : '{{ site_url('common/searchLecture/')}}'+'?site_code='+$("#site_code").val()+'&LearnPatternCcd=615001&locationid='+id+'&ProdCode='+$('#ProdCode').val()+'&cate_code='+$('#cate_code').val()
                    ,'width' : 1200
                })
            });

            //쿠폰검색
            $('#couponAdd').on('click', function() {
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $('#couponAdd').setLayer({
                    'url' : '{{ site_url('common/searchCoupon/') }}'+'?site_code='+$("#site_code").val()+'&ProdCode='+$('#ProdCode').val()+'&deploy_type=N'
                    ,'width' : 900
                })
            });

            //사은품검색
            $('#freebieAdd').on('click', function() {
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $('#freebieAdd').setLayer({
                    'url' : '{{ site_url('common/searchFreebie/') }}'+'?site_code='+$("#site_code").val()+'&ProdCode='+$('#ProdCode').val()
                    ,'width' : 900
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
                getEditorBodyContent($editor_4);

                //선택과목 지우기  : addValidate 에서 처리가 안됨
                if($('input:radio[name="PackTypeCcd"]:checked').val() == '648001') {
                    $("tr[name='selLecTrId']").remove();
                    $("#PackSelCount").val('0');
                }

                var _url = '{{ site_url('/product/on/packageAdmin/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/product/on/packageAdmin/') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if( $("input[name='essLecAddCheck[]']").length == 0) {
                    alert('필수과목강좌구성을 선택하여 주십시오.');$('#essLecAdd').focus();return;
                }

                if($('input:radio[name="PackTypeCcd"]:checked').val() == '648002') {

                    if ($("#PackSelCount").val() == "") {
                        alert('선택과목 선택개수 입력하여 주십시오.');
                        $('#PackSelCount').focus();
                        return;
                    }
                    if ($("input[name='selLecAddCheck[]']").length == 0) {
                        alert('선택과목강좌구성을 선택하여 주십시오.');
                        $('#selLecAdd').focus();
                        return;
                    }

                }

                return true;
            }

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/product/on/packageAdmin/') }}' + getQueryString());
            });
        });


        function rowDelete(strRow) {
            $('#'+strRow).remove();
        }

        //판매가격 산출
        function priceCheck(strGubun) {
            var salesprice= 0;
            if($('#SalePrice_'+strGubun).val() != "") {
                // % 계산
                if($('#SaleDiscType_'+strGubun).val() == "R") {
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
                        console.log($('input[name="ProdDivisionRate[]"]')[i].value + ' -- ');
                        sum_rate += parseFloat($('input[name="ProdDivisionRate[]"]')[i].value);
                    }
                    //console.log(sum_rate);
                    //sum_rate=(Math.floor(sum_rate*cipher)/cipher);  //합산결과
               }

                $("#rateSum").html(sum_rate.toFixed(8));
                remain_rate = (1-parseFloat(sum_rate));
                $("#rateRemain").val((remain_rate.toFixed(8)));

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
        }

        @if($method==='PUT')
            $('#rateRemain').val('{{$rateRemain}}');
            $('#rateRemainProfIdx').val('{{$rateRemainProfIdx}}');
        @endif

    </script>

@stop
