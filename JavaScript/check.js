   
        // Below function Executes on click of login button.
        function check_Enter(){
            const form = document.getElementById('form');
            const username = document.getElementById('username').value;
            const pass = document.getElementById("pass").value;
                      if(username==""){
              alert("please enter name  ");
              return false
              }
             else if(pass==""){
             alert("    please enter password ");
             return false
             }
              
              
                     
            }
          