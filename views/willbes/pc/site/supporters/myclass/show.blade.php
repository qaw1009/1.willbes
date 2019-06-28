<span class="b-close"><img src="{{ img_url('sub/close.png') }}"></span>
<h3 class="NSK-Black">나의 소개</h3>
<div class="content">
    <div class="userView">
        <div class="userImg">
            <div class="mask"></div>
            @if(empty($data['AttachFilePath']) === true)
                <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_tab04_user.png">
            @else
                <img src="{{ $data['AttachFilePath'] . $data['AttachFileName'] }}">
            @endif
        </div>
        <p><strong>{{ $data['MemName'] }}</strong>님</p>
        {!! nl2br($data['Content']) !!}
    </div>
</div>