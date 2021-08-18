<div class="evt_table">
    @if(empty($data) === false)
        @foreach($data as $row)
            <div class="w-list">
                <div class="title">
                    <strong>{{ $paging['rownum'] }}</strong> {{ $row['EtcTitle'] }}
                    <div>
                        @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                            {{ $row['MemId'] }}
                        @else
                            {!! hpSubString($row['MemId'], 0, (strlen($row['MemId']) - 4), '****') !!}
                        @endif
                        <span class="r-line">|</span> {{ $row['RegDatm'] }}
                        @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                            <span class="r-line">|</span> <a href="javascript:void(0);" onclick="delRegister('{{ $row['EmIdx'] }}')">삭제</a>
                        @endif
                    </div>
                </div>
                <div>{!! nl2br($row['EtcValue']) !!}</div>
            </div>
            @php $paging['rownum']--; @endphp
        @endforeach
    @endif
</div>

{!! $paging['pagination'] !!}

<script>
    $(document).ready(function() {
        $("div.Paging a").on("click", function() {
            var link, temp_params, params;
            var num = 1;
            var search_type = '';
            var search_value = '';

            link = $(this).attr('href');
            if (link) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[params.length - 1];
            }
            /*fnRegisterList(num,search_type,search_value,true);*/
            fnRegisterList(num);
            return false;
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
</script>