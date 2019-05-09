
<style type="text/css">
    /*프로모션 기본 댓글*/
.replySection { 
    width:1000px; 
    margin:30px auto 100px; 
    font-size:12px; 
    line-height: 1.4;
}
.replyWrite {
    position:relative; border:1px solid #ababab;
}	
.replyWrite .textarBx {
    border-bottom:1px solid #eaeaea; padding:10px;
}		
.replyWrite .textarBx textarea {
    float:left;
    width:100%;
    height:80px;
    overflow-y: auto;
    border:0;  
}

.replyWrite .textarBx:after {
    content: '';
    display: block;
    clear:both;
}
.replyWrite p {
    margin:0 0 0 20px; color:#999; text-align:left; height:42px; line-height:42px; 
}
.replyWrite .btnrwt {    
    position: absolute; bottom:0; right:0;
    width:70px; border-left:1px solid #eaeaea; display:block; height:42px; line-height:42px; color:#333; background:#fff;
}
.replyNoticeWrap .btnRt {
    margin-top:20px;
    text-align: right;
}

.replyNoticeWrap .btnRt a {
    display: inline-block;
    background: #000;
    color:#fff;
    padding:0 20px;
    height: 30px;
    line-height: 30px;
    border:1px solid #000;
    margin-left:5px;
}
.replyNoticeWrap .btnRt a:hover {
    background: #fff;
    color:#000;
}
.replyNotice {
    margin-top: 20px;
    border:1px solid #000;
}
.replyNotice .ry_info {
    padding: 10px;
    border-bottom: 1px solid #e0e0e0;
    color:#555;
}
.replyNotice .ry_info .notice {
    display: inline-block;
    color:#fff;
    background: #ff0033;
    height: 20px;
    line-height: 20px;
    vertical-align: middle;
    font-size: 11px;
    padding:0 5px;
    border-radius: 4px;
    margin-right:10px;
}
.replyNotice .ry_info .rnBtns {
    float:right;
}
.replySection .rnEditBtn {
    color:#666;
}
.replySection .rnDelBtn {
    color:#ff0033;
}

.replyNotice .ry_info .date {
    margin-right:10px;
}
.replyNotice .ry_cont {
    padding: 10px;
    background: #fafafa;
}
.replyNotice .ry_cont a {
    color:#3366ff;
}

.replyList {
    margin-top:30px;
}
.replyList .ryw_info {
    padding: 10px;
    border-bottom: 1px solid #e0e0e0;
    color:#555;
}
.replyList .ryw_info strong {
    margin-right: 10px
}
.replyList .ryw_cont {
    padding: 10px;
    color:#555;
    background: #fafafa;
    border-bottom:1px solid #999;
}
</style>

