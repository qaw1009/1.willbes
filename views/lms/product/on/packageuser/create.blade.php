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
        }
    @endphp



    <h5>- 온라인 사용자패키지 상품 정보를 관리하는 메뉴입니다.(사용자패키지 : 사용자가 선택한 강좌 갯수에 따라 할인을 적용하는 패키지)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>사용자패키지정보</h2>  &nbsp;
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
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="SchoolYear">강좌구성 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <p><button type="button" class="btn btn-sm btn-primary ml-5" id="subLecAdd">단강좌검색</button>
                        <!--button type="button" class="btn btn-sm btn-primary ml-5" id="">정렬변경</button//-->
                        </p>
                        <table class="table table-striped table-bordered" id="subLecList" width="100%">
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
                            @foreach($data_sublecture as $row)
                                <tr name='subLecTrId' id='subLecTrId{{$loop->index}}'>
                                    <input type='hidden'  name='ProdCodeSub[]' id='ProdCodeSub{{$loop->index}}' value='{{$row['ProdCodeSub']}}'>
                                    <input type='hidden'  name='IsEssential[]' id='IsEssential{{$loop->index}}' value='{{$row['IsEssential']}}'>
                                    <td>{{$row['CateName']}}</td>
                                    <td>{{$row['CourseName']}}</td>
                                    <td>{{$row['SubjectName']}}</td>
                                    <td>{{$row['wProfName_String']}}</td>
                                    <td style='text-align:left'>[{{$row['ProdCodeSub']}}] {{$row['ProdName']}}</td>
                                    <td>{{$row['wProgressCcd_Name']}} ({{$row['wUnitLectureCnt']}}@if(empty($row['wScheduleCount']) == false)/{{$row['wScheduleCount']}}@endif)</td>
                                    <td>{{number_format($row['RealSalePrice'])}}원</td>
                                    <td>{!!  $row['SaleStatusCcd_Name'] === '판매불가' ? '<font color=red>'.$row['SaleStatusCcd_Name'].'</font>' :$row['SaleStatusCcd_Name'] !!}</td>
                                    <td><a href='javascript:;' onclick="rowDelete('subLecTrId{{$loop->index}}')"><i class="fa fa-times red"></i></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="SchoolYear">패키지할인정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-7 form-inline">
                        <p>패키지 내 강좌 선택 개수에 따른 할인율 및 수강연장을 설정해 주세요. (수강연장 미 입력시 반영 되지 않음)</p>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th width="10%">선택</th>
                                <th width="20%">할인개수</th>
                                <th width="30%">할인율</th>
                                <th width="">수강연장</th>
                            </tr>
                            @for($i=1;$i<5;$i++)
                                    @php
                                        $select_OrderNum = '';
                                        $select_IsApply = '';
                                        $select_DiscNum = '';
                                        $select_DiscRate = '';
                                        $select_LecExten = '';
                                        foreach($data_packsaleinfo as $row) {
                                            if($row['OrderNum'] == $i) {
                                                $select_OrderNum = $row['OrderNum'];
                                                $select_IsApply = $row['IsApply'];
                                                $select_DiscNum = $row['DiscNum'];
                                                $select_DiscRate = $row['DiscRate'];
                                                $select_LecExten = $row['LecExten'];
                                            }
                                        }
                                    @endphp
                                <tr>
                                    <td>
                                        <input type="hidden" name="OrderNum[]" value="{{$i}}">
                                        <input type="checkbox" id="IsApply_{{$i}}" name="IsApply[]" value="{{$i}}" class="flat" @if($select_IsApply == 'Y') checked="checked" @endif></td>
                                    <td>
                                        <select name="DiscNum[]" id="DiscNum_{{$i}}" class="form-control">d
                                            @for($k=2;$k<6;$k++)
                                                <option value="{{$k}}" @if($select_DiscNum == $k) selected="selected" @endif>{{$k}}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td><input type="number" name="DiscRate[]" id="DiscRate_{{$i}}" value="{{$select_DiscRate}}" style="width: 80px;" maxlength="2" class="form-control" >%</td>
                                    <td><input type="number" name="LecExten[]" id="LecExten_{{$i}}" value="{{$select_LecExten}}" style="width: 80px;" maxlength="3" class="form-control" >일</td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="SchoolYear">강좌선택개수제한 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <div class="item inline-block">
                            <input type="radio" name="IsSelLecCount" class="flat" value="Y" required="required" title="강좌선택개수제한" @if($method == 'POST' || $data['IsSelLecCount']=='Y')checked="checked"@endif/> 제한
                            &nbsp;
                            <input type="number" name="SelCount" id="SelCount" value="{{$data['SelCount']}}" style="width: 80px;" maxlength="3" class="form-control" >개
                            &nbsp;
                            &nbsp;
                            <input type="radio" name="IsSelLecCount" class="flat" value="N" @if($data['IsSelLecCount']=='N')checked="checked"@endif/> 제한없음
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
                    <label class="control-label col-md-2" for="MultipleApply">수강배수정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">

                        <div class="item inline-block">
                            <p>
                            <input type="radio" name="IsPackMultipleType" required="required" class="flat" value="S" @if($method == 'POST' || $data['IsPackMultipleType']=='S')checked="checked"@endif/> 단강좌 속성 기준
                            <div style="display: none">
                            <input type="radio" name="IsPackMultipleType" required="required" class="flat" value="P" @if($data['IsPackMultipleType']=='P')checked="checked"@endif/> 패키지 속성 기준
                            </div>
                            </p>

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
                                [전체강의시간] &nbsp;<input type="number" name="AllLecTime" id="AllLecTime" value="{{$data['AllLecTime']}}"  class="form-control" title="전체강의시간" style="width:70px;"> 분
                                <!--input type="hidden" name="AllLecTime_hidden" id="AllLecTime_hidden" value=""//-->
                            </div>
                            <Br>
                            • 배수 적용 시 정수 이하 소수점은 반올림 처리되어 수강시간 제공
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsCoupon">쿠폰사용결제 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsCoupon" class="flat" value="Y" required="required" title="사용여부" @if($data['IsCoupon']=='Y')checked="checked"@endif/> 가능
                            &nbsp;
                            <input type="radio" name="IsCoupon" class="flat" value="N" @if($method == 'POST' || $data['IsCoupon']=='N')checked="checked"@endif/> 불가능
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="IsPoint">결제포인트적립 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <input type="radio" name="IsPoint" class="flat" value="Y" required="required" title="결제포인트적립" @if( $data['IsPoint']=='Y')checked="checked"@endif/> 가능
                        [
                        <select name="PointApplyCcd" id="PointApplyCcd"  class="form-control" title="포인트지급타입">
                            @foreach($pointapply_ccd as $key => $val)
                                <option value="{{$key}}" @if($data['PointApplyCcd'] == $key) selected="selected" @endif>{{$val}}</option>
                            @endforeach
                        </select>
                        <input type='number' name='PointSavePrice' value='@if($method==="POST"){{0}}@else{{$data['PointSavePrice']}}@endif' title="결제포인트적립" class="form-control" size="5"  required="required" >
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
                            <input type="radio" name="IsPackLecStartType" required="required" class="flat" value="S" @if($method == 'POST' || $data['IsPackLecStartType']=='S')checked="checked"@endif/> 단강좌 속성 기준
                            &nbsp;&nbsp;
                            <div style="display: none">
                            <input type="radio" name="IsPackLecStartType" required="required" class="flat" value="P" @if($data['IsPackLecStartType']=='P')checked="checked"@endif disabled/> 패키지 속성 기준
                            (
                            <input type="radio" name="IsLecStart" class="flat" value="Y" title="강좌시작일설정" @if($data['IsLecStart']=='Y')checked="checked"@endif /> 가능
                            &nbsp;&nbsp;
                            <input type="radio" name="IsLecStart" class="flat" value="N" title="강좌시작일설정" @if($data['IsLecStart']=='N')checked="checked"@endif/> 불가능
                            )
                            </div>
                            &nbsp;&nbsp;
                            [개강일] <input type="text" name="StudyStartDate" id="StudyStartDate" class="form-control datepicker" title="개강일" value='{{$data['StudyStartDate']}}' style="width:100px;" readonly required="required">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsPause">일시정지설정 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="item inline-block">
                            <input type="radio" name="IsPackPauseType" class="flat" value="S" @if($method == 'POST' || $data['IsPackPauseType']=='S')checked="checked"@endif/> 단강좌 속성 기준
                            &nbsp;&nbsp;
                            <div style="display: none">
                            <input type="radio" name="IsPackPauseType" class="flat" value="P" @if($data['IsPackPauseType']=='P')checked="checked"@endif disabled/> 패키지 속성 기준
                            (
                            <input type="radio" name="IsPause" class="flat" value="Y"  title="일시정지설정" @if($data['IsPause']=='Y')checked="checked"@endif/> 가능
                            [
                            총
                            <select name="PauseNum" id="PauseNum" class="form-control">
                                @for($i=1;$i<6;$i++)
                                    <option value="{{$i}}" @if( ($method=='POST' && $i==3) || trim($i) == $data['PauseNum'])selected="selected"@endif>{{$i}}</option>
                                @endfor
                            </select>
                            회
                            ]
                            &nbsp;
                            <input type="radio" name="IsPause" class="flat" value="N" @if($data['IsPause']=='N')checked="checked"@endif/> 불가능
                            )
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsExten">수강연장신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item" >
                        <div class="item inline-block">
                            <input type="radio" name="IsPackExtenType" class="flat" value="S" @if($method == 'POST' || $data['IsPackExtenType']=='S')checked="checked"@endif/> 단강좌 속성 기준
                            &nbsp;&nbsp;
                            <div style="display: none">
                            <input type="radio" name="IsPackExtenType" class="flat" value="P" @if($data['IsPackExtenType']=='P')checked="checked"@endif disabled/> 패키지 속성 기준
                            (
                            <input type="radio" name="IsExten" class="flat" value="Y" title="수강연장신청" @if($data['IsExten']=='Y')checked="checked"@endif/> 가능
                            [
                            총
                            <select name="ExtenNum" id="ExtenNum" class="form-control">
                                @for($i=1;$i<6;$i++)
                                    <option value="{{$i}}" @if( ($method=='POST' && $i==3) || trim($i) == $data['ExtenNum'])selected="selected"@endif>{{$i}}</option>
                                @endfor
                            </select>
                            회
                            ]
                            &nbsp;
                            <input type="radio" name="IsExten" class="flat" value="N" @if($data['IsExten']=='N')checked="checked"@endif/> 불가능
                            )
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsRetake">재수강신청 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <input type="radio" name="IsPackRetakeType" class="flat" value="S" @if($method == 'POST' || $data['IsPackRetakeType']=='S')checked="checked"@endif/> 단강좌 속성 기준
                        &nbsp;&nbsp;
                        <div style="display: none">
                        <input type="radio" name="IsPackRetakeType" class="flat" value="P" @if($data['IsPackRetakeType']=='P')checked="checked"@endif disabled/> 패키지 속성 기준
                        (
                        <input type="radio" name="IsRetake" class="flat" value="Y" title="재수강신청" @if($data['IsRetake']=='Y')checked="checked"@endif/> 가능
                        &nbsp;&nbsp;
                        [할인율] <input type="number" name="RetakeSaleRate" id="RetakeSaleRate" value="@if($method == 'POST'){{0}}@else{{$data['RetakeSaleRate']}}@endif" class="form-control" style="width: 80px"> %
                        &nbsp;&nbsp;
                        [신청가능기간] 수강종료 후 <input type='number' id="RetakePeriod" name='RetakePeriod' value='{{$data['RetakePeriod']}} ' class="form-control" size="2" style="width: 80px" > 일까지 ]
                        &nbsp;&nbsp;
                        <input type="radio" name="IsRetake" class="flat" value="N" @if($data['IsRetake']=='N')checked="checked"@endif/> 불가능
                        )
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
                                    <td>{{$row['wProgressCcd_Name']}} ({{$row['wUnitLectureCnt']}}@if(empty($row['wScheduleCount']) == false)/{{$row['wScheduleCount']}}@endif)</td>
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

            //단강좌검색
            $('#lecAdd,#subLecAdd').on('click', function(e) {
                var id = e.target.getAttribute('id');
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $('#'+id).setLayer({
                    'url' : '{{ site_url('common/searchLecture/')}}'+'?site_code='+$("#site_code").val()+'&LearnPatternCcd=615001&locationid='+id+'&ProdCode='+$('#ProdCode').val()+'&cate_code='+$('#cate_code').val()
                    ,'width' : 1300
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

                var _url = '{{ site_url('/product/on/packageUser/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/product/on/packageUser/') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {

                if( $("input[name='ProdCodeSub[]']").length == 0) {
                  alert('강좌구성을 선택하여 주십시오.');$('#subLecAdd').focus();return;
                }

                if($('input:checkbox[name="IsApply[]"]').is(":checked") == false) {
                    alert('패키지할인 정보를 선택하여 주십시오.');$('input[name="IsApply[]"]:eq(0)').focus();return;
                }

                for($i=1;$i<5;$i++){
                    if ($('input:checkbox[id="IsApply_'+$i+'"]').is(":checked") == true) {
                        if($("#DiscRate_"+$i).val() == '') {
                            alert('할인율을 입력하여 주십시오');$("#DiscRate_"+$i).focus();return;
                        }
                    }
                }

                if($('input:radio[name="IsSelLecCount"]:checked').val() == 'Y') {
                    if($('#SelCount').val()=='') {
                        alert('강좌선택개수를 입력하여 주십시오.');$('#SelCount').focus();return;
                    }
                }

                if($('input:radio[name="IsPackMultipleType"]:checked').val() == 'P') {
                    if($('#AllLecTime').val()=='') {
                        alert('전체강의시간을 입력하여 주십시오.');$('#AllLecTime').focus();return;
                    }
                }

                if($('input:radio[name="IsPackLecStartType"]:checked').val() == 'P') {
                    if( !($('input:radio[name="IsLecStart"]').is(":checked")) ) {
                        alert('강좌시작일설정을 선택하여 주십시오.(가능/불가능 선택)');$('input:radio[name="IsLecStart"]:eq(0)').focus();return;
                    }
                }

                if($('input:radio[name="IsPackPauseType"]:checked').val() == 'P') {
                    if( !($('input:radio[name="IsPause"]').is(":checked")) ) {
                        alert('일시정지설정을 선택하여 주십시오.(가능/불가능 선택)');$('input:radio[name="IsPause"]:eq(0)').focus();return;
                    }
                }

                if($('input:radio[name="IsPackExtenType"]:checked').val() == 'P') {
                    if( !($('input:radio[name="IsExten"]').is(":checked")) ) {
                        alert('수강연장신청을 선택하여 주십시오.(가능/불가능 선택)');$('input:radio[name="IsExten"]:eq(0)').focus();return;
                    }
                }

                if($('input:radio[name="IsPackRetakeType"]:checked').val() == 'P') {
                    if( !($('input:radio[name="IsRetake"]').is(":checked")) ) {
                        alert('재수강신청을 선택하여 주십시오.(가능/불가능 선택)');$('input:radio[name="IsRetake"]:eq(0)').focus();return;
                    }
                    if( $('input:radio[name="IsRetake"]:checked').val() == 'Y') {
                        if($('#RetakeSaleRate').val() == '') {
                            alert('할인율을 입력하여 주십시오.');$('#RetakeSaleRate').focus();return;
                        }
                        if($('#RetakePeriod').val() == '') {
                            alert('신청가능기간을 입력하여 주십시오.');$('#RetakePeriod').focus();return;
                        }
                    }
                }

                return true;
            }


            $('#btn_list').click(function() {
                location.replace('{{ site_url('/product/on/packageUser/') }}' + getQueryString());
            });
        });


        function rowDelete(strRow) {
            $('#'+strRow).remove();
        }
    </script>

@stop
