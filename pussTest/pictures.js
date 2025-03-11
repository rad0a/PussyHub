const dropZone = document.getElementById('userLogoDrop');
const preview = document.getElementById('userLogo');

const dropZone2 = document.getElementById('addImage');
const preview2 = document.getElementById('preview2');
const sub = document.getElementById('sub');
const sub2 = document.getElementById('sub2');


// Zatrzymanie domyślnych zdarzeń przeglądarki
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, e => e.preventDefault());
    dropZone.addEventListener(eventName, e => e.stopPropagation());
    dropZone2.addEventListener(eventName, e => e.preventDefault());
    dropZone2.addEventListener(eventName, e => e.stopPropagation());
    
});

// Obsługa upuszczenia pliku
dropZone.addEventListener('drop', e => {
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = () => {
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        alert('Proszę przeciągnąć plik graficzny.');
    }
});

dropZone2.addEventListener('drop', e => {
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = () => {
            preview2.src = reader.result;
            preview2.style.display = 'block';
        };

        reader.readAsDataURL(file);

        

        sub.setAttribute('href', file.name);
        preview2.setAttribute('value', file.name);
        sub2.setAttribute('value', file.name);


        
        sub.click();
    } else {
        alert('Proszę przeciągnąć plik graficzny.');
    }
});

function logout() {
    location='index.php';
}

function toggleNewPost() {
    let div = document.getElementById("newPost");
    div.style.display = div.style.display === "none" ? "block" : "none";
}