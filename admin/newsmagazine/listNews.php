
<?php

include('headerFooter/header.php');
include('../class/category.class.php');
include('../class/news.class.php');

@session_start();
if(isset($_SESSION['message']) && $_SESSION['message'] != ""){
    $successMessage=$_SESSION['message'];
    $_SESSION['message']="";
    
}



$newsObject = new News( );
$dataList = $newsObject->retrieve();
include('sidebar.php');

?>
        
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List News</h1>
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
                                        <th>Title</th>
                                        <th>   Short_detail</th>
                                        <th>Detail</th>
                                        <th>Image</th>
                                        <th>Featured</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach($dataList as $key=>$news)  { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $key+1; ?></</td>
                                        <td><?php echo $news['title'];  ?></td>
                                        <td><?php echo $news['short_detail'];  ?></td>
                                        <td><?php echo $news['detail'];  ?></td>
                                        <td >
                                        <img src="../images/<?php echo $news['image']; ?>" height='100' width='100'
                                        ;">
                                    </td>

                                        <td class="centre"><?php
                                        if($news['featured']==1){
                                            echo "<label class='label-success'>Yes</label>";
                                        }else{
                                            echo "<label class='label-danger'>No</label>";
                                        }
                                        
                                        
                                        
                                        ?>
                                        </td>
                                        <td class="center" width="15%">
                                        <a href="editNews.php?id=<?php echo $news['id'];?>"" role="btn" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="deleteNews.php?id=<?php echo $news['id'];?>" role="btn" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
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


