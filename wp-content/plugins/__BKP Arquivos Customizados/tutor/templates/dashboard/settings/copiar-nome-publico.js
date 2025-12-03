jQuery(document).ready(function ($) {
    console.log('Script carregado.');

    // Seleciona os campos no formulário
    const nameField = $('#user_name'); // Nome
    const displaynameField = $('#display_name'); // Nome de Exibição

    console.log('Campo de Nome encontrado:', nameField.length);
    console.log('Campo de Nome de Exibição encontrado:', displaynameField.length);

    if (nameField.length && displaynameField.length) {
        // Sincroniza o valor de Nome com Nome de Exibição
        nameField.on('input', function () {
            const nameValue = $(this).val().trim();
            displaynameField.val(nameValue);
            console.log('Nome de Exibição atualizado para:', nameValue);
        });
    } else {
        console.error('Campos de Nome ou Nome de Exibição não encontrados no DOM.');
    }
});