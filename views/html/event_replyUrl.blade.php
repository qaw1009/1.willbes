        <div class="urlWrap" id="url">
            @if(config_app('SiteCode') == '2001')  
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