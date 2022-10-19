
let data;
let selected = [];

window.addEventListener("DOMContentLoaded", () => {
    //list all the products in the DB
    getProducts();

    //click action to send de order 
    document.getElementById('btn-cotizar')?.addEventListener('click', async () => {
        const URL = `${ BASE_URL }/api/order`; 
        const clientName        = document.querySelector('#client-name')?.value.trim();
        const productsChecked   = document.querySelectorAll('[name="product"]:checked');
        let productsIds = [];
        if( clientName === '' ){
            alert('Debe ingresar el nombre del cliente!');
            return 0;
        }
        if( productsChecked.length === 0 ){
            alert('Debe seleccionar al menos un producto!')
            return 0;
        }
        productsChecked.forEach( el => {
            productsIds = [...productsIds, el.value ]; 
        });
        const data = {
            client_name: clientName,
            products: productsIds,
        }
        try {
            await fetch( URL, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then( res => res.json())
            .then( res => {
                if( res.code === 1 ){
                    document.querySelector('#client-name').value = '';
                    productsChecked.forEach( el => {
                        el.checked = false
                    })
                    alert('Pedido realizado con exito!')
                } else {
                    alert( res.message );
                }
            })    
        } catch (error) {
            console.error('Error', error);
        }
    });
});

//build the html to preview the product
const productoTemplateView = ( { id, nombre_producto, descripcion_producto, imagen, precio } ) => {
    return `<div class="card col-lg-5 col-md-5 col-sm-12 m-2">
                <div class="card-body container">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-check-label" for="flexCheckDefault">
                                <strong> 
                                    <input class="form-check-input" type="checkbox" name="product" value="${ id }">
                                    ${ nombre_producto }
                                </strong> 
                            </label>
                        </div>
                        <div class="col-6">
                            <span class="badge text-bg-info">$${ precio }</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <small>${ descripcion_producto }</small>
                    </div>
                    <div class="row">
                        <img src="${ imagen }" alt="${ nombre_producto }" style="width: 300px; height: 250px;">
                    </div>
                </div>
            </div>`
}

//get the products using asyncronous request 
const getProducts = async () => {
    const URL = `${ BASE_URL }/api/products`;
    const productContainerDiv = document.getElementById('products');
    try{
        await fetch( URL )
        .then( res => res.json() )
        .then( data => {
            let productCardHtml = ``;
            data.map( (product, i) => {
                productCardHtml += productoTemplateView( product );
            });
            if( !!productContainerDiv ){
                productContainerDiv.innerHTML = productCardHtml;
            }
        });
    } catch(err){
        console.error( 'Error:', err)
    }
}

