<div class="imgSlider">
    <div class="list">
        <ul>
            @if(empty($data) === false)
                @foreach($data as $row)
                    <li>
                        <div class="imgWrap">
                            <div class="listTitle"><span>{{ $row['EtcValue'] }}</span> |
                                @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                    {{ $row['UserName'] }}
                                    <a href="#none" onclick="delRegister('{{ $row['EmIdx'] }}')">X</a>
                                @else
                                    {{ str_replace(mb_substr($row['UserName'],1,1,'UTF-8'), "*", mb_substr($row['UserName'],0,4,'UTF-8')) }}
                                @endif
                            </div>
                            <div class="imgBox">
                                <img src="{{ $row['FileFullPath'] }}" alt="인증이미지" style="width: 100%; cursor: pointer" onclick="showPopup('{{ $row['EmIdx'] }}')"/>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>

<div class="imgTablePage">
    {!! $paging['pagination'] !!}
</div>
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

    $(".imgTablePage > div.Paging a").on("click", function() {
        var link, temp_params, params;
        var num = 1;

        link = $(this).attr('href');
        if (link) {
            temp_params = link.split('?');
            params = temp_params[1].split('=');
            num = params[params.length - 1];
        }
        fnRegisterList(num);
        return false;
    });

    function showPopup(em_idx) {
        popupOpen('{{front_url('/event/showThumbnailPopup/')}}' + em_idx, 'thumbnail', 1000, 800, null, null, 'yes', 'no');
    }
</script>