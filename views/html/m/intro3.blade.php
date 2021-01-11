@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="NG c_both"> 
    <div class="introBox3 NSK"> 
        <div class="menuGroup">
            <div>
                <!--h4 class="NSK"><img src="{{ img_url('m/intro/icon_playlec.png') }}" alt="신광은경찰"> 동영상 수강신청 바로가기</h4-->
                <ul class="bigType">
                    <li><a href="https://police.willbes.net/m/home/index" target="_blank">신광은경찰</a></li>
                    <li><a href="https://gosi.willbes.net/m/home/index/cate/3094" target="_blank">5급행정</a></li>
                    <li><a href="https://pass.willbes.net/m/home/index" target="_blank">공무원</a></li>
                    <li><a href="https://gosi.willbes.net/m/home/index/cate/3095" target="_blank">국립외교원</a></li>
                    <li><a href="https://pass.willbes.net/m/home/index/cate/3035" target="_blank">법원직</a></li>
                    <li><a href="https://gosi.willbes.net/m/home/index/cate/3096" target="_blank">PSAT</a></li>
                    <li><a href="https://ssam.willbes.net/m/home/index" target="_blank">교원임용 <span>N</span></a></li>
                    <li><a href="https://job.willbes.net/m/home/index/cate/309002" target="_blank">공인노무사</a></li>                    
                    <li><a href="https://gosi.willbes.net/m/home/index/cate/3097" target="_blank">5급헌법</a></li>
                    <li><a href="https://job.willbes.net/m/home/index/cate/309003" target="_blank">감정평가사</a></li> 
                    <li><a href="https://gosi.willbes.net/m/home/index/cate/3098" target="_blank">법원행시</a></li>                 
                    <li><a href="https://job.willbes.net/m/home/index/cate/309004" target="_blank">변리사</a></li>      
                    <li><a href="https://gosi.willbes.net/m/home/index/cate/3099" target="_blank">변호사시험</a></li>              
                    <li><a href="https://job.willbes.net/m/home/index" target="_blank">세무사</a></li>                   
                    <li><a href="https://spo.willbes.net/m/home/index/cate/3100" target="_blank">경찰간부·일반경찰</a></li>
                    <li><a href="https://job.willbes.net/m/home/index" target="_blank">관세사</a></li>     
                    <li><a href="https://work.willbes.net/m/home/index" target="_blank">취업</a></li>               
                    <li><a href="https://lang.willbes.net/m/home/index" target="_blank">어학</a></li>                    
                    <li><a href="https://njob.willbes.net/m/home/index" target="_blank">N잡/e창업 e-커머스 <span>N</span></a></li>
                    <li><a href="https://willbesedu.willbes.net/m/pass/home/index" target="_blank">인천학원</a></li>
                    <li class="full"><a href="https://book.willbes.net/m/home/index" target="_blank">온라인서점</a></li>
                </ul>
                <div class="etc">
                    <a href="#none" class="btnMainToggle">기타자격증 <span>+</span></a>
                    <ul class="smallType">
                        <li><a href="https://job.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=309001" target="_blank">스포츠지도사</a></li>
                        <li><a href="https://job.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=310101" target="_blank">소프트웨어자산관리사</a></li>
                        <li><a href="https://job.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=308902" target="_blank">전기(산업)기사</a></li>
                        <li><a href="https://job.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=308901" target="_blank">소방(산업)기사</a></li>
                        <li><a href="https://job.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=309101" target="_blank">한국사능력시험</a></li>
                        <li><a href="https://job.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=310102" target="_blank">경제교육지도사</a></li>
                        <li><a href="https://job.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=310103" target="_blank">진로직업체험지도사</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->

<script type="text/javascript">
    $(function() {
        $(".etc > a").click(function(){
            $(".smallType").slideToggle("slow"); //옵션 "slow", "fast", "normal", "밀리초(1000=1초)"
            if($(this).hasClass('btnMainToggle')) {
                var $toggle_span = $(this).find('span');
                switch ($toggle_span.html()) {
                    case '+' : $toggle_span.html('-');
                        break;
                    case '-' : $toggle_span.html('+');
                        break;
                }
            }
        })
    });

    // 백그라운드 이미지
    var images = ['gate_m_bg1.png', 'gate_m_bg2.png', 'gate_m_bg3.png'];    
    $('.introBox3').css({'background-image': 'url(https://static.willbes.net/public/images/promotion/m/' + images[Math.floor(Math.random() * images.length)] + ')'});
</script>
@stop