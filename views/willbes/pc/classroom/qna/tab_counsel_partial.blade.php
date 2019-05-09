<div id="point1">
    {{--<span class="subTit tx-gray">{{$count_complete_type['counsel']['not_complete']}} 답변대기 수가 표시됩니다.</span>--}}
    <div class="willbes-Mypage-PointBox h55 NG">
        <ul>
            <li class="Tit">1:1 상담현황</li>
            <li>답변대기 <a href="#none" onclick="goUrl('replay_type','N')" class="tx-light-blue">{{$count_complete_type['counsel']['not_complete']}}</a>건</li>
            <li>답변완료 <a href="#none" onclick="goUrl('replay_type','Y')" class="tx-light-blue">{{$count_complete_type['counsel']['complete']}}</a>건</li>
        </ul>
    </div>
    <div class="willbes-Mypage-SUPPORT-list mt35 c_both">
        <div class="willbes-LecreplyList tx-gray c_both mt-zero">
            <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                <select id="s_site_code" name="s_site_code" title="과정" class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left widthAutoFull" onchange="goUrl('s_site_code',this.value)" @if($__cfg['SiteCode'] != config_item('app_intg_site_code')) disabled @endif>
                    <option value="">과정</option>
                    @foreach($arr_base['site_list'] as $key => $val)
                        <option value="{{$key}}" @if(($__cfg['SiteCode'] != config_item('app_intg_site_code') && $__cfg['SiteCode'] == $key) || (element('s_site_code', $arr_input) == $key)) selected="selected" @endif>{{$val}}</option>
                    @endforeach
                </select>

                <select id="s_consult_type" name="s_consult_type" title="상담유형" class="seleType mr10 h30 f_left" onchange="goUrl('s_consult_type',this.value)">
                    <option value="">상담유형</option>
                    @foreach($arr_base['consult_type'] as $key => $val)
                    <option value="{{$key}}" @if(element('s_consult_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                    @endforeach
                </select>

                <div class="willbes-Lec-Search GM f_left">
                    <div class="inputBox p_re">
                        <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" value="{{ element('s_keyword', $arr_input) }}" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="button" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                            <span>검색</span>
                        </button>

                        <button type="submit" onclick="" class="search-Btn whiteBox">
                            <span>초기화</span>
                        </button>
                    </div>                    
                </div>

                <div class="subBtn blue NSK f_right" style="margin-left: 189px;"><a href="{{front_url('/support/qna/create')}}">문의하기 ></a></div>
            </div>
        </div>
        <div class="LeclistTable pointTable">
            <table cellspacing="0" cellpadding="0" class="listTable cartTable under-gray bdt-gray tx-gray">
                <colgroup>
                    <col style="width: 60px;">
                    <col style="width: 100px;">
                    <col style="width: 90px;">
                    <col style="width: 450px;">
                    <col style="width: 100px;">
                    <col style="width: 90px;">
                </colgroup>
                <thead>
                <tr>
                    <th>No<span class="row-line">|</span></th>
                    <th>과정<span class="row-line">|</span></th>
                    <th>상담유형<span class="row-line">|</span></th>
                    <th>제목<span class="row-line">|</span></th>
                    <th>등록일<span class="row-line">|</span></th>
                    <th>답변상태</th>
                </tr>
                </thead>
                <tbody>
                @if(empty($list))
                    <tr>
                        <td class="w-list tx-center" colspan="6">등록된 내용이 없습니다.</td>
                    </tr>
                @endif
                @foreach($list as $row)
                    <tr>
                        <td class="w-no">@if($row['IsBest'] == '1')<img src="{{ img_url('prof/icon_notice.gif') }}">@else{{$paging['rownum']}}@endif</td>
                        <td class="w-process"><div class="pBox p5">{{$row['SiteName']}}</div></td>
                        <td class="w-A">{{$row['TypeCcd_Name']}}</td>
                        <td class="w-list tx-left pl20 {{($row['IsBest'] == 1) ? 'strong' : ''}}">
                            @if($row['RegType'] == '0' && $row['IsPublic'] == 'N' && $row['RegMemIdx'] != sess_data('mem_idx'))
                                <a href="javascript:alert('비밀글입니다.');">
                            @else
                                {{--<a href="{{site_url('/classroom/qna/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">--}}
                                <a href="{{ site_url('/classroom/qna/show?board_idx=' . $row['BoardIdx'] . '&' . http_build_query($arr_input)) }}">
                            @endif
                                    @if($row['IsBest'] == 0 && $row['IsPublic'] == 'N')<img src="{{ img_url('prof/icon_locked.gif') }}">@endif
                                    {{hpSubString($row['Title'],0,40,'...')}}
                                    @if($row['RegDatm'] == date('Y-m-d'))<img src="{{ img_url('prof/icon_N.gif') }}">@endif
                                    @if(empty($row['AttachData']) === false)<img src="{{ img_url('prof/icon_file.gif') }}">@endif
                                </a>
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
            {!! $paging['pagination'] !!}
        </div>
    </div>
</div>