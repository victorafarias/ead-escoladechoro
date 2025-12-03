jQuery(document).ready(function($) {
    console.log('Script carregado');

    const emailField = $('input[name="email"]');
    const userLoginField = $('input[name="user_login"]');

    console.log('Campo de email:', emailField.length);
    console.log('Campo de user_login:', userLoginField.length);

    if (emailField.length && userLoginField.length) {
        emailField.on('input blur', function() {
            const emailValue = $(this).val().trim();
            console.log('Email atualizado:', emailValue);
            userLoginField.val(emailValue);
            console.log('User login atualizado para:', userLoginField.val());
        });
    } else {
        console.error("Campos de email ou user_login não encontrados no DOM.");
    }
});