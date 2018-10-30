@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 상품정보를 등록하고 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2>모의고사정보등록</h2>
        </div>
        <div class="x_content">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data[''] : '' }}">

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
                            <select class="form-control mr-5 " id="cateD1" name="cateD1" {{ ($method == 'PUT') ? 'disabled' : '' }}>
                                <option value="">카테고리</option>
                                @foreach($cateD1 as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" @if($method == 'PUT' && $row['SiteCode'] == $data['SiteCode']) selected @endif>{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <th style="width: 15%">응시분야 <span class="required">*</span></th>
                        <td style="width: 35%" class="form-inline">
                            <span id="applyPartDisp"></span>
                            <input type="hidden" name="applyPart" value="{{ ($method == 'PUT') ? $data[''] : '' }}">
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">직렬 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <div id="cateD2-wrap"></div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">응시형태 <span class="required">*</span></th>
                        <td colspan="3">
                            @foreach($applyType as $k => $v)
                                <input type="checkbox" class="flat" name="TakeFormsCcds[]" value="{{$k}}"> <span class="flat-text mr-20">{{$v}}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">OFF(학원) 응시지역1 <span class="required">*</span></th>
                        <td colspan="3">
                            @foreach($applyArea1 as $k => $v)
                                <input type="checkbox" class="flat" name="TakeAreas1CCds[]" value="{{$k}}"> <span class="flat-text mr-20">{{$v}}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">OFF(학원) 응시지역2 <span class="required">*</span></th>
                        <td colspan="3">
                            @foreach($applyArea2 as $k => $v)
                                <input type="checkbox" class="flat" name="TakeAreas2Ccd[]" value="{{$k}}"> <span class="flat-text mr-20">{{$v}}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">가산점 <span class="required">*</span></th>
                        <td colspan="3">
                            @foreach($addPoint as $k => $v)
                                <input type="checkbox" class="flat" name="AddPointsCcd[]" value="{{$k}}"> <span class="flat-text mr-20">{{$v}}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>연도 <span class="required">*</span></th>
                        <td class="form-inline">
                            <select class="form-control mr-5" name="MockYear">
                                <option value="">연도</option>
                                @for($i=(date('Y')+1); $i>=2005; $i--)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['Year']) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                        <th>회차 <span class="required">*</span></th>
                        <td class="form-inline">
                            <select class="form-control mr-5" name="MockRotationNo">
                                <option value="">회차</option>
                                @foreach(range(1, 20) as $i)
                                    <option value="{{$i}}" @if($method == 'PUT' && $i == $data['RotationNo']) selected @endif>{{$i}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>모의고사명 <span class="required">*</span></th>
                        <td>
                            <input type="text" class="form-control" name="ProdName" value="@if($method == 'PUT'){{ $data[''] }}@endif" style="width:70%;">
                        </td>
                        <th>모의고사코드</th>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">판매가 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <span class="blue">[정상가]</span> <input type="text" class="form-control" name="SalePrice" value="@if($method == 'PUT'){{ $data[''] }}@endif" style="width:100px;"> 원
                            <span class="blue ml-20">[할인]</span> <input type="text" class="form-control" name="SaleRate" value="@if($method == 'PUT'){{ $data[''] }}@endif" style="width:100px;">
                            <select name="SaleDiscType" class="form-control">
                                <option value="R">%</option>
                                <option value="P">-</option>
                            </select>
                            <span class="blue ml-20">[판매가]</span> <input type="text" class="form-control" name="RealSalePrice" value="@if($method == 'PUT'){{ $data[''] }}@endif" style="width:100px;"> 원
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">접수기간 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <input type="text" class="form-control datepicker" style="width:100px;" name="SaleStartDatm_d" value="@if($method == 'PUT'){{ $data[''] }}@endif" readonly>
                            <select name="SaleStartDatm_h" class="form-control">
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && date("H",strtotime($data['d'])) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="SaleStartDatm_m" class="form-control">
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && date("H",strtotime($data['d'])) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                            <span class="ml-10 mr-10"> ~ </span>
                            <input type="text" class="form-control datepicker" style="width:100px;" name="SaleEndDatm_d" value="@if($method == 'PUT'){{ $data[''] }}@endif" readonly>
                            <select name="SaleEndDatm_h" class="form-control">
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && date("H",strtotime($data['d'])) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="SaleEndDatm_m" class="form-control">
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && date("H",strtotime($data['d'])) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">접수마감인원(학원용) <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <input type="text" class="form-control" name="ClosingPerson" value="@if($method == 'PUT'){{ $data[''] }}@endif" style="width: 100px;">
                            <span class="ml-20">응시형태가 'OFF(학원)'인 경우 마감인원 (미등록시 무제한)</span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">접수상태 <span class="required">*</span></th>
                        <td colspan="3">
                            <input type="radio" name="IsRegister" class="flat" value="" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-10">진행중</span>
                            <input type="radio" name="IsRegister" class="flat" value="" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text mr-20">접수마감</span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">응시가능기간 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <input type="text" class="form-control datepicker" style="width:100px;" name="TakeStartDatm_d" value="@if($method == 'PUT'){{ $data[''] }}@endif" readonly>
                            <select name="TakeStartDatm_h" class="form-control">
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && date("H",strtotime($data['d'])) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="TakeStartDatm_m" class="form-control">
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && date("H",strtotime($data['d'])) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                            <span class="ml-10 mr-10"> ~ </span>
                            <input type="text" class="form-control datepicker" style="width:100px;" name="TakeEndDatm_d" value="@if($method == 'PUT'){{ $data[''] }}@endif" readonly>
                            <select name="TakeEndDatm_h" class="form-control">
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && date("H",strtotime($data['d'])) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="TakeEndDatm_m" class="form-control">
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && date("H",strtotime($data['d'])) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분
                            <span class="ml-20 mr-20"> | </span>
                            <input type="radio" name="TakeType" class="flat" value="" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-10">상시</span>
                            <input type="radio" name="TakeType" class="flat" value="" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text mr-20">기간제한</span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">응시시간 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <input type="text" class="form-control" name="TakeTime" value="@if($method == 'PUT'){{ $data[''] }}@endif" style="width: 100px;"> 분
                        </td>
                    </tr>
                    <tr data-su-type="E"> {{-- PmrpIdx --}}
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
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr data-su-type="S">
                        <th colspan="1">
                            선택과목 <span class="required">*</span>
                            <button type="button" class="btn btn-sm btn-primary ml-10 act-su-search">검색</button>
                        </th>
                        <td colspan="3">
                            <div id="sSubject-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">
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
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">자동문자(결제완료) <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            <div class="mb-5">
                                <span class="mr-10">[문자발송사용여부]</span>
                                <input type="radio" name="IsSms" class="flat" value="Y" @if($method == 'PUT' && $data['IsSms']=='Y') checked @endif> <span class="flat-text mr-20">사용</span>
                                <input type="radio" name="IsSms" class="flat" value="N" @if($method == 'POST' || ($method == 'PUT' && $data['IsSms']=='N')) checked @endif> <span class="flat-text">미사용</span>
                            </div>
                            <textarea id="SmsMemo" name="Memo" class="form-control" style="width: 60%; height: 100px;"></textarea>
                            <div class="mt-10">
                                [발신번호] <input type="text" name="SendTel" id="SendTel" value="" size="12" class="form-control" maxlength="20">
                                <input class="form-control border-red red" id="content_byte" style="width: 50px;" type="text" readonly="readonly" value="0">
                                <span class="red">byte</span>
                                (80byte 초과 시 LMS 문자로 전환됩니다.)
                            </div>
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th colspan="1">자동문자(결제대기) <span class="required">*</span></th>--}}
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
                </table>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" style="position:absolute; right:0;" type="button" id="goList">목록</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var suAddField;

        $(document).ready(function() {
            // 사이트, 카테고리 링크
            $regi_form.find('.cateD1').chained('#siteCode');

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
            var sList = $('#eSubject-wrap table tbody');
            suAddField = sList.find('tr:eq(0)').html();
            sList.find('tr:eq(0)').remove();

            // 과목리스트 삭제
            $regi_form.on('click', '.act-su-del', function () {
                var that = $(this);
                var suIdx = $(this).data('subject-idx');

                if( !suIdx ) { // 등록전 삭제
                    rowDel_Disp();
                }
                else { // 등록후
                    if (!confirm("삭제하시겠습니까?")) return false;

                    var _url = '{{ site_url("/mocktest/regGoods/searchExamDel") }}';
                    var data = {
                        '{{ csrf_token_name() }}' : $regi_form.find('[name="{{ csrf_token_name() }}"]').val(),
                        '_method' : 'PUT',
                        'idx' : suIdx,
                    };

                    sendAjax(_url, data, function(ret) {
                        if (ret.ret_cd) {
                            rowDel_Disp();
                            notifyAlert('success', '알림', ret.ret_msg);
                        }
                    }, showValidateError, false, 'POST');
                }

                function rowDel_Disp() {
                    that.closest('tr').remove();
                    that.closest('tbody').find('tr [name="OrderNum[]"]').each(function (index) {
                        that.val(++index);
                    });
                }
            });

            // 과목리스트 정렬변경
            $regi_form.on('click', '.act-su-sort', function () {
                var that = $(this).closest('tbody');

                if($(this).closest('.subject-wrap').find('tbody > tr').length == 0) return false;


                var error = false;
                var sorting = {};
                $(this).closest('td').find('tbody > tr').each(function () {
                    if($(this).data('chapter-idx')) {
                        sorting[$(this).data('subject-idx')] = $(this).find('[name="OrderNum[]"]').val();
                    }
                    else {
                        error = true;
                    }
                });
                if(error) {
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
                var _url = '{{ ($method == 'PUT') ? site_url('/mocktest/regGoods/update') : site_url('/mocktest/regGoods/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regGoods/') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 문자 바이트 수 계산
            $('#SmsMemo').on('change keyup input', function() {
                $('#content_byte').val(fn_chk_byte($(this).val()));
            });

            @if(empty($data_sms['Memo']) !== true)
            $('#content_byte').val(fn_chk_byte($('#SmsMemo').val()));
            @endif

            // 사이트, 카테고리, 응시분야, 직렬, 발신번호
            $regi_form.find('#cateD1').chained('#siteCode');
            $regi_form.on('change', '#siteCode, #cateD1', moInputInit);

            function moInputInit() {
                var src_site = $('#siteCode');
                var src = $('#cateD1');

                // 응시분야
                var txt = !src.val() ? '' : src.find('option:selected').text();

                $regi_form.find('[name="applyPart"]').val(src.val());
                $regi_form.find('#applyPartDisp').text(txt);

                // 직렬
                var cateD2 = JSON.parse('{!! $cateD2 !!}');
                var cateD2_input = '';
                if (src.val()) {
                    $.each(cateD2[src.val()], function (i, v) {
                        cateD2_input += '<input type="checkbox" class="flat" name="cateD2[]" value="' + i + '"> <span class="flat-text mr-20">' + v + '</span>';
                    });
                    $("#cateD2-wrap").html(cateD2_input);
                    init_iCheck();
                }

                // 발신번호
                var csTel = JSON.parse('{!! $csTel !!}');
                $('[name=SendTel]').val( csTel[src_site.val()] );
            }
            moInputInit();
        });
    </script>
@stop