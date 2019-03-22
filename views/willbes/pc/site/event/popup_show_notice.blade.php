<div class="willbes-Layer-PassBox willbes-Layer-PassBox700 h520 fix">
    <a class="closeBtn" href="#none" onclick="closeWin('{{$arr_input['ele_id']}}')">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div class="Layer-Tit tx-dark-black NG">공지사항</div>

    <div class="lecMoreWrap">
        <div class="PASSZONE-List widthAutoFull LeclistTable Memolist LecViewTable">
            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                <colgroup>
                    <col style="width: 420px;">
                    <col style="width: 150px;">
                    <col style="width: 115px;">
                </colgroup>
                <thead>
                <tr><th colspan="5" class="w-list tx-left pl20"><strong>{{$data['Title']}}</strong></th></tr>
                <tr>
                    <td class="w-type pl20">&nbsp;</td>
                    <td class="w-date">{{$data['RegDatm']}}<span class="row-line">|</span></td>
                    <td class="w-click"><strong>조회수</strong> {{$data['ReadCnt']}}</td>
                </tr>
                </thead>
                <tbody>
                @if(empty($data['AttachData']) === false)
                    <tr>
                        <td class="w-file tx-left pl20" colspan="5">
                            @foreach($data['AttachData'] as $row)
                                <a href="{{front_url('/support/notice/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                            @endforeach
                        </td>
                    </tr>
                @endif
                <tr>
                    <td class="w-txt tx-left" colspan="5" style="height: auto; padding: 0;">
                        <div class="scrollBox">
                            {!! $data['Content'] !!}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>