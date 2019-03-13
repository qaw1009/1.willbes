        <style type="text/css">
            /* 프로모션 홍보 url 댓글 */
            .urlWrap {
                width:1000px; 
                margin:30px auto 100px; 
                font-size:12px; 
                line-height: 1.4; 
                color:#555556;
            }
            .urlWrap ul {
                width: 90%;
                margin: 0 auto;
            }
            .urlWrap li {
                display: inline;
                float: left;  
                width: 25%;
                text-align: center;  
            }
            .urlWrap ul:after {
                content:'';
                display: block;
                clear:both;
            }
            .urlWrap .textarBox {
                margin-top:80px;
                background:#e8e6d9;
                padding:20px;
                text-align: center;
                border-radius: 40px 40px 0 0;    
            }
            .urlWrap .textarBox span {
                padding: 0 20px;
                font-weight: 500;
                font-size:14px;
            }
            .urlWrap .textarBox input {
                width:65%; 
                height:36px;
                line-height:36px;
                border:2px solid #929292;  
                border-radius: 20px 0 0 20px;
                padding-left:20px;
                vertical-align: middle;      
            }
            .urlWrap .textarBox a {
                display: inline-block;
                text-align: center;
                color:#fff;
                background: #000;
                margin-left:0;
                height:36px;
                line-height: 36px;
                border-radius: 0 20px 20px 0;
                vertical-align: middle; 
            }
            .urlWrap .url-List {
                margin-top: 1px;
            }
            .urlWrap .url-List table {    
                border-top:0;
            }
            .urlWrap .url-List tr {
                border-bottom:1px solid #e8e6d9;
            }
            .urlWrap .url-List thead th {
                background:#e8e6d9;
                font-weight: bold;
            }
            .urlWrap .url-List thead th,
            .urlWrap .url-List td {
                padding:10px;
                text-align: center;    
            }
            .urlWrap .url-List td:last-child {
                text-align: left;  
            }
            .urlWrap .url-List td a {
                float: right;
                font-size: 12px;
                border:1px solid #eee;
                width: 18px;
                height: 18px;
                line-height: 18px;
                text-align: center;
                color:#ccc;
                font-family: "Helvetica", "Apple SD Gothic Neo", "sans-serif";
            }
            .urlWrap .url-List td a:hover {
                border:1px solid #000;
                color:#000;
            }
        </style>   

        <div class="urlWrap" id="url">
            @if(config_app('SiteCode') == '2001','2002')  
            {{-- 경찰온라인 사이트일 경우만 적용 --}}  
            <ul>
                <li><a href="http://cafe.daum.net/policeacademy" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline01.png"alt="다음카페 경사모" /></a></li>
                <li><a href="http://cafe.naver.com/polstudy" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline02.png" alt="네이버카페 경꿈사" /></a></li>
                <li><a href="https://section.blog.naver.com/BlogHome.nhn?directoryNo=0&currentPage=1&groupId=0" target="_blank" ><img src="http://file3.willbes.net/new_cop/common/snsline03.png" alt="디시 공무원 갤러리" /></a></li>
                <li><a href="http://gall.dcinside.com/board/lists/?id=government" target="_blank"><img src="http://file3.willbes.net/new_cop/common/snsline04.png" alt="디시 순경마이너 갤러리" /></a></li>
            </ul>
            @endif  

            <div class="textarBox NSK">
                <span>홍보 URL 남기기</span>
                <input type="text" name="SNS_TXT" id="SNS_TXT" onclick="javascript:fn_focusSns();">
                <a href="javascript:fn_sns_insert();" class="btnrwt"><span class="ir">이벤트 참여하기</span></a>
            </div>
            
            <div class="url-List">
                <table>
                    <col width="15%"/>
                    <col/>
                    <thead>							
                        <tr>                   
                            <th>ID</th>
                            <th>URL</th>						        
                        </tr>    
                    </thead>
                    <tbody>							
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net <a href="#none">X</a></td>						        
                        </tr>    
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net </td>						        
                        </tr> 
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net </td>						        
                        </tr>  
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net </td>						        
                        </tr>  
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net</td>						        
                        </tr>  
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net </td>						        
                        </tr> 
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net </td>						        
                        </tr> 
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net</td>						        
                        </tr>  
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net </td>						        
                        </tr>  
                        <tr>                   
                            <td>willb...</td>
                            <td>http://www.willbescop.net </td>						        
                        </tr>      
                    </tbody>            
                </table>
            </div>
                        
            <div class="mt50">
                기존 사용하는 페이지 넘버링 붙여주세요~
            </div>    
        </div>