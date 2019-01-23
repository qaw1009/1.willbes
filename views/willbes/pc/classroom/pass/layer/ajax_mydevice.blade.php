<table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
    <colgroup>
        <col style="width: 70px;">
        <col style="width: 270px;">
        <col style="width: 120px;">
        <col style="width: 90px;">
        <col style="width: 110px;">
        <col style="width: 90px;">
    </colgroup>
    <thead>
    <tr>
        <th>구분<span class="row-line">|</span></th>
        <th>기기정보<!-- (MAC Address) --><span class="row-line">|</span></th>
        <th>등록일시<span class="row-line">|</span></th>
        <th>삭제자<span class="row-line">|</span></th>
        <th>삭제일<span class="row-line">|</span></th>
        <th>직접초기화</th>
    </tr>
    </thead>
    <tbody>
    @forelse($data['list'] as $row)
        <tr>
            <td class="w-eq">{{($row['DeviceType'] == 'P') ? 'PC' : '모바일'}}</td>
            <td class="w-tit">{{$row['DeviceId']}}</td>
            <td class="w-update-day">{{$row['RegDatm']}}</td>
            <td class="w-user">@if($row['IsUse'] == 'Y'){{''}}@elseif($row['DelName'] == ''){{sess_data('mem_name')}}@else{{'관리자'}}@endif</td>
            <td class="w-delete-day">{{($row['IsUse'] == 'Y') ? '' : $row['DelDatm']}}</td>
            @if($data['reset_cnt'] == 0 && $row['IsUse'] == 'Y')
                <td class="w-reset tx-light-blue"><a href="javascript:;" onclick="fnDeviceReset('{{$row['MdIdx']}}');">초기화</a></td>
            @else
                <td class="w-reset">불가</td>
            @endif
        </tr>
    @empty
        <tr>
            <td class="w-eq" colspan="6">등록된 기기 목록이 없습니다.</td>
        </tr>
    @endforelse
    </tbody>
</table>
<div class="Paging">
    <ul>
        @if($data['page'] > 1)<li class="Prev"><a href="javascript:fnDeviceList({{$data['page'] -1}});"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>@endif
        @for($i = 1; $i <= $data['totalpage']; $i++)
            <li><a @if($i == $data['page']) class="on" @else href="javascript:fnDeviceList({{$i}});" @endif >{{$i}}</a>@if($i < $data['totalpage'])<span class="row-line">|</span>@endif</li>
        @endfor
        @if($data['page'] < $data['totalpage'])<li class="Next"><a href="javascript:fnDeviceList({{$data['page'] +1}});"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>@endif
    </ul>
</div>