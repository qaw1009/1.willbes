<a class="closeBtn" href="#none" onclick="closeWin('profNotice')">
    <img src="{{ img_url('prof/close.png') }}">
</a>

<div class="willbes-Leclist c_both" style="padding-top: 50px">
    <div class="LecViewTable">
        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
            <colgroup>
                <col>
                <col style="width: 90px;">
                <col style="width: 180px;">
                <col style="width: 150px;">
            </colgroup>
            <thead>
            <tr>
                <th colspan="4" class="w-list tx-left pl20 strong">
                    @if($data['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}" class="mr5">@endif
                    <strong>{{$data['Title']}}</strong>
                </th>
            </tr>
            <tr>
                <td class="w-acad tx-left pl20">
                    @if(empty($arr_swich['subject']) === false)
                        <dl>
                            <dt>
                                @foreach($arr_base['category'] as $row)
                                    @if($data['Category_String'] == $row['CateCode']){{$row['CateName']}}@endif
                                @endforeach
                                <span class="row-line">|</span>
                            </dt>
                            <dt>{{$arr_base['subject'][$data['SubjectIdx']] or ''}}</dt>
                        </dl>
                    @else
                        <span class="oBox onlineBox NSK">{{$data['SiteGroupName']}}</span>
                        @if(empty($data['CampusCcd_Name']) === false)<span class="oBox nyBox NSK">{{$data['CampusCcd_Name']}}</span>@endif
                    @endif

                    <span class="row-line">|</span>
                </td>
                <td>{!! (empty(sess_data('mem_idx')) === false && $data['RegMemIdx'] == sess_data('mem_idx')) ? $data['RegName'] : hpSubString($data['RegName'],0,2,'*') !!}<span class="row-line">|</span></td>
                <td class="w-date">{{$data['RegDatm']}}<span class="row-line">|</span></td>
                <td class="w-click"><strong>조회수</strong> {{$data['TotalReadCnt']}}</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="w-txt tx-left" colspan="4">
                    {!! nl2br($data['Content']) !!}
                </td>
            </tr>
            <tr>
            @if(empty($data['AttachData']) === false)
                <tr>
                    <td class="w-file tx-left pl20" colspan="4">
                        @foreach($data['AttachData'] as $row)
                            <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}
                            </a>
                        @endforeach
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
            @if(empty($arr_swich['mod_btn']) === false && empty(sess_data('mem_idx')) === false && $data['RegMemIdx'] == sess_data('mem_idx'))
                <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                    <a href="#none"  onclick="writeReviewLayer('{{ $board_idx }}')">수정</a>
                </div>
            @endif
        </div>

        @if($data['IsBest'] != '1')
            <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                <colgroup>
                    <col style="width: 150px;">
                    <col style="width: 640px;">
                    <col style="width: 150px;">
                </colgroup>
                <tbody>
                <tr>
                    <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                    <td class="tx-left pl20">
                        @if(empty($pre_data) === false)
                            <a href="#none" onclick="showReviewLayer('{{ $pre_data['BoardIdx'] }}', '{{ $get_params['s_cate_code'] or '' }}', '{{ $get_params['subject_idx'] or ''}}');">{{$pre_data['Title']}}</a><span class="row-line">|</span>
                        @else
                            이전글이 없습니다.
                    @endif
                </tr>
                <tr>
                    <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                    <td class="tx-left pl20">
                        @if(empty($next_data) === false)
                            <a href="#none" onclick="showReviewLayer('{{ $next_data['BoardIdx'] }}', '{{ $get_params['s_cate_code'] or '' }}', '{{ $get_params['subject_idx'] or ''}}');">{{$next_data['Title']}}</a><span class="row-line">|</span>
                        @else
                            다음글이 없습니다.
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        @endif
    </div>
</div>