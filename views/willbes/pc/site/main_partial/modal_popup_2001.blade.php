        <div class="modalPopup" id="blackpopup">
            <div class="bg"></div>
            <div class="pop-layer" id="modalPopup2">
                <div class="pop-container">
                    <div class="pop-conts">
                        <!--content //-->
                        <img src="http://file3.willbes.net/new_cop/2019/03/LayPop190322_c.jpg" alt="2단계 동형모의고사/숨은 필합자를 찾아라" usemap="#Map190325" border="0"/>
                        <map name="Map190325" id="Map190325">
                            <area shape="rect" coords="216,319,541,366" href="{{ site_url('/promotion/index/cate/3001/code/1127e') }}" alt="2단계 동형모의고사" />
                            <area shape="rect" coords="451,663,653,727" href="{{ site_url('/pass/promotion/index/cate/3001/code/1138') }}" alt="숨은 필홥자를 찾아라" />
                        </map>
                        <div class="btn-r">
                            <a class="cbtn" href="javascript:void(0)" onclick="closeLayerPop123('passpopup', 'blackpopup');" >하루 보지않기</a>
                            <a class="cbtn" href="#">Close</a>
                        </div>
                        <!--// content-->
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
            layer_open('modalPopup2');
            });
            function layer_open(el){

            var temp = $('#' + el);
            var bg = temp.prev().hasClass('bg'); //dimmed 레이어를 감지하기 위한 boolean 변수

            if(bg){
            $('.modalPopup').fadeIn(); //'bg' 클래스가 존재하면 레이어가 나타나고 배경은 dimmed 된다.
            }else{
            temp.fadeIn();
            }

            // 화면의 중앙에 레이어를 띄운다.
            if (temp.outerHeight() < $(document).height() ) temp.css('margin-top', '-'+temp.outerHeight()/2+'px');
            else temp.css('top', '0px');
            if (temp.outerWidth() < $(document).width() ) temp.css('margin-left', '-'+temp.outerWidth()/2+'px');
            else temp.css('left', '0px');

            temp.find('a.cbtn').click(function(e){
            if(bg){
                $('.modalPopup').fadeOut(); //'bg' 클래스가 존재하면 레이어를 사라지게 한다.
            }else{
                temp.fadeOut();
            }
            e.preventDefault();
            });

            $('.modalPopup .bg').click(function(e){ //배경을 클릭하면 레이어를 사라지게 하는 이벤트 핸들러
            $('.modalPopup').fadeOut();
            e.preventDefault();
            });

            }    
        </script>
        <script type="text/javascript">
            function closeLayerPop123(ckname, objname) {
                setCookiePop123( ckname, "done" , 1 );	  
                document.all[objname].style.visibility = "hidden";
            }

            function setCookiePop123( name, value, expiredays ) {
                var todayDate = new Date();
                todayDate.setDate( todayDate.getDate() + expiredays );
                document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
            }
            var agent = navigator.userAgent;
            /*모바일 비활성
            if (agent.match(/iPhone/) != null || agent.match(/iPod/) != null || agent.match(/IEMobile/) != null || agent.match(/Mobile/) != null || agent.match(/lgtelecom/) != null || agent.match(/PPC/) != null) {		
                document.all['blackpopup'].style.visibility = "hidden";
            }  else {
                if ( getCookie123('passpopup') == 'done' ) {	
                document.all['blackpopup'].style.visibility = "hidden";
                }
                else {
                document.all['blackpopup'].style.visibility = "visible";
                }
            }*/
            var event_day = new Date("March 31, 2019 23:59:59"); 
            var now = new Date();

            if((event_day.getTime() - now.getTime()) > 0) { /*기간제한 사용하지 않을경우 아래로 대체해주세요 - 4-1*/
            //if((event_day.getTime() - now.getTime()) > 0) {
                if (getCookie123('passpopup') == 'done' ) {	
                    document.all['blackpopup'].style.visibility = "hidden";
                }
                else {
                    document.all['blackpopup'].style.visibility = "visible";
                }
            } else {	/*기간제한 사용하지 않을경우 아래로 대체해주세요 - 4-2*/	
            //} else {
                document.all['blackpopup'].style.visibility = "hidden"; /*기간제한 사용하지 않을경우 아래로 대체해주세요 - 4-3*/	
            //	document.all['blackpopup'].style.visibility = "hidden";
            } /*기간제한 사용하지 않을경우 아래로 대체해주세요 - 4-4*/	
            //}

            function getCookie123( name ) {  
                var nameOfCookie = name + "=";  
                var x = 0;  
                while ( x <= document.cookie.length )  {
                    var y = (x+nameOfCookie.length);  
                    if ( document.cookie.substring( x, y ) == nameOfCookie ) {
                        if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )  
                            endOfCookie = document.cookie.length;  
                            return unescape( document.cookie.substring( y, endOfCookie ) );  
                    }
                x = document.cookie.indexOf( " ", x ) + 1;  
                
                if ( x == 0 )  
                    break;  
                }  
                return "";  
            }
        </script>