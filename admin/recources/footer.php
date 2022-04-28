<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- ckeditor plugin -->
<script src="js/plugins/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function() {

    ClassicEditor
        .create(document.querySelector('textarea'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
})
</script>
</body>

</html>