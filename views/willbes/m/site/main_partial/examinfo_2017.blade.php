<div class="mainTit NSK-Black  tx-center mt30" >윌비스 임용 <span class="tx-main">시험 정보</span></div>
<!--
<div class="examInfo mt10">
    <ul>
        <li>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/m/2018/icon_ssam01.png">
                임용가이드
            </a>
        </li>
        <li>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/m/2018/icon_ssam02.png">
                최근10년동향
            </a>
        </li>
        <li>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/m/2018/icon_ssam03.png">
                지역별공고
            </a>
        </li>
        <li>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/m/2018/icon_ssam04.png">
                자료실
            </a>
        </li>
    </ul>
</div>-->
<div class="w-Guide-Ssam mt20">
    <div class="NG ssamInfoMenu">
        <ul class="tabinfo" id="info_tab">
            <li onclick="ajaxInfoTab(this);" data-url="{{front_url('/landing/show/lcode/1035/cate/3137?file_type=ajax_')}}"><a href="#none">임용<br>시험제도</a></li>
            <li onclick="ajaxInfoTab(this);" data-url="{{front_url('/examInfo/mainTrend')}}"><a href="#none" class="on">최근<br>10년동향</a></li>
            <li onclick="ajaxInfoTab(this);" data-url="{{front_url('/examInfo/notice?file_type=ajax_')}}"><a href="#none">지역별<br>공고문</a></li>
            <li onclick="ajaxInfoTab(this);" data-url="{{front_url('/support/examQuestion?file_type=ajax_')}}" class="one"><a href="#none">자료실</a></li>
        </ul>
    </div>
    <div id="infoTab01" class="info_html_group">
    </div>
    <div id="infoTab02" class="info_html_group">
    </div>
    <div id="infoTab03" class="info_html_group">
    </div>
    <div id="infoTab04" class="info_html_group">
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    $(function (){
        $("#info_tab li").eq(1).trigger("click");
    });

    // 시험정보 탭
    function ajaxInfoTab(obj,_index){
        console.log(_index);
        var _url = $(obj).data('url');
        var num = $(obj).index() + 1;

        $(".tabinfo li a").removeClass('on');
        if(typeof _index !== 'undefined'){
            $("#info_tab li").eq(_index).find('a').addClass('on');
        }else{
            $(obj).find('a').addClass('on');
        }

        sendAjax(_url, '', function(ret) {
            if(ret){
                $(".info_html_group").html('');
                $("#infoTab0" + num).html(ret);
            }
        }, showAlertError, false, 'GET', 'html');
    }
</script>