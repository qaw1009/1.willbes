@extends('lcms.layouts.master')

@section('content')
    @php
        //메모코드 초기화
        for($i=634001; $i<634007; $i++){
            ${"MemoTypeCcd_".$i} = ''; //초기화
        }
        foreach ($data_memo as $row) {
            ${"MemoTypeCcd_".$row['MemoTypeCcd']} = $row['Memo'];
            //echo  ${"MemoTypeCcd_".$row['MemoTypeCcd']};
        }
    @endphp

    <h5>- 모의고사 상품정보를 등록하고 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" action="{{ site_url('/mocktestNew/reg/goods/store') }}" novalidate>--}}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" id='ProdCode' name="prod_code" value="{{$prod_code}}">
        <input type="hidden" name="AcceptStatusCcd" value="675002" title="접수중">
        <input type="hidden" name="Info" value="">

        <div class="x_panel">
            <div class="x_title">
                <h2>모의고사정보등록</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트 <span class="required">*</span></label>
                    <div class="col-md-10 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'siteCode', '', '운영 사이트', 'required', ($method == 'PUT') ? 'disabled' : '', false, $arr_site_code) !!}
                        <span class="ml-20">저장 후 운영사이트, 모의고사카테고리 정보는 수정이 불가능합니다.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        @if($method == 'PUT' && empty($data['CateCode']) === false)
                            <p class="form-control-static">{{ $data['CateName'] }}</p>
                        @else
                            <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                            <span id="selected_category" class="pl-10">{{ $data['CateName'] }}</span>
                        @endif
                        <input type="hidden" id="cate_code" name="cate_code" value="{{ $data['CateCode'] }}" title="카테고리 선택" required="required"/>
                    </div>
                    <label class="control-label col-md-1-1">응시분야 <span class="required">*</span></th>
                    </label>
                    <div class="col-md-4 form-inline">
                        <span class="form-control-static" id="TakePartDisp">{{ $data['CateName'] }}</span>
                        <input type="hidden" name="TakePart" value="{{$data['CateCode']}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="mock_part">직렬 <span class="required">*</span></label>
                    <div class="col-md-2">
                        <div class="checkbox mock-part">
                            @foreach($arr_base['cateD2'] as $row)
                                <span class="mock-part-{{$row['ParentCateCode']}}">
                                    <input type="checkbox" id="mock_part_{{ $loop->index }}" name="mock_part[]" class="flat" value="{{$row['CateCode']}}" title="직렬" @if($method == 'PUT' && in_array($row['CateCode'], $data['arr_mock_part']) === true)checked="checked"@endif/>
                                    <label for="mock_part_{{ $loop->index }}" class="input-label mr-10">{{$row['CateName']}}</label>
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">• 사용자단에 노출될 항목 체크</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="TakeFormsCcd">응시형태 <span class="required">*</span></label>
                    <div class="col-md-2">
                        <div class="checkbox">
                            @foreach($arr_base['apply_type'] as $key => $val)
                                <input type="checkbox" class="flat" id="take_forms_{{$key}}" name="TakeFormsCcd[]" value="{{$key}}" data-take-forms="{{$key}}" title="응시형태" @if($method == 'PUT' && in_array($key, $data['arr_take_forms_ccd'])) checked @endif>
                                <label for="take_forms_{{$key}}" class="input-label mr-10">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">• 사용자단에 노출될 항목 체크</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="TakeAreas1CCds">OFF(학원) 응시지역1 <span class="required">*</span></label>
                    <div class="col-md-6">
                        <div class="checkbox">
                            @foreach($arr_base['apply_area1'] as $key => $val)
                                <input type="checkbox" class="flat" id="take_areas1_{{$key}}" name="TakeAreas1CCds[]" value="{{$key}}" title="응시지역1" @if($method == 'PUT' && in_array($key, $data['arr_take_areas1_ccds'])) checked @endif>
                                <label for="take_areas1_{{$key}}" class="input-label mr-10">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">• 사용자단에 노출될 항목 체크</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="TakeAreas2Ccds">OFF(학원) 응시지역2 <span class="required">*</span></label>
                    <div class="col-md-2">
                        <div class="checkbox">
                            @foreach($arr_base['apply_area2'] as $key => $val)
                                <input type="checkbox" class="flat" id="take_areas2_{{$key}}" name="TakeAreas2Ccds[]" value="{{$key}}" title="응시지역2" @if($method == 'PUT' && in_array($key, $data['arr_take_areas2_ccds'])) checked @endif>
                                <label for="take_areas2_{{$key}}" class="input-label mr-10">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">• 사용자단에 노출될 항목 체크</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="AddPointCcds">가산점 <span class="required">*</span></label>
                    <div class="col-md-2">
                        <div class="checkbox">
                            @foreach($arr_base['add_point'] as $key => $val)
                                <input type="checkbox" class="flat" id="add_point_{{$key}}" name="AddPointCcds[]" value="{{$key}}" title="가산점" @if($method == 'PUT' && in_array($key, $data['add_point_ccds'])) checked @endif>
                                <label for="add_point_{{$key}}" class="input-label mr-10">{{$val}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">• 사용자단에 노출될 항목 체크 (과목별 만점의 5%, 10%로 가산)</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">연도 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control mr-5" name="MockYear" title="연도" required="required">
                            <option value="">연도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}" @if($method == 'PUT' && $i == $data['MockYear']) selected @endif>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <label class="control-label col-md-1-1">회차 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control mr-5" name="MockRotationNo" title="회차" required="required">
                            <option value="">회차</option>
                            @foreach(range(1, 20) as $i)
                                <option value="{{$i}}" @if($method == 'PUT' && $i == $data['MockRotationNo']) selected @endif>{{$i}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">모의고사명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" class="form-control" name="ProdName" title="모의고사명" required="required" value="{{$data['ProdName']}}">
                    </div>
                    <label class="control-label col-md-1-1">모의고사코드 <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['ProdCode'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">판매가 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <span class="blue pr-10">[정상가]</span>
                        <input type="text" class="form-control" name="SalePrice" required="required" title="정상가" value="@if($method == 'PUT'){{ $data['SalePrice'] }}@endif" style="width:100px;"> 원
                        <span class="blue pl-30 pr-10">[할인적용]</span>
                        <div class="inline-block item">
                            <input type="number" id="SaleRate" name="SaleRate" class="form-control" required="required" title="할인량" value="{{ $data['SaleRate'] }}" style="width: 140px;">
                            <select class="form-control" id="SaleDiscType" name="SaleDiscType">
                                <option value="R" @if('R' == $data['SaleDiscType']) selected="selected" @endif>%</option>
                                <option value="P" @if('P' == $data['SaleDiscType']) selected="selected" @endif>원</option>
                            </select>
                        </div>
                        <span class="blue ml-20">[판매가]</span> <input type="text" class="form-control" name="RealSalePrice" value="@if($method == 'PUT'){{ $data['RealSalePrice'] }}@endif" style="width:100px;" readonly> 원
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">접수기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <input type="text" class="form-control datepicker" style="width:100px;" name="SaleStartDatm_d" value="@if($method == 'PUT'){{ substr($data['SaleStartDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="SaleStartDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['SaleStartDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="SaleStartDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['SaleStartDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                        <span class="ml-10 mr-10"> ~ </span>
                        <input type="text" class="form-control datepicker" style="width:100px;" name="SaleEndDatm_d" value="@if($method == 'PUT'){{ substr($data['SaleEndDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="SaleEndDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['SaleEndDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="SaleEndDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['SaleEndDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">접수마감인원(학원용)
                    </label>
                    <div class="col-md-10 form-inline item">
                        <input type="text" class="form-control" name="ClosingPerson" value="@if($method == 'PUT'){{ ($data['ClosingPerson'] == 0) ? '' : $data['ClosingPerson'] }}@endif" style="width: 100px;">
                        <span class="ml-20">• 응시형태가 'OFF(학원)'인 경우 마감인원 (미등록시 무제한)</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">응시가능기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <input type="text" class="form-control datepicker" style="width:100px;" name="TakeStartDatm_d" value="@if($method == 'PUT'){{ substr($data['TakeStartDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="TakeStartDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['TakeStartDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="TakeStartDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['TakeStartDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                        <span class="ml-10 mr-10"> ~ </span>
                        <input type="text" class="form-control datepicker" style="width:100px;" name="TakeEndDatm_d" value="@if($method == 'PUT'){{ substr($data['TakeEndDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="TakeEndDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['TakeEndDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="TakeEndDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['TakeEndDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">응시시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <input type="text" class="form-control" name="TakeTime" required="required" value="@if($method == 'PUT'){{ $data['TakeTime'] }}@endif" style="width: 100px;"> 분
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">시험지제공형태 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <select class="form-control" name="PaperType" required="required">
                            <option value="P">통파일(PDF)</option>
                            <option value="I">문항별이미지</option>
                        </select>
                        <span class="ml-20">• 통파일(PDF) 선택 시 '오답노트'를 제공하지 않음</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">필수과목 <span class="required">*</span>
                        <br><button type="button" class="btn btn-sm btn-primary act-su-search" data-su-type="E">검색</button>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="text-right mb-10">
                            <button type="button" class="btn btn-sm btn-success act-su-sort">정렬변경</button>
                        </div>
                        <div id="eSubject-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">정렬</th>
                                    <th class="text-center">연도</th>
                                    <th class="text-center">회차</th>
                                    <th class="text-center">과목명</th>
                                    <th class="text-center">교수명</th>
                                    <th class="text-center">과목별시험지명</th>
                                    <th class="text-center">삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                                <tr data-subject-idx="">
                                    <td class="text-center form-inline">
                                        <input type="text" class="form-control" style="width:30px" name="OrderNum[]" value="">
                                        <input type="hidden" name="MpIdx[]" value="">
                                        <input type="hidden" name="MockType[]" value="">
                                    </td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td></td>
                                    <td class="text-center"><span class="act-su-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                                </tr>
                                {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                                @if($method == 'PUT')
                                    @foreach($sData as $row)
                                        @continue($row['MockType'] == 'S')
                                        <tr data-subject-idx="{{ $row['PmrpIdx'] }}">
                                            <td class="text-center form-inline">
                                                <input type="text" class="form-control" style="width:30px" name="OrderNum[]" value="{{ $row['OrderNum'] }}">
                                                <input type="hidden" name="MpIdx[]" value="{{ $row['MpIdx'] }}">
                                                <input type="hidden" name="MockType[]" value="{{ $row['MockType'] }}">
                                            </td>
                                            <td class="text-center">{{ $row['Year'] }}</td>
                                            <td class="text-center">{{ $row['RotationNo'] }}</td>
                                            <td class="text-center">{{ $row['SubjectName'] }}</td>
                                            <td class="text-center">{{ $row['wProfName'] }}</td>
                                            <td>{{ '['. $row['MpIdx'] .'] '. $row['PapaerName'] }}</td>
                                            <td class="text-center"><span class="act-su-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">선택과목 <span class="required">*</span>
                        <br><button type="button" class="btn btn-sm btn-primary act-su-search" data-su-type="S">검색</button>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <div class="text-right mb-10">
                            <button type="button" class="btn btn-sm btn-success act-su-sort">정렬변경</button>
                        </div>
                        <div id="sSubject-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">정렬</th>
                                    <th class="text-center">연도</th>
                                    <th class="text-center">회차</th>
                                    <th class="text-center">과목명</th>
                                    <th class="text-center">교수명</th>
                                    <th class="text-center">과목별시험지명</th>
                                    <th class="text-center">삭제</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($method == 'PUT')
                                    @foreach($sData as $row)
                                        @continue($row['MockType'] == 'E')
                                        <tr data-subject-idx="{{ $row['PmrpIdx'] }}">
                                            <td class="text-center form-inline">
                                                <input type="text" class="form-control" style="width:30px" name="OrderNum[]" value="{{ $row['OrderNum'] }}">
                                                <input type="hidden" name="MpIdx[]" value="{{ $row['MpIdx'] }}">
                                                <input type="hidden" name="MockType[]" value="{{ $row['MockType'] }}">
                                            </td>
                                            <td class="text-center">{{ $row['Year'] }}</td>
                                            <td class="text-center">{{ $row['RotationNo'] }}</td>
                                            <td class="text-center">{{ $row['SubjectName'] }}</td>
                                            <td class="text-center">{{ $row['wProfName'] }}</td>
                                            <td>{{ '['. $row['MpIdx'] .'] '. $row['PapaerName'] }}</td>
                                            <td class="text-center"><span class="act-su-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">쿠폰사용결제 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <div class="radio">
                            <input type="radio" id="is_coupon_y" name="IsCoupon" class="flat" value="Y" required="required" title="쿠폰적용여부" @if($method == 'POST' || $data['IsCoupon'] == 'Y')checked="checked"@endif/> <label for="is_coupon_y" class="input-label">가능</label>
                            <input type="radio" id="is_coupon_n" name="IsCoupon" class="flat" value="N" @if($data['IsCoupon'] == 'N')checked="checked"@endif/> <label for="is_coupon_n" class="input-label">불가능</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">자동지급쿠폰 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <p class="mt-5">• 해당 상품 구매 시 혜택으로 제공될 쿠폰 등록 (결제 후 내강의실 > 나의쿠폰 메뉴에 자동 지급 처리)</p>
                        <p>
                            <input type="hidden" name="MemoTypeCcd[]" id="MemoTypeCcd_634004" value="634004">
                            <input type="hidden" name="IsOutPut[]" id="IsOutPut_634004" value="Y">
                            <button type="button" class="btn btn-sm btn-primary ml-5" id="couponAdd">쿠폰검색</button>
                            [지급목적] <input type="text" name="CMemo[]" id="Memo_634004" value="{{$MemoTypeCcd_634004}}" class="form-control" size="70">
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

                            @foreach($data_auto_coupon as $row)
                                <tr id='couponTrId{{$loop->index}}'>
                                    <input type='hidden'  name='CouponIdx[]' id='CouponIdx{{$loop->index}}' value='{{$row['AutoCouponIdx']}}'>
                                    <td>{{$row['ApplyTypeCcdName']}}</td>
                                    <td>{{$row['AutoCouponIdx']}}</td>
                                    <td style='text-align:left'>{{$row['CouponName']}}</td>
                                    <td>{{number_format($row['DiscRate']).(($row['DiscType'] === 'R') ? '%' : '원')}}</td>
                                    <td>{{$row['ValidDay']}}</td>
                                    <td>{{$row['IssueValid']}}</td>
                                    <td><a href="javascript:;" onclick="rowDelete('couponTrId{{$loop->index}}')"><i class="fa fa-times red"></i></a></td>
                                </tr>
                        @endforeach
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">자동문자(결제완료)
                    </label>
                    <div class="col-md-10 form-inline">
                        <div class="radio mt-5">
                            <span>[문자발송사용여부]</span>
                            <input type="radio" name="IsSms" class="flat" value="Y" @if($method == 'PUT' && $data['IsSms']=='Y') checked @endif> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="IsSms" class="flat" value="N" @if($method == 'POST' || ($method == 'PUT' && $data['IsSms']=='N')) checked @endif> <span class="flat-text">미사용</span>
                        </div>
                        <div>
                            <textarea id="SmsMemo" name="Memo" class="form-control" style="width: 60%; height: 100px;">@if($method == 'PUT'){{ $data['Memo'] }}@endif</textarea>
                        </div>
                        <div class="mt-5">
                            [발신번호]
                            {!! html_callback_num_select($arr_base['send_callback_ccd'], $data['SendTel'] , 'SendTel', 'SendTel', '', '발신번호', '') !!}
                            <input class="form-control border-red red" id="content_byte" style="width: 50px;" type="text" readonly="readonly" value="0">
                            <span class="red">byte</span>
                            (55byte 이상일 경우 MMS로 전환됩니다.)
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="grade_open_is_use">성적오픈 사용 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="grade_open_is_use_y" name="grade_open_is_use" class="flat" value="Y" required="required" title="사용여부" @if($data['GradeOpenIsUse'] == 'Y')checked="checked"@endif/> <label for="grade_open_is_use_y" class="input-label">사용</label>
                            <input type="radio" id="grade_open_is_use_n" name="grade_open_is_use" class="flat" value="N" @if($method == 'POST' || $data['GradeOpenIsUse'] == 'N')checked="checked"@endif/> <label for="grade_open_is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use">성적조회오픈일
                    </label>
                    <div class="col-md-10 form-inline item">
                        <input type="text" class="form-control datepicker" style="width:100px;" name="GradeOpenDatm_d" value="@if($method == 'PUT'){{ substr($data['GradeOpenDatm'], 0, 10) }}@else{{date('Y-m-d')}}@endif" readonly>
                        <select name="GradeOpenDatm_h" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 23) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['GradeOpenDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 시
                        <select name="GradeOpenDatm_m" class="form-control">
                            <!--option value="">선택</option//-->
                            @foreach(range(0, 59) as $i)
                                @php $v = sprintf("%02d", $i); @endphp
                                <option value="{{$v}}" @if($method==='PUT' && substr($data['GradeOpenDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                            @endforeach
                        </select> 분
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse'] == 'Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse'] == 'N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="goList">목록</button>
                </div>
            </div>
        </div>


    </form>

    <script type="text/javascript">
        var method = '{{$method}}';
        var $regi_form = $('#regi_form');
        var suAddField;

        $(document).ready(function () {
            $(".mock-part > span").hide();
            $(".mock-part-" + $("#cate_code").val()).show();

            // 과목리스트 초기화
            var chapterExist = [];
            var chapterDel = [];
            var eList = $('#eSubject-wrap table tbody');
            var sList = $('#sSubject-wrap table tbody');
            suAddField = eList.find('tr:eq(0)').html();
            eList.find('tr:eq(0)').remove();

            eList.find('tr').each(function () {
                var sIDX = $(this).data('subject-idx');
                if(sIDX) chapterExist.push(sIDX);
            });
            sList.find('tr').each(function () {
                var sIDX = $(this).data('subject-idx');
                if(sIDX) chapterExist.push(sIDX);
            });

            // 과목리스트 삭제
            $regi_form.on('click', '.act-su-del', function () {
                var that = $(this);
                var suIdx = $(this).closest('tr').data('subject-idx');
                if( !suIdx ) { // 등록전
                    rowDel_Disp();
                } else { // 등록후
                    if (!confirm("삭제는 저장시 적용됩니다.\n삭제 대기목록에 추가하시겠습니까?")) return false;
                    chapterDel.push(suIdx);
                    rowDel_Disp();
                }

                function rowDel_Disp() {
                    var wrap = that.closest('tbody');
                    that.closest('tr').remove();
                    wrap.find('[name="OrderNum[]"]').each(function (i) {
                        $(this).val(++i);
                    });
                }
            });

            //운영사이트 변경시
            $regi_form.on('change', 'select[name="siteCode"]', function() {
                //카테고리 초기화
                $regi_form.find('input[name="cate_code"]').val('');
                //직렬 체크 해제
                $("input:checkbox[name='mock_part[]']").prop("checked",false);

                $('#selected_category').html('');
                $(".mock-part").hide();
                $(".mock-part > span").hide();

                // 발신번호
                var csTelChk = (method == 'POST') ? true : false;
                if(csTelChk) {
                    var csTel = JSON.parse('{!! $arr_base['csTel'] !!}');
                    $('#SendTel').val(csTel[$('#site_code').val()]);
                }
            });

            //카테고리 변경시
            survey('#cate_code', function() {
                $("input:checkbox[name='mock_part[]']").prop("checked",false);
                $(".mock-part").show();
                $(".mock-part > span").hide();
                $(".mock-part-" + $("#cate_code").val()).show();

                //응시분야
                $regi_form.find('[name="TakePart"]').val($("#cate_code").val());
                $("#TakePartDisp").text($("#selected_category").text());
            });

            //카테고리검색
            $("#btn_category_search").on('click', function () {
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $("#btn_category_search").setLayer({
                    'url': '{{ site_url('/common/searchCategory/index/single/site_code/') }}' + $("#site_code").val()
                    , 'width': 800
                })
            });

            // 과목검색창 오픈
            $('.act-su-search').on('click', function() {
                if(!$regi_form.find('#site_code').val() || !$regi_form.find('#cate_code').val()) {
                    alert('운영사이트와 카테고리를 먼저 선택해 주세요');
                    return false;
                }

                var param = '?siteCode=' + $regi_form.find('#site_code').val() + '&cateD1=' + $regi_form.find('#cate_code').val() + '&suType=' + $(this).data('su-type');
                $('.act-su-search').setLayer({
                    'url': '{{ site_url('/mocktestNew/base/exam/searchExam') }}' + param,
                    'width': 1100
                });
            });

            // 과목리스트 정렬변경
            $regi_form.on('click', '.act-su-sort', function () {
                var that = $(this).closest('.subject-wrap').find('tbody');
                if(that.find('tr').length == 0) return false;
                var error = false;
                var sorting = {};
                that.find('tr').each(function () {
                    if($(this).data('subject-idx')) {
                        sorting[$(this).data('subject-idx')] = $(this).find('[name="OrderNum[]"]').val();
                    }
                    else {
                        error = true;
                    }
                });
                if(error || chapterDel.length) {
                    alert('저장된 과목만 정렬변경이 가능합니다. 저장 후 진행해 주세요');
                    return false;
                }

                var _url = '{{ site_url("/mocktest/regGoods/searchExamSort") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'sorting' : JSON.stringify(sorting),
                };

                sendAjax(_url, data, function(ret) {
                    var list = {};

                    if (ret.ret_cd) {
                        that.find('tr').each(function () {
                            list[ $(this).find('[name="OrderNum[]"]').val() ] = $(this);
                        });

                        that.empty();
                        $.each(list, function (i, v) {
                            that.append(v);
                        });

                        notifyAlert('success', '알림', ret.ret_msg);
                    }
                }, showValidateError, false, 'POST');
            });

            //쿠폰검색
            $('#couponAdd').on('click', function() {
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $('#couponAdd').setLayer({
                    'url' : '{{ site_url('common/searchCoupon/') }}'+'?site_code='+$("#site_code").val()+'&ProdCode='+$('#ProdCode').val()+'&deploy_type=N'
                    ,'width' : 900
                })
            });

            // 바이트 수
            $('#SmsMemo').on('change keyup input', function() {
                $('#content_byte').val(fn_chk_byte($(this).val()));
            });
            @if( !empty($data['Memo']) )
                $('#content_byte').val(fn_chk_byte($('#SmsMemo').val()));
            @endif

            // 판매가 계산
            $regi_form.on('change keyup', '[name="SalePrice"], [name="SaleRate"], [name="SaleDiscType"]',function () {
                var realPrice;
                var SalePrice = parseFloat($('[name="SalePrice"]').val());
                var SaleRate = parseFloat($('[name="SaleRate"]').val());
                var SaleDiscType = $('[name="SaleDiscType"]').val();
                if( SalePrice !== '' && SaleRate !== '' && SaleDiscType !== '' && SalePrice >= 0 && SaleRate >= 0) {
                    if( SaleDiscType == 'R' )  realPrice = SalePrice * (1 - SaleRate / 100);
                    else if( SaleDiscType == 'P' )  realPrice = SalePrice - SaleRate;
                    realPrice = (realPrice > 0) ? Math.floor(realPrice) : 0;
                    $('[name="RealSalePrice"]').val(realPrice);
                } else {
                    $('[name="RealSalePrice"]').val('');
                }
            });

            // 등록,수정
            $regi_form.submit(function() {
                var chapterTotal = [];
                eList.find('tr').each(function () { chapterTotal.push($(this).data('subject-idx')); });
                sList.find('tr').each(function () { chapterTotal.push($(this).data('subject-idx')); });
                $regi_form.find('[name="Info"]').val( JSON.stringify({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel}) );

                var _url = '{{ site_url('/mocktestNew/reg/goods/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                        /*location.replace('{{ site_url('/mocktestNew/reg/goods/') }}' + getQueryString());*/
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/mocktestNew/reg/goods/') }}' + getQueryString());
            });
        });

        function survey(selector, callback) {
            var input = $(selector);
            var oldvalue = input.val();
            setInterval(function(){
                if (input.val()!=oldvalue){
                    oldvalue = input.val();
                    callback();
                }
            }, 100);
        }

        function rowDelete(strRow) {
            $('#'+strRow).remove();
        }
    </script>
@stop