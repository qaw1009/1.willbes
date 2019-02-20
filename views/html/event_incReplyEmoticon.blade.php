        <style type="text/css">
            /*이모티콘 댓글*/
            .reEmo {}
            .characterSt2 {width:960px; margin:0 auto 50px}
            .characterSt2 .characterSt2Img {margin-bottom:20px; border-top:1px solid #ccc; border-bottom:1px solid #ccc}
            .characterSt2 .characterSt2Img li {display:inline; float:left; width:16.366666%; text-align:center; cursor:pointer;border-right:1px solid #ccc}
            .characterSt2 .characterSt2Img li input {vertical-align:middle}
            .characterSt2 .characterSt2Img li.active {background:#cde7f5}
            .characterSt2 .characterSt2Img li p {height:40px; line-height:40px; color:#333; background:#eee; font-size:14px; font-weight:bold}
            .characterSt2 .characterSt2Img li p span {color:#ee2365}
            .characterSt2 .characterSt2Img li:last-child {border-right:0; width:160px;}
            .characterSt2 .characterSt2Img:after {content:""; display:block; clear:both}
            
            .replySt3 {width:980px; margin:0 auto}	
            .replySt3 .textarBx {margin-bottom:10px; background:#e8e6d9; padding:20px}
            .replySt3 .textarBx div {float:left; width:85.5%}
            .replySt3 .textarBx textarea {width:100%; height:85px;}
            .replySt3 .textarBx div input {height:36px; width:97%; line-height:36px; vertical-align:middle; border:2px solid #707070; margin-bottom:5px; padding-left:2%}
            .replySt3 .textarBx button {float:right; width:14%; height:85px; line-height:85px; text-align:center; background:#69654b; border-radius:4px; color:#fff}
            .replySt3 .textarBx:after {content:""; display:block; clear:both}
            .replySt3 p {color:#69654b}
            
            .replySt3List {width:980px; margin:20px auto 50px}
            .replySt3List li > span {display:block; float:left; width:120px; text-align:center}
            .replySt3List li img {width:100px}
            .replySt3List li .crtReply {float:left; margin:10px 0}
            .replySt3List li .crtReply p {margin-bottom:5px}
            .replySt3List li .crtReply strong {color:#1087ef}
            .replySt3List li .crtReply > span {font-size:11px !important; color:#999; font-weight:normal !important}
            .replySt3List li .crtReply p a {float:right; margin-top:-5px; padding:0 4px; height:20px; line-height:20px; color:#666; border:1px solid #666; font-size:11px !important}
            .replySt3List li .crtReply p a:hover {
                color:#fff; background:#666;
            }
            .replySt3List li .crtReply div {width:860px; background:#eee; border-radius:10px; padding:20px; line-height:1.4; position:relative; margin:0 auto; margin-bottom:5px}	
            .replySt3List li .crtReply div span a {display:block; margin-bottom:5px; color:#cf9243; font-weight:bold}			
            .replySt3List li .crtReply div em {
                position:absolute;
                background:transparent;
                width:8px;height:0;
                top:20px;
                left:0;
                margin-left:-8px;
                border-top: 8px solid transparent;
                border-right: 8px solid #eee;
                border-bottom: 8px solid transparent;
                z-index:999;
            }								
            .replySt3List li:after {content:""; display:block; clear:both}
            .rolling {width:1210px; margin:0 auto; text-align:center}
        </style>

        <div class="reEmo">
            <div class="characterSt2">
                <ul class="characterSt2Img">
                    <li>
                        <img src="http://file3.willbes.net/new_cop/character/01.png" alt="" />
                        <p><label><input type="radio" name="sns_icon" value="1" /> 만점의 <span>신~</span></label></p>
                    </li>
                    <li>
                        <img src="http://file3.willbes.net/new_cop/character/20.png" alt="" />
                        <p><label><input type="radio" name="sns_icon" value="20" /> 만점의 <span>향기~~</span></label></p>
                    </li>
                    <li>
                        <img src="http://file3.willbes.net/new_cop/character/17.png" alt="" />
                        <p><label><input type="radio" name="sns_icon" value="17" /> 만점<span>맨!~</span></label></p>
                    </li>
                    <li>
                        <img src="http://file3.willbes.net/new_cop/character/18.png" alt="" />
                        <p><label><input type="radio" name="sns_icon" value="18" /> 히든 <span>만점러~</span></label></p>
                    </li>
                    <li>
                    <img src="http://file3.willbes.net/new_cop/character/13.png" alt="" />
                    <p><label><input type="radio" name="sns_icon" value="13" /> 불타는 <span>만점러!</span></label></p>
                    </li>
                    <li>
                        <img src="http://file3.willbes.net/new_cop/character/14.png" alt="" />
                        <p><label><input type="radio" name="sns_icon" value="14" /> 만점의 <span>워너원~</span></label></p>
                    </li>
                </ul>
            </div>
            
            <div class="replySt3">
                <div class="textarBx">
                    <div><textarea name="SNS_TXT" id="SNS_TXT" cols="30" rows="3" placeholder="댓글을 입력해주세요." onclick="javascript:fn_focusSnsIcon();" /></textarea></div>
                    <button type="button" onclick="javascript:fn_snsicon_insert();">글쓰기</button>
                </div>
                <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
            </div>
            
            <div class="replySt3List">
                <ul>     		
                    <li>
                        <span class="crtImg">
                            <img src="http://file3.willbes.net/new_cop/character/17.png" alt=""/>
                        </span>
                        <div class="crtReply">
                            <p>유수* <a href="#none">삭제</a></p>
                            <div>                                    	
                                <span><a href="" target="_blank"></a></span>
                                형법 점수 확올랐네..
                                <em>&nbsp;</em> 
                            </div>
                            <span>2018-12-29 00:50:51</span>
                        </div>                                    
                    </li>
                    <li>
                        <span class="crtImg">
                            <img src="http://file3.willbes.net/new_cop/character/17.png" alt=""/>
                        </span>
                        <div class="crtReply">
                            <p>유수*</p>
                            <div>                                    	
                                <span><a href="" target="_blank"></a></span>
                                형법 점수 확올랐네..
                                <em>&nbsp;</em> 
                            </div>
                            <span>2018-12-29 00:50:51</span>
                        </div>                                    
                    </li>
                    <li>
                        <span class="crtImg">
                            <img src="http://file3.willbes.net/new_cop/character/17.png" alt=""/>
                        </span>
                        <div class="crtReply">
                            <p>유수*</p>
                            <div>                                    	
                                <span><a href="" target="_blank"></a></span>
                                형법 점수 확올랐네..
                                <em>&nbsp;</em> 
                            </div>
                            <span>2018-12-29 00:50:51</span>
                        </div>                                    
                    </li>
                    <li>
                        <span class="crtImg">
                            <img src="http://file3.willbes.net/new_cop/character/17.png" alt=""/>
                        </span>
                        <div class="crtReply">
                            <p>유수*</p>
                            <div>                                    	
                                <span><a href="" target="_blank"></a></span>
                                형법 점수 확올랐네..
                                <em>&nbsp;</em> 
                            </div>
                            <span>2018-12-29 00:50:51</span>
                        </div>                                    
                    </li>
                    <li>
                        <span class="crtImg">
                            <img src="http://file3.willbes.net/new_cop/character/17.png" alt=""/>
                        </span>
                        <div class="crtReply">
                            <p>유수*</p>
                            <div>                                    	
                                <span><a href="" target="_blank"></a></span>
                                형법 점수 확올랐네..
                                <em>&nbsp;</em> 
                            </div>
                            <span>2018-12-29 00:50:51</span>
                        </div>                                    
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="Paging">
                        <ul>
                            <li class="Prev"><a href="#none"><img src="/public/img/willbes/paging/paging_prev.png"></a></li>
                            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                            <li><a href="#none"><a href="#none">2</a></a><span class="row-line">|</span></li>
                            <li class="Next"><a href="#none"><img src="/public/img/willbes/paging/paging_next.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- reEmo//-->