<table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
    <tbody>
    @forelse($data['list'] as $row)
        <tr>
            <td class="w-data tx-left">
                <dl class="w-info">
                    <dt><strong>{{($row['DeviceType'] == 'P') ? 'PC' : '모바일'}}</strong><span class="row-line">|</span>{{$row['DeviceId']}}</dt>
                </dl>
                <dl class="w-info tx-gray">
                    <dt>
                        등록일 : {{$row['RegDatm']}}
                        @if($row['IsUse'] == 'Y'){{''}}@elseif($row['DelName'] == '') <br/> 삭제일 : {{$row['DelDatm']}} ({{sess_data('mem_name')}}) @else <br/> 삭제일 : {{$row['DelDatm']}} ({{'관리자'}}) @endif
                    </dt>
                    @if($data['reset_cnt'] == 0 && $row['IsUse'] == 'Y')
                        <dt><a href="javascript:;" onclick="fnDeviceReset('{{$row['MdIdx']}}');"><span class="tx-blue">[기기초기화]</span></a></dt>
                    @endif
                </dl>
            </>
        </tr>
    @empty
        <tr>
            <td class="w-data tx-left">등록된 기기 목록이 없습니다.</td>
        </tr>
    @endforelse

    <!--
    <tr>
        <td class="w-data tx-left">
            <dl class="w-info">
                <dt><strong>모바일</strong><span class="row-line">|</span>33C07FA1-7E23-4613-8F69-8C0D445985AA</dt>
            </dl>
            <dl class="w-info tx-gray">
                <dt>
                    등록일 : 2018-00-00 00:00<br/>
                    삭제일 : 2018-00-00 00:00 (삭제자명)
                </dt>
            </dl>
        </td>
    </tr>
    <tr>
        <td class="w-data tx-left">
            <dl class="w-info">
                <dt><strong>PC</strong><span class="row-line">|</span>33C07FA1-7E23-4613-8F69-8C0D445985AA</dt>
            </dl>
            <dl class="w-info tx-gray">
                <dt>
                    등록일 : 2018-00-00 00:00<br/>
                    삭제일 : 2018-00-00 00:00 (삭제자명)
                </dt>
            </dl>
        </td>
    </tr> -->
    </tbody>
</table>
<div class="Paging">
    <ul>
    <!-- <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
        <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
        <li><a href="#none">2</a><span class="row-line">|</span></li>
        <li><a href="#none">3</a><span class="row-line">|</span></li>
        <li><a href="#none">4</a><span class="row-line">|</span></li>
        <li><a href="#none">5</a></li>
        <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li> -->
        @if($data['page'] > 1)<li class="Prev"><a href="javascript:fnDeviceList({{$data['page'] -1}});"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>@endif
        @for($i = 1; $i <= $data['totalpage']; $i++)
            <li><a @if($i == $data['page']) class="on" @else href="javascript:fnDeviceList({{$i}});" @endif >{{$i}}</a>@if($i < $data['totalpage'])<span class="row-line">|</span>@endif</li>
        @endfor
        @if($data['page'] < $data['totalpage'])<li class="Next"><a href="javascript:fnDeviceList({{$data['page'] +1}});"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>@endif
    </ul>
</div>