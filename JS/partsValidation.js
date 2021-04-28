function handleErr (id, content) {
    document.querySelector(id).innerHTML = content;
    document.querySelector(id).previousElementSibling.classList.add("border", "border-danger");
}

function clearErr (id) {
    document.querySelector(id).innerHTML = '';
    document.querySelector(id).previousElementSibling.classList.remove("border", "border-danger");
    document.querySelector(id).previousElementSibling.classList.add("border", "border-success");
}

function handleSubmit (e) {
    let name = document.querySelector('#name').value.trim();
    let spec = document.querySelector('#spec').value.trim();
    let img = document.querySelector('#img').value.trim();
    let url = document.querySelector('#url').value.trim();
    let price = document.querySelector('#price').value.trim();
    var isValid = true;

    // validate name input
    if (name.length == 0) {
        handleErr('#name-err', 'Please enter a name.');
        isValid = false;
    } else if (name.length >= 100) {
        handleErr('#name-err', 'Name should be no longer than 100 characters.');
        isValid = false;
    } else {
        clearErr('#name-err');
    }

    //validate spec input
    if (spec.length == 0) {
        handleErr('#spec-err', 'Please enter specification.');
        isValid = false;
    } else if (spec.length >= 500) {
        handleErr('#spec-err', 'Specification should be no longer than 500 characters.');   
        isValid = false;  
    } else {
        clearErr('#spec-err');
    }

    // validate img 
    if (img.length == 0) {
        handleErr('#img-err', 'Please upload an image for the part here.');
        isValid = false;
    } else if (!/.jpg$/.test(img) && !/.png$/.test(img) && !/.jpeg$/.test(img)) {
        handleErr('#img-err', 'Sorry, we only support .jpg .png .jpeg format.'); 
        isValid = false;    
    } else {
        clearErr('#img-err');
    }

    // validate url
    if (url.length == 0) {
        handleErr('#url-err', 'Please enter URL.');
        isValid = false;
    } else if (url.length >= 2048) {
        handleErr('#url-err', 'URL too long.');   
        isValid = false;  
    } else {
        clearErr('#url-err');
    }

    //validate price
    if (price.length == 0) {
        handleErr('#price-err', 'Please enter the price.');
        isValid = false;
    } else if (/\.\d{2}$/.test(price) == false) {
        handleErr('#price-err', 'Please make sure you keep 2 digits after the decimal point.');
        isValid = false;
    } else if (price.length >= 12) {
        handleErr('#price-err', 'The price should be no higher than 999999999.99');   
        isValid = false; 
    } else {
        clearErr('#price-err');
    }

    if (isValid == false) {
        e.preventDefault();
    }

    return isValid;
}

document.querySelector('#add_form').addEventListener('submit', handleSubmit);