function afficherReponse(button) {
    const reponse = button.parentElement.nextElementSibling;
    if (reponse.style.display === "block") {
        reponse.style.display = "none";
        button.textContent = "+";
    } else {
        reponse.style.display = "block";
        button.textContent = "-";
    }
}