let fileInput = document.getElementById("file-input");
let fileList = document.getElementById("files-list");
let numOfFiles = document.getElementById("num-of-files");

let x =document.getElementById("f_name");

const currentIndex = 0;

fileInput.addEventListener("change", () => {
  fileList.innerHTML = "";
  numOfFiles.textContent = `${fileInput.files.length} Files Selected`; 
  const fileListArr = Array.from(fileInput.files)

  for (i of fileListArr) {
    let reader = new FileReader();
    let listItem = document.createElement("li");
    let fileName = i.name;
    let fileSize = (i.size / 1024).toFixed(1);
    let index =fileListArr.indexOf(i);
    
    // Creates a delete button 
    let deleteButton = document.createElement("span")
    deleteButton.innerHTML='<i class="lar la-times-circle"></i>'; 
    ///////////////////////////

        //add a click event to remove the current item
        deleteButton.addEventListener("click", function() {
          listItem.remove();
        });
        //////////////////////////////////////////////

    listItem.innerHTML = `<p><i class="fas fa-file-alt"></i>${fileName}</p><p>${fileSize}KB</p>`;

    //add remove item to list
    listItem.appendChild(deleteButton);
    /////////////////////////



    if (fileSize >= 1024) {
      fileSize = (fileSize / 1024).toFixed(1);
      listItem.innerHTML = `<p><i class="fas fa-file-alt"></i>${fileName}</p><p>${fileSize}MB</p>`;
    }
    fileList.appendChild(listItem);
   
  }
 
  
}); 

/********************************************* check enters *********************************/
function check_Enter() {
const title = document.getElementById("title").value;
if(title==""){
    alert(" please enter Title");
    return false;
}
}
