<?php
require_once('../Model/database.php');
function addnewsection($courseid,$coursename,$teacherid,$teachername,$sec,$room,$time){
    $conn=dbConnection();
    $sql="INSERT INTO sectioninfo VALUES('$courseid','$coursename','$teacherid','$teachername','','$sec','$room','$time')";
    $result=mysqli_query($conn,$sql);
    return true;
}

function getallsection(){
    $conn=dbConnection();
    $sql="SELECT * FROM sectioninfo";
    $result=mysqli_query($conn,$sql);
    return $result;
}

function searchcourse($id){
    $conn=dbConnection();
    $sql="SELECT * FROM sectioninfo WHERE courseId LIKE'%$id%'";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function getsectionbyfaculty($id){
    $conn=dbConnection();
    $sql="SELECT * FROM sectioninfo WHERE teacherId ='$id'";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function searchsection($name){
    $conn=dbConnection();
    $sql="SELECT * FROM sectioninfo WHERE courseName='$name'";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function getinforoom($coursename,$section){
    $conn=dbConnection();
    $sql="SELECT * FROM sectioninfo WHERE courseName='$coursename' and sectionName='$section'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if($count==1){
        $row=mysqli_fetch_assoc($result);
        return $row;
    }else{
        return false;
    }
}
?>