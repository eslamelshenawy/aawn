<!-- Footer -->
<div class="footer text-muted">
    &copy; 2020. <a href="{{ url('/') }}">AwnBank </a>
</div>
<!-- /footer -->

</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
<script>

    $('.addInput').click(function(){

        $(this).parent().next('.inputDiv').clone().appendTo(".imageUpload");

    });
    $('body').on('click', '.removeInput', function() {
        $(this).parent().parent().remove();
    });



        $('.addcolor').click(function(){

        $(this).parent().next('.colorDiv').clone().appendTo(".colorUpload");

    });
    $('body').on('click', '.removecolor', function() {
        $(this).parent().parent().remove();
    });


          $('.addsize').click(function(){

        $(this).parent().next('.sizeDiv').clone().appendTo(".sizeUpload");

    });
    $('body').on('click', '.removesize', function() {
        $(this).parent().parent().remove();
    });
</script>
