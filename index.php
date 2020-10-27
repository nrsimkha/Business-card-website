<?php

// ini_set('display_errors','Off');
if (isset($_POST['fio'])){
    $template = [
        'data' => [],
        'error' => []
    ];
    // Функция очистки входных параметров
    function clean_field($key){        
        $value = '';
        if (isset($_POST[$key])){
            $value = trim (strip_tags($_POST[$key]));
        }
        return $value;}

    // Процедура очистки параметров и занесение их в template
    $template['data']['fields'] = [
        'fio' => clean_field('fio'),
        'email' => clean_field('email'),
        'message' => clean_field('message')
    ];

    // Подключение к БД
    $link = mysqli_connect('localhost', 'root', '', 'project2');
    mysqli_set_charset($link, 'utf8');
    $sql = "INSERT INTO clients (id, fio, email, message) VALUE (NULL, '{$template['data']['fields']['fio']}', '{$template['data']['fields']['email']}', '{$template['data']['fields']['message']}')";

    $result = mysqli_query($link, $sql); 
    if ($result != true) {
        $template['error']['insert_bd_error'] = true;
    } else{
        $template['error']['insert_bd_error'] = false;
        $text = "<b>Заявка принята</b>";
        echo("<script>$('#send_respond').html('$text')</script>");
    }
    echo 'результат:'.$result;
    
   
    
   
    // var_dump($link);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <title>Document</title>
</head>
<body>      
<div class="background">
    <div class="background_overlay" >
        <div class="wrapper">
            <div class="logo"></div>
            <div class="introduction">
                <div class="introduction_aboutUs">
                    <h1 class="fade">Разработка сайтов любой сложности</h1>
                    <p>FastStart - команда опытных профессионалов по реализации задач любой сложности в области web-разработки и программирования. В кратчайшие сроки мы реализуем все ваши идеи и мысли и дадим мощный толчок вашему бизнесу!</p>
                    <div class="aboutUs-buttons">
                        <div class="button_blue">О нас</div>
                        <div class="button_transparent">Стоимость</div>
                    </div>
                </div>
                <div class="introduction_contactUs">
                        <div class="introduction_contactUs_overlay">
                            <h3>СВЯЖИТЕСЬ СО МНОЙ</h3>
                            <form action="#" method="post">
                                <input type="text" name="fio" placeholder="Мое имя">
                                <input type="text" name="email" placeholder="Мой email">
                                <input type="hidden" name="message" value="11">
                                <button type="submit">ОТПРАВИТЬ ЗАПРОС</button>
                                <p>Нажимая кнопку "ОТПРАВИТЬ ЗАПРОС" Вы даете согласие на обработку личных данных в соотстветствии правилами политики конфиденциальности.</p>
                            </form>
                        </div>
                </div>
                <div class="popup">
                    <div class="popup-background"></div>
                    <div class="popup-content">  
                        <p id="send_respond"></p>      
                        <!-- <php if ($result == true):  ?> 
                            <p>Ваша заявка принята!</p> 
                        <php else:?> 
                            <p>У нас техническая проблема, попробуйте позже.</p> 
                        <php endif;?>                           -->
                    </div>
                    <div class="p-cross"></div>
                </div> 
            </div> 
        </div>
       
        <div class="no-background header" > 
            <div class="wrapper " >
                <div class="header_block">
                    <div class="for_burger">
                        <div class="header_logo"></div>
                        <div class="burger"></div>
                    </div>                    
                    <nav>
                        <a href="#intro">О нас</a>
                        <a href="#feature">Преимущества</a>
                        <a href="#order">Как заказать</a>
                        <a href="#price">Стоимость</a>
                        <a href="#review">Отзывы</a>
                        <a href="#contacts">Контакты</a>
                    </nav>
                    
                </div>
            </div>
        </div>

        <div class="no-background" > 
            <div class="wrapper  " >

                <div class="intro" id="intro">
                    <div class="intro_image"></div>
                    <div class="intro_text">
                        <h2>Наша главная задача - сделать ваш бизнес в интернете уникальным.</h2>
                        <p>Для нас нет сложных задач. Мы разрабатываем не просто интернет-ресурсы для бизнеса, а создаем уникальные сайты и порталы, которые максимально удовлетворяют потребности любого, даже самого требовательного, пользователя.</p>
                        <div class="button_transparent">Подробнее</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background_grey" id="feature">
            <div class="feature wrapper">
                <div class="feature_header">
                    <h2>Превращаем самые невероятные идеи в реальность</h2>
                <p>Если вы еще не знаете чего хотите, то мы придумаем все за вас!</p>
                </div>
                
                <div class="advantages">
                    <div class="advantages_image"></div>
                    <div class="advantages_content">
                        <div class="advantage_item">
                            <div class="advantage_item_icon bookmark"></div>
                            <div class="advantage_item_text">
                                <h4>Уникальный подход</h4>
                                <p>Мы подходим к идеям разработки с самых необычных сторон, что позволяет удивлять будущих пользователей.</p>
                            </div>
                        </div>
                        <div class="advantage_item">
                            <div class="advantage_item_icon money"></div>
                            <div class="advantage_item_text">
                                <h4>Монетизация</h4>
                                <p>Правильный дизайн быстро приводит потенциальных клиентов к покупке, поэтому наша команда уделяет этому самую важную роль.</p>
                            </div>
                        </div>
                        <div class="advantage_item">
                            <div class="advantage_item_icon cart"></div>
                            <div class="advantage_item_text">
                                <h4>Повышение функционала</h4>
                                <p>Разработанные нами проекты всегда готовы к дополнительным расширеням функционала. За счет гибкости разработки, мы в кратчайшие добавим новые модули и решения.</p>
                            </div>
                        </div>
                        <div class="advantage_item">
                            <div class="advantage_item_icon person"></div>
                            <div class="advantage_item_text">
                                <h4>Оптимизация процессов</h4>
                                <p>Весь оборот и отчетность по клиентам будут доступны в специальной системе userBox, которая разработана нашей командой для оптимизации процессов работы с клиентами.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="no-background" > 
            <div class="wrapper feature_2">
                <div class="intro_text">
                    <h2>Качественный сайт в разумные сроки</h2>
                    <p>За счёт оптимизации внутренних процессов, многие работы по разработке сайта выполняются параллельно. Это позволяет нам сократить время выкладки сайта, не увеличивая при этом итоговую цену.</p>
                    <p>Стоимость разработки сайта считается исходя из необходимого функционала и трудозатрат. При ограниченном бюджете есть возможность упростить некоторые этапы или изменить перечень функционала. Стоимость создания проекта начинается от 15 000 руб.</p>
                    <div class="button_transparent">Узнать стоимость</div>
                </div>
                <div class="feature_2_image"></div>
            </div>
        </div>
    
        <div class="wrapper contactUs " id="order">
            <h2>Хотите узнать, как развить свой бизнес?</h2>
            <p>Свяжитесь с нами и мы расскажем о том, что подойдет именно для вашего бизнеса и какие инструменты мы будем использовать.</p>
            <div class="contactUsButton">Связаться с нами</div>
        </div>
        <div class="no-background " id="price">  
            <div class="cost wrapper">
                    <h2>СТОИМОСТЬ</h2>
                    <div class="blue_line"></div>
                    <div class="sites">
                        <!-- Первый блок -->
                        <div class="sites_item_wrapper">
                            <div class="sites_item">
                            <div class="sites_item_image"></div>
                                <h3> Сайт-визитка</h3>
                                <div class="from_cost">
                                    <div class="left_border_letters">от</div> 
                                    <div class="big_blue_letters">15</div> 
                                    <div class="last_letters"> <p>тыс.руб.</p> </div> 
                                </div>
                                
                                <ul>
                                    <li><b>1</b> страница</li>
                                    <li><b>Эксклюзивный</b> дизайн</li>
                                    <li><b>Адаптивная</b> верстка</li>
                                    <li><b>Внутренняя</b> оптимизация</li>
                                    <li><s>Платформа userBox</s></li>
                                </ul>
                                <div class="orderButton">ЗАКАЗАТЬ</div> 
                            </div>
                        </div>
                        <!-- Второй блок -->
                        <div class="sites_item_wrapper">
                            <div class="sites_item">
                                <div class="sites_item_image"></div>
                                <h3> Сайт компании</h3>
                                <div class="from_cost">
                                    <div class="left_border_letters">от</div> 
                                    <div class="big_blue_letters">40</div> 
                                    <div class="last_letters"> <p>тыс.руб.</p> </div> 
                                </div>
                                
                                <ul>
                                    <li>до<b>10</b> страниц</li>
                                    <li><b>Эксклюзивный</b> дизайн</li>
                                    <li><b>Адаптивная</b> верстка</li>
                                    <li><b>Внутренняя</b> оптимизация</li>
                                    <li><s>Платформа userBox</s></li>
                                </ul>
                                <div class="orderButton">ЗАКАЗАТЬ</div> 
                            </div>
                        </div>
                        <!-- Третий блок -->
                        <div class="sites_item_wrapper">
                            <div class="sites_item">
                                <div class="sites_item_image"></div>
                                <h3> Магазин</h3>
                                <div class="from_cost">
                                    <div class="left_border_letters">от</div> 
                                    <div class="big_blue_letters">220</div> 
                                    <div class="last_letters"> <p>тыс.руб.</p> </div> 
                                </div>
                                
                                <ul>
                                    
                                    <li><b>Эксклюзивный</b> дизайн</li>
                                    <li><b>Адаптивная</b> верстка</li>
                                    <li><b>Внутренняя</b> оптимизация</li>
                                    <li><b>Маркетинг</b> решения</li>
                                    <li>Платформа <b>userBox</b></li>
                                </ul>
                                <div class="orderButton">ЗАКАЗАТЬ</div> 
                            </div>
                        </div>
                        <!-- Четвертый блок -->
                        <div class="sites_item_wrapper">
                            <div class="sites_item">
                                <div class="sites_item_image"></div>
                                <h3> Интернет-портал</h3>
                                <div class="from_cost">
                                    <div class="left_border_letters">от</div> 
                                    <div class="big_blue_letters">500</div> 
                                    <div class="last_letters"> <p>тыс.руб.</p> </div> 
                                </div>
                                
                                <ul>
                                    <li><b>Эксклюзивный</b> дизайн</li>
                                    <li><b>Адаптивная</b> верстка</li>
                                    <li><b>Внутренняя</b> оптимизация</li>
                                    <li><b>Маркетинг</b> решения</li>
                                    <li>Платформа <b>userBox</b></li>
                                </ul>
                                <div class="orderButton">ЗАКАЗАТЬ</div> 
                            </div>
                        </div>
                </div>
            </div> 
        </div> 
        <div class="background_grey">
            <div class="cost wrapper clients_block">
                    <h2>НАШИ КЛИЕНТЫ</h2>
                    <div class="blue_line"></div>
                    <div class="clients">
                        <div class="client_item finnair"></div>
                        <div class="client_item event"></div>
                        <div class="client_item letit" ></div>
                        <div class="client_item viking"></div>
                    </div>
            </div>
        </div> 
        <div class="no-background " id="review" >  
            <div class="cost wrapper">
                <h2>ОТЗЫВЫ</h2>
                <div class="blue_line"></div>
                <div class="review_block">
                    <div class="slider">
                        <div class="review">
                            <div class="review_photo person1"></div>
                            <div class="review_text">“Выражаем благодарность компании за работу над улучшением нашего сайта finnair.com Я высоко оцениваю качество выполненных работ по анализу потребностей пользователей и проектированию интерфейса новой системы личных сообщений. Считаю необходимым отдельно упомянуть ответственность по отношению к срокам выполнения поставленных задач и неукоснительное следование целям заказчика.”</div>
                            <div class="review_name">Илья Бакланов, <span class="blue_company">Finnair</span> </div>
                        </div>
                        <div class="review">
                            <div class="review_photo person2"></div>
                            <div class="review_text">“С начала нашего сотрудничества чувствуется ответственное отношение менеджера к нашему проекту. В процессе своей деятельности специалисты компании подтвердили свой высокий профессиональный статус и оперативность в решении проблем. Нам отвечали своевременно на все возникающие вопросы, предоставляли консультации и рекомендации относительно нашего сайта. Чувствуется, что в данной компании работают настоящие профессионалы своего дела.”</div>
                            <div class="review_name">Анна Старик, <span class="blue_company">Eventworld</span> </div>
                        </div>
                        <div class="review">
                            <div class="review_photo person3"></div>
                            <div class="review_text">“Был проведен комплексный анализ портала в плоскостях юзабилити и SEO, по результатам которого предоставлен развернутый экспертный отчет с рекомендациями по оптимизации визуальной и текстовой составляющих. Итоговые материалы были достойно оформлены и написаны доступным и понятным языком. Полученный документ лег в основу измененной концепции работы над сайтом "Viking Line"”</div>
                            <div class="review_name">Денис Воробьев, <span class="blue_company">Viking Line</span> </div>
                        </div>
                        <div class="review">
                                <div class="review_photo person1"></div>
                                <div class="review_text">“Выражаем благодарность компании за работу над улучшением нашего сайта finnair.com Я высоко оцениваю качество выполненных работ по анализу потребностей пользователей и проектированию интерфейса новой системы личных сообщений. Считаю необходимым отдельно упомянуть ответственность по отношению к срокам выполнения поставленных задач и неукоснительное следование целям заказчика.”</div>
                                <div class="review_name">Илья Бакланов, <span class="blue_company">Finnair</span> </div>
                        </div>
                        
                    </div>
                </div>
                <div class="dots_block">
                    <div class="dots"></div>
                    <div class="dots"></div>
                    <div class="dots"></div>
                </div>
            </div>
        </div>  
        <div class="wrapper footer " >
            <div class="contacts " id="contacts">
                <h2> <span class="blue_text">Свяжитесь</span> с нами</h2>
                <div class="contacts_footer_block">
                    <div class="contacts_footer_item">
                        <div class="contacts_footer_item_icon location"></div>
                        <div class="contacts_footer_item_text">Большая Спасская ул. 12 <br>
                                Москва, Россия</div>
                    </div>
                    <div class="contacts_footer_item">
                        <div class="contacts_footer_item_icon phone"></div>
                        <div class="contacts_footer_item_text">8(495)626-46-00</div>
                    </div>
                    <div class="contacts_footer_item">
                        <div class="contacts_footer_item_icon mail"></div>
                        <div class="contacts_footer_item_text"><a href="mailto:moscow@faststart.ru">moscow@faststart.ru</a></div>
                    </div>
                    <div class="contacts_footer_item">
                        <div class="contacts_footer_item_icon website"></div>
                        <div class="contacts_footer_item_text"> <a href="www.faststart.ru">www.faststart.ru</a> </div>
                    </div>
                </div>
            </div>
            <div class="footer_form">
                    <form action="#" method="post">
                        <input type="text" name="fio" placeholder="Ваше имя">
                        <input type="text" name="email" placeholder="Ваш email">
                        <textarea type="text" name="message" placeholder="Я хочу..."></textarea>
                        <button type="submit">Отправить запрос</button>
                    
                    </form>
            </div>
        </div>
        <div class="no-background" >  
            <div class="wrapper">
                <div class="social_icons_block">
                    <div class="social_icon_item tw"></div>
                    <div class="social_icon_item fb"></div>
                    <div class="social_icon_item gg"></div>
                    <div class="social_icon_item ins"></div>
                </div>
            </div>
        </div>
    </div>
</div>
 
      

<div class="fon">
    <div class="fon-preloader"></div>
    <div class="fon-preloader"></div>
    <div class="fon-preloader"></div>
    <div class="fon-preloader"></div>
    <div class="fon-preloader"></div>
</div>
<div class="arrow-up"></div>
    <script src="/main.js"></script>
    <script src="/jquery.js"></script>
</body>
</html>
