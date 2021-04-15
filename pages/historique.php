<?php
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
    }
  if(isset($_SESSION['employe'])){

 ?>
<!-- DataTables CSS library -->
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- DataTables JS library -->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#classeTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax" :"getData.php"

        });

    });
</script>
<div class="container-fluid">
    <div class="card">
        <div style="background-color: #371C1C; border-bottom-left-radius: 50px, border-bottom-left-radius:50px;" class="card-header card-color">
            <p class="h3 text-center text-uppercase font-weight-bold pt-2">Chercher classes</p>
        </div>
        <div class="card-body bg-white">
            <hr>
            <div class="row table-responsive m-auto rounded">
                <table id="classeTable"  class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>filiere</th>
                            <th>classe</th>
                        </tr>
                    </thead>
                    <tbody >
                    </tbody>
                    <footer>
                        <tr>
                            <th>ID</th>
                            <th>filiere</th>
                            <th>classe</th>
                        </tr>
                    </footer>
                </table>
            </div>
        </div>
    </div>
</div>
<?php

}else{
  header("Location: ../index.php");
}
 ?>
