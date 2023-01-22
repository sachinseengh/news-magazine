
<?php

include('headerFooter/header.php');
include('sidebar.php');
?>
        
        
      
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
        
            <div class="row">
            <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input  type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Rank</label>
                                            <input class="form-control" placeholder="Enter Rank">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Inactive
                                                </label>
                                            </div>
                                          
                                        </div>
                                    
                                   
                                       
                                        <button type="submit" class="btn btn-success" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-danger" name="reset">Reset Button</button>
                                    </form>
                                </div>
            </div>
          
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
include('headerFooter/footer.php');

?>

   
