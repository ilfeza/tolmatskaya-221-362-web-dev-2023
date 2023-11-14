//кнопка с указанным номером страницы и классами
function createPageBtn(page, classes=[]) {
    let btn = document.createElement('button');
    classes.push('btn');
    for (cls of classes) {
        btn.classList.add(cls);
    }
    btn.dataset.page = page;
    btn.innerHTML = page;
    return btn;
}

//Генерирует элементы пагинации на основе информации о текущей странице и общем количестве страниц
function renderPaginationElement(info) {
    let btn;
    let paginationContainer = document.querySelector('.pagination');
    paginationContainer.innerHTML = '';

    btn = createPageBtn(1, ['first-page-btn']);
    btn.innerHTML = 'Первая страница';
    if (info.current_page == 1) {
        btn.style.visibility = 'hidden';
    }
    paginationContainer.append(btn);

    let buttonsContainer = document.createElement('div');
    buttonsContainer.classList.add('pages-btns');
    paginationContainer.append(buttonsContainer);

    let start = Math.max(info.current_page - 2, 1);
    let end = Math.min(info.current_page + 2, info.total_pages);
    for (let i = start; i <= end; i++) {
        buttonsContainer.append(createPageBtn(i, i == info.current_page ? ['active'] : []));
    }

    btn = createPageBtn(info.total_pages, ['last-page-btn']);
    btn.innerHTML = 'Последняя страница';
    if (info.current_page == info.total_pages) {
        btn.style.visibility = 'hidden';
    }
    paginationContainer.append(btn);
}

//Обработчик события изменения количества записей на странице
function perPageBtnHandler(event) {
    downloadData(1);
}

//Устанавливает информацию о пагинации (общее количество записей, интервал записей на текущей странице)
function setPaginationInfo(info) {
    document.querySelector('.total-count').innerHTML = info.total_count;
    let start = info.total_count > 0 ? (info.current_page - 1)*info.per_page + 1 : 0;
    document.querySelector('.current-interval-start').innerHTML = start;
    let end = Math.min(info.total_count, start + info.per_page - 1)
    document.querySelector('.current-interval-end').innerHTML = end;
}

//Обработчик события нажатия кнопки страницы
function pageBtnHandler(event) {
    if (event.target.dataset.page) {
        downloadData(event.target.dataset.page);
        window.scrollTo(0, 0);
    }
}

//Создают DOM-элементы для отображения содержимого записи о факте о кошках.
function createAuthorElement(record) {
    let user = record.user || {'name': {'first': '', 'last': ''}};
    let authorElement = document.createElement('div');
    authorElement.classList.add('author-name');
    authorElement.innerHTML = user.name.first + ' ' + user.name.last;
    return authorElement;
}

function createUpvotesElement(record) {
    let upvotesElement = document.createElement('div');
    upvotesElement.classList.add('upvotes');
    upvotesElement.innerHTML = record.upvotes;
    return upvotesElement;
}

function createFooterElement(record) {
    let footerElement = document.createElement('div');
    footerElement.classList.add('item-footer');
    footerElement.append(createAuthorElement(record));
    footerElement.append(createUpvotesElement(record));
    return footerElement;
}

function createContentElement(record) {
    let contentElement = document.createElement('div');
    contentElement.classList.add('item-content');
    contentElement.innerHTML = record.text;
    return contentElement;
}

function createListItemElement(record) {
    let itemElement = document.createElement('div');
    itemElement.classList.add('facts-list-item');
    itemElement.append(createContentElement(record));
    itemElement.append(createFooterElement(record));
    return itemElement;
}

//Генерирует и отображает на странице список фактов о кошках
function renderRecords(records) {
    let factsList = document.querySelector('.facts-list');
    factsList.innerHTML = '';
    for (let i = 0; i < records.length; i++) {
        factsList.append(createListItemElement(records[i]));
    }
}

//Загружает данные о фактах о кошках с сервера с использованием XMLHttpRequest. 
//Отображает загруженные записи на странице, устанавливает информацию о пагинации и отрисовывает элементы пагинации.
function downloadData(page = 1, query = '') {
    let factsList = document.querySelector('.facts-list');
    let url = new URL(factsList.dataset.url);
    let perPage = document.querySelector('.per-page-btn').value;
    url.searchParams.append('page', page);
    url.searchParams.append('per-page', perPage);

    //Задание 1
    url.searchParams.append('q', query); // Добавление параметра q

    let xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.responseType = 'json';
    xhr.onload = function () {
        renderRecords(this.response.records);
        setPaginationInfo(this.response['_pagination']);
        renderPaginationElement(this.response['_pagination']);
        
    }
    xhr.send();
}



//задание 1. обработчик события для ввода поиска
document.querySelector('.search-field').addEventListener('input', function(event) {
    let query = event.target.value.trim();
    downloadData(1, query);
});


//Вызывает функцию downloadData при загрузке страницы.
//Устанавливает обработчики событий для кнопок пагинации и изменения количества записей на странице.
window.onload = function () {
    downloadData();
    document.querySelector('.pagination').onclick = pageBtnHandler;
    document.querySelector('.per-page-btn').onchange = perPageBtnHandler;

    //задание 2
    document.querySelector('.search-field').oninput = autocompleteRequest;
}

//Задание 2: Функция для очистки выпадающего списка
function clearAutocomplete() {
    let autocompleteDropdown = document.querySelector('.autocomplete-dropdown');
    autocompleteDropdown.innerHTML = '';
    autocompleteDropdown.style.display = 'none';
}

//Задание 2: Функция для отображения результатов в выпадающем списке
function displayAutocomplete(results) {
    let autocompleteDropdown = document.querySelector('.autocomplete-dropdown');

    for (let i = 0; i < results.length; i++) {
        let option = document.createElement('div');
        option.classList.add('autocomplete-option');
        option.textContent = results[i];
        option.addEventListener('click', function () {
            // При клике подставляем выбранный вариант в поле поиска
            document.querySelector('.search-field').value = results[i];
            clearAutocomplete();
            downloadData(1, results[i]);
        });
        autocompleteDropdown.appendChild(option);
    }

    autocompleteDropdown.style.display = 'block';
}


// Задание 2: Функция для обработки запроса автодополнения
function autocompleteRequest() {
    let searchField = document.querySelector('.search-field').value;

    let autocompleteUrl = 'http://cat-facts-api.std-900.ist.mospolytech.ru/autocomplete?q=' + searchField;

    let xhr = new XMLHttpRequest();
    xhr.open('GET', autocompleteUrl);
    
    xhr.responseType = 'json';

    xhr.onload = function () {
        if (this.response) {
            // Очищаем предыдущие результаты
            clearAutocomplete();

            // Отображаем результаты в выпадающем списке
            displayAutocomplete(this.response);
        }
    };
    xhr.send();
}