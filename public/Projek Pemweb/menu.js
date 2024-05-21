function openMenu() {
    document.getElementById("menu").style.width = "400px";
}

function closeMenu() {
    document.getElementById("menu").style.width = "0";
}

function updatePriceRange() {
    var minPrice = document.getElementById("min-price").value;
    var maxPrice = document.getElementById("max-price").value;

    // Ensure minPrice is always less than maxPrice
    if (parseInt(minPrice) > parseInt(maxPrice)) {
        [minPrice, maxPrice] = [maxPrice, minPrice];
        document.getElementById("min-price").value = minPrice;
        document.getElementById("max-price").value = maxPrice;
    }

    document.getElementById("min-price-display").textContent = formatCurrency(minPrice);
    document.getElementById("max-price-display").textContent = formatCurrency(maxPrice);
}

function applyPriceFilter() {
    var minPrice = document.getElementById("min-price").value;
    var maxPrice = document.getElementById("max-price").value;

    alert("Filter Harga Diterapkan: \nMinimum: " + formatCurrency(minPrice) + "\nMaksimum: " + formatCurrency(maxPrice));
    // Implement logic here to filter products based on price range
    // For example, send a request to the server to get filtered products
}

function formatCurrency(value) {
    return parseInt(value).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
}
