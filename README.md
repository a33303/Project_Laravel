# Laravel 8.2
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<h3>This is my project blog_news in Laravel \ MySQL DB</h3>

Проект новостного сайта созданный с помощью Laravel с рабочей моделью получения данных в БД MySQL через парсинг RSS каналов с применением очередей (queue) Redis / Database и технологией аутентификации пользователя через соц. сети или регистрации нового пользователя.

Описание таблиц :<br>
<b>categories</b>	-	в таблице содержатся данные об категориях новостей. <br>
<b>category_has_news</b>	-	таблица связи двух таблиц (многие ко многим) categories и news. <br>
<b>failed_jobs</b>	-	в таблице содержатся данные об проваленных задачах worker. <br>
<b>jobs</b>	-	в таблице содержатся данные об задачах worker, в рамках проекта это парсинг новостных rss. <br>
<b>migrations</b>	-	в таблице содержатся данные об миграциях данных в БД. <br>
<b>news</b>	-	в таблице содержатся данные новостей. <br>
<b>order_source</b>	-	в таблице содержатся данные о заказах на выгрузку данных. <br>
<b>password_resets</b>	-	в таблице содержатся данные о пользователях смешивших пароль <br>
<b>personal_access_tokens</b>	-	в таблице содержатся данные о персональных токенах. <br>
<b>source</b>	-	в таблице содержатся данные об источниках RSS каналов для парсинга. <br>
<b>users</b>	-	в таблице содержатся данные о пользоватлях. <br>



Технологии проекта:<br>
<b>	Laravel 8.2	</b> - flamework PHP <br>
<b>	Blades	</b> - технология построения фронтальной части сайта <br>
<b>	Mailhog	</b> - технология оповещения пользователя (пример, смена пароля) <br>
<b>	MySQL 8.0</b> - регуляционная БД <br>
<b>	NGNIX:Alpine</b> - движок для БД <br>
<b>	Eloquent ORM</b> - работа с БД <br>
<b>	Redis version=7.0.7	</b> - хранилище данных типа «ключ‑значение» <br>
<b>	CKEditor4 + Laravel File Manager	</b> - хранилище файлов и изображений с возьможностью редактирования текста. <br>
<b>	laravel/ui --dev </b> - реализована базовая аутентификация<br>
<b>	Socialiteproviders </b> - провайдер реализован через Паттерн «Наблюдатель»<br>
<b>	Laravel Socialite + OAuth + Socialiteproviders </b> создана система авторизации через социальную сеть <br>
<b>	MVC </b> система построения архитектуры приложения <br>
<b>	Docker </b> приложения реализовал через Docker <br>

Schema Database: <br>
![image](https://user-images.githubusercontent.com/64500585/220036050-e7ed2448-2fcb-44c5-8f91-7bdba77aa466.png)
