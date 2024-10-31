jQuery(document).ready(function($) {

    let form = $('#post-wizard-form');

    async function getOpenAIAnswer(prompt) {

        let apiData = await $.ajax({
            type: 'POST',
            url: 'https://api.openai.com/v1/chat/completions', 
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + apiKey,
            },
            data: JSON.stringify({
                'messages': [{ 'role': 'user', 'content': prompt }],
                'model': 'gpt-3.5-turbo-1106',
                'max_tokens': 3950,
                'temperature': 0.7,
            }),
            success: function(response) {
                // Add the response to the chat window
                //console.log('response', response);
            },
            error: function(error) {
                //console.log(error);
                $('.loading-container').hide();
                $('.pw-error-message').fadeIn();
            }
        });

        const music = new Audio(pluginUrl + 'sound/finish.mp3');
        music.play();

        $('#api-answer').val(apiData.choices[0].message.content); 
        $('.loading-container').hide();
        $('#create-post').fadeIn();
        $('.image-upload').fadeIn();
    }

    async function generateImageWithDalle(prompt) {    
        // Zeige das Ladeelement an
        let loadingMessage = document.getElementById('postwizard-loading-message');
        if (loadingMessage) {
            loadingMessage.style.display = 'block';
        }

        let imageData = await fetch('https://api.openai.com/v1/images/generations', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + apiKey,
            },
            body: JSON.stringify({
                'prompt': prompt,
                'model': 'dall-e-3',
                'n': 1, 
                'size': '1792x1024',
            })
        });
    
        let imageResponse = await imageData.json();

        console.log('imageData:', imageData);
    
        if (imageResponse.data) {
            let imageUrl = imageResponse.data[0].url;
            uploadImageToWordpress(imageUrl)
    
            let imageContainer = document.getElementById('postwizard-image');
            if (imageContainer) {
                imageContainer.src = imageUrl;
            } else {
                console.error('Image container not found');
            }
    
            // if (loadingMessage) {
            //     loadingMessage.style.display = 'none';
            // }
        } else {
            console.error('Fehler beim Bildgenerieren');

            if (loadingMessage) {
                loadingMessage.style.display = 'none';
            }
        }
    }

    function uploadImageToWordpress(imageUrl) {
        $.ajax({
            url: '/wp-admin/admin-ajax.php', 
            type: 'POST',
            data: {
                'action': 'upload_image_to_wordpress',
                'image_url': imageUrl
            },
            success: function(response) {
                console.log('Bild erfolgreich hochgeladen', response);
                $('#postwizard-image-id').val(response); 
                $('#postwizard-loading-message').fadeOut();
                $('#create-post-submit').fadeIn();
            },
            error: function(error) {
                console.log('Fehler beim Hochladen des Bildes', error);
            }
        });
    }

    form.on('submit', function(e) {
        e.preventDefault();

        // Show loading
        $('.loading-container').fadeIn();

        // hide the first form
        $('#post-wizard-form').hide();

        // Fill the second form
        $('#final-title').val($('#post-title').val());

        let title = $('#post-title').val();
        let categories = $('#post-categories').val();

        let prompt = 'Schreibe mir einen Text über das Thema: "' + title + '". Der Text soll ungefähr 3600 Zeichen lang sein. Zusätzlich sollen diese Schlagwörter darin vorkommen: "' + categories + '". Zeige mir nicht, wie viele Zeichen verwendet wurden. Setze bitte auch html Absätze ein.';

        getOpenAIAnswer(JSON.stringify(prompt));

        generateImageWithDalle(title);

    });
});