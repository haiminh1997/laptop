        </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>public/admin/js/jquery.js"></script>
        <script src="<?php echo base_url() ?>public/admin/ckeditor/ckeditor.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() ?>public/admin/js/bootstrap.min.js"></script>
        <script>
            // Thay thế <textarea id="post_content"> với CKEditor
            CKEDITOR.replace( 'content' );// tham số là biến name của textarea
        </script>
    </body>
</html>