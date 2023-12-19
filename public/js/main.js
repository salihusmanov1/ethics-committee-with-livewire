



document.addEventListener("DOMContentLoaded", function () {
    const inputContainer = document.getElementById("inputContainer8");
    const otherRadio = document.getElementById("if_used_yes");
    const radioButtons = document.querySelectorAll('input[name="flexRadioDefault4"]');

    radioButtons.forEach(function (radio) {
        radio.addEventListener("change", function () {
            if (!otherRadio.checked) {
                inputContainer.innerHTML = "";
            }
            else {
                const newInput = document.createElement("input");
                newInput.setAttribute("type", "text");
                newInput.setAttribute("name", "if_approved_specify");
                newInput.classList.add("form-control");
                inputContainer.appendChild(newInput);
            }
        });
    });
});
