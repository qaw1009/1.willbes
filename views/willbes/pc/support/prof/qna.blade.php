@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<div id="Proftab3" class="tabLink">
    <form id="url_form" name="url_form" method="GET">
    @foreach($arr_input as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
    @endforeach
    </form>
    <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
        · 학습Q&A
        <div class="willbes-Lec-Search GM f_right">
            <div class="inputBox p_re">
                <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" value="{{ element('s_keyword', $arr_input) }}" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>
        </div>
    </div>
    <!-- List -->
    <div class="willbes-Leclist c_both">
        <div class="willbes-Lec-Selected tx-gray">
            <select id="s_consult_type" name="s_consult_type" title="질문유형" class="seleQuestion" onchange="goUrl('s_consult_type',this.value)">
                <option value="">질문유형</option>
                @foreach($arr_base['consult_type'] as $key => $val)
                    <option value="{{$key}}" @if(element('s_consult_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                @endforeach
            </select>
            <ul class="chkBox" style="position: relative; top: -2px;">
                <li>
                    <input type="checkbox" id="s_is_display" name="s_is_display" value="1" class="goods_chk" @if(element('s_is_display', $arr_input) == 1)checked="checked"@endif>
                    <label>공지숨기기</label>
                </li>
                <li>
                    <input type="checkbox" id="s_is_my_contents" name="s_is_my_contents" value="1" class="goods_chk" @if(element('s_is_my_contents', $arr_input) == 1)checked="checked"@endif>
                    <label>내질문보기</label>
                </li>
            </ul>
            <div class="search-Btn btnAuto90 h27 f_right">
                <button type="button" id="btn_qna_create" class="mem-Btn bg-blue bd-dark-blue">
                    <span>질문하기</span>
                </button>
            </div>
        </div>
        <div class="LeclistTable">
            <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                <colgroup>
                    <col style="width: 65px;">
                    <col style="width: 100px;">
                    <col style="width: 395px;">
                    <col style="width: 90px;">
                    <col style="width: 100px;">
                    <col style="width: 90px;">
                </colgroup>
                <thead>
                <tr>
                    <th>No<span class="row-line">|</span></th>
                    <th>질문유형<span class="row-line">|</span></th>
                    <th>제목<span class="row-line">|</span></th>
                    <th>작성자<span class="row-line">|</span></th>
                    <th>작성일<span class="row-line">|</span></th>
                    <th>답변상태</th>
                </tr>
                </thead>
                <tbody>
                @if(empty($list))
                    <tr>
                        <td class="w-list tx-center" colspan="8">등록된 내용이 없습니다.</td>
                    </tr>
                @endif
                @foreach($list as $row)
                    <tr>
                        <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_notice.gif') }}">@else{{$paging['rownum']}}@endif</td>
                        @if($__cfg['SiteCode'] == config_item('app_intg_site_code'))
                            <td class="w-acad"><span class="oBox {{$row['CampusType']}}Box NSK">{{$row['CampusType_Name']}}</span></td>
                        @endif
                        <td class="w-A">{{$row['TypeCcd_Name']}}</td>
                        <td class="w-list tx-left pl20 {{($row['IsBest'] == 1) ? 'strong' : ''}}">
                            @if((empty($arr_base['prof_data']['IsBoardPublic']) === false && $arr_base['prof_data']['IsBoardPublic'] == 'Y')
                            && $row['RegType'] == '0' && $row['IsPublic'] == 'N' && $row['RegMemIdx'] != sess_data('mem_idx'))
                                <a href="javascript:alert('비밀글입니다.');">
                            @else
                                <a href="{{front_url($default_path.'/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                            @endif
                                    @if((empty($arr_base['prof_data']['IsBoardPublic']) === false && $arr_base['prof_data']['IsBoardPublic'] == 'Y')
                                    && $row['IsBest'] == 0 && $row['IsPublic'] == 'N')<img src="{{ img_url('prof/icon_locked.gif') }}">@endif
                                    {{hpSubString($row['Title'],0,40,'...')}}
                                    @if($row['RegDatm'] == date('Y-m-d'))<img src="{{ img_url('prof/icon_N.gif') }}">@endif
                                    @if(empty($row['AttachData']) === false)<img src="{{ img_url('prof/icon_file.gif') }}">@endif
                                </a>
                        </td>
                        <td class="w-write">
                            {!! $row['RegMemIdx'] == sess_data('mem_idx') ? $row['RegName'] : (  mb_strlen($row['RegName'], 'utf-8') < 3 ? hpSubString($row['RegName'],0,1,'*') : hpSubString($row['RegName'],0,2,'*') )  !!}
                        </td>
                        <td class="w-date">{{$row['RegDatm']}}</td>
                        <td class="w-answer">
                            @if($row['IsBest'] == 0)
                                @if($row['ReplyStatusCcd'] == '621004')
                                    <span class="aBox answerBox NSK">답변완료</span>
                                @else
                                    <span class="aBox waitBox NSK">답변대기</span>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @php $paging['rownum']-- @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! $paging['pagination'] !!}
        </div>
    </div>
</div>
<script type="text/javascript" language="JavaScript">
    $(document).ready(function() {
        var is_login = '{{sess_data('is_login')}}';
        $('#s_is_display').click(function () {
            if ($('#s_is_display').prop('checked') == true) {
                goUrl('s_is_display', 1)
            } else {
                goUrl('s_is_display', 0)
            }
        });

        $('#s_is_my_contents').click(function () {
            if ($('#s_is_my_contents').prop('checked') == true) {
                goUrl('s_is_my_contents', 1)
            } else {
                goUrl('s_is_my_contents', 0)
            }
        });
        
        $('#btn_qna_create').click(function () {
            if(is_login != true) {
                alert('로그인 후 이용해 주십시오.');
                return;
            }
            location.href = "{!! front_url($default_path.'/create?'.$get_params) !!}";
        });
    });
</script>
@stop