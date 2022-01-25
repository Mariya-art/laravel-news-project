<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $categories = [
        [
            'id' => 1,
            'name' => 'politics',
            'rus_name' => 'Политика',
        ],
        [
            'id' => 2,
            'name' => 'economy',
            'rus_name' => 'Экономика',
        ],
        [
            'id' => 3,
            'name' => 'culture',
            'rus_name' => 'Культура',
        ],
        [
            'id' => 4,
            'name' => 'science',
            'rus_name' => 'Наука',
        ],
        [
            'id' => 5,
            'name' => 'sport',
            'rus_name' => 'Спорт',
        ],
    ];

    private $news = [
        [
            'id' => 1,
            'category_id' => 1,
            'title' => 'Дата онлайн-саммита ОДКБ пока неизвестна',
            'description' => 'Пресс-секретарь Путина Песков: в Кремле пока не знают даты онлайн-саммита лидеров стран ОДКБ',
            'fulltext' => 'Пресс-секретарь президента России Дмитрий Песков сообщил РИА Новости, что дата проведения видеоконференции лидеров стран ОДКБ пока неизвестна. "Пока нет. Организатор Армения", - сказал Песков. Ранее лидеры России и Казахстана Владимир Путин и Касым-Жомарт Токаев провели телефонный разговор. Путин поддержал предложение Токаева провести видеоконференцию лидеров стран ОДКБ под председательством Армении.',
            'status' => 'Active',
        ],
        [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Путин поговорил по телефону с Токаевым',
            'description' => 'Президент России Владимир Путин поговорил по телефону с главой Казахстана Токаевым',
            'fulltext' => 'Президент Казахстана Касым-Жомарт Токаев подробно рассказал Владимиру Путину об обстановке в республике во время телефонного разговора, сообщили в Кремле. Он также поблагодарил собеседника за поддержку по линии Организации Договора о коллективной безопасности и предложил провести онлайн-саммит ОДКБ. Путин инициативу поддержал.',
            'status' => 'Active',
        ],
        [
            'id' => 3,
            'category_id' => 1,
            'title' => 'НАТО отреагировало на ситуацию в Казахстане',
            'description' => 'В НАТО призвали власти Казахстана и протестующих к диалогу',
            'fulltext' => 'НАТО серьезно обеспокоено ситуацией в Казахстане, заявил спецпредставитель генсека Североатлантического альянса по Южному Кавказу и Центральной Азии Хавьер Коломина.',
            'status' => 'Active',
        ],
        [
            'id' => 4,
            'category_id' => 1,
            'title' => 'Советники лидеров Германии и Франции прокатились на русской тройке',
            'description' => 'Советников лидеров Германии и Франции прокатили на русской тройке перед встречей с Козаком',
            'fulltext' => 'Перед началом переговоров с замглавы администрации президента РФ Дмитрием Козаком в "нормандском формате" внешнеполитический советник канцлера ФРГ Йенс Плётнер и дипломатический советник президента Франции Эммануэль Бонн прокатились по Подмосковью на "русской тройке". Плётнер и Бонн в Архангельском заняли место в санях, расписанных под хохлому и запряженных парой лошадей, которыми управлял кучер в сером кафтане и объемной меховой шапке с хвостом. К прогулке располагала и предрождественская погода - сейчас в столичном регионе небольшой "минус", идёт легкий снег. После прогулки советникам предложили угоститься горячим чаем из настоящего русского самовара и погреться около разожженного на улице очага.',
            'status' => 'Active',
        ],
        [
            'id' => 5,
            'category_id' => 2,
            'title' => 'Экономист дал прогноз по курсу рубля после праздников',
            'description' => 'Экономист Кричевский предупредил россиян о рисках для рубля после новогодних праздников',
            'fulltext' => 'В начале года на курсы валют будут влиять те же факторы, которые действовали на протяжении 2021 года. Это, прежде всего, геополитические заявления и события, а также риски усиления пандемии, рассказал агентству "Прайм" эксперт Академии управления финансами и инвестициями Алексей Кричевский. Он напомнил, что ряд европейских стран и территорий уже ввели жесткий локдаун и прочие ограничения в конце прошлого года. В 2022 году этому примеру могут последовать и другие. "73% заражений в США связаны с "омикроном", поэтому и там могут последовать новые ограничения. Это негативно отразится на настроениях инвесторов относительно рисковых активов, к которым относится рубль", - считает эксперт.',
            'status' => 'Active',
        ],
        [
            'id' => 6,
            'category_id' => 2,
            'title' => 'В Госдуме прокомментировали предложение повысить НДФЛ до 50 процентов',
            'description' => 'Депутат Гутенев: предложение повысить НДФЛ до 50 процентов носит популистский характер',
            'fulltext' => 'По сообщениям СМИ, первый зампред комитета Госдумы по бюджету и налогам Михаил Щапов (КПРФ) предложил установить НДФЛ в размере 25% для доходов свыше 10 миллионов рублей в год и до 40–50% для сверхдоходов. При этом для тех, кто получает МРОТ и меньше, он предложил снизить НДФЛ до 5% или до нуля. Это будет более справедливая система, которая приведет к сокращению разрыва в доходах и снизит социальную напряженность, считает Щапов. "Отношусь к этому как к постоянно возникающим популистским предложениям, когда люди, высказывающие их, недооценивают наших граждан и наших избирателей, считая, что подобные заявления добавляют им и их партии популярность. Я абсолютно уверен, что слова президента РФ о предсказуемости и стабильности налогообложения и о том, что не надо делать резких движений абсолютно верны", - прокомментировал Гутенев.',
            'status' => 'Active',
        ],
        [
            'id' => 7,
            'category_id' => 2,
            'title' => 'Fitch рассказало, как "Сила Сибири — 2" может повлиять на европейский рынок',
            'description' => 'Fitch: рынок газа в Европе из-за "Силы Сибири — 2" может стать более дефицитным',
            'fulltext' => 'Газовый рынок в Европе может стать более дефицитным, если "Газпром" увеличит поставки в Китай, в частности, по "Силе Сибири — 2", сказал в комментарии РИА Новости директор группы по природным ресурсам и сырьевым товарам агентства Fitch Дмитрий Маринченко.
            "Газпром", безусловно, продолжит поставлять газ в Европу по долгосрочным контрактам, но количество газа, проданного по спотовым сделкам и сверх минимальных контрактных объёмов, может действительно снизиться. Это может привести к тому, что "Газпром" перестанет быть балансирующим поставщиком "последней инстанции" в Европе, так как часть газа с месторождений Западной Сибири пойдёт в Китай. В итоге рынок газа в Европе действительно может стать более дефицитным, а пики потребления будут покрываться за счет СПГ, за который придётся конкурировать с Азией", - считает он.
            С другой стороны, отмечает аналитик, газ, поставленный в КНР по газопроводу, - это дополнительные объёмы СПГ, которые не будут куплены Китаем, а будут доступны другим покупателям, в том числе европейским.',
            'status' => 'Active',
        ],
        [
            'id' => 8,
            'category_id' => 2,
            'title' => 'О возможностях России по экспорту продовольствия',
            'description' => 'Эксперт Рамазанов заявил, что экспорт продовольствия из России становится все выгоднее',
            'fulltext' => 'В условиях, когда растут мировые цены на продовольствие, экспорт продуктов питания из России становится еще более выгодным, рассказал агентству "Прайм" профессор базовой кафедры торговой политики РЭУ им. Г.В. Плеханова Ибрагим Рамазанов.
            Он напомнил, что Россия обладает самым высоким продовольственным потенциалом и способна не только обеспечить внутренний рынок, но и наращивать экспорт. Это станет возможным в случае применения инновационно-цифровых технологий в сельском хозяйстве в сочетании с земельными, водными, энергетическими ресурсами.',
            'status' => 'Active',
        ],
        [
            'id' => 9,
            'category_id' => 3,
            'title' => 'Человек со звезды',
            'description' => 'У великого экспериментатора Дэвида Боуи юбилей',
            'fulltext' => 'Дэвида Боуи в одной из первых рок-энциклопедий на русском языке назвали "откровенно коммерческим исполнителем". Действительно, на музыкальном рынке он всегда ориентировался блестяще, благодаря чему десятилетиями не терял актуальности. С другой стороны, он не вписывался ни в один из жанров, мастерски лавируя между стилями и постоянно экспериментируя. О рок-звезде, актере, инопланетянине, которому могло бы исполниться 75 лет, — в материале РИА Новости.
            Он обожал эпатировать публику — начиная от внешнего вида, заканчивая саундом очередного альбома. О том, что этот странный человек не совсем от мира сего, поговаривали с самых первых появлений на сцене. А он словно этого и добивался: если будешь не таким, как все, легче запомнишься публике.',
            'status' => 'Active',
        ],
        [
            'id' => 10,
            'category_id' => 3,
            'title' => 'Два российских фильма вошли в программу 51-го кинофестиваля в Роттердаме',
            'description' => 'Два российских фильма вошли в конкурсную программу 51-го кинофестиваля в Роттердаме',
            'fulltext' => 'Участниками 51-го Международного кинофестиваля в Роттердаме стали фильм режиссера Марии Игнатенко "Призрачно-белый", включенный в основную конкурсную программу Tiger Competition, а также фильм-дебют режиссера Тамары Дондурей "Рядом", отобранный в конкурсную программу Bright Future, сообщили в пресс-службе Минкультуры РФ.',
            'status' => 'Active',
        ],
        [
            'id' => 11,
            'category_id' => 3,
            'title' => 'Лучшие комедии на праздники',
            'description' => 'Над чем смеяться и за кого переживать',
            'fulltext' => 'Одна из свежих и актуальных картин — "Неуловимый аромат любви" со звездой "Дневников вампира" Ниной Добрев. Она играет модную писательницу из Лос-Анджелеса Натали, которая находит на сайте знакомств идеального бойфренда Тэга. Красивого, интересного, остроумного.
            Лазурный берег — место действия комедии "Тайна Сен-Тропе" с Кристианом Клавье, главным "поставщиком" шуток в современном французском кино. И здесь не обошлось без убийства: оно происходит среди карикатурных богачей на курорте, а расследование ведет эксцентричный и не слишком смышленый детектив Жан. Чтобы раскрыть дело, он притворяется дворецким и становится свидетелем пафосной жизни магнатов, знаменитостей и старлеток.
            Звездный состав подобрался в картине "Убийство на яхте". Пусть название не пугает: комедия с элементами детектива совсем не страшная. Парикмахерша Одри (Дженнифер Энистон) и полицейский Ник (Адам Сэндлер) отправляются в отпуск в Европу. В самолете знакомятся с английским аристократом Чарльзом (Люк Эванс), который приглашает их отдохнуть на яхте дяди-миллиардера. Магната во время путешествия убивают при загадочных обстоятельствах. Подозреваемыми становятся главные герои. Но любительница детективов Одри смотрит на это как на увлекательное приключение.',
            'status' => 'Active',
        ],
        [
            'id' => 12,
            'category_id' => 3,
            'title' => 'Около 900 экспонатов в 2021 году пополнили фонды Музея Победы в Москве',
            'description' => 'Коллекция Музея Победы в Москве в 2021 году пополнилась почти 900 экспонатами',
            'fulltext' => 'Коллекция Музея Победы в Москве в 2021 году пополнилась почти 900 экспонатами – в их числе фотографии, документы и письма, сообщает пресс-служба учреждения.
            "В 2021 году Музей Победы принял на постоянное хранение почти 900 экспонатов. Среди новых поступлений — фотографии, документы, письма. Эти раритеты пожертвовали музею родственники героев Великой Отечественной войны", — говорится в сообщении.
            По словам главного хранителя Наталии Засковец, слова которой приводит пресс-служба, ежегодно жители Москвы, Подмосковья, других регионов России "передают в дар музею свои семейные реликвии". На данный момент, подчеркнула она, всего в фондах насчитывается более 316 тысяч предметов.',
            'status' => 'Active',
        ],
        [
            'id' => 13,
            'category_id' => 4,
            'title' => 'Ученые выяснили предел продолжительности жизни человека',
            'description' => 'Ученые HEC Montreal заявили, что к концу XXI века люди смогут жить по 130 лет',
            'fulltext' => 'К концу XXI века люди смогут доживать до 130 лет, а предел продолжительности жизни достигнет 180 лет, сделали ученые HEC Montreal из Монреальского университета во время анализа статистических данных, пишет Daily Mail.
            Автор исследования, кандидат математических наук Лео Бельзиль предположил, что к 2100 году будет побит рекорд максимальной продолжительности жизни, составивший 122 года. До такого возраста дожила француженка Жанна Кальман, умершая в 1997 году. Ученый пояснил, что, по некоторым данным, можно предположить отсутствие верхнего предела продолжительности жизни человека.
            В публикации в "Ежегодном обзоре статистики" Бельзиль предупредил о последствиях для общества из-за увеличения количества долгожителей: в частности, вырастут расходы на здравоохранение из-за распространения болезней, характерных для старческого возраста. Кроме того, усилится нагрузка на систему социального обеспечения: вырастет доля пенсионеров и сократится процент налогоплательщиков. Уже сейчас в мире известно о 12 людях старше 110 лет.',
            'status' => 'Active',
        ],
        [
            'id' => 14,
            'category_id' => 4,
            'title' => 'Раскрыта тайна "загадочного дома" на Луне',
            'description' => '"Загадочный дом" на Луне, найденный китайским луноходом "Юйту-2", оказался камнем',
            'fulltext' => '"Загадочный" объект, запечатленный китайским луноходом "Юйту-2" у кратера Фон Карман, оказался небольшим камнем, сообщает интернет-издание CNet.
            Первые снимки объекта появились в начале декабря. Из-за ракурса фото казалось, что стоящий на горизонте предмет имеет необычную форму, потому его прозвали "загадочным домом".
            Как пишет CNet, освещающий космическую тематику журналист Эндрю Джонс опубликовал новый снимок с "Юйту-2", на котором можно увидеть, что "загадочный" объект — всего лишь обычный камень, лежащий на краю кратера.',
            'status' => 'Active',
        ],
        [
            'id' => 15,
            'category_id' => 4,
            'title' => 'Роскосмос оценил вероятность столкновения астероида Апофис с Землей',
            'description' => 'Роскосмос: вероятность столкновения астероида Апофис с Землей "очень и очень мала"',
            'fulltext' => '"Роскосмос" оценивает вероятность столкновения астероида Апофис с Землей как ничтожно малую.
            Ранее специалисты ВНИИ ГОЧС предупредили, что опаснейший астероид Апофис диаметром почти 400 метров весной 2029 года очень близко подлетит к Земле – на расстояние, на котором на орбите размещены геостационарные спутники.
            В "Роскосмосе" отметили, что в 2021 году получили от Института прикладной математики 5797 измерений по 106 астероидам и 31 комете, включая 339 позиционных измерений по Апофису.',
            'status' => 'Active',
        ],
        [
            'id' => 16,
            'category_id' => 4,
            'title' => 'Эксперт рассказал, когда в России начнут внедрять квантовые сети',
            'description' => 'Эксперт Курочкин: квантовые сети массово внедрят в России к 2025 году',
            'fulltext' => 'Квантовые сети будут массово внедрены в России в ближайшие три года, в первую очередь развитию рынка поспособствует возможность подключить к таким сетям городские предприятия, заявил РИА Новости директор Центра компетенций НТИ по квантовым коммуникациям на базе НИТУ МИСиС Юрий Курочкин.
            Квантовые линии связи позволяют передавать большие массивы данных с высокой скоростью. Причем передаваемая информация надежно зашифрована, так как в основе лежит технология кодирования и передачи данных в квантовых состояниях фотонов. Законы физики не позволяют измерить квантовое состояние так, чтобы оно не изменилось, поэтому квантовый канал связи невозможно прослушать незаметно для адресатов.
            "Квантовые сети будут массово внедрены в России в ближайшие три года", - сказал Курочкин. Эксперт также напомнил, что согласно дорожной карте развития квантовых коммуникаций в России к 2024 году планируют запустить 7 тысяч километров квантовых сетей.',
            'status' => 'Active',
        ],
        [
            'id' => 17,
            'category_id' => 5,
            'title' => '"Ювентус" одержал волевую победу над "Ромой"',
            'description' => 'Футболисты "Ювентуса" победили "Рому" в серии А, уступая 1:3 по ходу матча',
            'fulltext' => 'Футболисты "Ювентуса" на выезде одержали волевую победу над "Ромой" в матче 21-го тура чемпионата Италии.
            Встреча в Риме завершилась со счетом 4:3. В составе "Старой синьоры" голами отметились Пауло Дибала (18-я минута), Мануэль Локателли (70), Деян Кулусевски (72) и Маттиа Де Шильо (77). У "джаллоросси" отличились Тэмми Абрахам (11), Генрих Мхитарян (48) и Лоренцо Пеллегрини (53).
            На 81-й минуте был удален защитник "Ювентуса" Маттейс де Лигт. Пеллегрини на 83-й минуте не смог реализовать пенальти и сравнять счет в матче.',
            'status' => 'Active',
        ],
        [
            'id' => 18,
            'category_id' => 5,
            'title' => 'Мощное возвращение Цветкова',
            'description' => 'Чемпион мира из России заткнул рот критикам',
            'fulltext' => 'Как же мы ждали возвращения в сборную России Максима Цветкова. Чемпион мира практически три года отсутствовал в обойме команды. Когда казалось, что прежнего Цветкова мы больше не увидим, Максим вернулся и заткнул рот критикам. Россиянин провел две выдающиеся гонки на этапе Кубка мира в Оберхофе и теперь имеет огромные шансы попасть на Олимпиаду в Китае.',
            'status' => 'Active',
        ],
        [
            'id' => 19,
            'category_id' => 5,
            'title' => 'Логинов идет девятым в общем зачете Кубка мира',
            'description' => 'Российский биатлонист Логинов идет девятым в общем зачете Кубка мира',
            'fulltext' => 'Россиянин Александр Логинов занимает девятое место в общем зачете Кубка мира по биатлону сезона-2021/22 после завершения пятого этапа в немецком Оберхофе.
            В пятницу россиянин выиграл спринт, а в воскресенье занял пятое место в гонке преследования. В активе Логинова 314 баллов. До начала этапа он занимал 12-ю позицию.
            В общем зачете лидирует француз Кентен Фийон-Майе (461). Второе место занимает его соотечественник Эмильен Жаклен (449), третье - швед Себастьян Самуэльссон (425).',
            'status' => 'Active',
        ],
        [
            'id' => 20,
            'category_id' => 5,
            'title' => 'Саночница Иванова взяла золото в спринте на этапе Кубка мира в Латвии',
            'description' => 'Российская саночница Татьяна Иванова взяла золото в спринте на этапе Кубка мира в Латвии',
            'fulltext' => 'Российская саночница Татьяна Иванова выиграла золото в спринте на этапе Кубка мира в латвийском Сигулде.
            Спортсменка показала результат 31,241 секунды. Второй стала немка Натали Гайзенбергер (+0,014), третье место заняла австрийка Мадлен Эгле (+0,031).
            Россиянка Виктория Демченко стала четвертой (+0,060), Екатерина Катникова - восьмой (+0,136), Диана Логинова - 12-й (+0,562).',
            'status' => 'Active',
        ],
    ];

    public function getCategories(): array
    {  
        return $this->categories;
    }

    public function getNewsByCategoryId($id): array
    {
        $categoryNews = [];

        foreach($this->news as $newsItem) {
            if ($newsItem['category_id'] == $id) {
                $categoryNews[] = [
                    'id' => $newsItem['id'],
                    'category_id' => $newsItem['category_id'],
                    'title' => $newsItem['title'],
                    'description' => $newsItem['description'],
                    'fulltext' => $newsItem['fulltext'],
                ];
            }
        }

        return $categoryNews;
    }

    public function getCategoryName($id): string
    {
        $categoryName = '';
        foreach($this->categories as $category) {
            if ($category['id'] == $id) {
                $categoryName = $category['rus_name'];
            }
        }

        return $categoryName;
    }

    public function getNews(): array
    {
        return $this->news;
    }

    public function getNewsById(int $id): array
    {
        foreach($this->news as $newsItem) {
            if ($newsItem['id'] == $id) {
                return [
                    'id' => $newsItem['id'],
                    'category_id' => $newsItem['category_id'],
                    'title' => $newsItem['title'],
                    'description' => "<strong>" . $newsItem['description'] . "</strong>", // для вывода тега <strong> во вьюхе указываем скобки {!! !!}
                    'fulltext' => $newsItem['fulltext'],
                ];
            }
        }
    }
}
