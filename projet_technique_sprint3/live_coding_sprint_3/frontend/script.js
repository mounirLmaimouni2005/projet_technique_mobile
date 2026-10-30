let file = "http://localhost:8000/backend/api/api_ctg.php";
document.addEventListener("DOMContentLoaded" , function(){



// function getall data 

 async function getallData(file){
    try{
        let tbdoy = document.querySelector('#table-categories-body');
        let reponse = await  fetch(file);
        if(!reponse.ok){
            Toast('you have error please try leter 1' , 'error');
            throw new Error("you have error in get backend repons");
        }

        let data = await reponse.json();
        
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
        }catch(Error){
            console.log(Error);
        }
    }
  
 
 getallData(file);



// add data to file json
   async  function addData(file){
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
        
        try{ 
            let reponse = await fetch(file ,{
            method : "POST",
            headers:{"Content-type":"application/json"},
            body:JSON.stringify(alldata)
            })
            
            //spinner and disabled button;
             isLoading(true);

            if(!reponse.ok){
                Toast("you have error please try leter" ,"error");
                throw new Error("you have  error in add backend error (api reponse)");
                
            }
            await getallData(file);

            nom.value = "";
            colour.value = "";
            incon.value = "";
            Toast("category added" ,  "sucsses") 
        }catch(Error){
            console.log(Error);
        }finally{
            setTimeout(()=>{
                isLoading(false)
            },3000)
        }

       
    }



    let form = document.getElementById("form-categorie");
    form.addEventListener('submit',function(e){
    e.preventDefault();
    addData(file);
    })


    })




// function affichage messages;
function Toast(message , type){
    let  divToast = document.querySelector("#toast");

    divToast.classList = type;
    divToast.textContent = message;

    divToast.className = type === 'sucsses' ? "bg-green-700 text-white  p-3 rounded ":"bg-red-700 text-white  p-3 rounded";
    
    setTimeout(()=>{
        divToast.classList = "";
        divToast.textContent = "";
    }, 3000)

}


// function changes etats of button;
function isLoading(loding){
    let originText  = "";
    let SpanSubmit = document.querySelector('#conttxt');
     originText = SpanSubmit.textContent;
    let btnSubmit = document.querySelector('#btnSubmit');
    let spinner = document.querySelector("#spinner");

    if(loding === true){
        SpanSubmit.textContent = ' Enregistrer...';
        btnSubmit.disabled = true;
        spinner.classList.remove('hidden');

    }else{
        SpanSubmit.textContent = "Enregistre";
        btnSubmit.disapled = false;
        spinner.classList.add('hidden')
    }
}
