function ValidationNom(input, erreur) {
    var caractere = /^[a-zA-Z ]*$/;

    if (caractere.test($(input).val())) {
        $(input).css("border", "1px solid #ced4da");
        $(erreur).hide();
        nom = true;
    } else {
        $(input).css("border", "1px solid #ff726f");
        $(erreur).html("Seuls les lettres et les espaces sont autorisés..");
        $(erreur).show();
        nom = false;
    }
}

function ValidationNomAuth(input, erreur) {
    var caractere = /^[a-zA-Z ]*$/;

    if (caractere.test($(input).val())) {
        $(input).css("border-bottom", "1px solid #ced4da");
        $(erreur).hide();
        nom = true;
    } else {
        $(input).css("border-bottom", "1px solid #ff726f");
        $(erreur).html("Seuls les lettres et les espaces sont autorisés..");
        $(erreur).show();
        nom = false;
    }
}

function ValidationEmail(input, erreur) {
    var caractere = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if (caractere.test($(input).val())) {
        $(input).css("border", "1px solid #ced4da");
        $(erreur).hide();
        email = true;
    } else {
        $(input).css("border", "1px solid #ff726f");
        $(erreur).html("La format d'adresse e-mail invalide..");
        $(erreur).show();
        email = false;
    }
}

function ValidationEmailAuth(input, erreur) {
    var caractere = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if (caractere.test($(input).val())) {
        $(input).css("border-bottom", "1px solid #ced4da");
        $(erreur).hide();
        email = true;
    } else {
        $(input).css("border-bottom", "1px solid #ff726f");
        $(erreur).html("La format d'adresse e-mail invalide..");
        $(erreur).show();
        email = false;
    }
}

function ValidationSujet(input, erreur) {
    var caractere = /^[a-zA-Z 0-9?!.àèéç]*$/;

    if (caractere.test($(input).val())) {
        $(input).css("border", "1px solid #ced4da");
        $(erreur).hide();
        sujet = true;
    } else {
        $(input).css("border", "1px solid #ff726f");
        $(erreur).html("Seuls les lettres et les espaces sont autorisés..");
        $(erreur).show();
        sujet = false;
    }
}

function ValidationMessage(input, erreur) {
    var caractere = /^[a-zA-Z 0-9?!.àèéç]*$/;

    if (caractere.test($(input).val())) {
        $(input).css("border", "1px solid #ced4da");
        $(erreur).hide();
        message = true;
    } else {
        $(input).css("border", "1px solid #ff726f");
        $(erreur).html("Seuls les lettres, les points, et les espaces sont autorisés..");
        $(erreur).show();
        message = false;
    }
}

function EnvoiEmailContact() {
    if (nomComplet == true && emailComplet == true && sujet == true && message == true) {
        $("#form_contact").submit();
    } else {
        event.preventDefault();
    }
}

function ValidationPrenom(input, erreur) {
    var caractere = /^[a-zA-Z ]*$/;

    if (caractere.test($(input).val())) {
        $(input).css("border-bottom", "1px solid #ced4da");
        $(erreur).hide();
        prenom = true;
    } else {
        $(input).css("border-bottom", "1px solid #ff726f");
        $(erreur).html("Seuls les lettres et les espaces sont autorisés..");
        $(erreur).show();
        prenom = false;
    }
}

function ValidationPassword(input, erreur) {
    if (input.val().length == 0) {
        $(input).css("border-bottom", "1px solid #ced4da");
        $(erreur).hide();
        password = true;
    } else {
        if (input.val().length < 8) {
            $(input).css("border-bottom", "1px solid #ff726f");
            $(erreur).html("Le mot de passe fait moins de 8 caractères..");
            $(erreur).show();
            password = false;
        } else if (!input.val().match(/([a-z])/)) {
            $(input).css("border-bottom", "1px solid #ff726f");
            $(erreur).html("Le mot de passe doit contenir au moin un lettre minuscule..");
            $(erreur).show();
            password = false;
        } else if (!input.val().match(/([A-Z])/)) {
            $(input).css("border-bottom", "1px solid #ff726f");
            $(erreur).html("Le mot de passe doit contenir au moin un lettre majuscule..");
            $(erreur).show();
            password = false;
        } else if (!input.val().match(/([0-9])/)) {
            $(input).css("border-bottom", "1px solid #ff726f");
            $(erreur).html("Le mot de passe doit contenir au moin un chiffre..");
            $(erreur).show();
            password = false;
        } else if (!input.val().match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
            $(input).css("border-bottom", "1px solid #ff726f");
            $(erreur).html("Le mot de passe doit contenir au moin un caractére spéciale..");
            $(erreur).show();
            password = false;
        } else {
            $(input).css("border-bottom", "1px solid #ced4da");
            $(erreur).hide();
            password = true;
        }
    }
}

function ValidationNumero(input, erreur) {
    if (input.val().length == 8 || input.val().length == 0) {
        $(input).css("border-bottom", "1px solid #ced4da");
        $(erreur).hide();
        numero = true;
    } else {
        $(input).css("border-bottom", "1px solid #ff726f");
        $(erreur).html("Le numéro doit être composé de 8 chiffres..");
        $(erreur).show();
        numero = false;
    }
}

function ValidationNaissance(input, erreur) {
    var optimizedBirthday = input.val().replace(/-/g, "/");
    var myBirthday = new Date(optimizedBirthday);
    var currentDate = new Date().toJSON().slice(0, 10) + ' 01:00:00';
    var myAge = ~~((Date.now(currentDate) - myBirthday) / (31557600000));

    if (myAge > 18) {
        $(input).css("border-bottom", "1px solid #ced4da");
        $(erreur).hide();
        naissance = true;
    } else {
        $(input).css("border-bottom", "1px solid #ff726f");
        $(erreur).html("Vous devez avoir 18 ans ou plus..");
        $(erreur).show();
        naissance = false;
    }
}

function OuvrirButton() {
    var condition = document.getElementById("f-option2");
    var button = document.getElementById("signup");

    if (condition.checked) {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
}

function Registration() {
    if (nom == true && prenom == true && email == true && password == true && numero == true && naissance == true) {
        $("#form_signup").submit();
    } else {
        event.preventDefault();
    }
}

function Authentification() {
    if (email == true && password == true) {
        $("#form_signin").submit();
    } else {
        event.preventDefault();
    }
}