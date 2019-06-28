<h4>● 서포터즈 명예의 전당</h4>
<div class="p_re">
    자랑스럽고 든든한 윌비스 “광은 서포터즈” 여러분들을 소개하는 공간입니다.<br>
    함께 활동하는 서포터즈 여러분들 상호간에 이해와 교류의 시간을 가져보세요.<br>
    자기소개와 선정소감을 올려주시면 활동 시에 서로 많은 도움이 될 수 있습니다.<br>
    합격장려금을 지원해 드립니다.
    <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_tab04_img1.jpg" class="gift">
</div>

<h5>
    신광은 경찰팀을 함께 만들어가는 광은 서포터즈 <span class="tx-red">{{ $data['SupportersNumber'] }}기</span>
    <div class="f_right mb10 mr10">
        <div class="subBtn blue NSK f_right"><a href="javascript:myclass_create('{{ $data['SupportersIdx'] }}');">나의소개 쓰기</a></div>
    </div>
</h5>
<div id="supporters_myclass_list"></div>

{{--서포터즈 팝업--}}
<div id="myclass_create" class="Pstyle NGR">
    <div id="supporters_myclass_create"></div>
</div>

<div id="myclass_show" class="Pstyle NGR">
    <div id="supporters_myclass_show"></div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        Main_MyClassListAjax(1);
    });

    function Main_MyClassListAjax(num) {
        var data = {
            'supporters_idx' : '{{ $data['SupportersIdx'] }}',
            'page' : num
        };
        sendAjax('{{ front_url('/supporters/myClass/index') }}', data, function(ret) {
            $('#supporters_myclass_list').html(ret);
        }, showAlertError, false, 'GET', 'html');
    }

    function myclass_create(obj) {
        var ele_id = 'supporters_myclass_create';
        var data = {
            'supporters_idx' : obj
        };
        sendAjax('{{ front_url('/supporters/myClass/create') }}', data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            $('#myclass_create').bPopup();
        }, showAlertError, false, 'GET', 'html');
    };
</script>