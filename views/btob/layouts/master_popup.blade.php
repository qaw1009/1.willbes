{{-- 팝업기본화면 --}}
@include('btob.layouts.header')
<body class="single">

@hasSection('popup_title')
    @yield('popup_header')
    <div class="modal-header bg-green">
        <h4 class="modal-title">@yield('popup_title')</h4>
    </div>
@endif

<div class="modal-body">
    @yield('popup_content')
</div>

@hasSection('add_buttons')
    <div class="modal-footer">
        @yield('add_buttons')
        <button type="button" class="btn btn-default" onclick="self.close();" >닫기</button>
    </div>
@endif

@yield('popup_footer')
{{-- Main Scripts --}}
@include('btob.layouts.footer_script')
</body>
</html>
