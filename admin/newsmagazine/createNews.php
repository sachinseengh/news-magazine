
<?php

include('../class/category.class.php');
include('../class/news.class.php');

$category  = new Category( );
$categoryList=$category->retrieve();

$news=new News();
@session_start();
if(isset($_POST['submit'])){
    $category->set('title',$_POST['title']);
    $category->set('short_detail',$_POST['short_detail']);
    $category->set('detail',$_POST['detail']);
    $category->set('featured',$_POST['featured']);
    $category->set('slider_key',$_POST['slider_key']);
    $category->set('status',$_POST['status']);
    $category->set('category_id',$_POST['category_id']);
    
    $category->set('created_by',$_SESSION['id']);
    $category->set('created_date',date('y-m-d H:i:s'));
    if($_FILES['image']['error']==0){
        if($_FILES['image']['type']== "image/png" || $_FILES['image']['type']== "image/jpg" ||$_FILES['image']['type']== "image/jpeg"){
            $imagename=uniqid().$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'../images'.$imagename);
            $news->set('image',$imagename);
        }
        
    }else{
        $error="failed";
    }

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
                                            <label>Title</label>
                                            <input  type="text" class="form-control" name="title" id="title" required>
                                            <span id="categoryError" style="color:red"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>News Category</label>
                                            <select class="form-control">
                                                <option value="" name="category_id" required >Select category</option>
                                                <?php foreach($categoryList as $category){?>
                                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name'];?>
                                             <?php  }?>                   

                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Short Detail</label>
                                            <textarea class="form-control" rows="3" name="short_detail" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Detail</label>
                                            <textarea class="form-control ckeditor" rows="3" name="detail"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" required>
                                            <span><?php if(isset($error)) { 
                                                echo $error;
                                            } ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Featured News</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="featured" id="optionsRadios1" value="1" checked>Yes
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="featured" id="optionsRadios2" value="0">No
                                                </label>
                                            </div>

                                            </div>
                                            <div class="form-group">
                                            <label>Breaking</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="breaking" id="optionsRadios1" value="1" checked>Yes
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="breaking" id="optionsRadios2" value="0">No
                                                </label>
                                            </div>

                                            </div>
                                            <div class="form-group">
                                            <label>Slider key</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="slider_key" id="optionsRadios1" value="1" checked>Yes
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="slider_key" id="optionsRadios2" value="0">No
                                                </label>
                                            </div>

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
<script src="../js/ckeditor/ckeditor.js"></script>
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

