<div class="evt_List">
    <ul>
        @if(empty($data) === false)
            @foreach($data as $row)
                <li>
                    <div class="imgBox">
                        <div><img src="{{ $row['FileFullPath'] }}" alt="인증이미지" style="width: 100%; cursor: pointer" onclick="showPopup('{{ $row['EmIdx'] }}')"/></div>
                    </div>

                    <div class="smsTxt">
                        TO <strong>{{ $row['EtcValue'] }}</strong><br>
                        FROM
                        <strong>
                            @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                {{ $row['UserName'] }}
                                <a href="javascript:void(0);" id="del_btn" onclick="delRegister('{{ $row['EmIdx'] }}')">X</a>
                            @else
                                {{ str_replace(mb_substr($row['UserName'],1,1,'UTF-8'), "*", mb_substr($row['UserName'],0,4,'UTF-8')) }}
                            @endif
                        </strong><br>
                        {{ $row['RegDatm'] }}
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>

{!! $paging['pagination'] !!}

<script>
    function delRegister(em_idx){
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

    function showPopup(em_idx) {
        popupOpen('{{front_url('/event/showThumbnailPopup/')}}' + em_idx, 'thumbnail', 1000, 800, null, null, 'yes', 'no');
    }
</script>