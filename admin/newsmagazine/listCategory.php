
<?php

include('headerFooter/header.php');
include('../class/category.class.php');

@session_start();
if(isset($_SESSION['message']) && $_SESSION['message'] != ""){
    $successMessage=$_SESSION['message'];
    $_SESSION['message']="";
    
}



$categoryObject = new Category( );
$dataList = $categoryObject->retrieve();
include('sidebar.php');

?>
        
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Category</h1>
                </div>
                
            </div>
            <?php
            if(isset($successMessage)){    
                echo '<div class="alert alert-success">'.$successMessage.'</div>' ;
            }
            ?>
            <div class="row">
            <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Rank</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach($dataList as $key=>$category)  { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $key+1; ?></</td>
                                        <td><?php echo $category['name'];  ?></td>
                                        <td><?php echo $category['rank'];  ?></td>
                                        <td class="center"><?php if($category['status']==1){
                                            echo "<label class='label-success'>Active</label>";
                                        }else{
                                            echo "<label class='label-danger'>Inactive</label>";
                                        } ?></td>
                                        <td class="center" width="15%">
                                        <a href="editCategory.php?id=<?php echo $category['id'];?>"" role="btn" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="deleteCategory.php?id=<?php echo $category['id'];?>" role="btn" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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


