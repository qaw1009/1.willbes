{{-- 온라인공무원, 법원직 링크경로, 전화번호 설정 --}}
@if($__cfg['CateCode'] == '3035')
    @php
        $_arr_cs = [
            'on_qna_link' => front_url('/support/qna/index/cate/'.$__cfg['CateCode'].'?s_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y'),
            'off_qna_link' => front_url('/support/qna/index/?'.(empty($data['mapping_cate_data']['CateCode']) === false ? 's_cate_code='.$data['mapping_cate_data']['CateCode'] : '').'&on_off_link_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y', true),
            'off_map_link' => front_url('/location/map/cate/'.$__cfg['CateCode']),
            'off_tel' => '1544-0330',
        ];
    @endphp
@else
    @php
        $_arr_cs = [
            'on_qna_link' => front_url('/support/qna/index'),
            'off_qna_link' => front_url('/support/qna/index', true),
            'off_map_link' => front_url('/home/index#map_campus', true),
            'off_tel' => '1544-0330',
        ];
    @endphp
@endif

<div class="csCenter">
    <ul class="link">
        <li><a href="{{ element('on_qna_link', $_arr_cs, '#none') }}">동영상 1:1상담</a></li>
        <li><a href="{{ element('off_qna_link', $_arr_cs, '#none') }}">학원 1:1상담</a></li>
        <li><a href="{{ element('off_map_link', $_arr_cs, '#none') }}">학원 오시는 길</a></li>
    </ul>
    <ul class="tel">
        <li>
            <div class="goTel"><img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>온라인문의</strong>
                    <span>1544-5006</span>
                    평일 09시~18시<Br>
                    주말/공휴일 제외<Br>
                    <Br>
                </div>
            </div>
        </li>
        <li>
            <div class="goTel"><img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>학원문의</strong>
                    {{--<span>{{ element('off_tel', $_arr_cs, '') }}</span>--}}
                    <span><a href="tel:1544-0330">1544-0330</a></span>
                    <p>평일 09시~18시<br>
                    토요일 09시~14시</p>
                    일요일/공휴일 제외
                </div>
            </div>
        </li>
        <li>
            <div class="goTel"><img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>교재문의</strong>
                    <span>1544-4944</span>
                    평일 09시~17시<Br>
                    주말/공휴일 제외<Br>
                    <Br>
                </div>
            </div>
        </li>
    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".goTel").click(function () {
            var csTel = $(this).find('span').text();
            document.location.href='tel:'+csTel;
        })
    });
</script>