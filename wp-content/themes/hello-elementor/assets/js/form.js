/**
 * With elementor you have to pay for the form components so I just did all this manually
 */

(function() {
    const submitBtn = document.querySelector('#submit')
    const form = document.querySelector('#register')
    const notificationSection = document.querySelector('#notification')

    // validation plugin to aid user when entering in information into the form
    new Validator(form, function (err, res) {
        console.log(res)
        return res
    });

    // ajax submit logic
    submitBtn.addEventListener('click', (e) => {
        e.preventDefault()
        
        const data = new FormData(form)
        data.append('action', 'form_add_user')
        data.append('nonce', ajax_data.nonce);

        const options = {
            method: "POST",
            credentials: 'same-origin',
            body: data
        }
        
        fetch(ajax_data.ajax_url, options)
        .then(res => res.json())
        .then(res => {
            notificationSection.innerHTML = ''
            console.log(res)
            if (!data.status) {
                const ul = document.createElement('ul')
                
                for (const error of res.data.errors) {
                    const li = document.createElement('li')
                    li.innerText = error
                    ul.append(li)
                }
                notificationSection.append(ul)
                return
            }

            notificationSection.append(`Success: Thank you ${res.data.name}, an email was sent to ${res.data.email} with password and login username`)
        })
        .catch(err => {
            console.error(err)
        })
        
        
    })
    
}())

