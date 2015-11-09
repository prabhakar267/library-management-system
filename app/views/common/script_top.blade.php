<script type="text/javascript">
    var config = {};
    config.path = {};
    config.path.tpl = "{{ Config::get('app.url') . Config::get('view.custom.tpl') }}";
    config.path.ajax = "{{ Config::get('app.url') }}";    
</script>

@yield('custom_top_script')