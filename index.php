<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HaptiReader</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Century, serif;
            text-align: center;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #fff8dc;
        }

        header {
            background-color: #facc15;
            color: #5b3400;
            font-style: italic;
            padding: 12px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        main {
            flex: 1;
            padding: 10px;
        }

        nav {
            background-color: #f59e0b;
            width: 100%;
            padding: 12px 8px;
            margin-bottom: 12px;
        }

        button {
            background-color: #f59e0b;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ea580c;
        }

        .content {
            display: none;
            width: 100%;
            min-height: 250px;
            background-color: white;
            padding: 20px;
            margin: 0 auto 12px auto;
            border-radius: 12px;
        }

        input[type="range"] {
            width: 80%;
        }

        footer {
            background-color: #facc15;
            color: #5b3400;
            font-style: italic;
            padding: 10px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        a {
            color: #5b3400;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        ol {
            text-align: left;
            max-width: 900px;
            margin: 0 auto;
        }

        p,
        h2,
        h5,
        label {
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        input {
            margin: 5px;
            padding: 6px;
        }
    </style>
</head>

<body>
    <header>
        <h1>HaptiReader</h1>
    </header>

    <main>
        <nav>
            <button type="button" onclick="showSection('Koncepcja')">Koncepcja</button>
            <button type="button" onclick="showSection('Motywacja')">Motywacja</button>
            <button type="button" onclick="showSection('Badania')">Badania</button>
            <button type="button" onclick="showSection('Wnioski')">Wnioski</button>
            <button type="button" onclick="showSection('Kodowanie')">Kodowanie</button>
            <button type="button" onclick="showSection('SourceCode')">Source Code</button>
            <button type="button" onclick="showSection('Demo')">Demo</button>
            <button type="button" onclick="showSection('Trening')">Trening</button>
            <button type="button" onclick="showSection('Przyszłość')">Przyszłość</button>
        </nav>
        <section id="Koncepcja" class="content">
            <h2>Koncepcja</h2>
            <div class="info-card concept-card">
                <p>
                    Projekt dostarcza mobilne urządzenie zakładane na przedramię (optymalny próg rozdzielczości
                    dwupunktowej
                    (~25mm) przy dużej powierzchni), który konwertuje tekst na wielopunktowe sekwencje wibracji,
                    umożliwiając
                    bezwzrokowe czytanie książek osobom niesłyszącym np. podczas spaceru czy jazdy rowerem.
                </p>

                <p>
                    <strong>KODOWANIE:</strong> Zamiast szeregowego Morse'a (dodatkowo ograniczonego przez sensoryczny
                    temporal
                    masking), stosowane jest kodowanie przestrzenne wykorzystujące równoległe kanały haptyczne na
                    przedramieniu.
                    Algorytm optymalizuje transmisję poprzez mapowanie częstych wzorców językowych na skompresowane
                    sekwencje
                    wibracji, co znacząco zwiększa przepustowość transmisji.
                </p>

                <p>
                    <strong>HARDWARE:</strong> Kompaktowa opaska integruje precyzyjne silniki LRA sterowane przez
                    Raspberry Pi
                    Zero WH i zasilane akumulatorem litowo-jonowym. Wyświetlacz e-ink zapewnia energooszczędny interfejs
                    graficzny (wybór pliku, sterowanie odtwarzaniem).
                </p>

                <p>
                    <strong>TRENING:</strong> Interaktywny trening w aplikacji internetowej umożliwia aktywną naukę
                    bez żadnego urządzenia. Jest to modyfikacja względem poprzedniej koncepcji, która zakładała moduł
                    treningowy jako część oprogramowania opaski.
                </p>

                <p>
                    Projekt tworzy dostępny cenowo prototyp (~500zł) wypełniający lukę między laboratoriami badawczymi a
                    codzienną użytecznością, jednocześnie stanowiąc studium neuroplastyczności oraz użyteczności dotyku
                    w
                    charakterze kanału informacyjnego.
                </p>

                <img src="assets/images/haptireader.png" alt="Opaska sensoryczna" width="900" height="520">
            </div>
        </section>

        <style>
            #Koncepcja {
                padding: 18px 12px 30px 12px;
            }

            #Koncepcja h2 {
                margin-bottom: 18px;
                color: #5b3400;
            }

            .concept-card img {
                width: 100%;
                max-width: 900px;
                height: auto;
                display: block;
                margin: 22px auto 0 auto;
                border: 2px dashed #f59e0b;
                border-radius: 14px;
                background: #fff8eb;
            }
        </style>
        <section id="Motywacja" class="content">
            <h2>Motywacja</h2>
            <div class="info-card">
                <p>
                    Osoby niesłyszące są pozbawione dostępu do audiobooków — najpowszechniejszej
                    formy „czytania” podczas wykonywania codziennych czynności. Postanowiłem więc
                    stworzyć ich haptyczny odpowiednik, umożliwiający bezwzrokowy odbiór treści.
                    Z czasem dostrzegłem jednak, że technologia ta może znaleźć znacznie szersze
                    zastosowanie i okazać się użyteczna właściwie dla każdego, np. podczas jazdy
                    na rowerze lub pracy w hałaśliwym środowisku.
                </p>
                <div class="section-dots" aria-hidden="true">
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                </div>
            </div>
        </section>

        <section id="Badania" class="content">
            <h2>Badania</h2>
            <div class="info-card">
                <ol class="info-list">
                    <li>Zebranie próbki języka: analiza ponad 20 książek w języku polskim, z domeny publicznej.
                        Opracowanie bazy danych najczęstszych wzorców językowych — liter, sylab i słów.</li>
                    <li>Zaprojektowanie schematu przestrzennego kodowania haptycznego: alfabet Braille'a jako baza
                        (kompatybilność), rozszerzona o sekwencje dla częstych sylab i słów (wyższa przepustowość).</li>
                    <li>Stworzenie algorytmu konwertującego tekst (PDF/EPUB) na przestrzenne wzorce wibracji.</li>
                    <li>Opracowanie webowej aplikacji treningowej opartej na wizualizacji kodów.</li>
                    <li>Nauka schematu kodowania, pomiar prędkości i skuteczności rozpoznawania, iteracyjna
                        optymalizacja.</li>
                    <li>Rozpoczęcie budowy prototypu urządzenia.</li>
                </ol>

                <div class="section-dots" aria-hidden="true">
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                </div>
            </div>
        </section>

        <section id="Wnioski" class="content">
            <h2>Wnioski</h2>
            <div class="info-card">
                <p>
                    Badania wykazały, że schemat kodowania haptycznego był możliwy do nauczenia,
                    a zastosowanie kodowania przestrzennego i kompresji częstych wzorców językowych
                    zwiększyło przepustowość transmisji względem prostych metod sekwencyjnych.
                    Testy potwierdziły, że przedramię mogło pełnić funkcję kanału odbioru informacji
                    tekstowej, a system miał potencjał jako haptyczny substytut audiobooków.
                    Jednocześnie dalszej optymalizacji wymagały ergonomia urządzenia, tempo transmisji
                    i czas nauki użytkownika.
                </p>

                <div class="section-dots" aria-hidden="true">
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                    <div class="section-dot"></div>
                </div>
            </div>
        </section>

        <style>
            #OMnie,
            #Motywacja,
            #Badania,
            #Wnioski {
                padding: 18px 12px 30px 12px;
            }

            #OMnie h2,
            #Motywacja h2,
            #Badania h2,
            #Wnioski h2 {
                margin-bottom: 18px;
                color: #5b3400;
            }

            .info-card {
                max-width: 1050px;
                margin: 0 auto;
                background: #fffdf7;
                border: 1px solid #e5e5e5;
                border-radius: 18px;
                padding: 24px;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            }

            .info-card p,
            .info-card li {
                text-align: left;
                line-height: 1.75;
                font-size: 17px;
                color: #3f3f46;
            }

            .info-card p {
                margin-bottom: 16px;
            }

            .info-list {
                max-width: 100%;
                padding-left: 22px;
                margin: 0;
            }

            .info-list li {
                margin-bottom: 14px;
            }

            .section-dots {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 18px;
                margin: 34px auto 4px auto;
                flex-wrap: wrap;
            }

            .section-dot {
                width: 34px;
                height: 34px;
                border-radius: 50%;
                background: white;
                border: 2px solid #b8b8b8;
                transition: background-color 0.35s ease, transform 0.35s ease, border-color 0.35s ease;
            }

            .section-dot.active {
                background: #facc15;
                border-color: #eab308;
                transform: scale(1.08);
            }

            @media (max-width: 700px) {
                .info-card {
                    padding: 18px;
                }

                .info-card p,
                .info-card li {
                    font-size: 15px;
                }

                .section-dot {
                    width: 28px;
                    height: 28px;
                }
            }
        </style>

        <script>
            (function () {
                const groups = document.querySelectorAll('.section-dots');

                groups.forEach(group => {
                    const dots = group.querySelectorAll('.section-dot');

                    function animateGroup() {
                        dots.forEach(dot => {
                            dot.classList.toggle('active', Math.random() > 0.5);
                        });
                    }

                    animateGroup();
                    setInterval(animateGroup, 1500);
                });
            })();
        </script>

        <section id="Kodowanie" class="content">
            <h2>Kodowanie</h2>

            <div id="trainingGrid"></div>

            <style>
                #trainingGrid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                    gap: 20px;
                    max-width: 1200px;
                    margin: 30px auto;
                }

                .training-card {
                    background: #fffdf7;
                    border: 1px solid #e5e5e5;
                    border-radius: 16px;
                    padding: 20px 15px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
                }

                .training-symbol {
                    font-size: 36px;
                    font-weight: bold;
                    color: #7c2d12;
                    margin-bottom: 18px;
                }

                .training-id {
                    font-size: 14px;
                    color: #666;
                    margin-bottom: 10px;
                }

                .training-braille {
                    display: grid;
                    grid-template-columns: repeat(2, 22px);
                    grid-template-rows: repeat(3, 22px);
                    gap: 10px;
                    justify-content: center;
                    margin: 0 auto;
                    width: max-content;
                }

                .training-dot {
                    width: 22px;
                    height: 22px;
                    border-radius: 50%;
                    border: 2px solid #999;
                    background: white;
                }

                .training-dot.active {
                    background: #facc15;
                    border-color: #eab308;
                }
            </style>

            <script>
                const trainingMap = [
                    { token: "a", id: 1, bin: "100000" },
                    { token: "ą", id: 2, bin: "100001" },
                    { token: "b", id: 3, bin: "110000" },
                    { token: "c", id: 4, bin: "100100" },
                    { token: "ć", id: 5, bin: "000001" },
                    { token: "d", id: 6, bin: "100110" },
                    { token: "e", id: 7, bin: "100010" },
                    { token: "ę", id: 8, bin: "100011" },
                    { token: "f", id: 9, bin: "110100" },
                    { token: "g", id: 10, bin: "110110" },
                    { token: "h", id: 11, bin: "110010" },
                    { token: "i", id: 12, bin: "010100" },
                    { token: "j", id: 13, bin: "010110" },
                    { token: "k", id: 14, bin: "101000" },
                    { token: "l", id: 15, bin: "111000" },
                    { token: "ł", id: 16, bin: "110001" },
                    { token: "m", id: 17, bin: "101100" },
                    { token: "n", id: 18, bin: "101110" },
                    { token: "ń", id: 19, bin: "100111" },
                    { token: "o", id: 20, bin: "101010" },
                    { token: "ó", id: 21, bin: "011001" },
                    { token: "p", id: 22, bin: "111100" },
                    { token: "q", id: 23, bin: "111110" },
                    { token: "r", id: 24, bin: "111010" },
                    { token: "s", id: 25, bin: "011100" },
                    { token: "ś", id: 26, bin: "001101" },
                    { token: "t", id: 27, bin: "011110" },
                    { token: "u", id: 28, bin: "101001" },
                    { token: "v", id: 29, bin: "111001" },
                    { token: "w", id: 30, bin: "010111" },
                    { token: "x", id: 31, bin: "101101" },
                    { token: "y", id: 32, bin: "101111" },
                    { token: "z", id: 33, bin: "101011" },
                    { token: "ź", id: 34, bin: "001011" },
                    { token: "ż", id: 35, bin: "011111" },
                    { token: "ni", id: 36, bin: "001110" },
                    { token: "si", id: 37, bin: "011101" },
                    { token: "ał", id: 38, bin: "100101" },
                    { token: "na", id: 39, bin: "111111" },
                    { token: "em", id: 40, bin: "000010" },
                    { token: "ki", id: 41, bin: "001000" },
                    { token: "ci", id: 42, bin: "000100" },
                    { token: "zi", id: 43, bin: "111011" },
                    { token: "wi", id: 44, bin: "110111" },
                    { token: "ej", id: 45, bin: "110011" },
                    { token: "że", id: 46, bin: "011011" },
                    { token: "od", id: 47, bin: "001010" },
                    { token: "ow", id: 48, bin: "011010" },
                    { token: "pan", id: 49, bin: "111101" },
                    { token: "al", id: 50, bin: "010000" },
                    { token: "to", id: 51, bin: "011000" },
                    { token: "mi", id: 52, bin: "001100" },
                    { token: "jak", id: 53, bin: "010010" },
                    { token: "an", id: 54, bin: "110101" },
                    { token: "do", id: 55, bin: "000110" },
                    { token: "ze", id: 56, bin: "001111" },
                    { token: "on", id: 57, bin: "001001" },
                    { token: "eg", id: 58, bin: "000011" },
                    { token: "er", id: 59, bin: "010011" },
                    { token: "zy", id: 60, bin: "000111" },
                    { token: "ił", id: 61, bin: "010101" },
                    { token: "en", id: 62, bin: "010001" },
                    { token: "za", id: 63, bin: "000101" }
                ];

                function createTrainingCard(item) {
                    const card = document.createElement('div');
                    card.className = 'training-card';

                    const symbol = document.createElement('div');
                    symbol.className = 'training-symbol';
                    symbol.textContent = item.token;

                    const id = document.createElement('div');
                    id.className = 'training-id';
                    id.textContent = 'ID: ' + item.id;

                    const braille = document.createElement('div');
                    braille.className = 'training-braille';

                    const order = [0, 3, 1, 4, 2, 5];

                    order.forEach(index => {
                        const dot = document.createElement('div');
                        dot.className = 'training-dot';
                        if (item.bin[index] === '1') {
                            dot.classList.add('active');
                        }
                        braille.appendChild(dot);
                    });

                    card.appendChild(symbol);
                    card.appendChild(id);
                    card.appendChild(braille);

                    return card;
                }

                function renderTrainingGrid() {
                    const grid = document.getElementById('trainingGrid');
                    grid.innerHTML = '';

                    trainingMap.forEach(item => {
                        grid.appendChild(createTrainingCard(item));
                    });
                }

                renderTrainingGrid();
            </script>
        </section>

        <section id="SourceCode" class="content">
            <h2>Source code</h2>

            <div class="source-grid">
                <article class="source-card">
                    <h3>1. Analiza częstotliwości sylab</h3>
                    <p>
                        Skrypt analizuje korpus tekstów w języku polskim i wyznacza częstotliwość występowania sylab
                        oraz innych
                        powtarzalnych wzorców językowych. Wynikiem działania jest baza danych, która stanowi punkt
                        wyjścia do
                        dalszej optymalizacji kodu haptycznego.
                    </p>
                    <p>
                        <a href="https://github.com/website-studio1/HaptiReader-open-source-Explory-project"
                            target="_blank" rel="noopener noreferrer">Zobacz skrypt i wynikającą bazę danych</a>
                    </p>
                    <img src="assets/images/sylaby.png"
                        alt="Zrzut ekranu przedstawiający skrypt analizujący częstotliwość sylab oraz wygenerowaną bazę danych"
                        width="900" height="520">
                </article>

                <article class="source-card">
                    <h3>2. Przypisywanie wolnych wzorców haptycznych sylabom</h3>
                    <p>
                        Ten skrypt przypisuje nieużyte jeszcze wzorce haptyczne najczęstszym sylabom, tak aby zwiększyć
                        przepustowość systemu bez naruszania podstawowej logiki kodowania. Efektem jest nowa baza danych
                        zawierająca przypisania między sylabami a wolnymi układami binarnymi.
                    </p>
                    <p>
                        <a href="https://github.com/website-studio1/HaptiReader-open-source-Explory-project"
                            target="_blank" rel="noopener noreferrer">Zobacz skrypt i wynikającą bazę danych</a>
                    </p>
                    <img src="assets/images/przypisanie.png"
                        alt="Zrzut ekranu przedstawiający skrypt przypisujący wolne wzorce haptyczne sylabom oraz wygenerowaną bazę danych"
                        width="900" height="520">
                </article>

                <article class="source-card">
                    <h3>3. Konwersja PDF/EPUB/TXT na kod binarny</h3>
                    <p>
                        Skrypt przetwarza pliki PDF, EPUB i TXT do postaci binarnego strumienia odczytywanego przez
                        HaptiReader.
                        Każde 6 bitów odpowiada jednemu znakowi lub sylabie, dzięki czemu tekst może zostać bezpośrednio
                        zamieniony na sekwencję wzorców haptycznych gotowych do odtworzenia przez urządzenie.
                    </p>
                    <p>
                        <a href="https://github.com/website-studio1/HaptiReader-open-source-Explory-project"
                            target="_blank" rel="noopener noreferrer">Zobacz skrypt konwertujący pliki na kod
                            binarny</a>
                    </p>
                    <img src="assets/images/konwerter.png"
                        alt="Zrzut ekranu przedstawiający skrypt konwertujący pliki PDF EPUB i TXT na binarny kod dla HaptiReadera"
                        width="900" height="520">
                </article>

                <article class="source-card">
                    <h3>4. Analiza częstotliwości liter</h3>
                    <p>
                        Skrypt bada częstotliwość występowania liter w analizowanym zbiorze tekstów. Wyniki są
                        wykorzystywane do
                        opracowania optymalnego planu treningowego, tak aby użytkownik najpierw uczył się tych znaków,
                        które
                        pojawiają się najczęściej i najszybciej zwiększają praktyczną skuteczność czytania.
                    </p>
                    <p>
                        <a href="https://github.com/website-studio1/HaptiReader-open-source-Explory-project"
                            target="_blank" rel="noopener noreferrer">Zobacz skrypt do analizy częstotliwości
                            liter</a>
                    </p>
                    <img src="assets/images/litery.png"
                        alt="Zrzut ekranu przedstawiający skrypt analizujący częstotliwość liter na potrzeby planu treningowego"
                        width="900" height="520">
                </article>
            </div>
        </section>

        <style>
            #SourceCode {
                padding: 18px 12px 30px 12px;
            }

            #SourceCode h2 {
                margin-bottom: 18px;
                color: #5b3400;
            }

            .source-grid {
                max-width: 1050px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .source-card {
                background: #fffdf7;
                border: 1px solid #e5e5e5;
                border-radius: 18px;
                padding: 24px;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
                text-align: left;
            }

            .source-card h3 {
                margin-bottom: 14px;
                color: #7c2d12;
            }

            .source-card p {
                margin-bottom: 14px;
                line-height: 1.75;
                font-size: 17px;
                color: #3f3f46;
                text-align: left;
            }

            .source-card a {
                color: #c2410c;
                font-weight: bold;
                text-decoration: none;
            }

            .source-card a:hover {
                text-decoration: underline;
            }

            .source-card img {
                width: 100%;
                max-width: 900px;
                height: auto;
                display: block;
                margin: 16px auto 0 auto;
                border: 2px dashed #f59e0b;
                border-radius: 14px;
                background: #fff8eb;
            }

            @media (max-width: 700px) {
                .source-card {
                    padding: 18px;
                }

                .source-card p {
                    font-size: 15px;
                }
            }
        </style>

        <section id="Demo" class="content">
            <h2>Demo</h2>

            <p
                style="color: #b00020; font-weight: bold; background-color: #ffe5e5; border: 1px solid #ffb3b3; padding: 12px; border-radius: 8px;">
                Uwaga: poniższa demonstracja zawiera szybko migające elementy wizualne, które mogą powodować dyskomfort
                lub wywołać reakcje u osób z padaczką fotogenną albo nadwrażliwością na bodźce świetlne. W przypadku
                występowania takich objawów zaleca się przerwanie korzystania z demonstracji.
            </p>

            <textarea id="demoText" maxlength="1000" rows="7"
                placeholder="Wpisz tekst do 1000 znaków...">Pan nawiązał kontakt, że on wiedział, jak to zrobić, i działał z zaangażowaniem.</textarea>

            <div style="margin: 15px 0;">
                <button type="button" onclick="startDemo()">Start</button>
                <button type="button" onclick="pauseDemo()">Pauza</button>
                <button type="button" onclick="resetDemo()">Reset</button>
            </div>

            <div style="margin: 15px 0;">
                <label for="speedRange">Prędkość transmisji: <span id="speedValue">100</span> ms</label><br>
                <input type="range" id="speedRange" min="5" max="2000" step="5" value="100">
            </div>

            <div style="margin: 15px 0;">
                <label for="compressionRange">Stopień kompresji: <span id="compressionValue">36</span></label><br>
                <input type="range" id="compressionRange" min="36" max="63" step="1" value="36">
            </div>

            <div id="demoPanels">
                <div class="demo-panel">
                    <h3>Kod haptyczny</h3>
                    <div id="hapticStatus" class="status">Gotowe do uruchomienia</div>
                    <div id="hapticCurrent" class="current">Aktualny znak/sylaba: -</div>
                    <div id="hapticTimer" class="timer">Czas transmisji: 00:00.0</div>
                    <div id="hapticDisplay" class="braille-display">
                        <div class="braille-dot" data-dot="0"></div>
                        <div class="braille-dot" data-dot="3"></div>
                        <div class="braille-dot" data-dot="1"></div>
                        <div class="braille-dot" data-dot="4"></div>
                        <div class="braille-dot" data-dot="2"></div>
                        <div class="braille-dot" data-dot="5"></div>
                    </div>
                </div>

                <div class="demo-divider"></div>

                <div class="demo-panel">
                    <h3>Kod Morse'a</h3>
                    <div id="morseStatus" class="status">Gotowe do uruchomienia</div>
                    <div id="morseCurrent" class="current">Aktualny znak: -</div>
                    <div id="morseTimer" class="timer">Czas transmisji: 00:00.0</div>
                    <div id="morseDisplayWrap">
                        <div id="morseDot"></div>
                    </div>
                </div>
            </div>

            <div id="comparisonBox">
                <div id="comparisonNow">Porównanie bieżącego uruchomienia: -</div>
                <div id="comparisonPrev">Porównanie do poprzedniej konfiguracji: -</div>
            </div>

            <style>
                #Demo textarea {
                    width: 92%;
                    max-width: 1100px;
                    padding: 10px;
                    font-size: 16px;
                    text-align: left;
                    resize: vertical;
                }

                #demoPanels {
                    display: flex;
                    justify-content: center;
                    align-items: stretch;
                    gap: 24px;
                    margin: 30px auto 10px auto;
                    max-width: 1200px;
                    flex-wrap: wrap;
                }

                #Demo .demo-panel {
                    flex: 1 1 420px;
                    min-width: 320px;
                    background: #fffdf7;
                    border: 1px solid #e5e5e5;
                    border-radius: 14px;
                    padding: 20px;
                }

                #Demo .demo-divider {
                    width: 3px;
                    background: #d4d4d4;
                    border-radius: 3px;
                }

                #Demo .status,
                #Demo .current,
                #Demo .timer {
                    margin: 12px 0;
                    font-weight: bold;
                }

                #Demo .timer {
                    font-size: 22px;
                    color: #7c2d12;
                }

                #Demo .braille-display {
                    display: grid;
                    grid-template-columns: repeat(2, 70px);
                    grid-template-rows: repeat(3, 70px);
                    gap: 15px;
                    justify-content: center;
                    margin: 20px auto;
                    width: max-content;
                }

                #Demo .braille-dot {
                    width: 70px;
                    height: 70px;
                    border-radius: 50%;
                    border: 2px solid #999;
                    background-color: white;
                    transition: background-color 0.15s ease, transform 0.15s ease;
                    margin: 0 auto;
                }

                #Demo .braille-dot.active {
                    background-color: #facc15;
                    transform: scale(1.08);
                    border-color: #eab308;
                }

                #morseDisplayWrap {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 260px;
                }

                #morseDot {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
                    border: 3px solid #999;
                    background: white;
                    transition: background-color 0.08s ease, transform 0.08s ease;
                }

                #morseDot.active {
                    background: #facc15;
                    border-color: #eab308;
                    transform: scale(1.06);
                }

                #comparisonBox {
                    margin: 24px auto 10px auto;
                    max-width: 1100px;
                    background: #fffdf7;
                    border: 1px solid #e5e5e5;
                    border-radius: 14px;
                    padding: 16px;
                    font-weight: bold;
                }

                #comparisonBox div {
                    margin: 8px 0;
                }

                @media (max-width: 900px) {
                    #Demo .demo-divider {
                        display: none;
                    }

                    #demoPanels {
                        flex-direction: column;
                    }
                }
            </style>

            <script>
                const brailleMap = {
                    "a": { id: 1, bin: "100000" },
                    "ą": { id: 2, bin: "100001" },
                    "b": { id: 3, bin: "110000" },
                    "c": { id: 4, bin: "100100" },
                    "ć": { id: 5, bin: "000001" },
                    "d": { id: 6, bin: "100110" },
                    "e": { id: 7, bin: "100010" },
                    "ę": { id: 8, bin: "100011" },
                    "f": { id: 9, bin: "110100" },
                    "g": { id: 10, bin: "110110" },
                    "h": { id: 11, bin: "110010" },
                    "i": { id: 12, bin: "010100" },
                    "j": { id: 13, bin: "010110" },
                    "k": { id: 14, bin: "101000" },
                    "l": { id: 15, bin: "111000" },
                    "ł": { id: 16, bin: "110001" },
                    "m": { id: 17, bin: "101100" },
                    "n": { id: 18, bin: "101110" },
                    "ń": { id: 19, bin: "100111" },
                    "o": { id: 20, bin: "101010" },
                    "ó": { id: 21, bin: "011001" },
                    "p": { id: 22, bin: "111100" },
                    "q": { id: 23, bin: "111110" },
                    "r": { id: 24, bin: "111010" },
                    "s": { id: 25, bin: "011100" },
                    "ś": { id: 26, bin: "001101" },
                    "t": { id: 27, bin: "011110" },
                    "u": { id: 28, bin: "101001" },
                    "v": { id: 29, bin: "111001" },
                    "w": { id: 30, bin: "010111" },
                    "x": { id: 31, bin: "101101" },
                    "y": { id: 32, bin: "101111" },
                    "z": { id: 33, bin: "101011" },
                    "ź": { id: 34, bin: "001011" },
                    "ż": { id: 35, bin: "011111" },
                    "ni": { id: 36, bin: "001110" },
                    "si": { id: 37, bin: "011101" },
                    "ał": { id: 38, bin: "100101" },
                    "na": { id: 39, bin: "111111" },
                    "em": { id: 40, bin: "000010" },
                    "ki": { id: 41, bin: "001000" },
                    "ci": { id: 42, bin: "000100" },
                    "zi": { id: 43, bin: "111011" },
                    "wi": { id: 44, bin: "110111" },
                    "ej": { id: 45, bin: "110011" },
                    "że": { id: 46, bin: "011011" },
                    "od": { id: 47, bin: "001010" },
                    "ow": { id: 48, bin: "011010" },
                    "pan": { id: 49, bin: "111101" },
                    "al": { id: 50, bin: "010000" },
                    "to": { id: 51, bin: "011000" },
                    "mi": { id: 52, bin: "001100" },
                    "jak": { id: 53, bin: "010010" },
                    "an": { id: 54, bin: "110101" },
                    "do": { id: 55, bin: "000110" },
                    "ze": { id: 56, bin: "001111" },
                    "on": { id: 57, bin: "001001" },
                    "eg": { id: 58, bin: "000011" },
                    "er": { id: 59, bin: "010011" },
                    "zy": { id: 60, bin: "000111" },
                    "ił": { id: 61, bin: "010101" },
                    "en": { id: 62, bin: "010001" },
                    "za": { id: 63, bin: "000101" }
                };

                const morseMap = {
                    "a": ".-", "ą": ".-.-", "b": "-...", "c": "-.-.", "ć": "-.-..", "d": "-..", "e": ".",
                    "ę": "..-..", "f": "..-.", "g": "--.", "h": "....", "i": "..", "j": ".---", "k": "-.-",
                    "l": ".-..", "ł": ".-..-", "m": "--", "n": "-.", "ń": "--.--", "o": "---", "ó": "---.",
                    "p": ".--.", "q": "--.-", "r": ".-.", "s": "...", "ś": "...-...", "t": "-", "u": "..-",
                    "v": "...-", "w": ".--", "x": "-..-", "y": "-.--", "z": "--..", "ź": "--..-.", "ż": "--..-",
                    "0": "-----", "1": ".----", "2": "..---", "3": "...--", "4": "....-", "5": ".....",
                    "6": "-....", "7": "--...", "8": "---..", "9": "----.",
                    ".": ".-.-.-", ",": "--..--", "?": "..--..", "!": "-.-.--", ":": "---...", ";": "-.-.-.",
                    "-": "-....-", "(": "-.--.", ")": "-.--.-", "\"": ".-..-.", "'": ".----.", "/": "-..-.",
                    "=": "-...-", "+": ".-.-.", "@": ".--.-."
                };

                let hapticSequence = [];
                let hapticIndex = 0;
                let hapticTimeout = null;
                let hapticPaused = false;

                let morseSequence = [];
                let morseIndex = 0;
                let morseTimeout = null;
                let morsePaused = false;

                let hapticStopwatchInterval = null;
                let hapticStopwatchStart = 0;
                let hapticStopwatchElapsed = 0;

                let morseStopwatchInterval = null;
                let morseStopwatchStart = 0;
                let morseStopwatchElapsed = 0;

                let previousRun = null;

                const demoText = document.getElementById('demoText');
                const speedRange = document.getElementById('speedRange');
                const compressionRange = document.getElementById('compressionRange');
                const speedValue = document.getElementById('speedValue');
                const compressionValue = document.getElementById('compressionValue');

                const hapticStatus = document.getElementById('hapticStatus');
                const hapticCurrent = document.getElementById('hapticCurrent');
                const hapticTimer = document.getElementById('hapticTimer');
                const hapticDots = document.querySelectorAll('#hapticDisplay .braille-dot');

                const morseStatus = document.getElementById('morseStatus');
                const morseCurrent = document.getElementById('morseCurrent');
                const morseTimer = document.getElementById('morseTimer');
                const morseDot = document.getElementById('morseDot');

                const comparisonNow = document.getElementById('comparisonNow');
                const comparisonPrev = document.getElementById('comparisonPrev');

                speedRange.addEventListener('input', () => {
                    speedValue.textContent = speedRange.value;
                });

                compressionRange.addEventListener('input', () => {
                    compressionValue.textContent = compressionRange.value;
                });

                function formatElapsed(ms) {
                    const totalTenths = Math.floor(ms / 100);
                    const minutes = Math.floor(totalTenths / 600);
                    const seconds = Math.floor((totalTenths % 600) / 10);
                    const tenths = totalTenths % 10;
                    return String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0') + '.' + tenths;
                }

                function percentDifference(base, compare) {
                    if (base <= 0 || compare <= 0) return null;
                    return ((base - compare) / base) * 100;
                }

                function getCompressionEntries() {
                    const compressionLimit = parseInt(compressionRange.value, 10);
                    return Object.entries(brailleMap)
                        .filter(([token, data]) => data.id <= compressionLimit)
                        .sort((a, b) => {
                            if (b[0].length !== a[0].length) return b[0].length - a[0].length;
                            return a[1].id - b[1].id;
                        });
                }

                function tokenizeHapticText(text) {
                    const normalized = text.toLowerCase();
                    const entries = getCompressionEntries();
                    const sequence = [];
                    let i = 0;

                    while (i < normalized.length) {
                        const ch = normalized[i];

                        if (ch === ' ') {
                            sequence.push({ token: ' ', bin: '000000', id: 0 });
                            i++;
                            continue;
                        }

                        let bestMatch = null;

                        for (const [token, data] of entries) {
                            if (normalized.startsWith(token, i)) {
                                bestMatch = { token, bin: data.bin, id: data.id };
                                break;
                            }
                        }

                        if (bestMatch) {
                            sequence.push(bestMatch);
                            i += bestMatch.token.length;
                        } else {
                            i++;
                        }
                    }

                    return sequence;
                }

                function tokenizeMorseText(text) {
                    const normalized = text.toLowerCase();
                    const sequence = [];

                    for (const ch of normalized) {
                        if (ch === ' ') {
                            sequence.push({ token: ' ', morse: ' ' });
                        } else if (morseMap[ch]) {
                            sequence.push({ token: ch, morse: morseMap[ch] });
                        }
                    }

                    return sequence;
                }

                function renderHaptic(binaryCode) {
                    hapticDots.forEach((dot, index) => {
                        dot.classList.toggle('active', binaryCode[index] === '1');
                    });
                }

                function clearHaptic() {
                    renderHaptic('000000');
                }

                function renderMorseOn() {
                    morseDot.classList.add('active');
                }

                function renderMorseOff() {
                    morseDot.classList.remove('active');
                }

                function startHapticStopwatch() {
                    if (hapticStopwatchInterval) return;
                    hapticStopwatchStart = performance.now();
                    hapticStopwatchInterval = setInterval(() => {
                        const elapsed = hapticStopwatchElapsed + (performance.now() - hapticStopwatchStart);
                        hapticTimer.textContent = 'Czas transmisji: ' + formatElapsed(elapsed);
                    }, 100);
                }

                function pauseHapticStopwatch() {
                    if (!hapticStopwatchInterval) return;
                    hapticStopwatchElapsed += performance.now() - hapticStopwatchStart;
                    clearInterval(hapticStopwatchInterval);
                    hapticStopwatchInterval = null;
                    hapticTimer.textContent = 'Czas transmisji: ' + formatElapsed(hapticStopwatchElapsed);
                }

                function resetHapticStopwatch() {
                    if (hapticStopwatchInterval) clearInterval(hapticStopwatchInterval);
                    hapticStopwatchInterval = null;
                    hapticStopwatchStart = 0;
                    hapticStopwatchElapsed = 0;
                    hapticTimer.textContent = 'Czas transmisji: 00:00.0';
                }

                function startMorseStopwatch() {
                    if (morseStopwatchInterval) return;
                    morseStopwatchStart = performance.now();
                    morseStopwatchInterval = setInterval(() => {
                        const elapsed = morseStopwatchElapsed + (performance.now() - morseStopwatchStart);
                        morseTimer.textContent = 'Czas transmisji: ' + formatElapsed(elapsed);
                    }, 100);
                }

                function pauseMorseStopwatch() {
                    if (!morseStopwatchInterval) return;
                    morseStopwatchElapsed += performance.now() - morseStopwatchStart;
                    clearInterval(morseStopwatchInterval);
                    morseStopwatchInterval = null;
                    morseTimer.textContent = 'Czas transmisji: ' + formatElapsed(morseStopwatchElapsed);
                }

                function resetMorseStopwatch() {
                    if (morseStopwatchInterval) clearInterval(morseStopwatchInterval);
                    morseStopwatchInterval = null;
                    morseStopwatchStart = 0;
                    morseStopwatchElapsed = 0;
                    morseTimer.textContent = 'Czas transmisji: 00:00.0';
                }

                function updateRunComparison() {
                    if (hapticStopwatchElapsed > 0 && morseStopwatchElapsed > 0) {
                        const diff = percentDifference(morseStopwatchElapsed, hapticStopwatchElapsed);

                        if (diff === null) {
                            comparisonNow.textContent = 'Porównanie bieżącego uruchomienia: -';
                        } else if (diff > 0) {
                            comparisonNow.textContent = 'Porównanie bieżącego uruchomienia: model haptyczny był szybszy od Morse\'a o ' + diff.toFixed(2) + '%.';
                        } else if (diff < 0) {
                            comparisonNow.textContent = 'Porównanie bieżącego uruchomienia: model haptyczny był wolniejszy od Morse\'a o ' + Math.abs(diff).toFixed(2) + '%.';
                        } else {
                            comparisonNow.textContent = 'Porównanie bieżącego uruchomienia: oba modele miały taki sam czas transmisji.';
                        }

                        const currentRun = {
                            speed: parseInt(speedRange.value, 10),
                            compression: parseInt(compressionRange.value, 10),
                            hapticTime: hapticStopwatchElapsed,
                            morseTime: morseStopwatchElapsed
                        };

                        if (previousRun) {
                            const prevVsCurrent = percentDifference(previousRun.hapticTime, currentRun.hapticTime);

                            if (prevVsCurrent === null) {
                                comparisonPrev.textContent = 'Porównanie do poprzedniej konfiguracji: -';
                            } else if (prevVsCurrent > 0) {
                                comparisonPrev.textContent = 'Porównanie do poprzedniej konfiguracji: model haptyczny był szybszy o ' + prevVsCurrent.toFixed(2) + '% niż poprzednio.';
                            } else if (prevVsCurrent < 0) {
                                comparisonPrev.textContent = 'Porównanie do poprzedniej konfiguracji: model haptyczny był wolniejszy o ' + Math.abs(prevVsCurrent).toFixed(2) + '% niż poprzednio.';
                            } else {
                                comparisonPrev.textContent = 'Porównanie do poprzedniej konfiguracji: czas modelu haptycznego był identyczny jak poprzednio.';
                            }
                        } else {
                            comparisonPrev.textContent = 'Porównanie do poprzedniej konfiguracji: brak poprzedniego pomiaru.';
                        }

                        previousRun = currentRun;
                    }
                }

                function finishIfBothDone() {
                    if (hapticTimeout === null && morseTimeout === null && !hapticPaused && !morsePaused) {
                        updateRunComparison();
                    }
                }

                function runHapticStep() {
                    if (hapticIndex >= hapticSequence.length) {
                        pauseHapticStopwatch();
                        hapticStatus.textContent = 'Transmisja zakończona';
                        hapticCurrent.textContent = 'Aktualny znak/sylaba: -';
                        clearHaptic();
                        hapticTimeout = null;
                        finishIfBothDone();
                        return;
                    }

                    const current = hapticSequence[hapticIndex];
                    hapticCurrent.textContent = 'Aktualny znak/sylaba: ' + (current.token === ' ' ? '[spacja]' : current.token);
                    renderHaptic(current.bin);
                    hapticIndex++;

                    hapticTimeout = setTimeout(runHapticStep, parseInt(speedRange.value, 10));
                }

                function createMorseEvents(sequence, unitMs) {
                    const events = [];

                    sequence.forEach((item, index) => {
                        if (item.token === ' ') {
                            events.push({ on: false, duration: unitMs * 7, label: '[spacja]' });
                            return;
                        }

                        const code = item.morse;

                        for (let i = 0; i < code.length; i++) {
                            const symbol = code[i];
                            events.push({
                                on: true,
                                duration: symbol === '.' ? unitMs : unitMs * 3,
                                label: item.token + ' (' + symbol + ')'
                            });

                            if (i < code.length - 1) {
                                events.push({ on: false, duration: unitMs, label: item.token + ' [przerwa]' });
                            }
                        }

                        if (index < sequence.length - 1 && sequence[index + 1].token !== ' ') {
                            events.push({ on: false, duration: unitMs * 3, label: item.token + ' [odstęp litery]' });
                        }
                    });

                    return events;
                }

                let morseEvents = [];

                function runMorseStep() {
                    if (morseIndex >= morseEvents.length) {
                        pauseMorseStopwatch();
                        morseStatus.textContent = 'Transmisja zakończona';
                        morseCurrent.textContent = 'Aktualny znak: -';
                        renderMorseOff();
                        morseTimeout = null;
                        finishIfBothDone();
                        return;
                    }

                    const event = morseEvents[morseIndex];
                    morseCurrent.textContent = 'Aktualny znak: ' + event.label;

                    if (event.on) {
                        renderMorseOn();
                    } else {
                        renderMorseOff();
                    }

                    morseIndex++;
                    morseTimeout = setTimeout(runMorseStep, event.duration);
                }

                function startDemo() {
                    if (hapticTimeout || morseTimeout) return;

                    if (!hapticPaused && !morsePaused) {
                        const text = demoText.value.trim();

                        if (!text) {
                            hapticStatus.textContent = 'Wpisz tekst do transmisji';
                            morseStatus.textContent = 'Wpisz tekst do transmisji';
                            return;
                        }

                        hapticSequence = tokenizeHapticText(text);
                        morseSequence = tokenizeMorseText(text);
                        morseEvents = createMorseEvents(morseSequence, parseInt(speedRange.value, 10));

                        if (hapticSequence.length === 0) {
                            hapticStatus.textContent = 'Brak danych możliwych do zakodowania';
                            morseStatus.textContent = 'Brak danych możliwych do zakodowania';
                            return;
                        }

                        hapticIndex = 0;
                        morseIndex = 0;
                        resetHapticStopwatch();
                        resetMorseStopwatch();
                        comparisonNow.textContent = 'Porównanie bieżącego uruchomienia: trwa pomiar...';
                    }

                    hapticPaused = false;
                    morsePaused = false;

                    hapticStatus.textContent = 'Trwa transmisja';
                    morseStatus.textContent = 'Trwa transmisja';

                    startHapticStopwatch();
                    startMorseStopwatch();
                    runHapticStep();
                    runMorseStep();
                }

                function pauseDemo() {
                    if (hapticTimeout) {
                        clearTimeout(hapticTimeout);
                        hapticTimeout = null;
                        hapticPaused = true;
                        hapticStatus.textContent = 'Pauza';
                        pauseHapticStopwatch();
                    }

                    if (morseTimeout) {
                        clearTimeout(morseTimeout);
                        morseTimeout = null;
                        morsePaused = true;
                        morseStatus.textContent = 'Pauza';
                        pauseMorseStopwatch();
                        renderMorseOff();
                    }
                }

                function resetDemo() {
                    if (hapticTimeout) clearTimeout(hapticTimeout);
                    if (morseTimeout) clearTimeout(morseTimeout);

                    hapticTimeout = null;
                    morseTimeout = null;
                    hapticPaused = false;
                    morsePaused = false;

                    hapticIndex = 0;
                    morseIndex = 0;
                    hapticSequence = [];
                    morseSequence = [];
                    morseEvents = [];

                    clearHaptic();
                    renderMorseOff();

                    hapticStatus.textContent = 'Gotowe do uruchomienia';
                    morseStatus.textContent = 'Gotowe do uruchomienia';
                    hapticCurrent.textContent = 'Aktualny znak/sylaba: -';
                    morseCurrent.textContent = 'Aktualny znak: -';

                    resetHapticStopwatch();
                    resetMorseStopwatch();

                    comparisonNow.textContent = 'Porównanie bieżącego uruchomienia: -';
                }
            </script>
        </section>
        <section id="Trening" class="content">
            <h2>Trening</h2>
            <p
                style="color: #b00020; font-weight: bold; background-color: #ffe5e5; border: 1px solid #ffb3b3; padding: 12px; border-radius: 8px;">
                Uwaga: poniższa demonstracja zawiera szybko migające elementy wizualne, które mogą powodować dyskomfort
                lub wywołać reakcje u osób z padaczką fotogenną albo nadwrażliwością na bodźce świetlne. W przypadku
                występowania takich objawów zaleca się przerwanie korzystania z demonstracji.
            </p>
            <div class="trening-module-controls">
                <div class="trening-module-range-box">
                    <label>Zakres uczonych znaków i sylab: <span id="treningModuleRangeLabel">1-7</span></label>

                    <div class="trening-module-dual-range-wrap">
                        <div class="trening-module-dual-range-track"></div>
                        <div class="trening-module-dual-range-fill" id="treningModuleDualRangeFill"></div>
                        <input type="range" id="treningModuleMinRange" min="1" max="63" value="1" step="1">
                        <input type="range" id="treningModuleMaxRange" min="1" max="63" value="7" step="1">
                    </div>
                </div>

                <div class="trening-module-toggle">
                    <input type="checkbox" id="treningModuleKeyboardMode">
                    <label for="treningModuleKeyboardMode">Wpisuj z klawiatury</label>
                </div>

                <div class="trening-module-preview">
                    <strong>Obecnie uczone znaki/sylaby:</strong>
                    <div id="treningModulePreviewList"></div>
                </div>
            </div>

            <div class="trening-module-panel">
                <div class="trening-module-card">
                    <div class="trening-module-braille-box" id="treningModuleBrailleBox">
                        <div class="trening-module-dot" data-dot="0"></div>
                        <div class="trening-module-dot" data-dot="3"></div>
                        <div class="trening-module-dot" data-dot="1"></div>
                        <div class="trening-module-dot" data-dot="4"></div>
                        <div class="trening-module-dot" data-dot="2"></div>
                        <div class="trening-module-dot" data-dot="5"></div>
                    </div>

                    <div class="trening-module-prompt" id="treningModulePrompt">Wskaż poprawny znak lub sylabę.</div>

                    <div class="trening-module-options" id="treningModuleOptions"></div>

                    <div class="trening-module-keyboard-wrap" id="treningModuleKeyboardWrap" style="display:none;">
                        <input type="text" id="treningModuleKeyboardInput" maxlength="5"
                            placeholder="Wpisz znak lub sylabę">
                        <button type="button" onclick="treningModuleSubmitKeyboardAnswer()">Enter</button>
                    </div>

                    <div class="trening-module-feedback" id="treningModuleFeedback">Wynik: -</div>
                    <div class="trening-module-stats" id="treningModuleStats">Poprawne: 0 | Błędne: 0</div>

                    <div style="margin-top: 18px;">
                        <button type="button" onclick="treningModuleNextQuestion()">Następne zadanie</button>
                    </div>
                </div>
            </div>

            <style>
                .trening-module-controls {
                    max-width: 1100px;
                    margin: 0 auto 28px auto;
                    background: #fffdf7;
                    border: 1px solid #e5e5e5;
                    border-radius: 16px;
                    padding: 20px;
                }

                .trening-module-range-box {
                    margin-bottom: 18px;
                }

                .trening-module-dual-range-wrap {
                    position: relative;
                    width: 100%;
                    max-width: 700px;
                    height: 42px;
                    margin: 18px auto 6px auto;
                }

                .trening-module-dual-range-track,
                .trening-module-dual-range-fill {
                    position: absolute;
                    top: 18px;
                    height: 6px;
                    border-radius: 999px;
                }

                .trening-module-dual-range-track {
                    width: 100%;
                    background: #ddd;
                }

                .trening-module-dual-range-fill {
                    background: #f59e0b;
                }

                .trening-module-dual-range-wrap input[type="range"] {
                    position: absolute;
                    left: 0;
                    top: 8px;
                    width: 100%;
                    pointer-events: none;
                    appearance: none;
                    background: none;
                    margin: 0;
                }

                .trening-module-dual-range-wrap input[type="range"]::-webkit-slider-thumb {
                    appearance: none;
                    width: 22px;
                    height: 22px;
                    border-radius: 50%;
                    background: #ea580c;
                    border: 2px solid white;
                    box-shadow: 0 0 0 1px #c2410c;
                    pointer-events: auto;
                    cursor: pointer;
                }

                .trening-module-dual-range-wrap input[type="range"]::-moz-range-thumb {
                    width: 22px;
                    height: 22px;
                    border-radius: 50%;
                    background: #ea580c;
                    border: 2px solid white;
                    box-shadow: 0 0 0 1px #c2410c;
                    pointer-events: auto;
                    cursor: pointer;
                }

                .trening-module-toggle {
                    margin: 16px 0;
                    font-weight: bold;
                }

                .trening-module-preview {
                    margin-top: 16px;
                    text-align: left;
                }

                #treningModulePreviewList {
                    margin-top: 10px;
                    display: flex;
                    flex-wrap: wrap;
                    gap: 8px;
                }

                .trening-module-chip {
                    background: #fde68a;
                    color: #7c2d12;
                    border: 1px solid #f59e0b;
                    border-radius: 999px;
                    padding: 6px 10px;
                    font-weight: bold;
                }

                .trening-module-panel {
                    max-width: 1100px;
                    margin: 0 auto;
                }

                .trening-module-card {
                    background: #fffdf7;
                    border: 1px solid #e5e5e5;
                    border-radius: 18px;
                    padding: 24px;
                }

                .trening-module-braille-box {
                    display: grid;
                    grid-template-columns: repeat(2, 48px);
                    grid-template-rows: repeat(3, 48px);
                    gap: 12px;
                    justify-content: center;
                    width: max-content;
                    margin: 0 auto 20px auto;
                }

                .trening-module-dot {
                    width: 48px;
                    height: 48px;
                    border-radius: 50%;
                    border: 2px solid #999;
                    background: white;
                }

                .trening-module-dot.active {
                    background: #facc15;
                    border-color: #eab308;
                }

                .trening-module-prompt {
                    font-size: 20px;
                    font-weight: bold;
                    margin: 18px 0;
                }

                .trening-module-options {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                    gap: 14px;
                    margin: 20px 0;
                }

                .trening-module-option-btn {
                    padding: 16px 12px;
                    border: 2px solid #f59e0b;
                    border-radius: 14px;
                    background: white;
                    color: #7c2d12;
                    font-size: 22px;
                    font-weight: bold;
                    cursor: pointer;
                }

                .trening-module-option-btn:hover {
                    background: #ffedd5;
                }

                .trening-module-keyboard-wrap {
                    margin: 18px 0;
                }

                #treningModuleKeyboardInput {
                    padding: 12px;
                    font-size: 18px;
                    width: 220px;
                    max-width: 80%;
                    text-align: center;
                    margin-right: 10px;
                }

                .trening-module-feedback {
                    margin-top: 16px;
                    font-size: 18px;
                    font-weight: bold;
                }

                .trening-module-stats {
                    margin-top: 10px;
                    color: #555;
                    font-weight: bold;
                }

                @media (max-width: 700px) {
                    .trening-module-option-btn {
                        font-size: 18px;
                    }
                }
            </style>

            <script>
                const treningModuleData = [
                    { alias: 1, token: "i", bin: "010100" },
                    { alias: 2, token: "a", bin: "100000" },
                    { alias: 3, token: "e", bin: "100010" },
                    { alias: 4, token: "o", bin: "101010" },
                    { alias: 5, token: "z", bin: "101011" },
                    { alias: 6, token: "n", bin: "101110" },
                    { alias: 7, token: "s", bin: "011100" },
                    { alias: 8, token: "w", bin: "010111" },
                    { alias: 9, token: "c", bin: "100100" },
                    { alias: 10, token: "r", bin: "111010" },
                    { alias: 11, token: "y", bin: "101111" },
                    { alias: 12, token: "t", bin: "011110" },
                    { alias: 13, token: "k", bin: "101000" },
                    { alias: 14, token: "d", bin: "100110" },
                    { alias: 15, token: "m", bin: "101100" },
                    { alias: 16, token: "p", bin: "111100" },
                    { alias: 17, token: "ł", bin: "110001" },
                    { alias: 18, token: "j", bin: "010110" },
                    { alias: 19, token: "u", bin: "101001" },
                    { alias: 20, token: "l", bin: "111000" },
                    { alias: 21, token: "b", bin: "110000" },
                    { alias: 22, token: "ę", bin: "100011" },
                    { alias: 23, token: "g", bin: "110110" },
                    { alias: 24, token: "h", bin: "110010" },
                    { alias: 25, token: "ą", bin: "100001" },
                    { alias: 26, token: "ć", bin: "000001" },
                    { alias: 27, token: "f", bin: "110100" },
                    { alias: 28, token: "ń", bin: "100111" },
                    { alias: 29, token: "ó", bin: "011001" },
                    { alias: 30, token: "q", bin: "111110" },
                    { alias: 31, token: "ś", bin: "001101" },
                    { alias: 32, token: "v", bin: "111001" },
                    { alias: 33, token: "x", bin: "101101" },
                    { alias: 34, token: "ź", bin: "001011" },
                    { alias: 35, token: "ż", bin: "011111" },
                    { alias: 36, token: "ni", bin: "001110" },
                    { alias: 37, token: "si", bin: "011101" },
                    { alias: 38, token: "ał", bin: "100101" },
                    { alias: 39, token: "na", bin: "111111" },
                    { alias: 40, token: "em", bin: "000010" },
                    { alias: 41, token: "ki", bin: "001000" },
                    { alias: 42, token: "ci", bin: "000100" },
                    { alias: 43, token: "zi", bin: "111011" },
                    { alias: 44, token: "wi", bin: "110111" },
                    { alias: 45, token: "ej", bin: "110011" },
                    { alias: 46, token: "że", bin: "011011" },
                    { alias: 47, token: "od", bin: "001010" },
                    { alias: 48, token: "ow", bin: "011010" },
                    { alias: 49, token: "pan", bin: "111101" },
                    { alias: 50, token: "al", bin: "010000" },
                    { alias: 51, token: "to", bin: "011000" },
                    { alias: 52, token: "mi", bin: "001100" },
                    { alias: 53, token: "jak", bin: "010010" },
                    { alias: 54, token: "an", bin: "110101" },
                    { alias: 55, token: "do", bin: "000110" },
                    { alias: 56, token: "ze", bin: "001111" },
                    { alias: 57, token: "on", bin: "001001" },
                    { alias: 58, token: "eg", bin: "000011" },
                    { alias: 59, token: "er", bin: "010011" },
                    { alias: 60, token: "zy", bin: "000111" },
                    { alias: 61, token: "ił", bin: "010101" },
                    { alias: 62, token: "en", bin: "010001" },
                    { alias: 63, token: "za", bin: "000101" }
                ];

                const treningModuleMinRange = document.getElementById('treningModuleMinRange');
                const treningModuleMaxRange = document.getElementById('treningModuleMaxRange');
                const treningModuleRangeLabel = document.getElementById('treningModuleRangeLabel');
                const treningModuleDualRangeFill = document.getElementById('treningModuleDualRangeFill');
                const treningModulePreviewList = document.getElementById('treningModulePreviewList');
                const treningModuleKeyboardMode = document.getElementById('treningModuleKeyboardMode');
                const treningModuleDots = document.querySelectorAll('#treningModuleBrailleBox .trening-module-dot');
                const treningModuleOptions = document.getElementById('treningModuleOptions');
                const treningModuleKeyboardWrap = document.getElementById('treningModuleKeyboardWrap');
                const treningModuleKeyboardInput = document.getElementById('treningModuleKeyboardInput');
                const treningModuleFeedback = document.getElementById('treningModuleFeedback');
                const treningModuleStats = document.getElementById('treningModuleStats');

                let treningModuleCurrentQuestion = null;
                let treningModuleCorrectAnswers = 0;
                let treningModuleWrongAnswers = 0;

                function treningModuleGetPool() {
                    const min = parseInt(treningModuleMinRange.value, 10);
                    const max = parseInt(treningModuleMaxRange.value, 10);
                    return treningModuleData.filter(item => item.alias >= min && item.alias <= max);
                }

                function treningModuleUpdateDualRange(activeInput = null) {
                    let min = parseInt(treningModuleMinRange.value, 10);
                    let max = parseInt(treningModuleMaxRange.value, 10);

                    if (min > max) {
                        if (activeInput === 'min') {
                            max = min;
                            treningModuleMaxRange.value = max;
                        } else {
                            min = max;
                            treningModuleMinRange.value = min;
                        }
                    }

                    treningModuleRangeLabel.textContent = min + '-' + max;

                    const minPercent = ((min - 1) / (63 - 1)) * 100;
                    const maxPercent = ((max - 1) / (63 - 1)) * 100;

                    treningModuleDualRangeFill.style.left = minPercent + '%';
                    treningModuleDualRangeFill.style.width = (maxPercent - minPercent) + '%';

                    treningModuleRenderPreview();
                    treningModuleNextQuestion();
                }

                function treningModuleRenderPreview() {
                    const pool = treningModuleGetPool();
                    treningModulePreviewList.innerHTML = '';

                    pool.forEach(item => {
                        const chip = document.createElement('span');
                        chip.className = 'trening-module-chip';
                        chip.textContent = item.token;
                        treningModulePreviewList.appendChild(chip);
                    });
                }

                function treningModuleRenderBraille(binaryCode) {
                    treningModuleDots.forEach((dot, index) => {
                        dot.classList.toggle('active', binaryCode[index] === '1');
                    });
                }

                function treningModuleShuffleArray(arr) {
                    const copy = [...arr];
                    for (let i = copy.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [copy[i], copy[j]] = [copy[j], copy[i]];
                    }
                    return copy;
                }

                function treningModuleGetRandomQuestion() {
                    const pool = treningModuleGetPool();
                    if (pool.length < 4) return null;
                    return pool[Math.floor(Math.random() * pool.length)];
                }

                function treningModuleBuildOptions(correctItem) {
                    const pool = treningModuleGetPool().filter(item => item.token !== correctItem.token);
                    const shuffled = treningModuleShuffleArray(pool).slice(0, 3);
                    return treningModuleShuffleArray([correctItem, ...shuffled]);
                }

                function treningModuleUpdateStats() {
                    treningModuleStats.textContent = 'Poprawne: ' + treningModuleCorrectAnswers + ' | Błędne: ' + treningModuleWrongAnswers;
                }

                function treningModuleSetFeedback(message, isGood) {
                    treningModuleFeedback.textContent = message;
                    treningModuleFeedback.style.color = isGood ? '#15803d' : '#b91c1c';
                }

                function treningModuleNextQuestion() {
                    const pool = treningModuleGetPool();

                    if (pool.length < 4) {
                        treningModuleCurrentQuestion = null;
                        treningModuleRenderBraille('000000');
                        treningModuleOptions.innerHTML = '';
                        treningModuleKeyboardWrap.style.display = treningModuleKeyboardMode.checked ? 'block' : 'none';
                        treningModuleSetFeedback('Zakres musi zawierać co najmniej 4 znaki/sylaby.', false);
                        return;
                    }

                    const question = treningModuleGetRandomQuestion();
                    treningModuleCurrentQuestion = question;

                    treningModuleRenderBraille(question.bin);
                    treningModuleKeyboardInput.value = '';
                    treningModuleSetFeedback('Wybierz odpowiedź.', true);

                    if (treningModuleKeyboardMode.checked) {
                        treningModuleOptions.innerHTML = '';
                        treningModuleKeyboardWrap.style.display = 'block';
                        treningModuleKeyboardInput.focus();
                    } else {
                        treningModuleKeyboardWrap.style.display = 'none';
                        const options = treningModuleBuildOptions(question);
                        treningModuleOptions.innerHTML = '';

                        options.forEach(option => {
                            const btn = document.createElement('button');
                            btn.type = 'button';
                            btn.className = 'trening-module-option-btn';
                            btn.textContent = option.token;
                            btn.onclick = () => treningModuleCheckAnswer(option.token);
                            treningModuleOptions.appendChild(btn);
                        });
                    }
                }

                function treningModuleCheckAnswer(answer) {
                    if (!treningModuleCurrentQuestion) return;

                    const normalized = answer.trim().toLowerCase();
                    const correct = treningModuleCurrentQuestion.token.toLowerCase();

                    if (normalized === correct) {
                        treningModuleCorrectAnswers++;
                        treningModuleSetFeedback('Poprawnie. To był znak/sylaba: ' + treningModuleCurrentQuestion.token, true);
                    } else {
                        treningModuleWrongAnswers++;
                        treningModuleSetFeedback('Błąd. Poprawna odpowiedź: ' + treningModuleCurrentQuestion.token, false);
                    }

                    treningModuleUpdateStats();

                    setTimeout(() => {
                        treningModuleNextQuestion();
                    }, 900);
                }

                function treningModuleSubmitKeyboardAnswer() {
                    treningModuleCheckAnswer(treningModuleKeyboardInput.value);
                }

                treningModuleKeyboardInput.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        treningModuleSubmitKeyboardAnswer();
                    }
                });

                treningModuleKeyboardMode.addEventListener('change', () => {
                    treningModuleNextQuestion();
                });

                treningModuleMinRange.addEventListener('input', () => treningModuleUpdateDualRange('min'));
                treningModuleMaxRange.addEventListener('input', () => treningModuleUpdateDualRange('max'));

                treningModuleUpdateDualRange();
                treningModuleUpdateStats();
            </script>
        </section>
        <section id="Przyszłość" class="content">
            <h2>Przyszłość projektu</h2>

            <div class="future-section-card">
                <h3>Większa precyzja silników</h3>
                <div class="future-two-col">
                    <div>
                        <p>
                            Jednym z najważniejszych kierunków rozwoju jest zastosowanie precyzyjniejszych aktuatorów
                            haptycznych.
                            Szybsza reakcja silników, krótszy czas narastania i wygaszania sygnału oraz lepsza
                            powtarzalność bodźców
                            mogłyby znacząco poprawić tempo odczytu, zmniejszyć zmęczenie użytkownika i zwiększyć
                            komfort nauki.
                            W praktyce oznaczałoby to wyraźniejsze rozróżnianie wzorców i bardziej płynne „czytanie
                            dotykiem”.
                        </p>
                    </div>
                    <div class="future-image-wrap">
                        <img src="assets/images/lra.png" alt="Ilustracja precyzyjniejszych silników haptycznych" width="420"
                            height="260">
                    </div>
                </div>
            </div>

            <div class="future-section-card">
                <h3>7 silnik?</h3>
                <div class="future-two-col">
                    <div>
                        <p>
                            Dodanie siódmego silnika zwiększyłoby liczbę możliwych wzorców z 64 do 128, co otworzyłoby
                            drogę do
                            jeszcze bogatszego kodowania częstych sylab, słów albo znaczników specjalnych. Jednocześnie
                            taki krok
                            oznaczałby większą liczbę schematów do nauki, a więc wyższy próg wejścia dla nowych
                            użytkowników.
                        </p>
                        <p>
                            Ważne jest jednak to, że nowy wariant mógłby pozostać wstecznie kompatybilny: dotychczasowe
                            wzorce
                            sześciosilnikowe działałyby bez zmian, a siódmy kanał byłby używany tylko w rozszerzonym
                            trybie.
                            Dzięki temu możliwe byłoby stopniowe przechodzenie ze starego systemu do nowego, bez utraty
                            już
                            nabytych umiejętności.
                        </p>
                    </div>
                    <div class="future-anim-wrap">
                        <div id="futureSevenGrid" class="future-seven-grid">
                            <div class="future-seven-dot"></div>
                            <div class="future-seven-dot"></div>
                            <div class="future-seven-dot"></div>
                            <div class="future-seven-dot"></div>
                            <div class="future-seven-dot"></div>
                            <div class="future-seven-dot"></div>
                            <div class="future-seven-dot future-seven-extra"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="future-section-card">
                <h3>System trójkowy?</h3>
                <div class="future-two-col">
                    <div>
                        <p>
                            Innym kierunkiem rozwoju byłby system trójkowy, w którym każdy silnik mógłby działać w
                            trzech stanach:
                            wyłączony, aktywny w połowie mocy albo aktywny w pełnej mocy. Dla sześciu silników dawałoby
                            to
                            729 możliwych konfiguracji, czyli znacznie większą przestrzeń kodowania niż w
                            obecnym układzie.
                        </p>
                        <p>
                            Taki system mógłby umożliwić znacznie gęstsze kodowanie informacji, ale rodziłby też realne
                            wyzwania:
                            precyzyjne rozróżnianie trzech poziomów bodźca, większe wymagania wobec elektroniki
                            sterującej oraz
                            dłuższy proces treningu użytkownika. Największym pytaniem byłoby więc nie tylko „ile da się
                            zakodować”,
                            lecz także „ile da się wygodnie i niezawodnie odczytać”.
                        </p>
                    </div>
                    <div class="future-anim-wrap">
                        <div id="futureTernaryGrid" class="future-ternary-grid">
                            <div class="future-ternary-dot"></div>
                            <div class="future-ternary-dot"></div>
                            <div class="future-ternary-dot"></div>
                            <div class="future-ternary-dot"></div>
                            <div class="future-ternary-dot"></div>
                            <div class="future-ternary-dot"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="future-section-card">
                <h3>Optymalizacja dla innych języków</h3>
                <div class="future-two-col">
                    <div>
                        <p>
                            System można stosunkowo łatwo dostosować do innych języków. Wystarczy przygotować
                            analogiczną próbkę
                            tekstów w wybranym języku, a skrypty automatycznie wygenerują zaktualizowany kod haptyczny
                            na podstawie
                            częstotliwości liter, sylab i wzorców językowych.
                        </p>
                        <p>
                            Oznacza to, że bardziej zaawansowani technicznie użytkownicy mogliby samodzielnie tworzyć
                            modele
                            zoptymalizowane pod konkretne zastosowania, na przykład pod anglojęzyczne artykuły
                            popularnonaukowe,
                            dokumentację techniczną albo określony styl tekstów. W praktyce wystarczyłoby dobrać
                            odpowiednią próbkę
                            i uruchomić przygotowane skrypty generujące nową wersję systemu.
                        </p>
                    </div>
                    <div class="future-image-wrap">
                        <img src="assets/images/unionjack.png" alt="Ilustracja adaptacji kodu haptycznego do innych języków"
                            width="420" height="260">
                    </div>
                </div>
            </div>

            <style>
                #Przyszłość {
                    padding: 24px 18px 40px 18px;
                }

                #Przyszłość h2 {
                    margin-bottom: 24px;
                }

                .future-section-card {
                    max-width: 1150px;
                    margin: 0 auto 24px auto;
                    background: #fffdf7;
                    border: 1px solid #e5e5e5;
                    border-radius: 18px;
                    padding: 24px;
                    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
                    text-align: left;
                }

                .future-section-card h3 {
                    color: #7c2d12;
                    margin-bottom: 18px;
                    text-align: left;
                }

                .future-two-col {
                    display: grid;
                    grid-template-columns: 1.4fr 1fr;
                    gap: 24px;
                    align-items: center;
                }

                .future-two-col p {
                    text-align: left;
                    line-height: 1.65;
                    margin-bottom: 14px;
                }

                .future-image-wrap {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .future-image-wrap img {
                    width: 100%;
                    max-width: 420px;
                    height: auto;
                    min-height: 220px;
                    object-fit: cover;
                    border-radius: 14px;
                    border: 2px dashed #f59e0b;
                    background: #fff8eb;
                }

                .future-anim-wrap {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 260px;
                }

                .future-seven-grid {
                    display: grid;
                    grid-template-columns: repeat(2, 58px);
                    grid-template-rows: repeat(3, 58px) 58px;
                    gap: 14px;
                    justify-content: center;
                    align-items: center;
                }

                .future-seven-extra {
                    grid-column: 1 / span 2;
                    justify-self: center;
                }

                .future-seven-dot,
                .future-ternary-dot {
                    width: 58px;
                    height: 58px;
                    border-radius: 50%;
                    border: 2px solid #9ca3af;
                    background: white;
                    transition: background-color 0.25s ease, transform 0.25s ease, opacity 0.25s ease;
                }

                .future-seven-dot.active {
                    background: #facc15;
                    border-color: #eab308;
                    transform: scale(1.06);
                }

                .future-ternary-grid {
                    display: grid;
                    grid-template-columns: repeat(2, 58px);
                    grid-template-rows: repeat(3, 58px);
                    gap: 14px;
                    justify-content: center;
                    align-items: center;
                }

                .future-ternary-dot.state-off {
                    background: white;
                    border-color: #9ca3af;
                    opacity: 1;
                }

                .future-ternary-dot.state-half {
                    background: rgba(250, 204, 21, 0.45);
                    border-color: #eab308;
                    opacity: 1;
                }

                .future-ternary-dot.state-full {
                    background: #facc15;
                    border-color: #eab308;
                    transform: scale(1.06);
                    opacity: 1;
                }

                @media (max-width: 900px) {
                    .future-two-col {
                        grid-template-columns: 1fr;
                    }

                    .future-section-card {
                        padding: 18px;
                    }
                }
            </style>

            <script>
                (function () {
                    const sevenDots = document.querySelectorAll('#futureSevenGrid .future-seven-dot');
                    const ternaryDots = document.querySelectorAll('#futureTernaryGrid .future-ternary-dot');

                    function animateSevenDots() {
                        sevenDots.forEach(dot => {
                            dot.classList.toggle('active', Math.random() > 0.5);
                        });
                    }

                    function animateTernaryDots() {
                        const states = ['state-off', 'state-half', 'state-full'];

                        ternaryDots.forEach(dot => {
                            dot.classList.remove('state-off', 'state-half', 'state-full');
                            const randomState = states[Math.floor(Math.random() * states.length)];
                            dot.classList.add(randomState);
                        });
                    }

                    animateSevenDots();
                    animateTernaryDots();

                    setInterval(animateSevenDots, 750);
                    setInterval(animateTernaryDots, 750);
                })();
            </script>
        </section>
        <footer>
            <h5>
                Kontakt: Maciej Łazarczyk,
                <a href="tel:+48698273433">+48 698 273 433</a>,
                <a href="mailto:maciejlazarczyk0@gmail.com">maciejlazarczyk0@gmail.com</a>
            </h5>
        </footer>

        <script>
            function showSection(sectionId) {
                const sections = document.querySelectorAll('.content');

                sections.forEach(section => {
                    section.style.display = 'none';
                });

                const activeSection = document.getElementById(sectionId);
                if (activeSection) {
                    activeSection.style.display = 'block';
                }
            }

            function confirmData() {
                alert('Dane zostały zatwierdzone.');
            }

            document.addEventListener('DOMContentLoaded', function () {
                showSection('Motywacja');
            });
        </script>
</body>

</html>