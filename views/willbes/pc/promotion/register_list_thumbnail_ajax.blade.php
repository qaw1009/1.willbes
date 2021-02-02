{{--20개까지 롤링형식--}}
{{--<div class="imgSlider">--}}
{{--    <div>--}}
{{--        <ul id="sliderImg">--}}
{{--            <li>--}}
{{--                <div class="imgWrap">--}}
{{--                    <div class="listTitle"><span>영어</span> | 홍*동<a href="#none">X</a></div>--}}
{{--                    <div class="imgBox">--}}
{{--                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="imgWrap">--}}
{{--                    <div class="listTitle"><span>전기전자통신</span> | 홍*동</div>--}}
{{--                    <div class="imgBox">--}}
{{--                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="imgWrap">--}}
{{--                    <div class="listTitle"><span>영어</span> | 홍*동</div>--}}
{{--                    <div class="imgBox">--}}
{{--                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="imgWrap">--}}
{{--                    <div class="listTitle"><span>영어</span> | 홍*동</div>--}}
{{--                    <div class="imgBox">--}}
{{--                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="imgWrap">--}}
{{--                    <div class="listTitle"><span>영어</span> | 홍*동</div>--}}
{{--                    <div class="imgBox">--}}
{{--                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="imgWrap">--}}
{{--                    <div class="listTitle"><span>영어</span> | 홍*동</div>--}}
{{--                    <div class="imgBox">--}}
{{--                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="imgWrap">--}}
{{--                    <div class="listTitle"><span>영어</span> | 홍*동</div>--}}
{{--                    <div class="imgBox">--}}
{{--                        <img src="https://static.willbes.net/public/images/promotion/2021/01/2052_02_sample.jpg" alt="인증이미지"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2021/01/2052_arrowL.png"></a></p>--}}
{{--    <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2021/01/2052_arrowR.png"></a></p>--}}
{{--</div>--}}

{{--21개이상 리스트 형식--}}
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
                                <img src="{{ $row['FileFullPath'] }}" alt="인증이미지" style="width: 100%; "/>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
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
</script>