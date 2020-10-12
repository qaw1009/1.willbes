<div class="scheduleDate NSK-Black"><span>{{ $format_date or '' }}</span></div>
<div class="scheduleTxt @if(empty($base_data['ImgUrl']) === true) NG @endif">
    @if(empty($base_data['ImgUrl']) === false)
        <img src="{{ $base_data['ImgUrl'] }}" alt="강의실배정표">
    @else
        등록된 강의실 배정표가 없습니다.
    @endif
</div>