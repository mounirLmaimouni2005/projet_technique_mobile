function getdata() {


    let tbody = document.querySelector('#tbody');

    let URL_file = "../backend/api/destinations.php";

    fetch(URL_file, {
        method: "GET"
    })
        .then(reponse => reponse.json())
        .then(data => {

             tbody.innerHTML = "";

            data.forEach(datas => {

                let tr = document.createElement('tr');

                let alldata = `
                    <td>${datas.id}</td>
                    <td>${datas.nom}</td>
                    <td>${datas.description}</td>
                    <td>${datas.region}</td>
                `;

                tr.insertAdjacentHTML('beforeend', alldata);
                tbody.appendChild(tr);

            });

        });
}

getdata();



// function add destination data;

function addDestinantion(){

    let nom = document.querySelector("#nom");
    let description = document.querySelector("#description");
    let region = document.querySelector('#region');

   let nomValue = nom.value;
   let descriptionValue = description.value;
   let regionValue = region.value;

   let destinationData = {
      "nom" : nomValue,
      "description" : descriptionValue,
      "region" :regionValue,
   }

   
    let URL_file = "../backend/api/destinations.Php";

        // request to backend
        fetch(URL_file, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(destinationData)
        });
    }





