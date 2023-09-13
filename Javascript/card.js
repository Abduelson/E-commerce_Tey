// if(document.readyState == "loading"){
//    document.addEventListener("DOMContentLoaded", ready);
// }
// else{
//     ready();
// }

// //Making function ready

// function ready(){
//     // remove the item card
//     var remove= document.getElementsByClassName("card_remove");
//     console.log(remove);

//     for(var i=0; i < remove.length; i++){
//         var boutton= remove[i];
//         boutton.addEventListener("click", removecardItem);
//     }

//     //quantity change
//     var quantityInput= document.getElementsByClassName("card_qte");
//     for(var i=0; i < quantityInput.length; i++){
//         var input= quantityInput[i];
//         input.addEventListener("change", quantityChange);
//     }

//     //Add card
//     var add_card=document.getElementsByClassName("bouton");
//     for(var i=0; i < add_card.length; i++){
//         var boutton_add= add_card[i];
//         boutton_add.addEventListener("click", Add_cardChange);
//     }
// }

// // remove the item card
// function removecardItem(event){
//    var bouttonClked= event.target;
//    bouttonClked.parentElement.remove();
//    loadSolde();
// }

// //quantity changes 
// function quantityChange(event){
//    var input= event.target;
//    if(isNaN(input.value) || input.value <= 0){
//      input.value= 1;
//    } 
//    loadSolde();
// }

// //Add to cart
// function Add_cardChange(event){
//    var boutton = event.target;
//    var shopProducts= boutton.parentElement;
//    var images= shopProducts.getElementsByClassName("images")[0].src;
//    var title= shopProducts.getElementsByClassName("card_title")[0].innerText;
//    var prix= shopProducts.getElementsByClassName("card_prix")[0].innerText;
//    var qte= shopProducts.getElementsByClassName("card_qte")[0].innerText;

//    Add_element(images,title,prix,qte);
//    loadSolde();
// }


// function Add_element(images,title,prix,qte){
//   var cartShopBox= document.createElement('div');
//   var carItems= document.getElementsByClassName("card_content")[0];
//   var cartItemsNames= carItems.getElementsByClassName("card_title");
//   for(var i=0; i < cartItemsNames.length; i++){
//     alert("You hve already this item to card");
// }
// }

// // load the solde
// function loadSolde(){
//     var total=0;
//    var card_content= document.getElementsByClassName("card_content")[0];
//    var card_boxes= card_content.getElementsByClassName("card-box");
//    for(var i=0; i < card_boxes.length; i++){
//     var card_box= card_boxes[i];
//     var priceElement= card_box.getElementsByClassName('card_prix')[0];
//     var quantityElement= card_box.getElementsByClassName('card_qte')[0];
//     var price= parseFloat(priceElement.innerText.replace("$", ""));
//     var quantity=quantityElement.value;
    
//     total= total+(price*quantity);
//     document.getElementsByClassName("total_prix")[0].innerText = "$" +total;
//     console.log(total);
// }
// }

function addToCart(idProduit, user_id) {
    let id = idProduit;
    let qt = document.getElementById("qteProd").value;
    if(id == "" || qt == ""){
        alert("Une erreur s'est produite!");
    }
    else{
        $.ajax({
            url: 'configuration/controller/cartController.php',
            type: 'POST',
            data: {id: id, qteProd: qt, user_id: user_id, function: "addToCart"},
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: response,
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    location.reload();
                });
                // location.reload();
        }
            
     });
    }
    
}

// Function to command the products in the cart, created by Jameson Innocent
function commander(user_id) {
    if (user_id == '') {
        alert("Une erreur s'est produite");
    }
    else{
        $.ajax({
            url: 'configuration/controller/commandeController.php',
            type: 'POST',
            data: {user_id: user_id, function: "commander"},
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: response,
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    location.reload();
                });
        }
            
     });
    }
}

function deleteItem(itemId){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to recover this item!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'configuration/controller/deleteController.php',
                type: 'POST',
                data: {itemId: itemId, function: "delete"},
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        location.reload();
                    });
            }
                
         });
        }
      });
}