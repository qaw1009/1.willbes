<div class="csCenter">
    <ul class="link">
        <li><a href="{{ front_url('/support/qna/index', false, true) }}">동영상 1:1상담</a></li>
        <li><a href="{{ front_url('/support/qna/index', true) }}">학원 1:1상담</a></li>
        <li><a href="#map_campus">학원 오시는 길</a></li>
    </ul>
    <ul class="tel">
        <li>
            <div class="goTel"><img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>온라인문의</strong>
                    <span>1544-5006</span>
                    평일 09시~18시<Br>
                    주말/공휴일 제외
                </div>
            </div>
        </li>
        <li>
            <div class="goTel"><img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>학원문의</strong>
                    <span>1544-0330</span>
                    평일 08시~18시<Br>
                    주말/공휴일 가능
                </div>
            </div>
        </li>
        <li>
            <div class="goTel"><img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>교재문의</strong>
                    <span>1544-4944</span>
                    평일 09시~18시<Br>
                    주말/공휴일 제외
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