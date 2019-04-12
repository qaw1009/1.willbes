<style type="text/css">
    .urlWrap {
        width:1000px;
        margin:30px auto 100px;
        font-size:12px;
        line-height: 1.4;
        color:#555556;
    }
    .urlWrap .snslink {
        width: 90%;
        margin: 0 auto;
    }
    .urlWrap .snslink li {
        display: inline;
        float: left;
        width: 25%;
        text-align: center;
    }
    .urlWrap .snslink:after {
        content:'';
        display: block;
        clear:both;
    }

    .character {width:980px; margin:0 auto 50px}
    .character ul {margin-bottom:20px; border-top:1px solid #ccc; border-bottom:1px solid #ccc}
    .character li {display:inline; float:left; width:16.666666%; text-align:center; cursor:pointer;border-right:1px solid #ccc}
    .character li input {vertical-align:middle}
    .character li.active {background:#cde7f5}
    .character li p {height:40px; line-height:40px; color:#333; background:#eee; font-size:14px; font-weight:bold}
    .character li p span {color:#ee2365}
    .character li:last-child {border-right:0; width:160px;}
    .character ul:after {content:""; display:block; clear:both}

    .replyEvaluate {width:1000px; margin:0 auto;}
    .replyEvaluate .reply_inbx {
        position:relative; border:1px solid #ababab;  padding:20px 0; 
    }
    .replyEvaluate .reply_inbx ul {margin-left:20px}
    .replyEvaluate .reply_inbx li {
        display:inline; float:left; margin-right:20px;
    }
    .replyEvaluate .reply_inbx li input {width:18px; height:18px}
    .replyEvaluate .reply_inbx li img { width:30px}
    .replyEvaluate ul:after {
        content:""; display:block; clear:both;
    }
    .replyEvaluate .textarBx { margin-top:10px}
    .replyEvaluate .textarBx textarea {
        border:0; width:100%; line-height:1.5; border-bottom:1px solid #eaeaea; padding:10px 20px;
    }
    .replyEvaluate .reply_inbx p {margin:10px 0 0 20px; color:#999; text-align:left}
    .replyEvaluate .reply_inbx .btnrwt {
        position: absolute; bottom:0; right:0;
        width:70px; border-left:1px solid #eaeaea; display:block; height:42px; line-height:42px; color:#333; background:#fff;
    }
    .replyEvaluate .replyList {
        text-align:left; color:#666;
    }
    .replyEvaluate .replyList li {
        position:relative; border-bottom:1px solid #e6e4e4; padding:20px 0; min-height:105px;
    }
    .replyEvaluate .replyList li img {
        position:absolute; top:15px; left:15px;
    }
    .replyEvaluate .replyList li div {margin-left:110px; line-height:1.5}
    .replyEvaluate .replyList li p {margin-bottom:10px; color:#999;}
    .replyEvaluate .replyList li p span {margin-left:20px}
    .replyEvaluate .replyList li .btnDel {
        position:absolute; top:15px; right:5px;
        border:1px solid #dcdcdc; padding:5px 8px;
    }
</style>  

{{--@if(config_app('SiteCode') == '2001' || config_app('SiteCode') == '2002')  --}}
{{-- 경찰온라인 사이트일 경우만 적용 --}}  
<div class="urlWrap">
    <ul class="snslink">
        <li><a href="http://cafe.daum.net/policeacademy" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline01.png"alt="다음카페 경사모" /></a></li>
        <li><a href="http://cafe.naver.com/polstudy" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline02.png" alt="네이버카페 경꿈사" /></a></li>
        <li><a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline03.png" alt="디시 공무원 갤러리" /></a></li>
        <li><a href="https://gall.dcinside.com/mgallery/board/lists/?id=policeofficer" target="_blank"><img src="http://file3.willbes.net/new_cop/common/snsline04.png" alt="디시 순경마이너 갤러리" /></a></li>
    </ul>
</div>
<div class="character">
    <ul>
        <li>
            <img src="https://static.willbes.net/public/images/promotion/common/icon_poof01.png" title="신광은" />
            <p><label><input type="radio" name="sns_icon" value="1" /> 만점의 <span>신~</span></label></p>
        </li>
        <li>
            <img src="https://static.willbes.net/public/images/promotion/common/icon_poof20.png" title="장정훈" />
            <p><label><input type="radio" name="sns_icon" value="2" /> 만점의 <span>향기~~</span></label></p>
        </li>
        <li>
            <img src="https://static.willbes.net/public/images/promotion/common/icon_poof17.png" title="김원욱" />
            <p><label><input type="radio" name="sns_icon" value="3" /> 만점<span>맨!~</span></label></p>
        </li>
        <li>
            <img src="https://static.willbes.net/public/images/promotion/common/icon_poof18.png" title="하승민" />
            <p><label><input type="radio" name="sns_icon" value="4" /> 히든 <span>만점러~</span></label></p>
        </li>
        <li>
            <img src="https://static.willbes.net/public/images/promotion/common/icon_poof13.png" title="오태진" />
            <p><label><input type="radio" name="sns_icon" value="5" /> 불타는 <span>만점러!</span></label></p>
        </li>
        <li>
            <img src="https://static.willbes.net/public/images/promotion/common/icon_poof14.png" title="원유철" />
            <p><label><input type="radio" name="sns_icon" value="6" /> 만점의 <span>워너원~</span></label></p>
        </li>
    </ul>
</div>
{{--@endif--}}

<div class="replyEvaluate">
    <div class="reply_inbx">							
        <ul>
            <li><input id="re1" name=" " type="radio" value=" "> <img src="https://static.willbes.net/public/images/promotion/common/icon_re01.png" title="쉬웠어요"> <label for="re1">쉬웠어요</label></li>
            <li><input id="re2" name=" " type="radio" value=" "> <img src="https://static.willbes.net/public/images/promotion/common/icon_re02.png" title="보통이예요"> <label for="re2">보통이예요</label></li>
            <li><input id="re3" name=" " type="radio" value=" "> <img src="https://static.willbes.net/public/images/promotion/common/icon_re03.png" title="어려웠어요"> <label for="re3">어려웠어요</label></li>
        </ul>                
        <div class="textarBx">
            <textarea name="EVENT_TXT" id="EVENT_TXT" cols="30" rows="5" onclick="javascript:fn_focusComment();"></textarea>                        
        </div>
        <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
        <button type="button" class="btnrwt" onclick="javascript:fn_comment_insert();">글쓰기</button>
    </div>  

    <div class="replyList">
        <ul>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/common/icon_re01.png" title="쉬웠어요">
                <div>
                    <p>홍길* <span>2019-03-25</span></p>    
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.                                
                </div>
            </li>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/common/icon_re02.png" title="보통이예요">
                <div>
                    <p>홍길* <span>2019-03-25</span></p>    
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.
                        우리는 일을하고 쉬는시간을 갖는다. We work and have a break.
                        그리고 우리는 쉬는시간에 게임, 드라마, 만화등 문화를 감상하며 쉬곤한다.
                        And we usually take a break...
                </div>
                <a href="#none" class="btnDel">삭제</a>
            </li>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/common/icon_re03.png" title="어려웠어요">
                <div>
                    <p>홍길* <span>2019-03-25</span></p>    
                        영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.
                        우리는 일을하고 쉬는시간을 갖는다. We work and have a break.
                        그리고 우리는 쉬는시간에 게임, 드라마, 만화등 문화를 감상하며 쉬곤한다.
                        And we usually take a break...
                        영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.
                        우리는 일을하고 쉬는시간을 갖는다. We work and have a break.
                        그리고 우리는 쉬는시간에 게임, 드라마, 만화등 문화를 감상하며 쉬곤한다.
                        And we usually take a break...
                </div>
            </li>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/common/icon_re02.png" title="보통이예요">
                <div>
                    <p>홍길* <span>2019-03-25</span></p>    
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.
                        우리는 일을하고 쉬는시간을 갖는다. We work and have a break.
                        그리고 우리는 쉬는시간에 게임, 드라마, 만화등 문화를 감상하며 쉬곤한다.
                        And we usually take a break...
                </div>
            </li>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/common/icon_re01.png" title="쉬웠어요">
                <div>
                    <p>홍길* <span>2019-03-25</span></p>    
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.                                
                </div>
            </li>
        </ul>
    </div>
    <div class="mt30">공통 페이지 넘버링 적용 </div>              
</div>