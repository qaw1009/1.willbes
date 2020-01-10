@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <form id="url_form" name="url_form" method="GET">
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
    </form>

    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>
        동영상 상담실
    </div>
    <div class="willbes-Lec-Selected NG tx-gray">
        <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess width32n5p" onchange="goUrl('s_site_code',this.value)" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
            <option value="">과정</option>
            @foreach($arr_base['site_list'] as $key => $val)
                <option value="{{$key}}" @if(($__cfg['SiteCode'] != config_item('app_intg_site_code') && $__cfg['SiteCode'] == $key) || (element('s_site_code', $arr_input) == $key)) selected="selected" @endif>{{$val}}</option>
            @endforeach
        </select>
        <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleCate width32n5p ml1p" onchange="goUrl('s_cate_code',this.value)">
            <option value="">카테고리</option>
            @foreach($arr_base['category'] as $row)
                <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif @if(empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) disabled @endif>{{$row['CateNameRoute']}}</option>
            @endforeach
        </select>
        <select id="s_consult_type" name="s_consult_type" title="상담유형" class="seleType width32n5p ml1p" onchange="goUrl('s_consult_type',this.value)">
            <option value="">상담유형</option>
            @foreach($arr_base['consult_type'] as $key => $val)
                <option value="{{$key}}" @if(element('s_consult_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
            @endforeach
        </select>
        <div class="willbes-Lec-Search NG width100p mt1p">
            <div class="inputBox width90p p_re">
                <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch width100p" placeholder="제목 및 내용 검색">
                <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value)" class="search-Btn" class="search-Btn">
                    <span class="hidden">검색</span>
                </button>
            </div>
            <div class="resetBtn width10p">
                <a href="{{front_url('/support/qna/index')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
            </div>
        </div>
    </div>

    <div class="btnBox mb20">
        <ul class="f_left width100p">
            <li class="InfoBtn btn_blue"><a href="{{front_url($default_path.'/create?'.$get_params)}}">문의하기</a></li>
            <li class="InfoBtn btn_white">
                @if (element('s_is_my_contents', $arr_input) == 1)
                    <input type="hidden" id="s_is_my_contents" name="s_is_my_contents" value="0">
                    <a href="#none" onclick="goUrl('s_is_my_contents', document.getElementById('s_is_my_contents').value)">전체문의</a>
                @else
                    <input type="hidden" id="s_is_my_contents" name="s_is_my_contents" value="1">
                    <a href="#none" id="btn_my_counsel">나의문의</a>
                @endif
            </li>
        </ul>
    </div>
    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
        <colgroup>
            <col style="width: 70px;">
            <col width="*">
        </colgroup>
        <tbody>
        @if(empty($list))
            <tr>
                <td class="w-list tx-center" colspan="2">등록된 내용이 없습니다.</td>
            </tr>
        @endif
        @foreach($list as $row)
            @if($row['IsBest'] == '1')
                <tr class="bg-light-blue">
                    <td class="w-data tx-left" colspan="2">
                        <a href="{{front_url($default_path.'/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                            <div class="w-tit">
                                {{hpSubString($row['Title'],0,40,'...')}}
                                @if($row['IsBest'] == 0 && $row['IsPublic'] == 'N')<img src="{{ img_url('prof/icon_locked.gif') }}">@endif
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>관리자 | {{$row['RegDatm']}}</dt>
                            </dl>
                        </a>
                    </td>
                </tr>
            @else
                <tr>
                    <td class="w-info">
                        @if($row['ReplyStatusCcd'] == '621004')
                            <span class="NSK lBox n2">완료</span>
                        @else
                            <span class="NSK lBox n1">대기</span>
                        @endif
                    </td>
                    <td class="w-data tx-left pl20">
                        @if($row['RegType'] == '0' && $row['IsPublic'] == 'N' && $row['RegMemIdx'] != sess_data('mem_idx'))
                        <a href="javascript:alert('비밀글입니다.');">
                        @else
                        <a href="{{front_url($default_path.'/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                        @endif
                            <dl class="w-info">
                                <dt>
                                    @if(empty($row['Category_NameString']) === false)
                                        {{$row['Category_NameString']}}<span class="row-line">|</span>
                                    @endif
                                    <span class="tx-light-blue">{{$row['TypeCcd_Name']}}</span>
                                </dt>
                            </dl>
                            <div class="w-tit">
                                {{hpSubString($row['Title'],0,40,'...')}}
                                @if($row['IsBest'] == 0 && $row['IsPublic'] == 'N')<img src="{{ img_url('prof/icon_locked.gif') }}">@endif
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>{!! $row['RegMemIdx'] == sess_data('mem_idx') ? $row['RegName'] : hpSubString($row['RegName'],0,2,'*') !!} | {{$row['RegDatm']}}</dt>
                            </dl>
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    {!! $paging['pagination'] !!}

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->
</div>
<!-- End Container -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#btn_my_counsel').on('click', function() {
            @if(sess_data('is_login') != true)
                alert('로그인 후 이용해 주세요.');
            @else
                goUrl('s_is_my_contents', document.getElementById('s_is_my_contents').value);
            @endif
        });
    });
</script>
@stop