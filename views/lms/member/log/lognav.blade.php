<div class="form-group form-group-sm">
    <ul class="nav nav-tabs nav-justified">
        <li {{$logtype == 'login' ? 'class=active ':''}}><a href="#" onclick="nav('login');"><strong>로그인이력</strong></a></li>
        <li {{$logtype == 'chg' ? 'class=active ':''}}><a href="#" onclick="nav('chg');"><strong>정보변경이력</strong></a></li>
        <li {{$logtype == 'pwd' ? 'class=active ':''}}><a href="#" onclick="nav('pwd');"><strong>비밀번호변경이력</strong></a></li>
    </ul>
</div>
<script>
    function nav(type)
    {
        var url = ""
        switch(type){
            case 'login':
                url = "{{ site_url("member/manage/loginLog/{$data['MemIdx']}") }}";
                break;
            case 'chg':
                url = "{{ site_url("member/manage/infoLog/{$data['MemIdx']}/chg") }}";
                break;
            case 'pwd':
                url = "{{ site_url("member/manage/infoLog/{$data['MemIdx']}/pwd") }}";
                break;
        }

        sendAjax(url,
            '',
            function(d){
                $("#pop_modal").find(".modal-content").html(d).end()
            },
            function(req, status, err){
                showError(req, status);
            }, false, 'GET', 'html');
    }
</script>