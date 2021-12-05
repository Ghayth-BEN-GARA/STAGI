function ValidationNom(input, erreur) {
    var caractere = /^[a-zA-Z ]*$/;

    if (caractere.test($(input).val())) {
        $(input).css("border", "1px solid #ced4da");
        $(erreur).hide();
        nomComplet = true;
    } else {
        $(input).css("border", "1px solid #ff726f");
        $(erreur).html("Seuls les lettres et les espaces sont autorisés..");
        $(erreur).show();
        nomComplet = false;
    }
}

function ValidationEmail(input, erreur) {
    var caractere = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if (caractere.test($(input).val())) {
        $(input).css("border", "1px solid #ced4da");
        $(erreur).hide();
        emailComplet = true;
    } else {
        $(input).css("border", "1px solid #ff726f");
        $(erreur).html("La format d'adresse e-mail invalide..");
        $(erreur).show();
        emailComplet = false;
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