@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 성적을 통합관리하기 위해 그룹정보를 생성하는 메뉴입니다. (모의고사가 1개라도 성적 산출을 위해 모의고사 그룹등록 필요)</h5>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2>모의고사 그룹등록</h2>
        </div>
        <div class="x_content">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['MgIdx'] : '' }}">
                <input type="hidden" name="Info" value="">

                <table class="table table-bordered">
                    <tr>
                        <th style="width:15%">모의고사 그룹명 <span class="required">*</span></th>
                        <td style="width:35%">
                            <input type="text" class="form-control" name="GroupName" required="required" title="모의고사 그룹명" value="@if($method == 'PUT'){{ $data['GroupName'] }}@endif">
                        </td>
                        <th style="width:15%">모의고사 그룹코드</th>
                        <td style="width:35%">@if($method == 'PUT'){{ $data['MgIdx'] }}@endif</td>
                    </tr>
                    <tr>
                        <th colspan="1">
                            모의고사선택 <span class="required">*</span>
                            <button type="button" class="btn btn-xs btn-primary ml-10 mt-5" id="act-searchGoods">선택</button>
                        </th>
                        <td colspan="3">
                            <div id="mGoods-wrap" class="subject-wrap form-table form-table-sm" style="overflow-x: auto; overflow-y: hidden;">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">운영사이트</th>
                                        <th class="text-center">카테고리</th>
                                        <th class="text-center">직렬</th>
                                        <th class="text-center">연도</th>
                                        <th class="text-center">회차</th>
                                        <th class="text-center">Online 응시</th>
                                        <th class="text-center">Off 응시</th>
                                        <th class="text-center">모의고사명</th>
                                        <th class="text-center">삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                                    <tr data-goods-idx="">
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center" style="width:50px;"></td>
                                        <td class="text-center" style="width:50px;"></td>
                                        <td></td>
                                        <td class="text-center">
                                            <input type="hidden" name="ProdCode[]" value="">
                                            <input type="hidden" name="SiteGroupCode[]" value="">
                                            <span class="act-su-del link-cursor"><i class="fa fa-times fa-lg red"></i></span>
                                        </td>
                                    </tr>
                                    {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                                    @if($method == 'PUT')
                                        @foreach($mData as $row)
                                            <tr data-goods-idx="{{ $row['MrgIdx'] }}">
                                                <td class="text-center">{{ $row['SiteName'] }}</td>
                                                <td class="text-center">{{ $row['CateName'] }}</td>
                                                <td class="text-center">{!! join('<br>', $row['MockPartName']) !!}</td>
                                                <td class="text-center">{{ $row['MockYear'] }}</td>
                                                <td class="text-center">{{ $row['MockRotationNo'] }}</td>
                                                <td class="text-center" style="width:50px;">{!! ($row['TakePart_on'] === 'Y') ? 'Y' : '<span class="red">N</span>' !!}</td>
                                                <td class="text-center" style="width:50px;">{!! ($row['TakePart_off'] === 'Y') ? 'Y' : '<span class="red">N</span>' !!}</td>
                                                <td><span class="blue underline-link act-goto-goods">[{{ $row['ProdCode'] }}] {{ $row['ProdName'] }}</span></td>
                                                <td class="text-center">
                                                    <input type="hidden" name="ProdCode[]" value="{{ $row['ProdCode'] }}">
                                                    <input type="hidden" name="SiteGroupCode[]" value="{{ $data['SiteGroupCode'] }}">
                                                    <span class="act-su-del link-cursor"><i class="fa fa-times fa-lg red"></i></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>성적오픈일 </th>
                        <td colspan="3" class="form-inline">

                            <input type="text" class="form-control datepicker" style="width:100px;" name="GradeOpenDatm_d" value="@if($method == 'PUT'){{ substr($data['GradeOpenDatm'], 0, 10) }}@endif" readonly>
                            <select name="GradeOpenDatm_h" class="form-control">
                                @foreach(range(0, 23) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['GradeOpenDatm'], 11, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 시
                            <select name="GradeOpenDatm_m" class="form-control">
                                @foreach(range(0, 59) as $i)
                                    @php $v = sprintf("%02d", $i); @endphp
                                    <option value="{{$v}}" @if($method==='PUT' && substr($data['GradeOpenDatm'], 14, 2) == $v) selected @endif>{{$v}}</option>
                                @endforeach
                            </select> 분

                            <span style="position: relative; top: 2px; left: 8px;">[프론트] 통합내강의실 > 모의고사관리 > 성적결과의 성적표 노출일자 설정</span>
                        </td>
                    </tr>
                    <tr>
                        <th>사용여부 <span class="required">*</span></th>
                        <td colspan="3">
                            <input type="radio" name="IsUse" class="flat" value="Y" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                            <input type="radio" name="IsUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">설명</th>
                        <td colspan="3">
                            <textarea name="GroupDesc" class="form-control" style="width: 100%; height: 70px;">@if($method == 'PUT'){{ $data['GroupDesc'] }}@endif</textarea>
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
        var mAddField;

        $(document).ready(function() {
            // 모의고사상품 검색창 오픈
            $('#act-searchGoods').on('click', function() {
                $('#act-searchGoods').setLayer({
                    'url': '{{ site_url() }}' + 'mocktest/regGroup/searchGoods',
                    'width': 1200
                });
            });

            // 모의고사상품 초기화
            var chapterExist = [];
            var chapterDel = [];
            var mList = $('#mGoods-wrap table tbody');
            mAddField = mList.find('tr:eq(0)').html();
            mList.find('tr:eq(0)').remove();

            mList.find('tr').each(function () {
                var sIDX = $(this).data('goods-idx');
                if(sIDX) chapterExist.push(sIDX);
            });

            // 모의고사상품 삭제
            $regi_form.on('click', '.act-su-del', function () {
                var that = $(this).closest('tr');
                var mIdx = $(this).closest('tr').data('goods-idx');

                if ( $(this).closest('#mGoods-wrap').find('tbody > tr').length <= 1 ) {
                    alert('모의고사 상품은 하나이상 존재해야 합니다.');
                    return false;
                }

                if( !mIdx ) { // 등록전
                    rowDel_Disp();
                }
                else { // 등록후
                    if (!confirm("삭제는 저장시 적용됩니다.\n삭제 대기목록에 추가하시겠습니까?")) return false;

                    chapterDel.push(mIdx);
                    rowDel_Disp();
                }

                function rowDel_Disp() {
                    that.remove();
                }
            });

            // 모의고사상품 수정으로 이동
            $regi_form.on('click', '.act-goto-goods', function () {
                var mUrl = '{{ site_url('/mocktest/regGoods/edit/') }}' + $(this).closest('tr').find('[name="ProdCode[]"]').val();
                popupOpen(mUrl, '_mGoods')
            });


            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/mocktest/regGroup') }}' + getQueryString());
            });

            // 기본정보 등록,수정
            $regi_form.submit(function() {
                var chapterTotal = [];
                mList.find('tr').each(function () { chapterTotal.push($(this).data('goods-idx')); });
                $regi_form.find('[name="Info"]').val( JSON.stringify({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel}) );

                var _url = '{{ ($method == 'PUT') ? site_url('/mocktest/regGroup/update') : site_url('/mocktest/regGroup/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regGroup') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

        });
    </script>
@stop