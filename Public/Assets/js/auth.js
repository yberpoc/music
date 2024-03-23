document.addEventListener('DOMContentLoaded', () => {

    const authForm = document.getElementById('auth-form')

    authForm.addEventListener('submit', (e) => {
        e.preventDefault()

        let formData = new FormData(authForm);

        fetch('/api/personal/', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(result => {

                if (result.success) {
                    window.location.href = '/personal/'
                    //location.reload()
                } else {
                    alert(result.message)
                }

            });
    })

})