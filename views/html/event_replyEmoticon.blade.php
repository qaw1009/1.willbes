<style type="text/css">
    .replyEvaluate {width:1000px; margin:0 auto;}
    .character .crtTab {margin-bottom:20px}
    .character .crtTab li {display:inline; float:left; margin-right:20px}
    .character .crtTab li input {vertical-align:middle}
    .character .crtTab:after {content:""; display:block; clear:both}
    .character .characterImg {margin-bottom:20px}
    .character .characterImg li {display:inline; float:left; width:7.6923%; text-align:center; height:80px; line-height:80px; margin:5px 0; cursor:pointer; position:relative}
    .character .characterImg li img.on {display:none}
    .character .characterImg li img.off {display:block}
    .character .characterImg li:hover img.on {display:block; position:absolute; width:154px; top:50%; left:50%; border:2px solid #1087ef; background:#fff; box-shadow:2px 2px 4px rgba(0,0,0,.5); z-index:10}
    .character .characterImg li.active {background:#cde7f5}
    .character .characterImg:after {content:""; display:block; clear:both}
    
    .replyEvaluate .reply_inbox {
        position:relative; border:1px solid #ababab; padding:20px 0; 
    }
    .replyEvaluate .reply_inbox ul {margin-left:20px}
    .replyEvaluate .reply_inbox li {
        display:inline; float:left; margin-right:20px;
    }
    .replyEvaluate .reply_inbox li input {width:18px; height:18px}
    .replyEvaluate .reply_inbox li img { width:30px}
    .replyEvaluate ul:after {
        content:""; display:block; clear:both;
    }
    .replyEvaluate .reportUrl {padding:0 20px}
    .replyEvaluate .reportUrl input {height:24px; width:80%; padding:0 10px; margin-left:15px; background:#f7f7f7; border:1px solid #eaeaea}
    .replyEvaluate .textarBx textarea {
        border:0; width:100%; line-height:1.5; border-bottom:1px solid #eaeaea; padding:10px 20px;
    }
    .replyEvaluate .reply_inbox p {margin:10px 0 0 20px; color:#999; text-align:left}
    .replyEvaluate .reply_inbox .btnrwt {
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
        position:absolute; top:15px; left:15px; width:80px;
    }
    .replyEvaluate .replyList li div {margin-left:110px; line-height:1.5}
    .replyEvaluate .replyList li p {margin-bottom:10px; color:#999;}
    .replyEvaluate .replyList li p span {margin-left:20px}
    .replyEvaluate .replyList li .btnDel {
        position:absolute; top:15px; right:5px;
        border:1px solid #dcdcdc; padding:5px 8px;
    }
</style>

<div class="replyEvaluate"> 
    <div class="character">
        <ul class="crtTab">
            <li><input type="radio" name="TITLE" value="일반공채" id="CT1" checked/><label for="CT1">일반공채</label></li>
            <li><input type="radio" name="TITLE" value="전의경경채" id="CT2"/><label for="CT2">전의경경채</label></li>
            <li><input type="radio" name="TITLE" value="101단" id="CT3"/><label for="CT3">101단</label></li>
            <li>* 아래 이미지를 선택 후 댓글 작성해주세요.</li>
        </ul>
        <ul class="characterImg">
	        <li class="sel_icon" class="active">
                <img src="https://static.willbes.net/public/images/promotion/common/character01_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character01.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character02_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character02.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character03_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character03.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character04_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character04.png" alt="" class="on"/>
            </li>            
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character05_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character05.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character06_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character06.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character07_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character07.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character08_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character08.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character09_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character09.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character10_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character10.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character11_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character11.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character12_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character12.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character13_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character13.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character14_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character14.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character15_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character15.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character16_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character16.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character17_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character17.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character18_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character18.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character19_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character19.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character20_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character20.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character21_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character21.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character22_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character22.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character23_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character23.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character24_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character24.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character25_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character25.png" alt="" class="on"/>
            </li>
            <li class="sel_icon">
                <img src="https://static.willbes.net/public/images/promotion/common/character26_1.png" alt="" class="off" />
                <img src="https://static.willbes.net/public/images/promotion/common/character26.png" alt="" class="on"/>
            </li>
        </ul>  
    </div>


    <div class="reply_inbox">		
        <div class="textarBx">
            <textarea name="EVENT_TXT" id="EVENT_TXT" cols="30" rows="5" onclick="javascript:fn_focusComment();"></textarea>                        
        </div>
        <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
        <button type="button" class="btnrwt" onclick="javascript:fn_comment_insert();">글쓰기</button>
    </div>  

    <div class="replyList">
        <ul>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/common/icon_poof01.png" title="쉬웠어요">
                <div>
                    <p>홍길* <span>2019-03-25</span></p>     
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.                                
                </div>
            </li>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/common/icon_poof18.png" title="보통이예요">
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
                <img src="https://static.willbes.net/public/images/promotion/common/icon_poof13.png" title="어려웠어요">
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
                <img src="https://static.willbes.net/public/images/promotion/common/icon_poof14.png" title="보통이예요">
                <div>
                    <p>홍길* <span>2019-03-25</span></p>   
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.
                    우리는 일을하고 쉬는시간을 갖는다. We work and have a break.
                    그리고 우리는 쉬는시간에 게임, 드라마, 만화등 문화를 감상하며 쉬곤한다.
                    And we usually take a break...
                </div>
            </li>
            <li>
                <img src="https://static.willbes.net/public/images/promotion/common/icon_poof17.png" title="쉬웠어요">
                <div>
                    <p>홍길* <span>2019-03-25</span></p>
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.                                
                </div>
            </li>
        </ul>
    </div>
    <div class="mt30 mb30">공통 페이지 넘버링 적용 </div>              
</div>