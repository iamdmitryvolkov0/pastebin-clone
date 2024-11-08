<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>PasteBin Simple Clone</h1>
    <p>Тестовое задание на позицию PHP (Laravel) Backend developer </p>
    <h2>Установка</h2>
    <ol>
      <li>Клонируйте репозиторий в локальное хранилище.</li>
      <li>Установите требуемые зависимости командой <code>composer install</code> в корневой папке проекта.</li>
      <li>Создайте БД для проекта и обновите 
        <code>DB_DATABASE</code>, 
        <code>DB_USERNAME</code>, и 
        <code>DB_PASSWORD</code> переменные в <code>.env</code> файле, с учетом ваших данных.</li>
      <li>Выполните миграции <code>php artisan migrate</code>, чтобы создать в БД необходимые таблицы.</li>
      <li>Запустите сервер командой <code>php artisan serve</code>.</li>
    </ol>
    <h2>Основная функциональность</h2>
    <p>Реализовано:</p>
    <ol>
        <li>Возможность загрузить фрагмент текста ("пасту"), состоящую из <code>title</code> и <code>body</code>
    <ul>
        <li>Загрузка паст возможна анонимно и с авторизацией.</li>
        <li>У пасты есть срок жизни. <br> (опции: 10 минут, 1 час, 3 часа, 1 день, 1 неделя, 1 месяц, бессрочно)</li>
        <li>У паст есть уровни доступа:</li>
        <ul>
        <li><code>public</code> - доступна всем</li>
        <li><code>private</code> - доступна автору</li>
        <li><code>unlisted</code> - доступна только по ссылке</li>
        </ul>
        <li>У всех паст есть хеш-ссылка.</li>
        <li>У паст есть возможность выделять синтаксис языков программирования <br> (если не выбирать язык, скрипт сам определит его).</li>
    </ul>
        </li>
        <li>Авторизация/регистрация по логину и паролю
        </li>
    <li>Возожность просматривать
    <ul>
    <li>по ссылке;</li>
    <li>страница отображения всех паст с пагинацией по 10;</li>
    <li>страница с пастами автора (для авторизованных пользователей);</li>
    <li>все истекшие пасты скрыты для просмотра, но хранятся в БД.</li>
    </ul>
    </li>
</ol>
</body>
