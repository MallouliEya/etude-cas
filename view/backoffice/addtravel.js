document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("offerForm");

    // Fonction de validation en temps réel (onKeyup)
    function validateField(field, validationFn, errorMsg) {
        const value = field.value.trim();
        const errorElement = document.getElementById(field.id + "Error");

        if (validationFn(value)) {
            errorElement.textContent = "Correct";
            errorElement.className = "success-message";
        } else {
            errorElement.textContent = errorMsg;
            errorElement.className = "error-message";
        }
    }

    // Règles de validation
    document.getElementById("title").addEventListener("keyup", function () {
        validateField(this, val => val.length >= 3, "The title must contain at least 3 characters.");
    });

    document.getElementById("destination").addEventListener("keyup", function () {
        validateField(this, val => /^[a-zA-Z\s]{3,}$/.test(val), "The destination must contain only letters and at least 3 characters.");
    });

    document.getElementById("price").addEventListener("keyup", function () {
        validateField(this, val => val > 0, "The price must be a positive number.");
    });

    // Validation au submit
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Empêcher l'envoi si erreurs

        let isValid = true;

        function checkField(field, validationFn, errorMsg) {
            const value = field.value.trim();
            const errorElement = document.getElementById(field.id + "Error");

            if (!validationFn(value)) {
                errorElement.textContent = errorMsg;
                errorElement.className = "error-message";
                isValid = false;
            } else {
                errorElement.textContent = "";
            }
        }

        checkField(document.getElementById("title"), val => val.length >= 3, "The title must contain at least 3 characters.");
        checkField(document.getElementById("destination"), val => /^[a-zA-Z\s]{3,}$/.test(val), "The destination must contain only letters and at least 3 characters.");
        checkField(document.getElementById("price"), val => val > 0, "The price must be a positive number.");

        const departureDate = document.getElementById("departureDate");
        const returnDate = document.getElementById("returnDate");

        checkField(departureDate, val => val !== "", "Please select a valid departure date.");
        checkField(returnDate, val => val !== "" && val > departureDate.value, "Return date must be after departure date.");

        // Si tout est valide, on peut envoyer le formulaire
        if (isValid) {
            alert("Offer submitted successfully!");
            form.reset();
        }
    });
});