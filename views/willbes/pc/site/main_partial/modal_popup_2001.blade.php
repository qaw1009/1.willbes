    <style type="text/css">
        .modalPopup {display:block; position:fixed; _position:absolute; top:0; left:0; width:100%; height:100%; z-index:9999}
        .modalPopup .bg {position:absolute; top:0; left:0; width:100%; height:100%; background:#000; opacity:.7; filter:alpha(opacity=70)}
        .modalPopup .pop-layer {display:block; position:absolute; top:50%; left:50%; width:910px; margin-left:-455px; margin-top:-160px; height:auto; z-index:10} 
        .modalPopup .pop-layer .btn-r {margin:10px 0; text-align:right}
        .modalPopup .pop-layer .btn-r a.cbtn {display:inline-block; height:25px; line-height:25px; padding:0 14px 0; border:1px solid #bbb; background-color:#16120f; font-size:13px; color:#bbb; margin-left:10px} 
        .modalPopup .pop-layer .btn-r a.cbtn:hover {border:1px solid #091940; background-color:#1f326a; color:#fff;}
    </style>
    
    <div class="modalPopup" id="blackpopup">
        <div class="bg"></div>
        <div class="pop-layer" id="modalPopup2">
            <div class="pop-container">
                <div class="pop-conts">
                    <!--content //-->
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/2001_LayPop190426_p.png" alt="" usemap="#MaplayerPopup" border="0" href="#none"/>
                    <map name="MaplayerPopup" id="MaplayerPopup">
                        <area shape="rect" coords="6,5,118,310" href="{{site_url('/support/notice/show/cate/3001?board_idx=223660')}}" title="BCLI" />
                        <area shape="rect" coords="133,5,511,312" href="{{site_url('/promotion/index/cate/3001/code/1009')}}" title="평생0원PASS" />
                        <area shape="rect" coords="525,5,901,312" href="{{site_url('/promotion/index/cate/3001/code/1210')}}" title="적중&합격예측서비스"/>
                    </map>
                    <div class="btn-r">
                        <a class="cbtn" href="javascript:void(0)" onclick="closeLayerPop2002('passpopup', 'blackpopup');" >하루 보지않기</a>
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
            function closeLayerPop2002(ckname, objname) {
                setCookiePop2002( ckname, "done" , 1 );	  
                document.all[objname].style.visibility = "hidden";
            }

            function setCookiePop2002( name, value, expiredays ) {
                var todayDate = new Date();
                todayDate.setDate( todayDate.getDate() + expiredays );
                document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
            }
            var agent = navigator.userAgent;
            /*모바일 비활성
            if (agent.match(/iPhone/) != null || agent.match(/iPod/) != null || agent.match(/IEMobile/) != null || agent.match(/Mobile/) != null || agent.match(/lgtelecom/) != null || agent.match(/PPC/) != null) {		
                document.all['blackpopup'].style.visibility = "hidden";
            }  else {
                if ( getCookie2002('passpopup') == 'done' ) {	
                document.all['blackpopup'].style.visibility = "hidden";
                }
                else {
                document.all['blackpopup'].style.visibility = "visible";
                }
            }*/
            var event_day = new Date("December 31, 2019 23:59:59"); 
            var now = new Date();

            if((event_day.getTime() - now.getTime()) > 0) { /*기간제한 사용하지 않을경우 아래로 대체해주세요 - 4-1*/
            //if((event_day.getTime() - now.getTime()) > 0) {
                if (getCookie2002('passpopup') == 'done' ) {	
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

            function getCookie2002( name ) {  
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