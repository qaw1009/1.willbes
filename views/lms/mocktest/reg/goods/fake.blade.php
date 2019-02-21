@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 제일 아래쪽에 있는 인원수를 확인해주세요.</h5>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2 class="red">모의고사랜덤회원정답등록(이 페이지는 테스트를 위한 페이지로 랜덤회원이 랜덤정답을 입력합니다.)</h2>
        </div>
        <div class="x_content">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['ProdCode'] : '' }}">
                <input type="hidden" name="Info" value="">
                <input type="hidden" name="mode" value="{{ $mode }}">
                <input type="hidden" name="prodidx" value="{{ $prodidx }}">

                <table class="table table-bordered modal-table">
                    <tr>
                        <th colspan="1">운영사이트 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            {!! html_site_select($siteCodeDef, 'siteCode', 'siteCode', '', '운영 사이트', '', ($method == 'PUT') ? 'disabled' : '') !!}
                            <span class="ml-20">저장 후 운영사이트, 카테고리 정보는 수정이 불가능합니다.</span>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 15%">카테고리 <span class="required">*</span></th>
                        <td style="width: 35%" class="form-inline">
                            <select class="form-control mr-5 " id="cateD1" name="cateD1" @if($method == 'PUT') disabled @endif>
                                <option value="">카테고리</option>
                                @foreach($cateD1 as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && $row['CateCode'] == $data['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <th style="width: 15%">응시분야 <span class="required">*</span></th>
                        <td style="width: 35%" class="form-inline">
                            <span id="TakePartDisp"></span>
                            <input type="hidden" name="TakePart" value="{{ ($method == 'PUT') ? $data['CateCode'] : '' }}">
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">직렬 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <SELECT class="form-control" name="cate">
                                <option value="686001">일반행정</option>
                                <option value="686002">검찰직</option>
                                <option value="686003">남자</option>
                                <option value="686004">여자</option>
                            </SELECT>


                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">응시형태 <span class="required">*</span></th>
                        <td colspan="3">
                            @foreach($applyType as $k => $v)
                                <input type="radio" class="flat" name="TakeFormsCcd" value="{{$k}}" @if($method == 'PUT' && in_array($k, $data['TakeFormsCcd'])) checked @endif> <span class="flat-text mr-20">{{$v}}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">OFF(학원) 응시지역1 <span class="required">*</span></th>
                        <td colspan="3">
                            @foreach($applyArea1 as $k => $v)
                                <input type="checkbox" class="flat" name="TakeAreas1CCds[]" value="{{$k}}" @if($method == 'PUT' && in_array($k, $data['TakeAreas1CCds'])) checked @endif> <span class="flat-text mr-20">{{$v}}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">OFF(학원) 응시지역2 <span class="required">*</span></th>
                        <td colspan="3">
                            @foreach($applyArea2 as $k => $v)
                                <input type="checkbox" class="flat" name="TakeAreas2Ccds[]" value="{{$k}}" @if($method == 'PUT' && in_array($k, $data['TakeAreas2Ccds'])) checked @endif> <span class="flat-text mr-20">{{$v}}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">가산점 <span class="required">*</span></th>
                        <td colspan="3">
                            <SELECT class="form-control" name="AddPointCcds">
                                <option value="5">5%</option>
                                <option value="10">10%</option>
                            </SELECT>
                        </td>
                    </tr>
                    <tr>
                        <th>연도 <span class="required">*</span></th>
                        <td class="form-inline">
                            <select class="form-control mr-5" name="MockYear">
                                <option value="">연도</option>
                                @for($i=(date('Y')+1); $i>=2005; $i--)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['MockYear']) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                        <th>회차 <span class="required">*</span></th>
                        <td class="form-inline">
                            <select class="form-control mr-5" name="MockRotationNo">
                                <option value="">회차</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['MockRotationNo']) selected @endif>{{$i}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>모의고사명 <span class="required">*</span></th>
                        <td>
                            <input type="text" class="form-control" name="ProdName" value="@if($method == 'PUT'){{ $data['ProdName'] }}@endif" style="width:70%;">
                        </td>
                        <th>모의고사코드</th>
                        <td>
                            @if($method == 'PUT'){{ $data['ProdCode'] }}@endif
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">판매가 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <span class="blue">[정상가]</span> <input type="text" class="form-control" name="SalePrice" value="@if($method == 'PUT'){{ $data['SalePrice'] }}@endif" style="width:100px;"> 원
                            <span class="blue ml-20">[할인]</span> <input type="text" class="form-control" name="SaleRate" @if($method == 'PUT')value="{{ $data['SaleRate'] }}" @else value="0" @endif" style="width:100px;">
                            <select name="SaleDiscType" class="form-control">
                                <option value="R" @if($method == 'PUT' && $data['SaleDiscType'] == 'R') selected @endif>%</option>
                                <option value="P" @if($method == 'PUT' && $data['SaleDiscType'] == 'P') selected @endif>-</option>
                            </select>
                            <span class="blue ml-20">[판매가]</span> <input type="text" class="form-control" name="RealSalePrice" value="@if($method == 'PUT'){{ $data['RealSalePrice'] }}@endif" style="width:100px;" readonly> 원
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">접수기간 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
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
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">접수마감인원(학원용) <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <input type="text" class="form-control" name="ClosingPerson" value="@if($method == 'PUT'){{ ($data['ClosingPerson'] == 0) ? '' : $data['ClosingPerson'] }}@endif" style="width: 100px;">
                            <span class="ml-20">응시형태가 'OFF(학원)'인 경우 마감인원 (미등록시 무제한)</span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">접수상태 <span class="required">*</span></th>
                        <td colspan="3">
                            @foreach($accept_ccd as $key=>$val)
                                @if($key != '675001' ) {{--접수예정 제외--}}
                                <input type="radio" name="AcceptStatusCcd" class="flat" value="{{$key}}" @if($method == 'PUT'){{ ($data['AcceptStatusCcd'] == $key) ? ' checked="checked" ' : '' }} @endif title="접수상태"> <span class="flat-text mr-10">{{$val}}</span>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">응시가능기간 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <input type="text" class="form-control datepicker" style="width:100px;" name="TakeStartDatm_d" value="@if($method == 'PUT'){{ substr($data['TakeStartDatm'], 0, 10) }}@else{{ date("Y-m-d") }}@endif" readonly required="required" title="응시가능기간 시작일">
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
                            <input type="text" class="form-control datepicker" style="width:100px;" name="TakeEndDatm_d" value="@if($method == 'PUT'){{ substr($data['TakeEndDatm'], 0, 10) }}@else{{date("Y-m-d", strtotime(date("Y-m-d").'1year'))}} @endif" readonly  required="required" title="응시가능기간 종료일">
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
                            {{--
                            <span class="ml-20 mr-20"> | </span>
                            <input type="radio" name="TakeType" class="flat" value="A" @if($method == 'POST' || ($method == 'PUT' && $data['TakeType'] == 'A')) checked="checked" @endif> <span class="flat-text mr-10">상시</span>
                            <input type="radio" name="TakeType" class="flat" value="L" @if($method == 'PUT' && $data['TakeType'] == 'L') checked="checked" @endif> <span class="flat-text mr-20">기간제한</span>
                            --}}

                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">응시시간 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <input type="text" class="form-control" name="TakeTime" value="@if($method == 'PUT'){{ $data['TakeTime'] }}@endif" style="width: 100px;"> 분
                        </td>
                    </tr>
                    <tr data-su-type="E">
                        <th colspan="1">
                            필수과목 <span class="required">*</span>
                            <button type="button" class="btn btn-sm btn-primary ml-10 act-su-search">검색</button>
                        </th>
                        <td colspan="3">
                            <div id="eSubject-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">
                                <div class="text-right">
                                    <button type="button" class="btn btn-sm btn-success act-su-sort">정렬변경</button>
                                </div>
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
                        </td>
                    </tr>
                    <tr data-su-type="S">
                        <th colspan="1">
                            선택과목1 <span class="required">*</span>
                            <button type="button" class="btn btn-sm btn-primary ml-10 act-su-search">검색</button>
                        </th>
                        <td colspan="">
                            <div id="sSubject-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">

                                <table class="table table-bordered">

                                    <tbody>
                                    <select name="SMpIdx1" class="form-control">
                                        @if($method == 'PUT')
                                            @foreach($sData as $key => $row)
                                                @continue($row['MockType'] == 'E')
                                                <option value="{{ $row['MpIdx'] }}" @if($key == 1) selected @endif>{{ $row['SubjectName'] }}[{{ $row['MpIdx'] }}]</td>
                                            @endforeach
                                        @endif
                                    </select>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                        <th colspan="1">
                            선택과목2 <span class="required">*</span>
                            <button type="button" class="btn btn-sm btn-primary ml-10 act-su-search">검색</button>
                        </th>
                        <td colspan="">
                            <div id="sSubject-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">

                                <table class="table table-bordered">

                                    <tbody>
                                    <select name="SMpIdx2" class="form-control">
                                        @if($method == 'PUT')
                                            @foreach($sData as $key => $row)
                                                @continue($row['MockType'] == 'E')
                                                <option value="{{ $row['MpIdx'] }}" @if($key == 3) selected @endif>{{ $row['SubjectName'] }}[{{ $row['MpIdx'] }}]</td>
                                            @endforeach
                                        @endif
                                    </select>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="1">쿠폰사용결제 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <div class="radio">
                                <input type="radio" name="IsCoupon" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsCoupon']=='Y')checked="checked"@endif/> 가능
                                &nbsp;
                                <input type="radio" name="IsCoupon" class="flat" value="N" @if($method == 'PUT' && $data['IsCoupon']=='N')checked="checked"@endif/> 불가능
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="1">자동문자(결제완료)</th>
                        <td colspan="3" class="form-inline">
                            <div class="mb-5">
                                <span class="mr-10">[문자발송사용여부]</span>
                                <input type="radio" name="IsSms" class="flat" value="Y" @if($method == 'PUT' && $data['IsSms']=='Y') checked @endif> <span class="flat-text mr-20">사용</span>
                                <input type="radio" name="IsSms" class="flat" value="N" @if($method == 'POST' || ($method == 'PUT' && $data['IsSms']=='N')) checked @endif> <span class="flat-text">미사용</span>
                            </div>
                            <textarea id="SmsMemo" name="Memo" class="form-control" style="width: 60%; height: 100px;">@if($method == 'PUT'){{ $data['Memo'] }}@endif</textarea>
                            <div class="mt-10">
                                [발신번호] <input type="text" name="SendTel" id="SendTel" value="@if($method == 'PUT'){{ $data['SendTel'] }}@endif" size="12" class="form-control" maxlength="20">
                                <input class="form-control border-red red" id="content_byte" style="width: 50px;" type="text" readonly="readonly" value="0">
                                <span class="red">byte</span>
                                (80byte 초과 시 LMS 문자로 전환됩니다.)
                            </div>
                        </td>
                    </tr>
                    {{--<tr>--}}
                    {{--<th colspan="1">자동문자(결제대기)</th>--}}
                    {{--<td colspan="3" class="form-inline">--}}
                    {{--<div class="mb-5">--}}
                    {{--<span class="mr-10">[문자발송사용여부]</span>--}}
                    {{--<input type="radio" name="" class="flat" value="Y"> <span class="flat-text mr-20">사용</span>--}}
                    {{--<input type="radio" name="" class="flat" value="N"> <span class="flat-text">미사용</span>--}}
                    {{--</div>--}}
                    {{--<textarea id="" name="" class="form-control" style="width: 60%; height: 100px;"></textarea>--}}
                    {{--<div class="mt-10">--}}
                    {{--[발신번호] <input type="text" name="" id="" value="" size="12" class="form-control" maxlength="20">--}}
                    {{--<input class="form-control border-red red" id="content_byte" style="width: 50px;" type="text" readonly="readonly" value="0">--}}
                    {{--<span class="red">byte</span>--}}
                    {{--(80byte 초과 시 LMS 문자로 전환됩니다.)--}}
                    {{--</div>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th colspan="1">사용여부 <span class="required">*</span></th>
                        <td colspan="3">
                            <div>
                                <input type="radio" name="IsUse" class="flat" value="Y" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                                <input type="radio" name="IsUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>등록자</th>
                        <td>@if($method == 'PUT'){{ @$adminName[$data['RegAdminIdx']] }}@endif</td>
                        <th>등록일</th>
                        <td>@if($method == 'PUT'){{ $data['RegDatm'] }}@endif</td>
                    </tr>
                    <tr>
                        <th>최종수정자</th>
                        <td>@if($method == 'PUT'){{ @$adminName[$data['UpdAdminIdx']] }}@endif</td>
                        <th>최종수정일</th>
                        <td>@if($method == 'PUT'){{ $data['UpdDatm'] }}@endif</td>
                    </tr>
                    <tr>
                        <th class="red">랜덤 입력회원수</th>
                        <td colspan="3"><input type="text" name="people" value="1"/></td>
                    </tr>
                </table>
                <div class="form-group text-center">
                    <button type="button" class="btn btn-success mr-10" onClick="fakeSave()">랜덤데이터저장</button>
                    <button class="btn btn-primary" style="position:absolute; right:0;" type="button" id="goList">목록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var suAddField;
        var mode = '{{ $mode }}';

        // 등록,수정
        function fakeSave() {
            var _url = '{{ site_url('/mocktest/regGoods/fakeInsert') }}';
            document.regi_form.action = _url;
            document.regi_form.submit();
        }

        $(document).ready(function() {
            // 과목검색창 오픈
            $('.act-su-search').on('click', function() {
                if( !$regi_form.find('#siteCode').val() || !$regi_form.find('#cateD1').val() ) {
                    alert('운영사이트와 카테고리를 먼저 선택해 주세요');
                    return false;
                }

                param = '?siteCode=' + $regi_form.find('#siteCode').val() + '&cateD1=' + $regi_form.find('#cateD1').val() + '&suType=' + $(this).closest('tr').data('su-type');
                $('.act-su-search').setLayer({
                    'url': '{{ site_url('/mocktest/regGoods/searchExam') }}' + param,
                    'width': 1100
                });
            });

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
                }
                else { // 등록후
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

            /***************************************************************/

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/mocktest/regGoods') }}' + getQueryString());
            });

            // 등록,수정
            $regi_form.submit(function() {
                var chapterTotal = [];
                eList.find('tr').each(function () { chapterTotal.push($(this).data('subject-idx')); });
                sList.find('tr').each(function () { chapterTotal.push($(this).data('subject-idx')); });
                $regi_form.find('[name="Info"]').val( JSON.stringify({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel}) );

                var _url = {{ site_url('/mocktest/regGoods/fakeInsert') }}';
                document.regi_form.action = _url;
                document.regi_form.submit();
            });


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
                }
                else {
                    $('[name="RealSalePrice"]').val('');
                }
            });

            // 기간제한 선택시만 응시가능시간 활성화
            $regi_form.on('ifChecked', '[name="TakeType"]', takeTimeToggle);
            takeTimeToggle();

            function takeTimeToggle() {
                if( $('[name="TakeType"]:checked').val() == 'A' ) {
                    $('[name^="TakeStartDatm_"]').prop('disabled', true);
                    $('[name^="TakeEndDatm_"]').prop('disabled', true);
                }
                else if( $('[name="TakeType"]:checked').val() == 'L' ) {
                    $('[name^="TakeStartDatm_"]').prop('disabled', false);
                    $('[name^="TakeEndDatm_"]').prop('disabled', false);
                }
            }

            // 문자 바이트 수 계산
            $('#SmsMemo').on('change keyup', function() {
                $('#content_byte').val(fn_chk_byte($(this).val()));
            });

            @if( !empty($data['Memo']) )
            $('#content_byte').val(fn_chk_byte($('#SmsMemo').val()));
            @endif

            // 응시형태에 따른 웅시지역, 접수마감인원 분기처리
            $regi_form.on('ifChanged', '[name="TakeFormsCcd"]', TakeFormCheck);
            TakeFormCheck();

            function TakeFormCheck() {
                var applyType_on = '{{$applyType_on}}';
                var selType = $('[name="TakeFormsCcd"]:checked').map(function () {
                    return this.value;
                }).get();

                if(selType.length === 1 && selType[0] === applyType_on) {
                    $('[name="TakeAreas1CCds[]"]').iCheck('uncheck').prop('disabled', true);
                    $('[name="TakeAreas2Ccds[]"]').iCheck('uncheck').prop('disabled', true);
                    $('[name="ClosingPerson"]').val('').prop('disabled', true);
                }
                else {
                    $('[name="TakeAreas1CCds[]"]').prop('disabled', false);
                    $('[name="TakeAreas2Ccds[]"]').prop('disabled', false);
                    $('[name="ClosingPerson"]').prop('disabled', false);
                }
                $('[name="TakeAreas1CCds[]"]').iCheck('update');
                $('[name="TakeAreas2Ccds[]"]').iCheck('update');
            }


            // 사이트, 카테고리, 응시분야, 직렬, 발신번호
            @if($method == 'POST') $regi_form.find('#cateD1').chained('#siteCode'); @endif

            $regi_form.on('change', '#siteCode, #cateD1', moInputInit);
            moInputInit();

            function moInputInit() {
                var src_site = $('#siteCode');
                var src = $('#cateD1');

                // 응시분야
                var txt = !src.val() ? '' : src.find('option:selected').text();

                $regi_form.find('[name="TakePart"]').val(src.val());
                $regi_form.find('#TakePartDisp').text(txt);

                // 직렬
                var cateD2 = JSON.parse('{!! $cateD2 !!}');
                var cateD2_sel = JSON.parse('{!! $cateD2_sel !!}');
                var cateD2_input = checked = disabled = '';

                if (src.val()) {
                    $.each(cateD2[src.val()], function (i, v) {
                        @if($method == 'PUT') disabled = ' disabled '; @endif
                            checked = ($.inArray(i, cateD2_sel) !== -1) ? ' checked ' : '';

                        cateD2_input += '<input type="checkbox" class="flat" name="cateD2[]" value="' + i + '"' + checked + disabled + '> <span class="flat-text mr-20">' + v + '</span>';
                    });
                    $("#cateD2-wrap").html(cateD2_input);
                    init_iCheck();
                }
                else {
                    $("#cateD2-wrap").html('');
                }

                // 발신번호
                var csTelChk = true;
                @if($method == 'PUT') csTelChk = false; @endif  {{-- 수정 로딩시 입력된 발신번호 유지위해 --}}

                if(csTelChk) {
                    var csTel = JSON.parse('{!! $csTel !!}');
                    $('[name=SendTel]').val(csTel[src_site.val()]);
                }
                if(csTelChk === false) csTelChk = true;
            }

            if(mode == 'multi'){
                fakeSave();
            }
        });
    </script>
@stop