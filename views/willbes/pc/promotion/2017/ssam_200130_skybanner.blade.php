<style>
    .skybanner {
            position:fixed;
            height:auto;
            top:70px;
            right:0 !important;
            width:140px;	
            /*background:rgba(0,0,0,.5);*/
            overflow-y:auto;
			z-index:10;
        }
	.skybanner li {line-height:1.4;}
	.skybanner a {display:block; color:#fff; padding:5px 7px; text-align:left; font-size:12px; letter-spacing:normal; background:#333; margin-bottom:1px; }
	.skybanner li:last-child a {border-bottom:0;}
	.skybanner a:hover {background:#000}
    .skybanner::after {top:0 !important}
</style>
<div class="skybanner NG" id="subQuickMenu">
    <ul>
        <li><a href='1816'>유아 <strong>민정선</strong></a></li>
        <li><a href='1817'>초등 <strong>배재민</strong></a></li>
        <li><a href='2555'>교육학 <strong>이경범</strong></a></li>
        <li><a href='2556'>교육학 <strong>정 현</strong></a></li>
        <li><a href='1818'>전공국어 <strong>송원영</strong></a></li>
        <li><a href='1820'>전공국어 <strong>권보민</strong></a></li>
        <li><a href='2558'>전공국어 <strong>구동언</strong></a></li>
        <li><a href='1821'>전공영어 <strong>김유석</strong></a></li>
        <li><a href='1822'>전공영어 <strong>김영문</strong></a></li>    
        <li><a href='1824'>전공수학 <strong>김철홍</strong></a></li>
        <li><a href='2559'>전공수학 <strong>김현웅</strong></a></li>
        <li><a href='1825'>수학교육론 <strong>박태영</strong></a></li>
        <li><a href='2560'>수학교육론 <strong>박혜향</strong></a></li>
        <li><a href='1826'>전공생물 <strong>강치욱</strong></a></li>
        <li><a href='1827'>생물교육론 <strong>양혜정</strong></a></li>
        <li><a href='2565'>전공화학 <strong>강 철</strong></a></li>
        <li><a href='1828'>도덕윤리 <strong>김병찬</strong></a></li>
        <li><a href='2562'>일반사회 <strong>허역 팀</strong></a></li>
        <li><a href='2564'>전공역사 <strong>김종권</strong></a></li>
        <li><a href='1829'>전공음악 <strong>다이애나</strong></a></li>
        <li><a href='2566'>전공체육 <strong>최규훈</strong></a></li>   
        <li><a href='1830'>전기전자통신 <strong>최우영</strong></a></li>
        <li><a href='1832'>정컴교육론 <strong>장순선</strong></a></li>
        <li><a href='2563'>중국어 <strong>장영희</strong></a></li>
    </ul>
</div>

<script>
    $('*[id*=subQuickMenu]:visible').ready(function () {
        var stickyOffset = $('#subQuickMenu').offset();

        if (typeof stickyOffset !== 'undefined') {
            $(window).scroll(function () {
                if ($(document).scrollTop() > stickyOffset.top) {
                    $('#subQuickMenu').css('top', '0px');
                } else {
                    $('#subQuickMenu').css('top', '70px');
                }
            });
        }
    });
</script>