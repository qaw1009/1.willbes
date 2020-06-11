<div class="csCenter">
    <ul class="link">
        <li><a href="{{front_url('/support/qna/index/cate/'.$__cfg['CateCode'].'?s_site_code=2005&s_cate_code=3094')}}">동영상 1:1상담</a></li>
        <li><a href="{{front_url('/pass/support/qna/index/?s_site_code=2010&s_cate_code=3104')}}">학원 1:1상담</a></li>
        <li><a href="{{front_url('/location/map/cate/'.$__cfg['CateCode'])}}">학원 오시는 길</a></li>
    </ul>
    <ul class="tel">
        <li>
            <span class="goTel" style="cursor: pointer"><img src="{{ img_url('m/main/icon_tel.png') }}"></span>
            <div>
                <strong>온라인문의</strong>
                <span>1544-5006</span>
                평일 09시~18시<Br>
                주말/공휴일 제외
            </div>
        </li>
        <li>
            <span class="goTel" style="cursor: pointer"><img src="{{ img_url('m/main/icon_tel.png') }}"></span>
            <div>
                <strong>학원문의</strong>
                <span>1544-5881</span>
                평일 08시~18시<Br>
                주말/공휴일 가능
            </div>
        </li>
        <li>
            <span class="goTel" style="cursor: pointer"><img src="{{ img_url('m/main/icon_tel.png') }}"></span>
            <div>
                <strong>교재문의</strong>
                <span>1544-4944</span>
                평일 09시~18시<Br>
                주말/공휴일 제외
            </div>
        </li>
    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".goTel").click(function () {
            var csTel = $(this).next().find('span').text();
            document.location.href='tel:'+csTel;
        })
    });
</script>