<!--댓글-->          
<div class="replySection" id="link">
            <div class="reply" id="reply">                          
                <div class="replyWrite">		           
                    <div class="textarBx">
                        <textarea name="EVENT_TXT" id="EVENT_TXT" cols="30" rows="3" onfocus="javascript:fn_focusComment();"></textarea>                        
                    </div>
                    <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
                    <button type="button" class="btnrwt" onclick="javascript:fn_comment_insert();">글쓰기</button>
                </div>

                <!--댓글공지-관리자만 등록,수정,삭제 가능-->
                <div class="replyNoticeWrap">
                    <div class="btnRt ">
                        <a href='#none'>새로고침</a>                    
                        <a href='javascript:add_notice()'>공지등록</a>                    
                    </div>                
                    
                    <ul class="replyNotice">                    
                        <li>
                            <div class="ry_info">
                                <span class="notice">공지</span> <span class="date">2019-03-07</span> <strong>면접이벤트 공지사항입니다. 참고하세요.</strong> 
                                <div class="rnBtns">
                                    <a class="rnEditBtn" onclick="javascript:modify_notice('UPD',2)">수정</a> 
                                    <a class="rnDelBtn" onclick="javascript:modify_notice('DEL',2)">삭제</a>
                                </div>                               
                            </div>
                            <div class="ry_cont">
                                <div>상받은거라곤 초등학교때 받은게 전부인데 언제 받았는지 밝히지말고 학창시절에 무슨무슨 상을 받았습니다 라...<a href="javascript:modify_notice('VIEW',2)" class="rnView">[상세보기]</a></div>                              
                            </div>
                        </li>                    
                    </ul>                
                </div>
                <!-- replyNoticeWrap//-->
                            
                <ul class="replyList">                    
                    <li>
                        <div class="ryw_info"><strong>조윤*</strong> <span class="date">2019-03-07</span> <a class="rnDelBtn f_right" onclick="javascript:modify_notice('DEL',2)">삭제</a></div>
                        <div class="ryw_cont">
                            <div>
                                1. 제가 의경근무할때 조xx경기청장 시절 지휘관 회의실에도 따라가서 느낀점도 있고 제대 후에도 그 사람이 하는 경찰 위한 정책도 너무 마음에 들었습니다
                                그 이후 실언, 댓글개입 문제등 여러가지 문제가 많이 있었고 현재 구속까지 됬는데  존경하는 인물이나 그런쪽으로해서 말하면 오히려 안좋겠죠?
                                2.상받은거라곤 초등학교때 받은게 전부인데 언제 받았는지 밝히지말고 학창시절에 무슨무슨 상을 받았습니다 라고 쓰는게 나을지 궁금합니다
                            </div>                            
                        </div>
                    </li> 
                    <li>
                        <div class="ryw_info"><strong>조윤*</strong> <span class="date">2019-03-07</span> <a class="rnDelBtn f_right" onclick="javascript:modify_notice('DEL',2)">삭제</a></div>
                        <div class="ryw_cont">
                            <div>
                                1. 제가 의경근무할때 조xx경기청장 시절 지휘관 회의실에도 따라가서 느낀점도 있고 제대 후에도 그 사람이 하는 경찰 위한 정책도 너무 마음에 들었습니다
                                그 이후 실언, 댓글개입 문제등 여러가지 문제가 많이 있었고 현재 구속까지 됬는데  존경하는 인물이나 그런쪽으로해서 말하면 오히려 안좋겠죠?
                                2.상받은거라곤 초등학교때 받은게 전부인데 언제 받았는지 밝히지말고 학창시절에 무슨무슨 상을 받았습니다 라고 쓰는게 나을지 궁금합니다
                            </div>                            
                        </div>
                    </li>
                    <li>
                        <div class="ryw_info"><strong>조윤*</strong> <span class="date">2019-03-07</span> <a class="rnDelBtn f_right" onclick="javascript:modify_notice('DEL',2)">삭제</a></div>
                        <div class="ryw_cont">
                            <div>
                                1. 제가 의경근무할때 조xx경기청장 시절 지휘관 회의실에도 따라가서 느낀점도 있고 제대 후에도 그 사람이 하는 경찰 위한 정책도 너무 마음에 들었습니다
                                그 이후 실언, 댓글개입 문제등 여러가지 문제가 많이 있었고 현재 구속까지 됬는데  존경하는 인물이나 그런쪽으로해서 말하면 오히려 안좋겠죠?
                                2.상받은거라곤 초등학교때 받은게 전부인데 언제 받았는지 밝히지말고 학창시절에 무슨무슨 상을 받았습니다 라고 쓰는게 나을지 궁금합니다
                            </div>                            
                        </div>
                    </li>
                    <li>
                        <div class="ryw_info"><strong>조윤*</strong> <span class="date">2019-03-07</span> <a class="rnDelBtn f_right" onclick="javascript:modify_notice('DEL',2)">삭제</a></div>
                        <div class="ryw_cont">
                            <div>
                                1. 제가 의경근무할때 조xx경기청장 시절 지휘관 회의실에도 따라가서 느낀점도 있고 제대 후에도 그 사람이 하는 경찰 위한 정책도 너무 마음에 들었습니다
                                그 이후 실언, 댓글개입 문제등 여러가지 문제가 많이 있었고 현재 구속까지 됬는데  존경하는 인물이나 그런쪽으로해서 말하면 오히려 안좋겠죠?
                                2.상받은거라곤 초등학교때 받은게 전부인데 언제 받았는지 밝히지말고 학창시절에 무슨무슨 상을 받았습니다 라고 쓰는게 나을지 궁금합니다
                            </div>                            
                        </div>
                    </li>
                    <li>
                        <div class="ryw_info"><strong>조윤*</strong> <span class="date">2019-03-07</span> <a class="rnDelBtn f_right" onclick="javascript:modify_notice('DEL',2)">삭제</a></div>
                        <div class="ryw_cont">
                            <div>
                                1. 제가 의경근무할때 조xx경기청장 시절 지휘관 회의실에도 따라가서 느낀점도 있고 제대 후에도 그 사람이 하는 경찰 위한 정책도 너무 마음에 들었습니다
                                그 이후 실언, 댓글개입 문제등 여러가지 문제가 많이 있었고 현재 구속까지 됬는데  존경하는 인물이나 그런쪽으로해서 말하면 오히려 안좋겠죠?
                                2.상받은거라곤 초등학교때 받은게 전부인데 언제 받았는지 밝히지말고 학창시절에 무슨무슨 상을 받았습니다 라고 쓰는게 나을지 궁금합니다
                            </div>                            
                        </div>
                    </li>                  
                </ul>
                            
                <div>                
                    공통 페이지 넘버링 적용                
                </div>
            </div>          
        </div><!--wb_reply//-->

    <script type="text/javascript">
        function add_notice(){		
            var event_no = '${params.searchEventNo}';
            var url = 'event_replyNotice_pop'
            window.open(url,'comment_event', 'scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700,left=100,top=100');		  
	    }
    </script>
    
