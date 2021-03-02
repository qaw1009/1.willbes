@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
    <!-- Container -->
    <div class="p_re evtContent NSK-Thin" id="evtContainer">
        @include('willbes.pc.promotion.2001.2080_top')
        @include('willbes.pc.predict.2082_promotion_partial')
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mt3').addClass('active');
        });
    </script>
@stop