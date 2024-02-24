// class product{
//     function productlist(imageSrc,  productName,  price,  description){
//         <div alt="" class="u-align-center u-image u-image-circle u-image-1" data-image-width="183" data-image-height="275" style="background-image: url(imageSrc);"></div>
        
//         <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: flex-end;">
//             <h4 class="u-align-center u-text u-text-3">productName</h4>
//             <h5 class="u-align-center u-custom-font u-text u-text-font u-text-palette-5-base u-text-4">price</h5>
//             <button class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-1"
//             onclick="openForm($imageSrc,  $productName,  $price,  $description)">
//             Add TO Cart
//             </button>
//         </div>
//     }
// }     
class Product {
    static productListItem(imageSrc, productName, price, description) {
        const container = document.createElement('div');
        container.className = "u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle";
        container.style = "display: flex; flex-direction: column; align-items: center; padding-top: 20px;";

        const imageDiv = document.createElement('div');
        imageDiv.className = "u-align-center u-image u-image-circle u-image-1";
        imageDiv.style = `background-image: url(${imageSrc});`;
        container.appendChild(imageDiv);

        const textContainer = document.createElement('div');
        textContainer.className = "u-container-layout u-similar-container u-valign-top u-container-layout-1";
        textContainer.style = "flex-grow: 1; display: flex; flex-direction: column; justify-content: flex-end;";
        container.appendChild(textContainer);

        const h4 = document.createElement('h4');
        h4.className = "u-align-center u-text u-text-3";
        h4.textContent = productName;
        textContainer.appendChild(h4);

        const h5 = document.createElement('h5');
        h5.className = "u-align-center u-custom-font u-text u-text-font u-text-palette-5-base u-text-4";
        h5.textContent = `$${price}`;
        textContainer.appendChild(h5);

        const button = document.createElement('button');
        button.className = "u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-1";
        button.onclick = function() {
            openForm(imageSrc, productName, price, description);
        };
        button.textContent = "Add TO Cart";
        textContainer.appendChild(button);

        return container;
    }
}
