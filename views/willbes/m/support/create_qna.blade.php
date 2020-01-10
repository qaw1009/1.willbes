@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <form id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $board_idx }}"/>
        <input type="hidden" name="reg_type" value="{{$reg_type}}"/>
        <input type="hidden" name="put_site_code" value="{{($method=='PUT') ? $data['SiteCode'] : $__cfg['SiteCode']}}"/>
        <input type="hidden" name="is_public" value="N"/>
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            동영상 상담실
        </div>
        <div class="willbes-Lec-Selected NG tx-gray">
            <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess width50p" @if($__cfg['SiteCode'] != config_item('app_intg_site_code') || $method == 'PUT') disabled @endif>
                <option value="">과정선택</option>
                @foreach($arr_base['site_list'] as $key => $val)
                    <option value="{{$key}}" @if($data['SiteCode'] == $key || $__cfg['SiteCode'] == $key)selected="selected"@endif>{{$val}}</option>
                @endforeach
            </select>
            <select id="s_cate_code" name="s_cate_code" title="구분" class="seleCate width49p ml1p">
                <option value="">구분</option>
                @foreach($arr_base['category'] as $row)
                    <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if($data['Category_String'] == $row['CateCode'])selected="selected"@endif @if(empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) disabled @endif>{{$row['CateNameRoute']}}</option>
                @endforeach
            </select>
            <select id="s_consult_type" name="s_consult_type" title="상담유형" class="seleLecA width34p mt1p">
                <option value="">상담유형</option>
                @foreach($arr_base['consult_type'] as $key => $val)
                    <option value="{{$key}}" @if($data['TypeCcd'] == $key)selected="selected"@endif>{{$val}}</option>
                @endforeach
            </select>
            <select id="s_campus" name="s_campus" title="캠퍼스" class="seleCampus width34p ml1p mt1p">
                <option value="">캠퍼스 선택</option>
                @foreach($arr_base['campus'] as $row)
                    <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" @if($data['CampusCcd'] == $row['CampusCcd'])selected="selected"@endif>{{$row['CcdName']}}</option>
                @endforeach
            </select>
            <span class="chkBox line2">
                <input type="checkbox" id="s_is_public" name="s_is_public" class="goods_chk" value="1" @if($method == 'POST' || $data['IsPublic']=='N')checked="checked"@endif> <span>비밀글 여부</span>
            </span>
            <div class="willbes-Lec-Search NG width100p mt1p">
                <input type="text" id="board_title" name="board_title" class="labelSearch width100p" placeholder="제목" maxlength="30" value="{{$data['Title']}}">
            </div>
        </div>

        <div class="willbes-WriteBox NG tx-gray pb20">
            <textarea id="board_content" name="board_content" class="form-control" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
            <div class="filetype p_re mt10">
                <input type="text" class="file-text"/>
                <span class="file-btn reset-Btn f_right width25p ml1p">Search</span>
                <span class="file-select"><input type="file" name="attach_file[]" class="input-file" size="3"></span>
            </div>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

        <div id="Fixbtn" class="Fixbtn two">
            <ul>
                <li class="btn_blue"><a href="javascript:void(0);" id="btn_submit">등록</a></li>
                <li class="btn_gray"><a href="javascript:void(0);" id="btn_list">취소</a></li>
            </ul>
        </div>
        <!-- Fixbtn -->
    </form>
</div>
<!-- End Container -->

<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        $regi_form.find('select[name="s_cate_code"]').chained("#s_site_code");
        $regi_form.find('select[name="s_campus"]').chained("#s_site_code");

        $('#btn_list').click(function() {
            location.href = '{!! front_url($default_path.'/index?'.$get_params) !!}';
        });

        $('#btn_submit').click(function () {
            var _url = '{!! front_url($default_path.'/store?'.$get_params) !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.href = '{!! front_url($default_path.'/index?'.$get_params) !!}';
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        function addValidate() {
            var is_public = $(":input:radio[name=is_public]:checked").length;

            if ($('#s_site_code').val() == '') {
                alert('과정을 선택해 주세요.');
                return false;
            }

            if ($('#s_consult_type').val() == '') {
                alert('상담유형을 선택해 주세요.');
                return false;
            }

            if ($('#board_title').val() == '') {
                alert('제목을 입력해 주세요.');
                return false;
            }

            if ($('#board_content').val() == '') {
                alert('내용을 입력해 주세요.');
                return false;
            }
            return true;
        }
    });
</script>
@stop