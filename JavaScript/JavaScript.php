<!DOCTYPE html>
<head>
</head>
<html>
<body>

<script>
               //check inputs for Edit profile page !

                function check__Enter() {
                const id = document.getElementById("id").value;
                const NAME = document.getElementById("name").value;
                const pass = document.getElementById("pass").value;
                const pass2=document.getElementById("cof-pass").value;
                const specialization=document.getElementById("spe").value;
              
                if(id==""){
                alert(" pleas enter ID");
                return false
                }
                if(NAME==""){
                alert(" pleas enter name");
                return false
                }
                
                if(specialization==""){
                alert(" pleas enter specialization ");
                return false
                }
                else if(pass==""){
                alert("    pleas enter password ");
                return false
                
                }
                if(pass2==""){
                alert(" pleas enter password again");
                return false
                }
              if(pass != pass2){
              alert(" Password does not match ");
              return false
                }
                }
                </script>



<!--  check inputs  for create group -->
<script>
    function check_Enter() {
    const NAME = document.getElementById("name").value;
    if(NAME==""){
    alert(" pleas enter Group-name");
    return false
    }
    }
</script>


<!-- check enter for create teacher account -->
<script>

    function check_Enter() {
   
    const NAME = document.getElementById("name").value;
    const number = document.getElementById("number").value;
    const pass = document.getElementById("pass").value;
    const pass2=document.getElementById("cof-pass").value;
    const check=document.getElementById("check").value;
  
   
    if(NAME==""){
    alert(" pleas enter name");
    return false
    }
    if(number==""){
    alert(" pleas enter number");
    return false
    }
    if(number.length > 10){
    alert(" the number is long");
    return false
    }
    if(number.length < 10){
    alert(" the number is short");
    return false
    }
    else if(pass==""){
    alert("    pleas enter password ");
    return false
    }
    if(pass2==""){
    alert(" pleas enter password again");
    return false
    }
  if(pass != pass2){
  alert(" Password does not match ");
  return false
    }
    if (!document.getElementById('check').checked) {
        alert("You didn't check it!");
        return false     
            }
    }
    </script>


<!-- check inpute for craete admin  -->

<script>

    function check_Enter() {
   
    const NAME = document.getElementById("name").value;
    const pass = document.getElementById("pass").value;
    const pass2=document.getElementById("cof-pass").value;
    const check=document.getElementById("check").value;
  
   
    if(NAME==""){
    alert(" pleas enter name");
    return false
    }
    
    else if(pass==""){
    alert("    pleas enter password ");
    return false
    }
    if(pass2==""){
    alert(" pleas enter password again");
    return false
    }
  if(pass != pass2){
  alert("  Password does not match ");
  return false
    }
    if (!document.getElementById('check').checked) {
        alert("You didn't check it!");
        return false     
            }
    }
    </script>
</body>    
</html>