import '../bootstrap.js';
import '../styles/app.css';
import '../vendor/bootstrap/dist/css/bootstrap.min.css'

document
    .querySelectorAll('.add_competence_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });

document
    .querySelectorAll('.add_formation_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });

document
    .querySelectorAll('.add_experience_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });

document
    .querySelectorAll('.add_centresInterets_link')
    .forEach(btn => {
        btn.addEventListener("click", addFormToCollection)
    });

function addFormToCollection(e) {
    const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);

    const item = document.createElement('li');

    const delete_item = document.createElement('button');
    delete_item.innerHTML = `<i class="fa-solid fa-trash"></i>`;
    delete_item.type = 'Button';
    delete_item.className = "remove_item_button"


    item.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        );

    delete_item.addEventListener('click', () => {
        item.remove();
    });

    item.appendChild(delete_item);
    collectionHolder.appendChild(item);

    collectionHolder.dataset.index++;

};



document.querySelectorAll('.remove_item_button').forEach(button => {
    button.addEventListener('click', function (event) {
        const item = event.target.closest('li');
        if (!item) {
            console.error("Aucun élément 'li' trouvé.");
            return;
        }

        const formRow = item.querySelector('input, textarea, select');
        if (formRow) {
            const deleteField = document.createElement('input');
            deleteField.type = 'hidden';
            deleteField.name = formRow.name.replace(/\[[^\]]+\]$/, '[_delete]');
            deleteField.value = '1';

            const form = item.closest('form');
            if (form) {
                form.appendChild(deleteField);
            }
        }

        item.remove();
    });
});