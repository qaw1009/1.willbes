<div id="point2">
    {{--<span class="subTit tx-gray">{{$count_complete_type['professor']['not_complete']}} 답변대기 수가 표시됩니다.</span>--}}
    <div class="willbes-Mypage-PointBox h55 NG">
        <ul>
            <li class="Tit">1:1 상담현황</li>
            <li>답변대기 <a href="#none" onclick="goUrl('replay_type','N')" class="tx-light-blue">{{$count_complete_type['professor']['not_complete']}}</a>건</li>
            <li>답변완료 <a href="#none" onclick="goUrl('replay_type','Y')" class="tx-light-blue">{{$count_complete_type['professor']['complete']}}</a>건</li>
        </ul>
    </div>
    <div class="willbes-Mypage-SUPPORT-list mt35 c_both">
        <div class="willbes-LecreplyList tx-gray c_both mt-zero">
            <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                <select id="s_site_code" name="s_site_code" title="과정" class="seleProcess mr10 h30 f_left" onchange="goUrl('s_site_code',this.value)" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
                    <option value="">과정</option>
                    @foreach($arr_base['site_list'] as $key => $val)
                        <option value="{{$key}}" @if(($__cfg['SiteCode'] != config_item('app_intg_site_code') && $__cfg['SiteCode'] == $key) || (element('s_site_code', $arr_input) == $key)) selected="selected" @endif>{{$val}}</option>
                    @endforeach
                </select>

                <select id="prof_idx" name="prof_idx" title="교수" class="seleProf mr10 h30 f_left" onchange="goUrl('prof_idx',this.value)">
                    <option value="">교수님</option>
                    @foreach($arr_base['prof_list'] as $key => $val)
                        <option value="{{$key}}" @if(element('prof_idx', $arr_input) == $key) selected="selected" @endif>{{$val}}</option>
                    @endforeach
                </select>

                <select id="subject_idx" name="subject_idx" title="과목" class="seleSbj mr10 h30 f_left" onchange="goUrl('subject_idx',this.value)">
                    <option value="">과목</option>
                    @foreach($arr_base['subject_list'] as $key => $val)
                        <option value="{{$key}}" @if(element('subject_idx', $arr_input) == $key) selected="selected" @endif>{{$val}}</option>
                    @endforeach
                </select>

                <select id="s_consult_type" name="s_consult_type" title="질문유형" class="seleSbj mr10 h30 f_left" onchange="goUrl('s_consult_type',this.value)">
                <option value="">질문유형</option>
                    @foreach($arr_base['consult_type'] as $key => $val)
                        <option value="{{$key}}" @if(element('s_consult_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                    @endforeach
                </select>


                <div class="willbes-Lec-Search GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" value="{{ element('s_keyword', $arr_input) }}" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                            <span>검색</span>
                        </button>

                        <button type="button" onclick="" class="search-Btn whiteBox">
                            <span>초기화</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="LeclistTable pointTable">
            <table cellspacing="0" cellpadding="0" class="listTable cartTable under-gray bdt-gray tx-gray">
                <colgroup>
                    <col style="width: 60px;">
                    <col style="width: 100px;">
                    <col style="width: 80px;">
                    <col style="width: 80px;">
                    <col style="width: 90px;">
                    <col style="width: 370px;">
                    <col style="width: 100px;">
                    <col style="width: 90px;">
                </colgroup>
                <thead>
                <tr>
                    <th>No<span class="row-line">|</span></th>
                    <th>과정<span class="row-line">|</span></th>
                    <th>교수님<span class="row-line">|</span></th>
                    <th>과목<span class="row-line">|</span></th>
                    <th>질문유형<span class="row-line">|</span></th>
                    <th>제목<span class="row-line">|</span></th>
                    <th>등록일<span class="row-line">|</span></th>
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
                        <td class="w-process"><div class="pBox p5">{{$row['SiteName']}}</div></td>
                        <td class="w-prof">{{$row['ProfName']}}</td>
                        <td class="w-acad">{{$row['SubjectName']}}</td>
                        <td class="w-type">{{$row['TypeCcd_Name']}}</td>
                        <td class="w-list tx-left pl20 strong">
                            {{--<a href="{{ site_url('/classroom/profQna/show?board_idx=' . $row['BoardIdx'] . '&' . http_build_query($arr_input)) }}">--}}
                            <a href="{{ site_url('/classroom/profQna/show?board_idx=' . $row['BoardIdx'] . '&prof_idx=' . $row['ProfIdx'] . '&subject_idx=' . $row['SubjectIdx']) }}">
                                {{hpSubString($row['Title'],0,40,'...')}}
                                <div class="w-subtit">{{hpSubString($row['ProdName'],0,40,'...')}}</div>
                            </a>
                        </td>
                        <td class="w-date">{{$row['RegDatm']}}</td>
                        <td class="w-answer">
                            @if($row['IsBest'] == 0)
                                @if($row['ReplyStatusCcd'] == '621002' || $row['ReplyStatusCcd'] == '621003')
                                    <span class="aBox waitBox NSK">처리중</span>
                                @elseif($row['ReplyStatusCcd'] == '621004')
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
            {!! $paging['pagination'] !!}
        </div>
    </div>
</div>