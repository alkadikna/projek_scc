document.addEventListener('DOMContentLoaded', () => {
    const cartItemsElement = document.querySelector('#cart-items tbody');
    const totalPriceElement = document.getElementById('total-price');
    const cartButton = document.getElementById('cart-button');
    const cartModal = document.getElementById('cart-modal');
    const closeButton = document.querySelector('.close-button');
    const checkoutButton = document.getElementById('checkout-button');

    // const cart = Array.from(cartItemsElement.querySelectorAll('tr')).map(row => {
    //     const cells = row.querySelectorAll('td');
    //     return {
    //         name: cells[0].textContent,
    //         quantity: parseInt(cells[1].textContent, 10),
    //         totalPrice: parseFloat(cells[2].textContent.replace('$', ''))
    //     };
    // });

    // document.querySelectorAll('.add-to-cart').forEach(button => {
    //     button.addEventListener('click', event => {
    //         const productElement = event.target.closest('.product');
    //         const productId = productElement.getAttribute('data-id');
    //         const productName = productElement.getAttribute('data-name');
    //         const productPrice = parseFloat(productElement.getAttribute('data-price'));

    //         addToCart(productId, productName, productPrice);
    //     });
    // });

    // document.querySelectorAll('.increase-quantity').forEach(button => {
    //     button.addEventListener('click', event => {
    //         const productElement = event.target.closest('.product');
    //         const productId = productElement.getAttribute('data-id');
    //         addToCart(productId);
    //     });
    // });

    // document.querySelectorAll('.decrease-quantity').forEach(button => {
    //     button.addEventListener('click', event => {
    //         const productElement = event.target.closest('.product');
    //         const productId = productElement.getAttribute('data-id');
    //         removeFromCart(productId);
    //     });
    // });

    cartButton.addEventListener('click', () => {
        cartModal.style.display = 'block';
    });

    closeButton.addEventListener('click', () => {
        cartModal.style.display = 'none';
    });

    window.addEventListener('click', event => {
        if (event.target === cartModal) {
            cartModal.style.display = 'none';
        }
    });

    // checkoutButton.addEventListener('click', () => {
    //     fetch('checkout.php', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //         },
    //         body: JSON.stringify(cart),
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.status === 'success') {
    //             alert(data.message);
    //             cart.length = 0;
    //             updateCart();
    //             cartModal.style.display = 'none';
    //         } else {
    //             alert('Checkout failed!');
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //         alert('Checkout failed!');
    //     });
    // });

    // function addToCart(productId, productName = null, productPrice = null) {
    //     const existingProductIndex = cart.findIndex(item => item.id === productId);
    //     if (existingProductIndex > -1) {
    //         cart[existingProductIndex].quantity += 1;
    //         cart[existingProductIndex].totalPrice += cart[existingProductIndex].price;
    //     } else if (productName && productPrice) {
    //         const product = { id: productId, name: productName, price: productPrice, quantity: 1, totalPrice: productPrice };
    //         cart.push(product);
    //     }
    //     updateCart();
    //     updateProductQuantityDisplay(productId);
    // }

    // function removeFromCart(productId) {
    //     const existingProductIndex = cart.findIndex(item => item.id === productId);
    //     if (existingProductIndex > -1) {
    //         cart[existingProductIndex].quantity -= 1;
    //         cart[existingProductIndex].totalPrice -= cart[existingProductIndex].price;
    //         if (cart[existingProductIndex].quantity <= 0) {
    //             cart.splice(existingProductIndex, 1);
    //         }
    //     }
    //     updateCart();
    //     updateProductQuantityDisplay(productId);
    // }

    // function updateProductQuantityDisplay(productId) {
    //     const quantityElement = document.querySelector(`.quantity[data-id="${productId}"]`);
    //     const existingProduct = cart.find(item => item.id === productId);
    //     quantityElement.textContent = existingProduct ? existingProduct.quantity : 0;
    // }

    // function updateCart() {
    //     cartItemsElement.innerHTML = '';
    //     let total = 0;
    //     cart.forEach((item, index) => {
    //         const row = document.createElement('tr');

    //         const nameCell = document.createElement('td');
    //         nameCell.textContent = item.name;
    //         row.appendChild(nameCell);

    //         const quantityCell = document.createElement('td');
    //         quantityCell.textContent = item.quantity;
    //         row.appendChild(quantityCell);

    //         const priceCell = document.createElement('td');
    //         priceCell.textContent = `$${item.totalPrice.toFixed(2)}`;
    //         row.appendChild(priceCell);

    //         const removeCell = document.createElement('td');
    //         const removeButton = document.createElement('button');
    //         removeButton.textContent = 'Batal';
    //         removeButton.className = 'remove-from-cart';
    //         removeButton.addEventListener('click', () => {
    //             cart.splice(index, 1);
    //             updateCart();
    //             updateProductQuantityDisplay(item.id);
    //         });
    //         removeCell.appendChild(removeButton);
    //         row.appendChild(removeCell);

    //         cartItemsElement.appendChild(row);

    //         total += item.totalPrice;
    //     });
    //     totalPriceElement.textContent = total.toFixed(2);
    // }
});
