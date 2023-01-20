
<?php
@session_start( );
print_r($_SESSION);
print_r($_COOKIE);

if(!array_key_exists('username',$_SESSION) && array_key_exists('username',$_COOKIE)){
    header('location: ../index.php');
}
else{
    // echo "hello";
}
include('headerFooter/header.php');
include('sidebar.php');
?>
        
        
      
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        
            <!-- /.row -->
          
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
include('headerFooter/footer.php');

?>

   
