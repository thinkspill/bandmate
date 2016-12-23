<script src="/js/app.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slabText/2.3/jquery.slabtext.min.js"></script>
<script>
    $(document).ready(function () {
        $('#bandselect').change(function() {
            $('#bandselectform').submit();
        });
        $('.slabtext').slabText();
    });
</script>