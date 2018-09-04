@extends('willbes.pc.layouts.master')

@section('content')
<div id="Container" class="subContainer widthAuto c_both">
    @include('willbes.pc.layouts.partial.site_tab_menu')
    <div class="Depth">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <!-- Write -->
        <div class="willbes-Leclist mt40 c_both">
            <div class="LecWriteTable">
                <form id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return true;" action="{!! site_url('support/qna/store?'.$get_params) !!}">
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    <input type="hidden" name="idx" value="{{ $board_idx }}"/>
                    <input type="hidden" name="reg_type" value="{{$reg_type}}"/>

                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 820px;">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">과정선택<span class="tx-light-blue">(*)</span></td>
                            <td class="w-selected tx-left pl30">
                                <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess" style="width: 250px;" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
                                    <option value="">과정선택</option>
                                    @foreach($arr_base['site_list'] as $key => $val)
                                        <option value="{{$key}}" @if($data['SiteCode'] == $key || $__cfg['SiteCode'] == $key)selected="selected"@endif>{{$val}}</option>
                                    @endforeach
                                </select>

                                <select id="s_cate_code" name="s_cate_code" title="구분" class="seleCategory" style="width: 250px;" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
                                    <option value="">구분</option>
                                    @foreach($arr_base['category'] as $row)
                                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if($data['Category_String'] == $row['CateCode'])selected="selected"@endif>{{$row['CateName']}}</option>
                                    @endforeach
                                </select>

                                <select id="s_campus" name="s_campus" title="캠퍼스" class="seleCampus" style="width: 250px;">
                                    <option value="">캠퍼스 선택</option>
                                    @foreach($arr_base['campus'] as $row)
                                        <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" @if($data['CampusCcd'] == $row['CampusCcd'])selected="selected"@endif>{{$row['CcdName']}}</option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">상담유형<span class="tx-light-blue">(*)</span></td>
                            <td class="w-selected full tx-left pl30" colspan="3">
                                <select id="s_consult_type" name="s_consult_type" title="상담유형" class="seleLecA">
                                    <option value="">상담 유형 선택</option>
                                    @foreach($arr_base['consult_type'] as $key => $val)
                                        <option value="{{$key}}" @if($data['TypeCcd'] == $key)selected="selected"@endif>{{$val}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">공개여부</td>
                            <td class="w-radio tx-left pl30" colspan="3">
                                <ul>
                                    <li><input type="radio" id="is_public_y" name="is_public" class="goods_chk" value="Y" @if($data['IsPublic']=='N')checked="checked"@endif><label>공개</label></li>
                                    <li><input type="radio" id="is_public_n" name="is_public" class="goods_chk" value="N" @if($method == 'POST' || $data['IsPublic']=='N')checked="checked"@endif><label>비공개</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                            <td class="w-text tx-left pl30" colspan="3">
                                <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="30" value="{{$data['Title']}}">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                            <td class="w-textarea write tx-left pl30" colspan="3">
                                <textarea id="board_content" name="board_content" class="form-control" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left strong pl30">첨부</td>
                            <td class="w-file answer tx-left" colspan="4">
                                <ul class="attach">
                                    @for($i = 0; $i < $attach_file_cnt; $i++)
                                        <li>
                                            <div class="filetype">
                                                <input type="text" class="file-text" />
                                                <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                <span class="file-select"><input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="input-file" size="3"></span>
                                            </div>
                                        </li>
                                    @endfor
                                    <li>
                                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                        • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>

                <div class="search-Btn mt20 h36 p_re">
                    <button type="button" id="btn_list" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                        <span class="tx-purple-gray">취소</span>
                    </button>
                    <button type="submit" id="btn_submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                        <span>저장</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">
    </div>
</div>

<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        $regi_form.find('select[name="s_cate_code"]').chained("#s_site_code");
        $regi_form.find('select[name="s_campus"]').chained("#s_site_code");

        $('#btn_list').click(function() {
            location.href = '{!! site_url('support/qna/index?'.$get_params) !!}';
        });

        $regi_form.bind('submit', function () {
            $(this).find(':input').prop('disabled', false);
        });

        $('#btn_submit').click(function () {
            var is_public = $(":input:radio[name=is_public]:checked").length;

            if ($('#s_site_code').val() == '') {
                alert('과정을 선택해 주세요.');
                return false;
            }

            if ($('#s_consult_type').val() == '') {
                alert('상담유형을 선택해 주세요.');
                return false;
            }

            if (is_public < 1) {
                alert('공개여부를 선택해 주세요.');
                return false;
            }

            if ($('#board_title').val() == '') {
                alert('제목을 선택해 주세요.');
                return false;
            }

            if ($('#board_content').val() == '') {
                alert('제목을 선택해 주세요.');
                return false;
            }

            if (!confirm('저장하시겠습니까?')) {
                return;
            }
            $regi_form.submit();
        });
    });
</script>
<!-- End Container -->
@stop