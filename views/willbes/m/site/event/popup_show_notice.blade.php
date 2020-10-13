<div class="willbes-Layer-PassBox willbes-Layer-Replynotice fix">
    <a class="closeBtn" href="#none" onclick="closeWin('{{$arr_input['ele_id']}}')">
        <img src="{{ img_url('m/calendar/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black">공지사항</div>
    <div class="Layer-Cont lh1_5">
        <div class="Layer-SubTit">
            {{$data['Title']}}
            <p>{{$data['RegDatm']}} | 조회수 <span class="tx-blue">{{$data['ReadCnt']}}</span></p>
        </div>
        <div class="Layer-Txt">
            @if(empty($data['AttachData']) === false)
                @foreach($data['AttachData'] as $row)
                    <a href="{{front_url('/support/notice/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                        <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}
                    </a>
                @endforeach
            @endif
            {!! $data['Content'] !!}
        </div>
    </div>
</div>
<div class="dim" onclick="closeWin('{{$arr_input['ele_id']}}')"></div>