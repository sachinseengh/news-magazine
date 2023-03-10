
<?php
include('../class/category.class.php');

$category  = new Category( );
@session_start();
if(isset($_POST['submit'])){
    $category->set('name',$_POST['name']);
    $category->set('rank',$_POST['rank']);
    $category->set('status',$_POST['status']);
    $category->set('created_by',$_SESSION['id']);
    $category->set('created_date',date('y-m-d H:i:s'));


    $result=$category->save();
    if(is_integer($result)){
        $msg="category inserted successfully with id".$result;
    }else{
        $msg=" ";
    }
    
}


include('headerFooter/header.php');
include('sidebar.php');
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
               <?php if(isset($msg)) { ?>
                <div class="alert alert-success"><?php echo $msg; ?> </div>

                <?php } ?>
                    <h1 class="page-header">Create Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
        
            <div class="row">
            <div class="col-lg-6">
                                    <form role="form" id="LoginForm" method="post" novalidate>
                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input  type="text" class="form-control" name="name" id="name" required>
                                            <span id="categoryError" style="color:red"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Rank</label>
                                            <input class="form-control" placeholder="Enter Rank" name="rank" required >
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="optionsRadios1" value="1" checked>Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="optionsRadios2" value="0">Inactive
                                                </label>
                                            </div>

                                            </div>
                                        <button type="submit" class="btn btn-success" name="submit" value="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-danger" name="reset">Reset Button</button>
                                    </form>
                                </div>
            </div>
          
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

<?php
include('headerFooter/footer.php');



?>
<script>
    $(document).ready(function(){
        $('#name').keyup(function(){
            const value=$('#name').val();
            $.ajax({
                url:"checkCategoryName.php",
                method:"post",
                dataType:"text",
                data:{'categoryName':value},
                success:function(res){
                    if(res!= "success"){
                        $("#categoryError").text(res);
                    }else{
                        $("#categoryError").text(" ");
                    }
                }
            })
        });
    })
</script>

