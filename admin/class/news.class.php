<?php

require_once('common.class.php');
class News extends Common
{
    public $id,$title,$short_detail,$detail,$image,$featured,$breaking,$slider_key,$status,$created_by,$created_date,$modified_by,$modified_date,$category_id;



    public function save(){
    print_r($this);

        $conn=mysqli_connect('localhost','root','','news-magazine');
    
        $sql="insert into category(title,short_detail,detail,image,featured,slider_key,status,created_by,created_date,modified_by,modified_by) values('$this->title','$this->short_detail','$this->detail','$this->image','$this->featured',$this->breakin'$this->created_by','$this->created_date')";
        
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