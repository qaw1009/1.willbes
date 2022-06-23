@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 기본정보를 관리합니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>합격예측기본정보등록</h2>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['PredictIdx'] : '' }}">
                <input type="hidden" name="Info" value="">
                <input type="hidden" id="GroupCcd" name="GroupCcd">

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="SiteCode">운영사이트<span class="required">*</span></label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select($data['SiteCode'], 'SiteCode', 'SiteCode', '', '운영 사이트', 'required', ($method == 'PUT'?'disabled':''), false) !!}
                    </div>
                    <label class="control-label col-md-1-1" for="site_code">서비스코드</label>
                    <div class="col-md-4">
                        <div class="form-control-static">{{ (empty($data['PredictIdx']) === false) ? $data['PredictIdx'] : ''}}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="ProdName">서비스명<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <input type="text" class="form-control" name="ProdName" value="@if($method == 'PUT'){{ $data['ProdName'] }}@endif" style="width:70%;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="SiteCode">시험연도<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <select class="form-control" name="MockYear">
                            <option value="">연도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}" @if($method == 'PUT' && $i == $data['MockYear']) selected @endif>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <label class="control-label col-md-1-1" for="site_code">시험차수<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <select class="form-control" name="MockRotationNo">
                            <option value="">회차</option>
                            @foreach(range(1, 20) as $i)
                                <option value="{{$i}}" @if($method == 'PUT' && $i == $data['MockRotationNo']) selected @endif>{{$i}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="MockPart">직렬<span class="required">*</span></label>
                    <div class="col-md-10 form-inline">
                        <div class="checkbox">
                            @foreach($arr_mock_part as $row)
                                <input type="checkbox" name="MockPart[]" class="flat" id="mock_part_{{$row['Ccd']}}" value="{{$row['Ccd']}}" @if($method == 'PUT' && in_array($row['Ccd'],explode(',',$data['MockPart']))) checked="checked" @endif>
                                <label class="mr-5" for="mock_part_{{$row['Ccd']}}">{{$row['CcdName']}}</label>
                                {!! (($loop->index % 10 == 0) ? '<br>' : '') !!}
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">응시번호 중복체크 사용여부<span class="required">*</span></label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio mt-5">
                            <input type="radio" name="TakeNumRedundancyCheckIsUse" class="flat" value="Y" @if($method == 'PUT' && $data['TakeNumRedundancyCheckIsUse'] == 'Y') checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="TakeNumRedundancyCheckIsUse" class="flat" value="N" @if($method == 'PUT' && $data['TakeNumRedundancyCheckIsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">서비스기간<span class="required">*</span></label>
                    <div class="col-md-10 form-inline">
                        <div class="col-md-12 form-inline">
                            사전예약 :
                            <input type="radio" class="flat" name="PreServiceIsUse" value="Y" @if($method == 'PUT') @if($data['PreServiceIsUse'] == 'Y') checked @endif @endif />사용
                            <input type="radio" class="flat" name="PreServiceIsUse" value="N" @if($method == 'PUT') @if($data['PreServiceIsUse'] == 'N') checked @endif @endif />미사용
                            <input type="text" class="form-control datepicker" style="width:100px;" name="PreServiceSDatm_d" value="@if($method == 'PUT'){{ substr($data['PreServiceSDatm'], 0, 10) }}@else{{ date("Y-m-d") }}@endif" readonly required="required" title="사전예약 시작일">
                            <select name="PreServiceSDatm_h" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['PreServiceSDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="PreServiceSDatm_m" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['PreServiceSDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                            <span class="ml-10 mr-10"> ~ </span>
                            <input type="text" class="form-control datepicker" style="width:100px;" name="PreServiceEDatm_d" value="@if($method == 'PUT'){{ substr($data['PreServiceEDatm'], 0, 10) }}@else{{date("Y-m-d", strtotime(date("Y-m-d").'1year'))}} @endif" readonly  required="required" title="사전예약 종료일">
                            <select name="PreServiceEDatm_h" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['PreServiceEDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="PreServiceEDatm_m" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['PreServiceEDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                        </div>

                        <div class="col-md-12 form-inline mt-5">
                            답안입력서비스 :
                            <input type="radio" class="flat" name="AnswerServiceIsUse" value="Y" @if($method == 'PUT') @if($data['AnswerServiceIsUse'] == 'Y') checked @endif @endif />사용
                            <input type="radio" class="flat" name="AnswerServiceIsUse" value="N" @if($method == 'PUT') @if($data['AnswerServiceIsUse'] == 'N') checked @endif @endif />미사용
                            <input type="text" class="form-control datepicker" style="width:100px;" name="AnswerServiceSDatm_d" value="@if($method == 'PUT'){{ substr($data['AnswerServiceSDatm'], 0, 10) }}@else{{ date("Y-m-d") }}@endif" readonly required="required" title="답안입력 시작일">
                            <select name="AnswerServiceSDatm_h" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['AnswerServiceSDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="AnswerServiceSDatm_m" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['AnswerServiceSDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                            <span class="ml-10 mr-10"> ~ </span>
                            <input type="text" class="form-control datepicker" style="width:100px;" name="AnswerServiceEDatm_d" value="@if($method == 'PUT'){{ substr($data['AnswerServiceEDatm'], 0, 10) }}@else{{date("Y-m-d", strtotime(date("Y-m-d").'1year'))}} @endif" readonly  required="required" title="답안입력 종료일">
                            <select name="AnswerServiceEDatm_h" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['AnswerServiceEDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="AnswerServiceEDatm_m" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['AnswerServiceEDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                        </div>

                        <div class="col-md-12 form-inline mt-5">
                            본서비스 :
                            <input type="radio" class="flat" name="ServiceIsUse" value="Y" @if($method == 'PUT') @if($data['ServiceIsUse'] == 'Y') checked @endif @endif />사용
                            <input type="radio" class="flat" name="ServiceIsUse" value="N" @if($method == 'PUT') @if($data['ServiceIsUse'] == 'N') checked @endif @endif />미사용
                            <input type="text" class="form-control datepicker" style="width:100px;" name="ServiceSDatm_d" value="@if($method == 'PUT'){{ substr($data['ServiceSDatm'], 0, 10) }}@else{{ date("Y-m-d") }}@endif" readonly required="required" title="본서비스 시작일">
                            <select name="ServiceSDatm_h" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['ServiceSDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="ServiceSDatm_m" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['ServiceSDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                            <span class="ml-10 mr-10"> ~ </span>
                            <input type="text" class="form-control datepicker" style="width:100px;" name="ServiceEDatm_d" value="@if($method == 'PUT'){{ substr($data['ServiceEDatm'], 0, 10) }}@else{{date("Y-m-d", strtotime(date("Y-m-d").'1year'))}} @endif" readonly  required="required" title="본서비스 종료일">
                            <select name="ServiceEDatm_h" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['ServiceEDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="ServiceEDatm_m" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['ServiceEDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                        </div>

                        <div class="col-md-12 form-inline mt-5">
                            최종서비스 :
                            <input type="radio" class="flat" name="LastServiceIsUse" value="Y" @if($method == 'PUT') @if($data['LastServiceIsUse'] == 'Y') checked @endif @endif />사용
                            <input type="radio" class="flat" name="LastServiceIsUse" value="N" @if($method == 'PUT') @if($data['LastServiceIsUse'] == 'N') checked @endif @endif />미사용
                            <input type="text" class="form-control datepicker" style="width:100px;" name="LastServiceSDatm_d" value="@if($method == 'PUT'){{ substr($data['LastServiceSDatm'], 0, 10) }}@else{{ date("Y-m-d") }}@endif" readonly required="required" title="최종서비스 시작일">
                            <select name="LastServiceSDatm_h" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['LastServiceSDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="LastServiceSDatm_m" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['LastServiceSDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                            <span class="ml-10 mr-10"> ~ </span>
                            <input type="text" class="form-control datepicker" style="width:100px;" name="LastServiceEDatm_d" value="@if($method == 'PUT'){{ substr($data['LastServiceEDatm'], 0, 10) }}@else{{date("Y-m-d", strtotime(date("Y-m-d").'1year'))}} @endif" readonly  required="required" title="최종서비스 종료일">
                            <select name="LastServiceEDatm_h" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['LastServiceEDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="LastServiceEDatm_m" class="form-control">
                                <!--option value="">선택</option//-->
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['LastServiceEDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="SiteCode">모바일 서비스 여부</label>
                    <div class="col-md-4 form-inline item">
                        <div class="checkbox">
                            <input type="checkbox" name="MobileServiceIs[]" class="flat" value="716001" @if($method == 'PUT' && in_array('716001',$data['MobileServiceIsArr'])) checked="checked" @endif> <span class="flat-text mr-20">사전예약</span>
                            <input type="checkbox" name="MobileServiceIs[]" class="flat" value="716002" @if($method == 'PUT' && in_array('716002',$data['MobileServiceIsArr'])) checked="checked" @endif> <span class="flat-text">본서비스</span>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1" for="site_code">설문 조사 여부</label>
                    <div class="col-md-4">
                        <div class="checkbox">
                            <input type="checkbox" name="SurveyIs[]" class="flat" value="716001" @if($method == 'PUT' && in_array('716001',$data['SurveyIsArr'])) checked="checked" @endif> <span class="flat-text mr-20">사전예약</span>
                            <input type="checkbox" name="SurveyIs[]" class="flat" value="716002" @if($method == 'PUT' && in_array('716002',$data['SurveyIsArr'])) checked="checked" @endif> <span class="flat-text">본서비스</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">해설강의 여부<span class="required">*</span></label>
                    <div class="col-md-4 form-inline">
                        <div class="radio mt-5">
                            <input type="radio" name="ExplainLectureIsUse" class="flat" value="Y" @if($method == 'PUT' && $data['ExplainLectureIsUse'] == 'Y') checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="ExplainLectureIsUse" class="flat" value="N" @if($method == 'PUT' && $data['ExplainLectureIsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1" for="">설문</label>
                    <div class="col-md-4 form-inline">
                        <select name="SpIdx" class="form-control">
                            <option value="">선택</option>
                            @foreach($surveyList as $row)
                                <option value="{{$row['SsIdx']}}" @if($row['SsIdx'] == $data['SpIdx']) selected @endif>[{{$row['SsIdx']}}] {{$row['SurveyTitle']}} ({{$row['IsUse'] == 'Y' ? '사용' : '미사용'}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">필기합격자수</label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" name="SuccessfulCount" value="@if($method == 'PUT'){{ $data['SuccessfulCount'] }}@endif" style="width:50px;">
                    </div>
                    <label class="control-label col-md-1-1" for="">인증코드</label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control" name="CertIdxArr" value="@if($method == 'PUT'){{ $data['CertIdxArr'] }}@endif" style="width:150px;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 form-inline">
                        <div class="radio mt-5">
                            <input type="radio" name="IsUse" class="flat" value="Y" @if($method == 'PUT' && $data['IsUse'] == 'Y') checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="IsUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">자동지급강좌 설정</label>
                    <div class="col-md-10 form-inline">
                        <div class="col-md-12 form-inline">
                            <span class="form-control-static"># 지급정보 1부터 3까지 지급기간의 날짜는 중복되지 않도록 입력해 주세요.</span>
                        </div>

                        @foreach(range(1, 3) as $orderNum)
                            <div class="col-md-12 form-inline">
                                <span class="form-control-static bold">* 지급정보{{$orderNum}}</span>
                            </div>
                            <div class="col-md-12 form-inline ml-20">
                                @php
                                    $row_ordernum = '';
                                    $row_startdate_d = '';
                                    $row_startdate_h = '';
                                    $row_enddate_d = '';
                                    $row_enddate_h = '';
                                    $row_prodcode = '';
                                    $row_prodname = '';
                                   foreach ($prod_data as $row) {
                                       if($row['OrderNum'] == $orderNum) {
                                           $row_ordernum = $row['OrderNum'];
                                           $row_startdate_d = empty($row['StartDate']) ? '' : substr($row['StartDate'], 0, 10) ;
                                           $row_startdate_h = empty($row['StartDate']) ? '' : substr($row['StartDate'], 11, 2) ;
                                           $row_enddate_d = empty($row['EndDate']) ? '' : substr($row['EndDate'], 0, 10) ;
                                           $row_enddate_h = empty($row['EndDate']) ? '' : substr($row['EndDate'], 11, 2) ;
                                           $row_prodcode = $row['ProdCode'];
                                           $row_prodname = $row['ProdName'];
                                       }
                                   }
                                @endphp
                                <input type="hidden" name="OrderNum[]" id="OrderNum{{$orderNum}}" value="{{$orderNum}}">
                                [지급기간]
                                <input type="text" class="form-control datepicker" style="width:100px;" name="StartDate_D[]" value="{{$row_startdate_d}}" readonly  title="지급정보{{$orderNum}} 시작일">
                                <select name="StartDate_H[]" class="form-control" style="width:65px;">
                                    @foreach(range(0, 23) as $i)
                                        @php $v = sprintf("%02d", $i); @endphp
                                        <option value="{{$v}}" @if($row_startdate_h == $v) selected @endif>{{$v}}</option>
                                    @endforeach
                                </select> 시
                                ~
                                <input type="text" class="form-control datepicker" style="width:100px;" name="EndDate_D[]" value="{{$row_enddate_d}}" readonly  title="지급정보{{$orderNum}} 종료일">
                                <select name="EndDate_H[]" class="form-control" style="width:65px;">
                                    @foreach(range(0, 23) as $i)
                                        @php $v = sprintf("%02d", $i); @endphp
                                        <option value="{{$v}}" @if($row_enddate_h == $v) selected @endif>{{$v}}</option>
                                    @endforeach
                                </select> 시
                            </div>
                            <div class="col-md-12 form-inline ml-20 mt-5">
                                [지급상품] <button type="button" class="btn btn-sm btn-primary btn_product_search" id="{{$orderNum}}">상품검색</button>
                                <span id="selected_product{{$orderNum}}" class="pl-10">
                                    @if(empty($row_prodcode) === false)
                                        [{{$row_prodcode}}] {{$row_prodname}}
                                        <a href="#none" data-prod-code="{{$row_prodcode}}" class="selected-product-delete"><i class="fa fa-times red"></i></a>
                                        <input type="hidden" name="prod_code[]" value="{{$row_prodcode}}"/>
                                    @endif
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <div class="form-control-static">{{ $data['wAdminName'] }}</div>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <div class="form-control-static">{{ $data['RegDatm'] }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <div class="form-control-static">{{ $data['wAdminName2'] }}</div>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <div class="form-control-static">{{ $data['UpdDatm'] }}</div>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-20">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="goList">목록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var method = '{{ $method }}';
        var sitecode = '{{ $data['SiteCode'] }}';
        var mockpart = '{{ $data['MockPart'] }}'

        $(document).ready(function() {
            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/predict/request/') }}' + getQueryString());
            });

            // 등록,수정
            $regi_form.submit(function() {
                var orderNum_cnt = $regi_form.find('input[name="OrderNum[]"]').length;
                for(i=0; i<orderNum_cnt; i++) {
                    if ($("#selected_product"+(i+1)).find('input[name="prod_code[]"]').length == 0) {
                        $("#selected_product"+(i+1)).html('<input type="hidden" name="prod_code[]" value="">');
                    }
                }

                var _url = '{{ ($method == 'PUT') ? site_url('/predict/request/update') : site_url('/predict/request/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/predict/request/') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');

            });

            // 상품검색 버튼 클릭
            $('.btn_product_search').on('click', function() {
                var site_code = $regi_form.find('select[name="SiteCode"]').val();
                var span_id =  "selected_product"+$(this).attr('id');

                if (!site_code) {
                    alert('운영사이트를 먼저 선택해 주십시오.');
                    return false;
                }

                // 강좌 검색
                $('.btn_product_search').setLayer({
                    'url' : '{{ site_url('/common/searchLectureAll/') }}?site_code=' + site_code + '&prod_type=on&return_type=inline&target_id='+span_id+'&target_field=prod_code&is_event=Y',
                    'width' : 1200
                });

                $('#'+span_id).html('');
            });

            $regi_form.on('change', '#selected_product1,#selected_product2,#selected_product3', function() {
                if ($(this).find('input[name="prod_code[]"]').length > 1) {
                    alert('등록할 상품을 1건만 선택해 주세요.');
                    $(this).html('');
                }
            });
            // 상품 삭제
            $regi_form.on('click', '.selected-product-delete', function() {
                var that = $(this);
                that.parent().remove();
            });

        });
    </script>
@stop