//function affichage;
function affichage(){

    let URL_file1 = "../backend/api/api.php";
    let tbody = document.querySelector('#tbody');

    fetch(URL_file1 , {
            method : "GET"
    })
    .then(reponse =>reponse.json())
    .then(data =>{
          
        tbody.innerHTML ="";
        data.forEach(datas => {
            let tr = document.createElement('tr');
             tr.insertAdjacentHTML('beforeend',
                `<td>${datas.id}</td>
                <td>${datas.nom}</td>
                <td>${datas.description}</td>
                <td>${datas.region}</td>
                `
             )
             tbody.appendChild(tr);

        });
    })
    
}
affichage()




//function add destination
function addDestination(){

    let nom = document.querySelector('#nom');
    let description = document.querySelector('#description');
    let region = document.querySelector('#region');


    let nomValue = nom.value;
    let descpValue = description.value;
    let regionValue = region.value;

    let destnsData = {
        'nom' : nomValue,
        'description' : descpValue,
        'region' :regionValue
    }

    let URL_FILE  = "../backend/api/api.php";

    fetch(URL_FILE , {
        method : "POST",
         
        headers: {"content-type":"application/json"},
        body:JSON.stringify(destnsData)
    })

    nom.value = "";
    description.value = "";
    region.value = "";
    
}


let btnSubmit = document.querySelector("#btnSubmit");
btnSubmit.addEventListener("click" ,function(e){
    e.preventDefault();
    addDestination();
    affichage();
    

})



