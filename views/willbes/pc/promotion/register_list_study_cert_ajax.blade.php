<table border="0" cellspacing="2" cellpadding="2">
    <col width="20%" />
    <col  />
    <thead>
    <tr>
        <th>
            구분
        </th>
        <th>
            내용
        </th>
    </tr>
    </thead>
    <tbody>
    @if(empty($data) === false)
        @foreach($data as $row)
            <tr>
                <th class="st02">
                    <div>{{ $paging['rownum'] }}</div>
                    @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                        {{ $row['MemId'] }}<br/>
                        {{ $row['RegDatm'] }}<br/>
                        <a href="javascript:void(0);" class="btnDel" onclick="delRegister('{{ $row['EmIdx'] }}')">삭제</a>
                    @else
                        {!! hpSubString($row['MemId'], 0, (strlen($row['MemId']) - 4), '****') !!}<br/>
                        {{ $row['RegDatm'] }}<br/>
                    @endif
                </th>
                <td class="ctsBox">
                    <div class="imgBoxFull">
                        <img src="{{ $row['FileFullPath'] }}" onclick="showPopup('{{ $row['EmIdx'] }}')" style="cursor: pointer">
                    </div>
                    {{ $row['EtcValue'] or ''}}
                </td>
            </tr>
            @php $paging['rownum']--; @endphp
        @endforeach
    @endif
    </tbody>
</table>

{!! $paging['pagination'] !!}

<form id="register_search_form" name="register_search_form" method="POST">
    {!! csrf_field() !!}

    <div class="evtSearch">
        <select id="search_type" name="search_type" >
            <option selected="selected" value="content" @if(element('search_type', $arr_input) == 'content')selected="selected"@endif>내용</option>
            <option value="id" @if(element('search_type', $arr_input) == 'id')selected="selected"@endif>아이디</option>
        </select>
        <input type="text" id="search_value" name="search_value" value="{{ element('search_value', $arr_input) }}" placeholder="내용 또는 아이디를 입력해 주세요" maxlength="30">
        <a href="javascript:void(0);" class="search-Btn" id="btn_search">
            검색
        </a>
    </div>
</form>

<script>
    var $register_search_form = $("#register_search_form");

    // 엔터 금지
    document.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
        }
    }, true);

    $(function (){
        //검색
        $('#btn_search').click(function () {
            var search_type = $register_search_form.find('select[name="search_type"]').val();
            var search_value = $register_search_form.find('input[name="search_value"]').val();
            fnRegisterList(1, search_type, search_value);
        });
    });

    function delRegister(em_idx){
        var _url = '{{ site_url("/event/deleteRegister") }}';
        var data = {
            '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
            '_method' : 'DELETE',
            'em_idx' : em_idx
        };

        if (confirm('정말로 삭제하시겠습니까?')) {
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    alert('삭제 되었습니다.');
                }
                location.reload();
            }, showError, false, 'POST');
        }
    }

    $("div.Paging a").on("click", function() {
        var link, temp_params, params;
        var num = 1;
        var search_type = $register_search_form.find('select[name="search_type"] option:selected').val();
        var search_value = $register_search_form.find('input[name="search_value"]').val();

        link = $(this).attr('href');
        if (link) {
            temp_params = link.split('?');
            params = temp_params[1].split('=');
            num = params[params.length - 1];
        }

        fnRegisterList(num,search_type,search_value);

        return false;
    });

    function showPopup(em_idx) {
        popupOpen('{{front_url('/event/showThumbnailPopup/')}}' + em_idx, 'thumbnail', 1000, 800, null, null, 'yes', 'no');
    }
</script>