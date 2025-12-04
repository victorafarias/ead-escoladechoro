jQuery(document).ready(function($) {
    console.log('--- DEBUG: Script JS Iniciado ---');

    const form = $('#tutor-registration-form');
    const emailField = $('input[name="email"]');
    const userLoginField = $('input[name="user_login"]');
    const submitBtn = $('button[name="tutor_register_student_btn"]');

    // Log inicial para verificar se os elementos existem
    console.log('Formulè´°rio encontrado:', form.length);
    console.log('Campo Email encontrado:', emailField.length);
    console.log('Campo User Login encontrado:', userLoginField.length);

    // Monitorar digitaè´Æè´™o no email
    if (emailField.length && userLoginField.length) {
        emailField.on('input blur', function() {
            const emailValue = $(this).val().trim();
            // Copia o valor para o user_login
            userLoginField.val(emailValue);
            console.log('Sincronizando: Email -> User Login:', emailValue);
        });
    }

    // Monitorar o clique no botè´™o
    submitBtn.on('click', function(e) {
        console.log('--- DEBUG: Botè´™o Registrar Clicado ---');
        
        // Verifica o estado dos campos no momento do clique
        console.log('Valor do Email:', emailField.val());
        console.log('Valor do User Login (Hidden/Visible):', userLoginField.val());
        console.log('Valor do Last Name:', $('input[name="last_name"]').val());
        
        // Se user_login estiver vazio, tenta forè´Æar via JS
        if( !userLoginField.val() ) {
            console.warn('AVISO: User Login estava vazio. Forè´Æando cè´—pia do email.');
            userLoginField.val( emailField.val() );
        }
    });

    // Monitorar o envio do formulè´°rio
    form.on('submit', function() {
        console.log('--- DEBUG: Evento SUBMIT disparado ---');
    });
});