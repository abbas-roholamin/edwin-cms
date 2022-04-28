<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="public/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="public/js/bootstrap.min.js"></script>

<!-- ckeditor plugin -->
<script src="admin/js/plugins/ckeditor/ckeditor.js"></script>
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