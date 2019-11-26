window.onload = function () {
    // let checkboxes = document.querySelectorAll("#checkboxForm input[type = 'checkbox']");
    let checkboxes = document.forms.myForm.elements.option;

    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            console.log(checkboxes[i].value);
        }
    }
};