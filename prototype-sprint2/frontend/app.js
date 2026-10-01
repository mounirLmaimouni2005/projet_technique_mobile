
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



// function add destination 
function AddDestination(){

    //get inputs value;
    let nom = document.querySelector("#nom");
    let description = document.querySelector("#description");
    let region = document.querySelector("#region");
    
    


















}










