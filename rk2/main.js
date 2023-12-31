function showProductDetails(productId) {

    window.location.href = `product-details.html?id=${productId}`;
}


const flowers = [
    ["Георгина", 'photo1', "Георги́на, также георги́н, — род многолетних травянистых растений семейства Астровые с клубневидными корнями и крупными цветками яркой окраски. Род включает 42 вида весьма крупных многолетних растений с большими головками цветков, иногда шаровидными.", 50, "в наличии"],
    ["Хризантема", 'photo2', "Хризанте́ма — род однолетних и многолетних травянистых растений семейства Астровые, или Сложноцветные, близкий к родам Тысячелистник и Пижма, куда нередко перемещаются многие виды хризантем. Род включает 42 вида, произрастающих в умеренной и северной зонах земного шара, преимущественно в Азии.", 150, "нет в наличии"],
    ["Камелия", 'photo3', "Каме́лия — вечнозелёное растение семейства Чайные. Наиболее известный вид — Camellia sinensis, из листьев которого получают сырьё для приготовления чая. Многие виды камелии используются в декоративном садоводстве. Камелиями украшала себя Маргарита Готье, героиня романа Александра Дюма-сына «Дама с камелиями».", 100, "нет в наличии"],
    ["Хризантема", 'photo4', "Хризанте́ма — род однолетних и многолетних травянистых растений семейства Астровые, или Сложноцветные, близкий к родам Тысячелистник и Пижма, куда нередко перемещаются многие виды хризантем. Род включает 42 вида, произрастающих в умеренной и северной зонах земного шара, преимущественно в Азии", 200, "нет в наличии"],
    ["Подснежники", 'photo5', "Подсне́жник, или Гала́нтус — род многолетних трав семейства Амариллисовые, ранее относившийся к семейству Лилейные. Включает 19 видов и два гибрида естественного происхождения. На территории бывшего СССР произрастает 12 видов.", 200, "в наличии"],
    ["Сакура", 'photo6', "В Японии вишнёвый цвет символизирует облака (благодаря тому, что множество цветов сакуры часто распускаются разом) и метафорически обозначает эфемерность жизни[8]. Это второе символическое значение часто ассоциируется с влиянием буддизма[9], являясь воплощением эстетического принципа «печального очарования вещей» моно но аварэ[10]. Связь сакуры с моно-но аварэ известна с XVIII века, когда она возникла у Мотоори Норинага[10]. Мимолётность, чрезвычайная красота и скорая смерть цветов часто сравнивается с человеческой смертностью[8]. Благодаря этому цветок сакуры глубоко символичен в японской культуре, его образ часто используется в японском искусстве, аниме, кинематографе и других областях. Существует как минимум одна народная песня, названная «Сакура», а также несколько песен j-pop (в том числе Икимоногакари[en], Мики Накасимы[en], Morning Musume[en]). Изображение цветов сакуры встречаются на всех видах японских потребительских товаров, включая кимоно, канцелярские принадлежности и посуду.", 400, "в наличии"],
    ["Мак", 'photo7', " высокое полевое растение с бледно-зелеными листьями, плотным стеблем и ярким бутоном. В зависимости от сорта диаметр бутона может достигать 20 см. Самые распространенные сорта мака — красные, но встречаются белые, желтые, розовые, фиолетовые и даже темно-фиолетовые, почти черные разновидности", 50, "в наличии"],
    ["Лилия", 'photo8', "Ли́лия — род растений семейства Лилейные. Многолетние травы, снабжённые луковицами, состоящими из мясистых низовых листьев, расположенных черепитчато, белого, розоватого или желтоватого цвета", 50, "в наличии"],
    ["Мак", 'photo9', " высокое полевое растение с бледно-зелеными листьями, плотным стеблем и ярким бутоном. В зависимости от сорта диаметр бутона может достигать 20 см. Самые распространенные сорта мака — красные, но встречаются белые, желтые, розовые, фиолетовые и даже темно-фиолетовые, почти черные разновидности", 50, "в наличии"],
    ["Мак", 'photo10', " высокое полевое растение с бледно-зелеными листьями, плотным стеблем и ярким бутоном. В зависимости от сорта диаметр бутона может достигать 20 см. Самые распространенные сорта мака — красные, но встречаются белые, желтые, розовые, фиолетовые и даже темно-фиолетовые, почти черные разновидности", 50, "в наличии"]
];

function insertFlowerData(index) {
    const flowerData = flowers[index];
    const name = flowerData[0];
    const photo = flowerData[1];
    const description = flowerData[2];
    const price = flowerData[3];
    const availability = flowerData[4];

    const flowerContainer = document.getElementById('flower-info');

    const nameElement = document.createElement('h2');
    nameElement.textContent = name;

    const photoElement = document.createElement('img');
    photoElement.src = `images/${photo}.jpg`;

    const descriptionElement = document.createElement('p');
    descriptionElement.textContent = description;

    const priceElement = document.createElement('p');
    priceElement.textContent = `Цена: ${price} руб.`;

    const availabilityElement = document.createElement('p');
    availabilityElement.textContent = `Наличие: ${availability}`;

    flowerContainer.innerHTML = '';
    flowerContainer.appendChild(nameElement);
    flowerContainer.appendChild(photoElement);
    flowerContainer.appendChild(descriptionElement);
    flowerContainer.appendChild(priceElement);
    flowerContainer.appendChild(availabilityElement);
}

  

function showComplaintLink(event) {
    event.preventDefault(); 
    document.getElementById('complaintLink').style.display = 'block'; 
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form1');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); 
        window.location.href = 'thankyou.html'; 
    });
});

