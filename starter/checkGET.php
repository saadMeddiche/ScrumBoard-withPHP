<?php
require "connect.php";

if (!empty($_GET['id'])) {
?>
    <script type="text/javascript">
        //Clique the hidden button
        //$('#update').modal('show'); [X]
        $('#updateBTN').click();

        //Go to the index.php page when the clique its outside the modal
        //https://stackoverflow.com/questions/9992368/html-click-anywhere-except-one-element
        // $('html').click(function(e) {
        //     if (!$(e.target).hasClass('modal-content')) {
        //         $(".modal-content").hide() = true;
        //     }
        // });
    </script>
<?php
}


?>