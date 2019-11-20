@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 문제등록을 위한 과목별 문제영역(학습요소)을 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2>문제영역정보</h2>
        </div>
        <div class="x_content">
            <form class="form-table" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ ($method == 'PUT') ? $data['MaIdx'] : '' }}">
                <input type="hidden" name="isCopy" value="@if($method == 'PUT'){{ $isCopy }}@endif">

                <table class="table table-bordered modal-table">
                    <tr>
                        <th colspan="1">운영사이트 <span class="required">*</span></th>
                        <td colspan="3" class="form-inline">
                            {{--{!! html_site_select($siteCodeDef, 'site_code', 'siteCode', '', '운영 사이트', 'required', ($method == 'PUT') ? 'disabled' : '') !!}--}}
                            {!! html_site_select($def_site_code, 'site_code', 'siteCode', '', '운영 사이트', 'required', ($method == 'PUT') ? 'disabled' : '', false, $arr_site_code) !!}
                            <span class="ml-20">저장 후 운영사이트, 모의고사카테고리 정보는 수정이 불가능합니다.</span>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="1">모의고사카테고리 <span class="required">*</span></th>
                        <td colspan="3">
                            <button type="button" class="btn btn-sm btn-primary act-searchCate">카테고리검색</button>
                            <div id="selected_category" class="row">
                                @if($method == 'PUT')

                                    @foreach($moCate_name as $code => $name)
                                        <div class="col-xs-4 pb-5">
                                            {{ preg_replace('/^(.*?\s>\s)/', '',$name) }}
                                            @if(isset($moCate_isUse[$code]) && $moCate_isUse[$code] == 'N') <span class="ml-5 red">(미사용)</span> @endif
                                            <a href="#none" data-cate-code="{{ $code }}" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                            <input type="hidden" name="moLink[]" value="{{ $code }}">
                                        </div>
                                    @endforeach

                                @endif
                            </div>

                            @if($method == 'PUT')
                                @foreach($moCate_name as $code => $name)
                                    <input type="hidden" name="moLink_be[]" value="{{ $code }}">
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style="width:15%;">문제영역명 <span class="required">*</span></th>
                        <td style="width:35%;">
                            <input type="text" class="form-control" name="questionArea" value="@if($method == 'PUT'){{ $data['QuestionArea'] }}@endif">
                        </td>
                        <th style="width:15%;">사용여부 <span class="required">*</span></th>
                        <td style="width:35%;">
                            <div>
                                <input type="radio" name="isUse" class="flat" value="Y" required="required" @if($method == 'POST' || ($method == 'PUT' && $data['IsUse'] == 'Y')) checked="checked" @endif> <span class="flat-text mr-20">사용</span>
                                <input type="radio" name="isUse" class="flat" value="N" @if($method == 'PUT' && $data['IsUse'] == 'N') checked="checked" @endif> <span class="flat-text">미사용</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>등록자</th>
                        <td>@if($method == 'PUT') {{ $data['RegAdminName'] }} @endif</td>
                        <th>등록일</th>
                        <td>@if($method == 'PUT') {{ $data['RegDatm'] }} @endif</td>
                    </tr>
                    <tr>
                        <th>최종수정자</th>
                        <td>@if($method == 'PUT') {{ $data['UpdAdminName'] }} @endif</td>
                        <th>최종수정일</th>
                        <td>@if($method == 'PUT') {{ $data['UpdDatm'] }} @endif</td>
                    </tr>
                </table>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" style="position:absolute; right:0;" type="button" id="goList">목록</button>
                </div>
            </form>
        </div>

        @if($method == 'PUT')
            <div class="x_content mt-50">
                <div>
                    <div class="pull-left mt-15 mb-10">[ 총 {{ count($chData) }}건 ]</div>
                    <div class="pull-right text-right form-inline mb-5">
                        <select class="form-control">
                            @foreach(range(1, 20) as $n)
                                <option value="{{$n}}" @if($loop->index == '20') selected @endif>{{$n}}개</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-primary ml-5" id="addRow">필드추가</button>
                    </div>
                </div>
                <form class="form-table" id="regi_sub_form" name="regi_sub_form" method="POST" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    <input type="hidden" name="idx" value="{{ $data['MaIdx'] }}"/>

                    <table class="table table-bordered modal-table">
                        <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">영역명</th>
                            <th class="text-center">정렬</th>
                            <th class="text-center">사용여부</th>
                            <th class="text-center">등록자</th>
                            <th class="text-center">등록일</th>
                            <th class="text-center">수정자</th>
                            <th class="text-center">수정일</th>
                            <th class="text-center">삭제</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                        <tr data-chapter-idx="">
                            <td class="text-center"></td>
                            <td class="text-center"><input type="text" class="form-control" name="areaName[]" value=""></td>
                            <td class="text-center form-inline"><input type="text" class="form-control" style="width:45px" name="orderNum[]" value=""></td>
                            <td class="text-center">
                                <select class="form-control" name="isUse[]">
                                    <option value="Y">사용</option>
                                    <option value="N">미사용</option>
                                </select>
                            </td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                        </tr>
                        {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                        @foreach($chData as $row)
                            <tr data-chapter-idx="{{ $row['MalIdx'] }}">
                                <td class="text-center">{{ $loop->index }}</td>
                                <td class="text-center"><input type="text" class="form-control" name="areaName[]" value="{{ $row['AreaName'] }}"></td>
                                <td class="text-center form-inline"><input type="text" class="form-control" style="width:45px" name="orderNum[]" value="{{ $row['OrderNum'] }}"></td>
                                <td class="text-center">
                                    <select class="form-control" name="isUse[]">
                                        <option value="">사용여부</option>
                                        <option value="Y" {{ ($row['IsUse'] == 'Y') ? 'selected' : '' }}>사용</option>
                                        <option value="N" {{ ($row['IsUse'] == 'N') ? 'selected' : '' }}>미사용</option>
                                    </select>
                                </td>
                                <td class="text-center">{{ $row['RegAdminName'] }}</td>
                                <td class="text-center">{{ $row['RegDate'] }}</td>
                                <td class="text-center">{{ $row['UpdAdminName'] }}</td>
                                <td class="text-center">{{ $row['UpdDate'] }}</td>
                                <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mr-10">저장</button>
                    </div>
                </form>
            </div>
        @endif
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $regi_sub_form = $('#regi_sub_form');

        $(document).ready(function() {
            // 기본정보 등록,수정
            $regi_form.submit(function() {
                //if (!confirm("저장후 사이트, 카테고리정보는 수정이 불가능합니다.\n저장하시겠습니까?")) return false;

                var _url = '{{ ($method == 'PUT') ? site_url('/mocktestNew/base/range/update/') : site_url('/mocktestNew/base/range/store/') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktestNew/base/range/create/') }}' + ret.ret_data.dt.idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 출제 챕터 등록,수정
            $regi_sub_form.submit(function () {
                if( $regi_sub_form.find('tbody tr').length < 1 ) { alert('필드를 먼저 추가해 주세요'); return false; }

                var chapterTotal = [];
                cList.find('tr').each(function () { chapterTotal.push($(this).data('chapter-idx')); });

                var _url = '{{ site_url('/mocktestNew/base/range/storeChapter/') }}';
                var data = $regi_sub_form.serialize() + '&' + $.param({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel});
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktestNew/base/range/') }}' + getQueryString());
                    }
                }, showValidateError, false, 'POST');
            });

            // 카테고리 검색창 오픈
            $('.act-searchCate').on('click', function() {
                if( !$('[name=siteCode]').val() ) { alert('운영사이트를 먼저 선택해 주세요'); return false; }

                $('.act-searchCate').setLayer({
                    'url' : '{{ site_url() }}' + 'mocktestNew/base/code/moCate/?siteCode=' + $('[name=siteCode]').val(),
                    'width' : 1100
                });
            });

            // 선택 카테고리 삭제
            $('#selected_category').on('click', '.selected-category-delete', function () {
                $(this).closest('div').remove();
            });

            // 운영사이트 변경시 카테고리 선택 초기화
            $('[name=siteCode]').on('change', function () {
                $('#selected_category').empty();
            });

            // 목록 이동
            $('#goList').on('click', function() {
                location.replace('{{ site_url('/mocktestNew/base/range/') }}' + getQueryString());
            });


            // 챕터필드 처리을 위한 초기화작업
            var chapterExist = [];
            var chapterDel = [];
            var cList = $regi_sub_form.find('tbody');
            var addField = cList.find('tr:eq(0)').html();
            cList.find('tr:eq(0)').remove();

            cList.find('tr').each(function () {
                var cIDX = $(this).data('chapter-idx');
                if(cIDX) chapterExist.push(cIDX);
            });

            // 챕터필드 추가
            $('#addRow').on('click', function () {
                var i;
                var count = $(this).closest('div').find('select').val();

                for (i=0; i < count; i++) {
                    cList.append('<tr>' + addField + '</tr>');
                }

                cList.find('tr').each(function (index) {
                    $(this).find('td:eq(0)').text(++index);
                    $(this).find('td:eq(2)').html("<input type='text' class='form-control' style='width:45px' name='orderNum[]' value='"+ index +"'>");
                });
            });

            // 챕터필드 삭제
            $regi_sub_form.on('click', '.addRow-del', function () {
                if( $(this).closest('tr').find('[name="areaName[]"]').val() ) {
                    if (!confirm("삭제는 저장시 적용됩니다.\n삭제 대기목록에 추가하시겠습니까?")) return false;
                }

                var cIDX = $(this).closest('tr').data('chapter-idx');

                if(cIDX) chapterDel.push(cIDX);
                $(this).closest('tr').remove();

                cList.find('tr').each(function (index) {
                    $(this).find('td:eq(0)').text(++index);
                });
            });
        });
    </script>
@stop