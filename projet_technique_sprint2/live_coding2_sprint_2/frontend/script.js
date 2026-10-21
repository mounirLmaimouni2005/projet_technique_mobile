let file = "http://localhost:8000/backend/api/api_ctg.php";
document.addEventListener("DOMContentLoaded" , function(){



// function getall data 

function getallData(file){
    let tbdoy = document.querySelector('#table-categories-body');
    fetch(file)
    .then(reponse =>reponse.json())
    .then(data => {
         tbdoy.innerHTML = "";

         data.forEach(datas => {
             let tr = document.createElement("tr");

             tr.insertAdjacentHTML("beforeend" , `
                <td>${datas.id}</td>
                <td>${datas.nom}</td>
                <td>${datas.colour}</td>
                <td>${datas.incon}</td>
                ` )
         tbdoy.appendChild(tr);
                
        });
    })
}

 getallData(file);

// add data to file json
function addData(file){
    let nom = document.querySelector("#cat-nom");
    let colour = document.querySelector("#cat-couleur");
    let incon = document.querySelector("#cat-icone");

    let nomValue = nom.value;
    let colourValue = colour.value;
    let inconValue = incon.value;

    let alldata = {
        "nom" : nomValue,
        "colour" : colourValue,
        "incon" : inconValue 
    }
      
  fetch(file ,{
     method : "POST",
     headers:{"Content-type":"application/json"},
     body:JSON.stringify(alldata)
    })
    
    getallData(file);

    nom.value = "";
    colour.value = "";
    incon.value = "";
}

let form = document.getElementById("form-categorie");
form.addEventListener('submit',function(e){
   e.preventDefault();
   addData(file);
})


})