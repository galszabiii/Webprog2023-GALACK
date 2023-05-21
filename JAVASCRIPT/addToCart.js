const buttons = document.querySelectorAll("button[name='submit']");
const displayDiv = document.querySelector(".myCart");
const totalPriceDiv = document.querySelector(".totalPrice");


buttons.forEach((button) => {
    button.addEventListener("click", () => {
        const pName = button.parentElement.previousElementSibling.querySelector(".product-name");
        const pPrice = button.parentElement.previousElementSibling.querySelector(".product-price");
//---------------------------------------------------------------------//
        const pBox = document.createElement("div"); //productBox
        const bName = document.createElement("div"); //boxName
        const nameP = document.createElement("p"); //boxName <p>
        const bValue = document.createElement("div"); //boxValue
        const bQuantity = document.createElement("div"); //boxQuantity
        const bPrice = document.createElement("div"); //boxPrice
        const priceP = document.createElement("p"); //boxPrice <p>

//---------------------------------------------------------------------//
        pBox.classList.add("productBox");
        bName.classList.add("boxName");
        bValue.classList.add("boxValue");
        bQuantity.classList.add("boxQuantity");
        bPrice.classList.add("boxPrice");
        priceP.classList.add("pPrice");

//---------------------------------------------------------------------//
        nameP.textContent = pName.textContent;
        priceP.textContent = pPrice.textContent;

//---------------------------------------------------------------------//
        bName.appendChild(nameP);

        bPrice.appendChild(priceP);
        bValue.appendChild(bQuantity);
        bValue.appendChild(bPrice);
        pBox.appendChild(bName);
        pBox.appendChild(bValue);
        displayDiv.appendChild(pBox);
//---------------------------------------------------------------------//
        
    }); 
});


    