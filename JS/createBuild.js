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
    let img = document.querySelector('#build_img').value.trim();
    let name = document.querySelector('#build_name').value.trim();
    var isValid = true;

    // validate name input
    if (name.length == 0) {
        handleErr('#name-err', 'Please enter a name.');
        isValid = false;
    } else if (name.length > 50) {
        handleErr('#name-err', 'Name should be no longer than 50 characters.');
        isValid = false;
    } else {
        clearErr('#name-err');
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


    if (isValid == false) {
        e.preventDefault();
    }

    return isValid;
}

document.querySelector('#build_form').addEventListener('submit', handleSubmit);