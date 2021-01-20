<div class="mt100 list">
    <table>
        <col width="10%">
        <col width="15%">
        <col>
        <col width="15%">
        <col width="10%">
        <tr>
            <th scope="col">No</th>
            <th scope="col">과목</th>
            <th scope="col">캡쳐이미지</th>
            <th scope="col">아이디</th>
            <th scope="col">등록일</th>
        </tr>
        @if(empty($data) === false)
            @php $rownum = $paging['rownum']; @endphp
            @foreach($data as $row)
                <tr>
                    <td>{{ $rownum }}</td>
                    <td>{{ $row['EtcValue'] }}</td>
                    <td style="text-align: center"><img src="{{ $row['FileFullPath'] }}" alt=""/></td>
                    <td>
                        @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                            {{ $row['MemId'] }}
                            <a href="#none" class="delbtn" onclick="delRegister('{{ $row['EmIdx'] }}')">삭제</a>
                        @else
                            {{ str_replace(substr($row['MemId'],-4), "****", $row['MemId']) }}
                        @endif
                    </td>
                    <td>{{ $row['RegDatm'] }}</td>
                </tr>
                @php $rownum--; @endphp
            @endforeach
        @else
            <tr>
                <td colspan="5">게시글이 없습니다.</td>
            </tr>
        @endif
    </table>
</div>

{!! $paging['pagination'] !!}

<script>
    function delRegister(em_idx){
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.') !!}

        var _url = '{{ site_url("/event/deleteRegister") }}';
        var data = {
            '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
            '_method' : 'DELETE',
            'em_idx' : em_idx
        };

        if (confirm('게시글을 삭제하시겠습니까?')) {
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

        link = $(this).attr('href');
        if (link) {
            temp_params = link.split('?');
            params = temp_params[1].split('=');
            num = params[1];
        }

        fnRegisterList(num);

        return false;
    });
</script>
