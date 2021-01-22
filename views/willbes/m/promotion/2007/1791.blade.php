@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .Container {width:100%; max-width:720px; margin:0 auto; position:relative;}    
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}    

    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } 
    .embed-container iframe, 
    .embed-container object, 
    .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy a {display:block; width:94%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left;  background:#525151; color:#fff; font-size:0.875rem; line-height:1.4 }
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px}
    .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
    .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}      

</style>

<div id="Container" class="Container NSK c_both">    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1791m_01.jpg" alt="지텔프 패스 혜택" >       
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1791m_02.jpg" alt="지텔프" >       
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1791m_03.jpg" alt="서민지/김혜진" >       
    </div>

    <div class='embed-container'>
        <iframe src='https://www.youtube.com/embed/BT7sfyECChA?rel=0' frameborder='0' allowfullscreen></iframe>
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1791m_04.jpg" alt=""  >     
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1791m_05.jpg" alt=""  >     
    </div>

    <div class="evtCtnsBox">
        <a href="https://lang.willbes.net/m/lecture/show/cate/3093/pattern/only/prod-code/171711" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1791m_06.jpg" alt=""  >   
        </a>  
    </div>
    {{--
    <div class="evtCtnsBox evtFooter" id="infoText">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">이벤트 유의사항</h4>
            <ul>
                <li>이벤트 참여자 대상 수강연장혜택은 21.1.12.(화) 제공예정입니다.</li>
                <li>혜택 수령 후 수강후기 삭제 시 제공된 혜택은 회수됩니다.</li>
                <li>무료 제공되는 수강기간은 환불기간에 산입되지 않습니다.</li>                  
            </ul>
        </div>
    </div>
    --}}
</div>
<!-- End Container -->
@stop