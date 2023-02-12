'use strict';
{

    const deletes = document.querySelectorAll('.delete');
    const boxx = document.querySelector('.boxx');
    deletes.forEach(span => {
        span.addEventListener('click', () => {
            if (!confirm('Are you sure?')) {
                return;
            }

            fetch('?action=delete', {
                method: 'POST',
                body: new URLSearchParams({
                    id: span.dataset.id,
                }),
            });
            // 投稿を消す
            boxx.remove();

        });
    });





}