<div class="form-group form-group-sm item">
    <ul class="tabs-site-code nav nav-tabs bar_tabs mt-0">
        <li {{$logtype == 'login' ? 'class=active ':''}}><a href="{{ site_url("member/manage/loginLog/")}}{{$data['MemIdx']}}"><strong>로그인이력</strong></a></li>
        <li {{$logtype == 'chg' ? 'class=active ':''}}><a href="{{ site_url("member/manage/infoLog/")}}{{$data['MemIdx']}}/chg/"><strong>정보변경이력</strong></a></li>
        <li {{$logtype == 'pwd' ? 'class=active ':''}}><a href="{{ site_url("member/manage/infoLog/")}}{{$data['MemIdx']}}/pwd/"><strong>비밀번호변경이력</strong></a></li>
    </ul>
</div>