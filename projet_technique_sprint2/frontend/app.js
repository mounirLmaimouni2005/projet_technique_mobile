
//function get all data from json file ;
function getdata() {

    let container = document.querySelector('#container');
    let tbody = document.querySelector('#tbody');

    let URL_file = "../backend/api/destinations.Php";

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






function AddDestination() {

    // get inputs value
    let nom = document.querySelector("#nom");
    let description = document.querySelector("#description");
    let region = document.querySelector("#region");

    let nomValue = nom.value;
    let descriptionValue = description.value;
    let regionValue = region.value;

    // destination data
    let destinationData = {
        "nom": nomValue,
        "description": descriptionValue,
        "region": regionValue
    };

    // path of backend file
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





let submitBtn = document.querySelector('#submit');

submitBtn.addEventListener('click', function(e) {
    e.preventDefault();
    AddDestination();

    getdata();

    nom.value = "";
    description.value = "";
    region.value = "";
   
});

















