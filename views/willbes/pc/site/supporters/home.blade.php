@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100%;
            background:#fff;
            margin-top:20px !important;
            margin:0 auto;
            line-height:1.5;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }
        .jumpMenu {width:780px; margin:0 auto; text-align:right; margin-bottom:15px}
        .jumpMenu select {height:28px; line-height:28px; padding:5px}
        .evtTop {position:relative; text-align:center; background:#404ae0}
        .evtTop span.img1 {position:absolute; left:50%; z-index:1; top:140px; margin-left:-314px; width:628px; animation:iptimg1 .5s ease-in;-webkit-animation:iptimg1 .5s ease-in;}
        @@keyframes iptimg1{
             from{opacity: 0; transform:scale(0.0)}
             to{opacity: 1; transform:scale(1)}
         }
        @@-webkit-keyframes iptimg1{
             from{top:150px; opacity: 0.1; transform:scale(0.0)}
             30%{top:250px; opacity: 0.25; transform:scale(0.33)}
             80%{top:200px; opacity: 0.7; transform:scale(0.66)}
             to{top:140px; opacity: 1; transform:scale(1)}
         }

        .notice {position:absolute; left:50%; top:735px; margin-left:-290px; z-index:1; width:580px; background:#fff;
            box-shadow: 10px 19px 19px rgba(0,0,0,.2);
        }
        .notice .title {float:left; background:#252525; width:120px; height:126px; line-height:126px}
        .notice .list {float:left; width:460px; margin:20px 0}
        .notice .list li {margin-left:40px; list-style:disc; line-height:1.8; text-align:left; padding-right:20px}
        .notice .list li a {float:left; display:block; width:80%; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
        .notice .list li span {float:right}
        .notice:after {content:""; display:block; clear:both}

        .tab {width:780px; margin:0 auto}
        .tab li {display:inline; float:left; width:25%}
        .tab li a {display:block; text-align:center; padding:20px 0; font-weight:bold; color:#a6a6a6; font-size:18px; background:#636363; line-height:1.4;
            border:1px solid #5d5d5d; border-bottom:none; border-right:none;
        }
        .tab li a:hover,
        .tab li a.active {background:#fff; color:#292929}
        .tab li:last-child a {border-right:1px solid #5d5d5d}
        .tab:after {content:""; display:block; clear:both}

        .evtCts {width:780px; margin:0 auto; padding-bottom:100px}
        .evtCts h4 {font-size:18px; font-weight:bold; margin-left:15px; margin:100px 0 20px}
        .evtCts h5 {font-size:16px; font-weight:bold; margin-top:30px}
        .evtCts .row-line {
            background: #ccc;
            margin:0 10px;
            height:14px;
            width:1px;
            vertical-align:bottom;
        }
        .tableTypeA {border-top:1px solid #959595}
        .tableTypeA th {background:#f9f9f9; color:#707070; padding:15px 10px; font-weight:bold;}
        .tableTypeA th,
        .tableTypeA td {border-bottom:1px solid #edeeef; text-align:center}
        .tableTypeA td {padding:20px 10px; color:#707070}
        .tableTypeA td .info {margin-top:5px}
        .tableTypeA td .info li {display:inline; border-right:1px solid #edeeef; padding:0 10px; color:#333}
        .tableTypeA td .info li:first-child {padding-left:0}
        .tableTypeA td .info li:last-child {border:0}
        .tableTypeA td .info li span.workBox {
            display: inline-block;
            width: 60px;
            height: 22px;
            font-size: 12px;
            font-weight: 300;
            line-height: 22px;
            text-align: center;
            font-family: "굴림", "Gulim", "돋움", "Dotum", "Helvetica", "Apple SD Gothic Neo", "sans-serif";
            background: #fff;
        }
        .tableTypeA td .info li span.workBox1 {background:#ed1c24; color:#fff}
        .tableTypeA td .info li span.workBox2 {background:#003e7d; color:#fff}
        .tableTypeA td .info li span.workBox3 {color:#ed1c24; border:1px solid #ed1c24}
        .tableTypeA td .info li span.workBox4 {color:#003e7d; border:1px solid #003e7d}
        .tableTypeA td input[type="text"] {
            width: 100%;
            height: 25px;
            border: 1px solid #d4d4d4;
        }
        .tableTypeA td textarea {
            width: 100%;
            height: 230px;
            border: 1px solid #d4d4d4;
            resize: none;
            vertical-align: middle;
            padding: 10px;
            line-height:1.5;
        }

        .gift { position:absolute; right:0; top:-40px; z-index:1}

        .wtgMember {margin-top:20px; width:100%}
        .wtgMember li {display:inline; float:left; width:25%; margin-bottom:10px}
        .wtgMember .wtgUser {border:1px solid #d9d9d9; padding:17px 0; text-align:center; position:relative; background:url(https://static.willbes.net/public/images/promotion/supporters/supporters_tab04_user.png) no-repeat center 17px; margin-right:10px}
        .wtgMember .wtgUser .mask {width:100%; height:80px; background:url(https://static.willbes.net/public/images/promotion/supporters/supporters_tab04_mask.png) no-repeat center top; position:absolute; top:17px; z-index:10}
        .wtgMember .wtgUser .userMsg {width:80%; margin:15px auto; line-height:1.5; text-align:left}
        .wtgMember .wtgUser p {margin-top:10px}
        .wtgMember .wtgUser strong {color:#424ac7}
        .wtgMember .wtgUser img {margin-bottom:10px; width:80px; height:80px; margin:0 auto}
        .wtgMember .wtgUser a {font-size:11px; color:#222; border:2px solid #222; padding:3px 0 2px; display:block; width:56px; margin:0 auto; text-align:center;}
        .wtgMember .wtgUser a:hover {background:#222; color:#fff}
        .wtgMember:after {content:""; display:block; clear:both}


        /*********팝업***********/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: 640px;
            border: 1px solid #000;
            background: #fff;
            font-size:13px;
            line-height:1.5;
            box-shadow:0 10px 10px rgba(0,0,0,0.2);
            padding-bottom:20px;
        }
        .b-close {
            position: absolute;
            right: 5px;
            top: 5px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
            color:#fff;
            font-size:14px;
        }

        .Pstyle h3 {height:60px; line-height:60px; padding-left:20px; color:#fff; background:#225fba; font-size:20px}
        .Pstyle .content {height:540px; width:auto; padding:20px; overflow-y: scroll; }
        .Pstyle .content table {border-top:2px solid #333}
        .Pstyle .content th,
        .Pstyle .content td {padding:10px; text-align:center; border-bottom:1px solid #e4e4e4;}
        .Pstyle .content th {background:#f2f2f2}
        .Pstyle .content th span {float:right}
        .Pstyle .content td:nth-child(2) {text-align:left;}
        /*.Pstyle .content tr:hover {background:#e9f1fe}*/
        .Pstyle .content td a {display:block}
        .Pstyle .content td .boradImg {margin:10px 0}
        .Pstyle .content td.tx-left img {max-width:560px}
        .Pstyle .content table strong {background:#424ac7; color:#fff; margin-right:10px; font-size:11px; padding:2px 4px}
        .Pstyle .content table strong.st02 {background:#f57d20;}

        .Pstyle .content .userView {padding-left:100px; position:relative; padding-bottom:20px}
        .Pstyle .content .userView .userImg {width:80px; position:absolute; top:0; left:0; z-index:1}
        .Pstyle .content .userImg .mask {width:100%; height:80px; background:url(https://static.willbes.net/public/images/promotion/supporters/supporters_tab04_mask.png) no-repeat center top; position:absolute; top:0; left:0; z-index:2}
        .Pstyle .content .userImg img {width:80px; height:80px; margin:0 auto}
        .Pstyle .content .userView p {margin-bottom:10px}
        .Pstyle .content .userView strong {color:#424ac7}
        .Pstyle .content .userView:after {content:""; display:block; clear:both}
        .Pstyle .content textarea {
            height: 150px;
        }

        .btnsSt3 {text-align:center; margin-top:20px}
        .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff; font-weight:bold; border:1px solid #333}
        .btnsSt3 a:hover {background:#fff; color:#333}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="jumpMenu">
            {{ $data['SupportersYear'] }}년 {{ $data['SupportersNumber'] }}기
            {{--<select name="jumpMenu1" id="jumpMenu1" onchange="MM_jumpMenu1('parent',this,0)">
                <option>2019년</option>
                <option>2020년</option>
                <option>2021년</option>
            </select>
            <select name="jumpMenu2" id="jumpMenu2" onchange="MM_jumpMenu2('parent',this,0)">
                <option>1기</option>
                <option>2기</option>
                <option>3기</option>
                <option>4기</option>
            </select>--}}
        </div>
        <div class="evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_top.jpg" title="광은 서포터즈">
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/supporters/supporters_top_title.png" alt="화살표"></span>
            <div class="notice">
                <div class="title">
                    <a href="javascript:go_popup('', '{{ $data['SupportersIdx'] }}');"><img src="https://static.willbes.net/public/images/promotion/supporters/supporters_top_img01.png" title="공지사항 더보기"></a>
                </div>
                <ul class="list">
                    @if(empty($arr_base['notice_list']) === true)
                        <li>등록된 내용이 없습니다.</li>
                    @endif
                    @foreach($arr_base['notice_list'] as $row)
                        <li><a href="javascript:go_popup('{{ $row['BoardIdx'] }}', '{{ $row['SupportersIdx'] }}');">{{ $row['Title'] }}</a><span>{{ $row['RegDatm'] }}</span></li>
                    @endforeach
                </ul>
            </div>
            <ul class="tab NGEB">
                <li><a href="#tab01">신과함께 소개</a></li>
                <li><a href="#tab02">과제수행</a></li>
                <li><a href="#tab03">제안 및 의견</a></li>
                <li><a href="#tab04">명예의 전당</a></li>
            </ul>
        </div>

        <div id="tab01" class="evtCts">
            <img src="https://static.willbes.net/public/images/promotion/supporters/supporters_tab01.jpg" title="광은 서포터즈">
        </div>

        <div id="tab02" class="evtCts">
            @include('willbes.pc.site.supporters.home_assignment_partial')
        </div>

        <div id="tab03" class="evtCts">
            @include('willbes.pc.site.supporters.home_suggest_partial')
        </div>

        <div id="tab04" class="evtCts">
            @include('willbes.pc.site.supporters.home_member_partial')
        </div>
    </div>
    <!-- End Container -->

    {{--공지사항 레이어팝업--}}
    <div id="popup" class="Pstyle NGR">
        <div id="supporters_notice"></div>
    </div>

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})}
            )}
        );

        function go_popup(obj1, obj2) {
            var ele_id = 'supporters_notice';
            var data = {
                'ele_id' : ele_id,
                'board_idx' : obj1,
                'supporters_idx' : obj2
            };
            sendAjax('{{ front_url('/supporters/notice/index') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                $('#popup').bPopup();
            }, showAlertError, false, 'GET', 'html');
        }
    </script>
@stop