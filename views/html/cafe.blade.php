@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
.cafeWrap {width:1080px; margin:0 auto;}
.cfTitle {margin:20px 0 50px}
.cafelnb {float:left}
.cafeCts {float:right; width:740px}
</style>

<div class="cafeWrap NGR">
    <div class="cfTitle">
        <img src="https://static.willbes.net/public/images/cafe/cafe_1080x250.gif"/>
    </div>
    <div class="cafelnb">
        메뉴영역
    </div>

    <div class="cafeCts">
        <!--카페 영역 시작-->
        <div>
            <img src="https://static.willbes.net/public/images/cafe/cafe_s_title_01.gif" alt="직렬별소식"/>
        </div>
        <div style="width: 740px; padding-left: 10px;">
            <table width="700" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td width="235" style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank"> 
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn01.gif" alt="7" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn01.gif">
                            </a>
                        </td>
                        <td width="235" style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn02.gif" alt="법원직" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn02.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn03.gif" alt="경찰" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn03.gif">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn04.gif" alt="기술직" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn04.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn05.gif" alt="소방" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn05.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn06.gif" alt="제로백" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn06.gif">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn07.gif" alt="군무원" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn07.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn08.gif" alt="임용" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn08.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn09.gif" alt="전문자격증" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn09.gif">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn10.gif" alt="고등고시" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn10.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn11.gif" alt="어학" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn11.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn12.gif" alt="여유" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn12.gif">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn13.gif" alt="여유" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn13.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn14.gif" alt="여유" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn14.gif">
                            </a>
                        </td>
                        <td style="text-align: left; padding-bottom: 15px;">
                            <a target="_blank">
                                <img id="https://static.willbes.net/public/images/cafe/cafe_230x70_bn15.gif" alt="여유" src="https://static.willbes.net/public/images/cafe/cafe_230x70_bn15.gif">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 30px;">
            <img id="https://static.willbes.net/public/images/cafe/cafe_s_title_02.gif" alt="직렬별 대표교수" src="https://static.willbes.net/public/images/cafe/cafe_s_title_02.gif">
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=38&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro01.gif" alt="7" src="https://static.willbes.net/public/images/cafe/cafe_pro01.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=41&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro02.gif" alt="법원직" src="https://static.willbes.net/public/images/cafe/cafe_pro02.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=43&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro03.gif" alt="신광은경찰팀" src="https://static.willbes.net/public/images/cafe/cafe_pro03.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=42&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro04.gif" alt="기술직" src="https://static.willbes.net/public/images/cafe/cafe_pro04.gif"></a>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=75&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro05.gif" alt="소방" src="https://static.willbes.net/public/images/cafe/cafe_pro05.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=37&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro06.gif" alt="제로백" src="https://static.willbes.net/public/images/cafe/cafe_pro06.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=64&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro07.gif" alt="군무원" src="https://static.willbes.net/public/images/cafe/cafe_pro07.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=82&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro08.gif" alt="임용" src="https://static.willbes.net/public/images/cafe/cafe_pro08.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=83&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro09.gif" alt="전문자격증" src="https://static.willbes.net/public/images/cafe/cafe_pro09.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=84&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro08.gif" alt="고등고시" src="https://static.willbes.net/public/images/cafe/cafe_pro08.gif"></a>
        </div>
        <div>
            <a href="https://cafe.naver.com/ArticleList.nhn?search.clubid=29933671&amp;search.menuid=85&amp;search.boardtype=L" target="_blank"><img id="https://static.willbes.net/public/images/cafe/cafe_pro09.gif" alt="어학" src="https://static.willbes.net/public/images/cafe/cafe_pro09.gif"></a>
        </div>
    </div>         
</div>
@stop
