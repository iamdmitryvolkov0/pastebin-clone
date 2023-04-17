<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>PasteBin Simple Clone</h1>
    <p>This project was created as a test task for PHP (Laravel) Backend developer @Atwinta </p>
    <h2>Installation</h2>
    <ol>
      <li>Clone the repository to your local machine.</li>
      <li>Install the required dependencies by running <code>composer install</code> in the project root directory.</li>
      <li>Create a new database for the project and update the 
        <code>DB_DATABASE</code>, 
        <code>DB_USERNAME</code>, and 
        <code>DB_PASSWORD</code> variables in the <code>.env</code> file with your database credentials.</li>
      <li>Run <code>php artisan migrate</code> to create the necessary database tables.</li>
      <li>Start the development server by running <code>php artisan serve</code>.</li>
    </ol>
    <h2>Main functionality</h2>
    <p>Implemented:</p>
    <ol>
        <li>Ability to upload a piece of text ("paste") consisting of the <code>title</code> and <code>body</code>
    <ul>
        <li>Uploading is possible as anonymous or as user.</li>
        <li>Paste has an expiration period. <br> (options: 10 min, 1 hour, 3 hours, 1 day, 1 week, 1 month, unlimited)</li>
        <li>Paste has access limitation</li>
        <ul>
        <li><code>public</code> - available to everyone</li>
        <li><code>private</code> - available to author</li>
        <li><code>unlisted</code> - available with link only</li>
        </ul>
        <li>All pastes have hash link</li>
        <li>Paste has code highlighting option <br> (if you don`t choose any, script do it automatically)</li>
    </ul>
        </li>
        <li>Authorization/Registration by login (email) and password
        </li>
    <li>Ability to view
    <ul>
    <li>with link</li>
    <li>all pages contains last 10 public pastes;</li>
    <li>authorized user also can see his pastes;</li>
    <li>authorized user have special page with only his pastes with pagination;</li>
    <li>all expired pastes are hidden for everybody.</li>
    </ul>
    </li>
</ol>
</body>
