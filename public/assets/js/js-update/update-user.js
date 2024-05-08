document.addEventListener('DOMContentLoaded', function () {
    const updateButtons = document.querySelectorAll('.edit-record');
    updateButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const userId = this.getAttribute('data-id');
            const form = document.getElementById('updateForm');
            const actionUrl = form.getAttribute('action').replace(':id', userId);
            form.setAttribute('action', actionUrl);

            form.reset();

            fetch(`/user-backend/${userId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    form.querySelector('input[name="user_id"]').value = data.user_id;
                    form.querySelector('input[name="username"]').value = data.username;
                    form.querySelector('input[name="email"]').value = data.email;
                    form.querySelector('input[name="password"]').value = data.password;
                    form.querySelector('select[name="hak_akses"]').value = data.hak_akses;
                })
                .catch(error => console.error('Error fetching department:', error));
        }); 
    });
});
