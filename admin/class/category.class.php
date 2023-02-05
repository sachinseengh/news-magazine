<?php

include('common.class.php');
class Category extends Common
{
    public $id,$name,$rank,$status,$created_by,$created_date,$modified_by,$modified_date;



    public function save(){


        $conn=mysqli_connect('localhost','root','','news-magazine');
    
        $sql="insert into category(name,rank,status,created_by,created_date) values('$this->name','$this->rank','$this->status','$this->created_by','$this->created_date')";
        
        $var=$conn->query($sql);
    if($conn->affected_rows == 1 && $conn->insert_id>0){
        return $conn->insert_id;
    }else{
        return false;
    }
    }
 

    
    public function retrieve(){
        $conn=mysqli_connect('localhost','root','','news-magazine');
        $sql="select * from category";
        $var=$conn->query($sql);
        if($var->num_rows>0){
        $dataList=$var->fetch_all(MYSQLI_ASSOC)  ;
        return $dataList;
        }else{
            return false;
        }
        
    }

    
    public function edit(){

        $conn=mysqli_connect('localhost','root','','news-magazine');
    
        $sql="update category set name='$this->name',rank='$this->rank',status='$this->status',modified_by='$this->modified_by',modified_date='$this->modified_date' where id='$this->id' ";
        
        $conn->query($sql);
    if($conn->affected_rows == 1){
        return $this->id;
    }else{
        return false;
    }
        
    }
    public function delete(){
        $conn=mysqli_connect('localhost','root','','news-magazine');
        $sql="delete  from category where id='$this->id' ";
        $var=$conn->query($sql);

        if($var){
            return "success";
        }else{
            return "failed";
        }
        
    }


function getById(){
    $conn=mysqli_connect('localhost','root','','news-magazine');
    $sql="select * from category where id='$this->id' ";
    $var=$conn->query($sql);
    if($var->num_rows>0){
        $data=$var->fetch_object();
        return $data;
    }else{
        return [ ];
    }
}

}

?>