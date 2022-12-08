
<?php
function stprofileimg(){
                        global $conn;
                      /*  $name=$_SESSION['full_name'];*/
                        $id=$_SESSION['user_id'];
                        $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                        FROM user,student
                        WHERE user.user_id=student.user_id and user.user_id='".$id."';";
                        $result= mysqli_query($conn,$sql);
                        $row =mysqli_fetch_row($result);
                        $img=$row[3];
                        echo " <img class='photo' src='../../sources/image/$img' /> ";    
                        
}
                        
                      function informationPR(){  

                        global $conn;
                        /*   $password=$_SESSION['password'];*/
                          
                          /* $name=$_SESSION['full_name'];*/
                            $id=$_SESSION['user_id'];/** من صفحة تسجيل الدخول  stud_id*/
                            $id3=$_SESSION['pass4'];/** login path كلمة السر غسر مشفرة تم احضارها من  */
                           $sql="SELECT USER.* ,student.stu_id,student.stu_specialization 
                           FROM user,student
                           WHERE user.user_id=student.user_id and user.user_id='".$id."';";
                           $result= mysqli_query($conn,$sql);
                           $row =mysqli_fetch_row($result);
                           $id=$row[5];
                           $name=$row[1];
                           $spe=$row[6];
                           $pass=$row[2];
                           $img=$row[3];
                 
                 /*          
                  if(password_verify($id3,$pass)){
                  $test=$id3;
                   echo $test;
   
                  }*/
                           /** عرض البيانات التي تم احضارها من قاعدة البيانات  */
                           echo "<lable class='l1'>".$id."</lable>"."<lable class='l2'>".$name."</lable>"."<lable class='l3'>".$spe."</lable>" ;
                               /** session  باستخدام  edit profile  ارسال البيانات الي صفحة  */
                               $_GET['id']=$id;           
                               $_GET['name']=$name;
                               $_GET['spe']=$spe;
                               $_GET['password']=$pass;/**كلمة مرور مشفرة */
                               $_GET['password1']=$id3;/**كلمة مرور غير مشفرة  */
                               $_GET['img']= $img;
   
                                
                              $_SESSION['id']=$_GET['id'];
                              $_SESSION['name']=$_GET['name'];
                              $_SESSION['spe']=$_GET['spe'];
                              $_SESSION['pass']=$_GET['password']; 
                              $_SESSION['pass2']= $_GET['password1'];
                              $_SESSION['img1']=$_GET['img'];
   
                }
                        ?>