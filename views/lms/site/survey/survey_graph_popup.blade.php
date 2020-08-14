@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    <style type="text/css">


        .Cts03 {margin-bottom:100px; text-align:left; width:100%; height:400px;}

        .Cts03 h3 {font-size:16px;}
        .Cts03 h3 span {color:#fa7738}
        .Cts03 .graphWrap {width:100%}
        .Cts03 .graphWrap {
            margin-top:50px; font-size:14px; line-height:1.5;
        }
        .Cts03 .graphWrap li {
            display:inline; float:left; width:48%; text-align:left; margin:0 0.5%; position:relative;
        }
        .Cts03 .graphWrap select {position:absolute; top:5px; right:0}
        .Cts03 .graphWrap:after {content:""; display:block; clear:both}

        .Cts03 .graphbox {width:90%; margin:20px auto; border:1px solid #000;}
        .Cts03 .graphbox .subTit {font-size:120%; color:#F30}
        .Cts03 .graph {width:20%; float:left; text-align:center; background:url(http://file.willbes.net/new_image/2015/04/graphBg.png) repeat;}
        .Cts03 .graph p {padding:10px 0; background:#fff}
        .Cts03 .graph p:last-child {border-top:1px solid #333}
        .Cts03 .graph div {position:relative; width:45px; height:250px; margin:0 auto; }
        .Cts03 .graph div img {position:absolute; left:0; bottom:0; width:100%; background:#e2be43 url(https://static.willbes.net/public/images/promotion/common/graphA.png) repeat;}
        .Cts03 .graph2 div img {background:#bdbdcc url(https://static.willbes.net/public/images/promotion/common/graphA.png) repeat;}
        .Cts03 .graphbox:after {content:""; display:block; clear:both}
        .Cts03 .graphWrap:after {content:""; display:block; clear:both}

        .Cts03_01 {width:1120px; text-align:left; margin:80px auto 0}
        .Cts03_01 div {border:1px solid #e4e4e4; padding:20px; margin-top:20px}

        .Cts04 {padding-bottom:100px}
        .Cts04 .lecture {
            width:1000px; margin:0 auto;
        }
        .Cts04 .lecture li {
            display:inline; float:left; width:25%; text-align:center; margin-bottom:20px;
        }
        .Cts04 .lecture li img.prof {
            width:200px !important; border:1px solid #ccc;
        }
        .Cts04 .t_tilte {
            line-height:1.5; padding:10px 0; color:#666; width:200px; margin:0 auto
        }
        .Cts04 .t_tilte p {border-top:1px solid #e4e4e4; padding-top:10px; margin-top:10px}
        .Cts04 .t_tilte span {
            color:#36374d; font-size:14px; ;
        }

        .Cts04 .lecture ul:after {
            content:""; display:block; clear:both;
        }
    </style>
    <form class="form-horizontal" id="_sub_refund_check_form" name="_sub_refund_check_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}

    <!-- Popup -->
        <div class="form-group mt-20">
            <div class="col-md-11">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="active"><a href="#">문항별 수치분석</a></li>
                    <li role="presentation" class="act-move"><a href="javascript:gotab('{{ $sp_idx }}');">입력 데이터</a></li>
                </ul>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">

                <div class="Cts03">
                    <ul class="graphWrap">
                        <li>
                            @if(empty($data)===false)
                                @foreach($data as $key => $value)
                                    @foreach($value as $title => $arr)
                                        <strong>[@if($is_series == 'Y'){{ $key }} - @endif{{ $title }}]</strong><br/>
                                        @foreach($arr as $type => $val)
                                            @if($type != 'S')
                                                [@if($is_series == 'Y'){{ $key }}@else{{ $title }}@endif - {{ $type }}]
                                            @endif
                                                <div class="graphbox" style="margin-top: 10px">
                                                    @foreach($val as $item => $row)
                                                        <div class="graph graph2">
                                                            <p>{{ $row['spread'] }}%<br/>({{ $row['count'] }}명)</p>
                                                            <div>
                                                                <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="{{ $row['spread'] }}%">
                                                            </div>
                                                            <p>{{ $item }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @else
                                <div class="graphbox">
                                    <div class="graph graph2">
                                        <p>0 %</p>
                                        <div>
                                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                        </div>
                                        <p>매우 쉬움</p>
                                    </div>

                                    <div class="graph graph2">
                                        <p>0 %</p>
                                        <div>
                                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                        </div>
                                        <p>쉬움</p>
                                    </div>

                                    <div class="graph graph2">
                                        <p>0 %</p>
                                        <div>
                                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                        </div>
                                        <p>보통</p>
                                    </div>

                                    <div class="graph graph2">
                                        <p>0 %</p>
                                        <div>
                                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                        </div>
                                        <p>어려움</p>
                                    </div>

                                    <div class="graph graph2">
                                        <p>0 %</p>
                                        <div>
                                            <img src="https://static.willbes.net/public/images/promotion/common/transparent.png" height="0%">
                                        </div>
                                        <p>매우 어려움</p>
                                    </div>
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>

                <!-- End 학습요소 -->
            </div>
        </div>
        <!-- End Popup -->
    </form>
    <!-- //popupContainer -->
    <form class="form-horizontal" id="url_form" name="url_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
    </form>
    <script>
        function gotab(sp_idx){
            var _param = 'sp_idx=' + sp_idx;
            var _url = '{{ site_url('/site/survey/surveyDataPopup') }}' + '?' + _param;
            location.href = _url;
        }
    </script>
@stop

@section('popup_footer')
@endsection