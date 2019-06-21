<style type="text/css">
    .replyEvaluate {width:1000px; margin:0 auto;}
    .replyEvaluate .reply_inbx {
        position:relative; border:1px solid #ababab;  padding:20px 0; 
    }
    .replyEvaluate .reply_inbx ul {margin-left:20px}
    .replyEvaluate .reply_inbx li {
        display:inline; float:left; margin-right:20px;
    }
    .replyEvaluate .reply_inbx li input {width:18px; height:18px}
    .replyEvaluate .reply_inbx li label {display:inline-block; padding:0 15px; height:26px; line-height:26px; border:1px solid red; border-radius:14px; color:red}
    .replyEvaluate .reply_inbx li:nth-child(2) label {border:1px solid blue; color:blue}
    .replyEvaluate .reply_inbx li:nth-child(3) label {border:1px solid green; color:green}
    .replyEvaluate .reply_inbx li input:checked + label {border:1px solid #333; color:#fff; background:#333} 
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
    .replyEvaluate .replyList li div {line-height:1.5}
    .replyEvaluate .replyList li p {margin-bottom:10px; color:#999;}
    .replyEvaluate .replyList li p strong {margin-right:10px}
    .replyEvaluate .replyList li p strong.str01 {color:red}
    .replyEvaluate .replyList li p strong.str02 {color:blue}
    .replyEvaluate .replyList li p strong.str03 {color:green}
    .replyEvaluate .replyList li p span {margin-left:10px}
    .replyEvaluate .replyList li .btnDel {
        position:absolute; top:15px; right:5px;
        border:1px solid #dcdcdc; padding:5px 8px;
    }
</style>   

<div class="replyEvaluate">
    <div class="reply_inbx">							
        <ul>
            <li><input id="re1" name=" " type="radio" value=" "> <label for="re1">시험후기</label></li>
            <li><input id="re2" name=" " type="radio" value=" "> <label for="re2">적중사례</label></li>
            <li><input id="re3" name=" " type="radio" value=" "> <label for="re3">체감난이도</label></li>
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
                <div>
                    <p><strong class="str01">시험후기</strong> 홍길* <span>2019-03-25</span></p>    
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.                                
                </div>
            </li>
            <li>
                <div>
                    <p><strong class="str02">적중사례</strong> 홍길* <span>2019-03-25</span></p>    
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.
                        우리는 일을하고 쉬는시간을 갖는다. We work and have a break.
                        그리고 우리는 쉬는시간에 게임, 드라마, 만화등 문화를 감상하며 쉬곤한다.
                        And we usually take a break...
                </div>
                <a href="#none" class="btnDel">삭제</a>
            </li>
            <li>
                <div>
                    <p><strong class="str03">체감난이도</strong> 홍길* <span>2019-03-25</span></p>    
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
                <div>
                    <p><strong class="str03">체감난이도</strong> 홍길* <span>2019-03-25</span></p>    
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.
                        우리는 일을하고 쉬는시간을 갖는다. We work and have a break.
                        그리고 우리는 쉬는시간에 게임, 드라마, 만화등 문화를 감상하며 쉬곤한다.
                        And we usually take a break...
                </div>
            </li>
            <li>
                <div>
                    <p><strong class="str03">체감난이도</strong> 홍길* <span>2019-03-25</span></p>    
                    영어 논술평가 인데 문법상 오타가 없는지 검토해 주시면 감사하겠습니다.                                
                </div>
            </li>
        </ul>
    </div>
    <div class="mt30">공통 페이지 넘버링 적용 </div>              
</div>